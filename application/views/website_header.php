<!DOCTYPE html>

<html>
<head>
	<title><?php echo (!empty($order_details[0]['result'][0]['full_name']) ? $order_details[0]['result'][0]['full_name'].' - Balance Nutrition Backend' : 'Balance Nutrition Backend'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="<?php echo CDN_COMMON_URL; ?>vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo CDN_COMMON_URL; ?>vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo CDN_COMMON_URL; ?>demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo CDN_COMMON_URL; ?>owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo CDN_COMMON_URL; ?>owlcarousel/assets/owl.theme.default.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" type="text/css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo CDN_COMMON_URL; ?>select2/dist/css/select2.min.css">
    
  <?php /* 
         * @author : Vinayak Phutane
         * @date    : 2018-08-12 
         * added for sweet alert : start */ 
  ?>

  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>  
  
  <?php /* added for sweet alert : end */ ?>

  
   

                                
  <script>
    var base_url = '<?php echo base_url(); ?>';
    
  </script>   

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
	#loadingmessage{
    background-color: white; bottom: 0; left: 0; margin: 0 auto; opacity: 0.8; overflow: hidden; padding: 0; position: fixed; right: 0; top: 0; z-index: 999999; display: none; 0}
    .swal2-icon {
    width: 3em !important;
    height: 3em !important;
    margin: auto !important;
    }
    
    .swal2-icon.swal2-warning {
        line-height:157px !important;
    }
    
    .swal2-icon-text {
    font-size: 3em !important;
}
span.m-accordion__item-mode, .m-accordion__item-mode {
        background: #ffb822!important;
        color: #343a40 !important;
        padding: .25rem!important;
        border-radius: 12px;
    }
    
    
    
   .m-accordion__item-mode {
      background: #ffb822!important;
      color: #343a40!important;
      padding: .25rem!important;
    }

.m-table.m-table--head-bg-brand thead th {
    border-right-color: #fff !important;
    vertical-align: inherit;
    text-align: center;
    border-right: 1px solid;
}
.m-table.m-table--head-bg-brand thead th:last-child{
    border-right-color: #716aca !important;
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #000;
    border-radius: 4px;
    height: 40px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 20px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 19px;
    right: 7px;
    width: 20px;
    font-size: 16px;
}

.input-group .input-group-append>.input-group-text>i, .input-group .input-group-prepend>.input-group-text>i {
    color: #000;
}
.tailend_class{
    background-color:#f4516c73;
    padding: 5px;
}
.current_session_class{
     background-color:#91f3df;
    padding: 5px;
}
.prog_validity_class{
    background-color:#91f3df;
    padding: 5px;
}

.key_insight_dot {
   width: 10px !important;
   height: 10px !important;
   line-height: 10px !important;
   min-width: 10px !important;
   min-height: 10px !important;
   top: -6px;
   position: absolute;
   right: -2px;
}

.keyInsighBtn {
   position: relative;
}

.blink_me {
  animation: blinker 1s linear infinite;
}

.footer_sticky{
    display:none;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}

.summary_data table {
     width: 100% !important; 
}

.summary_data table, .summary_data td, .summary_data th {
    border: none !important;
}

.summary_data table td, .summary_data table th {
    border: none !important;
    padding: 2px !important;
}

.summary_data tr:nth-child(2n) {
    background-color: transparent !important;
}

@media (min-width:240px) and (max-width:567px){
    .m-topbar .m-topbar__nav.m-nav>.m-nav__item {
        padding: 0 10px;
        height: 60px;
    }
    
    .m-header--fixed-mobile .m-topbar {
        margin-top: 0;
        top: -180px;
    }
    
    .m-topbar {
        height: 180px!important;
    }
}

 .show-read-more .more-text{
        display: none;
    } 

</style>
</head>
<body>

	<!-- loader Div : Start -->
<div id="loadingmessage">
    <div style="margin-top:224px;margin-right: auto; opacity: 1; margin-left: auto; background-color: #FFFFFF; text-align: center;color: #000000;font-size: 20px; border-radius: 10px; padding: 5px; width: 30%;">
        <div style=" border-radius: 10px; padding-top: 5px;">
            <img src="<?php echo base_url('images/') ?>loadinggraphic.gif"/>
            <div style="margin-top: 10px;">
                Please wait ....
            </div>
        </div>
    </div>
