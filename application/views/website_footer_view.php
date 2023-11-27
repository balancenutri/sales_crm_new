</div>

</div>

<style type="text/css">

.logger {
    width: 442px;
    height: 40px;
    padding-top: 4px !important;
    border-color:black !important;
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
    /*content:'\25BC';2335,2304*/
    content:'\2335';
    font-family: sans-serif, Arial;
    color:#000;
    background-color:#fff;
    margin-left:310px;   /* remove the damn :after space */
    font-weight: bold;; /* let the click pass trough */
}

.swal2-confirm , .swal2-cancel{
    padding:10px !important;
}

.swal2-cancel{
    width: 80px !important;
}


.swal2-icon.swal2-success [class^='swal2-success-line'][class$='tip'] {
    top: 1.5em;
    left: 3px;
    width: 18px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}


.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{
    top: -.4375em;
    left: -2.0635em;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
    -webkit-transform-origin: 3.75em 3.75em;
    transform-origin: 3.75em 3.75em;
    border-radius: 7.5em 0 0 7.5em;
}

.swal2-icon.swal2-success [class^=swal2-success-line]{
    display: block;
    position: absolute;
    height: .3125em;
    border-radius: .125em;
    background-color: #a5dc86;
    z-index: 2;
}

.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{
    top: 2.875em;
    left: .875em;
    width: 1.5625em;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}

.swal2-icon.swal2-success [class^='swal2-success-line'][class$='long'] {
    right: -0.8em;
    width: 3em;
    top: 33px;
    left: 34%;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

.swal2-icon.swal2-success .swal2-success-fix{
  z-index: 0;
}

.swal2-icon.swal2-warning, .swal2-icon.swal2-info{
  font-size: 30px !important;
  line-height: 70px !important;
}

.swal2-animate-success-icon {
    position: relative;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 5em !important;
    height: 5em !important;
    margin: 1.25em auto 1.875em;
    border: .25em solid transparent;
    border-radius: 50%;
    line-height: 5em;
    cursor: default;
    -webkit-box-sizing: content-box;
    box-sizing: content-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    zoom: normal;
}

.red_dot_new {
  height: 10px;
  width: 10px;
  background-color: red;
  border-radius: 50%;
  display: inline-block;
  margin-left: 15px;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>



<?php
      if( strpos( uri_string(), 'mentor' ) !== false ) {
    $this->load->view('sidebar.php');
        
        }else
    {
        $this->load->view('client_sidebar.php');
    }
    
    // <!-- Avinash add this foa add pop-->
  
         $mentor_id = $this->session->balance_session['admin_id']; 
         $user_email = $this->session->balance_session['email_id']; 
         $pass = urlencode($this->session->balance_session['password']); 
         $pupup= 'add_lead';
 

    ?>
</div>
<div class="m-portlet chat_footer" style="
    /* height: 30px; */
    text-align: center;
    font-size: 15px;
    padding: 12px 0;
    margin-bottom: 0px;
    ">2014-<?php echo date('y'); ?> © Balance Nutrition. All Rights Reserved.</div>
</div>


<div class="modal fade" id="open_lead_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
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
                			<label class="col-form-label col-lg-3 col-sm-12" style="text-align: left;">Gender :</label>
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
                    			
                    			<div class="form-group m-form__group row" style="padding-top: 6px;">
                    				<label class="col-form-label col-lg-3 col-sm-12 d-none">Medical Issue</label>
                    				<div class="col-lg-12 col-md-12 col-sm-12 ">
                    				    <input type="text" class="form-control m-input " name="other_medical_issue" id="other_medical_issue" placeholder="Other Medical Issue" value="">
                    				</div>
                    			</div>
                    			
                    			<div class="btn-group btn-group-lg px-4 mt-3" role="group" aria-label="Large button group" style="width: 97%;margin-left:8px;height:37px;">
                				   	<span name='submit' class="btn btn-lg btn-success w-50 submit_btn">Submit</span>
                				   	<button type="button" class="btn btn-lg btn-outline-success w-50 next_show_form">Next</button>
                				</div>
            			</div>
            			<div class="second_mobPage_form desk_form_padding d-none">
            			    
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
            				
            				<div class="btn-group btn-group-lg px-4 mt-3" role="group" aria-label="Large button group" style="width: 97%;margin-left:8px;height:37px;">
            				   	<span type="submit" name='submit' class="btn btn-lg btn-success w-50 submit_btn">Submit</span>
            				   	<!--<input type="submit"  class="btn btn-success">-->
            				   	<button type="button" class="btn btn-lg btn-outline-success w-50 back_show_form">Back</button>
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




<?php $this->load->view('quicksidebar.php'); ?>

<!-- end::Quick Sidebar -->
<!--begin::Base Scripts -->        
    <script src="<?php echo CDN_COMMON_URL; ?>vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?php echo CDN_COMMON_URL; ?>demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <script src="<?php echo CDN_COMMON_URL; ?>vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script  type="text/javascript" src="<?php echo CDN_COMMON_URL; ?>demo/default/custom/components/forms/widgets/bootstrap-datepicker.js"></script>
    <script src="<?php echo CDN_COMMON_URL; ?>demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="<?php echo CDN_COMMON_URL; ?>js/mentor.js" type="text/javascript"></script>
    
    <!-- Select2 -->
    <script src="<?php echo CDN_COMMON_URL; ?>select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo CDN_COMMON_URL; ?>demo/default/custom/components/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?php echo CDN_JS_URL; ?>lazysizes.min.js" async></script>
    <!-- multi select-->
    <link rel="stylesheet" type="text/css" href="<?php echo CDN_COMMON_URL; ?>multiselect/msfmultiselect.min.css"/> 
    <script src="<?php echo CDN_COMMON_URL; ?>multiselect/msfmultiselect.js"></script>
     <!--  Country phonr code  with flag-->
    <link rel="stylesheet" href="<?php echo CDN_COMMON_URL; ?>countryFlag/css/intlTelInput.css" /> 
    <script type="text/javascript" src="<?php echo CDN_COMMON_URL; ?>countryFlag/js/intlTelInput-jquery.min.js"></script>
    
    
<script>




var BootstrapTimepicker={init:function(){ $("#m_timepicker_1").timepicker({minuteStep:5})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});

var task = <?php 


echo json_encode($calendar_data[0]['result']);  ?>;

    var CalendarBasic= {
    init:function() {
         var e=moment().startOf("day"),
         t=e.format("YYYY-MM"),
        // i=e.clone().subtract(1, "day").format("YYYY-MM-DD"),
        n=e.format("YYYY-MM-DD"),
        r=e.clone().add(1, "day").format("YYYY-MM-DD");
        $("#m_calendar").fullCalendar( {
            header: {
                left: "prev,next today", center: "title", right: "month,agendaWeek,agendaDay,listWeek"
            }
            , editable:!0, eventLimit:!0, navLinks:!0, events:task, eventRender:function(e, t) {
                t.hasClass("fc-day-grid-event")?(t.data("content", e.description), t.data("placement", "top"), mApp.initPopover(t)): t.hasClass("fc-time-grid-event")?t.find(".fc-title").append('<div class="fc-description">'+e.description+"</div>"): 0!==t.find(".fc-list-item-title").lenght&&t.find(".fc-list-item-title").append('<div class="fc-description">'+e.description+"</div>")
            }
        }
        )
    }
}

;
$(document).ready(function() {
   

    CalendarBasic.init()
}

);
</script> 

<script>
$(document).ready(function(){
    var create_access="<?php echo $create_access; ?>";
    if(create_access=='0')
    {
        
    }
})
</script>

<script>

$(document).ready(function(){
    //all_counts_notify();

    $('.common_notification').on('click', function(e) 
      { 
        //   $('.milengoal_animate, .hs_animate, .goal_animate').removeAttr('id');
          
          var notifyId = $(this).attr('data-id');
          
          if(notifyId=="milestone_notification"){
            //   alert(1);
            //   $('.milestone_animate').removeAttr('id');
            //   $(".today_milestone_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }else if(notifyId=="goal_notification"){
            //   alert(2);
            //   $('.goal_animate').removeAttr('id');
            //   $(".today_goal_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }else if(notifyId=="hs_notification"){
            //   alert(3);
            //   $('.hs_animate').removeAttr('id');
            //   $(".today_hs_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }else if(notifyId=="ti_notification"){
              triger_tiTailend_ajax(notifyId);
              
          }
          else if(notifyId=="call_notification"){
            //   alert(3);
            //   $('.omr_animate').removeAttr('id');
            //   $(".today_hs_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }
          else if(notifyId=="omr_notification"){
            //   alert(3);
            //   $('.omr_animate').removeAttr('id');
            //   $(".today_hs_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }
          else if(notifyId=="bday_notification"){
            //   $('.omr_animate').removeAttr('id');
            //   $(".today_hs_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }
          else if(notifyId=="reminder_notification"){
            //   $('.omr_animate').removeAttr('id');
            //   $(".today_hs_count").addClass('d-none');
              triger_client_status_ajax(notifyId);
              
          }else if (notifyId=="pageVisit"){
              triger_client_status_ajax(notifyId);
          }
// add by sanjay on 23-10-2021
          else if (notifyId=="balancedue_overdue_notification"){
              triger_client_status_ajax(notifyId);
          }
// End Here
      });

});

function triger_client_status_ajax(notifyId){
    // alert('Yesss');
    $.ajax({
       url : "<?php echo base_url().'dashboard/mentor/client_status_sec'; ?>",
       type: "POST",
       dataType:"JSON",
       success: function(response)
       {  

           if(response)
           {
                $('.today_milestone').html(response["today_milestone"]);
                $('.mtd_milestone').html(response["mtd_milestone"]);
                $('.all_milestone').html(response["all_milestone"]);
                $('.today_tailend_goal').html(response["today_tailend_goal"]);
                $('.mtd_tailend_goal').html(response["mtd_tailend_goal"]);
                $('.all_tailend_goal').html(response["all_tailend_goal"]);
                $('.today_omr_notification').html(response["today_omr_notification"]);
                $('.mtd_omr_notification').html(response["mtd_omr_notification"]);
                $('.all_omr_notification').html(response["all_omr_notification"]);
                $('.last_thirty_days_omr_notification').html(response["last_thirty_days_omr_notification"]);
                $('.today_health_score_active').html(response["today_health_score_active"]);
                $('.mtd_health_score_active').html(response["mtd_health_score_active"]);
                $('.today_health_score_omr').html(response["today_health_score_omr"]);
                $('.mtd_health_score_omr').html(response["mtd_health_score_omr"]);
                $('.all_health_score').html(response["all_health_score"]);
                $('.last_thirty_days_health_score').html(response["last_thirty_days_health_score"]);
                $('.welcome_call_notification').html(response["todays_welcome_call"]);
                $('.feedback_call_notification').html(response["todays_feedback_call"]);
                $('.progress_call_notification').html(response["todays_progress_call"]);
                $('.unanswered_call_notification').html(response["unanswered_call"]);
                
                $('.future_reminders_notification').html(response["future_reminder_count"]);
                $('.today_reminders_notification').html(response["today_reminder_count"]);
                $('.tomorrow_reminders_notification').html(response["tomorrow_reminder_count"]);
                
                $('.active_bday_notification').html(response["active_bday_today"]);
                $('.omr_bday_notification').html(response["omr_bday_today"]);
                
                $('.today_program_page').html(response["today_program_page"]);
                $('.mtd_program_page').html(response["mtd_program_page"]);
                $('.today_checkout_page').html(response["today_checkout_page"]);
                $('.mtd_checkout_page').html(response["mtd_checkout_page"]);
            // add by sanjay on 23-10-2021
                $('.balance_due_new').html(response["balance_due_new"]);
                $('.balance_overdue_new').html(response["balance_overdue_new"]);
            // end here    
           }else{
               
           }
           
       },
        complete: function(){
            
            if(notifyId=="milestone_notification"){
                $("#milestone_notification").removeAttr("data-id");
            }else if(notifyId=="goal_notification"){
                $("#goal_notification").removeAttr("data-id");
            }else if(notifyId=="hs_notification"){
                $("#hs_notification").removeAttr("data-id");
            }
            
        },
       error: function (jqXHR, textStatus, errorThrown)
       {
           alert('Error get data from ajax');
       }
   }) 
}

function triger_tiTailend_ajax(notifyId){
    
     $.ajax({
           url : "<?php echo base_url().'dashboard/mentor/tlTailEnd_sec'; ?>",
           type: "POST",
           dataType:"JSON",
           success: function(response)
           {
               
            //   alert(JSON.stringify(response));
              
               if(response)
               {                          
                   $('.tail_end_all').html(response["tail_end"][0]["count"]);
                   $('.tail_end_zero_session').html(response["tail_end_zero_session"][0]["count"]);
                   $('.tail_end_one_session').html(response["tail_end_one_session"][0]["count"]);
                   $('.tail_end_two_session').html(response["tail_end_two_session"][0]["count"]);
                   $('.tail_end_three_session').html(response["tail_end_three_session"][0]["count"]);
               }else{
                   
               }
               
           },
           complete: function(){

                if(notifyId=="ti_notification"){
                    $("#ti_notification").removeAttr("data-id");
                }
                
            },
           
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Error get data from ajax');
           }
       })
}
                    
$(document).on("click", ".m-dropdown--open", function(){
    $("#milestone_notification").attr("data-id", "milestone_notification");
    $("#goal_notification").attr("data-id", "goal_notification");
    $("#hs_notification").attr("data-id", "hs_notification");
    $("#ti_notification").attr("data-id", "ti_notification");
});

setInterval(all_counts_notify, 1000 * 60 * 60); 
//setInterval(all_counts_notify, 500); 


   function reply_omr_notification( omr_id ='', user_id = '')
   {
    
    $.ajax({
   
                         type: 'POST',
                         url: base_url+'dashboard/mentor/omr_ack',
                         data: {omr_id:omr_id},
                         success: function (data) 
                         {
                             if(data==1)
                             {
                                window.open("<?php echo base_url('client-details/');?>"+ user_id +"/profile", '_blank');     
   
                             }else{
                                Swal.fire({
                                            type: 'error',
                                            title: 'Oops...',
                                            text: 'Something went wrong!',
                                            footer: 'Kindly Contact Tech Team'
                                         });
                             }
                             
                         },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                             alert('Error get data from ajax');
                          }
                      
                   });
   
   }

function all_counts_notify(){
    
        $.ajax({
            type:"POST", 
            url: "<?php echo base_url().'dashboard/mentor/get_all_counts_notification'; ?>",
            dataType:'json',
            success: function(response)
            {
                var urlz="<?php echo base_url(); ?>";
                var html_ctn = "";
                
                // hide by sanjay on 13/08/2021 
                /*if(response['tailendgoal_count'] > 0){
                    $(".today_goal_count").removeClass('d-none').html(response['tailendgoal_count']);
                    $('.goal_animate').attr('id',"m_topbar_notification_icon");
                }*/
                 $(".today_goal_count").removeClass('d-none').html('+'); // add by sanjay on 13/08/2021

                // hide by sanjay on 13/08/2021   
                /*if(response['milengoal_count'] > 0){
                    $(".today_milestone_count").removeClass('d-none').html(response['milengoal_count']);
                    $('.milestone_animate').attr('id',"m_topbar_notification_icon");
                }
                */

             $(".today_milestone_count").removeClass('d-none').html('+'); // add by sanjay on 13/08/2021

                /*if(response['hs_count'] > 0){
                 $(".today_hs_count").removeClass('d-none').html(response['hs_count']);
                 $('.hs_animate').attr('id',"m_topbar_notification_icon");
                }*/
                if(response['id_upgrade'] > 0){
                $(".id_upgraded").removeClass('d-none');
                }
               $(".today_hs_count").removeClass('d-none').html('+');
                
                // hide by sanjay on 13/08/2021    
                /*if(response['ti_count'] > 0){
                 $(".today_ti_count").removeClass('d-none').html(response['ti_count']);
                 $('.ti_animate').attr('id',"m_topbar_notification_icon");
                }*/
              
                $(".today_ti_count").removeClass('d-none').html('+'); // add by sanjay on 13/08/2021
                
                if(response['call_notification_count'] > 0){
                    $(".today_call_count").removeClass('d-none').html(response['call_notification_count']);
                    $('.call_animate').attr('id',"m_topbar_notification_icon");
                }
                
                if(response['omr_notification_count'] > 0){
                    $(".today_omr_count").removeClass('d-none').html(response['omr_notification_count']);
                    $('.omr_animate').attr('id',"m_topbar_notification_icon");
                }
                
                if(response['unanswered_queries_count'] > 0){
                    $(".today_query_count").removeClass('d-none').html(response['unanswered_queries_count']);
                    $('.query_animate').attr('id',"m_topbar_notification_icon");
                }
                
              if(response['today_reminder_count'] > 0){
                    $(".today_reminder_count").removeClass('d-none').html(response['today_reminder_count']);
                    $('.call_animate').attr('id',"m_topbar_notification_icon");
                }
                /* hide by sanjay on 16/08/2021
                if(response['bday_notification_count'] > 0){
                    $(".today_bday_count").removeClass('d-none').html(response['bday_notification_count']);
                    $('.bday_animate').attr('id',"m_topbar_notification_icon");
                }*/
                $(".today_bday_count").removeClass('d-none').html('+');
                
                // hide by sanjay on 13/08/2021   
                /*if(response['today_program_page_count'] > 0){
                    $(".today_program_page_count").removeClass('d-none').html(response['today_program_page_count']);
                    $('.pv_animate').attr('id',"m_topbar_notification_icon");
                }*/
                 
                $(".today_program_page_count").removeClass('d-none').html('+'); // add by sanjay 13/08/2021
                
                //$('.hs_notification').removeAttr('data-id');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               alert(errorThrown);
            }
    
        });
    //triger_client_status_ajax();
}
     
   $(document).ready(function()
   {
       <?php  $client_id=$this->uri->segment(2);?>
       
       $("#ask_mygoal_home").on("click", function()
      {
          var client_id = "<?php echo $client_id?>";
          var notification_type = "ask_mygoal";
                
            send_notification(client_id,notification_type)
        
      });
      $("#ask_milestone_home").on("click", function()
      {
            var client_id = "<?php echo $client_id?>";
            var notification_type = "ask_milestone";         
            send_notification(client_id,notification_type)
        
      });
      
      $("#tail_end").on("click", function()
      {
            var client_id = "<?php echo $client_id?>";
            var notification_type = "tail_end";         
            send_notification(client_id,notification_type)
        
      });
      
      $("#ask_healthscore_home").on("click", function()
      {
            var client_id = "<?php echo $client_id?>";
            var notification_type = "health_score";         
            send_notification(client_id,notification_type)
        
      });
      
      $("#tailend_first_reminder").on("click", function()
      {
            var client_id = "<?php echo $client_id?>";
            var notification_type = "tailend_first_reminder";         
            send_notification(client_id,notification_type)
        
      });
       
       
       
       
        $('#menu_table').DataTable({
                    "dom": '<"dtoolbar">frtip'

        });
        
         $("div.dtoolbar").html('<a class="btn btn-primary" href="http://localhost/crm_ui/index.php/security/add-menu" role="button">Add New menu</a>');
    
    });
    
    function send_notification(client_id,notification_type){
                                    
        $.ajax({
            url: "<?php echo base_url().'client/client/send_client_notifications/'; ?>",
            type: "POST",
            data:  {client_id:client_id,notification_type:notification_type},
            success: function(data){ 
                console.log(data);
                if(data == 1)
                {
                    
                    swal(
                            'Notification sent successfully',
                            '',
                            'success'
                            ) 
                    
                    
                }
                else if(data == 0){
                    swal(
                            'Sorry notification not send successfully.',
                            '',
                            'failure'
                            ) 
                    
                    
                }
            },
            error: function(){}             
        });     
}
               function theFunction () 
               {
                    $('body').toggleClass('m-quick-sidebar--on');
                    $('#m_quick_sidebar').toggleClass('m-quick-sidebar--on');
                    $('.m-quick-sidebar__content').removeClass('m--hide');
                    $('#custom-overlay').toggleClass('custom-overlay');
                }

                $('#custom-overlay').on('click', function(e) 
                {  
                    $('#custom-overlay').toggleClass('custom-overlay');
                    $('body').toggleClass('m-quick-sidebar--on');
                    $('#m_quick_sidebar').toggleClass('m-quick-sidebar--on');
                    $('.m-quick-sidebar__content').addClass('m--hide');
                });

                $('#custom_close').on('click', function(e) 
                { 
                    $('#custom-overlay').toggleClass('custom-overlay');
                    $('body').toggleClass('m-quick-sidebar--on');
                    $('#m_quick_sidebar').toggleClass('m-quick-sidebar--on');
                    $('.m-quick-sidebar__content').addClass('m--hide');
                });




    // dropdown tab toggle : start
    $(document).ready(function(){
        
        $(".activetab_dropdown").click(function()
        {
            var selectedtab = $(this).attr("data-id");            
            //
            /*if(selectedtab == 'select')
            {
                $(document.body).addClass('m-brand--minimize m-aside-left--minimize');
                
            }else{*/
                //alert(selectedtab);            
                $(document.body).removeClass('m-brand--minimize m-aside-left--minimize');
                // $('.chat_list .nav-link:first-child').addClass('active show');
                $('#'+selectedtab+'_link').addClass('active show');
                var tabhref = $('#'+selectedtab+'_link').attr('href');
                //alert(tabhref);            
                var tab = tabhref.replace('#','');
                console.log(tab);
                $('.tab-pane.active').removeClass('active show'); 
                $('#m_tabs_chat_unread').addClass('active show'); 
                

                var client_id= "<?php echo $client_id; ?>";
                $("#"+tab).html('');
                
                var chat = 1;
                
                if("<?= $this->uri->segment(1) ?>" == 'tabchats-view'){
                    chat = 0;
                }

                if(client_id!="")
                {
                    $.ajax({
                            type:"post",
                            url:"<?php echo base_url('client/profiler/')?>"+client_id+'/'+selectedtab+"/"+chat,
                            success: function(response){
                                $("#"+tab).html(response);
                            }

                        });
                }

                $("#"+tab).addClass('active');
            //}
        });
       
        $("select.activetab").change(function()
        {
            var selectedtab = $(".activetab option:selected").val();            
            /*alert(selectedtab);*/            
            if(selectedtab == 'select')
            {
                $(document.body).addClass('m-brand--minimize m-aside-left--minimize');
                
            }else if(selectedtab == 'tabchat')
            {
                var client_id=$(this).attr("data-id");
                <?php if(!in_array($this->uri->segment(1), array('tabchats-view')) ){?>
                    window.open(base_url+"tabchats-view/"+client_id)
                <?php } ?>
                
            }else{

                $(document.body).removeClass('m-brand--minimize m-aside-left--minimize');
                $('.nav-link.active').removeClass('active show');
                $('#'+selectedtab+'_link').addClass('active show');
                var tabhref = $('#'+selectedtab+'_link').attr('href');
                var tab = tabhref.replace('#','');
                console.log(tab);
                $('.tab-pane.active').removeClass('active show');   
                

                var client_id=$(this).attr("data-id");
                $("#"+tab).html('');

                if(client_id!="")
                {
                    $.ajax({
                            type:"post",
                            url:"<?php echo base_url('client/profiler/')?>"+client_id+'/'+selectedtab,
                            success: function(response){
                                $("#"+tab).html(response);
                            }

                        });
                }

                $("#"+tab).addClass('active');
            }
        });

    });
    // dropdown tab toggle : end
 


    $(function(){
 
     if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    // This is just for the "add content" links.
    }else{
//    alert('heelooo');
    // Bind resize event handlers.
    var i = 0;
    $('.m-portlet').resize(function(event){
        var div = $(this),
            size = div.width() + 'x' + div.height();
      console.log(size);
      if(div.width() < 1200 && div.width() > 775){
           $('.col-xl-2').attr('style','max-width: 33.33%;flex:0 0 33.33%');
           $('.col-xl-3').css({'flex':'0 0 50%','max-width':'50%'});
           $('.custom-lg').attr('style','max-width: 100%;flex:0 0 100%');
//         alert('yes');
       }else{
             $('.col-xl-2').attr('style','');
             $('.col-xl-3').attr('style','');
             $('.custom-lg').attr('style','');
//         alert('no');
      }
    });
    
    // Trigger resize handler manually.
    $('.m-portlet').resize();
    }
});

//////////////////////////////////////////////////
// THE FOLLOWING CODE IS TAKEN FROM THE EXAMPLE //
//////////////////////////////////////////////////

(function($){
  
  // A collection of elements to which the resize event is bound.
  var elems = $([]),
  
    // An id with which the polling loop can be canceled.
    timeout_id;
  
  // Special event definition.
  $.event.special.resize = {
    setup: function() {
      var elem = $(this);
      
      // Add this element to the internal collection.
      elems = elems.add( elem );
      
      // Initialize default plugin data on this element.
      elem.data( 'resize', { w: elem.width(), h: elem.height() } );
      
      // If this is the first element to which the event has been bound,
      // start the polling loop.
      if ( elems.length === 1 ) {
        poll();
      }
    },
    teardown: function() {
      var elem = $(this);
      
      // Remove this element from the internal collection.
      elems = elems.not( elem );
      
      // Remove plugin data from this element.
      elem.removeData( 'resize' );
      
      // If this is the last element to which the event was bound, cancel
      // the polling loop.
      if ( !elems.length ) {
        clearTimeout( timeout_id );
      }
    }
  };
  
  // As long as a "resize" event is bound, this function will execute
  // repeatedly.
  function poll() {
    
    // Iterate over all elements in the internal collection.
    elems.each(function(){
      var elem = $(this),
        width = elem.width(),
        height = elem.height(),
        data = elem.data( 'resize' );
      
      // If element size has changed since the last time, update the element
      // data store and trigger the "resize" event.
      if ( width !== data.w || height !== data.h ) {
        data.w = width;
        data.h = height;
        elem.triggerHandler( 'resize' );
      }
    });
    
    // Poll, setting timeout_id so the polling loop can be canceled.
    timeout_id = setTimeout( poll, 250 );
  }

})(jQuery);


    </script>
    <script src="<?php echo CDN_URL.'common/ckeditor/ckeditor.js' ?>"></script>
    
    <script>
    
       $(document).ready(function(){
        CKEDITOR.replace("ck2");
        CKEDITOR.replace("ck3");
        CKEDITOR.replace("ck4");
        CKEDITOR.replace("ck5");
        CKEDITOR.replace("ck6");
        CKEDITOR.replace("ck7");
        CKEDITOR.replace("ck8");
        CKEDITOR.replace("ck9");
        CKEDITOR.replace("ck10");
        CKEDITOR.replace("ck11");
        CKEDITOR.replace("ck12");
        CKEDITOR.replace("ck13");
        CKEDITOR.replace("ck14");
        CKEDITOR.replace("ck15");
        CKEDITOR.replace("ck16");
        CKEDITOR.replace("ck17");
        CKEDITOR.replace("ck18");
       });
       
       
       $(document).ajaxSend(function(){
    // $('#loadingmessage').fadeIn(250);
});
$(document).ajaxComplete(function(){
    // $('#loadingmessage').fadeOut(250);
});


    </script>
<script>
$(function(){
var result;

    
    if (window.location.href.lastIndexOf('chat') > 0) 
    {
        result = 'tabchat';

    }else if(window.location.href.lastIndexOf('client-feedback') > 0){
        
        result = 'tabfeedback';
        
    }else if(window.location.href.lastIndexOf('client-goal') > 0){
        
        result = 'tabNewGoal';
        
    }else if(window.location.href.lastIndexOf('tailend-details') > 0){
        
        result = 'tabtailend';

    }else if(window.location.href.lastIndexOf('weight-tracker') > 0){
        
        result = 'tabWeightTracker';

    }else if(window.location.href.lastIndexOf('photo') > 0){
        
        result = 'tabPhoto';

    }else if(window.location.href.lastIndexOf('health-score') > 0){
        
        result = 'tabHealthScore';

    }else if(window.location.href.lastIndexOf('inchloss-tracker') > 0){
        
        result = 'tabInchLossTracker';

    }else if(window.location.href.lastIndexOf('food-diary') > 0){
        
        result = 'tabfooddiary';

    }else if(window.location.href.lastIndexOf('assessment') > 0){
        
        result = 'tabAssessment';

    }else if(window.location.href.lastIndexOf('ingredient-checklist') > 0){
        
        result = 'tabingredientchecklist';

    }else if(window.location.href.lastIndexOf('client-journey') > 0){
        
        result = 'tabjourney';

    }else if(window.location.href.lastIndexOf('emails') > 0){
        
        result = 'tabEmails';

    }else if(window.location.href.lastIndexOf('client-status') > 0){
        
        result = 'tabclientstaus';

    }else if(window.location.href.lastIndexOf('short-program') > 0){
        
        result = 'tabShortVersion';

    }else if(window.location.href.lastIndexOf('client-wallet') > 0){
        
        result = 'tabwallet';

    }else if(window.location.href.lastIndexOf('all-tracker') > 0){
        
        result = 'taballtracker';

    }else if(window.location.href.lastIndexOf('welcome-call') > 0){
        
        result = 'tabwelcomecall';

    }else if(window.location.href.lastIndexOf('client-details') > 0){
        
        result = 'tabprofile';

    }
    
    $(".activetab").val(result).trigger('change');
})
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //  $(".activetab").val('tabfooddiary').trigger('change');
     $(".custom_date_picker").datetimepicker({todayHighlight:!0,autoclose:!0,pickerPosition:"bottom-right",format:"yyyy-mm-dd hh:ii"});
      $(".custom-datepicker").datepicker();
    $('#example').DataTable( {
        "deferRender": true
    } );
  
} );
    </script>

