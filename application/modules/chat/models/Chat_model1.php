<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
        // $this->load->library('query');
    }
    
    public function get_chat_lead_list($unread_id){
        $counsellor_id = $this->session->balance_session['admin_id'];
        if($unread_id==0){ // for Unread messages
            $sql = "SELECT
                le.user_id,
                le.email_id,
                rg.phone,
                CASE
                    WHEN le.counsellor_id=0 THEN '(Unassigned)'
                    ELSE ''
                END as lead_assigned,
                CONCAT(first_name, ' ', last_name) AS name,
                rg.profile_image,
                LEFT(le.message, 20) AS last_text,
                (SELECT
                    COUNT(id) AS unread
                FROM
                    lead_enquiry
                WHERE
                   user_id=le.user_id AND counsellor_id IN($counsellor_id, 0) AND read_status = 0 AND msg_type = 0
                GROUP BY
                    user_id) AS unread,
                le.created_date
            FROM
                `lead_enquiry` le
            LEFT JOIN registries rg ON
                le.user_id = rg.id
            WHERE
                read_status = 0 AND msg_type = 0 AND counsellor_id IN($counsellor_id, 0) 
            	GROUP BY
                    user_id 
            	ORDER BY le.id DESC";
        }else{ // for read messages
            $sql = "SELECT
                le.user_id,
                le.email_id,
                rg.phone,
                CASE
                    WHEN le.counsellor_id=0 THEN '(Unassigend)'
                    ELSE ''
                END as lead_assigned,
                CONCAT(first_name, ' ', last_name) AS name,
                rg.profile_image,
                LEFT(le.message, 20) AS last_text,
                le.created_date
            FROM
                `lead_enquiry` le
            LEFT JOIN registries rg ON
                le.user_id = rg.id
            WHERE
                read_status = 1 AND msg_type = 0 AND counsellor_id IN($counsellor_id, 0) 
            	GROUP BY
                    user_id 
            	ORDER BY le.id DESC";   
        }
        //echo $sql;
       //exit;
        
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }
    public function get_user_chat($email_id,$user_id,$limit_condition){
        //echo $email_id;exit;
        $limit_count = " limit ".($limit_condition*10);
        $update_chat = "UPDATE `lead_enquiry` SET `read_status`=1 WHERE user_id='$user_id' and `read_status`= 0";
        $this->db->query($update_chat);
        
        $sql = "SELECT `message`,`counsellor_id`, `msg_type`, `attachments`, DATE_FORMAT(`created_date`,'%D %b %y %h:%i %p') as date, `read_status` FROM `lead_enquiry` where user_id='$user_id' $limit_count";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0){
            $result = $query->row_array();
            
            if($result['counsellor_id']==0) { // assign lead to counsellor
                date_default_timezone_set("Asia/Kolkata");
                $counsellor_name = $this->session->balance_session['first_name'];
                $counsellor_id = $this->session->balance_session['admin_id'];
                $data = [
                   "email" => $email_id,
                   "assign_from" => $counsellor_name,
                   "assign_to" => $counsellor_name,
                   "assign_date" => date("Y-m-d H:i:s"),
                ];
                $this->db->insert('lead_action', $data);
                $assign_chat = "UPDATE `lead_enquiry` SET `counsellor_id`=$counsellor_id WHERE user_id='$user_id' and counsellor_id=0";
                $this->db->query($assign_chat);
            }
            return $query->result_array();
        }else{
            return [];
        }
    }
    public function get_header_user_details($email_id){
        $sql = "SELECT `age`,`gender`, `country`, `state`, `city`, `status`,`weight` as cur_wt,`ideal_weight` as ideal_wt,
                ideal_bmi,medical_issue,health_category,stage FROM `lead_management` where email='$email_id' group by email order by id desc limit 1";
        //exit;
        $query=$this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return [];
        }
    }
    public function send_chat_msg($email_id,$user_id,$message,$attachment=null){
        date_default_timezone_set("Asia/Kolkata");
        $counsellor_id = $this->session->balance_session['admin_id'];
        $data = [
           "email_id" => $email_id,
           "user_id" => $user_id,
           "counsellor_id" => $counsellor_id,
           "msg_type" => '1',
           "message" => $message,
           "attachments" => $attachment,
           "created_date" => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('lead_enquiry', $data);
    }
    
}