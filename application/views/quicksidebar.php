<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$menus = $this->navigation_rights->navigation_array($this->session->balance_session['user_type']);
?>
<!-- begin::Quick Sidebar -->
<style>
    .custom-overlay{
        position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    overflow: hidden;
    z-index: 1000;
    background: rgba(0, 0, 0, .1);
    -webkit-animation: m-offcanvas-overlay-fade-in .3s linear 1;
    -moz-animation: m-offcanvas-overlay-fade-in .3s linear 1;
    -ms-animation: m-offcanvas-overlay-fade-in .3s linear 1;
    -o-animation: m-offcanvas-overlay-fade-in .3s linear 1;
    animation: m-offcanvas-overlay-fade-in .3s linear 1;
    }
  .all-active{
   margin-right:21px;   
  }  
  .menu-list1 a {
    display: block;
    padding: 13px 19px;
    text-decoration: none;
    color: #868aa8;
}
.menu-list1 a:hover {
    background-color: white;
}
</style>
<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
    <div class="m-quick-sidebar__content m--hide">
<!--        <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>-->
            <button id="custom_close" class="custom__close" style="background: #212529;cursor: pointer;
    border: none;color: #fff;float:right"><i class="la la-close"></i></button>  <br><br> <div style="
    background: white;
    text-align: -webkit-center;