<script>

function select_all_check(){
           
    //   $(".export_check").prop('checked', true);
    if ($(".select_all").is(':checked'))
        $(".export_check").prop('checked', true);
        //  $(this).prop('checked', true);
    else
        $(".export_check").prop('checked', false);
        //  $(this).prop('checked', false);
    
}
 
function export_list(type,date_range) { 
       if (confirm("Are you sure want to export?")) {
           var i = 0;
           var checked_elem = [];
               $('.export_check:checked').each(function () {
                   
                   checked_elem[i++] = $(this).val();
               }); 
               $(".export_check").prop('checked', false);
               $(".select_all").prop('checked',false);
            //   console.log(checked_elem);
            window.location.href = "<?php echo base_url().'dashboard/mentor/export_list?type=';?>"+type+"&date_range="+date_range+"&checked_elem="+checked_elem;
          
          
       }
    }
 
function del_common(key,value,table_name,link=''){

   swal({
   title: 'Are you sure?',
   text: "You won't be able to revert this!",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes, delete it!',
   showLoaderOnConfirm: true,
   preConfirm: function() {
      return new Promise(function(resolve) {
  $.ajax({
     url: base_url+'delete_data/delete_common',
     type: 'POST',
     data: {key:key,value:value,table_name:table_name},
     
  })
  .done(function(response){
      if(response == 1)
      {
        swal('Deleted!',"It was succesfully deleted!", "success");
        if(link!="")
        {
          window.location.href=link;  
        }else{
          window.location.reload();
        }
        
      }else{
     swal('Oops...', 'Something went wrong file not deleted !', 'error');     
      }
         })
  .fail(function(){
     swal('Oops...', 'Something went wrong with ajax !', 'error');
  });
      });
   },
   allowOutsideClick: false     
   }); 
}


     
</script>

<?php  
    
    /* checking page rights */ 
   
    /* $site_url=uri_string();

    foreach ($page_rights as $key => $value) {
        if(strpos($site_url,$key)!==false)
        {
            $create_access=in_array($this->session->balance_session['admin_id'], explode(',',$value['create_rights']));
            $update_access=in_array($this->session->balance_session['admin_id'], explode(',',$value['update_rights']));
            $delete_access=in_array($this->session->balance_session['admin_id'], explode(',',$value['delete_rights']));
        }
    } */


        
   ?>

