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

    if ( ! function_exists('verify_google_recaptcha_response'))
    {
	/**
	 * Verify Google Recaptcha  response
	 * 
	 *
	 * @param	string  post data of captcha
         * 
         * @return  array structure of response from google
	 */
        
        function verify_google_recaptcha_response($recaptchaResponse = '')
        {
                $CI = & get_instance();
            
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.GOOGLE_RECAPTCHA_SECRET_KEY.'&response='.$recaptchaResponse.'&remoteip='.$CI->input->ip_address();
                
		$response = file_get_contents($url);
	
                unset($CI,$url,$recaptchaResponse);
                return json_decode($response, true);
        }
    
    }

// ------------------------------------------------------------------------
    

    if ( ! function_exists('get_geo_details_from_ip'))
    {
	/**
	 * Get country, state, city info. from ip-address
	 * 
	 *
	 * @param	string  ip address
         * 
         * @return  array
	 */
        
        function get_geo_details_from_ip($ip_address = '')
        {
       
                $CI = & get_instance();
                
                $response = [
                                'country'          => 'Not Define',
                                'state'            => 'Not Define',
                                'city'             => 'Not Define',
                            ];
                
                if(! empty($ip_address)) 
                    {
                        $url = 'http://www.geoplugin.net/php.gp?ip='.$ip_address;
                        $addrDetailsArr = unserialize(file_get_contents($url));

                    //   print_r($addrDetailsArr);  
                        // country
                        if(! empty($addrDetailsArr['geoplugin_countryName']) && ( trim($addrDetailsArr['geoplugin_countryName']) != '' ) ) {
                            $response['country'] = $addrDetailsArr['geoplugin_countryName'];
                        }
                        
                        // state
                        if(! empty($addrDetailsArr['geoplugin_region']) && ( trim($addrDetailsArr['geoplugin_region']) != '' ) ) {
                            $response['state'] = $addrDetailsArr['geoplugin_region'];
                        }
                        
                        // city
                        if(! empty($addrDetailsArr['geoplugin_city']) && ( trim($addrDetailsArr['geoplugin_city']) != '' ) ) {
                            $response['city'] = $addrDetailsArr['geoplugin_city'];
                        }
                        unset($url,$addrDetailsArr);
                    }                
                unset($CI);
                return $response;
        }
    
    }
    
    // ------------------------------------------------------------------------       
    
     
    if ( ! function_exists('get_content'))
    {
    /**
     * Sample helper Declaration
     *
     * < What this helper will do >
     * 
         * @return  < what will this helper return >
     */
        
        function get_content($URL)
        {
           
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $URL);
      $data = curl_exec($ch);
      curl_close($ch);
      return $data;
            
        }    
    }

// ------------------------------------------------------------------------
    
    if ( ! function_exists('get_misc_details_from_ip'))
    {
	/**
	 * Get country, state, city info. from ip-address
	 * 
	 *
	 * @param	string  ip address
         * 
         * @return  array
	 */
        
        function get_misc_details_from_ip($ip_address = '')
        {
                $CI = & get_instance();
                
                $response = [
                                'country'          => 'Not Define',
                                'state'            => 'Not Define',
                                'city'             => 'Not Define',
                            ];
                
                if(! empty($ip_address)) 
                    {
                        $url = 'http://ip-api.com/php/'.$ip_address;
                        $addrDetailsArr = unserialize(file_get_contents($url));
                        
                        // country
                        if(! empty($addrDetailsArr['geoplugin_countryName']) && ( trim($addrDetailsArr['geoplugin_countryName']) != '' ) ) {
                            $response['country'] = $addrDetailsArr['geoplugin_countryName'];
                        }
                        
                        // state
                        if(! empty($addrDetailsArr['geoplugin_region']) && ( trim($addrDetailsArr['geoplugin_region']) != '' ) ) {
                            $response['state'] = $addrDetailsArr['geoplugin_region'];
                        }
                        
                        // city
                        if(! empty($addrDetailsArr['geoplugin_city']) && ( trim($addrDetailsArr['geoplugin_city']) != '' ) ) {
                            $response['city'] = $addrDetailsArr['geoplugin_city'];
                        }
                        unset($url,$addrDetailsArr);
                    }                
                unset($CI);
                return $response;
        }
    
    }

// ------------------------------------------------------------------------
    

    