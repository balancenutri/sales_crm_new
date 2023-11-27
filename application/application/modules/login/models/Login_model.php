<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    // start of class
    
    public function __construct() 
    {
        parent::__construct();        
        
    }

    public function search_user_by_email($email_id = '')
    {
        //  function search_user_by_email : Start
        $email_id = trim($email_id);
        $sql = 'SELECT `admin_id`,`first_name`,`last_name`,`full_name`,`email_id`,`password`,`enc_password`,`user_type`,`user_status`,`photo`,`mentorSalesId` FROM `admin_user` WHERE 1 AND `email_id` = '.$this->db->escape($email_id);
        
        $sql = $this->db->query($sql);           
        if($sql->num_rows() > 0)
        {
            return $sql->row_array();
        }
        
        return [];
        //  function search_user_by_email : End
    }

    public function getSalesEmailidPassword($sales_id='')
    {
        # code...
        $sql="SELECT
                    `email_id`,
                    `password`
                FROM
                    `admin_user`
                WHERE
                    admin_id = '$sales_id'";

        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->row_array();
        }else{
            return [];
        }
    }
    
    public function search_user_by_id($user_id = '')
    {
        //  function search_user_by_id : Start
        if( ! empty ($user_id))
        {
            $sql = ' SELECT reg.`id`, reg.`first_name`, reg.`last_name`, reg.`email_id`, reg.`password`, reg.`is_block`, reg.`allow_food_diary`, reg.`mentor_id`,reg.`profile_image` as user_image,
                            au.`first_name` as mentor_fname, au.`last_name` as mentor_lname, au.`email_id` as mentor_email_id,au.`photo`as mentor_photo
                     FROM `registries` AS reg
                     LEFT OUTER JOIN `admin_user` AS au ON ( au.`admin_id` = reg.`mentor_id` )
                     WHERE ( reg.`id` = '.$this->db->escape($user_id).' )  ';
                //     AND ( LCASE(reg.`user_status`) = "active" )
    
            $sql = $this->db->query($sql);

                if($sql->num_rows() > 0)
                {
                    return $sql->row_array();
                }
        }
        return [];
        //  function search_user_by_id : End
    }
    
    public function get_page_access($user_type = '')
    {
        //  function get_page_access : Start
        if( ! empty ($user_type))
        {
            $sql = ' SELECT `user_code`, `page_id`
                     FROM `mod_page_rights` AS mpr
                     WHERE ( user_code = '.$this->db->escape($user_type).' )  ';
    
            $sql = $this->db->query($sql);

                if($sql->num_rows() > 0)
                {
                    $temp = $sql->row_array();
                    return explode(',', $temp['page_id']);
                }
        }
        return [];
        //  function get_page_access : End
    }
    
  
    // end of class
}