<script>


    $(document).ready(function() {

       check_previleges();

       /* This code is writte for Tailend followups popup by vinayak - 2020-02-13 */

        popup_notification();

        /* Tailend followups popup code ends here */

    });
    
    var allow_mentor_popup = true;

    /* popup notification code start here */

    function popup_notification() 
    {
     
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);
          
          /*document.getElementById('txt').innerHTML =
          h + ":" + m + ":" + s;  */ /* To show timing on the dashboard */

          var t = setTimeout(popup_notification, 1000);

          var time= (h + ":" + m + ":" + s).toString();          

          var data= <?php echo (!empty($followup_note))?json_encode($followup_note):"0";?>; 

          if(typeof data !== "undefined" || data == "0")
          {
              for (var i = 0; i < data.length; i++) 
              {
                  console.log(i+','+time+'=>'+data[i].trigger);
                                                            
                  if($.inArray( time, [data[i].trigger] )>'-1') /* This code will match the timing in array */
                  {
                      console.log("if2");

                      Swal.fire(
                            'Followup',
                            data[i].message + ' on ' +data[i].timing+' with '+data[i].fullname,
                            'info'
                          )  /* This code will print the message */    
                       
                  }
              } 
           }

           
    }

    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
    
    function mentor_reminder_popup(){
       var today = new Date();
       var call_time = new Date(today.getTime() + 15*60000);
       
       var h = call_time.getHours();
       var m = call_time.getMinutes();
       var s = '00';
       m = checkTime(m);
       var call_time_15 = (h + ":" + m + ":" + s).toString();
    //   console.log(call_time_15);
       var data = <?php echo json_encode($today_reminder_list);?>;
    //   console.log(data);
       var h_12 = h;
       var ap = false;
       if( call_time.getHours() > 12 ){
            h_12 = checkTime(call_time.getHours() - 12);
            ap = true;
        }
        
        var time_12 = h_12+":"+m;
        
        if(ap){
            time_12 = time_12 +" PM";
        }
        else{
            time_12 = time_12+" AM";
        }
       
       if(data != null){
            for(var i = 0;i<data.length;i++){
                if(call_time_15 == data[i].reminder_time){
                    var notification_text = "<br><p style='font_size:x-large'><b>"+data[i].reminder_title+"</b></p><p style='font_size:larger'>"+data[i].reminder_text+"</p>";
                    swal({
                                title: "Due in 15 Minutes!",
                                html: notification_text,
                                confirmButtonText:"Great!"
                            }); 
                            
                    // $.ajax({
                       
                    //     type:'post',
                    //      url:base_url+'dashboard/mentor/send_reminder_mail',
                    //      data: {reminder_id:data[i].id},
                    //      success:function(response)
                    //      {
                    //      }
                    // });
                     
                }
                
                
                  
            }
       }
       
       
    }
    
    function call_reminder_popup(){

        var today = new Date();
        //for 15 min
        var call_time = new Date(today.getTime() + 15*60000);

          var h = '00';
          if( call_time.getHours() > 12 ){
            h = checkTime(call_time.getHours() - 12);
          }else{
            h = checkTime(call_time.getHours());
          }
          var m = call_time.getMinutes();
          var s = '00';
          m = checkTime(m);

        var call_time_15 = (h + ":" + m + ":" + s).toString();

        //for 5 min
        var call_time = new Date(today.getTime() + 5*60000);

          var h = '00';
          if( call_time.getHours() > 12 ){
            h = checkTime(call_time.getHours() - 12);
          }else{
            h = checkTime(call_time.getHours());
          }
          var m = call_time.getMinutes();
          var s = '00';
          m = checkTime(m);  

        var call_time_5 = (h + ":" + m + ":" + s).toString();  

        var data = <?php echo json_encode($today_call_list);?>; 
        if(data != null){
            for(var i = 0;i<data[0].result.length;i++){
                var type = '';
                    if(data[0].result[i].call_type == '0'){
                        type = 'welcome';
                    }else if(data[0].result[i].call_type == '1'){
                        type = 'half time progress';
                    }else if(data[0].result[i].call_type == '2'){
                        type = 'final feedback (Tailend)';
                    }

                if(call_time_15 == data[0].result[i].time_slot){
                    
                    var notification_text = "Your "+type+" call with <a target='_blank' href='client-details/"+data[0].result[i].id+"'>"+data[0].result[i].name+"</a> is due in 15 min.";
                    
                    swal({
                        title: notification_text,
                        showConfirmButton: true
                    });
                }
                else if(call_time_5 == data[0].result[i].time_slot){
                  var notification_text = "Your "+type+" call with <a target='_blank' href='client-details/"+data[0].result[i].id+"'>"+data[0].result[i].name+"</a> is due in <span style='color:red'>5 min</span>.";
                    
                    swal({
                        title: notification_text,
                        showConfirmButton: true
                    });
                }
            }
        }

    }
    function below_4_rating_list(){
        window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/common_feedback_fuction?program=ht_below4", '_blank').focus();
        // window.location.href = ;
    }
    
    function validity_getting_over_tomorrow(){
         window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/getDropoutClientList?program=dropout_tomorrow_active", '_blank').focus();
        // window.location.href = ;
    }
    
     function validity_getting_over_day_after_tomorrow(){
         window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_active", '_blank').focus();
        // window.location.href = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/getDropoutClientList?program=dropout_day_after_tomorrow_active";
    }
    
    
    
    function mentor_popups(){
        
       var today = new Date();
       var h = today.getHours();
       var m = today.getMinutes();
       var d = today.getDay();
       
    //   console.log(h+"==>"+m);
    //   return false;
      if(h == 13 && m == 0){
          //To be added :- 16-09-2021
          //Show only if new OMR HS is there
            // New OMR Hs Received
            
            // 3 new omr hs recd in last 24 hours!
            
            // View Now
           swal({
               title: 'Have you seen your OMR HS today?',
               text: "",
               type: 'success',
               showCancelButton: true,
               cancelButtonText:"Later",
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Check Now',
           }).then((result) => {
              if(result.value == true){
                  mentor_popup_list("mtd_health_score_omr");
              }
          });
      }else if(h == 13 && m == 40){
          //New Milestone or goal received
        //   swal({
        //       title: 'Check Your Tail End, Goals & Milestones! ',
        //       text: "",
        //       type: 'success',
        //       showCancelButton: true,
        //       cancelButtonText:"Later",
        //       confirmButtonColor: '#3085d6',
        //       confirmButtonText: 'Check Now',
        //   }).then((result) => {
        //       if(result.value == true){
        //           tailend("tail_end_zero_session");
        //       }
        //   });
          }else if(h == 14 && m == 51){
              //To be added : 2021-09-16
            //   3 clients have rated you below 4. Take action immediately!
              <?php if($_SERVER['REMOTE_ADDR'] == '115.96.191.173'){ ?>
            swal({
               title: 'Below 4 Rating List!',
               text: "Have you seen your Halftime Below 4 Rating List?",
               type: 'warning',
               showCancelButton: false,
               cancelButtonText:"Later",
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Check',
           }).then((result) => {
              if(result.value == true){
                  below_4_rating_list();
                // alert();
              }
           }
              <?php } ?>
          }else if(h == 14 && m == 20){
              swal({
                   title: 'Check Your 10th Day Overdue',
                   text: "",
                   type: 'success',
                   showCancelButton: true,
                   cancelButtonText:"Later",
                   confirmButtonColor: '#3085d6',
                   confirmButtonText: 'Check Now',
               }).then((result) => {
                  if(result.value == true){
                      mentor_popup_list("wmr_12th_day_overdue");
                  }
          });
          }else if(h == 15 && m == 0){
              
              //remove 2021-09-16
            //   swal({
            //       title: 'Have you seen your Not Started bucket?',
            //       text: "",
            //       type: 'success',
            //       showCancelButton: true,
            //       cancelButtonText:"Later",
            //       confirmButtonColor: '#3085d6',
            //       confirmButtonText: 'Check Now',
            //   }).then((result) => {
            //       if(result.value == true){
            //           cbab("notstarted");
            //       }
            //     });
          }else if(h == 15 && m == 40){
              
              //Show only if present: 2021-09-16
              //Break Overdue 

              // 3 clients completed their break & are not back yet
                
              // view list
            //   swal({
            //       title: 'Break Overdue',
            //       text: "These clients Need Attention (call them)",
            //       type: 'success',
            //       showCancelButton: true,
            //       cancelButtonText:"Later",
            //       confirmButtonColor: '#3085d6',
            //       confirmButtonText: 'Check Now',
            //   }).then((result) => {
            //       if(result.value == true){
            //           mentor_popup_list("break_overdue");
            //       }
            //     });
          }else if(h == 16 && m == 0 && d == 3){
              swal({
                   title: 'Check Your Dormant List',
                   text: "",
                   type: 'success',
                   showCancelButton: true,
                   cancelButtonText:"Later",
                   confirmButtonColor: '#3085d6',
                   confirmButtonText: 'Check Now',
              }).then((result) => {
                  if(result.value == true){
                      mentor_popup_list("new_dormant_client");
                  }
                });
          }
          else if(h == 16 && m == 20){
              // swal({
              //      title: 'OMR Notification',
              //      text: "They visited the website & logged in today",
              //      type: 'success',
              //      showCancelButton: true,
              //      cancelButtonText:"Later",
              //      confirmButtonColor: '#3085d6',
              //      confirmButtonText: 'Check Now',
              //  }).then((result) => {
              //     if(result.value == true){
              //         mentor_popup_list("last_thirty_days_omr_notification");
              //     }
              //   });
          }else if(h == 17 && m == 0){
              swal({
                   title: 'Program Page Visits In App',
                   text: "Check who visited the app section & saw programs.",
                   type: 'success',
                   showCancelButton: true,
                   cancelButtonText:"Later",
                   confirmButtonColor: '#3085d6',
                   confirmButtonText: 'Check Now',
               }).then((result) => {
                  if(result.value == true){
                      mentor_popup_list("program_page_visit_active");
                  }
                });
          }else if (h == 19 && m == 0){
              var pending_session = "<?php echo $pending_diets[0]['count']; ?>";
              swal({
               title: 'PENDING DIETS NOT SENT',
               text: "You have "+pending_session+" pending diets that you have not sent.",
               type: 'warning',
               showCancelButton: false,
               cancelButtonText:"Later",
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'Ok',
           }).then((result) => {
              if(result.value == true){
                //   mentor_popup_list("mtd_health_score_omr");
                // alert();
              }
          });
          }
          else if(h == 11 && m == 0){
              swal({
                  title: 'New Tailend Added!',
                  text: "Check your tailend list.",
                  type: 'success',
                  showCancelButton: true,
                  cancelButtonText:"Later",
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Check Now',
              }).then((result) => {
                  //console.log(result);
                  //return false;
                  if(result.value == true){
                      tailendredirection("tailend_3_pending");
                  }
                });
          }
          // added by sanjay 13/09/2021
          else if(h == 15 && m == 30){
              swal({
                  title: 'Completed Yesterday',
                  text: "These clients are now COMPLETED Status",
                  type: 'success',
                  showCancelButton: true,
                  cancelButtonText:"View MTD",
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'View List',
              }).then((result) => {
                  //console.log(result);
                  //return false;
                  if(result.value == true){
                      yesterday_redirect_link("yesterday_completed_client");
                  }
                });
          }
         // added by sanjay 09/09/2021
          else if(h == 11 && m == 30){
              swal({
                  title: 'Dropped Out Yesterday!',
                  text: "These clients are now DROPOUT STATUS",
                  type: 'success',
                  showCancelButton: true,
                  cancelButtonText:"Cancel",
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'View List',
              }).then((result) => {
                  //console.log(result);
                  //return false;
                  if(result.value == true){
                      yesterday_dropout("dropout_client");
                  }
                });
          } else if((h == 12 && m == 0) || (h == 17 && m == 15)){
              swal({
                  title: 'Validity Getting Over Tomorrow',
                  text: "These clients will be DROPPED OUT overnight if you dont extend / drop out yourself.",
                  type: 'success',
                  showCancelButton: false,
                  cancelButtonText:"Later",
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Check Now',
              }).then((result) => {
                  //console.log(result);
                  //return false;
                  if(result.value == true){
                      validity_getting_over_tomorrow("yesterday_completed_client");
                  }
                });
          }
          else if((h == 12 && m == 30) || (h == 17 && m == 45)){
              swal({
                  title: 'Validity Getting Over DAY AFTER Tomorrow',
                  text: "These clients will be DROPPED OUT  TOMORROW if you don't extend/drop out yourself.",
                  type: 'success',
                  showCancelButton: false,
                  cancelButtonText:"Later",
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Check Now',
              }).then((result) => {
                  //console.log(result);
                  //return false;
                  if(result.value == true){
                      validity_getting_over_day_after_tomorrow("yesterday_completed_client");
                  }
                });
          }
                    // added by sanjay 15/09/2021
        else if(h == 08 && m == 24){
              swal({
                   title: '0 Session Ending Tomorrow',
                   text: "These clients are completing last session tomorrow",
                   type: 'success',
                   showCancelButton: true,
                   cancelButtonText:"Later",
                   confirmButtonColor: '#3085d6',
                   confirmButtonText: 'Check Now',
               }).then((result) => {
                  //console.log(result);
                  //return false;
                  if(result.value == true){
                      zero_session_pending();
                  }
                });
            } 
              // added by sanjay 09/09/2021
          else if(h == 15 && m == 15){
             /* swal({
                   title: 'Below 4 Rating',
                   text: "Have you seen your Halftime Below 4 Rating Feedback?",
                   type: 'success',
                   showCancelButton: true,
                   cancelButtonText:"Later",
                   confirmButtonColor: '#3085d6',
                   confirmButtonText: 'Check Now',
               }).then((result) => {
                  if(result.value == true){
                      halftime_feedback("halftime_feedback");
                  }
                });*/
          }    // added by sanjay 13/09/2021
          else if(h == 12 && m == 36)
        {    
             //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/goalsfilledcount'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {  
                        //console.log(response);
                        //return false;
                           if(response>0)
                           {  
                            
                                swal({
                                      title: ""+response + " clients have filled goals yesterday!",
                                      text: "Have you checked the goals Received Yesterday?",
                                      type: 'success',
                                      showCancelButton: true,
                                      cancelButtonText:"Cancel",
                                      confirmButtonColor: '#3085d6',
                                      confirmButtonText: 'View List',
                                  }).then((result) => {
                                      //console.log(result);
                                      //return false;
                                      if(result.value == true){
                                          goals_redirect_link();
                                      }
                                    });        

                            }else{  
                                            //console.log("false");
                                            return false;
                                       }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
            /* Ajax is unloaded */                

        } else if(h == 10 && m == 30){
     
             //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/yesterday_program_visited_client_list_count'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {  
                        //console.log(response);
                       // return false;
                           if(response>0)
                           {                             
                                swal({
                                      title: ""+response + " clients visited programs between 7 pm & 10 am yesterday ",
                                      text: "",
                                      type: 'success',
                                      showCancelButton: true,
                                      cancelButtonText:"Later",
                                      confirmButtonColor: '#3085d6',
                                      confirmButtonText: 'Check Now',
                                  }).then((result) => {
                                      //console.log(result);
                                      //return false;
                                      if(result.value == true){
                                          sevan_to_tenAM_visited();
                                      }
                                    });        

                            }else{  
                                            //console.log("false");
                                            return false;
                                       }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
            /* Ajax is unloaded */

          } else if(h == 10 && m == 45){
              
             //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/yesterday_checkout_visited_client_count'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {  
                        //console.log(response);
                        //return false;
                           if(response>0)
                           {  
                            
                                swal({
                                      title: ""+response + " clients were on check out yesterday between 7pm n 10am  ",
                                      text: "",
                                      type: 'success',
                                      showCancelButton: true,
                                      cancelButtonText:"Later",
                                      confirmButtonColor: '#3085d6',
                                      confirmButtonText: 'Check Now',
                                  }).then((result) => {
                                      //console.log(result);
                                      //return false;
                                      if(result.value == true){
                                          checkout_page_redirect();
                                      }
                                    });        

                            }else{  
                                            //console.log("false");
                                            return false;
                                       }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
            /* Ajax is unloaded */

          }else if(h == 11 && m == 45){
           
           New_Naf_recived_overnight_realtime();
             
          }else if(h == 10 && m == 40){
           
           balance_due_today();
             
          }else if(h == 10 && m == 50){
           
           balance_overdue();
             
          }else if(h == 13 && m == 20){
           
           fifth_day_wt_Overdue();
             
          } else if(h == 14 && m == 10){
           
           tenth_day_wt_Overdue();
             
          }else if(h == 14 && m == 50){
           
           seventeen_day_reminder();
             
          }         

          
        }


    setInterval(function () {
       var date = new Date();
       if ((date.getMinutes() % 5) == 0) {

           call_reminder_popup();
           call_status_reminder_popup();
       }
       mentor_reminder_popup();
       if(date.getHours() >= 00 && allow_mentor_popup){
            // console.log('YESSS');
            mentor_popups();
        }
        
        if(date.getHours() == 12 && allow_mentor_popup){
            // balance_popup();
        }
   }, 60000);

//added by sanjay on 28/10/2021 

<?php //if($_SERVER['REMOTE_ADDR'] == '103.66.96.84'){ ?>

/*$(document).ready(function(){

setInterval(function () {        
          fifth_day_wt_Overdue(); 
          tenth_day_wt_Overdue(); 
          seventeen_day_reminder();
          balance_due_today();
          balance_overdue();              
   
   }, 30000);

});*/


<?php //} ?>    


function fifth_day_wt_Overdue(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/weight_tracker_5_od'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         //console.log(response);
                         //return false;
                           if(response>0)
                           { 
                               
                            swal({

                               title: '5th day weight Overdue',
                               html: "<p><b>"+response+" </b>clients have not sent their mid session weight yesterday.</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                mentor_popup_list('wmr_7th_day_overdue');
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }

function tenth_day_wt_Overdue(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/weight_tracker_10_od'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         //console.log(response);
                         //return false;
                           if(response>0)
                           { 
                               
                            swal({

                               title: '10th day weight Overdue',
                               html: "<p><b>"+response+" </b>clients have not sent their end session weight yesterday.</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                mentor_popup_list('wmr_12th_day_overdue');
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }

 function seventeen_day_reminder(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/weight_tracker_17_od'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         console.log(response);
                         //return false;
                           if(response.count>0)
                           { 
                               
                            swal({

                               title: '17th day Reminder',
                               html: "<p>These clients will become dormant tomorrow</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                mentor_popup_list('wmr_17th_day_overdue');
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }


 function balance_due_today(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/client_status_sec'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         //console.log(response);
                         //return false;
                           if(response.balance_due_new>0)
                           { 
                               
                            swal({

                               title: 'Balance Due Today',
                               html: "<p><b>"+response.balance_due_new+" </b>client has balance due today </p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                mentor_popup_list('balance_due_new');
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }

 function balance_overdue(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/client_status_sec'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         //console.log(response);
                         //return false;
                           if(response.balance_overdue_new>0)
                           { 
                               
                            swal({

                               title: 'Balance Overdue',
                               html: "<p><b>"+response.balance_overdue_new+" </b>clients have balance overdue </p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                mentor_popup_list('balance_overdue_new');
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }



// added by sanjay on 23/09/2021

<?php //if($_SERVER['REMOTE_ADDR'] == '171.51.239.75'){ ?>
    
$(document).ready(function(){

    setInterval(function () {        
          programe_page_visited_client_popup_realtime();                
   }, 318000);
  
/*setInterval(function () {        
          checkout_page_visited_client_popup_realtime();                  
   }, 60000); */

setInterval(function () {        
          checkout_page_visited_client_popup_realtime();                  
   }, 60000);

setInterval(function () {        
           New_goal_recived_popup_realtime();                   
   }, 210000);

<?php //if($_SERVER['REMOTE_ADDR'] == '223.189.32.174'){ ?>
setInterval(function () {        
           New_Naf_complete_recived_popup_realtime();                   
   },600000);


<?php //} ?>

});

<?php //} ?>
   
   
//   avinash added for add for top nav start
   $(".today_query_count_omr").click(function(e){
       e.preventDefault();
       mentor_popup_list('unanswered_queries_omr');
   })
  $(".today_query_count_active").click(function(e){
      e.preventDefault();
      mentor_popup_list('unanswered_queries_active');
  })
  
  $(".mtd_health_score_active").click(function(e){
      e.preventDefault();
      mentor_popup_list('mtd_health_score_active');
  })
  
  $(".today_health_score_active").click(function(e){
      e.preventDefault();
      mentor_popup_list('today_health_score_active');
  })
  $(".last_thirty_days_omr_notification").click(function(e){
      e.preventDefault();
      mentor_popup_list('last_thirty_days_omr_notification');
  })
  
  $(".today_omr_notification").click(function(e){
      e.preventDefault();
      mentor_popup_list('today_omr_notification');
  })
  
  $(".todays_welcome_call").click(function(e){
      e.preventDefault();
      mentor_popup_list('todays_welcome_call');
  })
  $(".todays_progress_call").click(function(e){
      e.preventDefault();
      mentor_popup_list('todays_progress_call');
  })
  $(".todays_feedback_call").click(function(e){
      e.preventDefault();
      mentor_popup_list('todays_feedback_call');
  })
   $(".unanswered_call").click(function(e){
      e.preventDefault();
      mentor_popup_list('unanswered_call');
  })
   
   
   $(".queries_show").click(function(e){
       e.preventDefault();
       mentor_popup_list('unanswered_queries');
   })
   
   $(".active_bday").click(function(e){
       e.preventDefault();
       mentor_popup_list('active_bday');
   });
   
   $(".omr_bday").click(function(e){
       e.preventDefault();
       mentor_popup_list('omr_bday');
   });
   
   $(".today_reminders").click(function(e){
       e.preventDefault();
       mentor_popup_list('today_reminders');
   });
   
   $(".tomorrow_reminders").click(function(e){
       e.preventDefault();
       mentor_popup_list('tomorrow_reminders');
   });
   
   $(".future_reminders").click(function(e){
       e.preventDefault();
       mentor_popup_list('future_reminders');
   });

  $(".balance_due_new").click(function(e){
       e.preventDefault();
       mentor_popup_list('balance_due_new');
   });

    $(".balance_overdue_new").click(function(e){
       e.preventDefault();
       mentor_popup_list('balance_overdue_new');
   });
   
      function yesterday_redirect_link(id){ 
          window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/yesterday_completed_client", '_blank').focus();
    // window.location = ;
   }
   
      function tailendredirection(id){ 
          window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/common_function_client_base_bifurfication?program=tail_end_3_pending", '_blank').focus();
    // window.location = ;
   }
   
   function sevan_to_tenAM_visited(id){ 
          window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/get_programepagevisited_client_list", '_blank').focus();
    // window.location = ;
   }
    function checkout_page_redirect(id){ 
          window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/get_checkoutpage_visited_client_list", '_blank').focus();
    // window.location = ;
   } 
 

function yesterday_dropout(id){ 
    window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/yesterday_dropout_client", '_blank').focus();
    // window.location = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/yesterday_dropout_client";
   }
   function halftime_feedback(id){ 
       window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/common_feedback_fuction?program=ht_below4", '_blank').focus();
    // window.location = ;
   }
  //added by sanjay on 15-09-2021 
   function zero_session_pending(){ 
        window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/zero_session_pending", '_blank').focus();
    // window.location = ;
     
   }

     function goals_redirect_link(){ 
        window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/goalsfilledlist", '_blank').focus();
    // window.location = ;
     
   }

// added by sanjay on 23/09/2021


function programe_page_visited_client_popup_realtime(id = '')
 {
    //  console.log('yessss');
    //  return false;
 //swal.close();  
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
   
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/getprogrampagevisited_realtime'; ?>",
                       type: "POST",
                      data: {mentor_id:mentor_id},
                       dataType:"JSON",                      
                       success: function(response)
                       { 
                          
                        // console.log(response);
                        // return false;
                           if(response)
                           {  
                               var name = response.fullname;
                               var phone = response.phone;
                               var page_visited = response.program_page;
                               var user_id = response.user_id;
                               var user_status = response.user_status;
                            
                            swal({
                               title: 'Program Page Visited!',
                               html: "<p><b>Name: </b>"+name+"</p><p><b>Phone: </b><span style='color:blue;'>"+phone+"</span></p><p><b>Program: </b>"+page_visited+"</p><p><b>Status: </b>"+user_status+"</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                           }).then((result) => {
                            if(result.value == true){
                               window.open("<?php echo base_url('client-details/');?>"+ user_id +"/profile", '_blank');  
                             }
                            });
                                  
                            }else{
                                console.log('no data found');
                                
                            }
                           
                       }
                       
                       
                   })
 }

 function checkout_page_visited_client_popup_realtime(id = '')
 {

   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/getcheckoutpagevisited_client_realtime'; ?>",
                       type: "POST",
                      data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        // console.log(response);
                        // return false;
                           if(response)
                           {  
                               var name = response.fullname;
                               var phone = response.phone;
                               var page_visited = response.program_page;
                               var user_id = response.user_id;
                               var program_session = response.program_session;
                               var user_status = response.user_status;
                               if(program_session == 30 || program_session == 45){
                                   var session = 3;
                               }else if(program_session == 60 || program_session == 75){
                                   var session = 6;
                               }else{
                                   var session = 9;
                               }
                               var user_id = response.user_id;
                               //var program_amount = '13499';
                                 
                            swal({
                               title: 'Checkout Page Visited!',
                               html: "<p><b>Name: </b>"+name+"</p><p><b>Phone: </b><span style='color:blue;'>"+phone+"</span></p><p><b>Program: </b>"+page_visited+"("+session+")</p><p><b>Status: </b>"+user_status+"</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                              if(result.value == true){
                               window.open("<?php echo base_url('client-details/');?>"+ user_id +"/profile", '_blank');  
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                            
                                
                            }
                           
                       }

                   })
 }

 
function New_goal_recived_popup_realtime(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/getnewgoalsRecived_realtime'; ?>",
                       type: "POST",
                      data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         //console.log(response);
                         //return false;
                           if(response)
                           {  
                               var name = response.fullname;
                               var phone = response.phone;
                               var program_name = response.program_name;
                               var user_id = response.id;
                               var program_session = response.program_session;
                               
                            swal({
                               title: 'New Goals Received!',
                               html: "<p><b>Name: </b>"+name+"</p><p><b>Phone: </b><span style='color:blue;'>"+phone+"</span></p><p><b>Program: </b>"+program_name+"</p><p><b>Sessions: </b>"+program_session+"</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                               window.open("<?php echo base_url('client-details/');?>"+ user_id +"/profile", '_blank');  
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }

function New_Naf_complete_recived_popup_realtime(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/get_New_Naf_Recived_realtime'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  
                        
                         //console.log(response);
                         //return false;
                           if(response>0)
                           { 
                               /*var name = response.fullname;
                               var phone = response.phone;
                               var program_name = response.program_name;
                               var user_id = response.id;
                               var program_session = response.program_session;*/

                               
                            swal({

                               title: 'New NAF Received!',
                               html: "<p>You have Recieved "+response+" New Naf</p>",
                               //html: "<p>You have Recieved 1 New NAF</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                 window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/Naf_filledList", '_blank').focus();
                            }
                            });
                                  

                            }else{
                                console.log('no data found');
                                 
                                
                            }
                       }
                
                   })
 }

 function New_Naf_recived_overnight_realtime(id = '')
 {
   
   var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
         
          $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/get_New_Naf_overnight_realtime'; ?>",
                       type: "POST",
                       data: {mentor_id:mentor_id},
                       dataType:"JSON",
                       success: function(response)
                       {  

                           if(response>0)
                           { 
                               /*var name = response.fullname;
                               var phone = response.phone;
                               var program_name = response.program_name;
                               var user_id = response.id;
                               var program_session = response.program_session;*/
                               
                            swal({
                               title: 'NAF Received Overnight!',
                               html: "<p>You have Recieved "+response+" New Incomplete Naf</p>",
                               type: 'info',
                               showCancelButton: true,
                               showCloseButton: true,
                               cancelButtonText:"Cancel",
                               confirmButtonColor: '#3085d6',
                               confirmButtonText: 'Check Now',
                               allowOutsideClick: false,
                               showCloseButton: true,
                           }).then((result) => {
                            if(result.value == true){
                                window.open("https://www.balancenutrition.in/crm_ui/dashboard/mentor/Naf_filledList", '_blank').focus();  
                            }
                            });
                                  
                        }else{
                                console.log('no data found');
                                                           
                            }
                       }
                
                   })
 }

   function mentor_popup_list(id = ''){
       
           var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
           //console.log(mentor_id);
           
           var curdate="<?php echo date('Y-m-d'); ?>";

           var k=0;
           var j=0;
           
           $.ajax({
               url : "<?php echo base_url().'dashboard/mentor/mentor_ajax'; ?>",
               type: "POST",
               data: {id:id,mentor_id:mentor_id},
               dataType:"JSON",
               success: function(response)
               {
                   if(response){
                       switch(id){

                        //console.log(response);
                           
                        //   case 'today_reminders':
                             
                        //       $('.modal-body').html('');
                        //       $('#exampleModalLabel').html("Today's Reminders");
                        //       $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Title</th> <th>Description</th> <th>Time</th> </tr></thead><tbody>');
   
                        //         $.each(response, function(i, item) 
                        //       {
                        //           $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].reminder_title + "</td><td>" + response[i].reminder_text + "</td><td>" + response[i].reminder_time + "</td></tr>").appendTo('.modal-body #cms');
                        //       });
   
   
                        //     break;
                            
                        //     case 'tomorrow_reminders':
                             
                        //       $('.modal-body').html('');
                        //       $('#exampleModalLabel').html("Tomorrow's Reminders");
                        //       $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Title</th> <th>Description</th> <th>Time</th> </tr></thead><tbody>');
   
                        //         $.each(response, function(i, item) 
                        //       {
                        //           $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].reminder_title + "</td><td>" + response[i].reminder_text + "</td><td>" + response[i].reminder_time + "</td></tr>").appendTo('.modal-body #cms');
                        //       });
   
   
                        //     break;
                            
                        //     case 'future_reminders':
                             
                        //       $('.modal-body').html('');
                        //       $('#exampleModalLabel').html("Future Reminders");
                        //       $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Title</th> <th>Description</th> <th>Date</th> <th>Time</th> </tr></thead><tbody>');
   
                        //         $.each(response, function(i, item) 
                        //       {
                        //           $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].reminder_title + "</td><td>" + response[i].reminder_text + "</td><td>" + formatDate(response[i].reminder_date) + "</td><td>" + response[i].reminder_time + "</td></tr>").appendTo('.modal-body #cms');
                        //       });
   
   
                        //     break;

                     case 'wmr_7th_day_overdue':
   
                           $('.modal-body').html('');
                           $('#exampleModalLabel').html('<u><b>Weight Tracker 5th Day Overdue(Latest First)</b></u> <small style="display: block;font-size: 14px; font-weight: normal; padding: 10px 0 0;"><b>*Today</b> : 6th Day Reminder Gone Yesterday. 7th Day Overdue Will Go Today.</small><small style="display: block;font-size: 14px; font-weight: normal; padding: 0;"><b>*Older</b> : 7th Day Overdue Notifications Gone. Entries Will Stay Till 12th Day Overdue Or 10th Day Received.</small>');

                           $('.modal-body').html('<div class="m-portlet__body"> <ul class="nav nav-tabs" role="tablist"> <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#m_tabs_wmr_1_1"><b>Today</b></a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_wmr_1_2"><b>Older</b></a> </li> </ul> <div class="tab-content"> <div class="tab-pane active" id="m_tabs_wmr_1_1" role="tabpanel"> <table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>Name</b></th> <th><b>Number</b></th><th><b>Program Name</b></th><th><b>OD Day</b></th><th><b>Ssn End Date</b></th><th><b>Current Ssn Details</b></th><th><b>Source</b></th><th><b>AutoText</b></th></tr></thead> <tbody> </tbody></table></div> <div class="tab-pane" id="m_tabs_wmr_1_2" role="tabpanel"> <table id="cmsz" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>Name</b></th> <th><b>Number</b></th><th><b>Program Name</b></th><th><b>OD Day</b></th><th><b>Ssn End Date</b></th><th><b>Current Ssn Details</b><th><b>Source</b></th><th><b>AutoText</b></th></tr></thead> <tbody> </tbody></table> </div> </div> </div>');

                           $.each(response, function(i, item) 
                           { 
                           //console.log(response); 
                           //return false;

                                    var today = new Date().toISOString().slice(0, 10);
                                    var start_date =response[i].diet_start_date; 
                                    var today_new = Date.parse(today);
                                    var start_new = Date.parse(start_date);
                                     

                                     //var start_date =response[i].diet_start_date; 

                                    const diffTime = Math.abs(today_new - start_new);
                                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                                    
                                    if(diffDays =='0'){
                                        var diffDays = 'Today';
                                    }else if(diffDays=='1'){
                                       var diffDays = 'Yesterday';
                                    }else{
                                        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))+"th";   }

                           if(response[i].version_source !='') 
                           {  

                            var version_source_new = response[i].version_source.split('|');  
                                   var app_version = version_source_new[0];
                                   var source = version_source_new[1]+"<br/>";
                                   

                                    let latest_version = 
                                            <?php echo '["' . implode('", "', app_version1) . '"]' ?>;

                                    if( latest_version.includes(app_version))
                                     {
                                      app_update_button = '';
                                     }else{
                                       
                                        var app_update_button = '<button type="button" class="btn btn-success askupdate" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"  value='+response[i].user_id+' style="font-size:15px;">Update</button>';

                                     } 
                                }else{
                                    var source = '-';
                                    var app_update_button = '';
                                }
                                 
                                 if(response[i].allergy==null){
                                    var allergy ='-';
                                 }else{
                                    var allergy=response[i].allergy;
                                 }
                                 if(response[i].eating_habit=='Vegetarian'||response[i].eating_habit=='Veg'){
                                    var eating_habit = "<div><img src=https://www.balancenutrition.in/crm_ui/assets/image/veg.png width=18px></div>"
                                 }else{
                                     var eating_habit = "<div><img src=https://www.balancenutrition.in/crm_ui/assets/image/non-veg.png width=18px></div>"
                                 }

                                 if(response[i].food_aversion==null){
                                    var food_aversion ='-';
                                 }else{
                                    var food_aversion=response[i].food_aversion;
                                 }
                               
                                var send_session = response[i].send_session; 
                                 var pending_session = response[i].program_session - send_session;

                                 var programe_session1 = "<div class='text-left'><b>Total:</b>"+response[i].program_session+"</div>";
                                 var send_session = "<div class='text-left'><b>Sent:</b>"+send_session+"</div>";
                                 var session_number = "<div class='text-left'><b>Current Session: </b>"+response[i].send_session+"</div>";
                                 
                                 var session_end= formatDateTime(response[i].diet_start_date);
                                 console.log(session_end);

                                 var session_end1= session_end.replace("5:30 am","");

                                 var session_end_date = "<div class='text-left'><b>End Date: </b><span style='color:red'>"+session_end1+"</span></div>";
                                 var pending_session = "<div class='text-left'><b>Pending:</b>"+pending_session+"</div>";    
                                

                              if(response[i].actual_date==curdate)
                              {

                                  $('<tbody>').html("<tr><td><a href=<?php echo base_url('client-details/'); ?>"+response[i].user_id+"> "+ response[i].fullname + "</a></td><td>" + response[i].phone + "</td><td>" + response[i].program_name +"</td><td>"+diffDays+"</td><td>"+session_number+""+session_end_date+"</td><td>"+programe_session1+send_session+pending_session+"</td><td>"+source+""+app_update_button+'</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');

                                 j++;

                              }else{
                                
                                 $('<tbody>').html("<tr><td><a href=<?php echo base_url('client-details/'); ?>"+response[i].user_id+"> "+ response[i].fullname + "</a></td><td>" + response[i].phone + "</td><td> " + response[i].program_name + " </td><td>"+diffDays+"</td><td>"+session_number+ +session_end_date+"</td><td>"+programe_session1+send_session+pending_session+"</td><td>"+source+""+app_update_button+'</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cmsz');

                                 k++;
                              }

                              
                           });
                                                      
                        break;


                        case 'balance_due_new':
                             
                        $('.modal-body').html('');
                              $('#exampleModalLabel').html('Balance Due');
                             $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>NAME</b></th><th><b>NUMBER</b></th><th><b>EMAIL</b></th><th><b>PRG NAME</b></th><th><b>ADV. PRG</b></th><th><b>SESSION</b></th><th><b>STATUS</b></th><th><b>MRP</b></th><th><b>AMT DUE</b></th><th><b>DUE DATE</b></th><th><b>ACTION</b></th> </tr></thead><tbody>');
                             
                              var date_title = '<div style="margin-top:8px;color:red;">Select Bal Due Date :</div>';
                             var curdate = new Date().toISOString().slice(0,10);
                             var select_date = '<input type="date" id="start_date" min="'+curdate+'" name="trip-start" style="margin-top:6px;"><br/>';

                            $(document).ready(function(){
                                $('input[type="date"]').change(function(){
                                    var selected_date = this.value;
                                    $('body').find('#change_date').attr('selected_date1', selected_date);

                                });
                            }); 
                              
                              $.each(response, function(i, item) {

                                var today = new Date().toISOString().slice(0, 10);
                                    var start_date =response[i].bal_due_date;
                                    var today_new = Date.parse(today);
                                    var start_new = Date.parse(start_date);

                                    const diffTime = Math.abs(today_new - start_new);
                                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                                                                                
                                    var select_button = '<button type="button" class="btn btn-primary btn-sm" id="change_date" data-userid1="'+response[i].user_id+'" data-orderid="'+response[i].order_id+'" style="margin-top:10px;">Extend</button>'; 
                                    
                                    if(diffDays =='0'){
                                        var diffDays1 = 'Today'+'<br/>';
                                        
                                    }else if(diffDays=='1'){
                                       var diffDays1 = 'Yesterday'+'<br/>';
                                    }else{
                                        var diffDays1 = Math.ceil(diffTime / (1000 * 60 * 60 * 24))+" days Ago"+'<br/>';
                                        }
                                   if(response[i].Advance_program==''|| response[i].Advance_program==null)
                                    {
                                        var Advance_program = '-';
                                    }else{
                                        var Advance_program = response[i].Advance_program;
                                    }
                                    
                                   var program_session=response[i].program_session; 
                                   var send_session = response[i].send_session; 
                                   var pending_session = program_session - send_session;
                                   
                                   var programe_session1 = "<div class='text-left'><b>Total:</b>"+program_session+"</div>";
                                   var send_session = "<div class='text-left'><b>Sent:</b>"+send_session+"</div>";
                                   var pending_session = "<div class='text-left'><b>Pending:</b>"+pending_session+"</div>";

                                  var user_id = response[i].user_id;
                                  var full_name = "<a href=<?php echo base_url('client-details/');?>"+response[i].user_id+" target='_blank'>"+response[i].full_name+"</a>";

                                 $('<tbody>').html("<tr><td>" + full_name + "</td><td>"+response[i].phone+"</td><td>" + response[i].email_id + "</td><td>"+response[i].program_name+"</td><td>"+Advance_program+"</td><td>"+programe_session1+send_session+pending_session+"</td><td>"+response[i].user_status+"</td><td>" + response[i].prog_buy_amt + "</td><td>"+response[i].balance+"</td><td>" + diffDays1 + ''+date_title+ '' +select_date+ '' +select_button+ '</td><td><div type="button" class="btn btn-warning" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'" target="_blank" style="color:  white;"><i class="fa fa-reply"></i></a></div></td></tr>').appendTo('.modal-body #cms');
                              });

                              break;

                         case 'balance_overdue_new':
                             
                       $('.modal-body').html('');
                              $('#exampleModalLabel').html('Balance OverDue');
                              $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>NAME</b></th><th><b>NUMBER</b></th><th><b>EMAIL</b></th><th><b>PRG NAME</b></th><th><b>ADV. PRG</b></th><th><b>SESSION</b></th><th><b>STATUS</b></th><th><b>MRP</b></th><th><b>AMT DUE</b></th><th><b>DUE DATE</b></th><th><b>ACTION</b></th> </tr></thead><tbody>');
                           
                             var date_title = '<div style="margin-top:8px;color:red;">Select Bal Due Date :</div>';
                            var curdate = new Date().toISOString().slice(0,10);
                             var select_date = '<input type="date" id="start_date" min="'+curdate+'" name="trip-start" style="margin-top:6px;"><br/>';

                            $(document).ready(function(){
                                $('input[type="date"]').change(function(){
                                    
                                   var selected_date = this.value;
                                    $('body').find('#change_date').attr('selected_date1', selected_date);

                                });
                            }); 
                              $.each(response, function(i, item) {
                                //console.log(response);
                                                                      
                                var select_button = '<button type="button" class="btn btn-primary btn-sm" id="change_date" data-userid1="'+response[i].user_id+'" data-orderid="'+response[i].order_id+'"style="margin-top:10px;">Extend</button>'; 

                                var today = new Date().toISOString().slice(0, 10);
                                    var start_date =response[i].bal_due_date;
                                    var today_new = Date.parse(today);
                                    var start_new = Date.parse(start_date);

                                    const diffTime = Math.abs(today_new - start_new);
                                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                                    
                                    if(diffDays =='0'){
                                        var diffDays1 = 'Today'+'<br/>';
                                    }else if(diffDays=='1'){
                                       var diffDays1 = 'Yesterday'+'<br/>';
                                    }else{
                                        var diffDays1 = Math.ceil(diffTime / (1000 * 60 * 60 * 24))+" days Ago"+'<br/>';
                                        }
                                    if(response[i].Advance_program==''|| response[i].Advance_program==null)
                                    {
                                        var Advance_program = '-';
                                    }else{
                                        var Advance_program = response[i].Advance_program;
                                    }
                                   var program_session=response[i].program_session; 
                                   var send_session = response[i].send_session; 
                                   var pending_session = program_session - send_session;
                                   
                                   var programe_session1 = "<div class='text-left'><b>Total:</b>"+program_session+"</div>";
                                   var send_session = "<div class='text-left'><b>Sent:</b>"+send_session+"</div>";
                                   var pending_session = "<div class='text-left'><b>Pending:</b>"+pending_session+"</div>";
                                       

                                  //var due_date =formatDateTime(response[i].bal_due_date);
                                  //var str_due_date = due_date.replace('5:30 am', '');

                                   var full_name = "<a href=<?php echo base_url('client-details/');?>"+response[i].user_id+" target='_blank'>"+response[i].full_name+"</a>";

                                 $('<tbody>').html("<tr><td>" + full_name + "</td><td>"+response[i].phone+"</td><td>" + response[i].email_id + "</td><td>"+response[i].program_name+"</td><td>" +Advance_program+ "</td><td>"+programe_session1+send_session+pending_session+"</td><td>"+response[i].user_status+"</td><td>" + response[i].prog_buy_amt + "</td><td>"+response[i].balance+"</td><td>" + diffDays1 + ''+date_title+ '' +select_date+ '' +select_button+ '</td><td><div type="button" class="btn btn-warning" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'" target="_blank" style="color:  white;"><i class="fa fa-reply"></i></a></div></td></tr>').appendTo('.modal-body #cms');
                              });

                              break;      

                            
                           case 'today_reminders':
                             
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html("Today's Reminders");
                               $('.modal-body').append('<table id="cms" class="table m-table m-table--border-brand table-bordered m-table--head-bg-brand" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Title</th> <th>Description</th> <th>Time</th> <th></th> </tr></thead>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr id='data-"+response[i].id+"'><td>" + (i+1) + "</td><td id='data-title-"+response[i].id+"' >" + response[i].reminder_title + "</td><td id='data-text-"+response[i].id+"'>" + response[i].reminder_text + "</td><td id='data-time-"+response[i].id+"'>" + response[i].reminder_time + '</td><td><button class="btn btn-sm btn-success py-1 px-2" onClick="editReminder('+response[i].id+')">Edit</button></div></td></tr>').appendTo('.modal-body #cms');
                                   $('<tbody>').html("<tr id='form-"+response[i].id+"' style='display:none'><td>" + (i+1) + "</td><td><input type='text' style='border: 1px solid #000;' id='title-"+response[i].id+"' value='"+ response[i].reminder_title +"'></td><td><input type='text' style='border: 1px solid #000;' id='text-"+response[i].id+"' value='"+ response[i].reminder_text +"'></td><td><input type='text'  style='border: 1px solid #000;'  id='date-"+response[i].id+"' value='"+response[i].reminder_date+"' class='form-control m-input reminder_date custom_date_picker' readonly  placeholder='Select date' /> <div id='m_timepicker_2'><input type='text'  style='border: 1px solid #000;' class='form-control reminder_time' readonly placeholder='Select time' type='text' id='time-"+response[i].id+"' value='"+response[i].reminder_time+"'/></div></td><td><button class='btn btn-sm btn-warning px-2 py-1' onClick='updateReminder("+response[i].id+")'>Save</button></td></tr>").appendTo('.modal-body #cms');
                               });
   
   
                            break;
                            
                            case 'tomorrow_reminders':
                             
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html("Tomorrow's Reminders");
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Title</th> <th>Description</th> <th>Time</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr id='data-"+response[i].id+"'><td>" + (i+1) + "</td><td id='data-title-"+response[i].id+"'>" + response[i].reminder_title + "</td><td id='data-text-"+response[i].id+"'>" + response[i].reminder_text + "</td><td id='data-time-"+response[i].id+"'>" + response[i].reminder_time + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><button class="btn btn-sm btn-success" style="color:white;" onClick="editReminder('+response[i].id+')">Edit</button></div></td></tr>').appendTo('.modal-body #cms');
                                   $('<tbody>').html("<tr id='form-"+response[i].id+"' style='display:none'><td>" + (i+1) + "</td><td><input type='text' style='border: 1px solid #000;' id='title-"+response[i].id+"' value='"+ response[i].reminder_title +"'></td><td><input type='text' style='border: 1px solid #000;' id='text-"+response[i].id+"' value='"+ response[i].reminder_text +"'></td><td><input type='text'  style='border: 1px solid #000;'  id='date-"+response[i].id+"' value='"+response[i].reminder_date+"' class='form-control m-input reminder_date custom_date_picker' readonly  placeholder='Select date' /> <div id='m_timepicker_2'><input type='text'  style='border: 1px solid #000;' class='form-control reminder_time' readonly placeholder='Select time' type='text' id='time-"+response[i].id+"' value='"+response[i].reminder_time+"'/></div></td><td><button class='btn btn-sm btn-warning px-2 py-1' onClick='updateReminder("+response[i].id+")'>Save</button></td></tr>").appendTo('.modal-body #cms');
                                   
                               });
   
   
                            break;
                            
                            case 'future_reminders':
                             
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html("Future Reminders");
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Title</th> <th>Description</th> <th>Date</th> <th>Time</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr id='data-"+response[i].id+"'><td>" + (i+1) + "</td><td id='data-title-"+response[i].id+"'>" + response[i].reminder_title + "</td><td id='data-text-"+response[i].id+"'>" + response[i].reminder_text + "</td><td id='data-time-"+response[i].id+"'>" + response[i].reminder_time + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><button class="btn btn-sm btn-success" style="color:white;" onClick="editReminder('+response[i].id+')">Edit</button></div></td></tr>').appendTo('.modal-body #cms');
                                   $('<tbody>').html("<tr id='form-"+response[i].id+"' style='display:none'><td>" + (i+1) + "</td><td><input type='text' style='border: 1px solid #000;' id='title-"+response[i].id+"' value='"+ response[i].reminder_title +"'></td><td><input type='text' style='border: 1px solid #000;' id='text-"+response[i].id+"' value='"+ response[i].reminder_text +"'></td><td><input type='text'  style='border: 1px solid #000;'  id='date-"+response[i].id+"' value='"+response[i].reminder_date+"' class='form-control m-input reminder_date custom_date_picker' readonly  placeholder='Select date' /> <div id='m_timepicker_2'><input type='text'  style='border: 1px solid #000;' class='form-control reminder_time' readonly placeholder='Select time' type='text' id='time-"+response[i].id+"' value='"+response[i].reminder_time+"'/></div></td><td><button class='btn btn-sm btn-warning px-2 py-1' onClick='updateReminder("+response[i].id+")'>Save</button></td></tr>").appendTo('.modal-body #cms');
                               });
   
   
                            break;
                            
                           case 'active_bday':
                             
                               $('.modal-body').html('');
                               $('#m_modal_1 #exampleModalLabel').html("Today's Birthdays - <b>ACTIVE</b>").addClass("w-100 text-center");
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>User Status</th><th>Program Name</th> <th>Wallet</th> <th>Action</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].mobile_no + "</td><td>" + response[i].user_status + '</td><td>' + response[i].program_name + '</td><td>' +response[i].my_wallet + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('tabchats-view/') ?>'+response[i].user_id+'/" target="_blank" style="color:  white;">Send Wishes</a></div></td></tr>').appendTo('.modal-body #cms');
                               });
   
   
                            break;
                             
                            case 'omr_bday':
                             
                               $('.modal-body').html('');
                               $('#m_modal_1 #exampleModalLabel').html("Today's Birthdays - <b>OMR</b>").addClass("w-100 text-center");
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>User Status</th><th>Program Name</th> <th>Wallet</th> <th>Action</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].mobile_no + "</td><td>" + response[i].user_status + '</td><td>' + response[i].program_name + '</td><td>' +response[i].my_wallet + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('tabchats-view/') ?>'+response[i].user_id+'/" target="_blank" style="color:  white;">Send Wishes</a></div></td></tr>').appendTo('.modal-body #cms');
                               });
   
   
                             break;
                           
                           case 'unanswered_queries':
                             
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html('Unanswered Queries');
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th> <th>Email Id</th> <th>Program Name</th> <th>Date</th> <th>Querie</th> <th>Action</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].program_name + "</td><td>" + formatDateTime(response[i].created) + '</td><td style="overflow:hidden;max-width:186px">' +response[i].query + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('tabchats-view/') ?>'+response[i].user_id+'/" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');
                               });
   
   
                             break;
                             
                             
                             
                             //  avinash add thi for querid
                            
                            
                            case 'unanswered_queries_omr':
                             
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html('OMR Unanswered Queries');
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th> <th>Email Id</th> <th>Program Name</th> <th>Date</th> <th>Querie</th> <th>Action</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].program_name + "</td><td>" + formatDateTime(response[i].created) + '</td><td style="overflow:hidden;max-width:186px">' +response[i].query + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('tabchats-view/') ?>'+response[i].user_id+'/" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');
                               });
   
   
                             break;
                             
                             
                             case 'unanswered_queries_active':
                             
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html('Active Unanswered Queries');
                               $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th> <th>Email Id</th> <th>Program Name</th> <th>Date</th> <th>Querie</th> <th>Action</th> </tr></thead><tbody>');
   
                                $.each(response, function(i, item) 
                               {
                                   $('<tbody>').html("<tr><td>" + (i+1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].program_name + "</td><td>" + formatDateTime(response[i].created) + '</td><td style="overflow:hidden;max-width:186px">' +response[i].query + '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('tabchats-view/') ?>'+response[i].user_id+'/" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');
                               });
   
   
                             break;
                             
                             
                             
                             case 'today_omr_notification':
                             $('#exampleModalLabel').html('Today OMR Notification');
                              $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email-Id</th> <th>Phone</th><th>Last Program</th><th>Action</th></tr></thead><tbody>');
                              $.each(response, function(i, item) {
                                  
                                  var user_id = response[i].user_id;
                                        $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].phone + "</td><td>" + response[i].last_program +'</td><td> <div type="button" class="btn btn-warning text-white" onClick="reply_omr_notification('+response[i].id+','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });

   
                             break;

                             case 'mtd_omr_notification':
                               
                                
                                 $('#exampleModalLabel').html('MTD OMR Notification');
                                 $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email-Id</th> <th>Phone</th><th>User status</th><th>Last Mentor</th><th>Last Program</th><th>Country</th><th>State</th><th>City</th><th>Last Weight</th><th>Action</th></tr></thead><tbody>');
   
                              
                              $.each(response, function(i, item) {
                                  
                                  var user_id = response[i].user_id;
                                          $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].phone + "</td><td>" + response[i].last_program +'</td><td> <div type="button" class="btn btn-warning text-white" onClick="reply_omr_notification('+response[i].id+','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });
   
                                 
   
                             break;

                             case 'all_omr_notification':
                               
                                 
                                 $('#exampleModalLabel').html('All Time OMR Notification');
                                 $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email-Id</th> <th>Phone</th><th>User status</th><th>Last Mentor</th><th>Last Program</th><th>Country</th><th>State</th><th>City</th><th>Last Weight</th><th>Action</th></tr></thead><tbody>');
   
                              
                              $.each(response, function(i, item) {
                                  
                                  var user_id = response[i].user_id;
                                          $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].phone + "</td><td>" + response[i].last_program +'</td><td> <div type="button" class="btn btn-warning text-white" onClick="reply_omr_notification('+response[i].id+','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });
    
                            
                            case 'last_thirty_days_omr_notification':
                               
                                 
                                 $('#exampleModalLabel').html('Last 30 Days OMR Notification');
                                 $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email-Id</th> <th>Phone</th><th>Last Program</th><th>Action</th></tr></thead><tbody>');
   
                              
                              $.each(response, function(i, item) {
                                  
                                  var user_id = response[i].user_id;
                                 $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].phone + "</td><td>" + response[i].last_program +'</td><td> <div type="button" class="btn btn-warning text-white" onClick="reply_omr_notification('+response[i].id+','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });
                              
                              
                             break;
                           
                           case 'today_health_score_active':

                              $('.modal-body').html('');
                              $('#exampleModalLabel').html('Today Active Client Health Score List');
                              $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email Id</th> <th>Status</th><th>Posted On</th><th>Action</th> </tr></thead><tbody>');

                              $.each(response, function(i, item) {
                                  
                                  var user_id = response[i].user_id;
                                 $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].fullname + "</td><td>" + response[i].email_id + "</td><td>" + response[i].user_status + "</td><td>" + formatDateTime(response[i].created) + '</td><td> <div type="button" class="btn btn-warning text-white" onClick="health_score_ack(' + response[i].id + ','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });

                              break;

                           case 'mtd_health_score_active':

                              $('.modal-body').html('');
                              $('#exampleModalLabel').html('MTD Active Client Health Score List');
                              $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email Id</th> <th>Status</th><th>Posted On</th><th>Action</th> </tr></thead><tbody>');

                              $.each(response, function(i, item) {
                                 var user_id = response[i].user_id;
                                 $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].fullname + "</td><td>" + response[i].email_id + "</td><td>" + response[i].user_status + "</td><td>" + formatDateTime(response[i].created) + '</td><td> <div type="button" class="btn btn-warning text-white" onClick="health_score_ack(' + response[i].id + ','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });

                              break;
                              
                              case 'todays_welcome_call':
                               
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html('Today Welcome Call');
                               $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"><th>Time</th><th>Name</th><th>Program Name</th><th>Client Status</th><th>Call Status</th><th>Action</th></tr></thead><tbody>');
   
                                 $.each(response, function(i, item) 
                                 {
                                    if(response[i].name!='--')
                                    {
                                        $('<tbody>').html("<tr><td>" + response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_status + '</td><td><select onchange="welcomeCallAck(this,'+response[i].id+','+response[i].order_id+','+response[i].autoincrement_id+','+"'"+response[i].call_date+"'"+','+"'"+response[i].time_slot+"'"+')" class="call_option" data-program = '+response[i].program_name+' data-id='+ response[i].call_status +' data-incrId="'+ response[i].id +'" data-source ="welcome-call"><option value="">Select</option><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv callNoteDiv'+response[i].id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+response[i].id+'" id="exampleTextarea" rows="3" placeholder="add Notes (optional)"></textarea> </div><div class="form-group m-form__group"><button class="btn btn-success btn-sm submitCallNote">Save</button></div></div> </td></tr>').appendTo('.modal-body #cms');
                                    }else{
                                        $('<tbody>').html("<tr><td>" + response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_status + '</td><td></td></tr>').appendTo('.modal-body #cms');
                                    }
                                
                                  });
                                 
                             break;
                             
                             case 'todays_progress_call':
                               
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html("Today's Progress Calls");
                               $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"><th>Date</th><th>Time(am/pm)</th><th>Name</th><th>Program Name</th><th>Client Status</th><th>Call Status</th><th>Action</th></tr></thead><tbody>');
 
                             $.each(response, function(i, item) 
                               {
                                  if(response[i].name!='--')
                                  {
                                      $('<tbody>').html("<tr><td>" + response[i].call_date + "</td><td>" + response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_status + '</td><td><select onchange="welcomeCallAck(this,'+response[i].id+','+response[i].order_id+','+response[i].autoincrement_id+','+"'"+response[i].call_date+"'"+','+"'"+response[i].time_slot+"'"+')" class="call_option" data-program = '+response[i].program_name+' data-id='+ response[i].call_status +' data-incrId="'+ response[i].id +'" data-source ="progress-call"><option value="">Select</option><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv callNoteDiv'+response[i].id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+response[i].id+'" id="exampleTextarea" rows="3" placeholder="add Notes (optional)"></textarea> </div><div class="form-group m-form__group"><button class="btn btn-success btn-sm submitCallNote">Save</button></div></div> </td></tr>').appendTo('.modal-body #cms');
                                  }else{
                                      $('<tbody>').html("<tr><td>" + response[i].call_date +"</td><td>"+ response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_status + '</td><td></td></tr>').appendTo('.modal-body #cms');
                                  }
                              
                                });
 
                           break;
                           
                           case 'todays_feedback_call':
                               
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html("Today's Feedback Calls");
                               $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"><th>Date</th><th>Time(am/pm)</th><th>Name</th><th>Program Name</th><th>Client Status</th><th>Call Status</th><th>Action</th></tr></thead><tbody>');
 
                             $.each(response, function(i, item) 
                               {
                                  if(response[i].name!='--')
                                  {
                                      $('<tbody>').html("<tr><td>" + response[i].call_date + "</td><td>" + response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_status + '</td><td><select onchange="welcomeCallAck(this,'+response[i].id+','+response[i].order_id+','+response[i].autoincrement_id+','+"'"+response[i].call_date+"'"+','+"'"+response[i].time_slot+"'"+')" class="call_option" data-program = '+response[i].program_name+' data-id='+ response[i].call_status +' data-incrId="'+ response[i].id +'" data-source ="progress-call"><option value="">Select</option><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv callNoteDiv'+response[i].id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+response[i].id+'" id="exampleTextarea" rows="3" placeholder="add Notes (optional)"></textarea> </div><div class="form-group m-form__group"><button class="btn btn-success btn-sm submitCallNote">Save</button></div></div> </td></tr>').appendTo('.modal-body #cms');
                                  }else{
                                      $('<tbody>').html("<tr><td>" + response[i].call_date +"</td><td>"+ response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_status + '</td><td></td></tr>').appendTo('.modal-body #cms');
                                  }
                              
                                });
 
                           break;
                           
                           case 'unanswered_call':
                               
                               $('.modal-body').html('');
                               $('#exampleModalLabel').html('Unanswered Calls (Last 48 Hours)');
                               $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"><th>Date</th><th>Time</th><th>Name</th><th>Program Name</th><th>Client Status</th><th>Call Type</th><th colspan="2">Action</th></tr></thead><tbody>');
   
                                 $.each(response, function(i, item) 
                                 {
                                    if(response[i].name!='--')
                                    {
                                        $('<tbody>').html("<tr><td>"+response[i].call_date+"</td><td>" + response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_type + '</td><td><select onchange="welcomeCallAck(this,'+response[i].id+','+response[i].order_id+','+response[i].autoincrement_id+','+"'"+response[i].call_date+"'"+','+"'"+response[i].time_slot+"'"+')" class="call_option" data-program = '+response[i].program_name+' data-id='+ response[i].call_status +' data-incrId="'+ response[i].id +'" data-source ="welcome-call"><option value="">Select</option><option value="call completed later">Call Completed Later</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv callNoteDiv'+response[i].id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+response[i].id+'" id="exampleTextarea" rows="3" placeholder="add Notes (optional)" ></textarea> </div><div class="form-group m-form__group"><button class="btn btn-success btn-sm submitCallNote">Save</button></div></div> </td></tr>').appendTo('.modal-body #cms');
                                    }else{
                                        $('<tbody>').html("<tr><td>"+response[i].call_date+"</td><td>" + response[i].time + "</td><td>"+ response[i].name + "</td><td>" + response[i].program_name + "</td><td>" + response[i].order_type + "</td><td>" + response[i].call_type + '</td><td></td></tr>').appendTo('.modal-body #cms');
                                    }
                                
                                  });
   
                             break;
                             
                            //  avinash added this end
                             
                             
                             
                             
                           case 'mtd_health_score_omr':

                              $('.export-modal-body').html('');
                              $('#exampleModalLabel').html('MTD OMR Client Health Score List');
                              $('.export-modal-body').html('<label>Select All</label> <input type="checkbox" onclick="select_all_check()" class="select_all" > <button onClick="export_list(`mtd_health_score_omr`)">Export</button><table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email Id</th> <th>Status</th><th>Posted On</th><th>Action</th> </tr></thead><tbody>');

                              $.each(response, function(i, item) {
                                 var user_id = response[i].user_id;
                                 $('<tbody>').html("<tr><td>" + "<input type='checkbox' class='export_check' value='"+response[i].id+"'>"  + "</td><td>" + response[i].fullname + "</td><td>" + response[i].email_id + "</td><td>" + response[i].user_status + "</td><td>" + formatDateTime(response[i].created) + '</td><td> <div type="button" class="btn btn-warning text-white" onClick="health_score_ack(' + response[i].id + ','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });

                              break; 
                              
                          case 'wmr_12th_day_overdue':

                           $('.modal-body').html('');
                           $('#exampleModalLabel').html('<u><b>Weight Tracker 10th Day Overdue(Latest First)</b></u> ');

                           $('.modal-body').html('<div class="m-portlet__body"> <ul class="nav nav-tabs" role="tablist"> <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#m_tabs_wmr_1_1"><b>Today</b></a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_wmr_1_2"><b>Older</b></a> </li> </ul> <div class="tab-content"> <div class="tab-pane active" id="m_tabs_wmr_1_1" role="tabpanel"><small style="display: block;font-size: 14px; font-weight: normal; padding: 10px 0 0;">11th Day Reminder Gone Yesterday. 12th Day Overdue Will Go Today.</small><br> <table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>Name</b></th> <th><b>Number</b></th><th><b>Program Name</b></th><th><b>OD DAY</b></th><th><b>Ssn End Date</b></th><th><b>Current Ssn Details</b></th><th><b>Source</b></th><th><b>AutoText</b></th></tr></thead> <tbody> </tbody></table></div> <div class="tab-pane" id="m_tabs_wmr_1_2" role="tabpanel"><small style="display: block;font-size: 14px; font-weight: normal; padding: 0;">All  Entries Until Weight Received Or Before 19th Day Dormant.</small><br> <table id="cmsz" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>Name</b></th> <th><b>Number</b></th><th><b>Program Name</b></th><th><b>OD DAY</b></th><th><b>Ssn End Date</b></th><th><b>Current Ssn Details</b></th><th><b>Source</b></th><th><b>AutoText<b></th></tr></thead> <tbody> </tbody></table> </div> </div> </div>');

                           $.each(response, function(i, item) 
                           {     
                                   
                                   if(response[i].version_source!='')
                                   {
                                   var version_source_new = response[i].version_source.split('|');  
                                   var app_version = version_source_new[0];
                                   var source = version_source_new[1]+"<br/>";
                                   

                                    let latest_version = 
                                            <?php echo '["' . implode('", "', app_version1) . '"]' ?>;

                                    if( latest_version.includes(app_version))
                                     {
                                      app_update_button = '';
                                     }else{
                                        var app_update_button = '<button type="button" class="btn btn-success askupdate" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"  value='+response[i].user_id+' style="font-size:15px;">Update</button>';

                                     } 
                                }else{
                                    var source = '-';
                                    var app_update_button = '';

                                }

                                 
                                 if(response[i].allergy==null){
                                    var allergy ='-';
                                 }else{
                                    //var allergy=response[i].allergy;
                                    var allergy = "<div class='text-left'><b>Allergy:</b>"+response[i].allergy+"</div>";
                                 }


                                 if(response[i].eating_habit=='Vegetarian'||response[i].eating_habit=='Veg'){
                                    var eating_habit = "<div>Eating Habit: <img src=https://www.balancenutrition.in/crm_ui/assets/image/veg.png width=18px></div>"
                                 }else if(response[i].eating_habit=='Non Veg'||response[i].eating_habit=='nonveg'){
                                     var eating_habit = "<div>Eating Habit: <img src=https://www.balancenutrition.in/crm_ui/assets/image/non-veg.png width=18px></div>"
                                 }else if(response[i].eating_habit==null){
                                    var eating_habit = '-';
                                 }else{
                                    var eating_habit = '-';
                                 }

                                 if(response[i].food_aversion==null){
                                    var food_aversion ='-';

                                 }else{
                                   // var food_aversion=response[i].food_aversion;
                                    var food_aversion = "<div class='text-left'><b>Food Aversion:</b>"+response[i].food_aversion+"</div>";
                                 }

                              var today = new Date().toISOString().slice(0, 10);
                                    var start_date =response[i].diet_start_date;
                                    var today_new = Date.parse(today);
                                    var start_new = Date.parse(start_date);

                                    var new_10_days =  formatDateTime(response[i].ten_day);
                                    var add_10_days= new_10_days.replace("5:30 am","");
                                    
                                    var session_end_date = "<div class='text-left'><b>End Date: </b><span style='color:red'>"+add_10_days+"</span></div>";

                                    var session_number = "<div class='text-left'><b>Current Session: </b>"+response[i].send_session+"</div>";

                                    const diffTime = Math.abs(today_new - start_new);
                                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                                    
                                    if(diffDays =='0'){
                                        var diffDays = 'Today';
                                    }else if(diffDays=='1'){
                                       var diffDays = 'Yesterday';
                                    }else{
                                        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))+"th";   }   
                                var send_session = response[i].send_session; 
                                 var pending_session = response[i].program_session - send_session;

                                 var programe_session1 = "<div class='text-left'><b>Total:</b>"+response[i].program_session+"</div>";
                                 var send_session = "<div class='text-left'><b>Sent:</b>"+send_session+"</div>";
                                 var pending_session = "<div class='text-left'><b>Pending:</b>"+pending_session+"</div>";



                              if(response[i].actual_date==curdate)
                              {

                                 $('<tbody>').html("<tr><td><a href=<?php echo base_url('client-details/'); ?>"+response[i].user_id+"> "+ response[i].fullname + "</a></td><td>" + response[i].phone + "</td><td> " + response[i].program_name +" </td><td>"+diffDays+"</td><td>"+session_number+""+session_end_date+"</td><td>" +programe_session1+send_session+pending_session+"</td><td>"+source+""+app_update_button+'</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');

                                 j++;

                              }else{

                                 $('<tbody>').html("<tr><td><a href=<?php echo base_url('client-details/'); ?>"+response[i].user_id+"> "+ response[i].fullname + "</a></td><td>" + response[i].phone + "</td><td> " + response[i].program_name +" </td><td>"+diffDays+"</td><td>"+session_number+""+session_end_date+"</td><td>" +programe_session1+send_session+pending_session+"</td><td>"+source+""+app_update_button+'</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cmsz');
                                 
                                 k++;
                              }
                           });
                                                      
                        break;

                    case 'wmr_17th_day_overdue':

                           $('.modal-body').html('');
                           $('#exampleModalLabel').html('<u><b>Weight Tracker 17th Day Overdue(Latest First)</b></u> ');

                           $('.modal-body').html('<div class="m-portlet__body"> <ul class="nav nav-tabs" role="tablist"> <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#m_tabs_wmr_1_1"><b>Today</b></a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_wmr_1_2"><b>Older</b></a> </li> </ul> <div class="tab-content"> <div class="tab-pane active" id="m_tabs_wmr_1_1" role="tabpanel"><small style="display: block;font-size: 14px; font-weight: normal; padding: 10px 0 0;">11th Day Reminder Gone Yesterday. 12th Day Overdue Will Go Today.</small><br> <table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>Name</b></th> <th><b>Number</b></th><th><b>Program Name</b></th><th><b>OD DAY</b></th><th><b>Ssn End Date</b></th><th><b>Current Ssn Details</b></th><th><b>Source</b></th><th><b>AutoText</b></th></tr></thead> <tbody> </tbody></table></div> <div class="tab-pane" id="m_tabs_wmr_1_2" role="tabpanel"><small style="display: block;font-size: 14px; font-weight: normal; padding: 0;">All  Entries Until Weight Received Or Before 19th Day Dormant.</small><br> <table id="cmsz" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th><b>Name</b></th> <th><b>Number</b></th><th><b>Program Name</b></th><th><b>OD DAY</b></th><th><b>Ssn End Date</b></th><th><b>Current Ssn Details</b></th><th><b>Source</b></th><th><b>AutoText<b></th></tr></thead> <tbody> </tbody></table> </div> </div> </div>');
                               
                           $.each(response, function(i, item) 
                           {     


                                   if(response[i].version_source!='')
                                   {
                                   var version_source_new = response[i].version_source.split('|');  
                                   var app_version = version_source_new[0];
                                   var source = version_source_new[1]+"<br/>";
                                   

                                    let latest_version = 
                                            <?php echo '["' . implode('", "', app_version1) . '"]' ?>;

                                    if( latest_version.includes(app_version))
                                     {
                                      app_update_button = '';
                                     }else{
                                        var app_update_button = '<button type="button" class="btn btn-success askupdate" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"  value='+response[i].user_id+' style="font-size:15px;">Update</button>';

                                     } 
                                }else{
                                    var source = '-';
                                    var app_update_button = '';

                                }

                                 
                                 if(response[i].allergy==null){
                                    var allergy ='-';
                                 }else{
                                    //var allergy=response[i].allergy;
                                    var allergy = "<div class='text-left'><b>Allergy:</b>"+response[i].allergy+"</div>";
                                 }


                                 if(response[i].eating_habit=='Vegetarian'||response[i].eating_habit=='Veg'){
                                    var eating_habit = "<div>Eating Habit: <img src=https://www.balancenutrition.in/crm_ui/assets/image/veg.png width=18px></div>"
                                 }else if(response[i].eating_habit=='Non Veg'||response[i].eating_habit=='nonveg'){
                                     var eating_habit = "<div>Eating Habit: <img src=https://www.balancenutrition.in/crm_ui/assets/image/non-veg.png width=18px></div>"
                                 }else if(response[i].eating_habit==null){
                                    var eating_habit = '-';
                                 }else{
                                    var eating_habit = '-';
                                 }

                                 if(response[i].food_aversion==null){
                                    var food_aversion ='-';

                                 }else{
                                   // var food_aversion=response[i].food_aversion;
                                    var food_aversion = "<div class='text-left'><b>Food Aversion:</b>"+response[i].food_aversion+"</div>";
                                 }

                              var today = new Date().toISOString().slice(0, 10);
                                    var start_date =response[i].diet_start_date;
                                    var today_new = Date.parse(today);
                                    var start_new = Date.parse(start_date);

                                    var new_10_days =  formatDateTime(response[i].ten_day);
                                    var add_10_days= new_10_days.replace("5:30 am","");
                                    
                                    var session_end_date = "<div class='text-left'><b>End Date: </b><span style='color:red'>"+add_10_days+"</span></div>";

                                    var session_number = "<div class='text-left'><b>Current Session: </b>"+response[i].send_session+"</div>";

                                    const diffTime = Math.abs(today_new - start_new);
                                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                                    
                                    if(diffDays =='0'){
                                        var diffDays = 'Today';
                                    }else if(diffDays=='1'){
                                       var diffDays = 'Yesterday';
                                    }else{
                                        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))+"th";   }   
                                var send_session = response[i].send_session; 
                                 var pending_session = response[i].program_session - send_session;

                                 var programe_session1 = "<div class='text-left'><b>Total:</b>"+response[i].program_session+"</div>";
                                 var send_session = "<div class='text-left'><b>Sent:</b>"+send_session+"</div>";
                                 var pending_session = "<div class='text-left'><b>Pending:</b>"+pending_session+"</div>";



                              if(response[i].actual_date==curdate)
                              {

                                 $('<tbody>').html("<tr><td><a href=<?php echo base_url('client-details/'); ?>"+response[i].user_id+"> "+ response[i].fullname + "</a></td><td>" + response[i].phone + "</td><td> " + response[i].program_name +" </td><td>"+diffDays+"</td><td>"+session_number+""+session_end_date+"</td><td>" +programe_session1+send_session+pending_session+"</td><td>"+source+""+app_update_button+'</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');

                                 j++;

                              }else{

                                 $('<tbody>').html("<tr><td><a href=<?php echo base_url('client-details/'); ?>"+response[i].user_id+"> "+ response[i].fullname + "</a></td><td>" + response[i].phone + "</td><td> " + response[i].program_name +" </td><td>"+diffDays+"</td><td>"+session_number+""+session_end_date+"</td><td>" +programe_session1+send_session+pending_session+"</td><td>"+source+""+app_update_button+'</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cmsz');
                                 
                                 k++;
                              }
                           });
                                                      
                        break;    

                        
                        case 'break_overdue':

                              $('.modal-body').html('');
                              $('#exampleModalLabel').html('Break Overdue ');
                              $('.modal-body').html('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email Id</th> <th>Program</th><th>Note</th><th>End Date</th><th>Action</th> </tr></thead><tbody>');

                              $.each(response, function(i, item) {
                                 $('<tbody>').html("<tr><td>" + (i + 1) + "</td><td>" + response[i].first_name +" "+response[i].last_name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].program_name + "</td><td>" + response[i].onhold_note + "</td><td>" + response[i].end_date+ '</td><td><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/') ?>' + response[i].user_id + '/short-program" target="_blank" style="color:  white;">View</a></div></td></tr>').appendTo('.modal-body #cms');
                              });
                        break;
                        case 'last_thirty_days_omr_notification':
                               
                                 $('.export-modal-body').html('');
                                 $('#exampleModalLabel').html('Last 30 Days OMR Notification');
                                 $('.export-modal-body').html('<label>Select All</label> <input type="checkbox" onclick="select_all_check()" class="select_all" ><button onClick="export_list(`last_thirty_days_omr_notification`)">Export</button><table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Name</th><th>Email-Id</th> <th>Phone</th><th>Last Program</th><th>Action</th></tr></thead><tbody>');
   
                              
                              $.each(response, function(i, item) {
                                  
                                  var user_id = response[i].user_id;
                                 $('<tbody>').html("<tr><td>" + "<input type='checkbox' class='export_check' value='"+response[i].id+"'>"  + "</td><td>" + response[i].name + "</td><td>" + response[i].email_id + "</td><td>" + response[i].phone + "</td><td>" + response[i].last_program +'</td><td> <div type="button" class="btn btn-warning text-white" onClick="reply_omr_notification('+response[i].id+','+user_id+')" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><i class="fa fa-reply"></i></div ></td></tr>').appendTo('.modal-body #cms');
                              });
                              
                              
                        break;
                        case 'program_page_visit_active':
                        <?php
                                $day = date('w');
                                $week_start = date('l dS M., y', strtotime('-'.($day-1).' days'));
                                ?>
                                var today = "<?= date('l dS M., y') ?>";
                                var month_start = "<?= date('l dS M., y', strtotime('-'.($day-2).' days')) ?>";
                                var week_start = "<?= $week_start  ?>";
                                
                                $('.export-modal-body').html('');
                                
                                $('#exampleModalLabel').html('Program Page Vists (Active) Today <b>'+today+'</b>');
                                 
                                 var htmlData = "";
                                 
                                 htmlData += '<div class="m-portlet__body"> <ul class="nav nav-tabs" role="tablist"> <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#m_tabs_checkout_active_today">Today</a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_checkout_active_weekly">Weekly</a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_checkout_active_mtd">MTD</a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_checkout_active_all">All Time</a> </li> </ul> <div class="tab-content"> <div class="tab-pane active" id="m_tabs_checkout_active_today" role="tabpanel"> <div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, -1, 0, 0);float: left;padding: 0 1rem 0 5px;margin: 10px 0 0;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`today`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div>';
                                 
                                 htmlData += '<table id="cms" class="table table-striped table-bordered nowrap table-bordered m-table m-table--border-brand m-table--head-bg-brand" style="width:100%"><thead class="thead-inverse"> <tr><th>#</th><th>Name</th><th>Email & Program (sessions)</th><th>Client Status</th> <th style="width: 200px;">Program Suggested</th><th>Programs Visited (sessions)</th><th>Visits count</th><th>Action</th></tr></thead> <tbody>';
   
                                 $.each(response.today, function(i, item) 
                                 {  
                                     var current_duration = '';
                                     if(item.current_program_duration){
                                         current_duration = '('+item.current_program_duration+'S)';
                                     }
                                     
                                    if(item.suggested_program != null){
                                        var pro_sug = item.suggested_program;
                                        pro_sugList = pro_sug.split(",");
                                        
                                        // list = str.replace(/<(.|\n)*?>/g, '');
                                        
                                        var program_suggested = '<ul class="ingred_list">';
                                        var incId = 1;
                                        
                                        for(var j=0; j<pro_sugList.length; j++) {
                                            program_suggested += '<li><b>Option '+ incId +'</b> - ' + pro_sugList[j].replace(/<(.|\n)*?>/g, '') + '</li>';
                                            
                                            incId++;
                                        }
                                        
                                        program_suggested += '</ul>';
                                    }else{
                                        program_suggested = "";
                                    }
                                    
                                     
                                     
                                     htmlData += "<tr><td>" +"<input type='checkbox' class='export_check' value='"+item.id+"'>"+ "</td><td>"  + item.first_name+" "+item.last_name +"</td><td>" + item.email_id + "<br>("+item.current_program+")"+current_duration+"</td><td>" + item.current_user_status + "</td><td>"+program_suggested+"</td><td>" + item.program_page + "</td><td>" + item.visits + "</td><td><div type='button' class='btn btn-warning p-1 btn-sm'><a href='client-details/"+item.id+"' target='_blank' style='color:white;'><i class=\"fa fa-reply\"></i></a></div></td></tr>";
                                 });
                                 
                                 
                                htmlData += '</tbody></table><div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, 1, 0, 0); float: left; padding: 0 1rem 0 5px;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`today`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div></div><div class="tab-pane" id="m_tabs_checkout_active_weekly" role="tabpanel"> <div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, -1, 0, 0);float: left;padding: 0 1rem 0 5px;margin: 10px 0 0;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`week`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div>';
                                
                                htmlData += '<table id="cms" class="table table-striped table-bordered nowrap table-bordered m-table m-table--border-brand m-table--head-bg-brand" style="width:100%"><thead class="thead-inverse"> <tr><th>#</th><th>Name</th><th>Email & Program (sessions)</th><th>Client Status</th> <th>Program Suggested</th><th>Programs Visited (sessions)</th><th>Visits count</th><th>Action</th></tr></thead> <tbody>';
   
                                 $.each(response.week, function(i, item) 
                                 {  
                                     var current_duration = '';
                                     if(item.current_program_duration){
                                         current_duration = '('+item.current_program_duration+'S)';
                                     }
                                    
                                    if(item.suggested_program != null){
                                        var pro_sug = item.suggested_program;
                                        pro_sugList = pro_sug.split(",");
                                        
                                        // list = str.replace(/<(.|\n)*?>/g, '');
                                        
                                        var program_suggested = '<ul class="ingred_list">';
                                        var incId = 1;
                                        
                                        for(var j=0; j<pro_sugList.length; j++) {
                                            program_suggested += '<li><b>Option '+ incId +'</b> - ' + pro_sugList[j].replace(/<(.|\n)*?>/g, '') + '</li>';
                                            
                                            incId++;
                                        }
                                        
                                        program_suggested += '</ul>';
                                    }else{
                                        program_suggested = "";
                                    }
                                    
                                     htmlData += "<tr><td>" +"<input type='checkbox' class='export_check' value='"+item.id+"'>"+ "</td><td>"  + item.first_name+" "+item.last_name +"</td><td>" + item.email_id + "<br>("+item.current_program+")"+current_duration+"</td><td>" + item.current_user_status + "</td><td>"+program_suggested+"</td><td>" + item.program_page + "</td><td>" + item.visits + "</td><td><div type='button' class='btn btn-warning p-1 btn-sm'><a href='client-details/"+item.id+"' target='_blank' style='color:white;'><i class=\"fa fa-reply\"></i></a></div></td></tr>";
                                 });
                                
                                htmlData += '</tbody></table><div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, 1, 0, 0); float: left; padding: 0 1rem 0 5px;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`week`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div></div> <div class="tab-pane" id="m_tabs_checkout_active_mtd" role="tabpanel"> <div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, -1, 0, 0);float: left;padding: 0 1rem 0 5px;margin: 10px 0 0;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`mtd`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div>'; 
                                
                                htmlData += '<table id="cms" class="table table-striped table-bordered nowrap table-bordered m-table m-table--border-brand m-table--head-bg-brand" style="width:100%"><thead class="thead-inverse"> <tr><th>#</th><th>Name</th><th>Email & Program (sessions)</th><th>Client Status</th> <th>Program Suggested</th><th>Programs Visited (sessions)</th><th>Visits count</th><th>Action</th></tr></thead> <tbody>';
   
                                 $.each(response.mtd, function(i, item) 
                                 {  
                                     var current_duration = '';
                                     if(item.current_program_duration){
                                         current_duration = '('+item.current_program_duration+'S)';
                                     }
                                     
                                    if(item.suggested_program != null){
                                        var pro_sug = item.suggested_program;
                                        pro_sugList = pro_sug.split(",");
                                        
                                        // list = str.replace(/<(.|\n)*?>/g, '');
                                        
                                        var program_suggested = '<ul class="ingred_list">';
                                        var incId = 1;
                                        
                                        for(var j=0; j<pro_sugList.length; j++) {
                                            program_suggested += '<li><b>Option '+ incId +'</b> - ' + pro_sugList[j].replace(/<(.|\n)*?>/g, '') + '</li>';
                                            
                                            incId++;
                                        }
                                        
                                        program_suggested += '</ul>';
                                    }else{
                                        program_suggested = "";
                                    }
                                     
                                     htmlData += "<tr><td>" +"<input type='checkbox' class='export_check' value='"+item.id+"'>"+ "</td><td>"  + item.first_name+" "+item.last_name +"</td><td>" + item.email_id + "<br>("+item.current_program+")"+current_duration+"</td><td>" + item.current_user_status + "</td><td>"+program_suggested+"</td><td>" + item.program_page + "</td><td>" + item.visits + "</td><td><div type='button' class='btn btn-warning p-1 btn-sm'><a href='client-details/"+item.id+"' target='_blank' style='color:white;'><i class=\"fa fa-reply\"></i></a></div></td></tr>";
                                 });
                                 
                                htmlData += '</tbody></table><div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, 1, 0, 0); float: left; padding: 0 1rem 0 5px;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`mtd`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div></div> <div class="tab-pane" id="m_tabs_checkout_active_all" role="tabpanel"> <div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, -1, 0, 0);float: left;padding: 0 1rem 0 5px;margin: 10px 0 0;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`alltime`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div>';
                                
                                htmlData += '<table id="cms" class="table table-striped table-bordered nowrap table-bordered m-table m-table--border-brand m-table--head-bg-brand" style="width:100%"><thead class="thead-inverse"> <tr><th>#</th><th>Name</th><th>Email & Program (sessions)</th><th>Client Status</th> <th>Program Suggested</th><th>Programs Visited (sessions)</th><th>Visits count</th><th>Action</th></tr></thead> <tbody>';
   
                                 $.each(response.alltime, function(i, item) 
                                 {  
                                     var current_duration = '';
                                     if(item.current_program_duration){
                                         current_duration = '('+item.current_program_duration+'S)';
                                     }
                                     
                                    if(item.suggested_program != null){
                                        var pro_sug = item.suggested_program;
                                        pro_sugList = pro_sug.split(",");
                                        
                                        // list = str.replace(/<(.|\n)*?>/g, '');
                                        
                                        var program_suggested = '<ul class="ingred_list">';
                                        var incId = 1;
                                        
                                        for(var j=0; j<pro_sugList.length; j++) {
                                            program_suggested += '<li><b>Option '+ incId +'</b> - ' + pro_sugList[j].replace(/<(.|\n)*?>/g, '') + '</li>';
                                            
                                            incId++;
                                        }
                                        
                                        program_suggested += '</ul>';
                                    }else{
                                        program_suggested = "";
                                    }
                                    
                                    
                                     htmlData += "<tr><td>" +"<input type='checkbox' class='export_check' value='"+item.id+"'>"+ "</td><td>"  + item.first_name+" "+item.last_name +"</td><td>" + item.email_id + "<br>("+item.current_program+")"+current_duration+"</td><td>" + item.current_user_status + "</td><td>"+program_suggested+"</td><td>" + item.program_page + "</td><td>" + item.visits + "</td><td><div type='button' class='btn btn-warning p-1 btn-sm'><a href='client-details/"+item.id+"' target='_blank' style='color:white;'><i class=\"fa fa-reply\"></i></a></div></td></tr>";
                                 });
                                
                                htmlData += '</tbody></table><div class="m-form__group form-group"><i class="fa fa-level-up" style="transform: matrix(-1, 0, 0, 1, 0, 0); float: left; padding: 0 1rem 0 5px;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`program_page_visit_active`,`alltime`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div></div> </div></div>';
                                    
                                 $('.export-modal-body').html(htmlData);
                                 
                                 $('.export-modal-body a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                                  //e.target // newly activated tab
                                  //e.relatedTarget // previous active tab
                                    // $('.export_check').removeAttr("checked");
                                    $(".export_check,.select_all").prop('checked', false);
                                    
                                    var tabViewName = $(this).text(); 
                                    // alert(tabViewName);
                                    var daterange = "";
                                    if(tabViewName == 'Today'){
                                        daterange = today;
                                    }else if(tabViewName == 'Weekly'){
                                        daterange = week_start+" - "+today;
                                    }else if(tabViewName == 'MTD'){
                                        daterange = month_start+" - "+today;
                                    }
                                    
                                    $('#exampleModalLabel').html('Program Page Vists (Active) '+tabViewName+" <b>"+daterange+"</b>");
                                  
                                });
                                break;
                                case 'new_dormant_client':
   
                                    $('.modal-body').html('');
                                    $('#exampleModalLabel').html('Dormant Client List');
                                    $('.modal-body').html('<div class="m-portlet__body"> <ul class="nav nav-tabs" role="tablist"> <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#m_tabs_wmr_1_1">19th Day +</a> </li> <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#m_tabs_wmr_1_2">24th Day +</a> </li> </ul> <div class="tab-content"> <div class="tab-pane active" id="m_tabs_wmr_1_1" role="tabpanel"> <table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr><th>ID</th><th>Name</th> <th>Program Name</th><th>Session</th><th>Last Diet Date</th><th>Days</th><th>Action</th> </tr></thead> <tbody> </tbody></table></div> <div class="tab-pane" id="m_tabs_wmr_1_2" role="tabpanel"> <table id="cmsz" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"><tr><th>ID</th><th>Name</th> <th>Program Name</th><th>Session</th><th>Last Diet Date</th><th>Days</th><th>Action</th></tr></thead> <tbody></tbody></table> </div> </div> </div>');
            
                                    $.each(response, function(i, item) 
                                    {                                   
                                       if(response[i].difference<25)
                                       {
                                          $('<tbody>').html("<tr><td>" + (j+1) + "</td><td>" + response[i].fullname + "</td><td>" + response[i].program_name + ' ('+response[i].program_session+'s)' + "</td><td>" + response[i].actual_session + "</td><td>" + formatDate(response[i].start_date) + "</td><td>" + response[i].difference + '</td><td><div type="button" class="btn btn-warning" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/chat" target="_blank" style="color:  white;"><i class="fa fa-reply"></i></a></div><div type="button" class="btn btn-info" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;margin:0px 5px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">All Tracker</a></div><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'" target="_blank" style="color:  white;">Diet</a></div></td></tr>').appendTo('.modal-body #cms');
            
                                          j++;
            
                                       }else{
            
                                          $('<tbody>').html("<tr><td>" + (k+1) + "</td><td>" + response[i].fullname + "</td><td>" + response[i].program_name + ' ('+response[i].program_session+'s)' + "</td><td>" + response[i].actual_session + "</td><td>" + formatDate(response[i].start_date) + "</td><td>" + response[i].difference  +  '</td><td><div type="button" class="btn btn-warning" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/chat" target="_blank" style="color:  white;"><i class="fa fa-reply"></i></a></div><div type="button" class="btn btn-info" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;margin:0px 5px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'/all-tracker" target="_blank" style="color:  white;">All Tracker</a></div><div type="button" class="btn btn-success" style="padding-left: 2px; padding-right: 2px; padding-top: 2px; padding-bottom: 2px;"><a href="<?php echo base_url('client-details/'); ?>'+response[i].user_id+'" target="_blank" style="color:  white;">Diet</a></div></td></tr>').appendTo('.modal-body #cmsz');
            
                                          k++;
                                       }
            
                                       
                                    });
                                break;
                        
                        
                       }
                       $("#m_modal_1").modal("show");
                   }
               }
           });
   }
   
   function cbab(id="")
   {
         var program=id; 
         if(program!="")
         {
            $.ajax({
                        type:"post",
                        url:"<?php echo base_url('dashboard/mentor/mentor_client_details/'); ?>"+program,
                        success: function(response)
                        {
                           $(".modal-body").html(response);
                           $("#commonModalTitle").html(program+" Clients");
                           $("#commonModal").modal('show');
   
                        },error: function()
                        {
                           alert("Error : Data not found !");
                        }                     
                  });
         }
      }
    function tailend(id="")
   {
         var session=id;
   
         if(session!="")
         {
            $.ajax({
                        type:"post",
                        url:"<?php echo base_url('dashboard/mentor/tail_end_ajax/'); ?>"+session,
                        success: function(response)
                        {
   
                           $(".modal-body").html(response);
                           $("#commonModalTitle").html(session);
                           $("#commonModal").modal('show');
   
                        },error: function()
                        {
                           alert("Error : Data not found !");
                        }                     
                  });
         }
      }
    
    function toggleNote(user_id){
        $(".callNoteDiv"+user_id).show();
                                
    }
    function call_status_reminder_popup(){
        
        var today = new Date();
        var call_time = new Date(today.getTime() - 25*60000);

          var h = '00';
          if( call_time.getHours() > 12 ){
            h = checkTime(call_time.getHours() - 12);
          }else{
            h = checkTime(call_time.getHours());
          }
          var m = call_time.getMinutes();
          var s = '00';
          m = checkTime(m);

        var call_time = (h + ":" + m + ":" + s).toString();

        var data = <?php echo json_encode($today_call_list);?>; 

        if(data != null){
            for(var i = 0;i<data[0].result.length;i++){
                

                if(call_time == data[0].result[i].time_slot){
                    var call_id = data[0].result[i].call_id;
                    // var url="<?php //echo base_url('mentor/call_details'); ?>";
                    var user_id = data[0].result[i].id;
                    var name = data[0].result[i].name;
                    var autoincrement_id = data[0].result[i].autoincrement_id;
                    var order_id = data[0].result[i].order_id;
                    var call_date = data[0].result[i].call_date;
                    var time_slot = data[0].result[i].time_slot;
                    var program_name = data[0].result[i].program_name;
                    var call_type = data[0].result[i].call_type;
                    
                    var type = '';
                    var source = '';
                    if(data[0].result[i].call_type == '0'){
                        type = 'welcome';
                        source = 'welcome-call';
                    }else if(data[0].result[i].call_type == '1'){
                        type = 'half time progress';
                        source = 'progress-call';
                    }else if(data[0].result[i].call_type == '2'){
                        type = 'final feedback (Tailend)';
                        source = 'feedback-call';
                    }
                    
                   $.ajax({
                       
                        type:'post',
                         url:base_url+'dashboard/mentor/call_status',
                         data: {call_id:call_id},
                         success:function(response)
                         {  
                            var status = response;
                            
                            if(status == 'pending' || status == 'rescheduled'){
                                var notification_text = "<h4>You had a "+type+" call with <a target='_blank' href='client-details/"+user_id+"'>"+name+"</a>. Please update the status.</h4>";
                                console.log(notification_text);
                                // var html = '<select id="select'+user_id+'" class="call_option" data-program = '+program_name+' data-id='+ status +' data-incrId="'+ user_id +'" data-source ="'+source+'"><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv'+user_id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+user_id+'" id="exampleTextarea" rows="3" placeholder="add Notes (optional)"></textarea> </div><div class="form-group m-form__group"></div></div> </td></tr>';
                                var html = '<select onchange="welcomeCallAck(this,'+user_id+','+order_id+','+autoincrement_id+','+"'"+call_date+"'"+','+"'"+time_slot+"'"+')" class="call_option form-control m-input" data-program = '+program_name+' data-id='+ status +' data-incrId="'+ user_id +'" data-source ="'+source+'" style="border-color: #000;margin: 2rem 0 0;"><option value="">Select Status</option><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv'+user_id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+user_id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea> </div><div class="form-group m-form__group"><button class="btn btn-success submitCallNote mt-3">Save</button></div></div>'
                                var contents = notification_text+html;
                                
                                
                                $("#reminderModal").modal("show");
                                $("#reminderModal .modal-dialog").removeClass("modal-lg").css({ "max-width" : "30%" });
                                $('.reminderModalBody').html('');
                                $('#reminderModalTitle').html('Call Completed/Missed - Update Now');
                                $('#reminderModal .modal-header').addClass('p-3');
                                $('#reminderModal .close').addClass('mt-1');
                                $('.reminderModalBody').html(contents).css({ "text-align" : "center" });
                                $('#reminderModal .modal-footer').hide();
                            
                                
                            }
    
                         },complete: function(response){
                            //  console.log('complete');
                             
                          },error:function(jqXHR, textStatus, errorThrown)
                         {
                             console.log(errorThrown);
                         }
                      });
                }
            }
        }
    }


    /* popup notification code ends here */

     $(document).ajaxStop(function()
    {
        check_previleges();
    }); 


    function check_previleges() 
    {
        var is_mentor_client="<?php echo $is_mentor_client; ?>";

        //alert(is_mentor_client);
        
        if(is_mentor_client=='0')
        {
            swal({
                title:'This is not your client , only view rights enable !',
                confirmButtonColor:'info',
                confirmButtonText:"View Now"
                })

            setTimeout(() => {
                 $(".update,.create,.delete"). removeAttr("href");
                $('.update,.create,.delete').css({"pointer-events": "none","cursor": "default","opacity":"0.4"});   
            }, 2000);    
        }
    }

    /* function previleges()
    {   

        
        
        var create_access="<?php echo ($create_access!='') ? $create_access : 0; ?>";         
        var update_access="<?php echo ($update_access!='') ? $update_access : 0; ?>";         
        var delete_access="<?php echo ($delete_access!='') ? $delete_access : 0; ?>";
        
                                        
        if(create_access=="0")
        {
            $(".create"). removeAttr("href");
            $('.create').css({"pointer-events": "none","cursor": "default","opacity":"0.4"});    

        }else if(create_access=='1')
        {
            $('.create').css({});    
        }

        if(update_access=="0")
        {            
            $(".update"). removeAttr("href");
            $('.update').css({"pointer-events": "none","cursor": "default","opacity":"0.4"});    

        }else if(update_access=='1')
        {
            $('.update').css({});    
        }

        if(delete_access=="0")
        {
            $(".delete").attr('onclick',"return false");
            $('.delete').css({"pointer-events": "none","cursor": "default !important","opacity":"0.4"});

        }else if(delete_access=='1')
        {
            $('.delete').css({});    
        }
        
    } */
