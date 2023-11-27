<style>
.m-tooltips, .ui-tooltip {
    height: auto !important;
}
.sub_text_count a{
    color: #fff;
}

/* steps progress bar css*/
.progtrckrsection {

}
ol.progtrckr {
        display: table;
        list-style-type: none;
        margin: 0;
        padding: 0;
        table-layout: fixed;
        width: 98.6%;
        padding-left: 18px;
    }
    ol.progtrckr li {
        display: table-cell;
        text-align: center;
        line-height: 3em;
    }

    ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
    ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
    ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
    ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
    ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
    ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
    ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
    ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

    ol.progtrckr li.progtrckr-done {
        color: black;
        border-bottom: 4px solid yellowgreen;
    }
    ol.progtrckr li.progtrckr-todo {
        color: silver; 
        border-bottom: 4px solid silver;
    }
    
    ol.progtrckr li.progtrckr-undo {
        color: black;
        border-bottom: 4px solid red;
    }

    ol.progtrckr li:after {
        content: "\00a0\00a0";
    }
    ol.progtrckr li:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }
    ol.progtrckr li.progtrckr-done:before {
        content: "\2713";
        color: white;
        background-color: yellowgreen;
        height: 1.2em;
        width: 1.2em;
        line-height: 1.2em;
        border: none;
        border-radius: 1.2em;
    }
    ol.progtrckr li.progtrckr-todo:before {
        content: "\039F";
        color: silver;
        background-color: white;
        font-size: 1.5em;
        bottom: -1.6em;
    }
    
    ol.progtrckr li.progtrckr-undo:before {
        content: "\2713";
        color: white;
        background-color: red;
        height: 1.2em;
        width: 1.2em;
        line-height: 1.2em;
        border: none;
        border-radius: 1.2em;
        border-bottom: 4px solid red !important;
    }
    .timeset {
        font-weight:400;
    }
    .goal_set p {
        font-size: 16px;
    font-weight: normal;
   
    }
    .desktopcontent {
        display:block;
        
    }
    .mobilecontent {
        display:none;
        
    }
        	.col-md-4{
	    padding-right: 15px !important;
    padding-left:15px !important;
}
    	.col-md-12{
	    padding-right: 15px !important;
    padding-left:15px !important;
}
ol.deskProgtrckr {
    display:block;
}
ol.mobileProgtrckr {
   display:none;
}
@media only screen and (max-width: 515px){
	#m_accordion_sales_journey2 {
		overflow: hidden !important;
	}
	.col-md-12  {
	    padding-right: 3px !important;
    padding-left: 3px !important;
}
	.col-md-4  {
	    padding-right: 3px !important;
    padding-left: 3px !important;
}
ol.deskProgtrckr {
       display:none;
}
ol.mobileProgtrckr {
       display:block;

}

 .timeset {
        display:none;
    }

	  
	.days_needed th {
		padding: 0.2rem;
	}
	#fr text{
		1st Review;
	}
	#second text{
		2nd Review;
	}
	#end text{
		Day End;
	}
	/*	.progtrckrsection {
	    margin-left:5%;
	    margin-right:5%;
	}*/
	ol.progtrckr{
		width: 100%;
		    margin-bottom:12px !important;
	     padding:0px !important;
	}

.goal_set p {
        font-size: 16px;
    font-weight: normal;
    padding-top: 4px;
    padding-bottom: 0px;
    margin-bottom: 0rem !important;
    }
    .desktopcontent {
              display:none;

        
    }
    .mobilecontent {
        display:block;
        
    }

/* steps progress bar css end*/


</style>

