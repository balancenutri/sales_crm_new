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
                // $data['page']='lead';
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
        $get_team_sales = $this->mis_model->get_sales(0,$c_name);
        $team_sale_count = count($get_team_sales);
        
        $get_sales = $this->mis_model->get_sales(1,$c_name);
        
        $counsellor_work_days = $this->mis_model->counsellor_work_days();
        //echo array_sum($counsellor_work_days);
        $counsellor_days=$team_days=0;
        foreach($counsellor_work_days as $val){
            if($val['crm_user']==$c_name){
                $counsellor_days=$val['days'];
            }
            $team_days=$team_days+$val['days'];
        }
        // echo "counsellor : ".$counsellor_days." Team :".$team_days;exit;
        //print_r($counsellor_work_days);exit;
        $avg_calls = $this->mis_model->get_Avg_CallsNew(0,$c_name);
         //print_r(count($get_sales));exit;
        $data['avg_calls'] = ceil(($avg_calls[0]['fu_count'] + $avg_calls[0]['key_insight'])/(count($get_sales)));
        $data['avg_calls_fu'] = ceil(($avg_calls[0]['fu_count']+$avg_calls[0]['fu_other_count'])/$counsellor_days);
        //echo ($avg_calls[0]['fu_count'] + $avg_calls[0]['key_insight'])." :: ".count($get_sales);
        
        
        $avg_calls_team = $this->mis_model->get_Avg_CallsNew(1,$c_name);
         
        $data['avg_calls_team'] = ceil(($avg_calls_team[0]['fu_count'] + $avg_calls_team[0]['key_insight'])/$team_sale_count);
        $data['avg_calls_fu_team'] = ceil(($avg_calls_team[0]['fu_count']+$avg_calls_team[0]['fu_other_count'])/$team_days);
        
        $data['day_close_fu']=ceil(($avg_calls[0]['fu_count']+$avg_calls[0]['fu_other_count'])/(count($get_sales)));
        $data['day_close_fu_team']=ceil(($avg_calls_team[0]['fu_count']+$avg_calls_team[0]['fu_other_count'])/$team_sale_count);
       //print_r($data);exit;
        $arr_counsellor = $this->mis_model->day_close_consult('0',$c_name);
        $arr2_counsellor = $this->mis_model->day_close_sale('0',$c_name);
        //print_r($data);exit;
        $consult_days_counsellor=0;
        foreach($arr_counsellor as $val){
            
            $consult_days_counsellor = $consult_days_counsellor+$val['days'];
        }
        
        $sale_days_counsellor=0;
        foreach($arr2_counsellor as $val2){
            $sale_days_counsellor = $sale_days_counsellor+$val2['days'];
        }
        // echo $consult_days_counsellor."/".sizeof($arr_counsellor);
        $data['day_close_consult']=ceil($consult_days_counsellor/sizeof($arr_counsellor));
        $data['day_close_sale']=ceil($sale_days_counsellor/sizeof($arr2_counsellor));
        
        $arr = $this->mis_model->day_close_consult(1,$c_name);
        $arr2 = $this->mis_model->day_close_sale(1,$c_name);
        //print_r($arr);
        $consult_days=0;
        foreach($arr as $val){
            $consult_days = $consult_days+$val['days'];
        }
        $sale_days=0;
        foreach($arr2 as $val2){
            $sale_days = $sale_days+$val2['days'];
        }
        //echo $days."/".sizeof($arr);
        $data['day_close_consult_team']=ceil($consult_days/sizeof($arr));
        $data['day_close_sale_team']=ceil($sale_days/sizeof($arr2));
        
        /********Days to close FU*******/
        
        
        //print_r($data);exit;
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
        $data['sales_funnel_sales_consult'] = $this->mis_model->get_sales_funnel_sales_consult(0,$c_name);
        $total_lead_assign = $this->mis_model->get_total_lead_assign(0,$c_name);
        // print_r_custom($total_lead_assign);
        // exit;
        $data['total_lead_assign'] = count($total_lead_assign);
        $consultation=0;
        $hot=0;
        $hot_sale_cnt=0;
        $warm=0;
        $warm_sale_cnt=0;
        $consult_sale =0;
        $lead_sale_cnt=0;
        foreach ($total_lead_assign as $key => $value) {
            if(!empty($value['key_insight'])){
                $consultation++;
            }
            if(strtolower($value['status'])=='hot'){
		                $hot++;
		            }//if(strtolower($value['status'])=='hot'){
		            if(strtolower($value['status'])=='warm'){
		                $warm++;
		            }//if(strtolower($value['status'])=='warm'){
            if(!empty($value['order_email'])){
            	if(strtotime($current_month_date) <= strtotime($value['order_date'])){
            	    $lead_sale_cnt ++;
            		if(strtolower($value['status'])=='hot'){
		                $hot_sale_cnt++;
		            }//if(strtolower($value['status'])=='hot'){
		            if(strtolower($value['status'])=='warm'){
		                $warm_sale_cnt++;
		            }//if(strtolower($value['status'])=='warm'){
		            if(!empty($value['key_insight'])){
                        $consult_sale++;
                    }
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
        $data['lead_consultation_ratio'] = round($consultation / $data['total_lead_assign'] * 100,2).' %' ;
        $data['consultation_sales'] = round($consult_sale / $consultation * 100,2) .' %';
        $data['lead_to_sales_ratio'] =  round($lead_sale_cnt / $data['total_lead_assign'] * 100,2).' %';
        // $data['lead_to_sales_ratio'] =  round($data['sales_funnel_sales'][0]['unit'] / $data['total_lead_assign'] * 100,2).' %';
        // $data['hot_to_sales'] = round($data['hot'] / $data['sales_funnel_sales'][0]['unit'] * 100,2).' %';
         $data['hot_to_sales'] = round( $hot_sale_cnt/ $data['hot'] * 100,2).' %';

        //////////////////////// OVERALL DATA ////////////////////////////////////////////
        $data_overall = array();
        $current_month_date_overall = date('Y-m').'-01';
        $data['sales_funnel_sales_overall'] = $this->mis_model->get_sales_funnel_sales(1,$c_name);
        // print_r_custom($data['sales_funnel_sales_overall']);
        // exit();
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
                // if(strtotime($current_month_date_overall) <= strtotime($value['order_date'])){  avinash comment this
                    if(strtolower($value['status'])=='hot'){
                        $hot_overall++;
                    }//if(strtolower($value['status'])=='hot'){
                    if(strtolower($value['status'])=='warm'){
                        $warm_overall++;
                //   avinash comment this }//if(strtolower($value['status'])=='warm'){
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
                $years = date("Y");
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = date("Y");
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
                $a=4;
            }else{
                $current_month = date('n');
                $a=1;
            }
            // echo $current_month;
            // exit;
            
            for ($i=$a; $i <= $current_month; $i++) { 
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
        // echo '<pre>';
        // print_r($month);die;
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
            // foreach ($month as $key => $value) {
            //     /*echo '<pre>';
            //     print_r($value);
            //     die;*/
            //     $month_to_string = explode('-', $key);
            //     $monthName = date("F", mktime(0, 0, 0, $month_to_string[1]));
            
            $b =array();
            $d =array();
            if(date("Y") != $years){
             for($i=1;$i<=3;$i++){
            $b=array_pop($month);
            array_push($d,$b);
            }   
            }
            $month =array_merge(array_reverse($d),$month);
            
            foreach ($month as $key => $value) {
                $month_to_string = explode('-', $key);
                $monthName = date("F", mktime(0, 0, 0, $month_to_string[1], 10));
                if(date("Y") != $years){
                    foreach($month_to_string as $val){
                    //  print_r_custom($month_to_string);
                    if($val==2){
                       $monthName ='October'; 
                    }elseif($val==1){
                        $monthName ='November';
                    }elseif($val==0){
                        $monthName ='December';
                    }
                    }
            }

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
                $years = date("Y");
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = date("Y");
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
                $a=4;
            }else{
                $current_month = date('n');
                $a=1;
            }
            
            for ($i=$a; $i <= $current_month; $i++) { 
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
        // echo '<pre>';
        //Social Media (Facebook,Instagram,LinkId,Twitter)
        // print_r($month);die;
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

            // foreach ($month as $key => $value) {
            //     $month_to_string = explode('-', $key);
            //     $monthName = date("F", mktime(0, 0, 0, $month_to_string[1]));
            $b =array();
            $d =array();
            $l=2;
            if(date('m')==12){
                $l=3;
            }
            if(date("Y") != $years){
             for($i=1;$i<=3;$i++){
            $b=array_pop($month);
            array_push($d,$b);
            }   
            }
            $month =array_merge(array_reverse($d),$month);
            
            foreach ($month as $key => $value) {
                $month_to_string = explode('-', $key);
                $monthName = date("F", mktime(0, 0, 0, $month_to_string[1], 10));
               if(date("Y") != $years){
                    foreach($month_to_string as $val){
                    //  print_r_custom($month_to_string);
                    if($val==2){
                       $monthName ='October'; 
                    }elseif($val==1){
                        $monthName ='November';
                    }elseif($val==0){
                        $monthName ='December';
                    }
                }
                }
                
                
                foreach ($value as $key_source => $value_source) {
                    $source_array[$key_source]['cnt'] = count($value_source);
                    foreach ($value_source as $key_sum_amount => $value_sum_amount) {
                        $source_array[$key_source]['amt'] = $source_array[$key_source]['amt'] + $value_sum_amount['amt'];
                    }//foreach ($value_source as $key_sum_amount => $value_sum_amount) {
                }//foreach ($value as $key_source => $value_source) {

                $html_stage .= '<tr><th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>';
                // if(array_key_exists('prime_source',$source_array)){
                    // echo(number_format((float)$source_array['prime_source']['cnt']))."<br>";
                    // echo(number_format((float)$source_array["prime_source_total"]['cnt']))."<br>";
                    $percent_prime_source = number_format($source_array['prime_source']['cnt'] / $source_array["prime_source_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_prime_source!='nan%')?($percent_prime_source = $percent_prime_source):($percent_prime_source = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_prime_source . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["prime_source"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["prime_source_total"]['cnt']).'</div></span></div></a></td>';

                    $source_array['prime_source']['amt'] = 0;
                    $source_array["prime_source"]['cnt'] = 0;
                    $source_array['prime_source_total']['amt'] = 0;
                    $source_array["prime_source_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >HEllo0.00%</a></td>';
                // }
                // if(array_key_exists('social_media',$source_array)){
                    $percent_social_media = number_format($source_array['social_media']['cnt'] / $source_array["social_media_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_social_media!='nan%')?($percent_social_media = $percent_social_media):($percent_social_media = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_social_media .'<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["social_media"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["social_media_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['social_media']['amt'] = 0;
                    $source_array["social_media"]['cnt'] = 0;
                    $source_array['social_media_total']['amt'] = 0;
                    $source_array["social_media_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
                // if(array_key_exists('health_score',$source_array)){
                    $percent_health_score = number_format((float)$source_array['health_score']['cnt'] / $source_array["health_score_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_health_score!='nan%')?($percent_health_score = $percent_health_score):($percent_health_score = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_health_score . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["health_score"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["health_score_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['health_score']['amt'] = 0;
                    $source_array["health_score"]['cnt'] = 0;
                    $source_array['health_score_total']['amt'] = 0;
                    $source_array["health_score_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
                // if(array_key_exists('paid_adds',$source_array)){
                    $percent_paid_adds = number_format((float)$source_array['paid_adds']['cnt'] / $source_array["paid_adds_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_paid_adds!='nan%')?($percent_paid_adds = $percent_paid_adds):($percent_paid_adds = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_paid_adds . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["paid_adds"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["paid_adds_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['paid_adds']['amt'] = 0;
                    $source_array["paid_adds"]['cnt'] = 0;
                    $source_array['paid_adds_total']['amt'] = 0;
                    $source_array["paid_adds_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
                // if(array_key_exists('other',$source_array)){
                    $percent_other = number_format((float)$source_array['other']['cnt'] / $source_array["other_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_other!='nan%')?($percent_other = $percent_other):($percent_other = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_other . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["other"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["other_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['other']['amt'] = 0;
                    $source_array["other"]['cnt'] = 0;
                    $source_array['other_total']['amt'] = 0;
                    $source_array["other_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
                // if(array_key_exists('web',$source_array)){
                    $percent_web = number_format((float)$source_array['web']['cnt'] / $source_array["web_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_web!='nan%')?($percent_web = $percent_web):($percent_web = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_web . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["web"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["web_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['web']['amt'] = 0;
                    $source_array["web"]['cnt'] = 0;
                    $source_array['web_total']['amt'] = 0;
                    $source_array["web_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
                // if(array_key_exists('Referral',$source_array)){
                    $percent_Referral = number_format((float)$source_array['Referral']['cnt'] / $source_array["Referral_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_Referral!='nan%')?($percent_Referral = $percent_Referral):($percent_Referral = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_Referral . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["Referral"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["Referral_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['Referral']['amt'] = 0;
                    $source_array["Referral"]['cnt'] = 0;
                    $source_array['Referral_total']['amt'] = 0;
                    $source_array["Referral_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
                // if(array_key_exists('Registration',$source_array)){
                    $percent_Registration = number_format((float)$source_array['Registration']['cnt'] / $source_array["Registration_total"]['cnt'] * 100, 2, '.', '').'%';
                    ($percent_Registration!='nan%')?($percent_Registration = $percent_Registration):($percent_Registration = '0.00%');
                    $html_stage .= '<td class="text-center"><a href="javascript:void(0)" ><div class="tooltip">'.$percent_Registration . '<span class="tooltiptext1">Lead Sales : <div class="sub_text_count"> '.number_format($source_array["Registration"]['cnt']).'</div><br/>Total Lead : <div class="sub_text_count"> '.number_format($source_array["Registration_total"]['cnt']).'</div></span></div></a></td>';
                    $source_array['Registration']['amt'] = 0;
                    $source_array["Registration"]['cnt'] = 0;
                    $source_array['Registration_total']['amt'] = 0;
                    $source_array["Registration_total"]['cnt'] = 0;
                // }else{
                //     $html_stage .= '<td class="text-center"><a href="javascript:void(0)" >0.00%</a></td>';
                // }
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
        // echo '<pre>';
        // print_r($month);
        // die;
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
        // $c_name  = 'vishal';
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
                $years = date("Y");
            }//if(intval($_POST['years'])!=0){
        }else{
            $years = date("Y");
        }
        //////////////////////// OVERALL DATA ////////////////////////////////////////////
        $data_overall = array();
        $current_month_date_overall = $years.'-'.date('m').'-01';
        //$data['sales_funnel_sales_overall'] = $this->mis_model->get_sales_funnel_sales(1,$c_name);
        $total_lead_assign_overall = $this->mis_model->get_total_lead_assign_conversion_ratio(0,$c_name,$years);
        //$data['total_lead_assign_overall'] = count($total_lead_assign_overall);
        // echo "<pre>";
        // print_r ($total_lead_assign_overall);
        $consultation_overall=0;
        $hot_overall=0;
        $warm_overall=0;
        
        $program_array = array('0' => '0','1' => '1','2' => '2','3' => '4' );
        $month = array();
        // echo"<pre>";
        // print_r($total_lead_assign_overall);
        $c=0;
        foreach ($total_lead_assign_overall as $key => $value) {
            
           
            if($years!=date('Y')){
                $current_month = 12;
            }else{
                $current_month = date('n');
            }
            
            // echo $current_month;
            // die;
            for ($i=1; $i<=$current_month; $i++) { 
            //   echo $i;
                $assign_date = strtotime($value["assign_date"]);
                // $assign_date = date('d',strtotime($value["assign_date"]));
                $start_date = strtotime($years.'-'.$i.'-01');
                $end_date = strtotime($years.'-'.$i.'-31');
                $key_insight_date = strtotime($value["key_insight_date"]);
                
                if($start_date<=$assign_date && $end_date>=$assign_date){
                    
                    // echo($end_date);
                    // die;
                    $month[$years.'-'.$i]['total_lead_assign_overall'] = $month[$years.'-'.$i]['total_lead_assign_overall']+1;
                    $month[$years.'-'.$i]['overall_total_lead_assign'][$value["assign_to"]] = $month[$years.'-'.$i]['overall_total_lead_assign'][$value["assign_to"]]+1;
                    if(!empty($value['key_insight'])){
                        
                        // if($start_date<=$key_insight_date && $end_date>=$key_insight_date){
                        $month[$years.'-'.$i]['consultation_overall'] = $month[$years.'-'.$i]['consultation_overall']+1;
                        
                        $month[$years.'-'.$i]['total_consultation_overall'][$value["assign_to"]] = $month[$years.'-'.$i]['total_consultation_overall'][$value["assign_to"]]+1;
                        // }
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
                            
                        }
                            
                            if(strtolower($value['status'])=='warm'){
                                $warm_overall++;
                                $month[$years.'-'.$i]['warm_sales'] = $month[$years.'-'.$i]['warm_sales']+1;
                                $month[$years.'-'.$i]['total_warm_sales'][$value["assign_to"]] = $month[$years.'-'.$i]['total_warm_sales'][$value["assign_to"]]+1;
                            }//if(strtolower($value['status'])=='warm'){
                        // }//if(strtotime($current_month_date) >= strtotime($value['order_date'])){
                    }//if(!empty($value['order_email'])){
                    
                }// //if($start_date<=$order_date && $end_date>=$order_date){
                
            }
            $c++;
        }//foreach ($total_lead_assign as $key => $value) {
        
        krsort($month);
        //  krsort($month);
        // echo '<pre>';
        // print_r($month);die;
        $html = "";
        $html = '<tbody id="" style="overflow: scroll;">
                    <tr>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" rowspan="2">Month</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Lead To Consultations</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Consultations To Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;" colspan="3">Lead To Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px;" colspan="3">Hot To Sales</th>
                    </tr>
                    <tr>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Consultations</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                        
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Consultations</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                        
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Lead</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">Percentage %</th>
                        
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Hot</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px">Sales</th>
                        <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px;">Percentage %</th>
                    </tr>';
        if(count($month)>0){
            // foreach ($month as $key => $value) {   \\ comment this for for month data in orderd
            //     $month_to_string = explode('-', $key);
            //     $monthName = date("F", mktime(0, 0, 0, $month_to_string[1], 10));
            $b =array();
            $d =array();
            if(date("Y") !=$years){
             for($i=1;$i<=3;$i++){
            $b=array_pop($month);
            array_push($d,$b);
            }   
            }
            
            $month =array_merge(array_reverse($d),$month);
           
            foreach ($month as $key => $value) {
                $month_to_string = explode('-', $key);
                // print_r($month_to_string);
         
                  $monthName = date("F", mktime(0, 0, 0, $month_to_string[1], 10));
                if(date("Y") !=$years){
                    
                    foreach($month_to_string as $val){
                    //  print_r_custom($month_to_string);
                    if($val==2){
                      $monthName ='October'; 
                    }elseif($val==1){
                        $monthName ='November';
                    }elseif($val==0){
                        $monthName ='December';
                    }
                }
                }
                   
                
                $total_lead_assign_overall =  '0';
                $total_lead_assign_sales =  '0';
                $consultation_overall =  '0';
                $stage3 =  '0';
                $warm_overall =  '0';
                $warm_sales =  '0';
                $hot_overall =  '0';
                $hot_sales =  '0';

                if(isset($value['total_lead_assign_overall'])){
                    $total_lead_assign_overall =  $value['total_lead_assign_overall'];
                }else{ 
                    $total_lead_assign_overall =  '0'; 
                }
                if(isset($value['total_lead_assign_sales'])){ 
                    $total_lead_assign_sales =  $value['total_lead_assign_sales'];
                }else{ 
                    $total_lead_assign_sales =  '0'; 
                    
                }
                if(isset($value['consultation_overall'])){
                    $consultation_overall =  $value['consultation_overall'];
                    
                }else{ 
                    $consultation_overall =  '0'; 
                    
                } 
                if(isset($value['consultation_sales'])){ 
                    $consultation_sales =  $value['consultation_sales'];
                    
                }else{ $stage3 =  '0';
                }
                if(isset($value['warm_overall'])){ 
                    $warm_overall =  $value['warm_overall'];
                }else{ $warm_overall =  '0'; 
                }
                if(isset($value['warm_sales'])){ 
                    $warm_sales =  $value['warm_sales'];
                }else{ 
                    $warm_sales =  '0'; 
                }
                if(isset($value['hot_overall'])){
                    $hot_overall =  $value['hot_overall'];
                }else{
                    $hot_overall =  '0'; 
                } 
                if(isset($value['hot_sales'])){
                    $hot_sales =  $value['hot_sales'];
                }else{
                $hot_sales =  1; 
                }

                $hot_per = number_format((float)$hot_sales/$hot_overall*100, 2, '.', '').'%';
                // $warm_per = number_format((float)$warm_sales/$warm_overall*100, 2, '.', '').'%';
                $lead_cunslt_per = number_format((float)$consultation_overall/($total_lead_assign_overall)*100, 2, '.', '').'%';
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
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_lead_assign.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_consultation.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px;border-right:1px solid;">'.$lead_cunslt_per.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_consultation.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_consultation_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$consultation_per.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_lead_assign.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_lead_assign_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$total_lead_assign_per.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_hot.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$tolltip_html_hot_sale.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$hot_per.'</th>

                        </tr>';
                }else{
                    $html .= '<tr>
                            <th scope="row" style="font-weight: bold;text-align: center;font-size: 12px; border-right:1px solid;">'.$monthName.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$total_lead_assign_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$consultation_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;"">'.$lead_cunslt_per.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$consultation_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$consultation_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$consultation_per.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$total_lead_assign_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$total_lead_assign_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px; border-right:1px solid;">'.$total_lead_assign_per.'</th>
                            
                            <th scope="row" style="text-align: center;font-size: 12px">'.$hot_overall.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px">'.$hot_sales.'</th>
                            <th scope="row" style="text-align: center;font-size: 12px;">'.$hot_per.'</th>

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
    
    
    
    //================================================== avinash added for heat map inside sale======================================================================
    public function heat_map_all (){
       $ss_units=$bs_units=0;
       $ss_days=$bs_days=$total_days=0;
        $effort_sale=$this->mis_model->effort_sale();
        $total =COUNT($effort_sale);
        if($effort_sale>0){
            foreach($effort_sale as $key=>$val) {
                if($val['program_type']=='0'){
                    $ss_days = $ss_days+$val['days'];
                    $ss_units++;  
                    $ss_units=$ss_units;
                    if($val['assign_to']=='Aayushi'){
                       $ss_units_aayushi++;
                       $ss_units_aayushi=$ss_units_aayushi;
                       $ss_days_aayushi = $ss_days_aayushi+$val['days'];
                   }elseif($val['assign_to']=='Vaishnavi'){
                       $ss_units_vaishnavi++;
                       $ss_units_vaishnavi=$ss_units_vaishnavi;
                       $ss_days_vaishnavi = $ss_days_vaishnavi+$val['days'];
                   }
                    
                    
                }elseif($val['program_type']=='1'){
                    $bs_days = $bs_days+$val['days'];
                    $bs_units++;
                    $bs_units=$bs_units;
                    if($val['assign_to']=='Aayushi'){
                       $bs_units_aayushi++;
                       $bs_units_aayushi=$bs_units_aayushi;
                       $bs_days_aayushi = $bs_days_aayushi+$val['days'];
                   }elseif($val['assign_to']=='Vaishnavi'){
                       $bs_units_vaishnavi++;
                       $bs_units_vaishnavi=$bs_units_vaishnavi;
                       $bs_days_vaishnavi = $bs_days_vaishnavi+$val['days'];
                   }
                }
                $total_days = $total_days+$val['days'];
                if($val['assign_to']=='Aayushi'){
                       $total_units_aayushi++;
                       $total_units_aayushi=$total_units_aayushi;
                       $total_days_aayushi = $total_days_aayushi+$val['days'];
                   }elseif($val['assign_to']=='Vaishnavi'){
                       $total_units_vaishnavi++;
                       $total_units_vaishnavi=$total_units_vaishnavi;
                       $total_days_vaishnavi = $total_days_vaishnavi+$val['days'];
                   }
            }
            
            $data['ss_days']= 58; //round($ss_days/$ss_units);
            $data['ss_days_aayushi']=round($ss_days_aayushi/$ss_units_aayushi);
            $data['ss_days_vaishnavi']=round($ss_days_vaishnavi/$ss_units_vaishnavi);
            $data['bs_days']= 227;//round($bs_days/$bs_units);
            $data['bs_days_aayushi']=round($bs_days_aayushi/$bs_units_aayushi);
            $data['bs_days_vaishnavi']=round($bs_days_vaishnavi/$bs_units_vaishnavi);
            $data['total_days_aayushi']=round($total_days_aayushi/$total_units_aayushi);
            $data['total_days_vaishnavi']=round($total_days_vaishnavi/$total_units_vaishnavi);
            $data['total_days']=80;//round($total_days/$total);
            
        }else{
            $data['ss_days']=0;
            $data['ss_days_aayushi']=0;
            $data['ss_days_vaishnavi']=0;
            $data['bs_days']=0;
            $data['bs_days_aayushi']=0;
            $data['bs_days_vaishnavi']=0;
            $data['total_days_aayushi']=0;
            $data['total_days_vaishnavi']=0;
            $data['total_days']=0;
        }
        $rel_all =$rel_aayushi=$rel_vaishnavi=0;
        $rel_all_sale=$rel_all_sale_aayushi=$rel_all_sale_vaishnavi=0;
        $fresh_all =$fresh_aayushi=$fresh_vaishnavi=0;
        $fresh_sale=$fresh_sale_aayushi=$fresh_sale_vaishnavi=0;
        $old_all =$old_aayushi=$old_vaishnavi=0;
        $old_sale=$old_sale_aayushi=$old_sale_vaishnavi=0;
        $consult_all =$consult_aayushi=$consult_vaishnavi=0;
        $consult_sale=$consult_sale_aayushi=$consult_sale_vaishnavi=0;
        $relevent_lead =$this->mis_model->relevent_lead();
        foreach($relevent_lead as $key=>$val){
           $rel_all++;
           $rel_all=$rel_all;
           if($val['assign_to']=='Aayushi'){
               $rel_aayushi++;
               $rel_aayushi=$rel_aayushi;
           }elseif($val['assign_to']=='Vaishnavi'){
               $rel_vaishnavi++;
               $rel_vaishnavi=$rel_vaishnavi;
           }
        //   gender
           if($val['gender']=='Female'){
               $femal_over_all++;
               $femal_over_all=$femal_over_all;
               if($val['assign_to']=='Aayushi'){
               $femal_aayushi++;
               $femal_aayushi=$femal_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
               $femal_vaishnavi++;
               $femal_vaishnavi=$femal_vaishnavi;
               }
           }elseif($val['gender']=='Male'){
               $male_over_all++;
               $male_over_all=$male_over_all;
               if($val['assign_to']=='Aayushi'){
               $male_aayushi++;
               $male_aayushi=$male_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
               $male_vaishnavi++;
               $male_vaishnavi=$male_vaishnavi;
               }
           }
        //   age
           if($val['age'] <'25'){
               $age_25++;
               $age_25=$age_25;
                if($val['assign_to']=='Aayushi'){
                   $age_25_aayushi++;
                   $age_25_aayushi=$age_25_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $age_25_vaishnavi++;
                   $age_25_vaishnavi=$rel_vaishnavi;
                }
           }elseif($val['age'] >='25' && $val['age'] <'35'){
               $age_25_35++;
               $age_25_35=$age_25_35;
                if($val['assign_to']=='Aayushi'){
                   $age_25_35_aayushi++;
                   $age_25_35_aayushi=$age_25_35_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $age_25_35_vaishnavi++;
                   $age_25_35_vaishnavi=$age_25_35_vaishnavi;
                }
           }elseif($val['age'] >='35' && $val['age'] <'45'){
               $age_35_45++;
               $age_35_45=$age_35_45;
                if($val['assign_to']=='Aayushi'){
                   $age_35_45_aayushi++;
                   $age_35_45_aayushi=$age_35_45_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $age_35_45_vaishnavi++;
                   $age_35_45_vaishnavi=$age_35_45_vaishnavi;
                }
           }elseif($val['age'] >='45' && $val['age'] <'55'){
               $age_45_55++;
               $age_45_55=$age_45_55;
                if($val['assign_to']=='Aayushi'){
                   $age_45_55_aayushi++;
                   $age_45_55_aayushi=$age_45_55_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $age_45_55_vaishnavi++;
                   $age_45_55_vaishnavi=$age_45_55_vaishnavi;
                }
           }elseif($val['age'] >='55'){
               $age_55++;
               $age_55=$age_55;
                if($val['assign_to']=='Aayushi'){
                   $age_55_aayushi++;
                   $age_55_aayushi=$age_55_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $age_55_vaishnavi++;
                   $age_55_vaishnavi=$age_55_vaishnavi;
                }
           }
        //   location
           if($val['country'] =='India' || $val['country'] =='101'){
               $india_all_lead++;
               $india_all_lead=$india_all_lead;
               if($val['assign_to']=='Aayushi'){
                   $india_aayushi++;
                   $india_aayushi=$india_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $india_vaishnavi++;
                   $india_vaishnavi=$india_vaishnavi;
               }
               
           }elseif($val['country'] !='India' && $val['country'] !='101' && $val['country'] !=''){
               $nri_all_lead++;
               $nri_all_lead=$nri_all_lead;
               if($val['assign_to']=='Aayushi'){
                   $nri_aayushi++;
                   $nri_aayushi=$nri_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $nri_vaishnavi++;
                   $nri_vaishnavi=$nri_vaishnavi;
               }
           }
        //   stage
            if($val['stage'] =='1'){
                $satge_1_all++;
                $satge_1_all=$satge_1_all;
                if($val['assign_to']=='Aayushi'){
                   $satge_1_aayushi++;
                   $satge_1_aayushi=$satge_1_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $satge_1_vaishnavi++;
                   $satge_1_vaishnavi=$satge_1_vaishnavi;
               }
                
            }elseif($val['stage'] =='2'){
                $satge_2_all++;
                $satge_2_all=$satge_2_all;
                if($val['assign_to']=='Aayushi'){
                   $satge_2_aayushi++;
                   $satge_2_aayushi=$satge_2_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $satge_2_vaishnavi++;
                   $satge_2_vaishnavi=$satge_2_vaishnavi;
               }
            }elseif($val['stage'] =='3'){
                $satge_3_all++;
                $satge_3_all=$satge_3_all;
                if($val['assign_to']=='Aayushi'){
                   $satge_3_aayushi++;
                   $satge_3_aayushi=$satge_3_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $satge_3_vaishnavi++;
                   $satge_3_vaishnavi=$satge_3_vaishnavi;
               }
            }elseif($val['stage'] =='4'){
                $satge_4_all++;
                $satge_4_all=$satge_4_all;
                if($val['assign_to']=='Aayushi'){
                   $satge_4_aayushi++;
                   $satge_4_aayushi=$satge_4_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $satge_4_vaishnavi++;
                   $satge_4_vaishnavi=$satge_4_vaishnavi;
               }
            }elseif($val['stage'] =='0' || $val['stage'] ==''){
                $satge_0_all++;
                $satge_0_all=$satge_0_all;
                if($val['assign_to']=='Aayushi'){
                   $satge_0_aayushi++;
                   $satge_0_aayushi=$satge_0_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $satge_0_vaishnavi++;
                   $satge_0_vaishnavi=$satge_0_vaishnavi;
               }
            }
        //   source
            if($val['SOURCE'] =='1'){
                $prime_all++;
                $prime_all=$prime_all;
                if($val['assign_to']=='Aayushi'){
                   $prime_aayushi++;
                   $prime_aayushi=$prime_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $prime_vaishnavi++;
                   $prime_vaishnavi=$prime_vaishnavi;
               }
            }elseif($val['SOURCE'] =='2'){
                $social_all++;
                $social_all=$social_all;
                if($val['assign_to']=='Aayushi'){
                   $social_aayushi++;
                   $social_aayushi=$social_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $social_vaishnavi++;
                   $social_vaishnavi=$social_vaishnavi;
               }
            }elseif($val['SOURCE'] =='3'){
                $hs_all++;
                $hs_all=$hs_all;
                if($val['assign_to']=='Aayushi'){
                   $hs_aayushi++;
                   $hs_aayushi=$hs_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $hs_vaishnavi++;
                   $hs_vaishnavi=$hs_vaishnavi;
               }
            }elseif($val['SOURCE'] =='5'){
                $others_all++;
                $others_all=$others_all;
                if($val['assign_to']=='Aayushi'){
                   $others_aayushi++;
                   $others_aayushi=$others_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $others_vaishnavi++;
                   $others_vaishnavi=$others_vaishnavi;
               }
            }elseif($val['SOURCE'] =='6'){
                $web_all++;
                $web_all=$web_all;
                if($val['assign_to']=='Aayushi'){
                   $web_aayushi++;
                   $web_aayushi=$web_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $web_vaishnavi++;
                   $web_vaishnavi=$web_vaishnavi;
               }
            }elseif($val['SOURCE'] =='7'){
                $refereal_all++;
                $refereal_all=$refereal_all;
                if($val['assign_to']=='Aayushi'){
                   $refereal_aayushi++;
                   $refereal_aayushi=$refereal_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $refereal_vaishnavi++;
                   $refereal_vaishnavi=$refereal_vaishnavi;
               }
            }elseif($val['SOURCE'] =='8'){
                $regi_all++;
                $regi_all=$regi_all;
                if($val['assign_to']=='Aayushi'){
                   $regi_aayushi++;
                   $regi_aayushi=$regi_aayushi;
                }elseif($val['assign_to']=='Vaishnavi'){
                   $regi_vaishnavi++;
                   $regi_vaishnavi=$regi_vaishnavi;
               }
            }
           
           if($val['lead_type']=='NEW'){
               $fresh_all++;
               $fresh_all=$fresh_all;
               if($val['assign_to']=='Aayushi'){
                   $fresh_aayushi++;
                   $fresh_aayushi=$fresh_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $fresh_vaishnavi++;
                   $fresh_vaishnavi=$fresh_vaishnavi;
               }
           }else{
               $old_all++;
               $old_all=$old_all;
               if($val['assign_to']=='Aayushi'){
                   $old_aayushi++;
                   $old_aayushi=$old_aayushi;
               }elseif($val['assign_to']=='Vaishnavi'){
                   $old_vaishnavi++;
                   $old_vaishnavi=$old_vaishnavi;
               }
           }
           
       }
       
        $relevent_lead_sale =$this->mis_model->relevent_lead_sale();
        foreach($relevent_lead_sale as $key1=>$val1){
           $rel_all_sale++;
           $rel_all_sale=$rel_all_sale;
           $gender =explode("||",$val1['user_data'])[0];
            $age =explode("||",$val1['user_data'])[1];
            $country =explode("||",$val1['user_data'])[2];
           if($val1['assign_to']=='Aayushi'){
               $rel_all_sale_aayushi++;
               $rel_all_sale_aayushi=$rel_all_sale_aayushi;
           }elseif($val1['assign_to']=='Vaishnavi'){
               $rel_all_sale_vaishnavi++;
               $rel_all_sale_vaishnavi=$rel_all_sale_vaishnavi;
           }
           
           //   gender
           if($gender=='Female'){
               $femal_over_all_sale++;
               $femal_over_all_sale=$femal_over_all_sale;
               $femal_over_all_days = $femal_over_all_days+$val1['days'];
               if($val1['assign_to']=='Aayushi'){
               $femal_sale_aayushi++;
               $femal_sale_aayushi=$femal_sale_aayushi;
               $femal_days_aayushi=$femal_days_aayushi+$val1['days'];
               }elseif($val1['assign_to']=='Vaishnavi'){
               $femal_sale_vaishnavi++;
              $femal_sale_vaishnavi=$femal_sale_vaishnavi;
               $femal_days_vaishnavi=$femal_days_vaishnavi+$val1['days'];
               }
           }elseif($gender=='Male'){
               $male_over_all_sale++;
               $male_over_all_sale=$male_over_all_sale;
               $male_over_all_days = $male_over_all_days+$val1['days'];
               if($val1['assign_to']=='Aayushi'){
               $male_sale_aayushi++;
               $male_sale_aayushi=$male_sale_aayushi;
               $male_days_aayushi=$male_days_aayushi+$val1['days'];
               }elseif($val1['assign_to']=='Vaishnavi'){
               $male_sale_vaishnavi++;
               $male_sale_vaishnavi=$male_sale_vaishnavi;
               $male_days_vaishnavi=$male_days_vaishnavi+$val1['days'];
               }
           }
        //   age
           if($age <'25'){
               $age_sale_25++;
               $age_sale_25=$age_sale_25;
               $age_sale_25_days = $age_sale_25_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $age_sale_25_aayushi++;
                   $age_sale_25_aayushi=$age_sale_25_aayushi;
                   $age_sale_25_days_aayushi = $age_sale_25_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $age_sale_25_vaishnavi++;
                   $age_sale_25_vaishnavi=$age_sale_25_vaishnavi;
                   $age_sale_25_days_vaishnavi = $age_sale_25_days_vaishnavi+$val1['days'];
                }
           }elseif($age >='25' && $age <'35'){
               $age_sale_25_35++;
               $age_sale_25_35=$age_sale_25_35;
               $age_sale_25_35_days = $age_sale_25_35_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $age_sale_25_35_aayushi++;
                   $age_sale_25_35_aayushi=$age_sale_25_35_aayushi;
                   $age_sale_25_35_days_aayushi = $age_sale_25_35_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $age_sale_25_35_vaishnavi++;
                   $age_sale_25_35_vaishnavi=$age_sale_25_35_vaishnavi;
                   $age_sale_25_35_days_vaishnavi = $age_sale_25_35_days_vaishnavi+$val1['days'];
                }
           }elseif($age >='35' && $age <'45'){
               $age_sale_35_45++;
               $age_sale_35_45=$age_sale_35_45;
               $age_sale_35_45_days = $age_sale_35_45_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $age_sale_35_45_aayushi++;
                   $age_sale_35_45_aayushi=$age_sale_35_45_aayushi;
                   $age_sale_35_45_days_aayushi = $age_sale_35_45_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $age_sale_35_45_vaishnavi++;
                   $age_sale_35_45_vaishnavi=$age_sale_35_45_vaishnavi;
                   $age_sale_35_45_days_vaishnavi = $age_sale_35_45_days_vaishnavi+$val1['days'];
                }
           }elseif($age >='45' && $age <'55'){
               $age_sale_45_55++;
               $age_sale_45_55=$age_sale_45_55;
               $age_sale_45_55_days = $age_sale_45_55_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $age_sale_45_55_aayushi++;
                   $age_sale_45_55_aayushi=$age_sale_45_55_aayushi;
                   $age_sale_45_55_days_aayushi = $age_sale_45_55_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $age_sale_45_55_vaishnavi++;
                   $age_sale_45_55_vaishnavi=$age_sale_45_55_vaishnavi;
                   $age_sale_45_55_days_vaishnavi = $age_sale_45_55_days_vaishnavi+$val1['days'];
                }
           }elseif($age >='55'){
               $age_sale_55++;
               $age_sale_55=$age_sale_55;
               $age_sale_55_days = $age_sale_55_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $age_sale_55_aayushi++;
                   $age_sale_55_aayushi=$age_sale_55_aayushi;
                   $age_sale_55_days_aayushi = $age_sale_55_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $age_sale_55_vaishnavi++;
                   $age_sale_55_vaishnavi=$age_sale_55_vaishnavi;
                   $age_sale_55_days_vaishnavi = $age_sale_55_days_vaishnavi+$val1['days'];
                }
           }
        //   location
           if($country =='India' || $country =='101'){
               $india_sale++;
               $india_sale=$india_sale;
               $india_sale_days = $india_sale_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $india_sale_aayushi++;
                   $india_sale_aayushi=$india_sale_aayushi;
                   $india_sale_days_aayushi = $india_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $india_sale_vaishnavi++;
                   $india_sale_vaishnavi=$india_sale_vaishnavi;
                   $india_sale_days_vaishnavi = $india_sale_days_vaishnavi+$val1['days'];
                }
               
           }elseif($country !='India' && $country !='101' && $country !=''){
               $nri_sale++;
               $nri_sale=$nri_sale;
               $nri_sale_days = $nri_sale_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $nri_sale_aayushi++;
                   $nri_sale_aayushi=$nri_sale_aayushi;
                   $nri_sale_days_aayushi = $nri_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $nri_sale_vaishnavi++;
                   $nri_sale_vaishnavi=$nri_sale_vaishnavi;
                   $nri_sale_days_vaishnavi = $nri_sale_days_vaishnavi+$val1['days'];
                }
           }
        //   stage
            if($val1['stage'] =='1'){
               $satge_1_sale++;
               $satge_1_sale=$satge_1_sale;
               $satge_1_days = $satge_1_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $satge_1_sale_aayushi++;
                   $satge_1_sale_aayushi=$satge_1_sale_aayushi;
                   $satge_1_sale_days_aayushi = $satge_1_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $satge_1_sale_vaishnavi++;
                   $satge_1_sale_vaishnavi=$satge_1_sale_vaishnavi;
                   $satge_1_sale_days_vaishnavi = $satge_1_sale_days_vaishnavi+$val1['days'];
                }
                
            }elseif($val1['stage'] =='2'){
                $satge_2_sale++;
               $satge_2_sale=$satge_2_sale;
               $satge_2_days = $satge_2_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $satge_2_sale_aayushi++;
                   $satge_2_sale_aayushi=$satge_2_sale_aayushi;
                   $satge_2_sale_days_aayushi = $satge_2_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $satge_2_sale_vaishnavi++;
                   $satge_2_sale_vaishnavi=$satge_2_sale_vaishnavi;
                   $satge_2_sale_days_vaishnavi = $satge_2_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['stage'] =='3'){
                $satge_3_sale++;
               $satge_3_sale=$satge_3_sale;
               $satge_3_days = $satge_3_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $satge_3_sale_aayushi++;
                   $satge_3_sale_aayushi=$satge_3_sale_aayushi;
                   $satge_3_sale_days_aayushi = $satge_3_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $satge_3_sale_vaishnavi++;
                   $satge_3_sale_vaishnavi=$satge_3_sale_vaishnavi;
                   $satge_3_sale_days_vaishnavi = $satge_3_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['stage'] =='4'){
                $satge_4_sale++;
               $satge_4_sale=$satge_4_sale;
               $satge_4_days = $satge_4_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $satge_4_sale_aayushi++;
                   $satge_4_sale_aayushi=$satge_4_sale_aayushi;
                   $satge_4_sale_days_aayushi = $satge_4_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $satge_4_sale_vaishnavi++;
                   $satge_4_sale_vaishnavi=$satge_4_sale_vaishnavi;
                   $satge_4_sale_days_vaishnavi = $satge_4_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['stage'] =='0' || $val1['stage'] ==''){
                $satge_0_sale++;
               $satge_0_sale=$satge_0_sale;
               $satge_0_days = $satge_0_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $satge_0_sale_aayushi++;
                   $satge_0_sale_aayushi=$satge_0_sale_aayushi;
                   $satge_0_sale_days_aayushi = $satge_0_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $satge_0_sale_vaishnavi++;
                   $satge_0_sale_vaishnavi=$satge_0_sale_vaishnavi;
                   $satge_0_sale_days_vaishnavi = $satge_0_sale_days_vaishnavi+$val1['days'];
                }
            }
        //   source
            if($val1['SOURCE'] =='1'){
                $prime_sale++;
               $prime_sale=$prime_sale;
               $prime_days = $prime_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $prime_sale_aayushi++;
                   $prime_sale_aayushi=$prime_sale_aayushi;
                   $prime_sale_days_aayushi = $prime_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $prime_sale_vaishnavi++;
                   $prime_sale_vaishnavi=$prime_sale_vaishnavi;
                   $prime_sale_days_vaishnavi = $prime_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['SOURCE'] =='2'){
                $social_sale++;
               $social_sale=$social_sale;
               $social_days = $social_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $social_sale_aayushi++;
                   $social_sale_aayushi=$social_sale_aayushi;
                   $social_sale_days_aayushi = $social_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $social_sale_vaishnavi++;
                   $social_sale_vaishnavi=$satge_0_sale_vaishnavi;
                   $social_sale_days_vaishnavi = $social_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['SOURCE'] =='3'){
                $hs_sale++;
               $hs_sale=$hs_sale;
               $hs_days = $hs_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $hs_sale_aayushi++;
                   $hs_sale_aayushi=$hs_sale_aayushi;
                   $hs_sale_days_aayushi = $hs_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $hs_sale_vaishnavi++;
                   $hs_sale_vaishnavi=$hs_sale_vaishnavi;
                   $hs_sale_days_vaishnavi = $hs_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['SOURCE'] =='5'){
                $others_sale++;
               $others_sale=$others_sale;
               $others_days = $others_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $others_sale_aayushi++;
                   $others_sale_aayushi=$others_sale_aayushi;
                   $others_sale_days_aayushi = $others_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $others_sale_vaishnavi++;
                   $others_sale_vaishnavi=$others_sale_vaishnavi;
                   $others_sale_days_vaishnavi = $others_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['SOURCE'] =='6'){
                $web_sale++;
               $web_sale=$web_sale;
               $web_days = $web_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $web_sale_aayushi++;
                   $web_sale_aayushi=$web_sale_aayushi;
                   $web_sale_days_aayushi = $web_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $web_sale_vaishnavi++;
                   $web_sale_vaishnavi=$web_sale_vaishnavi;
                   $web_sale_days_vaishnavi = $web_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['SOURCE'] =='7'){
                $refereal_sale++;
               $refereal_sale=$refereal_sale;
               $refereal_days = $refereal_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $refereal_sale_aayushi++;
                   $refereal_sale_aayushi=$refereal_sale_aayushi;
                   $refereal_sale_days_aayushi = $refereal_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $refereal_sale_vaishnavi++;
                   $refereal_sale_vaishnavi=$refereal_sale_vaishnavi;
                   $refereal_sale_days_vaishnavi = $refereal_sale_days_vaishnavi+$val1['days'];
                }
            }elseif($val1['SOURCE'] =='8'){
                $regi_sale++;
               $regi_sale=$regi_sale;
               $regi_days = $regi_days+$val1['days'];
                if($val1['assign_to']=='Aayushi'){
                   $regi_sale_aayushi++;
                   $regi_sale_aayushi=$regi_sale_aayushi;
                   $regi_sale_days_aayushi = $regi_sale_days_aayushi+$val1['days'];
                }elseif($val1['assign_to']=='Vaishnavi'){
                   $regi_sale_vaishnavi++;
                   $regi_sale_vaishnavi=$regi_sale_vaishnavi;
                   $regi_sale_days_vaishnavi = $regi_sale_days_vaishnavi+$val1['days'];
                }
            }
           
           if($val1['lead_type'] =='NEW'){
               $fresh_sale++;
               $fresh_sale=$fresh_sale;
               if($val1['assign_to']=='Aayushi'){
                   $fresh_sale_aayushi++;
                   $fresh_sale_aayushi=$fresh_sale_aayushi;
               }elseif($val1['assign_to']=='Vaishnavi'){
                   $fresh_sale_vaishnavi++;
                   $fresh_sale_vaishnavi=$fresh_sale_vaishnavi;
               }
           }else{
               $old_sale++;
               $old_sale=$old_sale;
               if($val1['assign_to']=='Aayushi'){
                   $old_sale_aayushi++;
                   $old_sale_aayushi=$old_sale_aayushi;
               }elseif($val1['assign_to']=='Vaishnavi'){
                   $old_sale_vaishnavi++;
                   $old_sale_vaishnavi=$old_sale_vaishnavi;
               }
           }
           
       }
        $lead_consultation =$this->mis_model->lead_consultation();
        foreach($lead_consultation as $key1=>$val2){
           $consult_all++;
           $consult_all=$consult_all;
           if($val2['assign_to']=='Aayushi'){
               $consult_aayushi++;
               $consult_aayushi=$consult_aayushi;
           }elseif($val2['assign_to']=='Vaishnavi'){
               $consult_vaishnavi++;
               $consult_vaishnavi=$consult_vaishnavi;
           }
       }
        $lead_consultation_sale =$this->mis_model->lead_consultation_sale();
        foreach($lead_consultation_sale as $key3=>$val3){
           $consult_sale++;
           $consult_sale=$consult_sale;
           if($val3['assign_to']=='Aayushi'){
               $consult_sale_aayushi++;
               $consult_sale_aayushi=$consult_sale_aayushi;
           }elseif($val3['assign_to']=='Vaishnavi'){
               $consult_sale_vaishnavi++;
               $consult_sale_vaishnavi=$consult_sale_vaishnavi;
           }
       }
       
       
        $data['rel_all']=$rel_all;
        $data['rel_all_sale']=$rel_all_sale;
        $data['rel_aayushi']=$rel_aayushi;
        $data['rel_all_sale_aayushi']=$rel_all_sale_aayushi;
        $data['rel_vaishnavi']=$rel_vaishnavi;
        $data['rel_all_sale_vaishnavi']=$rel_all_sale_vaishnavi;
        $data['fresh_all']=$fresh_all;
        $data['fresh_sale']=$fresh_sale;
        $data['fresh_aayushi']=$fresh_aayushi;
        $data['fresh_sale_aayushi']=$fresh_sale_aayushi;
        $data['fresh_vaishnavi']=$fresh_vaishnavi;
        $data['fresh_sale_vaishnavi']=$fresh_sale_vaishnavi;
        $data['old_all']=$old_all;
        $data['old_sale']=$old_sale;
        $data['old_aayushi']=$old_aayushi;
        $data['old_sale_aayushi']=$old_sale_aayushi;
        $data['old_vaishnavi']=$old_vaishnavi;
        $data['old_sale_vaishnavi']=$old_sale_vaishnavi;
        $data['consult_all']=$consult_all;
        $data['consult_sale']=$consult_sale;
        $data['consult_aayushi']=$consult_aayushi;
        $data['consult_sale_aayushi']=$consult_sale_aayushi;
        $data['consult_vaishnavi']=$consult_vaishnavi;
        $data['consult_sale_vaishnavi']=$consult_sale_vaishnavi;
       
        $data['male_over_all']= 691; //$male_over_all;
        $data['male_over_all_sale']= 409; //$male_over_all_sale;
        $data['male_over_all_days']= 37;  //$male_over_all_days;

        $data['male_aayushi']=$male_aayushi;
        $data['male_sale_aayushi']=$male_sale_aayushi;
        $data['male_days_aayushi']=$male_days_aayushi;

        $data['male_vaishnavi']=$male_vaishnavi;
        $data['male_sale_vaishnavi']=$male_sale_vaishnavi;
        $data['male_days_vaishnavi']=$male_days_vaishnavi;
        
        $data['femal_over_all']= 3524; //$femal_over_all;
        $data['femal_over_all_sale']= 1262; //$femal_over_all_sale;
        $data['femal_over_all_days']= 86; //$femal_over_all_days;

        $data['femal_aayushi']=$femal_aayushi;
        $data['femal_sale_aayushi']=$femal_sale_aayushi;
        $data['femal_days_aayushi']=$femal_days_aayushi;

        $data['femal_vaishnavi']=$femal_vaishnavi;
        $data['femal_sale_vaishnavi']=$femal_sale_vaishnavi;
        $data['femal_days_vaishnavi']=$femal_days_vaishnavi;

        // <!-- age -->
        $data['age_25']=  784;  //$age_25;
        $data['age_sale_25']= 197; //$age_sale_25;
        $data['age_sale_25_days']= 38; //$age_sale_25_days;

        $data['age_25_aayushi']=$age_25_aayushi;
        $data['age_sale_25_aayushi']=$age_sale_25_aayushi;
        $data['age_sale_25_days_aayushi']=$age_sale_25_days_aayushi;

        $data['age_25_vaishnavi']=$age_25_vaishnavi;
        $data['age_sale_25_vaishnavi']=$age_sale_25_vaishnavi;
        $data['age_sale_25_days_vaishnavi']=$age_sale_25_days_vaishnavi;
        
        $data['age_25_35']=  1093; //$age_25_35;
        $data['age_sale_25_35']=  385;  //$age_sale_25_35;
        $data['age_sale_25_35_days']=  60; //$age_sale_25_35_days;

        $data['age_25_35_aayushi']=$age_25_35_aayushi;
        $data['age_sale_25_35_aayushi']=$age_sale_25_35_aayushi;
        $data['age_sale_25_35_days_aayushi']=$age_sale_25_35_days_aayushi;
        
        $data['age_25_35_vaishnavi']=$age_25_35_vaishnavi;
        $data['age_sale_25_35_vaishnavi']=$age_sale_25_35_vaishnavi;
        $data['age_sale_25_35_days_vaishnavi']=$age_sale_25_35_days_vaishnavi;

        $data['age_35_45']= 991;//$age_35_45;
        $data['age_sale_35_45']= 611;//$age_sale_35_45;
        $data['age_sale_35_45_days']= 97;//$age_sale_35_45_days;
        
        $data['age_35_45_aayushi']=$age_35_45_aayushi;
        $data['age_sale_35_45_aayushi']=$age_sale_35_45_aayushi;
        $data['age_sale_35_45_days_aayushi']=$age_sale_35_45_days_aayushi;
        
        $data['age_35_45_vaishnavi']=$age_35_45_vaishnavi;
        $data['age_sale_35_45_vaishnavi']=$age_sale_35_45_vaishnavi;
        $data['age_sale_35_45_days_vaishnavi']=$age_sale_35_45_days_vaishnavi;

        $data['age_45_55']= 324; //$age_45_55;
        $data['age_sale_45_55']= 373; //$age_sale_45_55;
        $data['age_sale_45_55_days']= 72; //$age_sale_45_55_days;
        
        $data['age_45_55_aayushi']=$age_45_55_aayushi;
        $data['age_sale_45_55_aayushi']=$age_sale_45_55_aayushi;
        $data['age_sale_45_55_days_aayushi']=$age_sale_45_55_days_aayushi;
        
        $data['age_45_55_vaishnavi']=$age_45_55_vaishnavi;
        $data['age_sale_45_55_vaishnavi']=$age_sale_45_55_vaishnavi;
        $data['age_sale_45_55_days_vaishnavi']=$age_sale_45_55_days_vaishnavi;

        $data['age_55']= 78; //$age_55;
        $data['age_sale_55']= 105; //$age_sale_55;
        $data['age_sale_55_days']= 72; //$age_sale_55_days;
        
        $data['age_55_aayushi']=$age_55_aayushi;
        $data['age_sale_55_aayushi']=$age_sale_55_aayushi;
        $data['age_sale_55_days_aayushi']=$age_sale_55_days_aayushi;
        
        $data['age_55_vaishnavi']=$age_55_vaishnavi;
        $data['age_sale_55_vaishnavi']=$age_sale_55_vaishnavi;
        $data['age_sale_55_days_vaishnavi']=$age_sale_55_days_vaishnavi;
        
        // <!-- location -->
        $data['india_all_lead']= 3651; //$india_all_lead;
        $data['india_sale']=  978; //$india_sale;
        $data['india_sale_days']= 91; //$india_sale_days;
        
        $data['india_aayushi']=$india_aayushi;
        $data['india_sale_aayushi']=$india_sale_aayushi;
        $data['india_sale_days_aayushi']=$india_sale_days_aayushi;
        
        $data['india_vaishnavi']=$india_vaishnavi;
        $data['india_sale_vaishnavi']=$india_sale_vaishnavi;
        $data['india_sale_days_vaishnavi']=$india_sale_days_vaishnavi;
        
        $data['nri_all_lead']= 1657; //$nri_all_lead;
        $data['nri_sale']=  693; //$nri_sale;
        $data['nri_sale_days']=  49; //$nri_sale_days;
        
        $data['nri_aayushi']=$nri_aayushi;
        $data['nri_sale_aayushi']=$nri_sale_aayushi;
        $data['nri_sale_days_aayushi']=$nri_sale_days_aayushi;
        
        $data['nri_vaishnavi']=$nri_vaishnavi;
        $data['nri_sale_vaishnavi']=$nri_sale_vaishnavi;
        $data['nri_sale_days_vaishnavi']=$nri_sale_days_vaishnavi;
        
        // <!-- stage -->
        $data['satge_1_all']= 278; //$satge_1_all;
        $data['satge_1_sale']= 43; //$satge_1_sale;
        $data['satge_1_days']= 237; //$satge_1_days;

        $data['satge_1_aayushi']=$satge_1_aayushi;
        $data['satge_1_sale_aayushi']=$satge_1_sale_aayushi;
        $data['satge_1_sale_days_aayushi']=$satge_1_sale_days_aayushi;
       
        $data['satge_1_vaishnavi']=$satge_1_vaishnavi;
         $data['satge_1_sale_vaishnavi']=$satge_1_sale_vaishnavi;
        $data['satge_1_sale_days_vaishnavi']=$satge_1_sale_days_vaishnavi;

        $data['satge_2_all']=   386;//$satge_2_all;
        $data['satge_2_sale']=26;//$satge_2_sale;
        $data['satge_2_days']= 113;//$satge_2_days;
        
        $data['satge_2_aayushi']=$satge_2_aayushi;
        $data['satge_2_sale_aayushi']=$satge_2_sale_aayushi;
        $data['satge_2_sale_days_aayushi']=$satge_2_sale_days_aayushi;
        
        $data['satge_2_vaishnavi']=$satge_2_vaishnavi;
        $data['satge_2_sale_vaishnavi']= !empty($satge_2_sale_vaishnavi)?$satge_2_sale_vaishnavi:0;
        $data['satge_2_sale_days_vaishnavi']=!empty($satge_2_sale_days_vaishnavi)?$satge_2_sale_days_vaishnavi:0;

        $data['satge_3_all']= 845;//$satge_3_all;
        $data['satge_3_sale']=92;//$satge_3_sale;
        $data['satge_3_days']=167;//$satge_3_days;
        
        $data['satge_3_aayushi']=$satge_3_aayushi;
        $data['satge_3_sale_aayushi']=$satge_3_sale_aayushi;
        $data['satge_3_sale_days_aayushi']=$satge_3_sale_days_aayushi;
        
        $data['satge_3_vaishnavi']=$satge_3_vaishnavi;
        $data['satge_3_sale_vaishnavi']=$satge_3_sale_vaishnavi;
        $data['satge_3_sale_days_vaishnavi']=$satge_3_sale_days_vaishnavi;

        $data['satge_4_all']= 1700;//$satge_4_all;
        $data['satge_4_sale']=250;//$satge_4_sale;
        $data['satge_4_days']=89;//$satge_4_days;
        
        $data['satge_4_aayushi']=$satge_4_aayushi;
        $data['satge_4_sale_aayushi']=$satge_4_sale_aayushi;
        $data['satge_4_sale_days_aayushi']=$satge_4_sale_days_aayushi;
        
        $data['satge_4_vaishnavi']=$satge_4_vaishnavi;
        $data['satge_4_sale_vaishnavi']=$satge_4_sale_vaishnavi;
        $data['satge_4_sale_days_vaishnavi']=$satge_4_sale_days_vaishnavi;

        $data['satge_0_all']=3199;//$satge_0_all;
        $data['satge_0_sale']=1260;//$satge_0_sale;
        $data['satge_0_days']=57;//$satge_0_days;
        
        $data['satge_0_aayushi']=$satge_0_aayushi;
        $data['satge_0_sale_aayushi']=$satge_0_sale_aayushi;
        $data['satge_0_sale_days_aayushi']=$satge_0_sale_days_aayushi;
        
        $data['satge_0_vaishnavi']=$satge_0_vaishnavi;
        $data['satge_0_sale_vaishnavi']=$satge_0_sale_vaishnavi;
        $data['satge_0_sale_days_vaishnavi']=$satge_0_sale_days_vaishnavi;

        // <!-- source -->
        $data['prime_all']=851;//$prime_all;
        $data['prime_sale']=259;//$prime_sale;
        $data['prime_days']=46;//$prime_days;
        
        $data['prime_aayushi']=$prime_aayushi;
        $data['prime_sale_aayushi']=$prime_sale_aayushi;
        $data['prime_sale_days_aayushi']=$prime_sale_days_aayushi;
        
        $data['prime_vaishnavi']=$prime_vaishnavi;
        $data['prime_sale_vaishnavi']=$prime_sale_vaishnavi;
        $data['prime_sale_days_vaishnavi']=$prime_sale_days_vaishnavi;

        $data['social_all']=752;//$social_all;
        $data['social_sale']=130;$social_sale;
        $data['social_days']=126;//$social_days;
        
        $data['social_aayushi']=$social_aayushi;
        $data['social_sale_aayushi']=$social_sale_aayushi;
        $data['social_sale_days_aayushi']=$social_sale_days_aayushi;
        
        $data['social_vaishnavi']=$social_vaishnavi;
        $data['social_sale_vaishnavi']=$social_sale_vaishnavi;
        $data['social_sale_days_vaishnavi']=$social_sale_days_vaishnavi;

        $data['hs_all']=2812;//$hs_all;
        $data['hs_sale']=307;//$hs_sale;
        $data['hs_days']=134;//$hs_days;
        
        $data['hs_aayushi']=$hs_aayushi;
        $data['hs_sale_aayushi']=$hs_sale_aayushi;
        $data['hs_sale_days_aayushi']=$hs_sale_days_aayushi;
        
        $data['hs_vaishnavi']=$hs_vaishnavi;
        $data['hs_sale_vaishnavi']=$hs_sale_vaishnavi;
        $data['hs_sale_days_vaishnavi']=$hs_sale_days_vaishnavi;

        $data['others_all']= 1867;//$others_all;
        $data['others_sale']=946;//$others_sale;
        $data['others_days']=50;//$others_days;
        
        $data['others_aayushi']=$others_aayushi;
        $data['others_sale_aayushi']=$others_sale_aayushi;
        $data['others_sale_days_aayushi']=$others_sale_days_aayushi;
        
        $data['others_vaishnavi']=$others_vaishnavi;
        $data['others_sale_vaishnavi']=$others_sale_vaishnavi;
        $data['others_sale_days_vaishnavi']=$others_sale_days_vaishnavi;

        $data['web_all']=126;//$web_all;
        $data['web_sale']=29;//$web_sale;
        $data['web_days']=219;//$web_days;
        
        $data['web_aayushi']=$web_aayushi;
        $data['web_sale_aayushi']=$web_sale_aayushi;
        $data['web_sale_days_aayushi']=$web_sale_days_aayushi;
        
        $data['web_vaishnavi']=$web_vaishnavi;
        $data['web_sale_vaishnavi']=$web_sale_vaishnavi;
        $data['web_sale_days_vaishnavi']=$web_sale_days_vaishnavi;

        $data['refereal_all']=$refereal_all;
        $data['refereal_sale']=$refereal_sale;
        $data['refereal_days']=$refereal_days;
        
        $data['refereal_aayushi']=$refereal_aayushi;
        $data['refereal_sale_aayushi']=$refereal_sale_aayushi;
        $data['refereal_sale_days_aayushi']=$refereal_sale_days_aayushi;
        
        $data['refereal_vaishnavi']=$refereal_vaishnavi;
        $data['refereal_sale_vaishnavi']=$refereal_sale_vaishnavi;
        $data['refereal_sale_days_vaishnavi']=$refereal_sale_days_vaishnavi;

        $data['regi_all']=$regi_all;
        $data['regi_sale']=$regi_sale;
        $data['regi_days']=$regi_days;
        
        $data['regi_aayushi']=$regi_aayushi;
        $data['regi_sale_aayushi']=$regi_sale_aayushi;
        $data['regi_sale_days_aayushi']=$regi_sale_days_aayushi;
        
        $data['regi_vaishnavi']=$regi_vaishnavi;
        $data['regi_sale_vaishnavi']=$regi_sale_vaishnavi;
        $data['regi_sale_days_vaishnavi']=$regi_sale_days_vaishnavi;
        // echo"<pre>";
        // print_r($data);
        // exit;
        
        echo json_encode($data);
    }
    
    
    
    //================================================== avinash added for heat map inside sale======================================================================
    
}