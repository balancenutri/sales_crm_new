<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Health_blog_model extends CI_Model
{
    // public function fetchHealthBlogData()
    // {
    //     // Get today's date and the date 30 days ago
    //     $today = date('Y-m-d');
    //     $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));

    //     // Modify your query to filter by date
    //     $this->db->where('visited_at >=', $thirtyDaysAgo);
    //     $this->db->where('visited_at', $today);
    //     $query = $this->db->get('bn_gyaan_action_log');
    // print_r($query);exit;
    //     $response = array(
    //         "success" => true,
    //         "data" => array(
    //             "health_recipes" => array(),
    //             "health_reads" => array(),
    //         )
    //     );

    //     $recipeCountToday = 0;
    //     $recipeCount30Days = 0;
    //     $readCountToday = 0;
    //     $readCount30Days = 0;

    //     if ($query->num_rows() > 0) {
    //         foreach ($query->result_array() as $item) {
    //             if ($item['screen_name'] === 'Healthy_Recipes') {
    //                 $response['data']['health_recipes'][] = $item;
    //                 $recipeCount30Days++;
    //                 if ($item['created_at'] === $today) {
    //                     $recipeCountToday++;
    //                 }
    //             } elseif ($item['screen_name'] === 'Health_Reads') {
    //                 $response['data']['health_reads'][] = $item;
    //                 $readCount30Days++;
    //                 if ($item['created_at'] === $today) {
    //                     $readCountToday++;
    //                 }
    //             }
    //         }
    //     }
    //     print_r($this->db->last_query());exit;

    //     $response['recipe_today_count'] = $recipeCountToday;
    //     $response['recipe_30_days_count'] = $recipeCount30Days;
    //     $response['read_today_count'] = $readCountToday;
    //     $response['read_30_days_count'] = $readCount30Days;

    //     if ($recipeCountToday === 0 && $readCountToday === 0 && $recipeCount30Days === 0 && $readCount30Days === 0) {
    //         $response = array(
    //             "success" => false,
    //             "message" => "No data found"
    //         );
    //     }

    //     return $response;
    // }


// public function fetchHealthBlogData()
// {
    
//     $today = date('Y-m-d');
//     $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));


//     // Modify your query to filter by date
//     $sql = "SELECT * FROM bn_gyaan_action_log
//             WHERE visited_at >= '$thirtyDaysAgo' AND visited_at <= '$today'";

//     $query = $this->db->query($sql);

//     $response = array(
//         "success" => true,
//         "data" => array(
//             "health_recipes" => array(),
//             "health_reads" => array(),
//         )
//     );

//     $recipeCountToday = 0;
//     $recipeCount30Days = 0;
//     $readCountToday = 0;
//     $readCount30Days = 0;

//     if ($query->num_rows() > 0) {
//         foreach ($query->result_array() as $item) {
//             if ($item['screen_name'] === 'Healthy_Recipes') {
//                 $response['data']['health_recipes'][] = $item;
//                 $recipeCount30Days++;
//                 if ($item['visited_at'] === $today) {
//                     $recipeCountToday++;
//                 }
//             } elseif ($item['screen_name'] === 'Health_Reads') {
//                 $response['data']['health_reads'][] = $item;
//                 $readCount30Days++;
//                 if ($item['visited_at'] === $today) {
//                     $readCountToday++;
//                 }
//             }
//         }
//     }

//     $response['recipe_today_count'] = $recipeCountToday;
//     $response['recipe_30_days_count'] = $recipeCount30Days;
//     $response['read_today_count'] = $readCountToday;
//     $response['read_30_days_count'] = $readCount30Days;

//     if ($recipeCountToday === 0 && $readCountToday === 0 && $recipeCount30Days === 0 && $readCount30Days === 0) {
//         $response = array(
//             "success" => false,
//             "message" => "No data found"
//         );
//     }

//     return $response;
// }


public function fetchHealthBlogData()
{
    $today = date('Y-m-d');
    $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));

    // Query for Healthy_Recipes today
