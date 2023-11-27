<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Health_blog extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('health_blog_model');
        $this->load->model('faq/faq_model');
        $this->councellor_id = $this->session->balance_session['admin_id'];
        $this->load->library('commonquery');
        $this->load->library('query');

        if ($this->login->check_if_logged_in() === FALSE) {
            redirect('');
        }
    }

    public function index()
    {
        $data['title'] = "Healthy Recepies & Blog";
       display_view('index',$data);

    }

    public function getHealthBlogData() {
        $response = $this->health_blog_model->fetchHealthBlogData();
        echo json_encode($response);
    }

    public function get_user_record(){
        $screen_name = $this->input->post('screen_name'); // Access email_id from POST data
        $duration = $this->input->post('duration');
        $response = $this->health_blog_model->get_user_details($screen_name,$duration);
        echo json_encode($response);

    }
    
}
