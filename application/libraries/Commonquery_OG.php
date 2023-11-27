<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commonquery 
{
    // start of class commomquery
    
        protected $CI;

        public function __construct() 
        {
            $this->CI =& get_instance();
            $this->CI->load->library(['query']);
        }
    
        public function countRecord($table = '')
        {
            if(empty($table)) {
                return 0;
            }
            
            $sql = ' SELECT COUNT(*) as `rowcount` FROM `'.$table.'`';
            
            $sql = $this->CI->db->query($sql);
            if( $sql->num_rows() > 0 ) {                
                $row = $sql->row_array();
                return $row['rowcount'];
            }
            
            return 0;
        }
        
        public function isExitValue($table,$pk,$pv)
        {
            $sql = ' SELECT * FROM '.$table.' WHERE '.$pk.' = '.$this->CI->db->escape($pv);            
            
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            }                 
        } 

        public function isExitValueOrderBy($table,$pk,$pv,$orderby,$order)
        {
            $sql = ' SELECT * FROM '.$table.' WHERE '.$pk.' = '.$this->CI->db->escape($pv).' ORDER BY '.$orderby.' '.$order;
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            }                 
        }

        public function isExitValueTwoParam($table,$pk1,$pv1,$pk2,$pv2)
        {
            
            $sql = ' SELECT * FROM '.$table.' WHERE '.$pk1.' = '.$this->CI->db->escape($pv1).' AND '.$pk2.' != '.$this->CI->db->escape($pv2); 
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            }

        }
        
        public function isExitTwoValue($table,$pk1,$pv1,$pk2,$pv2)
        {
        
                $sql = ' SELECT * FROM '.$table.' WHERE '.$pk1.' = '.$this->CI->db->escape($pv1).' AND '.$pk2.' = '.$this->CI->db->escape($pv2); 
                $sql = $this->CI->db->query($sql);
            
                if($sql->num_rows() > 0){
                    return $sql->result_array();
                }else{
                    return 0;
                }

        }
        
        public function checkLogin($table,$pv1,$pv2)
        {
            $sql = 'SELECT * FROM '.$table.' WHERE email_id = '.$this->CI->db->escape($pv1).' AND enc_password = '. $this->CI->db->escape($pv2); 
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            }

        }

        public function getAllCountries()
        {
            $sql = ' SELECT `country_id`, `shortname`, `country_name`, `iso3`, `numcode`, `phonecode` 
                     FROM countries 
                     ORDER BY country_name ASC
                   ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
        
        public function getCountryById($id)
        {
            $sql = ' SELECT `country_id`, `shortname`, `country_name`, `iso3`, `numcode`, `phonecode` 
                     FROM `countries` 
                     WHERE `country_id` = '.$this->CI->db->escape($id);  
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }

        public function getStateByCountry($id)
        {
            $sql = ' SELECT  `state_id`, `state_name`, `country_id` 
                     FROM states 
                     WHERE country_id = '.$this->CI->db->escape($id).' 
                     ORDER BY state_name ASC 
                   ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
        
        public function getStateById($id)
        {        
            $sql = ' SELECT `state_id`, `state_name`, `country_id` 
                     FROM `states` 
                     WHERE `state_id` = '.$this->CI->db->escape($id);  
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
	public function getAllState()
        {
            $sql = ' SELECT `state_id`, `state_name`, `country_id` 
                     FROM states 
                     ORDER BY state_name ASC
                   ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }

        public function getCityByState($id)
        {
            
            $sql = ' SELECT `city_id`, `city_name`, `state_id`
                     FROM cities 
                     WHERE state_id = '.$this->CI->db->escape($id).' 
                     ORDER BY city_name ASC
                   ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
        
        public function getCityById($id)
        {            
            $sql = ' SELECT  `city_id`, `city_name`, `state_id`
                     FROM cities
                     WHERE city_id = '.$this->CI->db->escape($id);  
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }

        public function getAllCity()
        {            
            $sql = ' SELECT  `city_id`, `city_name`, `state_id`
                     FROM cities 
                     ORDER BY city_name ASC
                   ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
        
        public function getAllUsers() //for getting all registered user list
        {
            $sql = ' SELECT `id`, `first_name`, `last_name`, `gender`, `dob`, `password`, `plain_password`, `email_id`, `country`, `state`, `city`,
                            `created`, `fb_login`, `google_login`, `mentor_id`, `user_status`, `act_code`, `profile_image`, `allow_food_diary`, 
                            `cron_email_flag`, `is_block` 
                     FROM registries 
                     ORDER BY id DESC 
                   ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
        
        public function getUserById($userid)
        {
            $sql = ' SELECT `id`, `first_name`, `last_name`, `gender`, `dob`, `password`, `plain_password`, `email_id`, `country`, `state`, `city`,
                            `created`, `fb_login`, `google_login`, `mentor_id`, `user_status`, `act_code`, `profile_image`, `allow_food_diary`, 
                            `cron_email_flag`, `is_block` ,`my_wallet`
                     FROM registries 
                     WHERE id = '.$this->CI->db->escape($userid); 
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getUserByEmail($email)
        {
            $sql = ' SELECT `id`, `first_name`, `last_name`, `gender`, `dob`, `password`, `plain_password`, `email_id`, `country`, `state`, `city`,
                            `created`, `fb_login`, `google_login`, `mentor_id`, `user_status`, `act_code`, `profile_image`, `allow_food_diary`, 
                            `cron_email_flag`, `is_block` 
                     FROM registries
                     WHERE email_id = '.$this->CI->db->escape($email); 
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }        
        
        public function getBillingByUserId($userid = 0)
        {
            $sql = ' SELECT `billing_id`, `user_id`, `email_id`, `address1`, `address2`, `city`, `state`, `country`, `country_code`, `mobile_no1`, 
                            `mobile_no2`, `weather`, `pincode`
                     FROM billing_details 
                     WHERE user_id = '.$this->CI->db->escape($userid);
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getAllPrograms()
        {        
            $sql = ' SELECT pack_type_id,package_type,content,posted_date,program_banner 
                     FROM programs 
                     ORDER BY pack_type_id ASC
                   ';
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
	    
        public function getProgramById($id) 
        {            
            $sql = ' SELECT `pack_type_id`, `package_type`, `clients`, `high_weightloss`, `low_weightloss`, `avg_weightloss`,`content_detail` 
                     FROM `programs`
                     WHERE `pack_type_id` = '.$this->CI->db->escape($id); 
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getAllProgramSessions() //for getting all registered user list
        {
            $sql = ' SELECT * FROM program_session ORDER BY id ASC ';  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->result_array();
            }	
            return [];
        }
        
        public function getProgramSessionsById($id) //for getting all registered user list
        {
            $sql = ' SELECT `id`, `program_id`, `package_session`, `package_sess_display`, `package_sess_duration`, `wieght_lost`, `package_amount`, `discount_amount`, `package_usd_amount`, `usd_amount`, `usd_disc`, `package_buy_amount`, `allow_coupon`, `session_flag`
                     FROM program_session 
                     WHERE id = '.$id;
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getPaymentById($id) //for getting all registered user list
        {
            $sql = ' SELECT * FROM payment_details WHERE id = '.$id;  
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getOrderByPk($pk,$id)
        {
            $sql = ' SELECT `order_id`, `userid`, `email_id`, `program_name`, `program_session`, `prog_duration`, `amount`, `status`, `payment_method`,
                            `reason`, `packge_type_id`, `packages_id`, `prog_buy_amt`, `prog_amt`, `prog_disc`, `prog_upg_amt`, `order_type`, 
                            `amount_type`, `coupon_code`,bank, `balance`, `discount`, `bal_due_date`, `prog_upg_date`, `date`, `exp_date`, `extended_date`, `wallet_discount`,
                            `payid`, `fu_note`, `p_mentor`, `mentor_id`
                     FROM order_details 
                     WHERE `'.$pk.'` = '.$this->CI->db->escape($id).'
                     ORDER BY `order_id` DESC
                   ';  
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getAdminUserById($id) //for getting individual admin user
        {
            $sql = ' SELECT admin_id,first_name,last_name,email_id,password,enc_password,user_type,flag,regist_date 
                     FROM admin_user 
                     WHERE admin_id = '.$this->CI->db->escape($id);
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        
        // please don't use this, it will be removed
        public function autologin()
        {
            if(isset($_COOKIE['bna']) && isset($_COOKIE['bnb']))
            {
                $user = $_COOKIE['bna']; 
                $pass = $_COOKIE['bnb']; 

                $sql = ' SELECT `id`,`first_name` 
                         FROM `registries` 
                         WHERE `email_id` = '.$this->CI->db->escape($user).' AND `password` = '.$this->CI->db->escape($pass);
                
                $sql = $this->CI->db->query($sql);
            
                $row = $sql->row_array();
                if(count($row) > 0) {
                        $_SESSION['user_id']=$row['id']; 
                        $_SESSION['first_name']=$row['first_name']; 
                        $_SESSION['bnc'] = 1;
                }else{
                        return 0;
                }
            }
        }	
        
	public function getAllOrdersByUser($uid)		
        {			
            $sql = ' SELECT order_id,userid,email_id,program_name,program_session,amount,status,payment_method,reason,date,payid 
                     FROM order_details 
                     WHERE userid = '.$this->CI->db->escape($uid).' 
                     ORDER BY order_id DESC"
                    ';			
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->result_array();
            }	
            return [];
        }
                
        public function getSqlDate($date)		
        {			
            $date = date("Y-m-d", strtotime($date));
            return $date;
        }
		
        public function dateConvert($date)
        {
            $time = strtotime($date);
            $myFormatForView = date("d-m-Y", $time);
            return $myFormatForView;
        }
        
        public function lead_status($lead_email = '', $lead_phone = '')
        {
            $sql_lead_od =  $this->isExitValue('order_details','email_id',$lead_email); 
            $sql_lead_res = $this->isExitValueOrderBy('lead_management','email',$lead_email,'id','DESC');

//            echo '<br/><br/>' . __LINE__ . ' >>> ' . __FILE__ . '<hr/><pre>';
//            print_r($sql_lead_res);
//            echo '</pre>';
            
            
            if($sql_lead_res) {
                $sql_lead_res = end($sql_lead_res);
                    if($sql_lead_od){
                        if($sql_lead_res['status'] != 'Renewal'){
                                $status = "Client enq";
                        }else $status = $sql_lead_res['status'];
                    }else{
            //         	if($sql_lead_res || $lead_phone){
                                        // 	$status = "Hot";
                                        // 	CommonQuery::update_lead_status($lead_email,$status);
            //         	}
                                        // else{
                                        // 	$status = "Warm";
            //         	}
                        $status = $sql_lead_res['status'];
                        }
                } else { 
                    $status = "Warm";                     
                } 
                
                return $status;		 		
        }

        public function update_lead_status($lead_email,$status='Warm')
        {            
                $sql_lead_od = $this->isExitValue('order_details','email_id',$lead_email); 
                
                if(!$sql_lead_od){

                        $data = [
                                    'status'    =>  $status,
                                ];
        
                        $this->CI->query->updateRecord('lead_management',$data,'email',$lead_email);
                }
        }
        
        public function insert_logs($type = '', $amount = 0, $email = '', $orderid = '')
        {
            $data= [
                        'type'      =>  $type,
                        'amount'    =>  $amount,
                        'email'     =>  $email,
                        'orderid'   =>  $orderid,
                        'date'      =>  date('Y-m-d H:i:s'),
                        'created_by'=>'Client',
                    ];
        
                    $this->CI->db->insert('order_logs',$data);
        		
        }
        
        public function getOrderById($id)
        {            
            $sql = 'SELECT * FROM order_details WHERE order_id = '. $this->CI->db->escape($id);  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->row_array();
            }	
            return [];		 		
        }
        
        public function insert_client_logs($client_email = '', $created_by = 'na', $type = '', $order_id = 0, $diet_id = 0, $is_client = 0)
        {		
            $data = [
                        'order_id'      =>  $order_id,
                        'diet_id'       =>  $diet_id,
                        'client_email'  =>  $client_email,
                        'created_by'    =>  $created_by,
                        'type'          =>  $type,
                        'is_client'     =>  $is_client,
                        'date'          =>  date('Y-m-d H:i:s')
                   ];

            $this->CI->db->insert('client_logs',$data);
        }
    
        
        public function get_clients_first_last_weight($user_ids = [])
        {
             // function get_clients_first_last_weight : Start
            $container = [
                             'before'       => [ $this->CI->session->user_id => '0 kgs'],
                             'after'        => [ $this->CI->session->user_id => '0 kgs'],
                         ];
            
            if( empty($user_ids) || ( count($user_ids) == 0) )
            {
                return $container;
            }
            
            foreach($user_ids as $val)
            {
                $container['before'] = [ $val => '0 kgs'];
                $container['after']  = [ $val => '0 kgs'];
            }
            
            // Logic: 
            //  for first weight:
            //  check if the weight exists in the wmr table with session as 0,
            //        if yes, thats our first weight
            //        else, take the weight from assessment table
            //
            //  for last weight
            //  take the last weight filled by the user from the wmr table
            
            
               $sql = ' (   SELECT `user_id`, `weight`, "before" as `type`
                            FROM  `weight_monitor_record`
                            WHERE ( `session` = 0 ) AND ( `user_id` IN ( '.implode(',', $user_ids).' )  )
                            GROUP BY `user_id`
                            ORDER BY  `user_id` ASC, `session` ASC
                            
                        )
                        UNION 
                        (
                            (
                             SELECT * 
                             FROM (
                                        SELECT `user_id`, `weight`, "after" as `type`
                                        FROM  `weight_monitor_record`
                                        WHERE ( `session` > 0 ) AND ( `user_id` IN ( '.implode(',', $user_ids).' )  )
                                        ORDER BY `wmr_id` DESC                                        
                                  ) as temp
                            GROUP BY temp.`user_id`      
                            )
                        )
                      '; 
                  
                $sql = $this->CI->db->query($sql);
                if($sql->num_rows() > 0)
                {
                    foreach($sql->result_array() as $val)
                    {
                        $container[$val['type']][$val['user_id']] = ( ! empty ($val['weight']) ) ? $val['weight'].' kgs' : '0 kgs';
                    }
                }
            
                // now take out all the users, whose user_id has 0 kgs weight in before type : Start
                $assessment_user_ids = [];
                foreach($container['before'] as $user_id => $weight )
                {
                    if($weight == '0 kgs')
                    {
                        $assessment_user_ids[$user_id] = $user_id;
                    }
                }
                
                if( count($assessment_user_ids) > 0 )
                {
                    $sql = ' 
                               SELECT * 
                               FROM  (
                                        SELECT `weight`,`user_id`
                                        FROM `new_assessment`
                                        WHERE ( `weight` != "" ) AND ( `weight` > 0 ) AND ( `user_id` IN ('.implode(',', $assessment_user_ids).')  )
                                        ORDER BY `id` DESC
                                      ) as temp
                               GROUP BY `user_id`       
                           ';
                    
                    $sql = $this->CI->db->query($sql);
                    
                    if($sql->num_rows() > 0)
                    {
                        foreach($sql->result_array() as $val)
                        {
                            $container['before'][$val['user_id']] = ( ! empty ($val['weight']) ) ? $val['weight'].' kgs' : '0 kgs';
                        }
                    }
                    
                }
                
                // now take out all the users, whose user_id has 0 kgs weight in before type : End
                unset($assessment_user_ids, $sql);
               return $container; 
            // function get_clients_first_last_weight : End
        }
    
        public function get_current_diet_stats($user_id = 0)
        {
            //  function get_current_diet_stats : Start
            $container = [
                             'total'       => 0,
                             'completed'   => 0,
                             'pending'     => 0, 
                         ];
            $order_id = 0;
            
            if( empty($user_id) || ( $user_id == 0) )
            {
                return $container;
            }
                
                // get completed diets : Start
                    $sql = ' 
                             SELECT COUNT( DISTINCT `diet_id` ) as completed_diets, `order_id`
                             FROM (
                                     SELECT `order_id`, `session`, diet_id
                                     FROM `diet_session_log`
                                     WHERE ( `order_id` > 0 ) AND ( `user_id` = '.$this->CI->db->escape($user_id).' )                                     
                                     GROUP BY `order_id`, `session` 
                                        ORDER BY `order_id` DESC, `session` DESC 
                                      ) AS t 
                             GROUP BY `order_id` 
                             ORDER BY `order_id` DESC
                             LIMIT 1     
                           ';
                    $sql = $this->CI->db->query($sql);
                    
                    if($sql->num_rows() > 0)
                    {
                        $sql = $sql->row_array();
                        $container['completed'] = $sql['completed_diets'];
                        $order_id = $sql['order_id'];
                    }                    
                // get completed diets : End
            
                if($order_id > 0)
                {
                    // get total diets : Start
                    $sql = ' SELECT  `program_session` as `total_session`
                             FROM `order_details` 
                             WHERE ( `userid` = '.$this->CI->db->escape($user_id).' ) AND ( `order_id` = '.$order_id.' )
                           ';
                    $sql = $this->CI->db->query($sql);
                    
                    if($sql->num_rows() > 0)
                    {
                        $sql = $sql->row_array();
                        $container['total'] = $sql['total_session'];
                    }
                    // get total diets : End
            
                    $container['pending'] = ( $container['total'] - $container['completed'] );
                    
                    if($container['pending'] < 0)
                    {
                        $container['pending'] = 0;
                    }
                }
                    
            return $container;        
            //  function get_current_diet_stats : End
        }
        
        
        //get gst :start
       public function getGst($amount='',$percent='')
        {
//            //testing
//            $amount =12499;
//            $percent =9;
//            //end
           $program_cost = $amount/118*100;
            $gst_on_program_cost = ($percent/100)*$program_cost;
            $total = $program_cost + 2*$gst_on_program_cost;  
            
           $final =[
                
                'program_cost' => round($program_cost,2),
                'cgst_on_program_cost' =>round($gst_on_program_cost,2),
                
                'total_program_amount' =>round($total,2)
                  ];
           
//                  echo '<br/><br/>' . __LINE__ . ' >>> ' . __FILE__ . '<hr/><pre>';
//                  print_r($final);
//                  echo '</pre>';
                  
            return $final;
        }
        
        
        
        
        
        ////get gst :end
        
    // end of class commonquery    
}