<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
    }
    
    public function get_lead_conversion($value)
    {
        /*$sql= "SELECT email AS Email,
                   CASE
                     WHEN DATE(key_insight_date) = CURDATE() THEN key_insight
                     ELSE 'NA'
                   END         
                  AS KeyInsight,
                   CASE
                     WHEN DATE(fu_date) = CURDATE() THEN fu_note
                     ELSE 'NA'
                   END         
                  AS FU_Note, assign_from AS Assign_From, assign_to AS Assign_To
            FROM   `lead_action`
            WHERE  ( assign_to IN ( '".$value."' ) )
                   AND DATE(assign_date) = CURDATE()
            GROUP  BY email
            ORDER  BY `lead_action`.`assign_from` ASC ";*///CURDATE()
        $sql = "SELECT
                    lm.id,
                    la.email,
                    CASE WHEN DATE(la.key_insight_date) = CURDATE() 
                    THEN la.key_insight ELSE 'NA' END as KeyInsight, 
                    CASE WHEN DATE(la.fu_date) = CURDATE() 
                    THEN la.fu_note ELSE 'NA' END as FU_Note,
                    la.assign_from AS Assign_From,
                    la.assign_to AS Assign_To 
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE  LCASE(la.assign_to) = '".strtolower($value)."' AND  DATE(la.assign_date) = CURDATE() AND   
                lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                )
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }//public function get_lead_conversion() 
    public function get_hot_lead_conversion($value)
    {
        /*$sql= "SELECT ls.email AS Email,
                   status AS Status,
                   created AS Created,
                   la.assign_from AS Asign_From,
                   la.assign_to AS Asign_To
            FROM   `lead_status_log` ls
                   LEFT JOIN lead_action la
                          ON ls.email = la.email
            WHERE  status = 'hot' AND ( assign_to IN ( '".$value."' ) )
                   AND Date(created) = Curdate()
            GROUP  BY ls.email";*/
        $sql = "SELECT ls.id 
                    FROM `lead_status_log` ls 
                    LEFT JOIN `lead_action` la ON ls.email=la.email
                    LEFT JOIN `lead_management` lm ON ls.email=lm.email 
                    WHERE lm.status='hot' AND ls.status='hot' AND DATE(ls.created)=CURDATE() 
                        AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                        AND LCASE(la.assign_to)='".strtolower($value)."' GROUP BY ls.email";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }//public function get_hot_lead_conversion() 
    public function get_review_lead_conversion($value,$slot)
    {
        $sql= "SELECT * FROM `sales_review_notes` WHERE DATE(added_date) = Curdate() and lower(name) = '".strtolower($value)."' and slot = '".$slot."'";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }//public function get_review_lead_conversion() 
    public function get_total_lead_conversion()
    {
        $sql= "SELECT count(email) as cnt FROM `lead_management` where  DATE(created)=CURDATE() AND (phone !='' AND LENGTH(phone) > 4) GROUP BY email";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }//public function get_total_lead_conversion() 
    
    
    
}//class Reports_model extends CI_Model