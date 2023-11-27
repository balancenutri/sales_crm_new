<?php defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model
{
    // Start of class

    /*
     *   Author : Vinayak Phutane
     *   Created Date : 2018-05-02
     *   
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('query');
        $this->load->library('Commonquery');
    }

    public function get_lead_queries($email_id, $councellor, $limit = '')
    {
        
        $dataz = [];
        if (!empty($councellor)) {
            $sql_1 = "SELECT first_name FROM admin_user WHERE admin_id = $councellor AND user_type='Sales' AND user_status='active'";
            $data_1 = $this->query->getRecords($sql_1);


            if (!empty($data_1['result'])) {
                $firstName = $data_1['result'][0]['first_name'];
                // print_r($firstName);die;


                $sql_2 = "SELECT lm.email, MAX(lm.name) AS name
                FROM lead_action AS la
                INNER JOIN lead_management AS lm ON la.email = lm.email
                WHERE la.assign_to = '$firstName' AND lm.name IS NOT NULL AND lm.name != ''
                GROUP BY lm.email
                ORDER BY MAX(la.id) DESC";

                // $sql_2 = "SELECT la.email
                // FROM lead_action la inner join lead_management lm on la.email=lm.email
                // WHERE la.assign_to = '$firstName' AND lm.name IS NOT NULL AND lm.name != ''
                // Group by lm.email
                // ORDER BY la.id desc";



                if (!empty($limit)) {
                    $sql_2 .= " LIMIT 0, $limit";
                }
                // echo $sql_2;die;
                $data_2 = $this->query->getRecords($sql_2);
                // echo '<pre>';
                // print_r($data_2);die;
                if (!empty($data_2['result'])) {
                    $data = array_reverse($data_2['result']);
                    // print_r($data);die;
                    return $data;
                } else {
                    // Handle the case when $sql_2 query returns no results.
                    return "No data found for lead_action.";
                }
            } else {
                // Handle the case when $sql_1 query returns no results.
                return "No data found for admin_user.";
            }
        }

    }

    public function get_lead_queries_chat($email_id, $councellor, $limit = '')
    {
        
        $dataz = [];
        if (!empty($email_id)) {

            // $query = "SELECT * FROM lead_councellor_chat WHERE councellor_id = 196 AND email_id= 'salunkhevaishnavi2001@gmail.com' AND query IS NOT NULL AND query != ''";

            $query = "SELECT *
            FROM lead_councellor_chat
            WHERE councellor_id = $councellor
            AND email_id = '$email_id'
            AND ((query IS NOT NULL AND query != '') OR (attachment IS NOT NULL AND attachment != ''))";


            //    print_r($query);die;
            if (!empty($limit)) {
                $query .= " LIMIT 0,$limit";
            }
            $data[] = $this->query->getRecords($query);
            // echo '<pre>';
            // print_r($data);exit;
            $dataz = $data[0]['result'];

        }

        return $dataz;
        unset($sql);

    }

    public function fetch_unread_lead_chat($email_id, $councellor, $lastTimestamp, $limit = '') {
        
        $dataz = [];
    
        if (!empty($email_id)) {
            $query = "SELECT * FROM lead_councellor_chat 
                      WHERE councellor_id = $councellor 
                      AND email_id = '$email_id' 
                      AND ((query IS NOT NULL AND query != '' AND type = 'query') 
                           OR (attachment IS NOT NULL AND attachment != '' AND type = 'query'))
                      AND created > '$lastTimestamp'"; // Add created timestamp condition directly to the WHERE clause
    
            if (!empty($limit)) {
                $query .= " LIMIT 0, $limit";
            }
    
            $data[] = $this->query->getRecords($query);
            $dataz = $data[0]['result'];
        }
    
        return $dataz;
    }
    
    


}