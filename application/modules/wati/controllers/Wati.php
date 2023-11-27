<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wati extends MX_Controller
{
  // start of class

  public function __construct()
  {
    parent::__construct();
    $this->load->module('wati');

    $this->load->model('Wati_model');

    $this->load->module('login');
    // $this->mentor_id=$this->session->balance_session['admin_id'];

    if ($this->login->check_if_logged_in() === FALSE) {
      redirect('');
    }

  }

  public function index()
  {

    // Load Message templates from wati api

    $data['templatesJsonData'] = $this->get_templates();
    $_SESSION['templates'] = $data['templatesJsonData'];
    display_view('Wati', $data);
  }

  public function sendMessage()
  {

    $dataToView['templatesJsonData'] = $_SESSION['templates'];
    if (isset($_POST['email']) && $_POST['email'] != "") {

      $email = $_POST['email'];

      $exemail = preg_replace("/,+/", "','", $email);



      $data = $this->Wati_model->get_data_by_email_query($exemail);
      if ($data == 0) {

        $dataToView['Errordata'] = "No Data Found for the given emails";
        display_view("Wati", $dataToView);
        return;
      }


      // create a json object to send to wati api as request body
      $allReceivers = array();
      $InvalidNumbers = array();
      foreach ($data as $key => $value) {
        $receiver = new stdClass();

        if ($value['phone'] == "" || $value['phone'] == "NA" || $value['phone'] == null) {
          continue;
        }
        $receiver->whatsappNumber = preg_replace('/[^0-9]/', '', $value['phone']);

        if (strlen($receiver->whatsappNumber) != 10) {
          $verifyStatus = json_decode($this->ValidateNumber($receiver->whatsappNumber));
          if ($verifyStatus->valid == false) {
            array_push($InvalidNumbers, $receiver->whatsappNumber);
            unset($receiver);
            continue;
          }
        }

        $receiver->customParams = array();

        $params = new stdClass();
        $params->name = "name";
        $params->value = ($value["fname"] == null) ? "" : $value["fname"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "gender";
        $params->value = ($value["gender"] == null) ? "" : $value["gender"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "email";
        $params->value = ($value["email"] == null) ? "" : $value["email"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "phone";
        $params->value = ($value["phone"] == null) ? "" : $value["phone"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "country";
        $params->value = ($value["country"] == null) ? "" : $value["country"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "state";
        $params->value = ($value["state"] == null) ? "" : $value["state"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "city";
        $params->value = ($value["city"] == null) ? "" : $value["city"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "height";
        $params->value = ($value["height"] == null) ? "" : $value["height"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "weight";
        $params->value = ($value["weight"] == null) ? "" : $value["weight"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "stage";
        $params->value = ($value["stage"] == null) ? "" : $value["stage"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "body_mass_index";
        $params->value = ($value["body_mass_index"] == null) ? "" : $value["body_mass_index"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "ideal_weight";
        $params->value = ($value["ideal_weight"] == null) ? "" : $value["ideal_weight"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "weight_difference";
        $params->value = ($value["weight_difference"] == null) ? "" : $value["weight_difference"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "ideal_bmi";
        $params->value = ($value["ideal_bmi"] == null) ? "" : $value["ideal_bmi"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "medical_issue";
        $params->value = ($value["medical_issue"] == null) ? "" : $value["medical_issue"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "overall_health_score";
        $params->value = ($value["overall_health_score"] == null) ? "" : $value["overall_health_score"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "primary_source";
        $params->value = ($value["primary_source"] == null) ? "" : $value["primary_source"];
        array_push($receiver->customParams, $params);
        unset($params);
        $params = new stdClass();
        $params->name = "assigned_to";
        $assign_to = $this->Wati_model->get_assigned_to_by_email_query($value['email'])['assign_to'];
        $params->value = ($assign_to == null) ? "" : $assign_to;
        array_push($receiver->customParams, $params);
        unset($params);
        array_push($allReceivers, $receiver);
        unset($receiver);
      }
      $WATI_payload = new stdClass();
      $WATI_payload->template_name = $_POST['template'];
      $WATI_payload->broadcast_name = (isset($_POST['broadcast'])) ? $_POST['broadcast'] : "TEST";
      $WATI_payload->receivers = $allReceivers;


      $payload = json_encode($WATI_payload);
      $dataToView['response'] = $this->sendMessageUsingPayload($payload);
     if(count($InvalidNumbers)>0){
      $dataToView['invalidNumbers'] = $InvalidNumbers;
      }
      echo
      //echo "<pre>";
     // print_r($payload);
       display_view("Wati", $dataToView);

      return;

    } else {
      // echo "No emails Specified";
      $dataToView['Errordata'] = "No emails Specified";
      display_view("Wati", $dataToView);
      return;
    }



  }

  private function sendMessageUsingPayload($payload)
  {



    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://live-server-113259.wati.io/api/v1/sendTemplateMessages",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $payload,
      CURLOPT_HTTPHEADER => [
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI1YzE5NTBkMC0zZjZkLTQwYzYtOGM4NC04ZTg4NTEwMTkyNDQiLCJ1bmlxdWVfbmFtZSI6InN1cHBvcnRAYmFsYW5jZW51dHJpdGlvbi5pbiIsIm5hbWVpZCI6InN1cHBvcnRAYmFsYW5jZW51dHJpdGlvbi5pbiIsImVtYWlsIjoic3VwcG9ydEBiYWxhbmNlbnV0cml0aW9uLmluIiwiYXV0aF90aW1lIjoiMDkvMDUvMjAyMyAwOTowNTo1NyIsImRiX25hbWUiOiIxMTMyNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.i7XL1KWQZYsjEdVAk7tU8Ow07nMlZNKkiXFDvY_GXtw",
        "Content-Type: application/json"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {

      return "cURL Error # : " . $err;
    } else {
      return $response;
    }
  }

  private function get_templates($url = "https://live-server-113259.wati.io/api/v1/getMessageTemplates")
  {

    // Load Message templates from wati api
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI1YzE5NTBkMC0zZjZkLTQwYzYtOGM4NC04ZTg4NTEwMTkyNDQiLCJ1bmlxdWVfbmFtZSI6InN1cHBvcnRAYmFsYW5jZW51dHJpdGlvbi5pbiIsIm5hbWVpZCI6InN1cHBvcnRAYmFsYW5jZW51dHJpdGlvbi5pbiIsImVtYWlsIjoic3VwcG9ydEBiYWxhbmNlbnV0cml0aW9uLmluIiwiYXV0aF90aW1lIjoiMDkvMDUvMjAyMyAwOTowNTo1NyIsImRiX25hbWUiOiIxMTMyNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.i7XL1KWQZYsjEdVAk7tU8Ow07nMlZNKkiXFDvY_GXtw"
      ],
    ]);

    $response = curl_exec($curl);
    return $response;
  }
  private function ValidateNumber($number)
  {


    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://apilayer.net/api/validate?access_key=637d2019965a90fd5756ead2b932b7fb&number=" . $number . "&country_code=&format=1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [
        "Accept: */*"

      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    return $response;
  }


}