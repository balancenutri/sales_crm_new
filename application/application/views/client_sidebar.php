<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
<style>
.chat_profile_scroll{
    width: 96.7%;
    position: absolute;
    z-index: 2;
    color: #000 !important;
    font-size: 18px;
    border: 1px solid #00000020;
    height: 34px;
    display: block;
    background: #eee;
    padding: 18px 5px 0 10px;
}

#chat_profile_sec{
    cursor:pointer;
}

#chat_profile_tbl_sec .tabprofile_table th {
    width: 130px;
    position: relative;
    text-transform: capitalize;
    line-height: 1.5;
    padding:4px 7px !important;
}

.chat_profile .autoRefreshOff {
    float: right;
    margin: 3px 5px;
    text-align: center;
    font-size: 16px;
}

.chat_profile .chat_dropdown {
    float: right;
    padding: 0 7px;
}

.chat_profile span {
    padding: 2px 1rem 2px 1rem;
    display: inline-block;
    line-height: 1.7;
    font-size: 16px;
}

#close_profile_btn {
    cursor: pointer;
}

.chat_profile .bootstrap-switch {
    border-color: #000;
}

.chat_profile .bootstrap-switch span {padding: 6px !important;}

.chat_profile .birthday_css {
    /*float: right;*/
    text-transform: uppercase;
    background: linear-gradient(to top, #30cfd0 0%, #330867 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    /*font-size: 20vw;*/
    font-family: "Poppins", sans-serif;
    margin:0px !important;
    padding:0px !important;
}

.chat_profile .dollar_css {
    /*float: right;*/
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
    margin:0px !important;
    padding:0px !important;
}

.chat_profile .birthday_css i {
    font-size: 1.4rem;
    padding: 3px 0 0 7px;
}

.chat_profile .dollar_css i {
    font-size: 1.5rem;
    padding: 3px 0 0 7px;
}

.chat_profile .m-btn--icon.m-btn--icon-only.btn-lg {
    width: 20px !important;
    height: 20px !important;
}

.chat_profile .m-btn--icon.m-btn--icon-only.btn-lg [class^=flaticon-] {
    font-size: 1rem;
}

.chat_profile .bootstrap-switch .bootstrap-switch-handle-off, .chat_profile  .bootstrap-switch .bootstrap-switch-handle-on, .chat_profile .bootstrap-switch .bootstrap-switch-label {
    line-height: 1;
}
</style>
<?php
$country_available = false;

if(isset($client_country)){
    if(!empty($client_country)){
        $country_name = $client_country[0]['country_name'];
        $country_code = $client_country[0]['shortname'];
        $country_zone = $client_country[0]['zone_name'];
        $state_zone = $client_state[0]['zone_name'];
        if($state_zone != ''){
            $zone = $state_zone;
        }else{
            $zone = $country_zone;
        }
        
        $time = new DateTimeZone($zone);
        $s = new DateTime("now", new DateTimeZone($zone) );
        $stamp = $s->format('U');
        $z = $time->getTransitions($stamp,$stamp);
        //var_dump($z);
        
        
        $country_date = new DateTime("now", new DateTimeZone($zone) );
        $current_country_date_time = $country_date->format('<b>h:i a</b> (dS M)');
        $city_name = $client_city[0]['city_name'];
        
        $jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=".$city_name.",".strtolower($country_code)."&appid=ea8f21a38c9648665a706803eeadcabf";
        
        $json = file_get_contents($jsonurl);
        
        $weather = json_decode($json);
        if($weather->main->temp){
        $kelvin = $weather->main->temp;
        $celcius = floor($kelvin - 273.15)."&#176;C";
        }else{
            $celcius = 'N/A';
        }
        
        $country_available = true;
    }
}
?>
 
<?php
  $client_id=$this->uri->segment(2);
  if($this->uri->segment(1)!='tabchats_view')
  {
      $chat_padding = " ";
?>
<?php }
if($this->uri->segment(1)=='tabchats-view')
{ ?>
<div class="m-accordion__item-title chat_profile chat_profile_scroll p-0" style="width:33%">
    <span>Client Details:
    <?php if($country_available){ ?>
        <img src="https://www.countryflags.io/<?= strtolower(($country_code == 'UAE')? 'AE': $country_code)?>/flat/32.png" style="vertical-align: middle;margin: 0 7px;width: 30px;"> 
    <?php } ?>
    <?php if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Vegetarian' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Veg'){ ?> <img src="https://www.balancenutrition.in/mentor_dashboard_new/assets/image/veg.png" style="width: 20px; height: auto;"> <?php } else if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Non Vegetarian' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Non Veg'){ ?><img src="https://www.balancenutrition.in/mentor_dashboard_new/assets/image/non-veg.png" style="width: 20px; height: auto;"> <?php  } else if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Ovo-Vegetarian (Vegetaria' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Ovo Veg'){ ?> <img src="https://www.balancenutrition.in/mentor_dashboard_new/assets/image/ovo-veg.png" style="width: 20px; height: auto;"> <?php }else if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Vegan (No Non-Veg, No Dai' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Vegan'){ ?> <img src="https://www.balancenutrition.in/mentor_dashboard_new/assets/image/vegon.png" style="width: 20px; height: auto;"> <?php } //please set condition and set image name vegon.png / ovo-veg.png / lacto.png / non-veg.png ?>
    
    <p class="m-0 float-right">
    <?php if(date('m-d',strtotime($common_tabprofile[1]['result'][0]['birth_date'])) == date('m-d')){ ?>
        <span class="birthday_css blink"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>
    <?php } ?>
    <?php if(!empty($balance_orders)){ ?>
    <span class="dollar_css text-danger blink"><i class="fa fa-usd" aria-hidden="true"></i></span>
    <?php } ?>
    </p>
    </span> 
    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push chat_dropdown" data-dropdown-toggle="click" aria-expanded="true">
        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle my-2">
            <i class="flaticon-more"></i>
        </a>
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--left" style="left: auto; right: 21.5px;"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__body py-2" style="height: 250px; overflow-y: scroll;">
                    <div class="m-dropdown__content">
                        <!--begin::Nav-->
                        <ul class="m-nav">
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" id="2" data-id="tabprofile">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Profile</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabwallet">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Wallet & Referral</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="taballtracker" id="alltracker-tab">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">All Tracker</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabAssessment">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Assessment</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabBreakTracker">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Break Tracker</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabclientstaus">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Client Status</span>
                                </a>
                            </li>
                            <!--<li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabEmails">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Custom Emails</span>
                                </a>
                            </li>-->
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabfeedback">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Feedback</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabfooddiary">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Food Diary</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabHealthScore">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Health Score</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabInchLossTracker">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Inch Loss Tracker</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabingredientchecklist">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Ingredient Availability</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabNewGoal">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">New Goal Set</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabPhoto">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Photo</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabShortVersion">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Short Version Programs</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabWeightTracker">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Weight Tracker</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabwelcomecall">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Welcome Call</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabtailend">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Tailend Details</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link activetab_dropdown" data-id="tabboardcast">
                                    <i class="m-nav__link-icon flaticon-user"></i>
                                    <span class="m-nav__link-text">Broadcast</span>
                                </a>
                            </li>
                            <!--<li class="m-nav__item">
                                <a href="#" class="m-nav__link" data-toggle="modal" data-target="#faqs_popup">
                                    <i class="m-nav__link-icon"></i>
                                    <span class="m-nav__link-text">Draft</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link" data-toggle="modal" data-target="#recipe_popup">
                                    <i class="m-nav__link-icon"></i>
                                    <span class="m-nav__link-text">Recipe</span>
                                </a>
                            </li>-->
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link blogsLink">
                                    <i class="m-nav__link-icon"></i>
                                    <span class="m-nav__link-text">Blogs</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link ytLink">
                                    <i class="m-nav__link-icon fa fa-youtube-play"></i>
                                    <span class="m-nav__link-text">Youtube</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--end::Nav-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="autoRefreshOff">Auto Refresh: 
        <input data-switch="true" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" id="m_switch_1" style="border-color:#000;">
    </a>
