<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tips_model extends CI_Model
{
    public function insertTipsData($data)
    {
        $this->db->insert('recipe_and_blog_tips', $data);
        return $this->db->affected_rows() > 0;
    }

    public function getTipsData()
    {
        $this->db->where('is_deleted', 0);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('recipe_and_blog_tips')->result();
    }

    public function deleteTipsData($tipId)
    {
        $this->db->where('id', $tipId);
        $this->db->delete('recipe_and_blog_tips');
        return $this->db->affected_rows() > 0;
    }

    public function editTipsData($tipId, $data)
    {
        $this->db->where('id', $tipId);
        $this->db->update('recipe_and_blog_tips', $data);
        
        if ($this->db->affected_rows() > 0) {
          
            return true;
        } else {
        
            return false;
        }
        
    }
}

