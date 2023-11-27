<!-- begin::Modal-->
<div class="modal fade" id="add_lead_popup" tabindex="-1" role="dialog" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="max-width: 480px !important;">
    <div class="modal-content">
        <button type="button" class="close add_lead_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      <div class="modal-body p-0">
          <?php if($this->uri->segment(2) != "add_lead"){ ?>
          <?= $this->load->view('lead/add_lead') ?>
          <?php } ?>
      </div>
    </div>
  </div>
</div>
<!--end::Modal --->
<style>
table{width: 100%;}
tr{border-bottom: solid 0.5px;}
.td1 {width: 20%;border-right: solid 0.5px;}
.td2{padding: 1%;}
.td_input {    width: 94%;}
</style>
<div class="modal fade common_modal" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="msg_modal_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-3">
          <div class="msg_grp">
                <!--<button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>-->
              <h3 class="msg_grp_title">Title</h3>
              <p class="msg_grp_para">
                  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many de
              </p>
              
              <div class="msg_grp_btn_grp">
                  <button class="btn btn-success custom_green_bg">Submit</button>
                  <button class="btn btn-outline-success custom_green_bg_outline">Ok</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!----Day Planner----->
<div class="modal fade common_modal" id="day_planner_modal" tabindex="-1" role="dialog" aria-labelledby="day_end_review_Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-3">
          <div class="msg_grp">
                <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                
                <h3 class="msg_grp_title">Day Planner</h3>
                
                <div class="review_form">
                    <div class="col-md-12">
                        <table>
                            <tr><td class="td1">09:00 am</td><td class="td2"><input type="text" class="td_input" id="09" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">10:00 am</td><td class="td2"><input type="text" class="td_input" id="10" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">11:00 am</td><td class="td2"><input type="text" class="td_input" id="11" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">12:00 pm</td><td class="td2"><input type="text" class="td_input" id="12" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">01:00 pm</td><td class="td2"><input type="text" class="td_input" id="13" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">02:00 pm</td><td class="td2"><input type="text" class="td_input" id="14" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">03:00 pm</td><td class="td2"><input type="text" class="td_input" id="15" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">04:00 pm</td><td class="td2"><input type="text" class="td_input" id="16" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">05:00 pm</td><td class="td2"><input type="text" class="td_input" id="17" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">06:00 pm</td><td class="td2"><input type="text" class="td_input" id="18" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">07:00 pm</td><td class="td2"><input type="text" class="td_input" id="19" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">08:00 pm</td><td class="td2"><input type="text" class="td_input" id="20" placeholder="Add your task"></input></td></tr>
                            <tr><td class="td1">Notes : </td><td class="td2"><textarea rows="3" class="form-control" id="21"></textarea></td></tr>
                        </table>
                        <div>
                          
                        </div>
                        <div class="msg_grp_btn_grp">
                          <button class="btn btn-success custom_green_bg mx-0" data-subject="Day Planner" onclick="submit_planner()" id="day_planner" style="float: right;margin-top: 2%;">Submit</button>
                        </div>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade common_modal" id="first_half_review_modal" tabindex="-1" role="dialog" aria-labelledby="first_half_review_Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-3">
          <div class="msg_grp">
                <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                
                <h3 class="msg_grp_title">First Half Review</h3>
                
                <div class="review_form">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="review_form_count">
                                <ul>
                                    <li>Total Lead Assigned <a href="<?php echo base_url('lead?lead_by=assigned');?>" target="_blank" class="total_lead_assigned_count"> </a></li>
                                    <li class="html_primary_source"></li>
                                    <li>follow up <a href="<?php echo base_url('lead?lead_by=followup');?>" target="_blank" class="fu_done_today_count"> </a></li>
                                    <li>Consultation <a href="<?php echo base_url('lead?lead_by=consultation');?>" target="_blank" class="consultation_done_today_count"> </a></li>
                                    <li>Today Hot <a href="<?php echo base_url('lead?lead_by=todayhot');?>" target="_blank" class="today_hot_count"> </a></li>
                                </ul>
                                <hr class="my-2">
                                <ul>
                                    <li>Total Sales <a href="<?php echo base_url('dashboard/unit_list?today_sales=1');?>" class="text-success"> <span class="today_sales_count"></span> | Rs. <span class="today_sales_amt"></span> </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="review_form_textarea p-4" id="review_form">
                                <!--<form class="m-form m-form--fit m-form--label-align-right" id="fh_review_form">-->
                                    <div class="form-group m-form__group px-0">
                						<textarea class="form-control m-input review_msg" placeholder="Review" id="review1" name="fh_review_msg" rows="6"></textarea>
                					</div>
                  
                                    <div class="msg_grp_btn_grp">
                                      <button class="btn btn-success custom_green_bg mx-0 review_btn" data-review="1" data-subject="First Half Review">Submit</button>
                                    </div>
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade common_modal" id="second_half_review_modal" tabindex="-1" role="dialog" aria-labelledby="second_half_review_modal_Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-3">
          <div class="msg_grp">
                <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                
                <h3 class="msg_grp_title">Second Half Review</h3>
                
                <div class="review_form">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="review_form_count second_half_review">
                                <ul>
                                    <li>Total Lead Assigned <a href="<?php echo base_url('lead?lead_by=assigned');?>" target="_blank" class="total_lead_assigned_count"> </a></li>
                                    <li class="html_primary_source"></li>
                                    <li>follow up <a href="<?php echo base_url('lead?lead_by=followup');?>" target="_blank" class="fu_done_today_count"> </a></li>
                                    <li>Consultation <a href="<?php echo base_url('lead?lead_by=consultation');?>" target="_blank" class="consultation_done_today_count"> </a></li>
                                    <li>Today Hot <a href="<?php echo base_url('lead?lead_by=todayhot');?>" target="_blank" class="today_hot_count"> </a></li>

                                    
                                </ul>
                                <hr class="my-2">
                                <ul>
                                    <li>follow up missed <a href="javascript:void(0)" class="today_fus_missed_count text-danger"> </a></li>
                                    <li>consultation missed <a href="javascript:void(0)" class="today_calls_miss_count text-danger"> </a></li>
                                </ul>
                                <hr class="my-2">
                                <ul>
                                    <li>Total Sales <a href="<?php echo base_url('dashboard/unit_list?today_sales=1');?>" class="text-success"> <span class="today_sales_count"></span> | Rs. <span class="today_sales_amt"></span> </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="review_form_textarea second_half_review p-4">
                                <form class="m-form m-form--fit m-form--label-align-right">
                                    <div class="form-group m-form__group px-0">
                						<textarea class="form-control m-input review_msg" placeholder="Review" id="review2" rows="9"></textarea>
                					</div>
                  
                                    <div class="msg_grp_btn_grp">
                                      <button class="btn btn-success custom_green_bg mx-0 review_btn" data-review="2" data-subject="Second Half Review">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade common_modal" id="day_end_review_modal" tabindex="-1" role="dialog" aria-labelledby="day_end_review_Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-3">
          <div class="msg_grp">
                <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                
                <h3 class="msg_grp_title">Day End Review</h3>
                
                <div class="review_form">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="review_form_count day_end_review">
                                  <div style="display: none;" class="monthly_popup_data">
                                      <hr class="my-2">
                                          <p>Today</p>
                                      <hr class="my-2">
                                  </div>
                                <ul>

                                    <li>Lead Assigned <a href="<?php echo base_url('lead?lead_by=assigned');?>" target="_blank" class="total_lead_assigned_count"> </a></li>
                                     <li class="html_primary_source"></li>
                                    <li>Follow up <a href="<?php echo base_url('lead?lead_by=followup');?>" target="_blank" class="fu_done_today_count"> </a></li>
                                    <li>Consultation <a href="<?php echo base_url('lead?lead_by=consultation');?>" target="_blank" class="consultation_done_today_count"> </a></li>
                                    <li>Today Hot <a href="<?php echo base_url('lead?lead_by=todayhot');?>" target="_blank" class="today_hot_count"> </a></li>

                                </ul>
                                <hr class="my-2">
                                <ul>
                                    <li>Follow up missed <a href="javascript:void(0)" class="today_fus_missed_count text-danger"> </a></li>
                                    <li>Consultation missed <a href="javascript:void(0)" class="today_calls_miss_count text-danger"> </a></li>
                                    <li style="display: none;" class="monthly_popup_data">To Engage <a href="javascript:void(0)" class="to_engage text-danger"> </a></li>
                                </ul>
                                <hr class="my-2">
                                <ul>
                                    <li>Total Sales <a href="<?php echo base_url('dashboard/unit_list?today_sales=1');?>" class="text-success"> <span class="today_sales_count"></span> | Rs. <span class="today_sales_amt"></span> </a></li>
                                    <!--//   avinash added this-28-01-2022-->
                                    <li>Total Balance <a href="<?php echo base_url('dashboard/unit_list?today_sales=1');?>" class="text-success"> <span class="today_balance_sales_count"></span> | Rs. <span class="today_balance_sales_amt"></span> </a></li>
                                    <!---->
                                    
                                </ul>
                                <hr class="my-2">
                                <div style="display: none;" class="monthly_popup_data">
                                      <!-- <hr class="my-2"> -->
                                          <p>Monthly</p>
                                      <hr class="my-2">
                                  </div>
                                <ul style="display: none;" class="monthly_popup_data">
                                      <li >Total Lead : <a href="#" target="_blank" class="total_lead_mtd_new"> </a></li>
                                      <li >Total Lead Assigned : <a href="#" target="_blank" class="total_lead_assigned_mtd_new"> </a></li>
                                      <li class="html_primary_source_all"></li>
                                      <li >Consultation : <a href="#" target="_blank" class="consultation_done_mtd_new"> </a></li>
                                      <li >Hot : <a href="#" target="_blank" class="hot_mtd"> </a></li>
                                      <hr class="my-2">
                                          <li>Total Sales <a href="#" class="text-success"> <span class="total_sales_new_count"></span> | Rs. <span class="total_sales_new"></span> </a></li>
                                          <!--//   avinash added this-28-01-2022-->
                                          <li>Total Balance <a href="#" class="text-success"> <span class="total_balance_sales_new_count"></span> | Rs. <span class="total_balance_sales_new"></span> </a></li>
                                      <!--//   avinash added this-28-01-2022-->
                                  </ul>
                                  <div style="display: none;" class="monthly_popup_data">
                                      <hr class="my-2">
                                          <p>MIS Unconverted</p>
                                      <hr class="my-2">
                                  </div>
                                  <ul style="display: none;" class="monthly_popup_data">
                                      <li >Total Consultation Unconverted : <a href="#" target="_blank" class="consultation_unconverted"> </a></li>
                                      <li >Phase 1 & 2 : <a href="#" target="_blank" class="phase1_phase2"> </a></li>
                                      <li >Phase 3 & 4 : <a href="#" target="_blank" class="phase3_phase4"> </a></li>
                                      <li >No Phase : <a href="#" target="_blank" class="no_phase_new"> </a></li>
                                      <li >Stage 1 & 2 : <a href="#" target="_blank" class="stage1_stage2"> </a></li>
                                      <li >Stage 3 & 4 : <a href="#" target="_blank" class="stage3_stage4"> </a></li>
                                      <li >Age Distribution : <a href="#" target="_blank" class="age_distributation"> </a></li>
                                      
                                      
                                  </ul>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="review_form_textarea day_end_review p-4">
                                <form class="m-form m-form--fit m-form--label-align-right">
                                    <div class="form-group m-form__group px-0">
                            <textarea class="form-control m-input review_msg" name="review_msg" placeholder="Review" id="review3" rows="9"></textarea>
                          </div>
                  
                                    <div class="msg_grp_btn_grp">
                                      <button class="btn btn-success custom_green_bg mx-0 review_btn" data-review="3" data-subject="Day End Review">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade common_modal" id="get_hs_table" tabindex="-1" role="dialog" aria-labelledby="get_hs_table_label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body p-3">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mentorreminderModal" tabindex="-1" role="dialog" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header p-3">
        <h5 class="modal-title w-100 text-center" id="mentorreminderModalTitle">Add Task</h5>
        <button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" mentorreminderModalBody p-3">
            <div class="mentor_reminder_form_sec">
                <form class="m-form m-form--fit m-form--label-align-right" id="mentor_reminder_form">
    				<div class="m-portlet__body">
    					<div class="form-group m-form__group px-0">
    						<label for="mentorreminder_title">Title: <sup>*</sup></label>
    						<input type="text" class="form-control m-input m-input--square" id="reminder_title"  >
    						<!--<span class="m-form__help">We'll never share your email with anyone else.</span>-->
    						<p id="error_title" style="color:red;display:none"></p>
    					</div>
    					<div class="form-group m-form__group px-0">
    						<label for="reminder_note">Description:</label>
    						<textarea class="form-control m-input" id="reminder_note" rows="3"></textarea>
    					</div>
    					<div class="row">
    					    <div class="col">
    					        <div class="form-group m-form__group px-0">
            					    <label for="reminder_date">Date: <sup>*</sup></label>
            					    <div class="input-group date">
                						<input type="text" class="form-control reminder_date custom_datepicker" readonly placeholder="Select date"/>
                						<div class="input-group-append">
                							<span class="input-group-text">
                								<i class="la la-calendar-check-o"></i>
                							</span>
                						</div>
                					</div>
                					<p id="error_date" style="color:red;display:none"></p>
                    			</div>
    					    </div>
    					    <div class="col">
    					        <div class="form-group m-form__group px-0">
            					    <label for="reminder_time">Time: <sup>*</sup></label>
            					    <div class="input-group custom_timepicker">
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
    					
    					<div class="form-group m-form__group px-0"><div class="m-checkbox-list">
							<label class="m-checkbox">
							<input type="checkbox" value="1" id="reminder_me" checked="checked"> Reminder me
							<span></span>
							</label>
						</div>
    					</div>
    				</div>
    				<div class="m-portlet__foot m-portlet__foot--fit">
    					<div class="m-form__actions px-0 pb-3 text-center">
    						<button type="button" class="btn btn-success btn-lg" id="save_reminder">Save</button>
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
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sales_summary_popup" tabindex="-1" role="dialog" aria-labelledby="sales_summary_popup_Label" aria-hidden="true">
  <div class="modal-dialog mx-auto" role="document" style="max-width: 1240px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sales_summary_popup_Label"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!--faqs-->