</script>


<script>
 
    function formatDateTime(date) 
    {
          var date=new Date(date);
          var monthNames = [
              "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ];   
          var hours = date.getHours();
          var minutes = date.getMinutes();
          var ampm = hours >= 12 ? 'pm' : 'am';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          minutes = minutes < 10 ? '0'+minutes : minutes;
          var strTime = hours + ':' + minutes + ' ' + ampm;
          return date.getDate() + " " +(monthNames[date.getMonth()]) + ", " +date.getFullYear()+ "  " + strTime;

    }

    function formatDate(date) 
    {
          var date=new Date(date);
          var monthNames = [
              "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ];   
          var hours = date.getHours();
          var minutes = date.getMinutes();
          var ampm = hours >= 12 ? 'pm' : 'am';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          minutes = minutes < 10 ? '0'+minutes : minutes;
          var strTime = hours + ':' + minutes + ' ' + ampm;
          return date.getDate() + " " +(monthNames[date.getMonth()]) + ", " +date.getFullYear();
        
    }   
    
    
      function viewReminder()
      { 
          
        //   alert('yesss');
        //   return false;
        $("#save_date").removeAttr("disabled");
        var date=$('#start_date_send').val();
        var diet_id=$(this).attr('data-dietId'); 
        var diet_status="<?php echo $diet['diet_status']; ?>"; //alert(diet_status);

        if(date!='' && diet_id!='' && diet_status!='3')
        {
            
                    $.ajax({

                        type:'post',
                        url:"<?php echo base_url('client/view_diet_start_date/')?>"+diet_id+'/'+date,
                        success: function(response)
                        
                        {   
                            $('#reset_reminder').modal('show');
                            $("#reset_reminder_body").html(response);
                            //$("#reset_reminder_footer").html('<button type="button" id="change_start_date" class="btn btn-info">Change start date</button><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>');
                              
                        },
                        error: function()
                        {
                          alert('Error: Fail to update start date !');
                        }

                  });  
            

        }
      };


    function saveStartDate()
    {          
        var date=$('#start_date_send').val();
        var diet_id=$('#save_date').attr('data-dietId'); 
        var diet_status="<?php echo $diet['diet_status']; ?>"; //alert(diet_status);

        if(date!='' && diet_id!='' && diet_status!='3')
        {
            
            $.ajax({

                type:'post',
                url:"<?php echo base_url('client/update_diet_start_date/')?>"+diet_id+'/'+date,
                success: function(response)
                {
                    if(response==1)
                    {alert('start date changed');
                        //swal("Done!", "Start date changed", "success");
                        $('#commonModal').modal('hide');
                        location.reload();
                    }
                },
                error: function()
                {
                        //swal("Error!", "Error: Fail to update start date !", "error");
                    alert('Error: Fail to update start date !');
                }

            });
        }
    };
    
    $(document).ready(function(){
        $('#commonModal').on('show.bs.modal', function () {
        
            $(".copyViewDietBtn").on("click", function()
              {
                  $(this).each(function(index){
                     
                     var valueFind = $(this).attr("data-id");
                    
                    swal({
                        title: 'Copied',
                        timer: 2000,
                        showConfirmButton: false
                    })
                    
                    var copyText = $(".pastedContent"+valueFind).html();
                    
                    // alert(copyText)
                    copyFormatted(copyText);
                
                  });
            });
            
            function copyFormatted (html) {
              // Create an iframe (isolated container) for the HTML
              var container = document.createElement('div')
              container.innerHTML = html
              
              // Hide element
              container.style.position = 'fixed'
              container.style.pointerEvents = 'none'
              container.style.opacity = 0
        
              // Detect all style sheets of the page
              var activeSheets = Array.prototype.slice.call(document.styleSheets)
                .filter(function (sheet) {
                  return !sheet.disabled
              })
        
              // Mount the iframe to the DOM to make `contentWindow` available
              document.body.appendChild(container)
        
              // Copy to clipboard
              window.getSelection().removeAllRanges()
              
              var range = document.createRange()
              range.selectNode(container)
              window.getSelection().addRange(range)
        
              document.execCommand('copy')
              for (var i = 0; i < activeSheets.length; i++) activeSheets[i].disabled = true
              document.execCommand('copy')
              for (var i = 0; i < activeSheets.length; i++) activeSheets[i].disabled = false
              
              // Remove the iframe
              document.body.removeChild(container);
            }
            
        });
    });

</script>
<script>
$(document).ready(function(){
    function getOrdinalNum(n) {
      return n + (n > 0 ? ['th', 'st', 'nd', 'rd'][(n > 3 && n < 21) || n % 10 > 3 ? 0 : n % 10] : '');
    }
    function formatDate(date) {
        if (date !== undefined && date !== "") {
          var myDate = new Date(date);
          var month = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ][myDate.getMonth()];
          var str = getOrdinalNum(myDate.getDate()) +" " + month + ", " + myDate.getFullYear();
          return str;
        }
        return "";
      }
    
    $(".reset_mentor_reminder").click(function(){
        // jQuery("#").reset();
        // document.forms["mentor_reminder_form"].reset();
        $("#mentorreminderModalTitle").html("SET A REMINDER");
        $(".mentor_reminder_success_message").hide();
        $(".mentor_reminder_passedtime_message").hide();
        $(".mentor_reminder_areusure_message").hide();
        $(".mentor_reminder_sunday_message").hide();
        $(".mentor_reminder_form_sec").show();
    });
    
    $("#save_reminder").click(function(){
        var reminder_title = $("#reminder_title").val();
        var reminder_note =  $("#reminder_note").val();
        var reminder_date = $(".reminder_date").val();
        
        var error = false;
        var error_title = "";
       if(reminder_title == ""){
           error = true;
           error_title = "Please enter a title";
           $("#error_title").show();
           $("#error_title").html(error_title);
       }
       if(reminder_date == ""){
           error = true;
           error_date = "Please enter a date";
           $("#error_date").show();
           $("#error_date").html(error_date);
       }
       if($(".reminder_time").val() == ""){
           error = true;
           error_time = "Please enter a time";
           $("#error_time").show();
           $("#error_time").html(error_time);
       }
       
       
        var url = "<?php echo base_url('client/update_reminder'); ?>";
        if(!error){
            
            
            
            
            // console.log($(".reminder_time").val());
            var time = $(".reminder_time").val();
            var hours = Number(time.match(/^(\d+)/)[1]);
            var minutes = Number(time.match(/:(\d+)/)[1]);
            var AMPM = time.match(/\s(.*)$/)[1];
            if(AMPM == "PM" && hours<12) hours = hours+12;
            if(AMPM == "AM" && hours==12) hours = hours-12;
            var sHours = hours.toString();
            var sMinutes = minutes.toString();
            if(hours<10) sHours = "0" + sHours;
            if(minutes<10) sMinutes = "0" + sMinutes;
            // alert(sHours + ":" + sMinutes);
            var reminder_time = sHours+":"+sMinutes+":00";
            
            // alert(sHours);
            if((sHours < 23 && sHours > 19 || sHours == 00)){
                
            }else{
                // 
            }
            
            var dt = new Date();
            var monthValue = (dt.getMonth() + 1).toString().padStart(2, "0");
            var timepick = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            var day = monthValue + "/" + dt.getDate() + "/" + dt.getFullYear();;
            
            // alert(day);
            
            var reminder_dt = new Date(reminder_date);
            
            console.log(day+" "+reminder_date);
            
            if(reminder_dt.getDay() == 0){
                $("#mentorreminderModalTitle").html("");
                $(".mentor_reminder_form_sec").hide();
                $(".mentor_reminder_sunday_message").show(); 
            }
            else if(reminder_time >= "19:01:00" || reminder_time <= "08:59:00"){
                $("#mentorreminderModalTitle").html("");
                $(".mentor_reminder_form_sec").hide();
                $(".mentor_reminder_areusure_message").show();
            }
            else if((day == reminder_date) && reminder_time <= timepick){
                $("#mentorreminderModalTitle").html("");
               $(".mentor_reminder_form_sec").hide();
                $(".mentor_reminder_passedtime_message").show(); 
            }
            else{
                $("#mentorreminderModalTitle").html("");
                $("#dt_confirm").html("Set a reminder for "+formatDate(reminder_date)+" "+$(".reminder_time").val()+" IST ?");
                $(".mentor_reminder_success_message").show();
                $(".mentor_reminder_form_sec").hide();
            } 
            
            
            $(".save_reminder_message").click(function(){
                
                var response = 1;
                $.ajax({
                     type:'post',
                     url:url,
                     data: {reminder_title:reminder_title,reminder_note:reminder_note,reminder_date:reminder_date,reminder_time:reminder_time},
                     
                     success:function(response)
                     {  $("#mentorreminderModal").toggle();
                         if(response == 1){
                        //  alert("Reminder added");
                        //  window.location.reload();
                        
                            swal({
                                title: 'Reminder has been set and you will get a pop up on your dashboard/phone (if logged in) 15 min before the set time.',
                                // timer: 5000,
                                showConfirmButton: true
                            }).then(function() {
                             window.location.reload();
                            })
                            
                        }
                     },complete: function(response){
                        /*$("#mentorreminderModal").on('shown.bs.modal', function (e) {
                            // do something...
                            $(".mentor_reminder_success_message").html("<p>Reminder has been set and you will get a pop up on your dashboard/phone (if logged in) 15 min before the set time</p>");
                        });*/
                        // window.location.reload();
                     },error:function(jqXHR, textStatus, errorThrown)
                     {
                     }
                });
            });
            
                
            }
        });
    
});

$(document).ready(function() {
  var dateInput = $('input[name="date"]'); // Our date input has the name "date"
  var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : 'body';
  dateInput.datepicker({
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
    startDate: truncateDate(new Date()) // <-- THIS WORKS
  });

  $('#m_datepicker_2').datepicker('setStartDate', truncateDate(new Date())); // <-- SO DOES THIS
});


function editReminder(reminder_id){
    

    $("#data-"+reminder_id).hide();
    $("#form-"+reminder_id).show();
    
    var BootstrapTimepicker={init:function(){ $("#m_timepicker_2").timepicker({minuteStep:5})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});
    
    $(document).on("mouseleave", ".bootstrap-timepicker-widget",function(){
       var timepicker_hour = $(".bootstrap-timepicker-hour").val();
       var timepicker_minute = $(".bootstrap-timepicker-minute").val();
       var timepicker_meridian = $(".bootstrap-timepicker-meridian").val();
        if(timepicker_hour != "" && timepicker_minute != "" && timepicker_meridian != ""){
            $(".reminder_time").attr("value", timepicker_hour+":"+timepicker_minute+" "+timepicker_meridian);   
        }else{
            $(".reminder_time").attr("value", "");
        }
    });
    
    $(".custom_date_picker").datetimepicker({todayHighlight:!0,autoclose:!0,pickerPosition:"bottom-right",format:"yyyy-mm-dd"});
}

function updateReminder(reminder_id){
    var title = $("#title-"+reminder_id).val();
    var text = $("#text-"+reminder_id).val();
    var time = $("#time-"+reminder_id).val();
    var date = $("#date-"+reminder_id).val();
    
    // console.log("====>"+$("#date-"+reminder_id).val());
    // return false;
    // var date = "";
    // if($("#date-"+reminder_id).length > 1){
    //   date = $("#date-"+reminder_id).val();
    //   console.log(title+"==>"+text+"===>"+time+"==>"+date);
    // return false;
    // }
    // alert($("#text-"+reminder_id).val());
        $.ajax({
                     type:'post',
                     url:"<?php echo base_url('client/update_reminder_data'); ?>",
                     data: {id:reminder_id,title:title,text:text,time:time,date:date},
                     
                     success:function(response)
                     {  
                         if(response == 1){
                            swal({
                            title: 'Successfully Updated',
                            timer: 2000,
                            showConfirmButton: false
                            }) 
                            
                            $("#form-"+reminder_id).hide();
                            $("#data-"+reminder_id).show();
                            $('#data-title-'+reminder_id).val('title');
                            $('#data-text-'+reminder_id).val('text');
                            $('#data-date-'+reminder_id).val('date');
                            // $('#data-time-'+reminder_id).val('time');
                            var time = $(".reminder_time").val();
                            var hours = Number(time.match(/^(\d+)/)[1]);
                            var minutes = Number(time.match(/:(\d+)/)[1]);
                            var AMPM = time.match(/\s(.*)$/)[1];
                            if(AMPM == "PM" && hours<12) hours = hours+12;
                            if(AMPM == "AM" && hours==12) hours = hours-12;
                            var sHours = hours.toString();
                            var sMinutes = minutes.toString();
                            if(hours<10) sHours = "0" + sHours;
                            if(minutes<10) sMinutes = "0" + sMinutes;
                            // alert(sHours + ":" + sMinutes);
                            var reminder_time = sHours+":"+sMinutes+":00";
                            $('#data-time-'+reminder_id).val('reminder_time'+" "+AMPM);
                            window.location.reload();
                            
                        }
                     }
                });
}


function truncateDate(date) {
  return new Date(date.getFullYear(), date.getMonth(), date.getDate());
}
</script>

<div class="modal fade" id="mentorreminderModal" tabindex="-1" role="dialog" aria-labelledby="mentorreminderModalTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h5 class="modal-title w-100 text-center" id="mentorreminderModalTitle">SET A REMINDER</h5>
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" mentorreminderModalBody table-responsive p-3">
            <div class="mentor_reminder_form_sec">
                <form class="m-form m-form--fit m-form--label-align-right" id="mentor_reminder_form">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group px-0">
                            <label for="mentorreminder_title">Title:</label>
                            <input type="text" class="form-control m-input m-input--square" id="reminder_title"  >
                            <!--<span class="m-form__help">We'll never share your email with anyone else.</span>-->
                            <p id="error_title" style="color:red;display:none"></p>
                        </div>
                        <div class="form-group m-form__group px-0">
                            <label for="reminder_note">Description:</label>
                            <textarea class="form-control m-input" id="reminder_note" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group m-form__group px-0">
                                    <label for="reminder_date">Date:</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control m-input reminder_date" readonly  placeholder="Select date" id="m_datepicker_2"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <p id="error_date" style="color:red;display:none"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group m-form__group px-0">
                                    <label for="reminder_time">Time:</label>
                                    <div class="input-group" id="m_timepicker_1">
                                        <input type='text' class="form-control reminder_time" readonly placeholder="Select time" type="text"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-clock-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!--<div class="input-group date">
                                        <input type="text" class="form-control m-input reminder_time" placeholder="Select time" id="m_datetimepicker_7"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <i class="la la-calendar glyphicon-th"></i>
                                            </span>
                                        </div>
                                    </div>-->
                                    <!--<span class="m-form__help">Only time selection</span>-->
                                    <p id="error_time" style="color:red;display:none"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions px-0 text-center">
                            <button type="button" class="btn btn-success" id="save_reminder" style="font-size:large">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mentor_reminder_success_message">
                <p id="dt_confirm"></p>
                
                <!--Reminder has been set and you will get a pop up on your dashboard/phone (if logged in) 15 min before the set time-->
                <button class="btn btn-success btn-sm save_reminder_message" style="font-size:large">Go Ahead</button>
                <button class="btn btn-info btn-sm reset_mentor_reminder" style="font-size:large">Reset</button>
            </div>
            <div class="mentor_reminder_sunday_message">
                <h3>IT IS A SUNDAY!</h3>
                <p>You may not be active on laptop. Reminder will be visible on phone, if logged in.</p>
                <!--Reminder has been set and you will get a pop up on your dashboard/phone (if logged in) 15 min before the set time-->
                <button class="btn btn-success btn-sm save_reminder_message" style="font-size:large">Go Ahead</button>
                <button class="btn btn-info btn-sm reset_mentor_reminder" style="font-size:large">Reset</button>
            </div>
            <div class="mentor_reminder_areusure_message">
                <h3>ARE YOU SURE?</h3>
                <p>You may not be active on laptop. Reminder will be visible on phone, if logged in.</p>
                <!--Reminder has been set and you will get a pop up on your dashboard/phone (if logged in) 15 min before the set time-->
                <button class="btn btn-success btn-sm save_reminder_message" style="font-size:large">Go Ahead</button>
                <button class="btn btn-info btn-sm reset_mentor_reminder" style="font-size:large">Reset</button>
            </div>
            <div class="mentor_reminder_passedtime_message">
                <h3>This Time Has Already Passed. Please Select Again.</h3>
                <!--Reminder has been set and you will get a pop up on your dashboard/phone (if logged in) 15 min before the set time-->
                <!--<button class="btn btn-success btn-sm" id="go_ahead_reminder_message">Go ahead</button>-->
                <button class="btn btn-info btn-sm reset_mentor_reminder" style="font-size:large">Reset</button>
            </div>
                
            <style>
                .bootstrap-timepicker-widget {
                    transform: unset !important;
                    transition: all .4s ease-in;
                }
                
                .mentor_reminder_success_message {
                    text-align: center;
                    display:none;
                }
                
                .mentor_reminder_success_message p {
                    font-size: 20px;
                }
                
                .mentor_reminder_success_message button {
                    margin: 0 5px;
                }
                
                .mentor_reminder_areusure_message {
                    text-align: center;
                    display:none;
                }
                
                .mentor_reminder_areusure_message p {
                    font-size: 20px;
                }
                
                .mentor_reminder_areusure_message button {
                    margin: 0 5px;
                }
                .mentor_reminder_passedtime_message {
                    text-align: center;
                    display:none;
                }
                
                .mentor_reminder_passedtime_message p {
                    font-size: 20px;
                }
                
                .mentor_reminder_passedtime_message button {
                    margin: 0 5px;
                }
                
                .mentor_reminder_sunday_message {
                    text-align: center;
                    display:none;
                }
                
                .mentor_reminder_sunday_message p {
                    font-size: 20px;
                }
                
                .mentor_reminder_sunday_message button {
                    margin: 0 5px;
                }
            </style>
      </div>
    </div>
  </div>
</div>

<!-- Modal : Start here -->
<div class="modal fade" id="reminderModal" tabindex="-1" role="dialog" aria-labelledby="reminderModalTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="max-width: 90%;" role="document">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h5 class="modal-title w-100" id="reminderModalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!--  <span aria-hidden="true">&times;</span>-->
        <!--</button>-->
      </div>
      <div class="modal-body reminderModalBody table-responsive">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal : Start here -->
<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="commonModalTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="max-width: 90%;" role="document">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h5 class="modal-title w-100" id="commonModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal : Start here -->
<div class="modal fade" id="commonModal1" tabindex="-1" role="dialog" aria-labelledby="commonModalTitle1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="max-width: 90%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commonModalTitle1">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive" id="dietmodalbody">
      
      </div>
      <div class="modal-footer" id="commonModalFooter1">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal : Start here -->
<!-- // Reset reminders: start -->
<div class="modal fade" id="reset_reminder" tabindex="-1" role="dialog" aria-labelledby="reset_reminder" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" style="max-width: 90%;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reset_reminder_title">Reset Reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive" id="reset_reminder_body">
      
      </div>
    </div>
  </div>
</div>
<!-- // Reset reminders: end -->
<!-- Modal: Ends here -->

<!-- Modal : Start here -->
<? /*<div class="modal fade" id="faqs_popup" tabindex="-1" role="dialog" aria-labelledby="faqsTitle" aria-hidden="true" data-backdrop="static" style="    margin: 0; width: 900px; height: 410px; top: 18.5rem;">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 890px; margin: 0;">
    <div class="modal-content">
      <div class="modal-body p-2" style="border: 14px solid #8e3939;">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="
    right: 2.7rem;
    position: absolute;
    border: 2px solid;
    padding: 2px 5px;
    color: #000 !important;
    font-weight: 600;
    opacity: 1;    top: 6px;
">&times;</span>
        </button>
        
          <div style="height: 410px; overflow-y: scroll;">   
            <?php $this->load->view('faq/faq_master'); ?>
          </div>
          
      </div>
    </div>
  </div>
</div> */ ?>
<!-- Modal: Ends here -->

<!-- Modal : Start here -->
<div class="modal fade pr-0" id="faqs_chat_popup" tabindex="-1" role="dialog" aria-labelledby="faqsTitle" aria-hidden="true" data-backdrop="static" style="top: 5rem;display: block;position: fixed;width: 470px;left: 64rem;display:none;height: 601px;">
  <div class="modal-dialog modal-lg" role="document" style="overflow-y: auto;height: 601px;border: 4px solid rgb(142, 57, 57);background: rgb(255, 255, 255);margin:0;">
    <div class="modal-content" style="border-radius: 0;">
      <div class="modal-body p-2">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close" style="right: 0;position: absolute;top:0;">
          <span aria-hidden="true" style="right: 2.7rem;position: absolute;border: 2px solid;padding: 2px 5px;color: #000 !important;font-weight: 600;opacity: 1;top: 6px;font-size: 14px;">&times;</span>
        </button>
        <div class="btn btn-success" id="faqs_chat_popupheader">Click Here to Drag</div>
        <div class="clearfix"></div>
        <div style="height: 540px; overflow-y: scroll;">
            <?php $this->load->view('faq/faq_master'); ?>
        </div>
          
      </div>
    </div>
  </div>
</div>
<!-- Modal: Ends here -->

<!-- Modal : Start here -->
<div class="modal fade pr-0" id="viewDiet_popup" tabindex="-1" role="dialog" aria-labelledby="faqsTitle" aria-hidden="true" data-backdrop="static" style="overflow-y:auto; margin: 0; width: 900px; height: 410px; top: 18.5rem;border: 14px solid #8e3939;">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 900px; margin: 0;">
    <div class="modal-content" style="border-radius: 0;">
        <div class="modal-header p-3">
            <h5 class="modal-title w-100" id="viewDietTitle">Modal title</h5>
        </div>
      <div class="modal-body p-2">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="
    right: 2.7rem;
    position: absolute;
    border: 2px solid;
    padding: 2px 5px;
    color: #000 !important;
    font-weight: 600;
    opacity: 1;    top: 6px;
">&times;</span>
        </button>
        
          <!--<div style="height: 410px; overflow-y: scroll;">   
            <?php //$this->load->view('faq/faq_master'); ?>
          </div>-->
          
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!-- Modal: Ends here -->

<!-- Modal : Start here -->
<div class="modal fade pr-0" id="viewDiet_chat_popup" tabindex="-1" role="dialog" aria-labelledby="faqsTitle" aria-hidden="true" data-backdrop="static" style="margin: 0px;width: 450px;overflow-y: auto;height: 540px;top: 10rem;border: 4px solid rgb(142, 57, 57);display: none;padding-left: 0;">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 900px; margin: 0;">
    <div class="modal-content" style="border-radius: 0;">
        <div class="modal-header p-3" style="display:block">
            <div class="btn btn-success" id="viewDiet_chat_popupheader">Click Here to Drag</div>
            <div class="btn btn-warning chat_viewDietNewTab">New Tab</div>
            <div class="clearfix"></div>
            <h5 class="modal-title w-100" id="viewDietChatTitle">Modal title</h5>
        </div>
      <div class="modal-body p-2">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close" style="right: 1rem;position: absolute;top: 5rem;">
          <span aria-hidden="true" style="right: 2.7rem;position: absolute;border: 2px solid;padding: 2px 5px;color: #000 !important;font-weight: 600; opacity: 1;top: 6px;">&times;</span>
        </button>
        
          <!--<div style="height: 410px; overflow-y: scroll;">   
            <?php //$this->load->view('faq/faq_master'); ?>
          </div>-->
          
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!-- Modal: Ends here -->
<style>
    #chat_section_draggbleheader {
      padding: 10px;
      cursor: move;
      z-index: 1051;
      background-color: #2196F3;
      color: #fff;
    }
    div#viewDiet_chat_popupheader {
        display: block;
        height: 25px;
        line-height: 1;
        padding: 5px 0;
        font-weight: 600;
        float: left;
        width: 73.5%;
        margin-right:5px;
    }
    
    #recipe_chat_popupheader {
        display: block;
        height: 25px;
        line-height: 1;
        padding: 5px 0;
        font-weight: 600;
        float: left;
        width: 91.5%;
        margin-bottom:10px;
    }
    
    #faqs_chat_popupheader, #checklist_popupheader {
        display: block;
        height: 20px;
        line-height: 0.8;
        padding: 5px 0;
        font-weight: 600;
        width: 85.5%;
        margin-bottom: 0;
        font-size: 12px;
    }
    
    #keyInsightModalheader {
        display: block;
        height: 20px;
        line-height: 0.8;
        padding: 5px 0;
        font-weight: 600;
        width: 40%;
        margin-bottom: 0;
        font-size: 12px;
        margin: auto;
    }
    
    h5#viewDietChatTitle {
        padding: 10px 0 0;
    }
    
    #viewDiet_chat_popup #save_date {
        margin: 2.4rem 0 0 -5rem;
    }

    #viewDiet_chat_popup #start_date_send{
     margin:0 !important;   
    }
    .chat_viewDietNewTab {
        float: left;
        width: 25%;
        height: 25px;
        line-height: 1;
        padding: 5px 0;
        font-weight: 600;
    }
    .chat_viewDietNewTab a{
        height: 25px;
        font-weight: 600;
        display: block;
    }
