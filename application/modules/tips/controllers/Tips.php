<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tips extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('login');
        $this->load->model('tips_model');
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
        $data['title'] = "Add Tips & Display";
       display_view('index',$data);

    }

  public function addTips() {
    if ($this->input->post()) {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $upload_path = './images/tips_recepies/';
        // print_r($_FILES['images']['name']);exit;
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $this->load->library('upload', $config);

        $uploaded_images = array();

        foreach ($_FILES['images']['name'] as $key => $image_name) {
            $_FILES['image']['name'] = $_FILES['images']['name'][$key];
            $_FILES['image']['type'] = $_FILES['images']['type'][$key];
            $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
            $_FILES['image']['error'] = $_FILES['images']['error'][$key];
            $_FILES['image']['size'] = $_FILES['images']['size'][$key];

            if (!$this->upload->do_upload('image')) {
                $error = $this->upload->display_errors();
                $data = array(
                    'status' => 'error',
                    'message' => 'Error uploading image: ' . $error,
                );
                echo json_encode($data);
                return;
            }

            $uploaded_images[] = $this->upload->data('file_name');
        }

        $image_names_str = implode(',', $uploaded_images);

        // Create an array with the data to be inserted into the database
        $data_to_insert = array(
            'title' => $title,
            'image' => $image_names_str,
            'description' => $description
        );

        // Pass the array to the model method for database insertion
        $result = $this->tips_model->insertTipsData($data_to_insert);

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Data submitted successfully',
                'data' => $data_to_insert,
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error submitting data',
            );
            echo json_encode($response);
        }
    }
}

    
    public function getTipsData() {
        $tipsData = $this->tips_model->getTipsData();
        echo json_encode($tipsData);
    }
    
    public function deleteTips() {
        $tipId = $this->input->post('tip_id');
    
        if ($this->tips_model->deleteTipsData($tipId)) {
            $response = array(
                'status' => 'success',
                'message' => 'Data deleted successfully',
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error deleting data',
            );
        }
        
        echo json_encode($response);
    }

    public function editTips()
{
    if ($this->input->post()) {
        
        $tipId = $this->input->post('tip_id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $upload_path = './images/tips_recepies/';

print_r($_FILES['newImages']['name']);
print_r($this->input->post('existingImages'));
exit;
        // Check if new images are provided
        if (!empty($_FILES['editImage']['name'][0])) {
            $images = array();
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            foreach ($_FILES['editImage']['name'] as $key => $image) {
                $_FILES['userfile']['name'] = $_FILES['editImage']['name'][$key];
                $_FILES['userfile']['type'] = $_FILES['editImage']['type'][$key];
                $_FILES['userfile']['tmp_name'] = $_FILES['editImage']['tmp_name'][$key];
                $_FILES['userfile']['error'] = $_FILES['editImage']['error'][$key];
                $_FILES['userfile']['size'] = $_FILES['editImage']['size'][$key];

                if (!$this->upload->do_upload('userfile')) {
                    $error = $this->upload->display_errors();
                    $response = array(
                        'status' => 'error',
                        'message' => 'Error uploading image: ' . $error,
                    );
                    echo json_encode($response);
                    return;
                }

                $images[] = $_FILES['userfile']['name'];
            }

            // Update the image with the compressed ones
            $data_to_update = array(
                'title' => $title,
                'image' => implode(',', $images),
                'description' => $description
            );
        } else {
            // No new image provided, use the existing images
            $data_to_update = array(
                'title' => $title,
                'description' => $description
            );
        }

        $result = $this->tips_model->editTipsData($tipId, $data_to_update);
        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Data updated successfully',
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error updating data',
            );
        }

        echo json_encode($response);
    }
}


}
