<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wati_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }





    public function get_data_by_email_query($email)
    {

        //  $sql = 'SELECT * FROM lead_management WHERE email IN(\'' . $email . '\');';
        // $sql = "SELECT * FROM lead_management AS lmt    WHERE lmt.overall_health_score IS NOT NULL AND lmt.phone != '' AND lmt.phone IS not null    AND lmt.phone != '--'   AND lmt.email IN ('$email') GROUP BY lmt.email";
        // $sql = "SELECT * FROM lead_management WHERE overall_health_score IS NOT NULL AND phone != '' AND phone IS not null AND phone != '--' AND email IN ('$email') GROUP BY email";

        // $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

        // $query = $this->db->query($sql);
        $this->db->select('*');
        $this->db->from('lead_management');
        $this->db->where("overall_health_score IS NOT NULL AND phone != '' AND phone IS not null AND phone != '--' AND email IN ('$email')");
        $this->db->group_by('email');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }

    }
    public function get_assigned_to_by_email_query($email)
    {

        $sql = 'SELECT assign_to FROM lead_action WHERE email = \'' . $email . '\';';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        } else {
            return null;
        }
    }
}