</style>

<!-- Modal : Start here -->
<? /*<div class="modal fade" id="recipe_popup" tabindex="-1" role="dialog" aria-labelledby="recipesTitle" aria-hidden="true" data-backdrop="static" style="    margin: 0; width: 900px; height: 410px; top: 18.5rem;">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 890px; margin: 0;">
    <div class="modal-content">
      <div class="modal-body p-2" style="border: 14px solid #8e3939;">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="
    border: 2px solid;
    padding: 2px 5px;
    color: #000 !important;
    font-weight: 600;
    opacity: 1;
">&times;</span>
        </button>
        
          <div style="height: 410px; overflow-y: scroll;">
            <?php echo $this->load->view('recipes/recipes_search'); ?>
          </div>
          
      </div>
    </div>
  </div>
</div> */ ?>
<!-- Modal : Start here -->
<div class="modal fade pr-0" id="recipe_chat_popup" tabindex="-1" role="dialog" aria-labelledby="recipe_chat" aria-hidden="true" data-backdrop="static" style="margin: 0px;width: 680px;overflow-y: auto;height: 450px;top: 15.7rem;border: 4px solid rgb(142, 57, 57);display: block;padding-left: 0;display: none;">
  <div class="modal-dialog modal-lg" role="document" style="max-width: 900px; margin: 0;">
    <div class="modal-content" style="border-radius: 0;">
      <div class="modal-body p-2">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close" style="right: 0;position: absolute;top:0;">
          <span aria-hidden="true" style="right:24px;position: absolute;border: 2px solid;padding: 2px 5px;color: #000 !important;font-weight: 600; opacity: 1;top: 6px;">&times;</span>
        </button>
        <div class="btn btn-success" id="recipe_chat_popupheader">Click Here to Drag</div>
        <div class="clearfix"></div>
        <div style="height: 492px; overflow-y: scroll;padding:10px">
            <?php echo $this->load->view('recipes/recipes_search'); ?>
        </div>
          
      </div>
    </div>
  </div>
