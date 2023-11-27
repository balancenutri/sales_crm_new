<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Common Helpers
 *
 * @package		CodeIgniter
 * @subpackage          Helpers
 * @category            Helpers
 * @author		Mihir
 */

// ------------------------------------------------------------------------
    if ( ! function_exists('social_links'))
    {
	/**
	 * Social Media Declaration
	 *
	 * Creates the social media links.
	 *
	 * @param	string	the URL
	 * @param	string	Image URL
	 * @param	string	title
	 * @param	string  description
         * @param	string  slug
         * 
         * @return  string structure of social media links
	 */
        
        function social_links($p_url = '', $p_img_url = '', $p_title = '', $p_desc = '', $p_slug = '')
        {
                $CI = & get_instance();
            
		$site_url = base_url();
		$page_url = $site_url.$p_url;
		$page_img_url = $site_url.$p_img_url;
		$page_title = $p_title;
		
                if($p_slug)
			$page_slug=$page_url.'/'.$p_slug.'/'.$page_title;
		else
			$page_slug=$site_url.$p_url;
                
		$page_desc = stripslashes(html_entity_decode(strip_tags($p_desc),ENT_QUOTES));
		
                $t_url ="https://twitter.com/share?url=".$page_slug."&text=Hey check this out - ".$page_title;
		//$g_url ="https://plus.google.com/share?url=".$page_slug;
		$pi_url ="http://pinterest.com/pin/create/button/?url=".$page_slug;
		$li_url = "http://www.linkedin.com/shareArticle?mini=true&url=".$page_slug."&title=".$page_title."&summary=".$page_desc;
		$wt_url ="whatsapp://send?text=".$page_title."%0A".$page_desc."%0A".$page_slug;
                ?>
                            <?php // fb ?>
                            <li>
                                <a href="<?php echo $page_slug; ?>" data-image="<?php echo $p_img_url; ?>" data-title="<?php echo $page_title; ?>" data-desc="<?php echo $page_desc; ?>" class="btnShare  azm-social azm-size-32 azm-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <?php // twitter ?>
                            <li>
                                <a href="<?php echo $t_url; ?>" target="_blank" class="azm-social azm-size-32 azm-twitter">
                                    <i class="fa fa-twitter"></i></a>
                            </li>
                            <?php // g+ ?>
                            <!--li>
                                <a href="<?php // echo $g_url; ?>" target="_blank" class="azm-social azm-size-32 azm-google-plus">
                                    <i class="fa fa-google-plus"></i></a>
                            </li -->
                            <?php // pinterest ?>
                            <li>
                                <a href="<?php echo $pi_url; ?>&media=<?php echo $p_img_url; ?>&description=<?php echo $page_desc; ?>" target="_blank" class="azm-social azm-size-32 azm-pinterest">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                            </li>
                            <?php // linkedin ?>
                            <li>
                                <a href="<?php echo $li_url; ?>" target="_blank" class="azm-social azm-size-32 azm-linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <?php // whatsapp ?>
                            <li class="css_show_in_mobi_and_hide_in_desktop">
                                <a  href="<?php echo $wt_url; ?>" data-action="share/whatsapp/share" class="azm-social azm-size-32 azm-whatsapp">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
			

<?php }
    
    }

// ------------------------------------------------------------------------
    
    if ( ! function_exists('email_client_response_signature'))
    {
	/**
	 *  Email client response signature 
	 *
	 * < will return the standard client response signature, that goes out from system  >
	 * 
         * @return  string mixed output 
	 */
        
        function email_client_response_signature()
        {
           return ' <br/><br/>
                    <p>Warm Regards,<br/>
                       Team '.COMPANY_NAME.' <br/>
                       <a href="'. base_url().'" >'.DOMAIN_NAME.'</a> <br/> 
                    </p>
                        <a href="https://www.facebook.com/balancenutrition.in" style="margin-right:10px;text-decoration: none;" target="_blank" >
                            <img src="'.CDN_IMAGE_URL.'emails/facebook.png" width="32" height="32" />
                        </a>
                        <a href="https://twitter.com/balance_khyati" target="_blank" style="margin-right:10px;text-decoration: none;">
                            <img src="'.CDN_IMAGE_URL.'emails/twt.png" width="32" height="32" />
                        </a>
                        <a href="https://in.linkedin.com/pub/balance-nutrition/98/5ba/6a6" target="_blank" style="margin-right:10px;text-decoration: none;">
                            <img src="'.CDN_IMAGE_URL.'emails/linkedin.png" width="32" height="32" />
                        </a>
                        <a href="https://www.instagram.com/balancenutrition.in/" target="_blank" style="margin-right:10px;text-decoration: none;">
                            <img src="'.CDN_IMAGE_URL.'emails/youtube.png" width="32" height="32" />
                        </a>
                        <a href="http://www.pinterest.com/KhyatiRupani123/" target="_blank" style="margin-right:10px;text-decoration: none;">
                            <img src="'.CDN_IMAGE_URL.'emails/pinintrest.png" width="32" height="32" />
                        </a>
                       <br/>
                    <p>BALANCE.. Weight loss & more!<br/>
                        Ashirwad Bungalow, 1st Floor,<br>
                        Tagore Road, Near Laxminarayan Temple,<br>
                        Santacruz West, Mumbai - 400054
                    </p>
                  ';
        }    
    }
    
