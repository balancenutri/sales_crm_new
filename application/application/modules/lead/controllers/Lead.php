<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends MX_Controller 
{
    // start of class

    public function __construct() 
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('lead_model');
        $this->load->library('commonquery');
        $this->load->library(['query']);
        $this->load->model('faq/faq_model');
        
        $this->mentor_id=$this->session->balance_session['admin_id'];
        
        if($this->login->check_if_logged_in() === FALSE)
        {
            redirect(''); 
        }

    }

    public function index()
    {
        
    // https://www.balancenutrition.in/sales_crm/lead?sl=all&search=name&df=2021-03-18&dt=2021-03-19&agf=20&agt=35
        // echo "<pre>";
        // print_r($_GET);
        // exit;
        $data['title'] = "Leads List";
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        $data['program_name'] = array(
                                        array(
                                            "program_id"=>"2",
                                            "program_name"=>"Beat PCOS",
                                            ),
                                        array(
                                            "program_id"=>"4",
                                            "program_name"=>"Body Transformation",
                                            ),
                                        array(
                                            "program_id"=>"74",
                                            "program_name"=>"Plateau Breaker",
                                            ),
                                        array(
                                            "program_id"=>"91",
                                            "program_name"=>"Reform Intermittent",
                                            ),
                                        array(
                                            "program_id"=>"6",
                                            "program_name"=>"Reneu",
                                            ),
                                        array(
                                            "program_id"=>"1",
                                            "program_name"=>"Weight Loss-Pro",
                                            ),
                                        array(
                                            "program_id"=>"3",
                                            "program_name"=>"Weight Loss +",
                                            ),
                                        array(
                                            "program_id"=>"132",
                                            "program_name"=>"SlimPossible60",
                                            ),
                                        array(
                                            "program_id"=>"17",
                                            "program_name"=>"Nourish",
                                            ),
                                        array(
                                            "program_id"=>"18",
                                            "program_name"=>"Satvaa",
                                            ),
                                        array(
                                            "program_id"=>"19",
                                            "program_name"=>"Sphoorti",
                                            ),
                                                 array(
                                                "program_id"=>"7",
                                                "program_name"=>"Slim Smart",
                                                )
                                    );
        // $data['lead_details_data'] = $this->lead_model->get_lead_details_data_query($_GET);
        /*$lead_details_data = $data['lead_details_data'];
        print_r($lead_details_data[77]['assign_to']);exit;*/
        $data['page']='lead';
        $data['faqs_details']=$this->faq_model->get_all_faqs();	
		$data['faqs_titles']=$this->faq_model->get_all_faq_titles();
		$data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
        display_view('index',$data);
    }
    public function get_amount()
    {
        $program_id = $_POST['prog'];
        $days = $_POST['days'];
        print_r($this->commonquery->get_amount($program_id,$days));
    }
    public function lead_mobile()
    {
        
    // https://www.balancenutrition.in/sales_crm/lead?sl=all&search=name&df=2021-03-18&dt=2021-03-19&agf=20&agt=35
        // echo "<pre>";
        // print_r($_SESSION);
        // exit;
        $data['title'] = "Leads List";
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        // $data['lead_details_data'] = $this->lead_model->get_lead_details_data_query($_GET);
        /*$lead_details_data = $data['lead_details_data'];
        print_r($lead_details_data[77]['assign_to']);exit;*/
        
        $data['faqs_details']=$this->faq_model->get_all_faqs();	
		$data['faqs_titles']=$this->faq_model->get_all_faq_titles();
		$data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
        display_view('lead_mobile_view',$data);
    }
    
    // public function add_lead(){
    //     $data['lead_source'] = $this->commonquery->fetchLeadSource();
    //     $data['lead_status'] = $this->commonquery->fetchAllStatus();
    //     $data['countries'] = $this->commonquery->getAllCountries();
    //     $data['assign_to_list'] = $this->commonquery->getCrmUser();
    //     // print_r($data['assign_to_list']);exit;
    //     $data['test'] = "Add Leads";
    //     display_view('add_lead',$data);
    // }
    
    public function add_lead(){
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        // print_r($data['assign_to_list']);exit;
        $data['test'] = "Add Leads";
        // print_r($data);
        echo json_encode($data);
        // display_view('add_lead',$data);
    }
    
    
    // avinash added his for mobile no verify

        function mobile_number_verify(){
      $curl = curl_init();
      $phoneNumber = $this->input->post('phoneNumber');
      $country_code = $this->input->post('country_code');
        curl_setopt_array($curl, array(
 
              CURLOPT_URL => "http://apilayer.net/api/validate?access_key=637d2019965a90fd5756ead2b932b7fb&number=".$phoneNumber."&country_code=".$country_code."&format=1",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HTTPHEADER => array(
                "content-type: application/json"
                ),
                ));
                  $response = curl_exec($curl);
                    $err = curl_error($curl);
                //   print_r($response) ;
                //   exit();
                    curl_close($curl);
                    
                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      echo $response;
                    }
  }    
    
    //  public function add_lead_data(){
    //     // $lead_data = $_POST;
    //     // echo "<pre>";
    //     // print_r($_POST);
    //     // exit;
    //     // $this->load->database();
        
    //     // $this->load->model('dashboard_model');
    //     date_default_timezone_set("Asia/Kolkata");
    //     $counsellor_id = $this->session->balance_session['admin_id'];
    //     $counsellor_name = $this->session->balance_session['first_name'];
    //     $inch = $this->input->post('inches');    //avinash added this for stage  define
    //     $height = $this->input->post('height');   //avinash added this for stage  define
    //     $gender = $this->input->post('gender');
    //     $phone_code = $this->input->post('phone_code');//avinash added this for stage  define
    //     $today = date("Y-m-d H:i:s");
    //     $email= $this->input->post('email_id');
    //     $phone = $this->input->post('phone');
    //     $lead_type = $this->commonquery->lead_type($email,$phone);
    //     $result =[];
    //     // $phone = preg_match('/^[0-9]{10}+$/', $phone);
    //     $phone =preg_replace("/[^0-9]/", "", $phone);
    //     if(!empty($_POST)){
    //         if($this->input->post('email_id')==''){
    //             $email = str_replace(' ', '_', $this->input->post('first_name'))."_".$phone."@mail.com";
    //         }
    //         $lead_record = $this->commonquery->getLatestLeadRecord($email,$phone);
    //         //print_r($lead_record);
    //         //echo date('Y-m-d',strtotime($lead_record['created_date'])) . " :: ". date('Y-m-d');//exit;
    //         $subtract_30days=date('Y-m-d',strtotime('-30 DAY'));
    //         if(empty($lead_record) || date('Y-m-d',strtotime(@$lead_record['created_date'])) < $subtract_30days){
    //             //echo " : if :";exit;
    //             $source = $this->input->post('source_id');//$this->commonquery->getIdByParameter('bn_lead_source',array('source_name'),array('source_id' => $this->input->post('source_id')));
    //             $status = $this->input->post('status_id');//$this->commonquery->getIdByParameter('bn_lead_status',array('status_name'),array('id' => $this->input->post('status_id')));
    //             if($this->input->post('dob')!=''){
    //                 $dob = date('Y-m-d',strtotime($this->input->post('dob')));
    //             }else{
    //                 $dob = '0000-00-00';
    //             }
    //             if(!empty($this->input->post('quick_access')) && $this->input->post('quick_access')==1){      //quick_lead_adding
    //                 $quick_access1_data = explode("|",$this->input->post('lead_data'));
    //                 $i=1;
    //                 foreach($quick_access1_data as $val){
    //                     //print_r($quick_access1_data);exit;
    //                     $quick_access_data = explode(",",$val);
    //                     $name = $quick_access_data[0];
    //                     $number = $quick_access_data[1];
    //                     $source = $quick_access_data[2];
    //                     $email = $quick_access_data[3];
    //                     $status = $quick_access_data[4];
    //                     // print_r($name);exit;
                        
    //                     $prime_source = $this->commonquery->getPrimeSource(1);
    //                     $social_media_source = $this->commonquery->getPrimeSource(2);
    //                     $prime_status = array("Hot");
    //                     if(strlen($number)>4 && in_array($status, $prime_status)){$stage=3;}
    //                     elseif(strlen($number)>4 && in_array($status, $prime_source)){$stage=3;}
    //                     elseif(strlen($number)>4 && in_array($source, $social_media_source)){$stage=3;}
    //                     elseif(strlen($number)>4){$stage=3;}
    //                     elseif(strlen($number)<=4){$stage=2;}else{$stage=1;}
                        
    //                     $fromData = array(
    //                                   'fname'=> $name,
    //                                   'email'=> $email, 
    //                                   'phone'=> $phone_code.'-'.$number,  
    //                                   'enquiry_from'=>$source,
    //                                   'status' => $status,
    //                                   'stage' => $stage,
    //                                   'created' => $today,
    //                                   'lead_type' =>$lead_type,
    //                                  );           
                                   
    //                     //                     echo "<pre>";
    //                     // print_r($fromData);
    //                     // exit;  
    //                     $insert_id =$this->db->insert('lead_management',$fromData);
    //                     $action_data = array(
    //                       "email" => $email,
    //                       "assign_from" => $counsellor_name,
    //                       "assign_to" => $counsellor_name,
    //                       "assign_date" => $today,
    //                     );
    //                     if($insert_id){
    //                         $this->db->insert('lead_action', $action_data);
    //                     }
    //                     //assigned chat also if its not assigned;
    //                     $assign_chat = "UPDATE `lead_enquiry` SET `counsellor_id`=$counsellor_id WHERE email_id='$email' and counsellor_id=0";
    //                     $this->db->query($assign_chat);
    //                 }
    //                 echo 'Lead Added Successfully.';
    //             }else{
    //                 if($this->input->post('email_id')==''){
    //                     $email = str_replace(' ', '_', $this->input->post('first_name'))."_".$phone."@mail.com";
    //                 }else{
    //                     $email = $this->input->post('email_id');
    //                 }
    //                 if($this->input->post('weight')!=""){
    //                     $curr_wt = $this->input->post('weight').".".$this->input->post('weight_grm');
    //                 }else{
    //                     $curr_wt = "";
    //                 }
    //                 (int)$wt = $this->ideal_weight_calc($height,$gender,$inch);  //avinash added this for stage  define
    //                 // $stage = $this->nina_stages($source,$status,$this->input->post('phone'));
    //                 // $weight = $this->input->post('weight');  //avinash added this for stage  define4
    //                 $weight = (int)$curr_wt;
    //                 $weight_difference = abs((int)$weight-(int)$wt);
    //                 if($weight_difference >15){
    //                     $stage = 4;
    //                 }elseif($weight_difference >7 && $weight_difference <=15){
    //                     $stage = 3;
    //                 }elseif($weight_difference >2 && $weight_difference <= 7){
    //                     $stage = 2;
    //                 }elseif($weight_difference <=2 && $weight_difference < 0){
    //                     $stage = 1;
    //                 }else{
    //                     $stage = 0;
    //                 }
    //               $fromData = array(
    //                               'fname'=> $this->input->post('first_name'),
    //                               'email'=> $email, 
    //                               'phone'=>$phone_code.'-'.$phone, 
    //                               'stage'=>$stage,
    //                               'country'=> explode(' ',$this->input->post('country_id'))[0], 
    //                               'age'=> $this->input->post('age'), 
    //                               'state'=>$this->input->post('state_id'), 
    //                             //   'height'=>$this->input->post('height'), 
    //                               'weight'=>$curr_wt,
    //                               'birth_date'=>$dob, 
    //                               'enquiry_from'=>$source, 
    //                               'inch'=>$this->input->post('inches'),
    //                               'height'=>$this->input->post('height'), 
    //                               'gender'=>$this->input->post('gender'), 
    //                               'city'=>$this->input->post('city_id'),
    //                               'status' => $status,
    //                               'created' => $today,
    //                               'lead_type' =>$lead_type,
    //                               'medical_issue' => implode(",",$this->input->post('medical_issue')).$this->input->post('other_medical_issue'),
    //                             );
    //                     //echo "<pre>";
    //                     //print_r($fromData);
    //                     //exit;
    //                 $insert_id =$this->db->insert('lead_management',$fromData);
    //                 if($insert_id){
    //                     $lead_action_array = array(
    //                                             'email' => $email,
    //                                             'assign_to' => $this->input->post('assign_to_add'),
    //                                             'assign_from' => $counsellor_name,
    //                                             'assign_date'  => date('Y-m-d H:i:s')
    //                                             );
    //                     $is_exist = $this->commonquery->getIdByParameter('lead_action',array('email'),array('email'=>$_POST['email_id']));
    //                     if($is_exist){
    //                         (int)$result=$this->commonquery->updateRecordnew('lead_action',$lead_action_array,array('email'=>$_POST['email_id']));
    //                     }else{
    //                         $email_arr=array(
    //                                   'email'=>$_POST['email_id'],
    //                                 );
    //                         $result= $this->commonquery->addRecord('lead_action',$lead_action_array);
    //                     }
    //                     //insert into mentor_reminders;
    //                     $mentor_id = $this->commonquery->getMentorId($this->input->post('assign_to_add'))['admin_id'];
    //                     if($counsellor_id!=$mentor_id){
    //                         $task=array(
    //                             'mentor_id'=>$mentor_id,
    //                           'reminder_title'=>'Lead Assigned',
    //                           'reminder_text'=>'Lead : <a href="https://www.balancenutrition.in/sales_crm/user_details?user_email='.$email.'&user_status=lead" target="_blank">'.$email.'</a> assigned to you',
    //                           'reminder_date'=>date('Y-m-d'),
    //                           'reminder_time'=>date('H:i:s'),
    //                           'reminder_ack'=>0,
    //                           'reminder_added'=>date('Y-m-d H:i:s'),
    //                         );
    //                         $result= $this->commonquery->addRecord('mentor_reminders',$task);
    //                     }
    //                     $admin_user = $this->commonquery->getIdByParameter('admin_user',array('crm_user'),array('admin_id' => $this->input->post('assign_to_add')));
                        
                        
    //                     //$assigned_id =$this->db->insert(' lead_action',$lead_action_array);
    //                     // assigned chat also if its not assigned;
    //                     $counsellor_id = $this->session->balance_session['admin_id'];
    //                     $counsellor_name = $this->session->balance_session['first_name'];
    //                     $assign_chat = "UPDATE `lead_enquiry` SET `counsellor_id`=$counsellor_id WHERE email_id='".$this->input->post('email_id')."' and counsellor_id=0";
    //                     $this->db->query($assign_chat);
    //                     $data['text_msg'] ='Lead Added Successfully.';
    //                     $data['email_id'] =$email;
    //                     echo json_encode($data);
    //                     // echo 'Lead Added Successfully.';
    //                 }
    //             }
    //         }else{
    //             //echo " : else :";exit;
    //             $data['text_msg'] ='Lead Already Exists.';
    //                     $data['email_id'] =$email;
    //                     echo json_encode($data);
    //             // echo 'Lead Already Exists.';
    //         }
    //     }
       
    // //   echo encode
    // }
    
    public function leadProgram($email,$mobile)
	{
			$email = $email;
		 	$mobile =$mobile;
			$email_flag=0;
			$phone_flag=0;
			$data;
			
								
			$result_lm_both= $this->commonquery->isExitEmailPhone('lead_management','email',trim(strtolower($email)),'phone','%'.$mobile);
		
			$result_lm_both_a= $this->commonquery->isExitEmailPhone('lead_management','email_alternate','%'.trim(strtolower($email)).'%','phone_alternate','%'.$mobile.'%');
			
			
// 			if($result_lm_both && $result_lm_both_a){
// 				echo '<br><br>Lead already Present using Email and Phone in Lead Management';
// 			}else 
			if($result_lm_both){
			
			$result_lm_email= $this->commonquery->isExitEmailPhone('lead_management','email',trim(strtolower($email)));
			
			if($result_lm_email){
				// echo '<br><br>Lead already Present using Email in Lead Management';
			$email_flag=1;
			}else{
				// echo '<br><br>Lead  Not present using Email in Lead Management';
			}
			
			$result_lm_phone= $this->commonquery->isExitEmailPhone('lead_management','phone','%'.$mobile);
		
			if($result_lm_phone){
				// echo '<br><br>Lead already Present using Phone in Lead Management';
				$phone_flag=1;
			}else{
				// echo '<br><br>Lead  Not present using Phone in Lead Management';
			}
			
			if($email_flag ==1 && $phone_flag == 0){
				// echo "<br><br>Updating Alternate Phone Number";
				
				$result= $this->commonquery->getLeadDetails('lead_management','email','%'.trim(strtolower($email)),'phone');
									
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','phone','%'.$mobile.'%');
					
					if($result_lm_both_a){
						 $result_mobile = implode(',', $result[0]);
						
					}else{
						$result_mobile = $mobile.','.implode(',',$result[0]);
						
					}
			  
			  $mobile_data = [
					'phone_alternate' => $result_mobile
					];

		
			$this->commonquery->updateLeadRecord('lead_management',$mobile_data,array('email' => trim(strtolower($email))));
			
			$result= $this->commonquery->getLeadDetailsNew('lead_management','email','%'.trim(strtolower($email)),'phone');
				if($result){
						 $result = implode(',', $result[0]);
						
					}
			$data = [
					'phone_alternate' => $result
					];
			
			}else if($email_flag ==0 && $phone_flag == 1){
				// echo "<br><br>Updating Alternate Email Id";
				$result= $this->commonquery->getLeadDetails('lead_management','phone','%'.$mobile,'email');
				
					
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','email','%'.trim(strtolower($email)).'%');
					if($result_lm_both_a){
						$result_email = implode(',', $result[0]);
					}else{
						$result_email = trim(strtolower($email)).','.implode(',', $result[0]);
					}
				  

				$data=	$email_data = [
						'email_alternate' => $result_email
						];
			
			
			$this->commonquery->updateLeadRecord('lead_management',$email_data,"phone LIKE  '%".$mobile."'");
			
			$result= $this->commonquery->getLeadDetailsNew('lead_management','phone','%'.$mobile,'email');
// 			echo $this->db->last_query();
				if($result){
						 $result = implode(',', $result[0]);
						
					}
			$data = [
					'email_alternate' => $result
					];
			
			}
			}elseif ($result_lm_both_a) {
				
			$result_lm_email= $this->commonquery->isalExitEmailPhone('lead_management','email','%'.trim(strtolower($email)).'%');
			
			if($result_lm_email){
			echo '<br><br>Lead already Present using Alternate Email in Lead Management';
			$email_flag=1;
			}else{
				echo '<br><br>Lead  Not present using Alternate Email in Lead Management';
			}
			
			$result_lm_phone= $this->commonquery->isalExitEmailPhone('lead_management','phone','%'.$mobile.'%');
		
			if($result_lm_phone){
				echo '<br><br>Lead already Present using Alternate Phone in Lead Management';
				$phone_flag=1;
			}else{
				echo '<br><br>Lead  Not present using Alternate Phone in Lead Management';
			}
			// echo 'result_la_email<br>';
			if($email_flag ==1 && $phone_flag == 0){
				echo "<br><br>Updating Alternate Phone Number";
				
				$result= $this->commonquery->getLeadDetails('lead_management','email_alternate','%'.trim(strtolower($email)).'%','phone');
									
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','phone','%'.$mobile.'%');
				
					if($result_lm_both_a){
						 $result_mobile = implode(',', $result[0]);
						
					}else{
						$result_mobile = $mobile.','.implode(',',$result[0]);
						
					}
				
				 $data= $mobile_data = [
					'phone_alternate' => $result_mobile
					];

			$this->commonquery->updateLeadRecord('lead_management',$mobile_data,"email_alternate LIKE '%".trim(strtolower($email))."%'");
			
			}else if($email_flag ==0 && $phone_flag == 1){
				echo "<br><br>Updating Alternate Email Id";
				
				$result= $this->commonquery->getLeadDetails('lead_management','phone_alternate','%'.$mobile.'%','email');
				
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','email','%'.trim(strtolower($email)).'%');
					if($result_lm_both_a){
						$result_email = implode(',', $result[0]);
					}else{
						$result_email = trim(strtolower($email)).','.implode(',', $result[0]);
					}
				  
				$data=	$email_data = [
						'email_alternate' => $result_email
						];
			
			$this->commonquery->updateLeadRecord('lead_management',$email_data,"phone_alternate LIKE  '%".$mobile."%'");
			
			}
			}
			else{
				// echo "Insert New Lead";
			}
			
			return $data;
		
}

    // avinash added this for add lead=======================================================
    
    public function add_lead_data(){
        //echo "hello";
        //exit;
        //$phone ='';
        //$lead_type = $this->commonquery->user_type('deepamehakpahuja%20@gmail.com',$phone);
        //echo $lead_type;
        //exit;
        //$lead_data = $_POST;
        // echo "<pre>";
        // print_r($_POST);
        // exit;
        //$this->load->database();
        //$this->load->model('dashboard_model');
        date_default_timezone_set("Asia/Kolkata");
        $counsellor_id = $this->session->balance_session['admin_id'];
        $counsellor_name = $this->session->balance_session['first_name'];
        $inch = $this->input->post('inches');    //avinash added this for stage  define
        $height = $this->input->post('height');   //avinash added this for stage  define
        $gender = $this->input->post('gender');
        $reminder_dt = $this->input->post('reminder_dt');
        $reminder_time = $this->input->post('reminder_time');
        $phone_code = $this->input->post('phone_code');//avinash added this for stage  define
        $today = date("Y-m-d H:i:s");     
        $phone = $this->input->post('phone');
        // $phone = preg_match('/^[0-9]{10}+$/', $phone);
        $phone =preg_replace("/[^0-9]/", "", $phone);
        $email= $this->input->post('email_id');
        $lead_type = $this->commonquery->lead_type($email,$phone);
        // =========================================add this avinash for fudate and time=======================================================================
        if($reminder_dt){
                $strt_date = date('Y-m-d',strtotime($reminder_dt)).' '.date('H:i:s',strtotime($reminder_time));
                $selectedTime = $reminder_time;
                $end_date = date('Y-m-d',strtotime($reminder_dt)).' '.date('H:i:s',strtotime("+15 minutes", strtotime($selectedTime)));
                $d = $strt_date;
                $a = array(
                  'reminder_dt'=>$d
                );
                $data_ac_final = array_merge($data_ac_final, $a);
            }else{
                $d='0000-00-00 00:00:00';
        }
        // =========================================add this avinash for fudate and time end=======================================================================    
        if(!empty($_POST)){
            if($this->input->post('email_id')==''){
                $email = str_replace(' ', '_', $this->input->post('first_name'))."_".$phone."@mail.com";
            }
            $lead_record = $this->commonquery->getLatestLeadRecord($email,$phone);
            $subtract_30days=date('Y-m-d',strtotime('-30 DAY'));
            if(empty($lead_record) || date('Y-m-d',strtotime(@$lead_record['created_date'])) < $subtract_30days){
                //echo " : if :";exit;
                $source = $this->input->post('source_id');//$this->commonquery->getIdByParameter('bn_lead_source',array('source_name'),array('source_id' => $this->input->post('source_id')));
                $status = $this->input->post('status_id');//$this->commonquery->getIdByParameter('bn_lead_status',array('status_name'),array('id' => $this->input->post('status_id')));
                if($this->input->post('dob')!=''){
                    $dob = date('Y-m-d',strtotime($this->input->post('dob')));
                }else{
                    $dob = '0000-00-00';
                }
                if(!empty($this->input->post('quick_access')) && $this->input->post('quick_access')==1){      //quick_lead_adding
                    $quick_access1_data = explode("|",$this->input->post('lead_data'));
                    $i=1;
                    foreach($quick_access1_data as $val){
                        //print_r($quick_access1_data);exit;
                        $quick_access_data = explode(",",$val);
                        $name = $quick_access_data[0];
                        $number = $quick_access_data[1];
                        $source = $quick_access_data[2];
                        $email = $quick_access_data[3];
                        $status = $quick_access_data[4];
                        // print_r($name);exit;
                        $prime_source = $this->commonquery->getPrimeSource(1);
                        $social_media_source = $this->commonquery->getPrimeSource(2);
                        $prime_status = array("Hot");
                        if(strlen($number)>4 && in_array($status, $prime_status)){$stage=3;}
                        elseif(strlen($number)>4 && in_array($status, $prime_source)){$stage=3;}
                        elseif(strlen($number)>4 && in_array($source, $social_media_source)){$stage=3;}
                        elseif(strlen($number)>4){$stage=3;}
                        elseif(strlen($number)<=4){$stage=2;}else{$stage=1;}
                        $fromData = array(
                                       'fname'=> $name,
                                       'email'=> $email, 
                                       'phone'=> $phone_code.'-'.$number,  
                                       'enquiry_from'=>$source,
                                       'status' => $status,
                                       'stage' => $stage,
                                       'created' => $today,
                                       'lead_type' =>$lead_type,
                                       'added_by' =>$counsellor_id,
                                     );           
                        // echo "<pre>";
                        // print_r($fromData);
                        // exit;  
                        // $insert_id =$this->db->insert('lead_management',$fromData);
                           	$data_old=$this->leadProgram($email,$number);
    	 
    $insert_id =$this->db->insert('lead_management',$fromData);
    $inserted_id = $this->db->insert_id();
    	if($data_old){
    	    $this->db->set($data_old);
            $this->db->where('id',$inserted_id );
            $this->db->update('lead_management');
    	}
                        $action_data = array(
                           "email" => $email,
                           "assign_from" => $counsellor_name,
                           "assign_to" => $counsellor_name,
                           "assign_date" => $today,
                        );
                        if($insert_id){
                            $this->db->insert('lead_action', $action_data);
                        }
                        //assigned chat also if its not assigned;
                        $assign_chat = "UPDATE `lead_enquiry` SET `counsellor_id`=$counsellor_id WHERE email_id='$email' and counsellor_id=0";
                        $this->db->query($assign_chat);
                    }
                    echo 'Lead Added Successfully.';
                }else{
                    if($this->input->post('email_id')==''){
                        $email = str_replace(' ', '_', $this->input->post('first_name'))."_".$phone."@mail.com";
                    }else{
                        $email = $this->input->post('email_id');
                    }
                    if($this->input->post('weight')!=""){
                        (int)$curr_wt = $this->input->post('weight').".".$this->input->post('weight_grm');
                    }else{
                        (int)$curr_wt = "";
                    }
                    (int)$wt = $this->ideal_weight_calc($height,$gender,$inch);  //avinash added this for stage  define
                    // $stage = $this->nina_stages($source,$status,$this->input->post('phone'));
                   //   $weigh= $this->input->post('weight');
                    (int)$weight = $curr_wt;  //avinash added this for stage  define
                    $weight_difference = abs((int)$weight-(int)$wt);
                    if($weight_difference >15){
                        $stage = 4;
                    }elseif($weight_difference >7 && $weight_difference <=15){
                        $stage = 3;
                    }elseif($weight_difference >2 && $weight_difference <= 7){
                        $stage = 2;
                    }elseif($weight_difference <=2 && $weight_difference < 0){
                        $stage = 1;
                    }else{
                        $stage = 0;
                    }
                   $fromData = array(
                                   'fname'=> $this->input->post('first_name'),
                                   'email'=> $email, 
                                   'phone'=>$phone_code.'-'.$phone, 
                                   'stage'=>$stage,
                                   'country'=> explode(' ',$this->input->post('country_id'))[0], 
                                   'age'=> $this->input->post('age'), 
                                   'state'=>$this->input->post('state_id'), 
                                //   'height'=>$this->input->post('height'), 
                                   'weight'=>$curr_wt,
                                   'birth_date'=>$dob, 
                                   'enquiry_from'=>$source, 
                                   'inch'=>$this->input->post('inches'),
                                   'height'=>$this->input->post('height'), 
                                   'gender'=>$this->input->post('gender'), 
                                   'city'=>$this->input->post('city_id'),
                                   'status' => $status,
                                   'created' => $today,
                                    'lead_type' =>$lead_type,
                                    'added_by' =>$counsellor_id,
                                   'medical_issue' => implode(",",$this->input->post('medical_issue')).$this->input->post('other_medical_issue'),
                            );
                        //echo "<pre>";
                        //print_r($fromData);
                        //exit;
                    // $insert_id =$this->db->insert('lead_management',$fromData);
                    
                       	$data_old=$this->leadProgram($email,$phone);
    	 
    $insert_id =$this->db->insert('lead_management',$fromData);
    $inserted_id = $this->db->insert_id();
    $lead_id = $this->db->insert_id();
    	if($data_old){
    	    $this->db->set($data_old);
            $this->db->where('id',$inserted_id );
            $this->db->update('lead_management');
    	}
                    
                    
                        // echo($lead_id);
                        // exit();
                    // =======================================================avinash added this for fu date time=======================================================
                if($d!='0000-00-00 00:00:00'){
                        $slot_id = $this->commonquery->getIdByParameter('bn_book_appointment_slots',array('id'),array('start_time' => $reminder_time));
                        if($counsellor_id!=0){
                            $appointment_array = array(
                                                        'lead_id' => $lead_id,
                                                        'slot_id'  => $slot_id['id'],
                                                        'counsellor_id' => $counsellor_id,
                                                        'assigned_by'   => $counsellor_id,
                                                        'assigned_user_type'    => 'User',
                                                        'previous_status'       => 'pending',
                                                        'call_status'           => 'pending',
                                                        'call_date'             => date('Y-m-d',strtotime($reminder_dt)),
                                                        'time_slot'             => date('H:i:s',strtotime($reminder_time)),
                                                        'added_date'            => date('Y-m-d H:i:s'),
                                                        'call_type'            => '1'
                                                    );
                            $this->commonquery->addRecord('bn_consultation_call_booking',$appointment_array);
                        }
                            $task_master_array = array(
                                                    'task_name' => 'FU On Whatsapp',
                                                    'description'   => 'FU Scheduled',
                                                    'email_id'  => $email,
                                                    'color'     => 'm-fc-event--primary',
                                                    'remind_me' => '1',
                                                    'start_date' => $strt_date,
                                                    'end_date'  => $end_date,
                                                    'created_by' => $counsellor_id,
                                                    'created_date' => date('Y-m-d H:i:s')
                                                    );
                            $this->commonquery->addRecord('task_master',$task_master_array);
                            // if($_SESSION['balance_session']['user_type']=='mentor'){
                            //     $task_master_array = array(
                            //                         'reminder_title' => 'Lead FU On : '.$_POST['followup_from'],
                            //                         'reminder_text'   => 'Lead FU Scheduled with : '.$_POST['email_id'],
                            //                         'reminder_date'  => date('Y-m-d',strtotime($_POST['reminder_dt'])),
                            //                         'mentor_id'     => $_SESSION['balance_session']['admin_id'],
                            //                         'reminder_time' => date('H:i:s',strtotime($_POST['reminder_time'])),
                            //                         'reminder_ack' => '0',
                            //                         'reminder_added'  => date('Y-m-d H:i:s')
                            //                         );
                            //                       // print_r($task_master_array);exit;
                            //     $this->commonquery->addRecord('mentor_reminders',$task_master_array);
                            // }
                
                    }else{
                        if($counsellor_id_val!=0){
                            $this->db->where(array('lead_id'=>$get_latest_entry['id']));
                            $this->db->update('bn_consultation_call_booking',array('counsellor_id' => $counsellor_id_val,'updated_date'=>$curdateTime));
                        }
                    }
                // ====================================================================================================================================================
                    if($insert_id){
                        $lead_action_array = array(
                                                'email' => $email,
                                                'assign_to' => $this->input->post('assign_to_add'),
                                                'assign_from' => $counsellor_name,
                                                'assign_date'  => date('Y-m-d H:i:s')
                                                );
                        $is_exist = $this->commonquery->getIdByParameter('lead_action',array('email'),array('email'=>$_POST['email_id']));
                        if($is_exist){
                            $result=$this->commonquery->updateRecordnew('lead_action',$lead_action_array,array('email'=>$_POST['email_id']));
                        }else{
                            $email_arr=array(
                                       'email'=>$_POST['email_id'],
                                    );
                            $result= $this->commonquery->addRecord('lead_action',$lead_action_array);
                        }
                        //insert into mentor_reminders;
                        $mentor_id = $this->commonquery->getMentorId($this->input->post('assign_to_add'))['admin_id'];
                        if($counsellor_id!=$mentor_id){
                        $task=array(
                                'mentor_id'=>$mentor_id,
                               'reminder_title'=>'Lead Assigned',
                               'reminder_text'=>'Lead : <a href="https://www.balancenutrition.in/sales_crm/user_details?user_email='.$email.'&user_status=lead" target="_blank">'.$email.'</a> assigned to you',
                               'reminder_date'=>date('Y-m-d'),
                               'reminder_time'=>date('H:i:s'),
                               'reminder_ack'=>0,
                               'reminder_added'=>date('Y-m-d H:i:s'),
                            );
                        $result= $this->commonquery->addRecord('mentor_reminders',$task);
                        }
                        $admin_user = $this->commonquery->getIdByParameter('admin_user',array('crm_user'),array('admin_id' => $this->input->post('assign_to_add')));
                        //$assigned_id =$this->db->insert(' lead_action',$lead_action_array);
                        // assigned chat also if its not assigned;
                        $counsellor_id = $this->session->balance_session['admin_id'];
                        $counsellor_name = $this->session->balance_session['first_name'];
                        $assign_chat = "UPDATE `lead_enquiry` SET `counsellor_id`=$counsellor_id WHERE email_id='".$this->input->post('email_id')."' and counsellor_id=0";
                        $this->db->query($assign_chat);
                        $data['text_msg'] = 'Lead Added Successfully.';
                        $data['email_id'] = $email;
                        // $data['lead_id'] = $lead_id;
                        // echo 'Lead Added Successfully.';
                        echo json_encode($data);
                    }
                }
            }else{
                //echo " : else :";exit;
                $data['text_msg'] = 'Lead Already Exists.';
                        $data['email_id'] = $email;
                        // echo 'Lead Added Successfully.';
                        echo json_encode($data);
                // echo 'Lead Already Exists.';
            }
        }
       
    //   echo encode
    }
    
    
    // ================================================
    


