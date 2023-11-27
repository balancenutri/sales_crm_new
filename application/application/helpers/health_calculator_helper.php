<?php
defined('BASEPATH') OR exit('No direct script access allowed');



if ( ! function_exists('weight_roundoff'))
    {
	/**
	 * Get country, state, city info. from ip-address
	 * 
	 *
	 * @param	string  ip address
         * 
         * @return  array
	 */
        
        function weight_roundoff($weight = '')
        {
               // convert weight to appropriate weight in kgs : Starts 
                
                if(! empty($weight)) 
                    {
                        $weight = trim(str_ireplace(['kgs','',',','-','kg.','yrs','jf','+','gm','kgs n height','kh','kg','arround','not comfortable','O2'],'', trim(strtolower($weight))));
                
                // convert weight in kgs
                if( (stripos($weight, 'lb') !== FALSE) || (stripos($weight, 'pound') !== FALSE ) ) 
                {                    
                    $weight = trim(str_ireplace(['lbs','lb',' ','pounds','pound'],'', trim(strtolower($weight))));
                    $weight =  round( ( ( (float) $weight ) *  0.45359237),2);
                }            
                        }
                        return $weight;
                       
                    }                
                
                
                 // convert weight to appropriate weight in kgs : End
        }


if ( ! function_exists('ideal_weight_calc'))
    {
	/**
	 * Get ideal weight from height,gender,inch
	 * 
	 *
	 * @param	height,gender,inch
         * 
         * @return  ideal weight
	 */
        
        function ideal_weight_calc($_fheight = '',$gender='', $_iheight=0)
        {
               // calculate ideal weight : Start
                
                $_gender =  trim(strtolower($gender));
                //  $_iheight = ($_iheight < 1 ? 1 : $_iheight);
                
                $wt = 0;
                $weight_inches = ($_fheight * 12) + $_iheight;
                $base_inches = 48;
                $multiply_inches = $weight_inches - $base_inches;

//                        Reference : http://www.calculator.net/ideal-weight-calculator.html
//
//                            J. D. Robinson Formula (1983)
//
//                                52 kg + 1.9 kg per inch over 5 feet       (man)
//                                49 kg + 1.7 kg per inch over 5 feet       (woman)
//
//                            D. R. Miller Formula (1983)
//
//                                56.2 kg + 1.41 kg per inch over 5 feet       (man)
//                                53.1 kg + 1.36 kg per inch over 5 feet       (woman)




                if($_fheight >= 5 ) {

                    $new_iheight = ( ( $_fheight - 5 ) * 12 ) + $_iheight;


                if ($_gender == 'male') 
                {
                            $male_weight = 52 + (1.9 * $new_iheight );
                            $wt = $male_weight;
                    }
                    else
                    {
                            $female_weight = 49 + (1.7 * $new_iheight );
                            $wt = $female_weight;
                    }
                } else {
                    if ($_gender == 'male') 
                    {
                            $male_weight = 21.94 + ($multiply_inches * 2.54);
                            $wt = $male_weight;
                    }
                    else
                    {
                            $female_weight = 16.92 + ($multiply_inches * 2.54);
                            $wt = $female_weight;
                    }
                }


                if($wt < 0) {
                    $wt = 0;
                }

               return $wt;
                       
         }      
        // calculate ideal weight : End       
    }


if ( ! function_exists('bmi_calc'))
    {
	/**
	 * Get bmi calculations from height,inch,weight
	 * 
	 *
	 * @param	height,inch,weight
         * 
         * @return  ideal weight
	 */
        
        function bmi_calc($height = '', $inch = '', $weight = '')
        {

            //calculate bmi : Start
            $bmi = 0;
            
                if( ( ! empty($height) ) && ( $inch!=='') && ($inch!=='NULL'  ) && ( ! empty($weight) ) )
                {
                    $mhieght = ($height * 0.3048) + ($inch * 0.0254);
                    $bmi = $weight / ($mhieght * $mhieght);
                    $bmi = round($bmi,2);
                }    
            
            return $bmi;
            // calculate bmi : End             
         }   
    }
    
