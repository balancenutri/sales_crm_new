<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet 
{
    // start of class query
    
        protected $CI;

        public function __construct() 
        {
            $this->CI =& get_instance();
        }
    
        public function escapeString($str)
        {        
            return $this->CI->db->escape_like_str($str);
        }


   public function get_wallet_amt($id)
   {
            
            $sql = ' SELECT `wallet_amount`, `status`,`wallet_type` FROM wallet_amount WHERE id = '.$this->CI->db->escape($id);  
            $sql = $this->CI->db->query($sql);
            return $sql->row_array();
   }

 public function get_wallet_amt_type($type)
   {
            
            $sql = ' SELECT `wallet_amount`, `status`,`wallet_type` FROM wallet_amount WHERE wallet_type = "'.$type.'"';  
            $sql = $this->CI->db->query($sql);
            return $sql->row_array();
   }

   
       public function get_user_wallet_amt($id)
   {
            
            $sql = "SELECT `my_wallet`,`first_name` FROM registries WHERE id ='$id' ";  
            $sql = $this->CI->db->query($sql);
            return $sql->row_array();
   }  
   

   public function get_wallet_info($uid=0)
    {

        //  function get_wallet_info : Start
        $data = [
                    'total_count'   => 0,
                    'result'        => []
                ];
        
        if( ! empty($uid) )
        {    


       // if ($oid !== NULL && $status == !NULL) {
       //     $query = "AND oid = $oid AND status =$status";
       // }

        // $today = date("Y-m-d");
        // $exp = "AND expiry_date > '$today' ";

       $sql = ' SELECT w.`id` , w.`oid`,w.`uid`,w.`amount`,w.`type` ,w.`status` ,w.`creation_date`,w.`expiry_date`,w.`activation_date` ,w.`referred_email`,w.`mentor_id`,w.`wmp_id` ,w.`is_approve`, wmp.`progress_photo_session`, wmp.`progress_photo`,wmp.`progress_photo_date` 
                    FROM `wallet` w 
                    LEFT JOIN weight_monitor_photo wmp ON wmp.id = w.wmp_id 
                    WHERE  `uid` = '.$this->CI->db->escape($uid).' 
                    ORDER By `id` desc
                   ';
            
            $sql_res = $this->CI->db->query($sql);
            if($sql_res->num_rows() > 0)
            { 
                $data['total_count'] = $sql_res->num_rows();
                $data['result']      = $sql_res->result_array();
            }
        }
        
        return $data;        
        //  function get_wallet_info : End
    }



   public function get_wallet_refer_info($uid=0)
    {

        //  function get_wallet_info : Start
        $data = [
                    'total_count'   => 0,
                    'result'        => []
                ];
        
        if( ! empty($uid) )
        {    


       // if ($oid !== NULL && $status == !NULL) {
       //     $query = "AND oid = $oid AND status =$status";
       // }

        // $today = date("Y-m-d");
        // $exp = "AND expiry_date > '$today' ";

       $sql = ' SELECT w.`id` , w.`oid`,w.`uid`,w.`amount`,w.`type` ,w.`status` ,w.`creation_date`,w.`expiry_date`,w.`activation_date` ,w.`referred_email`,w.`mentor_id`,w.`wmp_id` ,w.`is_approve`, wmp.`progress_photo_session`, wmp.`progress_photo`,wmp.`progress_photo_date` 
                    FROM `wallet` w 
                    LEFT JOIN weight_monitor_photo wmp ON wmp.id = w.wmp_id 
                    WHERE  `uid` = '.$this->CI->db->escape($uid).' AND `type` = 2
                    ORDER By `id` desc
                   ';
            
            $sql_res = $this->CI->db->query($sql);
            if($sql_res->num_rows() > 0)
            { 
                $data['total_count'] = $sql_res->num_rows();
                $data['result']      = $sql_res->result_array();
            }
        }
        
        return $data;        
        //  function get_wallet_info : End
    }





   public function refer_friend_validation($email)
    {


        $data = [
                    'lead_result'   => [],
                    'order_result'  => [],
                    'reg_result'    => [],
                ];

    $check_in_lead = "SELECT email FROM lead_management WHERE email IN ('".implode("','", $email)."')";
    $lead_sql = $this->CI->db->query($check_in_lead);
            if($lead_sql->num_rows() > 0)
            { 
                $data['lead_result']  = $lead_sql->result_array();
            }

    $check_in_order = "SELECT email_id FROM order_details WHERE email_id IN ('".implode("','", $email)."')";
    $order_sql = $this->CI->db->query($check_in_order);
            if($order_sql->num_rows() > 0)
            { 
                $data['order_result']  = $order_sql->result_array();
            }

    $check_in_reg = "SELECT email_id FROM registries WHERE email_id IN ('".implode("','", $email)."')";
    $reg_sql = $this->CI->db->query($check_in_reg);
            if($reg_sql->num_rows() > 0)
            { 
                $data['reg_result']  = $reg_sql->result_array();
            }

    return $data;

    }
  

   public function get_wallet_redeem_amount($uid=0)
    {

        //  function get_wallet_info : Start
        $data = [
                    'total_count'   => 0,
                    'result'        => []
                ];
        
        if( ! empty($uid) )
        {    

         $sql = ' SELECT `id` ,`uid`,`amount`,`type` ,`status` ,`creation_date`,`expiry_date`,`activation_date` ,`referred_email`,`mentor_id`,`wmp_id` ,`is_approve`
                    FROM `wallet` 
                    WHERE 
                    `status` != "used"
                    AND `is_approve`= 1
                    AND `status` = "approved" 
                    AND 
                     `uid` = '.$this->CI->db->escape($uid).'
                   
                    ORDER By `id` desc
                   ';
            
            $sql_res = $this->CI->db->query($sql);
            if($sql_res->num_rows() > 0)
            { 
                $data['total_count'] = $sql_res->num_rows();
                $data['result']      = $sql_res->result_array();
            }
        }
        
        return $data;        
        //  function get_wallet_info : End
    }





 public function get_star_points($order_id, $uid)
 {
     
             $data = [
                    'total_count'   => 0,
                    'result'        => []
                ];
             
    $current_session_points_q = "SELECT `id`, `type_id`, `user_id`,`order_id`, `session`,`type`, `posted_date`,`mentor_id`,`point`,`flag` FROM `client_star` WHERE `order_id` = $order_id AND `user_id` = $uid";
  
          $current_session_points = $this->CI->db->query($current_session_points_q);
          
            if($current_session_points->num_rows() > 0)
            { 
                $data['total_count'] = $current_session_points->num_rows();
                $data['result']      = $current_session_points->result_array();
            }
  return $data;   
 }

    // end of wallet query

 
    public function get_account_statement($uid=0)
    {

        //  function get_wallet_info : Start
        $data = [
                    'total_count'   => 0,
                    'result'        => []
                ];
        
        if( ! empty($uid) )
        {    


      $sql = ' SELECT `date`, `page`, `action`, `amount` ,`trans_type`,`balance_amount`,`view_flag`
                    FROM `wallet_log` w 
                    WHERE  `user_id` = '.$this->CI->db->escape($uid).'  AND `trans_type` IN ("C" , "D") AND `date` > "2019-06-30 23:59:59"
                    ORDER By `id` desc
                   ';
            
            $sql_res = $this->CI->db->query($sql);
            if($sql_res->num_rows() > 0)
            { 
                $data['total_count'] = $sql_res->num_rows();
                $data['result']      = $sql_res->result_array();
            }
        }
        
        return $data;        
        //  function get_wallet_info : End
    }

    public function get_latest_credit_date($id)
   {           

            $sql = " SELECT max(`date`) as latest_date FROM `wallet_log` WHERE `trans_type`= 'C' AND user_id = ".$this->CI->db->escape($id);  
            $sql = $this->CI->db->query($sql);
            return $sql->row_array();
   }
   
   
   
         public function get_star_photos($uid)
            {

                        $data = [
                               'total_count'   => 0,
                               'result'        => []
                           ];

                    $star_photos = "SELECT `id`, `type_id`, `user_id`,`order_id`, `session`,`type`, `posted_date`,`mentor_id`,`point`,`flag` FROM `client_star` WHERE  `user_id` = $uid AND type = 'P'";

                     $get_star_photos = $this->CI->db->query($star_photos);

                       if($get_star_photos->num_rows() > 0)
                       { 
                           $data['total_count'] = $get_star_photos->num_rows();
                           $data['result']      = $get_star_photos->result_array();
                       }
             return $data;   
            }

 
 
   public function get_wallet_success_story($uid,$oid,$session)
   {
            
            $sql = "SELECT `id` FROM wallet WHERE `type`=8 AND `uid` = $uid AND `oid` = $oid AND `wmp_id`=$session ";   
            $sql = $this->CI->db->query($sql);
            return $sql->row_array();
   }


}
