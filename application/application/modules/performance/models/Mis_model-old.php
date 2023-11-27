<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mis_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
        // $this->load->library('query');
    }
    
    
    public function get_sales_funnel_sales($param,$name = false){
        $c_name = $name;
        if($c_name!=false){
            if($param == 0){
                $sql = "SELECT 
                            count(order_id) as unit, 
                            sum(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) as amt 
                        FROM 
                        order_details 
                        where 
                            order_type != 'Renewal' 
                            AND email_id IN (select email from lead_action where LCASE(assign_to) IN ('".strtolower($c_name)."') ) 
                            AND prog_buy_amt !=0
                            AND DATE(date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') order by order_id DESC";
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            SUM(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) AS amt
                        FROM
                            order_details
                        WHERE
                            order_type != 'Renewal' 
                            AND email_id IN (select email from lead_action where LCASE(assign_to) IN ('".strtolower($c_name)."') ) 
                            AND prog_buy_amt !=0
                            order by order_id DESC";
            }
        }else{
            if($param == 0){
                $sql = "SELECT 
                            count(order_id) as unit, 
                            sum(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) as amt 
                        FROM 
                        order_details 
                        where 
                            order_type != 'Renewal' 
                            AND email_id IN (select email from lead_action) 
                            AND prog_buy_amt !=0
                            AND DATE(date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01') order by order_id DESC";
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            SUM(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) AS amt
                        FROM
                            order_details
                        WHERE
                            order_type != 'Renewal' 
                            AND email_id IN (select email from lead_action) 
                            AND prog_buy_amt !=0
                            order by order_id DESC";
            }
        }
        
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_sales_funnel_sales($param,$name = false){
    public function get_Avg_Calls($yours,$c_name = false){
        if($yours=='0'){
            $where = " assign_to IN ('$c_name') AND ";
        }else{
            $where = '';
        }
        $sql = "SELECT
                    SUM(fu_count) as fu_count,
                    SUM(CASE WHEN key_insight != '' THEN 1 ELSE 0
                END) AS key_insight
                FROM
                    `lead_action`
                WHERE
                     ".$where." (fu_count > 0 OR key_insight != '') AND assign_date >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                ORDER BY
                    `id`
                DESC";
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }else{
            return 0;
        }
        
    }//public function get_Avg_Calls($yours,$c_name = false){
    public function get_total_lead_assign($param,$name = false){
        $c_name = $name;
        if($c_name!=false){
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."') 
                            AND DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')
                            GROUP BY lm.email ";
            }else {
                $sql = "SELECT lm.id, MAX(lm.email) as email, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date   
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."')
                            GROUP BY lm.email ";
            }
        }else{
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            DATE(assign_date)>=DATE_FORMAT(CURDATE(), '%Y-%m-01')
                            GROUP BY lm.email ";
            }else {
                $sql = "SELECT lm.id, MAX(lm.email) as email, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date   
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        GROUP BY lm.email ";
            }
        }
        
        //echo $sql;die;
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_total_lead_assign($param,$name = false){
    public function get_lead_by_status_completed($name=false){
        if($name!=false){
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
                GROUP BY lm.status";
        }else{
            $sql = "SELECT
                    status,count(DISTINCT(lm.email)) as c
                FROM
                    lead_management lm 
                LEFT JOIN
                    lead_action la
                ON lm.email=la.email
                WHERE lm.email IN( SELECT email_id FROM order_details WHERE program_status NOT IN(0,1,2,4) GROUP BY email_id) 
                    AND status in (SELECT status_name FROM `bn_lead_status` where new_crm='1') 
                    AND lm.email IN(SELECT email_id
                           FROM   order_details
                           WHERE  program_status IN( 0, 1, 2, 4 ))
                    AND lm.phone NOT IN(SELECT phone
                               FROM   registries
                               WHERE  user_status = 'Active')
                GROUP BY lm.status";
        }
        //AND lm.created > CURDATE() - INTERVAL 30 DAY 
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
            return ($query->result_array());
        }else{
            return 0;
        }
    }//get_lead_by_status_completed
    public function get_basic_to_special_sales($c_name=false){
        /*$sql = "SELECT
                    (order_id),od.program_type,DATE(lm.created),prog_duration,od.email_id as od_email, lm.phone, program_status, order_type, renewal_flag
                FROM
                    `order_details` od
                LEFT JOIN registries rg ON
                    od.userid = rg.id  
                LEFT JOIN lead_management lm ON
                    od.email_id = lm.email      
                WHERE
                     `program_type` = 1 AND od.email_id != '' AND od.email_id NOT IN(
                    SELECT email_id FROM order_details WHERE `program_type` = 0 GROUP BY od.email_id
                ) AND od.email_id NOT IN(SELECT email FROM lead_action WHERE `assign_to` != '' GROUP BY email)
                
                 ORDER BY DATE(lm.created) DESC";*/

        $sql = "SELECT (order_id),od.program_type,prog_duration,od.email_id as od_email, program_status, order_type, renewal_flag FROM `order_details` as od WHERE `program_type` = 1 AND LCASE(order_type)!='free'";
                    
        $query=$this->db->query($sql);
                    
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_basic_to_special_sales($c_name=false){
    public function get_stage_phase_conversion($years = false, $name = false){
        $c_name = $name;

        if($c_name != false){
            if($years!=false){
                 $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status, lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                    WHERE 
                        DATE_FORMAT(la.assign_date,'%Y')>=DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(la.assign_date,'%Y')<=DATE_FORMAT(CURDATE(), '{$years}')
                        AND LCASE(assign_to) IN ('".strtolower($c_name)."') 
                        GROUP BY lm.email ";
            }else{
                 $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status,lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                    WHERE 
                        LCASE(assign_to) IN ('".strtolower($c_name)."') 
                        GROUP BY lm.email ";
            }//if($years!=false){
           
        }else{
            if($years!=false){
                $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status,lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE
                        DATE_FORMAT(la.assign_date,'%Y')>=DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(la.assign_date,'%Y')<=DATE_FORMAT(CURDATE(), '{$years}')
                        GROUP BY lm.email ";
            }else{
                $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status,lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        GROUP BY lm.email ";//lm.enquiry_from IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score')
                        
            }//if($years!=false){
            
        }
        //echo $sql;die;
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_total_lead_assign($param,$name = false){

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
    }//public function get_source_name(){

    public function get_source_wise_conversion($years = false, $name = false){
        $c_name = $name;
        if($c_name != false){
            if($years!=false){
                 $sql = "SELECT 
                            order_id AS unit,
                            prog_buy_amt AS amt,
                            MAX(lm.enquiry_from) AS enquiry_from, 
                            source_name, 
                            source_group,
                            DATE(la.assign_date) as assign_date,
                            DATE(od.date) AS order_date
                        FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                            LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name)
                        WHERE
                           LCASE(la.assign_to) IN ('".strtolower($c_name)."')  AND
                           DATE_FORMAT(la.assign_date,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(la.assign_date,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}')
                           GROUP BY lm.email";


            }else{
                 $sql = "SELECT 
                            order_id AS unit,
                            prog_buy_amt AS amt,
                            MAX(lm.enquiry_from) AS enquiry_from, 
                            source_name, 
                            source_group,
                            DATE(la.assign_date) as assign_date,
                            DATE(od.date) AS order_date
                        FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                            LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name)
                        WHERE
                           LCASE(la.assign_to) IN ('".strtolower($c_name)."')
                           GROUP BY lm.email";
            }//if($years!=false){
           
        }else{
            if($years!=false){
                $sql = "SELECT 
                            order_id AS unit,
                            prog_buy_amt AS amt,
                            MAX(lm.enquiry_from) AS enquiry_from, 
                            source_name, 
                            source_group,
                            DATE(la.assign_date) as assign_date,
                            DATE(od.date) AS order_date
                        FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                            LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name)
                        WHERE
                           DATE_FORMAT(la.assign_date,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(la.assign_date,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}')
                           GROUP BY lm.email";
            }else{
                $sql = "SELECT 
                            order_id AS unit,
                            prog_buy_amt AS amt,
                            MAX(lm.enquiry_from) AS enquiry_from, 
                            source_name, 
                            source_group,
                            DATE(la.assign_date) as assign_date,
                            DATE(od.date) AS order_date
                        FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                            LEFT JOIN `bn_lead_source` ls ON (lm.enquiry_from=ls.source_name)
                        GROUP BY lm.email";
            }//if($years!=false){
            
        }
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_source_wise_conversion($param,$name = false){

    public function get_lead_capture_stagewise_count_query($years=false,$c_name=false){
        $where_condition= "";
        $where_condition1= "";
        if($c_name!=false){
            if($years!=false){
                $where_condition1 = " AND DATE_FORMAT(created,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(created,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}') ";
                $where_condition = " AND DATE_FORMAT(created,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(created,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}') AND la.assign_to != '".$c_name."'";
            }else{
                $where_condition = " AND la.assign_to != '".$c_name."'";
                $where_condition1 ="";
            }
        }else{
            if($years!=false){
                $where_condition1 = " AND DATE_FORMAT(created,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(created,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}') ";
                $where_condition = " AND DATE_FORMAT(created,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(created,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}') ";
            }else{
                $where_condition = "";
                $where_condition1 ="";
            }
        }
        
        //New Leads
        //echo 
            $sql1=  "SELECT
                    stage, date(created) as lead_date
                FROM
                    `lead_management` 
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) ".$where_condition1." ) AND
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
       
        //OLR
        $sql2=  "SELECT
                    lm.stage, date(created) as lead_date
                FROM
                    `lead_management` lm
                WHERE
                    phone != '' AND CHAR_LENGTH(phone) > 4 AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) ".$where_condition1." AND 
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


    public function get_medical_bucket_conversion(){
        $sql = "SELECT
                   lm.id, LCASE(lm.medical_issue) as medical_issue, LCASE(la.key_insight) as key_insight, LCASE(la.fu_other_note) as fu_other_note, LCASE(la.fu_note) as fu_note, health_category
                FROM
                   lead_management lm 
                   INNER JOIN
                      lead_action la 
                      ON lm.email = la.email 
                WHERE
                    lm.email NOT IN (SELECT email_id from order_details GROUP by email_id)
                   AND ( lm.status = 'Cold' 
                   OR lm.status = 'warm'
                   OR lm.status = 'Hot' 
                   OR lm.status = 'To Engage'
                   OR lm.status = 'Renewal' )
                GROUP BY lm.email 
                ORDER BY lm.id DESC ";

        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_source_wise_conversion($param,$name = false){

        public function get_total_lead_assign_conversion_ratio($param,$name = false, $years=false){
        $c_name = $name;
        if($c_name!=false){
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email,assign_to, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."') 
                            AND DATE_FORMAT(assign_date,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(assign_date,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}')
                            GROUP BY lm.email ";
            }else {
                $sql = "SELECT lm.id, MAX(lm.email) as email, assign_to, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status   
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."')
                            GROUP BY lm.email ";
            }
        }else{
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email, assign_to, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            DATE_FORMAT(assign_date,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(assign_date,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}')
                            GROUP BY lm.email ";
            }else {
                $sql = "SELECT lm.id, MAX(lm.email) as email, assign_to, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status   
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        GROUP BY lm.email ";
            }
        }
        
        //echo $sql;die;
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_total_lead_assign($param,$name = false){


    public function get_counsellor_list(){
        $sql = "SELECT first_name,last_name,full_name,email_id FROM `admin_user` WHERE status_counsellor = '1' ORDER BY first_name ASC";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }//public function get_sales_funnel_sales($param,$name = false){

    public function get_report_expiry(){
        $sql = "SELECT order_id,email_id,start_date,exp_date FROM `order_details` WHERE DATE(exp_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    
}