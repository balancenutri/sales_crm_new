<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct(); 
        // $this->load->library('query');
    }
    
    
    
    
    
    public function get_lead_details_data_query($get_parameters)
    {
        
        // echo "<pre>";
        // print_r($get_parameters);
        // exit;
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
        // echo $get_parameters['lead_by'];
        // exit;
        $where = '';
        error_reporting(1);
        $name = $_SESSION['balance_session']['first_name'];
        //Added By Navin Start
        $whrClause = "";
        
        $stage_count = intval(@$get_parameters['stage']);
        if($stage_count != 0){
            switch($stage_count){      
                case 1:      
                    $whrClause = "  lm.stage = 1 AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";     
                    break;      
                case 2:      
                    $whrClause = "  lm.stage = 2 AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";       
                    break;      
                case 3:      
                    $whrClause = "  lm.stage = 3 AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";    
                    break; 
                case 4:      
                    $whrClause = "  lm.stage = 4 AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";    
                    break; 
                default:      
                    $whrClause = "";     
            }//switch($stage_count){
        }else{
            $whrClause = "";
        }//if($stage_count != 0){
        //Added By Navin END
        
        if(!empty($get_parameters) && !empty($get_parameters['lead_by']) && $get_parameters['lead_by']=='bs'){
            //echo $get_parameters['bs_assign'];exit;
            if(@$get_parameters['bs_assign']=='0'){ //echo 'if:';exit;
                $where_condition = " AND od.email_id IN(SELECT email FROM lead_action WHERE LCASE(`assign_to`) = '".strtolower($name)."' GROUP BY email) ";
            }else{
                $where_condition = " AND od.email_id NOT IN(SELECT email FROM lead_action WHERE `assign_to` != '' GROUP BY email) ";
            }
            if(!empty($get_parameters['dys'])){
                if($get_parameters['dys']==7){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 7 DAY) AND CURDATE() AND ";
                }elseif($get_parameters['dys']==15){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 15 DAY) AND (CURDATE() - INTERVAL 7 DAY) AND ";
                }elseif($get_parameters['dys']==30){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 30 DAY) AND (CURDATE() - INTERVAL 15 DAY) AND ";
                }elseif($get_parameters['dys']==90){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 90 DAY) AND (CURDATE() - INTERVAL 30 DAY) AND ";
                }
            }else{
                $days_between = " DATE(od.date) >= (CURDATE() - INTERVAL 30 DAY) AND ";
            }
            $login_name =$this->session->balance_session['first_name'];
            if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
                }else{
                    $where_gcc='';
                }
            
            $sql= "SELECT CONCAT(rg.first_name,' ',rg.last_name) as name,lm.enquiry_from AS lead_source,lm.status AS lead_status,
                        CONCAT(lm.fname, ' ', lm.lname) AS name,
                                (
                                        CASE WHEN lm.gender != '' THEN lm.gender ELSE 'NA'
                                    END
                                ) AS gender,
                                (
                                    CASE WHEN lm.age != '' THEN CONCAT(lm.age, ' yrs') ELSE 'NA'
                                END
                                ) AS lead_age,
                                (
                                    CASE WHEN lm.height != '' THEN CONCAT(lm.height,'.',lm.inch) ELSE 'NA'
                                END
                                ) AS height,
                                mobile_verified AS verify,
                                DATE(lm.created) AS created_date,
                                rg.phone,lm.phone_alternate,lm.email_alternate,userid,od.email_id as email,program_name,prog_duration,program_duration_days,
                                (SELECT TRUNCATE(SUM(diffrence),2) as diff FROM `weight_monitor_record` where order_id =od.order_id) wt_diff,
                            (select full_name from admin_user where admin_id=rg.mentor_id)as mentor,
                            (select assign_to from lead_action where email=lm.email GROUP by email)as assign_to 
            FROM `order_details` od 
            LEFT JOIN registries rg ON od.userid=rg.id 
            LEFT JOIN lead_management lm ON od.email_id = lm.email      
            WHERE ".$whrClause." ".$days_between." `program_type`=1 and od.email_id !='' 
            AND od.email_id not in (select email_id from order_details where `program_type`=0 GROUP by email_id)
            ".$where_condition." $where_gcc GROUP by od.email_id ";
            // echo $sql;
            // die();
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
            exit;
        }
        $omr =$user_status=$program_sugg=$last_prog=$ass_snapshot='';
        if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
            $parameters_arr = explode('___', $get_parameters['lead_by']);
            //print_r($parameters_arr[0]);die;
            /*if(@$get_parameters['not_hs']){
                $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) NOT IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND  ";
            }*/
            $todays_date_query = date('Y-m-d');
            switch($parameters_arr[0]){
                case 'lds_avlble_tdy':       $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and DATE(lms.created) = CURDATE() and las.assign_to !='' GROUP BY lms.email ) AND DATE(lm.created) = CURDATE() AND ";
                                             break;
                case 'lds_avlble_mnth':      $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and DATE(lms.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') and las.assign_to !='' GROUP BY lms.email ) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND  ";
                                             break;
                case 'frsh_lds_avlble_tdy':  $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND lm.id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND DATE(lm.created) = CURDATE() AND ";
                                             break;
                case 'old_lds_avlble_tdy':   $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) AND DATE(lm.created) = CURDATE() AND ";
                                             break;
                case 'frsh_lds_avlble_mnth': $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND lm.id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                             break;
                case 'old_lds_avlble_mnth':  $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                             break;
                case 'assgn_self_tdy':       $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."') AND DATE(la.assign_date) = CURDATE() AND ";
                                             break;
                // Avinash comment this
                case 'assgn_self_mnth':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND la.assign_date >=DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                             break;
                                             
                case 'assgn_mentor_mnth':$where = " LCASE(la.assign_to) ='".strtolower($name)."'  AND la.assign_date >=DATE(CURDATE()- INTERVAL 30 DAY) AND ";
                                             break;
                case 'assgn_mentor_tdy':$where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.assign_date) >=DATE_SUB(NOW(), INTERVAL 15 HOUR) AND ";
                                             break;
                                             
                // case 'assgn_self_mnth':      
                //             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."') AND DATE(la.assign_date) >= DATE(CURDATE()- INTERVAL 30 DAY) AND ";
                //             break;
                case 'assgn_by_othrs_tdy':   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND DATE(la.assign_date) = CURDATE() AND ";
                                             break;
                // case 'assgn_by_othrs_mnth':  $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND la.assign_date > DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                //                              break;
                //avinash pandey added this
                case 'assgn_by_othrs_mnth':  $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                             break;
                // avinash code for sales manager 28-09-2021 start
                case 'mentors_omr_leads':$where = " lm.email IN (SELECT email_id from order_details GROUP BY email_id)AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4))
                    AND lm.email IN (SELECT email FROM lead_action WHERE assign_to ='$name' AND assign_date >= DATE_SUB(NOW(), INTERVAL 24 HOUR))AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND lm.email!=''  AND ";
                                             break;
                case 'all_leads': $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email!=''  AND ";
                                             break;
                case 'all_leads_today': $where = "DATE(lm.created) = CURDATE() AND lm.email!=''  AND ";
                                             break;
                case 'all_leads_sale': $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.email IN (select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND ";
                                             break;
                case 'all_leads_sale_today': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email IN (select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND ";
                                             break;
                // avinash added this fro fresh month
                case 'frsh_lds_mnth': $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email NOT IN (select lmolr.email from lead_management lmolr WHERE DATE(lmolr.created) < DATE(CURDATE() - INTERVAL 30 DAY)) AND lm.email NOT IN (SELECT email_id from order_details WHERE ((program_type = 1 AND program_status  IN('3')) OR program_status NOT IN ('1','3') ) GROUP BY email_id) AND lm.email!='' AND ";
                                             break;
                case 'get_lead_fresh_lead_sale': $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.email IN (select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND program_status !=4 GROUP BY email_id) AND ";
                                             break;                             
                // avinash added this fro olr month
                case 'olr_lds_avlble_mnth':  $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (select lmolr.email from lead_management lmolr WHERE DATE(lmolr.created) < DATE(CURDATE() - INTERVAL 30 DAY)) AND lm.email !='' and lm.email NOT IN(select email_id from order_details GROUP BY email_id)  AND ";
                                             break;
                case 'olr_lds_avlble_mnth_sale':  $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (select lmolr.email from lead_management lmolr WHERE DATE(lmolr.created) < DATE(CURDATE() - INTERVAL 30 DAY)) AND lm.email !='' and lm.email NOT IN(select email_id from order_details GROUP BY email_id) AND lm.email IN(select email_id from order_details where DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id) AND ";
                                             break;
                case 'omr_lds_avlble_mnth':  $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (SELECT email_id from order_details GROUP BY email_id)AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4'))  AND ";
                                             
                                             break;
                case 'omr_lds_avlble_mnth_sale':  $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (SELECT email_id from order_details GROUP BY email_id)AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND lm.email IN(select email_id from order_details where DATE(date)>= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id) AND ";
                                             break;
                case 'basic_stack_month':  $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id)  AND ";
                                             break;
                case 'get_basic_stack_month_sale':  $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email IN( SELECT email_id FROM order_details WHERE program_type IN('1') AND program_status IN('3', '4')AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND email_id IN( SELECT email_id FROM order_details WHERE program_type NOT IN('1') AND program_status IN('3', '4') AND DATE(DATE) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')) GROUP BY email_id ) AND ";
                                             break;
                case 'basic_stack_today':  $where = " DATE(lm.created) = CURDATE() AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id)  AND ";
                                             break;
                case 'basic_stack_capture':  $where = " DATE(lm.created) = CURDATE() AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id) AND lm.email IN (select email from lead_action where assign_to !='' group by email) AND ";
                                             break;
                case 'basic_stack_missed':  $where = " DATE(lm.created) = CURDATE() AND lm.email IN (SELECT email_id from order_details WHERE program_type = 1 AND program_status IN('3','4') GROUP BY email_id) AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email)  AND ";
                                             break;
                case 'stage_4': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.stage = 4 AND";
                                             break;
                case 'stage_4_today_lead': $where = "DATE(lm.created) = CURDATE() AND lm.stage = 4 AND lm.email !='' AND";
                                             break;
                case 'stage_4_today_lead_capture': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND  lm.email IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 4 AND";
                                             break;
                case 'stage_4_today_lead_missed': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email)AND lm.stage = 4 AND";
                                             break;
                case 'stage_3': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.stage = 3 AND";
                                             break;
                case 'stage_3_today_lead': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.stage = 3 AND";
                                             break;
                case 'stage_3_today_lead_capture': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 3 AND";
                                             break;
                case 'stage_3_today_lead_missed': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 3 AND";
                                             break;
                case 'stage_2': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.stage = 2 AND";
                                             break;
                case 'stage_2_today_lead': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.stage = 2 AND";
                                             break;
                case 'stage_2_today_lead_capture': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 2 AND";
                                             break;                             
                case 'stage_2_today_lead_missed': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 2 AND";
                                             break;                             
                case 'stage_1': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.stage = 1 AND";
                                             break;
                case 'stage_1_today_lead': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.stage = 1 AND";
                                             break;
                case 'stage_1_today_lead_capture': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email  IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 1 AND";
                                             break;                             
                case 'stage_1_today_lead_missed': $where = "DATE(lm.created) = CURDATE() AND lm.email !='' AND lm.email NOT IN (select email from lead_action where assign_to !='' group by email) AND lm.stage = 1 AND";
                                             break;
                case 'phase_1': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !=''  AND lm.phase = 1 AND";
                                             break;
                case 'phase_2': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND lm.email !='' AND lm.phase = 2 AND";
                                             break;         
                case 'phase_3': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.phase = 3 AND";
                                             break; 
                case 'phase_4': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.phase = 4 AND";
                                             break; 
                case 'phase_0': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email !='' AND lm.phase = 0 AND";
                                             break;                              
                case 'hot_month_looks': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.status='hot' AND";
                                             break;
                case 'hot_month_looks_sale': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.status='hot' AND lm.email IN(select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id ) AND";
                                             break;
                case 'warm_month_looks': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.status='warm' AND";
                                             break;
                case 'warm_month_looks_sale': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.status='warm' AND lm.email IN(select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id ) AND";
                                             break;
                case 'cold_month_looks': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.status='cold' AND";
                                             break;
                case 'cold_month_looks_sale': $where = "DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.status='cold' AND lm.email IN(select email_id from order_details where DATE(date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') GROUP BY email_id ) AND";
                                             break;
                case 'hot_month_looks_all': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status in ('hot') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}' AND ";
                                            }
                                            break;
                case 'hot_month_looks_72hrs': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status in ('hot') AND DATE(lm.created) <= DATE(CURDATE()-INTERVAL 3 DAY) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}' AND ";
                                            }
                                            break;
                case 'warm_month_looks_all': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status in ('warm') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}' AND ";
                                            }
                                            break;
                case 'warm_month_looks_7days': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status in ('warm') AND DATE(lm.created) <= DATE(CURDATE()-INTERVAL 7 DAY) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}' AND ";
                                            }
                                            break;
                case 'cold_month_looks_all': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status in ('cold') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}'AND ";
                                            }
                                            break;
                case 'hot_downgrade90days': $where = "lm.status != 'hot' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.sub_status IN ('To Pay','Pay Later','Link Shared') AND lm.status NOT IN ('hot','spam','completed')AND";
                                             break;
                case 'warm_downgrade90days': $where = "lm.status != 'warm' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.sub_status IN ('Need Convincing','Not Comfortable Online','Build faith/trust','Price Sensitive','Rate Shared') AND lm.status NOT IN ('warm','spam','completed')  AND";
                                             break;
                case 'cold_downgrade90days': $where = "lm.status != 'cold' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.sub_status IN ('Not interested','Doing plan some where else','Just for knowledge','Unr(Un responsive)','Discard,Others') AND lm.status NOT IN ('cold','spam','completed') AND";
                                             break;             
                case 'hot_downgrade90days_all': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status NOT IN  ('hot') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}' AND ";
                                            }
                                            break;                 
                case 'warm_downgrade90days_all': if(@$parameters_arr[1]!=""){
                                                $para_str = "";
                                                $para_str = str_replace("_", " ",$parameters_arr[1]);
                                                $where = "lm.status NOT IN ('warm') AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                                AND lm.phone NOT IN(SELECT phone FROM registries WHERE user_status = 'Active')
                                                AND lm.sub_status = '{$para_str}' AND ";
                                            }
                                            break; 
                // avinash code for sales manager 28-09-2021 end 
                case 'self_fu_tdy':          $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.fu_date) = CURDATE() AND ";
                                             break;
                case 'self_fu_mnth':         $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.fu_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                             break;
                case 'self_cnsltn_tdy':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(la.key_insight_date) = CURDATE() AND ";
                                             break;
                case 'self_cnsltn_mnth':     $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(la.key_insight_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                             break;
                case 'total_cnsltn_done':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(key_insight_date) != '0000-00-00' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'hot'  :   if(@$parameters_arr[1]!=""){
                                    $para_str = "";
                                    $para_str = str_replace("_", " ",$parameters_arr[1]);
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.status in ('hot') 
                                        AND lm.email NOT IN(SELECT email_id
                                               FROM   order_details
                                               WHERE  program_status IN( 0, 1, 2, 4 ))
                                        AND lm.phone NOT IN(SELECT phone
                                                   FROM   registries
                                                   WHERE  user_status = 'Active')
                                        AND lm.sub_status = '{$para_str}' AND ";
                                }else{
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='hot'  AND lm.email NOT IN(SELECT email_id FROM order_details GROUP BY email_id) AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                    // $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='hot'  AND lm.email NOT IN(SELECT email_id FROM   order_details WHERE  program_status IN( 1,2))
                                    //             AND lm.phone NOT IN(SELECT phone FROM   registries  WHERE  user_status = 'Active') AND ";
                                }
                                //DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND //AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                                             break;
                case'hot_overall':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='hot'  AND lm.email NOT IN(SELECT email_id FROM   order_details GROUP BY email_id) AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN(0, 1, 2, 4)) AND lm.phone NOT IN(SELECT  phone FROM registries WHERE user_status = 'Active')  AND ";                        
                                           break;  
                case 'warm'  :               
                                if(@$parameters_arr[1]!=""){
                                    $para_str = "";
                                    $para_str = str_replace("_", " ",$parameters_arr[1]);
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.status in ('warm') 
                                        AND lm.email NOT IN(SELECT email_id
                                               FROM   order_details
                                               WHERE  program_status IN( 0, 1, 2, 4 ))
                                        AND lm.phone NOT IN(SELECT phone
                                                   FROM   registries
                                                   WHERE  user_status = 'Active')
                                        AND lm.sub_status = '{$para_str}' AND ";
                                }else{
                                    // avinash comment this
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='warm'   AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND ";
                        //             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='warm'  AND lm.email NOT IN(SELECT email_id
                        //   FROM  order_details  GROUP BY email_id)) AND lm.phone NOT IN(SELECT phone FROM   registries  WHERE  user_status = 'Active') AND ";
                                }//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND //AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                                             break;
                case'warm_overall': $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='warm'   AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN(0, 1, 2, 4)) AND lm.phone NOT IN(SELECT  phone FROM registries WHERE user_status = 'Active') AND ";
                                      break; 
                case 'to_engage'  :          
                                if(@$parameters_arr[1]!=""){
                                    $para_str = "";
                                    $para_str = str_replace("_", " ",$parameters_arr[1]);
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.status in ('to engage') 
                                        AND lm.email NOT IN(SELECT email_id
                                               FROM   order_details
                                               WHERE  program_status IN( 0, 1, 2, 4 ))
                                        AND lm.phone NOT IN(SELECT phone
                                                   FROM   registries
                                                   WHERE  user_status = 'Active')
                                        AND lm.sub_status = '{$para_str}' AND ";
                                }else{
                                    // avinash comment this
                                    // $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='to engage'  AND ( od.email_id='' OR od.email_id is NULL ) AND ";
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='to engage' AND lm.email NOT IN(SELECT email_id FROM   order_details GROUP BY email_id)
                                                AND lm.phone NOT IN(SELECT phone FROM   registries  WHERE  user_status = 'Active') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                    
                                } 
                                //AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND //AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
                                             break;
                 case'to_engage_overalll': $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (SELECT status FROM lead_status_log WHERE email=lm.email ORDER BY id DESC LIMIT 1)='To Engage' AND lm.email NOT IN(SELECT email_id FROM   order_details GROUP BY email_id) AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN(0, 1, 2, 4)) AND lm.phone NOT IN(SELECT  phone FROM registries WHERE user_status = 'Active') AND ";
                                            break;
                case 'cold'  :           
                                if(@$parameters_arr[1]!=""){
                                    $para_str = "";
                                    $para_str = str_replace("_", " ",$parameters_arr[1]);
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.status in ('cold') 
                                        AND lm.email NOT IN(SELECT email_id
                                               FROM   order_details
                                               WHERE  program_status IN( 0, 1, 2, 4 ))
                                        AND lm.phone NOT IN(SELECT phone
                                                   FROM   registries
                                                   WHERE  user_status = 'Active') 
                                        AND lm.sub_status = '{$para_str}' AND ";
                                
                                }else{
                                    
                                    $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='cold'  AND ( od.email_id='' OR od.email_id is NULL ) AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND  ";
                                }   
                                //die;
                                //AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) //AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') 
                                             break;
                 case 'cold_overall'  :  $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='cold' AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN(0, 1, 2, 4)) AND lm.phone NOT IN(SELECT  phone FROM registries WHERE user_status = 'Active') AND ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                        break; 
                
                case '1' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='1' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND
                                             break;
                case '2' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='2' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND  ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND 
                                             break;
                case '3' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='3' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND  ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND
                                             break;
                case '4' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='4' AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')   AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND  ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) AND
                                            break;  
                case 'not_hs' :                   $where = " lm.phone != '' AND CHAR_LENGTH(lm.phone) > 4 AND LCASE(la.assign_to) IS NULL AND lm.created > CURDATE() - INTERVAL 30 DAY  AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) NOT IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND  ";
                                             break;                             
                case 'ld_to_cap':            $where = " lm.phone !='' AND lm.stage='".$get_parameters['stage']."' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 150 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 150 DAY AND ";
                                             break;    
                case 'ld_to_cap1':            $where = " lm.phone !='' AND lm.stage='".$get_parameters['stage']."' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 180 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 180 DAY AND ";
                                                             break;  
                case 'ld_to_cap30':            $where = " lm.phone !='' AND lm.stage='".$get_parameters['stage']."' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 30 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 30 DAY AND ";
                                                             break;                                  
                case 'ld_to_cap60':            $where = " lm.phone !='' AND lm.stage='".$get_parameters['stage']."' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 60 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 60 DAY AND ";
                                                             break;  
                case 'ld_to_cap90':            $where = " lm.phone !='' AND lm.stage='".$get_parameters['stage']."' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 90 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 90 DAY AND ";
                                                             break;  
                                             case 'ld_to_us':            $where = " lm.phone !='' AND lm.stage='".$get_parameters['stage']."' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 180 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 150 DAY AND lm.phone NOT LIKE '%+91-%' AND ";
                                             break; 
                case '1_p':                 $where = " lm.phase='1' AND LCASE(la.assign_to)='".strtolower($name)."' AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case '2_p':                 $where = " lm.phase='2' AND LCASE(la.assign_to)='".strtolower($name)."' AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case '3_p':                 $where = " lm.phase='3' AND LCASE(la.assign_to)='".strtolower($name)."' AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case '4_p':                 $where = " lm.phase='4' AND LCASE(la.assign_to)='".strtolower($name)."' AND lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case 'all':                 $where = " 1 ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;    
                case 'total_lead':                 $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;      
                case 'total_lead_completed':   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;   
                case 'total_lead_completed_assign_by_me':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' and LCASE(la.assign_from) ='".strtolower($name)."' AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'total_lead_completed_assign_by_others':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' and LCASE(la.assign_from) NOT IN ('".strtolower($name)."','') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'total_lead_remaining_assign_other':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' and LCASE(la.assign_from) NOT IN ('".strtolower($name)."','') AND lm.email NOT IN(SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;                             
                case 'total_lead_completed_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_4_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='4' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break; 
                case 'stage_4_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='4' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                // case 'stage_4_completed_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='4' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break; 
                case 'stage_4_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='4' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                // case 'stage_4_not_converted':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='4' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                
                case 'stage_4_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='4' AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                                             
                case 'unconverted_consultation':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND la.key_insight!='' AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'unconverted_hot':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND la.key_insight!='' AND lm.status='hot'  AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'unconverted_warm':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND la.key_insight!='' AND lm.status='warm'  AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'unconverted_cold':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND la.key_insight!='' AND lm.status='cold'  AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                
                // case 'stage_3_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='3' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_3_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='3' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_3_completed_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='3' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_3_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='3' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
    
                // case 'stage_3_not_converted':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='3' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_3_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='3' AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_2_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='2' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_2_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='2' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_2_completed_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='2' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_2_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='2' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_2_not_converted':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='2' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_2_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='2' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                
                
                // case 'stage_1_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='1' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                case 'stage_1_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='1' AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_1_completed_overall':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='1'  AND od.email_id!='' AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                
                case 'stage_1_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='1'  AND od.email_id!=''  AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                // case 'stage_1_not_converted':   
                //                             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='1'  AND (od.email_id='' OR od.email_id is NULL) AND lm.enquiry_from in ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                //                              $sale_condition=1;
                //                              break;
                
                case 'stage_1_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.stage='1'  AND (SELECT enquiry_from FROM lead_management WHERE email = lm.email ORDER BY id DESC LIMIT 1) IN ('Your BN Health Score Result','APP Health Score','Health Score','Free Health Score') AND lm.email NOT IN (SELECT email_id FROM order_details GROUP BY email_id) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                
                case 'phase_4_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='4' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'phase_4_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='4' AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'phase_4_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='4' AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'phase_3_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='3'  AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case 'phase_3_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='3' AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 

                case 'phase_3_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='3' AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'phase_2_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='2' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case 'phase_2_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='2' AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'phase_2_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='2' AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'phase_1_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='1' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case 'phase_1_completed_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='1'  AND od.email_id!='' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'phase_1_not_converted':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND lm.phase='1' AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break; 
                case 'no_phase':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (lm.phase='' OR lm.phase is NULL)  AND (od.email_id='' OR od.email_id is NULL) AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case 'no_phase_overall':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (lm.phase='' OR lm.phase is NULL)  AND (od.email_id='' OR od.email_id is NULL) AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                                             
                // avinash added this 
                case 'spam'  :   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='spam' AND lm.email NOT IN(SELECT email_id FROM   order_details GROUP BY email_id) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND ";
                                            //   $sale_condition=1;                             
                                                break;
                case 'spam_overall': $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='spam' AND lm.email NOT IN(SELECT email_id FROM   order_details GROUP BY email_id) AND lm.email NOT IN(SELECT email_id FROM order_details WHERE program_status IN(0, 1, 2, 4)) AND lm.phone NOT IN(SELECT  phone FROM registries WHERE user_status = 'Active') AND ";
                                                                         
                                                break;
                case 'avlble_omr_tdy':       $where = " DATE(lm.created) = CURDATE() AND lm.phone !='' AND CHAR_LENGTH(lm.phone) > 4 AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) AND";
                                             $omr = "od.userid,";
                                             $last_prog = "(SELECT CONCAT(program_name,\" (\",program_duration_days,\" days)\",\"||\",DATEDIFF(CURDATE(),extended_date),\"||\",(select weight from weight_monitor_record where email_id=od2.email_id order by wmr_id desc limit 1)) AS program_details FROM order_details od2 WHERE email_id = lm.email ORDER by extended_date desc limit 1) as  prog_detail,";
                                             $user_status = "(select user_status from registries where email_id=lm.email) as user_status,";
                                             $program_sugg = "(SELECT suggested_program FROM `bn_program_page_log` where user_id = (select user_id from registries where email_id=lm.email) GROUP by user_id ORDER by id desc  limit 1) as prog_sugg,";
                                             break;
                case 'avlble_omr_mnth':      $where = " DATE(lm.created) >= DATE(CURDATE() - INTERVAL 30 DAY)  AND lm.phone !='' AND CHAR_LENGTH(lm.phone) > 4 AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) AND ";
                                             $omr = "od.userid,";
                                             $last_prog = "(SELECT CONCAT(program_name,\" (\",program_duration_days,\" days)\",\"||\",DATEDIFF(CURDATE(),extended_date),\"||\",(select weight from weight_monitor_record where email_id=od2.email_id order by wmr_id desc limit 1),\"||\",prog_buy_amt,\"||\",payment_method,\"||\",(select weight from weight_monitor_record where email_id=od2.email_id order by wmr_id asc limit 1)) AS program_details FROM order_details od2 WHERE email_id = lm.email ORDER by extended_date desc limit 1) as  prog_detail,";
                                             $user_status = "(select CONCAT(my_wallet,\"||\",user_status) from registries where email_id=lm.email) as user_status,";
                                             $ass_snapshot = "(SELECT CONCAT(allergy,\"||\",food_aversion,\"||\",eating_habit,\"||\",med1_aliment,\"||\",other_specification) AS ass_details FROM new_assessment WHERE email_id = lm.email ORDER by created desc limit 1) as  ass_details,";
                                             
                                             $program_sugg = "(SELECT suggested_program FROM `bn_program_page_log` where user_id = (select user_id from registries where email_id=lm.email) GROUP by user_id ORDER by id desc limit 1) as prog_sugg,";
                                             break;

                default: 
                        if(!empty($get_parameters['lead_by'])){

                        }
                        
                        $where = " lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.email != '' AND ";
            }
            $date_condition = 0;
        }else{

            $where = " lm.created >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND lm.email != '' AND ";
            // $where = " la.assign_date >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  AND lm.email != '' AND ";
            $date_condition = 1;
        }
        
        if(!empty($get_parameters['df']) && !empty($get_parameters['dt'])){
            if($date_condition==1){
                $where = "";   
            }
            $from_date = date('Y-m-d',strtotime($get_parameters['df']));
            $to_date = date('Y-m-d',strtotime($get_parameters['dt']));
            $where .= " DATE(lm.created) BETWEEN '".$from_date."' AND '".$to_date."' AND "; // avinash comment this for total lead
            // $where .= " DATE(la.assign_date) BETWEEN '".$from_date."' AND '".$to_date."' AND ";
            $where .= " lm.age BETWEEN ".$get_parameters['agf']." AND ".$get_parameters['agt']." AND ";
        }
        
        // echo $where;
        // exit;
        $login_name =$this->session->balance_session['first_name'];
        if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
        
        $user_type = $this->session->balance_session['user_type'];
        if($user_type == 'mentor' || $user_type == 'sales'){
            $is_active ="lm.email NOT IN (select email_id from registries where user_status IN('Active','Onhold','Dormant','cleanseactive','notstarted')) AND";
        }else{
            $is_active ="";
        }
        $limit='';
        if(!empty($_GET['limit'])){
            $limit=' limit '. $_GET['limit'];
        }
        
        if(!empty($_GET['ocl_source']) && $_GET['ocl_source']!='other'){
            $where .=' lm.enquiry_from = "'. $_GET['ocl_source'].'" AND ';
        }elseif(!empty($_GET['ocl_source']) && $_GET['ocl_source']=='other'){
            $where .=' lm.enquiry_from NOT IN ("Your BN Health Score Result","cv","ekit","diet","blog") AND ';
        }

        $sql= "SELECT
                    MAX(lm.id) as id,
                    la.fu_note,$omr $user_status $program_sugg $last_prog $ass_snapshot
                    la.fu_other_note,
                    la.key_insight,
                    lm.profile,
                    lm.phase,
                    lm.referral_flag,
                    lm.suggested_program AS program_name,
                    lm.phone_alternate,lm.email_alternate,
                    CONCAT(lm.fname, ' ', lm.lname) AS name,
                    (
                            CASE WHEN lm.gender != '' THEN lm.gender ELSE 'NA'
                        END
                    ) AS gender,
                    (
                        CASE WHEN lm.age != '' THEN CONCAT(lm.age, ' yrs') ELSE 'NA'
                    END
                    ) AS lead_age,
                    (
                        CASE WHEN lm.height != '' THEN CONCAT(lm.height,'.',lm.inch) ELSE 'NA'
                    END
                    ) AS height,
                    lm.email,
                    lm.phone,
                    lm.country,
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
                    
                    
                    hs.body_type,hs.sleep,hs.activity,hs.smoke,hs.periods,hs.alcohol,hs.water,hs.fruits,
                    
                                        
                    
                    DATE(lm.created) AS created_date,
                    DATEDIFF(CURDATE(),lm.created) AS lead_days_ago,
                    (SELECT assign_to FROM lead_action WHERE email=lm.email order by id desc limit 1) as assign_to,
                    MAX(lm.enquiry_from) AS lead_source,
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
                    MAX(lm.status) AS lead_status,
                    MAX(lm.sub_status) AS lead_sub_status,
                    lm.weight,
                    lm.ideal_weight,
                    lm.body_mass_index,
                    lm.age,
                    lm.overall_health_score,
                    (CASE WHEN (select full_name from admin_user where admin_id=(select mentor_id from registries where email_id=lm.email limit 1)) IS NOT NULL 
                     THEN (select full_name from admin_user where admin_id=(select mentor_id from registries where email_id=lm.email limit 1))
                     ELSE 'NA' END) as omr_mentor,
                    DATE_FORMAT(la.assign_date, '%D %b %Y') as assign_date,
                    
                    lm.health_category,
                    (
                        CASE 
                        WHEN (SELECT
                                count(email_id)
                            FROM
                                order_details
                            WHERE email_id=lm.email AND program_status IN(0,1,2,4) GROUP BY email_id) > 0 THEN 'Active Client'
                        WHEN (SELECT
                                count(email_id)
                            FROM
                                order_details
                            WHERE email_id=lm.email AND program_status NOT IN(0,1,2,4) GROUP BY email_id) > 0 THEN 'OCL'
                    
                        WHEN(
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
                        ) THEN 'OLR'
                        ELSE 'NEW'
                    END
                    ) AS lead_type, CASE WHEN consultation = 1 THEN 'Yes' ELSE 'No'
                    END AS consultation,(
                        SELECT
                            GROUP_CONCAT(health_issue)
                        FROM
                            `bn_app_hs_issue`
                        WHERE
                            health_score_id = lm.id
                    ) AS health_issues,
                        CASE WHEN consultation = 1 THEN
                        (
                            CASE WHEN DATE(consultation_date)=CURDATE() THEN 'Today'
                                WHEN DATE(consultation_date)=CURDATE() + INTERVAL 1 DAY THEN 'Tomorrow'
                            ELSE CONCAT(DATE_FORMAT(consultation_date, '%D %b'),' at ',DATE_FORMAT(consultation_date, \"%h:%i %p\"),' IST')
                            
                    END 
                    ) ELSE 'NA'
                    END AS consultation_date, MAX(lm.primary_source) as primary_source 
                    FROM
                        `lead_management` lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    LEFT JOIN lead_status_log ls ON
                        lm.email = ls.email
                    LEFT JOIN order_details od ON
                        lm.email = od.email_id
                    
                    LEFT JOIN `bn_app_health_score` hs ON
                        lm.id = hs.health_score_id                
                        
                    WHERE ".$is_active."
                        ".$whrClause." ".$where." 1 $where_gcc 
                    GROUP BY
                        lm.email
                    ORDER BY
                        `lm`.`id`
                DESC $limit";
                // AND lm.email NOT IN(SELECT email_id FROM  order_details WHERE program_status IN(0,1,2,4) GROUP BY email_id)
        // echo $sql;
        //  exit;

        $query=$this->db->query($sql);
        
        // echo "<pre>";
        // print_r($query->result_array());
        // exit;

  if ($_SERVER['REMOTE_ADDR']=='103.66.96.84')
        {
            //  echo $sql;exit;
        }
        if($query->num_rows()>0)
        {
            
            $result = $query->result_array();


foreach($result as $key=>$val){


    $result[$key]['count']         = $key; 
    
    switch ($val['sleep']) {
         case '14': 
         $result[$key]['sleep']         = '6 - 9 hrs'; 
         break;
         case '12': 
        
         $result[$key]['sleep']         = '< 6 hrs Peaceful';
       break;
         case '7':  
         $result[$key]['sleep']         = '< 6 hrs Disturbed'; 
     
         break;      
         }

    switch ($val['activity']) {
         case '14': 
         $result[$key]['activity']      = 'Very Active'; 
         break;
         case '12': 
         $result[$key]['activity']      = 'Moderately'; 
       break;
         case '7':  
         $result[$key]['activity']      = 'Lightly Active';
         break;      
         case '4':  
         $result[$key]['activity']      = 'Sedentary';
         break;      
    }

    switch ($val['smoke']) {
         case '14': 
         $result[$key]['smoke']         = 'Never'; 
         break;
         case '12': 
        
         $result[$key]['smoke']         = 'Quit for 2 year'; 
       break;
         case '7':  
         $result[$key]['smoke']         = 'A few times a week'; 
         break;      
         case '4':  
         $result[$key]['smoke']         = 'More than 2 times a day'; 
     
         break;      
    }
    switch ($val['periods']) {
         case '12': 
          $result[$key]['periods']       = 'Regular'; 
        break;
         case '7':  
         $result[$key]['periods']       = 'Irregular'; 
         break;      
    }

    switch ($val['alcohol']) {
         case '14': 
         $result[$key]['alcohol']       = 'Never'; 
         break;
         case '12': 
        
         $result[$key]['alcohol']       = 'Quit since 1 year'; 
       break;
         case '7':  
         $result[$key]['alcohol']       = 'Occasionally'; 
         break;      
         case '4':  
         $result[$key]['alcohol']       = 'Daily'; 
         break;      
    }


    switch ($val['water']) {
         case '14': 
         $result[$key]['water']         = '12 > glasses'; 
         break;
         case '12': 
        
         $result[$key]['water']         = '6 - 12 glasses'; 
       break;
         case '7':  
         $result[$key]['water']         = '4 - 6 glasses'; 
     
         break;      
         case '4':  
         $result[$key]['water']         = '< 4 glasses'; 
         break;      
    }

 switch ($val['fruits']) {
         case '14': 
         $result[$key]['fruits']        = '4 > servings'; 
         break;
         case '12':      
         $result[$key]['fruits']        = '3 - 4 servings'; 
       break;
         case '7':  
         $result[$key]['fruits']        = '1 - 2 servings'; 
     
         break;      
         case '4':  
         $result[$key]['fruits']        = ''; 
     
         break;      
    }

   

}


      
            return $result;

            
        }else{
            return [];
        }

        /* function get_lead_details_data_query : ends here   */
    
        
    }
    public function getPreviousProgramsData($user_id){
    
        $sql ='SELECT order_id,user_status,program_name,(SELECT IFNULL(comment,"Not Filled") as comment FROM `bn_my_goals` where goal_type=3 and order_id=od.order_id and user_id = "'.$user_id.'" order by id desc limit 1) as goal_set,(SELECT comment FROM `bn_my_goals` where goal_type=2 and order_id=od.order_id and user_id = "'.$user_id.'" order by id desc limit 1) as goal_achived,(SELECT comment FROM `bn_my_goals` where goal_type=1 and order_id=od.order_id and user_id = "'.$user_id.'" order by id desc limit 1) as milestone,(SELECT weight FROM `weight_monitor_record` where order_id=od.order_id and user_id = "'.$user_id.'" order by wmr_id desc limit 1) as wt,(SELECT TRUNCATE(SUM(diffrence), 2) FROM `weight_monitor_record` where order_id=od.order_id and user_id = "'.$user_id.'") AS wt_diff,program_session,amount,payment_method,DATE_FORMAT(date,"%d %b %Y") as date,DATE_FORMAT(extended_date,"%d %b %Y") as extended_date FROM order_details od WHERE userid='.$user_id;
    
        $data[]=$this->query->getRecords($sql);
        return $data; 
    
    
    }
    public function getkeyinsightsData($user_id){
    
        $sql ='SELECT program as program_name,(SELECT note FROM `client_key_insight` ck1 WHERE user_id='.$user_id.' AND source ="key_insight" ORDER BY `ck1`.`id` DESC limit 1)as insight,(SELECT note FROM `client_key_insight` ck1 WHERE user_id='.$user_id.' AND source ="welcome-call" ORDER BY `ck1`.`id` DESC limit 1)as wc,(SELECT note FROM `client_key_insight` ck1 WHERE user_id='.$user_id.' AND source ="feedback-call" ORDER BY `ck1`.`id` DESC limit 1)as hc,(SELECT note FROM `client_key_insight` ck1 WHERE user_id='.$user_id.' AND source ="progress-call" ORDER BY `ck1`.`id` DESC limit 1)as fc,source,(select full_name from admin_user where admin_id=mentor_id) as mentor FROM `client_key_insight` ck WHERE user_id='.$user_id.' AND source in ("feedback-call","welcome-call","progress-call") group by ck.order_id ORDER BY `ck`.`id` DESC';
    
        $data[]=$this->query->getRecords($sql);
        return $data; 
    
    
    }
    public function get_order_history_data_query($get_parameters = false)
    {
        $where = "";
        $pramsClause = "1";
        if(!empty(@$get_parameters['df']) && !empty(@$get_parameters['dt'])){
            $pramsClause = "";
            $from_date = date('Y-m-d',strtotime($get_parameters['df']));
            $to_date = date('Y-m-d',strtotime($get_parameters['dt']));
            $where .= " DATE(od.date) BETWEEN '".$from_date."' AND '".$to_date."' AND ";
            $where .= " lm.age BETWEEN ".$get_parameters['agf']." AND ".$get_parameters['agt']." ";
            if(!empty(@$get_parameters['name_email'])){
                $pramsClause .= " AND ( lm.fname LIKE '%".$get_parameters['name_email']."%' OR lm.lname LIKE '%".$get_parameters['name_email']."%' OR lm.name LIKE '%".$get_parameters['name_email']."%' OR lm.email LIKE '%".$get_parameters['name_email']."%' )";
            }

            if(!empty(@$get_parameters['method'])){
                $pramsClause .= " AND ( od.payment_method LIKE '%".$get_parameters['method']."%' )";
            }

            if($pramsClause!=""){
                $where = $where.$pramsClause;
            }
        }else{
            if(!empty(@$get_parameters['name_email'])){
                $pramsClause .= " AND ( lm.fname LIKE '%".$get_parameters['name_email']."%' OR lm.lname LIKE '%".$get_parameters['name_email']."%' OR lm.name LIKE '%".$get_parameters['name_email']."%' OR lm.email LIKE '%".$get_parameters['name_email']."%' )";
            }

            if(!empty(@$get_parameters['method'])){
                $pramsClause .= " AND ( od.payment_method LIKE '%".$get_parameters['method']."%' )";
            }

            if($pramsClause!="1"){
                $where = $where.$pramsClause;
            }else{
                $where = " 1 AND DATE(od.date) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
            }
            
        }
        $login_name =$this->session->balance_session['first_name'];
            if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
        

        
        $sql= "SELECT od.order_type,
                   lm.id,
                   lm.enquiry_from,
                   lm.utm_source,
                   lm.age,
                   lm.created AS enquiry_date,
                   lm.email,
                   la2.assign_to,
                   lm.phone_alternate,lm.email_alternate,
                   od.*,
                   r.first_name,
                   r.last_name,
                   r.gender,
                   ad_u.first_name as mentor_first_name,
                   ad_u.last_name as mentor_last_name,
                   (SELECT mobile_no1
                    FROM   billing_details
                    WHERE  mobile_no1 != ''
                           AND user_id = r.id
                    LIMIT  1) AS mobile_no1
            FROM   order_details od
                   INNER JOIN registries AS r
                           ON r.id = od.userid
                   LEFT JOIN lead_management lm
                          ON lm.email = od.email_id
                   LEFT JOIN lead_action la2
                          ON la2.email = od.email_id
                   LEFT JOIN admin_user ad_u
                          ON ad_u.admin_id = r.mentor_id
                WHERE ".$where." $where_gcc
            GROUP  BY od.order_id
            ORDER  BY order_id DESC";//die;
        

        $query=$this->db->query($sql);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
        /* function get_lead_details_data_query : ends here   */
    }
    
    
   public function  get_spin_history_data_query($get_parameters = false){
       
        $login_name =$this->session->balance_session['first_name'];
       
        $sql="SELECT
    lm.id,
    lm.fname,
    lm.gender,
    lm.email,
    lm.email_alternate,
    lm.phone_alternate,
    lm.phone,
    lm.country,
    lm.primary_source,
    lc.Prize,
   DATE_FORMAT( lc.date_created, '%d-%m-%Y') as date_created,
    lm.lead_type,
    max(la.assign_to)
FROM
    leadclient lc
JOIN lead_management lm ON
    lc.phone =
REPLACE
    (lm.phone, '-', '')
LEFT JOIN lead_action la ON
    lm.email = la.email
WHERE
   lm.phone != ''  AND CHAR_LENGTH(lm.phone) > 4 and lc.prize IS NOT NULL and LCASE(la.assign_to) ='".strtolower($login_name)."'
GROUP BY
    lm.email
    order by lc.id desc
    ";
       
         $query=$this->db->query($sql);
         
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
   }

public function  get_spin_all_data_query($get_parameters = false){
       
        $login_name =$this->session->balance_session['first_name'];
       
        $sql="SELECT
    lm.id,
    lm.fname,
    lm.gender,
    lm.email,
    lm.email_alternate,
    lm.phone_alternate,
    lm.phone,
    lm.country,
    lm.primary_source,
    lc.Prize,
   DATE_FORMAT( lc.date_created, '%d-%m-%Y') as date_created,
    lm.lead_type,
    max(la.assign_to) as assign
FROM
    leadclient lc
JOIN lead_management lm ON
    lc.phone =
REPLACE
    (lm.phone, '-', '')
LEFT JOIN lead_action la ON
    lm.email = la.email
WHERE
   lm.phone != ''  AND CHAR_LENGTH(lm.phone) > 4 and lc.prize IS NOT NULL 
   GROUP BY
    lm.email
    order by lc.id desc
    ";
       
         $query=$this->db->query($sql);
         
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return [];
        }
   }


    public function get_order_history_data_query__($get_parameters,$searchValue,$columnSortOrder,$columnName,$row,$rowperpage)
    {
        $where = '';$sale_condition=0; 
        $name = $_SESSION['balance_session']['first_name'];
        //Added By Navin Start
        $whrClause = "";
        $stage_count = intval(@$get_parameters['stage']);
        if($stage_count != 0){
            switch($stage_count){      
                case 1:      
                    $whrClause = "  lm.stage = 1 AND ";     
                    break;      
                case 2:      
                    $whrClause = "  lm.stage = 2 AND ";       
                    break;      
                case 3:      
                    $whrClause = "  lm.stage = 3 AND ";    
                    break; 
                case 4:      
                    $whrClause = "  lm.stage = 4 AND ";    
                    break; 
                default:      
                    $whrClause = "";     
            }//switch($stage_count){
        }else{
            $whrClause = "";
        }//if($stage_count != 0){
        //Added By Navin END
    // BS leads
        if(!empty($get_parameters) && !empty($get_parameters['lead_by']) && $get_parameters['lead_by']=='bs'){
            //echo $get_parameters['bs_assign'];exit;
            if(@$get_parameters['bs_assign']=='0'){ //echo 'if:';exit;
                $where_condition = " AND od.email_id IN(SELECT email FROM lead_action WHERE LCASE(`assign_to`) = '".strtolower($name)."' GROUP BY email) ";
            }else{
                $where_condition = " AND od.email_id NOT IN(SELECT email FROM lead_action WHERE `assign_to` != '' GROUP BY email) ";
            }
            if(!empty($get_parameters['dys'])){
                if($get_parameters['dys']==7){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 7 DAY) AND CURDATE() AND ";
                }elseif($get_parameters['dys']==15){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 15 DAY) AND (CURDATE() - INTERVAL 7 DAY) AND ";
                }elseif($get_parameters['dys']==30){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 30 DAY) AND (CURDATE() - INTERVAL 15 DAY) AND ";
                }elseif($get_parameters['dys']==90){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 90 DAY) AND (CURDATE() - INTERVAL 30 DAY) AND ";
                }
            }else{
                $days_between = " DATE(od.date) >= (CURDATE() - INTERVAL 30 DAY) AND ";
            }
            $login_name =$this->session->balance_session['first_name'];
            if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
                }else{
                    $where_gcc='';
                }
            
            $sql= "SELECT CONCAT(rg.first_name,' ',rg.last_name) as name,lm.enquiry_from AS lead_source,lm.status AS lead_status,
                        CONCAT(lm.fname, ' ', lm.lname) AS name,
                                (
                                        CASE WHEN lm.gender != '' THEN lm.gender ELSE 'NA'
                                    END
                                ) AS gender,
                                (
                                    CASE WHEN lm.age != '' THEN CONCAT(lm.age, ' yrs') ELSE 'NA'
                                END
                                ) AS lead_age,
                                (
                                    CASE WHEN lm.height != '' THEN CONCAT(lm.height,'.',lm.inch) ELSE 'NA'
                                END
                                ) AS height,
                                mobile_verified AS verify,
                                DATE(lm.created) AS created_date,
                                rg.phone,lm.phone_alternate,lm.email_alternate,userid,od.email_id as email,program_name,prog_duration,program_duration_days,
                                (SELECT TRUNCATE(SUM(diffrence),2) as diff FROM `weight_monitor_record` where order_id =od.order_id) wt_diff,
                            (select full_name from admin_user where admin_id=rg.mentor_id)as mentor,
                            (select assign_to from lead_action where email=lm.email GROUP by email)as assign_to 
            FROM `order_details` od 
            LEFT JOIN registries rg ON od.userid=rg.id 
            LEFT JOIN lead_management lm ON od.email_id = lm.email      
            WHERE ".$whrClause." ".$days_between." `program_type`=1 and od.email_id !='' 
            AND od.email_id not in (select email_id from order_details where `program_type`=0 GROUP by email_id)
            ".$where_condition." $where_gcc GROUP by od.email_id ";
            //echo $sql;
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
            exit;
        }
 // LEAD and OMR       
        if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
            $interval = date('Y-m-d',strtotime('-30 days'));
            $todays_date = date('Y-m-d');
                $year = date('Y');
                $month = date('m');
            switch($get_parameters['lead_by']){
                case 'lds_avlble_tdy':       $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and DATE(lms.created) = CURDATE() and las.assign_to !='' GROUP BY lms.email ) AND DATE(lm.created) = CURDATE() ";
                                             $sale_condition=1;
                                             break;
                case 'lds_avlble_mnth':      $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and DATE(lms.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') and las.assign_to !='' GROUP BY lms.email ) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             $sale_condition=1;
                                             break;
                case 'frsh_lds_avlble_tdy':  $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND lm.id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND DATE(lm.created) = CURDATE() ";
                                             $sale_condition=1;                
                                             break;
                case 'old_lds_avlble_tdy':   $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) AND DATE(lm.created) = CURDATE() ";
                                             $sale_condition=1;
                                             break;
                case 'frsh_lds_avlble_mnth': $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND lm.id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             $sale_condition=1;
                                             break;
                case 'old_lds_avlble_mnth':  $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) AND lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             $sale_condition=1;
                                             break;
                case 'avlble_omr_tdy':       $where = " DATE(lm.created) = CURDATE() AND lm.phone !='' AND CHAR_LENGTH(lm.phone) > 4 AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) ";
                                             break;
                case 'avlble_omr_mnth':      $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.phone !='' AND CHAR_LENGTH(lm.phone) > 4 AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) ";
                                             break;                             
                case 'assgn_self_tdy':       $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND DATE(la.assign_date) = CURDATE()  ";
                                             break;
                // avinash comment this
                // case 'assgn_self_mnth':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND la.assign_date > DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
                //                              break;
                case 'assgn_self_mnth':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND DATE(la.assign_date) >= DDATE_FORMAT(CURDATE(), '%Y-%m-01')";
                                              break;
                
                case 'assgn_by_othrs_tdy':   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND DATE(la.assign_date) = CURDATE()  ";
                                             break;
                case 'assgn_by_othrs_mnth':  $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND la.assign_date >= DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
                                             break;
                // avinash pandey added this
                // case 'assgn_by_othrs_mnth':  
                //             $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND DATE(la.assign_date) >= '".$interval."' AND DATE(la.assign_date) <= '".$todays_date."' AND ";
                //             break;
                case 'self_fu_tdy':          $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.fu_date) = CURDATE()  ";
                                             break;
                case 'self_fu_mnth':         $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.fu_date) > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             break;
                case 'self_cnsltn_tdy':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(la.key_insight_date) = CURDATE()  ";
                                             break;
                case 'self_cnsltn_mnth':     $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(la.key_insight_date) >=DATE_FORMAT(CURDATE(), '%Y-%m-01') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
                                             break;
                case 'total_cnsltn_done':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND la.key_insight != '' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'hot'  :                $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='hot' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                                             break;
                case 'warm'  :               $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='warm'  ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                                             break;
                case 'to_engage'  :          $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='to engage' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                                             break;
                case 'cold'  :               $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='cold' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                                             break;  
                case 'spam'  :               $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='spam' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;                             
                                             break;                             
                case '1' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='1' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                                             break;
                case '2' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='2' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                                             break;
                case '3' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='3' AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case '4' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='4'  AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;
                case '0' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='0'  AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";//AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)
                                             $sale_condition=1;                             
                                             break;                             
                case 'ld_to_cap':            $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 150 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 150 DAY ";
                                             $sale_condition=1;
                                             break;  
                case 'assigned':            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.assign_date) = CURDATE() ";
                                             $sale_condition=1;
                                             break; 
                case 'followup':            $where = " DATE(fu_date)=CURDATE() AND (assign_to='{$name}' OR fu_assigned='{$name}') ";
                                             $sale_condition=1;
                                             break;  
                case 'consultation':            $where = " DATE(key_insight_date)=CURDATE() AND LCASE(assign_to)='".strtolower($name)."' ";
                                             $sale_condition=1;
                                             break; 
                case 'todayhot':            $where = " lm.status='hot' AND ls.status='hot' AND DATE(ls.created)=CURDATE() 
                        AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                        AND LCASE(la.assign_to)='".strtolower($name)."'";
                                             $sale_condition=1;
                                             break;    
                case '1_p':                 $where = " lm.phase='1' AND LCASE(la.assign_to)='".strtolower($name)."'";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case '2_p':                 $where = " lm.phase='2' AND LCASE(la.assign_to)='".strtolower($name)."'";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case '3_p':                 $where = " lm.phase='3' AND LCASE(la.assign_to)='".strtolower($name)."'";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case '4_p':                 $where = " lm.phase='4' AND LCASE(la.assign_to)='".strtolower($name)."'";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;  
                case 'all':                 $where = " 1 ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;                               
                default: $where = " lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
            }
            $date_condition = 0;
        }else{
            $where = " lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
            $date_condition = 1;
            $sale_condition=1;
        }
        
        if(!empty($get_parameters['df']) && !empty($get_parameters['dt'])){
            if($date_condition==1){
                $where = "";   
            }else{
                $where .= " AND ";   
            }
            $from_date = date('Y-m-d',strtotime($get_parameters['df']));
            $to_date = date('Y-m-d',strtotime($get_parameters['dt']));
            $where .= " (DATE(lm.created) BETWEEN '".$from_date."' AND '".$to_date."') ";
            $where .= " AND (CAST(lm.age AS UNSIGNED) BETWEEN '".$get_parameters['agf']."' AND '".$get_parameters['agt']."') ";
        }
        
        if($sale_condition==1){
            $where .= " AND lm.email NOT IN(
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
                    ";
        }
        
        //echo $where;exit;
        //(CASE WHEN lm.enquiry_from!='consultation' THEN lm.profile ELSE '( Website Form Consultation )' END ) AS profile,
        if($searchValue != ''){
            $searchQuery = " 
                    AND (
                        la.fu_note like '%".$searchValue."%' 
                        or la.fu_other_note like '%".$searchValue."%' 
                        or la.key_insight like'%".$searchValue."%' 
                        or lm.email like'%".$searchValue."%' 
                        or lm.phone like'%".$searchValue."%' 
                        or lm.country like'%".$searchValue."%' 
                        or lm.coustagentry like'%".$searchValue."%' 
                        or lm.fname like'%".$searchValue."%' 
                        or lm.gender like'%".$searchValue."%' 
                        or lm.age like'%".$searchValue."%' 
                        or lm.phone like'%".$searchValue."%' 
                        or lm.status like'%".$searchValue."%' 
                        or lm.sub_status like'%".$searchValue."%' 
                        or lm.weight like'%".$searchValue."%' 
                        or lm.ideal_weight like'%".$searchValue."%' 
                        or lm.body_mass_index like'%".$searchValue."%'
                        or lm.overall_health_score like'%".$searchValue."%' 
                        or la.key_insight like'%".$searchValue."%' 
                        or la.fu_note like'%".$searchValue."%' 
                    ) 
                ";
        }
        $login_name =$this->session->balance_session['first_name'];
        if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
        $sql= "SELECT
                    lm.id,
                    
                    la.fu_note,
                    la.fu_other_note,
                    la.key_insight,
                    lm.profile,
                    lm.phone_alternate,lm.email_alternate,
                    (CASE WHEN lm.fname!='' THEN CONCAT(lm.fname, ' ', lm.lname) ELSE lm.name END ) AS name,
                    (CASE WHEN lm.gender != '' THEN lm.gender ELSE 'NA' END ) AS gender,
                    (CASE WHEN lm.age != '' THEN CONCAT(lm.age, ' yrs') ELSE 'NA' END ) AS lead_age,
                    (CASE WHEN lm.height != '' THEN CONCAT(lm.height,'.',lm.inch) ELSE 'NA' END ) AS height,
                    lm.email,
                    lm.phone,
                    lm.country,
                    lm.stage,
                    (CASE WHEN lm.body_mass_index != '' OR lm.body_mass_index IS NOT NULL THEN 'Yes' ELSE 'No' END ) AS bmi,
                    (CASE WHEN LENGTH(lm.phone) > 4 THEN 'Yes' ELSE 'No' END ) AS phone_no,
                    mobile_verified AS verify,
                    DATE(lm.created) AS created_date,
                    (SELECT assign_to FROM lead_action WHERE email=lm.email order by id desc limit 1) as assign_to,
                    (CASE WHEN (SELECT enquiry_from FROM lead_management WHERE email = lm.email AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') LIMIT 1)
                    IS NOT NULL THEN (SELECT enquiry_from FROM lead_management WHERE email = lm.email AND DATE(created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') LIMIT 1)
                    ELSE enquiry_from
                    END ) AS lead_source,
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
                    lm.sub_status AS lead_sub_status,
                    lm.weight,
                    lm.ideal_weight,
                    lm.body_mass_index,
                    lm.age,
                    lm.overall_health_score,
                    (CASE WHEN (select full_name from admin_user where admin_id=(select mentor_id from registries where email_id=lm.email limit 1)) IS NOT NULL 
                     THEN (select full_name from admin_user where admin_id=(select mentor_id from registries where email_id=lm.email limit 1))
                     ELSE 'NA' END) as omr_mentor,
                    DATE_FORMAT(la.assign_date, '%D %b %Y') as assign_date,
                    lm.health_category,
                    (
                        CASE 
                        WHEN (SELECT
                                count(email_id)
                            FROM
                                order_details
                            WHERE email_id=lm.email AND program_status IN(0,1,2,4) GROUP BY email_id) > 0 THEN 'Active Client'
                        WHEN (SELECT
                                count(email_id)
                            FROM
                                order_details
                            WHERE email_id=lm.email AND program_status NOT IN(0,1,2,4) GROUP BY email_id) > 0 THEN 'OCL'
                    
                        WHEN(
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
                        ) THEN 'OLR'
                        ELSE 'NEW'
                    END
                    ) AS lead_type, CASE WHEN consultation = 1 THEN 'Yes' ELSE 'No'
                    END AS consultation,(
                        SELECT
                            GROUP_CONCAT(health_issue)
                        FROM
                            `bn_app_hs_issue`
                        WHERE
                            health_score_id = lm.id
                    ) AS health_issues,
                        CASE WHEN consultation = 1 THEN
                        (
                            CASE WHEN (SELECT CONCAT(DATE_FORMAT(call_date, '%D %b'),' ',time_slot) FROM bn_consultation_call_booking WHERE lead_id = lm.id GROUP BY lead_id) != '' 
                                OR (SELECT CONCAT(DATE_FORMAT(call_date, '%D %b'),' ',time_slot) FROM bn_consultation_call_booking WHERE lead_id = lm.id GROUP BY lead_id) IS NOT NULL 
                                    THEN (SELECT CONCAT(DATE_FORMAT(call_date, '%D %b'),' ',time_slot) FROM bn_consultation_call_booking WHERE lead_id = lm.id GROUP BY lead_id) 
                                ELSE ''
                    END 
                    ) ELSE 'NA'
                    END AS consultation_date,
                    la.key_insight as key_insight,
                    la.fu_note as fu_note
                    FROM
                        `lead_management` lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    LEFT JOIN lead_status_log ls ON
                        lm.email = ls.email
                    WHERE
                        ".$whrClause." ".$where." ".$searchQuery." $where_gcc
                    GROUP BY
                        lm.email
                    ORDER BY
                        `lm`.`id`
                DESC limit ".$row.",".$rowperpage;
         //echo $sql;exit;
        
        $query=$this->db->query($sql);
        
     
        // echo "<pre>";
        // print_r($query->result_array());
        // exit;

        if($query->num_rows()>0)
        {
            return $query->result_array();
            //return $sql;
        }else{
            return [];
        }
        
        
        /* function get_lead_details_data_query : ends here   */
    }
    public function get_lead_count_total($get_parameters,$searchValue,$columnSortOrder,$columnName,$row,$rowperpage)
    {
        $where = '';$sale_condition=0; 
        $name = $_SESSION['balance_session']['first_name'];
        //Added By Navin Start
        $whrClause = "";
        $stage_count = intval(@$get_parameters['stage']);
        if($stage_count != 0){
            switch($stage_count){      
                case 1:      
                    $whrClause = "  lm.stage = 1 AND ";     
                    break;      
                case 2:      
                    $whrClause = "  lm.stage = 2 AND ";       
                    break;      
                case 3:      
                    $whrClause = "  lm.stage = 3 AND ";    
                    break; 
                case 4:      
                    $whrClause = "  lm.stage = 4 AND ";    
                    break; 
                default:      
                    $whrClause = "";     
            }//switch($stage_count){
        }else{
            $whrClause = "";
        }//if($stage_count != 0){
        //Added By Navin END
    // BS leads
        if(!empty($get_parameters) && !empty($get_parameters['lead_by']) && $get_parameters['lead_by']=='bs'){
            //echo $get_parameters['bs_assign'];exit;
            if(@$get_parameters['bs_assign']=='0'){ //echo 'if:';exit;
                $where_condition = " AND od.email_id IN(SELECT email FROM lead_action WHERE LCASE(`assign_to`) = '".strtolower($name)."' GROUP BY email) ";
            }else{
                $where_condition = " AND od.email_id NOT IN(SELECT email FROM lead_action WHERE `assign_to` != '' GROUP BY email) ";
            }
            if(!empty($get_parameters['dys'])){
                if($get_parameters['dys']==7){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 7 DAY) AND CURDATE() AND ";
                }elseif($get_parameters['dys']==15){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 15 DAY) AND (CURDATE() - INTERVAL 7 DAY) AND ";
                }elseif($get_parameters['dys']==30){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 30 DAY) AND (CURDATE() - INTERVAL 15 DAY) AND ";
                }elseif($get_parameters['dys']==90){
                    $days_between = " DATE(od.date) BETWEEN (CURDATE() - INTERVAL 90 DAY) AND (CURDATE() - INTERVAL 30 DAY) AND ";
                }
            }else{
                $days_between = " DATE(od.date) >= (CURDATE() - INTERVAL 30 DAY) AND ";
            }
            $login_name =$this->session->balance_session['first_name'];
            if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
            $sql= "SELECT CONCAT(rg.first_name,' ',rg.last_name) as name,lm.enquiry_from AS lead_source,lm.status AS lead_status,
                        CONCAT(lm.fname, ' ', lm.lname) AS name,
                                (
                                        CASE WHEN lm.gender != '' THEN lm.gender ELSE 'NA'
                                    END
                                ) AS gender,
                                (
                                    CASE WHEN lm.age != '' THEN CONCAT(lm.age, ' yrs') ELSE 'NA'
                                END
                                ) AS lead_age,
                                (
                                    CASE WHEN lm.height != '' THEN CONCAT(lm.height,'.',lm.inch) ELSE 'NA'
                                END
                                ) AS height,
                                mobile_verified AS verify,
                                DATE(lm.created) AS created_date,
                                rg.phone,userid,od.email_id as email,program_name,prog_duration,
                                (SELECT TRUNCATE(SUM(diffrence),2) as diff FROM `weight_monitor_record` where order_id =od.order_id) wt_diff,
                            (select full_name from admin_user where admin_id=rg.mentor_id)as mentor,
                            (select assign_to from lead_action where email=lm.email GROUP by email)as assign_to 
            FROM `order_details` od 
            LEFT JOIN registries rg ON od.userid=rg.id 
            LEFT JOIN lead_management lm ON od.email_id = lm.email      
            WHERE ".$whrClause." ".$days_between." `program_type`=1 and od.email_id !='' 
            AND od.email_id not in (select email_id from order_details where `program_type`=0 GROUP by email_id)
            ".$where_condition." $where_gcc GROUP by od.email_id ";
            //echo $sql;
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
            exit;
        }
 // LEAD and OMR       
        if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
            $interval = date('Y-m-d',strtotime('-30 days'));
            $todays_date = date('Y-m-d');
                $year = date('Y');
                $month = date('m');
            switch($get_parameters['lead_by']){
                case 'lds_avlble_tdy':       $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and DATE(lms.created) = CURDATE() and las.assign_to !='' GROUP BY lms.email ) AND DATE(lm.created) = CURDATE() ";
                                             $sale_condition=1;
                                             break;
                case 'lds_avlble_mnth':      $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and DATE(lms.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') and las.assign_to !='' GROUP BY lms.email ) AND DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             $sale_condition=1;
                                             break;
                case 'frsh_lds_avlble_tdy':  $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND lm.id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND DATE(lm.created) = CURDATE() ";
                                             $sale_condition=1;                
                                             break;
                case 'old_lds_avlble_tdy':   $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) AND DATE(lm.created) = CURDATE() ";
                                             $sale_condition=1;
                                             break;
                case 'frsh_lds_avlble_mnth': $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND lm.id NOT IN (SELECT id FROM lead_management ldm WHERE (SELECT DATE(created) FROM lead_management WHERE email = ldm.email AND id != ldm.id ORDER BY id DESC LIMIT 1) < (DATE(ldm.created) - INTERVAL 30 DAY) AND ldm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01')) AND lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             $sale_condition=1;
                                             break;
                case 'old_lds_avlble_mnth':  $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.stage='".$get_parameters['stage']."' AND (SELECT DATE(created) FROM lead_management WHERE email = lm.email AND id != lm.id ORDER BY id DESC LIMIT 1) < (DATE(lm.created) - INTERVAL 30 DAY) AND lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             $sale_condition=1;
                                             break;
                case 'avlble_omr_tdy':       $where = " DATE(lm.created) = CURDATE() AND lm.phone !='' AND CHAR_LENGTH(lm.phone) > 4 AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) ";
                                             break;
                case 'avlble_omr_mnth':      $where = " DATE(lm.created) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') AND lm.phone !='' AND CHAR_LENGTH(lm.phone) > 4 AND lm.email IN (select email_id from order_details where program_status NOT IN(0,1,2,4)) AND lm.email NOT IN (select email_id from order_details where program_status IN ('1','4')) AND la.assign_date < (select DATE(created) from lead_management where email=lm.email order by id desc limit 1) ";
                                             break;                             
                case 'assgn_self_tdy':       $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND DATE(la.assign_date) = CURDATE()  ";
                                             break;
                // avinash comment this
                // case 'assgn_self_mnth':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND la.assign_date > DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
                //                              break;
                case 'assgn_self_mnth':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) IN ('".strtolower($name)."','') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01')";
                                             break;
                
                case 'assgn_by_othrs_tdy':   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND DATE(la.assign_date) = CURDATE()  ";
                                             break;
                case 'assgn_by_othrs_mnth':  $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(la.assign_from) NOT IN('".strtolower($name)."','') AND la.assign_date >=DATE_FORMAT(CURDATE(), '%Y-%m-01')  ";
                                             break;
                case 'self_fu_tdy':          $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.fu_date) = CURDATE()  ";
                                             break;
                case 'self_fu_mnth':         $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.fu_date) > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             break;
                case 'self_cnsltn_tdy':      $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(la.key_insight_date) = CURDATE()  ";
                                             break;
                case 'self_cnsltn_mnth':     $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND (la.key_insight != '' OR la.key_insight IS NOT NULL) AND DATE(la.key_insight_date) >=DATE_FORMAT(CURDATE(), '%Y-%m-01') AND DATE(la.assign_date) >= DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
                                             break;
                case 'total_cnsltn_done':   
                                            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND la.key_insight != '' AND ";//AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                                             $sale_condition=1;
                                             break;
                case 'hot'  :                $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='hot' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             break;
                case 'warm'  :               $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='warm' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             break;
                case 'to_engage'  :          $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='to engage' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             break;
                case 'cold'  :               $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='cold' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             
                                             break;  
                case 'spam'  :               $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.status)='spam' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;                             
                                             break;                             
                case '1' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='1' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             break;
                case '2' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='2' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             break;
                case '3' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='3' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY)  ";
                                             $sale_condition=1;
                                             break;
                case '4' :                   $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND LCASE(lm.stage)='4' AND DATE(lm.created) >= (CURDATE() - INTERVAL 30 DAY) ";
                                             $sale_condition=1;
                                             break;                             
                case 'ld_to_cap':            $where = " lm.phone !='' and CHAR_LENGTH(lm.phone) > 4 and lm.email not in ( SELECT lms.email FROM lead_management lms,lead_action las WHERE lms.email=las.email and lms.created > CURDATE() - INTERVAL 150 DAY and las.assign_to !='' GROUP BY lms.email ) AND lm.created > CURDATE() - INTERVAL 150 DAY ";
                                             $sale_condition=1;
                                             break;  
                case 'assigned':            $where = " LCASE(la.assign_to) ='".strtolower($name)."' AND DATE(la.assign_date) = CURDATE() ";
                                             $sale_condition=1;
                                             break; 
                case 'followup':            $where = " DATE(fu_date)=CURDATE() AND (assign_to='{$name}' OR fu_assigned='{$name}') ";
                                             $sale_condition=1;
                                             break;  
                case 'consultation':            $where = " DATE(key_insight_date)=CURDATE() AND LCASE(assign_to)='".strtolower($name)."' ";
                                             $sale_condition=1;
                                             break; 
                case 'todayhot':            $where = " lm.status='hot' AND ls.status='hot' AND DATE(ls.created)=CURDATE() 
                        AND la.assign_date > (CURDATE() - INTERVAL 30 DAY) 
                        AND LCASE(la.assign_to)='".strtolower($name)."'";
                                             $sale_condition=1;
                                             break;                            
                default: $where = " lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
            }
            $date_condition = 0;
        }else{
            $where = " lm.created > DATE_FORMAT(CURDATE(), '%Y-%m-01') ";
            $date_condition = 1;
            $sale_condition=1;
        }
        
        if(!empty($get_parameters['df']) && !empty($get_parameters['dt'])){
            if($date_condition==1){
                $where = "";   
            }else{
                $where .= " AND ";   
            }
            $from_date = date('Y-m-d',strtotime($get_parameters['df']));
            $to_date = date('Y-m-d',strtotime($get_parameters['dt']));
            $where .= " (DATE(lm.created) BETWEEN '".$from_date."' AND '".$to_date."') ";
            $where .= " AND (CAST(lm.age AS UNSIGNED) BETWEEN '".$get_parameters['agf']."' AND '".$get_parameters['agt']."') ";
        }
        
        if($sale_condition==1){
            $where .= " AND lm.email NOT IN(
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
                    ";
        }
        
        //echo $where;exit;
        //(CASE WHEN lm.enquiry_from!='consultation' THEN lm.profile ELSE '( Website Form Consultation )' END ) AS profile,
        if($searchValue != ''){
            $searchQuery = " 
                    AND (
                        la.fu_note like '%".$searchValue."%' 
                        or la.fu_other_note like '%".$searchValue."%' 
                        or la.key_insight like'%".$searchValue."%' 
                        or lm.email like'%".$searchValue."%' 
                        or lm.phone like'%".$searchValue."%' 
                        or lm.country like'%".$searchValue."%' 
                        or lm.coustagentry like'%".$searchValue."%' 
                        or lm.fname like'%".$searchValue."%' 
                        or lm.gender like'%".$searchValue."%' 
                        or lm.age like'%".$searchValue."%' 
                        or lm.phone like'%".$searchValue."%' 
                        or lm.status like'%".$searchValue."%' 
                        or lm.sub_status like'%".$searchValue."%' 
                        or lm.weight like'%".$searchValue."%' 
                        or lm.ideal_weight like'%".$searchValue."%' 
                        or lm.body_mass_index like'%".$searchValue."%'
                        or lm.overall_health_score like'%".$searchValue."%' 
                        or la.key_insight like'%".$searchValue."%' 
                        or la.fu_note like'%".$searchValue."%' 
                    ) 
                ";
        }
        $login_name =$this->session->balance_session['first_name'];
        if($login_name =='Snigdha'){
            $where_gcc ="AND lm.country IN ('Bahrain','Iraq','Kuwait','Oman','Qatar','Saudi Arabia','United Arab Emirates')";
        }else{
            $where_gcc='';
        }
        $sql= "SELECT
                    lm.id

                    FROM
                        `lead_management` lm
                    LEFT JOIN lead_action la ON
                        lm.email = la.email
                    WHERE
                        ".$whrClause." ".$where." ".$searchQuery." $where_gcc
                    GROUP BY
                        lm.email
                    ORDER BY
                        `lm`.`id`
                DESC ";
         //echo $sql;exit;
        
        $query=$this->db->query($sql);
        
        // echo "<pre>";
        // print_r($query->result_array());
        // exit;F

        if($query->num_rows()>0)
        {
            return $query->num_rows();
            //return $sql;
        }else{
            return [];
        }
        
        
        /* function get_lead_details_data_query : ends here   */
    }

