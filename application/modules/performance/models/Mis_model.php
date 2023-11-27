<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mis_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
        // $this->load->library('query');
    }
    
    
    
    public function get_sales_funnel_sales_consult($param,$name = false){
        $c_name = $name;
        $year = date("Y");
        if($c_name!=false){
            if($param == 0){
                $sql = "SELECT COUNT(order_id) AS unit, SUM( CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END ) AS amt FROM order_details WHERE order_type != 'Renewal' AND email_id IN( SELECT email FROM lead_action WHERE LCASE(assign_to) IN('$c_name') AND DATE(key_insight_date) >= DATE_FORMAT(CURDATE(), '$year-%m-01') AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '$year-%m-01')) ORDER BY order_id DESC";
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
                            AND DATE(date)>=DATE_FORMAT(CURDATE(), '$year-%m-01') order by order_id DESC";
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
    
    public function get_sales($param,$name = false){
        $year = date("Y");
        // echo $param."==>".$name; exit;
        $counsellor_list = $this->getCounsellors();
        if($param == 1){
            $counsellor_list['counsellors'] = "'".$name."'";
        }
        // print_r($counsellor_list);
        // exit;
        $sql="SELECT
                od.email_id,
                la.assign_to
            FROM
                `order_details` od
            LEFT JOIN lead_action la ON
                la.email = od.email_id
            WHERE
                DATE(od.date) >= '".date('$year-04-01')."' AND order_type NOT IN('Renewal','Free') AND la.assign_to IN(".$counsellor_list['counsellors'].")
            GROUP BY
                la.email";
                
                // echo $sql;
                // exit;
                
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    public function getCounsellors(){
        $sql = "SELECT GROUP_CONCAT(\"'\",crm_user,\"'\") as counsellors FROM `admin_user` WHERE LCASE(user_type)='sales' AND new_crm=1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->row_array();
        }else{
            return 0;
        }
    }
    public function get_sales_funnel_sales($param,$name = false){
        $c_name = $name;
        $c_id  = $this->session->balance_session['admin_id'];
        $year = date("Y");
        if($c_name!=false){
            if($param == 0){
                // $sql = "SELECT 
                //             count(order_id) as unit, 
                //             sum(CASE WHEN order_type = 'OMR' THEN prog_buy_amt ELSE prog_buy_amt END) as amt 
                //         FROM 
                //             order_details 
                //         where 
                //             order_type != 'Renewal' 
                //             AND sales_person ='$c_id' 
                //             AND prog_buy_amt !=0
                //             AND DATE(date)>=DATE_FORMAT(CURDATE(), '$year-%m-01') order by order_id DESC";
            $sql="select count(order_id) as unit, sum(CASE WHEN amount_type = 'D' THEN (prog_buy_amt*conversion_rate-wallet_discount) ELSE (prog_buy_amt-wallet_discount) END) as amt from order_details where order_type != 'Renewal' AND sales_person ='$c_id'   AND prog_buy_amt >1 and DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01')";                
            }else {
                $sql = "SELECT
                            COUNT(order_id) AS unit,
                            SUM(prog_buy_amt) AS amt
                        FROM
                            order_details
                        WHERE
                            order_type != 'Renewal' 
                            AND sales_person ='$c_id' 
                            AND prog_buy_amt !=0 AND DATE(date) > (SELECT date from admin_user WHERE first_name = '".strtolower($c_name)."') 
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
                            AND DATE(date)>=DATE_FORMAT(CURDATE(), '$year-%m-01') order by order_id DESC";
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
    public function counsellor_work_days(){
        $sql = "SELECT admin_id,crm_user,datediff(DATE_FORMAT(CURDATE(), '%Y-%m-%d'),DATE(regist_date)) AS days FROM `admin_user` WHERE LCASE(user_type)='sales' AND new_crm=1";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
    }
    public function day_close_consult($yours,$c_name = false){
        $year = '2021';
        if($yours=='0'){
            $where = " la.assign_to IN ('$c_name') AND ";
        }else{
            $counsellor_list = $this->getCounsellors()['counsellors'];
            $where = " la.assign_to IN ($counsellor_list) AND ";
        }
        $sql = "SELECT
                    datediff(DATE(date),DATE(key_insight_date)) AS days
                FROM
                    lead_action la
                LEFT JOIN order_details od
                ON la.email=od.email_id
                WHERE ".$where." la.key_insight!='' and od.order_type='New' 
					   AND DATE(od.date) >= DATE(la.key_insight_date) AND DATE(la.assign_date) <= DATE(la.key_insight_date) 
					  and DATE(la.assign_date)> DATE_FORMAT(CURDATE(), '$year-04-01')  
					  AND DATE(od.date)> DATE_FORMAT(CURDATE(), '$year-04-01')  GROUP by la.email ";//exit;
				// 	  echo $sql;
				// 	  exit();
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array() ;//exit;
        }else{
            return 0;
        }
        
    }
    public function day_close_sale($yours,$c_name = false){
        $year = '2021';
        if($yours=='0'){ 
            $where = " assign_to IN ('$c_name') AND ";
        }else{
            $counsellor_list = $this->getCounsellors()['counsellors'];
            $where = " assign_to IN ($counsellor_list) AND ";
        }
        $sql = "SELECT
                    datediff(DATE(date),DATE(assign_date)) AS days
                FROM
                    lead_management lm
                LEFT JOIN lead_action la
                ON lm.email=la.email
                LEFT JOIN order_details od
                ON lm.email=od.email_id
                WHERE
                     ".$where." od.order_type='New' AND CAST(od.prog_buy_amt AS SIGNED) > 1 AND DATE(od.date) >= DATE(assign_date) and DATE(assign_date)> DATE_FORMAT(CURDATE(), '$year-04-01')  GROUP by lm.email 
                ";//exit;
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0)
        {
           return $query->result_array();
        }else{
            return 0;
        }
        
    }
    public function get_Avg_Calls($yours,$c_name = false){
        $year = '2021';
        if($yours=='0'){
            $where = " assign_to IN ('$c_name') AND ";
        }else{
            $where = '';
        }
        $sql = "SELECT
                    SUM(fu_count) as fu_count,
                    SUM(fu_other_count) AS fu_other_count,
                    SUM(CASE WHEN key_insight != '' THEN 1 ELSE 0
                END) AS key_insight
                FROM
                    `lead_action`
                WHERE
                     ".$where." (fu_count > 0 OR key_insight != '' OR fu_other_count > 0) AND assign_date >= DATE_FORMAT(CURDATE(), '$year-%m-01')
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
    public function get_Avg_CallsNew($yours,$c_name = false){
        $year = '2021';
        if($yours=='0'){
            $where = " assign_to IN ('$c_name') AND ";
        }else{
            $counsellor_list = $this->getCounsellors()['counsellors'];
            //print_r($counsellor_list);
            $where = " assign_to IN ($counsellor_list) AND ";
        }
        $start_date = date('2021-04-01');
        $sql = "SELECT
                    SUM(fu_count) as fu_count,
                    SUM(fu_other_count) AS fu_other_count,
                    SUM(CASE WHEN key_insight != '' THEN 1 ELSE 0
                END) AS key_insight
                FROM
                    `lead_action`
                WHERE
                     ".$where." (fu_count > 0 OR key_insight != '' OR fu_other_count > 0) AND DATE(assign_date) >= '$start_date'
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
        
    }
    public function get_total_lead_assign($param,$name = false){
        $year = date("Y");
        $c_name = $name;
        if($c_name!=false){
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email, MAX(la.key_insight) as key_insight, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."') 
                            AND DATE(assign_date)>=DATE_FORMAT(CURDATE(), '$year-%m-01')
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
                            DATE(assign_date)>=DATE_FORMAT(CURDATE(), '$year-%m-01')
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
        $year = date("Y");
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
                        // echo $sql;
                        
            }else{
                 $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status,lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                    WHERE 
                        LCASE(assign_to) IN ('".strtolower($c_name)."') 
                        GROUP BY lm.email ";
                        //  echo $sql;
            }//if($years!=false){
           
        }else{
            if($years!=false){
                $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status,lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE
                        DATE_FORMAT(la.assign_date,'%Y')>=DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(la.assign_date,'%Y')<=DATE_FORMAT(CURDATE(), '{$years}')
                        GROUP BY lm.email ";
                        //  echo $sql;
            }else{
                $sql = "SELECT lm.id, lm.email, la.key_insight, lm.status,lm.enquiry_from, la.assign_to, od.email_id as order_email, DATE(od.date) as order_date, DATE(la.assign_date) as assign_date, stage, phase FROM `lead_management` lm
                        INNER JOIN `lead_action` la ON (lm.email = la.email)
                        LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        GROUP BY lm.email ";//lm.enquiry_from IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score')
                        //  echo $sql;
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
            // echo($param ." ".$name." ".$years);
        $c_name = $name;
        if($c_name!=false){
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email,assign_to, MAX(la.key_insight) as key_insight,la.key_insight_date as key_insight_date , Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."') 
                            AND DATE_FORMAT(assign_date,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(assign_date,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}')
                            
                            GROUP BY lm.email ";
            }else {
                $sql = "SELECT lm.id, MAX(lm.email) as email, assign_to, MAX(la.key_insight) as key_insight,la.key_insight_date as key_insight_date, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status   
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            LCASE(assign_to) IN ('".strtolower($c_name)."')
                            GROUP BY lm.email ";
            }
        }else{
            if($param == 0){
                $sql = "SELECT lm.id, MAX(lm.email) as email, assign_to, MAX(la.key_insight) as key_insight,la.key_insight_date as key_insight_date, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status 
                            FROM `lead_management` lm
                            INNER JOIN `lead_action` la ON (lm.email = la.email)
                            LEFT JOIN `order_details` od ON (od.email_id = la.email)
                        WHERE 
                            DATE_FORMAT(assign_date,'%Y') >= DATE_FORMAT(CURDATE(), '{$years}') AND DATE_FORMAT(assign_date,'%Y') <= DATE_FORMAT(CURDATE(), '{$years}')
                            GROUP BY lm.email ";
            }else {
                $sql = "SELECT lm.id, MAX(lm.email) as email, assign_to, MAX(la.key_insight) as key_insight,la.key_insight_date as key_insight_date, Max(lm.status) as status, MAX(od.email_id) as order_email, MAX(DATE(od.date)) as order_date, MAX(DATE(assign_date)) as assign_date, od.program_status   
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
    
    
    
    // ========================================avinash added this heat map for inside sales============================================================================================== 
    
    public function effort_sale(){
        // $sql ="SELECT email_id, DATE(DATE) AS order_date, (SELECT assign_to FROM lead_action WHERE email =email_id LIMIT 1) as assign_to, ( SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 ) AS lead_date, program_duration_days, program_type, DATEDIFF( DATE(DATE), ( SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 ) ) AS days FROM `order_details` WHERE order_type = 'New' AND( SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 ) <= DATE(DATE) AND DATE(DATE) BETWEEN '2021-04-01' AND '2022-03-31'";
        $sql ="SELECT email_id, DATE(DATE) AS order_date, (SELECT assign_to FROM lead_action WHERE email =email_id LIMIT 1) as assign_to, ( SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 ) AS lead_date, program_duration_days, program_type, DATEDIFF( DATE(DATE), ( SELECT DATE(assign_date) FROM lead_action WHERE email = email_id ORDER BY id ASC LIMIT 1 ) ) AS days FROM `order_details` WHERE order_type = 'New' AND( SELECT DATE(assign_date) FROM lead_action WHERE email = email_id ORDER BY id ASC LIMIT 1 ) <= DATE(DATE) AND DATE(DATE) BETWEEN '2021-04-01' AND '2022-03-31'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    public function relevent_lead(){
        // $sql="SELECT DISTINCT lm.email, ( SELECT la.assign_to FROM lead_action la WHERE la.email = lm.email GROUP BY la.email ) AS assign_to,( CASE WHEN( SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1 ) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM lead_management lm WHERE CAST(lm.created AS DATE) >= '2021-04-01' AND CAST(lm.created AS DATE) < '2022-03-31' AND lm.ip_address NOT IN('188.191.21.7', '31.13.190.227') AND lm.is_deleted = 0 AND lm.phone IS NOT NULL AND CHAR_LENGTH(lm.phone) > 4 AND lm.email NOT IN('') AND lm.phone != '' AND lm.phone != 'NA'";
        // $sql ="SELECT email,gender,age, country,stage,medical_issue,(SELECT assign_to FROM lead_action WHERE email = lm.email GROUP BY email LIMIT 1) AS assign_to,(SELECT source_group FROM bn_lead_source  WHERE source_name = enquiry_from) AS SOURCE,( CASE WHEN(SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id  ORDER BY id DESC LIMIT 1) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END) AS lead_type FROM `lead_management` lm WHERE created BETWEEN '2021-04-01' AND '2022-03-31' AND ip_address NOT IN('188.191.21.7', '31.13.190.227') AND is_deleted = 0 AND phone IS NOT NULL AND CHAR_LENGTH(phone) > 4 AND email NOT IN('') AND email NOT IN(SELECT email_id FROM order_details WHERE  DATE(DATE) < '2021-04-01' GROUP BY email_id) GROUP BY email";
        $sql ="SELECT email,gender,age, country,stage,medical_issue,(SELECT assign_to FROM lead_action WHERE email = lm.email GROUP BY email LIMIT 1) AS assign_to,(SELECT source_group FROM bn_lead_source  WHERE source_name = enquiry_from) AS SOURCE,( CASE WHEN(SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id  ORDER BY id DESC LIMIT 1) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END) AS lead_type FROM `lead_management` lm WHERE created BETWEEN '2021-04-01' AND '2022-03-31' AND ip_address NOT IN('188.191.21.7', '31.13.190.227') AND is_deleted = 0 AND phone IS NOT NULL AND CHAR_LENGTH(phone) > 4 AND email NOT IN('') AND email NOT IN(SELECT email_id FROM order_details WHERE  DATE(DATE) < '2021-04-01' GROUP BY email_id) GROUP BY email";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    public function relevent_lead_sale(){
        // $sql="SELECT DISTINCT email_id, ( SELECT assign_to FROM lead_action WHERE email = email_id GROUP BY email ) AS assign_to, ( CASE WHEN( SELECT DATE(created) FROM lead_management WHERE email = email_id LIMIT 1 ) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `order_details` WHERE order_type = 'New' AND DATE >= '2021-04-01' AND DATE < '2022-03-31' ORDER BY DATE ASC";
        // $sql ="SELECT DISTINCT od.email_id, ( SELECT assign_to FROM lead_action WHERE email = od.email_id GROUP BY email ) AS assign_to, (SELECT CONCAT(gender,'||',age,'||',country) FROM new_assessment WHERE email_id = od.email_id AND DATE(created)>='2021-04-01' ORDER BY id DESC LIMIT 1) AS user_data, (SELECT source_group FROM bn_lead_source WHERE source_name =( SELECT enquiry_from FROM lead_management WHERE email = od.email_id ORDER BY id ASC LIMIT 1 )) AS source, DATEDIFF(DATE(DATE),(SELECT DATE(created)FROM lead_management WHERE email = od.email_id ORDER BY id ASC LIMIT 1)) AS days, (CASE WHEN(SELECT DATE(created) FROM lead_management WHERE email = od.email_id ORDER BY id DESC LIMIT 1) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `order_details` od WHERE od.order_type = 'New' AND DATE(od.DATE) >= '2021-04-01' ORDER BY DATE ASC";
    //   $sql ="SELECT od.email_id, (SELECT assign_to FROM lead_action WHERE email = email_id GROUP BY email) AS assign_to, (SELECT CONCAT(gender,'||',age,'||',country) FROM new_assessment WHERE email_id = od.email_id AND DATE(created)>='2021-04-01' ORDER BY id DESC LIMIT 1) AS user_data, (SELECT source_group FROM bn_lead_source WHERE source_name =( SELECT enquiry_from FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 )) AS SOURCE, DATEDIFF(DATE(DATE),(SELECT DATE(created)FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1)) AS days,(SELECT stage FROM lead_management WHERE email = email_id LIMIT 1)as stage, (CASE WHEN(SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id DESC LIMIT 1) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `order_details` od WHERE DATE(od.DATE) >= '2021-04-01' AND od.order_type = 'New' AND ( SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 )<= DATE(date)";
    $sql ="SELECT od.email_id, (SELECT assign_to FROM lead_action WHERE email = email_id GROUP BY email) AS assign_to, (SELECT CONCAT(gender,'||',age,'||',country) FROM new_assessment WHERE email_id = od.email_id AND DATE(created)>='2021-04-01' ORDER BY id DESC LIMIT 1) AS user_data, (SELECT source_group FROM bn_lead_source WHERE source_name =( SELECT enquiry_from FROM lead_management WHERE email = email_id ORDER BY id ASC LIMIT 1 )) AS SOURCE, DATEDIFF(DATE(DATE),(SELECT DATE(assign_date)FROM lead_action WHERE email = email_id ORDER BY id ASC LIMIT 1)) AS days,(SELECT stage FROM lead_management WHERE email = email_id LIMIT 1)as stage, (CASE WHEN(SELECT DATE(created) FROM lead_management WHERE email = email_id ORDER BY id DESC LIMIT 1) < '2021-04-01' THEN 'OLR' ELSE 'NEW' END ) AS lead_type FROM `order_details` od WHERE DATE(od.DATE) >= '2021-04-01' AND od.order_type = 'New' AND ( SELECT DATE(assign_date) FROM lead_action WHERE email = email_id ORDER BY id ASC LIMIT 1 )<= DATE(date)";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    public function lead_consultation(){
        $sql="SELECT email, key_insight, assign_to,assign_date FROM lead_action WHERE DATE(assign_date) >='2021-04-01' AND key_insight !='' GROUP BY email ORDER BY `id` DESC";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    public function lead_consultation_sale(){
        $sql="SELECT email, key_insight, assign_to, assign_date FROM lead_action WHERE DATE(assign_date) >= '2021-04-01' AND key_insight != '' AND email IN(SELECT email_id FROM order_details WHERE DATE(date)>='2021-04-01' AND order_type = 'New') GROUP BY email ORDER BY `id` DESC";
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return 0;
        }
        
    }
    
    
    // ========================================avinash added this heat map for inside sales============================================================================================== 
    
}