// ------------------------------------------------------------------------    
    
    
    if ( ! function_exists('display_view'))
    {
	/**
	 * Display View helper Declaration
	 *
	 * This helper will load the view views
         * 
         *  args1    $viewname, the view file to load
         *  args2    $data, the data to be supplied to the loaded view
	 * 
         * @return  null
	 */
        
        function display_view($view_name = '', $data = [])
        {
           $CI = & get_instance();
           
           $CI->load->view('header', $data); 
           $CI->load->view($view_name, $data); 
           $CI->load->view('footer', $data); 
           
           unset($CI,$data);
        }    
    }
    
    
    if ( ! function_exists('check_support_login'))
    {
    /**
     * Display View helper Declaration
     *
     * This helper will load the view views
         * 
         *  args1    $viewname, the view file to load
         *  args2    $data, the data to be supplied to the loaded view
     * 
         * @return  null
     */
        
        function check_sales_login()
        {
           if(isset($_SESSION['sales_login']) && $_SESSION['sales_login']  = 1){
               return '1';
           }else return '0';
        }    
    }    
// ---
     
// ------------------------------------------------------------------------    
    
    
    
    
// ------------------------------------------------------------------------    
    
    
    if ( ! function_exists('is_logged_in'))
    {
	/**
	 * Is logged In helper Declaration
	 *
	 * < This helper will check if the user is logged in or not >
	 * 
         * @return  < TRUE - if logged in
         *                   OR   
         *            FALSE - if NOT logged IN  
         * > 
	 */
        
        function is_logged_in()
        {
           $CI  = & get_instance(); 
            
           if(empty($CI->session->user_id) || ($CI->session->user_id == '') ) 
           {
               return FALSE;
           }
            
           return TRUE;
        }    
    }
    
    

    
//Code by Dhruv- Added By Vaibhav:- 27-08-2020


function print_r_custom ($expresion, $hidden=false) 
	{
		if ($hidden) echo '<pre style="display:none;">';
			else echo '<pre>';
		print_r($expresion);
		echo '</pre>';
	}

function export_to_csv($filename,$header,$data){
     header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/xls; ");
        
        // file creation 
           $file = fopen('php://output', 'w');
         
           
           fputcsv($file, $header);
           foreach ($data as $key=>$line){ 
             fputcsv($file,$line); 
           }
           fclose($file); 
           exit; 
}	

function custom_encrypt($data,$data_key){
	    
	    return openssl_encrypt($data, 'AES128', $data_key);
	}
	
function custom_decrypt($data,$data_key){
	    
	    return openssl_decrypt($data, 'AES128', $data_key);
	}
	
	//mail update vikram
	
	
		function sendMail($from,$subject,$content,$to,$cc=0,$bcc=0,$signature_status=0)
		{
		    
		  error_reporting(1);
		  
		    $this->load->library('PHPMailer_Lib');
		     print_r($from);
		    die();
        // PHPMailer object
        
         
        $email = $this->PHPMailer_Lib->load();

			
		    
			$email->CharSet = 'UTF-8';
			$email->Encoding = 'base64'; 
			$email->SMTPDebug = false;
			$email->isSMTP();
			$email->Host = "smtp.gmail.com";
			$email->SMTPAuth = true;
			$email->Port = 587;
			$email->Username = $from['email_id'];
			$email->Password = $from['password'];
			$email->SMTPSecure = "tls";
			$email->setFrom($from['email_id'],$from['first_name']);
			$email->addReplyTo($from['email_id'],$from['first_name']);

			

		
			$email->Subject = $subject;
                        
                        
// 			if($signature_status){
				
// 				/* if($from['email_id']=='khyati@balancenutrition.in' || $from['email_id']=='khyati.rupani@balancenutrition.in')
// 				{
// 					require('khyati_signature.php');
// 				}
// 				else
// 				{
// 				} */
				
// 				require('mail_signature_new.php');
				
// 				$content .= $signature;
// 			}

			$email->MsgHTML($content);

			foreach($to as $value){
				$email->AddAddress($value);			
			} 

			if($cc){
				foreach($cc as $value){
					$email->addCC($value);
				}
			}

			if($bcc){
				foreach($bcc as $value){
					$email->addBCC($value);
				}
			}
			
			$email->IsHTML(true);
// 			echo "<pre>";
// 			print_r($email->Send());
// 			exit;
			if($email->Send()){
				$email->ClearAddresses();
				$email->ClearBCCs();
				$email->ClearCCs();				
				return 1;
			}else {
				$email->ClearAddresses();
				$email->ClearBCCs();
				$email->ClearCCs();				
				return 0;
			}
		}