</div>
<?php $chat_padding = "mt-5 pt-1"; } ?>




<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu"  class="m-aside-menu <?= $chat_padding; ?> m-aside-menu--skin-light m-aside-menu--submenu-skin-light " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		style="padding: 10px;">		
		
            <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist" style="display:  none;">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active" id="tabprofile_link" data-toggle="tab" href="#m_quick_sidebar_tabs_Profile" role="tab">Profile</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="taballtracker_link" data-toggle="tab" href="#m_quick_sidebar_tabs_alltracker" role="tab">All Tracker</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabchat_link" data-toggle="tab" href="#m_quick_sidebar_tabs_chat" role="tab">Chat  </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabboardcast_link" data-toggle="tab" href="#m_quick_sidebar_tabs_boardcast" role="tab">Boardcast  </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabWeightTracker_link" data-toggle="tab" href="#m_quick_sidebar_tabs_WeightTracker" role="tab">Weight Tracker</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabPhoto_link" data-toggle="tab" href="#m_quick_sidebar_tabs_Photo" role="tab">Photo</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabHealthScore_link" data-toggle="tab" href="#m_quick_sidebar_tabs_healthScore" role="tab">Health Score</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabInchLossTracker_link" data-toggle="tab" href="#m_quick_sidebar_tabs_InchLossTracker" role="tab">Inch Loss Tracker</a>
                </li>
                 <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabfooddiary_link" data-toggle="tab" href="#m_quick_sidebar_tabs_fooddiary" role="tab">Food Diary</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabAssessment_link" data-toggle="tab" href="#m_quick_sidebar_tabs_Assessment" role="tab">Assessment</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabingredientchecklist_link" data-toggle="tab" href="#m_quick_sidebar_tabs_ingredientchecklist" role="tab">Ingredient Check List</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabjourney_link" data-toggle="tab" href="#m_quick_sidebar_tabs_journey" role="tab">Journey</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabEmails_link" data-toggle="tab" href="#m_quick_sidebar_tabs_Emails" role="tab">Emails</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabclientstaus_link" data-toggle="tab" href="#m_quick_sidebar_tabs_clientstaus" role="tab">Client Status</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabShortVersion_link" data-toggle="tab" href="#m_quick_sidebar_tabs_ShortVersion" role="tab">Short Vesion Programs</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabwallet_link" data-toggle="tab" href="#m_quick_sidebar_tabs_wallet" role="tab">Wallet</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabwelcomecall_link" data-toggle="tab" href="#m_quick_sidebar_tabs_welcomecall" role="tab">Welcome Call</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabfeedback_link" data-toggle="tab" href="#m_quick_sidebar_tabs_feedback" role="tab">Feedback</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabBreakTracker_link" data-toggle="tab" href="#m_quick_sidebar_tabs_break_tracker" role="tab">Break Tracker</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabNewGoal_link" data-toggle="tab" href="#m_quick_sidebar_tabs_new_goal" role="tab">New Goal Set</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" id="tabtailend_link" data-toggle="tab" href="#m_quick_sidebar_tabs_tailend" role="tab">Tailend</a>
                </li>

            </ul>
            
		    <div class="tab-content" >
                    <div class="tab-pane active" id="m_quick_sidebar_tabs_Profile" role="tabpanel" style="overflow-y: auto;height: auto;">

                        


                    </div>

                    <div class="tab-pane m-scrollable" id="m_quick_sidebar_tabs_alltracker" role="tabpanel" style="overflow-y: auto;height: auto;">

                    </div>


                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_chat" role="tabpanel" style="overflow-y: auto;height: auto;">

                    </div>
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_boardcast" role="tabpanel" style="overflow-y: auto;height: auto;">

                    </div>


                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_WeightTracker" role="tabpanel" style="overflow-y: auto;height: auto;">

                        
                    </div>
                    
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_Photo" role="tabpanel" style="overflow-y: auto;height: auto;">

                        
                    </div>

                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_healthScore" role="tabpanel" style="overflow-y: auto;height: auto;">

                        
                    </div>

                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_ShortVersion" role="tabpanel" style="overflow-y: auto;height: auto;">

                        
                    </div>
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_InchLossTracker" role="tabpanel" style="overflow-y: auto;height: auto;">

                        
                    </div>
                    
                    
                    
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_fooddiary" role="tabpanel" style="overflow-y: auto;height: auto;">


                    </div>


                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_Assessment" role="tabpanel" style="overflow-y: auto;height: 700px;">

                      
                    </div>

                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_ingredientchecklist" style="overflow-y: auto;height: auto;">

                      
                    </div>
                    
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_journey" style="overflow-y: auto;height: auto;">

                        
                    </div>

                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_Emails" role="tabpanel"  style="overflow-y: auto;height: auto;">

                     
                    </div>
                    
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_clientstaus" role="tabpanel"  style="overflow-y: auto;height: auto;">

                            
                    </div>
                    
                    
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_wallet" role="tabpanel" style="overflow-y: auto;height: auto;">
  

                    </div>
 
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_welcomecall" role="tabpanel"  style="overflow-y: auto;height: auto;">
  

                    </div>

                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_feedback" role="tabpanel"  style="overflow-y: auto;height: auto;">
  

                    </div>
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_break_tracker" role="tabpanel"  style="overflow-y: auto;height: auto;">
  

                    </div>
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_new_goal" role="tabpanel"  style="overflow-y: auto;height: auto;">
  

                    </div>
                    <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_tailend" role="tabpanel"  style="overflow-y: auto;height: auto;">
  

                    </div>

			
			
		
		</div>
	<!-- END: Aside Menu -->
</div>

</div>



<div id="fb-root"></div>


<script>
$(document).on("click", "#close_profile_btn", function(){
    $(document.body).addClass('m-brand--minimize m-aside-left--minimize');
});

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=647363762020616&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>