</div>
<!-- Modal: Ends here -->
<script>
    $(document).ready(function(){
        $('#recipe_popup').on('shown.bs.modal', function (e) {
          // do something...
          $(".modal-backdrop").hide();
        });
        $('#recipe_chat_popup').on('shown.bs.modal', function (e) {
          // do something...
          $(".modal-backdrop").hide();
        });
        $('#faqs_chat_popup').on('shown.bs.modal', function (e) {
          // do something...
          $(".modal-backdrop").hide();
        });
        /*$('#recipe_popup').on('hidden.bs.modal', function (e) {
          // do something...
          $("#recipe_popup .modal-body").html('');
        });*/
    });
</script>
<!-- Modal: Ends here -->


<!-- Modal : Start here -->
<div class="modal fade pr-0" id="keyInsightModal" tabindex="-1" role="dialog" aria-labelledby="keyInsightTitle" aria-hidden="true" data-backdrop="static" style="top: 5rem;display: block;position: fixed;width: 465px;left: 64rem;display:none;height: 601px;">
  <div class="modal-dialog modal-lg" role="document" style="overflow-y: auto;height: 601px;border: 4px solid rgb(142, 57, 57);background: rgb(255, 255, 255);margin:0">
    <div class="modal-content" style="border-radius: 0;">
      <div class="modal-header p-2">
        <h5 class="modal-title" id="commonModalTitle">Key Insight</h5>
        <div class="btn btn-success" id="keyInsightModalheader">Click Here to Drag</div>
        <button class="btn btn-warning btn-sm" id="add_keyV" style="position: absolute; right: 2.5rem;">Add</button>
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-2 table-responsive">
        <style>
          .key_insight_form {
                border: 1px solid;
                padding: 10px 0 0;
                margin: 0  0 1rem;
                display:none;
            }
        </style>
        <div class="key_insight_form">
                <!--<form class="m-form m-form--fit m-form--label-align-right">-->
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group px-3">
                            <label for="keyInsight">Add Key Insight:</label>
                            <input type="text" class="form-control m-input" id="key_insight_note_text" placeholder="Enter...">
                            <!--<span class="m-form__help">We'll never share your email with anyone else.</span>-->
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit text-center">
                        <div class="m-form__actions p-3">
                            <button type="submit" class="btn btn-success btn-sm" style="color: #000 !important" id="key_insight_submit">Submit</button>
                            <!--<button type="reset" id="close_keyV" class="btn btn-secondary">Cancel</button>-->
                        </div>
                    </div>
                <!--</form>-->
            </div>  
        <div class="m-section mb-0">
            <div class="m-section__content mb-0">
                <div class="m-accordion m-accordion--default mt-0" id="m_accordion_keyInsight" role="tablist">
                    
                 <?php 
                 //print_r($current_prog_key_insight);exit;
                 
                 if(!empty($current_prog_key_insight)){?>
                
                    <!--<span class="older_program mt-0"> Current Program </span>-->
                    <div class="m-accordion__item m-accordion__item--metal">
                        <div class="m-accordion__item-head py-1 px-2" role="tab" id="m_accordion_keyInsight_item_0_head" data-toggle="collapse" href="#m_accordion_keyInsight_item_0_body" aria-expanded="true">                        
                            <span class="m-accordion__item-title text-dark"  style="color: #000!important"><?php echo (isset($current_prog_key_insight['program_name']) ? $current_prog_key_insight['program_name'] : '' );?> <small>(Current Program)</small> <span class="float-right pr-2" style="font-size: 10px;padding-top: 6px;"><?php echo isset($current_prog_key_insight['mentor_name']) ? 'Mentor : <b>'.$current_prog_key_insight['mentor_name'] : '';?></b></span></span>
                            <span class="m-accordion__item-mode" style="color: #343a40!important"></span>
                        </div>
        
                        <div class="m-accordion__item-body collapse show" id="m_accordion_keyInsight_item_0_body" role="tabpanel" aria-labelledby="m_accordion_keyInsight_item_0_head" data-parent="#m_accordion_keyInsight"> 
                            <div class="m-accordion__item-content table-responsive p-2">
                                
                                <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width:110px;position:relative"><b>Date</b></th>
                                            <th class="text-center"><b>Key Insight</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        unset($current_prog_key_insight['program_name']);
                                       // unset($current_prog_key_insight['mentor_name']);
                                        foreach($formatted_key_insights['current_ki']['key_insights'] as $val){?>
                                        <?php 
                                            $source = "";
                                            switch($val['source']){
                                                case 'welcome-call':
                                                $source = 'Welcome Call';
                                                break;
                                                case 'progress-call':
                                                $source = 'Progress Call';
                                                break;
                                                case 'feedback-call':
                                                $source = 'Feedback Call';
                                                break;
                                                case 'induction-call':
                                                $source = 'Induction Call';
                                                break;
                                            }
                                        ?>
                                        <tr>
                                            <td style="width:110px;position:relative"><?php echo $val['key_date'];?></td>
                                            <?php if(!empty($val['key_insight'])){ ?>
                                                <td><?php echo $val['key_insight'];?></td>
                                            <?php }else{ ?>
                                                <td><?php echo $source." Note: ". $val['note'];?></td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <style>
                        .older_program{
                            padding: 3px 10px;
                            font-size: 14px;
                            text-align: center;
                            margin-right: 0;
                            font-weight: bold;
                            color: #fff;
                            border: 1px solid #000;
                            background: #000;
                            margin: 30px auto;
                            display: block;
                            width: 50%;
                        }
                    </style>
                    
                     <?php 
                    /*echo '<pre>';
                     print_r($prev_prog_name);
                     echo '</pre>';*/
                        if(!empty($formatted_key_insights['previous_ki'])){
                            
                            
                    ?>
                
                    <span class="older_program"> Older Program</span>
                    
                    <?php $insightID = 1; foreach($formatted_key_insights['previous_ki'] as $val){?>
                        <div class="m-accordion__item m-accordion__item--metal">
                            <div class="m-accordion__item-head collapsed py-1 px-2" role="tab" id="m_accordion_keyInsight_item_<?php echo $insightID ; ?>_head" data-toggle="collapse" href="#m_accordion_keyInsight_item_<?php echo $insightID ; ?>_body" aria-expanded="false">                        
                                <span class="m-accordion__item-title text-dark"  style="color: #000!important"><?php echo $val['program'];?><span class="float-right pr-3" style="font-size: 12px;padding-top: 4px;">Mentor : <b><?php echo $val['mentor'];?></b></span></span>
                                <span class="m-accordion__item-mode" style="color: #343a40!important"></span>     
                            </div>
            
                            <div class="m-accordion__item-body collapse" id="m_accordion_keyInsight_item_<?php echo $insightID ; ?>_body" role="tabpanel" aria-labelledby="m_accordion_keyInsight_item_<?php echo $insightID ; ?>_head" data-parent="#m_accordion_keyInsight_older"> 
                                <div class="m-accordion__item-content table-responsive p-2">
                                    
                                    <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:110px;position:relative"><b>Date</b></th>
                                                <th class="text-center"><b>Key Insight</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($val['key_insights'] as $row){ ?>
                                            
                                            <?php 
                                                $source = "";
                                                switch($row['source']){
                                                    case 'welcome-call':
                                                    $source = 'Welcome Call';
                                                    break;
                                                    case 'progress-call':
                                                    $source = 'Progress Call';
                                                    break;
                                                    case 'feedback-call':
                                                    $source = 'Feedback Call';
                                                    break;
                                                    case 'induction-call':
                                                    $source = 'Induction Call';
                                                    break;
                                                }
                                            ?>
                                            <tr>
                                                <td style="width:110px;position:relative"><?php echo $row['key_date'];?></td>
                                                <?php if($row['key_insight'] != null){ ?>
                                                    <td><?php echo $row['key_insight'];?></td>
                                                <?php }else{ ?>
                                                    <td><?php echo $source." Note: ". $row['note'];?></td>
                                                <?php } ?>
                                                    <!--<td><?php echo $source;?></td>-->
                                            </tr>
                                            
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php $insightID++; } ?>
                <?php } ?>
                
                    
                </div>
                <div style="display:none"><?php var_dump($formatted_key_insights); ?></div>
                <!--<span class="keyInsight"></span>
              <!--<textarea id="prev_insights" class="form-control m-input keyInsight" cols="50" rows="8" style="overflow:auto;height: 215px;" disabled></textarea>-->
              <!--<table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand mb-0">
                    <thead>
                        <tr>
                            <th class="text-center"><b>Date</b></th>
                            <th class="text-center"><b>Program Name</b></th>
                            <th class="text-center"><b>Mentor Name</b></th>
                            <th class="text-center"><b>Key Insight</b></th>
                        </tr>
                    </thead>
                    <tbody id="key-insight-list">
                    </tbody>
                </table>-->
            </div>
        </div>
          
          <script>
              $(document).on('click','#add_keyV', function(){
                  $('.key_insight_form').show();
              });
              $(document).on('click','#close_keyV', function(){
                  $('.key_insight_form').hide();
                  $('#keyInsight').val('');
              });
              
              $(document).on('click','.keyInsighBtn',function(){
                  var new_feedback = "<?= $new_feedback ?>";
                  var order_id = "<?= $active_order_id ?>";
                  var client_id = "<?= $client_id ?>";
                  var url = "<?php echo base_url('client/updateFeedbackReadStatus'); ?>";
                  
                  if (new_feedback == 1){
                          $.ajax({
                             type:'post',
                             url:url,
                             data: {client_id:client_id,order_id:order_id},
                             
                             success:function(response)
                             {
                             },complete: function(response){
                                 
                                $('.key_insight_dot').addClass('d-none');
                                
                             },error:function(jqXHR, textStatus, errorThrown)
                             {
                             }
                      });
                  }
              });
              
          </script>
          
      </div>
    </div>
  </div>
</div>
<!-- Modal: Ends here -->

<!-- Modal : Start here -->
<div class="modal fade pr-0" id="checklist_popup" tabindex="-1" role="dialog" aria-labelledby="faqsTitle" aria-hidden="true" data-backdrop="static" style="top: 5rem;display: block;position: fixed;width: 465px;left: 64rem;display:none;height: 601px;">
  <div class="modal-dialog modal-lg" role="document" style="overflow-y: auto;height: 601px;border: 4px solid rgb(142, 57, 57);background: rgb(255, 255, 255);margin:0;">
    <div class="modal-content" style="border-radius: 0;">
        <div class="modal-header p-3">
            <h5 class="modal-title w-100" id="viewDietTitle">Ingredient checklist
                <div class="btn btn-success" id="checklist_popupheader">Click Here to Drag</div>
            </h5>
        </div>
      <div class="modal-body p-2">
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="right: 0.2rem;position: absolute;border: 2px solid;padding: 2px 5px;color: #000 !important;font-weight: 600;opacity: 1;top: -70px;">&times;</span>
        </button>
        
        <?php $this->load->view('client/ingredient_checklist_popup'); ?>
          
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!-- Modal: Ends here -->
<script>
    $(document).ready(function(){
        $('#checklist_popup').on('shown.bs.modal', function (e) {
          // do something...
          $(".modal-backdrop").hide();
        });
    });
</script>
<!-- Modal: Ends here -->

<script>
    $(document).ready(function(){
        $('#keyInsightModal').on('shown.bs.modal', function (e) {
          // do something...
          $(".modal-backdrop").hide();
        });
        $('#keyInsightModal').on('hidden.bs.modal', function (e) {
          // do something...
          $(".key_insight_form").hide();
        });
        
        $('.modal').modal("hide");
        $("#viewDiet_popup").on('shown.bs.modal',function(){
            // $('.modal').modal("hide");
            $("#recipe_chat_popup").modal("hide");
            $("#faqs_chat_popup").modal("hide");
        });
        
        $("#recipe_chat_popup").on('shown.bs.modal',function(){
            // $('.modal').modal("hide");
            $("#viewDiet_popup").modal("hide");
            $("#viewDiet_chat_popup").modal("hide");
            $("#faqs_chat_popup").modal("hide");
        });
        
        $("#viewDiet_chat_popup").on('shown.bs.modal',function(){
            // $('.modal').modal("hide");
            $("#recipe_chat_popup").modal("hide");
            $("#faqs_chat_popup").modal("hide");
        });
        
        $("#faqs_chat_popup").on('shown.bs.modal',function(){
            $(".own_draft").addClass("active show");
            // $('.modal').modal("hide");
            $("#recipe_chat_popup").modal("hide");
            $("#viewDiet_popup").modal("hide");
            $("#viewDiet_chat_popup").modal("hide");
        });
    });
    $(document).on('click','.keyInsighAddBtn', function(){
        $('.key_insight_form').show();
    });
</script>

<?php 

   /*if(is_numeric($this->uri->segment(2)))
   {*/
      $client_id=$this->uri->segment(2);

   /*}else
   {
       $client_id=$this->uri->segment(4);  
   }*/

?>
<script>
    $("#key_insight_submit").click(function()
      {
          var key_insight=$("#key_insight_note_text").val();          
          var client_id="<?php echo $client_id; ?>";
          var url="<?php echo base_url('client/update_key_insight'); ?>";
          
          if(key_insight!="")
          {
              $.ajax({
            
                     type:'post',
                     url:url,
                     data: {client_id:client_id,key_insight:key_insight},
                     success:function(response)
                     {
                        // alert(response);
                        swal({
                            title: 'Successfully Added',
                            timer: 2000,
                            showConfirmButton: false
                        })

                     },complete: function(){
                         $('#key_insight_note_text').val('');
                         $('.key_insight_form').hide();
                      location.reload(function(){
                          $("#keyInsightModal").modal('show');
                      });
                     },error:function(jqXHR, textStatus, errorThrown)
                     {
                        // alert(jqXHR, textStatus, errorThrown);
                        console.log(errorThrown);
                        //alert(errorThrown)
                        /*swal({
                            title: 'Successfully Added',
                            timer: 2000,
                            showConfirmButton: false
                        })*/
                     }

                  });
          }else{
            alert("Please fill all the detials !");
          }
         
      });
      
      $(".keyInsighBtn").on("click", function(){
      
        var client_id = "<?php echo $client_id; ?>";
        //   alert(keyClientId);
        $.ajax({
           url : "<?php echo base_url().'client/keyInsight'; ?>",
           type: "POST",
          data: {client_id:client_id},
           dataType:"JSON",
           success: function(response)
           {
               var insight_data = "";
               for (var i = 0; i < response["client_key_insights"][0]['result'].length ; i++){
                  //console.log(response["client_key_insights"][0]['result'][i]['key_insight']);
                  insight_data += "<tr><td>"+response["client_key_insights"][0]['result'][i]['key_date']+"</td><td>"+response["client_key_insights"][0]['result'][i]['program']+"</td><td>"+response["client_key_insights"][0]['result'][i]['mentor_name']+"</td><td>"+response["client_key_insights"][0]['result'][i]['key_insight']+"</td></tr>";
               }
               $("#key-insight-list").html(insight_data);
           },
           complete: function(){
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Error get data from ajax');
           }
        });
        
      });

$(document).on('click','body *',function(){    
// $('body').click(function(){
    // alert('Yess');
    $(document).ajaxSend(function(){
        $('#loadingmessage').show();
    });
    $(document).ajaxComplete(function(){
        $('#loadingmessage').hide();
    });

});    


$(document).on("mouseleave", ".bootstrap-timepicker-widget",function(){
   var timepicker_hour = $(".bootstrap-timepicker-hour").val();
   var timepicker_minute = $(".bootstrap-timepicker-minute").val();
   var timepicker_meridian = $(".bootstrap-timepicker-meridian").val();
    if(timepicker_hour != "" && timepicker_minute != "" && timepicker_meridian != ""){
        $(".reminder_time").attr("value", timepicker_hour+":"+timepicker_minute+" "+timepicker_meridian);   
    }else{
        $(".reminder_time").attr("value", "");
    }
});


// Make the DIV element draggable:
dragElement(document.getElementById("viewDiet_chat_popup"));
dragElement(document.getElementById("recipe_chat_popup"));
dragElement(document.getElementById("faqs_chat_popup"));
dragElement(document.getElementById("checklist_popup"));
dragElement(document.getElementById("keyInsightModal"));

function dragElement(elmnt) {
    
    // alert(document.getElementById(elmnt.id + "header"));
    
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

$(document).ready(function(){
    all_counts_notify();
});

// added by sanjay on 16/08/2021
$(document).ready(function(){
          $(".common_function_class").each(function(){
           
           $(this).on("click", function(){
             
               var openId = $(this).attr('data-id');

                //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/client_base_bifurfication_menu_new'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       data:{section:openId},
                       success: function(response)
                       {
                           if(response)
                           {       
                           //console.log(response);
                           //return false;                   
                               
                            if(openId =="activebase"){
                               $('.all_active_clients').html(response["all_active_clients"][0]["count"]);
                               $('.active_clients').html(response["active_clients"][0]["count"]);
                               return false;
                               }else if(openId =="cleanse_active_base"){
                                
                                $('.one_three_active').html(response["1/3_day_active"]["count"]);
                                $('.one_three_od_active').html(response["one_three_od_active"]["count"]);
                                $('.ten_day_clense_active').html(response["10_day_active"]["count"]);
                                $('.ten_day_od_clense_active').html(response["ten_day_od_clense_active"]["count"]);
                                
                                return false;
                               }else if(openId =="dormant_clients_base"){
                                $('.dormant_30_60_90').html(response["dormant_30_60_90"]["count"]);
                                $('.dormant_10_day').html(response["dormant_10_day"]["count"]);
                                return false;
                               }else if(openId =="dormant_od_base"){
                                 $('.dormant_od_30_60_90_day').html(response["dormant_od_30_60_90_day"]["count"]);
                               $('.dormant_od_10_day').html(response["dormant_od_10_day"]["count"]);
                                return false;
                               }else if(openId =="onhold_base"){
                                $('.onhold_client').html(response["onhold_client"]["count"]);
                                $('.onhold_10day_client').html(response["onhold_10day_client"]["count"]);
                                return false;
                               }else if(openId =="onhold_base_od"){
                                $('.onhold_od_data').html(response["onhold_od_data"]["count"]);
                                $('.onhold_10_day_od').html(response["onhold_10_day_od"]["count"]); 
                                return false;
                               }
                               else if(openId =="not_started_new"){
                                $('.not_started_clients_new').html(response["not_started_clients_new"]["count"]);
                                $('.not_started_clients_clense').html(response["not_started_clients_clense"]["count"]); 
                               $('.not_started_10_dayclients_clense').html(response["not_started_10_dayclients_clense"]["count"]);
                                return false;

                               }else if(openId =="not_started_od"){
                                $('.not_started_od_30_60_90').html(response["not_started_od_30_60_90"]["count"]);
                               $('.not_started_od_10_day').html(response["not_started_od_10_day"]["count"]); 
                               $('.clense_not_started_od').html(response["clense_not_started_od"]["count"]);
                                return false;
                               }else if(openId =="omr_list"){
                                $('.omr_list_completed').html(response["omr_list_comleted"]["count"]);
                                $('.omr_list_dropout').html(response["omr_list_dropout"]["count"]);
                                $('.omr_list_fs').html(response["omr_list_fs"]["count"]);
                                return false;
                               }

                              else
                              {
                                  }
           
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */

           });

          }); 
    
    // added by sanjay on 17/08/2021

    $(".omr_count").each(function(){
           
           $(this).on("click", function(){

                //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/client_base_bifurfication_omr_count'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {                       
                            
                            $('.omr_list_total').html(response["omr_list_comleted"]["count"]+response["omr_list_dropout"]["count"]+response["omr_list_fs"]["count"]);
           
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */

           });

          }); 

//Start For TailEnd Count on Side
        
//Ajax Load data from ajax

                 
                   /* Ajax is unloaded */    

           // added by sanjay on 19/08/2021
// start for feedback 
    $(".common_feedback_fuction").each(function(){
        
        var openId = $(this).attr('data-id');           
           
           $(this).on("click", function(){

                //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/common_feedback_fuction'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       data:{section:openId},
                       success: function(response)
                       {
                    if(response)
                           {                       
                                if(openId=="half_feed_menu"){       
                                    $('.half_time_feed_today').html(response["half_time_feed_today"]["count"]);
                                    $('.half_time_feed_alltime').html(response["half_time_feed_alltime"]["count"]);
                                    $('.half_time_feed_below4').html(response["half_time_feed_below4"]["count"]);
                                    $('.half_time_feed_above4').html(response["half_time_feed_above4"]["count"]);
                                    $('.half_time_feed_not_fill_od').html(response["half_time_feed_not_fill_od"]["count"]);
                                }else if(openId=="programe_feedback"){
                                      $('.progrme_feed_today').html(response["progrme_feed_today"]["count"]);
                                    $('.progrme_feed_all').html(response["progrme_feed_all"]["count"]);
                                    $('.progrme_feed_below4').html(response["progrme_feed_below4"]["count"]);
                                    $('.progrme_feed_above4').html(response["progrme_feed_above4"]["count"]);
                                    $('.progrme_feed_not_filled_od').html(response["progrme_feed_not_filled_od"]["count"]);
                                }

                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */

           });

          }); 

// End for feedback 


// start for programe feed back 
    $(".ask_od").each(function(){
        
        var openId = $(this).attr('data-id');           
           
           $(this).on("click", function(){

                //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/ask_feedback'; ?>",
                       type: "POST",
                       data:{user_id:openId},
                       success: function(response)
                       {  
                        //console.log(response);
                        // alert('OK');
                            swal(
                            'Notification sent successfully',
                            '',
                            'success'
                            ) 
                //           if(response)
                //           {                       
                //             alert("test");
                //   /* $('.half_time_feed_today').html(response["half_time_feed_today"]["count"]);
                //     */

                //           }else{
                               
                //           }
                           
                       }
                    //   error: function (jqXHR, textStatus, errorThrown)
                    //   {
                    //       alert('Error get data from ajax');
                    //   }
                   })
                   /* Ajax is unloaded */

           });

          });                    
                   

});

// Dashboard Js 
  $(".custom_function").each(function(){
           
           $(this).on("click", function(){
               
               var openId = $(this).attr('data-id');
            //   alert(openId);
               
               if(openId == "client_status"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/client_status_sec'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {  
                               if(response['break_overdue_read'] == '0'){
                                      $('.client_status_pill').show();
                                      $('.cl_status_title').addClass("blinkingText");
                                        $('.break_overdue_pill').show();
                                  }
                               $('.DormantCount').html(response["DormantCount"]);                      
                                /*$('.new_assigned_client').html(response["new_assigned_client"][0]["result"][0]["count"]);
                                $('.not_started_clients').html(response["not_started_clients"][0]["count"]);*/
                                $('.onbreak_clients').html(response["onbreak_clients"][0]["count"]);
                                $('.future_onhold').html(response["future_onhold"]);
                                $('.future_cleanse').html(response["future_cleanse"]);
                                $('.break_over').html(response["break_over"]);
                                $('.break_overdue').html(response["break_overdue"]);
                                $('.renewal_assigned_client').html(response["renewal_assigned_client"][0]["result"][0]["count"]);
                                $('.advance_overdue').html(response["advance_overdue"]["count"]);
                                /*$('.todays_welcome_call').html(response["todays_welcome_call"]);
                                $('.tomorrow_welcome_call').html(response["tomorrow_welcome_call"]);
                                $('.future_welcome_call').html(response["future_welcome_call"]);
                                $('.missed_welcome_call').html(response["missed_welcome_call"]);*/
                                $('.todays_upgrade_requested').html(response["todays_upgrade_requested"]);
                                $('.month_upgrade_requested').html(response["month_upgrade_requested"]);
                                $('.today_milestone').html(response["today_milestone"]);
                                $('.mtd_milestone').html(response["mtd_milestone"]);
                                $('.all_milestone').html(response["all_milestone"]);
                                $('.today_tailend_goal').html(response["today_tailend_goal"]);
                                $('.mtd_tailend_goal').html(response["mtd_tailend_goal"]);
                                $('.all_tailend_goal').html(response["all_tailend_goal"]);
                                $('.today_health_score_active').html(response["today_health_score_active"]);
                                $('.mtd_health_score_active').html(response["mtd_health_score_active"]);
                                $('.today_health_score_omr').html(response["today_health_score_omr"]);
                                $('.mtd_health_score_omr').html(response["mtd_health_score_omr"]);
                                
                                $('.today_health_score').html(response["today_health_score"]);
                                $('.mtd_health_score').html(response["mtd_health_score"]);
                                $('.last_thirty_days_health_score').html(response["last_thirty_days_health_score"]);
                                $('.all_health_score').html(response["all_health_score"]);
                                
                                $('.program_page_visit_active').html(response["program_page_visit_active"]);
                                $('.program_page_visit_omr').html(response["program_page_visit_omr"]);
                                $('.checkout_page_visit_active').html(response["checkout_page_visit_active"]);
                                $('.checkout_page_visit_omr').html(response["checkout_page_visit_omr"]);
                           }else{
                               
                           }
                           
                       },
                       complete: function(){
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_status_dashboard_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_status_dashboard_item_1_head").attr("data-id", openId);
                    });
               }else if(openId == "feedback"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/feedback_sec'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           
                        //   alert(JSON.stringify(response));
                          
                           if(response)
                           {   
                               $('.pre_maintenance_clients').html(response["pre_maintenance_clients"]);
                               $('.premaintenance_with_weight').html(response["premaintenance_with_weight"]);
                               $('.premaintenance_without_weight').html(response["premaintenance_without_weight"]);
                               $('.maintenance_requested').html(response["maintenance_requested"]);
                               $('.new_program_requested').html(response["new_program_requested"]);
                               $('.halftime_feedback').html(response["halftime_feedback"]);
                               $('.halftime_feedback_overdue').html(response["halftime_feedback_overdue"]);
                               $('.pre_maintenance_feedback').html(response["pre_maintenance_feedback"]);
                               $('.final_feedback').html(response["final_feedback"]);
                               $('.final_feedback_overdue').html(response["final_feedback_overdue"]);
                               // add by sanjay 
                                $('.halftime_feedback_above4').html(response["not_ack_half_time_feed_above4"]["count"]);
                                $('.halftime_feedback_below4').html(response["get_not_ack_half_time_feed_below4"]["count"]);
                                $('.final_feedback_above4').html(response["get_progrme_not_ack_feed_above4"]["count"]);
                                $('.final_feedback_below4').html(response["get_progrme_not_ack__feed_below4"]["count"]);   
                           }else{
                               
                           }
                           
                       },
                       
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_feedback_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_feedback_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "tlTailEnd"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/tlTailEnd_sec'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           
                        //   alert(JSON.stringify(response));
                          
                           if(response)
                           {                          
                               $('.tail_end_all').html(response["tail_end"][0]["count"]);
                               $('.tail_end_zero_session').html(response["tail_end_zero_session"][0]["count"]);
                               $('.tail_end_one_session').html(response["tail_end_one_session"][0]["count"]);
                               $('.tail_end_two_session').html(response["tail_end_two_session"][0]["count"]);
                               $('.tail_end_three_session').html(response["tail_end_three_session"][0]["count"]);
                           }else{
                               
                           }
                           
                       },
                       
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_tlTailEnd_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_tlTailEnd_item_1_head").attr("data-id", openId);
                    });
               }
               // added by sanjay 0n 12/08/2021              
            else if(openId == "tlTailEnd_new" || openId == "tlTailEnd_advance"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/tlTailEnd_sec_new'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {                          
                               
                      if(openId == "tlTailEnd_new")
                        {           
                           
                // Start For Zero pending    
                           var previous_count0 = parseInt(response["tail_end_0_pending"]["previous_count"]);
                           var current_count0 = parseInt(response["tail_end_0_pending"]["count"]);
                           
                           if(current_count0>previous_count0){
                              
                             $('.tail_end_0_pending').html(response["tail_end_0_pending"]["count"]);
                             $('#tail_end_0_red_dot').addClass('red_dot_new');

                           }else{
                            $('.tail_end_0_pending').html(response["tail_end_0_pending"]["count"]);
                           }
                // End For Zero pending 

                // Start For one pending  
                           var previous_count_tailend1 = parseInt(response["tail_end_1_pending"]["previous_count"]);
                           var current_count_tailend1 = parseInt(response["tail_end_1_pending"]["count"]);
                           
                           if(current_count_tailend1>previous_count_tailend1){
                              
                             $('.tail_end_1_pending').html(response["tail_end_1_pending"]["count"]);
                             $('#tail_end_1_red_dot').addClass('red_dot_new');

                           }else{
                            $('.tail_end_1_pending').html(response["tail_end_1_pending"]["count"]);
                           }
                // end For one pending  

                // Start For two pending 
                           var previous_count_tailend2 = parseInt(response["tail_end_2_pending"]["previous_count"]);
                           var current_count_tailend2 = parseInt(response["tail_end_2_pending"]["count"]);
                           if(current_count_tailend2>previous_count_tailend2){
                              
                             $('.tail_end_2_pending').html(response["tail_end_2_pending"]["count"]);
                             $('#tail_end_2_red_dot').addClass('red_dot_new');

                           }else{
                            $('.tail_end_2_pending').html(response["tail_end_2_pending"]["count"]);
                           }
                // End For two pending 
                        
                 // Start For three pending 
                           var previous_count_tailend3 = parseInt(response["tail_end_3_pending"]["previous_count"]);
                           var current_count_tailend3 = parseInt(response["tail_end_3_pending"]["count"]);
                           
                           if(current_count_tailend3>previous_count_tailend3){
                              
                             $('.tail_end_3_pending').html(response["tail_end_3_pending"]["count"]);
                             $('#tail_end_3_red_dot').addClass('red_dot_new');

                           }else{
                            $('.tail_end_3_pending').html(response["tail_end_3_pending"]["count"]);
                           }
                // End For three pending    
                          
                        }
                        else if(openId == "tlTailEnd_advance")
                        {
                            $('.tail_end_3_advance_pending').html(response["tail_end_3_pending_advance"]["count"]);
                            $('.tail_end_2_advance_pending').html(response["tail_end_2_pending_advance"]["count"]);
                            $('.tail_end_1_advance_pending').html(response["tail_end_1_pending_advance"]["count"]);
                            $('.tail_end_0_advance_pending').html(response["tail_end_0_pending_advance"]["count"]);
                        }
           
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
               }
               
               else if(openId == "clientBase"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/client_base_bifurfication'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {                          
                               $('.total_clients').html(response["total_clients"][0]["count"]);
                               $('.all_active_clients').html(response["all_active_clients"][0]["count"]);
                               $('.active_clients').html(response["active_clients"][0]["count"]);
                               $('.dormant_clients').html(response["dormant_clients"][0]["count"]);
                               $('.md_clients').html(response["md_clients"][0]["count"]);
                               $('.onbreak_clients').html(response["onbreak_clients"][0]["count"]);
                    // Start added by sanjay 
                               $('.not_started_clients').html(response["not_started_clients"]["count"]);
                               $('.not_started_clients_today').html(response["not_started_clients_today"]["count"]);
                               $('.not_started_clients_od').html(response["not_started_clients_od"]["count"]);
                        // End added by sanjay 
                               $('.not_started_clients').html(response["not_started_clients"][0]["count"]);
                               $('.completed_clients').html(response["completed_clients"][0]["count"]);
                               $('.dropout_clients').html(response["dropout_clients"][0]["count"]);
                               $('.forcefull_shut_clients').html(response["forcefull_shut_clients"][0]["count"]);
                               $('.pre_maintenance_clients').html(response["pre_maintenance_clients"][0]["count"]);
                               $('.lr_clients').html(response["lr_clients"][0]["count"]);
                               $('.cleanseactive').html(response["cleanseactive"][0]["count"]);
           
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_clientBase_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_clientBase_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "tlTailEndStage4"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/tail_end_stage_4n3'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {
                               
                               $('.stage_three').html(response["stage_three"]);
                               $('.stage_four').html(response["stage_four"]);
                               $('.stage_three_session_zero').html(response["stage_three_session_zero"]);
                               $('.stage_three_session_one').html(response["stage_three_session_one"]);
                               $('.stage_three_session_two').html(response["stage_three_session_two"]);
                               $('.stage_three_session_three').html(response["stage_three_session_three"]);
                               $('.stage_four_session_zero').html(response["stage_four_session_zero"]);
                               $('.stage_four_session_one').html(response["stage_four_session_one"]);
                               $('.stage_four_session_two').html(response["stage_four_session_two"]);
                               $('.stage_four_session_three').html(response["stage_four_session_three"]);
                               $('.unresponsive').html(response["unresponsive"]);
                               $('.not_interested').html(response["not_interested"]);
                               $('.price_sensitive').html(response["price_sensitive"]);
                               $('.undecided').html(response["undecided"]);
                               $('.need_convencing').html(response["need_convencing"]);
                               $('.to_pay').html(response["to_pay"]);
                               $('.warm').html(response["warm"]);
                               $('.to_engage').html(response["to_engage"]);
                               $('.for_later').html(response["for_later"]);
                               $('.hot').html(response["hot"]);
                               
                               //for send content new page open
                               
                               $('.stage_three_ctn').val(response["stage_three_ctn"]);
                               $('.stage_four_ctn').val(response["stage_four_ctn"]);
                               $('.stage_three_session_zero_ctn').val(response["stage_three_session_zero_ctn"]);
                               $('.stage_three_session_one_ctn').val(response["stage_three_session_one_ctn"]);
                               $('.stage_three_session_two_ctn').val(response["stage_three_session_two_ctn"]);
                               $('.stage_three_session_three_ctn').val(response["stage_three_session_three_ctn"]);
                               $('.stage_four_session_zero_ctn').val(response["stage_four_session_zero_ctn"]);
                               $('.stage_four_session_one_ctn').val(response["stage_four_session_one_ctn"]);
                               $('.stage_four_session_two_ctn').val(response["stage_four_session_two_ctn"]);
                               $('.stage_four_session_three_ctn').val(response["stage_four_session_three_ctn"]);
                               $('.price_sensitive_ctn').val(response["price_sensitive_ctn"]);
                               $('.to_engage_ctn').val(response["to_engage_ctn"]);
                               $('.need_convencing_ctn').val(response["need_convencing_ctn"]);
                               $('.to_pay_ctn').val(response["to_pay_ctn"]);
                               $('.warm_ctn').val(response["warm_ctn"]);
                               $('.hot_ctn').val(response["hot_ctn"]);
                               
           
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_tlTailEndStage4_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_tlTailEndStage4_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "tlTailEndStage2"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/tail_end_stage_2n1'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {
                               
                               $('.stage_one').html(response["stage_one"]);
                               $('.stage_two').html(response["stage_two"]);
                               $('.stage_one_session_zero').html(response["stage_one_session_zero"]);
                               $('.stage_one_session_one').html(response["stage_one_session_one"]);
                               $('.stage_one_session_two').html(response["stage_one_session_two"]);
                               $('.stage_one_session_three').html(response["stage_one_session_three"]);
                               $('.stage_two_session_zero').html(response["stage_two_session_zero"]);
                               $('.stage_two_session_one').html(response["stage_two_session_one"]);
                               $('.stage_two_session_two').html(response["stage_two_session_two"]);
                               $('.stage_two_session_three').html(response["stage_two_session_three"]);
                               $('.unresponsive').html(response["unresponsive"]);
                               $('.not_interested').html(response["not_interested"]);
                               $('.undecided').html(response["undecided"]);
                               $('.for_later').html(response["for_later"]);
                               
                               //for send content open new page
                               $('.stage_one_ctn').val(response["stage_one_ctn"]);
                                $('.stage_two_ctn').val(response["stage_two_ctn"]);
                                $('.stage_one_session_zero_ctn').val(response["stage_one_session_zero_ctn"]);
                                $('.stage_one_session_one_ctn').val(response["stage_one_session_one_ctn"]);
                                $('.stage_one_session_two_ctn').val(response["stage_one_session_two_ctn"]);
                                $('.stage_one_session_three_ctn').val(response["stage_one_session_three_ctn"]);
                                $('.stage_two_session_zero_ctn').val(response["stage_two_session_zero_ctn"]);
                                $('.stage_two_session_one_ctn').val(response["stage_two_session_one_ctn"]);
                                $('.stage_two_session_two_ctn').val(response["stage_two_session_two_ctn"]);
                                $('.stage_two_session_three_ctn').val(response["stage_two_session_three_ctn"]);
                                $('.unresponsive_ctn').val(response["unresponsive_ctn"]);
                                $('.not_interested_ctn').val(response["not_interested_ctn"]);
                                $('.undecided_ctn').val(response["undecided_ctn"]);
                                $('.for_later_ctn').val(response["for_later_ctn"]);
                               
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_tlTailEndStage2_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_tlTailEndStage2_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "tlTailEndStageRenew"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/tail_end_stage_renewed'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {
                               
                               $('.missed_tailend').html(response["missed_tailend"]);
                               $('.todays_followup').html(response["todays_followup"]);
                               $('.followup_missed').html(response["followup_missed"]);
                               
                               $('.missed_tailend_ctn').val(response["missed_tailend_ctn"]);
                               $('.todays_followup_ctn').val(response["todays_followup_ctn"]);
                               $('.followup_missed_ctn').val(response["followup_missed_ctn"]);
                               
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_tlTailEndRenew_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_tlTailEndRenew_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "omrStage4"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/omr_stage_4n3'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {
                               
                               $('.omr_stage_three').html(response["omr_stage_three"]);
                               $('.omr_stage_four').html(response["omr_stage_four"]);
                               $('.omr_warm').html(response["omr_warm"]);
                               $('.omr_to_engage').html(response["omr_to_engage"]);
                               $('.omr_need_convencing').html(response["omr_need_convencing"]);
                               $('.omr_price_sensitive').html(response["omr_price_sensitive"]);
                               $('.omr_to_pay').html(response["omr_to_pay"]);
                               $('.omr_hot').html(response["omr_hot"]);
                               
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_tlTailEndStage4_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_tlTailEndStage4_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "omrStage2"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/omr_stage_2n1'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {
                               
                               $('.omr_stage_one').html(response["omr_stage_one"]);
                               $('.omr_stage_two').html(response["omr_stage_two"]);
                               $('.omr_unresponsive').html(response["omr_unresponsive"]);
                               $('.omr_not_interested').html(response["omr_not_interested"]);
                               $('.omr_undecided').html(response["omr_undecided"]);
                               $('.omr_for_later').html(response["omr_for_later"]);
                               
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_omrStage2_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_omrStage2_item_1_head").attr("data-id", openId);
                    });
               }
               else if(openId == "omrStageRenewed"){
                   //Ajax Load data from ajax
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/omr_stage_renewed'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                           if(response)
                           {
                               $('.missed_omr').html(response["missed_omr"]);
                               $('.todays_omr_followup').html(response["todays_omr_followup"]);
                               $('.omr_followup_missed').html(response["omr_followup_missed"]);
                               
                           }else{
                               
                           }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })
                   /* Ajax is unloaded */
                   
                   $(this).removeAttr("data-id");
                   
                   $('#m_accordion_omrStageRenewed_item_1_body').on('hidden.bs.collapse', function () {
                      // do something…
                      $("#m_accordion_omrStageRenewed_item_1_head").attr("data-id", openId);
                    });
               }
           });
       
       });

  $(".tailend_class_count").on('click', function(event){  
                   $.ajax({
                       url : "<?php echo base_url().'dashboard/mentor/total_tail_end_count'; ?>",
                       type: "POST",
                       dataType:"JSON",
                       success: function(response)
                       {
                                
                            $('.tailend_list_count').html('');
                                
                                
                                if(response)
                               {   
                                
                                var prevoius_count = parseInt(response["tail_end_3_pending"]["previous_count"])+parseInt(response["tail_end_2_pending"]["previous_count"])+parseInt(response["tail_end_1_pending"]["previous_count"])+parseInt(response["tail_end_0_pending"]["previous_count"]);

                               var total_count1 = parseInt(response["tail_end_3_pending"]["count"])+parseInt(response["tail_end_2_pending"]["count"])+parseInt(response["tail_end_1_pending"]["count"])+parseInt(response["tail_end_0_pending"]["count"]);

                               var total2=parseInt(response["tail_end_3_pending_advance"]["count"])+parseInt(response["tail_end_2_pending_advance"]["count"])+parseInt(response["tail_end_1_pending_advance"]["count"])+parseInt(response["tail_end_0_pending_advance"]["count"]);  
  
                            if(total_count1>prevoius_count){
                                 $('.tailend_list_count').html(total_count1);
                                 $('#red_dot').addClass('red_dot_new');

                             }else{
                                 $('.tailend_list_count').html(total_count1);
                             }
                               $('.tailend_list_adv_count').html(total2);
                               
                   
                            }else{
                                      $('.tailend_list_count').html('');  
                                   }
                           
                       },
                       error: function (jqXHR, textStatus, errorThrown)
                       {
                           alert('Error get data from ajax');
                       }
                   })

 });  

