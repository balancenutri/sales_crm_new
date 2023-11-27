<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MX_Controller 
{
    // start of class
    
        public function __construct() 
        {
            parent::__construct();
            $this->load->module('login');
            $this->load->module('dashboard/mentor');

            
        }
        
	public function index()
	{
            $this->process_logout();
	}
        
        public function process_logout()
        {
            /* function process_logout : Start */

            if(trim(strtolower($this->session->balance_session['user_type']))=='mentor')
            {
            	
            	/* $data=$this->mentor->get_wmr_acknowledge($this->session->balance_session['admin_id']);
            	if($data>0)
            	{

            		$this->session->set_flashdata('info_msg', 'Your Weight Monitor Record is not Acknowledge');

					//redirect to some function
					redirect("mentor");
            	} */
            }

            $id=$this->session->balance_session['admin_id'];
            $user_type=$this->session->balance_session['user_type'];
            $this->login->login_logs($id,$user_type,'logout',0);

            // unset cookies : Start
                setcookie('bna', '', time() - 3600);
                setcookie('bnb', '', time() - 3600);
            // unset cookies : End
            
            // destroy the session
            $this->session->sess_destroy();
            
            
            // redirect to home page
            redirect('');
            
            //  function process_logout : End
        }
       
        
        
        
        
    // end of class    
}
