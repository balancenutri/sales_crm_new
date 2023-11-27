<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MX_Controller 
{    
    var $mentor_id;

    public function __construct() 
    {
        parent::__construct();             
        $this->load->library('Commonquery');        
        $this->load->library('query');
        $this->load->model('faq_model');

        $this->mentor_id=$this->session->balance_session['admin_id'];
    }
    
    public function index()
    {
        //  function mentor_dashboard : Start
        $data = [];
        
        $data['faqs_details']=$this->faq_model->get_all_faqs();	
		$data['faqs_titles']=$this->faq_model->get_all_faq_titles();
		$data['mentor_draft']=$this->faq_model->getMentorDraft($this->mentor_id);
		
        display_view('faq_master',$data);
        
        //  function mentor_dashboard : End    
	}
	
	public function getMentorDraftById()
	{
		$id=$this->input->post('id');
		$result=$this->faq_model->getMentorDraft($this->mentor_id,$id);

		echo json_encode($result);
	}


    public function faq_add()
	{
		$data = array(
				'title' => $this->input->post('title'),
				'type' => $this->input->post('type'),
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'keyword' => $this->input->post('title'). ' '.$this->input->post('question'),
				'created_by'=>$this->mentor_id,
				'created_date'=>date('Y-m-d G:i:s'),
			);
		
		echo json_encode($data);
		
			
		// $insert = $this->faq_model->faq_add($data);
		// echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_edit($id)
	{
		$data = $this->faq_model->get_by_id($id);
		echo json_encode($data);
	}

	public function faq_update()
	{
		$data = array(
				'title' => $this->input->post('title'),
				'type' => $this->input->post('type'),
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'keyword' => $this->input->post('title'). ' '.$this->input->post('question'),
				'updated_by'=>$this->mentor_id,
				'updated_date'=>date('Y-m-d G:i:s'),
			);

		$this->faq_model->faq_update(array('faq_id' => $this->input->post('faq_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function faq_delete($id)
	{
		$this->faq_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	public function draft_delete($id)
	{
		$this->db->where(array('id'=>$id));
		$this->db->update('mentor_owned_draft',array('is_deleted'=>1,'deleted_by'=>$this->mentor_id,'deleted_date'=>date('Y-m-d H:i:s')));

		echo json_encode(array("status" => TRUE));
	}

	public function exportfaq()
	{
		$data['faqs_details']=$this->faq_model->get_all_faqs();		        	    	                                                             
        $this->load->view('export_faq',$data);
	}


	public function addMentorDraft()
	{
		$faq_id=$this->input->post('mfaq_id');
		$question=$this->input->post('mquestion');
		$answer=$this->input->post('manswer');

		if(!empty($faq_id))
		{
			$data = array(				
				'question' => $this->input->post('mquestion'),
				'answer' => $this->input->post('manswer'),
				'created_by'=>$this->mentor_id,
				'created_date'=>date('Y-m-d H:i:s'),
			);
				
			$insert =$this->db->update('mentor_owned_draft',$data,array('id'=>$faq_id)); 

			if($this->db->affected_rows()>0)
			{
				echo "Record Updated Successfully";
			}else{
				echo "Oops something went wrong";
			}
			
			
		}else{

			$data = array(				
				'question' => $this->input->post('mquestion'),
				'answer' => $this->input->post('manswer'),
				'created_by'=>$this->mentor_id,
				'created_date'=>date('Y-m-d H:i:s'),
			);
				
			$insert =$this->db->insert('mentor_owned_draft',$data); 
			
			if($this->db->insert_id()>0)
			{
				echo "Record added successfully";
			}else{
				echo "Oops something went wrong";
			}
		}

	}
   

}