<!-- BEGIN: Left Aside -->
<?php 
$user_type = $this->session->balance_session['user_type'];
// echo $user_type ;
?>
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">	
	<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-light " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>		
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
		    <?php
		    if($this->session->balance_session['email_id']!='marketing@balancenutrition.in'){
		    ?>
		    <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Add Task"><a  href="javascript:void" class="m-menu__link add_task_btn" data-toggle="modal" data-target="#mentorreminderModal"><i class="m-menu__link-icon la la-plus"></i> <span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Add Task</span> </span></span></a></li>
		    
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Dashboard"><a  href="<?= base_url('/'); ?>" class="m-menu__link "><i class="m-menu__link-icon"><img src="<?= CDN_IMAGE_URL; ?>icons/view-dashboard.png"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Dashboard</span> </span></span></a></li>

			<!--<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Add Lead"><a  href="#" class="m-menu__link" <?php if($this->uri->segment(2) != "add_lead"){ ?>data-toggle="modal" data-target="#add_lead_popup"<?php } ?>><i class="m-menu__link-icon fa fa-user-plus"> </i> <span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Add Leads</span> </span></span></a></li>-->
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Add Lead"><a  href="#" class="m-menu__link text-primary add_lead_popup" data-toggle="modal" data-target="#add_lead_popup2" onclick="get_country()"><i class="m-menu__link-icon fa fa-user-plus"> </i> <span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Add Leads</span> </span></span></a></li>
			 	<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Spin History"><a  href="<?= base_url('lead/spin_history'); ?>" target="_blank" class="m-menu__link "><i class="m-menu__link-icon fa fa-history"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Spin History</span> </span></span></a></li>
                
                <!--<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="IMF Campaign History"><a  href="<?= base_url('lead/imf_campaign'); ?>" target="_blank" class="m-menu__link "><i class="m-menu__link-icon fa fa-history"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">IMF Campaign</span> </span></span></a></li>-->
                
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="All Leads"><a  href="<?= base_url('lead'); ?>" class="m-menu__link "><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">All Lead</span> </span></span></a></li>

                 <!-- ************************************************************************* -->
           
            
            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Leads with APP"><a  href="<?= base_url('lead_data'); ?>" class="m-menu__link "><i class="m-menu__link-icon fas fa-table"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text"> Lead Data</span> </span></span></a></li>


            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Chat with Leads"><a  href="<?= base_url('chat'); ?>" class="m-menu__link "><i class="m-menu__link-icon far fa-comment"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Chat</span> </span></span></a></li>
            <!-- ********************************************************************** -->
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Performance Analysis"><a  href="<?= base_url('performance/mis_sales_manager'); ?>" target="_blank" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Performance Analysis</span> </span></span></a></li>
			
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Links Expired Yesterday"><a  href="#" class="m-menu__link top_list_count payment_links_expired" data-toggle="modal" data-target="#sales_summary_popup" data-id="payment_links_expired"><i class="m-menu__link-icon fas fa-clock " aria-hidden="true"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text" style='cursor:pointer;font-weight: 400;font-size: 1.02rem !important;text-transform: initial;'>Links Expired Yesterday</span> </span></span></a></li>
			
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="All Active Links"><a  href="#" class="m-menu__link top_list_count active_payment_links" data-toggle="modal" data-target="#sales_summary_popup" data-id="active_payment_links"><i class="m-menu__link-icon fa fa-link"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text"  style='cursor:pointerfont-weight: 400;font-size: 1.02rem !important;text-transform: initial;'>All Active Payment Links</span> </span></span></a></li>
			
			<!--avinash add this for set goal-->
            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Set Your Goal"><a  href="#" target="_blank" class="m-menu__link set_goal_modal" data-toggle="modal" data-target="#set_goal_modal"><i class="m-menu__link-icon fa fa-bullseye"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap"><span class="m-menu__link-text">Set Your Goal</span> </span></span></a></li>
           
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Order History"><a  href="<?= base_url('lead/order_history'); ?>" target="_blank" class="m-menu__link "><i class="m-menu__link-icon fa fa-history"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Order History</span> </span></span></a></li>
            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Order History"><a  href="<?= base_url('lead/get_checkoutpage_visited_client_list'); ?>" target="_blank" class="m-menu__link"><i class="m-menu__link-icon fa fa-shopping-cart"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap"> <span class="m-menu__link-text">CheckOut History</span> </span></span></a></li>
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Help"><a  href="#" class="m-menu__link" data-toggle="modal" data-target="#faq_modal"><i class="m-menu__link-icon flaticon-info"> </i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">FAQs</span> </span></span></a></li>

       

			<?php  if($user_type =='sales'){ ?>
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Day Planner"><a  href="#" class="m-menu__link" data-toggle="modal" data-target="#day_planner_modal"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Day Planner</span> </span></span></a></li>
			<?php }?>
			<?php date_default_timezone_set('Asia/kolkata'); if(date("H:i:s") >= "18:58:00" && date("H:i:s") <= "23:55:00" && $user_type =='sales'){?>
			<li class="m-menu__item day_end_review_btn" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="review popup"><a  href="#" class="m-menu__link" data-toggle="modal" data-target="#day_end_review_modal"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Review Popup</span> </span></span></a></li>
			<?php }else if(date("H:i:s") >= "16:28:00" && date("H:i:s") <= "18:57:59" && $user_type =='sales'){ ?>
			<li class="m-menu__item day_end_review_btn" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="review popup"><a  href="#" class="m-menu__link" data-toggle="modal" data-target="#second_half_review_modal"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Review Popup</span> </span></span></a></li>
			<?php }else if(date("H:i:s") >= "13:28:00" && date("H:i:s") <= "16:27:59" && $user_type =='sales'){ ?>
			<li class="m-menu__item day_end_review_btn" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="review popup"><a  href="#" class="m-menu__link" data-toggle="modal" data-target="#first_half_review_modal"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Review Popup</span> </span></span></a></li>
			<?php }else if(date("H:i:s") >= "07:00:00" && date("H:i:s") <= "13:00:00"){ ?>
			<li class="m-menu__item day_end_review_btn" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="review popup"><a  href="#" class="m-menu__link" data-toggle="modal" data-target="#day_planner_modal"><i class="m-menu__link-icon flaticon-file-1"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Day Planner</span> </span></span></a></li>
			<?php } ?> 
            <?php
		    }else
		    {
            ?>
            	<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Add Lead"><a  href="#" class="m-menu__link text-primary add_lead_popup" data-toggle="modal" data-target="#add_lead_popup2" onclick="get_country()"><i class="m-menu__link-icon fa fa-user-plus"> </i> <span class="m-menu__link-title"> <span class="m-menu__link-wrap"> <span class="m-menu__link-text">Add Leads</span> </span></span></a></li>
            	<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Spin History"><a  href="<?= base_url('lead/spin_history_all'); ?>" target="_blank" class="m-menu__link "><i class="m-menu__link-icon fa fa-history"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Spin History</span> </span></span></a></li>
			<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="All Leads"><a  href="<?= base_url('lead'); ?>" class="m-menu__link "><i class="m-menu__link-icon fa fa-users"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">All Lead</span> </span></span></a></li>
            	<li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Order History"><a  href="<?= base_url('lead/order_history'); ?>" target="_blank" class="m-menu__link "><i class="m-menu__link-icon fa fa-history"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Order History</span> </span></span></a></li>
            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Checkout Page Visit"><a  href="<?= base_url('lead/get_checkoutpage_visited_client_list'); ?>" target="_blank" class="m-menu__link"><i class="m-menu__link-icon fa fa-shopping-cart"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap"> <span class="m-menu__link-text">CheckOut History</span> </span></span></a></li>
		 <!--faizan added this for WATI-->
            
            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="WATI"><a  href="<?= base_url('wati'); ?>" class="m-menu__link "><i class="m-menu__link-icon fa fa-whatsapp"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">WATI Broadcast </span> </span></span></a></li>
       <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Daily Tips"><a  href="<?= base_url('tips'); ?>" class="m-menu__link "><i class="m-menu__link-icon fas fa-lightbulb"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Daily Tips</span> </span></span></a></li>

            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Recipies & Reads"><a  href="<?= base_url('health_blog'); ?>" class="m-menu__link "><i class="m-menu__link-icon fas fa-hamburger"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Recipies & Reads</span> </span></span></a></li>

            

            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Leads with App"><a  href="<?= base_url('lead_data'); ?>" class="m-menu__link "><i class="m-menu__link-icon fas fa-table"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text"> Lead Data</span> </span></span></a></li>


            <li class="m-menu__item" aria-haspopup="true" data-container="body" data-toggle="m-tooltip" data-placement="right" title="" data-original-title="Chat with Leads"><a  href="<?= base_url('chat'); ?>" class="m-menu__link "><i class="m-menu__link-icon far fa-comment"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Chat</span> </span></span></a></li>
      
             <?php
		    }
            ?>
            
		</ul>

	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->