<div class="modal fade" id="faq_modal" tabindex="-1" role="dialog" aria-labelledby="faqs_popup_Label" aria-hidden="true">
  <div class="modal-dialog mx-5" role="document" style="max-width: 1240px !important;">
    <div class="modal-content">
      <div class="modal-header p-4 text-center d-block w-100">
        <h5 class="modal-title font-weight-bold" id="faqs_popup_Label">Faq's</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0 pb-2 px-3">
          <?= $this->load->view('faq/faq_master'); ?>
      </div>
    </div>
  </div>
</div>


<!-- begin::Modal-->
<div class="modal fade" id="lead_capture_count_popup" tabindex="-1" role="dialog" aria-labelledby="lead_capture_count_Label" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="max-width: 480px !important;">
    <div class="modal-content">
        <div class="modal-header p-3">
            <h5 class="modal-title" id="lead_capture_count_Label">Available Leads</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
      <div class="modal-body p-3 pt-0">
          <div class="avail_leads">
                <ul class="nav nav-tabs  m-tabs-line" role="tablist">
                    <li class="nav-item m-tabs__item mr-3">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#ld_capture_today" onclick="lead_capture('ld_capture_today')" role="tab">Day<sup data-toggle="tooltip1" title="Leads from Yesterday 7 PM till Date And on Monday its from Saturday 7 PM."><i class="fa fa-question-circle" aria-hidden="true"></i></sup>(<?= $lead_capture_today_count; ?>)</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#ld_capture_mtd" onclick="lead_capture('ld_capture_mtd')" role="tab">MTD<sup data-toggle="tooltip1" title="1st of Current Month Till Date"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>(<?= $lead_capture_mtd_count; ?>)</a>
                    </li>
                </ul>                        
                <div class="tab-content">
                    <div class="tab-pane active" id="ld_capture_today" role="tabpanel">
                        <div class="m-section__content lead_capture_day">
        					<table class="table m-table m-table--head-separator-primary" id="today_lead_cap_table">
        					  	<thead>
        					    	<tr>
        					      		<th>Stage</th>
        					      		<th class="text-center">Fresh</th>
        					      		<th class="text-center">OLR</th>
        					    	</tr>
        					  	</thead>
        					  	<tbody></tbody>
        					</table>
        				</div>
                    </div>
                    <div class="tab-pane" id="ld_capture_mtd" role="tabpanel">
                        <div class="m-section__content lead_capture_mtd">
        					<table class="table m-table m-table--head-separator-primary" id="mtd_lead_cap_table">
        					  	<thead>
        					    	<tr>
        					      		<th>Stage</th>
        					      		<th class="text-center">Fresh</th>
        					      		<th class="text-center">OLR</th>
        					    	</tr>
        					  	</thead>
        					  	<tbody></tbody>
        					</table>
        				</div>
                    </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!--end::Modal --->

