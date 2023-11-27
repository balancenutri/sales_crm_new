<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead_data extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('lead_m');
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
        $data['title'] = "Leads Data";
       display_view('index',$data);

    }

    public function getLeadData() {
        $councellor_id = $this->councellor_id;
        $response = $this->lead_m->fetchLeadData($councellor_id);
        echo json_encode($response);
    }



}
