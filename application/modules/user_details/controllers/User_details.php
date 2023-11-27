<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_details extends MX_Controller 
{
    // start of class

    public function __construct() 
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('user_details_model');
        $this->load->library('commonquery');
        $this->load->library(['query']);
        $this->load->model('faq/faq_model');
        $this->mentor_id=$this->session->balance_session['admin_id'];
    
        if($this->login->check_if_logged_in() === FALSE)
        {
            redirect(''); 
        }

    }
    
         public function addWallet() {
        // Get form data from POST
        $wallet_data = array(
            'amount' => $this->input->post('wallet_amount'),
            'suggested_description' => $this->input->post('suggested_description'),
            'description' => $this->input->post('description'),
            'user_email' => $this->input->post('email_id'),
            'uid' => $this->input->post('user_id'),
            'status' => 'approved',
            'is_approve' => 1,
        );
    
        $inserted = $this->user_details_model->insert_wallet_data($wallet_data);
    
        
        if ($inserted) {
             $this->user_details_model->update_wallet_in_register($this->input->post('email_id'), $this->input->post('amount'));
            echo json_encode(['status' => 'success', 'message' => 'Wallet added successfully']);
        } else {
            
            echo json_encode(['status' => 'error', 'message' => 'Failed to add wallet']);
        }
    }
    public function index()
    {
    	error_reporting(0);
        $data['title'] = "User Details List";
        if(!isset($_GET['user_email']) && !isset($_GET['user_status'])){
            $data['details_exist']=0;
        }else{
            $status = $_GET['user_status'];
            $email = $_GET['user_email'];
            
            $data['primary_source'] = $this->commonquery->primarySourceHistory($email);
             
            $data['lead_source'] = $this->commonquery->fetchLeadSource();
            $data['lead_status'] = $this->commonquery->fetchAllStatus();
            $data['countries'] = $this->commonquery->getAllCountries();
            $data['assign_to_list'] = $this->commonquery->getCrmUser();
            // $data['lead_status'] = $this->commonquery->getRecordFromTable('bn_lead_status', array('id','status_name'),array('new_crm' => '1'), '', '');
            $data['get_user_details'] = $this->user_details_model->get_user_details($status,$email);
            
            // ************* manually create register id ****************
            //   $data['get_user_details'][0]['register_id'] = 16;
            //   ******************************************************
            
            print_r($data['get_user_details']);exit;
            $data['cont']= explode('</b>',$data['get_user_details'][0]['key_insight'])[1];
            // print_r_custom($data['get_user_details']);exit;
            $data['faqs_details']=$this->faq_model->get_all_faqs();	
    		$data['faqs_titles']=$this->faq_model->get_all_faq_titles();
    		$data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
    		
    		$data['notification_dropdown_list'] = $this->user_details_model->get_notification_dropdown_list_query();

            $data['leadsource'] = $this->user_details_model->get_leadsource($email);
            
            if(empty($data['get_user_details'])){
                $data['details_exist']=0;
            }else{
                $data['details_exist']=1;
            }
            $user_id = $this->session->balance_session['admin_id'];
            $client_id = @$data['get_user_details'][0]['id'];
            // print_r_custom($client_id);exit;
            $phone = @$data['get_user_details'][0]['phone'];
            if($_GET['user_status']=='lead' && !empty($client_id)){
                $data['user_url'] = base_url("user_details?user_email=".$email."&user_status=client");
                $data['user_type'] = "View Client Detail";
            }else{
                $data['user_url'] = base_url("user_details?user_email=".$email."&user_status=lead");
                $data['user_type'] = "View Lead Detail";
            }
            
            if(!empty($client_id))
            {
                $data['diet_details'] = $this->user_details_model->lastSentDietDetails($client_id);
                $data['client_id'] =$client_id;
                $data['user_current_status'] =$this->user_details_model->user_current_status($email,$phone);
                // print_r_custom($data['user_current_status']);exit;
                $active_order_id = $data['diet_details'][0]['order_id'];
                
                $actual_session = $data['diet_details'][0]['actual_session'];
        
                // $client_id=$data['diet_details'][0]['user_id'];
                
                // if(!empty($actual_session)){
                    $data['wmr_order_details']=$this->user_details_model->get_wmr_orderid($client_id);
                // }
                $data['weight_tracker'] = $this->user_details_model->get_weight_tracker($this->mentor_id, $client_id, array('count', 'result'));
                $data['ilt_order_details'] = $this->user_details_model->get_ilt_orderid($client_id);
                
                $data['assessment'] = $this->user_details_model->get_assessment_details($client_id);
                
                $data['inch_loss_tracker'] = $this->user_details_model->get_inch_loss_tracker($this->mentor_id, $client_id, array('count', 'result'));
        
                $data['photo_received']=$this->user_details_model->getSessionPhotoDetails($active_order_id);
            
                $data['halftime_feedback'] = $this->user_details_model->get_halftime_feedback($user_id, array(TRUE, FALSE),$client_id);
                $data['pre_maintenance_feedback'] = $this->user_details_model->get_pre_maintenance_feedback($user_id, array(TRUE, FALSE),$client_id);
                $data['final_feedback'] = $this->user_details_model->get_final_feedback($user_id, array(TRUE, FALSE),$client_id);
                
            }
        }
        // print_r_custom($data['get_user_details']);exit;
        display_view('index',$data);
    }
    
    
    // avinash addd thi for get user detail for update user detail 05-11-2021

        public function get_user_data_detail(){
            $id = $this->input->post('id');
            $status= $this->input->post('status');
            $user = $this->user_details_model->get_user_data($id);
             $data['get_user_details'] = $this->user_details_model->get_user_details($status,$user[0]['email']);
            //  echo"<pre>";
            //  print_r($data);
            //  die;
            echo json_encode($data);
        }    
        
        
        // avinash add this for usercurrent status 10-11-2021
     public function update_lead_deatils(){
        //  print_r_custom($_POST);
        //  exit;
        // $data['id'] = trim($this->input->post('id'));
        $stage = trim($this->input->post('stage'));
        $lead_id =trim($this->input->post('id'));
        $old_email_id_details = trim($this->input->post('old_email_id_details'));
        // $data['old_email_id_details'] = trim($this->input->post('old_email_id_details'));
        $data['fname'] = trim($this->input->post('lead_first_name'));
        $gender = trim($this->input->post('gender'));
        $data['email'] = trim($this->input->post('lead_email_id'));
        $data['country'] = trim($this->input->post('lead_country'));
        $data['enquiry_from'] = trim($this->input->post('lead_source_id'));
        $data['state'] = trim($this->input->post('lead_state_name'));
        $data['city'] = trim($this->input->post('lead_city_name'));
        $lead_weight_kg = trim($this->input->post('lead_weight_kg'));
        $lead_weight_grm = trim($this->input->post('lead_weight_grm'));
        $data['weight'] = $lead_weight_kg.'.'.$lead_weight_grm;
        $lead_height_ft = trim($this->input->post('lead_height_ft'));
        $lead_height_in = trim($this->input->post('lead_height_in'));
        $data['height'] = $lead_height_ft.'.'.$lead_height_in;
        $data['inch'] = trim($this->input->post('lead_height_in'));
        $data['age'] =trim($this->input->post('age'));
        $data['phone'] =trim($this->input->post('phone'));
        if($data['weight']!=""){
                        (int)$curr_wt = $data['weight'];
                    }else{
                        (int)$curr_wt = "";
                    }
                    (int)$wt = $this->ideal_weight_calc($lead_height_ft,$gender,$lead_height_in);  //avinash added this for stage  define
                    // $stage = $this->nina_stages($source,$status,$this->input->post('phone'));
                //   $weigh= $this->input->post('weight');
                    (int)$weight = $curr_wt;  //avinash added this for stage  define
                    $weight_difference = abs((int)$weight-(int)$wt);
                    if($weight_difference >=15){
                        $stage = 4;
                    }elseif($weight_difference >=7 && $weight_difference < 15){
                        $stage = 3;
                    }elseif($weight_difference >=2 && $weight_difference < 7){
                        $stage = 2;
                    }else{
                        $stage = 1;
                    }
                    $data['stage'] =$stage;
        $resultSet = $this->user_details_model->update_lead_deatils($lead_id,$data,$old_email_id_details);
        echo $resultSet;
    }
    
    // avinash added this for ideal weight
    public function ideal_weight_calc($_fheight ='',$gender='',$_iheight=0){
               // calculate ideal weight : Start
                
                $_gender =  trim(strtolower($gender));
                //  $_iheight = ($_iheight < 1 ? 1 : $_iheight);
                
                (int)$wt = 0;
                $weight_inches = ((int)$_fheight * 12) + (int)$_iheight;
                $base_inches = 48;
                $multiply_inches = $weight_inches - $base_inches;

                // Reference : http://www.calculator.net/ideal-weight-calculator.html
                // J. D. Robinson Formula (1983)
                // 52 kg + 1.9 kg per inch over 5 feet       (man)
                // 49 kg + 1.7 kg per inch over 5 feet       (woman)
                // D. R. Miller Formula (1983)
                // 56.2 kg + 1.41 kg per inch over 5 feet       (man)
                // 53.1 kg + 1.36 kg per inch over 5 feet       (woman)

                if($_fheight >= 5 ) {

                    $new_iheight = ( ( $_fheight - 5 ) * 12 ) + $_iheight;

                if ($_gender == 'male') 
                {
                            $male_weight = 52 + (1.9 * $new_iheight );
                            $wt = $male_weight;
                    }
                    else
                    {
                            $female_weight = 49 + (1.7 * $new_iheight );
                            $wt = $female_weight;
                    }
                } else {
                    if ($_gender == 'male') 
                    {
                            $male_weight = 21.94 + ($multiply_inches * 2.54);
                            $wt = $male_weight;
                    }
                    else
                    {
                            $female_weight = 16.92 + ($multiply_inches * 2.54);
                            $wt = $female_weight;
                    }
                }
                if($wt < 0) {
                    $wt = 0;
                }
               return $wt;
    } 
        
        
    
    public function get_sub_status(){
        // print_r($this->commonquery->fetchAllStatus());
        $sub_status ="";
        foreach($this->commonquery->fetchAllStatus() as $val){
         // echo $val['sub_status']."<br>"; 
          if($val['sub_status']!='0'){
              $sub_status.= $val['status_name']."|".$val['sub_status'].",";
          }
        }
        $data['sub_status'] = trim($sub_status,",");
        // print_r($data['sub_status']);
        
        echo json_encode($data);
    }

    public function update_lead_source_deatils(){
        $email_id_details = trim($this->input->post('email_id_details'));
        $lead_source_val = trim($this->input->post('lead_source_val'));
        $old_email_id_details = trim($this->input->post('old_email_id_details'));
        $resultSet = $this->user_details_model->update_lead_source_deatils($email_id_details,$lead_source_val,$old_email_id_details);
        echo $resultSet;
    }
    
    
    public function global_search(){
        $search = trim($this->input->post('term'));
        $resultSet = $this->query->global_search($search);
        echo json_encode($resultSet);
    }
    
    
    public function export_list(){
        // print_r($_GET);exit;
        $list_type = $this->input->get('type');
        $checked_elem = $this->input->get('checked_elem');
        $date_range = $this->input->get('date_range');
        //$checked_elem = '1,2,3';
        $checked_conds = explode(',',$checked_elem);
        $data = array();
        $j= 1;
        
        $today=date('d/m/Y');
            $month_start=date('01/m/Y');
            $day = date('w');
            $week_start = date('d/m/Y', strtotime('-'.($day - 1).' days'));
            
        $daterange = '';
        if($date_range == 'today'){
            $daterange = $today;
        }elseif($date_range == 'week'){
            $daterange = $week_start." - ".$today;
        }elseif($date_range == 'mtd'){
            $daterange = $month_start." - ".$today;
        }
        
        switch($list_type){
            case 'lead_list':
                // $header = "Sr No,Name,Email id,Status at visit,Current Program,Program page,Visits,Mentor name";
                $header = "Sr No,Name,Email Id,Phone, Gender,Age,Date,Consultation,Mobile Verify, Health Category,Medi. Issues,Curr. Wt.,BMI,Ideal Wt.,Source,L. Type, Status, Assign";
                $header = explode(',',$header);
                $filename = 'Lead_list '.$daterange.'.csv';
                $data = $this->lead_model->get_lead_details_data_query($checked_conds,$date_range); 
                // $this->mis_user_details_model->get_welcome_call_pending_export_data_query();
                if(count($data) > 0){
                    foreach($data as $k=>$one)
                        {
                            
                        $arr[] = array($j,
                                     $one['name'],
                                     $one['email'],
                                     $one['phone'],
                                     $one['gender'],
                                     $one['lead_age'],
                                     $one['created_date'],
                                     $one['consultation'],
                                     $one['verify'],
                                     $one['health_category'],
                                     $one['health_issues'],
                                     $one['weight'],
                                     $one['body_mass_index'],
                                     $one['ideal_weight'],
                                     $one['lead_source'],
                                     $one['lead_type'],
                                     $one['lead_status'],
                                     $one['assign_to'],
                                    );
                        $j++;            
                        }
                           
                    /*echo json_encode(array('file_name'=>$filename,'header'=>$header,'data'=>$arr));*/
                }
                export_to_csv($filename,$header,$arr); 
                break;
        }
    }
    
    
   public function update_lead_action(){
        
        //  echo "<pre>";
        //  print_r($_POST);
        //  echo "<br>";
        //  exit;
         /*
         echo $_SESSION['balance_session']['user_type'];
         //exit;*/
        
            // Array
            // (
            // [user_id] => 
            // [email_id] => api123@registries.com
            // [assign_to] => 
            // [reminder_dt] => 2021-04-21 15:30
            // [reminder_time] => 15:30
            // [followup_on] => Whatsapp
            // [fu_note] => asdf
            // [fu_call_note] => sd fgb evrfbghn
            // [action_assign_to] => 104
            // [action_assign] => consultation
            // [c_type] => contact
            // [assign_to_add] => 165
            // [status_id] => 5
            // [pay_later] => 
            // [pay_later_date] => 
            // [allow_web_access] => 
            // [notification_id] => 
            // )
        date_default_timezone_set("Asia/Kolkata");
        $get_latest_entry = $this->user_details_model->getLatestEntryByEmailId($this->input->post('email_id'));
        // $check_pending_appointment = $this->commonquery->getIdByParameter('bn_consultation_call_booking',array('id'),array('lead_id' => $get_latest_entry['id'],'call_status' => 'pending'));
        $lead_dt=$this->user_details_model->getLeadAction($_POST['email_id']);
        
        //print_r($stage);exit;
        $data_ac_final = array();
        if(!empty($_POST['c_type'])){
            if($_POST['c_type'] == 'is_c'){
            $a = array(
                'is_c'=>"1",
                'c_date'=>date("Y-m-d h:i:s")  
            );
            
                $data_ac_final = array_merge($data_ac_final, $a);
            }
            
            if($_POST['c_type'] == 'is_nc'){
            $b = array(
                'is_nc'=>"1",
                'nc_date'=>date("Y-m-d h:i:s")  
            );
            
                $data_ac_final = array_merge($data_ac_final, $b);
            }
        }
        
        
        if(!empty($_POST['is_res'])){
        $b = array(
            'is_res'=>"1",
            'res_date'=>date("Y-m-d h:i:s")  
        );
        
            $data_ac_final = array_merge($data_ac_final, $b);
        }
        // if(empty($check_pending_appointment)){
            

            if($_POST['reminder_dt']){
                $strt_date = date('Y-m-d',strtotime($_POST['reminder_dt'])).' '.date('H:i:s',strtotime($_POST['reminder_time']));
                $selectedTime = $_POST['reminder_time'];
                $end_date = date('Y-m-d',strtotime($_POST['reminder_dt'])).' '.date('H:i:s',strtotime("+15 minutes", strtotime($selectedTime)));
                 
                $d = $strt_date;
                $a = array(
                  'reminder_dt'=>$d
                );
                $data_ac_final = array_merge($data_ac_final, $a);
            }else{
                $d='0000-00-00 00:00:00';
            }
            //print_r($_POST);
            $sql_select = "SELECT admin_id FROM `admin_user` where lower(first_name) = '".strtolower($_POST['new_assign_to'])."'";
            $result_consol = $this->db->query($sql_select)->row_array();
            if(!empty($result_consol)){
                $counsellor_id_val = $result_consol['admin_id'];
            }else{
                $counsellor_id_val = 0;
            }
            $reminder_datetime = explode(' ',$_POST['reminder_dt']);
            if($d!='0000-00-00 00:00:00'){
                $slot_id = $this->commonquery->getIdByParameter('bn_book_appointment_slots',array('id'),array('start_time' => $_POST['reminder_time']));
                if($counsellor_id_val!=0){
                    $appointment_array = array(
                                                'lead_id' => $get_latest_entry['id'],
                                                'slot_id'  => $slot_id['id'],
                                                'counsellor_id' => $counsellor_id_val,
                                                'assigned_by'   => $_SESSION['balance_session']['admin_id'],
                                                'assigned_user_type'    => 'User',
                                                'previous_status'       => 'pending',
                                                'call_status'           => 'pending',
                                                'call_date'             => date('Y-m-d',strtotime($_POST['reminder_dt'])),
                                                'time_slot'             => date('H:i:s',strtotime($_POST['reminder_time'])),
                                                'added_date'            => date('Y-m-d H:i:s'),
                                                'call_type'            => '1'
                                            );
                         
                    $this->commonquery->addRecord('bn_consultation_call_booking',$appointment_array);
                }
                
                $task_master_array = array(
                                        'task_name' => 'FU On '.$_POST['followup_from'],
                                        'description'   => 'FU Scheduled',
                                        'email_id'  => $_POST['email_id'],
                                        'color'     => 'm-fc-event--primary',
                                        'remind_me' => '1',
                                        'start_date' => $strt_date,
                                        'end_date'  => $end_date,
                                        'created_by' => $_SESSION['balance_session']['admin_id'],
                                        'created_date' => date('Y-m-d H:i:s')
                                        );
                $this->commonquery->addRecord('task_master',$task_master_array);
                if($_SESSION['balance_session']['user_type']=='mentor'){
                    $task_master_array = array(
                                        'reminder_title' => 'Lead FU On : '.$_POST['followup_from'],
                                        'reminder_text'   => 'Lead FU Scheduled with : '.$_POST['email_id'],
                                        'reminder_date'  => date('Y-m-d',strtotime($_POST['reminder_dt'])),
                                        'mentor_id'     => $_SESSION['balance_session']['admin_id'],
                                        'reminder_time' => date('H:i:s',strtotime($_POST['reminder_time'])),
                                        'reminder_ack' => '0',
                                        'reminder_added'  => date('Y-m-d H:i:s')
                                        );
                                       // print_r($task_master_array);exit;
                    $this->commonquery->addRecord('mentor_reminders',$task_master_array);
                }
                
            }else{
                if($counsellor_id_val!=0){
                    $this->db->where(array('lead_id'=>$get_latest_entry['id']));
                    $this->db->update('bn_consultation_call_booking',array('counsellor_id' => $counsellor_id_val,'updated_date'=>$curdateTime));
                }
            }
            
        // }

        if(!empty($_POST['appointment_dt'])){
            $d = date('Y-m-d',strtotime($_POST['appointment_dt']));
        }else{
            $d='0000-00-00 00:00:00';
        }
        $a = array(
        'appointment_dt'=>$d
        );
        $data_ac_final = array_merge($data_ac_final, $a);
        
                
        /*if($_POST['pay_dt']){
            $d = $_POST['pay_dt'];
        }else{
            $d='0000-00-00 00:00:00';
        }*/
        $a = array(
        'pay_dt'=>'0000-00-00 00:00:00'
        );
        $data_ac_final = array_merge($data_ac_final, $a);
        
        if($_POST['fu_assigned']){
            $d = $_POST['fu_assigned'];
        }else{
            $d='';
        }
        $a = array(
        'fu_assigned'=>$d
        );
        $data_ac_final = array_merge($data_ac_final, $a);
        /*if($_POST['sub_status']){
            $d = $_POST['sub_status'];
        }else{
            $d='';
        }
        $a = array(
        'pay_type'=>$d
        );
        $data_ac_final = array_merge($data_ac_final, $a);
        */
        if($_POST['action_type']){
            $d = $_POST['action_type'];
        }else{
            $d='';
        }
        $a = array(
        'action_type'=>$d
        );
        $data_ac_final = array_merge($data_ac_final, $a);
        
        
        
        if(@$_POST['followup_from']){
            $d = $_POST['followup_from'];
        }else{
            $d='';
        }
        $a = array(
        'followup_from'=>$d
        );
        $data_ac_final = array_merge($data_ac_final, $a);
        $clear = '';
        $tags='';
        $j=0;
        if(sizeof($_POST['lifestyle'])>0){
                $status_data['lifestyle'] = implode(",",$_POST['lifestyle']);
                $tags.="<br>Lifestyle : ".implode(",",$_POST['lifestyle'])."<br>";
                $j++;
            }if(sizeof($_POST['clinical_condition'])>0){
                $status_data['clinical_condition'] = implode(",",$_POST['clinical_condition']);
                $tags.="Clinical Condition : ".implode(",",$_POST['clinical_condition'])."<br>";
                $j++;
            }if(sizeof($_POST['diet_history'])>0){
                $status_data['diet_history'] = implode(",",$_POST['diet_history']);
                $tags.="Diet History : ".implode(",",$_POST['diet_history'])."<br>";
                $j++;
            }if(!empty($_POST['age_group'])){
                $status_data['age_group'] = $_POST['age_group'];
                $j++;
            }if(!empty($_POST['target_oriented'])){
                $status_data['target_oriented'] = implode(",",$_POST['target_oriented']);
                 $tags.="Target Oriented : ".implode(",",$_POST['target_oriented'])."<br>";
                $j++;
            }if(!empty($_POST['motivational_lavel'])){
                $status_data['motivation_level'] = $_POST['motivational_lavel'];
                $tags.="Motivation Level : ".$_POST['motivational_lavel']."<br>";
                $j++;
            }
            
            if(!empty($_POST['awareness_lavel'])){
                $status_data['awareness_lavel'] = $_POST['awareness_lavel'];
                $tags.="Awareness Level : ".$_POST['awareness_lavel']."<br>";
                $j++;
            }
            
             if(!empty($_POST['Language'])){
                $status_data['Language'] = $_POST['Language'];
                $tags.="Language : ".$_POST['Language']."<br>";
                $j++;
            }
            
            if(!empty($_POST['Communication'])){
                $status_data['Communication'] = $_POST['Communication'];
                $tags.="Communication : ".$_POST['Communication']."<br>";
                $j++;
            }
            if(!empty($_POST['meal_management'])){
                 if(!empty($_POST['meal_frequency'])){
                    $status_data['meal_management'] = $_POST['meal_management'] ." > ".$_POST['meal_frequency'];
                $tags.="Meal Management : ".$_POST['meal_management']." > ". $_POST['meal_frequency'] ."<br>";
                $j++; 
                }else{
                
                $status_data['meal_management'] = $_POST['meal_management'];
                $tags.="Meal Management : ".$_POST['meal_management']."<br>";
                $j++;
                }
            }
            
            
            
            if(!empty($_POST['regional_diet'])){
                $status_data['regional_diet'] = $_POST['regional_diet'];
                $tags.="Regional Diet : ".$_POST['regional_diet']."<br>";
                $j++;
            }if(!empty($_POST['suggested_program'])){
                $status_data['suggested_program'] = $_POST['suggested_program'];
                $tags.="Suggested Program : ".$_POST['suggested_program'];
                $s_text=$_POST['suggested_program'];
                
                if($_POST['program_days']!=''){
                $tags.= " ".$_POST['program_days']."0 Days";
                $s_text.= " ".$_POST['program_days']."0 Days";
                
                }
                if($_POST['program_amount']!=''){
                  $tags.= " @ ".$_POST['program_amount'];
                  $s_text.= " @ ".$_POST['program_amount'];
                
                }
                $tags.="<br>";
               
                $data_updated = [
                    "suggested_program" => $s_text
                ];
                //print_r($get_latest_entry['id']);
                //echo $get_latest_entry." :: ".$s_text;
                $this->db->where('id',$get_latest_entry['id']);
                $this->db->update('lead_management',$data_updated);
                
                $j++;
            }
        //exit;
        if($_POST['fu_note']){
            if($lead_dt['fu_note']){
                    $clear = "\n\n";
                }
                $clear2 = "\n";
                $f_date = date("Y-m-d H:i:s"); 
                $fu_date = "<b>".date('dS M Y')."</b>";
                $fu_note = $fu_date.$clear2.$_POST['fu_note'].$clear.$lead_dt['fu_note'];
                $fu_count = $lead_dt['fu_count'] + 1;
                    $data_fu=array(
                       'is_fu'=>'1',
                       'fu_date'=>$f_date,
                       'fu_note'=>$fu_note,
                       'fu_count'=>$fu_count,
                    );
                $data_ac_final = array_merge($data_ac_final, $data_fu);
        }
            $clear = '';
            if(!empty($_POST['key_insight']) || $j>0){
                if($lead_dt['key_insight']){
                        $clear = "\n\n";
                    }
            
                    $clear2 = "\n";
                    $insight_date = "<b>".date('dS M Y')."</b>";
                    $key_insight = $insight_date.$clear2.$_POST['key_insight'].' '.$tags.$clear.$lead_dt['key_insight'];
                    $key_data=array(
                           'key_insight'=>$key_insight, 
                           'key_insight_date'=>date("Y-m-d H:i:s"),    
                        );
            
                    $data_ac_final = array_merge($data_ac_final, $key_data);
            }
            
            if($_POST['fu_other_note']){
                if($lead_dt['fu_other_note']){
                        $clear = "\n\n";
                    }
                    $clear2 = "\n";
                    $f_other_date = date("Y-m-d H:i:s");
                    $fu_other_date = "<b>".date('dS M Y')."</b>";
                    $fu_other_note = $fu_other_date.$clear2.$_POST['fu_other_note'].$clear.$lead_dt['fu_other_note'];
                    $fu_other_count = $lead_dt['fu_other_count'] + 1;
                        $data_other_fu=array(
                           'fu_other_date'=>$f_other_date,
                           'fu_other_note'=>$fu_other_note,
                           'fu_other_count'=>$fu_other_count,
                        );
                    $data_ac_final = array_merge($data_ac_final, $data_other_fu);
            }
            
            if($_POST['payment_link_option']=='yes'){
                //echo "Link creation :: <br/>";
                //print_r($get_latest_entry);exit;
                $payment_validity_date= strtotime(date('Y-m-d 23:55:00',strtotime($this->input->post('expiry_dt'))));
                $link_validity_date= date('Y-m-d 23:55:00',strtotime($this->input->post('expiry_dt')));
                $reference_id = "BAL".rand(1,100000);
                $arr = explode('-',$this->input->post('phone'));
                //echo count($arr);echo "<br><br>";
                if(count($arr)>1){
                   $contact = $this->input->post('phone');    
                   $contact = str_replace(" ","",str_replace("-","",$contact));
                }else{
                    $contact = "+91".$this->input->post('phone');
                }
                //$contact = "+91".$this->input->post('phone');
                //$contact = "+919870282723";
                $customer_name = $this->input->post('customer_name');
                //$customer_name = "Rahil S";
                $email = $this->input->post('email_id');
                //$email = "sanjay.gupta@balancenutrition.in";
                $amount = $this->input->post('program_amount')*100;
                // echo "<pre>";
                // print_r($_POST);
                // die();
                 
                 $curl = curl_init();
                
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api.razorpay.com/v1/payment_links',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>'{ 
                      "amount": '.$amount.',
                      "currency": "INR",
                      "accept_partial": false,
                      "expire_by": '.$payment_validity_date.',
                      "reference_id": "'.$reference_id.'",
                      "description": "Payment for '.$_POST['suggested_program'].'('.$_POST['program_days'].'0 Days). Email : ('.$email.')",
                      "customer": {
                        "name": "'.$customer_name.'",
                        
                        "email": "'.$email.'"
                      },
                      "notify": {
                        "sms": true,
                        "email": true
                      },
                      "reminder_enable": false,
                      "notes": {
                        "policy_name": "'.$_POST['suggested_program'].'"
                      },
                      "callback_url": "https://balancenutrition.in/",
                      "callback_method": "get"
                    }',
                
                //Start For Test Crendentials
                  /*     CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic cnpwX3Rlc3RfRDhhU0JrbUt4Z1NpczA6NjVlRUE4ZUdMNTdUWXE4UUw3cTFQSE5N',
                        'Content-Type: application/json'
                      ),*/
                // End For Test Credentials 
                     
                //Start For Live Credentials
                      CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic cnpwX2xpdmVfNmNTdDRPNkdTMFJMSGU6ZzJHbmlzOElTVHhoNXZFRE1qTjdHVmxU',
                        'Content-Type: application/json'
                      ),
                //End For Live Credentials
                      
                    ));
                
                    $response = curl_exec($curl);
                    curl_close($curl); 
                    $data = json_decode($response); 
                    $payment_url =  $data->short_url;
                    
                    $now = time(); // or your date as well
                    $your_date = strtotime($link_validity_date);
                    $datediff = $now - $your_date;
                    
                    $days_diff =  round($datediff / (60 * 60 * 24));
                    

                    $this->session->set_flashdata('payment_link',$payment_url);
                    $this->session->set_flashdata('program',$_POST['suggested_program']);
                    $this->session->set_flashdata('days',$_POST['program_days']);
                    $this->session->set_flashdata('amount',$this->input->post('program_amount'));
                    $this->session->set_flashdata('expiry',date('D M Y',strtotime($link_validity_date))."which is in the next ".$days_diff." days");
                    
                    $link_details=array(
                           'name'=>$customer_name, 
                           'program_name'=>$_POST['suggested_program'], 
                           'program_duration'=>$_POST['program_days']."0 Days",
                           'amount'=>$this->input->post('program_amount'),
                           'payment_link'=>$payment_url,
                           'sales_person_id'=>$_SESSION['balance_session']['admin_id'], 
                           'email_id'=>$email, 
                           'phone'=>$contact, 
                           'created_by'=>$_SESSION['balance_session']['admin_id'], 
                           'created_date'=>date('Y-m-d H:i:s'), 
                           'expiry_date'=>date('Y-m-d H:i:s',strtotime($link_validity_date)), 
                           'link_status'=>'Unpaid'
                        );
                    $this->commonquery->addRecord('payment_link',$link_details);
                     $tags.="<br>Payment link shared(".$payment_url."), will expire on ".date('d M Y',strtotime($link_validity_date));
                    
                        
                    
                   //         echo $payment_url;exit;
                // Append msg in other FU note & Insert  
                    
    				//$other_fu = "(Link Shared(".$payment_url.") on ".$current_date.", will expire on ".$expiry_date.")";
    						
                //end for other FU note
            }
            
            if(!empty($_POST['status_name'])){
                $stage= $this->commonquery->getStage($_POST['email_id']);
                if(strtolower($_POST['status_name']) == "cold" || strtolower($_POST['status_name']) == "spam" ){
                    // $status_data = array(
                    //                 'status' => $_POST['status_name'],
                    //                 'stage' => '0',
                    //                 );
                    $status_data['status'] = $_POST['status_name'];
                    $status_data['stage'] = '0';
                    
                    $status_log = array(
                                    'email' => $_POST['email_id'],
                                    'status' => $_POST['status_name'],
                                    'stage' => '0',
                                    'created' => date('Y-m-d H:i:s'),
                                    );
                    $status_data['email'] = $_POST['email_id'];
                    $status_data['status'] = $_POST['status_name'];
                    $status_data['created'] = date('Y-m-d H:i:s');
                    $status_data['stage'] = '0';
                }else{
                    // $status_data = array(
                    //                 'status' => $_POST['status_name'],
                    //                 );
                    $status_data['status'] = $_POST['status_name'];
                    
                    $status_log = array(
                                    'email' => $_POST['email_id'],
                                    'status' => $_POST['status_name'],
                                    'stage' => $stage,
                                    'created' => date('Y-m-d H:i:s'),
                                    );
                    $status_data['email'] = $_POST['email_id'];
                    $status_data['status'] = $_POST['status_name'];
                    $status_data['created'] = date('Y-m-d H:i:s');
                    $status_data['stage'] = $stage;
                }
                if(($_POST['sub_status_value'])!='0'){
                    $sub_status = array(
                                'sub_status' => $_POST['sub_status_value'],
                                );
                    $assign_data = array(
                                'pay_type' => $_POST['sub_status_value']
                                );
                    $data_ac_final = array_merge($data_ac_final, $assign_data);
                    $status_data = array_merge($status_data, $sub_status);
                }
                //print_r($status_data);exit;
                if(($_POST['sub_status_date'])!='0'){
                    $assign_data = array(
                                'pay_dt' => date('Y-m-d',strtotime($_POST['sub_status_date']))." ".date('H:i:s')
                                );
                    $data_ac_final = array_merge($data_ac_final, $assign_data);
                    $selectedTime = date('H:i:s');
                    $endTime = strtotime("+15 minutes", strtotime($selectedTime));
                    $endTime = date('h:i:s', $endTime);   
                    $task_master_array = array(
                                        'task_name' => $_POST['sub_status_value'],
                                        'description'   => 'Call Scheduled',
                                        'email_id'  => $_POST['email_id'],
                                        'color'     => 'm-fc-event--primary',
                                        'remind_me' => '1',
                                        'start_date' => date('Y-m-d',strtotime($_POST['sub_status_date']))." ".$selectedTime,
                                        'end_date'  => date('Y-m-d',strtotime($_POST['sub_status_date']))." ".$endTime,
                                        'created_by' => $_SESSION['balance_session']['admin_id'],
                                        'created_date' => date('Y-m-d H:i:s')
                                        );
                    $this->commonquery->addRecord('task_master',$task_master_array);
                    if($_SESSION['balance_session']['user_type']=='mentor'){
                        $task_master_array = array(
                                            'reminder_title' => 'Lead : '.$_POST['email_id'],
                                            'reminder_text'   => $_POST['status_name'].' Lead with sub status : '.$_POST['sub_status_value'],
                                            'reminder_date'  => $_POST['pay_dt'],
                                            'mentor_id'     => $_SESSION['balance_session']['admin_id'],
                                            'reminder_time' => date('H:i:s' , time() + 60*60),
                                            'reminder_ack' => '0',
                                            'reminder_added'  => date('Y-m-d H:i:s')
                                            );
                                           // print_r($task_master_array);exit;
                        $this->commonquery->addRecord('mentor_reminders',$task_master_array);
                    }
                }
                //echo $get_latest_entry['id'];exit;
                $j++;
            }
            
            if(!empty($_POST['sub_status_note'])){
                $status_data['sub_status_note'] = $_POST['sub_status_note'];
                if($_POST['sub_status_note'] == 'Not On Whatsapp'){
                    if(!empty($_POST['not_on_whatsapp'])){
                        $connect = $_POST['sub_status_note'] ." (Connected With : " .$_POST['not_on_whatsapp']." )";
                    }else{
                    $connect = $connect = $_POST['sub_status_note']." (Not Connected)";
                    }
                    $status_data['sub_status_note'] =$connect;
                }
                
                $j++;
            }
            
        //      echo "<pre>";
        //       print_r($j);
        //  print_r($status_data);
        //      exit();
            if($j>0){
                function PredictPhase($communication, $Awareness, $Motivation, $Language, $Ethnicity)
{
    $CalculatePhase = 0;
    $max = 0;
    $min = 0;
    $factors = array(
        'communication' => ['Asking Queries' => 3, 'Cold Replies' => 2],
        'Awareness' => ['Low' => 2, 'Medium' => 3, 'High' => 4,],
        'Motivation' => ['Low' => 2, 'Medium' => 3, 'High' => 4,],
        'Language' => ['English' => 4, 'Hindi' => 2, 'Other' => 1,],
        'Ethnicity' => ['South Indian' => 4, 'North Indian' => 3, 'Bengali' => 2, 'Punjabi' => 2, 'Gujrati' => 4, 'Rajasthani' => 3, 'Sindhi' => 2, 'Maharashtrian' => 3, 'Muslim' => 3, 'Christianity' => 1, 'Marwadi' => 3, 'International' => 4, 'Sikh' => 1, 'Parsi' => 1, 'Jain' => 2,]
    );





    foreach ($factors as $key => $factor) {
        foreach ($factor as $FactorKey => $value) {


            if ($$key == $FactorKey) {


                $CalculatePhase += $value;
                $max += ($value == 4 || $value == 3) ? 1 : 0;
                $min += ($value == 1 || $value == 2) ? 1 : 0;
            }

        }

    }



    if ($max >= $min) {

        return ceil($CalculatePhase / 5);
    } else {

        return floor($CalculatePhase / 5);
    }
}

                $status_data['phase']=PredictPhase($status_data['Communication'],$status_data['awareness_lavel'],$status_data['motivation_level'],$status_data['Language'],$status_data['regional_diet']);
             $result=$this->commonquery->updateRecord('lead_management',$status_data,array('id'=>$get_latest_entry['id']));
                //echo $this->db->last_query();exit;
                $this->commonquery->addRecord('lead_status_log',$status_log);
            }
            //new_assign_to
        //     echo "<pre>";
        //  print_r($_POST);
        //     exit();
            $assign_data=[];
            if(!empty($_POST['new_assign_to']) || ($_POST['new_assign_to'])!=0){
            //if(!empty($_POST['assign_to_add'])){
                
                $assign_data = array(
                                'assign_from' => $this->session->balance_session['first_name'],
                                // 'assign_to' => $_POST['assign_to_add'],
                                'assign_to' => $_POST['new_assign_to'],
                                'assign_date' => date('Y-m-d H:i:s'),
                                
                                );
                $data_ac_final = array_merge($data_ac_final, $assign_data);
                /*
                $record_id = select id from booking join lead managemnt where lm.enquiry=consultation and bk.date >= CURDATE() and call staus in 'pending','reschedule';
                $result=$this->commonquery->updateRecord('bn_consultation_call_booking',array('counsellor_id' => $_SESSION['balance_session']['admin_id']),array('id'=>$record_id));
                $result=$this->commonquery->updateRecord('task_manager',array('created_by' => $_SESSION['balance_session']['first_name']),array('email'=>$email));
                */
            }
            
            
            
            if($data_ac_final){
            
                $is_exist = $this->commonquery->getIdByParameter('lead_action',array('email'),array('email'=>$_POST['email_id']));
                if($_POST['email_id']){
                  if($is_exist){
                        $result=$this->commonquery->updateRecord('lead_action',$data_ac_final,array('email'=>$_POST['email_id']));
                  }else{
                    $email_arr=array(
                               'email'=>$_POST['email_id'],
                            );
                    $data_ac_final = array_merge($data_ac_final, $email_arr);
                    $result= $this->commonquery->addRecord('lead_action',$data_ac_final);
                  }
                }
            }
          //  exit;
        if($result){
            redirect('user_details?user_email='.$_POST['email_id'].'&user_status=lead',$this->session->set_flashdata('lead_update','Lead Action Updated Successfully.'));
            
        }else{
            redirect('user_details?user_email='.$_POST['email_id'].'&user_status=lead', $this->session->set_flashdata('lead_update','Error in updating lead action.'));
            
        }
    }
    
    public function generate_payment_link(){
        if($_POST['sugg_prog']=='Transform (weight loss)' || $_POST['sugg_prog']=='14-Day Fitness Challenge'){
            $prog_days = "14";
        }else  if($_POST['sugg_prog']=='Flat Stomach Cleanse' || $_POST['sugg_prog']=='Sugar Detox Cleanse' || $_POST['sugg_prog']=='Acidity Correction Cleanse'){
            $prog_days = "1";
        }else{
            $prog_days = $_POST['prog_days']."0 ";
        }
    
        $payment_validity_date= strtotime(date('Y-m-d 23:55:00',strtotime($this->input->post('razor_date'))));
                $link_validity_date= date('Y-m-d 23:55:00',strtotime($this->input->post('exp_date')));
                $reference_id = "BAL".rand(1,100000);
                //echo $this->input->post('phone');
                $arr = explode('-',$this->input->post('phone'));
                //echo print_r($arr);echo "<br><br>";exit;
                if(count($arr)>1){
                   $contact = trim($this->input->post('phone'));    
                }else{
                    $contact = "+91".trim($this->input->post('phone'));
                }
                //$contact = "+91".$this->input->post('phone');
                //exit;
                $customer_name = $this->input->post('client_name');
                $email = $this->input->post('email');
                //$email = "sanjay.gupta@balancenutrition.in";
                $amount = $this->input->post('prog_amt')*100;
                // echo "<pre>";
                // print_r($_POST);
                // die();
                 
                 $curl = curl_init();
                
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api.razorpay.com/v1/payment_links',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>'{ 
                      "amount": '.$amount.',
                      "currency": "INR",
                      "accept_partial": false,
                      "expire_by": '.$payment_validity_date.',
                      "reference_id": "'.$reference_id.'",
                      "description": "Payment for '.$_POST['sugg_prog'].'('.$prog_days.' Days). Email : ('.$email.')",
                      "customer": {
                        "name": "'.$customer_name.'",
                        "contact": "",
                        "email": "'.$email.'"
                      },
                      "notify": {
                        "sms": true,
                        "email": true
                      },
                      "reminder_enable": false,
                      "notes": {
                        "policy_name": "'.$_POST['sugg_prog'].'"
                      },
                      "callback_url": "https://balancenutrition.in/",
                      "callback_method": "get"
                    }',
                
                //Start For Test Crendentials
                      /* CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic cnpwX3Rlc3RfRDhhU0JrbUt4Z1NpczA6NjVlRUE4ZUdMNTdUWXE4UUw3cTFQSE5N',
                        'Content-Type: application/json'
                      ),*/
                // End For Test Credentials 
                     
                //Start For Live Credentials
                      CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic cnpwX2xpdmVfNmNTdDRPNkdTMFJMSGU6ZzJHbmlzOElTVHhoNXZFRE1qTjdHVmxU',
                        'Content-Type: application/json'
                      ),
                //End For Live Credentials
                      
                    ));
                
                    $response = curl_exec($curl);
                    curl_close($curl); 
                    $data = json_decode($response); 
                    $payment_url =  $data->short_url;
                    
                    $now = time(); // or your date as well
                    $your_date = strtotime($link_validity_date);
                    $datediff = $now - $your_date;
                    
                    $days_diff =  round($datediff / (60 * 60 * 24));
                    
                    if(strlen($payment_url)>6){
                        $this->session->set_flashdata('payment_link',$payment_url);
                        //send mail to counselor;
                    }
                    $this->session->set_flashdata('program',$_POST['sugg_prog']);
                    $this->session->set_flashdata('days',$_POST['prog_days']);
                    $this->session->set_flashdata('amount',$this->input->post('prog_amt'));
                    $this->session->set_flashdata('expiry',date('D M Y',strtotime($link_validity_date))."which is in the next ".$days_diff." days");
                    
                    $link_details=array(
                           'name'=>$customer_name, 
                           'program_name'=>$_POST['sugg_prog'], 
                           'program_duration'=>$prog_days." Days",
                           'amount'=>$this->input->post('prog_amt'),
                           'payment_link'=>$payment_url,
                           'sales_person_id'=>$_SESSION['balance_session']['admin_id'], 
                           'email_id'=>$email, 
                           'phone'=>$contact, 
                           'created_by'=>$_SESSION['balance_session']['admin_id'], 
                           'created_date'=>date('Y-m-d H:i:s'), 
                           'expiry_date'=>date('Y-m-d H:i:s',strtotime($link_validity_date)), 
                           'link_status'=>'Unpaid'
                        );
                    $this->commonquery->addRecord('payment_link',$link_details);
                    
                echo json_encode($link_details);    
                        
        //echo $option_string;
        
    }
    
    public function getPendingCallSlots(){
        $get_booked_slots = $this->commonquery->getBookedCallSlots(date('Y-m-d',strtotime($_POST['date'])),$_POST['counsellor_id']);
        $get_pending_slots = $this->commonquery->getPendingSlots($get_booked_slots['unavailable_slots']);
        // echo "<pre>";
        // print_r($get_pending_slots);
        // exit;
        $option_string = '';
        foreach($get_pending_slots as $key => $value){
            $slot_time = explode(' - ',$value['appointment_slots']);
            
            $option_string .= "<option value='".date('H:i:s',strtotime($slot_time[0]))."'>".date('H:i:s',strtotime($slot_time[0]))."</option>";
        }
        // $data['option_string'] = $option_string;
        
        // return json_encode($data);
        echo $option_string;
        
    }
    public function getHS(){
        $lead_id = $_POST['lead_id'];
        $data['hs_details'] = $this->user_details_model->getHS($lead_id);
        echo json_encode($data);
    }
    public function getLeadHistory(){
        
        // $_POST['email_id']= 'rahil@balancenutrition.in';
        $lead_records = $this->user_details_model->getLeadRecordsByEmailId($_POST['email_id']);
        $source_records = $this->user_details_model->getLeadSourcesByEmailId($_POST['email_id']);
        
        // print_r($lead_records);
        //echo "<br>";
        // print_r($source_records);exit;
        $i=0;
        $lead_array = [];
        
        foreach($source_records as $key => $value){
            if(!empty($value['source']) && !empty($value['date'])){
                $hs_source = array("Your BN Health Score Result", "App Healthscore", "APP Health Score", "Health Score","Free Health Score","Privy Health Score");
                if (in_array($value['source'], $hs_source)){
                    $lead_array[] = array(
                            'action' => "<b>Source</b>: ".$value['source']." &nbsp;&nbsp;<span class='btn btn-info' onclick='geths(".$value['id'].");'>Get Details</span> &nbsp;&nbsp;",
                            'action_date' => date_format(date_create($value['date']), 'd M y')
                            );
                }else{
                    $lead_array[] = array(
                            'action' => "<b>Source</b>: ".$value['source'],
                            'action_date' => date_format(date_create($value['date']), 'd M y')
                            );
                }                
            }
        }
        foreach($lead_records as $key => $value){
            if(!empty($value)){
                //print_r($value);
                if(!empty($value['fu_note']) && !empty($value['fu_date'])){
                    // if($_SERVER['REMOTE_ADDR']=='103.66.96.84'){
                    //     echo $value['fu_date'];
                    // }
                    $arr = explode("\n\n",$value['fu_note']);
                    foreach($arr as $val){
                        $arr1 = explode("\n",$val);
                        //Added by Navin
                        if ( ! isset($arr1[1])) {
                           $arr1[1] = null;
                        }
                        if ( ! isset($arr1[0])) {
                           $arr1[0] = null;
                        }
                        //Added by Navin End
                        $fu_note = array(
                                    'action' => "<b>FU note</b>: ".$arr1[1], 
                                    'action_date' => $arr1[0]
                                    );
                        array_push($lead_array,$fu_note);
                    }    
                }
                if(!empty($value['fu_other_note']) && !empty($value['fu_other_date'])){
                    $arr2 = explode("\n\n",$value['fu_other_note']);
                    foreach($arr2 as $val2){
                        $arr3 = explode("\n",$val2);
                        $fu_other_note = array(
                                'action' => "<b>Other FU note</b> : ".$value['fu_other_note'], 
                                'action_date' =>  ($value['fu_other_date'])?date_format(date_create($value['fu_other_date']), 'd M y'):$value['fu_other_date']
                                );
                    array_push($lead_array,$fu_other_note);
                    }    
                    
                }
                
                // if(!empty($value['key_insight']) && !empty($value['key_insight_date'])){
                //     $key_insight = array(
                //                 'action' => "<b>Consultation</b> : ".$value['key_insight'], 
                //                 'action_date' => date_format(date_create($value['key_insight_date']), 'd M y')
                //                 );
                //     array_push($lead_array,$key_insight);
                //  }
                
                // avinash added this
                if(!empty($value['key_insight']) && !empty($value['key_insight_date'])){
                    $arr_key_insight = explode("\n\n",$value['key_insight']);
                    foreach($arr_key_insight as $val){
                        $arr_key_insight1 = explode("\n",$val);
                        
                        if ( ! isset($arr_key_insight1[1])) {
                           $arr_key_insight1[1] = null;
                        }
                        if ( ! isset($arr_key_insight1[0])) {
                           $arr_key_insight1[0] = null;
                        }
                        //Added by Navin End
                        $fu_note = array(
                                    'action' => "<b>Consultation</b>: ".$value['key_insight'], 
                                    'action_date' => ($value['key_insight_date'])?date_format(date_create($value['key_insight_date']), 'd M y'):$value['key_insight_date']
                                    );
                        array_push($lead_array,$fu_note);
                    }    
                }
                
                
                
                
                if(!empty($value['pay_type']) && !empty($value['pay_dt'])){
                    $pay_type = array(
                                'action' => $value['pay_type'], 
                                'action_date' => $value['pay_dt'] 
                                );
                    array_push($lead_array,$pay_type);
                }
                if(!empty($value['assign_to']) && !empty($value['assign_date'])){
                    $assign_to = array(
                                'action' => "<b>Lead Assign to</b> : ".$value['assign_to'], 
                                'action_date' => date_format(date_create($value['assign_date']), 'd M y')
                                );
                    array_push($lead_array,$assign_to);
                }
            }
            
        }
        //exit;
        $data['lead_array'] = $this->commonquery->array_sort_by_key($lead_array, 'action_date', SORT_ASC);
        
        // print_r($data['lead_array']);exit;
        
//   usort($lead_array, 'date_compare');
        echo json_encode($data);
        
    }
    
    public function get_client_history(){
        
        $data['diet_names'] = $this->user_details_model->get_diet_names($_POST['email_id']);
        
        $data['program_history'] = $this->user_details_model->get_program_history($_POST['email_id'], array('count', 'result'));

        $data['current_program_history'] = $this->user_details_model->get_current_program_history($_POST['email_id'], array('count', 'result'));
        
        $data['old_program_history'] = $this->user_details_model->get_old_program_history($_POST['email_id'], array('count', 'result'));
        
        $data['active_order_id'] = $this->commonquery->get_active_order_id($_POST['email_id']);
        
        // $data['timelineHtml'] = 
        
        echo  $this->load->view('client_history_view', $data);;
    }

    function export_list_to_csv(){
        $filename = (isset($_GET['file_name']) && !empty($_GET['file_name'])) ? $_GET['file_name'] : 'no_name' ;
        $header = (isset($_GET['header']) && !empty($_GET['header'])) ?  explode(',',$_GET['header']) : 'no_headers' ;
        $data[] = (isset($_GET['data']) && !empty($_GET['data'])) ? explode(',',$_GET['data']) : 'no_data' ;
        print_r($_GET['data']);
        //export_to_csv($filename,$header,$data);  
    }
    
    public function update_lead_pending_details(){
        // echo "<pre>";
        // print_r($this->input->post());
        // exit();
        $old_email_id_details=$this->input->post('old_email_id_details');
        $lead_first_name=$this->input->post('lead_first_name');
        $lead_email_id=$this->input->post('lead_email_id');
        $lead_weight_kg=explode ('.',$this->input->post('lead_weight_kg'))[0];
        $lead_weight_grm=$this->input->post('lead_weight_grm');
        $lead_gender=$this->input->post('lead_gender');
        $age=$this->input->post('age');
        $lead_height_ft=explode('.',$this->input->post('lead_height_ft'))[0];
        $lead_height_in=$this->input->post('lead_height_in');
        $phone =$this->input->post('phone_pending');
        if($lead_weight_grm !=''){
            $weight = $lead_weight_kg.'.'.$lead_weight_grm;
        }else{
            $weight =$lead_weight_kg;
        }
        if($lead_height_in !=''){
            $height = $lead_height_ft.'.'.$lead_height_in;
        }else{
            $height = $lead_height_ft;
        }
        $lead_stage=$this->input->post('lead_stage');
        
        if($weight !=""){
                        (int)$curr_wt = $weight;
                    }else{
                        (int)$curr_wt = "";
                    }
                    (int)$wt = $this->ideal_weight_calc($lead_height_ft,$lead_gender,$lead_height_in);  //avinash added this for stage  define
                    // $stage = $this->nina_stages($source,$status,$this->input->post('phone'));
                //   $weigh= $this->input->post('weight');
                    (int)$weight = $curr_wt;  //avinash added this for stage  define
                    $weight_difference = abs((int)$weight-(int)$wt);
                    if($weight_difference >=15){
                        $stage = 4;
                    }elseif($weight_difference >=7 && $weight_difference < 15){
                        $stage = 3;
                    }elseif($weight_difference >=2 && $weight_difference < 7){
                        $stage = 2;
                    }elseif($weight_difference >=0 && $weight_difference < 2){
                        $stage = 1;
                    }else{
                        $stage = 0;
                    }
        $lead_stage = $stage;
        
        $lead_data   =array(
            'old_email_id_details'=> $old_email_id_details,
            'fname' => $lead_first_name,
            'email' => $lead_email_id,
            'height' => $height,
            'weight' => $weight,
            'age'=> $age,
            'gender' => $lead_gender,
            'stage' => $lead_stage,
            'phone' => $phone,
            );
        $resultSet = $this->user_details_model->update_lead_pending_deatils($lead_data);
        echo $resultSet;
    }
    
}