">
<a href="<?php echo base_url(); ?>" style=""><img src="https://www.balancenutrition.in/images/home_page/logo-blue.png" class="img-fluid" style=""></a>
</div>
                <!-- Quick sidebar on left side -->
                <ul class="list-unstyled components">
                    <!--<li class="menu-list">-->
                    <!--    <a href="">Dummy Heading</a>-->
                    <!--</li>-->
                   
                    <ul class="nav flex-column padding_top_4percent">       

        <?php 
            /*if( count($menus['menu']) > 0 )
            {
                foreach($menus['menu'] as $menu_category)
                {
            ?>
                    <li class="menu-list">
                        <a href="#num<?php echo $menu_category['id']; ?>" data-toggle="collapse" aria-expanded="false">
                            <span><?php echo $menu_category['menu_name'];?></span>
                            
                        </a>
                        <?php
                                    if(array_key_exists($menu_category['id'], $menus['sub_menus']) && ( count($menus['sub_menus'][$menu_category['id']]) > 0 ))
                                    {
                                ?>
                        <ul class="collapse list-unstyled" id="num<?php echo $menu_category['id']; ?>" style="margin-left: 15px;">
                                                            <?php
                                         foreach($menus['sub_menus'][$menu_category['id']] as $sub_menus) 
                                         {
                                    ?>
                            <li><a target="_blank" href="<?php echo ( $sub_menus['submenu_pagename'] != '') ? base_url($sub_menus['submenu_pagename']) : 'javascript:void(0)'; ?>"> <?php echo ucfirst($sub_menus['submenu_name']); ?></a></li>
                                         <?php } ?>
                        </ul>
                                    <?php }?>
                    </li>
              <?php   
                }
                 
            } */
            
        ?>
          <?php $url = "https://www.balancenutrition.in/crm_ui/"; ?>
            <li style="color:#868aa8" class="menu-list1">
                <a href="#bifurcation" data-toggle="collapse" aria-expanded="false" class="omr_count text-uppercase font-weight-bold" data-id=""><span style="color:#868aa8">Client Bifurcation</span></a>

                <ul class="collapse list-unstyled" id="bifurcation" style="margin-left: 15px;">

                    <li class="menu-list1">
                             <a href="#active" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="activebase"><span style="color:#868aa8">Active</span></a>
                        <ul class="collapse list-unstyled" id="active" style="margin-left: 15px;">
                            
                            <li class="menu-list1">
                                <div style="color:white">
                                     <a href="<?php echo base_url('dashboard/mentor/mentor_client_details?program=all');?>" target="_blank" data-program="all">
                                       <span class="m-widget4__text float-left pr-3 all-active">All Active </span>
                                       (<span class="m-widget4__number m--font-accent all_active_clients"></span>)</a>
                                </div>
                            </li>

                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/mentor_client_details?program=Active');?>" target="_blank" data-program="Active">
                                    <span class="m-widget4__text float-left pr-3 all-active">Active</span>
                                    (<span class="m-widget4__number m--font-accent active_clients" style="cursor: pointer;"></span>)</a>    
                                </div>
                            </li>

                        </ul> 
                    
                    </li>

                       <li class="menu-list1">
                             <a href="#cleanse_active" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="cleanse_active_base"><span style="color:#868aa8">Cleanse Active</span></a>
                        <ul class="collapse list-unstyled" id="cleanse_active" style="margin-left: 15px;">
                            
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=1/3_day_active');?>" target="_blank" data-program="1/3_day_active">
                                    <span class="m-widget4__text float-left pr-3">1/3 Day Active</span>
                                    (<span class="m-widget4__number m--font-accent one_three_active" style="cursor: pointer;"></span>)</a>    
                                </div>
                            </li>
                             <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=1/3_day_od_active');?>" target="_blank" data-program="1/3_day_od_active">
                                    <span class="m-widget4__text float-left pr-3">1/3 day OD</span>
                                    (<span class="m-widget4__number m--font-accent one_three_od_active" style="cursor: pointer;"></span>)</a>    
                                </div>
                            </li>

                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=10_day_active');?>" target="_blank" data-program="10-day-active">
                                    <span class="m-widget4__text float-left pr-3 ten_day_active">10-Day Active</span>
                                    (<span class="m-widget4__number m--font-accent ten_day_clense_active" style="cursor: pointer;"></span>)</a>    
                                </div>
                            </li>

                              <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=10_day_od_active');?>" target="_blank" data-program="10-day-active">
                                    <span class="m-widget4__text float-left pr-3 ten_day_active">10-Day OD Active</span>
                                    (<span class="m-widget4__number m--font-accent ten_day_od_clense_active" style="cursor: pointer;"></span>)</a>    
                                </div>
                            </li>

                        </ul> 
                    
                    </li>

                    <li class="menu-list1">
                             <a href="#dormant" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="dormant_clients_base"><span style="color:#868aa8">Dormant</span></a>
                        <ul class="collapse list-unstyled" id="dormant" style="margin-left: 15px;">
                        
                            <li class="menu-list1">
                                <div style="color:white">
                                     <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=dormant_30_60_90');?>" target="_blank" data-program="Dormant">
                                     <span class="m-widget4__text float-left pr-3">Dormant 30 60 90 </span>
                                     (<span class="m-widget4__number m--font-accent dormant_30_60_90" style="cursor: pointer;"> </span>)
                                      </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                     <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=dormant_10_day');?>" target="_blank" data-program="Dormant">
                                     <span class="m-widget4__text float-left pr-3">Dormant 10-day </span>
                                     (<span class="m-widget4__number m--font-accent dormant_10_day" style="cursor: pointer;"> </span>)
                                      </a>
                                </div>
                            </li>

                        </ul> 
                    
                    </li>

                     <li class="menu-list1">
                             <a href="#dormant_id" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="dormant_od_base"><span style="color:#868aa8">Dormant OD</span></a>
                        <ul class="collapse list-unstyled" id="dormant_id" style="margin-left: 15px;">
                            
                           <li class="menu-list1">
                                <div style="color:white">
                                     <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=dormant_od_30');?>" target="_blank" data-program="Dormant">
                                     <span class="m-widget4__text float-left pr-3"> Dormant OD 30 60 90 Days</span>
                                     (<span class="m-widget4__number m--font-accent dormant_od_30_60_90_day" style="cursor: pointer;"> </span>)
                                      </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                     <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=dormant_od_10');?>" target="_blank" data-program="Dormant">
                                     <span class="m-widget4__text float-left pr-3">Dormant OD 10-Day</span>
                                     (<span class="m-widget4__number m--font-accent dormant_od_10_day" style="cursor: pointer;"> </span>)
                                      </a>
                                </div>
                            </li>

                        </ul> 
                    
                    </li>

                     <li class="menu-list1">
                             <a href="#onhold" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="onhold_base"><span style="color:#868aa8">On Hold</span></a>
                        <ul class="collapse list-unstyled" id="onhold" style="margin-left: 15px;">
                            
                          <li class="menu-list1">
                                <div style="color:white">
                                   <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=on-hold');?>" target="_blank" data-program="Onhold">
                                   <span class="m-widget4__text float-left pr-3">On Hold</span>
                                      (<span class="m-widget4__number m--font-accent onhold_client" style="cursor: pointer;"></span>)</a>   
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                   <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=on-hold-10-day');?>" target="_blank" data-program="Onhold">
                                   <span class="m-widget4__text float-left pr-3">On Hold 10-Day</span>
                                      (<span class="m-widget4__number m--font-accent onhold_10day_client" style="cursor: pointer;"></span>)</a>   
                                </div>
                            </li>

                        </ul> 
                    
                    </li>

                    <li class="menu-list1">
                             <a href="#onhold_od" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="onhold_base_od"><span style="color:#868aa8">On Hold OD</span></a>
                        <ul class="collapse list-unstyled" id="onhold_od" style="margin-left: 15px;">
                            
                          <li class="menu-list1">
                                <div style="color:white">
                                   <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=on-hold-od');?>" target="_blank" data-program="Onhold">
                                   <span class="m-widget4__text float-left pr-3">On Hold OD</span>
                                      (<span class="m-widget4__number m--font-accent onhold_od_data" style="cursor: pointer;"></span>)</a>   
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                   <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=10day_on_hold_od');?>" target="_blank" data-program="Onhold">
                                   <span class="m-widget4__text float-left pr-3">10 Day On Hold OD</span>
                                      (<span class="m-widget4__number m--font-accent onhold_10_day_od" style="cursor: pointer;"></span>)</a>   
                                </div>
                            </li>

                        </ul> 
                    
                    </li>

                    <li class="menu-list1">
                             <a href="#not_started" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="not_started_new"><span style="color:#868aa8">Not Started</span></a>
                        <ul class="collapse list-unstyled" id="not_started" style="margin-left: 15px;">
                            
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=not_started');?>" target="_blank" data-program="notstarted">
                                 <span class="m-widget4__text float-left pr-3">Not Started</span>
                                 (<span class="m-widget4__number m--font-accent not_started_clients_new" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=not_started_client_clense');?>" target="_blank" data-program="notstarted">
                                 <span class="m-widget4__text float-left pr-3">Not Started Cleanse</span>
                                 (<span class="m-widget4__number m--font-accent not_started_clients_clense" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=not_started_10_day');?>" target="_blank" data-program="notstarted">
                                 <span class="m-widget4__text float-left pr-3">Not Started 10-Day</span>
                                 (<span class="m-widget4__number m--font-accent not_started_10_dayclients_clense" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                        </ul>                    
                    </li>

                     <li class="menu-list1">
                             <a href="#not_started_od" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="not_started_od"><span style="color:#868aa8">Not Started OD</span></a>
                        <ul class="collapse list-unstyled" id="not_started_od" style="margin-left: 15px;">
                            
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=not_started_od_30_60_90');?>" target="_blank" data-program="notstarted">
                                        <span class="m-widget4__text float-left pr-3">Not Started OD 30 60 90</span>
                                         (<span class="m-widget4__number m--font-accent not_started_od_30_60_90" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=not_started_10_day_od');?>" target="_blank" data-program="notstarted">
                                 <span class="m-widget4__text float-left pr-3">10-day not started OD</span>
                                 (<span class="m-widget4__number m--font-accent not_started_od_10_day" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=clense_not_started_od');?>" target="_blank" data-program="notstarted">
                                 <span class="m-widget4__text float-left pr-3">Cleanse Not Started OD</span>
                                 (<span class="m-widget4__number m--font-accent clense_not_started_od" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                        </ul>                    
                    </li>
                    
                     <li class="menu-list1">
                <a href="#omr_list" data-toggle="collapse" aria-expanded="false" class="common_function_class" data-id="omr_list"><span style="color:#868aa8">OMR</span>
                (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent omr_list_total" style="cursor: pointer;"></span>)
                </a>

                <ul class="collapse list-unstyled" id="omr_list" style="margin-left: 15px;">
                    <li class="menu-list1">

                         <div style="color:white">
                                <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=omr_list_completed');?>" target="_blank">
                                     <span class="m-widget4__text float-left pr-3">Completed</span>
                                     (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent omr_list_completed" style="cursor: pointer;"></span>)
                               </a>
                        </div>

                          <div style="color:white">
                                <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=omr_list_dropout');?>" target="_blank">
                                     <span class="m-widget4__text float-left pr-3">Dropout</span>
                                     (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent omr_list_dropout" style="cursor: pointer;"></span>)
                               </a>
                           </div>

                             <div style="color:white">
                                <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=omr_list_fs');?>" target="_blank">
                                     <span class="m-widget4__text float-left pr-3">Fs</span>
                                     (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent omr_list_fs" style="cursor: pointer;"></span>)
                               </a>
                            </div>
                    
                    </li>

                </ul>
            </li>

                </ul>
            </li>

              <li class="menu-list1">
                             <a href="#tail_end_menu" data-toggle="collapse" aria-expanded="false" class=" text-uppercase font-weight-bold tailend_class_count" data-id=""><span style="color:#868aa8">Tail End</span>
                             </a>

                    <ul class="collapse list-unstyled" id="tail_end_menu" style="margin-left: 15px;">
                        <li class="menu-list1">
                            <a href="#tail_end" class="custom_function" data-toggle="collapse" aria-expanded="false" data-id="tlTailEnd_new"><span style="color:#868aa8">Tail End
                           (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent tailend_list_count" style="cursor: pointer;"></span>)<span id="red_dot"></span>
                            </a>

                         <ul class="collapse list-unstyled" id="tail_end" style="margin-left: 15px;">
                            
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_3_pending');?>" target="_blank" data-program="">
                                        <span class="m-widget4__text float-left pr-3">3 Pending</span>
                                         (<span class="m-widget4__number m--font-accent tail_end_3_pending" style="cursor: pointer;"></span>)<span id="tail_end_3_red_dot"></span>
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_2_pending');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">2 Pending</span>
                                 (<span class="m-widget4__number m--font-accent tail_end_2_pending" style="cursor: pointer;"></span>)<span id="tail_end_2_red_dot"></span>
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_1_pending');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">1 Pending</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent tail_end_1_pending" style="cursor: pointer;"></span>)<span id="tail_end_1_red_dot"></span>
                                   </a>
                                </div>
                            </li>
                             <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_0_pending');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">0 Pending</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent tail_end_0_pending" style="cursor: pointer;"></span>)<span id="tail_end_0_red_dot"></span>
                                   </a>
                                </div>
                            </li>
                       

                        </ul>     

                    </li>
                        

                        <li class="menu-list1">
                            <a href="#tail_end_advance" class="custom_function" data-toggle="collapse" aria-expanded="false" data-id="tlTailEnd_advance"><span style="color:#868aa8">Tail End (Adv Purchase)
                            (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent tailend_list_adv_count" style="cursor: pointer;"></span>)
                            </a>


                        <ul class="collapse list-unstyled" id="tail_end_advance" style="margin-left: 15px;">
                            
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_3_adv_pending');?>" target="_blank" data-program="">
                                        <span class="m-widget4__text float-left pr-3">3 Pending</span>
                                         (<span class="m-widget4__number m--font-accent tail_end_3_advance_pending" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_2_adv_pending');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">2 Pending</span>
                                 (<span class="m-widget4__number m--font-accent tail_end_2_advance_pending" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                            <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_1_adv_pending');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">1 Pending</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent tail_end_1_advance_pending" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                             <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_0_adv_pending');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">0 Pending</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent tail_end_0_advance_pending" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                            </li>
                        </ul> 

                    </li>


                    </ul>         
                                  
                </li>
            

            <li class="menu-list1">
                <a href="#payment" data-toggle="collapse" class="text-uppercase font-weight-bold" aria-expanded="false"><span style="color:#868aa8">Payment & Orders</span></a>

                <ul class="collapse list-unstyled" id="payment" style="margin-left: 15px;">
                    <li class="menu-list">
                        <a target="_blank" href="<?php echo $url."dashboard/mentor/list_view/order-history"?>">Order History</a>
                    </li>

                </ul>
            </li>

              <li class="menu-list1">
                <a href="#wmr_noti" data-toggle="collapse" aria-expanded="false" class="text-uppercase font-weight-bold"><span style="color:#868aa8">Wmr Notifications</span></a>

                <ul class="collapse list-unstyled" id="wmr_noti" style="margin-left: 15px;">
                    <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=5day_7pm');?>">5th Day Due - 7 pm Today</a>
                    </li>
                     <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=5day_7am');?>">5th Day Due - 7am Tommrrow</a>
                    </li>
                    <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=10day_7pm');?>">10th Day Due - 7 pm Today</a>
                    </li>
                    <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=10day_7am');?>">10th Day Due - 7am Tommrrow</a>
                    </li>

                     <!-- Start here added by sanjay on 20/08/2021 -->
                     <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=14day_7pm');?>">14th Day Due - 7pm Today</a>
                    </li>
                    <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=17day_7pm');?>">17th Day Due - 7pm Today</a>
                    </li>
                    <li class="menu-list1">
                        <a target="_blank" href="<?php echo base_url('dashboard/mentor/common_menu_function?program=25day_7pm');?>">25th Day Due - 7pm Today</a>
                    </li>
                    <!-- End here added by sanjay on 20/08/2021 -->

                </ul>
            </li>
            
            <!-- start for HT --->

            <li class="menu-list1">
                <a href="#ht_feed" data-id="half_feed_menu" data-toggle="collapse" aria-expanded="false" class="text-uppercase font-weight-bold common_feedback_fuction"><span style="color:#868aa8">Half Time FEEDBACK</span></a>

                <ul class="collapse list-unstyled" id="ht_feed" style="margin-left: 15px;">
                    
                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=ht_today');?>" target="_blank" data-program="">
                                        <span class="m-widget4__text float-left pr-3">Today</span>
                                         (<span class="m-widget4__number m--font-accent half_time_feed_today" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>
                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=ht_all_time');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">All time </span>
                                 (<span class="m-widget4__number m--font-accent half_time_feed_alltime" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>
                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=ht_below4');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3 text-danger"> Below 4</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent half_time_feed_below4" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>

                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=ht_above4');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3"> Above 4</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent half_time_feed_above4" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>

                    <li class="menu-list1">
                        <div style="color:white">
                            <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=ht_not_filled_od');?>" target="_blank" data-program="">
                         <span class="m-widget4__text float-left pr-3"> NOT FILLED (OD)</span>
                         (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent half_time_feed_not_fill_od" style="cursor: pointer;"></span>)
                           </a>
                        </div>
                    </li>

                </ul>
            </li>

 <!-- End here start for HT ---> 
 <!-- Start for Programe Feedback -->

             <li class="menu-list1">
                <a href="#program_feed" data-id="programe_feedback" data-toggle="collapse" aria-expanded="false" class="text-uppercase font-weight-bold common_feedback_fuction"><span style="color:#868aa8">Program feedback </span></a>

                <ul class="collapse list-unstyled" id="program_feed" style="margin-left: 15px;">
                    
                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=programe_feed_today');?>" target="_blank" data-program="">
                                        <span class="m-widget4__text float-left pr-3">Today</span>
                                         (<span class="m-widget4__number m--font-accent progrme_feed_today" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>
                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=programe_feed_all');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3">All time </span>
                                 (<span class="m-widget4__number m--font-accent progrme_feed_all" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>
                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=programe_feed_below4');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3 text-danger"> Below 4</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent progrme_feed_below4" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>

                    <li class="menu-list1">
                                <div style="color:white">
                                    <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=programe_feed_above4');?>" target="_blank" data-program="">
                                 <span class="m-widget4__text float-left pr-3"> Above 4</span>
                                 (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent progrme_feed_above4" style="cursor: pointer;"></span>)
                                   </a>
                                </div>
                    </li>

                    <li class="menu-list1">
                        <div style="color:white">
                            <a href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=programe_feed_not_filled_od');?>" target="_blank" data-program="">
                         <span class="m-widget4__text float-left pr-3"> NOT FILLED (OD)</span>
                         (<span class="m-widget4__number m--font-accent m-widget4__number m--font-accent progrme_feed_not_filled_od" style="cursor: pointer;"></span>)
                           </a>
                        </div>
                    </li>

                </ul>
            </li>
            
            
            <?php 
            // if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){
            if(1 == 1){
            ?>
            <li class="menu-list1">
                             <a href="#dropout_clients" data-toggle="collapse" aria-expanded="false" class=" text-uppercase font-weight-bold" data-id=""><span style="color:#868aa8">Dropout Clients</span>
                             </a>

                    <ul class="collapse list-unstyled" id="dropout_clients" style="margin-left: 15px;">
                        <li class="menu-list1">
                            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_active');?>" target="_blank" class="custom_function" data-id="dropout_tomorrow"><span style="color:#868aa8">Dropout Tomorrow
                            </a>

                        <!-- <ul class="collapse list-unstyled" id="dropout_tomorrow" style="margin-left: 15px;">-->
                            
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_active');?>" target="_blank" data-program="">-->
                        <!--                Active-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_dormant');?>" target="_blank" data-program="">-->
                        <!--         Dormant-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_onhold');?>" target="_blank" data-program="">-->
                        <!--         Onhold-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                            <!-- <li class="menu-list1">-->
                            <!--    <div style="color:white">-->
                            <!--        <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_onhold_od');?>" target="_blank" data-program="">-->
                            <!--     Onhold OD-->
                            <!--       </a>-->
                            <!--    </div>-->
                            <!--</li>-->
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_notstarted');?>" target="_blank" data-program="">-->
                        <!--         Not Started-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->

                        <!--</ul>     -->

                    </li>
                        

                        <li class="menu-list1">
                            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_active');?>" target="_blank" class="custom_function" data-id="dropout_day_after"><span style="color:#868aa8">Dropout Day After Tomorrow
                            </a>


                        <!--<ul class="collapse list-unstyled" id="dropout_day_after" style="margin-left: 15px;">-->
                            
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_active');?>" target="_blank" data-program="">-->
                        <!--                Active-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_dormant');?>" target="_blank" data-program="">-->
                        <!--         Dormant-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_onhold');?>" target="_blank" data-program="">-->
                        <!--        Onhold-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                            <!-- <li class="menu-list1">-->
                            <!--    <div style="color:white">-->
                            <!--        <a href="<?php //echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_onhold_od');?>" target="_blank" data-program="">-->
                            <!--     Onhold OD-->
                            <!--       </a>-->
                            <!--    </div>-->
                            <!--</li>-->
                        <!--    <li class="menu-list1">-->
                        <!--        <div style="color:white">-->
                        <!--            <a href="<?php echo base_url('dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_notstarted');?>" target="_blank" data-program="">-->
                        <!--         Not Started-->
                        <!--           </a>-->
                        <!--        </div>-->
                        <!--    </li>-->
                        <!--</ul> -->

                    </li>


                    </ul>         
                                  
                </li>
            <?php } ?>

<!-- End for Programe Feedback -->

             <li class="menu-list1">
                <a target="_blank" href="<?php echo $url."mentor/special-diet"?>" class="text-uppercase font-weight-bold" style="color:#868aa8">Special Diets</a>
               
            </li>

             <li style="color:#868aa8" class="menu-list1">
                <a target="_blank" href="<?php echo $url."dashboard/mentor/client_query"?>" class="text-uppercase font-weight-bold" style="color:#868aa8">Queries</a>
               
            </li>

             <li style="color:#868aa8" class="menu-list1">
                <a target="_blank" href="<?php echo $url."faq"?>" class="text-uppercase font-weight-bold" style="color:#868aa8">Faq's</a>
               
            </li>
            
              <li style="color:#868aa8" class="menu-list1">
                <a target="_blank" href="<?php echo $url."dashboard/mentor/exchange_list"?>" class="text-uppercase font-weight-bold" style="color:#868aa8">Food Exchange List</a>
               
            </li>

             <li style="color:#868aa8" class="menu-list1">
                <a target="_blank" class="text-uppercase font-weight-bold" href="<?php echo base_url('dashboard/mentor/common_feedback_fuction?program=country_code');?>" style="color:#868aa8">Country Code</a>
               
            </li>
            
                </ul>
            </ul>
                <!--End  Quick sidebar on left side -->

    </div>
</div>

<div id="custom-overlay"></div>