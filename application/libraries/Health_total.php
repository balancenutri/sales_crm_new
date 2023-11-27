<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_total 
{
    protected $CI;
  
  
    public function __construct() 
    {
        $this->CI =& get_instance();
        $this->CI->load->library(['query']);
    }
    
    public function total_score_count($age='')
        {

        	$result = [];
        	$cate_container = [
                                        'count'           => 0,
                                        'total_count'     => 0,
                                        'color'           => '',
                                        'class'           => '',
                                        'percent'         => 0
                                  ];  
                
              $category_result = [
                                    'underweight'       => $cate_container,
                                    'normal'            => $cate_container,
                                    'overweight'        => $cate_container,
                                    'obese'             => $cate_container
                                 ];
              
           if($age != ''  && ( (float) $age >= 16)  )
            {
                $sql = ' SELECT COUNT(`id`) as avg_count, `health_category`
                         FROM `lead_management`
                         WHERE (`age` = '. addslashes($age).' ) AND ( `health_category` != "" )
                         GROUP BY `health_category`    
                       ';


                $query = $this->CI->db->query($sql);
                $result =$query->result_array();
            }


            $total_score_count = 0;

            if(count($result) > 0)
            {    
                foreach($result as $row) 
                {                                                    
                    $total_score_count = $total_score_count + $row['avg_count'];
                    if(array_key_exists($row['health_category'], $category_result)) {
                        $category_result[$row['health_category']]['count'] = $row['avg_count'];
                    }
                }
            }
            
            if($total_score_count > 0) 
            {
                foreach($category_result as $cati => $cati_value) 
                {
                    // assign total count : Start
                        $category_result[$cati]['total_count'] = $total_score_count;
                    // assign total count : End

                    // calculate percentage : Start
                        $category_result[$cati]['percent'] = round(($cati_value['count']/$total_score_count) * 100 );
                    // calculate percentage : End   

                    // assign class and colors : Start
                    switch ($cati) {
                        case 'underweight':
                                $category_result[$cati]['color']    = '#83cde6';
                                $category_result[$cati]['class']    = ' text-info ';
                            break;
                        case 'normal':
                                $category_result[$cati]['color']    = '#70be44';
                                $category_result[$cati]['class']    = ' text-success ';
                            break;
                        case 'overweight':
                                $category_result[$cati]['color']    = '#ffc000';
                                $category_result[$cati]['class']    = ' text-warning ';
                            break;
                        case 'obese':
                                $category_result[$cati]['color']    = '#dc352f';
                                $category_result[$cati]['class']    = ' text-danger ';
                            break;
                        default:
                            break;
                    }
                    // assign class and colors : End
                }
            }
            $data  =  [
                          'total_score_count'   => $total_score_count,
                          'category_result'     => $category_result,
                      ];
            return $data;
        }

}
?>