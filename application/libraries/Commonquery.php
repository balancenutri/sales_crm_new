<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commonquery 
{
    // start of class commomquery
    
        protected $CI;

        public function __construct() 
        {
            $this->CI =& get_instance();
            $this->db2 = $this->CI->load->database('another_db', TRUE);
            $this->CI->load->library(['query']);
        }
        
        function buildTree($items) {
            $childs = array();  
        
            foreach($items as &$item){           
                $childs[(int)$item['source_group']][] = &$item;
            } 
    
            foreach($items as &$item){
               
                if (isset($childs[$item['source_id']])){
                   
                    $item['childs'] = $childs[$item['source_id']];
                }                
            }        
            return $childs; // Root only.
          
        }

        function createInternalHTML($count_html,$count_result){       
       
            $count_html = "<ul>";
            foreach($count_result as $row){
                $count_html .= "<li>".$row['source_name']. " (".date('d M Y H:i',strtotime($row['created'])).")".  "</li>";
            }
            $count_html .= "</ul>";  
            return $count_html;
    
        }

        function primarySourceHistory($email){
           
            $sql = "SELECT ls.source_name,ls.source_id, ls.source_group, lsl.email_id,lsl.created
            FROM lead_source_log AS lsl
            JOIN bn_lead_source AS ls ON ls.source_name = lsl.source
            WHERE lsl.email_id = '$email'" ; 
            $result = $this->CI->db->query($sql)->result_array();
            $result = $this->buildTree($result);
            $count_html = "<ul>";
            if($result){
                foreach($result as $key => $row){
                    //echo "<pre>"; print_r($key,$row); exit;
                    switch ($key) {
                       // 1=>Prime,2=>Social Media,3=>Healthscore,4=>Paid Adds,5=>Other,6=>Web
    
                        case '1':
                            $count_html .= "<li>Prime";    
                            $count_html .= $this->createInternalHTML($count_html,$result[$key]);                
                            $count_html .= "</li>"; 
                            break;
    
                        case '2':
                            $count_html .= "<li>Social Media";    
                            $count_html .= $this->createInternalHTML($count_html,$result[$key]);                
                            $count_html .= "</li>"; 
                            break;
    
                        case '3':
                            $count_html .= "<li>Healthscore";    
                            $count_html .= $this->createInternalHTML($count_html,$result[$key]);                
                            $count_html .= "</li>"; 
                            break;
    
    
                        case '4':
                            $count_html .= "<li>Paid Adds";    
                            $count_html .= $this->createInternalHTML($count_html,$result[$key]);                
                            $count_html .= "</li>"; 
                            break;
    
                        case '5':
                            $count_html .= "<li>Other";    
                            $count_html .= $this->createInternalHTML($count_html,$result[$key]);                
                            $count_html .= "</li>"; 
                            break;
    
                        case '6':
                            $count_html .= "<li>Web";    
                            $count_html .= $this->createInternalHTML($count_html,$result[$key]);                
                            $count_html .= "</li>"; 
                            break;
                        
                       
                    }
                   
                } 
            }
            $count_html .= "</ul>";  

            return $count_html;
           
             
        }
        
        //add leadlist form query
         public function get_amount($program_id,$days){
            //echo 'SELECT package_buy_amount FROM program_session where package_session="'.$days.'" and program_id="'.$program_id.'"';exit; 
            $query = $this->CI->db->query('SELECT CONCAT(package_buy_amount,"||",package_amount) as amt FROM program_session where package_session="'.$days.'" and program_id="'.$program_id.'"');
           // print_r($query->num_rows());
           // exit;
            if( $query->num_rows() > 0 ) {                
                $row = $query->row_array();
                return $row['amt'];
            }
            return 0;
        }
        public function fetchLeadSource(){
            $query = $this->CI->db->select('source_id, source_name')
                                ->where('new_crm','1')
                                ->get('bn_lead_source')
                                ->result_array();
            return $query;
        }
        public function getPrimeSource($param){
            $query = $this->CI->db->select('source_name')
                                ->where('source_group',$param)
                                ->get('bn_lead_source')
                                ->result_array();
            return $query;
        }
        public function fetchAllStatus(){
            $query = $this->CI->db->select('id, status_name, sub_status, stage')
                            ->where('new_crm','1')
                            ->get('bn_lead_status')
                            ->result_array();
            return $query;
        }
        
        // AVINASH connent this
        
        // public function getCrmUser(){
        //     $this->CI->db->select('admin_id, email_id, crm_user, user_type, sale_goal, photo, unit_goal');
        //     $this->CI->db->from('admin_user');
        //     $this->CI->db->where('user_type','sales');
        //     $this->CI->db->where_not_in('crm_user', array(" ","support@balancenutrition.in","sales","mentor"));
        //     $this->CI->db->where('is_deleted','0');
        //     $sql = $this->CI->db->get();
        //     //return $this->db->last_query();  exit;                          
        //      if($sql->num_rows() > 0){
        //         return $sql->result_array();
        //     }else{
        //         return 0;
        //     } 
    
        // }
        
        public function getCrmUser(){
            $this->CI->db->select('admin_id, email_id, crm_user, user_type, sale_goal, photo, unit_goal');
            $this->CI->db->from('admin_user');
            $this->CI->db->where('new_crm','1');
             $this->CI->db->where_in('user_type', array("sales","mentor"));
            $this->CI->db->where_not_in('crm_user', array(" ","support@balancenutrition.in"));
            $this->CI->db->where('is_deleted','0');
            $sql = $this->CI->db->get();
            //return $this->db->last_query();  exit;                          
             if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            } 
    
        }
        
          //Lead Program Start Vikram
        public function isExitEmailPhone($table,$pk1,$pv1,$pk2=1,$pv2=1)
        {
        
                if($pk2!=1){
                    if($pk1!='email_alternate'){
                    $sql = ' SELECT id,email,phone,email_alternate,phone_alternate FROM '.$table.' WHERE '.$pk1.' LIKE '.$this->CI->db->escape($pv1).' or '.$pk2.' LIKE '.$this->CI->db->escape($pv2).' limit 1' ; 
                    $sql = $this->CI->db->query($sql);
                
                    if($sql->num_rows() > 0){
                        return $sql->result_array();
                    }else{
                        return [];
                    }
                }else{
                    $sql = ' SELECT id,email,phone,email_alternate,phone_alternate FROM '.$table.' WHERE '.$pk1.' LIKE '.$this->CI->db->escape($pv1).' or '.$pk2.' LIKE '.$this->CI->db->escape($pv2).' limit 1' ;  
                    $sql = $this->CI->db->query($sql);
                
                    if($sql->num_rows() > 0){
                        return $sql->result_array();
                    }else{
                        return [];
                    }
                }
                }else{
                    $sql = ' SELECT id,'.$pk1.','.$pk1.'_alternate FROM '.$table.' WHERE '.$pk1.' Like '.$this->CI->db->escape($pv1) ; 
                    $sql = $this->CI->db->query($sql);
                
                    if($sql->num_rows() > 0){
                        return $sql->result_array();
                    }else{
                        return 0;
                    }
                }
              

        }
        public function isalExitEmailPhone($table,$pk1,$pv1)
        {
            $sql = ' SELECT id,'.$pk1.','.$pk1.'_alternate FROM '.$table.' WHERE '.$pk1.'_alternate Like '.$this->CI->db->escape($pv1).' limit 1' ; 
            $sql = $this->CI->db->query($sql);
        
            if($sql->num_rows() > 0){
                return 1;
            }else{
                return 0;
            }
        }
        public function getLeadDetails($table,$pk1,$pv1,$pk2){
            $sql = ' SELECT '.$pk2.'_alternate FROM '.$table.' WHERE '.$pk1.' Like '.$this->CI->db->escape($pv1).' limit 1' ; 
            $sql = $this->CI->db->query($sql);
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            }
        }
         public function getLeadDetailsNew($table,$pk1,$pv1,$pk2){
            $sql = ' SELECT GROUP_CONCAT('.$pk2.') as '.$pk2.' FROM '.$table.' WHERE '.$pk1.' Like '.$this->CI->db->escape($pv1) ;
            $sql = $this->CI->db->query($sql);
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return 0;
            }
        }
        public function updateLeadRecord($table_name,$data,$where)
        {
         if(!empty($where) && $table_name != '' && !empty($data)) {
            
              $this->CI->db->where($where);
              $this->CI->db->update($table_name, $data);
              
              return 1;
          }        
         return 0;
        }
        //Lead Program End
        
    
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

        // public function getAllCountries()
        // {
        //     $sql = ' SELECT `country_id`, `shortname`, `country_name`, `iso3`, `numcode`, `phonecode` 
        //              FROM countries 
        //              ORDER BY country_name ASC
        //           ';  
        //     $sql = $this->CI->db->query($sql);
            
        //     if($sql->num_rows() > 0){
        //         return $sql->result_array();
        //     }	
        //     return [];
        // }
        
        
        public function getAllCountries()
        {
            $sql = ' SELECT `country_id`, `shortname`, `country_name`, `iso3`, `numcode`, `phonecode` 
                     FROM countries where is_active= 1 
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
        
        
        // public function getStateByCountryNew($id)
        // {
        //     $sql = ' SELECT  s.`state_id`, s.`state_name`, s.`country_id` 
        //              FROM states s LEFT JOIN countries c ON s.country_id=c.country_id
        //              WHERE c.phonecode ='.$this->CI->db->escape($id).' 
        //              ORDER BY state_name ASC';  
                   
                   
        //     $sql = $this->CI->db->query($sql);
            
        //     if($sql->num_rows() > 0){
        //         return $sql->result_array();
        //     }	
        //     return [];
        // }
        // aviniash 23-11-2021
         public function getStateByCountryNew($id)
        {
            $sql = ' SELECT  s.`state_id`, s.`state_name`, s.`country_id` 
                     FROM states s LEFT JOIN countries c ON s.country_id=c.country_id
                     WHERE c.phonecode ='.$this->CI->db->escape($id).' OR c.country_name='.$this->CI->db->escape($id).'OR s.`country_id`='.$this->CI->db->escape($id).' 
                     ORDER BY state_name ASC';  
                   
                   
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }	
            return [];
        }
        

        public function getStateByCountry($id)
        {
            $sql = ' SELECT  s.`state_id`, s.`state_name`, s.`country_id` 
                     FROM states s LEFT JOIN countries c ON s.country_id=c.country_id
                     WHERE s.country_id = '.$this->CI->db->escape($id).' OR c.country_name='.$this->CI->db->escape($id).' 
                     ORDER BY state_name ASC';  
                   
                   
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
        public function getStage($email){        
            $sql = " SELECT `stage` FROM `lead_management` WHERE `email` = '".$email."'";  
            $sql = $this->CI->db->query($sql);
            $stage = $sql->row_array();
            return $stage['stage'];
        }
          public function lead_assign($lead_email = ''){
             
             
               $sql_lead_assign =  $this->isExitValue('lead_action','email',$lead_email); 
              
           $sql_lead_assign_email =  $this->isExitValue('admin_user','first_name',$sql_lead_assign[0]['assign_to']); 
           
           return $sql_lead_assign_email[0]['email_id'];
             
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
                     WHERE state_id in ((select state_id FROM states WHERE state_name='.$this->CI->db->escape($id).'),'.$this->CI->db->escape($id).' )
                     ORDER BY city_name ASC';
                     
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
                            `cron_email_flag`, `is_block` ,`my_wallet`,`web_version_allowed`
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
            $sql = ' SELECT `pack_type_id`,`checkout_image`, `package_type`, `clients`, `high_weightloss`, `low_weightloss`, `avg_weightloss`,`content_detail` 
                     FROM `programs`
                     WHERE `pack_type_id` = '.$this->CI->db->escape($id); 
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }

        public function getProgramByUrl($url) 
        {            
            $sql = ' SELECT `pack_type_id`, `package_type`, `clients`, `high_weightloss`, `low_weightloss`, `avg_weightloss`,`content_detail`, `url`,`program_banner`,`program_mobile_banner` 
                     FROM `programs`
                     WHERE `url` = '.$this->CI->db->escape($url); 
            
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
        public function getProgramCouponById($program_sess_id) 
        { 
            $today = date('Y-m-d');
            //$sql = ' SELECT `id`, `coupon_code`, `discount_inr`, `discount_usd` FROM coupon_prog WHERE exp_date<="'.$today.'" AND prog_session_id = '.$program_sess_id;
            //Query for Testing
            $sql = ' SELECT `id`, `coupon_code`, `discount_inr`, `discount_usd` FROM coupon_prog WHERE exp_date>="'.$today.'" AND prog_session_id = '.$program_sess_id.' order by CAST(discount_inr AS SIGNED) ';
            //Query for LIVE
            $sql = $this->CI->db->query($sql);
            return $sql->row_array();
        }
        public function getProgramSessionsById($id) //for getting all registered user list
        {
            $today = date('Y-m-d H:i:s');
            // if($today > '2019-12-05 10:00:00' && $today <= '2019-12-06 12:00:00' || $today > '2019-12-12 10:00:00' && $today <= '2019-12-13 12:00:00' || $today > '2019-12-19 10:00:00' && $today <= '2019-12-20 12:00:00') {
            //     $table_name = 'program_session';
            // }else{
            //     $table_name = 'program_session_offer';
            // }
            
            $table_name = 'program_session';
            $sql = ' SELECT `id`, `program_id`, `package_session`,`suggested_prog_id`, `package_sess_display`, `package_sess_duration`, `wieght_lost`, `package_amount`, `discount_amount`, `package_usd_amount`, `usd_amount`, `usd_disc`, `package_buy_amount`, `allow_coupon`, `session_flag`,`discount_amount`,`allow_wallet`
                     FROM '.$table_name.' 
                     WHERE id = '.$id;
            
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        public function getPaymentById($id) //for getting all registered user list
        {
            $sql = 'SELECT * FROM payment_details WHERE id = '.$id;  
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
        
        
        #Update record (Pass array of Where )
    public function updateRecordnew($table_name,$data,$where)
    {
     if(!empty($where) && $table_name != '' && !empty($data))  {
          $this->CI->db->where($where);
          $this->CI->db->update($table_name, $data);
          
          return 1;
      }        
     return 0;
    }
    public function getMentorId($name){
            $sql = "SELECT admin_id FROM admin_user WHERE crm_user='$name'";
            $sql = $this->CI->db->query($sql);
            if($sql->num_rows() > 0){
                return $sql->row_array();
            }	
            return [];
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
                     ORDER BY order_id DESC
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
                    $status = "";                     
                } 
                
                return $status;		 		
        }

        public function update_lead_status($lead_email,$status='')
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
                             'before'       => [ $this->CI->session->user_id => '0 kg'],
                             'after'        => [ $this->CI->session->user_id => '0 kg'],
                         ];
            
            if( empty($user_ids) || ( count($user_ids) == 0) )
            {
                return $container;
            }
            
            foreach($user_ids as $val)
            {
                $container['before'] = [ $val => '0 kg'];
                $container['after']  = [ $val => '0 kg'];
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
                            WHERE  ( `user_id` IN ( '.implode(',', $user_ids).' )  ) AND `is_deleted`= 0
                            GROUP BY `user_id`
                            ORDER BY  `user_id` ASC, `session` ASC limit 1
                            
                        )
                        UNION 
                        (
                            (
                             SELECT * 
                             FROM (
                                        SELECT `user_id`, `weight`, "after" as `type`
                                        FROM  `weight_monitor_record`
                                        WHERE  ( `user_id` IN ( '.implode(',', $user_ids).' )  ) AND `is_deleted`= 0
                                        ORDER BY `wmr_id` DESC  limit 1                                      
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
                        $container[$val['type']][$val['user_id']] = ( ! empty ($val['weight']) ) ? $val['weight'].' kg' : '0 kg';
                    }
                }
            
                // now take out all the users, whose user_id has 0 kgs weight in before type : Start
                $assessment_user_ids = [];
                foreach($container['before'] as $user_id => $weight )
                {
                    if($weight == '0 kg')
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
                            $container['before'][$val['user_id']] = ( ! empty ($val['weight']) ) ? $val['weight'].' kg' : '0 kg';
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
                                     WHERE ( `order_id` > 0 ) AND `is_deleted` = "0"  AND `diet_status` = "4" AND ( `user_id` = '.$this->CI->db->escape($user_id).' )                                     
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
                
                if(empty($order_id))
                {
                    $order_id = $this->get_active_order_id($user_id);
                }
            
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
        
        
        
        //slack notification: starts
        
 public function slack_notification($msg,$txn){
    $token = 'xoxp-278085549639-277883477734-276536006545-3c19e0fb4e7a4d657ea627d3fe5a31d4';
    
    $channel = "%23".$txn;
    
    $URL ="https://slack.com/api/chat.postMessage?token=".$token."&channel=". $channel."&text=".urlencode($msg)."&icon_url=https%3A%2F%2Fwww.balancenutrition.in%2Fimages%2Flogo_icon.png&username=Balance%20Nutrition&pretty=1";
    $output = shell_exec('curl "' . $URL . '" > /dev/null 2>&1 &');
}


        //slack notification: ends
        
        
     public function get_last_utm($id)
        {      
            
            $sql = ' SELECT * FROM utm_tracking
                     WHERE `session_id` = '.$this->CI->db->escape($id).' ORDER BY utm_id DESC';  
            $sql = $this->CI->db->query($sql);
            
            return $sql->row_array();
        }
        
        
         public function get_active_order_id($user_email)
        {
            //  function get_active_order_id : Start
            $data = array();
            $data['active_order_id'] = "";
            $sql = "SELECT id FROM `registries` WHERE email_id = '$user_email'";
            $user_details = $this->CI->db->query($sql);
            $user_ids = $user_details->result_array();

            $user_id = $user_ids[0]['id'];
            $get_all_orders_of_user = $this->getAllOrdersByUser($user_id);         
           
            $get_all_orders_records = array_reverse($get_all_orders_of_user);
            
            
            
            $no_of_records = count($get_all_orders_of_user);           
           
            if($no_of_records==1)
            {
              // $data['active_order_id'] = $get_all_orders_of_user['result'][0]['order_id'];        
               $data['active_order_id'] = $get_all_orders_of_user[0]['order_id']; 
            }
            elseif($no_of_records > 1)
            {
                foreach ($get_all_orders_records as $value) 
                { 
                

                        $oid = $value['order_id'];  
                        $total_sessions = $value['program_session'];  
                        $check_diets_sql = "SELECT COUNT( DISTINCT (
                                                `session`
                                                ) ) AS `diet_count`
                                                FROM `diet_session_log`
                                                WHERE `order_id` = '$oid' AND is_deleted='0' "; 
                        $check_diets_ex = $this->CI->db->query($check_diets_sql);
                        $check_diets = $check_diets_ex ->result_array(); 
                        $diets_sent = $check_diets[0]['diet_count']; 
                        $pending = $total_sessions - $diets_sent;
                        $total_sessions_array[]=$total_sessions;
                        $diets_sent_array[]=$diets_sent;

                        if((int)$pending>0)
                        { 
                            $data['active_order_id'] = $oid; //print_r($data['active_order_id']); 
                            break;
                        }
                        
                }
                
                if(array_sum($total_sessions_array)-array_sum($diets_sent_array)==0)
                {
                    $latest = current($get_all_orders_of_user); 
                    $data['active_order_id'] = $latest['order_id'];
                }
                
            }
            
            
            return $data['active_order_id'];
           
            //  function get_active_order_id : End
        }     
       
       
       public function get_active_order_info($user_id = ''){
           $ac_order = $this->get_active_order_id($user_id);
            $ac_info = $this->isExitValue('order_details','order_id',$ac_order);
             $ac_mentor_info = $this->isExitValue('admin_user','admin_id',$ac_info[0]['mentor_id']);
           
           return $ac_mentor_info;
       } 
        
       
        public function get_mobile_device(){
      $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
            { 
                    return 1;
            }else {
              return 0;
            }
        } 
    # Get all record passing parameter as per required 
    public function getRecordFromTable($table, $fields, $where, $search_cnd, $orderby)
    {
        $this->CI->db->select($fields);
        $this->CI->db->from($table);
        if(!empty($search_cnd)){
            $this->CI->db->or_like($search_cnd);
        }
        if(!empty($where)){
            $this->CI->db->where($where);
        }
        if(!empty($orderby)){
            $this->CI->db->order_by($orderby);
        }
        $sql = $this->CI->db->get();
        if($sql->num_rows() > 0){
            return $sql->result_array();
        }else{
            return 0;
        }              
    }


    # Insert record
  public function addRecord($table_name,$data)
  {
       $this->CI->db->insert($table_name,$data);
       $lastid = $this->CI->db->insert_id();
       return $lastid;
  }
    // end of class commonquery 

 public function get_signature($mentor_id,$first_name) {

    $sql = ' SELECT photo,designation,full_name FROM admin_user WHERE `admin_id` = '.$mentor_id.' ';  
    $sql = $this->CI->db->query($sql);
    $result_array =  $sql->row_array(); 
     
    $SITEURL = "https://www.balancenutrition.in/crm_ui/"; 
    $dp_path = $SITEURL.'images/'.$result_array['photo']; 

    $signature= '<br/>Warm Regards,';
    $signature .='<br/><br/> <img height="100" src='.$dp_path.' />'; 

    $signature .='<br/> <span font-weight:bold;"><b><u>'.$result_array['full_name'].'</u></b></span><br>'.$result_array['designation'].'';

    return $signature;
     
 }      

  #Update record (Pass array of Where )
    public function updateRecord($table_name,$data,$where)
    {
     if(!empty($where) && $table_name != '' && !empty($data))  {
          $this->CI->db->where($where);
          $this->CI->db->update($table_name, $data);
          
          return 1;
      }        
     return 0;
    }


  # Insert and update log data
  public function saveLog($table_name,$data)
  { 
    
     $this->db2->insert($table_name,$data);
     $lastid = $this->db2->insert_id();
     return $lastid;
     
    }
    
    public function CurlPostOperation($url,$data)
    {
        
        if($this->session->user_id == 12433){
                    // var_dump($result_out);
                    echo 'I am here';
                    exit;
                    }
        $api_url = SITE_LIVE.'/bn-api-new/'.$url;

        /* Init cURL resource */
        $ch = curl_init($api_url);           
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
                      
        /* close cURL resource */
        curl_close($ch);
        
        
        
        return $result;

    }
    
     public function checkOnlineMentor($mentor_id)
  {
    if(!empty($mentor_id))
    {

        $this->CI->db->select(array('id','type'));
        $this->CI->db->from('login_logs');
        $this->CI->db->where(array('login_id' => $mentor_id));
        $this->CI->db->order_by('id desc');
        $this->CI->db->limit(1);

        $sql = $this->CI->db->get();

        if($sql->num_rows() > 0){
            $mentor_status = $sql->row_array();
            if($mentor_status['type'] == 'login')
            {
                return 1;
            }else{
                return 0;
            }
        }   
    }else
    {
        return 0;
    }
  }
  

    
    public function getIdByParameter($table, $fields, $where)
    {
        $this->CI->db->select($fields);
        $this->CI->db->from($table);
        $this->CI->db->where($where);
        $sql = $this->CI->db->get();
        return $sql->row_array();
    }
    
    public function getCurrentProgramsOrderID($user_id = 0)
    {

        $user_id = trim($user_id);
        $get_all_orders_of_user = $this->getAllOrdersByUser($user_id);

        $get_all_orders_records = array_reverse($get_all_orders_of_user['result']);
        $no_of_records = $get_all_orders_of_user['count'];

        if($no_of_records==1)
        {
            $data['active_order_id'] = $get_all_orders_of_user['result'][0]['order_id']; 
        }
        elseif($no_of_records > 1)
        {                
            foreach ($get_all_orders_records as $value) 
            {

                $oid                    = $value['order_id'];  
                $total_sessions         = $value['program_session'];  
                $check_diets_sql        = "SELECT COUNT( DISTINCT (`session`) ) AS `diet_count` FROM `diet_session_log`
                WHERE `order_id` = $oid"; 
                $check_diets_ex         = $this->CI->db->query($check_diets_sql);

                $check_diets            = $check_diets_ex ->result_array(); 
                $diets_sent             = $check_diets[0]['diet_count']; 
                $pending                = $total_sessions - $diets_sent;

                $total_sessions_array[] = $total_sessions;
                $diets_sent_array[]     = $diets_sent;


                if($pending > 0)
                {

                    $data['active_order_id'] = $oid;   
                    break;

                }
            }

            if(array_sum($total_sessions_array)-array_sum($diets_sent_array)==0)
            {
                $latest = current($get_all_orders_of_user['result']); 
                $data['active_order_id'] = $latest['order_id'];
            }
        }
        return $data['active_order_id'];  

    }
    
    #Update record with Multiple where
    public function updateRecordMultipleWhere($table_name,$data,$where)
    {
     if(!empty($where))  {
          $this->CI->db->where($where);
          $this->CI->db->update($table_name, $data);
          return 1;
      }        
     return 0;
    }
    
    public function get_email_signature($photo = '',$first_name,$from_email) {
        $SITEURL = "https://www.balancenutrition.in/crm_ui/";
        $dp_path = $SITEURL.'images/'.$photo;
        
        if(!empty($photo) && $photo == 'khyati.png')
        {
            $signature .='<br/><br/><br/> <img src='.$dp_path.' style="height:100px;width:100px;" />';
        }
        
        
        $signature.='<br /><p> <span style="">Warm Regards,</span><br />';
        $signature.='<u><strong>'.$first_name.'</strong></u><br />';
        if(!empty($photo) && $photo == 'khyati.png'){
          $signature.=' Founder</p>';
        }
        
        $signature.='<p><img src="https://www.balancenutrition.in/EmailFooter/NewLogo-min.png" style="height:50px; width:200px" /></p>';
        //$signature.='<p><img src="http://beattheflab.com/email_templates/goodbye_diwali_sale_extended_offer.png" /></p>';
        $signature.='<p><strong>Mail:&nbsp;<a href="mailto:'.$from_email.'" target="_blank">'.$from_email.'</a></strong><br />';
        $signature.='<strong>Web:&nbsp;<a href="https://www.balancenutrition.in/" target="_blank">www.balancenutrition.in</a></strong><br></p>';
        $signature.='<p><a href="https://play.google.com/store/apps/details?id=in.balancenutrition.appnina"><img src="https://www.balancenutrition.in/EmailFooter/google_icon.png" width="120px" height="40px"></a>
            <a href="https://apps.apple.com/in/app/balance-nutrition-weight-loss/id1488739058"><img src="https://www.balancenutrition.in/EmailFooter/ios_icon.png" width="120px" height="40px"></a></p>';
        
        $signature.='<p>Clients In India | UAE | Bahrain | Singapore |&nbsp; USA | UK | Kenya | China&nbsp; &amp; More<br />';
        $signature.='<strong><a href="https://www.facebook.com/balancenutrition.in" target="_blank"><img alt="" src="https://www.balancenutrition.in/EmailFooter/Social%20media%20icon/fb.png" /></a>&nbsp;';
        $signature.='<a href="https://twitter.com/balance_khyati" target="_blank"><img alt="" src="https://www.balancenutrition.in/EmailFooter/Social%20media%20icon/twitter.png" /></a>&nbsp;';
        $signature.='<a href="https://www.youtube.com/channel/UCRBg_eWt2yJreg8AZXPGvKA" target="_blank"><img alt="" src="https://www.balancenutrition.in/EmailFooter/Social%20media%20icon/youtube.png" /></a>&nbsp;';
        $signature.='<a href="https://www.instagram.com/balancenutrition.in/" target="_blank"><img alt="" src="https://www.balancenutrition.in/EmailFooter/Social%20media%20icon/insta.png" /></a>&nbsp;';
        $signature.='<a href="https://www.pinterest.com/KhyatiRupani123/" target="_blank"><img alt="" src="https://www.balancenutrition.in/EmailFooter/Social%20media%20icon/pin.png" /></a>&nbsp;</strong>';
        $signature.='<a href="https://in.linkedin.com/in/balance-nutrition-6a65ba98" target="_blank"><img alt="" src="https://www.balancenutrition.in/EmailFooter/Social%20media%20icon/link.png" /></a></p></div>';
        
        return $signature;
         
     }

    public function getIdByParameterOrderBy($table, $fields, $where,$orderby)
    {
        $this->CI->db->select($fields);
        $this->CI->db->from($table);
        $this->CI->db->where($where);
        $this->CI->db->order_by($orderby);
        $sql = $this->CI->db->get();
        return $sql->row_array();
    }

    public function getTotalOrderCount($user_id){

        if(!empty($user_id)){
            $this->CI->db->select('COUNT(order_id) as order_count');
            $this->CI->db->from('order_details');
            $this->CI->db->where(array('userid' => $user_id));
            $sql = $this->CI->db->get();
            return $sql->row_array();    
        }
        
    }
    
    
        public function getBalancePaidAmount($order_id){
        if(!empty($order_id)){
            $this->CI->db->select(array('amount','type','date'));
            $this->CI->db->from('order_logs');
            $this->CI->db->where(array('orderid' => $order_id,'type' => 'Balance Paid'));
            $this->CI->db->order_by('id desc');
            $this->CI->db->limit(1);
            $sql = $this->CI->db->get();
            if($sql->num_rows() > 0){
                return $sql->row_array();
            }else{
                return [];
            } 
        }
    }

    public function getAllPaidAmountForOrder($order_id){
        if(!empty($order_id)){
            $this->CI->db->select(array('amount','type','date'));
            $this->CI->db->from('order_logs');
            $this->CI->db->where(array('orderid' => $order_id));
            $this->CI->db->order_by('id asc');
            $sql = $this->CI->db->get();
            if($sql->num_rows() > 0){
                return $sql->result_array();
            }else{
                return [];
            } 
        }
    }
    
    //Added by Vaibhav for getting diet stats for active order after other program expires
    
    public function get_active_order_diet_stats($user_id = 0,$order_id = 0)
        {
            //  function get_current_diet_stats : Start
            $container = [
                             'total'       => 0,
                             'completed'   => 0,
                             'pending'     => 0, 
                         ];
            // $order_id = 0;
            
            if( empty($user_id) || ( $user_id == 0) )
            {
                return $container;
            }
            if(empty($order_id)){
                $order_id = 0;
            }
                
                // get completed diets : Start
                    $sql = ' 
                             SELECT COUNT( DISTINCT `diet_id` ) as completed_diets, `order_id`
                             FROM (
                                     SELECT `order_id`, `session`, diet_id
                                     FROM `diet_session_log`
                                     WHERE ( `order_id` > 0 ) AND `is_deleted` = "0" AND `order_id` ='.$order_id.'  AND `diet_status` = "4" AND ( `user_id` = '.$this->CI->db->escape($user_id).' )                                     
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
                
                if(empty($order_id))
                {
                    $order_id = $this->get_active_order_id($user_id);
                }
            
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
        
        public function get_all_active_diet_stats($user_id = 0)
        {
            //  function get_current_diet_stats : Start
            $container = [
                             'total'       => 0,
                             'completed'   => 0,
                             'pending'     => 0, 
                         ];
            // $order_id = 0;
            
            if( empty($user_id) || ( $user_id == 0) )
            {
                return $container;
            }
            if(empty($order_id)){
                $order_id = 0;
            }
                
                // get completed diets : Start
                    $sql = ' 
                             SELECT COUNT( DISTINCT `diet_id` ) as completed_diets, `order_id`,`user_id`
                             FROM (
                                     SELECT `user_id`,`order_id`, `session`, diet_id
                                     FROM `diet_session_log`
                                     WHERE ( `order_id` > 0 ) AND `is_deleted` = "0" AND `diet_status` = "4" AND ( `user_id` = '.$this->CI->db->escape($user_id).' )                                     
                                     GROUP BY `user_id`, `session` 
                                        ORDER BY `order_id` DESC, `session` DESC 
                                      ) AS t 
                             GROUP BY `user_id` 
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
                
                if(empty($order_id))
                {
                    $order_id = $this->get_active_order_id($user_id);
                }
            
                if($order_id > 0)
                {
                    // get total diets : Start
                    $sql = ' SELECT  SUM(`program_session`) as `total_session`
                             FROM `order_details` 
                             WHERE ( `userid` = '.$this->CI->db->escape($user_id).' )
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
        
        public function getAllActiveUsers(){
            $sql = "SELECT id FROM registries WHERE LCASE(user_status) IN ('active','dormant','onhold','notstarted','premaintenance','maintenance')";  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->result_array();
            }	
            return [];	
        }
        
        
        public function deleteRecord($table, $primary_Key, $primaryValue)
        {
            
            if(!empty($primaryValue)) {
                $this->CI->db->where($primary_Key, $primaryValue);
                $this->CI->db->delete($table);
                return 1;
            }
            return 0;
        }
        
        public function getUnreadWalletLogs($user_id){
            $sql = "SELECT COUNT(id) as total_wallet_log FROM wallet_log WHERE user_id =".$user_id." AND view_flag = 0";  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->row_array();
            }	
            return [];	
            
        }
        
        public function getLastProgramPurchased($user_id){
            $sql = "SELECT * FROM order_details WHERE userid =".$user_id." ORDER BY order_id DESC LIMIT 1";  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->row_array();
            }	
            return [];
        }
        
        public function getClientsBillingDetails($user_id){
            $sql = "SELECT * FROM billing_details WHERE user_id =".$user_id." ORDER BY billing_id DESC LIMIT 1";  
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                return $sql->row_array();
            }	
            return [];
        }
        
        
    public function getLatestDietOfUser($user_id){
        if(!empty($user_id)){
            $this->CI->db->select('*');
            $this->CI->db->from('diet_session_log');
            $this->CI->db->where(array('user_id' => $user_id,'is_deleted' => '0','diet_status' => 4));
            $this->CI->db->order_by('diet_id desc');
            $this->CI->db->limit(1);
            $sql = $this->CI->db->get();

            if($sql->num_rows() > 0){
                return $sql->row_array();
            }else{
                return 0;
            }   
        }

    }
    
    public function getLatestWeightRecord($user_id){
        if(!empty($user_id)){
            $this->CI->db->select('*');
            $this->CI->db->from('weight_monitor_record');
            $this->CI->db->where(array('user_id' => $user_id,'is_deleted' => '0'));
            $this->CI->db->order_by('wmr_id desc');
            $this->CI->db->limit(1);
            $sql = $this->CI->db->get();

            if($sql->num_rows() > 0){
                return $sql->row_array();
            }else{
                return 0;
            }   
        }

    }
    
    public function getUserList($user_array){
        $this->CI->db->select(array('id','my_wallet'));
        $this->CI->db->from('registries');
        $this->CI->db->where(array('my_wallet >' => 0));
        // $this->CI->db->where_in('id',$user_array);
        // $this->CI->db->where_in('user_status',$user_array);
        $this->CI->db->limit(750);
        $sql = $this->CI->db->get();

        if($sql->num_rows() > 0){
            return $sql->result_array();
        }else{
            return 0;
        }   
    }
    
    
    public function getLatestFeedback($user_id){
        $this->CI->db->select('*');
        $this->CI->db->from('bn_halftime_feedback');
        $this->CI->db->where(array('user_id'=> $user_id));
        $this->CI->db->order_by('id desc');
        $this->CI->db->limit(1);
        $sql = $this->CI->db->get();

        if($sql->num_rows() > 0){
            return $sql->row_array();
        }else{
            return 0;
        }   
    }
    
    public function getProgramWithLastExpiry($user_id){
        $this->CI->db->select('*');
        $this->CI->db->from('order_details');
        $this->CI->db->where(array('userid'=> $user_id));
        $this->CI->db->order_by('extended_date desc');
        $this->CI->db->limit(1);
        $sql = $this->CI->db->get();

        if($sql->num_rows() > 0){
            return $sql->row_array();
        }else{
            return 0;
        }   
    }
    
    public function getMentorInfoByClient($user_id){

        $sql = "SELECT au.admin_id, au.first_name, au.last_name, au.full_name, au.photo, au.designation, concat(au.first_name,' ',au.last_name) AS mentor_name, au.email_id AS mentor_email, au.phone, au.digital_id
        FROM registries r
        LEFT JOIN admin_user au
        ON au.admin_id = r.mentor_id
        WHERE r.id = $user_id";
        $sql = $this->CI->db->query($sql);
    if($sql->num_rows() > 0){
        return $sql->row_array();
    }else{
        return 0;
    }

    }
    
    
    
   
        
    public function getLatestLeadRecord($email_id,$phone){
        $sql = "SELECT DATE(created) as created_date FROM lead_management WHERE email ='".$email_id."' OR phone ='".$phone."' ORDER BY id DESC";  
        $sql = $this->CI->db->query($sql);
        
        if($sql->num_rows() > 0) {
            return $sql->row_array();
        }	
        return [];	
        
    } 
    
    
    
    
            
    public function getBookedCallSlots($date,$counsellor_id){
        $sql = "SELECT GROUP_CONCAT(slot_id) as unavailable_slots FROM bn_consultation_call_booking WHERE counsellor_id = ".$counsellor_id." AND DATE(call_date) = '".$date."'";  
        $sql = $this->CI->db->query($sql);
        
        if($sql->num_rows() > 0) {
            return $sql->row_array();
        }	
        return [];	
        
    } 
    
    
    public function getPendingSlots($unavailable_slots = ''){
        
        if(!empty($unavailable_slots)){
            $where = 'id NOT IN ('.$unavailable_slots.')';
        }else{
            $where = '1';
        }
        $sql = "SELECT * FROM bn_book_appointment_slots WHERE ".$where;  
        $sql = $this->CI->db->query($sql);
        
        if($sql->num_rows() > 0) {
            return $sql->result_array();
        }	
        return [];	
        
    } 
    
    
    
       public function array_sort_by_key($array, $on, $order=SORT_DESC){
    
        $new_array = array();
        $sortable_array = array();
    
        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }
    
            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }
    
            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }
    
        return $new_array;
    }
    
    

    // this query function use for testing purpose for page visit user_data     
    /*public function page_visit_query($user_id){
        $page_visit_data = array(
            'user_id' => $user_id,
            'page_visit' => $_SERVER['HTTP_REFERER'],
            'edit_date' => date('Y-m-d'),
        );
        
        $this->db->insert('page_visit_table', $page_visit_data);
    }*/