// avinash added this for ideal weight
    public function ideal_weight_calc($_fheight =0,$gender=0,$_iheight=0){
               // calculate ideal weight : Start
                
                $_gender =  trim(strtolower($gender));
                //  $_iheight = ($_iheight < 1 ? 1 : $_iheight);
                
                $wt = 0;
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
    
    
    public function get_states(){
        $country_id = $this->input->post('country_id');
        $data['states'] = $this->commonquery->getStateByCountryNew($country_id);
        echo json_encode($data);
    }
    
    public function get_city(){
        $state_id = $this->input->post('state_id');
        $data['cities'] = $this->commonquery->getCityByState($state_id);
        echo json_encode($data);
    }
    
    public function get_lead_details_data(){
        $data['lead_details_data'] = $this->lead_model->get_lead_details_data_query($_GET);
        //echo '<pre>';print_r($data);die;
        echo json_encode($data);
    }
    public function getPreviousPrograms(){
    // $order_id=$this->input->post('order_id');
        $user_id=$this->input->post('user_id');
        $data['result'] = $this->lead_model->getPreviousProgramsData($user_id);
    
        echo json_encode($data["result"]);
    }
    public function getkeyinsights(){
        $user_id=$this->input->post('user_id');
        $data['result'] = $this->lead_model->getkeyinsightsData($user_id);
    
        echo json_encode($data["result"]);
    }
    
    public function get_lead_action(){
        
        $email = $this->input->post('lead_email');
        $counsellor_id = $this->input->post('assign_id');
    //   echo  $lead_email_alternate = $this->input->post('lead_email_alternate');
    //   echo  $lead_phone_alternate = $this->input->post('lead_phone_alternate');
        
    //     die();
        
        $counsellor_name = $this->session->balance_session['first_name'];
        $admin_id = $this->session->balance_session['admin_id'];
        $lead_id = intval($this->input->post('lead_id'));
        $data = [
               "email" => $email,
               "assign_from" => $counsellor_name,
               "assign_to" => $this->input->post('assign_name'),
               "assign_date" => date("Y-m-d H:i:s"),
            ];
        $is_exist = $this->commonquery->getIdByParameter('lead_action',array('email'),array('email'=>$email));
        if($is_exist){
            $result=$this->commonquery->updateRecord('lead_action',$data,array('email'=>$email));
        }else{
            $this->db->insert('lead_action', $data);
        }
        //assigned chat also if its not assigned;
        $assign_chat = "UPDATE `lead_enquiry` SET `counsellor_id`=$counsellor_id WHERE email_id='$email' and counsellor_id=0";
        $this->db->query($assign_chat);

        if($lead_id!=0){
            $booking_call = "UPDATE `bn_consultation_call_booking` SET `counsellor_id`= $counsellor_id, assigned_by = $admin_id WHERE lead_id='$lead_id'";//die;
            $this->db->query($booking_call);    
        }
        


        $data['message'] = "Assign Successfully";
        $data['print_message'] = $this->input->post('assign_name');
        echo json_encode($data);
    }
    
    public function leadChangeSource(){//for insert query lead_status_log
        $lead_id = $this->input->post('lead_id');
        date_default_timezone_set("Asia/Kolkata");
        $lead_source = $this->input->post('lead_source');
        
       //echo "<pre>"; print_r($this->input->post()); exit;
        $input_data = [
            "lead_id" => $lead_id,       
            "email_id" => $this->input->post('lead_email'),  
            "source" => $lead_source,  
            "created" => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('lead_source_log', $input_data);


        

        $data_updated = [
            "primary_source" => $this->input->post('lead_source')
        ];
        $this->db->where('id',$lead_id);
        $this->db->update('lead_management',$data_updated);
        


        $data['message'] = "Source Updated Successfully";
        $data['print_message'] = $lead_source;
        
        echo json_encode($data);
    }
    
    public function get_lead_status_action(){//for insert query lead_status_log
        $lead_id = $this->input->post('lead_id');
        date_default_timezone_set("Asia/Kolkata");
        if(strtolower($this->input->post('lead_status')) == "spam" ){ 
            $data_log = [
               "email" => $this->input->post('lead_email'),
               "status" => $this->input->post('lead_status'),
               "stage" => '1',
               "created" => date("Y-m-d H:i:s"),
            ];
        }else{
            $data_log = [
               "email" => $this->input->post('lead_email'),
               "status" => $this->input->post('lead_status'),
               "stage" => $this->input->post('lead_stage'),
               "created" => date("Y-m-d H:i:s"),
            ];
        }
        
        $this->db->insert('lead_status_log', $data_log);
        $data_updated = [
            "status" => $this->input->post('lead_status')
        ];
        $this->db->where('id',$lead_id);
        $this->db->update('lead_management',$data_updated);
        
        $data['message'] = "Status Updated Successfully";
        $data['print_message'] = $this->input->post('lead_status');
        
        echo json_encode($data);
    }
    public function get_phase_status_action(){//for insert query lead_status_log
        $lead_id = $this->input->post('lead_id');
        date_default_timezone_set("Asia/Kolkata");
        /*echo '<pre>';
        print_r($_POST);
        die;*/
        $phase = 0;
        if (strtolower($this->input->post('lead_phase'))=="phase 1") {
            $phase = 1;
        }elseif (strtolower($this->input->post('lead_phase'))=="phase 2") {
            $phase = 2;
        }elseif (strtolower($this->input->post('lead_phase'))=="phase 3") {
            $phase = 3;
        }elseif (strtolower($this->input->post('lead_phase'))=="phase 4") {
            $phase = 4;
        }else{
            $phase = 0;
        }
        $data_log = [
           "email" => $this->input->post('lead_email'),
           "phase" => $phase,
           "created" => date("Y-m-d H:i:s"),
        ];
        /*echo '<pre>';
        print_r($_POST);
        die;*/
        $this->db->insert('lead_status_log', $data_log);
        $data_updated = [
            "phase" => $phase
        ];
        $this->db->where('email',$this->input->post('lead_email'));
        $this->db->update('lead_management',$data_updated);
        
        $data['message'] = "Phase Updated Successfully";
        $data['print_message'] = $this->input->post('lead_status');
        
        echo json_encode($data);
    }

    public function get_suggested_program_action(){//for insert query lead_status_log
        $lead_id = $this->input->post('lead_id');
        date_default_timezone_set("Asia/Kolkata");
        
        if(!empty($this->input->post('lead_email'))){
        $suggested_program = "";
        if (strtolower($this->input->post('lead_suggested_program'))!='') {
            $suggested_program = strtolower($this->input->post('lead_suggested_program'));
            if($suggested_program=='select'){
            	$suggested_program = "";
            }
        }else{
        	$suggested_program = "";
        }
        $data_log = [
           "email" => $this->input->post('lead_email'),
           "suggested_program" => $suggested_program,
           "created" => date("Y-m-d H:i:s"),
        ];
        /*echo '<pre>';
        print_r($_POST);
        die;*/
        $this->db->insert('lead_status_log', $data_log);
        $lead_status=$this->input->post('lead_status');
        }else{
            $suggested_program = $this->input->post('lead_suggested_program');
            $lead_status=$this->input->post('lead_status');
        }
        $data_updated = [
            "suggested_program" => $suggested_program
        ];
        $this->db->where('id',$lead_id);
        $this->db->update('lead_management',$data_updated);
        
        $data['message'] = "Suggested Program Updated Successfully";
        $data['print_message'] = $lead_status;
        
        //echo json_encode($data);
        echo 'Updated Successfully';
    }
    
    public function bulk_lead_update(){
        // var_dump(str_replace('%2C','||',str_replace('%7C','|',str_replace('%40','@',$this->input->post('lead_data')))));
        // exit;
        $lead_data = explode('%2C',str_replace('lead_data=','',str_replace('%7C','|',str_replace('%40','@',$this->input->post('lead_data'))))); //comma seperated;
        
        @$lead_action = explode('&',end(str_replace('1|undefined|undefined&','',$lead_data)));
        $assign_to = '';
        $lead_status = '';
        $result = '';
        // echo "<pre>";
        // print_r($lead_data);
        // exit;
        foreach($lead_action as $key=> $value ){
            $action_values = explode('=',$value);
            if($action_values[0] == 'bulk_assign_action'){
                
                $assign_to = $action_values[1];
            }elseif($action_values[0] == 'bulk_lead_status'){
                $lead_status = $action_values[1];
            }
        }
        
        for($i=0;$i<COUNT($lead_data)-1;$i++){
            $user_data = explode('|',$lead_data[$i]);  //at 0 index => lead id|| 1 index => Phone || 2 index => email_id
            $check_lead_action = $this->commonquery->getIdByParameter('lead_action',array('id'),array('email' => $user_data[2]));
            if(!empty($assign_to)){
                
                $assign_to_data = $this->commonquery->getIdByParameter('admin_user',array('*'),array('admin_id' => $assign_to));
                $action_array = array(
                                'assign_to' => $assign_to_data['crm_user'],
                                'assign_date' => date('Y-m-d H:i:s')
                                );
                if(empty($check_lead_action)){
                    $action_array['email'] = $user_data[2];
                    $result = $this->commonquery->addRecord('lead_action',$action_array);
                }else{
                    $result=$this->commonquery->updateRecord('lead_action',$action_array,array('email'=>$user_data[2]));
                }
            }
            if(!empty($lead_status)){
                
                $lead_status_data = $this->commonquery->getIdByParameter('bn_lead_status',array('*'),array('id' => $lead_status));
                $status_array= array(
                                'status' => $lead_status_data['status_name']
                                );
                $result=$this->commonquery->updateRecord('lead_management',$status_array,array('id'=>$user_data[0]));
            }
        }
        if($result){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    
    public function global_search(){
        $search = trim($this->input->post('term'));
        $resultSet = $this->query->global_search($search);
        echo json_encode($resultSet);
    }
    
    
    
    
    
    public function nina_stages($source,$status,$number){
    	$stage = 2;
    	
    	$prime_source = $this->commonquery->getPrimeSource(1);
        $social_media_source = $this->commonquery->getPrimeSource(2);
        $prime_status = array("Hot");
        
        if(strlen($number)>4 && in_array($status, $prime_status)){$stage=4;}
        elseif($source=="Referral" && $status=="Hot"){$stage = 4;}
        elseif(strlen($number)>4 && in_array($status, $prime_source)){$stage=3;}
        elseif(strlen($number)>4 && in_array($source, $social_media_source)){$stage=3;}
    	elseif($source=="Referral" && $status=="Warm"){$stage = 3;}
    	elseif($source=="Referral" && $status=="To Engage"){$stage = 3;}
    	elseif($source=="Referral" && $status=="Cold"){$stage = 1;}
    	elseif($source=="Referral" && $status=="Spam"){$stage = 1;}
    	elseif(strlen($number)>4){$stage=3;}
        elseif(strlen($number)<=4){$stage=2;}else{$stage=1;}
    	
    	return $stage;
    }
    
    public function export_list(){
        // print_r($_GET);exit;
        $list_type = $this->input->get('type');
        $date_from = $this->input->get('df');
        $date_to = $this->input->get('dt');
        $age_from = $this->input->get('agf');
        $age_to = $this->input->get('agt');
        
        $daterange = $date_from.'_'.$date_to;
        $date_range = 'df='.$date_from.'&dt='.$date_to.'&agf='.$age_from.'&agt='.$age_to;
        
        // print_r($date_range);exit;
        $data = array();
        $j= 1;
        
        
        switch($list_type){
            case 'lead_list':
                // $header = "Sr No,Name,Email id,Status at visit,Current Program,Program page,Visits,Mentor name";
                $header = "Sr No,Name,Email Id,Phone, Gender,Age,Date,Consultation,Mobile Verify, Health Category,Medi. Issues,Curr. Wt.,BMI,Ideal Wt.,Source,L. Type, Status, Stage, Key Insight, Assign";
                $header = explode(',',$header);
                $filename = 'Lead_list '.$daterange.'.csv';
                $data = $this->lead_model->get_lead_details_data_query($_GET); 
                // $this->mis_client_app_model->get_welcome_call_pending_export_data_query();
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
                                     $one['stage'],
                                     $one['key_insight'],
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

    function export_list_to_csv(){
        $filename = (isset($_GET['file_name']) && !empty($_GET['file_name'])) ? $_GET['file_name'] : 'no_name' ;
        $header = (isset($_GET['header']) && !empty($_GET['header'])) ?  explode(',',$_GET['header']) : 'no_headers' ;
        $data[] = (isset($_GET['data']) && !empty($_GET['data'])) ? explode(',',$_GET['data']) : 'no_data' ;
        print_r($_GET['data']);
        //export_to_csv($filename,$header,$data);  
    }
    function order_history(){
        $data['title'] = "Leads List";
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        $data['faqs_details']=$this->faq_model->get_all_faqs(); 
        $data['faqs_titles']=$this->faq_model->get_all_faq_titles();
        $data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
        $data['page']='lead';
        display_view('order_history',$data);
    }
    public function get_order_details_data(){
        $data['order_details_data'] = $this->lead_model->get_order_history_data_query($_GET);
        /*echo '<pre>';
        print_r($data);
        die;*/
        echo json_encode($data);
    }
    
    
     public function get_spin_details_data(){
        $data['spin_details_data'] = $this->lead_model->get_spin_history_data_query($_GET);
        /*echo '<pre>';
        print_r($data);
        die;*/
        echo json_encode($data);
    }
    
     function spin_history(){
        $data['title'] = "Spin List";
         $data['page']='lead';
        // $data['spin_details_data'] = $this->lead_model->get_spin_history_data_query();
    //     print_r($data);
    //   echo  $this->db->last_query();
    //     die();
        display_view('spin_history',$data);
    }
    
     public function get_spin_details_all_data(){
        $data['spin_details_data'] = $this->lead_model->get_spin_all_data_query($_GET);
        /*echo '<pre>';
        print_r($data);
        die;*/
        echo json_encode($data);
    }
    
     function spin_history_all(){
        $data['title'] = "All Lead Spin List";
         $data['page']='lead';
        // $data['spin_details_data'] = $this->lead_model->get_spin_all_data_query();
    //     print_r($data);
    //   echo  $this->db->last_query();
    //     die();
        display_view('spin_history_all',$data);
    }

    function get_products(){
        $data['title'] = "Leads List";
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        $data['faqs_details']=$this->faq_model->get_all_faqs(); 
        $data['faqs_titles']=$this->faq_model->get_all_faq_titles();
        $data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
        display_view('testing',$data);
    }
    public function get_order_details_data__(){

        ## Read value
        error_reporting(0);
        $draw = $_GET['draw'];
        $row = $_GET['start'];
        $rowperpage = $_GET['length']; // Rows display per page
        $columnIndex = $_GET['order'][0]['column']; // Column index
        $columnName = $_GET['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_GET['order'][0]['dir']; // asc or desc
        $searchValue = trim($_GET['search']['value']); // Search value
        $data['totalRecordsFilter'] = 0;
        $data['totalRecords'] = 0;
        ## Search 
        $searchQuery = " ";
        $data['order_details_data'] = $this->lead_model->get_order_history_data_query__($_GET,$searchValue,$columnSortOrder,$columnName,$row,$rowperpage);
       $data['totalRecordsFilter'] = 60000;
        //print_r($data);die;

        $data1 = [];
        foreach($data['order_details_data'] as $r) {

            $data1[] = array(
                $r['id'],
                $r['fu_note'],
                $r['fu_other_note'],
                $r['key_insight'],
                $r['profile']
            );
        }
        /*if($searchValue != ''){
            $searchQuery = " and (emp_name like '%".$searchValue."%' or 
                email like '%".$searchValue."%' or 
                city like'%".$searchValue."%' ) ";
        }

        ## Total number of records without filtering
        $sel = mysqli_query($con,"select count(*) as allcount from employee");
        $records = mysqli_fetch_assoc($sel);
        $totalRecords = $records['allcount'];

        ## Total number of records with filtering
        $sel = mysqli_query($con,"select count(*) as allcount from employee WHERE 1 ".$searchQuery);
        $records = mysqli_fetch_assoc($sel);
        $totalRecordwithFilter = $records['allcount'];

        ## Fetch records
        $empQuery = "select * from employee WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
        $empRecords = mysqli_query($con, $empQuery);
        $data = array();

        while ($row = mysqli_fetch_assoc($empRecords)) {
            $data[] = array(
                    "emp_name"=>$row['emp_name'],
                    "email"=>$row['email'],
                    "gender"=>$row['gender'],
                    "salary"=>$row['salary'],
                    "city"=>$row['city']
                );
        }*/
        $totalRecords = $data['totalRecordsFilter'];
        $totalRecordwithFilter = $data['totalRecordsFilter'];
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => intval($totalRecords),
            "iTotalDisplayRecords" => intval($totalRecordwithFilter),
            "data" => $data['order_details_data']
        );

        echo json_encode($response);
    }
    
    // =============================================AVINASH ADDED FOR CHECKOUT HISTORY====================================================
    public function get_checkoutpage_visited_client_list(){
       $data['get_real_timevisited_checkout'] = $this->lead_model->checkout_client_10am_to_7pm($this->mentor_id);
       $data['over_night_visited_checkout'] = $this->lead_model->checkout_client_7pm_to_10am($this->mentor_id);
       $data['last_8days_checkout'] = $this->lead_model->checkout_client_8_days_before($this->mentor_id);
       $data['un_assigned_checkout'] = '';//$this->lead_model->checkout_client_un_assigned($this->mentor_id);
    //   echo "<pre>";
    //   print_r($data);
    //   exit;
       display_view('check_out_history',$data);
    //   echo json_encode($data);
    }
    
}
