<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_details_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
        // $this->load->library('query');
    }
   public function insert_wallet_data($wallet_data) {
    try {
        $this->db->insert('lead_wallet', $wallet_data);
        // print_r($this->db->last_query());exit;
        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            return true;  // Return true on successful insertion
        } else {
            return false;
        }
    } catch (Exception $e) {
        // Log the exception or handle it as needed
        return false;  // Return false on failure
    }
}
    
   public function get_user_details($status=false,$email=false){
        // echo $email."<br>";
        // exit;//exit;
        date_default_timezone_set("Asia/Kolkata");
        if($status=='client'){
                   $sql = "SELECT rg.id,CONCAT(rg.first_name, ' ', rg.last_name) AS name,od.email_id, rg.my_wallet as wallet,rg.gender,rg.user_status as program_status,
                    (SELECT mobile_no1 FROM billing_details WHERE email_id = od.email_id order by billing_id desc limit 1) AS phone,
                    (SELECT country from lead_management where email= '$email' GROUP BY email limit 1)AS country,
                    (SELECT state from lead_management where email= '$email' GROUP BY email limit 1)AS state,
                    (SELECT city  from lead_management where email= '$email' GROUP BY email limit 1)AS city,
                    (SELECT age  from lead_management where email= '$email' GROUP BY email limit 1)AS age,
                    (SELECT max(primary_source) FROM lead_management WHERE email = '$email' ORDER BY id DESC limit 1) as primary_source,
                    (SELECT ip_address from lead_management where email= '$email' GROUP BY email limit 1)AS ip_address,
                    (SELECT zone_name FROM countries WHERE country_name = (select country from lead_management WHERE country!='' AND email = '$email' limit 1) ) AS zone,
                    (
                        SELECT
                            CONCAT(device, ' ', app_version)
                        FROM
                            bn_user_fcm_token
                        WHERE
                            user_id = rg.id
                        GROUP BY
                            user_id
                    ) AS app,
                    (
                        SELECT
                            assign_to
                        FROM
                            lead_action
                        WHERE
                            email = od.email_id
                        order by id desc limit 1    
                    ) AS counsellor,
                    (
                        SELECT
                            full_name
                        FROM
                            admin_user
                        WHERE
                            admin_id = rg.mentor_id
                    ) AS mentor_name,
                    CONCAT(
                        od.program_name,
                        ' (',
                        od.program_session,
                        ')'
                    ) AS program_details,
                    DATE_FORMAT(od.extended_date, '%D %b %Y') AS expiry,
                    (SELECT CONCAT(DATE_FORMAT(extended_date, '%D %b %Y'),'||',program_name,'||',DATE_FORMAT(start_date, '%D %b %Y')) FROM  order_details WHERE program_status IN('1') AND email_id = '$email' limit 1) AS current_prog_expiry,

                    DATE_FORMAT(od.date, '%D %b %Y') as date,
                    rg.user_status
                    FROM
                        registries rg
                    LEFT JOIN order_details od ON
                        rg.id = od.userid
                    WHERE
                        od.email_id ='$email'
                    order by od.order_id desc limit 1 ";
            
        }else{
            $sql = "SELECT
            (
                 SELECT rg.id
                FROM registries rg
                WHERE rg.email_id = '$email' OR rg.email_id = concat(lm.phone,'@balancenutrition.in') order by rg.id desc limit 1
            ) AS register_id,
            lm.id, 
            (SELECT CONCAT(height,'.',inch) FROM lead_management WHERE email = lm.email AND height NOT IN('','.') ORDER BY id DESC limit 1) as height,
            (SELECT weight FROM lead_management WHERE email = lm.email AND weight NOT IN('','.') ORDER BY id DESC limit 1) as weight,
            lm.phase,
            (SELECT stage FROM lead_management WHERE email = lm.email ORDER BY id DESC limit 1) as stage,
            (SELECT gender FROM lead_management WHERE email = lm.email ORDER BY id DESC limit 1) as gender,
            (SELECT max(age) FROM lead_management WHERE email = lm.email ORDER BY id DESC limit 1) as age,
            (SELECT max(primary_source) FROM lead_management WHERE email = lm.email ORDER BY id DESC limit 1) as primary_source,
            lm.sub_status,
            lm.sub_status_note,
            lm.lifestyle,
            CONCAT(lm.medical_issue,',', lm.clinical_condition) AS medical_issue,
            lm.diet_history,
            lm.age_group,
            lm.target_oriented,
            lm.motivation_level,
            CONCAT(lm.fname, ' ', lm.lname) AS name,
            lm.email as email_id,
            lm.ip_address as ip_address,
            lm.phone ,
            lm.country,
            lm.state,
            lm.city,
            lm.enquiry_from as lead_source,
            (SELECT zone_name FROM countries WHERE country_name = lm.country) AS zone,
            DATE_FORMAT(lm.created, '%D %b %Y') as date,
            (
                SELECT CASE WHEN
                    android_fcm_key != '' THEN 'Android App' WHEN ios_fcm_key != '' THEN 'iOS App' ELSE 'NA'
                END 
                FROM `registries`
                WHERE email_id = lm.email
                LIMIT 1
            ) AS app,
            (SELECT user_status FROM  registries WHERE email_id= lm.email) as client_status,
            (
                SELECT key_insight
                FROM lead_action
                WHERE email = lm.email
                ORDER BY id DESC
                LIMIT 1
            ) AS key_insight,
            (
                SELECT CASE
                    WHEN reminder_dt > '".date('Y-m-d H:i:s')."' THEN CONCAT(\"Next FU(on \", followup_from,\") is at : \",DATE_FORMAT(reminder_dt, \"%D %b'%y %h:%i %p\"))
                    WHEN fu_other_date > '".date('Y-m-d H:i:s')."' THEN CONCAT(\"Next FU(on \", followup_from,\") is at : \",DATE_FORMAT(fu_other_date, \"%D %b'%y %h:%i %p\"))
                    ELSE '' 
                END as msg 
                FROM `lead_action` 
                WHERE (reminder_dt > '".date('Y-m-d H:i:s')."' OR fu_other_date > '".date('Y-m-d H:i:s')."') 
                    AND email = '$email' 
                LIMIT 1
            ) AS next_action,
            (
                SELECT assign_to
                FROM lead_action
                WHERE email = lm.email
                ORDER BY id DESC
                LIMIT 1
            ) AS counsellor,
            '' as mentor_name,
            lm.status as user_status
        FROM
            lead_management lm
        WHERE
            lm.email = '$email'
        ORDER BY
            lm.id DESC
        LIMIT 1";
        }

        $query=$this->db->query($sql);
        echo "<pre>";
        print_r($query->result_array());
        exit;

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }
    
     // avinash addd thi for get user detail for update user detail 05-11-2021
    public function get_user_data($id){
        $sql ="SELECT email, status FROM `lead_management` WHERE `id` = '$id'";
        $query=$this->db->query($sql);
        // echo "<pre>";
        // print_r($query->result_array());
        // exit;
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }
    
    
    public function update_lead_deatils($lead_id,$data,$old_email_id_details){
        
        // print_r_custom($old_email_id_details);
        // exit();
        if($data['email']!="" && $lead_id!="" && $old_email_id_details!=""){
            $this->db->where('id', $lead_id);
            $sql = $this->db->update('lead_management', $data);
            $sql = "UPDATE `lead_action` SET email = '".strtolower($data['email'])."' WHERE LOWER(email) = '".strtolower($old_email_id_details)."' ";
        $query=$this->db->query($sql);
        if($sql){
             return true;
        }else{
            return false;
        }
        
    }else{
        echo "Something Went wrong!";   
        }
    }
    
    // avinash add this for usercurrent status end 10-11-2021
    
    
    
    public function get_shour_name_country($country_name){
        $sql ="SELECT shortname FROM `countries` WHERE country_name='$country_name'";
        $query=$this->db->query($sql);
        // echo "<pre>";
        // print_r($query->result_array());
        // exit;
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }
    
    
    
    
    public function get_leadsource($email){
        $sql = "SELECT DISTINCT(enquiry_from),overall_health_score FROM `lead_management` WHERE email='$email' and enquiry_from is not null and enquiry_from != ''";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }
    public function update_lead_source_deatils($email_id_details,$lead_source_val,$old_email_id_details){
        if($email_id_details!="" && $lead_source_val!="" && $old_email_id_details!=""){
            $sql = "UPDATE `lead_management` SET email = '".strtolower($email_id_details)."', enquiry_from = '".$lead_source_val."' WHERE LOWER(email) = '".strtolower($old_email_id_details)."' ";
            $query=$this->db->query($sql);

            $sql = "UPDATE `lead_action` SET email = '".strtolower($email_id_details)."' WHERE LOWER(email) = '".strtolower($old_email_id_details)."' ";
            $query=$this->db->query($sql);
            
            return true;
        }else{
            return false;
        }//if($email_id_details!="" && $lead_source_val!=""){
        
    }
    // avinash add this for usercurrent status 10-11-2021
    public function user_current_status($email=false,$phone=false){
        // $sql ="SELECT userid,email_id,( CASE WHEN amount_type = 'D' THEN prog_buy_amt * conversion_rate ELSE prog_buy_amt END ) AS amt,payment_method,DATE_FORMAT(date, '%D %b %Y') as date,start_date,amount_type,program_status FROM order_details WHERE 
        // email_id IN(select email from lead_management where email= '$email' group by email_id)";
        $sql ="SELECT userid,email_id,( CASE WHEN amount_type = 'D' THEN prog_buy_amt * conversion_rate ELSE prog_buy_amt END ) AS amt,payment_method,DATE_FORMAT(date, '%D %b %Y') as date,start_date,amount_type,program_status FROM order_details WHERE 
        email_id = '$email' group by email_id";
        // echo($sql);
        // exit();
        $query=$this->db->query($sql);
        // print_r($query->row_array());
        // exit();
        if($query->num_rows()>0)
        {
            return $query->row_array();
        }else{
            return [];
        }
    }
    
    public function getLeadAction($email)
    {
        $sql="SELECT * FROM lead_action WHERE email='$email'";  
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->row_array();
        }else{
            return [];
        }               
	}
	
	public function getLatestEntryByEmailId($email)
    {
        $CI = get_instance();
        $sql="SELECT id FROM lead_management WHERE email='$email' ORDER BY id DESC LIMIT 1"; 
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->row_array();
        }else{
            return [];
        }               
	}
	
	public function get_assessment_details($client_id = '')
    {
        //  function get_assessment_details : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];

        $user_id = trim($client_id);

        if(!empty($client_id)){
          $sql="SELECT
                    *,
                    (SELECT country_name FROM `countries` WHERE country_id=na.country) as country,
                    (SELECT state_name FROM `states` WHERE state_id=na.state) as state,
                    (SELECT city_name FROM `cities` WHERE city_id=na.city) as city
                FROM
                    new_assessment na
                INNER JOIN order_details od ON
                    od.userid = na.user_id
                WHERE
                    na.`user_id` ='$client_id'
                ORDER BY
                    `id`
                DESC
                LIMIT 1";
                    
            $data[]=$this->query->getRecords($sql);
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_assessment_details : End
    }

    public function get_incredient_checklist($client_id = '')
    {
        //  function get_assessment_details : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];
        
        if($client_id!="")
        {
          $sql="SELECT
                    icl.category_id,
                    icl.ingredient_name,
                    icl.quantity,
                    icat.category_name,
                    crp.availability AS result,
                    crp.comment,
                    crp.updated_date
                FROM
                    bn_ingredient_checklist icl
                LEFT JOIN bn_ingredient_category icat ON
                    icl.category_id = icat.category_id
                LEFT JOIN bn_checklist_client_reply crp ON
                    icat.category_id = crp.category_id AND icl.ingredient_id = crp.ingredient_id
                WHERE
                    crp.user_id = $client_id ORDER BY icl.category_id ASC";
                    
            $data[]=$this->query->getRecords($sql);
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_assessment_details : End
    }
    
	//get_client_id
    function get_client_id($email=''){
        $this->db->select('id');
        $this->db->where(array('email_id'=>$email));
        $sql = $this->db->get('registries');
        if($sql->num_rows()>0){
            //print_r($sql->result_array());
            return $sql->result_array();
            //return $this->db->get()->row()->id;
        }else{
            return 0;
        }
         
    }
    
    function getclient_last_device_details($email=''){
         $this->db->select('ufcm.device,ufcm.app_version,ufcm.added_date');
         $this->db->join('bn_user_fcm_token ufcm','ufcm.user_id = r.id','left');
         $this->db->or_where(array('r.email_id'=>$email,'r.id'=>$email));
         $this->db->where(array('ufcm.app_version !='=>'0'));
         //$this->db->group_by('ufcm.device');
         $this->db->order_by('ufcm.added_date','desc');
         $sql = $this->db->get('registries r');
         //echo $this->db->last_query();
         if($sql->num_rows()>0){
            return $sql->result_array();
            }
         else return false;
    }
    
    
    

    
    public function get_all_screen_names(){
        
        $this->db->select('r.last_visited_screen as screen_name');
        $this->db->group_by('r.last_visited_screen');
        $sql = $this->db->get('registries r');
        //echo $this->db->last_query();
        if($sql->num_rows()>0){
            return $sql->result_array();
        }
        else return false;
    }
    
    public function update_last_screen($user_id='',$screen_name=''){
        
        // $this->db->where('id', $user_id);
        $this->db->or_where(array('r.email_id'=>$user_id,'r.id'=>$user_id));
        $sql = $this->db->update('registries r', array('last_visited_screen' => $screen_name));
        if($sql){return true;}
        else {return false;}
    }
    
    
    public function update_web_access($user_id='',$web_access=''){
        
        // $this->db->where('id', $user_id);
        $this->db->or_where(array('r.email_id'=>$user_id,'r.id'=>$user_id));
        $sql = $this->db->update('registries r', array('web_version_allowed' => $web_access));
        if($sql){return true;}
        else {return false;}
    }
    
    public function update_user_status($user_id='',$user_status=''){
        
        // $this->db->where('id', $user_id);
        $this->db->or_where(array('r.email_id'=>$user_id,'r.id'=>$user_id));
        $sql = $this->db->update('registries r', array('user_status' => $user_status));
        if($sql){return true;}
        else {return false;}
    }
    
    
    public function update_order_status($order_id='',$order_status=''){
        
        $this->db->where('order_id', $order_id);
        $sql = $this->db->update('order_details', array('program_status' => $order_status));
        if($sql){return true;}
        else {return false;}
    }
    
    public function get_curr_user_status($user_id = ''){
        $user_statuses = array('Completed','fs','Dropout','Completeds','fss','Dropouts');
        $this->db->select('r.user_status');
        // $this->db->where(array('id'=>$user_id));
        $this->db->or_where(array('r.email_id'=>$user_id,'r.id'=>$user_id));
        $this->db->where_in('user_status',$user_statuses);
        $sql = $this->db->get('registries r');
        if($sql->num_rows()>0){ return $sql->row_array(); }
        else return 0; 
    }
    
    
    public function get_client_order_details($email='',$order_id=''){
        $this->db->select('od.order_id,od.program_status,od.userid,od.extended_date,od.program_name,od.date,r.last_visited_screen,r.user_status');
        $this->db->join('order_details od','od.userid = r.id');
        
        if($email != ''){
            $this->db->or_where(array('r.email_id'=>$email, 'r.id'=> $email));
        }
        if($order_id != ''){
            $this->db->where(array('od.order_id'=>$order_id));
        }
        $sql = $this->db->get('registries r');
        //echo $this->db->last_query();
        
        if($sql->num_rows()>0){
            return $sql->result_array();
        }
        else {
            
            return false;
        }
        
    }
    
    public function get_diet_details($order_id = ''){
        $this->db->select('dsl.start_date,dsl.user_id');
        $this->db->where(array('dsl.order_id'=>$order_id,'dsl.diet_status'=>'2'));
        $this->db->group_by('dsl.order_id');
        $this->db->order_by('dsl.start_date');
        $sql = $this->db->get('diet_session_log dsl');
        if($sql->num_rows()>0){
            return $sql->result_array();
        }
        else return false;
    }
    
    public function notification_received_data_query($user_id){
        // $start_date=date('Y-m-d', strtotime(DATE()));
        $sql = "SELECT title,description, CASE
                WHEN notification_flag = '1' THEN \"Read\"
                ELSE \"Unread\"
                END as read_status, cast(added_date as date) as added_date FROM `bn_user_cron_notification` where user_id='$user_id' and added_date > (CURDATE() - INTERVAL 30 DAY) and notification_id!=0";
        $sql = $this->db->query($sql);
        //echo $this->db->last_query();
        
        if($sql->num_rows()>0){
            
            return $sql->result_array();
        }
        else {
            
            return false;
        }        
    }
    
    public function get_notification_dropdown_list_query(){
        $sql = "SELECT id,`subject` FROM `bn_app_reminder_content`";
        
        $sql = $this->db->query($sql);
        if($sql->num_rows()>0){
            
            return $sql->result_array();
        }
        else {
            
            return false;
        }  
    }

       
    public function notification_details_data_query($subject){
        $sql = "SELECT * FROM `bn_app_reminder_content` WHERE id=".$subject;
        
        $sql = $this->db->query($sql);
        if($sql->num_rows()>0){
            
            return $sql->row_array();
        }
        else {
            
            return false;
        }  
    }
    
    public function lastSentDietDetails($user_id="")
    {
        /* function last_diet_details : Start */
        
        if(!empty($user_id))
        {
            $sql="SELECT
                            *
                        FROM
                            diet_session_log
                        WHERE
                            user_id = '$user_id' AND is_deleted = '0' AND diet_status=4
                        ORDER BY session
                        DESC
                        LIMIT 1";

                                
            $query=$this->db->query($sql);

            if($query->num_rows()>0)
            {
                return $query->result_array();
            }
        }else{
            return [];
        }
    }



    public function getSessionWmrDetails($actual_session='',$order_id='')
    {
        # code...

        $sql="SELECT                        
                        od.program_name,
                        od.program_session,
                        dsl.session AS `diet_session`,
                        wmr.*
                    FROM
                        weight_monitor_record wmr
                    LEFT OUTER JOIN order_details od ON
                        od.order_id = wmr.order_id
                    LEFT JOIN diet_session_log dsl ON
                        dsl.diet_id = wmr.diet_id
                    WHERE
                        wmr.`order_id` = '$order_id' AND wmr.is_deleted='0' AND wmr.session=$actual_session
                    ORDER BY
                        wmr.`posted_date`
                    ASC"; 

        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
    }

    public function getSessionIltDetails($client_id='')
    {   
        $sql="SELECT
                    CONCAT(rg.first_name,' ', rg.last_name) AS `full_name`,
                    od.program_name,
                    ilt.*,
                    dsl.actual_session
                FROM
                    inch_loss_tracker ilt
                LEFT OUTER JOIN order_details od ON
                    od.order_id = ilt.order_id
                LEFT JOIN registries rg ON
                    ilt.user_id = rg.id
                LEFT JOIN diet_session_log dsl ON
                    ilt.diet_id=dsl.diet_id
                WHERE
                    ilt.`user_id` = '$client_id' AND ilt.is_deleted='0'
                ORDER BY
                    ilt.posted_date";

        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }           
    }


    public function getSessionPhotoDetails($order_id='')
    {   
        $sql="SELECT
                    CONCAT(rg.first_name,' ', rg.last_name) AS `full_name`,
                    od.program_name,
                    ilt.*,
                    dsl.actual_session
                FROM
                    weight_monitor_photo ilt
                LEFT OUTER JOIN order_details od ON
                    od.order_id = ilt.order_id
                LEFT JOIN registries rg ON
                    ilt.userid = rg.id
                LEFT JOIN diet_session_log dsl ON
                    ilt.diet_id=dsl.diet_id
                WHERE
                    ilt.`order_id` = '$order_id'
                ORDER BY
                    ilt.progress_photo_date
                DESC LIMIT 1";

        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }           
    }
    
    
    public function get_halftime_feedback($user_id='',$param='',$client_id='')
    {
    	/* function get_halftime_feedback : Start */
    	       
        $data = [];

        $user_id = trim($user_id);

        if($param[0]==TRUE && !empty($user_id))
        {
        	$sql="SELECT
                        od.userid,
                        od.order_id,
                        od.program_name,
                        od.program_session,
                        CONCAT(rg.first_name, ' ', rg.last_name) AS `name`,
                        od.email_id,
                        pmf.*
                    FROM
                        `bn_halftime_feedback` pmf
                    LEFT JOIN order_details od ON
                        pmf.order_id = od.order_id
                    LEFT JOIN registries rg ON
                        pmf.user_id = rg.id";

            if(!empty($client_id) && $client_id>0)
            {
                $sql.=" WHERE  od.userid=$client_id ORDER BY pmf.id DESC LIMIT 1";
            }else{
                $sql.=" WHERE od.mentor_id = $user_id AND halftime_ack = 0";
                $sql.=" ORDER BY added_date DESC";              
            }

        	$data[]=$this->query->getRecords($sql);        	       
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

    	/* function get_halftime_feedback : End */
    }
    
    public function get_pre_maintenance_feedback($user_id='',$param='',$client_id='')
    {
    	/* function get_pre_maintenance_feedback : Start */
    	       
        $data = [];

        $user_id = trim($user_id);

        if($param[0]==TRUE && !empty($user_id))
        {
        	$sql="SELECT
                        od.userid,
                        od.order_id,
                        od.program_name,
                        od.program_session,
                        CONCAT(rg.first_name, ' ', rg.last_name) AS `name`,
                        od.email_id,
                        pmf.*
                    FROM
                        `bn_pre_maintenance_feedback` pmf
                    LEFT JOIN order_details od ON
                        pmf.order_id = od.order_id
                    LEFT JOIN registries rg ON
                        pmf.user_id = rg.id";

            if(!empty($client_id) && $client_id>0)
            {
                $sql.=" WHERE od.userid=$client_id ORDER BY pmf.id DESC LIMIT 1";
            }else{
                $sql.=" WHERE od.mentor_id = $user_id AND pre_maintenance_ack = 0";
                $sql.=" ORDER BY added_date DESC";
            }       
            

        	$data[]=$this->query->getRecords($sql);        	       
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

    	/* function get_pre_maintenance_feedback : End */
    }
    
    public function get_final_feedback($user_id='',$param='',$client_id='')
    {
    	/* function get_final_feedback : Start */
    	       
        $data = [];

        $user_id = trim($user_id);

        if($param[0]==TRUE && !empty($user_id))
        {
        	$sql="SELECT
                        od.userid,
                        od.order_id,
                        od.program_name,
                        od.program_session,
                        CONCAT(rg.first_name, ' ', rg.last_name) AS `name`,
                        od.email_id,
                        pmf.*
                    FROM
                        `bn_final_feedback` pmf
                    LEFT JOIN order_details od ON
                        pmf.order_id = od.order_id
                    LEFT JOIN registries rg ON
                        pmf.user_id = rg.id";
                
            if(!empty($client_id) && $client_id>0)
            {
                $sql.=" WHERE od.userid=$client_id ORDER BY pmf.id DESC LIMIT 1";
            }else{
                $sql.=" WHERE od.mentor_id = $user_id AND final_feedback_ack = 0";
                $sql.=" ORDER BY added_date DESC";
            }  


        	$data[]=$this->query->getRecords($sql);        	       
        }        

        return $data;
        unset($sql); /* Always unset the variable at the end */

    	/* function get_final_feedback : End */
    }
    
    
    public function getLeadRecordsByEmailId($email='')
    {
        $sql="SELECT
            la.fu_note,
            DATE(la.fu_date) as fu_date,
            la.fu_other_note,
            DATE(la.fu_other_date) as fu_other_date,
            la.key_insight,
            DATE(la.key_insight_date) AS key_insight_date,
            la.pay_type,
            DATE(la.pay_dt) as pay_dt,
            la.assign_to,
            DATE(la.assign_date) as assign_date
            FROM
                lead_action la
            WHERE
                la.email = '".$email."'
            ORDER BY
                la.id";

        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }     
    }
    
    public function getHS($lead_id)
    {
        //bn_app_health_score if other data needed.
         $sql="SELECT
                    id,weight,CONCAT(height,'.',inch) as height,age,medical_issue,ideal_bmi,body_mass_index,ideal_weight,weight_difference,overall_health_score,health_category
                FROM
                    lead_management
                WHERE
                    id = '".$lead_id."'";

        $query=$this->db->query($sql);
        $result = $query->result_array();

        $sql_query="SELECT body_type,sleep,activity,smoke,periods,alcohol,water,fruits
               FROM
                   bn_app_health_score
               WHERE
                   health_score_id = '".$result[0]['id']."'";
        $query=$this->db->query($sql_query);
        $bn_app_health_score  =  $query->result_array();

    $result[0]['body_type']  = $bn_app_health_score[0]['body_type']; 
     
   switch ($bn_app_health_score[0]['sleep']) {
         case '14': 
         $result[0]['sleep']  = '6 - 9 hrs'; 
         break;
         case '12': 
         $result[0]['sleep']  = '< 6 hrs Peaceful';
       break;
         case '7':  
         $result[0]['sleep']  = '< 6 hrs Disturbed'; 
     
         break;      
         }

    switch ($bn_app_health_score[0]['activity']) {
         case '14': 
         $result[0]['activity'] = 'Very Active'; 
         break;
         case '12': 
         $result[0]['activity'] = 'Moderately'; 
        break;
         case '7':  
         $result[0]['activity'] = 'Lightly Active';
         break;      
         case '4':  
         $result[0]['activity'] = 'Sedentary';
         break;      
    }

    switch ($bn_app_health_score[0]['smoke']) {
         case '14': 
         $result[0]['smoke']  = 'Never'; 
         break;
         case '12': 
         $result[0]['smoke']  = 'Quit for 2 year'; 
         break;
         case '7':  
         $result[0]['smoke']  = 'A few times a week'; 
         break;      
         case '4':  
         $result[0]['smoke']  = 'More than 2 times a day'; 
     
         break;      
    }
    switch ($bn_app_health_score[0]['periods']) {
         case '12': 

        $result[0]['periods'] = 'Regular'; 
        break;
         case '7':  
        $result[0]['periods']   = 'Irregular'; 
         break;      
    }

    switch ($bn_app_health_score[0]['alcohol']) {
         case '14': 

        $result[0]['alcohol'] = 'Never'; 
         break;
         case '12': 
        
        $result[0]['alcohol'] = 'Quit since 1 year'; 
        break;
         case '7':  
        $result[0]['alcohol'] = 'Occasionally'; 
         break;      
         case '4':  
        $result[0]['alcohol'] = 'Daily'; 
         break;      
    }


    switch ($bn_app_health_score[0]['water']) {
         case '14': 

             $result[0]['water'] = '12 > glasses'; 
         break;
         case '12': 
        
             $result[0]['water'] = '6 - 12 glasses'; 
       break;
         case '7':  
             $result[0]['water'] = '4 - 6 glasses'; 
     
         break;      
         case '4':  
             $result[0]['water'] = '< 4 glasses'; 
         break;      
    }

 switch ($bn_app_health_score[0]['fruits']) {
         case '14': 

        $result[0]['fruits'] = '4 > servings'; 
         break;
         case '12':      
        $result[0]['fruits'] = '3 - 4 servings'; 
       break;
         case '7':  
        $result[0]['fruits'] = '1 - 2 servings'; 
     
         break;      
         case '4':  
        $result[0]['fruits'] = ''; 
     
         break;      
    }

        if($query->num_rows()>0)
        {
            return $result;//->result_array();
        }else{
            return [];
        }  

    }    
    public function getLeadSourcesByEmailId($email='')
    {
        $sql="SELECT
                    id,
                    enquiry_from as source,
                    DATE(created) as date
                FROM
                    lead_management
                WHERE
                    email = '".$email."'";

        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }     
    }
    
    
    public function get_program_history($client_id = '',$param='')
    {
        //  function get_program_history : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];

        $user_id = trim($client_id);

        if($param[0]==TRUE)
        {
                           
        }

        if($param[1]==TRUE && !empty($client_id))
        {
            $sql="SELECT                        
                    od.`order_id`,
                    od.`userid`,
                    od.`email_id`,
                    od.`program_name`,
                    od.`program_session`,
                    od.program_type,
                    od.program_status,
                    od.`amount`,
                    od.`amount_type`,
                    od.`balance`,
                    od.`date`,
                    od.`exp_date`,
                    od.`extended_date`,
                    od.`mentor_id`,
                    od.start_date,
                    od.`start_date_set`,
                    (
                        SELECT
                            COUNT(DISTINCT(SESSION))
                        FROM
                            `diet_session_log`
                        WHERE
                            `order_id` = od.`order_id` AND `is_deleted`='0'
                    ) AS `session_count`
                    FROM
                        `order_details` od
                    WHERE
                        od.`email_id` = '$client_id' AND od.`program_status`= 4 order by od.order_id DESC";
                    
            $data[]=$this->query->getRecords($sql);
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_program_history : End
    }
    
    public function get_current_program_history($client_id = '',$param='')
    {
        //  function get_program_history : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];

        $user_id = trim($client_id);

        if($param[0]==TRUE)
        {
                           
        }

        if($param[1]==TRUE && !empty($client_id))
        {
            $sql="SELECT                        
                    od.`order_id`,
                    od.`userid`,
                    od.`email_id`,
                    od.`program_name`,
                    od.`program_session`,
                    od.program_type,
                    od.program_status,
                    od.`amount`,
                    od.`amount_type`,
                    od.`balance`,
                    od.`date`,
                    od.`exp_date`,
                    od.`extended_date`,
                    od.`mentor_id`,
                    (
                        SELECT
                            COUNT(DISTINCT(SESSION))
                        FROM
                            `diet_session_log`
                        WHERE
                            `order_id` = od.`order_id` AND `is_deleted`='0'
                    ) AS `session_count`
                    FROM
                        `order_details` od
                    WHERE
                        od.`email_id` = '$client_id' AND od.`program_status`= 1 order by od.order_id DESC";
                    
            $data[]=$this->query->getRecords($sql);
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_program_history : End
    }
    
    public function get_old_program_history($client_id = '',$param='')
    {
        //  function get_program_history : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];

        $user_id = trim($client_id);

        if($param[0]==TRUE)
        {
                           
        }

        if($param[1]==TRUE && !empty($client_id))
        {
            $sql="SELECT                        
                    od.`order_id`,
                    od.`userid`,
                    od.`email_id`,
                    od.`program_name`,
                    od.`program_session`,
                    od.program_type,
                    od.program_status,
                    od.`amount`,
                    od.`amount_type`,
                    od.`balance`,
                    od.`date`,
                    od.`exp_date`,
                    od.`extended_date`,
                    od.`mentor_id`,
                    (
                        SELECT
                            COUNT(DISTINCT(SESSION))
                        FROM
                            `diet_session_log`
                        WHERE
                            `order_id` = od.`order_id` AND `is_deleted`='0'
                    ) AS `session_count`
                    FROM
                        `order_details` od
                    WHERE
                        od.`email_id` = '$client_id' AND od.`program_status` IN(2,3) order by od.order_id DESC";
                    
            $data[]=$this->query->getRecords($sql);
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_program_history : End
    }
    
    public function get_diet_names($user_id)
    {
       
        $data = [];

        if(!empty($user_id))
        {

            $sql="SELECT
                    dsl.`diet_name`,
                    dsl.`order_id`
                FROM
                    `diet_session_log` dsl
                LEFT JOIN registries rg ON
                    rg.id = dsl.user_id
                WHERE
                    rg.`email_id` = '$user_id'"; 
         
            $data[]=$this->query->getRecords($sql);

        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        
    }
    
        public function get_wmr_orderid($user_id)
    {
        //  function get_latest_diet_sent : Start

        $data=[];

        if(!empty($user_id))
        {
            $sql="SELECT
                        od.order_id,
                        od.program_name,
                        od.userid,
                        od.program_session,
                        od.prog_duration
                    FROM
                        order_details od
                    /* RIGHT JOIN weight_monitor_record wmr ON
                        od.order_id = wmr.order_id */
                    RIGHT JOIN diet_session_log dsl ON
                        dsl.order_id = od.order_id    
                    WHERE
                        od.userid = '$user_id' AND dsl.is_deleted=0 AND od.program_status IN(1,2,3)
                    GROUP BY
                        od.order_id
                    ORDER BY
                        od.order_id
                    DESC"; 


            $data=$this->query->getRecords($sql);   
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_latest_diet_sent : End
    }
    
    public function get_weight_tracker($mentor_id,$client_id = '',$param='')
    {
        //  function get_first_last_photo : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];

        $user_id = trim($client_id);

        if($param[0]==TRUE)
        {
                           
        }

        if($param[1]==TRUE && !empty($user_id))
        {
            $sql="SELECT                        
                        od.program_name,
                        dsl.session AS `diet_session`,
                        wmr.*
                    FROM
                        weight_monitor_record wmr
                    LEFT OUTER JOIN order_details od ON
                        od.order_id = wmr.order_id
                    LEFT JOIN diet_session_log dsl ON
                        dsl.diet_id = wmr.diet_id
                    WHERE
                        wmr.`user_id` = '$user_id' AND wmr.is_deleted='0'
                    ORDER BY
                        wmr.`posted_date`
                    ASC
                        ";  
            $data[]=$this->query->getRecords($sql);

        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_first_last_photo : End
    }
    
    public function get_ilt_orderid($user_id)
    {
        //  function get_latest_diet_sent : Start

        $data=[];

        if(!empty($user_id))
        {
            $sql="SELECT
                        od.order_id,
                        od.program_name,
                        od.userid,
                        od.program_session,
                        od.prog_duration
                    FROM
                        order_details od
                    RIGHT JOIN inch_loss_tracker ilt ON
                        od.order_id = ilt.order_id
                    WHERE
                        od.userid = '$user_id'
                    GROUP BY
                        od.order_id
                    ORDER BY
                        od.order_id
                    DESC
                        "; 


            $data=$this->query->getRecords($sql);   
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_latest_diet_sent : End
    }
    
    
    public function get_inch_loss_tracker($mentor_id,$client_id = '',$param='')
    {
        //  function get_inch_loss_tracker : Start
        

        /* Array of param[0] will return the count */
        /* Array of param[1] will return the result in array */

        $data = [];

        $user_id = trim($client_id);

        if($param[0]==TRUE)
        {
                           
        }

        if($param[1]==TRUE && !empty($client_id))
        {
          $sql="SELECT
                    CONCAT(rg.first_name,' ', rg.last_name) AS `full_name`,
                    od.program_name,
                    ilt.*,
                    dsl.actual_session
                FROM
                    inch_loss_tracker ilt
                LEFT OUTER JOIN order_details od ON
                    od.order_id = ilt.order_id
                LEFT JOIN registries rg ON
                    ilt.user_id = rg.id
                LEFT JOIN diet_session_log dsl ON
                        ilt.diet_id=dsl.diet_id
                WHERE
                    ilt.`user_id` = '$client_id' AND ilt.is_deleted='0'
                ORDER BY
                    ilt.posted_date,ilt.session 
                ASC
                    ";
                    
            $data[]=$this->query->getRecords($sql);
        }

        return $data;
        unset($sql); /* Always unset the variable at the end */

        //  function get_inch_loss_tracker : End
    }
    
    
    // avinash added this for update pending details 31-01-2022
    
    public function update_lead_pending_deatils($data){
        // echo "<pre>";
        // print_r($data);
        // exit();
        if($data!=""){
            $sql = "UPDATE `lead_management` SET email = '".strtolower($data['email'])."', fname = '".$data['fname']."', height = '".$data['height']."' , weight = '".$data['weight']."' , age = '".$data['age']."' , gender = '".$data['gender']."' , phone = '".$data['phone']."' , stage = '".$data['stage']."' WHERE LOWER(email) = '".strtolower($data['old_email_id_details'])."' and enquiry_from != 'Your BN Health Score Result' ";
            $query=$this->db->query($sql);
            echo ($this->db->last_query());
            if($data['email'] != $data['old_email_id_details'])
            $sql = "UPDATE `lead_action` SET email = '".strtolower($data['email'])."' WHERE LOWER(email) = '".strtolower($data['old_email_id_details'])."' ";
            $query=$this->db->query($sql);
            
            return true;
        }else{
            return false;
        }//if($email_id_details!="" && $lead_source_val!=""){
        
    }
    
    // avinash added this for pending details 31-01-2022
    
    

}