<!-- begin::Modal-->
<div class="modal fade" id="call_reminder_popup" tabindex="-1" role="dialog" aria-labelledby="call_reminder_popup_Label" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="max-width: 480px !important;">
    <div class="modal-content">
        <div class="modal-header p-3">
            <h5 class="modal-title" id="call_reminder_popup_Label">Call Reminder</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
      <div class="modal-body p-3 pt-0">
          <div class="avail_leads">
              
          </div>
      </div>
    </div>
    <div style="display:none">
        <audio controls id="pop_tune" preload="none">  
          <source src="https://www.balancenutrition.in/pop_tune/eventually-590.ogg" type="audio/ogg">
          <source src="https://www.balancenutrition.in/pop_tune/eventually-590.mp3" type="audio/mpeg">
          <source src="https://www.balancenutrition.in/pop_tune/eventually-590.m4r" type="audio/mpeg">
        </audio>
    </div>
  </div>
</div>
<!--end::Modal --->




<!--avinash add this code for set goal 03-11-2021 -->

<!--start::Modal --->

<!-- Modal -->

<div class="modal fade bd-example-modal-lg" id="set_goal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Your Goal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table bg-secondary">
  <thead class="text-center">
    <tr>
        <th rowspan="2" scope="col" ></th>
        <th colspan="2" style="background:#ABB2B9">Previous Month</th>
        <th style="background:#E74C3C"><p><b>This is your</b></p>Simulated Projection<br/><small>(Based on previous month performance)</small></th>
        <th style="background:#52BE80" colspan="2"><p><b>NOW</b></p>Plan your month<br/><small><a href="#" style="cursor:pointer" title="Review the simulation and change your ratios and avg realisation per unit based on your planning and learnings, both.">Read tips to plan your goal</a></small></th>
    </tr>
    <tr>
      <th style="background:#D5D8DC" scope="col" >Units</th>
      <th style="background:#D5D8DC" scope="col">Ratio %</th>
      <th style="background:#F5B7B1" scope="col" ></th>
      <!--<th scope="col">Sales Ratio </th>-->
      <th style="background:#ABEBC6" scope="col" >Units</th>
      <th style="background:#ABEBC6" scope="col">Ratio %</th>
    </tr>
    
  </thead>
  <tbody class="text-center">
    <tr>
      <th scope="col">Lead</th>
      <td id="lead" style="background:#D5D8DC" >100</td>
      <td style="background:#D5D8DC" title="Lead->Consultation" id="const_ratio"><span>0.0 %</span></td>
      <td style="background:#F5B7B1" id="lead_simulation">--</td>
      <!--<td id="lead_sale_ratio">0.0 %</td>-->
      <td style="padding-right: 0px;background:#ABEBC6">
          <input type="text" class="form-control" id="goal_lead" tabindex="-1" style="width:70%" name="goal_lead"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" tabindex="-1" id="goal_consult_ratio" name="goal_consult_ratio" readonly style="width:70%" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
    </tr>
    <tr>
      <th>Consultation</th>
      <td style="background:#D5D8DC" id="const_unit">100</td>
      <td style="background:#D5D8DC" title="Consultation->Sale" id="const_sale_ratio">0.0 %</td>
      <td style="background:#F5B7B1" id="consultation_simulation">--</td>
      <!--<td id="const_ratio"><span>0.0 %</span></td>-->
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" id="goal_consult" name="goal_consult" style="width:70%" readonly oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" id="consultation_sale_ratio" name="consultation_sale_ratio" readonly style="width:70%"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
    </tr>
    <!--<tr>
      <th class="bg-success text-white">Hot</th>
      <td id="hot_unit">100</td>
      <td id="hot_ratio"><span>0.0 %</span></td>
      <td id="hot_sale_ratio">0.0 %</td>
      <td style="width:20%">
          <input type="text" class="form-control" id="goal_hot" name="goal_hot" style="width:70%" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
      <td style="width:20%">
          <input type="text" class="form-control" id="goal_hot_ratio" name="goal_hot_ratio" style="width:70%" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
    </tr>-->
    <tr>
      <th>Sales Unit</th>
      <td style="background:#D5D8DC" id="unit">100</td>
      <td style="background:#D5D8DC" title="Lead->Sale"  id='unit_ratio'><span>0.0 %</span></td>
      <td style="background:#F5B7B1" id="sale_unit_simulation">--</td>
      <!--<td id="sale_unit_ratio">- -</td>-->
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" id="unit_goal" tabindex="-1"  name="unit_goal" style="width:70%" readonly oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
        </td>
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" id="unit_goal_ratio" tabindex="-1" name="unit_goal_ratio" readonly style="width:70%"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
        </td>
    </tr>
    <tr>
      <th>Sales Amount</th>
      <td style="background:#D5D8DC" id="sale">100</td>
      <td style="background:#D5D8DC" id="sale_ratio"><span>0.0 %</span></td>
      <td style="background:#F5B7B1">--</td>
      <!--<td>- -</td>-->
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" id="sale_goal"  tabindex="-1" name="sale_goal" style="width:70%" readonly oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
      </td>
      <td style="width:20%;background:#ABEBC6">
          <input type="text" class="form-control" id="sale_goal_per_unit"  tabindex="-1" name="sale_goal_per_unit" style="width:70%"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
      </td>
    </tr>
  </tbody>
