<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MX_Controller 
{
    // start of class

    public function __construct() 
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('chat_model');
        $this->load->model('faq/faq_model');
        $this->mentor_id=$this->session->balance_session['admin_id'];
        
        $this->load->library('commonquery');
        $this->load->library(['query']);
    
        if($this->login->check_if_logged_in() === FALSE)
        {
            redirect(''); 
        }

    }

    public function index()
    {
        $unread_id = $this->input->post('unread_id');
        $data['title'] = "User Details List";
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        $data['chat_lead_list'] = $this->chat_model->get_chat_lead_list($unread_id);
        $data['chat_unread_count'] = count($data['chat_lead_list']);
        
        $data['faqs_details']=$this->faq_model->get_all_faqs();	
		$data['faqs_titles']=$this->faq_model->get_all_faq_titles();
		$data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
		
        // $data['get_user_details'] = $this->chat_model->get_user_details(); 
        display_view('index',$data);
    }
    
    public function chat_lead_list(){
        $unread_id = $this->input->post('unread_id');
        $data['chat_lead_list'] = $this->chat_model->get_chat_lead_list($unread_id);
        $i=0;
        foreach($data['chat_lead_list'] as $val){
            $data['chat_lead_list'][$i]['created_date'] = $this->time_elapsed_string($val['created_date']);
            $i++;
        }
        echo json_encode($data);
    }
    
    public function get_header_user_details(){
        $user_id = $this->input->post('user_id');
        $email_id = $this->input->post('user_email');
        $data['user_details'] = $this->chat_model->get_header_user_details($email_id);
        //$data['html'] = $email_id;
        
        echo json_encode($data);
    }
    
    public function get_user_chat(){
        $user_id = $this->input->post('user_id');
        $email_id = $this->input->post('user_email');
        $limit = $this->input->post('limit_id');//exit;
        $data['user_chat'] = $this->chat_model->get_user_chat($email_id,$user_id,$limit);
        echo json_encode($data);
    }
    public function send_chat_msg(){
        //print_r($_GET);exit;
        $user_id = $this->input->get('user_id');
        $email_id = $this->input->get('user_email');
        $message = $this->input->get('message');
        $attachment = $this->input->get('attachment');
        $data['user_chat'] = $this->chat_model->send_chat_msg($email_id,$user_id,$message,$attachment);
        redirect('chat', 'refresh');
    }
    
    public function time_elapsed_string($datetime, $full = false) {
        date_default_timezone_set("Asia/Kolkata");
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
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
    
    
}