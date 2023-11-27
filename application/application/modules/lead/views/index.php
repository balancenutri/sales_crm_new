
<!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->
<!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
<style type="text/css">


.lightbox {
  /* Default to hidden */
  display: none;

  /* Overlay entire screen */
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  
  /* A bit of padding around image */
  padding: 1em;

  /* Translucent background */
  background: rgba(0, 0, 0, 0.8);
}

/* Unhide the lightbox when it's the target */
.lightbox:target {
  display: block;
}

.lightbox span {
  /* Full width and height */
  display: block;
  width: 100%;
  height: 100%;

  /* Size and position background image */
  background-position: center;
  background-repeat: no-repeat;
  background-size: contain;
}



.refral_color {
    background-color: #e0e1e4 !important;
}    
.NEW{
    border-radius: 15px;
    background-color: #5867dd!important;
    color:white;
    padding-left: 10px;
    padding-right: 10px;
}
.OMR{
    border-radius: 15px;
    background-color: #ffb822!important;
    color:white;
    padding-left: 10px;
    padding-right: 10px;
}
.OCL{
    border-radius: 15px;
    background-color: #ffb822!important;
    color:white;
    padding-left: 10px;
    padding-right: 10px;
}
.OLR{
    border-radius: 15px;
    background-color: #f4516c!important;
    color:white;
    padding-left: 10px;
    padding-right: 10px;
}
.Active{
    border-radius: 15px;
    background-color: #34bfa3!important;
    color:white;
    padding-left: 10px;
    padding-right: 10px;
}

.show-read-more .more-text{
        display: none;
    }

/* steps progress bar css*/
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


/* steps progress bar css end*/



</style>
    