if ( ! function_exists('health_score_data'))
    {
	/**
	 * Get bmi calculations from height,inch,weight
	 * 
	 *
	 * @param	height,inch,weight
         * 
         * @return  ideal weight
	 */
        
        function health_score_data($bmi = '')
        {
          //calculate bmi : Start
                
                 if($bmi <= 18.4) 
                 {
                    $text_category = 'UNDERWEIGHT';
                    $res = 'underweight';
                    $img ='fhs/underweight.png';
                    $text_content = ' <div class="text_content">
                                          Your BMI indicates that you are Underweight. It\'s likely that you are not consuming a healthy, balanced diet, which can lead to you lacking nutrients that your body needs to grow and work properly. Calcium, for example, is important for the maintenance of strong and healthy bones. If you\'re not consuming enough iron, you may develop anaemia, which may leave you feeling drained and tired. Women who have lost a lot of weight can find that their periods stop. This increases the risk of fertility problems
                                      </div>
                                    ';
                    $text_content_bottom = ' <div class="align-center">
                                                 <div>worth <span class="f18 text-danger">RS.</span> <span class="f60 text-danger">1900/-</span>  </div>
                                                 <div class="text-danger f22"><b>FREE OF COST</b></div>
                                             </div>
                                           ';
                                                                
                }
                else if( $bmi >= 18.5 && $bmi <= 24.9) 
                {
                    $text_category = 'NORMAL';
                    $res = 'normal weight';
                    $img = 'fhs/normal.png';
                    $text_content = ' <div class=" text_content">
                                          Congratulations as all your parameters are great, maintain this with a healthy balanced diet, guard against slowing metabolism which comes with age, we know with experience that once you start losing body shape then the effort to get it back is much more, SO maintain a good balanced diet and use our recipes and health reads to stay in touch
                                      </div>
                                    ';
                    $text_content_bottom = '  
                                           ';
                                                                
              }
              else if( $bmi >= 25 && $bmi <= 29.9) 
              {
                    $text_category = 'OVERWEIGHT';
                    $res = 'overweight';
                    $img = 'fhs/overweight.png';
                    $text_content = ' <div class="text_content">
                                          <span class="text-danger">As per you BMI Score, your current weight puts you in Overweight category. Though not obese, we still need to take care as being overweight puts us to a moderate risk of developing disorders like blood pressure, fatty liver that have no cure.</span> Losing weight using a balanced diet can not only help you to reduce your weight but also reduce the risk of future diseases and helps you guard against the slow metabolism.
                                      </div>                                                                                  
                                    ';
                    $text_content_bottom = ' <div class="align-center">
                                                 <div>worth <span class="f18 text-danger">RS.</span> <span class="f60 text-danger">1900/-</span>  </div>
                                                 <div class="text-danger f22"><b>FREE OF COST</b></div>
                                             </div> 
                                           ';
              }
              else 
              {
                    $text_category = 'OBESE';
                    $res = 'obese';
                    $img = 'fhs/obese.png';
                    $text_content = ' <div class="text_content text-danger">
                                          As per you BMI Score, your current weight puts you in Obese category. It is now not just about the excess weight but this may lead to increased risk towards cardiovascular diseases, diabetes, and fatty liver too. Hence weight loss for you now becomes a necessity and not a choice.
                                      </div>
                                    ';
                    $text_content_bottom = ' <div class="align-center">
                                                 <div>worth <span class="f18 text-danger">RS.</span> <span class="f60 text-danger">1900/-</span>  </div>
                                                 <div class="text-danger f22"><b>FREE OF COST</b></div>
                                             </div>
                                           ';
              }
           

           		$response = [
                                        'text_category'        => $text_category,
                                        'res'                  => $res,
                                        'img'                  => $img,
                                        'text_content'         => $text_content,
                                        'text_content_bottom'  => $text_content_bottom
                                    ];

                 return $response;
            // calculate bmi : End
         }       
    }
    
    //body shape data :start
    
    if ( ! function_exists('body_shape_data'))
    {
        function body_shape_data($body_shape = '')
        {
//            echo '<br/><br/>' . __LINE__ . ' >>> ' . __FILE__ . '<hr/><pre>';
//            print_r($body_shape);
//            echo '</pre>';
//            exit();
                                                         
           
            
            if($body_shape =='Apple-shape'){
                
                $shape_desc = 'If you tend to put on weight around your tummy, then the fat tends to surround your internal organs.
                                   Nourish your organs by having vitamin C-rich foods like oranges, lemons, amla and grapefruit.
                                   Also increase your antioxidant intake by adding salads and cooked veggies to each major meal.
                                   Stay within the recommended BMI range and ensure regular cardio exercises.';
                
            }else if($body_shape =='Banana-shape'){
                
                $shape_desc = 'If your body is more rectangular-shaped, then ensure you do the right kind of exercise.
                                   Add protein rich food like eggs or pulses to your breakfast, and have multiple, smaller meals in a day to boost your metabolism.
                                   Avoid refined foods like white flour, excess sugar, packaged butter, and margarine.'; 
                
            }else if($body_shape =='Pear-shape'){
                
                $shape_desc = 'If you tend to have wider hips and heavier thighs, then you have a higher chance of gaining cellulite.
                                   Eat six smaller meals a day and add high fibre, low calorie foods like whole grains and vegetables in your diet to kick up your metabolism.
                                   Also consume more lean protein in the form of beans and legumes.Stay within the ideal BMI range and exercise regularly. ';
                
            }else if($body_shape =='Hourglass-shape'){
                
                $shape_desc='If you have more of a curvy figure, then make sure you include plenty of cardio. Avoid water retention by restricting  excess salt, and fried food.
                                 Add a wide variety of fresh, veggies to your meals, and snack on seasonal fruits.
                                 Choose whole-grains, and opt for lean proteins like beans and lentils. 
                                 Go for a well-guided detox diet once in a week.';
                
            }else if($body_shape =='Oval-shape'){
                
                $shape_desc = 'If you tend to put on weight around your tummy, then the fat tends to surround your internal organs.
                                   Nourish your organs by having vitamin C-rich foods like oranges, lemons, amla and grapefruit.
                                   Also increase your antioxidant intake by adding salads and cooked veggies to each major meal.
                                   Stay within the recommended BMI range and ensure regular cardio exercises.';
                
            }else if($body_shape =='Square-shape'){
                
                
                $shape_desc = 'If your body is more rectangular-shaped, then ensure you do the right kind of exercise.
                                   Add protein rich food like eggs or pulses to your breakfast, and have multiple, smaller meals in a day.
                                   Avoid refined foods like white flour, excess sugar, packaged butter, and margarine
                        '; 
                
            }else if($body_shape =='Triangle-shape'){
                
                 $shape_desc = 'If you tend to have wider hips and heavier thighs, then you have a higher chance of osteoporosis trouble.
                                   Eat multiple smaller meals a day and add high fibre, low calorie vegetables in your diet to kick up your metabolism.
                                   Also consume more lean protein in the form of skinless chicken, beans and legumes and stick to grains like millets and oats Stay within the ideal BMI range and exercise regularly.
                        '; 
            }
           
            return $shape_desc;
        }
        
    }
    
    //body shape data : end
    
    



?>