$(document).ready(function(){

  //$( ".askupdate" ).click(function() { 
$('body').delegate('.askupdate','click',function(){   
    
   var user_id =$(this).val();
   
$.ajax({
    url : "<?php echo base_url().'dashboard/mentor/app_notification_update'; ?>",
    type: "POST",  
    data:{user_id:user_id},
    dataType:"JSON",
    success: function(response)
    {  
        if(response>0)
        {  
            swal({
              title: "Notification has been Send !",
              text: "",
              type: 'success',
              confirmButtonColor: '#3085d6',
          }).then((result) => {
              //console.log(result);
              //return false;
              
            });     

        }else
        {  
            //console.log("false");
            return false;
        }

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
})


    });  
});  

$(document).ready(function(){
  
$( ".wish" ).click(function() { 
 
 var user_id =$(this).val();
$.ajax({
    url : "<?php echo base_url().'dashboard/mentor/birthday_notification_update'; ?>",
    type: "POST",  
    data:{user_id:user_id},
    dataType:"JSON",
    success: function(response)
    {  
        if(response>0)
        {  
            swal({
              title: "Birthday Notification has been Send !",
              text: "",
              type: 'success',
              confirmButtonColor: '#3085d6',
          }).then((result) => {
              //console.log(result);
              //return false;
              
            });     

        }else
        {  
            //console.log("false");
            return false;
        }

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
})


    }); 

// Start For Send IBW And HS Notification
$('body').delegate('.ask_hs','click',function(){   

    var user_id = $(this).attr('data-userid');
      $.ajax({
                      url : "<?php echo base_url().'dashboard/mentor/ask_hs'; ?>",
                      type: "POST",
                      dataType:"JSON",
                      data:{user_id:user_id},
                      success: function(response)
                      {
                    if(response)
                          {
                                  swal({
                                      title: 'Success!',
                                      html: "Notification Sent successfully!",
                                      type: 'success',
                                      showCancelButton: false,
                                      confirmButtonColor: '#3085d6',
                                      confirmButtonText: 'Ok',
                                  }).then((result) => {
                                    //   window.loction.reload();
                                  })
                          }else{
                               
                          }
                           
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error get data from ajax');
                      }
                  })
});

// End For Send IBW And HS Notification

// Start For Send Inch Notification
$('body').delegate('.ask_inch','click',function(){   

    var user_id = $(this).attr('data-userid');
    console.log(user_id);
      $.ajax({
                      url : "<?php echo base_url().'dashboard/mentor/ask_inch_notification'; ?>",
                      type: "POST",
                      dataType:"JSON",
                      data:{user_id:user_id},
                      success: function(response)
                      {
                    if(response)
                          {
                                  swal({
                                      title: 'Success!',
                                      html: "Notification Sent successfully!",
                                      type: 'success',
                                      showCancelButton: false,
                                      confirmButtonColor: '#3085d6',
                                      confirmButtonText: 'Ok',
                                  }).then((result) => {
                                    //   window.loction.reload();
                                  })
                          }else{
                               
                          }
                           
                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error get data from ajax');
                      }
                  })
});

// End For Send Inch Notification

// Extend balance due date,send notification,send auto text chat 
 $('body').delegate('#change_date','click',function(){   

var user_id = $(this).attr('data-userid1');
var current_order_id = $(this).attr('data-orderid');
var selected_date_new = $(this).attr('selected_date1');

  Swal.fire({
                 title: 'Are you sure?',
                 //text: "You won't be able to revert this!",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, acknowledge it!'
                 }).then((result) => {
                 if (result.value) {
                    
                    $.ajax({
   
                        type: 'POST',
                        url: "<?php echo base_url().'dashboard/mentor/update_balance_due_date'; ?>",
                        dataType:"JSON",
                        data:{user_id:user_id,order_id:current_order_id,start_date:selected_date_new},
                         success: function (data) 
                         {
                             if(data==1)
                             {
                                //Due_balance_update_notification(user_id,selected_date_new,user_name);

                                Swal.fire(
                                            'Sucessful',
                                            'Date Has Been Changed successfully!',
                                            'success'
                                         );
   
                                window.location.reload();      
   
                             }else{
                                Swal.fire({
                                            type: 'error',
                                            title: 'Oops...',
                                            text: 'Something went wrong!',
                                            footer: 'Kindly Contact Tech Team'
                                         });
                             }
                             
                         },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                             alert('Error get data from ajax');
                          }
                      
                   });
                    
                    
                 }
              })    
 

 });
//End here Extend balance due date,send notification,send auto text chat 

});  


// avinash added this for top nave add lead



var code ="";
function get_country(){
    // alert("hello");
    var url = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/add_lead";
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
      },
      complete:function(){
          $("#cover-spin").hide();
      }
      });
}

 
//  $(document).on('change', '#country', function(){
//     var country_id = $(this).val();
//     var phonecode =$(this).find('option:selected').attr('rel');
//     $('#inputGroup-sizing-sm').html('+'+phonecode);
//     $('#phone_code').val('+'+phonecode);
//     var url = "https://www.balancenutrition.in/sales_crm_staging/dashboard/get_states";
//     $('#state').val('');
//     $.ajax({
//       type: "POST",
//       url: url,
//       data: {country_id: country_id},
//       dataType:'json',
//       success: function(response){
           
