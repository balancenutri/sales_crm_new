<?php defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends MX_Controller
{
    // start of class

    public function __construct()
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('chat_model');
        $this->load->model('faq/faq_model');
        $this->councellor_id = $this->session->balance_session['admin_id'];

        $this->load->library('commonquery');
        $this->load->library(['query']);

        if ($this->login->check_if_logged_in() === FALSE) {
            redirect('');
        }

    }
    public function index($name="",$email_str = '')
    {
        $email_id = urldecode($email_str);
        $data['name'] ='';
        $councellor_id = $this->councellor_id;
        $data['chats'] = $this->chat_model->get_lead_queries($email_id, $this->councellor_id, 60);
        $data['select'] = '';
        $data['select'] = '';
        $data['councellor_id'] = '';
        if ($email_id) {
            $data['select'] = $email_id;
            $data['councellor_id'] = $councellor_id;
            $data['chat_records'] = $this->chat_model->get_lead_queries_chat($email_id, $this->councellor_id, 0);
            $data['name']= $name;
            // print_r($this->db->last_query());exit;
        } else {
            $data['chat_records'] = [];
        }
        display_view('index', $data);
    }

    public function fetch_unread_lead_message() {
        // print_r("test);exit;
        $email_id = $this->input->post('email_id'); // Access email_id from POST data
        $lastTimestamp = $this->input->post('lastTimestamp');
        if (!empty($email_id)) {
            // Use the $email_id parameter in your logic
            $councellor_id = $this->councellor_id;
            $data['councellor_id'] = $councellor_id;
            $data['chat_records'] = $this->chat_model->fetch_unread_lead_chat($email_id, $councellor_id,$lastTimestamp, 0);
           
            echo json_encode($data); // For example, send data as JSON
        } else {
            $data['chat_records'] = [];
        }
    }
    
    public function insert_Chat_data1()
    {
        if ($this->input->is_ajax_request()) {
            $files = [];
            $councellor_id = $this->councellor_id;
            $leadEmail = $this->input->post('leadEmail');
            $councelor_reply = $this->input->post('councelor_reply');
    
            $this->form_validation->set_rules('leadEmail', 'Email', 'required');
    
            if ($this->form_validation->run($this) == FALSE) {
                $arr = explode(",", str_replace("\n", ",", strip_tags(validation_errors())));
                $response_data = array(
                    'status' => false,
                    'message' => $arr[0]
                );
            } else {
                if (empty($councelor_reply) && empty($_FILES['attachment']['name'])) {
                    $response_data = array(
                        'status' => false,
                        'message' => 'Please write some message.'
                    );
                    echo json_encode($response_data);
                    die();
                } else {
                    $file_rel_path = 'sales_crm/images/councellor/';
                    $dir = UPLOAD_PATH . $file_rel_path;
    
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                        chmod($dir, 0777);
                    }
    
                    $message = $councelor_reply;
    
                    if (!empty($_FILES['attachment']['name'])) {
                        $files = [];
    
                        foreach ($_FILES as $file) {
                            if (!empty($file['name'])) {
                                $tmpFilePath = $file['tmp_name'];
                                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                                $unique_code = uniqid();
                                $shortname = date('d-m-Y-G-i-s') . '_' . $unique_code . '_' . $file['name'];
                                $filePath = $dir . $shortname;
    
                                if (move_uploaded_file($tmpFilePath, $filePath)) {
                                    $files[] = $shortname;
                                } else {
                                    print_r($file['error']);
                                }
                            }
                        }
                    }
    
                    $user_details = $this->commonquery->getIdByParameter('admin_user', array('*'), array('admin_id' => $this->councellor_id));
    
                    $insert_data = [
                        'query' => (empty($message)) ? '' : urlencode($message),
                        'attachment' => implode(',', $files), // Store file data as JSON
                        'email_id' => 'salunkhevaishnavi2001@gmail.com',
                        'name' => $user_details['full_name'],
                        'type' => 'reply',
                        'read_status' => 2,
                        'lead_type' => 'councellor',
                        'councellor_id' => $this->councellor_id,
                        'created' => date('Y-m-d H:i:s'),
                    ];
    
                    $chat_id = $this->commonquery->addRecord('lead_councellor_chat', $insert_data);
                    if ($chat_id) {
                        $data = [
                            'is_response' => 0,
                            'view_flag' => 0,
                            'type' => 'replied',
                            'read_status' => 1,
                            'view_by_councellor' => 1,
                            'read_by_councellor' => 1,
                        ];
                        $where = [
                            'type' => 'query',
                            'id <' => $chat_id,
                            'email_id' => $leadEmail,
                        ];
    
                        $update_query = $this->commonquery->updateRecord('lead_councellor_chat', $data, $where);
    
                        if ($update_query) {
                            $response_data = array(
                                'status' => 'success',
                                'message' => 'Message sent',
                                'inserted_data' => $insert_data
                            );
                            echo json_encode($response_data);
                            
                        }
                    }
                    

                }
            }
        }
    }
    

}