$sql = "SELECT SUM(data_count) as total_data_count
        FROM (
            SELECT COUNT(DISTINCT a.email_id, a.gyaan_id) as data_count
            FROM bn_gyaan_action_log AS a
            LEFT JOIN recipes_online AS i ON a.gyaan_id = i.id 
            WHERE a.visited_at = '$today' AND a.screen_name = 'Healthy_Recipes'
            GROUP BY a.email_id, a.gyaan_id
        ) AS subquery";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        // print_r($result);

    // Query for Healthy_Recipes in the last 30 days
        $sql1 = "SELECT SUM(data_count) as total_data_count
        FROM (
        SELECT COUNT(DISTINCT a.email_id, a.gyaan_id) as data_count
        FROM bn_gyaan_action_log AS a
        LEFT JOIN recipes_online AS i ON a.gyaan_id = i.id 
        WHERE a.visited_at >= '$thirtyDaysAgo' AND a.screen_name = 'Healthy_Recipes'
        GROUP BY a.email_id, a.gyaan_id
        ) AS subquery";
        $query1 = $this->db->query($sql1);
        $result1 = $query1->result_array();

        // print_r($result1);
        
    // Query for Health_Reads today
    $sql2 = "SELECT SUM(data_count) as total_data_count
    FROM (
        SELECT COUNT(DISTINCT bgal.email_id, bgal.gyaan_id) as data_count
        FROM bn_gyaan_action_log AS bgal
        INNER JOIN bn_app_blog_posts AS babp ON bgal.gyaan_id = babp.id 
        INNER JOIN blog_cats AS bc ON babp.category_id = bc.catID
        WHERE bgal.visited_at = '$date' AND bgal.screen_name = 'Health_Reads'
        GROUP BY bgal.email_id, bgal.gyaan_id
    ) AS subquery";
    $query2 = $this->db->query($sql2);
    $result2 = $query2->result_array();
    
    // print_r($result2);

    // Query for Health_Reads in the last 30 days
    $sql3 = "SELECT SUM(data_count) as total_data_count
    FROM (
        SELECT COUNT(DISTINCT bgal.email_id, bgal.gyaan_id) as data_count
        FROM bn_gyaan_action_log AS bgal
        INNER JOIN bn_app_blog_posts AS babp ON bgal.gyaan_id = babp.id 
        INNER JOIN blog_cats AS bc ON babp.category_id = bc.catID
        WHERE bgal.visited_at >= '$thirtyDaysAgo' AND bgal.screen_name = 'Health_Reads'
        GROUP BY bgal.email_id, bgal.gyaan_id
    ) AS subquery";
    $query3 = $this->db->query($sql3);
    $result3 = $query3->result_array();
   
  
    $res = array(
        'Healthy_Recipes_today' => $result,
        'Healthy_Recipes_30_days' => $result1,
        'Health_Reads_today' => $result2,
        'Health_Reads_30_days' => $result3,
    );

    return $res;
}



    public function get_user_details($screen_name, $duration)
    {
        

        if ($screen_name =="Healthy_Recipes") {
           
            if ($duration == "today") {
                $date = date('Y-m-d');
                $sql = "SELECT a.*, i.recipe_image as image,count(a.id) as data_count
                FROM bn_gyaan_action_log AS a
                LEFT JOIN recipes_online AS i ON a.gyaan_id = i.id 
                WHERE a.visited_at = '$date' AND a.screen_name = '$screen_name' group by email_id,gyaan_id";
            } else {
                $date = date('Y-m-d', strtotime('-30 days'));
                $sql = "SELECT a.*, i.recipe_image as image,count(a.id) as data_count 
                FROM bn_gyaan_action_log AS a
                LEFT JOIN recipes_online AS i ON a.gyaan_id = i.id 
                WHERE a.visited_at >= '$date' AND a.screen_name = '$screen_name' group by email_id,gyaan_id";
            }

        } else {
           
            if ($duration == "today") {
                $date = date('Y-m-d');
                $sql = "SELECT bgal.*, babp.blog_banner as image,bc.catSlug,count(bgal.id) as data_count
                    FROM bn_gyaan_action_log AS bgal
                    INNER JOIN bn_app_blog_posts AS babp ON bgal.gyaan_id = babp.id 
                    INNER JOIN blog_cats AS bc ON babp.category_id = bc.catID
                    WHERE bgal.visited_at = '$date' AND bgal.screen_name = '$screen_name' group by email_id,gyaan_id";
            } else {
                $date = date('Y-m-d', strtotime('-30 days'));
                $sql = "SELECT bgal.*, babp.blog_banner as image,bc.catSlug,count(bgal.id) as data_count
                    FROM bn_gyaan_action_log AS bgal
                    INNER JOIN bn_app_blog_posts AS babp ON bgal.gyaan_id = babp.id 
                    INNER JOIN blog_cats AS bc ON babp.category_id = bc.catID
                    WHERE bgal.visited_at >= '$date' AND bgal.screen_name = '$screen_name' group by email_id,gyaan_id";
            }
        }
        // print_r($sql);exit;
        $query = $this->db->query($sql);

        if ($query) {
            $result = $query->result_array();
            return $result;
        } else {
            return "Query failed.";
        }
    }

}

