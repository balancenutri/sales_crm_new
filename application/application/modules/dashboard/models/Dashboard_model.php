<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
        // $this->load->library('query');
    }
    
    // AVINASH ADDED START
    // Avinash code for hor and warm notification start
    // function get_hot_warm_pending_notification($c_name,$status){
        
    //     if($status == 'To Engage'){
    //         $where ="AND DATE(lg.created) <= DATE(CURDATE() - INTERVAL 3 DAY)";
    //     }else{
    //         $where ="AND DATE(lg.created) <= DATE(CURDATE() - INTERVAL 7 DAY) AND DATE(lg.created) >= DATE(CURDATE() - INTERVAL 14 DAY)";
    //     }
    //     $sql = "SELECT
    //             lg.email as email,
    //             lg.status as action_status,
    //             lm.fname AS name,
    //          	lm.phone AS phone,
    //             DATE_FORMAT(lg.created, '%D %b %Y') AS key_insight_date
    //         FROM
    //             lead_status_log lg
                
    //         LEFT JOIN lead_management lm ON
    //             lm.email = lg.email
    //         LEFT JOIN lead_action la ON
    //             lm.email = la.email
    //         WHERE
    //             la.assign_to = '$c_name' AND lg.status = '$status' $where  AND lg.email IN (SELECT email from lead_management WHERE status='$status' and Date(created)>=DATE(CURDATE()-INTERVAL 60 DAY)) AND lg.email NOT IN(
    //             SELECT
    //                 email_id
    //             FROM
    //                 order_details
    //                 WHERE DATE(date) >= DATE(CURDATE()- INTERVAL 30 DAY)
    //             GROUP BY
    //                 email_id
    //         )
    //         GROUP BY
    //             lg.email
    //         ORDER BY
    //             lg.created";
    //     $query=$this->db->query($sql);
        
    //     if($query->num_rows()>0)
    //     {
    //         return $query->result_array();
    //     }else{
    //         return 0;
    //     }    
    
    // }
    
     function countPrimarySource($c_name){

       
        
        $sql = "SELECT bn_lead_source.source_group,primary_source, COUNT(primary_source) AS count_source 
        FROM lead_management 
        JOIN bn_lead_source_new as bn_lead_source ON bn_lead_source.source_name = lead_management.primary_source
        WHERE email IN 
        (SELECT email 
        FROM lead_action 
        WHERE DATE(assign_date) = CURDATE() AND assign_to = '$c_name') 
        GROUP BY primary_source HAVING primary_source !='' ORDER BY order_by asc";

        //echo "<pre>"; print_r($sql); exit;
        $count_result=$this->db->query($sql)->result_array();
        
        //  if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){
        //     echo "<pre>"; print_r($count_result); exit;
        // }
       
        $count_result = $this->buildTree($count_result);

        
        if($count_result){
            $count_html = "<ul>";            
            foreach($count_result as $key => $row){
                switch ($key) {
                   // 1=>Prime,2=>Social Media,3=>Healthscore,4=>Paid Adds,5=>Other,6=>Web

                    case '1':
                        $count_html .= "<li>Prime source";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '2':
                        $count_html .= "<li>Social Media";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '3':
                        $count_html .= "<li>Health score";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;


                    case '4':
                        $count_html .= "<li>Paid Adds";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '5':
                        $count_html .= "<li>Other";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '6':
                        $count_html .= "<li>Web";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;
                    
                   
                }
               
            }           
            $count_html .= "</ul>";  
                    
        } 

       
        return $count_html;
    }
    
     function countPrimarySourceAll($c_name){

       
        
        $sql = "SELECT bn_lead_source.source_group,primary_source, COUNT(primary_source) AS count_source 
        FROM lead_management 
        JOIN bn_lead_source_new as bn_lead_source ON bn_lead_source.source_name = lead_management.primary_source
        WHERE email IN 
        (SELECT email 
        FROM lead_action 
        WHERE month(assign_date) = month(CURDATE()) AND assign_to = '$c_name') 
        GROUP BY primary_source HAVING primary_source !='' ORDER BY order_by asc";

        //echo "<pre>"; print_r($sql); exit;
        $count_result=$this->db->query($sql)->result_array();
        
        //  if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){
        //     echo "<pre>"; print_r($count_result); exit;
        // }
       
        $count_result = $this->buildTree($count_result);

        
        if($count_result){
            $count_html = "<ul>";            
            foreach($count_result as $key => $row){
                switch ($key) {
                   // 1=>Prime,2=>Social Media,3=>Healthscore,4=>Paid Adds,5=>Other,6=>Web

                    case '1':
                        $count_html .= "<li><b>Prime source</b>";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '2':
                        $count_html .= "<li><b>Social Media</b>";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '3':
                        $count_html .= "<li><b>Health score</b>";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;


                    case '4':
                        $count_html .= "<li><b>Paid Adds</b>";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '5':
                        $count_html .= "<li><b>Other</b>";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;

                    case '6':
                        $count_html .= "<li><b>Web</b>";    
                        $count_html .= $this->createInternalHTML($count_html,$count_result[$key]);                
                        $count_html .= "</li>"; 
                        break;
                    
                   
                }
               
            }           
            $count_html .= "</ul>";  
                    
        } 

       
        return $count_html;
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
            $count_html .= "<li>".$row['primary_source']. " (".$row['count_source'].")".  "</li>";
        }
        $count_html .= "</ul>";  
        return $count_html;

    }
    
    public function update_lead_misses($c_name){
        $c_name  = $this->session->balance_session['first_name'];
        $sql ="SELECT MAX(lm.fname) as fname, lm.email, lm.phone,
        (SELECT stage FROM lead_management WHERE email = lm.email limit 1) as stage,
        (SELECT gender FROM lead_management WHERE email = lm.email limit 1) as gender,
        (SELECT age FROM lead_management WHERE email = lm.email limit 1) as age,
        (SELECT height FROM lead_management WHERE email = lm.email AND height NOT IN('','.') limit 1) as height,
        (SELECT weight FROM lead_management WHERE email = lm.email AND weight NOT IN('','.') limit 1) as weight,lm.status,( SELECT CASE WHEN key_insight != '' THEN 'Done' ELSE 'Pending' END FROM lead_action WHERE email = lm.email GROUP BY email LIMIT 1 ) AS consultation_status FROM lead_management lm WHERE lm.email IN( SELECT email FROM lead_action WHERE assign_to IN('$c_name') ) AND lm.age IN('.','') and lm.weight IN('.','') AND lm.height IN('.','') and lm.status NOT IN('Completed','Cold') and lm.email NOT IN(select email_id from order_details) and lm.email NOT IN(SELECT email FROM lead_action WHERE key_insight = '') and lm.status IN ('Hot','Warm','To Engage') GROUP BY lm.email order by lm.fname";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        } 
        
    }
    public function get_active_payment_links(){
        $c_id = $this->session->balance_session['admin_id']; 
        $sql = "select * FROM `payment_link` where sales_person_id='$c_id' and is_cancel='0' and DATE(expiry_date)>=CURDATE() and email_id not in (select email_id from order_details where program_status in(1,4) GROUP BY email_id)";
        //phone NOT REGEXP '^(radio|digital|internet)$'
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }    
    }
    public function get_expired_links(){
        $c_id = $this->session->balance_session['admin_id'];
        if(date('D')=='Mon'){
            $date = date('Y-m-d', strtotime(' -2 day'));
        }else{
            $date = date('Y-m-d', strtotime(' -1 day'));
        }
        $sql = "select *,DATE_FORMAT(expiry_date, '%D %b %Y') as expiry_date FROM `payment_link` where sales_person_id='$c_id' and is_cancel='0' and DATE(expiry_date)='$date' and  email_id not in (select email_id from order_details where program_status in(1,4) GROUP BY email_id)";
        //phone NOT REGEXP '^(radio|digital|internet)$'
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }    
    }
    
    public function get_set_goal(){
        $c_id = $this->session->balance_session['admin_id'];
        $sql = "select `sale_goal`, `unit_goal`,  `goal_lead`, `goal_consult` FROM `admin_user` where admin_id='$c_id'";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return 0;
        }    
    }
    
    // // avinash added this for sales manager olr lead
    
    public function all_leads($param){
        if($param==0){
            $date_condition = " DATE(created) >= CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        $sql ="SELECT email,created,status FROM `lead_management` WHERE $date_condition  GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
    public function all_leads_sale($param){
        if($param==0){
            $date_condition = " DATE(created) >= CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        $sql ="SELECT email,created,status FROM `lead_management` WHERE $date_condition  AND email IN (select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id) GROUP BY email";
        
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
     public function today_sale($assign='false'){
        $c_id  = $this->session->balance_session['admin_id'];
        // $sql ="select count(order_id) as unit, sum(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) as amt from order_details where order_type != 'Renewal' AND email_id in (select email from lead_action where LCASE(assign_to) !='' ) AND DATE(date) = CURDATE() order by order_id DESC";
        if($assign =='1'){
            $start_date =date('Y-m-01', strtotime("-1 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));;
        $sql="SELECT COUNT(order_id) AS uni, SUM( CASE WHEN amount_type = 'D' THEN amount * conversion_rate ELSE amount END ) AS amt FROM order_details WHERE sales_person = ".$c_id." AND prog_buy_amt != 0 AND DATE(DATE) >= '$start_date' AND DATE(DATE) <= '$end_date'";
        }elseif($assign =='2'){
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-d');
        $sql="SELECT COUNT(order_id) AS uni, SUM( CASE WHEN amount_type = 'D' THEN amount * conversion_rate ELSE amount END ) AS amt FROM order_details WHERE sales_person = ".$c_id." AND prog_buy_amt != 0 AND DATE(DATE) >= '$start_date' AND DATE(DATE) <= '$end_date'";
        }else{
           $sql="SELECT od.order_id, od.email_id,od.program_name,od.prog_duration,sum(CASE WHEN od.amount_type = 'D' THEN od.prog_buy_amt*od.conversion_rate ELSE prog_buy_amt END) as prog_buy_amt,lm.fname,lm.phone,(SELECT assign_to from lead_action WHERE email = lm.email GROUP BY email LIMIT 1) as assign_to, (select sum(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) as amt from order_details where order_type != 'Renewal' AND email_id in (select email from lead_action where LCASE(assign_to) !='' ) AND DATE(date) = CURDATE() order by order_id DESC) as amount, (select full_name FROM admin_user WHERE admin_id = od.mentor_id) as mentor FROM order_details od LEFT JOIN lead_management lm ON lm.email = od.email_id WHERE od.order_type != 'Renewal' AND prog_buy_amt !=0 AND od.email_id IN( SELECT email FROM lead_action WHERE LCASE(assign_to) != '' ) AND DATE(DATE) = CURDATE() GROUP BY email_id ORDER BY order_id DESC"; 
        }
        $sql =$sql;
        $query=$this->db->query($sql);
        // echo $this->db->last_query();
        // exit;
        // print_r($query->result_array());
        // exit();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    public function stage_all_leads(){
        $sql = "SELECT lm.id,lm.stage,lm.email FROM `lead_management` lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.stage IN ('1','2','3','4') AND lm.stage!='' AND lm.email!='' GROUP BY lm.email";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }  
    }
    
    public function lead_capture_mtd($name){
        
        
        $sql = "SELECT
                    lm.stage,lm.phase,la.assign_from,DATE_FORMAT(la.assign_date, '%m') as curr_month,DATE_FORMAT(la.assign_date, '%d') as date
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE lower(la.assign_to) IN('".strtolower($name)."')
                    AND DATE(la.assign_date) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return 0;
        }
    }
    
    
    public function stagewise_leads($param,$stage){
        if($param==0){
            $date_condition = " DATE(lm.created) >= CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        // $sql = "SELECT lm.id,lm.stage,lm.email FROM `lead_management` lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.stage IN ('$stage') AND lm.stage!='' AND lm.email!='' GROUP BY lm.email";
        $sql ="SELECT lm.id, lm.created, lm.email, lm.phone,lm.stage,lm.status,lm.phase FROM lead_management lm WHERE $date_condition AND lm.stage = '$stage' AND lm.email!='' GROUP by email";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }  
    }
    
    public function stagewise_leads_capture($param,$stage){
        if($param==0){
            $date_condition = " DATE(lm.created) >= CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        // $sql = "SELECT lm.id,lm.stage,lm.email FROM `lead_management` lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.stage IN ('$stage') AND lm.stage!='' AND lm.email!='' GROUP BY lm.email";
        $sql ="SELECT lm.id, lm.created, lm.email, lm.phone,lm.stage,lm.status,lm.phase FROM lead_management lm WHERE $date_condition AND lm.stage = '$stage' AND lm.email!='' AND lm.email IN (select email from lead_action where assign_to !='' group by email) GROUP by email";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }  
    }
    
    
    public function stagewise_leads_missed($param,$stage){
        if($param==0){
            $date_condition = " DATE(lm.created) >= CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        // $sql = "SELECT lm.id,lm.stage,lm.email FROM `lead_management` lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.stage IN ('$stage') AND lm.stage!='' AND lm.email!='' GROUP BY lm.email";
        $sql ="SELECT lm.id, lm.created, lm.email, lm.phone,lm.stage,lm.status,lm.phase FROM lead_management lm WHERE $date_condition AND lm.stage = '$stage' AND lm.email!='' AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email) GROUP by email";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }  
    }
    
    
    
    public function phase_all_leads(){
        $sql = "SELECT lm.id,lm.stage,lm.email FROM `lead_management` lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.phase IN ('0','1','2','3','4') AND lm.stage!='' AND lm.email!='' GROUP BY lm.email";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }  
    }
    
    
    public function phasewise_leads($stage){
        // $sql = "SELECT lm.id,lm.stage,lm.email FROM `lead_management` lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.stage IN ('$stage') AND lm.stage!='' AND lm.email!='' GROUP BY lm.email";
        $sql ="SELECT lm.id, lm.created, lm.email, lm.phone,lm.stage,lm.status,lm.phase FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.phase = '$stage' GROUP by email";
        $query=$this->db->query($sql);
        
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }  
    }
    
    
    public function get_lead_fresh_lead(){
        // $sql ="SELECT email,created,status FROM `lead_management` WHERE DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email NOT IN (select lmolr.email from lead_management lmolr WHERE DATE(lmolr.created) < DATE(CURDATE() - INTERVAL 30 DAY)) AND email NOT IN (SELECT email_id from order_details WHERE ((program_type = 1 AND program_status  IN('3')) OR program_status NOT IN ('1','3') )GROUP BY email_id) GROUP BY email";
        $sql="SELECT email, ( CASE WHEN( SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1 ) < DATE_FORMAT(CURDATE(), '%Y-%m-01') THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `lead_management` lm WHERE ip_address NOT IN ('188.191.21.7','31.13.190.227') AND is_deleted = 0 AND phone IS NOT NULL AND CHAR_LENGTH(phone) > 4 AND email NOT IN('') AND DATE(created) >=DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email NOT IN(SELECT email_id FROM order_details WHERE DATE(date) < DATE_FORMAT(CURDATE(), '%Y-%m-01') group by email_id) GROUP BY email having lead_type ='NEW'";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
    public function get_lead_fresh_lead_sale(){
        $sql ="SELECT email_id, ( CASE WHEN amount_type = 'D' THEN prog_buy_amt * conversion_rate ELSE prog_buy_amt END ) AS amt FROM `order_details` WHERE  DATE(date) >=DATE_FORMAT(CURDATE(), '%Y-%m-01') and order_type='New'";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
    
    public function get_olr_lead_month($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        
        $sql = "SELECT email, ( CASE WHEN( SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1 ) < DATE_FORMAT(CURDATE(), '%Y-%m-01') THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `lead_management` lm WHERE DATE(created) >=DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ip_address NOT IN ('188.191.21.7','31.13.190.227') AND is_deleted = 0 AND phone IS NOT NULL AND CHAR_LENGTH(phone) >  4 AND email NOT IN('') AND email NOT IN(SELECT email_id FROM order_details WHERE DATE(date) < DATE_FORMAT(CURDATE(), '%Y-%m-01') group by email_id) GROUP BY email having lead_type ='OLR'";
        // $sql = "SELECT email,created,status FROM `lead_management` WHERE DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email IN (select lmolr.email from lead_management lmolr WHERE DATE(lmolr.created) < DATE(CURDATE() - INTERVAL 30 DAY)) AND email !='' and email NOT IN(select email_id from order_details GROUP BY email_id) GROUP BY email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function olr_lds_avlble_mnth_sale($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        $sql = "SELECT email, ( CASE WHEN( SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1 ) < DATE_FORMAT(CURDATE(), '%Y-%m-01') THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `lead_management` lm WHERE DATE(created) >=DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ip_address NOT IN ('188.191.21.7','31.13.190.227') AND is_deleted = 0 AND phone IS NOT NULL AND CHAR_LENGTH(phone) > 4 AND email NOT IN('') AND email NOT IN(SELECT email_id FROM order_details WHERE DATE(date) < DATE_FORMAT(CURDATE(), '%Y-%m-01') group by email_id) AND email IN(SELECT email_id FROM order_details WHERE prog_buy_amt > 1 and order_type='New') GROUP BY email having lead_type ='OLR'";
        // $sql = "SELECT email,created,status FROM `lead_management` WHERE DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email IN (select lmolr.email from lead_management lmolr WHERE DATE(lmolr.created) < DATE(CURDATE() - INTERVAL 30 DAY)) AND email !='' and email NOT IN(select email_id from order_details GROUP BY email_id) AND email IN(select email_id from order_details where DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id) GROUP BY email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_omr_lead_month($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        
        $sql = "SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (SELECT email_id from order_details GROUP BY email_id)AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4))
                    AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4'))  GROUP BY lm.email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    
    public function omr_lds_avlble_mnth_sale($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        
        $sql = "SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (SELECT email_id from order_details GROUP BY email_id)AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4))
                    AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND email IN(select email_id from order_details where DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id) GROUP BY lm.email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_basic_stack_month($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        $sql = "SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE $date_condition AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id) GROUP BY lm.email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_basic_stack_capture($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        $sql = "SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE $date_condition AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id) AND lm.email IN (select email from lead_action where assign_to !='' group by email) GROUP BY lm.email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_basic_stack_missed($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        }
        $sql = "SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE $date_condition AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id) AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email) GROUP BY lm.email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    
    
    public function get_basic_stack_month_sale($param){
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
            $sql ="SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE DATE(lm.created) = CURDATE() AND lm.email IN( SELECT email_id FROM order_details WHERE program_type IN('1') AND program_status IN('3', '4')AND DATE(DATE) = CURDATE() AND email_id IN( SELECT email_id FROM order_details WHERE program_type NOT IN('1') AND program_status IN('3', '4') AND DATE(DATE) = CURDATE()) GROUP BY email_id ) GROUP BY lm.email";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
            $sql ="SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN( SELECT email_id FROM order_details WHERE program_type IN('1') AND program_status IN('3', '4')AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email_id IN( SELECT email_id FROM order_details WHERE program_type NOT IN('1') AND program_status IN('3', '4') AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')) GROUP BY email_id ) GROUP BY lm.email";
        }
        // $sql = "SELECT lm.id, lm.created, lm.email, lm.phone FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id) GROUP BY lm.email";
        $sql =$sql;
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    
    public function get_lead_by_status_month($status,$da){
        if($da == 0){
            $where="AND DATE(lm.created) = DATE(CURDATE())";
        }else{
           $where="AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
        }
        $sql ="SELECT lm.fname,lm.email,DATE_FORMAT(lm.created, '%D %b %Y') as created,lm.status,lm.phone,
        (SELECT assign_to FROM lead_action WHERE email=lm.email GROUP BY email limit 1) as assign_to FROM `lead_management` lm WHERE lm.status = '$status' $where GROUP BY email";
        // echo  $sql;
        $query=$this->db->query($sql);
        // print_r($query->result_array());
        // exit();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    public function get_lead_by_status_sale($status){
        $sql ="SELECT email,created,status FROM `lead_management` WHERE status='$status' AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email IN(select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id ) GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
    
    public function substatus_by_status($assign='false'){
        $sql = "SELECT sub_status, count(lm.sub_status) as cnt_sub_status ,lm.email FROM lead_management lm LEFT JOIN lead_action la ON lm.email = la.email WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND la.assign_to ='$assign' AND status in ('hot') AND lm.phase!=0 AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status DESC";
        // $sql = "SELECT sub_status,created,count(lm.sub_status) as cnt_sub_status FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') and lm.email NOT IN( SELECT email_id FROM order_details GROUP BY email_id) AND sub_status !='' AND status in ('hot') AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN( 0, 1, 2, 4 )) AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status desc";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        } 
    }
    
    
    
    public function lead_in_hand($assign='false'){
        $c_name  = $this->session->balance_session['first_name'];
        if($assign =='1'){
            $start_date =date('Y-m-01', strtotime("-1 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));
            $where = "DATE(assign_date) >= '$start_date' AND DATE(assign_date) <= '$end_date' AND assign_to ='$c_name' AND email NOT IN(SELECT email_id FROM order_details WHERE DATE(date) >= '$start_date' AND DATE(date) >= '$end_date')";
        }elseif($assign =='2'){
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-31');
            $where = "DATE(assign_date) BETWEEN '$start_date' AND '$end_date' AND assign_to ='$c_name'";
        }else{
            $where ="DATE(assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND assign_to ='$assign' AND email NOT IN(SELECT email_id FROM order_details WHERE DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01'))";
        }
         
        $sql="SELECT email FROM lead_action WHERE $where  GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
       public function lead_in_hand1($assign=''){
        
        if($assign){
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-31');
            
            $where = "DATE(assign_date) >= '$start_date' AND DATE(assign_date) <= '$end_date' AND assign_to ='$assign' AND email NOT IN(SELECT email_id FROM order_details WHERE DATE(date) >= '$start_date' AND DATE(date) >= '$end_date')";
        }
         
        $sql="SELECT email FROM lead_action WHERE $where  GROUP BY email";
        
        // echo $sql;
        // die;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function sale_unit(){
        $c_name  = $this->session->balance_session['first_name'];
        $start_date =date('Y-m-01');
        $date = strtotime("-30 day");
        //$start_date = date('Y-m-d', $date);
        $end_date =date('Y-m-d');
        $sql = "SELECT email FROM lead_action WHERE DATE(assign_date) BETWEEN '$start_date' AND '$end_date' AND assign_to = '$c_name' AND email IN( SELECT email_id FROM order_details WHERE DATE(DATE) BETWEEN '$start_date' AND '$end_date' AND order_type !='Renewal') GROUP BY email";
        $query=$this->db->query($sql);
        // print_r($query->result_array());
        // exit();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
     public function lead_sale(){
        $c_name  = $this->session->balance_session['first_name'];
        $start_date =date('Y-m-01', strtotime("-1 month"));
        $end_date =date('Y-m-31', strtotime("-1 month"));
        $sql = "SELECT email FROM lead_action WHERE DATE(assign_date) >= '$start_date' AND DATE(assign_date) <= '$end_date' AND assign_to = '$c_name' AND email IN( SELECT email_id FROM order_details WHERE DATE(DATE) >= '$start_date' AND DATE(DATE) <= '$end_date' AND order_type !='Renewal') GROUP BY email";
        $query=$this->db->query($sql);
        // print_r($query->result_array());
        // exit();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    public function const_done($assign='false'){
        $c_name  = $this->session->balance_session['first_name'];
        $start_date =date('Y-m-01', strtotime("-1 month"));
        $end_date =date('Y-m-31', strtotime("-1 month"));
        if($assign =='1'){
            $where = "DATE(key_insight_date) >= '$start_date' AND DATE(key_insight_date) <= '$end_date' AND DATE(la.assign_date) >= '$start_date' AND DATE(la.assign_date) <= '$end_date' AND la.assign_to='$c_name' AND (la.key_insight != '')";
        }elseif($assign =='2'){
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-31');
            $where = "DATE(key_insight_date) BETWEEN '$start_date' AND '$end_date' AND la.key_insight != '' AND la.assign_to='$c_name'";
        }else{
            $where ="DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND la.assign_to='$assign' AND (la.key_insight != '')";
        }
        $sql = "SELECT CONCAT(lm.fname, ' ', lm.lname) as name,lm.phone,la.email,la.key_insight,la.assign_to,la.id FROM
                    lead_action la
               LEFT JOIN lead_management lm ON
                    la.email = lm.email 
                WHERE $where
                GROUP BY
                    email";//
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    public function const_done_sale(){
        $c_name  = $this->session->balance_session['first_name'];
        $start_date =date('Y-m-01', strtotime("-1 month"));
        $end_date =date('Y-m-31', strtotime("-1 month"));
        $where = "DATE(key_insight_date) >= '$start_date' AND DATE(key_insight_date) <= '$end_date' AND DATE(la.assign_date) >= '$start_date' AND DATE(la.assign_date) <= '$end_date' AND la.assign_to='$c_name' AND (la.key_insight != '') AND lm.email IN( SELECT email_id FROM order_details WHERE DATE(DATE) >= '$start_date' AND DATE(DATE) <= '$end_date' AND order_type !='Renewal')";
        // if($assign =='1'){
            
        // }else{
        //     $where ="DATE(key_insight_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND la.assign_to='$assign' AND (la.key_insight != '') AND lm.email IN( SELECT email_id FROM order_details WHERE DATE(DATE) >= '2021-10-01' AND DATE(DATE) <= '2021-10-31' AND order_type !='Renewal')";
        // }
        $sql = "SELECT CONCAT(lm.fname, ' ', lm.lname) as name,lm.phone,la.email,la.key_insight,la.assign_to,la.id FROM
                    lead_action la
               LEFT JOIN lead_management lm ON
                    la.email = lm.email 
                WHERE $where 
                GROUP BY
                    email";//
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    
   public function hot_lead_last($assign=''){
        $c_name  = $this->session->balance_session['first_name'];
        if($assign =='1'){
            $start_date =date('Y-m-01', strtotime("-1 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));
            $where = "DATE(lg.created) >='$start_date' and DATE(lg.created) <='$end_date' AND la.assign_to ='$c_name' ";
        }else{
            $where ="DATE(lg.created) = DATE_FORMAT(CURDATE(), '%Y-%m-01') AND la.assign_to ='$c_name' ";
        }
        $sql="SELECT lg.email, la.assign_to,la.assign_date,lg.status from lead_status_log lg LEFT JOIN lead_action la ON lg.email = la.email WHERE $where AND lg.status ='hot' GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    public function hot_lead_sale(){
        $c_name  = $this->session->balance_session['first_name'];
        $start_date =date('Y-m-01', strtotime("-1 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));
        $sql="SELECT lg.email, la.assign_to,la.assign_date,lg.status from lead_status_log lg LEFT JOIN lead_action la ON lg.email = la.email WHERE DATE(lg.created) >='$start_date' and DATE(lg.created) <='end_date' AND la.assign_to ='$c_name' AND lg.status ='hot' AND lg.email IN( SELECT email_id FROM order_details WHERE DATE(DATE) >= '$start_date' AND DATE(DATE) <= '$end_date' AND order_type !='Renewal') GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    public function status_lead_mdth($assign='false'){
        $sql = "SELECT lm.fname,lm.email,DATE_FORMAT(lm.created, '%D %b %Y') as created,lm.status,lm.phone, (SELECT assign_to FROM lead_action WHERE email=lm.email GROUP BY email limit 1) as assign_to FROM `lead_management` lm LEFT JOIN lead_action la ON la.email = lm.email WHERE lm.status = 'hot' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND la.assign_to='$assign' GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    
    
    
    
    
    public function get_substatus_by_status($status){
        $sql = "SELECT sub_status, count(lm.sub_status) as cnt_sub_status FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND  sub_status !='' AND status in ('$status') AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status desc";
        // $sql = "SELECT sub_status,created,count(lm.sub_status) as cnt_sub_status FROM lead_management lm WHERE lm.email NOT IN( SELECT email_id FROM order_details GROUP BY email_id) AND sub_status !='' AND status in ('$status') AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN( 0, 1, 2, 4 )) AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status desc";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        } 
    }

    public function substatus_by_status_downgrade_90days($substatus,$status){
        // $sql = "SELECT sub_status, count(lm.sub_status) as cnt_sub_status FROM lead_management lm WHERE DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email NOT IN( SELECT email_id FROM order_details GROUP BY email_id) AND sub_status !='' AND status in ('$status') AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN( 0, 1, 2, 4 )) AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status desc";
        $sql = "SELECT email,sub_status, created, STATUS , count(sub_status) as cnt_sub_status FROM lead_management WHERE  sub_status IN $substatus AND STATUS NOT IN $status AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status DESC";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        } 
    }    
    
    public function get_lead_downgrade_90days($substatus,$status){
        $sql ="SELECT email, created, STATUS , sub_status FROM lead_management WHERE STATUS NOT IN $status AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND sub_status IN $substatus GROUP BY email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
    
    
    
    public function hot_down_mdt(){
        $sql ="SELECT lm.status,COUNT(lm.status) as cnt,lm.sub_status, la.assign_to,DATE(lm.created)as created FROM lead_management lm LEFT JOIN lead_action la ON lm.email = la.email WHERE lm.STATUS IN('warm','cold') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-04-01') AND lm.email IN(SELECT email FROM lead_status_log WHERE status ='hot' GROUP BY email) AND lm.email NOT IN (SELECT email_id FROM order_details) AND la.assign_to !='' GROUP BY lm.email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    public function warm_down_to_cold(){
        $sql ="SELECT lm.status,COUNT(lm.status) as cnt,lm.sub_status, la.assign_to,DATE(lm.created)as created FROM lead_management lm LEFT JOIN lead_action la ON lm.email = la.email WHERE lm.STATUS IN('cold') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-04-01') AND lm.email IN(SELECT email FROM lead_status_log WHERE status ='warm' GROUP BY email) AND lm.email NOT IN (SELECT email_id FROM order_details) AND la.assign_to !='' GROUP BY lm.email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    
    
    
    public function get_substatus_by_status_72hrs($substatus,$status){
        $sql = "SELECT count(lm.sub_status) as cnt_sub_status FROM lead_management lm WHERE DATE(lm.created) <= DATE(CURDATE()-INTERVAL 3 DAY) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND sub_status ='$substatus' AND status in ('$status') AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status desc";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        } 
    }
    
    public function get_substatus_by_status_7days($substatus,$status){
        $sql = "SELECT count(lm.sub_status) as cnt_sub_status FROM lead_management lm WHERE DATE(lm.created) <= DATE(CURDATE()-INTERVAL 7 DAY) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND sub_status ='$substatus' AND status in ('$status') AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active') GROUP BY sub_status order by sub_status desc";
        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        } 
    }
    
    
    // avinash added this for sales manager olr lead end

    
    
    
    // avinash added this for sales manager olr lead end

    public function get_total_lead_capture($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function get_link_count_query($c_id){
        $sql = "SELECT id FROM `payment_link` where expiry_date BETWEEN NOW() AND NOW() + INTERVAL 48 HOUR and sales_person_id='$c_id' and is_cancel='0' and email_id not in (select email_id from order_details where program_status in(1,4) GROUP BY email_id)";
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function total_lead_capture_assign_by_me($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    lower(la.assign_from) IN('".strtolower($name)."','') 
                    AND
                    lower(la.assign_to) IN('".strtolower($name)."')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function total_lead_capture_assign_by_other($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    lower(la.assign_from) NOT IN('".strtolower($name)."','') 
                    AND
                    lower(la.assign_to) IN('".strtolower($name)."')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function total_lead_comleted($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    LOWER(la.assign_to) IN('".strtolower($name)."') AND od.email_id != ''
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function total_lead_comleted_assign_me($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    LOWER(la.assign_from) IN('".strtolower($name)."','') AND LOWER(la.assign_to) IN('".strtolower($name)."') AND od.email_id != ''
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function total_lead_comleted_assign_other($name){
        
        $sql = "SELECT
                        lm.id
                    FROM
                        `lead_management` lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    LEFT JOIN lead_status_log ls ON
                        lm.email = ls.email
                    LEFT JOIN order_details od ON
                        lm.email = od.email_id
                    WHERE
                        LOWER(la.assign_from) NOT IN('".strtolower($name)."','') AND LOWER(la.assign_to) IN('".strtolower($name)."') AND lm.email IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                        GROUP BY
                            email_id
                    )
                    GROUP BY
                        lm.email
                    ORDER BY
                        `lm`.`id`
                    DESC ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function total_lead_remaining($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    LOWER(la.assign_to) IN('".strtolower($name)."') AND lm.email NOT IN (SELECT email_id from order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function total_lead_remaining_assign_me($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    LOWER(la.assign_from) IN('".strtolower($name)."','') AND LOWER(la.assign_to) IN('".strtolower($name)."') AND lm.email NOT IN (SELECT email_id from order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function total_lead_remaining_assign_other($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    LOWER(la.assign_from) NOT IN('".strtolower($name)."','') AND LOWER(la.assign_to) IN('".strtolower($name)."') AND lm.email NOT IN (SELECT email_id from order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    
    
    public function total_lead_today_capture_by_me($name){
        
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                	 lower(la.assign_from) IN('".strtolower($name)."')
                	AND lower(la.assign_to) IN('".strtolower($name)."')
                    AND DATE(la.assign_date) = DATE(CURDATE())
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function total_lead_today_capture_by_other($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                	 lower(la.assign_from) NOT IN('".strtolower($name)."','')
                	AND lower(la.assign_to) IN('".strtolower($name)."')
                    AND DATE(la.assign_date) = DATE(CURDATE())
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function total_lead_monthly_capture_by_others($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                	 lower(la.assign_from) NOT IN('".strtolower($name)."','')
                	AND lower(la.assign_to) IN('".strtolower($name)."')
                    AND DATE(la.assign_date) >=DATE_FORMAT(CURDATE(), '%Y-%m-01')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function phase_lead($name='',$phase=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND lm.phase='$phase' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    
    public function phase_lead_complete($name='',$phase=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND lm.phase='$phase' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND od.email_id!=''   
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function Nophase_lead($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND (lm.phase='' OR lm.phase is NULL)  AND (od.email_id='' OR od.email_id is NULL) AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function Nophase_overall_lead($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND (lm.phase='' OR lm.phase is NULL)  AND (od.email_id='' OR od.email_id is NULL)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function phase_overall($name='',$phase=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND lm.phase='$phase'   
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function phase_overall_complete($name='',$phase=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND lm.phase='$phase'  AND od.email_id!=''   
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function phase_overall_not_complete($name='',$phase=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND lm.phase='$phase' AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    
    
    
    public function stage_lead($name='',$stage=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND LCASE(lm.stage)='$stage' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    
    public function stage_overall($name='',$stage=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND LCASE(lm.stage)='$stage'   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    public function stagewise_completed_lead($name=''){
        
        $sql = "SELECT
                    lm.stage,lm.phase
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND DATE(la.assign_date) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() AND lm.email IN(select email_id from order_details where DATE(date) > DATE_SUB(NOW(),INTERVAL 30 DAY) GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return 0;
        }
    }
    
    public function stage_lead_complete($name='',$stage=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND LCASE(lm.stage)='$stage' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND lm.email IN(select email_id from order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function stage_overall_complete($name='',$stage=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND LCASE(lm.stage)='$stage'  AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!=''
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function unconverted_stage_phase($name=''){
        
        $sql = "SELECT
                    lm.status,lm.stage,lm.phase,la.key_insight
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->result_array();
        } else {
            return 0;
        }
    }
    
    public function stage_overall_not_complete($name='',$stage=''){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE lower(la.assign_to) IN('".strtolower($name)."') AND LCASE(lm.stage)='$stage'  AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC
                    ";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    
    public function basic_stack($name='',$stage=''){
        
        if($stage == 7){
            $days_between = 'DATE(od.date) BETWEEN (CURDATE() - INTERVAL 7 DAY) AND CURDATE()';
        }else if($stage == 15){
            $days_between = 'DATE(od.date) BETWEEN (CURDATE() - INTERVAL 15 DAY) AND (CURDATE() - INTERVAL 7 DAY)';
        }else if($stage == 30){
            $days_between = 'DATE(od.date) BETWEEN (CURDATE() - INTERVAL 30 DAY) AND (CURDATE() - INTERVAL 15 DAY)';
        }else if($stage == 90){
            $days_between = 'DATE(od.date) BETWEEN (CURDATE() - INTERVAL 90 DAY) AND (CURDATE() - INTERVAL 30 DAY)';
        }else{
            $days_between = 'DATE(od.date) >= (CURDATE() - INTERVAL 90 DAY) AND';
        }
        
        $sql = "SELECT
                        userid
                    FROM
                        `order_details` od
                    LEFT JOIN registries rg ON
                        od.userid = rg.id
                    LEFT JOIN lead_management lm ON
                        od.email_id = lm.email
                    WHERE
                        od.email_id IN(
                        SELECT
                            email
                        FROM
                            lead_action
                        WHERE
                            LCASE(`assign_to`) = '$name'
                        GROUP BY
                            email
                    ) AND ".$days_between." AND `program_type` = 1 AND lm.email IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                        GROUP BY
                            email_id
                    ) AND lm.email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                        WHERE
                            program_type = '0'
                        GROUP BY
                            email_id
                    )
                    GROUP BY
                        od.email_id";
      
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    

    
    
    
    
    
    public function get_total_lead_capture_by_me_mtd($name){
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                	lower(la.assign_from) IN('".strtolower($name)."','')
                	AND lower(la.assign_to) IN('".strtolower($name)."')
                    AND DATE(la.assign_date) >=DATE_FORMAT(CURDATE(), '%Y-%m-01')
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
        
        $sql = $this->db->query($sql);
        if ($sql->num_rows() > 0) {
            return $sql->num_rows();
        } else {
            return 0;
        }
    }
    public function get_source_wise_conversionNew($month = false, $source = false){
        if($month == 4){//echo 1;
            $start_date =date('Y-04-01');
            $end_date =date('Y-m-d');
            $date_between = "DATE(lm.created)>='$start_date' AND DATE(lm.created) <='$end_date' AND ip_address NOT IN ('188.191.21.7','31.13.190.227') ";
        }else if($month == -1){
             $end_date=date('Y-m-31', strtotime("-1 month"));;
            $start_date =date('Y-m-01', strtotime("-1 month"));
            $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <='$end_date' AND ip_address NOT IN ('188.191.21.7','31.13.190.227') ";
        }else if($month == -3){
            $start_date =date('Y-m-01', strtotime("-3 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));;
            $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <= '$end_date' AND ip_address NOT IN ('188.191.21.7','31.13.190.227') ";
            // $date_between = "DATE(od.date) >= '2021-07-01' AND DATE(od.date) <= '2021-09-30'";
        }else{
            $date_between = "DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')";
        }
        //$sql ="SELECT order_id AS unit, (prog_buy_amt*conversion_rate-wallet_discount) AS amt, MAX(lm.enquiry_from) AS enquiry_from, source_name, source_group, DATE(la.assign_date) as assign_date, DATE(od.date) AS order_date,la.assign_to,od.order_type FROM `lead_management` lm INNER JOIN `lead_action` la ON (lm.email = la.email) LEFT JOIN `order_details` od ON (od.email_id = la.email) LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name) WHERE $date_between  AND Source_group = '$source' GROUP BY lm.email";
        $sql = "SELECT (lead.enquiry_from) AS source_name,source_group,count(lead.enquiry_from) as d FROM (SELECT DISTINCT(lm.email),lm.enquiry_from FROM `lead_management` lm where LENGTH(phone)>4 AND $date_between GROUP BY email) as lead LEFT JOIN `bn_lead_source` ls ON (lead.enquiry_from=ls.source_name) WHERE $date_between  AND source_group = '$source'  GROUP BY lead.enquiry_from";
        // $sql ="SELECT  DATE(la.assign_date) as assign_date, DATE(od.date) AS order_date,la.assign_to FROM `lead_management` lm INNER JOIN `lead_action` la ON (lm.email = la.email) LEFT JOIN `order_details` od ON (od.email_id = la.email) LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name) WHERE $date_between AND Source_group != 0 GROUP BY lm.email";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function get_source_wise_conversion($month = false, $source = false){
        if($month == 4){
            $start_date =date('Y-04-01');
            $end_date =date('Y-m-d');
            $date_between = "DATE(lm.created)>=$start_date AND DATE(lm.created) <='$end_date' AND ip_address NOT IN ('188.191.21.7','31.13.190.227') ";
        }else if($month == -1){
             $end_date=date('Y-m-31', strtotime("-1 month"));;
            $start_date =date('Y-m-01', strtotime("-1 month"));
            $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <='$end_date' AND ip_address NOT IN ('188.191.21.7','31.13.190.227') ";
        }else if($month == -3){
            $start_date =date('Y-m-01', strtotime("-3 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));;
            $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <= '$end_date' AND ip_address NOT IN ('188.191.21.7','31.13.190.227') ";
            // $date_between = "DATE(od.date) >= '2021-07-01' AND DATE(od.date) <= '2021-09-30'";
        }else{
            $date_between = "DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')";
        }
        $sql ="SELECT order_id AS unit, ROUND(prog_buy_amt*conversion_rate-wallet_discount) AS amt, MAX(lm.enquiry_from) AS enquiry_from, source_name, source_group, DATE(la.assign_date) as assign_date, DATE(od.date) AS order_date,la.assign_to,od.order_type FROM `lead_management` lm INNER JOIN `lead_action` la ON (lm.email = la.email) LEFT JOIN `order_details` od ON (od.email_id = la.email) LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name) WHERE $date_between  AND Source_group = '$source' GROUP BY lm.email";
        // $sql ="SELECT  DATE(la.assign_date) as assign_date, DATE(od.date) AS order_date,la.assign_to FROM `lead_management` lm INNER JOIN `lead_action` la ON (lm.email = la.email) LEFT JOIN `order_details` od ON (od.email_id = la.email) LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name) WHERE $date_between AND Source_group != 0 GROUP BY lm.email";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_source_wise_conversion($param,$name = false){
    
    
    public function get_total_lead_assign_conversion_ratio($data=false,$month=false){
            if($month == 4){
            $start_date =date('Y-04-01');
            $end_date =date('Y-m-d');
            // $date_between = "DATE(lm.created)>=$start_date AND DATE(lm.created) <='$end_date'";
        }else if($month == -1){
             $end_date=date('Y-m-31', strtotime("-1 month"));;
            $start_date =date('Y-m-01', strtotime("-1 month"));
            // $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <='$end_date'";
        }else if($month == -3){
            $start_date =date('Y-m-01', strtotime("-3 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));
            // $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <= '$end_date'";
            // $date_between = "DATE(od.date) >= '2021-07-01' AND DATE(od.date) <= '2021-09-30'";
        }else{
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-31');
            // $date_between = "DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')";
        }
        if($data=='lead'){
            $sql="select email from lead_management where CHAR_LENGTH(phone) >  4 AND email NOT IN('') AND DATE(created)>='$start_date' AND DATE(created)<='$end_date' group by email";
        }else if($data=='consultation'){
            $sql="select email from lead_action where DATE(key_insight_date)>= '$start_date' and DATE(key_insight_date)<= '$end_date' AND key_insight!=''  group by email";
        }else if($data=='hot'){
            $sql="SELECT email,status, created FROM lead_status_log WHERE DATE(created)>= '$start_date' AND DATE(created)<= '$end_date' AND (status ='hot' OR email IN (SELECT email FROM lead_management WHERE DATE(created)>='$start_date' AND DATE(created)<= '$end_date' AND status ='hot' ))GROUP BY email";
        }
        
        
        $sql = $sql;
        
        // echo $sql;die;
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_total_lead_assign($param,$name = false){
    
    
    
    public function get_total_lead_assign_conversion_ratio_sale($data=false,$month=false){
          if($month == 4){
            $start_date =date('Y-04-01');
            $end_date =date('Y-m-d');
            // $date_between = "DATE(lm.created)>=$start_date AND DATE(lm.created) <='$end_date'";
        }else if($month == -1){
             $end_date=date('Y-m-31', strtotime("-1 month"));;
            $start_date =date('Y-m-01', strtotime("-1 month"));
            // $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <='$end_date'";
        }else if($month == -3){
            $start_date =date('Y-m-01', strtotime("-3 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));
            // $date_between = "DATE(lm.created) >= '$start_date' AND DATE(lm.created) <= '$end_date'";
            // $date_between = "DATE(od.date) >= '2021-07-01' AND DATE(od.date) <= '2021-09-30'";
        }else{
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-31');
            // $date_between = "DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')";
        }
        if($data=='lead'){
            $sql="select email from lead_management where CHAR_LENGTH(phone) >  4 AND email NOT IN('') AND DATE(created)>='$start_date' AND DATE(created)<='$end_date' AND email IN(SELECT email_id FROM order_details WHERE DATE(date)>='$start_date' AND DATE(date)<='$end_date')  group by email";
        }else if($data=='consultation'){
            $sql="select email from lead_action where DATE(key_insight_date)>= '$start_date' and DATE(key_insight_date)<= '$end_date' AND key_insight!='' AND email IN(SELECT email_id FROM order_details WHERE DATE(date)>='$start_date' AND DATE(date)<='$end_date') group by email";
        }else if($data=='hot'){
            $sql="SELECT email,status, created FROM lead_status_log WHERE DATE(created)>= '$start_date' AND DATE(created)<= '$end_date' AND (status ='hot' OR email IN (SELECT email FROM lead_management WHERE DATE(created)>='$start_date' AND DATE(created)<= '$end_date' AND status ='hot' )) AND email IN(SELECT email_id FROM order_details WHERE DATE(date)>='$start_date' AND DATE(date)<='$end_date') GROUP BY email";
        }
        
        
        $sql = $sql;
        
        // echo $sql;die;
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_total_lead_assign($param,$name = false){

    
    
    
    // AVINASH ADDED END
    
    
    public function get_lead_details_data_query()
    {
        /* function get_lead_details_data_query : starts here */
        // https://www.balancenutrition.in/sales_crm/lead?lead_by=all&search=name&df=2021-03-18&dt=2021-03-19&agf=20&agt=35
        //lead_by => show lead
        //search => search string
        //df  => date from
        //dt   => date to
        //agf  => age from
        //agt => age to
        // echo "<pre>";
        // print_r($get_parameters);
        // exit;
        
        // (
        //                 CASE WHEN lm.gender != '' THEN CONCAT(lm.gender,' | ',lm.age,' yrs') ELSE 'NA'
        //             END
        //         ) as gender,

        $sql= "SELECT
                    lm.id,
                    CONCAT(lm.fname, ' ', lm.lname) AS name,
                    (
                            CASE WHEN lm.gender != '' THEN lm.gender ELSE 'NA'
                        END
                    ) AS gender,
                    (
                        CASE WHEN lm.age != '' THEN CONCAT(lm.age, ' yrs') ELSE 'NA'
                    END
                    ) AS lead_age,
                    lm.email,
                    lm.phone,
                    lm.stage,
                    (
                        CASE WHEN lm.body_mass_index != '' OR lm.body_mass_index IS NOT NULL THEN 'Yes' ELSE 'No'
                    END
                    ) AS bmi,
                    (
                        CASE WHEN LENGTH(lm.phone) > 5 THEN 'Yes' ELSE 'No'
                    END
                    ) AS phone_no,
                    mobile_verified AS verify,
                    DATE_FORMAT(lm.created, '%D %b %Y') AS created_date,
                    la.assign_to,
                    lm.enquiry_from AS lead_source,
                    (
                        SELECT
                            GROUP_CONCAT(enquiry_from)
                        FROM
                            lead_management
                        WHERE
                            email = lm.email
                        ORDER BY
                            id
                        DESC
                    ) AS all_source,
                    lm.status AS lead_status,
                    lm.weight,
                    lm.ideal_weight,
                    lm.body_mass_index,
                    lm.age,
                    lm.overall_health_score,
                    lm.health_category,
                    (
                        CASE WHEN(
                        SELECT
                            DATE(created)
                        FROM
                            lead_management
                        WHERE
                            email = lm.email AND id != lm.id
                        ORDER BY
                            id
                        DESC
                    LIMIT 1
                    ) <(
                        DATE(lm.created) - INTERVAL 30 DAY
                    ) THEN 'OLR' ELSE 'NEW'
                    END
                    ) AS lead_type, CASE WHEN consultation = 1 THEN 'Yes' ELSE 'No'
                    END AS consultation,(
                        SELECT
                            GROUP_CONCAT(health_issue)
                        FROM
                            `bn_app_hs_issue`
                        WHERE
                            health_score_id = lm.id
                    ) AS health_issues
                    FROM
                        `lead_management` lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    WHERE
                        lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email NOT IN(
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

        /* function get_lead_details_data_query : ends here   */
    }

//vikram update
    public function get_lead_capture_count_query($param){
        
        $login_name =$this->session->balance_session['first_name'];  // avinash added this for Gulf country
        if($login_name =='Snigdha'){
            $where_gcc ="AND country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
    
        if($param==0){      
            $sub_query_condition = "lm.created > CURDATE() - INTERVAL 150 DAY AND "; 
            $query_condition = " AND created > CURDATE() - INTERVAL 150 DAY ";
        }elseif($param==1){
            if(date('D')=='Mon'){
                $start_date = date('Y-m-d 19:00:00', strtotime(' -2 day'));
            }else{
                $start_date = date('Y-m-d 19:00:00', strtotime(' -1 day'));
            }
            $sub_query_condition = " DATE(lm.created) > '$start_date' AND ";        
            $query_condition = " AND DATE(created) > '$start_date' ";
        }elseif($param==2){
            $sub_query_condition = "lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";     
            $query_condition = " AND created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
        }
                            
        $sql ="SELECT
                    email
                FROM
                    lead_management
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND email NOT IN(
                    SELECT
                        lm.email
                    FROM
                        lead_management lm,
                        lead_action la
                    WHERE
                        lm.email = la.email AND ".$sub_query_condition." la.assign_to != ''
                    GROUP BY
                        lm.email) AND email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                    ) ".$query_condition." $where_gcc
                GROUP BY
                    email";
        
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    //added by Navin start
     //vikram update
    public function get_lead_capture_stage_count_query($param, $stage_count=false){
    
        if($param==0){      
            $sub_query_condition = "lm.created > CURDATE() - INTERVAL 150 DAY AND "; 
            $query_condition = " AND created > CURDATE() - INTERVAL 150 DAY ";
        }elseif($param==1){
            $sub_query_condition = " DATE(lm.created) = CURDATE() AND ";        
            $query_condition = " AND DATE(created) = CURDATE() ";
        }elseif($param==2){
            $sub_query_condition = "lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";     
            $query_condition = " AND created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
        }
        $whrClause = "";
        if($stage_count!=false){
            switch($stage_count){      
                case 1:      
                    $whrClause = " AND stage = 1 AND enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') ";     
                    break;      
                case 2:      
                    $whrClause = " AND stage = 2 AND enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') ";       
                    break;      
                case 3:      
                    $whrClause = " AND stage = 3 AND enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') ";    
                    break; 
                case 4:      
                    $whrClause = " AND stage = 4 AND enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') ";    
                    break;
                case 5:      
                    $whrClause = " AND enquiry_from NOT IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') ";    
                    break; 
                default:      
                    $whrClause = " AND enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') ";     
            }//switch($stage_count){      
        }else{
            $whrClause = " ";
        }//if($stage_count!=false){
                            
        $sql ="SELECT
                    email
                FROM
                    lead_management
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND email NOT IN(
                    SELECT
                        lm.email
                    FROM
                        lead_management lm,
                        lead_action la
                    WHERE
                        lm.email = la.email AND ".$sub_query_condition." la.assign_to != ''
                    GROUP BY
                        lm.email) AND email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                    ) ".$query_condition.$whrClause."
                GROUP BY
                    email";
        
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }//public function get_lead_capture_stage_count_query($param){
    //added by Navin end
    public function get_lead_capture_stagewise_count_query($param){
    
        if($param==0){
            $where_condition=" AND DATE(created) = CURDATE() ";
        }elseif($param==1){
            $where_condition=" AND created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
        }
        //New Leads
        //echo 
            $sql1=  "SELECT
                    stage
                FROM
                    `lead_management` 
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) ".$where_condition." AND
                    email NOT IN(
                    SELECT
                        lm.email
                    FROM
                        lead_management lm,
                        lead_action la
                    WHERE
                        lm.email = la.email  ".$where_condition." AND la.assign_to != ''
                    GROUP BY
                        lm.email) AND email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                    )
                GROUP BY
                    email";//exit;
        $query=$this->db->query($sql1);
        /*
        
        if($param==0){      
            $sub_query_condition = "lm.created > CURDATE() - INTERVAL 30 DAY AND "; 
            $query_condition = " AND created > CURDATE() - INTERVAL 30 DAY ";
        }elseif($param==1){
            $sub_query_condition = " DATE(lm.created) = CURDATE() AND ";        
            $query_condition = " AND DATE(created) = CURDATE() ";
        }elseif($param==2){
            $sub_query_condition = "lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";     
            $query_condition = " AND created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
        }
                            
        $sql ="SELECT
                    email
                FROM
                    lead_management
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND email NOT IN(
                    SELECT
                        lm.email
                    FROM
                        lead_management lm,
                        lead_action la
                    WHERE
                        lm.email = la.email AND ".$sub_query_condition." la.assign_to != ''
                    GROUP BY
                        lm.email) AND email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                    ) ".$query_condition."
                GROUP BY
                    email";
        
        */
        //OLR
        $sql2=  "SELECT
                    lm.stage
                FROM
                    `lead_management` lm
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) ".$where_condition." AND 
                    email NOT IN(
                    SELECT
                        lmd.email
                    FROM
                        lead_management lmd,
                        lead_action la
                    WHERE
                        lmd.email = la.email  ".$where_condition." AND la.assign_to != ''
                    GROUP BY
                        lmd.email) AND email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                    )
                GROUP BY
                    lm.email";
                
        $query1=$this->db->query($sql2);
        
        $data['new_lead'] = $query->result_array();
        $data['olr']=$query1->result_array();
        //echo "<pre>";print_r($data);exit;
        if($query->num_rows()>0){
            return $data;
        }else{
            return 0;
        }
    }
    
    public function get_omr_lead($param){
        $login_name =$this->session->balance_session['first_name'];    // avinash added this for gulf country
        if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
        
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
        }elseif($param==1){
            $date_condition = " DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)  ";//DATE_FORMAT(CURDATE(), '%Y-%m-01')
        }
        //$date_condition = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
        $sql = "SELECT lm.id,lm.enquiry_from FROM lead_management lm LEFT JOIN lead_action la ON lm.email=la.email WHERE ".$date_condition."
                    AND lm.phone !='' AND LENGTH(lm.phone) > 4 
                    AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4))
                    AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) 
                    AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) $where_gcc
                    group by lm.email";
                    
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_lead_captured($param,$assign){
        $name = $this->session->balance_session['first_name'];
        if($param==0){
            $date_condition = " DATE(la.assign_date) = CURDATE()  ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','') AND ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND ";
            }
        }elseif($param==1){
            $date_condition = " AND la.assign_date >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','')  ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','')  ";
            }
        }
        
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE ".$assign_condition.$date_condition."  
                
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_lead_captured1($param,$name){
        
        if($param==0){
            $date_condition = " DATE(la.assign_date) = CURDATE()  ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','') AND ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND ";
            }
        }elseif($param==1){
            $date_condition = " AND la.assign_date >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','')  ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','')  ";
            }
        }
        
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE ".$assign_condition.$date_condition."  
                
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }

    public function get_lead_captured_total_lead($param,$assign){
        $name = $this->session->balance_session['first_name'];
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
            if($assign==0){
                //$assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','') AND ";
                $assign_condition = "";
            }elseif($assign==1){
                //$assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND ";
                $assign_condition = "";
            }
        }elseif($param==1){
            $date_condition = "  lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
            if($assign==0){
                //$assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','')  ";
                $assign_condition = "";
            }elseif($assign==1){
                //$assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','')  ";
                $assign_condition = "";
            }
        }
        
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE ".$assign_condition.$date_condition."  
                
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    public function get_age_distrubution($param,$assign){
        $name = $this->session->balance_session['first_name'];
        if($param==1){
            //$date_condition = " lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND ";
            $date_condition = " ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','') AND lm.age < '30' AND ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','')  AND lm.age < '30' AND ";
            }
        }
        
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE ".$assign_condition.$date_condition."  
                  NOT EXISTS (select email_id from order_details where lm.email=email_id)
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC";
                //echo $sql;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    public function get_age_distrubution_greater_than($param,$assign){
        $name = $this->session->balance_session['first_name'];
        if($param==0){
            $date_condition = " DATE(lm.created) = CURDATE()  ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN('".strtolower($name)."','') AND lm.age > '30' ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND lm.age > '30' ";
            }
        }elseif($param==1){
            //$date_condition = " AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
            $date_condition = " ";
            if($assign==0){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."' AND  NOT EXISTS (select email_id from order_details where lm.email=email_id) AND lm.age > '30'  ";
            }elseif($assign==1){
                $assign_condition = " LCASE(la.assign_to) ='".strtolower($name)."'  AND NOT EXISTS (select email_id from order_details where lm.email=email_id) AND lm.age > '30' ";
            }
        }
        
        
        $sql = "SELECT
                    lm.id
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE ".$assign_condition.$date_condition."  
                
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
                DESC"; //die;
        $query=$this->db->query($sql);
//  echo $sql;
        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    //Added By Navin
    public function get_status_overall($status=false){
        $name = $this->session->balance_session['first_name'];
        $sql = "SELECT
                    count(lm.id)
                    FROM
                        `lead_management` lm
                    INNER JOIN lead_action la ON
                        lm.email = la.email
                    LEFT JOIN lead_status_log ls ON
                        lm.email = ls.email
                    WHERE
                          LCASE(la.assign_to) ='priyanka' AND lm.status={$status} 
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
            return 0;
        }
    }
    public function get_total_lead_captured(){
        $name = $this->session->balance_session['first_name'];
        /*$sql = "SELECT
                    lm.id,lm.email as lead_email,la.email as lead_assign,od.email_id as order_email,
                    la.assign_to,la.assign_from,la.assign_date as assign_date,od.date as order_date,od.order_type,
                    lm.phase, lm.stage, od.program_type, la.fu_assigned, lm.enquiry_from
                    FROM
                        `lead_management` lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    LEFT JOIN lead_status_log ls ON
                        lm.email = ls.email
                    LEFT JOIN order_details od ON
                        lm.email = od.email_id
                    WHERE
                     lower(la.assign_to) = '".strtolower($name)."'
                     AND lm.email != ''
                    GROUP BY
                        lm.email
                    ORDER BY
                        `lm`.`id`
                DESC";*/
        $sql = "SELECT
                    lm.id,lm.email AS lead_email,la.email AS lead_assign,od.email_id AS order_email,
                    la.assign_to,la.assign_from,la.assign_date AS assign_date,od.date AS order_date,od.order_type,
                    lm.phase, lm.stage, od.program_type, la.fu_assigned, lm.enquiry_from
                FROM
                    `lead_management` lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                LEFT JOIN lead_status_log ls ON
                    lm.email = ls.email
                LEFT JOIN order_details od ON
                    lm.email = od.email_id
                WHERE
                    lower(la.assign_to) = '".strtolower($name)."'
                GROUP BY
                    lm.email
                ORDER BY
                    `lm`.`id`
            DESC";
        //exit;     
//      print_r($sql);
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    public function get_basic_stack(){
        
        $login_name =$this->session->balance_session['first_name'];    // avinash added this for gulf country
        if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
        
        $sql = "SELECT
                    (order_id)
                FROM
                    `order_details` od
                LEFT JOIN registries rg ON
                    od.userid = rg.id  
                LEFT JOIN lead_management lm ON
                    od.email_id = lm.email      
                WHERE
                    DATE(lm.created) >= (CURDATE() - INTERVAL 90 DAY)  AND `program_type` = 1 AND od.email_id != '' AND od.email_id NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE
                        `program_type` = 0
                    GROUP BY
                        od.email_id
                ) AND od.email_id NOT IN(
                    SELECT
                        email
                    FROM
                        lead_action
                    WHERE
                        `assign_to` != ''
                    GROUP BY
                        email
                ) $where_gcc
                GROUP BY
                    od.email_id";
                    
        $query=$this->db->query($sql);
                    
        if($query->num_rows()>0){
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    //Todays Task Query for calender:
    public function get_task_calender($param){
        
        if($param==0){
            $date_condition = " AND DATE(start_date)=CURDATE() ";
        }elseif($param==1){
            $monday = strtotime("last monday");
            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
            $this_week_sd = date("Y-m-d",$monday);
            $this_week_ed = date("Y-m-d",$sunday);
            
            $date_condition = " AND DATE(start_date) BETWEEN '$this_week_sd' AND '$this_week_ed' ";
        }else{
            $date_condition = " ";
        }
        
        $c_id = $this->session->balance_session['admin_id'];
        /*CASE WHEN
                    tm.email_id != '' THEN CONCAT(
                        rg.first_name,
                        ' ',
                        rg.last_name,
                        '<br>(',
                        rg.phone,
                        ')'
                    ) ELSE tm.task_name
                END AS task_name,*/
        $sql = "SELECT tm.task_name,
                tm.email_id,
                tm.start_date,
                tm.end_date,
                tm.type,
                CONCAT(rg.first_name, ' ', rg.last_name) AS NAME,
                (select phone from lead_management where email= tm.email_id limit 1) as phone
                FROM
                    `task_master` tm
                LEFT JOIN registries rg ON
                    tm.email_id = rg.email_id
                WHERE
                    created_by = '$c_id'  $date_condition
                ORDER BY
                    tm.`start_date` 
                ASC";
                
                // echo $sql;exit;
                    
        $query=$this->db->query($sql);
                    
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    
    public function get_basic_stack_completed(){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                    email,
                    (
                    SELECT
                        DATE
                    FROM
                        order_details
                    WHERE
                        email_id = email
                    GROUP BY
                        email_id
                ) AS DATE
                FROM
                    lead_action
                WHERE
                    assign_to = '$name' AND email IN(
                    SELECT
                        email_id
                    FROM
                        `order_details`
                    WHERE
                        `program_type` = 1 AND email_id != '' AND email_id NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                        WHERE
                            `program_type` = 0
                        GROUP BY
                            email_id
                    ) AND DATE(date) >(CURDATE() - INTERVAL 90 DAY)
                GROUP BY
                    email_id)";
                    
        $query=$this->db->query($sql);
                    
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    // FU  done today | mtd
    /*public function get_fu_done($param){
        $name = $this->session->balance_session['first_name'];
        if($param==0){
            $date_condition = " DATE(fu_date)=CURDATE() AND  ";
        }elseif($param==1){
            $date_condition = " DATE(fu_date) >=  DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
        }
        
        $sql = "SELECT
                    la.id
                FROM
                    lead_action la
                WHERE ".$date_condition." 
                (assign_to='$name' OR fu_assigned='$name')
                GROUP BY
                    email";
                    
        // echo $sql;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    */
     public function get_fu_done($param='',$assign=''){
        $name = $this->session->balance_session['first_name'];
        if($assign == 0){
            $where ="(assign_to !='' OR fu_assigned !='')";
        }else{
            $where="(assign_to='$name' OR fu_assigned='$name')";
        }
        if($param==0){
            $date_condition = " DATE(fu_date)=CURDATE() AND  ";
        }elseif($param==1){
            $date_condition = " DATE(fu_date) >=  DATE_FORMAT(CURDATE(), '%Y-%m-01') AND  ";//
        }
        
        $sql = "SELECT
                    CONCAT(lm.fname, ' ', lm.lname) as name,
                    lm.phone,
                    la.email,
                    la.fu_note,
                    la.assign_to,
                    la.id
                FROM
                    lead_action la
               LEFT JOIN lead_management lm ON
                    la.email = lm.email 
                WHERE ".$date_condition." 
                ".$where."
                
                GROUP BY
                    email";
                    
        // echo $sql;
        $query=$this->db->query($sql);
        // print_r($query->result_array());
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
   
   //consultation done
    /*public function get_consultation_done($param){
        $name = $this->session->balance_session['first_name'];
        if($param==0){
            $date_condition = " DATE(key_insight_date)=CURDATE() AND  ";
        }elseif($param==1){
            $date_condition = " DATE(key_insight_date) >=  DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
        }
        //$date_condition = " DATE(key_insight_date) >=  DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
        $sql = "SELECT
                    la.id
                FROM
                    lead_action la
                WHERE ".$date_condition." 
                LCASE(assign_to)='".strtolower($name)."'
                GROUP BY
                    email";
        //echo $sql;exit;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    AND
                la.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                )
    */
    public function get_consultation_done($param='',$assign=''){
        $name = $this->session->balance_session['first_name'];
        if($assign == 0){
            $where ="assign_to !=''";
        }else{
            $where="assign_to='$name'";
        }
        if($param==0){
            $date_condition = " DATE(key_insight_date)=CURDATE() AND  ";
        }elseif($param==1){
            // $date_condition = " DATE(key_insight_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";//
            $date_condition = " DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
        }elseif($param==2){
            $date_condition = " DATE(key_insight_date) != '0000-00-00' AND ";
        }
        
        $sql = "SELECT
                    CONCAT(lm.fname, ' ', lm.lname) as name,
                    lm.phone,
                    la.email,
                    la.key_insight,
                    la.assign_to,
                    la.id
                FROM
                    lead_action la
               LEFT JOIN lead_management lm ON
                    la.email = lm.email 
                WHERE ".$date_condition." 
                ".$where."
                AND (la.key_insight != '')
                GROUP BY
                    email";//
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//Action assigned done
    
    public function get_consultation_done1($param='',$name=''){
        
      
            $where="assign_to='$name'";
       
        if($param==0){
            $date_condition = " DATE(key_insight_date)=CURDATE() AND  ";
        }elseif($param==1){
            // $date_condition = " DATE(key_insight_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";//
            $date_condition = " DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
        }elseif($param==2){
            $date_condition = " DATE(key_insight_date) != '0000-00-00' AND ";
        }
        
        $sql = "SELECT
                    CONCAT(lm.fname, ' ', lm.lname) as name,
                    lm.phone,
                    la.email,
                    la.key_insight,
                    la.assign_to,
                    la.id
                FROM
                    lead_action la
               LEFT JOIN lead_management lm ON
                    la.email = lm.email 
                WHERE ".$date_condition." 
                ".$where."
                AND (la.key_insight != '')
                GROUP BY
                    email";//
                    
                    // echo $sql;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//Action assigned done
    
    public function get_action_done($param,$assign){
        $name = $this->session->balance_session['first_name'];
        if($assign == 0){
            $where ="LCASE(fu_assigned) !=''";
        }else{
            $where="LCASE(fu_assigned) ='".strtolower($name)."'";
        }
        if($param==0){
            $date_condition = " DATE(fu_date)=CURDATE() AND  ";
        }elseif($param==1){
            $date_condition = " DATE(fu_date) >=  DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";//
        }
        
        $sql = "SELECT
                    CONCAT(lm.fname, ' ', lm.lname) as name,
                    lm.phone,
                    la.email,
                    la.key_insight,
                    la.fu_assigned,
                    la.assign_from,
                    la.action_type,
                    la.id
                FROM
                    lead_action la
               LEFT JOIN lead_management lm ON
                    la.email = lm.email 
                WHERE ".$date_condition." 
                 ".$where."
                GROUP BY
                    email";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }

    //Added By Navin Start
    public function get_consultation_unconverted($params=false){
        $name = $this->session->balance_session['first_name'];
        $sql = "SELECT
                  MAX(lm.id) as id
                  FROM
                      `lead_management` lm
                  LEFT JOIN lead_action la ON
                      lm.email = la.email
                  LEFT JOIN lead_status_log ls ON
                      lm.email = ls.email
                  WHERE
                        LCASE(la.assign_to) = '".strtolower($name)."' 
                        AND (la.key_insight != '' OR la.key_insight IS NOT NULL)
                        AND lm.email NOT IN ( select email_id from order_details where email_id = lm.email ) 
                        AND DATE(key_insight_date) != '0000-00-00'
                        AND  1
                  GROUP BY
                      lm.email
                  ORDER BY
                      `lm`.`id`
              DESC";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    //Added By Navin End
    
    
    // avinash comment this
    //status wise leads
    public function get_lead_by_status(){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                    status,count(lm.status) as c
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE la.assign_to='$name'
                    
                    AND lm.email NOT IN( SELECT email_id FROM order_details WHERE program_status NOT IN(0,1,2,4) GROUP BY email_id) 
                    AND status in (SELECT status_name FROM `bn_lead_status` where new_crm='1') 
                    AND lm.email NOT IN(SELECT email_id
                          FROM   order_details
                          WHERE  program_status IN( 0, 1, 2, 4 ))
                    AND lm.phone NOT IN(SELECT phone
                              FROM   registries
                              WHERE  user_status = 'Active')
                GROUP BY lm.status";//AND lm.created > CURDATE() - INTERVAL 30 DAY 
                    
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }
    public function get_lead_by_sub_status($status){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                      status, sub_status, count(lm.sub_status) as cnt_sub_status
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE la.assign_to='$name'
                    
                    AND lm.email NOT IN( SELECT email_id FROM order_details GROUP BY email_id) 
                    AND status in ('{$status}') 
                    AND lm.email NOT IN(SELECT email_id
                           FROM   order_details
                           WHERE  program_status IN( 0, 1, 2, 4 ))
                    AND lm.phone NOT IN(SELECT phone
                               FROM   registries
                               WHERE  user_status = 'Active')
                  GROUP BY sub_status order by sub_status desc";
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }
    
    
    
    public function get_lead_by_status_overall($status){
        $name = $this->session->balance_session['first_name'];
        $date = date('Y-m-d');
        $sql = "SELECT
                    COUNT(lm.status) AS c
                FROM
                    lead_management lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE
                    la.assign_to = '$name' AND lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE
                        program_status NOT IN(0, 1, 2, 4)
                    GROUP BY
                        email_id
                ) AND
                STATUS
                    IN('$status')  AND lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE
                        program_status IN(0, 1, 2, 4)
                ) AND lm.phone NOT IN(
                    SELECT
                        phone
                    FROM
                        registries
                    WHERE
                        user_status = 'Active'
                )
                GROUP BY
                    lm.email";
                // AND lm.created > CURDATE() - INTERVAL 30 DAY, AND lm.email NOT IN( SELECT email_id FROM order_details WHERE program_status NOT IN(0,1,2,4) GROUP BY email_id) 
                //     AND status in (SELECT status_name FROM `bn_lead_status` where new_crm='1')
                // AND DATE(lm.created) >=DATE_FORMAT(CURDATE(), '%Y-%m-01')
                //     AND lm.email NOT IN(SELECT email_id
                //           FROM   order_details
                //           WHERE  program_status IN( 0, 1, 2, 4 ))
                //     AND lm.phone NOT IN(SELECT phone
                //               FROM   registries
                //               WHERE  user_status = 'Active')
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    //status wise leads
    
    
    public function get_lead_by_status_mdth($status){
        $name = $this->session->balance_session['first_name'];
        $date = date('Y-m-d');
        $sql = "SELECT
                    lm.status AS c
                FROM
                    lead_management lm
                LEFT JOIN lead_action la ON
                    lm.email = la.email
                WHERE
                    la.assign_to = '$name' AND lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE
                        program_status NOT IN(0, 1, 2, 4)
                    GROUP BY
                        email_id
                ) AND
                STATUS
                    IN('$status') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE
                        program_status IN(0, 1, 2, 4)
                ) AND lm.phone NOT IN(
                    SELECT
                        phone
                    FROM
                        registries
                    WHERE
                        user_status = 'Active'
                )
                GROUP BY
                    lm.email";
                // AND lm.created > CURDATE() - INTERVAL 30 DAY, AND lm.email NOT IN( SELECT email_id FROM order_details WHERE program_status NOT IN(0,1,2,4) GROUP BY email_id) 
                //     AND status in (SELECT status_name FROM `bn_lead_status` where new_crm='1')
                // AND DATE(lm.created) >=DATE_FORMAT(CURDATE(), '%Y-%m-01')
                //     AND lm.email NOT IN(SELECT email_id
                //           FROM   order_details
                //           WHERE  program_status IN( 0, 1, 2, 4 ))
                //     AND lm.phone NOT IN(SELECT phone
                //               FROM   registries
                //               WHERE  user_status = 'Active')
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    //status wise leads
    
    
    
    
    
    public function get_lead_by_status_completed(){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                    status,count(DISTINCT(lm.email)) as c
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE la.assign_to='$name'
                    AND lm.email IN( SELECT email_id FROM order_details WHERE program_status NOT IN(0,1,2,4) GROUP BY email_id) 
                    AND status in (SELECT status_name FROM `bn_lead_status` where new_crm='1') 
                    AND lm.email IN(SELECT email_id
                           FROM   order_details
                           WHERE  program_status IN( 0, 1, 2, 4 ))
                    AND lm.phone NOT IN(SELECT phone
                               FROM   registries
                               WHERE  user_status = 'Active')
                GROUP BY lm.status";//AND lm.created > CURDATE() - INTERVAL 30 DAY 
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }
    
    /*public function get_lead_by_sub_status($status){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                      status, MAX(sub_status), count(lm.sub_status) as cnt_sub_status
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE la.assign_to='$name'
                    AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status NOT IN(0,1,2,4) GROUP BY email_id) 
                    AND status in ('{$status}') 
                    AND lm.email NOT IN(SELECT email_id
                           FROM   order_details
                           WHERE  program_status IN( 0, 1, 2, 4 ))
                    AND lm.phone NOT IN(SELECT phone
                               FROM   registries
                               WHERE  user_status = 'Active')
                  GROUP BY sub_status order by sub_status desc";//AND lm.created > CURDATE() - INTERVAL 30 DAY 
        $query=$this->db->query($sql);//AND DATE(lm.created) >=  DATE_FORMAT(CURDATE(), '%Y-%m-01')
                    

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }*/
    //stage wise leads
    public function get_lead_by_stage($val){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                    lm.stage
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE LCASE(la.assign_to)='".strtolower($name)."'
                AND stage = '".$val."'
                AND lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE program_status IN(0,1,2,4)
                ) AND lm.phone NOT IN(
                    SELECT
                        mobile_no1
                    FROM
                        billing_details bl,order_details od
                    WHERE bl.email_id=od.email_id and program_status IN(0,1,2,4)
                ) AND lm.phone NOT IN(
                    SELECT
                        phone
                    FROM
                        registries
                    WHERE user_status='Active'
                )
                GROUP BY lm.email";//AND lm.created > CURDATE() - INTERVAL 30 DAY
                
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    public function get_lead_by_phase($val){
        $name = $this->session->balance_session['first_name'];
        
        $sql = "SELECT
                    lm.phase
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE LCASE(la.assign_to)='".strtolower($name)."'
                AND lm.phase = '".$val."'
                AND lm.email NOT IN(
                    SELECT
                        email_id
                    FROM
                        order_details
                    WHERE program_status IN(0,1,2,4)
                ) AND lm.phone NOT IN(
                    SELECT
                        mobile_no1
                    FROM
                        billing_details bl,order_details od
                    WHERE bl.email_id=od.email_id and program_status IN(0,1,2,4)
                ) AND lm.phone NOT IN(
                    SELECT
                        phone
                    FROM
                        registries
                    WHERE user_status='Active'
                )
                GROUP BY lm.email";//AND lm.created > CURDATE() - INTERVAL 30 DAY 
                
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    public function get_query_count_query($param){
        $assigned_id = $this->session->balance_session['admin_id'];
        if($param == 0){
            $where = "
                    msg_type = 0 AND read_status = 0 AND counsellor_id !='' ";
        }else{
            $where = "
                    msg_type = 0 AND read_status = 0 AND counsellor_id IN(
                        $assigned_id,
                        0
                    )";
        }
        
        $sql = "SELECT
                    id
                FROM
                    `lead_enquiry`
                WHERE ".$where."
                    
                GROUP BY
                    user_id";
                    
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    /*public function get_calls_scheduled_count_query(){
        $assigned_id = $this->session->balance_session['admin_id'];
        $sql = "SELECT
                    id
                FROM
                    `bn_consultation_call_booking`
                WHERE
                    call_status = 'pending' AND call_date > CURDATE() AND counsellor_id = $assigned_id";
                    
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }*/
    
    public function get_fus_count_query(){
        $assign_name  = $this->session->balance_session['first_name'];
        $sql = "SELECT
                    *
                FROM
                    `lead_action`
                WHERE
                    DATE(reminder_dt) = CURDATE() AND fu_assigned = '$assign_name'";
                    
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_reminders_set_count_query(){
        $c_id  = $this->session->balance_session['admin_id'];
        $sql = "SELECT
                    *
                FROM
                    `mentor_reminders`
                WHERE
                    mentor_id = '$c_id' AND reminder_date = CURDATE()";
                    
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            // return $query->result_array();
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function get_previous_month(){
        $c_name  = $this->session->balance_session['first_name'];
        $start_date = date('Y')."-".(date('m')-1)."-01";
        $end_date = date('Y')."-".(date('m')-1)."-".date('d');
        
        $sql = "SELECT id,key_insight_date,key_insight FROM `lead_action` where assign_to = '".$c_name."' and assign_date between '".$start_date."' AND '".$end_date."'";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
    public function get_payment_link_query($type=false,$c_id=false){
        if($type==2){
            $where = " DATE(expiry_date)>=CURDATE() and ";
            
        }elseif($type==3){
            $where = " DATE(expiry_date)=DATE_ADD(CURDATE(), INTERVAL 1 DAY) and ";
            
        }elseif($type==4){
            $where = " DATE(expiry_date)=SUBDATE(CURDATE(),1) and ";
            
        }else{
            $where = " expiry_date BETWEEN NOW() AND NOW() + INTERVAL 48 HOUR and ";
        }
        $sql = "SELECT *,CONCAT(program_name,' ', program_duration, ' amount Rs.',amount) as program_detail,
        CASE
            WHEN DATE(expiry_date) = CURDATE() THEN '<b>Today</b>'
            WHEN DATE(expiry_date) > NOW() + INTERVAL 48 HOUR THEN DATE_FORMAT(expiry_date, '%D %b %Y')
            ELSE 'Tomorrow'
        END as expiry_date,
        DATE_FORMAT(expiry_date, '%D %b %Y') as expiry_date2 FROM `payment_link` where ".$where." sales_person_id='$c_id' and is_cancel='0' and email_id not in ( select email_id from order_details where program_status in(1,4) GROUP BY email_id) order by expiry_date desc ";
        $query=$this->db->query($sql);

        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function get_previous_month_sale(){
        $c_name  = $this->session->balance_session['admin_id'];
        $start_date = date('Y')."-".(date('m')-1)."-01";
        $end_date = date('Y')."-".(date('m')-1)."-".date('d');
        $sql = "SELECT order_id,prog_buy_amt,email_id,sales_person FROM `order_details` where DATE(date) BETWEEN '".$start_date."' AND '".$end_date."' AND sales_person='".$c_name."'";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
    public function get_reminder_schedule($c_id){
        
        $result = [];
        if($c_id){
            $sql = "SELECT
                        email_id,
                        (select CONCAT(lm.fname, ' ', lm.lname) as name from lead_management lm where lm.email=email_id LIMIT 1) as name,
                        (select lm.phone from lead_management lm where lm.email=email_id LIMIT 1) as phone,
                        task_name,
                        description AS reminder_text,
                        remind_me,
                        start_date
                    FROM
                        task_master
                    WHERE
                        CAST(start_date AS DATE) = CURDATE() AND email_id NOT IN (SELECT email_id FROM `order_details` where program_status=1 GROUP BY email_id) AND created_by = '$c_id'";
            
            $result = $this->db->query($sql)->result_array();
        }
        return $result;
        
    }
    
    public function get_call_reminder_schedule($c_id){
        
        $result = [];
        if($c_id){
            $sql = "SELECT
                        bccb.id,
                        lm.email as email_id,
                        lm.phone,
                        (CASE WHEN lm.fname!='' THEN CONCAT(lm.fname, ' ', lm.lname) ELSE lm.name END ) AS name,
                        bccb.previous_status,
                        bccb.call_status,
                        bccb.call_date,
                        bccb.time_slot,
                        bccb.source
                    FROM
                        bn_consultation_call_booking bccb
                    LEFT JOIN lead_management lm ON
                        lm.id = bccb.lead_id
                    WHERE
                        bccb.call_date = CURDATE() AND counsellor_id = '$c_id'";
            
            $result = $this->db->query($sql)->result_array();
        }
        return $result;
        
    }
    
    public function get_today_fus_data_query($type=false,$c_name=false){
        if($type=='0'){
             $where_condition="CASE WHEN assign_to != '' THEN 'Set by you' WHEN fu_assigned != '' THEN CONCAT('Assigend by ', assign_to) ELSE 'NA'";
              $where ="1";
            
        }else{
            $where_condition="CASE WHEN assign_to = '$c_name' THEN 'Set by you' WHEN fu_assigned = '$c_name' THEN CONCAT('Assigend by ', assign_to) ELSE 'NA'";
            $where ="assign_to = '$c_name' OR fu_assigned = '$c_name'";
        }
        $sql = "SELECT
                    CONCAT(lm.fname, ' ', lm.lname) as name,
                    lm.phone,
                    la.email,
                    la.key_insight,
                    la.fu_note,
                    DATE_FORMAT(la.reminder_dt, '%l : %i %p') as reminder_dt,
                    la.followup_from,
                    la.assign_to,
                    ".$where_condition."
                END AS action_status
                FROM
                    lead_action la
                LEFT JOIN lead_management lm ON
                    lm.email = la.email
                WHERE
                    (DATE(reminder_dt) = CURDATE()) 
                    AND
                        DATE(fu_date) < DATE(reminder_dt)
                    AND(
                        ".$where."
                    )
                    AND la.email NOT IN(
                            SELECT
                                email_id
                            FROM
                                order_details
                            WHERE program_status IN(0,1,2,4)
                        ) AND lm.phone NOT IN(
                            SELECT
                                mobile_no1
                            FROM
                                billing_details bl,order_details od
                            WHERE bl.email_id=od.email_id and program_status IN(0,1,2,4)
                        ) AND lm.phone NOT IN(
                            SELECT
                                phone
                            FROM
                                registries
                            WHERE user_status='Active'
                        )
                GROUP BY
                    lm.email";
                    
        $query=$this->db->query($sql);
        
        

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    public function get_today_fus_missed_data_query($c_name=''){
        if($c_name==''){
            $where ="lm.email = la.email";
        }else{
            $where ="lm.email = la.email AND(
                        fu_assigned = '$c_name' OR assign_to = '$c_name'
                    )";
        }
        $sql = "SELECT
                    lm.fname,
                    lm.phone,
                    la.email,
                    la.key_insight,
                    la.assign_to,
                    fu_note,
                    reminder_dt
                FROM
                    `lead_action` la,
                    lead_management lm
                WHERE $where AND fu_note = ''
                     AND fu_date < reminder_dt AND DATE(reminder_dt) BETWEEN(CURDATE() - INTERVAL 7 DAY) AND(CURDATE() - INTERVAL 1 DAY)
                    AND la.email NOT IN(
                            SELECT
                                email_id
                            FROM
                                order_details
                            WHERE program_status IN(0,1,2,4)
                        ) AND lm.phone NOT IN(
                            SELECT
                                mobile_no1
                            FROM
                                billing_details bl,order_details od
                            WHERE bl.email_id=od.email_id and program_status IN(0,1,2,4)
                        ) AND lm.phone NOT IN(
                            SELECT
                                phone
                            FROM
                                registries
                            WHERE user_status='Active'
                        )
                GROUP BY
                    la.email
                ORDER BY
                    la.`id`
                DESC";
                    
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    
    public function get_today_consultation_calls_data_query($c_id=''){ 
        
        if($c_id==0){
             $where="AND 1";
        }else{
            $where="AND counsellor_id = '$c_id'";
        }
        
        // $sql =  "SELECT
        //             cb.id as id,
        //             CONCAT(lm.fname, ' ', lm.lname) AS name,
        //             lm.email as email_id,
        //             lm.phone,
        //             (select key_insight from lead_action where email = lm.email order by email limit 1) as key_insight,
        //             (select assign_to from lead_action where email = lm.email order by email limit 1) as assign_to,
        //             DATE_FORMAT(call_date, '%D %b %Y') as call_date,
        //             cb.call_status,
        //             time_format(cb.time_slot,'%h:%i:%p') as time_slot
        //         FROM
        //             `bn_consultation_call_booking` cb
        //         LEFT JOIN lead_management lm ON
        //             cb.lead_id = lm.id
        //         WHERE
        //             call_date = CURDATE() AND call_status IN('pending', 'reschedule') AND call_type='0' ".$where."
        //             AND lm.email NOT IN(
        //                     SELECT
        //                         email_id
        //                     FROM
        //                         order_details
        //                     WHERE program_status IN(0,1,2,4)
        //                 ) AND lm.phone NOT IN(
        //                     SELECT
        //                         mobile_no1
        //                     FROM
        //                         billing_details bl,order_details od
        //                     WHERE bl.email_id=od.email_id and program_status IN(0,1,2,4)
        //                 ) AND lm.phone NOT IN(
        //                     SELECT
        //                         phone
        //                     FROM
        //                         registries
        //                     WHERE user_status='Active'
        //                 )
        //         ";
                    $sql="SELECT cb.id AS id, CONCAT(lm.fname, ' ', lm.lname) AS name, lm.email AS email_id, lm.phone , ( SELECT key_insight FROM lead_action WHERE email = lm.email ORDER BY email LIMIT 1 ) AS key_insight,( SELECT assign_to FROM lead_action WHERE email = lm.email ORDER BY email LIMIT 1 ) AS assign_to, DATE_FORMAT(call_date, '%D %b %Y') AS call_date, cb.call_status, TIME_FORMAT(cb.time_slot, '%h:%i:%p') AS time_slot FROM `bn_consultation_call_booking` cb LEFT JOIN lead_management lm ON cb.lead_id = lm.id WHERE call_date = CURDATE() AND call_status IN('pending', 'reschedule') AND call_type = '0' $where";
                    
                    // echo $sql;
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    
    public function get_today_calls_miss_data_query($c_id=''){
        error_reporting(0);
        $c_name  = strtolower($this->session->balance_session['first_name']);
        if($c_id==''){
            $where ="AND 1";
        }else{
            $where ="AND counsellor_id = '$c_id'";
        }
        $sql1 =  "SELECT
                    cb.id as id,
                    CONCAT(lm.fname, ' ', lm.lname) AS name,
                    lm.email as email_id,
                    lm.phone,
                    DATE_FORMAT(call_date, '%D %b %Y') as call_date,
                    cb.call_status,
                    time_format(cb.time_slot,'%h:%i:%p') AS time_slot,
                    (SELECT assign_to FROM lead_action WHERE email = lm.email GROUP BY email LIMIT 1) as assign_to
                FROM
                    `bn_consultation_call_booking` cb
                LEFT JOIN lead_management lm ON
                    cb.lead_id = lm.id
                WHERE
                    call_date < DATE(CURDATE() - INTERVAL 1 DAY) AND call_status IN('pending', 'reschedule') AND call_type=0  AND DATE(call_date)>= DATE(CURDATE() - INTERVAL 7 DAY) $where
                    AND lm.email NOT IN(
                            SELECT
                                email_id
                            FROM
                                order_details
                            WHERE program_status IN(0,1,2,4) 
                        ) AND lm.phone NOT IN(
                            SELECT
                                mobile_no1
                            FROM
                                billing_details bl,order_details od
                            WHERE bl.email_id=od.email_id and program_status IN(0,1,2,4)
                        ) AND lm.phone NOT IN(
                            SELECT
                                phone
                            FROM
                                registries
                            WHERE user_status='Active'
                        )";
                    
            $query = $this->db->query($sql1);
        
        // echo $sql1;
        // die;
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    public function today_task(){
        $c_name  = $this->session->balance_session['first_name'];
        $c_id  = $this->session->balance_session['admin_id'];
        //$sql =  "SELECT * FROM `task_master` WHERE created_by=$c_id AND DATE(start_date)=CURDATE()";
        $sql =  "SELECT CONCAT(task_name, ' (',email_id,') ') as task_name,DATE_FORMAT(start_date,'%H:%i') as start_date,DATE_FORMAT(end_date,'%H:%i') as end_date FROM `task_master` WHERE created_by=$c_id AND DATE(start_date)=CURDATE() AND email_id not in (SELECT email_id FROM `order_details` where program_status in (1,4) GROUP BY email_id)";
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }
    public function phase($phase=false){
        $c_name  = $this->session->balance_session['first_name'];
        if($phase==5){
            $sql =  "SELECT lm.id from `lead_management` as lm 
                    LEFT JOIN lead_action la ON lm.email=la.email 
                    WHERE 
                    (phase='' OR phase is NULL)
                    AND LCASE(la.assign_to)='{$c_name}' 
                    AND lm.email not in (select email_id from order_details where email_id = lm.email)
                    
                GROUP BY lm.email";
        }else{
            $sql =  "SELECT lm.id from `lead_management` as lm 
                    LEFT JOIN lead_action la ON lm.email=la.email 
                    WHERE 
                    phase='{$phase}' 
                    AND LCASE(la.assign_to)='{$c_name}' 
                    AND lm.email not in (select email_id from order_details where email_id = lm.email)
                    
                GROUP BY lm.email";
        }
        //AND date(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    public function stage($stage=false){
        $c_name  = $this->session->balance_session['first_name'];
        $sql =  "SELECT lm.id from `lead_management` as lm 
                    LEFT JOIN lead_action la ON lm.email=la.email 
                    WHERE 
                    stage='{$stage}' 
                    AND LCASE(la.assign_to)='{$c_name}' 
                    AND lm.email not IN (select email_id from order_details where email_id = lm.email)
                    AND lm.enquiry_from IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score')
                    
                GROUP BY lm.email";
        $query = $this->db->query($sql);//AND date(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')

        if($query->num_rows()>0)
        {
            return ($query->num_rows());
        }else{
            return 0;
        }
    }
    
    
    public function today_hot($params=false){
        $c_name  = $this->session->balance_session['first_name'];
        if($params == 1){
            $sql =  "SELECT ls.id 
                    FROM `lead_status_log` ls 
                    LEFT JOIN `lead_action` la ON ls.email=la.email
                    LEFT JOIN `lead_management` lm ON ls.email=lm.email 
                    WHERE lm.status='hot' AND ls.status='hot' 
                        AND DATE(ls.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                        AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                        AND LCASE(la.assign_to)='".strtolower($c_name)."' GROUP BY ls.email";
        }else{
            $sql =  "SELECT ls.id 
                    FROM `lead_status_log` ls 
                    LEFT JOIN `lead_action` la ON ls.email=la.email
                    LEFT JOIN `lead_management` lm ON ls.email=lm.email 
                    WHERE lm.status='hot' AND ls.status='hot'
                        AND DATE(ls.created) = CURDATE()
                        AND LCASE(la.assign_to)='".strtolower($c_name)."' GROUP BY ls.email";
        }
        
        
        //AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    public function today_hot1($params){
        
            $sql =  "SELECT ls.id 
                    FROM `lead_status_log` ls 
                    LEFT JOIN `lead_action` la ON ls.email=la.email
                    LEFT JOIN `lead_management` lm ON ls.email=lm.email 
                    WHERE lm.status='hot' AND ls.status='hot' 
                        AND DATE(ls.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                        AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                        AND LCASE(la.assign_to)='".strtolower($params)."' GROUP BY ls.email";
   
        
        
        //AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    public function today_sales(){
        $c_name  = $this->session->balance_session['first_name'];
        
        $sql = "select count(order_id) as uni, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt, SUM(balance) as balance from order_details where email_id in (select email from lead_action where assign_to='$c_name' and assign_date > (CURDATE() - INTERVAL 30 DAY) ) AND order_type !='Renewal' AND prog_buy_amt!=0 AND DATE(date)=CURDATE()";
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }

  //   avinash added this-28-01-2022
  public function today_sales_new(){
        $c_name  = $this->session->balance_session['first_name'];
        $c_id = $this->session->balance_session['admin_id'];
        $sql = "SELECT rg.first_name, rg.last_name, od.email_id,DATE_FORMAT(od.date, '%D %b %Y') as date, 
                (CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) 
                    ELSE (prog_buy_amt-wallet_discount) END) AS amt, od.balance,od.program_name 
                FROM order_details as od 
                LEFT JOIN `registries` AS rg ON rg.email_id = od.email_id 
                WHERE prog_buy_amt !=0 
                    AND sales_person ='$c_id'  
                    AND DATE(DATE)=DATE(CURDATE()) GROUP BY email_id ORDER BY DATE(date) desc";
        // echo $sql;
        // exit;
        $query = $this->db->query($sql);

        $data = array();
        if($query->num_rows() > 0)
        {
            $res = $query->result_array();
            $sum = 0;
            $balance =0;
            $b=0;
            $k=0;
            foreach ($res as $key => $value) {

                $sum = $sum+$value['amt'];
                if($value['balance'] > 0){
                 $b++;
                 $b=$b;
                }
                $balance = $balance+$value['balance'];
                $k++;
            }
            $data[0]["amt"] = $sum;
            $data[0]["unit"]= $k;
            $data[0]["unit_balance"]=$b;
            $data[0]["balance"]=$balance;
            return $data;
        }else{
            $data[0]["amt"] = 0;
            $data[0]["unit"]= 0;
            $data[0]["unit_balance"]=0;
            $data[0]["balance"]=0;
            return $data;
        }
    } 
    //   avinash added this-28-01-2022
    
    
    
    
    
    
    
    // performance analysis - sales funnel
    public function get_sales_funnel_lead($param,$name = false,$pervious_month=false, $date_filter=false){
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        //echo $date_filter_val;die;
        $c_name = $name;
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            if($param == 0){
                $sql = "SELECT id FROM `lead_action` where LCASE(assign_to) IN ('".strtolower($c_name)."') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')"; 
            }else {
                $sql = "SELECT id FROM `lead_action` where LCASE(assign_to) NOT IN('".strtolower($c_name)."','') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')";
            }
        }else{
            if($param == 0){
                $sql = "SELECT id FROM `lead_action` where LCASE(assign_to)IN ('".strtolower($c_name)."') ".$date_filter_val;    
            }else {
                $sql = "SELECT id FROM `lead_action` where LCASE(assign_to) NOT IN('".strtolower($c_name)."','') ".$date_filter_val;
            }
        }
        
        //echo $sql;die;
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_sales_funnel_consultation($param,$name = false,$pervious_month=false, $date_filter=false){
        //$c_name  = $this->session->balance_session['first_name'];
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        $c_name = $name;
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            if($param == 0){
                $sql = "SELECT id FROM `lead_action` where key_insight!='' AND LCASE(assign_to) IN ('".strtolower($c_name)."') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')";
            }else {
                $sql = "SELECT id FROM `lead_action` where key_insight!='' AND LCASE(assign_to) NOT IN('".strtolower($c_name)."','') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')";
            }
        }else{
            if($param == 0){
                $sql = "SELECT id FROM `lead_action` where key_insight!='' AND LCASE(assign_to) IN ('".strtolower($c_name)."') ".$date_filter_val;
            }else {
                $sql = "SELECT id FROM `lead_action` where key_insight!='' AND LCASE(assign_to) NOT IN('".strtolower($c_name)."','') ".$date_filter_val;
            }
        }
        
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_sales_funnel_warm($param,$name = false,$pervious_month=false, $date_filter=false){
        //$c_name  = $this->session->balance_session['first_name'];
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        $c_name = $name;
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            if($param == 0){
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Warm' AND LCASE(assign_to) IN ('".strtolower($c_name)."') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') ORDER BY `id` DESC";
            }else {
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Warm' AND LCASE(assign_to) NOT IN('".strtolower($c_name)."','') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') ORDER BY `id` DESC";
            }
        }else{
            if($param == 0){
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Warm' AND LCASE(assign_to) IN ('".strtolower($c_name)."') ".$date_filter_val;
            }else {
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Warm' AND LCASE(assign_to) NOT IN('".strtolower($c_name)."','') ".$date_filter_val;
            }
        }
        
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_sales_funnel_hot($param,$name = false,$pervious_month=false, $date_filter=false){
        //$c_name  = $this->session->balance_session['first_name'];
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        $c_name = $name;
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            
            if($param == 0){
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Hot' AND LCASE(assign_to) IN ('".strtolower($c_name)."') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') ORDER BY `id` DESC";
            }else {
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Hot' AND LCASE(assign_to) NOT IN('".strtolower($c_name)."','') and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') ORDER BY `id` DESC";
            }
        }else{
            if($param == 0){
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Hot' AND LCASE(assign_to) IN ('".strtolower($c_name)."') ".$date_filter_val;
            }else {
                $sql = "SELECT lm.id FROM `lead_management` lm LEFT JOIN lead_action la ON lm.email=la.email where status='Hot' AND LCASE(assign_to) NOT IN('".strtolower($c_name)."','') ".$date_filter_val;
            }
        }
        
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return count($query->result_array());
        }else{
            return 0;
        }
    }
    
    public function get_sales_funnel_sales($param,$name = false,$pervious_month=false, $date_filter=false){
        //$c_name  = $this->session->balance_session['first_name'];
        //$c_id  = $name;
        $c_id = $this->session->balance_session['admin_id'];
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(DATE)>=DATE_FORMAT(CURDATE(), "%Y-%m-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(DATE)>=DATE_FORMAT(CURDATE(), "%Y-%m-01") ';
        }
        $c_name = $name;
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            if($param == 0){
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt,balance from order_details where order_type != 'Renewal' AND sales_person ='$c_id' AND DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) AS amt,balance
                        FROM
                            order_details
                        WHERE
                            AND sales_person ='$c_id' AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') order by order_id DESC";
            }
        }else{
            if($param == 0){
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt ,balance from order_details where sales_person ='$c_id'   AND prog_buy_amt !=0 ".$date_filter_val." GROUP BY email_id order by order_id DESC";
                //  AND DATE(date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')";
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) AS amt,balance
                        FROM
                            order_details
                        WHERE
                            sales_person ='$c_id' AND prog_buy_amt !=0 ".$date_filter_val." GROUP BY email_id order by order_id DESC";
            }
        }
//         if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){
// echo $sql;die;
// }
        
        
        $query = $this->db->query($sql);

        $data = array();
        if($query->num_rows()>0)
        {
            $res = $query->result_array();
            $sum = 0;
            $balance =0;
            $b=0;
            $k=0;
            foreach ($res as $key => $value) {

                $sum = $sum+$value['amt'];
                if($value['balance'] > 0){
                 $b++;
                 $b=$b;
                }
                $balance = $balance+$value['balance'];
                $k++;
            }
            $data[0]["amt"] = $sum;
            $data[0]["unit"]= $k;
            $data[0]["unit_balance"]=$b;
            $data[0]["balance"]=$balance;
            return $data;
        }else{
            return 0;
        }
    }
   
    public function get_sales_funnel_sales1($param,$name = false,$pervious_month=false, $date_filter=false){
        //$c_name  = $this->session->balance_session['first_name'];
        //$c_id  = $name;
        $c_id = $name;
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(DATE)>=DATE_FORMAT(CURDATE(), "%Y-%m-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(DATE)>=DATE_FORMAT(CURDATE(), "%Y-%m-01") ';
        }
        $c_name = $name;
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            if($param == 0){
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt,balance from order_details where order_type != 'Renewal' AND sales_person ='$c_id' AND DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) AS amt,balance
                        FROM
                            order_details
                        WHERE
                            AND sales_person ='$c_id' AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') order by order_id DESC";
            }
        }else{
            if($param == 0){
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt ,balance from order_details where sales_person ='$c_id'   AND prog_buy_amt !=0 ".$date_filter_val." GROUP BY email_id order by order_id DESC";
                //  AND DATE(date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')";
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) AS amt,balance
                        FROM
                            order_details
                        WHERE
                            sales_person ='$c_id' AND prog_buy_amt !=0 ".$date_filter_val." GROUP BY email_id order by order_id DESC";
            }
        }
//         if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){
// echo $sql;die;
// }
        
        
        $query = $this->db->query($sql);

        $data = array();
        if($query->num_rows()>0)
        {
            $res = $query->result_array();
            $sum = 0;
            $balance =0;
            $b=0;
            $k=0;
            foreach ($res as $key => $value) {

                $sum = $sum+$value['amt'];
                if($value['balance'] > 0){
                 $b++;
                 $b=$b;
                }
                $balance = $balance+$value['balance'];
                $k++;
            }
            $data[0]["amt"] = $sum;
            $data[0]["unit"]= $k;
            $data[0]["unit_balance"]=$b;
            $data[0]["balance"]=$balance;
            return $data;
        }else{
            return 0;
        }
    }
    
    public function get_month_sales_report($param,$first_name=false,$pervious_month=false, $date_filter=false){
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " DATE(DATE)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' DATE(DATE)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' DATE(DATE)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        if($param == 1){    //Advance stack
            $where_condition = " program_type='0' AND renewal_flag!='3' AND ";
        }elseif($param == 2){   //Basic stack
            $where_condition = " program_type='1' AND renewal_flag!='4' AND ";
        }elseif($param == 3){   //Basic Renewal
            $where_condition = " renewal_flag='4' AND ";
        }elseif($param == 4){   //Basic to upgrade
            $where_condition = " renewal_flag='3' AND ";
        }else{
            $where_condition = "";
        }
        $whrClause = "";
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            $c_id = $this->session->balance_session['admin_id'];
            if($first_name!=false){
                /*$sql = "select count(od.order_id) as unit, sum(od.prog_buy_amt) as amt from order_details as od
                LEFT JOIN lead_action as ld ON (od.email_id = ld.email)
                where ".$where_condition." od.order_type!='Renewal' AND DATE(od.date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') and UPPER(ld.assign_to = '".strtoupper($first_name)."')";
                */
                /*$sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt from order_details 
                    where ".$where_condition." email_id in (
                            select email from lead_action where LCASE(assign_to) IN ('".strtolower($first_name)."') 
                            and assign_date > (CURDATE() - INTERVAL 30 DAY) ) 
                            AND DATE(date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')";*/
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt from order_details 
                    where ".$where_condition." 
                            AND sales_person ='$c_id'
                            AND DATE(date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')";
            }else{
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt from order_details where ".$where_condition." DATE(date)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') ";
            }
            
        }else{
            
            if($first_name!=false){
                /*$sql = "select count(od.order_id) as unit, sum(od.prog_buy_amt) as amt from order_details as od
                LEFT JOIN lead_action as ld ON (od.email_id = ld.email)
                where ".$where_condition." od.order_type!='Renewal' AND DATE(od.date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') and UPPER(ld.assign_to = '".strtoupper($first_name)."')";
                */
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt from order_details 
                    where ".$where_condition." email_id in (
                            select email from lead_action where LCASE(assign_to)IN ('".strtolower($first_name)."') 
                            and assign_date > (CURDATE() - INTERVAL 30 DAY) ) AND
                            ".$date_filter_val;
                            //echo $sql;die;
            }else{
                $sql = "select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt from order_details where ".$where_condition." ".$date_filter_val;

            }
        }
        
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    public function get_goal_set(){
        $c_id  = $this->session->balance_session['admin_id'];
        //Goal set 
        $sql = "SELECT sale_goal,unit_goal FROM `admin_user` where  admin_id = '$c_id'";
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }

    public function get_counsellor_goal(){
        //Goal set 
        $sql = "SELECT sale_goal,unit_goal,photo,crm_user,goal_lead,goal_consult ,first_name, email_id,admin_id FROM `admin_user` where status_counsellor = '1' AND new_crm ='1'";
        
        $query = $this->db->query($sql);

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function cancel_link($id){
        $sql = "UPDATE `payment_link` SET is_cancel = '1' WHERE  id = $id limit 1";
        $query = $this->db->query($sql);
    }
    public function update_due_date($date,$id){
        $sql = "UPDATE `order_details` SET bal_due_date = '$date',added_validity='1' WHERE  order_id = $id limit 1";
        $query = $this->db->query($sql);
    }
    public function get_od_details($id){
        $sql = "SELECT *,(select first_name FROM `registries` where email_id=od.email_id) as client_name FROM `order_details` od where order_id = '$id' ";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function set_counsellor_goal_unit($post){
        //Goal set 
        foreach ($post as $key => $value) {
            $sql = "UPDATE `admin_user` SET sale_goal = '".$value[1]."', unit_goal = ".$value[2]." WHERE  email_id = '".str_replace('###','.',$key)."'";
            $query = $this->db->query($sql);
            
        }
        if($this->db->affected_rows()==true)
        {
            return true;
        }else{
            return 0;
        }
    }
    public function get_balance_data($param,$assign){
        $c_name  = $this->session->balance_session['first_name'];
        $c_id = $this->session->balance_session['admin_id'];
        if($assign == 0){
           $where = "LCASE(assign_to) !='' ";
        }else{
             $where = "LCASE(assign_to) ='".strtolower($c_name)."'";
        }
        if($param == "due_tomorrow"){
            $sql = "SELECT
                    CONCAT(rg.first_name, ' ', rg.last_name) AS full_name,
                    CONCAT(od. program_name, ' (', od.program_duration_days,' Days) ') AS prog_details,
                    od.order_id,rg.email_id,amount as paid_amt,
                    (SELECT assign_to FROM lead_action WHERE email = rg.email_id GROUP BY email LIMIT 1) as assign_to,
                    rg.id,od.added_validity,
                    bd.mobile_no1 AS phone1,rg.phone,
                    DATE_FORMAT(od.bal_due_date, '%D %b %Y') AS due_date,
                    od.balance,
                    od.program_name,
                    rg.user_status,
                    au.first_name AS mentor
                FROM
                    `order_details` od
                LEFT JOIN registries rg ON
                    od.userid = rg.id
                LEFT JOIN admin_user au ON
                    rg.mentor_id = au.admin_id
                LEFT JOIN billing_details bd ON
                    rg.id = bd.user_id
                WHERE
                    od.sales_person = ".$c_id." AND (
                        od.balance IS NOT NULL AND od.balance != '' AND od.balance > 0
                    ) AND DATE(od.bal_due_date) = CURDATE() + INTERVAL 1 DAY";
                    
        }elseif($param == "due"){
            $sql = "SELECT
                    CONCAT(rg.first_name, ' ', rg.last_name) AS full_name,
                    CONCAT(od. program_name, ' (', od.program_duration_days,' Days) ') AS prog_details,
                    od.order_id,rg.email_id,amount as paid_amt,
                    (SELECT assign_to FROM lead_action WHERE email = rg.email_id GROUP BY email LIMIT 1) as assign_to,
                    rg.id,od.added_validity,
                    bd.mobile_no1 AS phone1,rg.phone,
                    DATE_FORMAT(od.bal_due_date, '%D %b %Y') AS due_date,
                    od.balance,
                    od.program_name,
                    rg.user_status,
                    au.first_name AS mentor
                FROM
                    `order_details` od
                LEFT JOIN registries rg ON
                    od.userid = rg.id
                LEFT JOIN admin_user au ON
                    rg.mentor_id = au.admin_id
                LEFT JOIN billing_details bd ON
                    rg.id = bd.user_id
                WHERE
                    od.sales_person = ".$c_id." AND (
                        od.balance IS NOT NULL AND od.balance != '' AND od.balance > 0
                    ) AND DATE(od.bal_due_date) = CURDATE()";
                    
        }else{
            $sql = "SELECT
                    CONCAT(rg.first_name, ' ', rg.last_name) AS full_name,
                    CONCAT(od. program_name, ' (', od.program_duration_days,' Days) ') AS prog_details,
                    od.order_id,rg.email_id,rg.id,rg.phone,
                    amount as paid_amt,
                    od.balance,od.added_validity,
                    DATE_FORMAT(od.bal_due_date, '%D %b %Y') AS due_date,
                    od.program_name,
                    rg.user_status,
                    au.first_name AS mentor
                FROM
                    `order_details` od
                LEFT JOIN registries rg ON
                    od.userid = rg.id
                LEFT JOIN admin_user au ON
                    rg.mentor_id = au.admin_id
                LEFT JOIN billing_details bd ON
                    rg.id = bd.user_id
                WHERE
                    od.sales_person = ".$c_id." AND (
                        od.balance IS NOT NULL AND od.balance != '' AND od.balance > 0
                    ) AND DATE(od.bal_due_date) < CURDATE() AND rg.user_status NOT IN ('fs','dropout')";
        }
        
        $sql = $this->db->query($sql);
        if($sql->num_rows() > 0)
        {
           return $sql->result_array();
        }        
        else{
            return 0;
        }
    }
    
    public function get_lead_conversion($param,$user,$pervious_month=false,$name = false, $date_filter=false){
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' DATE(lm.created)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' DATE(lm.created)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        $c_name  = $name;
        
        if($param==1){ // Lead to sale
            $where_condition = " ";
        }if($param==2){ // Hot to sale
            $where_condition = " lm.status='Hot' AND ";
        }elseif($param==3){ // Warm to sale
            $where_condition = " lm.status='Warm' AND ";
        }elseif($param==4){ // Consultation to sale
            $where_condition = " la.key_insight!='' AND ";
        }
        if($user==1){$user_condition = " LCASE(la.assign_to) IN ('".strtolower($c_name)."') AND "; }
        else{$user_condition = " LCASE(la.assign_to) NOT IN ('".strtolower($c_name)."','') AND "; }
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            
            $sql = "select lm.email from lead_management lm LEFT JOIN lead_action la ON lm.email=la.email where ".$where_condition.$user_condition.$date_filter_val." GROUP BY lm.email";
        }else{
            $sql = "select lm.email from lead_management lm LEFT JOIN lead_action la ON lm.email=la.email where ".$where_condition.$user_condition.$date_filter_val." GROUP BY lm.email";
        }
        
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return count($query->result_array());
        }        
        else{
            return 0;
        }
    }
    
    
    public function get_sales_conversion($param,$user,$pervious_month=false,$name = false, $date_filter=false){
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' DATE(lm.created)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' DATE(lm.created)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        $c_name  = $name;
        
        if($param==1){ // Lead to sale
            $where_condition = " ";
        }if($param==2){ // Hot to sale
            $where_condition = " lm.status='Hot' AND ";
        }elseif($param==3){ // Warm to sale
            $where_condition = " lm.status='Warm' AND ";
        }elseif($param==4){ // Consultation to sale
            $where_condition = " la.key_insight!='' AND ";
        }
        if($user==1){$user_condition = " LCASE(la.assign_to) IN ('".strtolower($c_name)."') AND "; }
        else{$user_condition = " LCASE(la.assign_to) NOT IN ('".strtolower($c_name)."','') AND "; }
        
        if($pervious_month==true){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            /*$sql = "SELECT
                    order_id
                FROM
                    order_details od
                LEFT JOIN lead_management lm ON
                    od.email_id = lm.email
                LEFT JOIN lead_action la ON
                    od.email_id = lm.email WHERE".$where_condition.$user_condition." DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01') GROUP BY lm.email";*/
            $sql = "select 
                        lm.email 
                    from 
                        lead_management lm 
                    LEFT JOIN lead_action la ON 
                        lm.email=la.email 
                    INNER JOIN order_details od ON 
                        od.email_id = lm.email 
                    where   
                        ".$where_condition.$user_condition." 
                        DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY lm.email";
        }else{
            /*$sql = "SELECT
                    order_id
                FROM
                    order_details od
                LEFT JOIN lead_management lm ON
                    od.email_id = lm.email
                LEFT JOIN lead_action la ON
                    od.email_id = lm.email WHERE".$where_condition.$user_condition." DATE(lm.created)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY lm.email";*/
            $sql = "select 
                        lm.email 
                    from 
                        lead_management lm 
                    LEFT JOIN lead_action la ON 
                        lm.email=la.email 
                    INNER JOIN order_details od ON 
                        od.email_id = lm.email 
                    where   
                        ".$where_condition.$user_condition.$date_filter_val." GROUP BY lm.email";

        }
        
        
        // echo $sql;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return count($query->result_array());
        }        
        else{
            return 0;
        }
    }
    
    public function get_Avg_Calls($yours,$c_name = false, $pervious_month = false, $date_filter=false){
        
        //$c_name  = $this->session->balance_session['first_name'];
        $date_filter_val = "";
        if(!empty(@$date_filter)){
            if($date_filter['month']!="" && $date_filter['month']!="-1"){
                if($date_filter['year']!=""){
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";
                }else{
                    $date_filter['year'] = date("Y");
                    $month_val = $date_filter['month'];
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%{$month_val}-01') ";

                }
            }else{
                if($date_filter['year']!=""){
                    //$date_filter_val = " AND YEAR(assign_date) = {$date_filter['year']} ";
                    $date_filter_val = " and DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%{$date_filter['year']}-%-%') ";
                }else{
                    $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
                }
            }
        }else{
            $date_filter_val = ' and DATE(assign_date)>=DATE_FORMAT(CURDATE(), "%{Y}-%{m}-01")';
        }
        if($yours=='0'){
            $where = " assign_to IN ('$c_name') AND ";
        }else{
            $where = '';
        }
        if($pervious_month=='1'){
            //die;
            if(date('m')==1){
                $month = 12;
                $year = date('Y')-1;
            }else{
                $month = date('m')-1;
                $year = date('Y');
            }
            $sql = "SELECT
                    SUM(fu_count) as fu_count,
                    SUM(CASE WHEN key_insight != '' THEN 1 ELSE 0
                END) AS key_insight
                FROM
                    `lead_action`
                WHERE
                     ".$where." (fu_count > 0 OR key_insight != '') AND assign_date >= DATE_FORMAT(CURDATE(), '%{$year}-%{$month}-01')
                ORDER BY
                    `id`
                DESC";
        }else{
            $sql = "SELECT
                    SUM(fu_count) as fu_count,
                    SUM(CASE WHEN key_insight != '' THEN 1 ELSE 0
                END) AS key_insight
                FROM
                    `lead_action`
                WHERE
                     ".$where." (fu_count > 0 OR key_insight != '') ".$date_filter_val."
                ORDER BY
                    `id`
                DESC";
        }
        // echo $sql;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
        
    }
    
    public function get_source_name(){
        $sql = "SELECT
            CONCAT(
                'Prime Source (',
                (
                SELECT
                    GROUP_CONCAT(source_name)
                FROM
                    bn_lead_source
                WHERE
                    source_group = 1
            ),
            ')'
            ) AS prime_source,
            CONCAT(
                'Social Media (',
                (
                SELECT
                    GROUP_CONCAT(source_name)
                FROM
                    bn_lead_source
                WHERE
                    source_group = 2
            ),
            ')'
            ) AS social_media,
            CONCAT(
                'Web (',
                (
                SELECT
                    GROUP_CONCAT(source_name)
                FROM
                    bn_lead_source
                WHERE
                    source_group = 6
            ),
            ')'
            ) AS web, ('Health Score (Web & App)') AS health_score,
            ('Paid Adds (Google,Facebook)') AS paid_adds,
            ('Registration') AS Registration,
            CONCAT(
                'Other (',
                (
                SELECT
                    GROUP_CONCAT(source_name)
                FROM
                    bn_lead_source
                WHERE
                    source_group = 5
            ),
            ')'
            ) AS other
        FROM
            `bn_lead_source` limit 1";
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
    }
    /*public function get_source_conversion($param){
        $c_name  = $this->session->balance_session['first_name'];
        $sql = "SELECT
                COUNT(order_id) AS unit,
                SUM(prog_buy_amt) AS amt
            FROM
                order_details
            WHERE
                email_id IN(
                SELECT
                    lm.email
                FROM
                    lead_management lm LEFT JOIN lead_action la ON lm.email=la.email
                WHERE
                    la.assign_to = '".$c_name."'
                    AND lm.enquiry_from IN(
                    SELECT
                        source_name
                    FROM
                        bn_lead_source
                    WHERE
                        source_group = $param
                ) AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND DATE(assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
            ) AND DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
            
        //echo $sql."<br><br>";    //exit;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
    }*/
    public function get_source_conversion($param, $name = false, $yours=false){
        $c_name  = $name;
        $whr = "";
        if($yours==true){
            $whr = " la.assign_to IN ( '".$c_name."' ) AND ";
        }else{
            $whr = "";
        }
        
        $sql = "SELECT
                COUNT(order_id) AS unit,
                SUM(prog_buy_amt) AS amt
            FROM
                order_details
            WHERE
                email_id IN(
                SELECT
                    lm.email
                FROM
                    lead_management lm LEFT JOIN lead_action la ON lm.email=la.email
                WHERE ".$whr."
                     lm.enquiry_from IN(
                    SELECT
                        source_name
                    FROM
                        bn_lead_source
                    WHERE
                        source_group = $param
                ) AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND DATE(assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
            ) AND DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
            
        //echo $sql."<br><br>";    exit;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
    }

    public function get_source_lead_overall_your($param, $name = false, $yours=false){
        $c_name  = $name;
        $whr = "";
        if($yours==true){
            $whr = " la.assign_to IN ('".$c_name."') AND ";
        }else{
            $whr = "";
        }
        
        $sql = "SELECT
                    COUNT(lm.email) as cnt
                FROM
                    lead_management lm LEFT JOIN lead_action la ON lm.email=la.email
                WHERE 
                    ".$whr."
                    lm.enquiry_from IN(
                    SELECT
                        source_name
                    FROM
                        bn_lead_source
                    WHERE
                        source_group = $param
                ) AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                AND DATE(assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
            AND (phone !='' AND LENGTH(phone) > 4)";

            
        //echo $sql."<br><br>";    exit;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
    }
    public function getCounsellors(){
        $sql = "SELECT crm_user as counsellors FROM `admin_user` WHERE LCASE(user_type)='sales' AND new_crm=1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function get_consolerlist(){
        $sql = "SELECT
                    first_name, fullname,email_id,full_name
                FROM
                    admin_user
                WHERE 
                    lower(as_counsellor) = 'yes' and user_status = 'active'
                GROUP BY email_id ";

            
        //echo $sql."<br><br>";    exit;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
    }
    public function get_unit_list($today_sales=false){
        $c_name = $this->session->balance_session['first_name'];
        $c_id = $this->session->balance_session['admin_id'];
        if($today_sales!=false){
            $today_da = date('Y-m-d');
            /*$sql = "SELECT rg.first_name, rg.last_name, od.email_id,DATE_FORMAT(od.date, '%D %b %Y') as date,
            (CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END)
             AS amt, od.program_name
                FROM order_details  as od
                LEFT JOIN `registries` AS rg ON rg.email_id = od.email_id
                WHERE 
                    order_type != 'Renewal' 
                    AND prog_buy_amt !=0 
                    AND  od.email_id IN (SELECT email FROM lead_action WHERE LCASE(assign_to) IN ('{$c_name}') ) 
                AND DATE(DATE)>=DATE_FORMAT(CURDATE(), '$today_da') GROUP BY email_id ORDER BY DATE(date) desc";*/
            $sql = "SELECT rg.first_name, rg.last_name, od.email_id,DATE_FORMAT(od.date, '%D %b %Y') as date,
            (CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END)
             AS amt, od.program_name
                FROM order_details  as od
                LEFT JOIN `registries` AS rg ON rg.email_id = od.email_id
                WHERE 
                    order_type != 'Renewal' 
                    AND prog_buy_amt !=0 
                    AND od.sales_person ='$c_id'
                AND DATE(DATE)>=DATE_FORMAT(CURDATE(), '$today_da') ORDER BY DATE(date) desc";
                
        }else{
            /*$sql = "SELECT rg.first_name, rg.last_name, od.email_id, DATE_FORMAT(od.date, '%D %b %Y') as date,
            (CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) AS amt, od.program_name
                FROM order_details  as od
                LEFT JOIN `registries` AS rg ON rg.email_id = od.email_id
                WHERE 
                    order_type != 'Renewal' 
                    AND prog_buy_amt !=0 
                    AND  od.email_id IN (SELECT email FROM lead_action WHERE LCASE(assign_to) IN ('{$c_name}')  ) 
                AND DATE(DATE)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id ORDER BY DATE(date) desc";//AND assign_date > (CURDATE() - INTERVAL 30 DAY) ) */
            $sql = "SELECT rg.first_name, rg.last_name, od.email_id, DATE_FORMAT(od.date, '%D %b %Y') as date,
            (CASE WHEN amount_type = 'D' THEN ROUND(prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) AS amt, od.program_name
                FROM order_details  as od
                LEFT JOIN `registries` AS rg ON rg.email_id = od.email_id
                WHERE 
                    order_type != 'Renewal' 
                    AND prog_buy_amt !=0 
                    AND od.sales_person ='$c_id'
                AND DATE(DATE)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') ORDER BY DATE(date) desc";//AND assign_date > (CURDATE() - INTERVAL 30 DAY) )     
        }
        
                

            
        //echo $sql."<br><br>";    exit;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }        
        else{
            return 0;
        }
    }
    
    public function get_review_slot($name =false){
        $sql ="SELECT slot FROM sales_review_notes WHERE DATE(added_date) = CURDATE() AND name= '$name' ";
        $query=$this->db->query($sql);
        // print_r_custom($query->result_array());
        // exit;
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
    
    // avinash added 28-01-2022
    public function no_action_planned($c_name){
        // $sql ="SELECT lm.email, lm.fname, lm.phone, lm.status, lm.stage, lm.created, la.assign_to, ( SELECT program_status FROM order_details WHERE program_status IN('0','1','2','4') AND email_id = lm.email GROUP BY email_id ) as program_status, DATE(la.reminder_dt) as reminder_dt, DATE(la.fu_other_date) as fu_other_date FROM lead_management lm LEFT JOIN lead_action la ON lm.email = la.email WHERE lm.status IN('Hot', 'Warm', 'To Engage') AND DATE(la.fu_other_date) < DATE(CURDATE()) AND DATE(la.reminder_dt) < DATE(CURDATE()) AND la.assign_to = '$c_name' AND lm.email NOT IN( SELECT email_id FROM order_details WHERE program_status IN('0','1','2','4') GROUP BY email_id ) AND DATE(lm.created) > '2021-12-01' GROUP BY lm.email";
        $sql="SELECT
                        lm.email,
                        lm.fname,
                        lm.phone,
                        (SELECT status from lead_management where email=lm.email ORDER by id DESC limit 1 ) as status,
                        lm.stage,
                        lm.created,
                        la.assign_to,
                        (
                        SELECT
                            program_status
                        FROM
                            order_details
                        WHERE
                            program_status  IN('0','1','2','4') AND email_id = lm.email
                        GROUP BY
                            email_id
                    ) as program_status,
                    (CASE WHEN DATE(la.key_insight_date) !='0000-00-00' THEN CONCAT('Consultation : ',DATE_FORMAT(la.key_insight_date, '%D %b %Y %h:%i %p')) WHEN DATE(la.fu_date) !='0000-00-00' THEN CONCAT('Follow up : ',DATE_FORMAT(la.fu_date, '%D %b %Y  %h:%i %p'))  ELSE 'No Action' END) as action,
                        DATE(la.reminder_dt) as reminder_dt,
                        DATE(la.fu_other_date) as fu_other_date
                    FROM
                        lead_management lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    WHERE
                        lm.status IN('Hot', 'Warm', 'To Engage') AND DATE(la.fu_other_date) < DATE(CURDATE()) AND DATE(la.reminder_dt) < DATE(CURDATE()) AND la.assign_to = '$c_name' AND lm.email NOT IN(
                        SELECT
                            email_id
                        FROM
                            order_details
                        WHERE
                            program_status  IN('0','1','2','4')
                        GROUP BY
                            email_id
                    ) AND DATE(la.reminder_dt) > DATE_SUB(CURDATE(), INTERVAL 3 DAY)
                    GROUP BY
                        lm.email
                    HAVING status NOT IN('', 'Cold','Completed')
                    ORDER BY la.reminder_dt desc";
        $query=$this->db->query($sql);
        // print_r_custom($query->result_array());
        // exit;
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    // avinash added 28-01-2022
    
    
    
}