</div>
  <!-- loader Div : End -->
  
  <?php


   $pending_sessions = $common_order_details[0]['result'][0]['program_session'] -  $common_total_diet;

$class_main = '';
$tailendSectionshuffle = "none";
$tailendSectionshuffle_2 = "block";
$status_text = "";

if($common_order_details[0]['result'][0]['program_session'] >= 2 && ($common_order_details[0]['result'][0]['order_type'] == 'Renewal' || $common_order_details[0]['result'][0]['order_type'] == 'OMR')){
    $class_main = 'current_session_class';
    $tailendSectionshuffle = "block";
    $tailendSectionshuffle_2 = "none";
    $status_text = "Status : <b>OMR</b>";
}

if($common_order_details[0]['result'][0]['program_duration_days'] == '30'){
    $prog_validity = $common_order_details[0]['result'][0]['program_duration_days'] + 15;
    if($common_order_details[0]['result'][0]['program_duration_days'] > $prog_validity ){
        $class_main = 'prog_validity_class';
        $tailendSectionshuffle = "block";
        $tailendSectionshuffle_2 = "none";
    }
}
else if($common_order_details[0]['result'][0]['program_duration_days'] == '60'){
    $prog_validity = $common_order_details[0]['result'][0]['program_duration_days'] + 20;
    if($common_order_details[0]['result'][0]['program_duration_days'] > $prog_validity ){
        $class_main = 'prog_validity_class';
        $tailendSectionshuffle = "block";
        $tailendSectionshuffle_2 = "none";
    }
}
else if($common_order_details[0]['result'][0]['program_duration_days'] == '90'){
    $prog_validity = $common_order_details[0]['result'][0]['program_duration_days'] + 25;
    if($common_order_details[0]['result'][0]['program_duration_days'] > $prog_validity ){
        $class_main = 'prog_validity_class';
        $tailendSectionshuffle = "block";
        $tailendSectionshuffle_2 = "none";
    }
}
else if($common_order_details[0]['result'][0]['program_duration_days'] == '120'){
    $prog_validity = $common_order_details[0]['result'][0]['program_duration_days'] + 30;
    if($common_order_details[0]['result'][0]['program_duration_days'] > $prog_validity ){
        $class_main = 'prog_validity_class';
        $tailendSectionshuffle = "block";
        $tailendSectionshuffle_2 = "none";
    }
}

if($pending_sessions < 3 && empty($advance_purchase)){
    $class_main = 'tailend_class';
    $tailendSectionshuffle = "block";
    $tailendSectionshuffle_2 = "none";
    $status_text = "Status : <b>TAILEND</b>";
}

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
    

$today = strtotime(date('Y-m-d'));
if($today >= strtotime($common_order_details[0]['result'][0]['extended_date'])){
    $days_remaining = 0;
}else{
    $days_remaining = round((strtotime($common_order_details[0]['result'][0]['extended_date']) - $today) / ( 60 * 60 * 24));
}

$days_till_now = round(($today - (strtotime($common_order_details[0]['result'][0]['start_date']))) / ( 60 * 60 * 24));

?>
    
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default m-brand--minimize m-aside-left--minimize"  >
<div class="m-grid m-grid--hor m-grid--root m-page">
    
<?php  $this->load->view('top-navigation.php');?>	

<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div class="m-grid__item m-grid__item--fluid m-wrapper mb-0">
<!-- BEGIN: Subheader -->
<div style="margin-bottom: 0px;">
	<div style="position: relative;">
 		<div class="mr-auto w-100">

           <?php 
           
           if(is_numeric($this->uri->segment(2)))
                {
                  $client_id=$this->uri->segment(2);
                }elseif(is_numeric($this->uri->segment(3))){
                  $client_id=$this->uri->segment(3);
                }elseif(is_numeric($this->uri->segment(4))){
                  $client_id=$this->uri->segment(4);
                }
 	
 	$premiuim = array('BODY TRANSFORMATION','ACTIVE','WEIGHT LOSS + PREMIUM','PCOS - PREMIUM','WEIGHT LOSS-PRO PREMIUM');