//           var state_html = "<option value=''>Select State</option>";
//           $.each(response.states, function(i, item) 
//             {
//                 state_html += '<option rel="'+response.states[i].state_id+'" value="'+response.states[i].state_name+'">'+response.states[i].state_name+'</option>';
                
//             });
            
//             $('#state').html(state_html);
            
//       }
//       });
// });

$(document).on('change', '#state', function(){
    
    var state_id = $(this).val();
    var url = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/get_city";
    $('#cities').val('');
    
    $.ajax({
       type: "POST",
       url: url,
       data: {state_id: state_id},
       dataType:'json',
       success: function(response){
           
           var cities_html = "<option value=''>Select city</option>";
           $.each(response.cities, function(i, item) 
            {
                cities_html += '<option value="'+response.cities[i].city_name+'" rel="'+response.cities[i].city_id+'">'+response.cities[i].city_name+'</option>';
                
            });
            
            $('#cities').html(cities_html);
            
       }
      });
});

$(document).ready(function(){
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
                var url = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/add_lead_data"; 
                $.ajax({
                   type: "POST",
                   url: url,
                   data: form.serialize(),
                //   dataType:'json',
                   success: function(response){
                       console.log(response);
                        if(response){
                            if(response=='Lead Already Exists.'){
                                swal_title='Oops!';
                                swal_type = 'info';
                            }else{
                                swal_title='Success!';
                                swal_type = 'success';
                            }
                              swal({
                                  title: swal_title,
                                  html: response,
                                  type: swal_type,
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  confirmButtonText: 'View Lead',
                                  confirmButtonPadding:'0',
                              }).then((result) => {
                                  if(result.value == true){
                                  window.open("https://www.balancenutrition.in/sales_crm_staging/login/process_login?email=<?php echo $user_email?>&password=<?php echo $pass?>&next_url=lead",'_blank'); 
                                }
                              })
                              }else{
                                   
                              }
                    },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error get data from ajax');
                      }
                });
            }
        }else if(country_code != 'IN'){
                var code = $("#phone").intlTelInput("getSelectedCountryData").dialCode;
                var phoneNumber = $('#phone').val().replace(/[_\W]+/g, "");
                var name = $("#phone").intlTelInput("getSelectedCountryData").name;
                var country_code = ($("#phone").intlTelInput("getSelectedCountryData").iso2).toUpperCase();
                var phone_code = code;
                $('#phone_code').val("+"+phone_code);
                $('#country').val(name);
                $.ajax({
                  type: "POST",
                  url: "https://www.balancenutrition.in/crm_ui/index.php/dashboard/mentor/mobile_number_verify",
                  data: {phoneNumber: phoneNumber,country_code:country_code},
                  dataType:'json',
                  success: function(data){
                      console.log(data);
                      if(data.valid !=true){
                        alert("Please Fill The Valid Phone Number");
                        $("#phone").focus().css("border-color","red");
                        return false;
                      }else{
                        var form = $('#m_form_1');
                        console.log(form.serialize());
                        var url = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/add_lead_data"; 
                        $.ajax({
                           type: "POST",
                           url: url,
                           data: form.serialize(),
                        //   dataType:'json',
                           success: function(response){
                               console.log(response);
                                if(response){
                                    if(response=='Lead Already Exists.'){
                                        swal_title='Oops!';
                                        swal_type = 'info';
                                    }else{
                                        swal_title='Success!';
                                        swal_type = 'success';
                                    }
                                      swal({
                                          title: swal_title,
                                          html: response,
                                          type: swal_type,
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          confirmButtonText: 'View Lead',
                                          confirmButtonPadding:'0',
                                      }).then((result) => {
                                          if(result.value == true){
                                          window.open("https://www.balancenutrition.in/sales_crm_staging/login/process_login?email=<?php echo $user_email?>&password=<?php echo $pass?>&next_url=lead",'_blank'); 
                                        }
                                      })
                                      }else{
                                           
                                      }
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
      width: '440px',
      height: 'auto',
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
                var url = "https://www.balancenutrition.in/crm_ui/dashboard/mentor/get_states";
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

</body>

</html>
