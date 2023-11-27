<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lead_m extends CI_Model
{
    public function fetchLeadData($counselor_id)
    {
        $firstNameQuery = $this->db->query("SELECT first_name FROM admin_user WHERE admin_id = $counselor_id");
        $firstName = $firstNameQuery->row()->first_name;

       

    $leadDataQuery = $this->db->query("SELECT rg.id,rg.first_name,rg.last_name,rg.gender,rg.address,rg.dob,rg.email_id,rg.phone,rg.user_status,rg.source,rg.created FROM registries rg
        JOIN lead_action la ON rg.email_id = la.email
        WHERE la.assign_to = '$firstName' AND rg.user_type = 'lead' AND rg.user_status = 'Inactive' AND  rg.is_deleted='0' ORDER BY rg.id DESC");

        $leadData = $leadDataQuery->result();

        return $leadData;
    }

}