</table>
<textarea class="form-control" id="note" name="note" Placeholder="Write a note, if Any." style="border-color:black;"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="set_counsellor_goal">Update</button>
      </div>
    </div>
  </div>
</div>
<!--end::Modal --->





<div class="modal fade" id="edit_lead_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Lead Pending Detail
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <div class="modal-body">
        <div class="first_mobPage_form desk_form_padding">
          <!--<div class="col-lg-6">-->
          <div class="form-group m-form__group row">
            <label class="form-label col-lg-3 col-sm-12">First Name *
            </label>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" class="form-control m-input" name="lead_first_name" id="lead_first_name_pending" placeholder="Lead Name*">
            </div>
          </div>
          <div class="form-group m-form__group row">
          	<div class="col-lg-12 col-md-12 col-sm-12">
          		<input type="tel" id="phone_pending" name="phone" class="txtbox form-control m-input" placeholder="Phone No*"/ maxlength="15">
          	</div>
          </div>
          <div class="form-group m-form__group row">
            <label class="form-label col-lg-3 col-sm-12 ">Email 
            </label>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" class="form-control m-input" name="lead_email_id" id="lead_email_id_pending" placeholder="Email">	
               <input type="hidden" class="form-control m-input" name="old_lead_email_id" id="old_lead_email_id_pending">
               <!--<input type="hidden" class="form-control m-input" name="lead_gender" id="lead_gender">-->
               <input type="hidden" class="form-control m-input" name="lead_stage" id="lead_stage">
            </div>
          </div>
          <div class="form-group m-form__group row">
            <label class="form-label col-lg-3 col-sm-12 ">Age : 
            </label>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input type="text" class="form-control m-input" name="lead_age_data" id="lead_age_data_pending" placeholder="Age">					
            </div>
          </div>
          <div class="form-group m-form__group row" style="padding-top:5px;">
                			<label class="col-form-label col-lg-3 col-sm-12 d-block" style="text-align: left;">Gender :</label>
                			<div class="col-lg-6 col-md-6 col-sm-6">
                			    <div class="m-radio-inline">
                					<label class="m-radio">
                					<input type="radio" name="gender" id="male" value="male" > Male
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
            <div class="col-lg-6 col-md-6 col-sm-12 col-6">
              <label class="form-label">Weight (kg) :
              </label>
              <input  class="form-control m-input" name="lead_weight_kg" id="lead_weight_kg_pending" placeholder="Wt (kg) - 0-999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                     type = "number"
                     maxlength = "3">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-6">
              <label class="form-label">Weight (gm) :
              </label>
              <input class="form-control m-input" name="lead_weight_grm" id="lead_weight_grm_pending" placeholder="Wt (gm) - 100-999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                     type = "number"
                     maxlength = "3">
            </div>
          </div>
          <div class="form-group m-form__group row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-6">
              <label class="form-label">Height (ft) :
              </label>
              <select class="form-control m-input heightClass" name="lead_height_ft" id="lead_height_ft_pending">
                <option value="">Select Feet
                </option>
                <option value="0"> 0 (ft) 
                </option> 
                <option value="1"> 1 (ft) 
                </option>
                <option value="2"> 2 (ft) 
                </option>
                <option value="3"> 3 (ft) 
                </option>
                <option value="4"> 4 (ft) 
                </option>
                <option value="5"> 5 (ft) 
                </option>
                <option value="6"> 6 (ft) 
                </option>
                <option value="7"> 7 (ft) 
                </option>
              </select>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-6">
              <label class="form-label">Height (in) :
              </label>
              <select class="form-control m-input" name="lead_height_in" id="lead_height_in_pending">
                <option value="">Select Inches
                </option>
                <option value="0">0 (in)
                </option>
                <option value="1">1 (in)
                </option>
                <option value="2">2 (in)
                </option>
                <option value="3">3 (in)
                </option>
                <option value="4">4 (in)
                </option>
                <option value="5">5 (in)
                </option>
                <option value="6">6 (in)
                </option>
                <option value="7">7 (in)
                </option>
                <option value="8">8 (in)
                </option>
                <option value="9">9 (in)
                </option>
                <option value="10">10 (in)
                </option>
                <option value="11">11 (in)
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success update_lead_detail" id="update_detail">Update
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="update_detail_cancel">Cancel
        </button>
        </button>
      </div>
    </div>
  </div>