<!--avinash added new add lead popup  21-11-2021-->

<style>
.logger {
    width: 442px;
    height: 40px;
    padding-top: 4px !important;
    /*border-color:black !important;*/
    border-radius:4px !important;
}    

.logger::before {
  content: " Medical Issue : ";
  font-family: sans-serif, Arial;
  padding-top: 4px;
  padding-left: 16px;
  line-height: 2 !important;
}

.logger::after {
    content: '\2335';
    font-family: sans-serif, Arial;
    color: black !important;
    background-color: #fff;
    margin-left: 340px;
    font-weight: bold;
}

.swal2-confirm , .swal2-cancel{
    padding:10px !important;
}

.swal2-cancel{
    width: 80px !important;
}

</style>
 
 
<div class="modal fade" id="add_lead_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Add Lead </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body1">
          <div class="m-content p-0">
    <div class="m-portlet mb-0">
    	<!--<div class="m-portlet__head pl-3">-->
    	<!--	<div class="m-portlet__head-caption">-->
    	<!--		<div class="m-portlet__head-title">-->
    	<!--			<h3 class="m-portlet__head-text p-0 m-0">-->
    					<!--Add Leads <button name="quick_access" id="quick_access"></button>-->
    	<!--				<ul class="nav nav-tabs  m-tabs-line mb-0" role="tablist">-->
     <!--                       <li class="nav-item m-tabs__item mr-3">-->
     <!--                           <a class="nav-link m-tabs__link active" data-toggle="tab" href="#new_lead_form" role="tab">Add New Lead</a>-->
     <!--                       </li>-->
     <!--                       <li class="nav-item m-tabs__item mr-3">-->
     <!--                           <a class="nav-link m-tabs__link" data-toggle="tab" href="#quick_access_form" role="tab" id="get_all_chats">Quick access</a>-->
     <!--                       </li>-->
     <!--                   </ul>-->
    	<!--			</h3>-->
    	<!--		</div>-->
    	<!--	</div>-->
    	<!--</div>-->
    	
	    <div class="tab-content">
            <div class="tab-pane active show" id="new_lead_form" role="tabpanel">
               <!--begin::Form-->
            	<form class="m-form m-form--fit m-form--label-align-right" id="m_form_1">
            		<div class="m-portlet__body mob-portlet__body">
            			<div class="first_mobPage_form desk_form_padding">
            			    <!--<div class="col-lg-6">-->
            			        <div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">First Name *</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="text" class="form-control m-input" name="first_name" id="first_name" placeholder="Lead Name*">
                    				</div>
                    			</div>
                    			
                    			
                    			<div class="form-group m-form__group row">
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="tel" id="phone" name="phone" class="txtbox form-control m-input" placeholder="Phone No*"/ maxlength="15" style="padding-left:270px">
                    				</div>
                    				
                    				<!--<div class="col-lg-12 col-md-12 col-sm-12">-->
                    				<!--	<input type="tel" id="phone" name="phone" class="txtbox form-control m-input" placeholder="Phone No*"/ maxlength="10" style="padding-left:270px">-->
                    				<!--</div>-->
                    				
                    				<input type="hidden" id="phone_code" name="phone_code" value="">
                    				<input type="hidden" id="country" name="country_id" value="">
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">Email </label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    					<input type="text" class="form-control m-input" name="email_id" id="email_id" placeholder="Email">					
                    				
                    				</div>
                    			</div>
                    
                			 <div class="form-group m-form__group row" style="padding-top:5px;">
                			<label class="col-form-label col-lg-3 col-sm-12 d-block" style="text-align: left;">Gender :</label>
                			<div class="col-lg-6 col-md-6 col-sm-6">
                			    <div class="m-radio-inline">
                					<label class="m-radio">
                					<input type="radio" name="gender" id="male" value="male"> Male
                					<span></span>
                					</label>
                					<label class="m-radio">
                					<input type="radio" name="gender" id="female" value="female"> Female
                					<span></span>
                					</label>
                				</div>
                			</div>
                		  </div>
                		  
                		  <div class="form-group m-form__group row">
        			            
        			            
        			            <label class="col-form-label col-lg-2 col-sm-12 d-none">DOB</label>
                				<div class="col-lg-9 col-md-9 col-sm-12 col-9">
                				    <input type="date" class="form-control m-input custom_datepicker1" name="dob" placeholder="Enter DOB" id="date_of_birth">
                					<!--<div class="m-input-icon m-input-icon--left">
                						<input type="text" class="form-control m-input" name="dob" placeholder="Enter digits">
                						<span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                					</div>-->
                				</div>
                				<label class="col-form-label col-lg-3 col-sm-12 d-none">Age</label>
                				<div class="col-lg-3 col-md-3 col-sm-12 col-3">
                					<input type="text" class="form-control m-input" name="age" id="age" placeholder="Age">
                				</div>
        			            </div>
                	
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12 d-none">Weight</label>
                				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
                				    <input  class="form-control m-input" name="weight" placeholder="Wt (kg) - 0-999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "3">
                				    
                				</div>
                				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
                				    <input class="form-control m-input" name="weight_grm" placeholder="Wt (gm) - 100-999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type = "number"
    maxlength = "3">
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row">
                				<label class="col-form-label col-lg-3 col-sm-12 d-none">Height</label>
                				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
                					<select class="form-control m-input heightClass" name="height">
                						<option value="">Select Feet</option>
                						<option value="0"> 0 (ft) </option> 
                                        <option value="1"> 1 (ft) </option>
                                        <option value="2"> 2 (ft) </option>
                                        <option value="3"> 3 (ft) </option>
                                        <option value="4"> 4 (ft) </option>
                                        <option value="5"> 5 (ft) </option>
                                        <option value="6"> 6 (ft) </option>
                                        <option value="7"> 7 (ft) </option>
                					</select>
                				</div>
                				<div class="col-lg-6 col-md-6 col-sm-12 col-6">
                				    <select class="form-control m-input" name="inches">
                						<option value="">Select Inches</option>
                						<option value="0">0 (in)</option>
                                        <option value="1">1 (in)</option>
                                        <option value="2">2 (in)</option>
                                        <option value="3">3 (in)</option>
                                        <option value="4">4 (in)</option>
                                        <option value="5">5 (in)</option>
                                        <option value="6">6 (in)</option>
                                        <option value="7">7 (in)</option>
                                        <option value="8">8 (in)</option>
                                        <option value="9">9 (in)</option>
                                        <option value="10">10 (in)</option>
                                        <option value="11">11 (in)</option>
                					</select>
                				</div>
                			</div>
                    			
                    			<div class="form-group m-form__group row" style="padding-top:0;">
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">Source *</label>
                    				<div class="col-lg-6 col-md-12 col-sm-12">
                    				    <select class="form-control m-input select2 source_id" name="source_id" id="source_id">
                                            <option value="">Select Source</option>
                                            
                                        </select>
                    					
                    				</div>
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">Lead Status</label>
                    				<div class="col-lg-6 col-md-12 col-sm-12">
                    				    <select name="status_id" id="status_id" class="form-control m-input statusClass">
                                            <option value="">Select Lead Status</option>
                                            
                                        </select>
                    				</div>
                    			</div>
                    			
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">Assign To</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12">
                    				    <select class="form-control m-input" name="assign_to_add" id="assign_to_add">
                    						<option value="">Assign this lead to :</option>
                    						
                    					</select>
                    				</div>
                    			</div>
                    			<div class="form-group m-form__group row">
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">Medical Issue</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12 ">
                    				    <input type="hidden" class="form-control m-input" name="health_category" id="health_category" placeholder="Enter Medical Issue" value="">
                    				    <!--<input type="text" class="form-control m-input" name="" id="madical" placeholder="Enter Medical Issue" value="">-->
                    				<span class="d-non1" id="multi_span">
                    				<select id="multiselect2" name="medical_issue[]" class="form-control m-input" multiple="" title="Medical Issue" placeholder="Enter Medical Issue" style="width: 442px;height: 40px;border-radius: 4px;border-color:black;">
                                      <!--<option value="" selected>Medical Issue</option>-->
                                      <option value="acidity"> Acidity</option>
                                      <option value="diabetes"> Diabetes</option>
                                      <option value="pcos"> Pcos</option>
                                      <option value="constipation"> Constipation</option>
                                      <option value="Hypertension"> Hypertension</option>
                                      <option value="thyroid"> Thyroid</option>
                                      <option value="n/a"> N/A</option>
                                    </select>
                                    </span>
                    				</div>
                    			</div>
                    			
                    			<!--<div class="form-group m-form__group row" style="padding-top: 6px;">-->
                    			<!--	<label class="col-form-label col-lg-3 col-sm-12 d-none">Medical Issue</label>-->
                    			<!--	<div class="col-lg-12 col-md-12 col-sm-12 ">-->
                    			<!--	    <input type="text" class="form-control m-input " name="other_medical_issue" id="other_medical_issue" placeholder="Other Medical Issue" value="">-->
                    			<!--	</div>-->
                    			<!--</div>-->
                    			
                    			<div class="btn-group px-2 mt-3" role="group" aria-label="Large button group" style="width: 97%;margin-left:8px;height:37px;">
                				   	<span name='submit' class="btn btn-success w-50 submit_btn">Submit</span>
                				   	<button type="button" class="btn btn-outline-success w-50 next_show_form">Next</button>
                				</div>
            			</div>
            			<div class="second_mobPage_form desk_form_padding d-none">
            			    
                		    <div class="form-group m-form__group row" style="padding-top:0;">
                    				<!--<label class="col-form-label col-lg-3 col-sm-12">Next Fu Date:</label>-->
                    				<div class="col-lg-6 col-md-12 col-sm-12">
                    				    <input type="text" class="form-control m-input add_datepicker" name="reminder_dt" id="reminder_dt1" placeholder="Pick Next Fu Date." readonly="">
                    				</div>
                    				<!--<label class="col-form-label col-lg-3 col-sm-12">Next Fu Time:</label>-->
                    				<div class="col-lg-6 col-md-12 col-sm-12">
                    				    <select class="form-control m-input" name="reminder_time" id="reminder_time1">
                                        <option >Select Time</option>
                        				</select>
                    				</div>
                    			</div>
                		    
                		    
        			        <div class="form-group m-form__group row state d-none">
                				<label class="col-form-label col-lg-3 col-sm-12 d-none">State</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                					<select class="form-control m-input" id="state" name="state_id">
                						<option value="">Select State</option>
                					</select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
                			
        			        <div class="form-group m-form__group row cities d-none">
                				<label class="col-form-label col-lg-3 col-sm-12 d-none">City</label>
                				<div class="col-lg-12 col-md-12 col-sm-12">
                					<select class="form-control m-input" id="cities" name="city_id">
                						<option value="">Select City</option>
                					</select>
                					<!--<span class="m-form__help">Please select an option.</span>-->
                				</div>
                			</div>
            				
            				<div class="btn-group px-2 mt-3" role="group" aria-label="Large button group" style="width: 97%;margin-left:8px;height:37px;">
            				   	<span type="submit" name='submit' class="btn btn-success w-50 submit_btn">Submit</span>
            				   	<input type="reset" class="d-none" id="reset"/>
            				   	<button type="button" class="btn btn-outline-success w-50 back_show_form">Back</button>
            				</div>
            				
            		    </div>
            		</div>
            	</form>
            	<!--end::Form--> 
            </div>
            <div class="tab-pane" id="quick_access_form" role="tabpanel">
                <form class="m-form m-form--fit m-form--label-align-right" id="bulk_lead_add">
                    <div class="form-group m-form__group p-3">
						<textarea class="form-control m-input" name="bulk_add_task" placeholder="name,number,source,email,status," id="bulk_add_task" rows="9"></textarea>
					</div>
					
					<div class="btn-group btn-group-lg w-100 px-3 mt-3 mb-4" role="group" aria-label="Large button group">
    				   	<button type="button" name="submit" class="btn btn-success w-50 bulk_add_task_btn">Submit</button>
    				</div>
    				
                </form>
            </div>
        </div> 
    	
    </div>
    <!--end::Portlet-->
