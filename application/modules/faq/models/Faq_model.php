<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model
{
    // Start of class
    
    /*
	*	Author : Vinayak Phutane
	*	Created Date : 2018-05-02
	* 	
    */
	 
    var $table;

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('query');         

        $this->table="faq";
    }


    public function get_all_faqs()
    {
        $this->db->order_by('faq_id','ASC');
        $this->db->from('faq');
        $query=$this->db->get();
        return $query->result();
    }
    public function get_all_faq_titles()
    {
        /*$this->db->select('title');
        $this->db->group_by('title');
        $this->db->order_by('title','ASC');
        $this->db->from('faq');
        $query=$this->db->get();
        return $query->result();*/
        $query = $this->db->query('SELECT title FROM `faq` group by title order by title ASC');
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
        
            
    }

    public function getMentorDraft($mentor_id='', $id='')
    {
        $sql="SELECT * FROM mentor_owned_draft WHERE created_by=$mentor_id AND is_deleted='0' ";

        if(!empty($id))
        {
            $sql.=" AND id=$id";
        }

        $sql.=" ORDER BY created_date DESC";

        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }
    


    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('faq_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function faq_add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function faq_update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('faq_id', $id);
        $this->db->delete($this->table);
    }
    

   
}