</div>



<script>
    $(document).ready(function (){
        
    $('#update_detail_cancel').on('click',function(){
    $('#edit_lead_detail').modal('hide');
    $('#sales_summary_popup').modal('show');
    $('#sales_summary_popup').css('overflow-y','scroll');
    });
    $('#update_detail').on('click',function(){
    var lead_first_name_pending = $('#lead_first_name_pending').val();
    var old_lead_email_id_pending =$('#old_lead_email_id_pending').val();
    var lead_email_id_pending = $('#lead_email_id_pending').val();
    var lead_age_data_pending = $('#lead_age_data_pending').val();
    var lead_weight_kg_pending = $('#lead_weight_kg_pending').val();
    var lead_weight_grm_pending = $('#lead_weight_grm_pending').val();
    var lead_height_ft_pending = $('#lead_height_ft_pending').val();
    var lead_height_in_pending = $('#lead_height_in_pending').val();
    // var lead_height_in_pending = $('#lead_height_in_pending').val();
    var phone_pending = $('#phone_pending').val();
    // var lead_gender = $('#lead_gender').val();
    var lead_gender = $('input[type="radio"]:checked').val();
    // alert(lead_gender);
    // return false;
    var lead_stage = $('#lead_stage').val();
    if(lead_first_name_pending =='' || lead_email_id_pending =='' ||lead_age_data_pending =='' ||lead_weight_kg_pending =='' ||lead_height_ft_pending =='' ||phone_pending =='' || lead_gender ==''){
        alert("Please Fill all fields!");
        return false;
    }
    // alert("not working right now");
    $('#edit_lead_detail').modal('hide');
    $('#sales_summary_popup').modal('show');
    $('#sales_summary_popup').css('overflow-y','scroll');
    $('#edit_lead_detail').modal('hide');
    // return false;
    
      $.ajax({
        method: 'POST',
        url : '<?php echo base_url()?>user_details/update_lead_pending_details',
        data : {
          old_email_id_details:old_lead_email_id_pending,lead_first_name:lead_first_name_pending,lead_email_id:lead_email_id_pending,lead_weight_kg:lead_weight_kg_pending,lead_weight_grm:lead_weight_grm_pending,lead_height_ft:lead_height_ft_pending,lead_height_in:lead_height_in_pending,age:lead_age_data_pending,lead_gender:lead_gender,lead_stage:lead_stage,phone_pending:phone_pending}
        ,
        success: function(data) {
            console.log(data);
            if(data){
          swal({
                title: 'Data Updated Successfully !',
                // timer: 5000,
                showConfirmButton: true,
                confirmButtonText: 'Great !',
                showCancelButton: true,
            }).then(function() {
            //  window.location.reload();
            })
        } else{
            alert('Something Went Wrong!');
        }
        }
      });
    
  });
        
    })
    
</script>