</div>
      </div>
    </div>
  </div>
</div>

<!--avinash add this for add lead popup-->


<script>
// avinash added this for top nave add lead
   var code ="";
function get_country(){
    // alert("hello");
    var url = "https://www.balancenutrition.in/sales_crm/lead/add_lead";
    $.ajax({
      type: "POST",
      url: url,
      dataType:'json',
      beforeSend: function () {
            $("#cover-spin").show();
        },
      success: function(response){
          console.log(response.countries);
          //var short =['AU','BH','BE','CN','DK','FI','FR','DE','GH','HK','IS','IN','ID','IE','JP','KE','KW','MY','NL','NZ','NG','OM','PK','QA','SA'];
          var short =[];
          

          $.each(response.countries, function(i, item) 
            {
                short.push(response.countries[i].shortname);
            });
            short.push('ae');
        //   alert(short);
            var code = "+91"; // Assigning value from model.
            $('#phone').val(code);
            var country =$('#country').val();
            $('#phone').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                // placeholderNumberType: "MOBILE",
                // preferredCountries: ['US','UK','AUS','IN'],
                separateDialCode: true,
                // onlyCountries :['AU','BH','BE','CN','DK','FI','FR','DE','GH','HK','IS','IN','ID','IE','JP','KE','KW','MY','NL','NZ','NG','OM','PK','QA','SA'],
                 onlyCountries :short,
            });
          
          var country_html ="<option value=''>Select Country</option>";
            $.each(response.countries, function(i, item) 
            {
                country_html += '<option rel="'+response.countries[i].phonecode+'" value="'+response.countries[i].country_name+'">'+response.countries[i].country_name+'</option>';
            });
            $('#country').html(country_html);
            var source_html ="<option value=''>Select Lead Source</option>";
            $.each(response.lead_source, function(i, item) 
            {
                source_html += '<option rel="'+response.lead_source[i].source_id+'" value="'+response.lead_source[i].source_name+'">'+response.lead_source[i].source_name+'</option>';
            });
            $('#source_id').html(source_html);
             var status_html ="<option value=''>Select Lead Status</option>";
            $.each(response.lead_status, function(i, item) 
            {
                status_html += '<option rel="'+response.lead_status[i].id+'" value="'+response.lead_status[i].status_name+'">'+response.lead_status[i].status_name+'</option>';
            });
            $('#status_id').html(status_html);
            var crm_user_name = "<?php echo $this->session->balance_session['first_name']?>";
            var assign_to_add_html ="<option value=''>Assign this Lead to:</option>";
            $.each(response.assign_to_list, function(i, item) 
            {
            if(crm_user_name == response.assign_to_list[i].crm_user){
                assign_to_add_html += '<option rel="'+response.assign_to_list[i].admin_id+'" value="'+response.assign_to_list[i].crm_user+'"selected>'+response.assign_to_list[i].crm_user+'</option>';
            }else{
                assign_to_add_html += '<option rel="'+response.assign_to_list[i].admin_id+'" value="'+response.assign_to_list[i].crm_user+'">'+response.assign_to_list[i].crm_user+'</option>';
            }
            });
            $('#assign_to_add').html(assign_to_add_html);
            //  $('#add_lead_popup').html();
            $('#add_lead_popup').modal('show');
      },
      complete:function(){
          $("#cover-spin").hide();
      }
      });
}

 


