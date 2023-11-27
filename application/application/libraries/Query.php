<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Query 
{
    // start of class query
    
        protected $CI;

        public function __construct() 
        {
            $this->CI =& get_instance();
        }
    public function getCountryName($countryId="")
    {
        
        $query = " SELECT `country_name` 
                   FROM `countries`
                  WHERE `country_id` = '$countryId'";
        
        $query = $this->CI->db->query($query);
        if($query->num_rows() > 0) {
            $data = $query->result_array();
            return $data[0]['country_name'];
        } 
        unset($query);
        return [];

    }    

    public function updateViewCount($tbl='',$postID='',$category='',$fullURL='')
    {
        // $sql1 = "SELECT * FROM $tbl WHERE category = '$category' AND postID='$postID' AND ip ='$ip'";
        // $query = $this->CI->db->query($sql1);
        // if ($query->num_rows() > 0)
        // {
        
        // }
        // else
        // {
            $sql = "INSERT INTO $tbl SET category = '$category',postID='$postID', url='".$fullURL."'";
            $record = $this->CI->db->query($sql);
        //}
        if($record)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function total_recipe_views($postID="",$category="")
    {
        
        $SQL ="SELECT COUNT(*) AS c FROM `recipe_view_log` as t1 INNER JOIN recipes_online as t2 ON t1.postID=t2.id WHERE t1.postID='$postID' AND t1.category='$category' GROUP BY t1.postID ORDER BY c DESC LIMIT 1";
        $row = $this->CI->db->query($SQL);
        $result = $row->result_array();
        if($result[0]['c']!='')
        {
            return $result[0]['c'];
        }
        else
        {
            return 0;
        }

    }



    public function total_views($postID="",$category="")
    {
        
        //$SQL ="SELECT COUNT(t1.id) AS c,bp.postTitle,bp.postBannerBig FROM `blog_view_log` as t1 LEFT JOIN blog_posts as bp ON t1.postID=bp.postID WHERE t1.postID='$postID' AND category='$category' GROUP BY t1.postID ORDER BY c DESC LIMIT 1";
       // $row = $this->CI->db->query($SQL);
        //$result = $row->result_array();
        return rand(4,10000);
        
      /*  if($result[0]['c']!='')
        {
            return $result[0]['c'];
        }
        else
        {
            return 0;
        } */

    }


    public function get_comment($article_id='',$category='')
    {
        
        $sql="SELECT CONCAT(r.first_name,' ',r.last_name) as name,c.* FROM `comment` c INNER JOIN registries r ON r.id=c.user_id where c.c_permission='1' and c.is_deleted='0' AND c.article_id='$article_id' AND c_category='$category'";

        $data = $this->CI->db->query($sql);

        if($data->num_rows()>0)
        {
            $result['row'] = $data->result_array();
            $result['total'] = $data->num_rows();
            return $result;
        }
        else
        {
            
            $result['total'] = 0;
            return $result;
        }
    }
    public function get_reply($article_id='', $id='', $user_id='') /* GET SINGLE RECORD */
    {
        
        
        $sql = " SELECT CONCAT(r.first_name,' ',r.last_name) as name, reply.* FROM `reply` INNER JOIN registries r ON r.id=reply.user_id
                 WHERE reply.`article_id` = '$article_id' AND reply.comment_id='$id' AND reply.user_id='$user_id' AND reply.sub_reply_id='0'";
                     
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0)
        {
            return $sql->result_array();            
        }
        else
        {
            return 0;
        }
    }

public function get_subreply($article_id='', $id='', $user_id='',$sub_reply_id='') 
    {
        
        
        $sql = " SELECT * 
                 FROM `reply` 
                 WHERE `article_id` = '$article_id' AND comment_id='$id' AND user_id='$user_id' AND sub_reply_id='$sub_reply_id'";
                     
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {
            return $sql->result_array();            
        } else {
            return 0;
        }
    }
    

        public function escapeString($str)
        {        
            return $this->CI->db->escape_like_str($str);
        }

    public function insertRecord($table, $data)
    {        
        $this->CI->db->insert($table,$data); 
        
        $lastid = $this->CI->db->insert_id();// return last inserted id
        return $lastid;
    }

    public function updateRecord($table, $data, $primary_Key, $primaryValue)
    {
        if(!empty($primaryValue))  {
            $this->CI->db->where($primary_Key, $primaryValue);
            $this->CI->db->update($table, $data);
            return 1;
        }        
        return 0;
    }

    public function deleteRecord($table, $primary_Key, $primaryValue)
    {
        
        if(!empty($primaryValue)) {
            $this->CI->db->where($primary_Key, $primaryValue);
            $this->CI->db->delete('mytable');
            return 1;
        }
        return 0;
    }

    public function selectRow($sql) /* GET SINGLE RECORD */
    {        
        $sql = $this->CI->db->query($sql);
        return $sql->row_array();        
    }

    public function selectRecord($sql) /* GET MULTIPLE RECORD */
    {
        $sql = $this->CI->db->query($sql);

        if($sql->num_rows() > 0) {
            return $sql->result_array();
        }	
        return [];
    }
    
    public function selectRowCount($sql) /* GET RECORD Count */
    {
        $sql = $this->CI->db->query($sql);
        return $sql->num_rows();
    }

    public function getRow($table, $pk, $pv, $order = '') /* GET SINGLE RECORD */
    {
        $ord = '';
        if (!empty($order))
        {
            $ord = ' ORDER BY ' . $order;
        }
        
        $sql = ' SELECT * 
                 FROM `'.$table.'` 
                 WHERE `'.$pk.'` = '.$this->CI->db->escape($pv).' '.$ord;
                     
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {
            return $sql->row_array();            
        } else {
            return 0;
        }
    }

    public function getResults($table, $pk, $pv, $order = '') /* GET MULTIPLE RECORD */
    {
        $ord = '';
        if (!empty($order))
        {
            $ord = " ORDER BY " . $order;
        }
        
        $sql = ' SELECT * FROM `'.$table.'` 
                WHERE `'.$pk.'` = '.$this->CI->db->escape($pv).' '.$ord;
        
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {
            return $sql->result_array();
        }	
        return [];
    }

    public function run($sql) /* COMMON QUERY */
    {
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {
            return $sql->result_array();
        }        
        return [];
    }

    public function updateRecordByTwoValues($table, $data, $primary_Key, $primaryValue, $second_Key, $secondValue)
    {
        $where = [
                    $primary_Key    => $primaryValue,
                    $second_Key     => $secondValue
                 ];
        
        $this->CI->db->update($table, $data,$where);
        
        if($this->CI->db->affected_rows() > 0 ){
            return 1;
        }
        return 0;        
    }


    public function getUserChat($assigned_mentor)
    {        
        $sql = ' SELECT * 
                 FROM `client_enquiry` 
                 WHERE `mentor_id` = '.$this->CI->db->escape($assigned_mentor).' AND `user_id` = '.$this->CI->db->escape($this->CI->session->userdata("user_id")).' 
                 ORDER By `id` ASC 
               ';
       
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {
            return $sql->result_array();
        }	
        return [];
    }

    public function getUserImage($quid, $user_type)
    {
        if(!empty($user_type)) {
            if ($user_type == 'mentor') {
                $query = ' SELECT `photo` FROM `admin_user` WHERE `admin_id` = '.$this->CI->db->escape($quid);
            } elseif ($user_type == 'user') {
                $query = ' SELECT `profile_image` FROM `registries` WHERE`id` = '.$this->CI->db->escape($quid);
            }
            
            $sql = $this->CI->db->query($sql);
            
            if($sql->num_rows() > 0) {
                $row =  $sql->row_array();
                return $row['photo'];
            }
        }        
        return '';
    }


    public function getLastResponseID($mid)
    {
        $sql = ' SELECT ce.is_response , ce.name , ce.email_id , ce.query  
                 FROM `client_enquiry` ce 
                 WHERE `mentor_id` =  '.$this->CI->db->escape($mid).' AND `user_id` = '.$this->CI->db->escape($this->CI->session->userdata('user_id')).'
                 ORDER By `id` DESC 
                 LIMIT 1
               ';
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {                
            return $sql->row_array();
        }
        return [];
    }

    public function getMentorByID($mid)
    {
        $sql = ' SELECT * FROM `admin_user` WHERE admin_id = '.$this->CI->db->escape($mid);
        $sql = $this->CI->db->query($sql);
            
        if($sql->num_rows() > 0) {                
            return $sql->row_array();
        }
        return [];
    }


    public function getRecords($sql)
    {
        //  function getRecords: Start
        $data = [
                    'total'         => 0,
                    'result'        => []
                ];
                
        $sql = $this->CI->db->query($sql);        
        if($sql->num_rows() > 0)
        {
            $data['result'] = $sql->result_array();
            $data['total'] = $sql->num_rows();
        } 
        
        return $data;
        //  function getRecords: End
    }
    
    
    public function global_search($search='')
    {

        $sql = "SELECT
                CONCAT('Client: ',rg.first_name,' ',rg.last_name,' (',rg.email_id,') ', 
                CASE
                    WHEN rg.user_status in ('Completed','Completeds','Dropout','Dropouts','fs') THEN 'OCR'
                    ELSE 'Active'
                END
                ) AS value,
                rg.email_id,
                'client' as user_status
            FROM
                order_details od
            INNER JOIN registries rg ON
                    rg.id = od.userid
            WHERE
                (rg.first_name LIKE '%$search%' OR rg.last_name LIKE '%$search%' OR concat_ws(' ',first_name,last_name) like '%$search%' OR rg.phone LIKE '%$search%' OR rg.email_id LIKE '%$search%')
            GROUP BY od.userid
        UNION
            SELECT
                CONCAT('Lead : ',fname,' ',lname,' (',email,')') AS value,
                email as email_id,
                'lead' as user_status
            FROM
                lead_management
            WHERE
                (name LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%' OR concat_ws(' ',fname,lname) like '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%') 
                AND email NOT IN(select email_id from order_details where email_id LIKE '%$search%' group by email)
            GROUP BY email";
        $record = $this->CI->db->query($sql);
        $resultSet = Array();
        if($record)
        {
            foreach($record->result_array() as $row)
            {           
                $resultSet[] = $row;
            }
        }
        return $resultSet;
        unset($resultSet); /* Always unset the variable at the end */
    }
    

    
    // end of class query
}