<!-- BEGIN: Header -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
<style type="text/css">
   .ui-menu {
   list-style: none;

   padding-top: 0px;
   margin-top: 100px;
   height: 300px;
   width: 370px;
   overflow: auto;
   z-index: 999;
   /*float: left;*/
   padding-left: 0px !important;
   display: block;
   outline: 0;
}
#topbar_notifications_notifications
{
    display:block;
}

.m-topbar .m-topbar__nav.m-nav>.m-nav__item>.m-nav__link .m-nav__link-icon>i:before {
    background: -webkit-linear-gradient(180deg, #31bdcc 25%, #31bdcc 50%, #31bdcc 75%, #31bdcc 100%);
    background: linear-gradient(180deg, #33d1e2 25%, #65bac3 50%, #4eb6c1 75%, #1cbdce 100%);
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent
}

.m-topbar .m-topbar__nav.m-nav>.m-nav__item>.m-nav__link .m-nav__link-icon{
    color: #31bdcc;
}

.m-topbar .m-topbar__nav.m-nav>.m-nav__item.m-topbar__user-profile.m-topbar__user-profile--img.m-dropdown--arrow .m-dropdown__arrow{
    color: #ffffff;
}


.m-topbar .m-topbar__nav.m-nav>.m-nav__item>.m-nav__link .m-nav__link-badge {
    right: -21px !important;
    left: unset !important;
    margin-left: 0 !important;
    position: absolute;
    top: 1px !important;
}
.m-badge.m-badge--danger {
    background-color: #f4516c;
    color: #fff;
    font-weight:bold;
}
.m-badge.m-badge--dot-small {
 padding: 0px;
    line-height: 15px;
    min-height: 15px;
    min-width: 15px;
    height: 15px;
    width: 15px;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    -ms-border-radius: 100%;
    -o-border-radius: 100%;
    border-radius: 100%;
}

.m-topbar .m-topbar__nav.m-nav>.m-nav__item {
    padding: 0 10px;
}
</style>
<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
   <div class="m-container m-container--fluid m-container--full-height">
      <div class="m-stack m-stack--ver m-stack--desktop">
         <div class="custom-button" style="display: inline-block;width: 10%;height: auto;margin-top: 19px;font-size: large;"><a href="#" style="
            padding: 20px  10px;" id="showbtn " onclick="return theFunction();
            "><i class="fa fa-th" style="
            color: #31bdcc;
            font-size: 23px;
            "></i></a>
            
            <a href="<?php echo base_url(); ?>" title="Back To Dashboard" style="padding: 20px  10px;">
                 <i class="fa fa-home" style="color: #31bdcc;font-size: 23px;"></i>
            </a>
            
            </div>
         <!-- BEGIN: Brand -->
         <div class="m-stack__item m-brand  m-brand--skin-dark " style="background:#fff;">
            <div class="m-stack m-stack--ver m-stack--general">
               <div class="m-stack__item m-stack__item--middle m-brand__tools">
                  <!-- BEGIN: Left Aside Minimize Toggle -->
                  
                 <?php $match=$this->uri->segment(1);?>
                <?php if($match!=mentor){ ?>
                    <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
                     ">
                  <span></span>
                  </a> 
                <?php } ?>
                  
                  <!-- END -->
                  <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                  <?php if($match!=mentor){ ?>
                  <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                  <span></span>
                  </a>
                  <?php } ?>
                  <!-- END -->
                  <a href="javascript:;" id="" class="m--visible-tablet-and-mobile-inline-block" style="margin-left: 20px;" id="showbtn " onclick="return theFunction();">
                  <i class="fa fa-th" style="color: #e16e9d;font-size: 23px;/* margin-top: 2px; *//* margin-left: 0px; */"></i>
                  </a>
                  <!-- BEGIN: Topbar Toggler -->
                  <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                  <i class="flaticon-more"></i>
                  </a>
                  <!-- BEGIN: Topbar Toggler -->
               </div>
            </div>
         </div>
         <!-- END: Brand -->	
         <!-- BEGIN: Topbar -->
         <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
            <div class="m-stack__item m-topbar__nav-wrapper">
               <ul class="m-topbar__nav m-nav m-nav--inline">
                   <?php /* <li class="
                     m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light">
                     <a href="<?php echo base_url('dashboard/mentor/client_query'); ?>" target="_blank" class="m-nav__link m-dropdown__toggle">
                        <span class="m-nav__link-icon"><i class="fa fa-question-circle fa-3" style="font-size: 36px;"></i></span>
                     </a>
                    </li>
                   <li class="
                     m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light">
                     <a href="javascript:void(0)" onclick="window.open('<?php echo base_url('faq'); ?>', '_blank')" class="m-nav__link m-dropdown__toggle">
                        <span class="m-nav__link-icon"><img src="https://www.balancenutrition.in/images/my-account/query_icon.png?cache=4" width="30" alt="FAQs" title="FAQs" class="img-fluid"></span>
                     </a>
                    </li> */ ?>
                  <li class="
                     m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" 
                     data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">
                     <a href="#" class="m-nav__link m-dropdown__toggle">
                     <span class="m-nav__link-icon"><i class="flaticon-search-1"></i></span>
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                        <div class="m-dropdown__inner ">
                           <div class="m-dropdown__header" style="padding-left: 5px; padding-bottom: 5px;">
                               
                               
                <script type="text/javascript">

$(function() {

   var base_url="<?php echo base_url(); ?>";
   
//m_quicksearch_input
            $( ".search-place" ).autocomplete({
               
                 minLength:3,   
               delay:500,   
            source: function (request, response) {

        var availableTags=[];
        var controllerName ="<?php echo $this->session->balance_session['user_type']; ?>";

       var path = 'dashboard/'+controllerName+'/global_search';
            $.ajax({
                        type: 'POST',
                        url: base_url+'search',
                        data: { term: request.term },
                        dataType: "json",
                         success: response,
                        error: function () {
                      response([]);
                          }
                  });    
    },
    
   select: function( event, ui )
   { 
      value = ui.item.id.replace(/\s/g, "-");
      var url = base_url+'client-details/'+value;
      window.open(url,'_blank');
   }
              
            });
         });
</script>               
                               
                              <form  class="m-list-search__form">
                                 <div class="m-list-search__form-wrapper">
                                    <span class="m-list-search__form-input-wrapper">
                                    <input autocomplete="off" type="text" name="q" class="m-list-search__form-input search-place" value="" placeholder="Search Client Details (Email, Name)">
                                    </span>
                                    <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
                                    <i class="la la-remove"></i>
                                    </span>
                                 </div>
                              </form>
                           </div>
                           <!--<div class="m-dropdown__body">-->
                           <!--   <div class="m-dropdown__scrollable m-scrollable" data-max-height="300" data-mobile-max-height="200">-->
                                 <!--<div class="m-dropdown__content">-->
                                 <!--</div>-->
                           <!--   </div>-->
                           <!--</div>-->
                        </div>
                     </div>
                  </li>
                  <?php if($this->session->balance_session['admin_id'] != '196'){ ?>
                <li id="pageVisit" data-id="pageVisit" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 35px;">
                     <a href="javascript:void(0)" onclick="window.open('<?php echo base_url('dashboard/mentor/get_programepagevisited_client_list'); ?>', '_blank')" class="m-nav__link m-dropdown__toggle pv_animate">
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_program_page_count"></span>
                     <span class="m-nav__link-icon d-flex flex-row" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/pv2.png" style="width: 20px; height: 25px;"><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 10px; padding-top: 10px;">PV</span></span>
                     </a>
                     <!-- <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                            <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    		    <tbody>
                    		        <tr class="text-center">
                    		            <td colspan="5">Page Visits</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td colspan="2">Program</td>
                    		            <td colspan="3">Checkout</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>Today</td>
                    		            <td>MTD</td>
                    		            <td>Today</td>
                    		            <td>MTD</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup today_program_page" data-toggle="modal" data-target="#m_modal_1" id="today_program_page"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup mtd_program_page" data-toggle="modal" data-target="#m_modal_1" id="mtd_program_page"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup today_checkout_page" data-toggle="modal" data-target="#m_modal_1" id="today_checkout_page"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup mtd_checkout_page" data-toggle="modal" data-target="#m_modal_1" id="mtd_checkout_page"> </span>
                    		            </td>
                    		            
                    		               <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup all_health_score" data-toggle="modal" data-target="#m_modal_1" id="all_health_score"> </span>
                    		            
                    		        </tr>
                		        </tbody>
                	        </table>
                         </div>
                     </div> -->
                  </li> 
                  <?php } ?>

                   <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light" style="padding-right: 35px;">
                     <a href="javascript:void(0)" onclick="window.open('<?php echo base_url('dashboard/mentor/get_checkoutpage_visited_client_list'); ?>', '_blank')" class="m-nav__link m-dropdown__toggle">
                        <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_program_page_count"></span>
                        <span class="m-nav__link-icon d-flex flex-row" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/cv3.png" style="width: 20px; height: 20px;"><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 10px; padding-top: 10px;">CV</span></span>
                     </a>
                    </li>
                  
                    <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light" style="padding-right: 15px;">
                     <a href="javascript:void(0)" onclick="window.open('<?php echo base_url('dashboard/mentor/list_view/order-history'); ?>', '_blank')" class="m-nav__link m-dropdown__toggle">
<span class="m-nav__link-icon d-flex flex-row" style="padding-top: 1px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/OH.png" style="width: 20px; height: 18px;"><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 8px; padding-top: 10px;">OH</span></span>
                     </a>
                    </li>
                  <?php /* <li class="
                     m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" 
                     data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">
                     <a href="#" class="m-nav__link m-dropdown__toggle">
                     <span class="m-nav__link-icon"><i class="fa fa-google"></i></span>
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                        <div class="m-dropdown__inner ">
                           <div class="m-dropdown__header" style="padding-left: 5px; padding-bottom: 5px;">
                               
<script>
    $(document).ready(function()
    {
    $("#google_search").keypress(function(e)
    {
    var val = $('#google_search').val();
    var url ="https://www.google.co.in/search?q="+val;
    if(e.which == 13)
    {
    window.open(url,'_blank');
    }
    });
    });
</script>
                              <form  class="m-list-search__form">
                                 <div class="m-list-search__form-wrapper">
                                    <span class="m-list-search__form-input-wrapper">
                                        <!-- m_quicksearch_input -->
                                    <input id="google_search" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Google Search...">
                                    </span>
                                    <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
                                    <i class="la la-remove"></i>
                                    </span>
                                 </div>
                              </form>
                           </div>
                           <div class="m-dropdown__body">
                              <div class="m-dropdown__scrollable m-scrollable" data-max-height="300" data-mobile-max-height="200">
                                 <div class="m-dropdown__content">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li> */ ?> 
                  <?php

                   if($this->session->balance_session['user_type']=='qpc' || $this->session->balance_session['user_type']=='qpc_manager') {
               }
               else
               {
                     ?>
                <li id="bday_notification" data-id="bday_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 5px; padding-bottom: 5px;">
                     <a href="#" class="m-nav__link m-dropdown__toggle bday_animate">
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_bday_count mr-4 mb-3"></span>
                     <span class="m-nav__link-icon pt-2"><span class="birthday_css"><i class="fa fa-birthday-cake " aria-hidden="true" style="font-size: 14px;"></i></span></i></span>
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                            <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    		    <tbody>
                    		        <tr class="text-center">
                    		            <td colspan="5">Today's Birthdays</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>Active</td>
                    		            <td>OMR</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info   active_bday_notification active_bday" data-toggle="modal" data-target="#m_modal_1" id="active_bday_notification"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info   omr_bday_notification omr_bday" data-toggle="modal" data-target="#m_modal_1" id="omr_bday_notification"> </span>
                    		            </td>
                    		        </tr>
                		        </tbody>
                	        </table>
                         </div>
                     </div>
                  </li> 
                <li id="queries_notification" data-id="queries_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 9px;">
                     <a href="#" class="m-nav__link m-dropdown__toggle query_animate queries_show" >
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_query_count  mr-4"></span>
                     <span class="m-nav__link-icon d-flex flex-row pl-2" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/my-account/query_icon.png" style="width: 20px; height: 18px;"></span>
                     </a> 
                </li>
                     
                <!--<li id="reminder_notification" data-id="reminder_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">-->
                <!--     <a href="#" class="m-nav__link m-dropdown__toggle reminder_animate" data-toggle="modal" data-target="#mentorreminderModal">-->
                <!--     <span class="m-nav__link-icon"><i class="la la-clock-o"><span style="font-family: Poppins;font-style:italic;font-size: 24px;line-height: 0;">Rems</span></i></span>-->
                <!--     </a> -->
                <!--  </li>-->
                <li id="reminder_notification" data-id="reminder_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center   m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding:0px;">
                         <a href="#" class="m-nav__link m-dropdown__toggle call_animate">
                         <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_reminder_count"></span>
                         <span class="m-nav__link-icon"><i class="fa fa-calendar-alt" style="font-size: 16px;"><span style="padding-left:3px;  text-align: center; font-size: 21px;"></span></i></span>
                         </a>
                         <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                            <div class="m-dropdown__inner">
                                <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                                <tbody>
                                    <tr class="text-right">
                                        <td colspan="3">
                                            <a  data-toggle="modal" data-target="#mentorreminderModal" class="btn btn-warning btn-sm py-0" href=#>Add New Reminder</a>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        
                                        <td>Today<br> </td>
                                        <td>Tomorrow<br></td>
                                        <td>Future</td>
                                    </tr>
                                     <tr class="text-center">
                                        
                                        <td>
                                            <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup today_reminders_notification today_reminders" data-toggle="modal" data-target="#m_modal_1" id="today_reminders"></span>
                                        </td>
                                        <td>
                                            <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup tomorrow_reminders_notification tomorrow_reminders" data-toggle="modal" data-target="#m_modal_1" id="tomorrow_reminders"></span>
                                        </td>
                                        <td>
                                            <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup future_reminders_notification future_reminders" data-toggle="modal" data-target="#m_modal_1" id="future_reminders"></span>
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                             </div>
                         </div>
                      </li>
                  
                  
                <li id="call_notification" data-id="call_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center   m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 8px;" >
                     <a href="#" class="m-nav__link m-dropdown__toggle call_animate">
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_call_count  mr-4 mb-3"></span>
<span class="m-nav__link-icon d-flex flex-row pl-2" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/call%20schedule.png" style="width: 20px; height: 20px;"><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 10px; padding-top: 10px;"></span></span>                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                            <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                            <tbody>
                                <tr class="text-center">
                                    <td colspan="5">Today's Calls</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Welcome Call</td>
                                    <td>Progress Call<br> <b>(Halftime)</b></td>
                                    <td>Feedback Call<br> <b>(Final Feedback)</b></td>
                                    <td>Unanswered Calls</td>
                                </tr>
                                 <tr class="text-center">
                                    <td>
                                        <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup welcome_call_notification todays_welcome_call" data-toggle="modal" data-target="#m_modal_1" id="todays_welcome_call"> </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup progress_call_notification todays_progress_call" data-toggle="modal" data-target="#m_modal_1" id="todays_progress_call"> </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup feedback_call_notification todays_feedback_call" data-toggle="modal" data-target="#m_modal_1" id="todays_feedback_call"> </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup unanswered_call_notification unanswered_call" data-toggle="modal" data-target="#m_modal_1" id="unanswered_call"> </span>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                         </div>
                     </div>
                  </li>
                    <li id="omr_notification" data-id="omr_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right:50px;">
                     <a href="#" class="m-nav__link m-dropdown__toggle omr_animate">
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_omr_count"></span>
<span class="m-nav__link-icon d-flex flex-row" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/omr.png" style="width: 20px; height: 20px;"><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 10px; padding-top: 10px;">OMR</span></span>
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                            <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    		    <tbody>
                    		        <tr class="text-center">
                    		            <td colspan="5">OMR Notification - Tried accessing account</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>Today</td>
                    		            <td>Last 30 Days</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup today_omr_notification" data-toggle="modal" data-target="#m_modal_1" id="today_omr_notification"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup last_thirty_days_omr_notification" data-toggle="modal" data-target="#m_modal_1" id="last_thirty_days_omr_notification"> </span>
                    		            </td>
                    		        </tr>
                		        </tbody>
                	        </table>
                         </div>
                     </div>
                  </li>
                  <li id="hs_notification" data-id="hs_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 35px;">
                     <a href="#" class="m-nav__link m-dropdown__toggle hs_animate">

                           <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none today_hs_count  mr-1 "></span>
                           <span class="m-nav__link-icon d-flex flex-row" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/health%20score.png" style="width: 20px; height: 19px;"><span style="padding-left:0px;  text-align: center; font-size: 19px; padding-right:8px; padding-top: 10px;">HS</span></span>                     
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                            <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    		    <tbody>
                    		        <tr class="text-center">
                    		            <td colspan="5">Health Score Taken</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td colspan="2">Active</td>
                    		            <td colspan="3">OMR</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>Today</td>
                    		            <td>MTD</td>
                    		            <td>Today</td>
                    		            <td>MTD</td>
                    		            <td>Last 30 Days</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup today_health_score_active" data-toggle="modal" data-target="#m_modal_1" id="today_health_score_active"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup mtd_health_score_active" data-toggle="modal" data-target="#m_modal_1" id="mtd_health_score_active"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup today_health_score_omr" data-toggle="modal" data-target="#m_modal_1" id="today_health_score_omr"> </span>
                    		            </td>
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup mtd_health_score_omr" data-toggle="modal" data-target="#m_modal_1" id="mtd_health_score_omr"> </span>
                    		            </td>
                    		            <!--<td>-->
                    		            <!--    <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup all_health_score" data-toggle="modal" data-target="#m_modal_1" id="all_health_score"> </span>-->
                    		            <!--</td>-->
                    		            <td>
                    		                <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  popup last_thirty_days_health_score" data-toggle="modal" data-target="#m_modal_1" id="last_thirty_days_health_score"> </span>
                    		            </td>
                    		        </tr>
                		        </tbody>
                	        </table>
                         </div>
                     </div>
                  </li>



               <!-- Hide by sanjay on 25/09/2021 --->   
               <!--  <li id="milestone_notification" data-id="milestone_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
                     <a href="#" class="m-nav__link m-dropdown__toggle milestone_animate">
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger today_milestone_count d-none"> </span>
                     <span class="m-nav__link-icon"><i class="flaticon-speech-bubble">M</i></span>
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                           <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                    		    <tbody>
                    		        <tr class="text-center">
                    		            <td colspan="3" class="text-center">Milestone Filled</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td class="text-center">Today</td>
                    		            <td class="text-center">MTD</td>
                    		            <td class="text-center">All Time</td>
                    		        </tr>
                    		        <tr class="text-center">
                    		            <td class="text-center">
                    		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer" class="cursor m--font-info  popup today_milestone" data-toggle="modal" data-target="#m_modal_1" id="today_milestone"> </span>
                    		            </td>
                    		            <td class="text-center">
                    		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer" class="cursor m--font-info  popup mtd_milestone" data-toggle="modal" data-target="#m_modal_1" id="mtd_milestone"> </span>
                    		            </td>
                    		            <td class="text-center">
                    		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer" class="cursor m--font-info  popup all_milestone" data-toggle="modal" data-target="#m_modal_1" id="all_milestone"> </span>
                    		            </td>
                    		        </tr>
                		        </tbody>
                	        </table>
                        </div>
                     </div>
                  </li> -->
                <!-- End Hide by sanjay on 25/09/2021 --->       
                <li id="goal_notification" data-id="goal_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 20px;">
                     
                     <a href="javascript:void(0)" onclick="window.open('<?php echo base_url('dashboard/mentor/goalsfilledlist'); ?>', '_blank')" class="m-nav__link m-dropdown__toggle goal_animate">
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger today_goal_count d-none mr-2"> </span>
                     <span class="m-nav__link-icon d-flex flex-row pl-1" style="padding-top: 3px;"><img src="https://www.balancenutrition.in/images/mentor_dashboard_icons/Goal%20(1).png" style="width: 20px; height: 20px;"><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 10px; padding-top: 10px;">G </span></span>
                     </a>


                     <!-- <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                                           <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
    		    <tbody>
    		        <tr class="text-center">
    		            <td colspan="3" class="text-center">Goals Filled</td>
    		        </tr>
    		        <tr class="text-center">
    		            <td class="text-center">Today</td>
    		            <td class="text-center">MTD</td>
    		            <td class="text-center">All Time</td>
    		        </tr>
    		        <tr class="text-center">
    		            <td class="text-center">
    		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer" class="cursor m--font-info  popup today_tailend_goal" data-toggle="modal" data-target="#m_modal_1" id="today_tailend_goal"> </span>
    		            </td>
    		            <td class="text-center">
    		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer" class="cursor m--font-info  popup mtd_tailend_goal" data-toggle="modal" data-target="#m_modal_1" id="mtd_tailend_goal"> </span>
    		            </td>
    		            <td class="text-center">
    		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer" class="cursor m--font-info  popup all_tailend_goal" data-toggle="modal" data-target="#m_modal_1" id="all_tailend_goal"> </span>
    		            </td>
    		        </tr>
		        </tbody>
	        </table>
                        </div>
                     </div> -->
                  
                  </li>

          <li id="goal_notification" data-id="goal_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center   m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" style="padding-right: 20px;">
                     
                     <a href="javascript:void(0)" onclick="window.open('<?php echo base_url('dashboard/mentor/referralfilledList'); ?>', '_blank')" class="m-nav__link m-dropdown__toggle query_animate queries_show">
                     
                     <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger today_goal_count d-none mr-2"> </span>

                     <span class="m-nav__link-icon d-flex flex-row pl-1" style="padding-top: 3px;">
                      <span class="fa fa-user-plus" style="height:20px;width:20px;"></span><span style="padding-left:3px;  text-align: center; font-size: 19px; padding-right: 10px; padding-top: 10px;">R </span></span>
                     </a>
                     
            </li>  
<!-- Add bys Sanjay 23-10-2021 -->
<?php //if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){ ?>

          <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center    m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true" >
                     <a href="#" class="m-nav__link m-dropdown__toggle hs_animate">

                           <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger d-none  mr-1 "></span>
                           <span class="m-nav__link-icon d-flex flex-row common_notification" style="padding-top: 3px;" data-id="balancedue_overdue_notification">
                              <i class="fas fa-wallet" style="width: 20px; height:19px;"></i>
                             <span style="padding-left:6px;  text-align: center; font-size: 19px; padding-right:8px; padding-top: 10px;"></span>
                           </span>                     
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                        <div class="m-dropdown__inner">
                            <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                            <tbody>
                                
                                <tr class="text-center">
                                    <td>Balance Due</td>
                                    <td>Balance OverDue</td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  balance_due_new" data-toggle="modal" data-target="#m_modal_1" id="balance_due_new"> </span>
                                    </td>
                                    <td>
                                        <span style="font-size: 1.75rem;font-weight: 600;" class="cursor m--font-info  balance_overdue_new" data-toggle="modal" data-target="#m_modal_1" id="balance_overdue_new"> </span>
                                    </td>
                                </tr>
                             </tbody>
                          </table>
                         </div>
                     </div>
                  </li>                   
        <?php 
         $mentor_id = $this->session->balance_session['admin_id']; 
         $user_email = $this->session->balance_session['email_id']; 
         $pass = urlencode($this->session->balance_session['password']); 
         $pupup= 'add_lead';
        if($this->session->balance_session['new_crm'] == 1){
            // print_r($this->session->userdata());
        ?>  
        <li id="" data-id="" class=" m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center   m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
                 <a href="#" class="m-nav__link m-dropdown__toggle bday_animate" style="margin-top: 5px;">
                 <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger omr_lead_count_today mr-3">0</span>
                <span class="m-nav__link-icon"><button class="btn top_nav_btn" style="padding: 3px 1rem !important;background: #EDEDED;border-color: #EDEDED;box-shadow: 0px 1px 3px #00000029 !important;border-radius: 5px !important;color: #4B4B4B !important;">Lead<i class="fas fa-caret-down" style="margin-left:5px"></i></button></span>
                 </a> 
                 <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                    <div class="m-dropdown__inner" style="padding: 26px;">
                        <p><a href="#" class="m-menu__link text-primary open_lead_popup text-decoration-none" data-toggle="modal" data-target="#open_lead_popup" onclick="get_country()"><span class="left text-primary">Add Lead</span><i class="fas fa-chevron-right float-right"></i></a></p>
                        <p><a href="#" style="cursor: text;color:blue;" class="text-decoration-none"><span class="left">Your Leads</span></a><span class="float-right" style="margin-top:-6px !important"><b><a href="https://www.balancenutrition.in/sales_crm_staging/login/process_login?email=<?php echo $user_email?>&password=<?php echo $pass?>&next_url=lead?lead_by=assgn_mentor_tdy" target="_blank" style="color:black; font-weight: 600;"><span class="omr_lead_count_today" style="font-size: 1.5rem;">0</span></a></b> | <b><a href="https://www.balancenutrition.in/sales_crm_staging/login/process_login?email=<?php echo $user_email?>&password=<?php echo $pass?>&next_url=lead?lead_by=assgn_mentor_mnth" target="_blank" style="color:black;font-weight: 600;"><span class="omr_lead_count_mdt" style="font-size: 1.5rem;">0</span></a></b></span></p>
                        <p><a href="https://www.balancenutrition.in/sales_crm_staging/login/process_login?email=<?php echo $user_email?>&password=<?php echo $pass?>&next_url=dashboard" target="_blank" class="text-decoration-none"><span class="left">Your Sales Activities</span><i class="fas fa-chevron-right float-right"></i></a></p>
                        <!--<p><a href="https://www.balancenutrition.in/sales_crm_staging/login/process_login?email=<?php echo $user_email?>&password=<?php echo $pass?>&next_url=performance/mis_sales_manager" target="_blank" class="text-decoration-none"><span class="left">Your Sales Performance</span><i class="fas fa-chevron-right float-right"></i></a></p>-->
                     </div>
                 </div>
                </li>
        <?php }?>                
                    

 <?php //} ?>               
               <!-- <li id="ti_notification" data-id="ti_notification" class="common_notification m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" data-dropdown-toggle="click" data-dropdown-persistent="true">
                     <a href="#" class="m-nav__link m-dropdown__toggle ti_animate">
                         <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger today_ti_count d-none"> </span>
                         <span class="m-nav__link-icon"><i class="flaticon-speech-bubble">TE</i></span>
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--center" style="color: #31bdcc;"></span>
                            <div class="m-dropdown__inner">
                               <table class="table m-table table-bordered m-table--border-metal m-table--head-bg-metal">
                        		    <tbody>
                        		        <tr class="text-center">
                        		            <td colspan="3">TOTAL TAILENDS PENDING</td>
                        		        </tr>
                        		        <tr class="text-center">
                        		            <td>0 PENDING</td>
                        		            <td>1 PENDING</td>
                        		            
                        		        </tr>
                        		        <tr class="text-center">
                        		            <td>
                        		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer;" class="m-widget1__number m--font-success tail_end tail_end_zero_session"  id="tail_end_zero_session"> </span>
                        		            </td>
                        		            <td>
                        		                <span style="font-size: 1.75rem;font-weight: 600;cursor:pointer;" class="m-widget1__number m--font-danger tail_end tail_end_one_session"  id="tail_end_one_session"> </span>
                        		            </td>
                        		            
                        		        </tr>
                    		        </tbody>
                    	        </table>
                            </div>
                        </div>
                    </li>-->                  
                  
                  <?php } ?>                
                  <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                     <a href="#" class="m-nav__link m-dropdown__toggle">
                     <span class="m-topbar__userpic">
                     <img src="<?php echo ($this->session->balance_session['photo']=='') ? CDN_IMAGE_URL.'default_photo.png' : CDN_IMAGE_URL.$this->session->balance_session['photo']; ?>" class="m--img-rounded m--marginless m--img-centered" alt=""/>
</span><span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger id_upgraded d-none" style="width: 51%;">New</span>
                     <span class="m-topbar__username m--hide">Nick</span>					
                     </a>
                     <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                           <div class="m-dropdown__header m--align-center" style="background: url(../assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                              <div class="m-card-user m-card-user--skin-dark">
                                 <div class="m-card-user__pic">
                                 <a href="<?php echo base_url('dashboard/mentor/exportMentor'); ?>" target="_blank">
                                 <img src="<?php echo ($this->session->balance_session['photo']=='') ? CDN_IMAGE_URL.'default_photo.png' : CDN_IMAGE_URL.$this->session->balance_session['photo']; ?>" class="m--img-rounded m--marginless" alt=""/></a>
                                 </div>
                                 <div class="m-card-user__details">
                                    <span class="m-card-user__name m--font-weight-500"><?php echo $this->session->balance_session['full_name']; ?></span>
                                    <a href="#" class="m-card-user__email m--font-weight-300 m-link"><?php echo $this->session->balance_session['email_id']; ?></a>
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="m-dropdown__body">
                              <div class="m-dropdown__content">
                                 <ul class="m-nav m-nav--skin-light">
                                    <li class="m-nav__section m--hide">
                                       <span class="m-nav__section-text">Section</span>
                                    </li> 
                                    <li class="m-nav__item">
                                       <p><a class="m-card-user__email m--font-weight-300 m-link text-warning" href="<?php echo base_url('dashboard/mentor/exportMentor'); ?>" target="_blank">Click to Download Digital Id</a></p>
                                       <a href="<?php echo base_url('logout'); ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li id="m_quick_sidebar_toggle" class="m-nav__item">
                     <a href="#" class="m-nav__link m-dropdown__toggle">
                     <span class="m-nav__link-icon"><i class="flaticon-grid-menu"></i></span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- END: Topbar -->
         </div>
      </div>
   </div>
</header>
<script type="text/javascript">

$(function() {
        $.ajax({
      url : "https://www.balancenutrition.in/crm_ui/dashboard/mentor/mentor_top_nav",
      type: "POST",
      dataType:"JSON",
      success: function(response)
      {
          console.log(response)
            //  $('.lead_capture_count').html(response.top_active_count);
            //  $('.today_query_count_active').html(response.unanswered_queries_active);
            //  if(parseInt(response.today_call_count)>0){
            //     $('.top_active_count').addClass("blink_me");
            // }
            //  $('.today_call_count').html(response.today_call_count);
            //  $('#todays_welcome_call').html(response.todays_welcome_call);
            //  $('#todays_progress_call').html(response.todays_progress_call);
            //  $('#todays_feedback_call').html(response.todays_feedback_call);
            //  $('#unanswered_call').html(response.unanswered_call);
            //  $('#today_health_score_active').html(response.today_health_score_active);
            //  $('#mtd_health_score_active').html(response.mdt_health_score_active);
            //  $('#program_tdy').html(response.active_bday);
            //  $('#omr_lead_count').html(response.omr_lead_count);
            //  $('.today_query_count_omr').html(response.unanswered_queries_omr);
            //  $('#omr_bday_notification').html(response.omr_bday);
            //  $('#last_thirty_days_omr_notification').html(response.last_thirty_days_omr_notification);
            //  $('.top_omr_count').html(response.top_omr_count);
             $('.omr_lead_count_today').html(response.omr_lead_count_today);
             $('.omr_lead_count_mdt').html(response.omr_lead_count_mdt);
             
             
        },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
  }) 

     });
     
</script>   