if(in_array($order_details[0]['result'][0]['program_name'], $premiuim)){
    $color = "alert alert-warning p-1";
}else{
    $color = "";
}
 	
 	switch($common_order_details[0]['result'][0]['user_status']){
    
    case "Active":
        $status_color = "green";
        break;
    case "Dormant":
        $status_color = "orange";
        break;
    case "Completed":
        $status_color = "#29b6f6";
        break;
    case "Onhold":
        $status_color = "yellow";
        break;
    case "Inactive":
        $status_color = "#fff";
        break;
    case "cleanseactive":
        $status_color = "green";
        break;
    default :
        $status_color = "#BF360C";
        
        
}
if(in_array($this->uri->segment(1), array('client-details','tabchats-view','weight-tracker-tab')) && is_numeric($this->uri->segment(2)) ||  in_array($this->uri->segment(2), array('allTrackerView','photoTrackerOpenInNewTab','edit-diet','open_inchloss_tracker_tab','edit-diet-new','recipes','blogs','add-photo-tracker','add-inchloss-tracker','add-weight-tracker')) ){
    ?>
    
    
<?php
  $pending_session = $common_order_details[0]['result'][0]['program_session'] -  $common_total_diet;
  if($pending_session == 0){
      $redirect_url = base_url('custom-mail/'.$client_id.'/ask_mygoal');
  }else{
      $redirect_url = base_url('custom-mail/'.$client_id.'/tailend_first_reminder');
  }
?>
    
      <h3 class="summary_data" style="margin-left:2em;padding-top: 5px;font-size: 15px;color: #000;line-height: 1.6;font-family: Roboto;">
    
        <span style="margin: 0;display: inline-block;width: 100%;">
            <div class="float-left">
                <b><span class=""><?php echo $common_client_details[0]['email_id']; ?></span></b>
            </div>
            <div class="float-right pr-4">
                <b><span class=""><?php if($common_active_order_id>0){?>
                                    <span style="color:#000;"><b style="font-size:15px;"><?php echo ucfirst(strtolower($common_order_details[0]['result'][0]['program_name'])).' ('.$common_order_details[0]['result'][0]['program_session'].'s)'; ?></b></span>
                                <?php } ?></span></b>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-3 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <?php if($country_available){ ?>
                        <tr>
                            <td>Location : <img src="https://www.countryflags.io/<?= strtolower(($country_code == 'UAE')? 'AE': $country_code)?>/flat/24.png" style="vertical-align: bottom;"> <b style="padding-right: 10px;"><?= $country_name ?></b></td>
                        </tr>
                        <?php } ?>
                       
                        <?php if(!empty($suggested_programs)){ ?>
                        <tr>
                            <td>
                                Prg. Sgstd: <b><?php echo str_replace('WEIGHT LOSS-PRO (client exclusive advanced)','WL Pro',str_replace('WEIGHT LOSS + (client exclusive advanced)','WL+',str_replace('BEAT PCOS (client exclusive advanced)','PCOS',str_replace('ReNeU (Client Exclusive)','ReNeU',str_replace('Plateau Breaker(Client Exclusive)','PB',str_replace('BODY TRANSFORMATION (client exclusive advanced)','BT',str_replace('Reform Intermittent Client Exclusive','IMF',$suggested_programs['suggested_program']))))))); ?></b>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <tr>
                            <td>
                                <span><?php echo $common_client_details[0]['full_name']; ?></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <?php //if($common_active_order_id>0){?>
                                <span>Pending (Days) Validity: <b><?php if($days_remaining < 40){ $colorTxt = "color: #f00;"; $fontWeightTxt = "font-weight : 600"; } else { $colorTxt = "color: #000;"; $fontWeightTxt = "font-weight : normal"; } echo "<span style=''>".$days_remaining."</span>"; ?></b></span>
                                <?php //} ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                Key Insights: <a class="btn btn-primary btn-sm py-0 px-1 text-white keyInsighBtn" data-toggle="modal" data-target="#keyInsightModal"><i class="fa fa-eye"></i> View <?php if($new_feedback){ ?><span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger key_insight_dot"></span> <?php } ?></a> <a class="btn btn-warning btn-sm py-0 px-3 text-dark keyInsighAddBtn" data-toggle="modal" data-target="#keyInsightModal">Add</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-3 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <?php if($country_available){ ?>
                        <tr>
                            <td>
                                Temp: <b><?= $celcius ?></b>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <?php if($common_active_order_id>0){?>
                                <span style="text-decoration:none">Current Program No.:<b>
                                    <?php 
                                   for($i=0;$i<$common_program_number;$i++){
                                   echo '<i class="fa fa-star-o"></i>';

                                     }
                                    ?>
                                        
                                    </b></span>
                                <?php } ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <span> Wallet:  <a href="<?php echo base_url('client-details/'.$client_id.'/client-wallet/'); ?>"><b><u><?php echo 'Rs. '.$common_client_details[0]['my_wallet']; ?></u></b></a></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <?php //if(empty($common_getHealthScoreFilled)) {?>
                                HS Filled: <span><b><?php echo !empty($common_getHealthScoreFilled)?'<a href="'.base_url('client-details/'.$client_id.'/health-score/').'" target="_blank" class="btn btn-primary btn-sm py-0 px-1 text-white"><i class="fa fa-eye"></i>View</a>':'<span style="color:red;font-weight: bold;" >No <a id="ask_healthscore_home" name="health_score" class="btn btn-warning btn-sm py-0" href=#>Ask</a></span>'; ?></b></span>
                                <?php //} ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                ICL (NO): <a class="btn btn-primary btn-sm py-0 px-1 text-white" data-toggle="modal" data-target="#checklist_popup"><i class="fa fa-eye"></i> View </a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-3 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <?php if($country_available){ ?>
                        <tr>
                            <td>
                                Time : <?php echo $current_country_date_time ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                Status : <b><span style="color:<?php echo $status_color; ?>"><?php echo $common_order_details[0]['result'][0]['user_status']; ?></span></b>
                                <? //$status_text ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <?php  

                                if(in_array($user_app[0]['app_version'],app_version1))
                                {
                                $ask_button = $user_app[0]['app_version'];
                                }else{
                                    $ask_button="<button type='button' value=".$client_id." class='btn btn-primary btn-sm py-0 px-1 text-white askupdate' style='font-size:12px'>Ask Update</button>";
                                }

                                if($user_app[0]['device'] == "iOS"){
                                    $phone_icon = "<i class='fa fa-apple text-black' style='font-size: 18px;'></i>";
                                }else{
                                    $phone_icon = "<i class='fa fa-android text-success' style='font-size: 18px;'></i>";
                                }
                                ?>
                                
                                App: <b><span><?php echo (!empty($user_app[0]))? $phone_icon." ".$user_app[0]['device']." ".$ask_button:"<span class='blink_me' style='color:red;font-weight: bold;'>Not Installed</span>" ?></span></b>
                            </td>
                        </tr>
                        
                       <!--  <tr>
                            <td>
                                <?php //if(empty($common_getMilestoneFilled)) {?>
                                MILESTONE: <span><b><?php //echo !empty($common_getMilestoneFilled)?'<a href='.base_url('client-details/'.$client_id.'/client-goal/').'><span style="color:green;font-weight: bold;" ><u>Yes</u></span></a>':'<span style="color:red;font-weight: bold;" >No <a id="ask_milestone_home" name="ask_milestone" class="btn btn-warning btn-sm py-0"  href="#"> Ask</a></span>'; ?></b></span>
                                <?php //} ?>
                            </td>
                        </tr> -->

                         <tr>
                            
                            <td>
                                <b>Milestone:</b>  
                                <?php if($getMilestoneFilled_data)
                                { 
                                 //echo $getMilestoneFilled_data[0]['comment'];
                                 echo "<div class='show-read-more' style=width:150px>".$getMilestoneFilled_data[0]['comment']."</div>";
                                }
                                else{
                                     //echo "NO";
                                    echo "<span><a id=ask_milestone_home name=ask_milestone class='btn btn-warning btn-sm py-0' href=#> Ask</a></span>";
                                     }
                                ?>
                               
                            </td>
                        </tr>
                    
                        <tr>
                             
                            <!--<td>-->
                            <!--    <span style="font-size: 16px"><b>Diet Sent:</b> <p style="width:218px;"><a class='view_diet' style="font-size: 16px;font-weight: normal;color: blue;text-decoration:underline;overflow: hidden;text-overflow: ellipsis;" href="#" data-actual="<?php echo $latest_diet_by_client[0]['actual_session']; ?>" data-session="<?php echo $latest_diet_by_client[0]['session']; ?>" data-orderId="<?php echo $latest_diet_by_client[0]['order_id']; ?>" data-dietStatus = "<?php echo $latest_diet_by_client[0]['diet_status']; ?>" data-expiry = "<?php echo $latest_diet_by_client[0]['extended_date']; ?>"  data-packageSessionId="<?php echo $latest_diet_by_client[0]['program_session_id']; ?>" data-userId="<?php echo $latest_diet_by_client[0]['user_id']; ?>" data-dietId="<?php echo $latest_diet_by_client[0]['diet_id']; ?>"><?php echo $latest_diet_by_client[0]['diet_name']; ?></a></p>  </span>-->
                            <!--</td>-->
                            <td>
                                <span style="font-size: 16px"><b>Diet Sent:</b> <a href="#" class='btn btn-warning btn-sm py-0' id="view_diet_sent">View</a>  </span>
                            </td>
                         
                        </tr>
                        
                  
                    </table>
                </div>
                <div class="col-3 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <tr>
                            <td>
                                <?php 
                                    if( in_array($this->uri->segment(1), array('client-details','tabchats-view','weight-tracker-tab'))  || in_array($this->uri->segment(2), array('allTrackerView','photoTrackerOpenInNewTab','open_inchloss_tracker_tab','edit-diet-new','recipes','blogs')))
                                    { ?>
                                    <select class="activetab m-dropdown__toggle btn btn-brand dropdown-toggle"  data-id="<?php echo $client_id; ?>" style="background-color: #1bc0ef;border-color: #117997;height: 30px;padding: 0;">
                                          <option value="select">Select</option>
                                          <option value="tabtailend" style="display:<?php echo $tailendSectionshuffle; ?>">Tailend Details</option>
                                          <option value="tabwallet">Wallet & Referral</option>
                                          <option id="2" value="tabprofile">Profile</option>
                                          <option value="taballtracker">All Tracker</option>
                                          <option value="tabAssessment">Assessment</option>
                                          <option value="tabBreakTracker">Break Tracker</option>
                                          <option value="tabchat">Chat</option>
                                          <option value="tabclientstaus">Change Client Status</option>
                                          <!--<option value="tabEmails">Custom Emails</option>  -->
                                          <option value="tabfeedback">Feedback</option>
                                          <!--<option value="tabfooddiary">Food Diary</option>-->
                                          <option value="tabHealthScore">Health Score</option>
                                          <option value="tabInchLossTracker">Inch Loss Tracker</option>
                                          <option value="tabingredientchecklist">Ingredient Availability</option>
                                          <!--<option value="tabkeyinsights">Key Insights</option>-->
                                          <!--<option value="tabjourney">Journey</option>-->
                                          <option value="tabNewGoal">New Goal Set</option>
                                          <option value="tabPhoto">Photo</option>
                                          <option value="tabShortVersion">Short Version Programs</option>
                                          <option value="tabWeightTracker">Weight Tracker</option>
                                          <option value="tabwelcomecall">Welcome Call</option>
                                          <!--<option value="tabtailend" style="display:<?php echo $tailendSectionshuffle_2; ?>">Tailend Details</option>-->
                                    </select>
                                   <?php } ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td>
                                <?php if($common_active_order_id>0){?>
                                    <span>Pending Session: <b><?php echo $common_order_details[0]['result'][0]['program_session'] -  $common_total_diet; ?>/<?=$common_order_details[0]['result'][0]['program_session']?></b></span>
                                <?php } ?>
                            </td>
                        </tr>
                        
                       <tr>
                            <!-- <td>
                                <?php //if(empty($common_getGoalFilled)) {?>
                                GOAL NEW TE: <span><b><?php //echo !empty($common_getGoalFilled)?'<span style="color:green;font-weight: bold;" >Yes</span>':'<span style="color:red;font-weight: bold;" >No <a id="ask_mygoal_home" name="ask_mygoal" class="btn btn-warning btn-sm py-0"  href=#>Ask</a></span>'; ?></b></span>
                                <?php //} ?>
                            </td> -->

                            <td>
                                <b>Goal New Te:</b>  
                                <?php if($common_getGoalFilled_data)
                                { 
                                 
                                  echo "<div class='show-read-more' style=width:150px>".$common_getGoalFilled_data[0]['comment']."</div>";
                                }
                                else{
                                     //echo "NO";
                                    echo "<span><a id=ask_mygoal_home name=ask_mygoal class='btn btn-warning btn-sm py-0' href=#>Ask</a></span>";
                                     }
                                ?>
                               
                            </td>
                            
                        </tr>
                        
                        <tr>
                            <td>
                                <b>Achieved Goals:</b>  
                                <?php if($getachivedgoal_data)
                                { 
                                 //echo $getachivedgoal_data[0]['comment'];
                                echo "<div class='show-read-more' style=width:150px>".$getachivedgoal_data[0]['comment']."</div>";
                                }
                                else{
                                     echo "NO";
                                     }
                                ?>
                               
                            </td>
                        </tr>
                        <tr>
                             <td>
                                <b>Goal Assessment:</b>  
                                <?php if($getassessment_goals)
                                { 
                                    echo "<div class='show-read-more' style=width:150px>".$getassessment_goals[0]['other_goal']."</div>";
                                }
                                else{
                                     echo "NO";
                                     }     
                                ?>
                               
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <hr class="my-2">
            <div class="row">
                <div class="col-3 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <tr>
                            <td>
                                Start Weight: <b><?php $start=$common_weight_tracker[0]['result'][0]['start_weight']; echo ($start!=0) ? $start : 0 ; ?> kg<b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                WT Lost Last: <b><span style="color:<?php $color = ($second_last_weight['result'][0]['diffrence']>0) ? 'red' : 'green' ; echo ($second_last_weight['result'][0]['diffrence']==0) ? 'black' : $color ;  ?>"><?php echo ($second_last_weight['result'][0]['diffrence']<0) ? round($second_last_weight['result'][0]['diffrence'],2) : 0 ;?> kg</span><b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Allergies: <b><?php echo !empty($assessment[0]['result'][0]['food_allergy']) ? $assessment[0]['result'][0]['food_allergy'] : '<span style="color:red;font-weight: bold;" >No </span>'; ?><b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-3 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <tr>
                            <td>
                                Current Weight: <b><?php $end=$common_weight_tracker[0]['result'][0]['current_weight']; echo ($end!=0) ? $end : 0 ;  ?> kg<b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-size: 15px">Food Aversions: <b><?php echo !empty($common_tabprofile[1]['result'][0]['food_aversion'])? $common_tabprofile[1]['result'][0]['food_aversion']:'NA';  ?><b></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <b>Food Habits:</b> <?php if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Vegetarian' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Veg'){ ?> <img src="<?php echo base_url('assets/image/') ?>veg.png" style="width: 20px; height: auto;"> <?php echo ucfirst($common_tabprofile[1]['result'][0]['eating_habit']); } else if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Non Vegetarian' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Non Veg'){ ?><img src="<?php echo base_url('assets/image/') ?>non-veg.png" style="width: 20px; height: auto;"> <?php  } else if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Ovo-Vegetarian (Vegetaria' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Ovo-Vegetarian (Vegetarian Eating Eggs)' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Ovo Veg'){ ?> <img src="<?php echo base_url('assets/image/') ?>ovo-veg.png" style="width: 20px; height: auto;"> <?php }else if(ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Vegan (No Non-Veg, No Dai' || ucfirst($common_tabprofile[1]['result'][0]['eating_habit']) == 'Vegan'){ ?> <img src="<?php echo base_url('assets/image/') ?>vegon.png" style="width: 20px; height: auto;"> <?php } //please set condition and set image name vegon.png / ovo-veg.png / lacto.png / non-veg.png ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-6 <?php echo (!empty($class_main))?$class_main:""; ?>">
                    <table>
                        <?php
                        $start=$common_weight_tracker[0]['result'][0]['start_weight']; 
                        $start_weight = ($start!=0) ? $start : 0 ;
                        $end=$common_weight_tracker[0]['result'][0]['current_weight']; 
                        $end_weight = ($end!=0) ? $end : 0 ; 
                        if($start_weight == 0 || $end_weight == 0){
                            $total_weight_loss = 0;
                        }else{
                            $total_weight_loss = abs($start_weight - $end_weight);
                        }
                        
                        ?>
                        <tr>
                            <td>
                                Total Wt Loss: <b><?php echo $total_weight_loss ?> kg<b>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                IMF Cycle: <b><?php echo !empty($assessment[0]['result'][0]['fasting_window'])? $assessment[0]['result'][0]['fasting_window']:'No';  ?><b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                             $med_issues = [];
                             if($common_tabprofile[1]['result'][0]['heart_problem'] == 'yes'){
                                 $med_issues[]="Heart Problem";
                             }
                            if($common_tabprofile[1]['result'][0]['orthopedic_aliment'] == 'yes'){
                                 $med_issues[]="Orthopedic Ailment";
                             }
                             if($common_tabprofile[1]['result'][0]['hypothyroid'] == 'yes'){
                                 $med_issues[]= "Hypothyroid";
                             }
                             if($common_tabprofile[1]['result'][0]['hyperthyroid'] == 'yes'){
                                 $med_issues[]="Hyperthyroid";
                             }
                             if($common_tabprofile[1]['result'][0]['high_bp'] == 'yes'){
                                 $med_issues[]="High BP";
                             }
                             if($common_tabprofile[1]['result'][0]['low_bp'] == 'yes'){
                                 $med_issues[]="Low BP";
                             }
                             if($common_tabprofile[1]['result'][0]['high_prolactive'] == 'yes'){
                                 $med_issues[]="High Prolactive";
                             }
                             if($common_tabprofile[1]['result'][0]['any_surgery'] == 'yes'){
                                 $med_issues[]="Undergone Surgery";
                             }
                             if($common_tabprofile[1]['result'][0]['stroke'] == 'yes'){
                                 $med_issues[]="Stroke";
                             }
                             if($common_tabprofile[1]['result'][0]['kidney_disorder'] == 'yes'){
                                 $med_issues[]="Kidney Disorder";
                             }
                             if($common_tabprofile[1]['result'][0]['faulty_liver'] == 'yes'){
                                 $med_issues[]="Faulty Liver";
                             }
                             if($common_tabprofile[1]['result'][0]['infertility'] == 'yes'){
                                 $med_issues[]="Infertility";
                             }
                             if($common_tabprofile[1]['result'][0]['chronic_fatigue'] == 'yes'){
                                 $med_issues[]="Chronic Fatigue";
                             }
                             if($common_tabprofile[1]['result'][0]['pcod'] == 'yes'){
                                 $med_issues[]="PCOD";
                             }
                             if($common_tabprofile[1]['result'][0]['diabetes_type'] ){
                                 $med_issues[]=$common_tabprofile[1]['result'][0]['diabetes_type'];
                             }
                             if($common_tabprofile[1]['result'][0]['constipation_type'] ){
                                 $med_issues[]=$common_tabprofile[1]['result'][0]['constipation_type'];
                             }
                             if($common_tabprofile[1]['result'][0]['acidity_type'] ){
                                 $med_issues[]=$common_tabprofile[1]['result'][0]['acidity_type'];
                             }
                             if($common_tabprofile[1]['result'][0]['other_specification'] ){
                                $med_issues[]=$common_tabprofile[1]['result'][0]['other_specification']; 
                             }
                             if($common_tabprofile[1]['result'][0]['hypertension'] ){
                                $med_issues[]="Hypertension"; 
                             }
                             
                             ?>
                             Medical Issues: <b><?php echo !empty($common_tabprofile[1]['result'][0]['medical_issue'])?implode(", ",$med_issues):'<span style="color:red;font-weight: bold;" >No </span>'; ?><b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </span>
        
        
        </h3>
  
          <?php } ?>
            </div>
                
    </div>
  </div>
  <!-- END: Subheader -->
  <div class="m-content" style="padding: 0 10px;">

<script type="text/javascript">
  $(document).ready(function(){
    var maxLength = 10;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();

        if($.trim(myStr).length > maxLength){

               
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">more...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});

</script>