// ==================================================avinash added for check out history==================================================================
        public function checkout_client_10am_to_7pm($mentor_id){
                    
                $current_date = date('Y-m-d 10:00:00');
                $previous_day = date('Y-m-d 19:00:00');
                               $sql = "SELECT
                                (
                                SELECT
                                    country_name
                                FROM
                                    countries
                                WHERE
                                    country_id =(
                                    SELECT
                                        country
                                    FROM
                                        new_assessment
                                    WHERE
                                        user_id = rg.id
                                    ORDER BY
                                        id
                                    DESC
                                LIMIT 1
                                )
                            ) AS country,(
                                SELECT
                                    suggested_program
                                FROM
                                    bn_program_page_log
                                WHERE
                                    user_id = rg.id AND page_type = 3
                                ORDER BY
                                    id
                                DESC
                            LIMIT 1
                            ) AS suggested_prgm,(
                                            SELECT
                                                program_page
                                            FROM
                                                bn_program_page_log
                                            WHERE
                                                user_id = rg.id AND page_type = 2
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                        ) AS program_page,(
                                            SELECT
                                                birth_date
                                            FROM
                                                new_assessment
                                            WHERE
                                                user_id = rg.id
                                                ORDER BY
                                                id
                                                DESC
                                                LIMIT 1
                                        ) AS dob,(
                                            SELECT
                                                app_version
                                            FROM
                                                bn_user_fcm_token
                                            WHERE
                                                user_id = rg.id
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                        ) AS app_version,(
                                            SELECT
                                                device
                                            FROM
                                                bn_user_fcm_token
                                            WHERE
                                                user_id = rg.id
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                 ) AS source,
                                (
                                SELECT
                                    program_name
                                FROM
                                    order_details
                                WHERE
                                    userid = rg.id AND program_status = 1
                            ) AS active_program,
                            (
                                SELECT
                                    program_session
                                FROM
                                    order_details
                                WHERE
                                    userid = rg.id AND program_status = 1
                            ) AS active_program_sessions,
                            rg.id AS user_id,
                            rg.phone,
                            CONCAT(rg.first_name, ' ', rg.last_name) AS `fullname`,
                            
                            rg.email_id,
                            rg.phone,
                            pg.current_program,
                            pg.current_program,
                            pg.current_program_duration,
                            rg.user_status,
                            pg.added_date,pg.program_amount
                            FROM
                                bn_program_page_log pg
                            LEFT JOIN registries rg ON
                                rg.id = pg.user_id
                            WHERE
                                pg.mentor_id = $mentor_id AND pg.page_type IN(2) AND pg.added_date >= '".$current_date."' AND pg.added_date <= '".$previous_day."'
                            GROUP BY
                                rg.email_id";
        
                $result = $this->db->query($sql)->result_array(); 
                
                return $result;
            }
        //Overnight
        public function checkout_client_7pm_to_10am($mentor_id){
            $current_date = date('Y-m-d 09:59:00');
            $previous_day = date('Y-m-d 19:01:00', strtotime('- 1 days', strtotime(date('Y-m-d'))));
            $curr_start_day = date('Y-m-d 19:01:00');
                              $sql = "SELECT
                                    (
                                    SELECT
                                        country_name
                                    FROM
                                        countries
                                    WHERE
                                        country_id =(
                                        SELECT
                                            country
                                        FROM
                                            new_assessment
                                        WHERE
                                            user_id = rg.id
                                        ORDER BY
                                            id
                                        DESC
                                    LIMIT 1
                                    )
                                ) AS country,(
                                    SELECT
                                        suggested_program
                                    FROM
                                        bn_program_page_log
                                    WHERE
                                        user_id = rg.id AND page_type = 3
                                    ORDER BY
                                        id
                                    DESC
                                LIMIT 1
                                ) AS suggested_prgm,(
                                            SELECT
                                                birth_date
                                            FROM
                                                new_assessment
                                            WHERE
                                                user_id = rg.id
                                                ORDER BY
                                                id
                                                DESC
                                                LIMIT 1
                                        ) AS dob,(
                                            SELECT
                                                program_page
                                            FROM
                                                bn_program_page_log
                                            WHERE
                                                user_id = rg.id AND page_type = 2
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                        ) AS program_page,(
                                            SELECT
                                                app_version
                                            FROM
                                                bn_user_fcm_token
                                            WHERE
                                                user_id = rg.id
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                        ) AS app_version,(
                                            SELECT
                                                device
                                            FROM
                                                bn_user_fcm_token
                                            WHERE
                                                user_id = rg.id
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                 ) AS source,(
                                    SELECT
                                        program_name
                                    FROM
                                        order_details
                                    WHERE
                                        userid = rg.id AND program_status = 1
                                ) AS active_program,
                                (
                                    SELECT
                                        program_session
                                    FROM
                                        order_details
                                    WHERE
                                        userid = rg.id AND program_status = 1
                                ) AS active_program_sessions,
                                rg.id AS user_id,
                                rg.phone,
                                CONCAT(rg.first_name, ' ', rg.last_name) AS `fullname`,
                                
                                rg.email_id,
                                rg.phone,
                                pg.current_program,
                                pg.current_program,
                                pg.current_program_duration,
                                pg.program_amount,
                                rg.user_status,
                                pg.added_date
                                FROM
                                    bn_program_page_log pg
                                LEFT JOIN registries rg ON
                                    rg.id = pg.user_id
                                WHERE
                                    pg.mentor_id = $mentor_id AND pg.page_type IN(2) AND (pg.added_date >= '".$curr_start_day."'  OR pg.added_date BETWEEN '".$previous_day."' AND '".$current_date."')
                                GROUP BY
                                    rg.email_id";
         
                
                $result = $this->db->query($sql)->result_array(); 
                
                return $result;       
            } 
        // 8 days Before
        public function checkout_client_8_days_before($mentor_id){
            
            // add By sanjay for query testing on 05-10-2021 
              // 1 for entry point
                     $rand_number = rand(1000,9999);
                     $data = array('mentor_checkout_client_8_days_before','1',$rand_number,date('Y-m-d H:i:s'));
                     $implode_data=implode("','",$data);
                     $new_sql = "INSERT INTO bn_query_execution_log (function_name,type,unique_number,added_date) VALUES ('".$implode_data."')";
                     $this->db->query($new_sql); 
            //End Here add by sanjay for query Testing 
            
                               $sql = "SELECT
                                (
                                SELECT
                                    country_name
                                FROM
                                    countries
                                WHERE
                                    country_id =(
                                    SELECT
                                        country
                                    FROM
                                        new_assessment
                                    WHERE
                                        user_id = rg.id
                                    ORDER BY
                                        id
                                    DESC
                                LIMIT 1
                                )
                            ) AS country,(
                                SELECT
                                    suggested_program
                                FROM
                                    bn_program_page_log
                                WHERE
                                    user_id = rg.id AND page_type = 3
                                ORDER BY
                                    id
                                DESC
                            LIMIT 1
                            ) AS suggested_prgm,(
                                            SELECT
                                                birth_date
                                            FROM
                                                new_assessment
                                            WHERE
                                                user_id = rg.id
                                                ORDER BY
                                                id
                                                DESC
                                                LIMIT 1
                                        ) AS dob,(
                                            SELECT
                                                program_page
                                            FROM
                                                bn_program_page_log
                                            WHERE
                                                user_id = rg.id AND page_type = 2
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                        ) AS program_page,(
                                            SELECT
                                                app_version
                                            FROM
                                                bn_user_fcm_token
                                            WHERE
                                                user_id = rg.id
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                        ) AS app_version,(
                                            SELECT
                                                device
                                            FROM
                                                bn_user_fcm_token
                                            WHERE
                                                user_id = rg.id
                                            ORDER BY
                                                id
                                            DESC
                                        LIMIT 1
                                 ) AS source,(
                                SELECT
                                    program_name
                                FROM
                                    order_details
                                WHERE
                                    userid = rg.id AND program_status = 1
                            ) AS active_program,
                            (
                                SELECT
                                    program_session
                                FROM
                                    order_details
                                WHERE
                                    userid = rg.id AND program_status = 1
                            ) AS active_program_sessions,
                            rg.id AS user_id,
                            rg.phone,
                            CONCAT(rg.first_name, ' ', rg.last_name) AS `fullname`,
                            
                            rg.email_id,
                            rg.phone,
                            pg.current_program,
                            pg.current_program,
                            pg.current_program_duration,
                            rg.user_status,
                            pg.added_date,pg.program_amount
                            FROM
                                bn_program_page_log pg
                            LEFT JOIN registries rg ON
                                rg.id = pg.user_id
                            WHERE
                                pg.mentor_id = $mentor_id AND pg.page_type IN(2) AND pg.added_date > NOW() - INTERVAL 8 DAY
                            GROUP BY
                                rg.email_id";
        
                $result = $this->db->query($sql)->result_array(); 
               
               // add By sanjay for query testing on 05-10-2021 
               // 2 for exit point
                     $data = array('mentor_checkout_client_8_days_before','2',$rand_number,date('Y-m-d H:i:s'));
                     $implode_data=implode("','",$data);
                     $new_sql = "INSERT INTO bn_query_execution_log (function_name,type,unique_number,added_date) VALUES ('".$implode_data."')";
                     $this->db->query($new_sql); 
               //End Here add by sanjay for query Testing  
                return $result;                 
            }
            
            
        public function checkout_client_un_assigned(){
            $current_date = date('Y-m-d 09:59:00');
            $previous_day = date('Y-m-d 19:01:00', strtotime('- 1 days', strtotime(date('Y-m-d'))));
                               $sql = "SELECT
                                                (
                                                SELECT
                                                    country_name
                                                FROM
                                                    countries
                                                WHERE
                                                    country_id =(
                                                    SELECT
                                                        country
                                                    FROM
                                                        new_assessment
                                                    WHERE
                                                        user_id = rg.id
                                                    ORDER BY
                                                        id
                                                    DESC
                                                LIMIT 1
                                                )
                                            ) AS country,(
                                                SELECT
                                                    suggested_program
                                                FROM
                                                    bn_program_page_log
                                                WHERE
                                                    user_id = rg.id AND page_type = 3
                                                ORDER BY
                                                    id
                                                DESC
                                            LIMIT 1
                                            ) AS suggested_prgm,(
                                                SELECT
                                                    birth_date
                                                FROM
                                                    new_assessment
                                                WHERE
                                                    user_id = rg.id
                                                ORDER BY
                                                    id
                                                DESC
                                            LIMIT 1
                                            ) AS dob,(
                                                SELECT
                                                    program_page
                                                FROM
                                                    bn_program_page_log
                                                WHERE
                                                    user_id = rg.id AND page_type = 2
                                                ORDER BY
                                                    id
                                                DESC
                                            LIMIT 1
                                            ) AS program_page,(
                                                SELECT
                                                    app_version
                                                FROM
                                                    bn_user_fcm_token
                                                WHERE
                                                    user_id = rg.id
                                                ORDER BY
                                                    id
                                                DESC
                                            LIMIT 1
                                            ) AS app_version,(
                                                SELECT
                                                    device
                                                FROM
                                                    bn_user_fcm_token
                                                WHERE
                                                    user_id = rg.id
                                                ORDER BY
                                                    id
                                                DESC
                                            LIMIT 1
                                            ) AS SOURCE,(
                                                SELECT
                                                    program_name
                                                FROM
                                                    order_details
                                                WHERE
                                                    userid = rg.id AND program_status = 1
                                            ) AS active_program,
                                            (
                                                SELECT
                                                    program_session
                                                FROM
                                                    order_details
                                                WHERE
                                                    userid = rg.id AND program_status = 1
                                            ) AS active_program_sessions,
                                            rg.id AS user_id,
                                            rg.phone,
                                            CONCAT(rg.first_name, ' ', rg.last_name) AS `fullname`,
                                            rg.email_id,
                                            rg.phone,
                                            pg.current_program,
                                            pg.current_program,
                                            pg.current_program_duration,
                                            pg.program_amount,
                                            rg.user_status,
                                            pg.added_date
                                            FROM
                                                bn_program_page_log pg
                                            LEFT JOIN registries rg ON
                                                rg.id = pg.user_id
                                            WHERE
                                                pg.mentor_id =''  
                                            GROUP BY
                                                rg.email_id";
                                            $result = $this->db->query($sql)->result_array(); 
                
                                            return $result;
        }    
            
            
// ==================================================avinash added for check out history==================================================================

}