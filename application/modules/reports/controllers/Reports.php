<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MX_Controller 
{
    // start of class

    public function __construct() 
    {
        parent::__construct();
        $this->load->model(array('reports_model'));
    }

    public function index()
    {
        // $name = array('Aratrika', 'Priyanka','Aanchal','parul','Chirag');//, 'Mouli', 'Darshi', 'Priyanka'// avinash comment this
        $name = array('Aayushi','Vaishnavi');//, 'Mouli', 'Darshi', 'Priyanka'
        $res = array();
        $res1 = array();
        $res_table = array();
        $html = "";
        $sum = 0;
        $html = "";
        $subject = "";
        $datatotallead = $this->reports_model->get_total_lead_conversion();
        $subject = "Sales Reconciliation report (".date('d-m-Y').")";
        foreach($datatotallead as $key_totallead => $value_totallead){
            $sum += $value_totallead['cnt'];
        }
        $html = "Hello Sir, <br> <br>Below is the Reconciliation report (".date('d-m-Y').") <br> <br>Total LEAD generated count - ".$sum.'<br><br>';
        //$data['lead_assigned_to'] = $sum;
        $incre = 0;
        $error_messgae = "";
        foreach($name as $key=>$value){
            $k=0;
            $z=0;
            //===========================================================================
            $review[$value] = $this->reports_model->get_review_lead_conversion($value,1);
            if(count($review[$value])>0){
                $data[$value]['slot1_note'] = $review[$value][0]['note'];
            }else{
                $data[$value]['slot1_note'] = "";
            }
            $review2[$value] = $this->reports_model->get_review_lead_conversion($value,2);
            if(count($review2[$value])>0){
                $data[$value]['slot2_note'] = $review2[$value][0]['note'];
            }else{
                $data[$value]['slot2_note'] = "";
            }
            $review3[$value] = $this->reports_model->get_review_lead_conversion($value,3);
            if(count($review3[$value])>0){
                $data[$value]['slot3_note'] = $review3[$value][0]['note'];
                $result_decode = json_decode($review3[$value][0]['other_data']);
                $data[$value]['leads_assigned'] = $result_decode->leads_assigned;
                $data[$value]['fu'] = $result_decode->fu;
                $data[$value]['consultation'] = $result_decode->consultation;
                $data[$value]['hot'] = $result_decode->hot;
                $data[$value]['fu_missed'] = $result_decode->fu_missed;
                $data[$value]['call_missed'] = $result_decode->call_missed;
                $data[$value]['sale_unit'] = $result_decode->sale_unit;
                $data[$value]['sale_amt'] = $result_decode->sale_amt;
                
            }else{
                $data[$value]['slot3_note'] = "";
                $data[$value]['leads_assigned'] = 0;
                $data[$value]['fu'] = 0;
                $data[$value]['consultation'] = 0;
                $data[$value]['hot'] = 0;
                $data[$value]['fu_missed'] = 0;
                $data[$value]['call_missed'] = 0;
                $data[$value]['sale_unit'] = 0;
                $data[$value]['sale_amt'] = 0;
            }
            
            
            $res_table['Particular'][] = $value;
            $res_table['Total Lead Assigned'][] = $data[$value]['leads_assigned'];
            $res_table['Follow Up'][] = $data[$value]['fu'];
            $res_table['Consultation'][] = $data[$value]['consultation'];

            $res_table['Today Hot'][] = $data[$value]['hot'];
            $res_table['FU Missed'][] = $data[$value]['fu_missed'];
            $res_table['Call Missed'][] = $data[$value]['call_missed'];
            $res_table['Sales Unit'][] = $data[$value]['sale_unit'];
            $res_table['Sales Amount'][] = intval($data[$value]['sale_amt']);

            $res_table['First Half Review Note'][] = $data[$value]['slot1_note'];
            $res_table['Second Half Review Note'][] = $data[$value]['slot2_note'];
            $res_table['Day End Review Note'][] = $data[$value]['slot3_note'];

            if($data[$value]['slot3_note']!=""){
                $incre++;
            }else{
                $error_messgae .= $value.',';
            }
            
        }
        // echo '<pre>';print_r($res_table);die; 
        $html .= '<table style="" border="1" width="100%" cellspacing="0" cellpadding="2">';
        foreach($res_table as $key_table => $value){
            $html .= '<tr>';
            $html .='
                <td style="width: 127.333px;">'.$key_table.'</td>
                ';
            foreach($value as $key_table1 => $value1){

                $html .='
                    <td style="width: 127.333px;">'.$value1.'</td>
                    ';
            }//foreach($value as $key_table1 => $value1){
            $html .='</tr>';
            if($key_table=="Sales Amount"){
                $html .= '<tr>';
                $html .='
                        <td style="width: 127.333px;font-weight:bold">Review Note</td>
                        ';
                foreach($value as $key_table1 => $value1){

                    $html .='
                        <td style="width: 127.333px;"></td>
                        ';
                }
                $html .='</tr>';
            }//if($key_table=="Today Hot"){
        }//foreach($res_table as $key_table => $value){
                
        $html .= '</table>';
        //echo $html;
        //die;
        if($incre > 0){
            echo $html;
            //Load email library 
            $this->load->library('email'); 
            // $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
            $this->email->set_header('Content-type', 'text/html');
             
            // $this->email->from('navin.prasad@balancenutrition.in', 'Navin Prasad' );
            $this->email->from('avinash.pandey@balancenutrition.in', 'Avinash Pandey' );
            // $this->email->to('avinash.pandey@balancenutrition.in', 'Avinash Pandey');
            $this->email->to('accounts@balancenutrition.in');
            $this->email->cc(array('vishalrupani@balancenutrition.in','vaibhav.gonjari@balancenutrition.in'));//,'navin@balancenutrition.in','shifa.shaikh@balancenutrition.in'
            $this->email->bcc(array('vikram.gupta@balancenutrition.in'));
            $this->email->subject($subject);
            $this->email->message($html);
            //die;
            //Send mail 
            if($this->email->send()) 
                $data['success'] = 1; 
            else 
                $data['error_msg'] = "Error in sending Email.";
            
            echo json_encode($data);
        }else{
            echo $error_messgae.' are not submitted all Review Note';
            die;
        }
        //display_view('index',$data);
    }
    
    
}