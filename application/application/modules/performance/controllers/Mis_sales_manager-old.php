<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mis_sales_manager extends MX_Controller 
{
    // start of class

    public function __construct() 
    { 
        parent::__construct();
        $this->load->module('login');
        $this->load->model(array('mis_model','faq/faq_model'));
        $this->load->library('commonquery');
        $this->load->helper('form');
        
        $this->mentor_id = $this->mentor_id=$this->session->balance_session['admin_id'];
        
        if($this->login->check_if_logged_in() === FALSE)
        {
            redirect(''); 
        }
        error_reporting(0);
    }
    public function index(){
        $data = array();
        $data['counsellor_list'] = $this->mis_model->get_counsellor_list();
        display_view('index',$data);
    }//public function index(){
    public function efforts_for_sales(){
        $c_name  = $this->session->balance_session['first_name'];
        if(strtolower($c_name)=='vishal'){
            if(isset($_POST['counsellor_name'])){
                $c_name  = $_POST['counsellor_name'];
            }else{
                $c_name = false;
            }
            
        }
        $data = array();
        $data['sales_funnel_sales'] = $this->mis_model->get_sales_funnel_sales(0,$c_name);
        $data['sales_funnel_sales_team'] = $this->mis_model->get_sales_funnel_sales(1,$c_name);
        $avg_calls = $this->mis_model->get_Avg_Calls(0,$c_name);
        $data['avg_calls'] = $avg_calls[0]['fu_count'] + $avg_calls[0]['key_insight'];
        $avg_calls_fu = $this->mis_model->get_Avg_Calls(0,$c_name);
        $data['avg_calls_fu'] = $avg_calls_fu[0]['fu_count'];
        $avg_calls_team = $this->mis_model->get_Avg_Calls(1,$c_name);
        $data['avg_calls_team'] = $avg_calls_team[0]['fu_count'] + $avg_calls_team[0]['key_insight'];
        echo json_encode($data);
    }//public function efforts_for_sales(){
    public function counsellor_performance_review(){
        $c_name  = $this->session->balance_session['first_name'];
        if(strtolower($c_name)=='vishal'){
            if(isset($_POST['counsellor_name'])){
                $c_name  = $_POST['counsellor_name'];
            }else{
                $c_name = false;
            }
            
        }
        $data = array();
        $current_month_date = date('Y-m').'-01';
        $data['sales_funnel_sales'] = $this->mis_model->get_sales_funnel_sales(0,$c_name);
        $total_lead_assign = $this->mis_model->get_total_lead_assign(0,$c_name);
        $data['total_lead_assign'] = count($total_lead_assign);
        $consultation=0;
        $hot=0;
        $warm=0;
        foreach ($total_lead_assign as $key => $value) {
            if(!empty($value['key_insight'])){
                $consultation++;
            }
            if(!empty($value['order_email'])){
            	if(strtotime($current_month_date) <= strtotime($value['order_date'])){
            		if(strtolower($value['status'])=='hot'){
		                $hot++;
		            }//if(strtolower($value['status'])=='hot'){
		            if(strtolower($value['status'])=='warm'){
		                $warm++;
		            }//if(strtolower($value['status'])=='warm'){
	            }//if(strtotime($current_month_date) >= strtotime($value['order_date'])){
            }//if(!empty($value['order_email'])){
        }//foreach ($total_lead_assign as $key => $value) {
        $data['consultation'] = $consultation;
        /*$lead_by_status_completed = $this->mis_model->get_lead_by_status_completed($c_name);
        foreach ($lead_by_status_completed as $key => $value) {
            if(strtolower($value['status'])=='hot'){
                $data['hot'] = $value['c'];
            }
            if(strtolower($value['status'])=='warm'){
                $data['warm'] = $value['c'];
            }
        }*/
        $data['hot'] = $hot;
        $data['warm'] = $warm;
        $data['lead_consultation_ratio'] = round($consultation / $data['total_lead_assign'] * 100,2).' %';
        $data['consultation_sales'] = round($data['sales_funnel_sales'][0]['unit'] / $consultation * 100,2) .' %';
        $data['lead_to_sales_ratio'] =  round($data['sales_funnel_sales'][0]['unit'] / $data['total_lead_assign'] * 100,2).' %';
        $data['hot_to_sales'] = round($data['hot'] / $data['sales_funnel_sales'][0]['unit'] * 100,2).' %';

        //////////////////////// OVERALL DATA ////////////////////////////////////////////
        $data_overall = array();
        $current_month_date_overall = date('Y-m').'-01';
        $data['sales_funnel_sales_overall'] = $this->mis_model->get_sales_funnel_sales(1,$c_name);
        $total_lead_assign_overall = $this->mis_model->get_total_lead_assign(1,$c_name);
        $data['total_lead_assign_overall'] = count($total_lead_assign_overall);
        $consultation_overall=0;
        $hot_overall=0;
        $warm_overall=0;
        foreach ($total_lead_assign_overall as $key => $value) {
            if(!empty($value['key_insight'])){
                $consultation_overall++;
            }
            if(!empty($value['order_email'])){
                if(strtotime($current_month_date_overall) <= strtotime($value['order_date'])){
                    if(strtolower($value['status'])=='hot'){
                        $hot_overall++;
                    }//if(strtolower($value['status'])=='hot'){
                    if(strtolower($value['status'])=='warm'){
                        $warm_overall++;
                    }//if(strtolower($value['status'])=='warm'){
                }//if(strtotime($current_month_date) >= strtotime($value['order_date'])){
            }//if(!empty($value['order_email'])){
        }//foreach ($total_lead_assign as $key => $value) {
        $data['consultation_overall'] = $consultation_overall;
        $data['hot_overall'] = $hot_overall;
        $data['warm_overall'] = $warm_overall;
        $data['lead_consultation_ratio_overall'] = round($consultation_overall / $data['total_lead_assign_overall'] * 100,2).' %';
        $data['consultation_sales_overall'] = round($data['sales_funnel_sales_overall'][0]['unit'] / $consultation_overall * 100,2) .' %';
        $data['lead_to_sales_ratio_overall'] =  round($data['sales_funnel_sales_overall'][0]['unit'] / $data['total_lead_assign_overall'] * 100,2).' %';
        $data['hot_to_sales_overall'] = round($data['hot_overall'] / $data['sales_funnel_sales_overall'][0]['unit'] * 100,2).' %';
        echo json_encode($data);
    }//public function efforts_for_sales(){

    function array_sort($array, $on, $order=SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }

    public function basic_to_special(){
        $c_name  = $this->session->balance_session['first_name'];
        $data = array();
        $current_month_date = date('Y-m').'-01';
        $basic_to_special_array = array();  
        $basic_to_special_sorted_array = array();  
        $id_array = array();
        $Total_BSP_Sold = 0;
        $Total_BSP_upgrade_Sold = 0;
        $Total_OMR_Sold = 0;
        $Total_OMR_upgrade_Sold = 0;
        $Total_active_client_Sold = 0;
        $Total_active_client_upgrade_Sold = 0;
        $Total_BSP_renew_Sold = 0;
        $Total_OMR_renew_Sold = 0;
        $Total_active_client_renew_Sold = 0;
        $Total_BSP_unconverted_Sold = 0;
        $Total_OMR_unconverted_Sold = 0;
        $Total_active_client_unconverted_Sold = 0;


        $basic_to_special = $this->mis_model->get_basic_to_special_sales($c_name);
        foreach ($basic_to_special as $key => $value) {
            if(!in_array($value['order_id'], $id_array)){
                    $id_array[]=$value['order_id'];
                    $basic_to_special_array[$value['od_email']][] = $value;
            }
        }//foreach ($basic_to_special as $key => $value) {
        $temp_val = "";
        foreach ($basic_to_special_array as $key => $value) {
            //$this->array_sort($value, 'order_id', SORT_DESC);
            $array_count = count($value);
            $new_incremented = 0;
            $omr_incremented = 0;
            $active_incremented = 0;
            if($array_count>0){
                $temp_val = "";
                $temp_val = $value[0]['order_id'];
                $temp_unconverted = $value[0]['order_type'];
                foreach ($value as $key_sort => $value_sort) {
                    if($temp_val<=$value_sort['order_id']){
                        $temp_val = $value_sort['order_id'];
                        $basic_to_special_sorted_array[$key] = $value_sort;//$array_count-1
                    }
                    
                    
                }//foreach ($value as $key_sort => $value_sort) {
                
            }
            if($array_count==1){
                if($temp_unconverted==$value_sort['order_type']){
                    if(strtolower($temp_unconverted)=='new'){
                        $new_incremented++;
                    }
                    if(strtolower($temp_unconverted)=='omr'){
                        $omr_incremented++;
                    }
                    if(strtolower($temp_unconverted)=='renewal'){
                        $active_incremented++;
                    }
                }
                if($new_incremented!=0){
                    $Total_BSP_unconverted_Sold++;
                }
                if($omr_incremented!=0){
                    $Total_OMR_unconverted_Sold++;
                }
                if($active_incremented!=0){
                    $Total_active_client_unconverted_Sold++;
                }
            }
            
            $new_incremented = 0;
            $omr_incremented = 0;
            $active_incremented = 0;
        }//foreach ($basic_to_special_array as $key => $value) {
        
        foreach ($basic_to_special_sorted_array as $key => $value) {
            if(strtolower($value['order_type'])=='new'){
                $Total_BSP_Sold++;
                if($value['renewal_flag']=='3')
                {
                    $Total_BSP_upgrade_Sold++;
                }
            }
            if(strtolower($value['order_type'])=='omr'){
                $Total_OMR_Sold++;
                if($value['renewal_flag']=='3')
                {
                    $Total_OMR_upgrade_Sold++;
                }
            }
            if(strtolower($value['order_type'])=='renewal'){
                $Total_active_client_Sold++;
                if($value['renewal_flag']=='3')
                {
                    $Total_active_client_upgrade_Sold++;
                }
            }
        }//foreach ($basic_to_special_sorted_array as $key => $value) {
        //echo '<pre>';
        $data['Total_BSP_Sold'] = $Total_BSP_Sold;
        $data['Total_OMR_Sold'] = $Total_OMR_Sold;
        $data['Total_active_client_Sold'] = $Total_active_client_Sold;

        $data['Total_BSP_upgrade_Sold'] = $Total_BSP_upgrade_Sold;
        $data['Total_OMR_upgrade_Sold'] = $Total_OMR_upgrade_Sold;
        $data['Total_active_client_upgrade_Sold'] = $Total_active_client_upgrade_Sold;

        $data['Total_BSP_per_upgrade_Sold'] =  number_format((float)$Total_BSP_upgrade_Sold / $Total_BSP_Sold * 100, 2, '.', '').'%';
        $data['Total_OMR_per_upgrade_Sold'] = number_format((float)$Total_OMR_upgrade_Sold / $Total_OMR_Sold * 100, 2, '.', '').'%';
        $data['Total_active_client_per_upgrade_Sold'] = number_format((float)$Total_active_client_upgrade_Sold / $Total_active_client_Sold * 100, 2, '.', '').'%';

        $data['Total_BSP_renew_Sold'] = $Total_BSP_renew_Sold;
        $data['Total_OMR_renew_Sold'] = $Total_OMR_renew_Sold;
        $data['Total_active_client_renew_Sold'] = $Total_active_client_renew_Sold;

        $data['Total_BSP_per_upgrade_Sold_renew'] =  number_format((float)0, 2, '.', '').'%';
        $data['Total_OMR_per_upgrade_Sold_renew'] = number_format((float)0, 2, '.', '').'%';
        $data['Total_active_client_per_upgrade_Sold_renew'] = number_format((float)0, 2, '.', '').'%';

        $data['Total_BSP_unconverted_Sold'] = $Total_BSP_unconverted_Sold;
        $data['Total_OMR_unconverted_Sold'] = $Total_OMR_unconverted_Sold;
        $data['Total_active_client_unconverted_Sold'] = $Total_active_client_unconverted_Sold;

        $data['Total_BSP_Sold_total'] = $Total_BSP_Sold+$Total_OMR_Sold+$Total_active_client_Sold;
        $data['Total_BSP_upgrade_Sold_total'] = $Total_BSP_upgrade_Sold+$Total_OMR_upgrade_Sold+$Total_active_client_upgrade_Sold;
        $data['Total_BSP_per_upgrade_Sold_total'] = $data['Total_BSP_per_upgrade_Sold']+$data['Total_OMR_per_upgrade_Sold']+$data['Total_active_client_per_upgrade_Sold'].'%';
        $data['Total_BSP_renew_Sold_total'] = $Total_BSP_renew_Sold+$Total_OMR_renew_Sold+$Total_active_client_renew_Sold;
        $data['Total_BSP_per_upgrade_Sold_renew_total'] = $data['Total_BSP_per_upgrade_Sold_renew']+$data['Total_OMR_per_upgrade_Sold_renew']+$data['Total_active_client_per_upgrade_Sold_renew'].'%';
        $data['Total_BSP_unconverted_Sold_total'] = $Total_BSP_unconverted_Sold+$Total_OMR_unconverted_Sold+$Total_active_client_unconverted_Sold;
        
        echo json_encode($data);

    }//public function efforts_for_sales(){

    public function stage_phase_conversion(){
        error_reporting(0);
        //$years = '2021';
        $c_name  = $this->session->balance_session['first_name'];
        if(strtolower($c_name)=='vishal'){
            if(isset($_POST['counsellor_name'])){
                $c_name  = $_POST['counsellor_name'];
            }else{
                $c_name = false;
            }
            
        }
        if(isset($_POST['years'])){
            if(intval($_POST['years'])!=0){
                $years = $_POST['years'];
            }else{
                $years = '2021';
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = '2021';
        }
        $data = array();
        $stage_phase_conversion = $this->mis_model->get_stage_phase_conversion($years, $c_name);
        $current_Year_date = date('Y-m').'-01';
        $phase1 = 0;
        $phase2 = 0;
        $phase3 = 0;
        $phase4 = 0;
        $stage1 = 0;
        $stage2= 0;
        $stage3 = 0;
        $stage4 = 0;
        $total_sales_stage1 = 0;
        $total_sales_stage2 = 0;
        $total_sales_stage3 = 0;
        $total_sales_stage4 = 0;
        $total_sales_phase1 = 0;
        $total_sales_phase2 = 0;
        $total_sales_phase3 = 0;
        $total_sales_phase4 = 0;
        $month = array();
        $health_score = array('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score');
        /*echo '<pre>';
        print_r($stage_phase_conversion);die;*/

        foreach ($stage_phase_conversion as $key => $value) {
            if($years!=date('Y')){
                $current_month = '12';
            }else{
                $current_month = date('n');
            }
            
            for ($i=1; $i <= $current_month; $i++) { 
                $order_date = strtotime($value["order_date"]);
                $assign_date = strtotime($value["assign_date"]);
                $start_date = strtotime($years.'-'.$i.'-01');
                $end_date = strtotime($years.'-'.$i.'-31');
                //echo $years.$i.'<br>';
                
                if($start_date<=$order_date && $end_date>=$order_date){
                    if(in_array($value['enquiry_from'], $health_score)){
                        if($value["stage"]==4){
                            $month[$years.'-'.$i]['stage4'] = $month[$years.'-'.$i]['stage4']+1;
                            $month[$years.'-'.$i]['name_s4'][$value["assign_to"]] = $month[$years.'-'.$i]['name_s4'][$value["assign_to"]]+1;
                        }elseif($value["stage"]==3){
                            $month[$years.'-'.$i]['stage3'] = $month[$years.'-'.$i]['stage3']+1;
                            $month[$years.'-'.$i]['name_s3'][$value["assign_to"]] = $month[$years.'-'.$i]['name_s3'][$value["assign_to"]]+1;
                        }elseif($value["stage"]==2){
                            $month[$years.'-'.$i]['stage2'] = $month[$years.'-'.$i]['stage2']+1;
                            $month[$years.'-'.$i]['name_s2'][$value["assign_to"]] = $month[$years.'-'.$i]['name_s2'][$value["assign_to"]]+1;
                        }elseif($value["stage"]==1){
                            $month[$years.'-'.$i]['stage1'] = $month[$years.'-'.$i]['stage1']+1;
                            $month[$years.'-'.$i]['name_s1'][$value["assign_to"]] = $month[$years.'-'.$i]['name_s1'][$value["assign_to"]]+1;
                        }
                    }//if(in_array($value['enquiry_from'], $health_score)){

                    if($value["phase"]==4){
                        $month[$years.'-'.$i]['phase4'] = $month[$years.'-'.$i]['phase4']+1;
                        $month[$years.'-'.$i]['name_p4'][$value["assign_to"]] = $month[$years.'-'.$i]['name_p4'][$value["assign_to"]]+1;
                    }
                    if($value["phase"]==3){
                        $month[$years.'-'.$i]['phase3'] = $month[$years.'-'.$i]['phase3']+1;
                        $month[$years.'-'.$i]['name_p3'][$value["assign_to"]] = $month[$years.'-'.$i]['name_p3'][$value["assign_to"]]+1;
                    }
                    if($value["phase"]==2){
                        $month[$years.'-'.$i]['phase2'] = $month[$years.'-'.$i]['phase2']+1;
                        $month[$years.'-'.$i]['name_p2'][$value["assign_to"]] = $month[$years.'-'.$i]['name_p2'][$value["assign_to"]]+1;
                    }
                    if($value["phase"]==1){
                        $month[$years.'-'.$i]['phase1'] = $month[$years.'-'.$i]['phase1']+1;
                        $month[$years.'-'.$i]['name_p1'][$value["assign_to"]] = $month[$years.'-'.$i]['name_p1'][$value["assign_to"]]+1;
                    }
                    
                }// //if($start_date<=$order_date && $end_date>=$order_date){
                if($start_date<=$assign_date && $end_date>=$assign_date){
                    if(in_array($value['enquiry_from'], $health_score)){
                        if($value["stage"]==4){
                            $month[$years.'-'.$i]['total_stage4'] = $month[$years.'-'.$i]['total_stage4']+1;
                            $month[$years.'-'.$i]['total_name_s4'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_s4'][$value["assign_to"]]+1;

                        }elseif($value["stage"]==3){
                            $month[$years.'-'.$i]['total_stage3'] = $month[$years.'-'.$i]['total_stage3']+1;
                            $month[$years.'-'.$i]['total_name_s3'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_s3'][$value["assign_to"]]+1;
                        }elseif($value["stage"]==2){
                            $month[$years.'-'.$i]['total_stage2'] = $month[$years.'-'.$i]['total_stage2']+1;
                            $month[$years.'-'.$i]['total_name_s2'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_s2'][$value["assign_to"]]+1;
                        }elseif($value["stage"]==1){
                            $month[$years.'-'.$i]['total_stage1'] = $month[$years.'-'.$i]['total_stage1']+1;
                            $month[$years.'-'.$i]['total_name_s1'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_s1'][$value["assign_to"]]+1;
                        }
                    }
                    if($value["phase"]==4){
                        $month[$years.'-'.$i]['total_phase4'] = $month[$years.'-'.$i]['total_phase4']+1;
                        $month[$years.'-'.$i]['total_name_p4'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_p4'][$value["assign_to"]]+1;
                    }
                    if($value["phase"]==3){
                        $month[$years.'-'.$i]['total_phase3'] = $month[$years.'-'.$i]['total_phase3']+1;
                        $month[$years.'-'.$i]['total_name_p3'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_p3'][$value["assign_to"]]+1;
                    }
                    if($value["phase"]==2){
                        $month[$years.'-'.$i]['total_phase2'] = $month[$years.'-'.$i]['total_phase2']+1;
                        $month[$years.'-'.$i]['total_name_p2'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_p2'][$value["assign_to"]]+1;
                    }
                    if($value["phase"]==1){
                        $month[$years.'-'.$i]['total_phase1'] = $month[$years.'-'.$i]['total_phase1']+1;
                        $month[$years.'-'.$i]['total_name_p1'][$value["assign_to"]] = $month[$years.'-'.$i]['total_name_p1'][$value["assign_to"]]+1;
                    }
                }//if($start_date<=$assign_date && $end_date>=$assign_date){
               
            }
            
                 
        }//foreach ($stage_phase_conversion as $key => $value) {
        krsort($month);
        /*echo '<pre>';
        print_r($month);die;*/
        $c_name  = $this->session->balance_session['first_name'];
        $html_stage = "";
        $html_phase = "";
        $html_stage = '<tr>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;"  rowspan="2">Month</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Stage 1</th>
                    
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Stage 2</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Stage 3</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px" colspan="3">Stage 4</th>
                </tr>
                <tr>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Percentage %</th>
                </tr>
                ';
        $html_phase = '<tr>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;"  rowspan="2">Month</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Phase 1</th>
                    
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Phase 2</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Phase 3</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px" colspan="3">Phase 4</th>
                </tr>
                <tr>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Total Assign</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                    <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Percentage %</th>
                </tr>';

        if(count($month)>0){
            foreach ($month as $key => $value) {
                /*echo '<pre>';
                print_r($value);
                die;*/
                $month_to_string = explode('-', $key);
                $monthName = date("F", mktime(null, null, null, $month_to_string[1]));

                if(isset($value['stage1'])){ $stage1 =  $value['stage1'];}else{ $stage1 =  '0'; }
                if(isset($value['stage2'])){ $stage2 =  $value['stage2'];}else{ $stage2 =  '0'; } 
                if(isset($value['stage3'])){ $stage3 =  $value['stage3'];}else{ $stage3 =  '0'; }
                if(isset($value['stage4'])){ $stage4 =  $value['stage4'];}else{ $stage4 =  '0'; }

                if(isset($value['total_stage1'])){ $total_stage1 =  $value['total_stage1'];}else{ $total_stage1 =  '0'; }
                if(isset($value['total_stage2'])){ $total_stage2 =  $value['total_stage2'];}else{ $total_stage2 =  '0'; } 
                if(isset($value['total_stage3'])){ $total_stage3 =  $value['total_stage3'];}else{ $total_stage3 =  '0'; }
                if(isset($value['total_stage4'])){ $total_stage4 =  $value['total_stage4'];}else{ $total_stage4 =  '0'; }
                $stage1_per = number_format((float)$stage1/$total_stage1*100, 2, '.', '').'%';
                $stage2_per = number_format((float)$stage2/$total_stage2*100, 2, '.', '').'%';
                $stage3_per = number_format((float)$stage3/$total_stage3*100, 2, '.', '').'%';
                $stage4_per = number_format((float)$stage4/$total_stage4*100, 2, '.', '').'%';

                if(isset($value['phase1'])){ $phase1 =  $value['phase1'];}else{ $phase1 =  '0'; }
                if(isset($value['phase2'])){ $phase2 =  $value['phase2'];}else{ $phase2 =  '0'; } 
                if(isset($value['phase3'])){ $phase3 =  $value['phase3'];}else{ $phase3 =  '0'; }
                if(isset($value['phase4'])){ $phase4 =  $value['phase4'];}else{ $phase4 =  '0'; }
                if(isset($value['total_phase1'])){ $total_phase1 =  $value['total_phase1'];}else{ $total_phase1 =  '0'; }
                if(isset($value['total_phase2'])){ $total_phase2 =  $value['total_phase2'];}else{ $total_phase2 =  '0'; } 
                if(isset($value['total_phase3'])){ $total_phase3 =  $value['total_phase3'];}else{ $total_phase3 =  '0'; }
                if(isset($value['total_phase4'])){ $total_phase4 =  $value['total_phase4'];}else{ $total_phase4 =  '0'; }
                $phase1_per = number_format((float)$phase1/$total_phase1*100, 2, '.', '').'%';
                if($phase1_per=='nan%'){
                    $phase1_per='0.00%';
                }
                $phase2_per = number_format((float)$phase2/$total_phase2*100, 2, '.', '').'%';
                if($phase2_per=='nan%'){
                    $phase2_per="0.00%";
                }
                $phase3_per = number_format((float)$phase3/$total_phase3*100, 2, '.', '').'%';
                if($phase3_per=='nan%'){
                    $phase3_per="0.00%";
                }
                $phase4_per = number_format((float)$phase4/$total_phase4*100, 2, '.', '').'%';
                if($phase4_per=='nan%'){
                    $phase4_per="0.00%";
                }
                $tolltip_html_stage1 = '';
                $tolltip_html_stage1_sale = '';
                $tolltip_html_stage2 = '';
                $tolltip_html_stage2_sale = '';
                $tolltip_html_stage3 = '';
                $tolltip_html_stage3_sale = '';
                $tolltip_html_stage4_sale = '';
                $tolltip_html_stage4 = '';
                $tolltip_html_phase1 = '';
                $tolltip_html_phase1_sale = '';
                $tolltip_html_phase2 = '';
                $tolltip_html_phase2_sale = '';
                $tolltip_html_phase3 = '';
                $tolltip_html_phase3_sale = '';
                $tolltip_html_phase4_sale = '';
                $tolltip_html_phase4 = '';
                if(strtolower($c_name)=='vishal'){
                    if(count($value['total_name_s1'])>0){
                        $tolltip_html_stage1 .= '<div class="tooltip">'.$total_stage1.'<span class="tooltiptext">';
                        foreach ($value['total_name_s1'] as $total_name_s1_key => $total_name_s1_value) {
                            $tolltip_html_stage1 .= ucwords($total_name_s1_key).' : <div class="sub_text_count"> '.$total_name_s1_value.'</div><br>';
                        }
                        $tolltip_html_stage1 .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage1 = '0';
                    }
                    
                    if(count($value['name_s1'])>0){
                        $tolltip_html_stage1_sale .= '<div class="tooltip">'.$stage1.'<span class="tooltiptext">';
                        foreach ($value['name_s1'] as $total_name_s1_key => $total_name_s1_value) {
                            $tolltip_html_stage1_sale .= ucwords($total_name_s1_key).' : <div class="sub_text_count"> '.$total_name_s1_value.'</div><br>';
                        }
                        $tolltip_html_stage1_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage1_sale = '0';
                    }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_name_s2'])>0){
                        $tolltip_html_stage2 .= '<div class="tooltip">'.$total_stage2.'<span class="tooltiptext">';
                        foreach ($value['total_name_s2'] as $total_name_s2_key => $total_name_s2_value) {
                            $tolltip_html_stage2 .= ucwords($total_name_s2_key).' : <div class="sub_text_count"> '.$total_name_s2_value.'</div><br>';
                        }
                        $tolltip_html_stage2 .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage2 = '0';
                    }
                    if(count($value['name_s2'])>0){
                        $tolltip_html_stage2_sale .= '<div class="tooltip">'.$stage2.'<span class="tooltiptext">';
                        foreach ($value['name_s2'] as $total_name_s2_key => $total_name_s2_value) {
                            $tolltip_html_stage2_sale .= ucwords($total_name_s2_key).' : <div class="sub_text_count"> '.$total_name_s2_value.'</div><br>';
                        }
                        $tolltip_html_stage2_sale .= '</span></div>';
                    }else{
                        $tolltip_html_stage2_sale = '0';
                    } 
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_name_s3'])>0){
                            $tolltip_html_stage3 .= '<div class="tooltip">'.$total_stage3.'<span class="tooltiptext">';
                        foreach ($value['total_name_s3'] as $total_name_s3_key => $total_name_s3_value) {
                            $tolltip_html_stage3 .= ucwords($total_name_s3_key).' : <div class="sub_text_count"> '.$total_name_s3_value.'</div><br>';
                        }
                        $tolltip_html_stage3 .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage3 = '0';
                    } 
                    if(count($value['name_s3'])>0){
                        $tolltip_html_stage3_sale .= '<div class="tooltip">'.$stage3.'<span class="tooltiptext">';
                        foreach ($value['name_s3'] as $total_name_s3_key => $total_name_s3_value) {
                            $tolltip_html_stage3_sale .= ucwords($total_name_s3_key).' : <div class="sub_text_count"> '.$total_name_s3_value.'</div><br>';
                        }
                        $tolltip_html_stage3_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage3_sale = '0';
                    } 
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_name_s4'])>0){
                        $tolltip_html_stage4 .= '<div class="tooltip">'.$total_stage4.'<span class="tooltiptext">';
                        foreach ($value['total_name_s4'] as $total_name_s4_key => $total_name_s4_value) {
                            $tolltip_html_stage4 .= ucwords($total_name_s4_key).' : <div class="sub_text_count"> '.$total_name_s4_value.'</div><br>';
                        }
                        $tolltip_html_stage4 .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage4 = '0';
                    }
                    if(count($value['name_s4'])>0){
                        $tolltip_html_stage4_sale .= '<div class="tooltip">'.$stage4.'<span class="tooltiptext">';
                        foreach ($value['name_s4'] as $total_name_s4_key => $total_name_s4_value) {
                            $tolltip_html_stage4_sale .= ucwords($total_name_s4_key).' : <div class="sub_text_count"> '.$total_name_s4_value.'</div><br>';
                        }
                        $tolltip_html_stage4_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_stage4_sale = '0';
                    }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                    if(count($value['total_name_p1'])>0){
                        $tolltip_html_phase1 .= '<div class="tooltip">'.$total_phase1.'<span class="tooltiptext">';
                        foreach ($value['total_name_p1'] as $total_name_p1_key => $total_name_p1_value) {
                            $tolltip_html_phase1 .= ucwords($total_name_p1_key).' : <div class="sub_text_count"> '.$total_name_p1_value.'</div><br>';
                        }
                        $tolltip_html_phase1 .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase1 = '0';
                    }
                    
                    if(count($value['name_p1'])>0){
                        $tolltip_html_phase1_sale .= '<div class="tooltip">'.$phase1.'<span class="tooltiptext">';
                        foreach ($value['name_p1'] as $total_name_p1_key => $total_name_p1_value) {
                            $tolltip_html_phase1_sale .= ucwords($total_name_p1_key).' : <div class="sub_text_count"> '.$total_name_p1_value.'</div><br>';
                        }
                        $tolltip_html_phase1_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase1_sale = '0';
                    }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_name_p2'])>0){
                        $tolltip_html_phase2 .= '<div class="tooltip">'.$total_phase2.'<span class="tooltiptext">';
                        foreach ($value['total_name_p2'] as $total_name_p2_key => $total_name_p2_value) {
                            $tolltip_html_phase2 .= ucwords($total_name_p2_key).' : <div class="sub_text_count"> '.$total_name_p2_value.'</div><br>';
                        }
                        $tolltip_html_phase2 .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase2 = '0';
                    }
                    if(count($value['name_p2'])>0){
                        $tolltip_html_phase2_sale .= '<div class="tooltip">'.$phase2.'<span class="tooltiptext">';
                        foreach ($value['name_p2'] as $total_name_p2_key => $total_name_p2_value) {
                            $tolltip_html_phase2_sale .= ucwords($total_name_p2_key).' : <div class="sub_text_count"> '.$total_name_p2_value.'</div><br>';
                        }
                        $tolltip_html_phase2_sale .= '</span></div>';
                    }else{
                        $tolltip_html_phase2_sale = '0';
                    } 
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_name_p3'])>0){
                            $tolltip_html_phase3 .= '<div class="tooltip">'.$total_phase3.'<span class="tooltiptext">';
                        foreach ($value['total_name_p3'] as $total_name_p3_key => $total_name_p3_value) {
                            $tolltip_html_phase3 .= ucwords($total_name_p3_key).' : <div class="sub_text_count"> '.$total_name_p3_value.'</div><br>';
                        }
                        $tolltip_html_phase3 .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase3 = '0';
                    } 
                    if(count($value['name_p3'])>0){
                        $tolltip_html_phase3_sale .= '<div class="tooltip">'.$phase3.'<span class="tooltiptext">';
                        foreach ($value['name_p3'] as $total_name_p3_key => $total_name_p3_value) {
                            $tolltip_html_phase3_sale .= ucwords($total_name_p3_key).' : <div class="sub_text_count"> '.$total_name_p3_value.'</div><br>';
                        }
                        $tolltip_html_phase3_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase3_sale = '0';
                    } 
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_name_p4'])>0){
                        $tolltip_html_phase4 .= '<div class="tooltip">'.$total_phase4.'<span class="tooltiptext">';
                        foreach ($value['total_name_p4'] as $total_name_p4_key => $total_name_p4_value) {
                            $tolltip_html_phase4 .= ucwords($total_name_p4_key).' : <div class="sub_text_count"> '.$total_name_p4_value.'</div><br>';
                        }
                        $tolltip_html_phase4 .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase4 = '0';
                    }
                    if(count($value['name_p4'])>0){
                        $tolltip_html_phase4_sale .= '<div class="tooltip">'.$phase4.'<span class="tooltiptext">';
                        foreach ($value['name_p4'] as $total_name_p4_key => $total_name_p4_value) {
                            $tolltip_html_phase4_sale .= ucwords($total_name_p4_key).' : <div class="sub_text_count"> '.$total_name_p4_value.'</div><br>';
                        }
                        $tolltip_html_phase4_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_phase4_sale = '0';
                    }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $html_stage .= '<tr>
                                <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage1.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage1_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage1_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage2.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage2_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage2_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage3.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage3_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage3_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage4.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_stage4_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage4_per.'</th>
                            </tr>';
                    $html_phase .= '<tr>
                                <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase1.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase1_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase1_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase2.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase2_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase2_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase3.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase3_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase3_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase4.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_phase4_sale.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase4_per.'</th>
                            </tr>';
                }else{
                    $html_stage .= '<tr>
                                <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_stage1.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$stage1.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage1_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_stage2.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$stage2.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage2_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_stage3.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$stage3.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage3_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_stage4.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$stage4.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$stage4_per.'</th>
                            </tr>';
                    $html_phase .= '<tr>
                                <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_phase1.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$phase1.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase1_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_phase2.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$phase2.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase2_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_phase3.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$phase3.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase3_per.'</th>

                                <th scope="row" style="text-align: center;font-size: 12px">'.$total_phase4.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px">'.$phase4.'</th>
                                <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$phase4_per.'</th>
                            </tr>';    
                }
                
            }
        }else{
            $html_stage .= '<tr colspan="5"> No Record Found! </tr>';
            $html_phase .= '<tr colspan="5"> No Record Found! </tr>';
        }
        
        $data['stage'] = $html_stage;
        $data['phase'] = $html_phase;
        echo json_encode($data);
    }//public function stage_phase_conversion(){


    public function source_wise_conversion(){
        error_reporting(0);
        //$years = '2021';
        $c_name  = $this->session->balance_session['first_name'];
        if(strtolower($c_name)=='vishal'){
            if(isset($_POST['counsellor_name'])){
                $c_name  = $_POST['counsellor_name'];
            }else{
                $c_name = false;
            }
            
        }
        if(isset($_POST['years'])){
            if(intval($_POST['years'])!=0){
                $years = $_POST['years'];
            }else{
                $years = '2021';
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = '2021';
        }
        $data = array();
        $data_store_arr = array();
        //$source_name = $this->mis_model->get_source_name();
        $stage_phase_conversion = $this->mis_model->get_source_wise_conversion($years, $c_name);

        $current_Year_date = date('Y-m').'-01';
        $prime_source = 0;
        $social_media = 0;
        $web = 0;
        $health_score = 0;
        $paid_adds = 0;
        $Registration= 0;
        $other = 0;
        $month = array();
        foreach ($stage_phase_conversion as $key => $value) {
            if($years!=date('Y')){
                $current_month = '12';
            }else{
                $current_month = date('n');
            }
            
            for ($i=1; $i <= $current_month; $i++) { 
                $order_date = strtotime($value["order_date"]);
                $assign_date = strtotime($value["assign_date"]);
                $start_date = strtotime($years.'-'.$i.'-01');
                $end_date = strtotime($years.'-'.$i.'-31');
                if($start_date<=$order_date && $end_date>=$order_date){

                    if($value["source_group"]==1){
                        $month[$years.'-'.$i]['prime_source'][] = $value;
                    }elseif($value["source_group"]==2){
                        $month[$years.'-'.$i]['social_media'][] = $value;
                    }elseif($value["source_group"]==3){
                        $month[$years.'-'.$i]['health_score'][] = $value;
                    }elseif($value["source_group"]==4){
                        $month[$years.'-'.$i]['paid_adds'][] = $value;
                    }elseif($value["source_group"]==5 || $value["source_group"]==''){
                        $month[$years.'-'.$i]['other'][] = $value;
                    }elseif($value["source_group"]==6){
                        $month[$years.'-'.$i]['web'][] = $value;
                    }elseif($value["source_group"]==7){
                        $month[$years.'-'.$i]['Referral'][] = $value;
                    }elseif($value["source_group"]==8){
                        $month[$years.'-'.$i]['Registration'][] = $value;
                    }
                    
                }// //if($start_date<=$order_date && $end_date>=$order_date){
                if($start_date<=$assign_date && $end_date>=$assign_date){
                    if($value["source_group"]==1){
                        $month[$years.'-'.$i]['prime_source_total'][] = $value;
                    }elseif($value["source_group"]==2){
                        $month[$years.'-'.$i]['social_media_total'][] = $value;
                    }elseif($value["source_group"]==3){
                        $month[$years.'-'.$i]['health_score_total'][] = $value;
                    }elseif($value["source_group"]==4){
                        $month[$years.'-'.$i]['paid_adds_total'][] = $value;
                    }elseif($value["source_group"]==5 || $value["source_group"]==''){
                        $month[$years.'-'.$i]['other_total'][] = $value;
                    }elseif($value["source_group"]==6){
                        $month[$years.'-'.$i]['web_total'][] = $value;
                    }elseif($value["source_group"]==7){
                        $month[$years.'-'.$i]['Referral_total'][] = $value;
                    }elseif($value["source_group"]==8){
                        $month[$years.'-'.$i]['Registration_total'][] = $value;
                    }
                }
            }
                 
        }//foreach ($stage_phase_conversion as $key => $value) {
        
        krsort($month);
        /*echo '<pre>';
        Social Media (Facebook,Instagram,LinkId,Twitter)
        print_r($month);die;*/
        $html_stage = "";
        $html_stage = '<thead>
                            <tr>
                                <th style="">Months / Source</th>
                                <th class="text-center">
                                    <a href="javascript:void(0)" ><div class="tooltip">Prime Source <span class="tooltiptext1">Phone Enquiry <br> Walk-in <br> Whatsapp <br>Zopim </div></span></div></a>
                                </th>
                                <th class="text-center">
                                    <a href="javascript:void(0)" ><div class="tooltip">Social Media <span class="tooltiptext1">Facebook <br>Instagram <br>LinkId<br>Twitter </div></span></div></a>
                                </th>
                                <th class="text-center">
                                    <a href="javascript:void(0)" ><div class="tooltip">Health Score <span class="tooltiptext1">Web & App</div></span></div></a>
                                </th>
                                <th class="text-center">
                                    <a href="javascript:void(0)" ><div class="tooltip">Paid Adds <span class="tooltiptext1">Google <br>Facebook</div></span></div></a>
                                </th>

                                <th class="text-center">Other</th>
                                <th class="text-center"><a href="javascript:void(0)" ><div class="tooltip">Web <span class="tooltiptext1">Blog Popup <br> Contact Form <br>Footer Enquiry <br> Recipe Popup</div></span></div></a></th>

                                <th class="text-center">Referral</th>
                                <th class="text-center">Registration</th>Registration
                            </tr>
                        </thead>
                        <tbody style="overflow: scroll; ">';
        $source_array = array();
        if(count($month)>0){

            foreach ($month as $key => $value) {
                $month_to_string = explode('-', $key);
                $monthName = date("F", mktime(null, null, null, $month_to_string[1]));

                
                
                foreach ($value as $key_source => $value_source) {
                    $source_array[$key_source]['cnt'] = count($value_source);
                    foreach ($value_source as $key_sum_amount => $value_sum_amount) {
                        $source_array[$key_source]['amt'] = $source_array[$key_source]['amt'] + $value_sum_amount['amt'];
                    }//foreach ($value_source as $key_sum_amount => $value_sum_amount) {
                }//foreach ($value as $key_source => $value_source) {

                $html_stage .= '<tr><th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>';
                if(array_key_exists('prime_source',$source_array)){
                    $percent_prime_source = number_format((float)$source_array['prime_source']['cnt'] / $source_array["prime_source_total"]['cnt'] * 100, 2, '.', '').'%';

                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_prime_source . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["prime_source"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["prime_source_total"]['cnt'].'</div></span></div></a></td>';

                    $source_array['prime_source']['amt'] = 0;
                    $source_array["prime_source"]['cnt'] = 0;
                    $source_array['prime_source_total']['amt'] = 0;
                    $source_array["prime_source_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('social_media',$source_array)){
                    $percent_social_media = number_format((float)$source_array['social_media']['cnt'] / $source_array["social_media_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_social_media . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["social_media"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["social_media_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['social_media']['amt'] = 0;
                    $source_array["social_media"]['cnt'] = 0;
                    $source_array['social_media_total']['amt'] = 0;
                    $source_array["social_media_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('health_score',$source_array)){
                    $percent_health_score = number_format((float)$source_array['health_score']['cnt'] / $source_array["health_score_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_health_score . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["health_score"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["health_score_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['health_score']['amt'] = 0;
                    $source_array["health_score"]['cnt'] = 0;
                    $source_array['health_score_total']['amt'] = 0;
                    $source_array["health_score_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('paid_adds',$source_array)){
                    $percent_paid_adds = number_format((float)$source_array['paid_adds']['cnt'] / $source_array["paid_adds_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_paid_adds . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["paid_adds"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["paid_adds_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['paid_adds']['amt'] = 0;
                    $source_array["paid_adds"]['cnt'] = 0;
                    $source_array['paid_adds_total']['amt'] = 0;
                    $source_array["paid_adds_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('other',$source_array)){
                    $percent_other = number_format((float)$source_array['other']['cnt'] / $source_array["other_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_other . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["other"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["other_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['other']['amt'] = 0;
                    $source_array["other"]['cnt'] = 0;
                    $source_array['other_total']['amt'] = 0;
                    $source_array["other_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('web',$source_array)){
                    $percent_web = number_format((float)$source_array['web']['cnt'] / $source_array["web_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_web . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["web"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["web_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['web']['amt'] = 0;
                    $source_array["web"]['cnt'] = 0;
                    $source_array['web_total']['amt'] = 0;
                    $source_array["web_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('Referral',$source_array)){
                    $percent_Referral = number_format((float)$source_array['Referral']['cnt'] / $source_array["Referral_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_Referral . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["Referral"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["Referral_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['Referral']['amt'] = 0;
                    $source_array["Referral"]['cnt'] = 0;
                    $source_array['Referral_total']['amt'] = 0;
                    $source_array["Referral_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                if(array_key_exists('Registration',$source_array)){
                    $percent_Registration = number_format((float)$source_array['Registration']['cnt'] / $source_array["Registration_total"]['cnt'] * 100, 2, '.', '').'%';
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_Registration . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.$source_array["Registration"]['cnt'].'</div><br/>Total Lead : <div class="sub_text_count"> '.$source_array["Registration_total"]['cnt'].'</div></span></div></a></td>';
                    $source_array['Registration']['amt'] = 0;
                    $source_array["Registration"]['cnt'] = 0;
                    $source_array['Registration_total']['amt'] = 0;
                    $source_array["Registration_total"]['cnt'] = 0;
                }else{
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                }
                $html_stage .= '</tr>';
                    
                
            }//foreach ($month as $key => $value) {
        }else{
            $html_stage .= '<tr colspan="5"> No Record Found! </tr>';
        }//if(count($month)>0){
        
        echo json_encode($html_stage);
    }//public function source_wise_conversion(){

    public function lead_analytics(){
        error_reporting(0);
        //$years = '2021';
        $c_name  = $this->session->balance_session['first_name'];
        if(strtolower($c_name)=='vishal'){
            $c_name = false;
        }
        if(isset($_POST['years'])){
            if(intval($_POST['years'])!=0){
                $years = $_POST['years'];
            }else{
                $years = '2021';
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = '2021';
        }
        //new & olr leads available
        $new_lead_stage1 = $new_lead_stage2 = $new_lead_stage3 = $new_lead_stage4 = 0;
        $olr_lead_stage1 = $olr_lead_stage2 = $olr_lead_stage3 = $olr_lead_stage4 = 0;
        
        $data['new_lead_stage4'] = $data['new_lead_stage3'] = $data['new_lead_stage2'] =  $data['new_lead_stage1'] = 0;
        
        $lead_count = $this->mis_model->get_lead_capture_stagewise_count_query($years,$c_name);
        $month = array();
        foreach($lead_count['new_lead'] as $val){
            if($years!=date('Y')){
                $current_month = '12';
            }else{
                $current_month = date('n');
            }
            for ($i=1; $i <= $current_month; $i++) { 
                $lead_date = strtotime($val["lead_date"]);
                $start_date = strtotime($years.'-'.$i.'-01');
                $end_date = strtotime($years.'-'.$i.'-31');
                if($start_date<=$lead_date && $end_date>=$lead_date){
                    if($val['stage']=='1'){
                         $new_lead_stage1++;
                         $month[$years.'-'.$i]['new_lead_stage1'] = $month[$years.'-'.$i]['new_lead_stage1']+1;
                    }elseif($val['stage']=='2'){
                        $new_lead_stage2++;
                        $month[$years.'-'.$i]['new_lead_stage2'] = $month[$years.'-'.$i]['new_lead_stage2']+1;
                    }elseif($val['stage']=='3'){
                        $new_lead_stage3++;
                        $month[$years.'-'.$i]['new_lead_stage3'] = $month[$years.'-'.$i]['new_lead_stage3']+1;
                    }elseif($val['stage']=='4'){
                        $new_lead_stage4++;
                        $month[$years.'-'.$i]['new_lead_stage4'] = $month[$years.'-'.$i]['new_lead_stage4']+1;
                    }//if($val['stage']=='1'){
                    
                }// //if($start_date<=$order_date && $end_date>=$order_date){
                
            }
            //echo $val['stage']."<br>";
            
        }
        
        $data['olr_lead_stage4'] = $data['olr_lead_stage3'] = $data['olr_lead_stage2'] =  $data['olr_lead_stage1'] = 0;
                 
        foreach($lead_count['olr'] as $val){
            if($years!=date('Y')){
                $current_month = '12';
            }else{
                $current_month = date('n');
            }
            for ($i=1; $i <= $current_month; $i++) { 
                $lead_date = strtotime($val["lead_date"]);
                $start_date = strtotime($years.'-'.$i.'-01');
                $end_date = strtotime($years.'-'.$i.'-31');
                if($start_date<=$lead_date && $end_date>=$lead_date){
                    if($val['stage']=='1'){
                         $new_lead_stage1++;
                         $month[$years.'-'.$i]['olr_lead_stage1'] = $month[$years.'-'.$i]['olr_lead_stage1']+1;
                    }elseif($val['stage']=='2'){
                        $new_lead_stage2++;
                        $month[$years.'-'.$i]['olr_lead_stage2'] = $month[$years.'-'.$i]['olr_lead_stage2']+1;
                    }elseif($val['stage']=='3'){
                        $new_lead_stage3++;
                        $month[$years.'-'.$i]['olr_lead_stage3'] = $month[$years.'-'.$i]['olr_lead_stage3']+1;
                    }elseif($val['stage']=='4'){
                        $new_lead_stage4++;
                        $month[$years.'-'.$i]['olr_lead_stage4'] = $month[$years.'-'.$i]['olr_lead_stage4']+1;
                    }//if($val['stage']=='1'){
                    
                }// //if($start_date<=$order_date && $end_date>=$order_date){
            }
            
        }
        krsort($month);
        echo '<pre>';
        print_r($month);
        die;
        /*$data['olr_lead_stage1'] = $olr_lead_stage1++;
        $data['olr_lead_stage2'] = $olr_lead_stage2++;
        $data['olr_lead_stage3'] = $olr_lead_stage3++;
        $data['olr_lead_stage4'] = $olr_lead_stage4++;*/
        echo json_encode($data);
        
    }//lead_analytics

    public function medical_bucket(){
        $data = array();
        $PCOS = 0;
        $Thyroid = 0;
        $Cholestrol = 0;
        $Diabetes = 0;
        $oth = 0;
        $Overweight= 0;
        $very_overweight = 0;
        $Obese = 0;

        $medical_bucket_conversion = $this->mis_model->get_medical_bucket_conversion();

        foreach ($medical_bucket_conversion as $key => $value) {
            /*if($value['key_insight']){

            }*/
            if (strpos(strtolower($value['medical_issue']), 'pcos') !== false || strpos(strtolower($value['key_insight']), 'pcos') !== false || strpos(strtolower($value['fu_other_note']), 'pcos') !== false || strpos(strtolower($value['fu_other_note']), 'pcos') !== false || strpos(strtolower($value['health_category']), 'pcos') !== false) {
                $PCOS++;
            }
            if (strpos(strtolower($value['medical_issue']), 'thyroid') !== false || strpos(strtolower($value['key_insight']), 'thyroid') !== false || strpos(strtolower($value['fu_other_note']), 'thyroid') !== false || strpos(strtolower($value['fu_other_note']), 'thyroid') !== false || strpos(strtolower($value['health_category']), 'thyroid') !== false) {
                $Thyroid++;
            }
            if (strpos(strtolower($value['medical_issue']), 'cholestrol') !== false || strpos(strtolower($value['key_insight']), 'cholestrol') !== false || strpos(strtolower($value['fu_other_note']), 'cholestrol') !== false || strpos(strtolower($value['fu_other_note']), 'cholestrol') !== false || strpos(strtolower($value['health_category']), 'cholestrol') !== false) {
                $Cholestrol++;
            }
            if (strpos(strtolower($value['medical_issue']), 'diabetes') !== false || strpos(strtolower($value['key_insight']), 'diabetes') !== false || strpos(strtolower($value['fu_other_note']), 'diabetes') !== false || strpos(strtolower($value['fu_other_note']), 'diabetes') !== false || strpos(strtolower($value['health_category']), 'diabetes') !== false) {
                $Diabetes++;
            }
            if($value['medical_issue']!=""){
                if (strpos(strtolower($value['medical_issue']), 'diabetes') !== true || strpos(strtolower($value['medical_issue']), 'cholesterol') !== true || strpos(strtolower($value['medical_issue']), 'thyroid') !== true || strpos(strtolower($value['medical_issue']), 'pcos') !== true) {
                    $oth++;
                }
            }
            
            if (strpos(strtolower($value['medical_issue']), 'overweight') !== false || strpos(strtolower($value['key_insight']), 'overweight') !== false || strpos(strtolower($value['fu_other_note']), 'overweight') !== false || strpos(strtolower($value['fu_other_note']), 'overweight') !== false || strpos(strtolower($value['health_category']), 'overweight') !== false || strpos(strtolower($value['medical_issue']), 'over weight') !== false || strpos(strtolower($value['key_insight']), 'over weight') !== false || strpos(strtolower($value['fu_other_note']), 'over weight') !== false || strpos(strtolower($value['fu_other_note']), 'over weight') !== false || strpos(strtolower($value['health_category']), 'over weight') !== false ) {
                $Overweight++;
            }
            if (strpos(strtolower($value['medical_issue']), 'very overweight') !== false || strpos(strtolower($value['key_insight']), 'very overweight') !== false || strpos(strtolower($value['fu_other_note']), 'very overweight') !== false || strpos(strtolower($value['fu_other_note']), 'very overweight') !== false || strpos(strtolower($value['medical_issue']), 'very over weight') !== false || strpos(strtolower($value['key_insight']), 'very over weight') !== false || strpos(strtolower($value['fu_other_note']), 'very over weight') !== false || strpos(strtolower($value['fu_other_note']), 'very over weight') !== false ) {
                $very_overweight++;
            }
            if (strpos(strtolower($value['medical_issue']), 'obese') !== false || strpos(strtolower($value['key_insight']), 'obese') !== false || strpos(strtolower($value['fu_other_note']), 'obese') !== false || strpos(strtolower($value['fu_other_note']), 'obese') !== false || strpos(strtolower($value['health_category']), 'obese') !== false) {
                $Obese++;
            }
            
        }
        $data['PCOS'] = $PCOS;
        $data['Thyroid'] = $Thyroid;
        $data['Cholestrol'] = $Cholestrol;
        $data['Diabetes'] = $Diabetes;
        $data['oth'] = $oth;
        $data['Overweight'] = $Overweight;
        $data['very_overweight'] = $very_overweight;
        $data['Obese'] = $Obese;
        
        echo json_encode($data);
    }//public function medical_bucket(){

    public function conversion_ratio(){
        error_reporting(0);
        $c_name  = $this->session->balance_session['first_name'];
        if(strtolower($c_name)=='vishal'){
            if(isset($_POST['counsellor_name'])){
                $c_name  = $_POST['counsellor_name'];
            }else{
                $c_name = false;
            }
            
        }
        if(isset($_POST['years'])){
            if(intval($_POST['years'])!=0){
                $years = $_POST['years'];
            }else{
                $years = '2021';
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = '2021';
        }
        //////////////////////// OVERALL DATA ////////////////////////////////////////////
        $data_overall = array();
        $current_month_date_overall = $years.'-'.date('m').'-01';
        //$data['sales_funnel_sales_overall'] = $this->mis_model->get_sales_funnel_sales(1,$c_name);
        $total_lead_assign_overall = $this->mis_model->get_total_lead_assign_conversion_ratio(0,$c_name,$years);
        //$data['total_lead_assign_overall'] = count($total_lead_assign_overall);
        $consultation_overall=0;
        $hot_overall=0;
        $warm_overall=0;
        $program_array = array('0' => '0','1' => '1','2' => '2','3' => '4' );
        $month = array();
        foreach ($total_lead_assign_overall as $key => $value) {
            if(!empty($value['key_insight'])){
                $consultation_overall++;
            }
            if($years!=date('Y')){
                $current_month = '12';
            }else{
                $current_month = date('n');
            }
            for ($i=1; $i <= $current_month; $i++) { 
                $assign_date = strtotime($value["assign_date"]);
                $start_date = strtotime($years.'-'.$i.'-01');
                $end_date = strtotime($years.'-'.$i.'-31');
                if($start_date<=$assign_date && $end_date>=$assign_date){
                    $month[$years.'-'.$i]['total_lead_assign_overall'] = $month[$years.'-'.$i]['total_lead_assign_overall']+1;
                    $month[$years.'-'.$i]['overall_total_lead_assign'][$value["assign_to"]] = $month[$years.'-'.$i]['overall_total_lead_assign'][$value["assign_to"]]+1;
                    if(!empty($value['key_insight'])){
                        $month[$years.'-'.$i]['consultation_overall'] = $month[$years.'-'.$i]['consultation_overall']+1;
                        $month[$years.'-'.$i]['total_consultation_overall'][$value["assign_to"]] = $month[$years.'-'.$i]['total_consultation_overall'][$value["assign_to"]]+1;
                    }//if(!empty($value['key_insight'])){
                    if(strtolower($value['status'])=='hot'){
                        $hot_overall++;
                        $month[$years.'-'.$i]['hot_overall'] = $month[$years.'-'.$i]['hot_overall']+1;
                        $month[$years.'-'.$i]['total_hot_overall'][$value["assign_to"]] = $month[$years.'-'.$i]['total_hot_overall'][$value["assign_to"]]+1;
                        
                    }//if(strtolower($value['status'])=='hot'){
                    if(strtolower($value['status'])=='warm'){
                        $warm_overall++;
                        $month[$years.'-'.$i]['warm_overall'] = $month[$years.'-'.$i]['warm_overall']+1;
                        $month[$years.'-'.$i]['total_warm_overall'][$value["assign_to"]] = $month[$years.'-'.$i]['total_warm_overall'][$value["assign_to"]]+1;
                    }//if(strtolower($value['status'])=='warm'){
                    if(!empty($value['order_email'])){
                        if($start_date <= strtotime($value['order_date']) && $end_date >= strtotime($value['order_date'])){
                            $month[$years.'-'.$i]['total_lead_assign_sales'] = $month[$years.'-'.$i]['total_lead_assign_sales']+1;
                            $month[$years.'-'.$i]['overall_total_lead_assign_sales'][$value["assign_to"]] = $month[$years.'-'.$i]['overall_total_lead_assign_sales'][$value["assign_to"]]+1;
                            if(!empty($value['key_insight'])){
                                $month[$years.'-'.$i]['consultation_sales'] = $month[$years.'-'.$i]['consultation_sales']+1;
                                $month[$years.'-'.$i]['total_consultation_sales'][$value["assign_to"]] = $month[$years.'-'.$i]['total_consultation_sales'][$value["assign_to"]]+1;
                            }//if(!empty($value['key_insight'])){
                            if(strtolower($value['status'])=='hot'){
                                $hot_overall++;
                                $month[$years.'-'.$i]['hot_sales'] = $month[$years.'-'.$i]['hot_sales']+1;
                                $month[$years.'-'.$i]['total_hot_sales'][$value["assign_to"]] = $month[$years.'-'.$i]['total_hot_sales'][$value["assign_to"]]+1;
                            }//if(strtolower($value['status'])=='hot'){
                            if(strtolower($value['status'])=='warm'){
                                $warm_overall++;
                                $month[$years.'-'.$i]['warm_sales'] = $month[$years.'-'.$i]['warm_sales']+1;
                                $month[$years.'-'.$i]['total_warm_sales'][$value["assign_to"]] = $month[$years.'-'.$i]['total_warm_sales'][$value["assign_to"]]+1;
                            }//if(strtolower($value['status'])=='warm'){
                        }//if(strtotime($current_month_date) >= strtotime($value['order_date'])){
                    }//if(!empty($value['order_email'])){
                }// //if($start_date<=$order_date && $end_date>=$order_date){
                
            }
        }//foreach ($total_lead_assign as $key => $value) {
        krsort($month);
        /*echo '<pre>';
        print_r($month);die;*/
        $html = "";
        $html = '<tbody id="" style="overflow: scroll;">
                    <tr>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" rowspan="2">Month</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Hot</th>
                        
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Consultations</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px" colspan="3">Warm</th>
                    </tr>
                    <tr>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Percentage %</th>
                    </tr>';
        if(count($month)>0){
            foreach ($month as $key => $value) {
                $month_to_string = explode('-', $key);
                $monthName = date("F", mktime(null, null, null, $month_to_string[1]));
                $total_lead_assign_overall =  '0';
                $total_lead_assign_sales =  '0';
                $consultation_overall =  '0';
                $stage3 =  '0';
                $warm_overall =  '0';
                $warm_sales =  '0';
                $hot_overall =  '0';
                $hot_sales =  '0';

                if(isset($value['total_lead_assign_overall'])){ $total_lead_assign_overall =  $value['total_lead_assign_overall'];}else{ $total_lead_assign_overall =  '0'; }
                if(isset($value['total_lead_assign_sales'])){ $total_lead_assign_sales =  $value['total_lead_assign_sales'];}else{ $total_lead_assign_sales =  '0'; }
                if(isset($value['consultation_overall'])){ $consultation_overall =  $value['consultation_overall'];}else{ $consultation_overall =  '0'; } 
                if(isset($value['consultation_sales'])){ $consultation_sales =  $value['consultation_sales'];}else{ $stage3 =  '0'; }
                if(isset($value['warm_overall'])){ $warm_overall =  $value['warm_overall'];}else{ $warm_overall =  '0'; }

                if(isset($value['warm_sales'])){ $warm_sales =  $value['warm_sales'];}else{ $warm_sales =  '0'; }
                if(isset($value['hot_overall'])){ $hot_overall =  $value['hot_overall'];}else{ $hot_overall =  '0'; } 
                if(isset($value['hot_sales'])){ $hot_sales =  $value['hot_sales'];}else{ $hot_sales =  '0'; }

                $hot_per = number_format((float)$hot_sales/$hot_overall*100, 2, '.', '').'%';
                $warm_per = number_format((float)$warm_sales/$warm_overall*100, 2, '.', '').'%';
                $consultation_per = number_format((float)$consultation_sales/$consultation_overall*100, 2, '.', '').'%';
                $total_lead_assign_per = number_format((float)$total_lead_assign_sales/$total_lead_assign_overall*100, 2, '.', '').'%';

                $c_name  = $this->session->balance_session['first_name'];
                $tolltip_html_hot = '';
                $tolltip_html_hot_sale = '';
                $tolltip_html_consultation = '';
                $tolltip_html_consultation_sale = '';
                $tolltip_html_lead_assign = '';
                $tolltip_html_lead_assign_sale = '';
                $tolltip_html_warm = '';
                $tolltip_html_warm_sale = '';

                if(strtolower($c_name)=='vishal'){
                    if(count($value['total_hot_overall'])>0){
                        $tolltip_html_hot .= '<div class="tooltip">'.$hot_overall.'<span class="tooltiptext">';
                        foreach ($value['total_hot_overall'] as $total_namehot_key => $total_namehot_value) {
                            $tolltip_html_hot .= ucwords($total_namehot_key).' : <div class="sub_text_count"> '.$total_namehot_value.'</div><br>';
                        }
                        $tolltip_html_hot .= '</span></div>'; 
                    }else{
                        $tolltip_html_hot = '0';
                    }
                    
                    if(count($value['total_hot_sales'])>0){
                        $tolltip_html_hot_sale .= '<div class="tooltip">'.$hot_sales.'<span class="tooltiptext">';
                        foreach ($value['total_hot_sales'] as $total_namehot_key => $total_namehot_value) {
                            $tolltip_html_hot_sale .= ucwords($total_namehot_key).' : <div class="sub_text_count"> '.$total_namehot_value.'</div><br>';
                        }
                        $tolltip_html_hot_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_hot_sale = '0';
                    }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_consultation_overall'])>0){
                        $tolltip_html_consultation .= '<div class="tooltip">'.$consultation_overall.'<span class="tooltiptext">';
                        foreach ($value['total_consultation_overall'] as $total_name_consultation_key => $total_name_consultation_value) {
                            $tolltip_html_consultation .= ucwords($total_name_consultation_key).' : <div class="sub_text_count"> '.$total_name_consultation_value.'</div><br>';
                        }
                        $tolltip_html_consultation .= '</span></div>'; 
                    }else{
                        $tolltip_html_consultation = '0';
                    }
                    if(count($value['total_consultation_sales'])>0){
                        $tolltip_html_consultation_sale .= '<div class="tooltip">'.$consultation_sales.'<span class="tooltiptext">';
                        foreach ($value['total_consultation_sales'] as $total_name_consultation_key => $total_name_consultation_value) {
                            $tolltip_html_consultation_sale .= ucwords($total_name_consultation_key).' : <div class="sub_text_count"> '.$total_name_consultation_value.'</div><br>';
                        }
                        $tolltip_html_consultation_sale .= '</span></div>';
                    }else{
                        $tolltip_html_consultation_sale = '0';
                    } 
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['overall_total_lead_assign'])>0){
                            $tolltip_html_lead_assign .= '<div class="tooltip">'.$total_lead_assign_overall.'<span class="tooltiptext">';
                        foreach ($value['overall_total_lead_assign'] as $total_name_lead_assign_key => $total_name_lead_assign_value) {
                            $tolltip_html_lead_assign .= ucwords($total_name_lead_assign_key).' : <div class="sub_text_count"> '.$total_name_lead_assign_value.'</div><br>';
                        }
                        $tolltip_html_lead_assign .= '</span></div>'; 
                    }else{
                        $tolltip_html_lead_assign = '0';
                    } 
                    if(count($value['overall_total_lead_assign_sales'])>0){
                        $tolltip_html_lead_assign_sale .= '<div class="tooltip">'.$total_lead_assign_sales.'<span class="tooltiptext">';
                        foreach ($value['overall_total_lead_assign_sales'] as $total_name_lead_assign_key => $total_name_lead_assign_value) {
                            $tolltip_html_lead_assign_sale .= ucwords($total_name_lead_assign_key).' : <div class="sub_text_count"> '.$total_name_lead_assign_value.'</div><br>';
                        }
                        $tolltip_html_lead_assign_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_lead_assign_sale = '0';
                    } 
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if(count($value['total_warm_overall'])>0){
                        $tolltip_html_warm .= '<div class="tooltip">'.$warm_overall.'<span class="tooltiptext">';
                        foreach ($value['total_warm_overall'] as $total_name_warm_key => $total_name_warm_value) {
                            $tolltip_html_warm .= ucwords($total_name_warm_key).' : <div class="sub_text_count"> '.$total_name_warm_value.'</div><br>';
                        }
                        $tolltip_html_warm .= '</span></div>'; 
                    }else{
                        $tolltip_html_warm = '0';
                    }
                    if(count($value['total_warm_sales'])>0){
                        $tolltip_html_warm_sale .= '<div class="tooltip">'.$warm_sales.'<span class="tooltiptext">';
                        foreach ($value['total_warm_sales'] as $total_name_warm_key => $total_name_warm_value) {
                            $tolltip_html_warm_sale .= ucwords($total_name_warm_key).' : <div class="sub_text_count"> '.$total_name_warm_value.'</div><br>';
                        }
                        $tolltip_html_warm_sale .= '</span></div>'; 
                    }else{
                        $tolltip_html_warm_sale = '0';
                    }
                    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    $html .= '<tr>
                            <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_hot.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_hot_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$hot_per.'</th>

                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_consultation.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_consultation_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$consultation_per.'</th>

                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_lead_assign.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_lead_assign_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$total_lead_assign_per.'</th>

                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_warm.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_warm_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$warm_per.'</th>
                        </tr>';
                }else{
                    $html .= '<tr>
                            <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$hot_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$hot_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$hot_per.'</th>

                            <th scope="row" style="text-align: center;font-size: 12px">'.$consultation_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$consultation_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$consultation_per.'</th>

                            <th scope="row" style="text-align: center;font-size: 12px">'.$total_lead_assign_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$total_lead_assign_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$total_lead_assign_per.'</th>

                            <th scope="row" style="text-align: center;font-size: 12px">'.$warm_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$warm_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$warm_per.'</th>
                        </tr>';
                }
                
                
                
            }
        }else{
            $html .= '<tr colspan="5"> No Record Found! </tr>';
        }
        /*echo '<pre>';
        print_r($html);die;
        $data['consultation_overall'] = $consultation_overall;
        $data['hot_overall'] = $hot_overall;
        $data['warm_overall'] = $warm_overall;
        $data['lead_consultation_ratio_overall'] = round($consultation_overall / $data['total_lead_assign_overall'] * 100,2).' %';
        $data['consultation_sales_overall'] = round($data['sales_funnel_sales_overall'][0]['unit'] / $consultation_overall * 100,2) .' %';
        $data['lead_to_sales_ratio_overall'] =  round($data['sales_funnel_sales_overall'][0]['unit'] / $data['total_lead_assign_overall'] * 100,2).' %';
        $data['hot_to_sales_overall'] = round($data['hot_overall'] / $data['sales_funnel_sales_overall'][0]['unit'] * 100,2).' %';*/
        echo json_encode($html);
    }//public function efforts_for_sales(){

    public function report_expiry(){
        $report_expiry = $this->mis_model->get_report_expiry();
        $data = array();
        $data2 = array();
        foreach ($report_expiry as $key => $value) {
            $data[$value["email_id"]][] =  $value;
        }
        
        foreach ($data as $key => $value) {
            $value_count = count($key);
            if($value_count > 0){
                for ($i=0; $i < $value_count; $i++) { 
                    $exp_date = strtotime($value[$i]['exp_date']);
                    if($value_count==1){
                        if($exp_date > strtotime('2021-07-01') && $exp_date < strtotime('2021-07-31')){
                            $data2[$key][] = $value[$i];
                        }
                    }else{

                    }
                    
                }
            }
            
        }
        echo '<pre>';
        echo count($data);
        die;
    }
    
    
}