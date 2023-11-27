<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email
{
    // start of class
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
    }
    
    public function send($subject = '', $body = '', $mail_recipients = [], $mail_cc = [], $mail_bcc = [], $attachments = [], $from_name = '', $from_email = '', $reply_name = '', $reply_email = '' ) 
    {
        if(is_array($mail_recipients) && ( ! empty($mail_recipients)) && (count($mail_recipients) > 0 ) && ( ! empty($subject)) && ( ! empty($body)) ) 
        {
           // $send_email = TRUE;
            
            // from emails id : Start
            $from_name = (empty($from_name)) ? DEFAULT_NOREPLY_NAME : $from_name;
            $from_email = (empty($from_email)) ? DEFAULT_NOREPLY_EMAIL : $from_email;
            
            $this->CI->email->from($from_email, $from_name);
            // from emails id : End
            
            
            // reply emails id : Start
            $reply_name = (empty($reply_name)) ? DEFAULT_SUPPORT_NAME : $reply_name;
            $reply_email = (empty($reply_email)) ? DEFAULT_SUPPORT_EMAIL : $reply_email;
            
            $this->CI->email->reply_to($reply_email, $reply_name);
            // reply emails id : End
            
            
            // add recipients : Start
            if(is_array($mail_recipients) && (count($mail_recipients) > 0) )
            {
                foreach($mail_recipients as $mail_id => $mailer_name )
                {
                    $this->CI->email->to($mail_id, $mailer_name);
                }
            }
           // $this->CI->email->to($mail_recipients);
            // add recipients : End
            
            
            // add cc : Start
            if(is_array($mail_cc) && (count($mail_cc) > 0) )
            {
                foreach($mail_cc as $mail_id => $mailer_name )
                {
                    $this->CI->email->cc($mail_id, $mailer_name);
                }
            }
            // $this->CI->email->cc($mail_cc);
            // add cc : End
            
            
            // add bcc : Start
            if(is_array($mail_bcc) && (count($mail_bcc) > 0) )
            {
                foreach($mail_bcc as $mail_id => $mailer_name )
                {
                    $this->CI->email->bcc($mail_id, $mailer_name);
                }
            }
            // $this->CI->email->bcc($mail_bcc);
            // add bcc : End
            
            
            // add subject line : Start
            $this->CI->email->subject($subject);
            // add subject line : End
            
            
            // add message body : Start
            $this->CI->email->message($body);
            // add message body : End
            
            
            // add attachments : Start
            if(is_array($attachments) && ( count($attachments) > 0 ) )
            {
                foreach($attachments as $file_name  => $file_path) 
                {                 
                    // $this->CI->email->attach($file_path, 'attachment', $file_name);
                    $this->CI->email->attach($file_path);
                }
            }
            // add attachments : End
            
            
            // send email : Start
            $status = $this->CI->email->send();
            if ( $status)
            {
                 return 1;
            }
            // Will only print the email headers, excluding the message subject and body
            $status = $this->CI->email->print_debugger(array('headers'));
//           echo '<br/><br/>' . __LINE__ . ' >>> ' . __FILE__ . '<hr/><pre>';
//           print_r($status);
//           echo '</pre>';
//           exit();
            return 0;
            // send email : End
        }
    }
   
   
   
   
   
       public function send_new($subject = '', $body = '', $mail_recipients = [], $mail_cc = [], $mail_bcc = [], $attachments = [], $from_name = '', $from_email = '', $reply_name = '', $reply_email = '' ) 
    {
        if(is_array($mail_recipients) && ( ! empty($mail_recipients)) && (count($mail_recipients) > 0 ) && ( ! empty($subject)) && ( ! empty($body)) ) 
        {
           // $send_email = TRUE;
            
            // from emails id : Start
            $from_name = (empty($from_name)) ? DEFAULT_NOREPLY_NAME : $from_name;
            $from_email = (empty($from_email)) ? DEFAULT_NOREPLY_EMAIL : $from_email;
            
            $this->CI->email->from($from_email, $from_name);
            // from emails id : End
            
            
            // reply emails id : Start
            $reply_name = (empty($reply_name)) ? DEFAULT_SUPPORT_NAME : $reply_name;
            $reply_email = (empty($reply_email)) ? DEFAULT_SUPPORT_EMAIL : $reply_email;
            
            $this->CI->email->reply_to($reply_email, $reply_name);
            // reply emails id : End
            
            
            // add recipients : Start
            if(is_array($mail_recipients) && (count($mail_recipients) > 0) )
            {
                foreach($mail_recipients as $mail_id => $mailer_name )
                {
                    $this->CI->email->to($mail_id, $mailer_name);
                }
            }
           // $this->CI->email->to($mail_recipients);
            // add recipients : End
            
            
             $multiple_cc = '';
            if(is_array($mail_cc) && (count($mail_cc) > 0) )
            {
                foreach($mail_cc as $mail_id => $mailer_name )
                {
                   $multiple_cc .= $mail_id.",";
                }
            }
            // print_r($multiple_cc); exit;
             $this->CI->email->cc($multiple_cc);
            // $this->CI->email->cc($mail_cc);
            // add cc : End
            
            
            // add bcc : Start
            $multiple_bcc = '';
            if(is_array($mail_bcc) && (count($mail_bcc) > 0) )
            {
                foreach($mail_bcc as $mail_id => $mailer_name )
                {
                    $multiple_bcc .= $mail_id.",";
                    
                    //print_r($mail_id.",". $mailer_name);
                  
                }
            }
              $this->CI->email->bcc($multiple_bcc);    
           // print_r($multiple_bcc); exit;
            
            // add subject line : Start
            $this->CI->email->subject($subject);
            // add subject line : End
            
            
            // add message body : Start
            $this->CI->email->message($body);
            // add message body : End
            
            
            // add attachments : Start
            if(is_array($attachments) && ( count($attachments) > 0 ) )
            {
                foreach($attachments as $file_name  => $file_path) 
                {                 
                    // $this->CI->email->attach($file_path, 'attachment', $file_name);
                    $this->CI->email->attach($file_path);
                }
            }
            // add attachments : End
            
            
            // send email : Start
            $status = $this->CI->email->send();
            if ( $status)
            {
                 return 1;
            }
            // Will only print the email headers, excluding the message subject and body
            $status = $this->CI->email->print_debugger(array('headers'));
//           echo '<br/><br/>' . __LINE__ . ' >>> ' . __FILE__ . '<hr/><pre>';
//           print_r($status);
//           echo '</pre>';
//           exit();
            return 0;
            // send email : End
        }
    }
    
    
    
    
    // end of class
}