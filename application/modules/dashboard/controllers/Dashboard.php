<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller 
{
    // start of class

    public function __construct() 
    { 
        parent::__construct();
        $this->load->module('login');
        $this->load->model(array('dashboard_model','faq/faq_model'));
        $this->load->library('commonquery');
        $this->load->helper('form');
        
        $this->mentor_id = $this->mentor_id=$this->session->balance_session['admin_id'];
        
        if($this->login->check_if_logged_in() === FALSE)
        {
            redirect(''); 
        }
    
        error_reporting(1);

    }
    
    // avinash add this start
    public function check_no(){
        $no= $this->input->post('mobile');
        // $data['phone no']= $no;
    $data['check_status'] = $this->dashboard_model->check_no($no);
    
        echo json_encode($data);
    }
    
    // avinash add this end
    
    
    public function active_payment_links(){
        $data = array();
        //if($this->session->balance_session['email_id']=='priyanka.kadam@balancenutrition.in'){ 
           // $data['counsellor_goal'] = $this->dashboard_model->get_active_payment_links();
        //}
        display_view('active_payment_links',$data);
    }
    public function get_active_payment_links(){
        //$data['active_payment_link'] = $this->dashboard_model->get_active_payment_links();
        echo json_encode($this->dashboard_model->get_active_payment_links());
    }
    public function goal_set_view(){
        $data = array();
        //if($this->session->balance_session['email_id']=='priyanka.kadam@balancenutrition.in'){ 
            $data['counsellor_goal'] = $this->dashboard_model->get_counsellor_goal();
        //}
        display_view('counsellor_set_goal',$data);
    }
    public function update_goal_set(){
        $data = array();
        //if($this->session->balance_session['email_id']=='priyanka.kadam@balancenutrition.in'){ 
            if(isset($_POST)){
                $data['counsellor_goal'] = $this->dashboard_model->set_counsellor_goal_unit($_POST);
                if($data['counsellor_goal']==true){
                    redirect('dashboard/goal_set_view?msg=3');
                    die;
                }else{
                    redirect('dashboard/goal_set_view?msg=1');
                    die;
                }
                
            }else{
                redirect('dashboard/goal_set_view?msg=2');
                die;
            }//if(isset($_POST)){
            /*echo '<pre>';
            print_r($_POST);
            die;*/
        //}
        //display_view('counsellor_set_goal',$data);
    }
    
    
    // avinash added this for sales manager start
    
    public function get_counselor_goal(){
        $c_name  = $this->session->balance_session['first_name'];
        $leads_in_hand = count($this->dashboard_model->lead_in_hand('1'));
        $consultation_done = count($this->dashboard_model->const_done('1'));
        $hot_mdth = count($this->dashboard_model->hot_lead_last('1'));
        $today_sale_amount_no = $this->dashboard_model->today_sale('1');
        $const_ratio = ($consultation_done/ $leads_in_hand)*100;
        $lead_sale  = count($this->dashboard_model->lead_sale());
        $consult_sale = count($this->dashboard_model->const_done_sale());
        $hot_sale_const = count($this->dashboard_model->hot_lead_sale());
        $data=array(
        'leads_in_hand'=> $leads_in_hand,
        'consultation_done'=> $consultation_done,
        'hot_mdth'=> $hot_mdth,
        'today_sale_amount_no' => $today_sale_amount_no,
        'const_ratio' => $const_ratio ,
        'lead_sale' =>$lead_sale,
        'consult_sale'=> $consult_sale,
        'hot_sale' =>$hot_sale_const,
        );
        echo json_encode($data);
    }
    public function getSundays($y,$m){ 
        $date = "$y-$m-01";
        $first_day = date('N',strtotime($date));
        $first_day = 7 - $first_day + 1;
        $last_day =  date('t',strtotime($date));
        $days = array();
        for($i=$first_day; $i<=$last_day; $i=$i+7 ){
            $days[] = $i;
        }
        return  $days;
    }
    
    public function get_counselor_goal_set($c_name=false){
        $today = new DateTime();

        $date = new DateTime('now');
        $date->modify('last day of this month');
        $end    = $date->format('t');
        $begin1  = date('d');
        
        $days = $this->getSundays($date->format('Y'),$date->format('m'));
        $day=array();
        foreach($days as $val){
            if($val>$begin1){
                $day[]=$val;
            }
        }
        //echo "<BR>";
        //print_r($day);
        //exit;
        $working_days = $date->format('d')-sizeof($days);
        $days_pending = ($end-$begin1-sizeof($day)+1);
        //  echo $end;
        //  echo "<br>";
        //  echo $begin1;
        // echo "<br>";
        // print_r($days);
        // exit;
        //$sales_funnel_sales[0]['unit']
        if($c_name==''){$c_name  = $this->session->balance_session['admin_id'];}
        $leads_in_hand = count($this->dashboard_model->lead_in_hand('2'));
        // echo $this->db->last_query();
        
        $consultation_done = count($this->dashboard_model->const_done('2'));
        // echo $this->db->last_query();
        $hot_mdth = count($this->dashboard_model->hot_lead_last('1'));
        //$today_sale_amount_no = $this->dashboard_model->today_sale('2')[0]['amt'];
        $const_ratio = ($consultation_done/ $leads_in_hand)*100;
        $lead_sale  = count($this->dashboard_model->lead_sale());
        //$sale_unit = count($this->dashboard_model->sale_unit());
        $consult_sale = count($this->dashboard_model->const_done_sale());
        $hot_sale_const = count($this->dashboard_model->hot_lead_sale());
        $set_goal = $this->dashboard_model->get_set_goal();
        $sale_unit = $this->dashboard_model->get_sales_funnel_sales(0,$c_name)[0]['unit'];
        $today_sale_amount_no =$this->dashboard_model->get_sales_funnel_sales(0,$c_name)[0]['amt'];
        // echo"<pre>";
        // print_r_custom($data);
        // exit();
        //print_r($this->dashboard_model->get_previous_month());
        $prev_month_lead = $this->dashboard_model->get_previous_month();
        $prev_month_sale = $this->dashboard_model->get_previous_month_sale();
        $prev_consultation=$prev_lead=$prev_sale=$prev_amt=0;
        foreach($prev_month_lead as $val){
            if($val['key_insight_date']!='0000-00-00 00:00:00'){
                $prev_consultation++;
            }
            $prev_lead++;
        }
        $data=array(
        'working_days'=>$working_days." :: ".$days_pending." :: ".($set_goal['unit_goal']-$sale_unit)."/".$days_pending,
        'prev_lead' =>$prev_lead,
        'prev_consultation' =>$prev_consultation,
        'prev_sale' =>$prev_sale,
        'prev_amt' =>$prev_amt,
        'lead_set' =>$set_goal['goal_lead'],
        'consultation_set' =>$set_goal['goal_consult'],
        'unit_set' =>$set_goal['unit_goal'],
        'amount_set' =>$set_goal['sale_goal'],
        'lead_needed_monthly' =>ceil(($set_goal['goal_lead'])/$working_days),
        'consultation_needed_monthly' =>ceil(($set_goal['goal_consult'])/$working_days),
        'unit_needed_monthly' =>round(($set_goal['unit_goal'])/$working_days),
        'amount_needed_monthly' =>ceil(($set_goal['sale_goal'])/$working_days),
        'lead_needed' =>ceil(($set_goal['goal_lead']-$leads_in_hand)/$days_pending),
        'consultation_needed' =>ceil(($set_goal['goal_consult']-$consultation_done)/$days_pending),
        'unit_needed' =>round(($set_goal['unit_goal']-$sale_unit)/$days_pending),
        'amount_needed' =>ceil(($set_goal['sale_goal']-$today_sale_amount_no)/$days_pending),
        );
        
        
        $c_name  = $this->session->balance_session['first_name'];
        /*
        if($c_name=='Vaishnavi' || $c_name=='Aayushi' ){
        $data=array(
        'working_days'=>$days_pending,
        'lead_set' =>0,
        'consultation_set' =>0,
        'unit_set' =>0,
        'amount_set' =>0,
        'lead_needed_monthly' =>0,
        'consultation_needed_monthly' =>0,
        'unit_needed_monthly' =>0,
        'amount_needed_monthly' =>0,
        'lead_needed' =>0,
        'consultation_needed' =>0,
        'unit_needed' =>0,
        'amount_needed' =>0,
        );
        }*/
        // echo"<pre>";
        // print_r_custom($data);
        // exit();
        echo json_encode($data);
    }
    public function send_goal_mail(){
        $counsellor_list = $this->dashboard_model->getCounsellors();
        //$data = $this->get_counselor_goal_set();
        //print_r($data);
        //echo "<br/>";
        foreach($counsellor_list as $val){
            echo $val['counsellors']."<br/>";
            $c_name = $val['counsellors'];
            $data = $this->get_counselor_goal_set($c_name);
            echo "<pre>";
            print_r($data);
            echo "<br/>";
            
        }
        
    }
     public function set_counsellor_goal(){
        $admin_id  = $this->session->balance_session['admin_id'];
        $goal_data = array(
                    'sale_goal'=> $this->input->post('sale_goal'),
                    'unit_goal'=> $this->input->post('unit_goal'),
                    'goal_lead'=> $this->input->post('goal_lead'),
                    'goal_consult'=> $this->input->post('goal_consult'),
                    'goal_hot'=> $this->input->post('goal_hot'),
                    );
        $result = $this->commonquery->updateRecord('admin_user',$goal_data,array('admin_id'=>$admin_id));
        if($result){
            //send mail
            //Load email library
            $msg = '<table class="table bg-secondary" style="text-align:center !important;" border="1">
  <thead class="text-center">
    <tr>
        <th rowspan="2" scope="col" ></th>
        <th colspan="2" width="40%">Previous Month</th>
        
        <th colspan="2" width="40%">My Current Month Plan</th>
    </tr>
    <tr>
      <th scope="col" >Units</th>
      <th scope="col">Ratio %</th>
      <th scope="col" >Units</th>
      <th scope="col">Ratio %</th>
    </tr>
    
  </thead>
  <tbody class="text-center">
    <tr>
      <th scope="col">Lead</th>
      <td id="lead">'.$this->input->post('pr_lead').'</td>
      <td title="Lead->Consultation" id="const_ratio">'.$this->input->post('pr_lead_ratio').'</td>
      <td style="padding-right: 0px;">
          '.$this->input->post('goal_lead').'
      </td>
      <td style="width:20%">
          '.$this->input->post('lead_ratio').' %
      </td>
    </tr>
    <tr>
      <th>Consultation</th>
      <td id="const_unit">'.$this->input->post('pr_consult').'</td>
      <td title="Consultation->Sale" id="const_sale_ratio">'.$this->input->post('pr_consult_ratio').'</td>
      <td style="width:20%">
          '.$this->input->post('goal_consult').'
      </td>
      <td style="width:20%">
          '.$this->input->post('consult_ratio').' %
      </td>
    </tr>
    <tr>
      <th>Sales Unit</th>
      <td id="unit">'.$this->input->post('pr_unit').'</td>
      <td title="Lead->Sale"  id="unit_ratio">'.$this->input->post('pr_unit_ratio').'</td>
      <td style="width:20%">
          '.$this->input->post('unit_goal').'
        </td>
      <td style="width:20%">
          '.$this->input->post('unit_ratio').' %
        </td>
    </tr>
    <tr>
      <th>Sales Amount</th>
      <td id="sale">'.$this->input->post('pr_amount').'</td>
      <td id="sale_ratio"><span>Rs. '.round($this->input->post('pr_amount_ratio')).' </span></td>
      <td style="width:20%">
          Rs. '.$this->input->post('sale_goal').'
      </td>
      <td style="width:20%">
          Rs. '.round($this->input->post('amount_ratio')).' / Unit
      </td>
    </tr>
  </tbody>
</table><p> Note : '.$this->input->post('note').'</p>';
            
            
            
            
        $to='Vishal Rupani <vishalrupani@balancenutrition.in>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: '.$this->session->balance_session['first_name'].' <'.$this->session->balance_session['email_id'].'>';
        $email=$this->session->balance_session['email_id'];
        //vikram goal
        if(strtolower($email)=='chelsi.dhelawat@balancenutrition.in' || strtolower($email)=='shailee.sanghavi@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in';
                
            }elseif(strtolower($email)=='dhanashree.chawan@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }elseif(strtolower($email)=='anisha.powale@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in';
                
            }else if(strtolower($email)=='mili.jain@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                // $headers[] = 'Cc: '.$email.',vaibhav.gonjari@balancenutrition.in';
            }else if(strtolower($email)=='aashee.shah@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,shailee.sanghavi@balancenutrition.in';
                
            }elseif(strtolower($email)=='dhanvi.maisheri@balancenutrition.in' || strtolower($email)=='mehek.sajnani@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }else{
            
              $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in';
                
            }
        // $headers[] = 'Cc: '.$this->session->balance_session['email_id'].',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in';
      
       $headers[] = 'Bcc: vikram.gupta@balancenutrition.in,vaibhav.gonjari@balancenutrition.in,vidhi.shah@balancenutrition.in';
        mail($to,"Goal Set for ".date('M'),$msg,implode("\r\n", $headers));
        
        //     //$msg .= $this->input->post('note');
        //     $this->load->library('email'); 
        //     // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
             
        //     $this->email->from($this->session->balance_session['email_id'], $this->session->balance_session['first_name']);
        //     $this->email->to('vishalrupani@balancenutrition.in');
        //     $this->email->cc(array($this->session->balance_session['email_id'],'vaibhav.gonjari@balancenutrition.in','vikram.gupta@balancenutrition.in','hatim.bohra@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in','aayushi.dubey@balancenutrition.in','devanshi.shah@balancenutrition.in'));
        //     //$this->email->to('vaibhav.gonjari@balancenutrition.in');
        //     //$this->email->cc(array($this->session->balance_session['email_id'],'vaibhav.gonjari@balancenutrition.in'));
        //     $this->email->subject("Goal Set for ".date('M'));
        //     $this->email->message($msg);
        
        // //Send mail 
        //     $this->email->send();
            echo json_encode("Goal Updated Successfully !");
        }else{
            echo json_encode("Somenthing Went Wrong !");
        }
    }
    
    public function links_expired(){
        $expired_links = $this->dashboard_model->get_expired_links();
        //print_r($expired_links);exit;
        if(!empty($expired_links)){
            //send mail
            //Load email library
            $msg = '<table class="table bg-secondary" style="text-align:center !important;" border="1">
              <thead class="text-center">
                <tr> <th>Lead Details</th> <th>Program Details</th><th>Payment Link</th> <th>Expiring</th> </tr>
              </thead>';
              foreach($expired_links as $val){
              $msg .='<tbody class="text-center">
                <tr>
                  <td>'.$val["name"].'<br>'.$val["email_id"].'<br>'.$val["phone"].'</td>
                  <td>'.$val["program_name"].'<br>'.$val["program_duration"].'<br>Rs. '.$val["amount"].'</td>
                  <td>'.$val["payment_link"].'</td>
                  <td>'.date_format(date_create($val["expiry_date"]),"d M Y").' (11:55 PM)</td>
                </tr>';
               } 
              
            $msg .='</table>';
            //echo $msg;
            //$msg .= $this->input->post('note');
            
            
             $to='Vaibhav Gonjari <vaibhav.gonjari@balancenutrition.in>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: No Reply - Balance Nutrition <info@balancenutrition.in>';
        $headers[] = 'Cc: vaibhav.gonjari@balancenutrition.in';
        $yesterday = new DateTime('yesterday');
        mail($to,"Payment Links Expired Yesterday : ".$yesterday->format('d M Y'),$msg,implode("\r\n", $headers));
        
            
        //     $this->load->library('email'); 
        //     // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
        //     $this->email->from('info@balancenutrition.in', 'No Reply - Balance Nutrition');
        //     //$this->email->from('Accounts', 'accounts@balancenutrition.in');
        //     //$this->email->to('vishalrupani@balancenutrition.in');
        //     //$this->email->cc(array($this->session->balance_session['email_id'],'vaibhav.gonjari@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in'));
        //     $this->email->to('vaibhav.gonjari@balancenutrition.in');
        //     //$this->email->cc(array('accounts@balancenutrition.in','vaibhav.gonjari@balancenutrition.in'));
        //     $this->email->cc('vikram.gupta@balancenutrition.in');
        //     $yesterday = new DateTime('yesterday');
        //     $this->email->subject("Payment Links Expired Yesterday : ".$yesterday->format('d M Y'));
        //     $this->email->message($msg);
        
        // //Send mail 
        //     $this->email->send();
            //echo json_encode("Goal Updated Successfully !");
        }else{
            //echo json_encode("Somenthing Went Wrong !");
        }
    }
    public function links_expiring_48hrs(){
        $c_id = $this->session->balance_session['admin_id'];
        $expired_links = $this->dashboard_model->get_payment_link_query(3,$c_id);
        //print_r($expired_links);exit;
        if(!empty($expired_links)){
            //send mail
            //Load email library
            $msg = '<table class="table bg-secondary" style="text-align:center !important;" border="1">
              <thead class="text-center">
                <tr> <th>Lead Details</th> <th>Program Details</th><th>Payment Link</th> <th>Expiring</th> </tr>
              </thead>';
              foreach($expired_links as $val){
              $msg .='<tbody class="text-center">
                <tr>
                  <td>'.$val["name"].'<br>'.$val["email_id"].'<br>'.$val["phone"].'</td>
                  <td>'.$val["program_name"].'<br>'.$val["program_duration"].'<br>Rs. '.$val["amount"].'</td>
                  <td>'.$val["payment_link"].'</td>
                  <td>'.date_format(date_create($val["expiry_date"]),"d M Y").' (11:55 PM)</td>
                </tr>';
               } 
              
            $msg .='</table>';
               $to='Vaibhav Gonjari <vaibhav.gonjari@balancenutrition.in>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: No Reply - Balance Nutrition <info@balancenutrition.in>';
        $headers[] = 'Cc: vaibhav.gonjari@balancenutrition.in';
        $tomorrow = new DateTime('tomorrow');
        mail($to,"Payment Links Expired Tomorrow : ".$tomorrow->format('d M Y'),$msg,implode("\r\n", $headers));
        
        //     echo $msg;
        //     //$msg .= $this->input->post('note');
        //     $this->load->library('email'); 
        //     // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
        //     $this->email->from('info@balancenutrition.in', 'No Reply - Balance Nutrition');
        //     //$this->email->from('Accounts', 'accounts@balancenutrition.in');
        //     //$this->email->to('vishalrupani@balancenutrition.in');
        //     //$this->email->cc(array($this->session->balance_session['email_id'],'vaibhav.gonjari@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in'));
        //     $this->email->to('vaibhav.gonjari@balancenutrition.in');
        //     $this->email->cc('vikram.gupta@balancenutrition.in');
        //     //$this->email->cc(array('accounts@balancenutrition.in','vaibhav.gonjari@balancenutrition.in'));
        //     $tomorrow = new DateTime('tomorrow');
        //     //echo ('d-m-Y');
        //     $this->email->subject("Payment Links Expiring Tomorrow : ".$tomorrow->format('d M Y'));
        //     $this->email->message($msg);
        
        // //Send mail 
        //     $this->email->send();
            //echo json_encode("Goal Updated Successfully !");
        }else{
            //echo json_encode("Somenthing Went Wrong !");
        }
    }
    public function fu_pending_last72hrs(){
        $expired_links = $this->dashboard_model->get_expired_links();
        //print_r($expired_links);exit;
        if(!empty($expired_links)){
            //send mail
            //Load email library
            $msg = '<table class="table bg-secondary" style="text-align:center !important;" border="1">
              <thead class="text-center">
                <tr> <th>Lead Details</th> <th>Program Details</th><th>Payment Link</th> <th>Expiring</th> </tr>
              </thead>';
              foreach($expired_links as $val){
              $msg .='<tbody class="text-center">
                <tr>
                  <td>'.$val["name"].'<br>'.$val["email_id"].'<br>'.$val["phone"].'</td>
                  <td>'.$val["program_name"].'<br>'.$val["program_duration"].'<br>Rs. '.$val["amount"].'</td>
                  <td>'.$val["payment_link"].'</td>
                  <td>'.date_format(date_create($val["expiry_date"]),"d M Y").' (11:55 PM)</td>
                </tr>';
               } 
              
            $msg .='</table>';
            //echo $msg;
            //$msg .= $this->input->post('note');
                $to='Vaibhav Gonjari <vaibhav.gonjari@balancenutrition.in>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: No Reply - Balance Nutrition <info@balancenutrition.in>';
        $headers[] = 'Cc: vaibhav.gonjari@balancenutrition.in';
        $yesterday = new DateTime('yesterday');
        mail($to,"Payment Links Expired Yesterday : ".$yesterday->format('d M Y'),$msg,implode("\r\n", $headers));
        
        //     $this->load->library('email'); 
        //     // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
        //     $this->email->from('info@balancenutrition.in', 'No Reply - Balance Nutrition');
        //     //$this->email->from('Accounts', 'accounts@balancenutrition.in');
        //     //$this->email->to('vishalrupani@balancenutrition.in');
        //     //$this->email->cc(array($this->session->balance_session['email_id'],'vaibhav.gonjari@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in'));
        //     $this->email->to('vaibhav.gonjari@balancenutrition.in');
        //     $this->email->cc('vikram.gupta@balancenutrition.in');
        //     //$this->email->cc(array('accounts@balancenutrition.in','vaibhav.gonjari@balancenutrition.in'));
        //     $yesterday = new DateTime('yesterday');
        //     $this->email->subject("Payment Links Expired Yesterday : ".$yesterday->format('d M Y'));
        //     $this->email->message($msg);
        
        // //Send mail 
        //     $this->email->send();
            //echo json_encode("Goal Updated Successfully !");
        }else{
            //echo json_encode("Somenthing Went Wrong !");
        }
    }
    public function cancel_link(){
        $this->dashboard_model->cancel_link($this->input->post('id'));
        echo 'Deleted';
    }
    public function update_due_date(){
        $this->dashboard_model->update_due_date($this->input->post('due_date'),$this->input->post('order_id'));
        echo 'Updated';
    }
    public function create_due_payment_link(){
        $order_details = $this->dashboard_model->get_od_details($this->input->post('order_id'));
        //print_r($order_details);exit;
        $payment_validity_date= strtotime(date('Y-m-d 23:55:00',strtotime($this->input->post('exp_date'))));
        $link_validity_date= date('Y-m-d 23:55:00',strtotime($this->input->post('exp_date')));
        $reference_id = "BAL".rand(1,100000);
        //echo $this->input->post('phone');
        $arr = explode('-',$this->input->post('phone'));
        //echo print_r($arr);echo "<br><br>";exit;
        if(count($arr)>1){
           $contact = "+91".trim($arr[1]);    
        }else{
            $contact = "+91".trim($this->input->post('phone'));
        }
        //$contact = "+91".$this->input->post('phone');
        //exit;
        $customer_name = $order_details[0]['client_name'];
        $email = $order_details[0]['email'];
        //$email = "sanjay.gupta@balancenutrition.in";
        $amount = $order_details[0]['balance']*100;
        // echo "<pre>";
        // print_r($_POST);
        // die();
         
         $curl = curl_init();
        
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.razorpay.com/v1/payment_links',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{ 
              "amount": '.$amount.',
              "currency": "INR",
              "accept_partial": false,
              "expire_by": '.$payment_validity_date.',
              "reference_id": "'.$reference_id.'",
              "description": "Balance Payment for Order id'.$_POST['order_id'].' Email : ('.$email.')",
              "customer": {
                "name": "'.$customer_name.'",
                "contact": "",
                "email": "'.$email.'"
              },
              "notify": {
                "sms": true,
                "email": true
              },
              "reminder_enable": false,
              "notes": {
                "policy_name": "'.$order_details[0]['program_name'].'"
              },
              "callback_url": "https://balancenutrition.in/",
              "callback_method": "get"
            }',
        
        //Start For Test Crendentials
              /* CURLOPT_HTTPHEADER => array(
                'Authorization: Basic cnpwX3Rlc3RfRDhhU0JrbUt4Z1NpczA6NjVlRUE4ZUdMNTdUWXE4UUw3cTFQSE5N',
                'Content-Type: application/json'
              ),*/
        // End For Test Credentials 
             
        //Start For Live Credentials
              CURLOPT_HTTPHEADER => array(
                'Authorization: Basic cnpwX2xpdmVfNmNTdDRPNkdTMFJMSGU6ZzJHbmlzOElTVHhoNXZFRE1qTjdHVmxU',
                'Content-Type: application/json'
              ),
        //End For Live Credentials
              
            ));
        
            $response = curl_exec($curl);
            curl_close($curl); 
            $data = json_decode($response); 
            $payment_url = $data->short_url;
            
            $now = time(); // or your date as well
            $your_date = strtotime($link_validity_date);
            $datediff = $now - $your_date;
            
            $days_diff =  round($datediff / (60 * 60 * 24));
            
            if(strlen($payment_url)>6){
                $this->session->set_flashdata('payment_link',$payment_url);
                //send mail to counselor;
            }
            $this->session->set_flashdata('program',$order_details[0]['program_name']);
            $this->session->set_flashdata('days',$order_details[0]['program_duration_days']);
            $this->session->set_flashdata('amount',$amount);
            $this->session->set_flashdata('expiry',date('D M Y',strtotime($link_validity_date))."which is in the next ".$days_diff." days");
            
            $link_details=array(
                   'name'=>$customer_name, 
                   'program_name'=>"Balance Payment of : ".$order_details[0]['program_name'], 
                   'program_duration'=>$order_details[0]['program_duration_days']." Days",
                   'amount'=>$amount,
                   'payment_link'=>$payment_url,
                   'sales_person_id'=>$_SESSION['balance_session']['admin_id'], 
                   'email_id'=>$email, 
                   'phone'=>$contact, 
                   'created_by'=>$_SESSION['balance_session']['admin_id'], 
                   'created_date'=>date('Y-m-d H:i:s'), 
                   'expiry_date'=>date('Y-m-d H:i:s',strtotime($link_validity_date)), 
                   'link_status'=>'Unpaid'
                );
            $this->commonquery->addRecord('payment_link',$link_details);
            
        echo json_encode($link_details);  
    }
    
    public function sales_manager(){
        display_view('sales_manager');
    }
    
    
       public function sales_manager_month_looks(){
        // $c_name  = $this->session->balance_session['first_name'];
        $all_leads = $this->dashboard_model->all_leads(1);
        $data['all_leads'] = $all_leads;
        $data['all_leads_sale'] = $this->dashboard_model->all_leads_sale(1);
        $data['lead_capture_mtd_count'] = $this->dashboard_model->get_lead_fresh_lead();
        $data['get_lead_fresh_lead_sale'] = $this->dashboard_model->get_lead_fresh_lead_sale();
        $data['olr_lead_mtd_count'] =$this->dashboard_model->get_olr_lead_month(1);
        $data['olr_lds_avlble_mnth_sale'] =$this->dashboard_model->olr_lds_avlble_mnth_sale(1);
        $data['omr_lead_mtd_count'] =$this->dashboard_model->get_omr_lead_month(1);
        $data['omr_lds_avlble_mnth_sale'] =$this->dashboard_model->omr_lds_avlble_mnth_sale(1);
        $data['basic_stack_count'] = $this->dashboard_model->get_basic_stack_month(1);
        $data['get_basic_stack_month_sale'] = $this->dashboard_model->get_basic_stack_month_sale(1);
        $data['stage_all_leads'] = $this->dashboard_model->stage_all_leads();
       // print_r($this->dashboard_model->all_leads(1));exit;
        /*$data['stage_1'] =$data['stage_2'] =$data['stage_3'] =$data['stage_4'] ='0';
        print_r($data['stage_all_leads']);exit;
        foreach($all_leads as $val){
            if($val['stage']=='1'){
                $data['stage_1']=$data['stage_1']+1;
            }elseif($val['stage']=='2'){
                $data['stage_2']=$data['stage_2']+1;
            }elseif($val['stage']=='3'){
                $data['stage_3']=$data['stage_3']+1;
            }elseif($val['stage']=='4'){
                $data['stage_4']=$data['stage_4']+1;
            }
        }*/
        //print_r($data);exit;
        $data['phase_all_leads'] = $this->dashboard_model->phase_all_leads();
        $stage1="('2','3','4')";
        $data['stage_1'] = $this->dashboard_model->stagewise_leads(1,1);
        $data['phase_1'] = $this->dashboard_model->phasewise_leads(1);
        $stage2="('1','3','4')";
        $data['stage_2'] = $this->dashboard_model->stagewise_leads(1,2);
        $data['phase_2'] = $this->dashboard_model->phasewise_leads(2);
        $stage3="('2','1','4')";
        $data['stage_3'] = $this->dashboard_model->stagewise_leads(1,3);
        $data['phase_3'] = $this->dashboard_model->phasewise_leads(3);
        $stage4="('2','3','1')";
        $data['stage_4'] = $this->dashboard_model->stagewise_leads(1,4);
        $data['phase_4'] = $this->dashboard_model->phasewise_leads(4);
        $data['phase_0'] = $this->dashboard_model->phasewise_leads(0);
        $data['hot'] = count($this->dashboard_model->get_lead_by_status_month('hot','1'));
        $data['hot_sale'] = $this->dashboard_model->get_lead_by_status_sale('hot');
        $substatus_by_hot =$this->dashboard_model->get_substatus_by_status('hot');
        $lead_by_list_hot_lead .="<tr><td></td><td style='font-size: 12px;'>All / <span style='color: red;'>72hrs</span></td>";
        foreach ($substatus_by_hot as $key => $value) {
            $substatus_by_hot_72hrs =$this->dashboard_model->get_substatus_by_status_72hrs($value['sub_status'],'hot');
            $get_substatus_72hrs = (!empty($substatus_by_hot_72hrs) ? $substatus_by_hot_72hrs[0]['cnt_sub_status']:'0');
            $lead_by_list_hot_lead .="<tr><td>".$value['sub_status']."</td><td><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'hot_month_looks_all')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a> / <span style='color: red;'><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'hot_month_looks_72hrs')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank' class='text-danger'> ".$get_substatus_72hrs."</a></span></td></tr>";
        }
        $data['lead_by_sub_hot_status'] = (!empty($substatus_by_hot) ? $lead_by_list_hot_lead:"<tr class='text-danger'><td> No Action !</td></tr>");
        $data['warm'] = count($this->dashboard_model->get_lead_by_status_month('warm','1'));
        $data['warm_sale'] = $this->dashboard_model->get_lead_by_status_sale('warm');
        $substatus_by_warm =$this->dashboard_model->get_substatus_by_status('warm');
        $substatus_by_warm_lead .="<tr><td></td><td style='font-size: 12px;'>All / <span style='color: red;'>7 days</span></td>";
        foreach ($substatus_by_warm as $key => $value) {
            $get_substatus_by_status_7days =$this->dashboard_model->get_substatus_by_status_7days($value['sub_status'],'warm');
            $get_substatus_by_7days = (!empty($get_substatus_by_status_7days) ? $get_substatus_by_status_7days[0]['cnt_sub_status']:'0');
            $substatus_by_warm_lead .="<tr><td>".$value['sub_status']."</td><td><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'warm_month_looks_all')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a> / <span style='color: red;'><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'warm_month_looks_7days')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank' class='text-danger'> ".$get_substatus_by_7days."</a></span></td></tr>";
        }
        $data['lead_by_sub_warm_status'] = (!empty($substatus_by_warm) ? $substatus_by_warm_lead:"<tr class='text-warning'><td> No Action !</td></tr>");
        $data['cold'] = count($this->dashboard_model->get_lead_by_status_month('cold','1'));
        $data['cold_sale'] = $this->dashboard_model->get_lead_by_status_sale('cold');
        $substatus_by_cold = $this->dashboard_model->get_substatus_by_status('cold');
        $substatus_by_cold_lead .="";
        foreach ($substatus_by_cold as $key => $value) {
                $substatus_by_cold_lead .="<tr><td>".$value['sub_status']."</td><td><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'cold_month_looks_all')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></td></tr>";
        }
        $data['lead_by_sub_cold_status'] =(!empty($substatus_by_cold) ? $substatus_by_cold_lead:"<tr class='text-success'><td> No Action !</td></tr>");
        // $substatus_hot ="('To Pay','Pay Later','Link Shared')";
        // $downgrade_hot ="('hot','spam','completed')";
        // $data['hot_downgrade_90days'] = $this->dashboard_model->get_lead_downgrade_90days($substatus_hot,$downgrade_hot);
        // $substatus_by_hot_downgrade_90days = $this->dashboard_model->substatus_by_status_downgrade_90days($substatus_hot,$downgrade_hot);
        // $substatus_by_hot_downgrade_90days_lead .="";
        // foreach ($substatus_by_hot_downgrade_90days as $key => $value) {
        //         $substatus_by_hot_downgrade_90days_lead .="<tr><td>".$value['sub_status']."</td><td><div class='tooltip' style='position:absolute; font-width:100px'><span class='tooltiptext1' style='width: 150px;background-color: #ebedf2;border-radius: 6px;padding: 5px 5px;border-right:none;position: absolute;top: -70px;right:o;left: 11px; color:black'><center><h6>Status</h6></center><div><span>".$value['STATUS']."</span><span style='float: right;'><a href='' target='blank'>".$value['cnt_status']."</a></span></div></span><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'hot_downgrade90days_all')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div></td></tr>";
        // }
        // $data['substatus_by_hot_downgrade_90days_lead'] =(!empty($substatus_by_hot_downgrade_90days) ? $substatus_by_hot_downgrade_90days_lead:"<tr class='text-danger'><td> No Action !</td></tr>");
        // $substatus_warm ="('Need Convincing','Not Comfortable Online','Build faith/trust','Price Sensitive','Rate Shared')";
        // $downgrade_warm ="('warm','spam','completed')";
        // $data['warm_downgrade_90days'] = $this->dashboard_model->get_lead_downgrade_90days($substatus_warm,$downgrade_warm);
        // $substatus_by_warm_downgrade_90days = $this->dashboard_model->substatus_by_status_downgrade_90days($substatus_warm,$downgrade_warm);
        // $substatus_by_warm_downgrade_90days_lead .="";
        // foreach ($substatus_by_warm_downgrade_90days as $key => $value) {
        //         $substatus_by_warm_downgrade_90days_lead .="<tr><td>".$value['sub_status']."</td><td><div class='tooltip' style='position:absolute; font-width:100px'><span class='tooltiptext1' style='width: 150px;background-color: #ebedf2;border-radius: 6px;padding: 5px 5px;border-right:none;position: absolute;top: -70px;right:o;left: 11px; color:black'><center><h6>Status</h6></center><div><span>".$value['STATUS']."</span><span style='float: right;'><a href='' target='blank'>".$value['cnt_status']."</a></span></div></span><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'warm_downgrade90days_all')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div></td></tr>";
        // }
        // $data['substatus_by_warm_downgrade_90days_lead'] =(!empty($substatus_by_warm_downgrade_90days) ? $substatus_by_warm_downgrade_90days_lead:"<tr class='text-warning'><td> No Action !</td></tr>");
        // $substatus_cold ="('Not interested','Doing plan some where else','Just for knowledge','Unr(Un responsive)','Discard,Others')";
        // $downgrade_cold ="('cold','spam','completed')";
        // $data['cold_downgrade_90days'] = $this->dashboard_model->get_lead_downgrade_90days($substatus_cold,$downgrade_cold);
        // $substatus_by_cold_downgrade_90days = $this->dashboard_model->substatus_by_status_downgrade_90days($substatus_cold,$downgrade_cold);
        // $substatus_by_cold_downgrade_90days_lead .="";
        // foreach ($substatus_by_cold_downgrade_90days as $key => $value) {
        //         $substatus_by_cold_downgrade_90days_lead .="<tr><td>".$value['sub_status']."</td><td><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'cold_month_looks_all')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></td></tr>";
        // }
        //  $data['substatus_by_cold_downgrade_90days_lead'] =(!empty($substatus_by_cold_downgrade_90days) ? $substatus_by_cold_downgrade_90days_lead:'<tr><td> No Action !</td></tr>');
        $down_warm_mdt =0;
        $down_cold_mdt =0;
        $down_warm_all =0;
        $down_cold_all =0;
        $down_warm_cold_mdt =0;
        $down_warm_cold_all =0;
        $start_date =date('Y-m-01');
        $hot_down_mdt = $this->dashboard_model->hot_down_mdt();
        foreach($hot_down_mdt as $hot){
            if($hot['created']>= $start_date){
            if($hot['status'] == 'Warm'){
                $down_warm_mdt++;
            }else{
               $down_cold_mdt++; 
            }
            }else{
                if($hot['status'] == 'Warm'){
                $down_warm_all++;
            }else{
               $down_cold_all++; 
            }
            }
        }
        
        $warm_down_to_cold_mdt = $this->dashboard_model->warm_down_to_cold();
        foreach($warm_down_to_cold_mdt as $cold){
            if($hot['created']>= $start_date){
            if($hot['status'] == 'Cold'){
                $down_warm_cold_mdt++;
            }else{
              $down_warm_cold_mdt_else++; 
            }
            }else{
                if($hot['status'] == 'Cold'){
                $down_warm_cold_all++;
            }else{
              $down_warm_cold_all_else++; 
            }
            }
        }
        $down_mtd_hot = $down_warm_mdt + $down_cold_mdt ;
        $down_all_hot = $down_warm_all + $down_cold_all;
        $down_mtd_warm = $down_warm_cold_mdt + $down_warm_cold_mdt_else ;
        $down_all_warm = $down_warm_cold_all + $down_warm_cold_all_else;
        $data['hot_downgrade_90days'] = "<span title='Current Month'>".$down_mtd_hot."</span> | <span title='Over All'>".$down_all_hot."</span>";
        $data['warm_downgrade_90days'] = "<span>".$down_mtd_warm."</span> | <span>".$down_all_warm."</span>";
        $data['substatus_by_hot_downgrade_90days_lead'] ="<tr style='background-color: darkgray;color: white;'><td>Status </td><td>MTD | All</td></tr><tr><td>Warm </td><td>".$down_warm_mdt." | ".$down_warm_all."</td></tr><tr><td>Cold </td><td>".$down_cold_mdt." | ".$down_cold_all."</td></tr>";
        $data['substatus_by_warm_downgrade_90days_lead'] ="<tr style='background-color: darkgray;color: white;'><td>Status </td><td>MTD | All</td></tr><tr><td>Cold </td><td>".$down_warm_cold_mdt." | ".$down_warm_cold_all."</td></tr>";
        
        echo json_encode($data);
    }
    
    
    public function sales_manager_day_looks(){
        $data['all_leads_today'] = $this->dashboard_model->all_leads(0);
        $data['all_leads_sale_today'] = $this->dashboard_model->all_leads_sale(0);
        $data['stage_1_today_lead'] = $this->dashboard_model->stagewise_leads(0,1);
        $data['stage_1_today_lead_capture'] = $this->dashboard_model->stagewise_leads_capture(0,1);
        $data['stage_1_today_lead_missed'] = $this->dashboard_model->stagewise_leads_missed(0,1);
        $data['stage_2_today_lead'] = $this->dashboard_model->stagewise_leads(0,2);
        $data['stage_2_today_lead_capture'] = $this->dashboard_model->stagewise_leads_capture(0,2);
        $data['stage_2_today_lead_missed'] = $this->dashboard_model->stagewise_leads_missed(0,2);
        $data['stage_3_today_lead'] = $this->dashboard_model->stagewise_leads(0,3);
        $data['stage_3_today_lead_capture'] = $this->dashboard_model->stagewise_leads_capture(0,3);
        $data['stage_3_today_lead_missed'] = $this->dashboard_model->stagewise_leads_missed(0,3);
        $data['stage_4_today_lead'] = $this->dashboard_model->stagewise_leads(0,4);
        $data['stage_4_today_lead_capture'] = $this->dashboard_model->stagewise_leads_capture(0,4);
        $data['stage_4_today_lead_missed'] = $this->dashboard_model->stagewise_leads_missed(0,4);
        $data['basic_stack_today'] = $this->dashboard_model->get_basic_stack_month(0);
        $data['basic_stack_capture'] = $this->dashboard_model->get_basic_stack_capture(0);
        $data['basic_stack_missed'] = $this->dashboard_model->get_basic_stack_missed(0);
        $calls_scheduled_count = $this->dashboard_model->get_today_consultation_calls_data_query('0');
        $data['calls_scheduled_data'] = ($calls_scheduled_count != 0) ? count($calls_scheduled_count) : 0;
        $today_fus_notification = $this->dashboard_model->get_today_fus_data_query('0');
        $data['today_fus_notification'] = ($today_fus_notification != 0) ? count($today_fus_notification) : 0;
        $today_fus_missed_data = $this->dashboard_model->get_today_fus_missed_data_query('');
        $data['today_fus_missed_data'] = ($today_fus_missed_data != 0) ? count($today_fus_missed_data) : 0;
        $today_consultation_missed_count = $this->dashboard_model->get_today_calls_miss_data_query('');
        $data['today_consultation_missed_count'] = ($today_consultation_missed_count != 0) ? count($today_consultation_missed_count) : 0;
        $data['query_count'] = $this->dashboard_model->get_query_count_query(0);
        $balance_due_count = $this->dashboard_model->get_balance_data('due',0);
        $data['balance_due_count'] = ($balance_due_count != 0) ? count($balance_due_count) : 0;
        $fu_don = $this->dashboard_model->get_fu_done(0,0);
        $data['fu_done_today'] = ($fu_don != 0) ? count($fu_don) : 0;
        $constul_call = ($this->dashboard_model->get_consultation_done(0,0));
        $data['consultation_done_today']  = ($constul_call != 0) ? count($constul_call) : 0;
        $action_assign = $this->dashboard_model->get_action_done(0,0);
        $data['action_done_today_data'] = ($action_assign != 0) ? count($action_assign) : 0;
        $hot_today = $this->dashboard_model->get_lead_by_status_month('hot','0');
        $data['hot'] = ($hot_today != 0) ? count($hot_today) : 0;
        $warm_today = $this->dashboard_model->get_lead_by_status_month('warm','0');
        $data['warm'] = ($warm_today != 0) ? count($warm_today) : 0;
        // $data['today_sale'] = $this->dashboard_model->today_sale();
        $today_sale_amount =$this->dashboard_model->today_sale();
        $data['today_sale'] = ($today_sale_amount != 0) ? count($today_sale_amount) : 0;
        $data['today_sale_amount_no'] =$this->dashboard_model->today_sale();
        echo json_encode($data);
    }
    
    public function counsellor_wise_snapshot(){
        $get_counsellor=$this->dashboard_model->get_counsellor_goal();
        //  = $this->session->balance_session['first_name'];
        //   print_r($data);
        //   die();
        $i=0;
        foreach($get_counsellor as $key =>$value){
            $substatus =$this->dashboard_model->substatus_by_status($value['crm_user']);
            $sub ="";
            foreach ($substatus as $key => $val) {
                $sub .="<li>".$val['sub_status']." : <strong>".$val['cnt_sub_status']."</strong></li>";
            }
             $lead_captured_today = $this->dashboard_model->get_lead_captured1(0,$value['crm_user']);
        $other_lead_captured_today = $this->dashboard_model->get_lead_captured1(1,$value['crm_user']);
         $data1['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales1(0,$value['admin_id']);
      
        
             $data[$i]=array(
                'counsoler_name'=> $value['crm_user'],
                'photo'=>$value['photo'],
                'goal_lead'=>$value['goal_lead'],
                'goal_consult'=>$value['goal_consult'],
                'sale_gole'=> $value['sale_goal'],
                'unit_goal'=> $value['unit_goal'],
                'leads_in_hand'=> $lead_captured_today + $other_lead_captured_today,
                'consultation_done'=> count($this->dashboard_model->get_consultation_done1(1,$value['crm_user'])),
                'hot_mdth'=> $this->dashboard_model->today_hot1($value['crm_user']),
                'substatus_status' =>$sub,
                'sale_amount'=> $data1['sales_funnel_sales'][0]['amt'],
                'sale_unit'=> $data1['sales_funnel_sales'][0]['unit']
                );
                $i++;
        }
        // echo"<pre>";
        // print_r($data);
         echo json_encode($data);
    }
    
    
    
    public function sales_manager_source_wise(){
        $month = $this->input->post('month');
        $source_1_conversion = $this->dashboard_model->get_source_wise_conversion($month, '1');
        $source_2_conversion = $this->dashboard_model->get_source_wise_conversion($month, '2');
        $source_3_conversion = $this->dashboard_model->get_source_wise_conversion($month, '3');
        $source_4_conversion = $this->dashboard_model->get_source_wise_conversion($month, '4');
        $source_5_conversion = $this->dashboard_model->get_source_wise_conversion($month, '5');
        $source_6_conversion = $this->dashboard_model->get_source_wise_conversion($month, '6');
        $source_7_conversion = $this->dashboard_model->get_source_wise_conversion($month, '7');
        $source_8_conversion = $this->dashboard_model->get_source_wise_conversion($month, '8');
        $start_date =date('Y-m-01');
        if($month ==4){
            $start_date =date('Y-04-01');
            $end_date =date('Y-m-d');
        }elseif($month ==-3){
             $start_date =date('Y-m-01', strtotime("-3 month"));
            $end_date =date('Y-m-31', strtotime("-1 month"));;
        }elseif($month == -1){
            $end_date=date('Y-m-31', strtotime("-1 month"));;
            $start_date =date('Y-m-01', strtotime("-1 month"));
        }else{
            $start_date =date('Y-m-01');
            $end_date =date('Y-m-d');
        }
        foreach($source_1_conversion as $key => $value1){
            if($value1['source_group'] ==1){                // prime source
                $prime_all++;
                if($value1['source_name'] =='Whatsapp'){
                    $whatsapp_unconverted++;
                }elseif($value1['source_name'] =='Phone Enquiry'){
                    $phone_enquiry_unconverted++;
                }elseif($value1['source_name'] =='Walk-in'){
                    $walk_in_unconverted++;
                }elseif($value1['source_name'] =='Zopim'){
                    $zopim_unconverted++;
                }
                if($value1['order_date']>=$start_date && $value1['order_date']<= $end_date){
                $prime_converted++;  // converted prime source
                }else{
                    $prime_unconverted++; // Unconverted prime source
                }
                
            }
        }
        foreach($source_2_conversion as $key => $value2){
            if($value2['source_group'] ==2){                // social media
                $social_media++;
                if($value2['source_name'] =='Instagram'){
                    $instagram_unconverted++;
                }elseif($value2['source_name'] =='Facebook'){
                    $facebook_unconverted++;
                }elseif($value2['source_name'] =='LinkId'){
                    $linkId_unconverted++;
                }elseif($value2['source_name'] =='Twitter'){
                    $twitter_unconverted++;
                }
                if($value2['order_date']>=$start_date && $value2['order_date']<= $end_date){
                $social_media_converted++;  // converted prime source
                }else{
                    $social_media_unconverted++; // Unconverted prime source
                }
            }
        }
        foreach($source_3_conversion as $key => $value3){
            if($value3['source_group'] ==3){                // prime source
                $health_score++;
                if($value3['source_name'] =='Your BN Health Score Result'){
                    $your_bn_health_score_unconverted++;
                }elseif($value3['source_name'] =='Health Score'){
                    $health_score_bn_unconverted++;
                }elseif($value3['source_name'] =='APP Health Score'){
                    $app_health_score_unconverted++;
                }elseif($value3['source_name'] =='Free Health Score 1'){
                    $free_health_score1_unconverted++;
                }elseif($value3['source_name'] =='Free Health Score'){
                    $free_health_score_unconverted++;
                }
                if($value3['order_date']>=$start_date && $value3['order_date']<= $end_date){
                $health_score_converted++;  // converted prime sourc
                }else{
                    $health_score_unconverted++; // Unconverted prime source
                
                }
            }
        }
        foreach($source_4_conversion as $key => $value4){
            if($value4['source_group'] ==4){                // paid Adds
                $paid_adds++;
                if($value4['order_date']>=$start_date && $value4['order_date']<= $end_date){
                $paid_adds_converted++;  // converted prime source
                }else{
                    $paid_adds_unconverted++; // Unconverted prime source
                }
            }
        }
        foreach($source_5_conversion as $key => $value5){
            if($value5['source_group'] ==5){                // Others
                $others++;
                if($value5['source_name'] =='Landing Page 2'){
                    $leading_page_unconverted++;
                }elseif($value5['source_name'] =='Khyati Mam'){
                    $khyati_mam_unconverted++;
                }// converted other source
                if($value5['order_date']>=$start_date && $value5['order_date']<= $end_date){
                $others_converted++;  
                }else{
                $others_unconverted++; // Unconverted other source
                }
            }
        }
        foreach($source_6_conversion as $key => $value6){
            if($value6['source_group'] ==6){                // Others
                $web++;
                if($value6['source_name'] =='Blog Popup'){
                    $blog_popup_unconverted++;
                }elseif($value6['source_name'] =='Recipe Popup'){
                    $recipe_popup_unconverted++;
                }elseif($value6['source_name'] =='Contact Form'){
                    $contact_form_unconverted++;
                }elseif($value6['source_name'] =='Footer Enquiry'){
                    $footer_enquiry_unconverted++;
                }
                if($value6['order_date']>=$start_date && $value6['order_date']<= $end_date){
                $web_converted++;  // converted others
                }else{
                    $web_unconverted++; // Unconverted others
                }
                
            }
        }
        foreach($source_7_conversion as $key => $value7){
            if($value7['source_group'] ==7){            // Referral
                $referral_all++;
                if($value7['source_name'] =='Referral'){
                    $referral_unconverted_bn++;
                }
                if($value7['order_date']>=$start_date && $value7['order_date']<= $end_date){
                $referral_converted++;  // converted others
                }else{
                    $referral_unconverted++; // Unconverted others
                }
            }
                
        }
        foreach($source_8_conversion as $key => $value8){
            if($value8['source_group'] ==8){            // Registration
            $registration_all++;
            if($value8['source_name'] =='Registration'){
                    $registration_unconverted_bn++;
                }
            if($value8['order_date']>=$start_date && $value8['order_date']<= $end_date){
            $registration_converted++;  // converted Registration
            }else{
                $registration_unconverted++; // Unconverted Registration
            }
            }
        }
        
        
        $data['all_lead'] = $prime_all+$social_media+$health_score+$paid_adds+$others+$web+$referral_all+$registration_all;
        $data['prime_all'] = (!empty($prime_all)?$prime_all:0);
        $data['prime_converted'] = (!empty($prime_converted)?$prime_converted:0);
        $data['prime_unconverted'] = (!empty($prime_unconverted)?$prime_unconverted:0);
        $data['whatsapp'] = (!empty($whatsapp_unconverted)?$whatsapp_unconverted:0);
        $data['phone_enquiry'] = (!empty($phone_enquiry_unconverted)?$phone_enquiry_unconverted:0);
        $data['walk_in'] = (!empty($walk_in_unconverted)?$walk_in_unconverted:0);
        $data['zopim'] = (!empty($zopim_unconverted)?$zopim_unconverted:0);
        $data['social_media'] = (!empty($social_media)?$social_media:0);
        $data['social_media_converted'] = (!empty($social_media_converted)?$social_media_converted:0);
        $data['social_media_unconverted'] = (!empty($social_media_unconverted)?$social_media_unconverted:0);
        $data['instagram'] = (!empty($instagram_unconverted)?$instagram_unconverted:0);
        $data['facebook'] = (!empty($facebook_unconverted)?$facebook_unconverted:0);
        $data['linkId'] = (!empty($linkId_unconverted)?$linkId_unconverted:0);
        $data['twitter'] = (!empty($twitter_unconverted)?$twitter_unconverted:0);
        $data['health_score'] = (!empty($health_score)?$health_score:0);
        $data['health_score_converted'] = (!empty($health_score_converted)?$health_score_converted:0);
        $data['health_score_unconverted'] = (!empty($health_score_unconverted)?$health_score_unconverted:0);
        $data['your_bn_health_score'] = (!empty($your_bn_health_score_unconverted)?$your_bn_health_score_unconverted:0);
        $data['health_score_bn'] = (!empty($health_score_bn_unconverted)?$health_score_bn_unconverted:0);
        $data['app_health_score'] = (!empty($app_health_score_unconverted)?$app_health_score_unconverted:0) ;
        $data['free_health_score1'] =(!empty($free_health_score1_unconverted)?$free_health_score1_unconverted:0);
        $data['free_health_score']= (!empty($free_health_score_converted)?$free_health_score_converted:0);
        $data['paid_adds'] = (!empty($paid_adds)?$paid_adds:0);
        $data['paid_adds_unconverted'] = (!empty($paid_adds_unconverted)?$paid_adds_unconverted:0);
        $data['paid_adds'] = (!empty($paid_adds_unconverted)?$paid_adds_unconverted:0);
        $data['web'] = (!empty($web)?$web:0);
        $data['web_converted'] = (!empty($web_converted)?$web_converted:0);
        $data['web_unconverted'] = (!empty($web_unconverted)?$web_unconverted:0);
        $data['blog_popup'] = (!empty($blog_popup_unconverted)?$blog_popup_unconverted:0);
        $data['recipe_popup'] = (!empty($recipe_popup_unconverted)?$recipe_popup_unconverted:0);
        $data['contact_form'] = (!empty($contact_form_unconverted)?$contact_form_unconverted:0);
        $data['footer_enquiry'] = (!empty($footer_enquiry_unconverted)?$footer_enquiry_unconverted:0);
        $data['referral_all'] = (!empty($referral_all)?$referral_all:0);
        $data['referral_converted'] = (!empty($referral_converted)?$referral_converted:0);
        $data['referral_unconverted'] = (!empty($referral_unconverted)?$referral_unconverted:0);
        $data['referral']= (!empty($referral_unconverted_bn)?$referral_unconverted_bn:0);
        $data['registration_all'] = (!empty($registration_all)?$registration_all:0);
        $data['registration_converted'] = (!empty($registration_converted)?$registration_converted:0);
        $data['registration_unconverted'] = (!empty($registration_unconverted)?$registration_unconverted:0);
        $data['registration'] = (!empty($registration_unconverted_bn)?$registration_unconverted_bn:0);
        $data['others'] = (!empty($others)?$others:0);
        $data['others_converted'] =(!empty($others_converted)?$others_converted:0);
        $data['others_unconverted'] = (!empty($others_unconverted)?$others_unconverted:0);
        $data['leading_page']=(!empty($leading_page_unconverted)?$leading_page_unconverted:0);
        $data['khyati_mam'] = (!empty($khyati_mam_unconverted)?$khyati_mam_unconverted:0);


                // echo"<pre>";
        // print_r($data);
        // exit();
        echo json_encode($data);
    }
    
    
    
    
    public function conversion_ratio_funnel(){
        $month = $this->input->post('month');
        $conversion_ratio_lead = $this->dashboard_model->get_total_lead_assign_conversion_ratio('lead',$month);
        $conversion_ratio_consult = $this->dashboard_model->get_total_lead_assign_conversion_ratio('consultation',$month);
        $conversion_ratio_hot = $this->dashboard_model->get_total_lead_assign_conversion_ratio('hot',$month);
        $conversion_ratio_lead_sale = $this->dashboard_model->get_total_lead_assign_conversion_ratio_sale('lead',$month);
        $conversion_ratio_consult_sale = $this->dashboard_model->get_total_lead_assign_conversion_ratio_sale('consultation',$month);
        $conversion_ratio_hot_sale = $this->dashboard_model->get_total_lead_assign_conversion_ratio_sale('hot',$month);
        $data['all_lead']=count($conversion_ratio_lead);
        $data['consultation_done']=count($conversion_ratio_consult);
        $data['hot']=count($conversion_ratio_hot);
        $data['lead_sale']=count($conversion_ratio_lead_sale);
        $data['hot_sale']=count($conversion_ratio_hot_sale);
        $data['const_sale']=count($conversion_ratio_consult_sale);
        echo json_encode($data);
     }
    
    
    // avinash added this for sales manager end
    
    
    
    
    public function index()
    {
        // $this->load->helper('form');
        if($this->session->balance_session['email_id']=='marketing@balancenutrition.in'){
                // redirect('performance/mis_sales_manager');die;
                redirect('lead');die;
            }
        $c_name  = $this->session->balance_session['first_name'];
        $c_id  = $this->session->balance_session['admin_id'];
        $data['lead_capture_today_count'] = $this->dashboard_model->get_lead_capture_count_query(1);
        $data['lead_capture_mtd_count'] = $this->dashboard_model->get_lead_capture_count_query(2);
        
        $data['omr_lead_today_count'] =$this->dashboard_model->get_omr_lead(0);
        $a = $this->dashboard_model->get_omr_lead(1);
        $data['omr_lead_mtd_count'] =count($a);
        $hs=$cv=$diet=$blog=$ekit=$other=0;
        if($c_id=='216'){
            foreach($a as $val){
                if($val['enquiry_from']=='Your BN Health Score Result'){
                    $hs++;
                }else if($val['enquiry_from']=='cv'){
                    $cv++;
                }else if($val['enquiry_from']=='diet'){
                    $diet++;
                }else if($val['enquiry_from']=='blog'){
                    $blog++;
                }else if($val['enquiry_from']=='ekit'){
                    $ekit++;
                }else{
                    $other++;
                }
            }
            //print_r($a);
        }
        $data['omr_hs'] =$hs;
        $data['omr_cv'] =$cv;
        $data['omr_diet'] =$diet;
        $data['omr_blog'] =$blog;
        $data['omr_ekit'] =$ekit;
        $data['omr_other'] =$other;
        
        // today activities done
        
        
        $data['basic_stack_count'] = $this->dashboard_model->get_basic_stack();
         
         
        $data['today_task_calender'] = $this->dashboard_model->get_task_calender(0);
        $data['mtd_task_calender'] = $this->dashboard_model->get_task_calender(1);
        
        // print_r($data['lead_by_status']);exit;
        
        // End
        
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        
        $data['faqs_details']=$this->faq_model->get_all_faqs(); 
        $data['faqs_titles']=$this->faq_model->get_all_faq_titles();
        $data['mentor_draft']= $this->faq_model->getMentorDraft($this->mentor_id);
        
        $data['goal_set'] = $this->dashboard_model->get_goal_set();
        $data['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales(0,$c_id);
        //  print_r_custom($data['sales_funnel_sales']);exit;
        
        display_view('index',$data);
    }
    
    /*public function todays_activities_done(){
        $data['lead_captured_today'] = $this->dashboard_model->get_lead_captured(0,0);
        $data['lead_captured_mtd'] = $this->dashboard_model->get_lead_captured(1,0);

        $data['other_lead_captured_today'] = $this->dashboard_model->get_lead_captured(0,1);
        $data['other_lead_captured_mtd'] = $this->dashboard_model->get_lead_captured(1,1);
        
        $basic_stack_completed = $this->dashboard_model->get_basic_stack_completed();
        
        // print_r($basic_stack_completed); exit;
        
        $last_7_days=$last_15_days=$last_30_days=$last_90_days=0;
        if($basic_stack_completed != 0){
            foreach($basic_stack_completed as $val){
                //echo $val['DATE']." Diff :: ";
                $end = strtotime(date('Y-m-d'));
                $start = strtotime(date_format(date_create($val['DATE']),"Y-m-d"));
                
                $days_between = ceil(abs($end - $start) / 86400)."<br>";
                if($days_between > 0 && $days_between <=7 ){
                    $last_7_days++;
                }elseif($days_between > 7 && $days_between <= 15 ){
                    $last_15_days++;
                }elseif($days_between > 15 && $days_between <= 30 ){
                    $last_30_days++;
                }elseif($days_between > 30 && $days_between <= 90 ){
                    $last_90_days++;
                }
            }
        } else{
            $last_7_days=$last_15_days=$last_30_days=$last_90_days=0;
        }
        
        $data['last_7_days']   =   $last_7_days;
        $data['last_15_days']   =   $last_15_days;
        $data['last_30_days']   =   $last_30_days;
        $data['last_90_days']   =   $last_90_days;
        
        
        $data['fu_done_today'] = $this->dashboard_model->get_fu_done(0);
        $data['fu_done_mtd'] = $this->dashboard_model->get_fu_done(1);
        
        $data['consultation_done_today'] = $this->dashboard_model->get_consultation_done(0);
        $data['consultation_done_mtd'] = $this->dashboard_model->get_consultation_done(1);
        
        $data['action_done_today'] = $this->dashboard_model->get_action_done(0);
        $data['action_done_mtd'] = $this->dashboard_model->get_action_done(1);
            
        $lead_by_status = $this->dashboard_model->get_lead_by_status();
        //$lead_by_stage = $this->dashboard_model->get_lead_by_stage(1);
        $stage1=$stage2=$stage3=$stage4=0;
        $data['stage1']   =   $this->dashboard_model->get_lead_by_stage(1);;
        $data['stage2']   =   $this->dashboard_model->get_lead_by_stage(2);;
        $data['stage3']   =   $this->dashboard_model->get_lead_by_stage(3);;
        $data['stage4']   =   $this->dashboard_model->get_lead_by_stage(4);;
        
        
        // print($lead_by_status);exit;
        
        $lead_by_status_list = "";
        if($lead_by_status != 0){
            foreach($lead_by_status as $val) {
            	if($val['status'] == 'To Engage'){

                 	$lead_by_status_list .= "<li style='color:red;line-height:100%'>".$val['status']."<br><span style='font-size:9px'>(No action)</span><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", $val['status'])))."' target='_blank' alt='".$val['status'];
            	}else{
            		$lead_by_status_list .= "<li>".$val['status']."<a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", $val['status'])))."' target='_blank' alt='".$val['status'];
            	}


                $lead_by_sub_status = $this->dashboard_model->get_lead_by_sub_status($val['status']);
                $z = 0;
                if(count($lead_by_sub_status)>0){

                	if($val['status'] == 'To Engage'){
                		$lead_by_status_list .= "'><div class='tooltip' style='color:red'>".$val['c'];
	            	}else{
	            		$lead_by_status_list .= "'><div class='tooltip'>".$val['c'];
	            	}
                    
                    foreach ($lead_by_sub_status as $key => $value) {
                        if($value['sub_status']!=""){
                            if($z==0){
                                $lead_by_status_list .= "<span class='tooltiptext'>";
                            }
                            $lead_by_status_list .= $value['sub_status']." <div class='sub_text_count'> ".$value['cnt_sub_status']."</div><br>";
                            if(count($lead_by_sub_status)-1==$z){
                                $lead_by_status_list .= "</span>";
                            }
                            $z++;
                        }
                        
                    }
                    $lead_by_status_list .= "</div><";
                }else{
                    $lead_by_status_list .= "'>".$val['c']."</div><";
                }//if(count($lead_by_sub_status)>0){
                
               $lead_by_status_list .= "/a></li>";
            }
        }
        
        $data['lead_by_status_list'] = $lead_by_status_list;
        
       
        $data['phase1']   =   $this->dashboard_model->get_lead_by_phase(1); 
        $data['phase2']   =   $this->dashboard_model->get_lead_by_phase(2); 
        $data['phase3']   =   $this->dashboard_model->get_lead_by_phase(3); 
        $data['phase4']   =   $this->dashboard_model->get_lead_by_phase(4); 
        
        
        echo json_encode($data);
    }*/
    
    /*public function performance_analysis(){
        $data['faqs_details']=$this->faq_model->get_all_faqs(); 
        $data['faqs_titles']=$this->faq_model->get_all_faq_titles();
        $data['mentor_draft']= $this->faq_model->getMentorDraft($this->mentor_id);
        
        $data['sales_funnel_lead'] = $this->dashboard_model->get_sales_funnel_lead(0);
        $data['sales_funnel_lead_team'] = $this->dashboard_model->get_sales_funnel_lead(1);
        
        $data['sales_funnel_consultation'] = $this->dashboard_model->get_sales_funnel_consultation(0);
        $data['sales_funnel_consultation_team'] = $this->dashboard_model->get_sales_funnel_consultation(1);
        
        $data['sales_funnel_warm'] = $this->dashboard_model->get_sales_funnel_warm(0);
        $data['sales_funnel_warm_team'] = $this->dashboard_model->get_sales_funnel_warm(1);
        
        $data['sales_funnel_hot'] = $this->dashboard_model->get_sales_funnel_hot(0);
        $data['sales_funnel_hot_team'] = $this->dashboard_model->get_sales_funnel_hot(1);
        
        $data['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales(0);
        $data['sales_funnel_sales_team'] = $this->dashboard_model->get_sales_funnel_sales(1);
        
        $data['bs_sales'] = $this->dashboard_model->get_month_sales_report(2);
        $data['bs_renewal'] = $this->dashboard_model->get_month_sales_report(3);
        $data['advance_sales'] = $this->dashboard_model->get_month_sales_report(1);
        $data['bs_upgrade'] = $this->dashboard_model->get_month_sales_report(4);
        
        $data['goal_set'] = $this->dashboard_model->get_goal_set();
        
        // LC self
        $data['lc_self_lead'] = $this->dashboard_model->get_lead_conversion(1,1);
        $data['lc_self_warm'] = $this->dashboard_model->get_lead_conversion(3,1);
        $data['lc_self_hot'] = $this->dashboard_model->get_lead_conversion(2,1);
        $data['lc_self_consultation'] = $this->dashboard_model->get_lead_conversion(4,1);
        
        // LC other
        $data['lc_other_lead'] = $this->dashboard_model->get_lead_conversion(1,0);
        $data['lc_other_warm'] = $this->dashboard_model->get_lead_conversion(3,0);
        $data['lc_other_hot'] = $this->dashboard_model->get_lead_conversion(2,0);
        $data['lc_other_consultation'] = $this->dashboard_model->get_lead_conversion(4,0);
        
        // sales self
        $data['sales_self_lead'] = $this->dashboard_model->get_sales_conversion(1,1);
        $data['sales_self_warm'] = $this->dashboard_model->get_sales_conversion(3,1);
        $data['sales_self_hot'] = $this->dashboard_model->get_sales_conversion(2,1);
        $data['sales_self_consultation'] = $this->dashboard_model->get_sales_conversion(4,1);
        
        // print_r($data['sales_self_lead']);exit;
        
        // sales other
        $data['sales_other_lead'] = $this->dashboard_model->get_sales_conversion(1,0);
        $data['sales_other_warm'] = $this->dashboard_model->get_sales_conversion(3,0);
        $data['sales_other_hot'] = $this->dashboard_model->get_sales_conversion(2,0);
        $data['sales_other_consultation'] = $this->dashboard_model->get_sales_conversion(4,0);
        
        $avg_calls = $this->dashboard_model->get_Avg_Calls();
        
        $data['avg_calls'] = $avg_calls[0]['fu_count'] + $avg_calls[0]['key_insight'];
        // print_r($avg_calls); exit;
        
        display_view('performance_analysis_view',$data);
    }*/
    
    // AVINASH PANDEY CODE
    public function todays_activities_done(){
        $name = $this->session->balance_session['first_name'];
        // $total_data = $this->dashboard_model->get_total_lead_captured();

        $total_lead_capture= 0;//$this->dashboard_model->get_total_lead_capture($name);
        $total_lead_capture_assign_by_me= 0;//$this->dashboard_model->total_lead_capture_assign_by_me($name); 
        $total_lead_capture_assign_by_other= 0;//$this->dashboard_model->total_lead_capture_assign_by_other($name);
        
        //0.180ms
        $total_lead_comleted= 0;//$this->dashboard_model->total_lead_comleted($name);
        $total_lead_comleted_assign_me= 0;//$this->dashboard_model->total_lead_comleted_assign_me($name); 
        $total_lead_comleted_assign_other= 0;//$this->dashboard_model->total_lead_comleted_assign_other($name); 
        //exit;//1.35s
        $total_lead_remaining= 0;//$this->dashboard_model->total_lead_remaining($name);
        $total_lead_remaining_assign_me= 0;//$this->dashboard_model->total_lead_remaining_assign_me($name); 
        $total_lead_remaining_assign_other= 0;//$this->dashboard_model->total_lead_remaining_assign_other($name); 
        
        //print_r($this->dashboard_model->lead_capture_mtd($name)[0]['assign_from']);
        $captured_lead = $this->dashboard_model->lead_capture_mtd($name);
        $total_lead_today_capture_by_me=$total_lead_today_capture_by_others=$total_lead_monthly_capture_by_me=$total_lead_monthly_capture_by_others=0;
        $phase_1=$phase_2=$phase_3=$phase_4=$stage_1=$stage_2=$stage_3=$stage_4=$no_phase=$no_stage=0;
        foreach($captured_lead as $val){
            if($val['curr_month']==date('m')){
                if(strtolower($val['assign_from'])==strtolower($name) || strtolower($val['assign_from'])==''){ // Lead Captured
                    if($val['date']==date('d')){
                        $total_lead_today_capture_by_me++;
                    }
                    $total_lead_monthly_capture_by_me++;
                }else{ // Assigned by others
                   if($val['date']==date('d')){
                        $total_lead_today_capture_by_others++;
                    }
                    $total_lead_monthly_capture_by_others++; 
                }
            }
            if($val['stage']==1){ //Stage wise MTD
                $stage_1++;   
            }elseif($val['stage']==2){
                $stage_2++;   
            }elseif($val['stage']==3){
                $stage_3++;   
            }elseif($val['stage']==4){
                $stage_4++;   
            }else{
                $no_stage++;
            }
            
            if($val['phase']==1){ //Phase wise MTD
                $phase_1++;   
            }elseif($val['phase']==2){
                $phase_2++;   
            }elseif($val['phase']==3){
                $phase_3++;   
            }elseif($val['phase']==4){
                $phase_4++;   
            }else{
                $no_phase++;  
            }
            
        }
        //echo $phase_1." :: ".$phase_2." :: ".$phase_3." :: ".$phase_4;
        //exit;
        //echo $total_lead_today_capture_by_me." :: ".$total_lead_today_capture_by_others." :: ".$total_lead_monthly_capture_by_me." :: ".$total_lead_monthly_capture_by_others;
        /*$total_lead_today_capture_by_me= $this->dashboard_model->total_lead_today_capture_by_me($name); 
        $total_lead_today_capture_by_others = $this->dashboard_model->total_lead_today_capture_by_other($name);
        $total_lead_monthly_capture_by_me= $this->dashboard_model->get_total_lead_capture_by_me_mtd($name); 
        $total_lead_monthly_capture_by_others = $this->dashboard_model->total_lead_monthly_capture_by_others($name);*/
        //exit;//2.24s
        
       /* $phase_1 = $this->dashboard_model->phase_lead($name,1);
        $phase_2 = $this->dashboard_model->phase_lead($name,2);
        $phase_3 = $this->dashboard_model->phase_lead($name,3);
        $phase_4 = $this->dashboard_model->phase_lead($name,4);
        $no_phase = $this->dashboard_model->Nophase_lead($name,'');
        
        /*$stage_1 = $this->dashboard_model->stage_lead($name,1);
        $stage_2 = $this->dashboard_model->stage_lead($name,2);
        $stage_3 = $this->dashboard_model->stage_lead($name,3);
        $stage_4 = $this->dashboard_model->stage_lead($name,4); */
        
        $phase_1_completed = 0;//$this->dashboard_model->phase_lead_complete($name,1);
        $phase_2_completed = 0;//$this->dashboard_model->phase_lead_complete($name,2);
        $phase_3_completed = 0;//$this->dashboard_model->phase_lead_complete($name,3);
        $phase_4_completed = 0;//$this->dashboard_model->phase_lead_complete($name,4);
        
        
        $stage_1_completed = 0;//$this->dashboard_model->stage_lead_complete($name,1);
        $stage_2_completed = 0;//$this->dashboard_model->stage_lead_complete($name,2);
        $stage_3_completed = 0;//$this->dashboard_model->stage_lead_complete($name,3);
        $stage_4_completed = 0;//$this->dashboard_model->stage_lead_complete($name,4);
        
        $stage_wise = $this->dashboard_model->stagewise_completed_lead($name);
        foreach($stage_wise as $val){
            if($val['stage']==1){ 
                $stage_1_completed++;
            }elseif($val['stage']==2){ 
                $stage_2_completed++;
            }elseif($val['stage']==3){ 
                $stage_3_completed++;
            }elseif($val['stage']==4){ 
                $stage_4_completed++;
            }
            if($val['phase']==1){ 
                $phase_1_completed++;
            }elseif($val['phase']==2){ 
                $phase_2_completed++;
            }elseif($val['phase']==3){ 
                $phase_3_completed++;
            }elseif($val['phase']==4){ 
                $phase_4_completed++;
            }
        }
        
        $phase_1_overall = 0;//$this->dashboard_model->phase_overall($name,1);
        $phase_2_overall = 0;//$this->dashboard_model->phase_overall($name,2);
        $phase_3_overall = 0;//$this->dashboard_model->phase_overall($name,3);
        $phase_4_overall = 0;//$this->dashboard_model->phase_overall($name,4);
        $no_phase_overall = 0;//$this->dashboard_model->Nophase_overall_lead($name);
        
        $phase_1_completed_overall = 0;//$this->dashboard_model->phase_overall_complete($name,1);
        $phase_2_completed_overall = 0;//$this->dashboard_model->phase_overall_complete($name,2);  
        $phase_3_completed_overall = 0;//$this->dashboard_model->phase_overall_complete($name,3);
        $phase_4_completed_overall = 0;//$this->dashboard_model->phase_overall_complete($name,4);
        
        $phase_1_not_converted = 0;//$this->dashboard_model->phase_overall_not_complete($name,1);
        $phase_2_not_converted = 0;//$this->dashboard_model->phase_overall_not_complete($name,2);  
        $phase_3_not_converted = 0;//$this->dashboard_model->phase_overall_not_complete($name,3);
        $phase_4_not_converted = 0;//$this->dashboard_model->phase_overall_not_complete($name,4);
        
        $stage_1_overall = 0;//$this->dashboard_model->stage_overall($name,1);
        $stage_2_overall = 0;//$this->dashboard_model->stage_overall($name,2);
        $stage_3_overall = 0;//$this->dashboard_model->stage_overall($name,3);
        $stage_4_overall = 0;//$this->dashboard_model->stage_overall($name,4);
        
        $stage_1_completed_overall = 0;//$this->dashboard_model->stage_overall_complete($name,1);
        $stage_2_completed_overall = 0;//$this->dashboard_model->stage_overall_complete($name,2);
        $stage_3_completed_overall = 0;//$this->dashboard_model->stage_overall_complete($name,3);
        $stage_4_completed_overall = 0;//$this->dashboard_model->stage_overall_complete($name,4);
        
        $stage_1_not_converted = 0;//$this->dashboard_model->stage_overall_not_complete($name,1);
        $stage_2_not_converted = 0;//$this->dashboard_model->stage_overall_not_complete($name,2);
        $stage_3_not_converted = 0;//$this->dashboard_model->stage_overall_not_complete($name,3);
        $stage_4_not_converted = 0;//$this->dashboard_model->stage_overall_not_complete($name,4);
        
        $fu_assigned_monthly = 0;
        $fu_assigned_today = 0;
        $basic_stack_7days = 0;//$this->dashboard_model->basic_stack($name,7);
        $basic_stack_8_15days = 0;//$this->dashboard_model->basic_stack($name,15);
        $basic_stack_15_30days = 0;//$this->dashboard_model->basic_stack($name,30);
        $basic_stack_30_90days = 0;//$this->dashboard_model->basic_stack($name,90);
        
        $total_lead_comleted_not_converted = $total_lead_remaining;
        $data['total_lead_capture'] = 0;//$total_lead_capture;
        $data['total_lead_capture_assign_by_me'] = 0;//$total_lead_capture_assign_by_me;
        $data['total_lead_capture_assign_by_other'] = 0;//$total_lead_capture_assign_by_other;
        $data['total_lead_comleted'] = 0;//$total_lead_comleted;
        $data['total_lead_comleted_assign_me'] = 0;//$total_lead_comleted_assign_me;
        $data['total_lead_comleted_assign_other'] = 0;//$total_lead_comleted_assign_other;
        $data['total_lead_remaining'] = 0;//$total_lead_remaining;
        $data['total_lead_remaining_assign_me'] = 0;//$total_lead_remaining_assign_me;
        $data['total_lead_remaining_assign_other'] = 0;//$total_lead_remaining_assign_other;
        $data['total_lead_today_capture_by_me'] = $total_lead_today_capture_by_me;
        $data['total_lead_today_capture_by_others'] = $total_lead_today_capture_by_others;
        $data['total_lead_monthly_capture_by_me'] = $total_lead_monthly_capture_by_me;
        // $data['total_lead_monthly_capture_by_me'] = Count($total_data_capture_by_me);
        $data['total_lead_monthly_capture_by_others'] = $total_lead_monthly_capture_by_others;

        // $data['phase1'] = '<div class="tooltip">'.$phase_1 . ' | <span style= "color:green" >' .$phase_1_completed .'</span>'.'<span class="tooltiptext1">Overall lead Phase 1 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_1_overall" target="_blank">'.$phase_1_overall.'</a></div><br>Overall lead Completed <br>Phase 1 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_1_completed_overall" target="_blank">'.$phase_1_completed_overall.'</a></div>
        // <br>Phase 1 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_1_not_converted" target="_blank">'.$phase_1_not_converted.'</a></div>
        // </span></div>';
        
        /*$data['phase1'] = '<div class="tooltip">'.$phase_1 . ' | <span style= "color:green" >' .$phase_1_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;"><center><h6>Phase 1</h6></center>All : <div class="sub_text_count" style="text-align:right;"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_1_overall" target="_blank">'.$phase_1_overall.'</a></div><br>Converted : <div class="sub_text_count" style="text-align:right;"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_1_completed_overall" target="_blank">'.$phase_1_completed_overall.'</a></div>
        <br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_1_not_converted" target="_blank">'.$phase_1_not_converted.'</a></div>
        </span></div>';*/
        $data['phase1'] = '<a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=1_p&limit='.$phase_1_completed.'" style="color:green;" target="_blank">'.$phase_1_completed.'</a> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=1_p&limit='.$phase_1.'" target="_blank">'.$phase_1.'</a>';
        // $data['phase2'] = '<div class="tooltip">'.$phase_2 . ' | <span style= "color:green" >' .$phase_2_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;">Overall lead Phase 2 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_2_overall" target="_blank">'.$phase_2_overall.'</a></div><br>Overall lead Completed <br>of Phase 2 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_2_completed_overall" target="_blank">'.$phase_2_completed_overall.'</a></div>
        // <br>Phase 2 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_2_not_converted" target="_blank">'.$phase_2_not_converted.'</a></div></span></div>';
        
        /*$data['phase2'] = '<div class="tooltip">'.$phase_2 . ' | <span style= "color:green" >' .$phase_2_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;"><center><h6>Phase 2 : </h6></center>All :<div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_2_overall" target="_blank">'.$phase_2_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_2_completed_overall" target="_blank">'.$phase_2_completed_overall.'</a></div>
        <br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_2_not_converted" target="_blank">'.$phase_2_not_converted.'</a></div></span></div>';
        */
        $data['phase2'] = '<a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=2_p&limit='.$phase_2_completed.'" style="color:green;" target="_blank">'.$phase_2_completed.'</a> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=2_p&limit='.$phase_2.'" target="_blank">'.$phase_2.'</a>';


        // $data['phase3'] = '<div class="tooltip">'.$phase_3 . ' | <span style= "color:green" >' .$phase_3_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;">Overall lead Phase 3 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_3_overall" target="_blank">'.$phase_3_overall.'</a></div><br>Overall lead Completed <br>of Phase 3 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_3_completed_overall" target="_blank">'.$phase_3_completed_overall.'</a></div><br>Phase 3 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_3_not_converted" target="_blank">'.$phase_3_not_converted.'</a></div></span></div>';
        //$data['phase3'] = '<div class="tooltip">'.$phase_3 . ' | <span style= "color:green" >' .$phase_3_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;"><center><h6>Phase 3 : </h6></center>All : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_3_overall" target="_blank">'.$phase_3_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_3_completed_overall" target="_blank">'.$phase_3_completed_overall.'</a></div><br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_3_not_converted" target="_blank">'.$phase_3_not_converted.'</a></div></span></div>';
        $data['phase3'] = '<a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=3_p&limit='.$phase_3_completed.'" style="color:green;" target="_blank">'.$phase_3_completed.'</a> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=3_p&limit='.$phase_3.'" target="_blank">'.$phase_3.'</a>';
        // $data['phase4'] = '<div class="tooltip">'.$phase_4 . ' | <span style= "color:green" >' .$phase_4_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;">Overall lead Phase 4 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_4_overall" target="_blank">'.$phase_4_overall.'</a></div><br>Overall lead Completed <br>of Phase 4 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_4_completed_overall" target="_blank">'.$phase_4_completed_overall.'</a></div><br>Phase 4 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_4_not_converted" target="_blank">'.$phase_4_not_converted.'</a></div></span></div>';
        //$data['phase4'] = '<div class="tooltip">'.$phase_4 . ' | <span style= "color:green" >' .$phase_4_completed .'</span>'.'<span class="tooltiptext1" style="right: 45px;"><center><h6>Phase 4 : </h6></center>All :<div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_4_overall" target="_blank">'.$phase_4_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_4_completed_overall" target="_blank">'.$phase_4_completed_overall.'</a></div><br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=phase_4_not_converted" target="_blank">'.$phase_4_not_converted.'</a></div></span></div>';
        $data['phase4'] = '<a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=4_p&limit='.$phase_4_completed.'" style="color:green;" target="_blank">'.$phase_4_completed.'</a> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=4_p&limit='.$phase_4.'" target="_blank">'.$phase_4.'</a>';
        
        // $data['no_phase'] = '<div class="tooltip">'.$no_phase .'<span class="tooltiptext1">Overall lead No Phase : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=no_phase_overall" target="_blank">'.$no_phase_overall.'</a></div></span></div>';
        //$data['no_phase'] = '<div class="tooltip">'.$no_phase .'<span class="tooltiptext1" style="right: 45px;"><center><h6>No Phase : </h6></center>All : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=no_phase_overall" target="_blank">'.$no_phase_overall.'</a></div></span></div>';
        $data['no_phase'] = '<a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=no_phase_overall&limit='.$no_phase.'" target="_blank">'.$no_phase.'</a>';
        
        // $data['stage1'] = '<div class="tooltip">'.$stage_1 . ' | <span style= "color:green" >' .$stage_1_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;">Stage 1 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_1_overall" target="_blank">'.$stage_1_overall.'</a></div><br>Overall lead Completed <br>of Stage 1 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_1_completed_overall" target="_blank">'.$stage_1_completed_overall.'</a></div><br>Stage 1 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_1_not_converted" target="_blank">'.$stage_1_not_converted.'</a></div></span></div>';
        $data['stage1'] = '<div class="tooltip" style="z-index:0;">'.$stage_1 . ' | <span style= "color:green" >' .$stage_1_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;"><center><h6>Stage 1 : </h6></center>All :<div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_1_overall" target="_blank">'.$stage_1_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_1_completed_overall" target="_blank">'.$stage_1_completed_overall.'</a></div><br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_1_not_converted" target="_blank">'.$stage_1_not_converted.'</a></div></span></div>';
        // $data['stage2'] = '<div class="tooltip">'.$stage_2 . ' | <span style= "color:green" >' .$stage_2_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;">Overall lead Stage 2 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_2_overall" target="_blank">'.$stage_2_overall.'</a></div><br>Overall lead Completed <br>of Stage 2 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_2_completed_overall" target="_blank">'.$stage_2_completed_overall.'</a></div><br>Stage 2 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_2_not_converted" target="_blank">'.$stage_2_not_converted.'</a></div></span></div>';
        $data['stage2'] = '<div class="tooltip" style="z-index:0;">'.$stage_2 . ' | <span style= "color:green" >' .$stage_2_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;"><center><h6>Stage 2 : </h6></center>All :<div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_2_overall" target="_blank">'.$stage_2_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_2_completed_overall" target="_blank">'.$stage_2_completed_overall.'</a></div><br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_2_not_converted" target="_blank">'.$stage_2_not_converted.'</a></div></span></div>';
        // $data['stage3'] = '<div class="tooltip">'.$stage_3 . ' | <span style= "color:green" >' .$stage_3_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;">Overall lead Stage 3 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_3_overall" target="_blank">'.$stage_3_overall.'</a></div><br>Overall lead Completed <br>of Stage 3 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_3_completed_overall" target="_blank">'.$stage_3_completed_overall.'</a></div><br>Stage 3 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_3_not_converted" target="_blank">'.$stage_3_not_converted.'</a></div></span></div>';
        $data['stage3'] = '<div class="tooltip" style="z-index:0;">'.$stage_3 . ' | <span style= "color:green" >' .$stage_3_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;"><center></h6>Stage 3 :</h6></center>All :<div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_3_overall" target="_blank">'.$stage_3_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_3_completed_overall" target="_blank">'.$stage_3_completed_overall.'</a></div><br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_3_not_converted" target="_blank">'.$stage_3_not_converted.'</a></div></span></div>';
        // $data['stage4'] = '<div class="tooltip">'.$stage_4 . ' | <span style= "color:green" >' .$stage_4_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;">Overall lead Stage 4 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_4_overall" target="_blank">'.$stage_4_overall.'</a></div><br>Overall lead Completed <br>of Stage 4 : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_4_completed_overall" target="_blank">'.$stage_4_completed_overall.'</a></div><br>Stage 4 not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_4_not_converted" target="_blank">'.$stage_4_not_converted.'</a></div></span></div>';
        //Dont delete below code
        $data['stage4'] = '<div class="tooltip" style="z-index:0;">'.$stage_4 . ' | <span style= "color:green" >' .$stage_4_completed .'</span>'.'<span class="tooltiptext" style="right: 45px;"><center><h6>Stage 4 : </h6></center>All :<div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_4_overall" target="_blank">'.$stage_4_overall.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_4_completed_overall" target="_blank">'.$stage_4_completed_overall.'</a></div><br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=stage_4_not_converted" target="_blank">'.$stage_4_not_converted.'</a></div></span></div>';
        /*$data['basic_stack_7days'] = $basic_stack_7days;
        $data['basic_stack_8_15days'] = $basic_stack_8_15days;
        $data['basic_stack_15_30days'] = $basic_stack_15_30days;
        $data['basic_stack_30_90days'] = $basic_stack_30_90days;*/
        $data['last_7_days']   =   $basic_stack_7days;
        $data['last_15_days']   =   $basic_stack_8_15days;
        $data['last_30_days']   =   $basic_stack_15_30days;
        $data['last_90_days']   =   $basic_stack_30_90days;
        //Dont delete Above code
        $data['fu_assigned_monthly'] = $fu_assigned_monthly;
        $data['fu_assigned_today'] = $fu_assigned_today;
        /*echo '<pre>';
        print_r($data);
        die;*/
        $data['lead_captured_today'] = $total_lead_today_capture_by_me;
        // $data['lead_captured_mtd'] = '<div class="tooltip" style="font-size:35px;top:13px">'.$total_lead_monthly_capture_by_me.'<span class="tooltiptext">Over All : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead" target="_blank">'.$total_lead_capture.'</a></div><br>Total lead Completed : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed" target="_blank">'.$total_lead_comleted.'</a></div><br>Total lead Completed <br>Assign By Me : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_assign_by_me" target="_blank">'.$total_lead_comleted_assign_me.'</a></div>
        // <br>Total lead not converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_not_converted" target="_blank">'.$total_lead_comleted_not_converted.'</a></div></span></div>';
        $data['lead_captured_mtd'] = '<div class="tooltip" style="font-size:35px;top:13px">'.$total_lead_monthly_capture_by_me.'<span class="tooltiptext"><center><h6>Captured Lead</h6></center>All : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead" target="_blank">'.$total_lead_capture.'</a></div><br>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed" target="_blank">'.$total_lead_comleted.'</a></div>
        <br>Unconverted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_not_converted" target="_blank">'.$total_lead_comleted_not_converted.'</a></div></span></div>';
        $data['other_lead_captured_today'] = $total_lead_today_capture_by_others;
        // $data['other_lead_captured_mtd'] = '<div class="tooltip" style="font-size:35px; top:13px;">'.$total_lead_monthly_capture_by_others.'<span class="tooltiptext">Total lead Completed <br>Assign By Others : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_assign_by_others" target="_blank">'.$total_lead_comleted_assign_other.'</a></div></span></div>';
        // $data['other_lead_captured_mtd'] = '<div class="tooltip" style="font-size:35px; top:13px;">'.$total_lead_monthly_capture_by_others.'<span class="tooltiptext"><center><h6>Assigned By Others</h6></center>Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_assign_by_others" target="_blank">'.$total_lead_comleted_assign_other.'</a></div><br>
        // Converted : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_assign_by_others" target="_blank">'.$total_lead_comleted_assign_other.'</a></div></span></div>';
        $data['other_lead_captured_mtd'] = '<div class="tooltip" style="font-size:35px;top:13px">'.$total_lead_monthly_capture_by_others.'<span class="tooltiptext"><center><h6>Assigned By Others</h6></center><br>Converted : <div class="sub_text_count" style="font-size:35px;top:13px"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_completed_assign_by_others" target="_blank" style="font-size: 12px;">'.$total_lead_comleted_assign_other.'</a></div>
        <br>Unconverted : <div class="sub_text_count" > <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_lead_remaining_assign_other" target="_blank" style="font-size: 12px;">'.$total_lead_remaining_assign_other.'</a></div></span></div>';
        $fu_done_today_cnt = $this->dashboard_model->get_fu_done(0,1);
        $data['fu_done_today'] = ($fu_done_today_cnt != 0) ? count($fu_done_today_cnt) : 0;
        $fu_done_mtd_cnt = $this->dashboard_model->get_fu_done(1,1);
        $data['fu_done_mtd'] = ($fu_done_mtd_cnt != 0) ? count($fu_done_mtd_cnt) : 0;
        $consultation_done_today_cnt = $this->dashboard_model->get_consultation_done(0,1);
        $data['consultation_done_today'] = ($consultation_done_today_cnt != 0) ? count($consultation_done_today_cnt) : 0;
        // $data['consultation_done_mtd'] = $this->dashboard_model->get_consultation_done(1,1);
        $data['consultation_done_mtd'] = '<div class="tooltip" style="font-size:18px">'.count($this->dashboard_model->get_consultation_done(1,1)).'<span class="tooltiptext">Total Consultation Done : <div class="sub_text_count"> <a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=total_cnsltn_done" target="_blank">'.count($this->dashboard_model->get_consultation_done(2,1)).'</a></div><br><u><center>Unconverted</center></u><table style="border-bottom-color: black;"><tr><td>Hot</td><td>0</td></tr><tr><td>Warm</td><td>0</td></tr><tr><td>To Engage</td><td>0</td></tr></table></span></div>';
        $data['action_done_today'] = $this->dashboard_model->get_action_done(0,1);
        $data['action_done_mtd'] = $this->dashboard_model->get_action_done(1,1);
            
        $lead_by_status_cold_mdth= $this->dashboard_model->get_lead_by_status_mdth('cold');
        $lead_by_status_cold_overall = $this->dashboard_model->get_lead_by_status_overall('cold');
        
        $lead_by_status_hot_mdth= $this->dashboard_model->get_lead_by_status_mdth('hot');
        $lead_by_status_hot_overall = $this->dashboard_model->get_lead_by_status_overall('hot');
        
        $lead_by_status_spam_mdth= $this->dashboard_model->get_lead_by_status_mdth('spam');
        $lead_by_status_spam_overall = $this->dashboard_model->get_lead_by_status_overall('spam');
        
        $lead_by_status_to_engage_mdth= $this->dashboard_model->get_lead_by_status_mdth('To Engage');
        $lead_by_status_to_engage_overall = $this->dashboard_model->get_lead_by_status_overall('To Engage');
        
        $lead_by_status_warm_mdth= $this->dashboard_model->get_lead_by_status_mdth('warm');
        $lead_by_status_warm_overall = $this->dashboard_model->get_lead_by_status_overall('warm');
        
        $lead_by_cold_sub_status = $this->dashboard_model->get_lead_by_sub_status('cold');
        $lead_by_sub_hot_status = $this->dashboard_model->get_lead_by_sub_status('hot');
        $lead_by_sub_spam_status = $this->dashboard_model->get_lead_by_sub_status('spam');
        $lead_by_sub_to_engage_status = $this->dashboard_model->get_lead_by_sub_status('To Engage');
        $lead_by_sub_warm_status = $this->dashboard_model->get_lead_by_sub_status('warm');
        foreach ($lead_by_cold_sub_status as $key => $value) {
            if($value['sub_status']!=""){
                if($z==0){
                $lead_by_list_cold .= "<span class='tooltiptext' style='top:-139px;left: 170px;height: 206px;'>";
                }
                $lead_by_list_cold .= $value['sub_status']." <div class='sub_text_count sub_count_details'> <a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'cold')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div><br>";
                if(count($lead_by_cold_sub_status)-1==$z){
                    $lead_by_list_cold .= "</span>";
                }
                $z++;
            }
        }
        $z=0;
        foreach ($lead_by_sub_hot_status as $key => $value) {
            if($value['sub_status']!=""){
                if($z==0){
                $lead_by_list_hot .= "<span class='tooltiptext' style='left: 170px;'>";
                }
                $lead_by_list_hot .= $value['sub_status']." <div class='sub_text_count sub_count_details'> <a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'hot')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div><br>";
                 if(count($lead_by_sub_hot_status)-1==$z){
                    $lead_by_list_hot .= "</span>";
                }
                $z++;
            }
        }
        $z=0;
        foreach ($lead_by_sub_spam_status as $key => $value) {
            if($value['sub_status']!=""){
                if($z==0){
                $lead_by_list_spam .= "<span class='tooltiptext' style='left: 170px;'>";
                }
                $lead_by_list_spam .= $value['sub_status']." <div class='sub_text_count sub_count_details'> <a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'spam')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div><br>";
                 if(count($lead_by_sub_spam_status)-1==$z){
                    $lead_by_list_spam .= "</span>";
                }
                $z++;
            }
        }
        $z=0;
        foreach ($lead_by_sub_to_engage_status as $key => $value) {
            if($value['sub_status']!=""){
                if($z==0){
                $lead_by_list_to_engage .= "<span class='tooltiptext' style='left: 170px;'>";
                }
                $lead_by_list_to_engage .= $value['sub_status']." <div class='sub_text_count sub_count_details'> <a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'to_engage')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div><br>";
                if(count($lead_by_sub_to_engage_status)-1==$z){
                    $lead_by_list_to_engage .= "</span>";
                }
                $z++;
            }
        }
        $z=0;
        foreach ($lead_by_sub_warm_status as $key => $value) {
            if($value['sub_status']!=""){
                if($z==0){
                $lead_by_list_warm .= "<span class='tooltiptext' style='left: 180px;'>";
                }
                $lead_by_list_warm .= $value['sub_status']." <div class='sub_text_count sub_count_details'> <a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", 'warm')).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div><br>";
                if(count($lead_by_sub_warm_status)-1==$z){
                    $lead_by_list_warm .= "</span>";
                }
                $z++;
            }
        }

        $data['cold'] = '<div class="tooltip" style="display:flex;"><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=cold" target="_blank"">'.$lead_by_status_cold_mdth .'</a>&nbsp| <span><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=cold_overall" target="_blank">'.$lead_by_status_cold_overall .'</a></span>'.$lead_by_list_cold.'</div>';
        $data['hot'] = '<div class="tooltip" style="display:flex;"><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=hot" target="_blank"">'.$lead_by_status_hot_mdth .'</a>&nbsp| <span><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=hot_overall" target="_blank">'.$lead_by_status_hot_overall .'</a></span>'.$lead_by_list_hot.'</div>';
        $data['spam'] = '<div class="tooltip" style="display:flex;"><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=spam" target="_blank"">'.$lead_by_status_spam_mdth .'</a>&nbsp| <span><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=spam_overall" target="_blank">'.$lead_by_status_spam_overall .'</a></span>'.$lead_by_list_spam.'</div>';
        $data['to_engage'] = '<div class="tooltip" style="display:flex;"><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=to_engage" target="_blank"">'.$lead_by_status_to_engage_mdth .'</a>&nbsp| <span><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=to_engage_overalll" target="_blank">'.$lead_by_status_to_engage_overall .'</a></span>'.$lead_by_list_to_engage.'</div>';
        $data['warm'] = '<div class="tooltip" style="display:flex;"><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=warm" target="_blank"">'.$lead_by_status_warm_mdth .'</a>&nbsp| <span><a href="https://www.balancenutrition.in/sales_crm/lead?lead_by=warm_overall" target="_blank">'.$lead_by_status_warm_overall .'</a></span>'.$lead_by_list_warm.'</div>';
        
            
            
            
        // $lead_by_status = $this->dashboard_model->get_lead_by_status();
        // $lead_by_status_completed = $this->dashboard_model->get_lead_by_status_completed();
        
        //  //print_r($lead_by_status_completed);exit;
        // /*$status_compleeted=array();
        // foreach ($lead_by_status_completed as $key => $value) {
        //     foreach ($value as $key_c => $value_c) {
        //         $status_compleeted["status"][$key_c] = $value_c;
        //     }
            
        // }
        // print_r($lead_by_status_completed);exit;*/
        // error_reporting(1);
        // $lead_by_status_list = "";
        // $compled_status_count = count($lead_by_status_completed);
        // $z_n=0;
        // if($lead_by_status != 0){
        //     foreach($lead_by_status as $val) {
        //         if($val['status'] != 'Completed'){
        //             if($val['status'] == 'To Engage'){

        //                 $lead_by_status_list .= "<li style='color:red;line-height:100%'>".$val['status']."<br><span style='font-size:9px'>(No action)</span><a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", $val['status'])))."' target='_blank' alt='".$val['status'];
        //             }else{
        //                 $lead_by_status_list .= "<li>".$val['status']."<a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", $val['status'])))."' target='_blank' alt='".$val['status'];
                    
        //                 // echo($lead_by_status_list);
        //                 // exit();
        //             }


        //             $lead_by_sub_status = $this->dashboard_model->get_lead_by_sub_status($val['status']);
        //             $z = 0;
        //             if(count($lead_by_sub_status)>0){

        //                 if($val['status'] == 'To Engage'){
        //                     if(!empty($val['c'])){
        //                         $lead_by_status_list .= "'><div class='tooltip' style='color:red'>".$val['c']."</a>";
        //                     }else{
        //                         $lead_by_status_list .= "'><div class='tooltip' style='color:red'>0</a>";// eng
        //                     }
                            
        //                 }else{
        //                     //$lead_by_status_list .= "'><div class='tooltip'>".$val['c'];
        //                      if($compled_status_count>$z_n-1){
                               
        //                         if($lead_by_status_completed[$z_n]['status']==$val['status']){
        //                             // $lead_by_status_list .= "'><div class='tooltip'>".$val['c']."</a>". ' | <span style="color:green">'.$lead_by_status_completed[$z_n]['c'].'</span>';
                                    
        //                              if(!empty($val['c'])){
        //                         $lead_by_status_list .= "'><div class='tooltip'>".$val['c']."</a>". '<span style="color:green"></span>';// cold count
        //                             $z_n++;
        //                     }else{
        //                         $lead_by_status_list .= "'><div class='tooltip'>0</a>". '<span style="color:green"></span>';// cold count
        //                             $z_n++;
        //                     }
                                    
        //                         }else{
                                    
        //                             if(!empty($val['c'])){
        //                         $lead_by_status_list .= "'><div class='tooltip'>".$val['c']."</a>"; // all status
        //                     }else{
        //                         $lead_by_status_list .= "'><div class='tooltip'>0</a>"; // all status
        //                     }
        //                         }
        //                     }else{
        //                         $lead_by_status_list .= "'><div class='tooltip'>".$val['c']."</a>";
        //                     }
                            
        //                 }
                        
        //                 foreach ($lead_by_sub_status as $key => $value) {
        //                     if($value['sub_status']!=""){
        //                         if($z==0){
        //                             $lead_by_status_list .= "<span class='tooltiptext' style='top:-139px;left: 154px;height: 206px;'>";
        //                         }
        //                         $lead_by_status_list .= $value['sub_status']." <div class='sub_text_count sub_count_details'> <a href='".base_url('lead?lead_by='.strtolower(str_replace(" ", "_", $val['status'])).'___'.strtolower(str_replace(" ", "_", $value['sub_status'])))."' target='_blank'> ".$value['cnt_sub_status']."</a></div><br>";
        //                         if(count($lead_by_sub_status)-1==$z){
        //                             $lead_by_status_list .= "</span>";
        //                         }
        //                         $z++;
        //                     }
                            
        //                 }
        //                 $lead_by_status_list .= "</div>";
        //             }else{
        //                 $lead_by_status_list .= "'>".$val['c']."</div>";
        //             }//if(count($lead_by_sub_status)>0){
                    
        //           $lead_by_status_list .= "</li>";
        //         }
        //     }
        // }
        // $data['lead_by_status_list'] = $lead_by_status_list;
        echo json_encode($data);
    }

    
    public function unconverted(){
        $name = $this->session->balance_session['first_name'];
        
        $total_lead_remaining=$unconverted_consultation=$unconverted_hot=$unconverted_warm = $unconverted_cold = $unconverted_stage3 = $unconverted_stage4 =$unconverted_phase3 = $unconverted_phase4 = 0;
        $stage_4_not_converted = 0;//$this->dashboard_model->stage_overall_not_complete($name,4);
        $phase_4_not_converted = 0;//$this->dashboard_model->phase_overall_not_complete($name,4);
        $unconverted = $this->dashboard_model->unconverted_stage_phase($name);
        foreach($unconverted as $val){
            if($val['stage']==3){ 
                $unconverted_stage3++;
            }elseif($val['stage']==4){ 
                $unconverted_stage4++;
            }
            if($val['phase']==3){ 
                $unconverted_phase3++;
            }elseif($val['phase']==4){ 
                $unconverted_phase4++;
            }
            
            if($val['key_insight']!=''){ 
                if(strtolower($val['status'])=='hot'){ 
                    $unconverted_hot++;
                }elseif(strtolower($val['status'])=='warm'){ 
                    $unconverted_warm++;
                }elseif(strtolower($val['status'])=='cold'){ 
                    $unconverted_cold++;
                }
                $unconverted_consultation++;
            }
            $total_lead_remaining++;
        }
        
        $data['unconverted_lead'] = $total_lead_remaining;
        $data['unconverted_consultation'] = $unconverted_consultation;
        $data['unconverted_hot'] = $unconverted_hot;
        $data['unconverted_warm'] = $unconverted_warm;
        $data['unconverted_cold'] = $unconverted_cold;
        $data['unconverted_stage3'] = $unconverted_stage3;
        $data['unconverted_stage4'] = $unconverted_stage4;
        $data['unconverted_phase3'] = $unconverted_phase3;
        $data['unconverted_phase4'] = $unconverted_phase4;
        echo json_encode($data);
    }
    
    
    
    
    
    public function performance_analysis(){
        $data = array();
        $c_name  = $this->session->balance_session['first_name'];
        $data['faqs_details']=$this->faq_model->get_all_faqs(); 
        $data['faqs_titles']=$this->faq_model->get_all_faq_titles();
        $data['mentor_draft']= $this->faq_model->getMentorDraft($this->mentor_id);
        
        $data['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales(0,$c_name);
        $data['goal_set'] = $this->dashboard_model->get_goal_set();
        //$data['consoler_list'] = $this->dashboard_model->get_consolerlist();
        $data['consoler_list'] = array('aratrika','teja', 'darshi', 'priyanka','aanchal');
        display_view('performance_analysis_view',$data);
    }
    //Added By Navin Start
    public function sales_funnel(){
        $data = array();
        $c_name  = "";
        if($_POST['datavalue']!=""){
            $c_name = $_POST['datavalue'];
            $c_nameArr = explode(',', $c_name);
            $c_name = strtolower(implode($c_nameArr, "','"));
        }else{
            $c_name  = strtolower($this->session->balance_session['first_name']);
        }
        $date_filter = array('month'=>$_POST['month'],'year'=>$_POST["year"]);
        $data['sales_funnel_lead'] = $this->dashboard_model->get_sales_funnel_lead(0,$c_name,0,$date_filter);
        $data['sales_funnel_lead_team'] = $this->dashboard_model->get_sales_funnel_lead(1,$c_name,0,$date_filter);
        $data['sales_funnel_consultation'] = $this->dashboard_model->get_sales_funnel_consultation(0,$c_name,0,$date_filter);
        $data['sales_funnel_consultation_team'] = $this->dashboard_model->get_sales_funnel_consultation(1,$c_name,0,$date_filter);
        $data['sales_funnel_warm'] = $this->dashboard_model->get_sales_funnel_warm(0,$c_name,0,$date_filter);
        $data['sales_funnel_warm_team'] = $this->dashboard_model->get_sales_funnel_warm(1,$c_name,0,$date_filter);
        $data['sales_funnel_hot'] = $this->dashboard_model->get_sales_funnel_hot(0,$c_name,0,$date_filter);
        $data['sales_funnel_hot_team'] = $this->dashboard_model->get_sales_funnel_hot(1,$c_name,0,$date_filter);
        $data['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales(0,$c_name,0,$date_filter);
        $data['sales_funnel_sales_team'] = $this->dashboard_model->get_sales_funnel_sales(1,$c_name,0,$date_filter);
        $avg_calls = $this->dashboard_model->get_Avg_Calls(0,0,$c_name,0,$date_filter);
        $data['avg_calls'] = $avg_calls[0]['fu_count'] + $avg_calls[0]['key_insight'];
        $avg_calls_team = $this->dashboard_model->get_Avg_Calls(1,0,$c_name,0,$date_filter);
        $data['avg_calls_team'] = $avg_calls_team[0]['fu_count'] + $avg_calls_team[0]['key_insight'];
        
        echo json_encode($data);
    }
    public function effort_for_sales(){
        $data = array();
        $c_name  = "";
        if($_POST['datavalue']!=""){
            $c_name = $_POST['datavalue'];
            $c_nameArr = explode(',', $c_name);
            $c_name = strtolower(implode($c_nameArr, "','"));
        }else{
            $c_name  = strtolower($this->session->balance_session['first_name']);
        }
        $date_filter = array('month'=>$_POST['month'],'year'=>$_POST["year"]);
        $data['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales(0,$c_name,0,$date_filter);
        $data['sales_funnel_sales_team'] = $this->dashboard_model->get_sales_funnel_sales(1,$c_name,0,$date_filter);
        $avg_calls = $this->dashboard_model->get_Avg_Calls(0,$c_name,0,$date_filter);
        $data['avg_calls'] = $avg_calls[0]['fu_count'] + $avg_calls[0]['key_insight'];
        $avg_calls_team = $this->dashboard_model->get_Avg_Calls(1,$c_name,0,$date_filter);
        $data['avg_calls_team'] = $avg_calls_team[0]['fu_count'] + $avg_calls_team[0]['key_insight'];
        
        echo json_encode($data);
    }
    
    public function month_sales_report(){
        $data = array();
        $c_name  = "";
        if($_POST['datavalue']!=""){
            $c_name = $_POST['datavalue'];
            $c_nameArr = explode(',', $c_name);
            $c_name = strtolower(implode($c_nameArr, "','"));
        }else{
            $c_name  = strtolower($this->session->balance_session['first_name']);
        }
        //echo $c_name  ;die;
        //$first_name = $this->session->balance_session['first_name'];
        $date_filter = array('month'=>$_POST['month'],'year'=>$_POST["year"]);
        $data['bs_sales'] = $this->dashboard_model->get_month_sales_report(2,0,0,$date_filter);
        $data['bs_renewal'] = $this->dashboard_model->get_month_sales_report(3,0,0,$date_filter);
        $data['advance_sales'] = $this->dashboard_model->get_month_sales_report(1,0,0,$date_filter);
        $data['bs_upgrade'] = $this->dashboard_model->get_month_sales_report(4,0,0,$date_filter);
        
        $data['bs_your_sales'] = $this->dashboard_model->get_month_sales_report(2,$c_name,0,$date_filter);
        $data['bs_your_renewal'] = $this->dashboard_model->get_month_sales_report(3,$c_name,0,$date_filter);
        $data['advance_sales_your'] = $this->dashboard_model->get_month_sales_report(1,$c_name,0,$date_filter);
        $data['bs_upgrade_your'] = $this->dashboard_model->get_month_sales_report(4,$c_name,0,$date_filter);
        echo json_encode($data);
    }//public function month_sales_report(){
    
    public function lead_conversion_data(){
        $data = array();
        $c_name  = "";
        if($_POST['datavalue']!=""){
            $c_name = $_POST['datavalue'];
            $c_nameArr = explode(',', $c_name);
            $c_name = strtolower(implode($c_nameArr, "','"));
        }else{
            $c_name  = strtolower($this->session->balance_session['first_name']);
        }
        $date_filter = array('month'=>$_POST['month'],'year'=>$_POST["year"]);
        $data['lc_self_lead'] = $this->dashboard_model->get_lead_conversion(1,1,0,$c_name,$date_filter);
        //$data['sales_self_lead'] = $this->dashboard_model->get_sales_conversion(1,1,0,$c_name);
        //echo '<pre>';print_r($data);die;
        $data['lc_self_warm'] = $this->dashboard_model->get_lead_conversion(3,1,0,$c_name,$date_filter);
        $data['lc_self_hot'] = $this->dashboard_model->get_lead_conversion(2,1,0,$c_name,$date_filter);
        $data['lc_self_consultation'] = $this->dashboard_model->get_lead_conversion(4,1,0,$c_name,$date_filter);
        // LC other
        $data['lc_other_lead'] = $this->dashboard_model->get_lead_conversion(1,0,0,$c_name,$date_filter);
        $data['lc_other_warm'] = $this->dashboard_model->get_lead_conversion(3,0,0,$c_name,$date_filter);
        $data['lc_other_hot'] = $this->dashboard_model->get_lead_conversion(2,0,0,$c_name,$date_filter);
        $data['lc_other_consultation'] = $this->dashboard_model->get_lead_conversion(4,0,0,$c_name,$date_filter);
        // sales self
        $data['sales_self_lead'] = $this->dashboard_model->get_sales_conversion(1,1,0,$c_name,$date_filter);
        $data['sales_self_warm'] = $this->dashboard_model->get_sales_conversion(3,1,0,$c_name,$date_filter);
        $data['sales_self_hot'] = $this->dashboard_model->get_sales_conversion(2,1,0,$c_name,$date_filter);
        $data['sales_self_consultation'] = $this->dashboard_model->get_sales_conversion(4,1,0,$c_name,$date_filter);
        // sales other
        $data['sales_other_lead'] = $this->dashboard_model->get_sales_conversion(1,0,0,$c_name,$date_filter);
        $data['sales_other_warm'] = $this->dashboard_model->get_sales_conversion(3,0,0,$c_name,$date_filter);
        $data['sales_other_hot'] = $this->dashboard_model->get_sales_conversion(2,0,0,$c_name,$date_filter);
        $data['sales_other_consultation'] = $this->dashboard_model->get_sales_conversion(4,0,0,$c_name,$date_filter);
        echo json_encode($data);
    }//public function lead_conversion_data(){
    
    
    
    public function conversion_by_source(){
        error_reporting(0);
        $data = array();
        $c_name  = "";
        
        if($_POST['datavalue']!=""){
            $c_name = $_POST['datavalue'];
            $c_nameArr = explode(',', $c_name);
            $c_name = strtolower(implode($c_nameArr, "','"));
        }else{
            $c_name  = strtolower($this->session->balance_session['first_name']);
        }
        $source_name = $this->dashboard_model->get_source_name();
        $counsellor_sale = $this->dashboard_model->get_sales_funnel_sales(0,$c_name)[0]['amt'];
        
        $data =array(
                    array(
                        'source_name'=>$source_name[0]['prime_source'],
                        'sale'=>$this->dashboard_model->get_source_conversion(1,$c_name)[0]['amt'],
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(1,$c_name)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=>$this->dashboard_model->get_source_conversion(1,$c_name,1)[0]['amt'],
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(1,$c_name,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(1,$c_name,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(1,$c_name)[0]['cnt'],
                    ),array(
                        'source_name'=>$source_name[0]['social_media'],
                        'sale'=>$this->dashboard_model->get_source_conversion(2,$c_name)[0]['amt'],
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(2,$c_name)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=>$this->dashboard_model->get_source_conversion(2,$c_name,1)[0]['amt'],
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(2,$c_name,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(2,$c_name,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(2,$c_name)[0]['cnt'],
                    ),array(
                        'source_name'=>$source_name[0]['health_score'],
                        'sale'=>$this->dashboard_model->get_source_conversion(3,$c_name)[0]['amt'],
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(3,$c_name)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=>$this->dashboard_model->get_source_conversion(3,$c_name,1)[0]['amt'],
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(3,$c_name,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(3,$c_name,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(3,$c_name)[0]['cnt']
                    ),array(
                        'source_name'=>$source_name[0]['paid_adds'],
                        'sale'=> !empty($this->dashboard_model->get_source_conversion(4,$c_name)[0]['amt']) ? $this->dashboard_model->get_source_conversion(4,$c_name)[0]['amt']: 0,
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(4,$c_name)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=> !empty($this->dashboard_model->get_source_conversion(4,$c_name,1)[0]['amt']) ? $this->dashboard_model->get_source_conversion(4,$c_name,1)[0]['amt']: 0,
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(4,$c_name,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(4,$c_name,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(4,$c_name)[0]['cnt'],
                    ),array(
                        'source_name'=>$source_name[0]['other'],
                        'sale'=> !empty($this->dashboard_model->get_source_conversion(5,$c_name)[0]['amt'])?$this->dashboard_model->get_source_conversion(5,$c_name)[0]['amt']:0,
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(5,$c_name)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=> !empty($this->dashboard_model->get_source_conversion(5,$c_name,1)[0]['amt'])?$this->dashboard_model->get_source_conversion(5,$c_name,1)[0]['amt']:0,
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(5,$c_name,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(5,$c_name,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(5,$c_name)[0]['cnt'],
                    ),array(
                        'source_name'=>'Referral',
                        'sale'=> !empty($this->dashboard_model->get_source_conversion(7,$c_name)[0]['amt'])?$this->dashboard_model->get_source_conversion(7,$c_name)[0]['amt']:0,
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(7,$c_name)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=> !empty($this->dashboard_model->get_source_conversion(7,$c_name,1)[0]['amt'])?$this->dashboard_model->get_source_conversion(7,$c_name,1)[0]['amt']:0,
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(7,$c_name,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(7,$c_name,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(7,$c_name)[0]['cnt'],
                    ),array(
                        'source_name'=>$source_name[0]['web'],
                        'sale'=>$this->dashboard_model->get_source_conversion(6)[0]['amt'],
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(6)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=>$this->dashboard_model->get_source_conversion(6,1)[0]['amt'],
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(6,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(6,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(6)[0]['cnt'],
                    ),array(
                        'source_name'=>$source_name[0]['Registration'],
                        'sale'=>$this->dashboard_model->get_source_conversion(8)[0]['amt'],
                        'percentage'=>round(($this->dashboard_model->get_source_conversion(8)[0]['amt']/$counsellor_sale)*100),

                        'sale_your'=>$this->dashboard_model->get_source_conversion(8,1)[0]['amt'],
                        'percentage_your'=>round(($this->dashboard_model->get_source_conversion(8,1)[0]['amt']/$counsellor_sale)*100),

                        'lead_your'=>$this->dashboard_model->get_source_lead_overall_your(8,1)[0]['cnt'],
                        'lead_overall'=>$this->dashboard_model->get_source_lead_overall_your(8)[0]['cnt'],
                    )
                );
                
        $data['lead_conversion'] = $data;
        
        echo json_encode($data);
    }
    
    public function avail_lead_stagewise(){
        
        $date_range = $this->input->post('date_range');
        
        //new & olr leads available
        $new_lead_stage1 = $new_lead_stage2 = $new_lead_stage3 = $new_lead_stage4 = 0;
        $olr_lead_stage1 = $olr_lead_stage2 = $olr_lead_stage3 = $olr_lead_stage4 = 0;
        
        $data['new_lead_stage4'] = $data['new_lead_stage3'] = $data['new_lead_stage2'] =  $data['new_lead_stage1'] = 0;
        
        $lead_count = $this->dashboard_model->get_lead_capture_stagewise_count_query($date_range);
        foreach($lead_count['new_lead'] as $val){
            //echo $val['stage']."<br>";
            if($val['stage']=='1'){
                 $new_lead_stage1++;
            }elseif($val['stage']=='2'){
                $new_lead_stage2++;
            }elseif($val['stage']=='3'){
                $new_lead_stage3++;
            }elseif($val['stage']=='4'){
                $new_lead_stage4++;
            }
        }
        $data['new_lead_stage1'] = $new_lead_stage1++;
        $data['new_lead_stage2'] = $new_lead_stage2++;
        $data['new_lead_stage3'] = $new_lead_stage3++;
        $data['new_lead_stage4'] = $new_lead_stage4++;
        
        $data['olr_lead_stage4'] = $data['olr_lead_stage3'] = $data['olr_lead_stage2'] =  $data['olr_lead_stage1'] = 0;
                 
        foreach($lead_count['olr'] as $val){
            if($val['stage']=='1'){
                $olr_lead_stage1++;
            }elseif($val['stage']=='2'){
                $olr_lead_stage2++;
            }elseif($val['stage']=='3'){
                $olr_lead_stage3++;
            }elseif($val['stage']=='4'){
                $olr_lead_stage4++;
            }
        }
        $data['olr_lead_stage1'] = $olr_lead_stage1++;
        $data['olr_lead_stage2'] = $olr_lead_stage2++;
        $data['olr_lead_stage3'] = $olr_lead_stage3++;
        $data['olr_lead_stage4'] = $olr_lead_stage4++;
        echo json_encode($data);
        
    }
    
    public function add_lead(){
        $data['lead_source'] = $this->commonquery->fetchLeadSource();
        $data['lead_status'] = $this->commonquery->fetchAllStatus();
        $data['countries'] = $this->commonquery->getAllCountries();
        $data['assign_to_list'] = $this->commonquery->getCrmUser();
        // print_r($data['assign_to_list']);exit;
        $data['test'] = "Add Leads";
        display_view('add_lead',$data);
    }
    
    public function leadProgram($email,$mobile)
	{
			$email = $email;
		 	$mobile =$mobile;
			$email_flag=0;
			$phone_flag=0;
			$data;
			
								
			$result_lm_both= $this->commonquery->isExitEmailPhone('lead_management','email',trim(strtolower($email)),'phone','%'.$mobile);
		
			$result_lm_both_a= $this->commonquery->isExitEmailPhone('lead_management','email_alternate','%'.trim(strtolower($email)).'%','phone_alternate','%'.$mobile.'%');
			
			
// 			if($result_lm_both && $result_lm_both_a){
// 				echo '<br><br>Lead already Present using Email and Phone in Lead Management';
// 			}else 
			if($result_lm_both){
			
			$result_lm_email= $this->commonquery->isExitEmailPhone('lead_management','email',trim(strtolower($email)));
			
			if($result_lm_email){
				// echo '<br><br>Lead already Present using Email in Lead Management';
			$email_flag=1;
			}else{
				// echo '<br><br>Lead  Not present using Email in Lead Management';
			}
			
			$result_lm_phone= $this->commonquery->isExitEmailPhone('lead_management','phone','%'.$mobile);
		
			if($result_lm_phone){
				// echo '<br><br>Lead already Present using Phone in Lead Management';
				$phone_flag=1;
			}else{
				// echo '<br><br>Lead  Not present using Phone in Lead Management';
			}
			
			if($email_flag ==1 && $phone_flag == 0){
				// echo "<br><br>Updating Alternate Phone Number";
				
				$result= $this->commonquery->getLeadDetails('lead_management','email','%'.trim(strtolower($email)),'phone');
									
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','phone','%'.$mobile.'%');
					
					if($result_lm_both_a){
						 $result_mobile = implode(',', $result[0]);
						
					}else{
						$result_mobile = $mobile.','.implode(',',$result[0]);
						
					}
			  
			  $mobile_data = [
					'phone_alternate' => $result_mobile
					];

		
			$this->commonquery->updateLeadRecord('lead_management',$mobile_data,array('email' => trim(strtolower($email))));
			
			$result= $this->commonquery->getLeadDetailsNew('lead_management','email','%'.trim(strtolower($email)),'phone');
				if($result){
						 $result = implode(',', $result[0]);
						
					}
			$data = [
					'phone_alternate' => $result
					];
			
			}else if($email_flag ==0 && $phone_flag == 1){
				// echo "<br><br>Updating Alternate Email Id";
				$result= $this->commonquery->getLeadDetails('lead_management','phone','%'.$mobile,'email');
				
					
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','email','%'.trim(strtolower($email)).'%');
					if($result_lm_both_a){
						$result_email = implode(',', $result[0]);
					}else{
						$result_email = trim(strtolower($email)).','.implode(',', $result[0]);
					}
				  

				$data=	$email_data = [
						'email_alternate' => $result_email
						];
			
			
			$this->commonquery->updateLeadRecord('lead_management',$email_data,"phone LIKE  '%".$mobile."'");
			
			$result= $this->commonquery->getLeadDetailsNew('lead_management','phone','%'.$mobile,'email');
// 			echo $this->db->last_query();
				if($result){
						 $result = implode(',', $result[0]);
						
					}
			$data = [
					'email_alternate' => $result
					];
			
			}
			}elseif ($result_lm_both_a) {
				
			$result_lm_email= $this->commonquery->isalExitEmailPhone('lead_management','email','%'.trim(strtolower($email)).'%');
			
			if($result_lm_email){
			echo '<br><br>Lead already Present using Alternate Email in Lead Management';
			$email_flag=1;
			}else{
				echo '<br><br>Lead  Not present using Alternate Email in Lead Management';
			}
			
			$result_lm_phone= $this->commonquery->isalExitEmailPhone('lead_management','phone','%'.$mobile.'%');
		
			if($result_lm_phone){
				echo '<br><br>Lead already Present using Alternate Phone in Lead Management';
				$phone_flag=1;
			}else{
				echo '<br><br>Lead  Not present using Alternate Phone in Lead Management';
			}
			// echo 'result_la_email<br>';
			if($email_flag ==1 && $phone_flag == 0){
				echo "<br><br>Updating Alternate Phone Number";
				
				$result= $this->commonquery->getLeadDetails('lead_management','email_alternate','%'.trim(strtolower($email)).'%','phone');
									
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','phone','%'.$mobile.'%');
				
					if($result_lm_both_a){
						 $result_mobile = implode(',', $result[0]);
						
					}else{
						$result_mobile = $mobile.','.implode(',',$result[0]);
						
					}
				
				 $data= $mobile_data = [
					'phone_alternate' => $result_mobile
					];

			$this->commonquery->updateLeadRecord('lead_management',$mobile_data,"email_alternate LIKE '%".trim(strtolower($email))."%'");
			
			}else if($email_flag ==0 && $phone_flag == 1){
				echo "<br><br>Updating Alternate Email Id";
				
				$result= $this->commonquery->getLeadDetails('lead_management','phone_alternate','%'.$mobile.'%','email');
				
					$result_lm_both_a= $this->commonquery->isalExitEmailPhone('lead_management','email','%'.trim(strtolower($email)).'%');
					if($result_lm_both_a){
						$result_email = implode(',', $result[0]);
					}else{
						$result_email = trim(strtolower($email)).','.implode(',', $result[0]);
					}
				  
				$data=	$email_data = [
						'email_alternate' => $result_email
						];
			
			$this->commonquery->updateLeadRecord('lead_management',$email_data,"phone_alternate LIKE  '%".$mobile."%'");
			
			}
			}
			else{
				// echo "Insert New Lead";
			}
			
			return $data;
		
}

    public function add_lead_data(){
        //$lead_data = $_POST;
        // echo "<pre>";
        // print_r($_POST);
        //  exit;
        // $this->load->database();
        
        // $this->load->model('dashboard_model');
        
        if(!empty($_POST)){
            $lead_record = $this->commonquery->getLatestLeadRecord($this->input->post('email_id'),$this->input->post('phone'));
            $subtract_30days=date('Y-m-d',strtotime('-30 DAY'));
            if(empty($lead_record) || date('Y-m-d',strtotime($lead_record['created_date'])) < date('Y-m-d')){
                $source = $this->commonquery->getIdByParameter('bn_lead_source',array('source_name'),array('source_id' => $this->input->post('source_id')));
                $status = $this->commonquery->getIdByParameter('bn_lead_status',array('status_name'),array('id' => $this->input->post('status_id')));
                $fromData = array(
                                   'fname'=> $this->input->post('first_name'), 
                                   'lname'=> $this->input->post('last_name'), 
                                   'email'=> $this->input->post('email_id'), 
                                   'phone'=>$this->input->post('phone'), 
                                   'country'=> $this->input->post('country_id'), 
                                   'age'=> $this->input->post('age'), 
                                   'state'=>$this->input->post('state_id'), 
                                   'height'=>$this->input->post('height'), 
                                   'weight'=>$this->input->post('weight'),
                                   'birth_date'=>date('Y-m-d',strtotime($this->input->post('dob'))), 
                                   'enquiry_from'=>$source['source_name'], 
                                   'inch'=>$this->input->post('inches'), 
                                   'city'=>$this->input->post('city_id'),
                                   'status' => $status['status_name'],
                                   'lead_type' => $this->commonquery->lead_type($this->input->post('email_id'),$this->input->post('phone')),
                                 );
                // $insert_id =$this->db->insert('lead_management',$fromData);
                
                	$data_old=$this->leadProgram($this->input->post('email_id'),$this->input->post('phone'));
    	 
    $insert_id =$this->db->insert('lead_management',$fromData);
    $inserted_id = $this->db->insert_id();
    	if($data_old){
    	    $this->db->set($data_old);
            $this->db->where('id',$inserted_id );
            $this->db->update('lead_management');
    	}
    
                
                if($insert_id){
                    $admin_user = $this->commonquery->getIdByParameter('admin_user',array('crm_user'),array('admin_id' => $this->input->post('assign_to_add')));
                    $lead_action_array = array(
                                            'email' => $this->input->post('email_id'),
                                            'assign_to' => $admin_user['crm_user'],
                                            'assign_date'  => date('Y-m-d H:i:s')
                                            );
                    
                    $assigned_id =$this->db->insert('lead_action',$lead_action_array);
                    return 'Lead Added Successfully.';
                }
            }else{
                return 'Lead Already Exists.';
            }
        }
       
    }
    
    public function get_task_calender(){
        $data['today_task'] = $this->dashboard_model->get_task_calender(2);
        echo json_encode($data);
    }
    
    public function get_states(){
        $country_id = $this->input->post('country_id');
        $data['states'] = $this->commonquery->getStateByCountry($country_id);
        echo json_encode($data);
    }
    
    public function get_city(){
        $state_id = $this->input->post('state_id');
        $data['cities'] = $this->commonquery->getCityByState($state_id);
        echo json_encode($data);
    }
    
    public function get_lead_details_data(){
        $data['lead_details_data'] = $this->dashboard_model->get_lead_details_data_query();
        echo json_encode($data);
    }
    
    public function top_nav_counts(){
        
        $c_id = $this->session->balance_session['admin_id'];
        $c_name = $this->session->balance_session['first_name'];
        
        $data['lead_capture_count'] = $this->dashboard_model->get_lead_capture_count_query(0);
        $data['query_count'] = 0;//$this->dashboard_model->get_query_count_query(1);
        $data['get_link_count'] = $this->dashboard_model->get_link_count_query($c_id);
        // $data['lead_miss_count'] = $this->dashboard_model->get_lead_miss_count_query();
        $calls_scheduled_count = $this->dashboard_model->get_today_consultation_calls_data_query($c_id);
        $data['calls_scheduled_data'] = ($calls_scheduled_count != 0) ? count($calls_scheduled_count) : 0;
        $today_fus_notification = $this->dashboard_model->get_today_fus_data_query(1,$c_name);
        $data['today_fus_notification'] = ($today_fus_notification != 0) ? count($today_fus_notification) : 0;
        // Avinash code for hor and warm notification start
        // $hot_pending_notification = $this->dashboard_model->get_hot_warm_pending_notification($c_name,'hot');
        // $data['hot_pending_notification'] = ($hot_pending_notification != 0) ? count($hot_pending_notification) : 0;
        // $warm_pending_notification = $this->dashboard_model->get_hot_warm_pending_notification($c_name,'warm');
        // $data['warm_pending_notification'] = ($warm_pending_notification != 0) ? count($warm_pending_notification) : 0;
        // $to_engage_pending_notification = $this->dashboard_model->get_hot_warm_pending_notification($c_name,'To Engage');
        // $data['to_engage_pending_notification'] = ($to_engage_pending_notification != 0) ? count($to_engage_pending_notification) : 0;
        // avinash added 28-01-2022
        $no_action_planned = $this->dashboard_model->no_action_planned($c_name);
        $data['no_action_planned'] = ($no_action_planned != 0) ? count($no_action_planned) : 0;
        $update_lead_misses = $this->dashboard_model->update_lead_misses($c_name);
        $data['update_lead_misses'] = ($update_lead_misses != 0) ? count($update_lead_misses) : 0;
        
        //  print_r_custom( $data['no_action_planned']);
        // exit;
        // avinash added 28-01-2022
        
        
        $reminders_set = $this->dashboard_model->get_reminders_set_count_query();
        $data['today_reminder_notification'] = ($reminders_set != 0) ? count($reminders_set) : 0;
        
        $data['do_total_count'] = $data['calls_scheduled_data'] + $data['today_fus_notification'] + $data['today_reminder_notification'] +$data['hot_pending_notification']+$data['warm_pending_notification']+$data['to_engage_pending_notification']; // Avinash code for hor and warm notification 
        
        
        $today_fus_missed_data = $this->dashboard_model->get_today_fus_missed_data_query($c_name);
        $data['today_fus_missed_data'] = ($today_fus_missed_data != 0) ? count($today_fus_missed_data) : 0;
        
        $today_consultation_missed_count = $this->dashboard_model->get_today_calls_miss_data_query($c_id);
        $data['today_consultation_missed_count'] = ($today_consultation_missed_count != 0) ? count($today_consultation_missed_count) : 0;
        
        $data['lead_miss_count'] = $data['today_fus_missed_data'] + $data['today_consultation_missed_count'] +$data['no_action_planned'] + $data['update_lead_misses'];
        
        $due_tomorrow_count = $this->dashboard_model->get_balance_data('due_tomorrow',1);
        $data['due_tomorrow_count'] = ($due_tomorrow_count != 0) ? count($due_tomorrow_count) : 0;
        $balance_due_count = $this->dashboard_model->get_balance_data('due',1);
        $data['balance_due_count'] = ($balance_due_count != 0) ? count($balance_due_count) : 0;
        $balance_overdue_count = $this->dashboard_model->get_balance_data('overdue',1);
        $data['balance_overdue_count'] = ($balance_overdue_count != 0) ? count($balance_overdue_count) : 0;
        $data['balance_count'] = $data['due_tomorrow_count']+$data['balance_due_count'] + $data['balance_overdue_count'];
        //Added By Navin Start (Lead Counting as per stages)
        $data['lead_capture_stage1_count'] = $this->dashboard_model->get_lead_capture_stage_count_query(0,1);
        $data['lead_capture_stage2_count'] = $this->dashboard_model->get_lead_capture_stage_count_query(0,2);
        $data['lead_capture_stage3_count'] = $this->dashboard_model->get_lead_capture_stage_count_query(0,3);
        $data['lead_capture_stage4_count'] = $this->dashboard_model->get_lead_capture_stage_count_query(0,4);
        $data['lead_capture_other_lead'] = $this->dashboard_model->get_lead_capture_stage_count_query(0,5);
        
        $review_slot =$this->dashboard_model->get_review_slot($c_name);  // avinash added this code for check review submit step
        // print_r_custom($review_slot);
        $data['first_half'] =0;
        $data['second_half'] =0;
        $data['day_end'] =0;
        foreach($review_slot as $value){
            // echo "slot".$value['slot']." = ";
            if($value['slot'] == '1'){
                $data['first_half'] = 1;
            }else if($value['slot'] == '2'){
                $data['second_half'] = 1;
            }else if($value['slot'] == '3'){
                $data['day_end'] = 1;
            }
        }
        
        echo json_encode($data);
    }
    
// avinash added this code for check review submit step
    public function check_review_filled(){
        $c_name = $this->session->balance_session['first_name'];
        $review_slot =$this->dashboard_model->get_review_slot($c_name);  // avinash added this code for check review submit step
        // print_r_custom($review_slot);
        $data['first_half'] =0;
        $data['second_half'] =0;
        $data['day_end'] =0;
        foreach($review_slot as $value){
            // echo "slot".$value['slot']." = ";
            if($value['slot'] == '1'){
                $data['first_half'] = 1;
            }else if($value['slot'] == '2'){
                $data['second_half'] = 1;
            }else if($value['slot'] == '3'){
                $data['day_end'] = 1;
            }
        }
        echo json_encode($data);
    }


    public function submit_planner(){
        date_default_timezone_set("Asia/Kolkata");
        $task = $this->input->post('time_task');
        $arr= explode("||",$task);
        //print_r($_POST);exit;
        $email = $this->session->balance_session['email_id'];
        $c_name = $this->session->balance_session['first_name'];
        $c_id = $this->session->balance_session['admin_id'];
        
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]!=''){
                if($i==0){
                    $start_time=date(date('Y-m-d'))." 09:00:00";
                    $end_time=date(date('Y-m-d'))." ".($i+10).":00:00";
                }else{
                    $start_time=date(date('Y-m-d'))." ".($i+9).":00:00";
                    $end_time=date(date('Y-m-d'))." ".($i+10).":00:00";
                }
                $this->query->insertRecord('task_master', array('task_name' => $arr[$i],'color'=>'m-fc-event--primary', 'start_date' => $start_time, 'end_date' => $start_time, 'created_by' => $c_id,'created_date'=>date('Y-m-d H:i:s'),'updated_date'=>date('Y-m-d H:i:s')));
            }
        }
    //Email to Manager/Vishal Sir
        $subject = "Day Planner - ".date('jS M, Y')  ;
        $data_html = "<table border='1'><tbody>";
        $task_planned = $this->input->post('task_planned');
        $arr2= explode("||",$task_planned);
        //echo count($arr);die;
        for($i=0;$i<count($arr);$i++){
            if($arr[$i]==''){
                $arr[$i]=$arr2[$i];
            }
            if($i<3){$time = ($i+9).":00 am";}elseif($i==3){$time = "12:00 pm";}else{$time = ($i-3).":00 pm";}
            if($i==12){
                $data_html .= "<tr><td> Notes :</td><td>".$arr[$i]."</td></tr>";
            }else{
                $data_html .= "<tr><td>".$time."</td><td>".$arr[$i]."</td></tr>";
            }
            
        }
        
        $d_t = $this->dashboard_model->get_balance_data('due_tomorrow',1);
        $d = $this->dashboard_model->get_balance_data('due',1);
        $od = $this->dashboard_model->get_balance_data('overdue',1);
        
        $due_tomo_count = $d_t!=0?count($d_t):$d_t;
        $due_count = $d!=0?count($d):$d;
        $overdue_count = $od!=0?count($od):$od;
        $dt_details=$d_details=$od_details = '';$i=1;
                        
        foreach($d_t as $val){
            $whats_msg = 'Hello '.$val['full_name'].',%0a%0aA polite reminder once again that tomorrow your balance payment of Rs.'.$val['balance'].' is due against your program '.$val['prog_details'].'. Your app login will be locked once the date has passed. Click here to Pay Now : https://bit.ly/37m8qhy';
            $arr = explode('-',$val['phone']);
            if(count($arr)>1){
               $contact = $val['phone'];    
               $whats_phone = str_replace(" ","",str_replace("-","",$contact));
            }else{
                $whats_phone = "+91".$val['phone'];
            }
            
            $dt_details .= $i.'. <a href="https://www.balancenutrition.in/sales_crm/user_details?user_email='.$val['email_id'].'&user_status=client">'.$val['email_id'].'</a>/<a href="https://wa.me/'.$whats_phone.'/?text='.$whats_msg.'" target="_blank">'.$val['phone'].'</a> (Rs.'.$val['balance'].')<br>';
            $i++;
        }
        $i=1;
        foreach($d as $val){
            $whats_msg = 'Hello '.$val['full_name'].',%0a%0aToday is the last day to clear your balance of Rs.'.$val['balance'].' is due against your program '.$val['prog_details'].' at Balance Nutrition. Click here to Pay Now : https://bit.ly/37m8qhy %0aPlease note, that the program goes into overdue status TOMORROW, and unfortunately, your services would be interrupted.%0aLet me know if you have any questions.%0a%0aSr. Nutritionist,'.$_SESSION['balance_session']['first_name'].'%0aBalance Nutrition';
            $arr = explode('-',$val['phone']);
            if(count($arr)>1){
               $contact = $val['phone'];    
               $whats_phone = str_replace(" ","",str_replace("-","",$contact));
            }else{
                $whats_phone = "+91".$val['phone'];
            }
            
            $d_details .= $i.'. <a href="https://www.balancenutrition.in/sales_crm/user_details?user_email='.$val['email_id'].'&user_status=client">'.$val['email_id'].'</a>/<a href="https://wa.me/'.$whats_phone.'/?text='.$whats_msg.'" target="_blank">'.$val['phone'].'</a> (Rs.'.$val['balance'].')<br>';
            $i++;
        }
        $i=1;
        foreach($od as $val){
            $whats_msg = 'Hello '.$val['full_name'].',%0a%0aYour balance of Rs. '.$val['balance'].' overdue against your program '.$val['prog_details'].', initially paid Rs.'.$val['paid_amt'].' and there is a balance payment of Rs.'.$val['balance'].' which was due on '.$val['due_date'].'.%0aDespite several reminders, we have failed to receive any updates from you. This is the final reminder for the same. Click here to Pay Now : https://bit.ly/37m8qhy%0a%0aP.S. After today, you will not be able to re-open this program in future by paying the balance amount. You will have to purchase an entirely new program. ';
            $arr = explode('-',$val['phone']);
            if(count($arr)>1){
               $contact = $val['phone'];    
               $whats_phone = str_replace(" ","",str_replace("-","",$contact));
            }else{
                $whats_phone = "+91".$val['phone'];
            }
            
            $od_details .= $i.'. <a href="https://www.balancenutrition.in/sales_crm/user_details?user_email='.$val['email_id'].'&user_status=client">'.$val['email_id'].'</a>/<a href="https://wa.me/'.$whats_phone.'/?text='.$whats_msg.'" target="_blank">'.$val['phone'].'</a> (Rs.'.$val['balance'].')<br>';
            $i++;
        }
        if($dt_details==''){$dt_details = 0;}
        if($d_details==''){$d_details = 0;}
        if($od_details==''){$od_details = 0;}
        $data_html .= "<tr><td colspan='2'><b>Balance Payment</b>:</td></tr>";
        $data_html .= "<tr><td>Due Tomorrow:</td><td>".$dt_details."</td></tr>";
        $data_html .= "<tr><td>Due Today:</td><td>".$d_details."</td></tr>";
        $data_html .= "<tr><td>Over Due:</td><td>".$od_details."</td></tr>";
        
        $data_html .= "</tbody></table>";
        
        //echo $data_html;
        //print_r($this->dashboard_model->get_balance_data('overdue',1));
        //exit;
        //Load email library 
        
        $to='Vishal Rupani <vishalrupani@balancenutrition.in>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: '.$this->session->balance_session['first_name'].' <'.$email.'>';

        if(strtolower($email)=='aayushi.dubey@balancenutrition.in'){
         $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in';
          
        }else{
             if(strtolower($email)=='chelsi.dhelawat@balancenutrition.in' || strtolower($email)=='shailee.sanghavi@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in';
                
            }elseif(strtolower($email)=='dhanashree.chawan@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }elseif(strtolower($email)=='anisha.powale@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in';
                
            }else if(strtolower($email)=='mili.jain@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }else if(strtolower($email)=='aashee.shah@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,shailee.sanghavi@balancenutrition.in';
                
            }elseif(strtolower($email)=='dhanvi.maisheri@balancenutrition.in' || strtolower($email)=='mehek.sajnani@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }else{
            
              $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in';
                
            }
        }
        
        
       
      $headers[] = 'Bcc: vikram.gupta@balancenutrition.in,vaibhav.gonjari@balancenutrition.in,vidhi.shah@balancenutrition.in';
       
        //Send mail 
        if(mail($to,$subject,$data_html,implode("\r\n", $headers))) 
            $data['success'] = 1; 
        else 
            $data['error_msg'] = "Error in sending Email.";
        
        echo json_encode($data);
    }
    //counsellor review
    public function send_review_task(){
        date_default_timezone_set("Asia/Kolkata");
        // echo "<pre>";
        //  print_r($_POST);
        //   exit;
        
        $other_data_json ='';
        if($this->input->post('review_number')=='3'){
            $other_data = explode("||",$this->input->post('other_data'));
            $arr['leads_assigned'] = $other_data[0];
            $arr['fu'] = $other_data[1];
            $arr['consultation'] = $other_data[2];
            $arr['hot'] = $other_data[3];
            $arr['fu_missed'] = $other_data[4];
            $arr['call_missed'] = $other_data[5];
            $arr['sale_unit'] = $other_data[6];
            $arr['sale_amt'] = $other_data[7];
            /*$arr['total_lead_assigned_mtd'] = $other_data[8];
            $arr['fu_done_mtd'] = $other_data[9];
            $arr['consultation_done_mtd'] = $other_data[10];
            $arr['hot_mtd'] = $other_data[11];
            $arr['phase3_phase4'] = $other_data[12];
            $arr['stage3_stage4'] = $other_data[13];*/
            $other_data_json = json_encode($arr);
        }
         
        $fh_review = $this->input->post('review_data');
        $fh_review_msg = $this->input->post('msg');
        $slot = $this->input->post('review_number');
        $msg = str_replace("\n","<br />",$fh_review_msg);
        $email = $this->session->balance_session['email_id'];
        $subject = $this->input->post('subject')." - ".date('jS M, Y')  ;
        $c_id = $this->session->balance_session['admin_id'];
        $c_name = $this->session->balance_session['first_name']; 
        
        //$this->query->insertRecord('sales_review_notes', array('note' => $msg, 'slot' => $slot, 'added_date' => date('Y-m-d'), 'name' => $c_name,'created_date'=>date('Y-m-d H:i:s')));
        $this->query->insertRecord('sales_review_notes', array('note' => $msg,'other_data' => $other_data_json, 'slot' => $slot, 'added_date' => date('Y-m-d'), 'name' => $c_name,'created_date'=>date('Y-m-d H:i:s')));
        
        $this->db->query("DELETE FROM sales_review_notes WHERE added_date < (CURDATE() - INTERVAL 2 DAY) ");
        
        $data_html = "<table><tbody><tr><td>".$fh_review."</td></tr><tr><td><b>Note :</b> <br>".$msg."</td></tr></tbody></table>";
        
        
        $to='Vishal Rupani <vishalrupani@balancenutrition.in>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: '.$this->session->balance_session['first_name'].' <'.$email.'>';

        if(strtolower($email)=='aayushi.dubey@balancenutrition.in'){
            
         $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in';
          
        }else{
        
           if(strtolower($email)=='chelsi.dhelawat@balancenutrition.in' || strtolower($email)=='shailee.sanghavi@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in';
                
            }elseif(strtolower($email)=='dhanashree.chawan@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }elseif(strtolower($email)=='anisha.powale@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in';
                
            }else if(strtolower($email)=='mili.jain@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }else if(strtolower($email)=='aashee.shah@balancenutrition.in' ){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,shailee.sanghavi@balancenutrition.in';
                
            }elseif(strtolower($email)=='dhanvi.maisheri@balancenutrition.in' || strtolower($email)=='mehek.sajnani@balancenutrition.in'){
                $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in,mili.jain@balancenutrition.in,chelsi.dhelawat@balancenutrition.in';
                
            }else{
            
              $headers[] = 'Cc: '.$email.',ruhina.karwa@balancenutrition.in,sahil.tawade@balancenutrition.in,sagar.deshmukh@balancenutrition.in,clientservices@balancenutrition.in,khyatirupani@balancenutrition.in,digitalmarketing@balancenutrition.in';
                
            }
        }
        
        
        //Load email library 
        // $this->load->library('email'); 
        // // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
         
        // $this->email->from($email, $this->session->balance_session['first_name']);
        // //$this->email->to('darshi@balancenutrition.in');
        // // $email_id_review_planner = $this->session->balance_session['email_id'];

        // if($email_id_review_planner!=""){
        //     if(strtolower($email_id_review_planner)=='parul.srivastava@balancenutrition.in' || strtolower($email_id_day_planner)=="aanchal.agarwal@balancenutrition.in"){//aratrika@balancenutrition.in
        //         // $this->email->to(array('priyanka.kadam@balancenutrition.in','mentor.urmila@balancenutrition.in'));
        //         $this->email->to(array('priyanka.kadam@balancenutrition.in',$email_id_review_planner));
        //         // $this->email->cc(array('alok@balancenutrition.in'));
        //         $this->email->cc(array('vishalrupani@balancenutrition.in','vaibhav.gonjari@balancenutrition.in','accounts@balancenutrition.in'));
        //     }else{
        //         // $this->email->to(array('priyanka.kadam@balancenutrition.in','mentor.urmila@balancenutrition.in'));
        //         $this->email->to(array('priyanka.kadam@balancenutrition.in',$email_id_review_planner));
        //         // $this->email->cc(array('alok@balancenutrition.in'));
        //         $this->email->cc(array('vishalrupani@balancenutrition.in','vaibhav.gonjari@balancenutrition.in','accounts@balancenutrition.in'));
        //     }
        // }
        // $this->email->to('vishalrupani@balancenutrition.in');
        // // $this->email->to('avinash.pandey@balancenutrition.in');
        // if(strtolower($email)=='aayushi.dubey@balancenutrition.in'){
        //     //'vaibhav.gonjari@balancenutrition.in','aayushi.dubey@balancenutrition.in','Tejal.koli@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in','aayushi.dubey@balancenutrition.in','nikita.mathew@balancenutrition.in'
        //     // $this->email->cc(array($email,'vaibhav.gonjari@balancenutrition.in','clientservices@balancenutrition.in','aayushi.dubey@balancenutrition.in','Tejal.koli@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in'));
        //      $this->email->cc(array($email,'vaibhav.gonjari@balancenutrition.in','vikram.gupta@balancenutrition.in','hatim.bohra@balancenutrition.in','clientservices@balancenutrition.in','aayushi.dubey@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in','accounts@balancenutrition.in','devanshi.shah@balancenutrition.in'));
        // }else{
        //   // $this->email->cc(array($email,'vaibhav.gonjari@balancenutrition.in','clientservices@balancenutrition.in','Tejal.koli@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in'));
        //     $this->email->cc(array($email,'vaibhav.gonjari@balancenutrition.in','vikram.gupta@balancenutrition.in','hatim.bohra@balancenutrition.in','clientservices@balancenutrition.in','aayushi.dubey@balancenutrition.in','khyatirupani@balancenutrition.in','digitalmarketing@balancenutrition.in','accounts@balancenutrition.in','devanshi.shah@balancenutrition.in'));
        // }
        // $this->email->subject($subject);
        // $this->email->message($data_html);
        
        // //Send mail 
        // if($this->email->send()) 
        $headers[] = 'Bcc: vikram.gupta@balancenutrition.in,vaibhav.gonjari@balancenutrition.in,vidhi.shah@balancenutrition.in';
        if(mail($to,$subject,$data_html,implode("\r\n", $headers))) 
            $data['success'] = 1; 
        else 
            $data['error_msg'] = "Error in sending Email.";
        
        echo json_encode($data);
    }
    
    // update reminders
    public function update_reminder()
    {
        date_default_timezone_set("Asia/Kolkata");

        $rm_note = $this->input->post('reminder_note');
        $rm_title = $this->input->post('reminder_title');
        $rm_date = $this->input->post('reminder_date');
        $rm_time = $this->input->post('reminder_time');
        $rm_me = $this->input->post('reminder_me');
        
        $reminder_date = date("Y-m-d", strtotime($rm_date));
        
        $current_timestamp = date('Y-m-d H:i:s');
        
        $mentor_id = $this->session->balance_session['admin_id'];
        
        $rm_datetime = $reminder_date.' '.$rm_time;
        
        // print_r();
        // exit;
        
        $insert = $this->query->insertRecord('task_master', array('remind_me' => $rm_me, 'task_name' => $rm_title,'description' => $rm_note, 'start_date' => $rm_datetime, 'created_by' => $mentor_id,'created_date'=>$current_timestamp, 'updated_date'=>$current_timestamp));
        
        if ($insert) {
            echo "1";
        } else {
            echo "0";
        }

    }
    
    public function get_today_reminder_list(){
        
        $c_id = $this->session->balance_session['admin_id'];
        
        $data['today_reminder_list'] = $this->dashboard_model->get_reminder_schedule($c_id);
        
        // print_r($data['today_reminder_list']);exit;
        
        echo json_encode($data);
    }
    
    public function get_today_call_reminder_list(){
        
        $c_id = $this->session->balance_session['admin_id'];
        
        $data['today_reminder_list'] = $this->dashboard_model->get_call_reminder_schedule($c_id);
        
        // print_r($data['today_reminder_list']);exit;
        
        echo json_encode($data);
    }
    
    
     public function send_email_for_consultation (){    // avinash added for email to client for consultation call before 15 minuts
        $name = $this->input->post('name');
        $email_id =$this->input->post('email_id');
        $time_slot =$this->input->post('start_time');
        $call_date =$this->input->post('start_date');
        
        $counsellor_name = $this->session->balance_session['email_id'];
        $subject = $this->input->post('subject')." - ".date('jS M, Y')  ;
        
            $to= $name.' <'.$email_id.'>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: No Reply - Balance Nutrition <info@balancenutrition.in>';
        $headers[] = 'Cc: '.$this->session->balance_session['email_id'];
         $msg = "Hi ".$name.",<br/>
                                You have a consultation call today!.<br/>
                                Counsellor's Name: Ms. ".$counsellor_name." on <br/>Date: ".$call_date." </br>Time :".$time_slot." IST.
                                </br>".$counsellor_name. "will call you today at the above mentioned time on your given mobile number.";
             
        mail($to,"Balance Nutrition Consultation Reminder",$msg,implode("\r\n", $headers));
        
        
        // $this->load->library('email'); 
        //     // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
             
        //     $this->email->from('info@balancenutrition.in', 'No Reply - Balance Nutrition');
        //     $this->email->to($email_id);
        //     $this->email->cc($this->session->balance_session['email_id']);
        //     // $this->email->to($email_id);
        //     $this->email->subject("Balance Nutrition Consultation Reminder");
        //         $msg = "Hi ".$name.",<br/>
        //                         You have a consultation call today!.<br/>
        //                         Counsellor's Name: Ms. ".$counsellor_name." on <br/>Date: ".$call_date." </br>Time :".$time_slot." IST.
        //                         </br>".$counsellor_name. "will call you today at the above mentioned time on your given mobile number.";
        //         $this->email->message($msg);
        //         $this->email->send();
            
    }
    
     public function update_call_reminder_ack(){
        
        $call_rm_post = $_POST;
        // echo"<pre>";
        // print_r($call_rm_post);
        // die;
        date_default_timezone_set('asia/kolkata');
        
        $c_id = $this->session->balance_session['admin_id'];
        $counsellor_name = $this->session->balance_session['first_name'];
        $record_id=$this->input->post('record_id');
        $email_id=$this->input->post('user_email');
        $call_status=$this->input->post('call_status');
        $previous_status=(strtolower($this->input->post('previous_status'))=='schedule') ? 'pending' : strtolower($this->input->post('previous_status'));
        // $autoincrement_id=$this->input->post('autoincrement_id');
        $call_date=$this->input->post('call_date');
        $time_slot=$this->input->post('time_slot');
        $name=ucwords($this->input->post('user_name'));
        $curdateTime=date('Y-m-d H:i:s');
        $note = $this->input->post('note');
        $fu_date = $this->input->post('fu_date');
        
        $lead_details = $this->commonquery->getIdByParameter('lead_management',array('fname'),array('email' => $this->input->post('user_email')));
        
        $name = ucwords($lead_details['fname']);
        if(!empty($record_id))
        { 
          
          /* Update Call Status */

          $this->db->where(array('id'=>$record_id));
          $status = $this->db->update('bn_consultation_call_booking',array('call_status'=>$call_status,'previous_status'=>$previous_status,'updated_date'=>$curdateTime));
            
            if($status ==1){
                
        $to= $name.' <'.$email_id.'>';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: No Reply - Balance Nutrition <info@balancenutrition.in>';
        $headers[] = 'Cc: '.$this->session->balance_session['email_id'];
         
        //     $this->load->library('email'); 
        //     // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        //      $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        // $this->email->set_header('Content-type', 'text/html; charset=iso-8859-1');
             
        //     $this->email->from('info@balancenutrition.in', 'No Reply - Balance Nutrition');
        //     // $this->email->to('avinash.pandey@balancenutrition.in');
        //     $this->email->to($email_id);
        //     $this->email->cc($this->session->balance_session['email_id']);
            if($call_status =='done'){
                // $this->email->subject("Consultation Call Completed");
                $subject="Consultation Call Completed";
                $msg = "Hello ".$name.",<br/>
                                We hope you had a fruitful conversation with our Counsellor Ms. ".$counsellor_name." on ".$call_date." " .$time_slot." IST.";
                // $this->email->message($msg);
            }else if($call_status =='cancelled' || $call_status =='unanswered'){
                // $this->email->subject("Our Counsellor Tried Calling You");
                $subject="Our Counsellor Tried Calling You";
                $msg = "Hello ".$name.",<br/>
                                You had a Consultation call scheduled with our Nutrition Counsellor ".$counsellor_name." on ".$call_date." " .$time_slot." IST. <br/>
                                Your Counsellor tried calling you but it went unanswered / did not connect.";
                // $this->email->message($msg);
            }
            // $this->email->send();
            mail($to,$subject,$msg,implode("\r\n", $headers));
            }
          /* Update Key_insights */

            if($note != ''){
                
                // echo 'if';
                $this->db->where(array('email'=>$email_id));
                $this->db->order_by('id', 'DESC');
                $this->db->limit(1);
                $this->db->update('lead_action',array('key_insight'=>$note,'key_insight_date'=>$curdateTime,'reminder_dt'=>$fu_date));
            }
            
          $data = 1;
          
        }else{
            
          $data =  0;
          
        }
        
        
        echo json_encode($data);
    }
    
    /* public function get_reminder_details(){
        
        $id = $_POST['reminder_id'];
        
        $result = [];
        
        if($id){
        
        $sql = "select * from mentor_reminders where id = '".$id."'";
        
        $result = $this->db->query($sql)->row_array();
        
        }
        
        echo json_encode($result);
    }
    
    public function update_reminder_data(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        // $reminder_date = date("Y-m-d", strtotime($fu_date));
        
        $current_timestamp = date('Y-m-d H:i:s');
        
        $mentor_id = $this->session->balance_session['admin_id'];
        
        $update_array = array('reminder_title' => $title,'reminder_text'=>$text,'reminder_time'=>$time,'reminder_added'=>$current_timestamp);
      
        if($date != ''){
            $update_array['reminder_date'] = $date;
        }
        
        if($id){
            $update = $this->query->updateRecord('mentor_reminders', $update_array, array('id' => $id));
           
            if($update){
                echo 1;
            }else{
                echo 0;
            }
        }
    } */
    
    
    
    public function c_ajax_data(){
        // print_r($_POST);
        
        $id = $this->input->post('id');
        $c_id = $this->session->balance_session['admin_id'];
        $c_name = $this->session->balance_session['first_name'];
        
        // echo $c_name; exit;
        
        switch($id){
            case "active_payment_links":
                $data['active_payment_links'] = $this->dashboard_model->get_payment_link_query(2,$c_id);
                break;
            case "payment_link":
                $data['payment_link'] = $this->dashboard_model->get_payment_link_query(1,$c_id);
                break;    
            case "payment_links_expired":
                $data['payment_links_expired'] = $this->dashboard_model->get_expired_links();
                break;
            
            case "today_fus_notification":
                $data['today_fus_data'] = $this->dashboard_model->get_today_fus_data_query(1,$c_name);
                break;
                // Avinash code for hor and warm notification start
            // case "hot_pending_notification":
            //     $data['hot_pending_notification'] = $this->dashboard_model->get_hot_warm_pending_notification($c_name,'hot');
            //     break;
            // case "warm_pending_notification":
            //     $data['warm_pending_notification'] = $this->dashboard_model->get_hot_warm_pending_notification($c_name,'warm');
            //     break;
            //  case "to_engage_pending_notification":
            //     $data['to_engage_pending_notification'] = $this->dashboard_model->get_hot_warm_pending_notification($c_name,'To Engage');
            //     break;
                // Avinash code for hor and warm notification end
            case "today_reminder_notification":
                $data['reminders_set'] = $this->dashboard_model->get_reminders_set_count_query();
                break;
            case "fus_missed_count":
                $data['today_fus_missed_data'] = $this->dashboard_model->get_today_fus_missed_data_query($c_name);
                break;
            case "calls_scheduled":
                $data['today_consultation_calls'] = $this->dashboard_model->get_today_consultation_calls_data_query($c_id);
                break;
            case "today_consultation_missed":
                $data['today_calls_miss_data'] = $this->dashboard_model->get_today_calls_miss_data_query($c_id);
                break;
            case "due_tomorrow":
                $data['due_tomorrow'] = $this->dashboard_model->get_balance_data('due_tomorrow',1);
                break;
            case "balance_due":
                $data['balance_due'] = $this->dashboard_model->get_balance_data('due',1);
                break;
            case "balance_overdue":
                $data['balance_overdue'] = $this->dashboard_model->get_balance_data('overdue',1);
                break;
            // avinash add this looks today 05-10-2021
            case "today_fus_notification_looks":
                $data['today_fus_notification_looks'] = $this->dashboard_model->get_today_fus_data_query(0);
                break;
            case "calls_scheduled_call_data":
                $data['calls_scheduled_call_data'] = $this->dashboard_model->get_today_consultation_calls_data_query('0');
                break;
            case "balance_due_count_data":
                $data['balance_due_count_data'] = $this->dashboard_model->get_balance_data('due',0);
                break;
            case "fu_done_today_data":
                $data['fu_done_today_data'] = $this->dashboard_model->get_fu_done(0,0);
                break;
            case "consultation_done_today":
                $data['consultation_done_today'] = $this->dashboard_model->get_consultation_done(0,0);
                break;
            case "action_done_today_data":
                $data['action_done_today_data'] = $this->dashboard_model->get_action_done(0,0);
                break;
            case "hot_today":
                $data['hot_today'] = $this->dashboard_model->get_lead_by_status_month('hot','0');
                break;
            case "warm_today":
                $data['warm_today'] = $this->dashboard_model->get_lead_by_status_month('warm','0');
                break;
            case "today_sale":
                $data['today_sale'] = $this->dashboard_model->today_sale();
                break;    
            
            case "today_fus_missed_data_count":
                $data['today_fus_missed_data_count'] = $this->dashboard_model->get_today_fus_missed_data_query('');
                break;
            case "today_consultation_missed_count_data":
                $data['today_consultation_missed_count_data'] = $this->dashboard_model->get_today_calls_miss_data_query('');
                break;
            // avinash added this for no action planned 2022-01-28
            case "today_no_action_planed":
                $data['today_no_action_planed'] = $this->dashboard_model->no_action_planned($c_name);
                break;
            case "lead_pending_detail":
                $data['lead_pending_detail'] = $this->dashboard_model->update_lead_misses($c_name);
                break;
                // avinash added this for no action planned 2022-01-28
                
        }
        // print_r($data['lead_pending_detail']);
        // exit();
        echo json_encode($data);
    }
    
    
    public function get_review_data(){
        
        $c_id = $this->session->balance_session['admin_id'];
        $c_name = $this->session->balance_session['first_name'];
        
        $data['count_html']  = $this->dashboard_model->countPrimarySource($c_name);
        $data['count_html_all']  = $this->dashboard_model->countPrimarySourceAll($c_name);
          
        // today activities done
        $lead_captured_today = $this->dashboard_model->get_lead_captured(0,0);
        $other_lead_captured_today = $this->dashboard_model->get_lead_captured(0,1);
        
        $data['total_lead_assigned'] = $lead_captured_today + $other_lead_captured_today;
        $fu_done_today_cnt=$this->dashboard_model->get_fu_done(0,1);
        // $data['fu_done_today'] = count($this->dashboard_model->get_fu_done(0,1));
         $data['fu_done_today'] = ($fu_done_today_cnt != 0) ? count($fu_done_today_cnt) : 0;
        // print_r($data['fu_done_today']);die;
        $con_don = $this->dashboard_model->get_consultation_done(0,1);
        $data['consultation_done_today'] = (!empty($con_don) ? count($con_don):0);
        
        $data['today_hot'] = $this->dashboard_model->today_hot();
        
        $lead_captured_mtd = $this->dashboard_model->get_lead_captured(1,0);
        $other_lead_captured_mtd = $this->dashboard_model->get_lead_captured(1,1);
        $data['total_lead_assigned_mtd_new'] = $lead_captured_mtd + $other_lead_captured_mtd;

        $lead_captured_mtd_total_lead = $this->dashboard_model->get_lead_captured_total_lead(1,0);
        $other_lead_captured_mtd_total_lead = 0;//$this->dashboard_model->get_lead_captured_total_lead(1,1);
        $data['total_lead_mtd_new'] = $lead_captured_mtd_total_lead + $other_lead_captured_mtd_total_lead;

        $total_consultation_unconverted = $this->dashboard_model->get_lead_captured_total_lead(1,0);
        
        $data['fu_done_mtd'] = $this->dashboard_model->get_fu_done(1,1);
        $data['consultation_done_mtd'] = count($this->dashboard_model->get_consultation_done(1,1));
        $data['hot_mtd'] = $this->dashboard_model->today_hot(1);
        $lesthan = $this->dashboard_model->get_age_distrubution(1,0);
        $greaterthan = $this->dashboard_model->get_age_distrubution_greater_than(1,1);

        $data['age_distributation'] = $lesthan .' / '. $greaterthan; 
        $data['sales_funnel_sales'] = $this->dashboard_model->get_sales_funnel_sales(0,$c_id);
        $data['total_sales_new'] = $data['sales_funnel_sales'][0]['amt'];
        $data['total_sales_new_count'] = $data['sales_funnel_sales'][0]['unit'];
        //   avinash added this-28-01-2022
        $data['total_balance_sales_new'] = $data['sales_funnel_sales'][0]['balance'];
        $data['total_balance_sales_new_count'] = $data['sales_funnel_sales'][0]['unit_balance'];
        //   avinash added this-28-01-2022
        // echo"<pre>";
        // print_r($data['sales_funnel_sales']);die;
        $data['phase_1'] = $this->dashboard_model->phase(1);
        $data['phase_2'] = $this->dashboard_model->phase(2);
        $data['phase_3'] = $this->dashboard_model->phase(3);
        $data['phase_4'] = $this->dashboard_model->phase(4);
        $data['no_phase_new'] = $this->dashboard_model->phase(5);
        $data['phase1_phase2'] = $data['phase_1']+$data['phase_2'];
        $data['phase3_phase4'] = $data['phase_3']+$data['phase_4'];
        $data['stage_1'] = $this->dashboard_model->stage(1);
        $data['stage_2'] = $this->dashboard_model->stage(2);
        $data['stage_3'] = $this->dashboard_model->stage(3);
        $data['stage_4'] = $this->dashboard_model->stage(4);
        $data['stage1_stage2'] = $data['stage_1']+$data['stage_2'];
        $data['stage3_stage4'] = $data['stage_3']+$data['stage_4'];
        $data['consultation_unconverted'] = $this->dashboard_model->get_consultation_unconverted(0);
        //$data['unconverted_consultation'] = $this->dashboard_model->get_unconverted_consultation(0);
        $lead_by_status = $this->dashboard_model->get_lead_by_status();
        foreach ($lead_by_status as $key => $value) {
            if(strtolower($value['status'])=='to engage'){
                $data['to_engage'] =$value['c']; 
            }
            
        }
        #$lead_by_status_completed = $this->dashboard_model->get_lead_by_status_completed();
        $arr = $this->dashboard_model->today_task();
        if(!empty($arr)){
            $task_name=$task_name0=$task_name1=$task_name2=$task_name3=$task_name4=$task_name5=$task_name6=$task_name7=$task_name8=$task_name9=$task_name10='';
            foreach($arr as $val){
                if($val['start_date'] >="09:00" && $val['start_date'] <"10:00" ){
                    $task_name .= $val['start_date']." : " .$val['task_name'].'<br> ';
                }elseif($val['start_date'] >="10:00" && $val['start_date'] <"11:00" ){
                    $task_name0 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="11:00" && $val['start_date'] <"12:00" ){
                    $task_name1 .= $val['start_date']." : " .$val['task_name'].'<br> ';
                }elseif($val['start_date'] >="12:00" && $val['start_date'] <"13:00" ){
                    $task_name2 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="13:00" && $val['start_date'] <"14:00" ){
                    $task_name3 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="14:00" && $val['start_date'] <"15:00" ){
                    $task_name4 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="15:00" && $val['start_date'] <"16:00" ){
                    $task_name5 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="16:00" && $val['start_date'] <"17:00" ){
                    $task_name6 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="17:00" && $val['start_date'] <"18:00" ){
                    $task_name7 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="18:00" && $val['start_date'] <"19:00" ){
                    $task_name8 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="19:00" && $val['start_date'] <"20:00" ){
                    $task_name9 .= $val['task_name'].', ';
                }elseif($val['start_date'] >="20:00" && $val['start_date'] <"21:00" ){
                    $task_name10 .= $val['task_name'].', ';
                }
            }
            $task[0]['task_name'] = $task_name;
            $task[1]['task_name'] = $task_name0;
            
            $task[2]['task_name'] = $task_name1;
            $task[3]['task_name'] = $task_name2;
            $task[4]['task_name'] = $task_name3;
            $task[5]['task_name'] = $task_name4;
            $task[6]['task_name'] = $task_name5;
            $task[7]['task_name'] = $task_name6;
            
            $task[8]['task_name'] = $task_name7;
            $task[9]['task_name'] = $task_name8;
            $task[10]['task_name'] = $task_name9;
            $task[11]['task_name'] = $task_name10;
        
            $data['today_task'] = $task;
        }else{
            $data['today_task'] = '';
        }
        $today_fus_missed_data = $this->dashboard_model->get_today_fus_missed_data_query($c_name);
        $data['today_fus_missed_data'] = ($today_fus_missed_data != 0)? count($today_fus_missed_data) : 0;
        
        $today_calls_miss_data = $this->dashboard_model->get_today_calls_miss_data_query($c_id);
        $data['today_calls_miss_data'] = ($today_calls_miss_data != 0)? count($today_calls_miss_data) : 0;
        // $data['today_sales'] = $this->dashboard_model->today_sales();
        //   avinash added this-28-01-2022
        $data['today_sales'] = $this->dashboard_model->today_sales_new();
        //   avinash added this-28-01-2022
        $data['yesterday'] = date('d.m.Y',strtotime("-1 days"));

        echo json_encode($data);
    }

    public function unit_list(){
        $c_id = $this->session->balance_session['admin_id'];
        //$data['unit_list_revenue'] = $this->dashboard_model->get_unit_list();
        display_view('unit_list');
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';die;*/
    }
    public function unit_list_with_revenue(){
        $today_sales = 0;
        $c_id = $this->session->balance_session['admin_id'];
        $today_sales = $_GET['today_sales'];
        $data['unit_list_with_revenue'] = $this->dashboard_model->get_unit_list($today_sales);
        for($i=0,$j=1;$i<sizeof($data['unit_list_with_revenue']);$i++,$j++ ){
            $data['unit_list_with_revenue'][$i]['row']=$j;
        }
        //  echo "<pre>";
        //  print_r($data['unit_list_with_revenue']);
        //  exit;
        echo json_encode($data);
    }
    
}