public function lead_type($email_id,$phone){
            
            if($phone==''){$phone ='9876235677';}else{$phone=$phone;}
            if($phone!='' || $email_id!='' ){ //registries join order table
               $sql ="select group_concat(program_status) as s from order_details where email_id = '$email_id' OR phone like '%".$phone."%'";
               $sql = $this->CI->db->query($sql);
                $status='';
                $i=0;
                if ($sql->num_rows() >0){
                    foreach($sql->result_array()[0] as  $val){
                        // echo " value= ". $val['s'];
                        // exit;
                        if($val['s'] !=''){
                            $arr= explode(",",$val['s']);
                            if (in_array("1", $arr)){
                                $status = 'Active Client';
                            }elseif(in_array("4", $arr)){
                                $status = 'Advance Purchase';
                            }else{
                                $status = 'OCL';
                            }
                        }
                    }
                    if($status!=''){ return $status;exit();}
                }
                // $result=mysqli_query($con,"SELECT id FROM `lead_management` WHERE (email='$email_id' OR phone='$phone') AND DATE(created) < DATE_FORMAT(NOW() ,'%Y-%m-01')  group by email ");
                $sql ="SELECT id FROM `lead_management` WHERE (email='$email_id' OR phone='$phone') AND DATE(created) < DATE_FORMAT(NOW() ,'%Y-%m-01')  group by email";
               $sql = $this->CI->db->query($sql);
                if ($sql->num_rows()>0){
                    $status = $sql->result_array();
                    $status = 'OLR';
                    return $status;
                    exit();
                    
                }else{
                    $status= 'New';
                    return $status;
                    exit();
                }
            }else{
                echo 'Parameter Missing';exit();
            }
        }
 
}