<!--start:: Available Lead. -->
<div class="m-content pt-4 pb-0">
    <!--<span class="m-section__sub">
		<div class="float-left goal_set mb-4">
		    <p>Goal set: Rs. <span><?= $goal_set[0]['sale_goal']; ?></span> | Units <span><?= $goal_set[0]['unit_goal']; ?></span></p>
		</div>
		<div class="float-right goal_set mb-4">
		    <p>Goal achieved: Rs. <span><?= $sales_funnel_sales[0]['amt']; ?></span> | Units <span><?= $sales_funnel_sales[0]['unit']; ?></span></p>
		</div>
		<div class="clearfix"></div>
	</span>-->
	<!--avinash added this for review inditation progress bar-->
	<?php if($_SESSION['balance_session']['user_type'] =='sales'){ ?>
	<div class=" ">
    <ol class="progtrckr pt-0 " data-progtrckr-steps="5" style="padding-bottom:5px;">
    <li class="progtrckr-todo aa" style="font-weight: 400" id="first">First Review <span class="timeset">: 1:30 PM</span></li>
    <li class="progtrckr-todo bb" style="font-weight: 400" id="second">Second Review <span class="timeset">: 4:30 PM</span></li>
    <li class="progtrckr-todo cc" style="font-weight: 400" id="end">Day End Review<span class="timeset">: 7:00 PM</span></li>
    </ol>
    <!--<ol class="progtrckr pt-0 mobileProgtrckr" data-progtrckr-steps="5" style="padding-bottom:5px;">
    <li class="progtrckr-todo" style="font-weight: 400" id="first">1st Review <span class="timeset">: 1:30 PM</span></li>
    <li class="progtrckr-todo" style="font-weight: 400" id="second">2nd Review <span class="timeset">: 4:30 PM</span></li>
    <li class="progtrckr-todo" style="font-weight: 400" id="end">Day End<span class="timeset">: 7:00 PM</span></li>
    </ol>-->
    
    </div>
    <?php } ?>
    
    <!--avinash added this for review inditation progress bar-->
    <div class="m-accordion col col-md-4 col-xs-12 m-accordion--default" id="m_accordion_sales_journey" role="tablist" style="float:left;z-index: 9;">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3" role="tab" id="m_accordion_sales_journey_item_2_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_2_body" aria-expanded="true">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark">
                		Available Lead
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse show" id="m_accordion_sales_journey_item_2_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_2_head" data-parent="#m_accordion_sales_journey"> 
                <div class="m-accordion__item-content p-0 pt-3">
                	<!--Begin::Section-->
                	<div class="m-portlet">
                		<div class="m-portlet__body  m-portlet__body--no-padding">
                			<div class="row m-row--no-padding m-row--col-separator-xl">		
                				<div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec pb-0">
                                        <!--<h4>Stage</h4>-->
                                        <div class="hd_looks_sec_list pt-0 ">
                                            <ul class="cl_summary_sec_fst_list px-0">
                                                <li>Lead<sup data-toggle="tooltip1" title="Today | MTD"><i class="fa fa-question-circle" aria-hidden="true"></i></sup><a href="#" class="cl_summary_sec_number ld_capture_mtd" data-toggle="modal" data-target="#lead_capture_count_popup" style="border-right:0px" data-id="ld_capture_mtd"><?= $lead_capture_mtd_count; ?></a><a href="#" class="cl_summary_sec_number ld_capture_today" data-toggle="modal" data-target="#lead_capture_count_popup" data-id="ld_capture_today"><?= $lead_capture_today_count; ?></a></li>
                                                <!--<li>Basic Stack <a href="<?= base_url('lead?lead_by=bs&bs_assign=1&dys=0') ?>" target="_blank" class="cl_summary_sec_number"><?= $basic_stack_count; ?></a></li>-->
                                                <li>OCL<sup data-toggle="tooltip1" title="Last 30 days OCL"><i class="fa fa-question-circle" aria-hidden="true"></i></sup><a href="<?= base_url('lead?lead_by=avlble_omr_mnth') ?>" target="_blank" style="border-right:0px" class="cl_summary_sec_number"><?= $omr_lead_mtd_count; ?></a><!-- |<a href="<?= base_url('lead?lead_by=avlble_omr_tdy') ?>" target="_blank" class="cl_summary_sec_number"><?= $omr_lead_today_count; ?></a>--></li>
                                                <?php if($_SESSION['balance_session']['admin_id']=='216'){?>    
                                                    <li style="margin-left:20px;"><span>HS - <a href="<?= base_url('lead?lead_by=avlble_omr_mnth&ocl_source=Your BN Health Score Result') ?>" target="_blank" style="float:none;" class="cl_summary_sec_number"><?= $omr_hs; ?></a></span>
                                                    <span style="float:right;">Diet Page - <a href="<?= base_url('lead?lead_by=avlble_omr_mnth&ocl_source=diet') ?>" target="_blank" style="float:none;" class="cl_summary_sec_number"><?= $omr_diet; ?></a></span></li>
                                                    <li style="margin-left:20px;">CV - <a href="<?= base_url('lead?lead_by=avlble_omr_mnth&ocl_source=cv') ?>" target="_blank" style="float:none;" class="cl_summary_sec_number"><?= $omr_cv; ?></a><span style="float:right;">Ekit - <a href="<?= base_url('lead?lead_by=avlble_omr_mnth&ocl_source=ekit') ?>" target="_blank" style="float:none;" class="cl_summary_sec_number"><?= $omr_ekit; ?></a></span></li>
                                                    <li style="margin-left:20px;">Blog - <a href="<?= base_url('lead?lead_by=avlble_omr_mnth&ocl_source=blog') ?>" target="_blank" style="float:none;" class="cl_summary_sec_number"><?= $omr_blog; ?></a><span style="float:right;">Other - <a href="<?= base_url('lead?lead_by=avlble_omr_mnth&ocl_source=other') ?>" target="_blank" style="float:none;" class="cl_summary_sec_number"><?= $omr_other; ?></a></span></li>
                                                    <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                				
                				<?php /*
                				<div class="col">
                					<div class="cl_summary_sec avail_lead">
                						<!--<a href="javascript:void(0)" class="cl_summary_sec_number">-->
                							<small class="cl_summary_sec_text">Lead <a tabindex="0" class="text-dark" data-toggle="m-tooltip" data-trigger="focus" title="Unassigned leads today | Unassigned leads this month" data-content="Unassigned Leads Today | Unassigned leads this month"><i class="fa fa-info-circle"></i></a></small>
                							<ul class="cl_summary_sec_fst_list">
                							    <li><a href="#" class="cl_summary_sec_number ld_capture_today" data-toggle="modal" data-target="#lead_capture_count_popup" data-id="ld_capture_today"><?= $lead_capture_today_count; ?></a></li>
                							    <li><a href="#" class="cl_summary_sec_number ld_capture_mtd" data-toggle="modal" data-target="#lead_capture_count_popup" data-id="ld_capture_mtd"><?= $lead_capture_mtd_count; ?></a></li>
                							</ul>
                							
                							<!--<hr class="my-2">
                							
                							<ul class="cl_summary_sec_sub_list">
                							    <li><a href="#">5</a> <span>Fresh</span></li>
                							    <li><a href="#">45</a> <span>OLR</span></li>
                							</ul>-->
                							
                						<!--</a>-->
                					</div>
                				</div>
                                <div class="col">
                					<div class="cl_summary_sec avail_lead">
                						<!--<a href="javascript:void(0)" class="cl_summary_sec_number">-->
                							<small class="cl_summary_sec_text">Basic Stack</small>
                							<ul class="cl_summary_sec_fst_list">
                							    <li><a href="<?= base_url('lead?lead_by=bs&bs_assign=1&dys=0') ?>" target="_blank" class="cl_summary_sec_number"><?= $basic_stack_count; ?></a></li>
                							    <!--<li><a href="#" class="cl_summary_sec_number">45</a></li>-->
                							</ul>
                							
                							<!--<hr class="my-2">
                							
                							<ul class="cl_summary_sec_sub_list">
                							    <li><a href="#">5</a> <span class="d-none">Fresh</span></li>
                							    <li><a href="#">45</a> <span class="d-none">OLR</span></li>
                							</ul>
                							<small class="cl_summary_sec_text">Assigned By Others</small>-->
                						<!--</a>-->
                					</div>
                				</div>
                				<div class="col">
                					<div class="cl_summary_sec avail_lead">
                						<!--<a href="javascript:void(0)" class="cl_summary_sec_number">-->
                						<small class="cl_summary_sec_text">OCR</small>
            							<ul class="cl_summary_sec_fst_list">
            							    <li><a href="<?= base_url('lead?lead_by=avlble_omr_tdy') ?>" target="_blank" class="cl_summary_sec_number"><?= $omr_lead_today_count; ?></a></li>
            							    <li><a href="<?= base_url('lead?lead_by=avlble_omr_mnth') ?>" target="_blank" class="cl_summary_sec_number"><?= $omr_lead_mtd_count; ?></a></li>
            							</ul>
                							
                							
                							<!--<hr class="my-2">
                							
                							<ul class="cl_summary_sec_sub_list">
                							    <li><a href="#">5</a> <span>Active</span></li>
                							    <li><a href="#">45</a> <span>Completed</span></li>
                							</ul>
                							
                							<a href="#" class="all_basic_stack">View all Basic stack Lead</a>-->
                						<!--</a>-->
                					</div>
                				</div>
                				*/ ?>
                			</div>
                		</div>
                	</div>
                	<!--End::Section-->
                	
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
    <div class="m-accordion col col-md-12 m-accordion--default" id="m_accordion_sales_journey2" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3" role="tab" id="m_accordion_sales_journey_item_2_head2" data-toggle="collapse" href="#m_accordion_sales_journey_item_2_body2" aria-expanded="true">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark">
                		Your Goal
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
   
            <div class="m-accordion__item-body collapse show" id="m_accordion_sales_journey_item_2_body2" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_2_head2" data-parent="#m_accordion_sales_journey2"> 
                <div class="m-accordion__item-content p-0 pt-3">
                	<!--Begin::Section-->
                	<div class="m-portlet">
                		<div class="m-portlet__body  m-portlet__body--no-padding">
                			<div class="row m-row--no-padding m-row--col-separator-xl table-responsive">		
                				<table class="table bg-secondary" style="margin-bottom:0px;">
  <thead class="text-center">
    <tr>
        <th scope="col" ></th>
        <th style="background:#52BE80">Set</th>
        <th style="background:#ABB2B9">Avg./Monthly</th>
        <th style="background:#E74C3C">Avg./Day</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <tr>
      <th scope="col">Lead</th>
      <td style="background:#ABEBC6" id="lead_set">--</td>
      <td style="padding-right: 0px;background:#D5D8DC" id="lead_avg_monthly"></td>
      <td style="padding-right: 0px;background:#F5B7B1" id="lead_avg_day"></td>
    </tr>
    <tr>
      <th>Consultation</th>
      <td style="background:#ABEBC6" id="consultation_set">--</td>
      <td style="background:#D5D8DC" id="consultation_avg_monthly"></td>
      <td style="background:#F5B7B1" id="consultation_avg_day"></td>
    </tr>
    <tr>
      <th>Sales Unit</th>
      <td style="background:#ABEBC6" id="unit_set">--</td>
      <td style="background:#D5D8DC" id="sale_avg_monthly"></td>
      <td style="background:#F5B7B1" id="sale_avg_day"></td>
    </tr>
    <tr>
      <th>Sales Amount</th>
      <td style="background:#ABEBC6" id="amount_set">--</td>
      <td style="background:#D5D8DC" id="amount_avg_monthly"></td>
      <td style="background:#F5B7B1" id="amount_avg_day"></td>
    </tr>
  </tbody>
</table>
                
                			</div>
                		</div>
                	</div>
                	<!--End::Section-->
                	
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Available Lead. -->
<!--Sales Goal Start Added by Navin-->

<div class="m-content desktopcontent" style="padding: 0px 30px;">
    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <div class="m-portlet__body pa-p-0 pt-3">
            <span class="m-section__sub">
                <div class="float-left goal_set mb-4">
                    <p>Goal set: Rs. <span><?= $goal_set[0]['sale_goal']; ?></span> | Units <span><?= $goal_set[0]['unit_goal']; ?></span>
                    <?php 
                        //if($this->session->balance_session['email_id']=='priyanka.kadam@balancenutrition.in'){ 
                            echo '<label ><a href = "'.base_url().'dashboard/goal_set_view" target="_blank"> Edit</a></label';
                        //} 
                    ?>
                    </p>
                </div>
                <div class="float-right goal_set mb-4">
                    <p>Goal achieved: Rs. <span><?= $sales_funnel_sales[0]['amt']; ?></span> | Units <span><a href="<?php echo base_url()?>dashboard/unit_list"><?= $sales_funnel_sales[0]['unit']; ?></a></span></p>
                </div>
            </span>
        </div>
    </div>
</div>


<div class="m-content mobilecontent" style="padding: 0px 8px;">
    <div class="m-portlet m-portlet--bordered m-portlet--unair">
        <div class="m-portlet__body pa-p-0 ">
            <span class="m-section__sub">
                <div class="float-left goal_set">
                    <p>Goal: Rs. <span><?= $goal_set[0]['sale_goal']; ?></span>/<span><?= $sales_funnel_sales[0]['amt']; ?></span> | Units <span><?= $goal_set[0]['unit_goal']; ?></span>/<span><a href="<?php echo base_url()?>dashboard/unit_list"><?= $sales_funnel_sales[0]['unit']; ?></a></span>
                    <?php 
                        //if($this->session->balance_session['email_id']=='priyanka.kadam@balancenutrition.in'){ 
                            echo '<label ><a class="pl-2" href = "'.base_url().'dashboard/goal_set_view" target="_blank"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></label';
                        //} 
                    ?>
                    </p>
                </div>
                <!--<div class="float-right goal_set mb-4">
                    <p>Goal achieved: Rs. <span><?= $sales_funnel_sales[0]['amt']; ?></span> | Units <span><a href="<?php echo base_url()?>dashboard/unit_list"><?= $sales_funnel_sales[0]['unit']; ?></a></span></p>
                </div>-->
            </span>
        </div>
    </div>
</div>
<!--Sales Goal End-->
<!--start:: TODAYS ACTIVITIES Done & set -->
<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 todays_activities_done collapsed" data-id="todays_activities_done" role="tab" id="m_accordion_sales_journey_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark">
                		Activities Done
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_3_head" data-parent="#m_accordion_sales_journey"> 
                <div class="m-accordion__item-content p-0 pt-3">
                	<!--Begin::Section-->
                	<div class="m-portlet">
                		<div class="m-portlet__body  m-portlet__body--no-padding">
                			<div class="row m-row--no-padding m-row--col-separator-xl">             
                                <div class="col">
                                    <div class="cl_summary_sec">
                                        <!--<a href="javascript:void(0)" class="cl_summary_sec_number">-->
                                            <ul class="cl_summary_sec_fst_list">
                                                <li><a href="<?= base_url('lead?lead_by=assgn_self_tdy'); ?>" target="_blank" class="cl_summary_sec_number lead_captured_today" alt="today"></a></li>
                                                <li><a href="<?= base_url('lead?lead_by=assgn_self_mnth'); ?>" target="_blank" class="cl_summary_sec_number lead_captured_mtd" alt="month"></a></li>
                                            </ul>
                                            <small class="cl_summary_sec_text">Captured Lead<sup data-toggle="tooltip1" title="Today | MTD"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></small>
                                            
                                            <hr class="my-2">
                                            
                                            <ul class="cl_summary_sec_sub_list">
                                                <li><a href="<?= base_url('lead?lead_by=assgn_by_othrs_tdy'); ?>" target="_blank" alt="today" class="other_lead_captured_today"></a> <span></span></li>
                                                <li><a href="<?= base_url('lead?lead_by=assgn_by_othrs_mnth'); ?>" target="_blank" alt="month" class="other_lead_captured_mtd"></a> <span></span></li>
                                            </ul>
                                            
                                            <!--<small class="all_basic_stack cl_summary_sec_text" style="text-decoration:none !important">Assigned By Others</small>-->
                                            <small class="cl_summary_sec_text" style="text-decoration:none !important">Assigned By Others<sup data-toggle="tooltip1" title="Today | MTD"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></small>
                                                
                                        <!--</a>-->
                                    </div>
                                </div>
                                <div class="col d-none">
                                    <div class="cl_summary_sec">
                                        <!--<a href="javascript:void(0)" class="cl_summary_sec_number">-->
                                            <ul class="cl_summary_sec_fst_list">
                                                <li><a href="#" class="cl_summary_sec_number">345</a></li>
                                            </ul>
                                            <small class="cl_summary_sec_text">Basic Stack Lead</small>
                                            
                                            <hr class="my-2">
                                            
                                            <ul class="cl_summary_sec_sub_list">
                                                <li><a href="#">5</a> <span>Active</span></li>
                                                <li><a href="#">45</a> <span>Completed</span></li>
                                            </ul>
                                            
                                            <a href="#" class="all_basic_stack">View all Basic stack Lead</a>
                                        <!--</a>-->
                                    </div>
                                </div>
                                <div class="col d-none">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">
                                        <h4>Purchased 
                                            <small>Basic stack</small>
                                        </h4>
                                        
                                        <div class="hd_looks_sec_list pt-0">
                                            <!--<h5>Phot / Inch</h5>-->
                                            <ul>
                                                <li>Last 7 days <a href="<?= base_url();?>lead?lead_by=bs&bs_assign=0&dys=7" target="_blank" class="last_7_days"></a></li>
                                                <li>8 - 15 days <a href="<?= base_url();?>lead?lead_by=bs&bs_assign=0&dys=15" target="_blank" class="last_15_days"></a></li>
                                                <li>16 - 30 days <a href="<?= base_url();?>lead?lead_by=bs&bs_assign=0&dys=30" target="_blank" class="last_30_days"></a></li>
                                                <li>31 - 90 days <a href="<?= base_url();?>lead?lead_by=bs&bs_assign=0&dys=90" target="_blank" class="last_90_days"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">
                                        <!--<h4>Diet - 23</h4>-->
                                        <h4>Actions<sup data-toggle="tooltip1" title="Today | MTD"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <!--<h5>Phot / Inch</h5>-->
                                            <ul class="px-0">
                                                <li>Follow up <a href="<?= base_url('lead?lead_by=self_fu_mnth'); ?>" target="_blank" alt="month" class="fu_done_mtd"></a> <a href="<?= base_url('lead?lead_by=self_fu_tdy'); ?>" target="_blank" alt="today" class="fu_done_today"></a></li>
                                                <li>Consultation <a href="<?= base_url('lead?lead_by=self_cnsltn_mnth'); ?>" target="_blank" alt="month" class="consultation_done_mtd"></a> <a href="<?= base_url('lead?lead_by=self_cnsltn_tdy'); ?>" target="_blank" alt="today" class="consultation_done_today"></a></li>
                                                <li>Action Assigned <a href="<?= base_url('lead?lead_by='); ?>" target="_blank" alt="month" class="action_done_mtd"></a> <a href="<?= base_url('lead?lead_by='); ?>" target="_blank" alt="today" class="action_done_today"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <!--<div class="col">-->
                                    <!--begin:: Widgets/Stats2-1 -->
                                <!--    <div class="hd_looks_sec">-->
                                <!--        <h4>Status-->
                                <!--        </h4>-->
                                <!--        <div class="hd_looks_sec_list pt-0">-->
                                <!--            <ul class="px-0" id="lead_by_status">-->
                                <!--            </ul>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                    <!--end:: Widgets/Stats2-1 -->
                                <!--</div>-->
                                
                                 <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">
                                        <h4>Status<sup data-toggle="tooltip1" title="Today | All Time"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <!--<ul class="px-0" id="lead_by_status">-->
                                            <ul class="px-0">
                                                <li>Cold <a href="javascript:void(0)" target="_blank" alt="cold" class="cold"></a></li>
                                                <li>Hot <a href="javascript:void(0)" target="_blank" alt="hot" class="hot"></a></li>
                                                <!--<li>Spam <a href="javascript:void(0)" target="_blank" alt="spam" class="spam"></a></li>-->
                                                <li style="color:red;">To engage <a href="javascript:void(0)" target="_blank" alt="to_engage" class="to_engage"></a></li>
                                                <li>Warm <a href="javascript:void(0)" target="_blank" alt="warm" class="warm"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">
                                        <h4>Stage<sup data-toggle="tooltip1" title="Last 30 days Stage Wise leads(Leads | Sale done)"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <ul class="px-0">
                                                <li>Stage 1<sup data-toggle="tooltip1" title="0-2 kgs away from ideal body wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>  <a href="<?= base_url()?>lead?lead_by=1" target="_blank" alt="1" class="stage1" style="border-right: 0px solid;"></a></li>
                                                <li>Stage 2<sup data-toggle="tooltip1" title="2-7 kgs away from ideal body wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=2" target="_blank" alt="2" class="stage2" style="border-right: 0px solid;"></a></li>
                                                <li>Stage 3<sup data-toggle="tooltip1" title="7-15 kgs away from ideal body wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=3" target="_blank" alt="3" class="stage3" style="border-right: 0px solid;"></a></li>
                                                <li>Stage 4<sup data-toggle="tooltip1" title="15+ kgs away from ideal body wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=4" target="_blank" alt="4" class="stage4" style="border-right: 0px solid;"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">

                                        <h4>Phase<sup data-toggle="tooltip1" title="Last 30 days Phase Wise leads(Leads | Sale done)"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <ul class="px-0">
                                                <li>Phase 1<sup data-toggle="tooltip1" title="No real Engagement and does not show real trust or interest"><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=1_p" target="_blank" alt="1" class="phase1" style="border-right: 0px solid;"></a></li>
                                                <li>Phase 2<sup data-toggle="tooltip1" title="Just started building trust comfort , member  is enagaging on whats app seeing broadcasts"><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=2_p" target="_blank" alt="2" class="phase2" style="border-right: 0px solid;"></a></li>
                                                <li>Phase 3<sup data-toggle="tooltip1" title="Decent degree of trust and comfort with Brand program and Online/ engaging on whatsapp possibly active on social media --ripe for consultation"><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=3_p" target="_blank" alt="3" class="phase3" style="border-right: 0px solid;"></a></li>
                                                <li>Phase 4<sup data-toggle="tooltip1" title="High degree of trust and comfort with Brand program and Online--mostly, but not necessarily always , consultation is done "><i class="fa fa-question-circle" aria-hidden="true"></i></sup> <a href="<?= base_url()?>lead?lead_by=4_p" target="_blank" alt="4" class="phase4" style="border-right: 0px solid;"></a></li>
                                                <li>No Phase <a href="<?= base_url()?>lead?lead_by=no_phase" target="_blank" alt="No Phase" class="no_phase"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                            </div>
                		</div>
                	</div>
                	<!--End::Section-->
                	
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: TODAYS ACTIVITIES Done & set. -->

<!--begin::Overall & Unconverted Section-->
<div class="m-content pt-4 pb-0">                                           
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="half_time_journey">
            <div class="m-accordion__item-head unconverted collapsed px-3" role="tab"  data-id="unconverted" id="m_accordion_sales_journey_item_6_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_6_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0">
                		Total Unconverted<!--<sup data-toggle="tooltip1" title="Overall Unconverted Data"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>-->
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_6_body" role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_6_head" data-parent="#m_accordion_sales_journey">  
                <div class="m-accordion__item-content p-0 pt-3">
                	<!--Begin::Section-->
                	<div class="m-portlet">
                		<div class="m-portlet__body  m-portlet__body--no-padding">
                			<div class="row m-row--no-padding m-row--col-separator-xl">             
                                <div class="col">
                                    <div class="cl_summary_sec">
                                        <!--<a href="javascript:void(0)" class="cl_summary_sec_number">-->
                                            <ul class="cl_summary_sec_fst_list">
                                                <li><a href="<?= base_url('lead?lead_by=total_lead_completed_not_converted'); ?>" target="_blank" class="cl_summary_sec_number unconverted_lead" alt="month">209</a></li>
                                            </ul>
                                            <small class="cl_summary_sec_text">Leads</small>
                                            
                                            
                                    </div>
                                </div>
                                <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">
                                        <!--<h4>Diet - 23</h4>-->
                                        <h4>Consultation - <a href="<?= base_url('lead?lead_by=unconverted_consultation'); ?>" target="_blank" alt="month" class="unconverted_consultation">29</a></h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <!--<h5>Phot / Inch</h5>-->
                                            <ul class="px-0">
                                                <li>Hot <a href="<?= base_url('lead?lead_by=unconverted_hot'); ?>" target="_blank" alt="month" class="unconverted_hot">29</a></li>
                                                <li>Warm <a href="<?= base_url('lead?lead_by=unconverted_warm'); ?>" target="_blank" alt="month" class="unconverted_warm">46</a></li>
                                                <li>Cold <a href="<?= base_url('lead?lead_by=unconverted_cold'); ?>" target="_blank" alt="month" class="unconverted_cold">184</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <!--<div class="col">-->
                                    <!--begin:: Widgets/Stats2-1 -->
                                <!--    <div class="hd_looks_sec">-->
                                <!--        <h4>Status-->
                                <!--        </h4>-->
                                <!--        <div class="hd_looks_sec_list pt-0">-->
                                <!--            <ul class="px-0" id="lead_by_status">-->
                                <!--            </ul>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                    <!--end:: Widgets/Stats2-1 -->
                                <!--</div>-->
                                
                                 
                                <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">
                                        <h4>Stage
                                        </h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <ul class="px-0"> 
                                                <li>Stage 3<a href="<?= base_url()?>lead?lead_by=stage_3_not_converted" target="_blank" alt="3" class="unconverted_stage3">89</a></li>
                                                <li>Stage 4<a href="<?= base_url()?>lead?lead_by=stage_4_not_converted" target="_blank" alt="4" class="unconverted_stage4">109</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                                <div class="col">
                                    <!--begin:: Widgets/Stats2-1 -->
                                    <div class="hd_looks_sec">

                                        <h4>Phase
                                        </h4>
                                        <div class="hd_looks_sec_list pt-0">
                                            <ul class="px-0">
                                                <li>Phase 3 <a href="<?= base_url()?>lead?lead_by=phase_3_not_converted" target="_blank" alt="3" class="unconverted_phase3">87</a></li>
                                                <li>Phase 4 <a href="<?= base_url()?>lead?lead_by=phase_4_not_converted" target="_blank" alt="4" class="unconverted_phase4">94</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end:: Widgets/Stats2-1 -->
                                </div>
                            </div>
                		</div>
                	</div>
                	<!--End::Section-->
                	
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end::Overall & Unconverted Section-->

<!--begin::Section-->
<div class="m-content pt-4 pb-0">                                           
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="half_time_journey">
            <div class="m-accordion__item-head px-3" role="tab" id="m_accordion_sales_journey_item_4_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_4_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0">
                		Calender 
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse show" id="m_accordion_sales_journey_item_4_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_4_head" data-parent="#m_accordion_sales_journey"> 
                
                <div class="m-accordion__item-content p-0 pt-3">
                    <?= $this->load->view('calendar'); ?>
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end::Section-->

<!--begin::App Action-->
<div class="m-content pt-4 pb-0">                                           
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="half_time_journey">
            <div class="m-accordion__item-head collapsed px-3" role="tab" id="m_accordion_sales_journey_item_5_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_5_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0">
                		App Action
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_5_body" role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_5_head" data-parent="#m_accordion_sales_journey"> 
                <div class="m-accordion__item-content p-0 pt-3">
                    <!--start:: Active Client Journey -->
                    <div class="m-content pt-0 px-0">
            	   		<!--begin::Portlet-->
            			<div class="m-portlet" id="m_portlet">
            				<div class="m-portlet__body p-0">
            					<div class="new_assign_client_sec">
            						<a href="javascript:void(0)">45k</a>
            						<span>Total User</span>
            					</div>
            					<div class="new_assign_client_count_status">
            					    <div class="app_status_sec">
                					    <table class="table m-table m-table--head-separator-primary">
                    					  	<thead>
                    					    	<tr>
                    					      		<th>App action in last 30 Days</th>
                    					      		<th class="text-center">Count</th>
                    					    	</tr>
                    					  	</thead>
                    					  	<tbody>
                    					    	<tr>
                    						      	<th scope="rod Lew">App Visit</th>
                    						      	<td class="text-center"><a href="javascript:void(0)">0</a></td>
                    					    	</tr>
                    					    	<tr>
                    						      	<th scope="row">View Tip</th>
                    						      	<td class="text-center"><a href="javascript:void(0)">0</a></td>
                    					    	</tr>
                    					    	<tr>
                    						      	<th scope="row">Challenge / Event Participated</th>
                    						      	<td class="text-center"><a href="javascript:void(0)">0</a></td>
                    					    	</tr>
                    					    	<tr>
                    						      	<th scope="row">Like / Post / Comment</th>
                    						      	<td class="text-center"><a href="javascript:void(0)">0</a></td>
                    					    	</tr>
                    					    	<tr>
                    						      	<th scope="row">Blog / Recipe View</th>
                    						      	<td class="text-center"><a href="javascript:void(0)">0</a></td>
                    					    	</tr>
                    					  	</tbody>
                    					</table>
                					</div>
            					</div>
            				</div>
            			</div>	
            			<!--end::Portlet-->
                    </div>
                    <!--end:: Active Client Journey -->
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end::App Action-->

<!--begin::Incentive Section-->
<div class="m-content pt-4 pb-0">                                           
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="half_time_journey">
            <div class="m-accordion__item-head collapsed px-3" role="tab" id="m_accordion_sales_journey_item_6_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_6_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0">
                		Incentive System
                	</span>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_6_body" role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_6_head" data-parent="#m_accordion_sales_journey"> 
                <div class="m-accordion__item-content p-0 pt-3">
                    <!--start:: Active Client Journey -->
                    <div class="m-content pt-0 px-0">
                        <!--Begin::Section-->
                	<div class="m-portlet">
                		<div class="m-portlet__body  m-portlet__body--no-padding">
                			<div class="row m-row--no-padding m-row--col-separator-xl">		
                				<div class="col">
                					<div class="cl_summary_sec incentive_sec">
            							<small class="cl_summary_sec_text">Incentive</small>
            							<p>Rs.<span>840k</span></p>
            							<p>for Due(payout)</p>
                					</div>
                				</div>
                                <div class="col">
                					<div class="cl_summary_sec incentive_sec">
            							<small class="cl_summary_sec_text">Actual earnedk</small>
            							<p>Total Collection = Rs. 520k (Excluding Tax)</p>
            							<p>INCENTIVE Rs.<span>4k</span></p>
                					</div>
                				</div>
                				<div class="col">
                					<div class="cl_summary_sec incentive_sec">
                						<small class="cl_summary_sec_text">Due (Payout)</small>
                						<p>Rs.<span>4k</span></p>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                	<!--End::Section-->
                    </div>
                    <!--end:: Active Client Journey -->
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end::Incentive Section-->

<!--sales_manager_section-->
<script>
$(document).ready(function(){
   if($( window ).width() < 767){
       $(".aa").text("1st Review");
   }else{
       $(".aa").text("First Review: 1:30 PM");
   }
});
$( window ).resize(function() {
	if($( window ).width() < 767){
       $(".aa").text("1st Review");
   }else{
       $(".aa").text("First Review: 1:30 PM");
   }
});

$(document).ready(function(){
   if($( window ).width() < 767){
       $(".bb").text("1st Review");
   }else{
       $(".bb").text("Second Review : 4:30 PM");
   }
});
$( window ).resize(function() {
	if($( window ).width() < 767){
       $(".bb").text("2nd Review");
   }else{
       $(".bb").text("Second Review : 4:30 PM");
   }
});

$(document).ready(function(){
   if($( window ).width() < 767){
       $(".cc").text("day end");
   }else{
       $(".cc").text("day end Review");
   }
});
$( window ).resize(function() {
	if($( window ).width() < 767){
       $(".cc").text("day end");
   }else{
       $(".cc").text("day end Review");
   }
});
</script>
<script>
$(document).ready(function(){
   if($( window ).width() < 767){
       $(".aa").text("1st Review");
   }else{
       $(".aa").text("First Review: 1:30 PM");
   }
});
$( window ).resize(function() {
	if($( window ).width() < 767){
       $(".aa").text("1st Review");
   }else{
       $(".aa").text("First Review: 1:30 PM");
   }
});

$(document).ready(function(){
   if($( window ).width() < 767){
       $(".bb").text("1st Review");
   }else{
       $(".bb").text("Second Review : 4:30 PM");
   }
});
$( window ).resize(function() {
	if($( window ).width() < 767){
       $(".bb").text("2nd Review");
   }else{
       $(".bb").text("Second Review : 4:30 PM");
   }
});

$(document).ready(function(){
   if($( window ).width() < 767){
       $(".cc").text("day end");
   }else{
       $(".cc").text("day end Review");
   }
});
$( window ).resize(function() {
	if($( window ).width() < 767){
       $(".cc").text("day end");
   }else{
       $(".cc").text("day end Review");
   }
});
</script>