<div class="lead_show_desk d-none">
    <!--start:: Active Client Journey -->
    <div class="m-content">
        <?php if($_SESSION['balance_session']['user_type'] =='sales'){ ?>
    <ol class="progtrckr pt-0" data-progtrckr-steps="5">
    <li class="progtrckr-todo" style="font-weight: 400" id="first">First Review : 1:30 PM</li>
    <li class="progtrckr-todo" style="font-weight: 400" id="second">Second Review : 4:30 PM</li>
    <li class="progtrckr-todo" style="font-weight: 400" id="end">Day End Review : 7:00 PM</li>
    </ol>
    <?php } ?>


    	<!--<h3 class="md_title pt-0 text-center active_c_title"><?= $title; ?></h3>-->
    	
    	<!--<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary add_lead_popup m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill">
    		<i class="la la-plus"></i>
    	</a>-->
    	
    	<div class="m-portlet" id="m_portlet">
    		<div class="m-portlet__body py-3">
    		    <div class="search_section">
    		        <ul class="nav nav-tabs  m-tabs-line position-relative" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_dt_range" role="tab">Search</a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_check_bulk" role="tab">Bulk Action</a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" href="https://www.balancenutrition.in/sales_crm/lead" role="tab">All Leads</a>
                        </li>
                        <?php

                            if($_SERVER['QUERY_STRING']!="" && $_SERVER['QUERY_STRING']!="completed=1"){
                        ?>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" href="<?php echo current_url().'?'.$_SERVER['QUERY_STRING'].'&completed=1'; ?>" role="tab">Completed leads</a>
                                </li>

                        <?php
                            }else{
                        ?>
                                <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" href="<?php echo current_url().'?completed=1' ?>" role="tab">Completed leads</a>
                                </li>
                        <?php
                            }
                        ?>
                        
                        
                        <li class="nav-item m-tabs__item stage_section" style="margin-top: -15px;">
                            <a href="javascript:void(0)" class="m-nav__link">
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--stage_1 m-badge--wide m-badge--rounded"></span>
                                    <span class="m-nav__link-text">- Stage 1 </span>
                                </span>
                                <sup class="" data-toggle="tooltip1" title="0-2 kgs from ideal wt" ><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
                                <span class="tooltip"></span>
                            </a>
                            <a href="javascript:void(0)" class="m-nav__link">
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--stage_2 m-badge--wide m-badge--rounded"></span>
                                    <span class="m-nav__link-text">- Stage 2 </span>
                                    <sup data-toggle="tooltip1" title="2-7.9 kgs moderatly over wt 2-7 kgs"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="m-nav__link">
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--stage_3 m-badge--wide m-badge--rounded"></span>
                                    <span class="m-nav__link-text">- Stage 3 </span>
                                    <sup data-toggle="tooltip1" title="8-14.9 kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="m-nav__link">
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--stage_4 m-badge--wide m-badge--rounded"></span>
                                    <span class="m-nav__link-text">- Stage 4 </span>
                                    <sup data-toggle="tooltip1" title=" 15 & above kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="m-nav__link">
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--stage_4 m-badge--wide m-badge--rounded" style="background-color:#e0e1e4;"></span>
                                    <span class="m-nav__link-text">- Ref </span>
                                    <sup data-toggle="tooltip1" title="Referal Leads"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>
                                </span>
                            </a>
                        <div class="row p-0 text-center" style="margin-top: 7px;">
                            <span class="col-2 p-0">Lead Type : </span><span class="col-2 p-0 bg-primary text-white" style="margin-right:20px; border-radius: 15px;" title="Lead coming firts time in the system">NEW</span><span class="col-2 p-0 bg-warning text-white" style="margin-right:20px;border-radius: 15px;" title="Comes Again After Complete The program">OCL</span><span class="col-2 p-0 bg-danger text-white" style="margin-right:20px;border-radius: 15px;" title="(Old lead returning) An old lead which again comes as a lead in the month concerned">OLR</span>
                        <!--<span class="col-2 p-0 bg-success text-white" style="margin-right:20px;border-radius: 15px;" title="Active Clients">Active</span>-->
                        </div>
                            
                        </li>
                    </ul>                        
                    <div class="tab-content">
                        <div class="tab-pane" id="search_dt_range" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Date</label>
                        					<div class='input-group pull-right m_daterangepicker_6'>
                        						<input type='text' class="form-control m-input date_filter" id="date_filter" readonly  placeholder="Select date range"/>
                        						<div class="input-group-append date_filter">
                        							<span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                        						</div>
                        					</div>
                            			</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Age</label>
                        					<div class="m-ion-range-slider">
                        						<input type="hidden" id="age_range"/>
                        					</div>
                        					<!--<div class="m-form__help">
                        						Please Select Age Range
                        					</div>-->
                            			</div>
                                    </div>
                                </div>
                    			<div class="m-form__actions m-form__actions pt-3 pb-2">
                    				<div class="row">
                    					<div class="col-lg-12 ml-lg-auto">
                    						<button type="button" id="range_filter" class="btn btn-brand btn-sm">Search</button>
                    						<!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                    						<button type="button" id="export_list" class="btn btn-sm btn-info" disabled>Export</button>
                    					</div>
                    				</div>
                    			</div>
                            </form>
                        </div>
                        <div class="tab-pane" id="search_check_bulk" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right" id="bulk_action_lead_form">
                                <input type="hidden" name="lead_data" id="bulk_lead_data" value="" />
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Assign To</label>
                            				<select class="form-control m-input" name="bulk_assign_action">
                        						<option value="">Select</option>
                        						<?php
                        						
                        						    foreach ($assign_to_list as $key => $value) {
                        						      //  echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>';
                        						        /*if($this->session->balance_session['first_name'] == $value['crm_user']){
                        						            echo '<option value='.$value['admin_id'].' selected>'.$value['crm_user'].'</option>';
                        						        }else{
                        						        
                        						        }*/
                                                    }
                                                ?>
                        					</select>
                        					<span class="error text-danger" style="display:none">Invalid  Select Option</span>
                            			</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Lead Status</label>
                            				<select name="bulk_lead_status" class="form-control m-input statusClass">
                                                <option value="">Select Lead Status</option>
                                                <?php for ($k=0; $k <count($lead_status) ; $k++) { ?>
                                                  <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="error_1 text-danger" style="display:none">Invalid Select Option</span>
                            			</div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">For Follow Up</label>
                            				<select class="form-control m-input" name="follow_up">
                        						<option value="">Select</option>
                        						<?php
                        						
                        						    foreach ($assign_to_list as $key => $value) {
                        						        echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>';
                        						        /*if($this->session->balance_session['first_name'] == $value['crm_user']){
                        						            echo '<option value='.$value['admin_id'].' selected>'.$value['crm_user'].'</option>';
                        						        }else{
                        						        
                        						        }*/
                                                    } 
                                                ?>
                        					</select>
                            			</div>
                                    </div>
                                </div>
                    			<div class="m-form__actions m-form__actions pt-4 pb-2">
                    				<div class="row">
                    					<div class="col-lg-12 ml-lg-auto">
                    						<button type="button" class="btn btn-brand btn-sm" id="bulk_action_lead">Update</button>
                    						<!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                    					</div>
                    				</div>
                    			</div>
                            </form>
                        </div>
                    </div>
    		    </div>
    		    <div class="m-section position-relative">
    		        <button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_show"><i class="fa fa-filter"></i></button>
    		        <!--<button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_hide" style="display:none"><i class="fa fa-filter"></i></button>-->
        		    <div class="m-section__content position-relative">
        		        <?php
        		            if(isset($_GET['lead_by'])){

                                switch($_GET['lead_by']){
                                    case 'lds_avlble_tdy':       $lead_label = "Leads Available Today";
                                                                 break;
                                    case 'lds_avlble_mnth':      $lead_label = "Leads Available Month";
                                                                 break;
                                    case 'frsh_lds_avlble_mnth': $lead_label = "Fresh Leads";
                                                                 break;
                                    case 'old_lds_avlble_mnth':  $lead_label = "Old Leads";
                                                                 break;
                                    case 'assgn_self_tdy':       $lead_label = "Leads Assigned Today";
                                                                 break;
                                    case 'assgn_self_mnth':      $lead_label = "Leads Assigned In This Month";
                                                                 break;
                                    case 'assgn_by_othrs_tdy':   $lead_label = "Leads Assigned To You Today";
                                                                 break;
                                    case 'assgn_by_othrs_mnth':  $lead_label = "Leads Assigned To You In This Month";
                                                                 break;
                                    case 'all':  $lead_label = "All Leads";
                                                                 break;
                                    case 'cold':  $lead_label = "Cold Leads";
                                                                 break;
                                    case 'completed':  $lead_label = "Completed Leads";
                                                                 break;
                                    case 'hot':  $lead_label = "Hot Leads";
                                                                 break;
                                    case 'spam':  $lead_label = "Spam Leads";
                                                                 break;
                                    case 'to_engage':  $lead_label = "To Engage Leads ";
                                                                 break;
                                    case 'warm':  $lead_label = "Warm Leads";
                                                                 break;
                                    case '1':  $lead_label = "Stage 1 Leads";
                                                                 break;
                                    case '2':  $lead_label = "Stage 2 Leads";
                                                                 break;
                                    case '3':  $lead_label = "Stage 3 Leads";
                                                                 break;
                                    case '4':  $lead_label = "Stage 4 Leads";
                                                                 break;
                                    case 'total_lead':  $lead_label = "Total Leads";
                                                                 break;
                                    case 'total_lead_completed':  $lead_label = "Total Leads Completed";
                                                                 break;
                                    case 'total_lead_completed_not_converted':  $lead_label = "Total Leads Not Converted";
                                                                 break;
                                    case 'total_lead_completed_assign_by_others':  $lead_label = "Converted Leads Assign By Others";
                                                                 break;
                                    case 'total_lead_remaining_assign_other':  $lead_label = "Unconverted Leads Assign By Others";
                                                                 break;
                                    case '1_p':  $lead_label = "Phase 1 Leads";
                                                                 break;
                                    case '2_p':  $lead_label = "Phase 2 Leads";
                                                                 break;
                                    case '3_p':  $lead_label = "Phase 3 Leads";
                                                                 break;
                                    case '4_p':  $lead_label = "Phase 4 Leads";
                                                                 break;
                                    case 'no_phase':  $lead_label = "NO Phase Leads";
                                                                 break;
                                    default: $lead_label = "Current Month Leads"; break;
                                }
                            }else{
                                $lead_label = "Current Month Leads";
                            }
        		        ?>
        		        
        		        <h3 class="lead_heading"><?= $lead_label; ?></h3>
        		        
                        <?php
                           //if(!isset($_GET['lead_by']) || trim($_GET['lead_by']) == '' || $_GET['lead_by'] == NULL){
    	                        if(!empty($_GET["lead_by"]) && $_GET["lead_by"] == "bs"){
    	                            $showTdText = "Program Name & Duration";
    	                        }else{
    	                            $showTdText = "Health Issues & BMI";
    	                        }
                           //}
                        ?>
        		        <!--<div class="m-form__group form-group export_report_sec"><i class="fas fa-level-up-alt"  style="transform: matrix(-1, 0, 0, -1, 0, 0);float: left;padding: 0 1rem 0 5px;margin: 10px 0 0;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`induction_call_data`, `alltime`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div>-->
        		        <table class="table table-bordered m-table m-table--border-brand table-responsive" id="lead_details_data">
        		            <thead>
        		                <tr>
        		                    <th style="width: 4%"><label class="m-checkbox export_checkbox"> <input type="checkbox" onclick="select_all_check()" class="select_all"> <span></span> </label></th>
        		                    <?php if($_GET['lead_by']=='avlble_omr_mnth'){
        		                        echo '<th style="width: 16%">Name & Prog. Details</th>';
        		                        echo '<th style="width: 16%">HS & Ass. Details</th>';
        		                        echo '<th style="width: 16%">Source, Status & Stage</th>';
        		                        echo '<th style="width: 16%">Assign To</th>';
            		                    echo '<th style="width: 16%">Phase</th>';
            		                    echo '<th style="width: 16%">Suggested Program</th>';
                                        echo '<th style="width: 16%">Key and fu Notes</th>';
        		                    }else{
        		                        echo '<th style="width: 16%">Name & Details</th>';
        		                        echo '<th style="width: 16%">'.$showTdText.'</th>';
        		                        echo '<th style="width: 16%">Source, Type & Status</th>';
        		                        echo '<th style="width: 16%">Assign To</th>';
            		                    echo '<th style="width: 16%">Phase</th>';
            		                    echo '<th style="width: 16%">Suggested Program</th>';
                                        echo '<th style="width: 16%">Key and fu Notes</th>';
        		                    }?>
        		                    <th class="d-none">Assign</th>
        		                    <th class="d-none">Health Category</th>
        		                    <th class="d-none">Source</th>
        		                    <th class="d-none">Gender</th>
        		                    <th class="d-none">Lead Type</th>
        		                    <th class="d-none">Phone</th>
        		                    <th class="d-none">Stage</th>
        		                    <th class="d-none">Status</th>

                                    <th class="d-none">fu_note</th>
                                    <?php if($this->session->balance_session['user_type']=='mentor'){?>
        		                    <th class="d-none">Lead Date</th>
        		                    <?php }else {?>
        		                    <th class="d-none">phase</th>
        		                    <?php } ?>
        		                    <th class="d-none">Suggested Program</th>
                                    <!-- <th class="d-none">fu_other_note</th> -->
                                    <th class="d-none">key_insight</th>
        	                    </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
    			<div id=""></div>
    		</div>
    	</div>
    </div>
    <!--end:: Active Client Journey -->
</div>

<div class="lead_show_mob d-none">
    <!--start:: Active Client Journey -->
    <div class="m-content">
    	<!--<h3 class="md_title pt-0 text-center active_c_title"><?= $title; ?></h3>-->
    	
    	<!--<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary add_lead_popup m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill">
    		<i class="la la-plus"></i>
    	</a>-->
    	
    	<div class="m-portlet" id="m_portlet">
    		<div class="m-portlet__body py-3 lead_portlet">
    		    <div class="search_section">
    		        <ul class="nav nav-tabs  m-tabs-line position-relative" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_dt_range_m" role="tab">Search</a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_check_bulk_m" role="tab">Bulk Action</a>
                        </li>
                        
                        <li class="nav-item m-tabs__item stage_section">
                            <a href="javascript:void(0)" class="m-nav__link">
                                <?php
                                    //Added By Navin Start
                                    $whrClause = "";
                                    $stage = intval(@$_GET['stage']);
                                    switch($stage){      
                                        case 1:      
                                            $whrClause = '
                                                    <span class="m-nav__link-badge">
                                                        <span class="m-badge m-badge--stage_1 m-badge--wide m-badge--rounded"></span>
                                                        <span class="m-nav__link-text">- Stage 1 </span>
                                                    </span>
                                                        ';     
                                            break;      
                                        case 2:      
                                            $whrClause = '
                                                    <span class="m-nav__link-badge">
                                                        <span class="m-badge m-badge--stage_2 m-badge--wide m-badge--rounded"></span>
                                                        <span class="m-nav__link-text">- Stage 2 </span>
                                                    </span>
                                                        ';       
                                            break;      
                                        case 3:      
                                            $whrClause = '
                                                    <span class="m-nav__link-badge">
                                                        <span class="m-badge m-badge--stage_3 m-badge--wide m-badge--rounded"></span>
                                                        <span class="m-nav__link-text">- Stage 3 </span>
                                                    </span>
                                                        ';    
                                            break; 
                                        case 4:      
                                            $whrClause = '
                                                    <span class="m-nav__link-badge">
                                                        <span class="m-badge m-badge--stage_4 m-badge--wide m-badge--rounded"></span>
                                                        <span class="m-nav__link-text">- Stage 4 </span>
                                                    </span>
                                                        ';    
                                            break; 
                                        default:      
                                            $whrClause = "";     
                                    }//switch($stage_count){
                                    echo $whrClause;
                                    //Added By Navin End
                                ?>
                            </a>
                            
                        </li>
                    </ul>                        
                    <div class="tab-content">
                        <div class="tab-pane" id="search_dt_range_m" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Date</label>
                        					<div class='input-group pull-right m_daterangepicker_6'>
                        						<input type='text' class="form-control m-input date_filter" id="date_filter_m" readonly  placeholder="Select date range"/>
                        						<div class="input-group-append date_filter">
                        							<span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                        						</div>
                        					</div>
                            			</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Age</label>
                        					<div class="m-ion-range-slider">
                        						<input type="hidden" id="age_range_m"/>
                        					</div>
                        					<!--<div class="m-form__help">
                        						Please Select Age Range
                        					</div>-->
                            			</div>
                                    </div>
                                </div>
                    			<div class="m-form__actions m-form__actions pt-3 pb-2">
                    				<div class="row">
                    					<div class="col-lg-12 ml-lg-auto">
                    						<button type="button" id="range_filter_m" class="btn btn-brand btn-sm">Search</button>
                    						<!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                    						<button type="button" id="export_list_m" class="btn btn-sm btn-info" disabled>Export</button>
                    					</div>
                    				</div>
                    			</div>
                            </form>
                        </div>
                        <div class="tab-pane" id="search_check_bulk_m" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right" id="bulk_action_lead_form_m">
                                <input type="hidden" name="lead_data" id="bulk_lead_data_m" value="" />
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Assign To</label>
                            				<select class="form-control m-input" name="bulk_assign_action_m">
                        						<option value="">Select</option>
                        						<?php
                        						
                        						    foreach ($assign_to_list as $key => $value) {
                        						        echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>';
                        						        /*if($this->session->balance_session['first_name'] == $value['crm_user']){
                        						            echo '<option value='.$value['admin_id'].' selected>'.$value['crm_user'].'</option>';
                        						        }else{
                        						        
                        						        }*/
                                                    }
                                                ?>
                        					</select>
                        					<span class="error text-danger" style="display:none">Invalid  Select Option</span>
                            			</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">Lead Status</label>
                            				<select name="bulk_lead_status_m" class="form-control m-input statusClass">
                                                <option value="">Select Lead Status</option>
                                                <?php for ($k=0; $k <count($lead_status) ; $k++) { ?>
                                                  <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="error_1 text-danger" style="display:none">Invalid Select Option</span>
                            			</div>
                                    </div>
                                    <div class="col-lg-4 d-none">
                                        <div class="form-group m-form__group">
                            				<label class="col-form-label">For Follow Up</label>
                            				<select class="form-control m-input" name="follow_up">
                        						<option value="">Select</option>
                        						<?php
                        						
                        						    foreach ($assign_to_list as $key => $value) {
                        						        echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>';
                        						        /*if($this->session->balance_session['first_name'] == $value['crm_user']){
                        						            echo '<option value='.$value['admin_id'].' selected>'.$value['crm_user'].'</option>';
                        						        }else{
                        						        
                        						        }*/
                                                    }
                                                ?>
                        					</select>
                            			</div>
                                    </div>
                                </div>
                    			<div class="m-form__actions m-form__actions pt-4 pb-2">
                    				<div class="row">
                    					<div class="col-lg-12 ml-lg-auto">
                    						<button type="button" class="btn btn-brand btn-sm" id="bulk_action_lead_m">Update</button>
                    						<!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                    					</div>
                    				</div>
                    			</div>
                            </form>
                        </div>
                    </div>
    		    </div>
    		    <div class="m-section position-relative lead_m_sec">
    		        <button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_show_m"><i class="fa fa-filter"></i></button>
    		        <!--<button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_hide" style="display:none"><i class="fa fa-filter"></i></button>-->
        		    <div class="m-section__content position-relative">
        		        <?php
        		            if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
                                switch($get_parameters['lead_by']){
                                    case 'lds_avlble_tdy':       $lead_label = "Leads Available Today";
                                                                 break;
                                    case 'lds_avlble_mnth':      $lead_label = "Leads Available Month";
                                                                 break;
                                    case 'frsh_lds_avlble_mnth': $lead_label = "Fresh Leads";
                                                                 break;
                                    case 'old_lds_avlble_mnth':  $lead_label = "Old Leads";
                                                                 break;
                                    case 'assgn_self_tdy':       $lead_label = "Leads Assigned Today";
                                                                 break;
                                    case 'assgn_self_mnth':      $lead_label = "Leads Assigned In This Month";
                                                                 break;
                                    case 'assgn_by_othrs_tdy':   $lead_label = "Leads Assigned To You Today";
                                                                 break;
                                    case 'assgn_by_othrs_mnth':  $lead_label = "Leads Assigned To You In This Month";
                                                                 break;
                                    default: $lead_label = "All Leads"; break;
                                }
                            }else{
                                $lead_label = "All Leads";
                            }
        		        ?>
        		        
        		        <h3 class="lead_heading"><?= $lead_label; ?></h3>
        		        
                        <?php
                           //if(!isset($_GET['lead_by']) || trim($_GET['lead_by']) == '' || $_GET['lead_by'] == NULL){
    	                        if(!empty($_GET["lead_by"]) && $_GET["lead_by"] == "bs"){
    	                            $showTdText = "Program Name & Duration";
    	                        }else{
    	                            $showTdText = "Health Issues & BMI";
    	                        }
                           //}
                        ?>
        		        <!--<div class="m-form__group form-group export_report_sec"><i class="fas fa-level-up-alt"  style="transform: matrix(-1, 0, 0, -1, 0, 0);float: left;padding: 0 1rem 0 5px;margin: 10px 0 0;"></i> <div class="m-checkbox-list"> <label class="m-checkbox float-left mr-3 mt-1 mb-0"> <input type="checkbox" onclick="select_all_check()" class="select_all"> Check All <span></span> </label> <button onClick="export_list(`induction_call_data`, `alltime`)" class="btn btn-sm px-2 py-1 btn-info">Export</button> </div></div>-->
        		        <div class="check_form_box"><label class="m-checkbox export_checkbox"> <input type="checkbox" onclick="select_all_check()" class="select_all"> <span></span> </label></div>
        		        
        		        <table class="table table-bordered m-table m-table--border-brand table-responsive" id="lead_details_data_m">
        		            <thead>
        		                <tr>
        		                    <th>#</th>
        		                    <th class="d-none">Assign To</th>
        		                    <th class="d-none">Health Category</th>
        		                    <th class="d-none">Source</th>
        		                    <th class="d-none">Gender</th>
        		                    <th class="d-none">Lead Type</th>
        		                    <th class="d-none">Phone</th>
        		                    <th class="d-none">Stage</th>
        		                    <th class="d-none">Status</th>

                                    <th class="d-none">fu_note</th>
                                    <th class="d-none">fu_other_note</th>
                                    <th class="d-none">phase test2</th>
                                    <th class="d-none">key_insight</th>
        	                    </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
    			<div id=""></div>
    		</div>
    	</div>
    </div>
    <!--end:: Active Client Journey -->
</div>
<input type="hidden" id="program_name" data-prog="" value="">
<input type="hidden" id="program_days" value="3">
<input type="hidden" id="lead_id" value="">

<script>
// $(window).resize(function() {
    if($(window).width() > 675){
        $('.lead_show_desk').removeClass('d-none');
        $('.lead_show_mob').addClass('d-none');
        $(document).ready(function(){
            
           $("#search_filter_collapse_show").on('click',function(){
              $(this).toggleClass("search_filter_collapse_hide");
              $(".dtsp-panesContainer").slideToggle();
            //   $("#search_filter_collapse_hide").show();
            
           });
           
           /*$("#search_filter_collapse_hide").on('click',function(){
              $(".dtsp-panesContainer").hide();
              $("#search_filter_collapse_show").show();
              $(this).hide();
           });*/
        });
        
        function lead_details_table(){
            
            var urlParams;
            (window.onpopstate = function () {
                var match,
                    pl     = /\+/g,  // Regex for replacing addition symbol with a space
                    search = /([^&=]+)=?([^&]*)/g,
                    decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
                    query  = window.location.search.substring(1);
            
                urlParams = {};
                while (match = search.exec(query))
                   urlParams[decode(match[1])] = decode(match[2]);
            })();
            
            
            // $(document).ready(function(){
                var base_url = "<?php echo base_url()?>";
                var user_type ="<?php echo $_SESSION['balance_session']['user_type'];?>";
                // alert(user_type);
                var get_parameters = window.location.search;
                console.log(get_parameters);
                $('#lead_details_data').DataTable({
                    "ajax": {
                        "type" : "GET",
                        "processing": true,
                        "serverSide": true,
                        "url" : "<?php echo base_url()?>lead/get_lead_details_data"+get_parameters,
                       // "data" : {get_parameters:get_parameters.replace("?", "")},
                        "dataSrc": "lead_details_data",
                        // cache: false,
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    language: {
                        search : "",
                        searchPlaceholder: "Search By Keyword"
                    },
                    "columns": [

                        { "data": null,  "render": function ( data, type, full, meta ) {
            return '<input type="checkbox" class="export_check" value="'+data.id+'" data-user_phone="'+data.phone+'"  data-user_email="'+data.email+'">';}},
                        { "data": null },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                var wtDiff = '';
                                if(data.wt_diff == null || data.wt_diff == ''){
                                    wtDiff = "NA";
                                }else{
                                    wtDiff = data.wt_diff+'kg';
                                }
                                if(data.referral_flag==1){
                                    if(data.omr_mentor=='NA'){
                                        var mentor_name_display = data.assign_to;
                                    }else{
                                        var mentor_name_display = data.assign_to;
                                    }
                                    
                                }else{
                                    var mentor_name_display = data.mentor;
                                }
                                if(mentor_name_display !='NA'){
                                    mentor_name_display = '<b>Name of Mentor :</b> '+mentor_name_display;
                                }else{
                                    mentor_name_display =" ";
                                }
                                
                                return '<b>Program Name:</b> '+data.program_name+'<br><b>Pro. Dur. Days:</b> '+data.program_duration_days+' day<br><b>Wt. Diff.:</b> '+wtDiff+'<br>'+mentor_name_display+'<br>';
                            }else{
                                var user_status = '';
                                if(data.referral_flag==1){
                                    if(data.omr_mentor=='NA'){
                                        var mentor_name_display = data.assign_to;
                                    }else{
                                        var mentor_name_display = data.assign_to;
                                    }
                                    
                                }else{
                                    var mentor_name_display = data.omr_mentor;
                                    var user_status = data.user_status;
                                }
                                
                                var health_category ="";
                                var health_issues ="";
                                var weight ="";
                                var height ="";
                                var body_mass_index="";
                                var ideal_weight ="";
                                var sleep ="";
                                var take_healthscore_btn ="";
                               

                                if(data.health_category != null && data.health_category != 'NA' && data.health_category != '' ){
                                    health_category =" <b style=\"color:green;\">HS SnapShot</b><br><b>Taken:</b> "+data.lead_days_ago+" Days ago <br><b>Health Category:</b> "+data.health_category;
                                }
                                if(data.health_issues != null && data.health_issues != 'NA' && data.health_issues != '' ){
                                    health_issues ="<br><b>Medi. Issues:</b> "+data.health_issues;
                                }
                                if(data.weight != null && data.weight != 'NA' && data.weight != '' ){
                                    weight ="<br><b>Curr. Wt.:</b> "+data.weight;
                                }
                                if(data.height != null && data.height != 'NA' && data.height != '' ){
                                    height ="<br><b>Height:</b> "+data.height;
                                }
                                if(data.body_mass_index != null && data.body_mass_index != 'NA' && data.body_mass_index != '' ){
                                    body_mass_index ="<br><b>BMI:</b> "+data.body_mass_index;
                                }
                                if(data.ideal_weight != null && data.ideal_weight != 'NA' && data.ideal_weight != '' ){
                                    ideal_weight ="<br><b>Ideal Wt.:</b>"+data.ideal_weight;
                                }
// $('.read_more'+data.id).css('display','none');

// $('.hidden_show'+data.id).click(function(){
//  $('.read_more'+data.id).toggle();
//  if($('#text_name'+data.id).html()=='Less -'){
// $('#text_name'+data.id).html('+ Read More');
//  }else{
//  $('#text_name'+data.id).html('Less -');
// }
// });




if(data.count > 0){

$('.read_more'+data.id).hide();

$('#lead_details_data tbody').on('click', '.hidden_show'+data.id, function () {

 if($('#text_name'+data.id).html()=='Less -'){
    $('.read_more'+data.id).hide();
 console.log('2');   
$('#text_name'+data.id).html('Read More +');
 return false;
 }else{
    console.log('3');
     $('.read_more'+data.id).show();
 $('#text_name'+data.id).html('Less -');
 return false;
}
});

}

if(data.count == 0){

$('.read_more'+data.id).hide();

$('#lead_details_data tbody tr td').on('click', '.hidden_show'+data.id, function () {

 if($('#text_name'+data.id).html()=='Less -'){
    $('.read_more'+data.id).hide();
 console.log('2');   
$('#text_name'+data.id).html('Read More +');
 return false;
 }else{
    console.log('3');
     $('.read_more'+data.id).show();
 $('#text_name'+data.id).html('Less -');
 return false;
}
});

}

$('#lead_details_data_paginate').on('mouseover', function () {
     $('#text_name'+data.id).html('Read More +');
 $('.read_more'+data.id).hide();
});




      sleep ="<a href='javascript:void(0)' class='btn btn-success hidden_show"+data.id+"'><span id='text_name"+data.id+"'>Read More +</span></a><br><br><div class='read_more"+data.id+"'><b>Sleep : </b>"+data.sleep+"<br><b>Body&nbsp;Type : </b>"+data.body_type+"<br><b>Daily&nbsp;Activity : </b>"+data.activity+"<br><b>Smoking : </b>"+data.smoke+"<br><b>Periods  : </b>"+data.periods+"<br><b>Alcohol : </b>"+data.alcohol+"<br><b>Water&nbsp;Per&nbsp;Day : </b>"+data.water+"<br><b>Vegetables&nbsp;Per&nbsp;Day : </b>"+data.fruits+"</div>";




       //      sleep ="<a href='javascript:void(0)' class='btn btn-success hidden_show"+data.id+"'><span id='text_name"+data.id+"'>Read More +</span></a><br><br><div class='read_more"+data.id+"'><b>Sleep : </b>"+data.sleep+"<br><b>Body&nbsp;Type : </b>"+data.body_type+"<br><b>Daily&nbsp;Activity : </b>"+data.activity+"<br><b>Smoking : </b>"+data.smoke+"<br><b>Periods  : </b>"+data.periods+"<br><b>Alcohol : </b>"+data.alcohol+"<br><b>Water&nbsp;Per&nbsp;Day : </b>"+data.water+"<br><b>Vegetables&nbsp;Per&nbsp;Day : </b>"+data.fruits+"</div>";
                       

                                if(health_category =="" && health_issues =="" && weight =="" && height =="" && body_mass_index =="" && ideal_weight ==""){
                                    // take_healthscore_btn ="<span style='font-size:11px;padding-left: 10px;padding-right: 10px;border-radius: 10px;' class='text-white bg-success'><a href='https://api.whatsapp.com/send?text=Please%20Take%20Health%20Score&phone=+91'"+data.phone+"'>Take HS</a></span>";
                                  var wp =(data.phone);
                                   var wp_phone="";
                                var whats_phone="";
                                    if(wp!='' && wp!=null){
                                      if(wp.length >10 && wp.includes("91 ") || wp.includes("+91") ){
                                         if(wp.includes("-")){
                                         wp_phone = wp.split("-");
                                         whats_phone = "91"+wp_phone[1];
                                         
                                         }else if(wp.includes(" ")){
                                         wp_phone = wp.split(" ");
                                         whats_phone = "91"+wp_phone[1];
                                         
                                         }else{
                                            //   whats_phone =data.phone.replace('+','').replace('-','');
                                             whats_phone =data.phone;
                                             
                                         }
                                         
                                    }else{
                                        // whats_phone =data.phone.replace('+','').replace('-','');
                                         whats_phone =data.phone;
                                    }  
                                    }else{
                                        // whats_phone =data.phone.replace('+','').replace('-','');
                                         whats_phone =data.phone;
                                    }
                                    
                                    take_healthscore_btn ="<span class='btn btn-success text-white bg-success'><a href='https://wa.me/"+whats_phone+"/?text=Sending you a small test. It will tell us your ideal body weight, BMI %26 obesity category. You will get a detailed copy of the report on your email ID. I%27ll get one too. Let%27s see where we need to focus health-wise :)   Click here : https://www.balancenutrition.in/health-score' class='text-white' title='Ask For Health Score ! On Whats App' target='_blank'><i class='fa fa-whatsapp'></i>Ask HS</a></span>";
                                }
                                if(mentor_name_display !='NA'){
                                    mentor_name_display = '<b>Name of Mentor :</b> '+mentor_name_display;
                                }else{
                                    mentor_name_display =" ";
                                }
                                if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                    if(data.user_status !=''){
                                        ud = data.user_status
                                        var ud = ud.split('||');
                                        var wallet = ud[0];
                                        var user_status = ud[1];
                                        user_status_display = '<b>Last status :</b> '+user_status;
                                    }else{
                                        user_status_display =" ";
                                    }
                                }else{
                                    user_status_display =" ";
                                }
                                //alert(mentor_name_display);
                                if(urlParams['lead_by'] == "avlble_omr_mnth"){
                                    ass_details = data.ass_details;
                                    if(ass_details!='' && ass_details!=null){
                                        var ass_details = ass_details.split('||');
                                        var allergy = ass_details[0];
                                        var food_aversion = ass_details[1];
                                        var eating_habit = ass_details[2];
                                        var medical_issue = ass_details[3]+', '+ass_details[4];
                                    }else{
                                        var allergy = 'NA';
                                        var food_aversion = 'NA';
                                        var eating_habit = 'NA';
                                        var medical_issue = 'NA';
                                    }
                                    let text = data.prog_detail;
                                    if(text!='' && text!=null){
                                        const myArray = text.split("||");
                                        console.log(myArray);
                                        program_details = myArray['0'];
                                        days_ago = myArray['1'];
                                        last_wt = myArray['2'];
                                        start_wt = myArray['5'];
                                    }else{
                                        program_details = "-";
                                        days_ago = "-";
                                        last_wt = "-";
                                        start_wt = "-";
                                    }
                                    ass_button='<b>-----------</b><br><b style="color:green;">Ass. SnapShot</b><br><b>Start wt:</b> '+start_wt+'kgs<br><b>Last wt:</b> '+last_wt+'kgs<br><b>Allergies:</b> '+allergy+'<br><b>Food Aversions:</b> '+food_aversion+'<br><b>Food Habits:</b> '+eating_habit+'<br><b>Medical Issues:</b> '+medical_issue+'<br>';
                                }else{
                                    ass_button='';
                                }
                                //return take_healthscore_btn+' '+health_category+' '+health_issues+' '+weight+' '+height+' '+body_mass_index+' '+ideal_weight+'<br>'+mentor_name_display+'<br>'+user_status_display+'<br>';
                                return take_healthscore_btn+' '+health_category+' '+health_issues+' '+weight+' '+height+' '+body_mass_index+' '+ideal_weight+'<br><br>'+sleep+' '+ass_button;
                            }
                        }},
                        /*{ "data": null,  "render": function ( data, type, full, meta ) {
            return '<b>Source:</b> '+data.lead_source+'<br><b>L. Type:</b> <span>'+data.lead_type+'</span><br><b>Status:</b> '+data.lead_status}},*/
                        { "data": null },
                        { "data": null },
                        { "data": null },
                        { "data": null },
                        { "data": null },
                        { "data": "assign_to" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.health_category;
                            }
                        }},

                        { "data": "lead_source" },
                        { "data": "gender" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.lead_type;
                            }
                        }},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.phone_no;
                            }
                        }},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.stage;
                            }
                        }},
                        { "data": "lead_status" }, 
                        // { "data": "fu_note" },
                        // { "data": "phase" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                             return '<div>Phase: '+data.phase+'</div>';
                             
                            }},
                        /*{ "data": "key_insight" },*/
                    ],
                    "ordering": false,
                    "lengthChange": false,
                    searchPanes: {
                        layout: 'columns-8',
                        columns: [8,10,11,12,13,14,15,6]
                    },
                    dom: 'Plfrtip',
                    
                    columnDefs: [
                        {
                            searchPanes: {
                                show: true
                            },
                            // targets: [5,6,3],
                        },
                        {
                            "targets": [8,9,10,11,12,13,14,15,16],
                            "visible": false
                        },
                        { "width": "5%", "targets": 0 },
                        { "width": "2%", "targets": 1 }, 
                        { "width": "18%", "targets": 2 },
                        { "width": "18%", "targets": 3 },
                        { "width": "18%", "targets": 4 },
                        { "width": "18%", "targets": 5 },
                        { "width": "18%", "targets": 6 },
                        { "width": "25%", "targets": 7 },
                        // { "width": "15%", "targets": 5 },
                       
                        {targets: [7], render: function (a, b, data, s) {
                            if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                 $string = '<button class="btn btn-success client_keyinsights" data-user_id="'+data.userid+'" data-username="'+data.name+'">Client Insights</button>';
                            }else{
                                var $key_insight_note_ls, $fu_note_ls, $other_fu_note_ls, $string = "";
                                if(data.key_insight!="" && data.key_insight!=null){
                                // $key_insight_note_ls = "<p><b>Key Insight :</b> "+data.key_insight+"</p>";
                                var k = data.key_insight;
                                k = k.slice(0, 30)+"...<br><span class='text-primary show_button' style='cursor:pointer;text-decoration:underline;font-size: 14px;' onclick='show_more(\""+data.id+"\");'>Show More</span>";
                                $key_insight_note_ls = "<b>Lead Key Insights :</b> <div class='show-read-less d-none' id='show_"+data.id+"'>"+data.key_insight+"...</br><span class='text-primary show_button' style='cursor:pointer;text-decoration:underline;font-size: 14px;' onclick='show_less(\""+data.id+"\");'>Show Less</span></div><div id='hide_"+data.id+"' class='show-read-more'>"+k+"</div>";
                                    
                                }else{
                                    $key_insight_note_ls = '<p></p>';
                                }
                                if(data.fu_note!="" && data.fu_note!=null){
                                    $fu_note_ls = '<hr><p><b>Prev.Lead Fu : </b>'+data.fu_note+'</p>';
                                }else{
                                    $fu_note_ls = '<p></p>';
                                }
                                if(data.fu_other_note!="" && data.fu_other_note!=null){
                                    $other_fu_note_ls = ' <hr><p><b>Prev.Lead Other Fu :</b> '+data.fu_other_note+'</p>';
                                }else{
                                    $other_fu_note_ls = '<p></p>';
                                }
                                $string = $key_insight_note_ls+$fu_note_ls+$other_fu_note_ls;
                        }
                                return $string;//<option value="0">Select Phase</option> <option value="1"'+selected1+' >Phase 1</option><option value="2" '+selected2+'>Phase 2</option><option value="3" '+selected3+'>Phase 3</option><option value="4" '+selected4+'>Phase 4</option>
                                
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [6], render: function (a, b, data, s) {
                                // var $suggested_program = "";
                                // var selected1,selected2,selected3,selected4,selected5,selected6,selected7,selected8 =""; 
                                // if(data.suggested_program!=0){
                                    
                                //     $suggested_program = '<label> Suggested Program : '+data.suggested_program+'</label><br>';
                                //     if(data.suggested_program=="WEIGHT LOSS-PRO"){
                                //         selected1 = "selected";
                                //     }
                                //     if(data.suggested_program=="BEAT PCOS"){
                                //         selected2 = "selected";
                                //     }
                                //     if(data.suggested_program=="WEIGHT LOSS +"){
                                //         selected3 = "selected";
                                //     }
                                //     if(data.suggested_program=="BODY TRANSFORMATION"){
                                //         selected4 = "selected";
                                //     }
                                //     if(data.suggested_program=="ACTIVE"){
                                //         selected5 = "selected";
                                //     }
                                //     if(data.suggested_program=="RENEU"){
                                //         selected6 = "selected";
                                //     }
                                //     if(data.suggested_program=="PLATEAU BREAKER"){
                                //         selected7 = "selected";
                                //     }
                                //     if(data.suggested_program=="REFORM INTERMITTENT"){
                                //         selected8 = "selected";
                                //     }
                                // }else{
                                //     $suggested_program = "<label>Select Suggested Program : </label>";
                                // }
                                // return $suggested_program+'<div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user" onchange="suggested_program(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" >  <option value="">Select</option> <option value="WEIGHT LOSS-PRO"'+selected1+' >WEIGHT LOSS-PRO</option><option value="BEAT PCOS" '+selected2+'>BEAT PCOS</option><option value="WEIGHT LOSS +" '+selected3+'>WEIGHT LOSS +</option><option value="BODY TRANSFORMATION" '+selected4+'>BODY TRANSFORMATION</option><option value="ACTIVE" '+selected5+'>ACTIVE</option><option value="RENEU" '+selected6+'>RENEU +</option><option value="PLATEAU BREAKER" '+selected7+'>PLATEAU BREAKER</option><option value="REFORM INTERMITTENT" '+selected8+'>REFORM INTERMITTENT</option></select> </div>';//<option value="0">Select Phase</option> <option value="1"'+selected1+' >Phase 1</option><option value="2" '+selected2+'>Phase 2</option><option value="3" '+selected3+'>Phase 3</option><option value="4" '+selected4+'>Phase 4</option>
                                
                                // return "<b>Name:</b> "+data.assign_to +"<br><b>Date:</b> "+ data.assign_date + '<br> <div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user mt-2" onchange="assigned_user(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Assign to other</option> <?php foreach ($assign_to_list as $key => $value) { echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>'; } ?> </select> </div>';
                                if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                    var arr = data.prog_sugg.split(',');
                                    var prg1 = arr[0];
                                    var prg2 = arr[1];
                                    var prog_sugg ='';
                                    var prog_sugg1 = '';
                                    var prog_sugg2 = '';
                                    var prog_sugg_display='';
                                    var con = '0';
                                    if(prg1!=''){ var prog_sugg1 ="<b>Sugg. by App:</b><br><b>Prog. 1</b> : "+prg1;var con=1;}
                                    if(prg2!=''){ var prog_sugg2 = "<br><b>Prog. 2</b> : "+prg2;var con=1;}
                                    if(arr.length>1){prog_sugg = prog_sugg1.concat(prog_sugg2,"<br>");}
                                    if(prog_sugg!=''){
                                        prog_sugg_display = prog_sugg;
                                    }
                                }else{
                                    prog_sugg_display = '';
                                }
                                if(data.program_name !=0 && data.program_name != null){   
                                    
                                    return prog_sugg_display+'<b>Sugg. by Team: </b><br>'+(data.program_name).toUpperCase()+'<br><form id="form_'+data.id+'"><span id="ra_'+data.id+'"></span><select class="form-control m-input suggested_program'+data.id+' mt-2 js-example-basic-single" data-type="prog_name" aria-label="Default select example" onchange="get_amount(this,\'name\');" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Program Suggested</option> <option data-id="2"  data-lead_id="'+data.id+'" value="Beat PCOS">Beat PCOS</option><option data-id="7"  data-lead_id="'+data.id+'" value="Slim Smart">Slim Smart</option><option data-id="4"  data-lead_id="'+data.id+'" value="Body Transformation">Body Transformation</option><option data-id="74" data-lead_id="'+data.id+'" value="Plateau Breaker">Plateau Breaker</option><option data-id="91"  data-lead_id="'+data.id+'" value="Reform Intermittent">Reform Intermittent</option><option data-id="6"  data-lead_id="'+data.id+'" value="Reneu">Reneu</option><option data-id="1"  data-lead_id="'+data.id+'" value="Weight Loss-Pro">Weight Loss-Pro</option><option data-id="3"  data-lead_id="'+data.id+'" value="Weight Loss +">Weight Loss +</option><option data-id="132"  data-lead_id="'+data.id+'" value="SlimPossible60">SlimPossible60</option><option data-id="17"  data-lead_id="'+data.id+'" value="Nourish">Nourish</option><option data-id="18"  data-lead_id="'+data.id+'" value="Satvaa">Satvaa</option><option data-id="19"  data-lead_id="'+data.id+'" value="Sphoorti">Sphoorti</option><option data-id="5"  data-lead_id="'+data.id+'" value="Active">Active</option> <option data-id="119"  data-lead_id="'+data.id+'" value="Shape Up">Shape Up</option> </select><select class="form-control m-input suggested_program mt-2 js-example-basic-single" data-lead_id="'+data.id+'" data-type="prog_days" onchange="get_amount(this,\'days\')"><option value="3"  data-lead_id="'+data.id+'" class="days">30 Days</option><option value="6"  data-lead_id="'+data.id+'" class="days">60 Days</option><option value="9"  data-lead_id="'+data.id+'" class="days">90 Days</option></select><input class="form-control m-input" type="text" id="amt_'+data.id+'" placeholder="Amount" style="margin-top: 7px;"/><span class="btn btn-success" id="val_'+data.id+'" style="margin-top: 7px;" onclick="save_suggestion('+data.id+')">Suggest</span></form>';
                                }else{
                                    return prog_sugg_display+'<form id="form_'+data.id+'"><span id="ra_'+data.id+'"></span><select class="form-control m-input suggested_program'+data.id+' mt-2 js-example-basic-single" aria-label="Default select example" data-type="prog_name" onchange="get_amount(this,\'name\');" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Program Suggested</option> <option data-id="2"  data-lead_id="'+data.id+'" value="Beat PCOS">Beat PCOS</option><option data-id="7"  data-lead_id="'+data.id+'" value="Slim Smart">Slim Smart</option><option data-id="4"  data-lead_id="'+data.id+'" value="Body Transformation">Body Transformation</option><option data-id="74" data-lead_id="'+data.id+'" value="Plateau Breaker">Plateau Breaker</option><option data-id="91"  data-lead_id="'+data.id+'" value="Reform Intermittent">Reform Intermittent</option><option data-id="6"  data-lead_id="'+data.id+'" value="Reneu">Reneu</option><option data-id="1"  data-lead_id="'+data.id+'" value="Weight Loss-Pro">Weight Loss-Pro</option><option data-id="3"  data-lead_id="'+data.id+'" value="Weight Loss +">Weight Loss +</option><option data-id="132"  data-lead_id="'+data.id+'" value="SlimPossible60">SlimPossible60</option><option data-id="17"  data-lead_id="'+data.id+'" value="Nourish">Nourish</option><option data-id="18"  data-lead_id="'+data.id+'" value="Satvaa">Satvaa</option><option data-id="19"  data-lead_id="'+data.id+'" value="Sphoorti">Sphoorti</option><option data-id="5"  data-lead_id="'+data.id+'" value="Active">Active</option><option data-id="119"  data-lead_id="'+data.id+'" value="Shape Up">Shape Up</option></select><select class="form-control m-input suggested_program mt-2 js-example-basic-single" data-lead_id="'+data.id+'" data-type="prog_days" onchange="get_amount(this,\'days\')" ><option value="3"  data-lead_id="'+data.id+'" class="days">30 Days</option><option value="6"  data-lead_id="'+data.id+'" class="days">60 Days</option><option value="9"  data-lead_id="'+data.id+'" class="days">90 Days</option></select><input type="text"  class="form-control m-input"  id="amt_'+data.id+'" placeholder="Amount" style="margin-top: 7px;"/><span class="btn btn-success" id="val_'+data.id+'" style="margin-top: 7px;" onclick="save_suggestion('+data.id+')">Suggest</span></form>';
                                }
                                
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [5], render: function (a, b, data, s) {
                                if(user_type!='mentor'){
                                var $phase = "";
                                var selected1,selected2,selected3,selected4 =""; 
                                if(data.phase!=0){
                                    
                                    $phase = '<label> Phase '+data.phase+'</label><br>';
                                    if(data.phase==1){
                                        selected1 = "selected";
                                    }
                                    if(data.phase==2){
                                        selected2 = "selected";
                                    }
                                    if(data.phase==3){
                                        selected3 = "selected";
                                    }
                                    if(data.phase==4){
                                        selected4 = "selected";
                                    }
                                }else{
                                    $phase = "<label>Select Phase : </label>";
                                }
                                return $phase+'<div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user" onchange="phase_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="0">Select Phase</option> <option value="1"'+selected1+' >Phase 1</option><option value="2" '+selected2+'>Phase 2</option><option value="3" '+selected3+'>Phase 3</option><option value="4" '+selected4+'>Phase 4</option>  </select> </div>';
                                } else{
                                    
                                    var today = new Date().toISOString().slice(0, 10);
                                    var start_date = data.created_date;
                                    var today_new = Date.parse(today);
                                    var start_new = Date.parse(start_date);

                                    const diffTime = Math.abs(today_new - start_new);
                                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                                    
                                    if(diffDays =='0'){
                                        var diffDays1 = '<b>Today</b>'+'<br/>';
                                    }else if(diffDays=='1'){
                                       var diffDays1 = 'Yesterday'+'<br/>';
                                    }else{
                                        var diffDays1 = Math.ceil(diffTime / (1000 * 60 * 60 * 24))+" days Ago"+'<br/>';
                                        }
                                return diffDays1;
                                }
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [4], render: function (a, b, data, s) {
                                user_status_display =mentor_name_display=" "; 
                                if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                    if(data.omr_mentor=='NA'){
                                        var mentor_name_display = data.omr_mentor;
                                    }else{
                                        var mentor_name_display = data.omr_mentor;
                                    }
                                    var user_status = data.user_status;
                                    if(mentor_name_display !='NA'){
                                        mentor_name_display = '<b>Mentor:</b> '+mentor_name_display+"<br><br>";
                                    }else{
                                        mentor_name_display =" ";
                                    }
                                    if(user_status !=''){
                                        user_status_display = '';//'<b>Last status:</b> '+user_status+"<br><br>";
                                    }else{
                                        user_status_display =" ";
                                    }
                                }
                                if (data.assign_to == null || data.assign_to == "") {
                                    return '<div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user" onchange="assigned_user(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Select</option> <?php foreach ($assign_to_list as $key => $value) { echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>'; } ?> </select> </div>';
                                }else if( data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                    return mentor_name_display+user_status_display+"<b>Counselor:</b> "+data.assign_to +"<br><b>Date:</b> "+ data.assign_date + '<br> <div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user mt-2" onchange="assigned_user(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Assign to other</option> <?php foreach ($assign_to_list as $key => $value) { echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>'; } ?> </select> </div>';
                                }else{
                                    return mentor_name_display+user_status_display+"<b>Counselor:</b> "+data.assign_to +"<br><b>Date:</b> "+ data.assign_date
                                }
                                
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [3], render: function (a, b, data, s) {
                                var profile = "";
                                //console.log(data.lead_source);
                                if(data.profile != null){
                                    if(data.lead_source=='consultation'){
                                        profile = " ( Website Form Consultation ) ";
                                    }else{
                                        console.log(data.lead_source);
                                        if(data.profile!=""){
                                            profile = " ( "+data.profile+" ) ";
                                        }else{
                                            profile = "";
                                        }
                                        
                                    }
                                    //profile = "( "+data.profile+" )";
                                    
                                }else{
                                    profile = "";
                                }
                                
                                $lead_source = '<br><b>Primary&nbsp;Source&nbsp;:</b> ' + data.primary_source + '<br>';
                                if (data.primary_source == "" || data.primary_source == null) {
                                    $lead_source =
                                    '<br><div class="form-group m-form__group"> <label class="col-form-label"><b>Primary Source:</b></label> <span id="source_id_'+data.id+'"><select  name="source_id" class="form-control m-input" onchange="leadChangeSource(this)" data-lead_id="' +
                                    data.id + '" data-lead_email="' + data.email + '" data-stage="' +
                                    data.stage +
                                    '"> <option value="">Select Source</option><option value="Facebook">Facebook</option><option value="Instagram">Instagram</option><option value="Zopim">Zopim</option><option value="Consultation">Consultation</option><option value="Whatsapp">Whatsapp</option><option value="Phone Enquiry">Phone Enquiry</option><option value="HS Stage 1/2">HS Stage 1/2</option><option value="HS Stage 3/4">HS Stage 3/4</option><option value="Registration">Registration</option><option value="Walk-in">Walk-in</option><option value="Khyati Ma\'am">Khyati Ma\'am</option><option value="Reference">Reference</option></select> </span> </div>';
                                
                                }
                        
                                if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                    if (data.lead_status == null || data.lead_status == "" ) {
                                        return '<b>Curr. Source :</b> '+data.lead_source+profile+'<br><div class="form-group m-form__group"> <label class="col-form-label"><b>Status:</b></label> <select name="status_id" class="form-control m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Select Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { if($lead_status[$k]['id']!='5'){ ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } } ?> </select> </div>' + $lead_source;
                                    
                                        
                                    }else if(data.assign_to == "" || data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                        //console.log("else if : "+data.assign_to);
                                        return '<b>Curr. Source :</b> '+data.lead_source+profile+'<br><b>Status:</b> '+data.lead_status+ '<div class="form-group m-form__group"> <select name="status_id" class="form-control mt-2 m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Change Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { if($lead_status[$k]['id']!='5'){ ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } } ?> </select> </div>'  + $lead_source;;
                                    
                                        
                                    }else{
                                        return '<b>Curr. Source :</b> '+data.lead_source+'<br><b>Status:</b> '+data.lead_status;
                                    }
                                    
                                }else{
                                    
                                 var lead_sub_status ="";
                                         if(data.lead_sub_status !=null && data.lead_sub_status !='NA' ){
                                            lead_sub_status = ' | '+data.lead_sub_status;
                                        }else{
                                            lead_sub_status ='';
                                        }
                                    if (data.lead_status == null || data.lead_status == "") {
                                        return '<b>Curr. Source :</b> '+data.lead_source+profile+'<br><b>L. Type:</b> <span style="font-size:11px" class='+data.lead_type+'>'+data.lead_type+'</span><div class="form-group m-form__group"> <label class="col-form-label"><b>Status:</b></label> <select name="status_id" class="form-control m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Select Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { if($lead_status[$k]['id']!='5'){ ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } } ?> </select> </div>' + $lead_source;;
                                   
                                    }else if( data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                        return '<b>Curr. Source :</b> '+data.lead_source+profile+'<br><b>L. Type:</b> <span style="font-size:11px" class='+data.lead_type+'>'+data.lead_type+'</span><br><b>Status:</b> '+data.lead_status+ ''+ lead_sub_status+'<div class="form-group m-form__group"> <select name="status_id" class="form-control mt-2 m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Change Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { if($lead_status[$k]['id']!='5'){ ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } } ?> </select> </div>' + $lead_source;;
                                    
                                        
                                    }else{
                                        if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                            prev_source="";
                                        }else{
                                            prev_source="<b>Prev. Sources :</b> "+data.all_source+"<br>";
                                        }
                                        return '<b>Curr. Source :</b> '+data.lead_source+profile+'<br>'+prev_source+'<b>L. Type:</b> <span style="font-size:11px" class='+data.lead_type+'>'+data.lead_type+'</span><br><b>L. Status:</b> '+data.lead_status+''+lead_sub_status+ ' ' +   $lead_source;
                                    }
                                }
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [1], render: function (a, b, data, s) {
                                
                                if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                    var btnDisplay = "d-none";
                                }else{
                                    var btnDisplay = "d-inline-block";
                                    
                                    
                                    var btnConsultation = "";
                                    if (data.consultation == "No" || data.consultation == null) {
                                        btnConsultation = "btn-danger";
                                    }else{
                                        btnConsultation = "btn-success";
                                    }
                                }
                                
                                var mobileVerify = "";
                                if(data.verify == 1){
                                   mobileVerify = "<img src='<?= CDN_IMAGE_URL ?>/bluetick.png' style='width:20px;height:20px'/>";
                                }
                                
                                var consultation ="";
                                if(data.consultation =='NA'){
                                    consultation = "<b class='"+btnDisplay+"><i class='fas fa-phone-volume text-primary'></i></b> <button class='btn btn-sm '"+btnDisplay+"' '"+btnConsultation+"' py-0>'"+data.consultation+"'</button> - '"+data.consultation_date;
                                }
                                if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                    wt_loss = data.weight - data.ideal_weight;
                                    wt_loss = parseFloat(wt_loss.toFixed(1));
                                      whats_msg='Hi '+data.name+',%0a%0aI just got a copy of your  BN Health Score. Important update regarding that.%0aAs per this, we need to lose '+wt_loss+'kg ASAP!%0aYou also need to get your BMI down to below 23-24kg/m2.%0a%0aYou had left your last program '+program_details+' at '+last_wt+'kg %26 that was '+days_ago+' days ago.%0aType Hi %26 I, <?=$_SESSION['balance_session']['first_name'];?> will be happy to help you choose your next program :)';
                                    let text = data.prog_detail;
                                    if(text!='' && text!=null){
                                        const myArray = text.split("||");
                                        console.log(myArray);
                                        program_details = myArray['0'];
                                        days_ago = myArray['1'];
                                        last_wt = myArray['2'];
                                    }else{
                                        program_details = "-";
                                        days_ago = "-";
                                        last_wt = "-";
                                    }
                                    if(data.lead_source=='Your BN Health Score Result'){
                                        whats_msg='Hi '+data.name+',%0a%0aI just got a copy of your  BN Health Score. Important update regarding that.%0aAs per this, we need to lose '+wt_loss+'kg ASAP!%0aYou also need to get your BMI down to below 23-24kg/m2.%0a%0aYou had left your last program '+program_details+' at '+last_wt+'kg %26 that was '+days_ago+' days ago.%0aType Hi %26 I, <?=$_SESSION['balance_session']['first_name'];?> will be happy to help you choose your next program :)';
                                    }else{
                                        whats_msg='Sending you a small test. It will tell us your ideal body weight, BMI %26 obesity category. You will get a detailed copy of the report on your email ID. I%27ll get one too. Let%27s see where we need to focus health-wise :)   Click here : https://www.balancenutrition.in/health-score';
                                    }
                                }else{
                                    wt_loss = data.weight - data.ideal_weight;
                                    wt_loss = parseFloat(wt_loss.toFixed(1));
                                    bmi = ' from '+data.body_mass_index+'kg/m2';
                                    source = data.lead_source;
                                    source_lower = source.toLowerCase();
                                    if(source=='Your BN Health Score Result'){
                                        whats_msg='Hi '+data.name+',%0a%0aNutritionist <?=$_SESSION['balance_session']['first_name']?> here from www.balancenutrition.in%0a%0aI just got a copy of your BN Health Score. You may have got it on email too.%0a%0aAs per this, we need to lose '+wt_loss+'kg ASAP! .%0a%0aYou also need to get your BMI from 33.2 kg/m2 to below 23-24kg/m2.%0a%0a%0aHave you been overweight since some time or have gained weight recently?';
                                    }else if(source_lower=='consultation'){
                                        time = data.consultation_date;//'On 14th April at 2 pm IST';
                                        whats_msg='Hi '+data.name+',%0a%0aSr. Nutritionist <?=$_SESSION['balance_session']['first_name'];?> here from Balance Nutrition.%0aYou have requested a consultation with me '+time+'. I will be connecting with you over a call at that time. Before we speak, do fill out this form: https://www.balancenutrition.in/health-score %0aIt will give me a good insight into your current health profile.';
                                    }else if(source=='Contact Form' || source=='child nutrition'){
                                        whats_msg='Hi,%0a%0aI received your contact details from our website. Do send me your weight & other health concerns.%0aSr. Nutritionist <?=$_SESSION['balance_session']['first_name']?> %0aBalance Nutrition';
                                    }else{
                                        whats_msg='Sending you a small test. It will tell us your ideal body weight, BMI %26 obesity category. You will get a detailed copy of the report on your email ID. I%27ll get one too. Let%27s see where we need to focus health-wise :)   Click here : https://www.balancenutrition.in/health-score';
                                    }
                                }
                                //whats_msg='Hi';
                                var wp =(data.phone);
                                var wp_phone="";
                                var whats_phone="";
                                    if(wp!='' && wp!=null){
                                      if(wp.length >10 && wp.includes("91 ") || wp.includes("+91") ){
                                         if(wp.includes("-")){
                                         wp_phone = wp.split("-");
                                         whats_phone = '91'+wp_phone[1];
                                         
                                         }else if(wp.includes(" ")){
                                         wp_phone = wp.split(" ");
                                         whats_phone = '91'+wp_phone[1];
                                         
                                         }else{
                                            //   whats_phone =data.phone.replace('+','').replace('-','');
                                                whats_phone =data.phone;
                                         }
                                         
                                    }else{
                                        // whats_phone =data.phone.replace('+','').replace('-','');
                                        whats_phone =data.phone;
                                    }  
                                    }else{
                                        // whats_phone =data.phone.replace('+','').replace('-','');
                                        whats_phone =data.phone;
                                    }
                                    // console.log('New phone : '+whats_phone);
                                var phone = "";
                                var gender="";
                                 var wp_phone="";
                                var whats_phone="";
                                var created_date ="";
                                if(user_type == 'mentor'){
                                if(data.phone != 'NA'){
                                 phone ="<br><span style='display:inline;display: inline-flex;'><a href='https://wa.me/"+whats_phone+"/?text="+whats_msg+"' style='text-decoration:underline !important;color:blue !important' target='_blank'>"+data.phone+"</a><span class='pl-2'>"+mobileVerify+"</span><br>";
                                }
                                gender="";
                                created_date ="";
                                }else{
                                    var wp =(data.phone);
                                    if(wp!='' && wp!=null){
                                      if(wp.length >10 && wp.includes("91 ") || wp.includes("+91")){
                                         if(wp.includes("-")){
                                         wp_phone = wp.split("-");
                                         whats_phone = '91'+wp_phone[1];
                                         
                                         }
                                         else if(wp.includes(" ")){
                                         wp_phone = wp.split(" ");
                                         whats_phone = '91'+wp_phone[1];
                                         
                                         }else{
                                              
                                            //   whats_phone =data.phone.replace('+','').replace('-','');
                                               whats_phone =data.phone;
                                         }
                                    }else{
                                        // whats_phone =data.phone.replace('+','').replace('-','');
                                        whats_phone =data.phone;
                                    }  
                                    }else{
                                        // whats_phone =data.phone.replace('+','').replace('-','');
                                        whats_phone =data.phone;
                                    }
                                    console.log(data.phone);
                                    // user_status = data.user_status;
                                    // var user_status = user_status.split('||');
                                    var wallet = "";//user_status[0];
                                    var user_status = "";//user_status[1];
                                    
                                    let text1 = data.user_status;
                                    if(text1!='' && text1!=null){
                                        var user_status = text1.split('||');
                                        var wallet = user_status[0];
                                        var user_status = user_status[1];
                                    }else{
                                        var wallet = "0";
                                        var user_status = "NA";
                                    }
                                    
                                    phone ="<br><b><i class='fas fa-mobile-alt text-success'></i></b> <a href='https://wa.me/"+whats_phone+"/?text="+whats_msg+"' style='color:green;text-decoration:underline !important;color:blue !important' target='_blank'>"+data.phone+"</a><span class='pl-2'>"+mobileVerify+"</span><br>";
                                    if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                        gender ='<i class="fas fa-wallet"></i> Rs. '+wallet;
                                    }else{
                                        gender = "<i class='fas fa-venus-double text-danger'></i></b>"+data.gender+" | "+data.lead_age;
                                    }
                                    created_date ="<br><b><i class='fas fa-calendar-alt'></i></b>"+data.created_date+"<br>";
                                    if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                        //App ="<br><button class=\"btn btn-sm btn-warning text-white askupdate\" value=\"50\" data-reminder=\"240\"><i class=\"fa fa-bell\" aria-hidden=\"true\"></i> Ask for App Update</button>";
                                        App = '';
                                    }else{
                                        App = '';
                                    }
                                    
                                }user_status_display =mentor_name_display=" "; 
                                if(urlParams['lead_by'] == "avlble_omr_mnth" || urlParams['lead_by'] == "avlble_omr_tdy"){
                                    /*if(data.omr_mentor=='NA'){
                                        var mentor_name_display = data.omr_mentor;
                                    }else{
                                        var mentor_name_display = data.omr_mentor;
                                    }
                                    var user_status = data.user_status;
                                    if(mentor_name_display !='NA'){
                                        mentor_name_display = '<b>Name of Mentor :</b> '+mentor_name_display;
                                    }else{
                                        mentor_name_display =" ";
                                    }*/
                                    
                                    user_status = data.user_status;
                                    var user_status = user_status.split('||');
                                    var wallet = user_status[0];
                                    var user_status = user_status[1];
                                    //var user_status = data.user_status;
                                    if(user_status !=''){
                                        user_status_display = '<b>Last status :</b> '+user_status;
                                    }else{
                                        user_status_display =" ";
                                    }
                                    order_history = '<button class="btn btn-warning prev_programs" data-user_id="'+data.userid+'" data-order_id="">Order History</button>';
                                    
                                    let prog_details = data.prog_detail;
                                    if(prog_details!='' && prog_details!=null){
                                        //prog_detail = data.prog_detail;
                                        var prog_detail = prog_details.split('||');
                                        var prog_name = prog_detail[0];
                                        var days_ago = prog_detail[1];
                                        var prg_amt = prog_detail[3];
                                        var payment_method = prog_detail[4];
                                    }else{
                                        var prog_name = "NA";
                                        var days_ago = "NA";
                                        var prg_amt = "NA";
                                        var payment_method = "NA";
                                    }
                                    
                                    
                                    
                                    prg_details = '<b>Last Prog.</b> : '+prog_name+'<br><b>Amt</b> : Rs.'+prg_amt+'<br><b>Payment Mode</b> :'+payment_method+'<br><b>Ended</b> : '+days_ago+' Days Ago';
                                   
                                }else{
                                    prg_details=user_status_display =order_history = '';
                                }
                                
                            // return '<b><i class="fas fa-user text-info"></i></b> <a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank" style="color:blue;text-decoration:underline;">'+data.name+'</a><br><i><img src="<?= CDN_IMAGE_URL ?>/gmail_icon.png" /></i> <a href="mailto:'+data.email+'" target="_blank" style="color:blue;text-decoration:underline;">'+data.email+'</a>'+phone+''+gender+''+created_date+''+consultation;
                            return '<span style="font-weight: bolder;">'+data.name+'</span><br><a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank" style="color:blue;text-decoration:underline;">'+data.email+'</a><br>'+phone+''+gender+''+created_date+''+consultation+''+App+'<br>'+prg_details+'<br>'+user_status_display+'<br>'+order_history;
                            }
                        }
                    ],
                    
                    "rowCallback": function( row, data, dataIndex ) {
                        if ( data.stage == 4) {
                            if(data.lead_source=="Referral"){
                            $(row).addClass('refral_color');
                        }else{
                          $(row).addClass('stage_4_color');
                        }
                        } else if ( data.stage == 3) {
                            if(data.lead_source=="Referral"){
                            $(row).addClass('refral_color');
                        }else{
                          $(row).addClass('stage_3_color');
                        } 
                        }else if ( data.stage == 2) {
                            if(data.lead_source=="Referral"){
                            $(row).addClass('refral_color');
                        }else{
                          $(row).addClass('stage_2_color');
                        } }
                        // if(data.referral_flag==1){
                        //     if(data.referral_flag==1){
                        //     $(row).addClass('refral_color');
                        // }else{
                        //     $(row).addClass('refral_color');
                        // }}
                    },
                    initComplete: function () {
                       
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
        }
        $(document).on("click",".prev_programs", function(){
    // alert('yesss');
        var user_id = $(this).attr("data-user_id");
        var order_id = $(this).attr("data-order_id");
        $.ajax({
               url : "<?php echo base_url()?>lead/getPreviousPrograms",
               type: "POST",
               data: {user_id:user_id,order_id:order_id},
               dataType:"JSON",
               success: function(response)
               {
                //   console.log(response[0].result[1]);
                //   return false;
                   if(response[0].result){
                        $('.modal-body').html('');
                        $('#sales_summary_popup_Label').html("Order History");
                        $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Program Details</th> <th>Last Weight</th> <th>Wt. Lost with us</th><th>Payment Details</th><th>Goals</th><th>Milestones</th><th>Purchase Date</th><th>Expiry Date</th> </tr></thead><tbody>');
                        var i=0;
                        $.each(response[0].result, function(i, item) 
                        {
                            // console.log(response[i].order_id);
                            // return false;
                            if (response[0].result[i].goal_set==null) {var goal = 'Not Filled';}else{var goal = response[0].result[i].goal_set;}
                            if (response[0].result[i].goal_achived==null) {var goal_achived = 'Not Filled';}else{var goal_achived = response[0].result[i].goal_achived;}
                            if (response[0].result[i].milestone==null) {var milestone = 'Not Filled';}else{var milestone = response[0].result[i].milestone;}
                        $('<tbody>').html("<tr id='data-"+response[0].result[i].order_id+"'><td>" + (i+1) + "</td><td id='data-title-"+response[0].result[i].program_name+"'>" + response[0].result[i].program_name + "("+response[0].result[i].program_session+" Ssn.)</td><td id='data-text-"+response[0].result[i].wt+"'>" + response[0].result[i].wt + "</td><td id='data-time-"+response[0].result[i].wt_diff+"'>" + response[0].result[i].wt_diff + " kgs</td><td id='data-time-"+response[0].result[i].amount+"'>Rs. "+response[0].result[i].amount +" (" + response[0].result[i].payment_method + ")</td><td>Set : "+goal+"<br><br>Achieved : "+goal_achived+"</td><td>"+milestone+"</td><td id='data-time-"+response[0].result[i].date+"'>" + response[0].result[i].date +"</td><td id='data-time-"+response[0].result[i].extended_date+"'>" + response[0].result[i].extended_date +'</td></tr>').appendTo('.modal-body #cms');
                        $('<tbody>').html("<tr id='data-"+response[0].result[i].order_id+"' style='display:none'><td>" + (i+1) + "</td><td id='data-title-"+response[0].result[i].program_name+"'>" + response[0].result[i].program_name + "</td><td id='data-text-"+response[0].result[i].program_session+"'>" + response[0].result[i].program_session + "</td><td id='data-time-"+response[0].result[i].amount+"'> Rs." + response[0].result[i].amount + "</td><td id='data-time-"+response[0].result[i].amount+"'>" + response[0].result[i].payment_method + "</td><td></td><td></td><td id='data-time-"+response[0].result[i].date+"'>" + response[0].result[i].date +"</td><td id='data-time-"+response[0].result[i].extended_date+"'>" + response[0].result[i].extended_date +'</td></tr>').appendTo('.modal-body #cms');
                        // $('<tbody>').html("<tr id='form-"+response[0].result[i].order_id+"' style='display:none'><td>" + (i+1) + "</td><td><input type='text' style='border: 1px solid #000;' id='title-"+response[i].id+"' value='"+ response[i].reminder_title +"'></td><td><input type='text' style='border: 1px solid #000;' id='text-"+response[i].id+"' value='"+ response[i].reminder_text +"'></td><td><input type='text'  style='border: 1px solid #000;'  id='date-"+response[i].id+"' value='"+response[i].reminder_date+"' class='form-control m-input reminder_date custom_date_picker' readonly  placeholder='Select date' /> <div id='m_timepicker_2'><input type='text'  style='border: 1px solid #000;' class='form-control reminder_time' readonly placeholder='Select time' type='text' id='time-"+response[i].id+"' value='"+response[i].reminder_time+"'/></div></td><td><button class='btn btn-sm btn-warning px-2 py-1' onClick='updateReminder("+response[i].id+")'>Save</button></td></tr>").appendTo('.modal-body #cms');
                        
                        });
                        //$('#popup_modal').attr('style', 'max-width :100% !important');
                        $('.modal-body').removeClass('p-0');
                        $("#sales_summary_popup").modal("show");
                    }
               }
            })   
        });
        $(document).on("click",".client_keyinsights", function(){
    // alert('yesss');
        var user_id = $(this).attr("data-user_id");
        var user_name = $(this).attr("data-username");
        $.ajax({
               url : "<?php echo base_url()?>lead/getkeyinsights",
               type: "POST",
               data: {user_id:user_id},
               dataType:"JSON",
               success: function(response)
               {
                //   console.log(response[0].result[1]);
                //   return false;
                   if(response[0].result){
                        $('.modal-body').html('');
                        $('#sales_summary_popup_Label').html(user_name.trim()+"'s Insights");
                        $('.modal-body').append('<table id="cms" class="table table-striped table-bordered nowrap" style="width:100%"><thead class="thead-inverse"> <tr> <th>#</th> <th>Program</th><th>Mentor</th><th>Diet KeyInsight</th><th>Welcome Call</th><th>Halftime Call</th> <th>Final Call</th></tr></thead><tbody>');
                        var i=0;
                        $.each(response[0].result, function(i, item) 
                        {
                            // console.log(response[i].order_id);
                            // return false;
                            if (response[0].result[i].goal_set==null) {var goal = 'Not Filled';}else{var goal = response[0].result[i].goal_set;}
                            if (response[0].result[i].goal_achived==null) {var goal_achived = 'Not Filled';}else{var goal_achived = response[0].result[i].goal_achived;}
                            if (response[0].result[i].milestone==null) {var milestone = 'Not Filled';}else{var milestone = response[0].result[i].milestone;}
                        $('<tbody>').html("<tr id='data-"+response[0].result[i].order_id+"'><td>" + (i+1) + "</td><td>" + response[0].result[i].program_name + "</td><td>" + response[0].result[i].mentor +"</td><td>" + response[0].result[i].insight +"</td><td>" + response[0].result[i].wc + "</td><td>" + response[0].result[i].hc + "</td><td>"+response[0].result[i].fc+ "</td></tr>").appendTo('.modal-body #cms');
                        $('<tbody>').html("<tr id='data-"+response[0].result[i].order_id+"' style='display:none'><td>" + (i+1) + "</td><td id='data-title-"+response[0].result[i].program_name+"'>" + response[0].result[i].program_name + "</td><td>" + response[0].result[i].wc + "</td><td>" + response[0].result[i].hc + "</td><td>"+response[0].result[i].fc+ "</td><td>" + response[0].result[i].mentor +'</td></tr>').appendTo('.modal-body #cms');
                        // $('<tbody>').html("<tr id='form-"+response[0].result[i].order_id+"' style='display:none'><td>" + (i+1) + "</td><td><input type='text' style='border: 1px solid #000;' id='title-"+response[i].id+"' value='"+ response[i].reminder_title +"'></td><td><input type='text' style='border: 1px solid #000;' id='text-"+response[i].id+"' value='"+ response[i].reminder_text +"'></td><td><input type='text'  style='border: 1px solid #000;'  id='date-"+response[i].id+"' value='"+response[i].reminder_date+"' class='form-control m-input reminder_date custom_date_picker' readonly  placeholder='Select date' /> <div id='m_timepicker_2'><input type='text'  style='border: 1px solid #000;' class='form-control reminder_time' readonly placeholder='Select time' type='text' id='time-"+response[i].id+"' value='"+response[i].reminder_time+"'/></div></td><td><button class='btn btn-sm btn-warning px-2 py-1' onClick='updateReminder("+response[i].id+")'>Save</button></td></tr>").appendTo('.modal-body #cms');
                        
                        });
                        //$('#popup_modal').attr('style', 'max-width :100% !important');
                        $('.modal-body').removeClass('p-0');
                        $("#sales_summary_popup").modal("show");
                    }
               }
            })   
        });
        function save_suggestion(id){
            var a = $('#program_name').attr('data-prog');
            var b = $('#program_days').val();
            var c = $( "form" ).find('#amt_'+id).val();
            var msg = (a+" "+b+"0 Days @ "+c);
            //ajax ra
            if(id!='' && a!=''){
                $.ajax({
    	          type : 'post',
    	           url: '<?php echo base_url()?>lead/get_suggested_program_action',
    	           data: {lead_id:id,lead_suggested_program:msg},
    	           dataType: 'text',
    	           success:function(response){
    	            alert(response);
    	            $( "form" ).find('#amt_'+id).val('')
    	            $( "form" ).find('#ra_'+id).html(msg);
    	            //$( "form" ).find('#amt_'+c).val(response);
    	           }
    	        }) ;
            }else{
                alert('Please Select a Program!');
            }
        }
        function get_amount(id,type){
           // console.log($(id).find(':selected').attr('data-id'));
            //console.log($(id).find(':selected').attr('data-lead_id'));
            
            if(type=='name'){
                $('#program_name').val($(id).find(':selected').attr('data-id'));
                $('#program_name').attr('data-prog',$(id).find(':selected').attr('value'));
            }
            if(type=='days'){
                $('#program_days').val($(id).find(':selected').attr('value'));
            }
            var a = $('#program_name').val();
            var b = $('#program_days').val();
            var c = $(id).find(':selected').attr('data-lead_id');
            $('#lead_id').val(c);
            if(a!='' && c!=''){
                $.ajax({
    	          type : 'post',
    	           url: '<?php echo base_url()?>lead/get_amount',
    	           data: {prog:a,days:b},
    	           dataType: 'text',
    	           success:function(response){
    	            console.log(response);
    	            $( "form" ).find('#amt_'+c).val(response);
    	           }
    	        }) ;
            }
            
        }
        function check_seperator(url_string){
            if(url_string.includes("?") == true){
                var seperator = '&';
            }else{
                var seperator = '?';
            }
            return seperator;
        }
        
        function formatDate_for_lead(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        
            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
        
            // alert([year, month, day].join('-'));
            return [year, month, day].join('-');
            
        
        }
        
        $(document).on("click",".date_filter", function(){
            $("#export_list").removeAttr("disabled");
            $(".select_all").prop("disabled",true);
            $(".export_check").prop('checked', false);
            
        });
        
        $(document).on("click",".export_check", function(){
            $(".select_all").removeAttr("disabled");
            $("#export_list").prop("disabled",true);
            
            $("#search_check_bulk").addClass("active show");
            $("#search_dt_range").removeClass("active show");
            $("#search_check_bulk").parent().parent().find("li:last-child a").addClass("active show");
            $("#search_check_bulk").parent().parent().find("li:first-child a").removeClass("active show");
            
            var checkVal = [];
            $(':checkbox:checked').each(function(i){
              checkVal[i] = $(this).val() +'|'+ $(this).data('user_phone') +'|'+ $(this).data('user_email');
            });
            
            $("input[name=lead_data]").val(checkVal);
            // console.log(checkVal);
            
        });
        
        $(document).on('click', '#bulk_action_lead',function(){
            
            if($("select[name=bulk_assign_action]").val() == "" || $("select[name=bulk_lead_status]").val() == ""){
                $('.error').show();
                $("select[name=bulk_assign_action]").focus();
                
                $('.error_1').show();
                $("select[name=bulk_lead_status]").focus();
                return false;
            }
            
            
            $('.error, .error_1').hide();
            var formVal = $('form#bulk_action_lead_form').serialize();
            var assigned_name = $("select[name=bulk_assign_action]").find(":selected").text();
            var user_status = $("select[name=bulk_lead_status]").find(":selected").text();
            var status_stage = $("select[name=bulk_lead_status]").find(":selected").data('stage');
            // console.log(formVal);
            
            $.ajax({
                type : 'post',
               url: '<?php echo base_url()?>lead/bulk_lead_update',
               data: {lead_data:formVal,assigned_name:assigned_name,user_status:user_status,status_stage:status_stage},
               dataType:'json',
               beforeSend: function(){
                 $("#cover-spin").show();
               },
               complete: function(){
                 $("#cover-spin").hide();
               },
               success:function(response){
                  
                //   return false;
                   if(response.toString() == '1'){
                       alert('Leads Assigned Successfully!');
                       window.location.reload();
                    }
                   
                    //console.log(html);
               }
            });
            
            
        });
        
        $('#range_filter').click( function (){
            
            var get_id = '<?php echo @$_GET['lead_by'] ?>';
            
            var statge = '<?php echo @$_GET['stage'] ?>';
            if(get_id !=  ""){
                 window.history.replaceState(null,"",location.href.split("&")[0]);
                 
                var current_url = window.location.search;
                var seperator = check_seperator(current_url);
                if($('#date_filter').val() != ''){
                  var date_range  = $('#date_filter').val().split(" / "); // can be access as date_range[0]
                  var from_date = formatDate_for_lead(date_range[0]);
                  var to_date = formatDate_for_lead(date_range[1]);
                  current_url += seperator+'df='+from_date+'&dt='+to_date;
                  
                    //   alert(from_date);
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }
                
            }else {
                
                // alert($('#date_filter').val());
                window.history.replaceState(null,"",location.href.split("?")[0]);
                // 03/01/2021 / 03/31/2021
                var current_url = window.location.search;
                // alert(current_url); return false;
                var seperator = check_seperator(current_url);
                if($('#date_filter').val() != ''){
                  var date_range  = $('#date_filter').val().split(" / "); // can be access as date_range[0]
                  var from_date = formatDate_for_lead(date_range[0]);
                  var to_date = formatDate_for_lead(date_range[1]);
                  current_url += seperator+'df='+from_date+'&dt='+to_date;
                  
                    //   alert(from_date);
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }
            }
            
            // export_list(`lead_list`, `alltime`)
            lead_details_table();
            window.location.reload();
        });
        
        $(document).ready(function(){
            $("#export_list").on("click", function(){
                
                var current_url = window.location.search;
                var seperator = check_seperator(current_url);
                
                if($('#date_filter').val() != ''){
                    var date_range  = $('#date_filter').val().split(" / "); // can be access as date_range[0]
                    var from_date = formatDate_for_lead(date_range[0]);
                    var to_date = formatDate_for_lead(date_range[1]);
                    current_url += seperator+'df='+from_date+'&dt='+to_date;
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1];
                        // alert(current_url);
                        export_list(current_url,`lead_list`);
                    }
                    
                }
                
            });
        });
        
        $(window).on('load',function(){
            lead_details_table();
        });
        
    }else if($(window).width() < 675){
        
        $(document).ready(function(){
            $('.lead_show_mob').removeClass('d-none');
            $('.lead_show_desk').addClass('d-none');
        // alert();
           $("#search_filter_collapse_show_m").on('click',function(){
              $(this).toggleClass("search_filter_collapse_hide");
              $(".dtsp-panesContainer").slideToggle();
            //   $("#search_filter_collapse_hide").show();
            
           });
           
           /*$("#search_filter_collapse_hide").on('click',function(){
              $(".dtsp-panesContainer").hide();
              $("#search_filter_collapse_show").show();
              $(this).hide();
           });*/
        });
        
        
        
        
        
        function lead_details_table(){
            
            var urlParams;
            (window.onpopstate = function () {
                var match,
                    pl     = /\+/g,  // Regex for replacing addition symbol with a space
                    search = /([^&=]+)=?([^&]*)/g,
                    decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
                    query  = window.location.search.substring(1);
            
                urlParams = {};
                while (match = search.exec(query))
                   urlParams[decode(match[1])] = decode(match[2]);
            })();
            
            
            // $(document).ready(function(){
                var base_url = "<?php echo base_url()?>";
                var get_parameters = window.location.search;
                console.log(get_parameters);
                $('#lead_details_data_m').DataTable({
                    "ajax": {
                        "type" : "GET",
                        "url" : "<?php echo base_url()?>lead/get_lead_details_data"+get_parameters,
                       // "data" : {get_parameters:get_parameters.replace("?", "")},
                        "dataSrc": "lead_details_data",
                        // cache: false,
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    language: {
                        search : "",
                        searchPlaceholder: "Search By Keyword"
                    },
                    "columns": [
                        { "data": null },
                        { "data": "assign_to" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.health_category;
                            }
                        }},
                        { "data": "lead_source" },
                        { "data": "gender" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.lead_type;
                            }
                        }},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.phone_no;
                            }
                        }},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                return type;
                            }else{
                                return data.stage;
                            }
                        }},
                        { "data": "lead_status" },
                    ],
                    "ordering": false,
                    "lengthChange": false,
                    searchPanes: {
                        layout: 'columns-8',
                        columns: [1,2,3,4,5,6,7,8,9,10,11]
                    },
                    dom: 'Plfrtip',
                    columnDefs: [
                        {
                            searchPanes: {
                                show: true
                            },
                            // targets: [5,6,3],
                        },
                        {
                            "targets": [1,2,3,4,5,6,7,8,9,10,11],
                            "visible": false
                        },
                        // { "width": "15%", "targets": 5 },
                        {
                            // puts a button in the last column
                            targets: [0], render: function (a, b, data, s) {
                                if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                    var btnDisplay = "d-none";
                                }else{
                                    var btnDisplay = "d-inline-block";
                                    
                                    var btnConsultation = "";
                                    if (data.consultation == "No" || data.consultation == null) {
                                        btnConsultation = "btn-danger";
                                    }else{
                                        btnConsultation = "btn-success";
                                    }
                                }
                                
                                var mobileVerify = "";
                                
                                if(data.verify == 1){
                                   mobileVerify = "<img src='<?= CDN_IMAGE_URL ?>/mobile_verified.svg' />";
                                }
                                
                                var lead_status_html = "";
                                
                                if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                    if (data.lead_status == null || data.lead_status == "" ) {
                                        lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><div class="form-group m-form__group"> <label class="col-form-label"><b>Status:</b></label> <select name="status_id" style="width:50%" class="form-control m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Select Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                                    }else if(data.assign_to == "" || data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                        //console.log("else if : "+data.assign_to);
                                        lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Status:</b> '+data.lead_status + '<div class="form-group m-form__group"> <select name="status_id" style="width:50%" class="form-control mt-2 m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Change Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                                    }else{
                                        lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Status:</b> '+data.lead_status;
                                    }
                                    
                                }else{
                                
                                    if (data.lead_status == null || data.lead_status == "") {
                                        lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Lead Type:</b> <span>'+data.lead_type+'</span><div class="form-group m-form__group"> <label class="col-form-label"><b>Status:</b></label> <select name="status_id" style="width:50%" class="form-control m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Select Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                                    }else if( data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                        lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Lead Type:</b> <span>'+data.lead_type+'</span><br><b>Status:</b> '+data.lead_status + '<div class="form-group m-form__group"> <select name="status_id" style="width:50%" class="form-control mt-2 m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Change Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                                    }else{
                                        lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>L. Type:</b> <span class='+data.lead_type+'>'+data.lead_type+'</span><br><b>Status:</b> '+data.lead_status;
                                    }
                                }
                                
                                var health_pro_details = "";
                                
                                if(urlParams['lead_by'] == "bs" || urlParams['lead_by'] == "omr"){
                                    var wtDiff = '';
                                    if(data.wt_diff == null || data.wt_diff == ''){
                                        wtDiff = "NA";
                                    }else{
                                        wtDiff = data.wt_diff+'kg';
                                    }
                                    health_pro_details =  '<b>Program Name:</b> '+data.program_name+'<br><b>Pro. Dur. Days:</b> '+data.program_duration_days+' day<br><b>Wt. Diff.:</b> '+wtDiff+'<br><b>Mentor :</b> '+data.mentor;
                                }else{
                                    health_pro_details = '<b>Health Category:</b> '+data.health_category+'<br><b>Medi. Issues:</b> '+data.health_issues+'<br><b>Curr. Wt.:</b> '+data.weight+'<br><b>BMI:</b> '+data.body_mass_index+'<br><b>Ideal Wt.:</b> '+data.ideal_weight+'';
                                    
                                }
                                
                                
                                
                                var assign_to_html = "";
                                if (data.assign_to == null || data.assign_to == "") {
                                    assign_to_html =  '<div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user" onchange="assigned_user(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Select</option> <?php foreach ($assign_to_list as $key => $value) { echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>'; } ?> </select> </div>';
                                }else if( data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                    assign_to_html = "<b>Name:</b> "+data.assign_to +"<br><b>Date:</b> "+ data.assign_date + '<br> <div class="form-group m-form__group" id="assigned_user'+data.id+'"> <select class="form-control m-input assigned_user mt-2" onchange="assigned_user(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'"> <option value="">Assign to other</option> <?php foreach ($assign_to_list as $key => $value) { echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>'; } ?> </select> </div>';
                                }else{
                                    assign_to_html = "<b>Name:</b> "+data.assign_to +"<br><b>Date:</b> "+ data.assign_date
                                }
                                
                                return '<input type="checkbox" class="export_check" value="'+data.id+'" data-user_phone="'+data.phone+'"  data-user_email="'+data.email+'"> <b><i class="fas fa-user text-info"></i></b> <a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a><br><i><img src="<?= CDN_IMAGE_URL ?>/gmail_icon.png" /></i> <a href="mailto:'+data.email+'" target="_blank">'+data.email+'</a> <br><b><i class="fas fa-mobile-alt text-success"></i></b> <a href="tel:'+data.phone+'" target="_blank">'+data.phone+'</a> <span class="pl-2">'+mobileVerify+'</span><br><b><i class="fas fa-venus-double text-danger"></i></b> '+data.gender+' | '+data.lead_age+'<br><b><i class="fas fa-calendar-alt"></i></b> '+data.created_date+'<br><b class="'+btnDisplay+'"><i class="fas fa-phone-volume text-primary"></i></b> <button class="btn btn-sm '+btnDisplay+' '+btnConsultation+' py-0">'+data.consultation+'</button> <div class="health_pro_html">'+health_pro_details+'</div> <div class="ld_status_html">'+lead_status_html+'</div><div class="ld_assign_html">'+assign_to_html+'</div>';
                            
                            
                            }
                        }
                    ],
                    
                    "rowCallback": function( row, data, dataIndex ) {
                        if ( data.stage == 4) {
                            if(data.lead_source=="Referral"){
                            $(row).addClass('refral_color');
                        }else{
                          $(row).addClass('stage_4_color');
                        }} else if ( data.stage == 3) {
                            if(data.lead_source=="Referral"){
                            $(row).addClass('refral_color');
                        }else{
                          $(row).addClass('stage_3_color');
                        }} else if ( data.stage == 2) {
                            if(data.lead_source=="Referral"){
                            $(row).addClass('refral_color');
                        }else{
                          $(row).addClass('stage_2_color');
                        } }
                    },
                    initComplete: function () {
                        
                        /*$(".assigned_user").on("change",function(){
                            var assign_id = $(this).find('option:selected').val();
                            var lead_id = $(this).data('lead_id');
                            var lead_email = $(this).data('lead_email');
                            var path = "<?= base_url(); ?>lead/get_lead_action";
                            var appendText = "";
                           $.ajax({
                                  type: "POST",
                                  url : path,
                                  data: {assign_id:assign_id,lead_email:lead_email,lead_id:lead_id},
                                  dataType:"JSON",
                                  success:function(resp){
                                      alert(resp.message);
                                      appendText += resp.print_message;
                                    //   appendText.text(assign_id);
                                    // document.getElementById("assigned_user"+lead_id).innerHTML =  resp.assign_to;
                                  },
                                  complete:function(){
                                    
                                    // console.log("#assigned_user"+lead_id);
                                    $("#assigned_user"+lead_id).append(appendText);
                                  }
                           });
                       
                       });*/
                       
                        /*this.api().columns([4]).every( function () {
                            var column = this;
                            var select = $('#mis_projected_data_select')
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
             
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );
                        } );*/
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
            // });
        }
        
        function check_seperator(url_string){
            if(url_string.includes("?") == true){
                var seperator = '&';
            }else{
                var seperator = '?';
            }
            return seperator;
        }
        
        function formatDate_for_lead(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        
            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
        
            // alert([year, month, day].join('-'));
            return [year, month, day].join('-');
            
        
        }
        
        $(document).on("click",".date_filter", function(){
            $("#export_list_m").removeAttr("disabled");
            $(".select_all").prop("disabled",true);
            $(".export_check").prop('checked', false);
            
        });
        
        $(document).on("click",".export_check", function(){
            $(".select_all").removeAttr("disabled");
            $("#export_list_m").prop("disabled",true);
            
            $("#search_check_bulk_m").addClass("active show");
            $("#search_dt_range_m").removeClass("active show");
            $("#search_check_bulk_m").parent().parent().find("li:last-child a").addClass("active show");
            $("#search_check_bulk_m").parent().parent().find("li:first-child a").removeClass("active show");
            
            var checkVal = [];
            $(':checkbox:checked').each(function(i){
              checkVal[i] = $(this).val() +'|'+ $(this).data('user_phone') +'|'+ $(this).data('user_email');
            });
            
            $("input[name=lead_data]").val(checkVal);
            // console.log(checkVal);
            
        });
        
        $(document).on('click', '#bulk_action_lead_m',function(){
            
            if($("select[name=bulk_assign_action_m]").val() == "" || $("select[name=bulk_lead_status_m]").val() == ""){
                $('.error').show();
                $("select[name=bulk_assign_action_m]").focus();
                
                $('.error_1').show();
                $("select[name=bulk_lead_status_m]").focus();
                return false;
            }
            
            
            $('.error, .error_1').hide();
            var formVal = $('form#bulk_action_lead_form_m').serialize();
            var assigned_name = $("select[name=bulk_assign_action_m]").find(":selected").text();
            var user_status = $("select[name=bulk_lead_status_m]").find(":selected").text();
            var status_stage = $("select[name=bulk_lead_status_m]").find(":selected").data('stage');
            // console.log(formVal);
            
            $.ajax({
                type : 'post',
               url: '<?php echo base_url()?>lead/bulk_lead_update',
               data: {lead_data:formVal,assigned_name:assigned_name,user_status:user_status,status_stage:status_stage},
               dataType:'json',
               beforeSend: function(){
                 $("#cover-spin").show();
               },
               complete: function(){
                 $("#cover-spin").hide();
               },
               success:function(response){
                  
                //   return false;
                   if(response.toString() == '1'){
                       alert('Leads Assigned Successfully!');
                       window.location.reload();
                    }
                   
                    //console.log(html);
               }
            });
            
            
        });
        
        $('#range_filter_m').click( function (){
            
            var get_id = '<?php echo @$_GET['lead_by'] ?>';
            
            if(get_id !=  ""){
                 window.history.replaceState(null,"",location.href.split("&")[0]);
                 
                var current_url = window.location.search;
                var seperator = check_seperator(current_url);
                if($('#date_filter_m').val() != ''){
                  var date_range  = $('#date_filter_m').val().split(" / "); // can be access as date_range[0]
                  var from_date = formatDate_for_lead(date_range[0]);
                  var to_date = formatDate_for_lead(date_range[1]);
                  current_url += seperator+'df='+from_date+'&dt='+to_date;
                  
                    //   alert(from_date);
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }
                
            }else {
                
                // alert($('#date_filter').val());
                window.history.replaceState(null,"",location.href.split("?")[0]);
                // 03/01/2021 / 03/31/2021
                var current_url = window.location.search;
                // alert(current_url); return false;
                var seperator = check_seperator(current_url);
                if($('#date_filter_m').val() != ''){
                  var date_range  = $('#date_filter_m').val().split(" / "); // can be access as date_range[0]
                  var from_date = formatDate_for_lead(date_range[0]);
                  var to_date = formatDate_for_lead(date_range[1]);
                  current_url += seperator+'df='+from_date+'&dt='+to_date;
                  
                    //   alert(from_date);
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }
            }
            
            // export_list(`lead_list`, `alltime`)
            lead_details_table();
            window.location.reload();
        });
        
        $(document).ready(function(){
            $("#export_list_m").on("click", function(){
                
                var current_url = window.location.search;
                var seperator = check_seperator(current_url);
                
                if($('#date_filter_m').val() != ''){
                    var date_range  = $('#date_filter_m').val().split(" / "); // can be access as date_range[0]
                    var from_date = formatDate_for_lead(date_range[0]);
                    var to_date = formatDate_for_lead(date_range[1]);
                    current_url += seperator+'df='+from_date+'&dt='+to_date;
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        // alert(current_url);
                        export_list(current_url,`lead_list`);
                    }
                    
                }
                
            });
        });
        
        $(window).on('load',function(){
            lead_details_table();
        });
    }
// });

/* deepak addeded */

function show_less(id){
     $("#show_"+id).addClass('d-none');
    $("#hide_"+id).removeClass('d-none');
   }
function show_more(id){
     $("#show_"+id).removeClass('d-none');
    $("#hide_"+id).addClass('d-none');
    }

$(document).ready(function(){
    
    $('.js-example-basic-single').select2();

  $('[data-toggle="tooltip"]').tooltip({ show: { effect: "blind", duration: 300 } });   
});
</script>