$(document).on('change', '#state', function(){
    
    var state_id = $(this).val();
    var url = "https://www.balancenutrition.in/sales_crm/lead/get_city";
    $('#cities').val('');
    
    $.ajax({
       type: "POST",
       url: url,
       data: {state_id: state_id},
       dataType:'json',
       success: function(response){
           
           var cities_html = "<option value=''>Select City</option>";
           $.each(response.cities, function(i, item) 
            {
                cities_html += '<option value="'+response.cities[i].city_name+'" rel="'+response.cities[i].city_id+'">'+response.cities[i].city_name+'</option>';
                
            });
            
            $('#cities').html(cities_html);
            
       }
      });
});

$(document).ready(function(){
    
    // avinash added this for add lead popup=============================================
	   
	    $('#reminder_dt1').on('change',function(){
	        // console.log('<?php echo base_url()?>sales_crm/user_details/user_details/getPendingCallSlots');
	        var date = $(this).val();
	        var counsellor_id = "<?php echo $_SESSION['balance_session']['admin_id'];  ?>";
	        $.ajax({
	          type : 'post',
	           url: '<?php echo base_url()?>user_details/getPendingCallSlots',
	           data: {date:date,counsellor_id:counsellor_id},
	           dataType: 'text',
	           success:function(response){
	            //   alert('yess');
	            //  alert(response);
	              $('#reminder_time1').html(response);
	            //   if(response.status == 200){
	            //         get_client_details();
	            //         }
	               
	                //console.log(html);
	           }
	        }) ;
	    })
	   
	   //=========================================================================================
	    
    
    
    
    
    $("#date_of_birth").change(function(){
    var today = new Date();
    var birthDate = new Date($('#date_of_birth').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
   $('#age').val(age);
});
    
    $('.logger').on('click',function(){
        // alert("hello");
        // $('#madical').addClass('d-none');
        // $('#multi_span').removeClass('d-none');
        // $('.logger').focus();
        $('.logger').attr('data-before','');
        // $(this).attr('data-before','');       
    });
    
    $('.next_show_form').on('click',function(){
        $('.second_mobPage_form').removeClass('d-none');
        $('.first_mobPage_form').addClass('d-none');
    });
    
    $('.back_show_form').on('click',function(){
        $('.second_mobPage_form').addClass('d-none');
        $('.first_mobPage_form').removeClass('d-none');
    });
    
    $("#reset_form").on('click',function(){
        $("#state option").remove();
        $("#cities option").remove();
    });
    
    $(".submit_btn").on('click', function(){
        var valid= 0;
        var email =$("#email_id").val();
        var phoneNumber = $('#phone').val().replace(/[_\W]+/g, "");
        var code = $("#phone").intlTelInput("getSelectedCountryData").dialCode;
        var name = $("#phone").intlTelInput("getSelectedCountryData").name;
        var country_code = ($("#phone").intlTelInput("getSelectedCountryData").iso2).toUpperCase();
        var value1 = $(".logger").data('value');
        $('#health_category').val(value1);
        // alert($('#health_category').val());
        if($("#first_name").val()==''){
            //alert("please fill the name");
            alert("please fill the name");
            $("#first_name").focus().css("border-color","red");
            return false;    
        }else if($("#phone").val()==''){
            alert("please fill the phone number");
            $("#phone").focus().css("border-color","red");
            return false;    
        }/*else if($("#email_id").val()==''){
            alert("please fill the email");
            $("#email_id").focus().css("border-color","red");
            return false;    
        }*/else if($("#source_id").val()==''){
            alert("please select  source");
            $("#source_id").css("border-color","red");
            return false;    
        }else if($("#gender").val()==''){
            alert("please select gender");
            $("#gender").focus().css("border-color","red");
            return false;    
        }else if($("#status_id").val()==''){
            alert("please select status");
            $("#status_id").css("border-color","red");
            return false;    
        }else if($('input[type=radio][name=gender]:checked').length == 0){
            alert("please select gender");
            $(".m-radio>span").css("border-color","red");
            return false;
        }else if(country_code == 'IN'){
            //console.log("India");
            if(phoneNumber.length!=10){
                        alert("Please Enter Valid 10 Digit Number!");
                        $("#phone").focus().css("border-color","red");
                        return false;
            }else{//console.log(" :: else");
                var form = $('#m_form_1');
                console.log(form.serialize());
                var url = "https://www.balancenutrition.in/sales_crm/lead/add_lead_data"; 
                $.ajax({
                   type: "POST",
                   url: url,
                   data: form.serialize(),
                //   dataType:'json',
                beforeSend: function () {
                           $("#cover-spin").show();
                           },
                   success: function(response){
                       
                      var response =JSON.parse(response);
                       console.log(response.text_msg);
                        if(response){
                            if(response.text_msg =='Lead Already Exists.'){
                                swal_title='Oops!';
                                swal_type = 'info';
                            }else{
                                swal_title='Success!';
                                swal_type = 'success';
                            }
                              swal({
                                  title: swal_title,
                                  html: response.text_msg,
                                  type: swal_type,
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  confirmButtonText: 'View Lead',
                                  confirmButtonPadding:'0',
                              }).then((result) => {
                                  if(result.value == true){
                                      $('#reset').trigger('click');
                                    //   $('.msf_multiselect').val();
                                    //   $('.msf_multiselect').html();
                                       $('#add_lead_popup').modal('hide');
                                  window.open("https://www.balancenutrition.in/sales_crm/user_details?user_email="+response.email_id+"&user_status=lead",'_blank');
                                  location.reload();
                                }else{
                                //   location.reload();
                                $('#add_lead_popup').modal('hide');
                                   $('#reset').trigger('click');
                                    // $('.msf_multiselect').val();
                                    // $('.msf_multiselect').html();
                                    location.reload();
                                }
                              })
                              }else{
                                   
                              }
                    },
                    complete:function(){
                        $("#cover-spin").hide();
                    },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error get data from ajax');
                      }
                });
            }
        }else if(country_code != 'IN'){
                var email =$("#email_id").val();
                var code = $("#phone").intlTelInput("getSelectedCountryData").dialCode;
                var phoneNumber = $('#phone').val().replace(/[_\W]+/g, "");
                var name = $("#phone").intlTelInput("getSelectedCountryData").name;
                var country_code = ($("#phone").intlTelInput("getSelectedCountryData").iso2).toUpperCase();
                var phone_code = code;
                $('#phone_code').val("+"+phone_code);
                $('#country').val(name);
                $.ajax({
                  type: "POST",
                  url: "https://www.balancenutrition.in/sales_crm/lead/mobile_number_verify",
                  data: {phoneNumber: phoneNumber,country_code:country_code},
                  dataType:'json',
                  beforeSend: function () {
                           $("#cover-spin").show();
                           },
                  success: function(data){
                      console.log(data);
                      if(data.valid !=true){
                        alert("Please Fill The Valid Phone Number");
                        $("#phone").focus().css("border-color","red");
                        return false;
                      }else{
                        var form = $('#m_form_1');
                        console.log(form.serialize());
                        var url = "https://www.balancenutrition.in/sales_crm/lead/add_lead_data"; 
                        $.ajax({
                           type: "POST",
                           url: url,
                           data: form.serialize(),
                        //   dataType:'json',
                           success: function(response){
                               var response =JSON.parse(response);
                               console.log(response);
                                if(response){
                                    if(response.text_msg=='Lead Already Exists.'){
                                        swal_title='Oops!';
                                        swal_type = 'info';
                                    }else{
                                        swal_title='Success!';
                                        swal_type = 'success';
                                    }
                                      swal({
                                          title: swal_title,
                                          html: response.text_msg,
                                          type: swal_type,
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          confirmButtonText: 'View Lead',
                                          confirmButtonPadding:'0',
                                      }).then((result) => {
                                          if(result.value == true){
                                          $('#reset').trigger('click');
                                          $('.msf_multiselect').val();
                                           $('.msf_multiselect').html();
                                           $('#add_lead_popup').modal('hide');
                                  window.open("https://www.balancenutrition.in/sales_crm/user_details?user_email="+response.email_id+"&user_status=lead",'_blank'); 
                                        }else{
                                            $('#add_lead_popup').modal('hide');
                                   $('#reset').trigger('click');
                                    $('.msf_multiselect').val();
                                    $('.msf_multiselect').html();
                                        }
                                      })
                                      }else{
                                           
                                      }
                            },
                            complete:function(){
                            $("#cover-spin").hide();
                            },
                              error: function (jqXHR, textStatus, errorThrown)
                              {
                                  alert('Error get data from ajax');
                              }
                        });
                    }
                   },
                });
        }
    });
    
    // $(".bulk_add_task_btn").on("click", function(){
    //     var lead_bulk_text = $("#bulk_lead_add textarea").val();
    //     // alert(form.serialize());return false;
    //     var url = "<?= base_url('//lead/add_lead_data')?>"; 
    //     $.ajax({
    //       type: "POST",
    //       url: url,
    //       data: {quick_access:1,lead_data:lead_bulk_text},
    //       dataType:'json',
    //       success: function(response){
    //           swal({text:'Submit Successfully !',timer:5e1});
    //           window.location.reload();
    //         }
    //     });
    // });
});
 
 var select2 = new MSFmultiSelect(
    document.querySelector('#multiselect2'),
    {
      theme: 'theme2',
      selectAll: true,
      searchBox: true,
      width: '470px',
      height: '45px',
      // readOnly: true,
      onChange:function(checked, value, instance) {
        console.log(checked, value, instance);
        transform: 'rotate(0deg)';
      },
      
      // appendTo: '#myselect',
      //readOnly:true,
      autoHide: true
    }
    
    
  );  
  
  $(function () {
      $('input').keypress(function (e){
          $(this).css("border-color","black");
      })
      $('select').focus(function (e){
          $(this).css("border-color","black");
      })
      $('.m-radio').on('click',function(){
          $('.m-radio>span').css("border-color","black");
      })
    //   $('#multiselect2').on('click',function(){
    //       $(document).find(".open").css("transform","rotate(0deg)");
    //   })
      
      
      $('#phone').keypress(function (e) {    
                var charCode = (e.which) ? e.which : event.keyCode    
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                        //display error message
                        alert("Please Input Only Digits");
                        $('#phone').focus();
                               return false;
                    }
                    
               }); 
      
            $('#phone').focusout(function () {
                var code = $("#phone").intlTelInput("getSelectedCountryData").dialCode;
                var phoneNumber = $('#phone').val().replace(/[_\W]+/g, "");
                var name = $("#phone").intlTelInput("getSelectedCountryData").name;
                var country_code = ($("#phone").intlTelInput("getSelectedCountryData").iso2).toUpperCase();
                var phone_code = code;
                $('#phone_code').val("+"+phone_code);
                $('#country').val(name);
                if(phone_code == 91){
                var url = "https://www.balancenutrition.in/sales_crm/lead/get_states";
                $('#state').val('');
                $.ajax({
                  type: "POST",
                  url: url,
                  data: {country_id: code},
                  dataType:'json',
                  success: function(response){
                       console.log(response);
                      var state_html = "<option value=''>Select State</option>";
                      $.each(response.states, function(i, item) 
                        {
                            state_html += '<option rel="'+response.states[i].state_id+'" value="'+response.states[i].state_name+'">'+response.states[i].state_name+'</option>';
                            
                        });
                        $('.state').removeClass('d-none');
                        $('.cities').removeClass('d-none');
                        $('#state').html(state_html);
                        
                  }
                  });
                }else{
                    $('.state').addClass('d-none');
                    $('.cities').addClass('d-none');
                }
            });
                
        }); 
 
</script> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">