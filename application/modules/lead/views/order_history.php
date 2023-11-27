<style type="text/css">
    @media (max-width: 640px){
        #order_details_data_m {
            width: 100% !important;
            border: none;
        }
        thead {
            margin: 0 !important;
            padding: 0 !important;
            visibility: hidden;
            height: 0 !important;
            position: absolute;
        }
    }
        
</style>
<div class="lead_show_desk d-none">
    <!--start:: Active Client Journey -->
    <div class="m-content">
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
                        <!-- <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_check_bulk" role="tab">Bulk Action</a>
                        </li> -->
                        
                    </ul>                        
                    <div class="tab-content">
                        <div class="tab-pane" id="search_dt_range" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="row">
                                    <div class="col-lg-4">
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
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group" style="display: none;">
                                            <label class="col-form-label">Age</label>
                                            <div class="m-ion-range-slider">
                                                <input type="hidden" id="age_range"/>
                                            </div>
                                            <!--<div class="m-form__help">
                                                Please Select Age Range
                                            </div>-->
                                        </div> 
                                        <div class="form-group m-form__group">
                                            <label class="col-form-label">Name & Email id</label>
                                            <input type='text' class="form-control m-input" id="name_email" placeholder="Search by name and email id"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                                            <label class="col-form-label">Search By Method</label>
                                            <input type='text' class="form-control m-input" id="method" placeholder="Search By Method"/>
                                        </div>
                                    </div>
                                </div>
                    			<div class="m-form__actions m-form__actions pt-3 pb-2">
                    				<div class="row">
                    					<div class="col-lg-12 ml-lg-auto">
                    						<button type="button" id="range_filter" class="btn btn-brand btn-sm">Search</button>
                    						<!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                    						<!-- <button type="button" id="export_list" class="btn btn-sm btn-info" disabled>Export</button> -->
                    					</div>
                    				</div>
                    			</div>
                            </form>
                        </div>
                        <?php /*<div class="tab-pane" id="search_check_bulk" role="tabpanel">
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
                        						        echo '<option value='.$value['admin_id'].'>'.$value['crm_user'].'</option>';
                        						        
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
                        </div> */ ?>
                    </div>
    		    </div>
    		    <div class="m-section position-relative">
    		        <!-- <button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_show"><i class="fa fa-filter"></i></button> -->
    		        <!--<button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_hide" style="display:none"><i class="fa fa-filter"></i></button>-->
        		    <div class="m-section__content position-relative">
        		        <?php
        		            if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
                                $lead_label = "Order History";
                            }else{
                                $lead_label = "Order History";
                            }
        		        ?>
        		        
        		        <h3 class="lead_heading"><?= $lead_label; ?></h3>
        		        <table class="table table-bordered m-table m-table--border-brand table-responsive" id="order_details_data">
        		            <thead>
        		                <tr>
        		                    <th><!-- <label class="m-checkbox export_checkbox"> <input type="checkbox" onclick="select_all_check()" class="select_all"> <span></span> </label> -->#</th>
        		                    <th>Name & Details</th>
        		                    <th>Program</th>
        		                    <th>Amount Info</th>
        		                    <th>Method</th>
                                    <!-- <th class="d-none">Assign</th>
                                    <th class="d-none">Health Category</th>
                                    <th class="d-none">Source</th>
                                    <th class="d-none">Gender</th>
                                    <th class="d-none">Lead Type</th>
                                    <th class="d-none">Phone</th>
                                    <th class="d-none">Stage</th>
                                    <th class="d-none">Status</th> -->
        		                    
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
                        <!-- <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_check_bulk_m" role="tab">Bulk Action</a>
                        </li> -->
                        
                        <!-- <li class="nav-item m-tabs__item stage_section">
                            <a href="javascript:void(0)" class="m-nav__link">
                                
                                
                            </a>
                            
                        </li> -->
                    </ul>                        
                    <div class="tab-content">
                        <div class="tab-pane" id="search_dt_range_m" role="tabpanel">
                            <form class="m-form m-form--fit m-form--label-align-right">
                                <div class="row">
                                    <div class="col-lg-4">
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
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group m-form__group">
                                            <label class="col-form-label">Age</label>
                                            <div class="m-ion-range-slider">
                                                <input type="hidden" id="age_range_m"/>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group" style="display: none;">
                                            <label class="col-form-label">Age</label>
                                            <div class="m-ion-range-slider">
                                                <input type="hidden" id="age_range_m"/>
                                            </div>
                                            <!--<div class="m-form__help">
                                                Please Select Age Range
                                            </div>-->
                                        </div> 
                                        <div class="form-group m-form__group">
                                            <label class="col-form-label">Name & Email id</label>
                                            <input type='text' class="form-control m-input" id="name_email_m" placeholder="Search by name and email id"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group m-form__group">
                                            <label class="col-form-label">Search By Method</label>
                                            <input type='text' class="form-control m-input" id="method_m" placeholder="Search By Method"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__actions m-form__actions pt-3 pb-2">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <button type="button" id="range_filter_m" class="btn btn-brand btn-sm">Search</button>
                                            <!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                                            <!-- <button type="button" id="export_list_m" class="btn btn-sm btn-info" disabled>Export</button> -->
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
                                                        
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form__actions m-form__actions pt-4 pb-2">
                                    <div class="row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <!-- <button type="button" class="btn btn-brand btn-sm" id="bulk_action_lead_m">Update</button> -->
                                            <!--<button type="reset" class="btn btn-secondary">Resets</button>-->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="m-section position-relative lead_m_sec">
                    <!-- <button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_show_m"><i class="fa fa-filter"></i></button> -->
                    <!--<button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_hide" style="display:none"><i class="fa fa-filter"></i></button>-->
                    <div class="m-section__content position-relative">
                        <?php
                            if(!empty($get_parameters) && !empty($get_parameters['lead_by'])){
                                $lead_label = "Order History";
                            }else{
                                $lead_label = "Order History";
                            }
                        ?>
                         <h3 class="lead_heading"><?= $lead_label; ?></h3>
                        <div class="check_form_box"><label class="m-checkbox export_checkbox"> <!-- <input type="checkbox" onclick="select_all_check()" class="select_all"> <span></span> --> </label></div>
                        
                        <table class="table table-bordered m-table m-table--border-brand table-responsive" id="order_details_data_m">
                            <thead>
                                <tr>
                                    
                                    <th>#</th>
                                    <th class="d-none">Name & Details</th>
                                    <th class="d-none">Program</th>
                                    <th class="d-none">Amount Info</th>
                                    <th class="d-none">Method</th>
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
        
        function order_details_table(){
            
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
            //console.log(base_url);
                var get_parameters = window.location.search;
                //console.log(get_parameters);
                $('#order_details_data').DataTable({
                    "ajax": {
                        "type" : "GET",
                        "url" : "<?php echo base_url()?>lead/get_order_details_data"+get_parameters,
                       // "data" : {get_parameters:get_parameters.replace("?", "")},
                        "dataSrc": "order_details_data",
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
                        /*{ "data": null,  "render": function ( data, type, full, meta ) {
                            }},*/
                        
                    ],
                    "ordering": false,
                    "lengthChange": false,
                    /*searchPanes: {
                        layout: 'columns-8',
                        columns: [5,6,7,8,9,10,11,12]
                    },*/
                    dom: 'Plfrtip',
                    columnDefs: [
                        {
                            searchPanes: {
                                show: true
                            },
                            // targets: [5,6,3],
                        },
                        /*{
                            "targets": [5,6,7,8,9,10,11,12],
                            "visible": false
                        },*/
                        { "width": "5%", "targets": 0 },
                        { "width": "30%", "targets": 1 },
                        { "width": "30%", "targets": 2 },
                        { "width": "20%", "targets": 3 },
                        { "width": "15%", "targets": 4 },
                        // { "width": "15%", "targets": 5 },
                        {
                            // puts a button in the last column
                            targets: [4], render: function (a, b, data, s) {
                                
                                return "<b>Method :</b> "+data.payment_method+"<br>( "+data.order_type+" )<br> <a target= 'blank' href='https://www.balancenutrition.in/checkout/pg_response/view_confirmation_email/"+data.userid+"/"+data.packages_id+"/"+data.order_id+"/1/1' class='btn btn-danger' title='View Invoice'>With GST</a> <br><br> <a target= 'blank' href='https://www.balancenutrition.in/checkout/pg_response/view_confirmation_email/"+data.userid+"/"+data.packages_id+"/"+data.order_id+"/1/0' class='btn btn-danger' title='View Invoice'>Without GST</a>";
                                
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [3], render: function (a, b, data, s) {
                                var amt_type, coupon_code_val = "";
                                if(data.amount_type=='D'){
                                    amt_type = "$";
                                }else{
                                    amt_type = " &#x20B9 ";
                                }
                                //console.log(data.coupon_code);
                                if(data.coupon_code!="null"){
                                    coupon_code_val = " (CC : "+data.coupon_code+") ";
                                }else{
                                    coupon_code_val = "";
                                }
                                return '<b>Paid :</b> '+amt_type+data.amount+'  <br><b>Disc :</b> '+amt_type+data.discount+coupon_code_val+'<br><b>Wallet discount :</b> '+data.wallet_discount+'<br><b>Balance :</b> '+data.balance+'<br><b>Balance Due Date :</b> '+data.bal_due_date+'<br>'+'<br><b>Bank :</b> '+data.bank+'<br>';
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [2], render: function (a, b, data, s) {
                                var display_days = "";
                                if(data.program_name == "IMMUNE BOOSTING CLEANSE" || data.program_name == "ACIDITY CORRECTION CLEANSE" || data.program_name == "CONSTIPATION CORRECTION CLEANSE")
                                {
                                    display_days = " 3 Days ";
                                }else if(data.program_name == "WEIGHT LOSS CLEANSE" || data.program_name == "SUGAR DETOX CLEANSE" || data.program_name == "FLAT STOMACH CLEANSE")
                                {
                                    display_days = " 1 Days ";
                                }else{
                                    display_days = data.program_session + "0 Days";
                                }

                                return '<b>Program Name : </b> '+data.program_name+'<br><b>Program Days : </b> '+data.display_days+'<br><b>Prog amt.:</b> '+data.prog_amt;
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [1], render: function (a, b, data, s) {
                               
                            return '<b><i class="fas fa-user text-info"></i></b> <a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=client" target="_blank">'+data.first_name+' '+data.last_name+'</a><br><i><img src="<?= CDN_IMAGE_URL ?>/gmail_icon.png" /></i> <a href="mailto:'+data.email+'" target="_blank">'+data.email+'</a> <br><b><i class="fas fa-mobile-alt text-success"></i></b> <a href="tel:'+data.mobile_no1+'" target="_blank">'+data.mobile_no1+'</a><br><b><i class="fas fa-venus-double text-danger"></i></b>'+data.gender+'<br><b>Mentor Name : </b> '+data.mentor_first_name+' '+data.mentor_last_name+'<br>'+'<b>End date :</b> '+data.extended_date+'<br><b>1st. Enquiry: </b> '+data.enquiry_from+'<br>'+'<b>Sub Source:</b> '+data.utm_source+'<br>'+'<b>Assign To : </b> '+data.assign_to+'<br>';
                            }
                        },
                        {
                            // puts a button in the last column
                            targets: [0], render: function (a, b, data, s) {
                               
                                //return '<input type="checkbox" class="export_check" value="'+data.id+'" data-user_phone="'+data.phone+'"  data-user_email="'+data.email+'">';
                                return '#';
                            }
                        }
                    ],
                    
                    "rowCallback": function( row, data, dataIndex ) {
                        /*if ( data.stage == 4) {
                          $(row).addClass('stage_4_color');
                        } else if ( data.stage == 3) {
                          $(row).addClass('stage_3_color');
                        } else if ( data.stage == 2) {
                          $(row).addClass('stage_2_color');
                        } */
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
            var method,name_email,name_email_str, method_str = "";
            var get_id = '<?php echo @$_GET['lead_by'] ?>';
            var statge = '<?php echo @$_GET['stage'] ?>';
           
            if($('#name_email').val()!=""){
                name_email = $('#name_email').val();
            }else{
                name_email = '<?php echo @$_GET['name_email'] ?>';
            }
            if($('#method_m').val()!=""){
                method = $('#method_m').val();
            }else{
                method = '<?php echo @$_GET['method'] ?>';
            }
            if(name_email!=""){
                name_email_str = "name_email="+name_email;
            }else{
                name_email_val = $('#name_email').val();
                if(name_email_val!=""){
                    name_email_str  = "name_email="+name_email_val;
                }else{
                    name_email_str = "";
                }
                
            }
            if(method!=""){
                method_str = "method="+method;
            }else{
                method_val = $('#method').val();
                if(method_val!=""){
                    method_str  = "method="+method_val;
                }else{
                    method_str = "";
                }
            }
            if(get_id !=  ""){
                 window.history.replaceState(null,"",location.href.split("&")[0]);
                 
                var current_url = window.location.search;
                var seperator = check_seperator(current_url);
                if($('#date_filter').val() != ''){
                  var date_range  = $('#date_filter').val().split(" / "); // can be access as date_range[0]
                  var from_date = formatDate_for_lead(date_range[0]);
                  var to_date = formatDate_for_lead(date_range[1]);
                  current_url += seperator+'df='+from_date+'&dt='+to_date;
                  if(name_email_str!=""){
                    current_url += '&'+name_email_str;
                  }
                  if(method_str!=""){
                    current_url += '&'+method_str;
                  }
                  
                    //   alert(from_date);
                    
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    current_url += seperator;
                    
                    if(name_email_str!="" && method_str!=""){
                        current_url += name_email_str+'&'+method_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        }
                    }else if(name_email_str!="" && method_str==""){
                        current_url += name_email_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        }
                    }else if(name_email_str=="" && method_str!=""){
                        current_url += method_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        }
                    }else{
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                        }
                    
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
                  if(name_email_str!=""){
                    current_url += '&'+name_email_str;
                  }
                  if(method_str!=""){
                    current_url += '&'+method_str;
                  }
                    var seperator = check_seperator(current_url);
                    if($('#age_range').val() != '' || $('#age_range').val() != null){
                        var age_range  = $('#age_range').val().split(";");
                        current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    //if(name_email_str!="" || method_str!=""){
                        current_url += seperator;
                        
                        if(name_email_str!="" && method_str!=""){
                            current_url += name_email_str+'&'+method_str;
                            if($('#age_range').val() != '' || $('#age_range').val() != null){
                                var age_range  = $('#age_range').val().split(";");
                                current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                            }
                        }else if(name_email_str!="" && method_str==""){
                            current_url += name_email_str;
                            if($('#age_range').val() != '' || $('#age_range').val() != null){
                                var age_range  = $('#age_range').val().split(";");
                                current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                            }
                        }else if(name_email_str=="" && method_str!=""){
                            current_url += method_str;
                            if($('#age_range').val() != '' || $('#age_range').val() != null){
                                var age_range  = $('#age_range').val().split(";");
                                current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                            }
                        }else{
                            if($('#age_range').val() != '' || $('#age_range').val() != null){
                                var age_range  = $('#age_range').val().split(";");
                                current_url += '&agf='+age_range[0]+'&agt='+age_range[1]+'&stage='+statge;
                            }
                        
                        }
                        window.history.replaceState({urlPath:current_url},"",current_url);
                    //}
                }
            }
            
            // export_list(`lead_list`, `alltime`)
            order_details_table();
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
            order_details_table();
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
        
        function order_details_table(){
            
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
                $('#order_details_data_m').DataTable({
                    "ajax": {
                        "type" : "GET",
                        "url" : "<?php echo base_url()?>lead/get_order_details_data"+get_parameters,
                       // "data" : {get_parameters:get_parameters.replace("?", "")},
                        "dataSrc": "order_details_data",
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
                        /*{ "data": null },
                        { "data": "assign_to" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs"){
                                return type;
                            }else{
                                return data.health_category;
                            }
                        }},
                        { "data": "lead_source" },
                        { "data": "gender" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs"){
                                return type;
                            }else{
                                return data.lead_type;
                            }
                        }},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs"){
                                return type;
                            }else{
                                return data.phone_no;
                            }
                        }},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(urlParams['lead_by'] == "bs"){
                                return type;
                            }else{
                                return data.stage;
                            }
                        }},
                        { "data": "lead_status" },*/
                    ],
                    "ordering": false,
                    "lengthChange": false,
                    /*searchPanes: {
                        layout: 'columns-8',
                        columns: [1,2,3,4,5,6,7,8]
                    },*/
                    dom: 'Plfrtip',
                    columnDefs: [
                        {
                            searchPanes: {
                                show: true
                            },
                            // targets: [5,6,3],
                        },
                        /*{
                            "targets": [1,2,3,4,5,6,7,8],
                            "visible": false
                        },*/
                        // { "width": "15%", "targets": 5 },
                        {
                            // puts a button in the last column
                            targets: [0], render: function (a, b, data, s) {
                                
                                var lead_status_html = "";
                                var amt_type, coupon_code_val = "";
                                if(data.amount_type=='D'){
                                    amt_type = "$";
                                }else{
                                    amt_type = " &#x20B9 ";
                                }
                                //console.log(data.coupon_code);
                                if(data.coupon_code!="null"){
                                    coupon_code_val = " (CC : "+data.coupon_code+") ";
                                }else{
                                    coupon_code_val = "";
                                }
                                lead_status_html = '<b>Paid :</b> '+amt_type+data.amount+'  <br><b>Disc :</b> '+amt_type+data.discount+coupon_code_val+'<br><b>Wallet discount :</b> '+data.wallet_discount+'<br><b>Balance :</b> '+data.balance+'<br><b>Balance Due Date :</b> '+data.bal_due_date+'<br>'+'<br><b>Bank :</b> '+data.bank+'<br>';
                                /************************************************************************************************/
                                var health_pro_details = "";
                                var display_days = "";
                                if(data.program_name == "IMMUNE BOOSTING CLEANSE" || data.program_name == "ACIDITY CORRECTION CLEANSE" || data.program_name == "CONSTIPATION CORRECTION CLEANSE")
                                {
                                    display_days = " 3 Days ";
                                }else if(data.program_name == "WEIGHT LOSS CLEANSE" || data.program_name == "SUGAR DETOX CLEANSE" || data.program_name == "FLAT STOMACH CLEANSE")
                                {
                                    display_days = " 1 Days ";
                                }else{
                                    display_days = data.program_session + "0 Days";
                                }
                                health_pro_details = '<b>Program Name : </b> '+data.program_name+'<br><b>Program Days : </b> '+data.display_days+'<br><b>Prog amt. :</b> '+data.prog_amt;
                                /************************************************************************************************/
                                var assign_to_html = "";
                                assign_to_html = "<b>Method :</b> "+data.payment_method+"<br>( "+data.order_type+" )<br> <a target= 'blank' href='https://www.balancenutrition.in/checkout/pg_response/view_confirmation_email/"+data.userid+"/"+data.packages_id+"/"+data.order_id+"/1/1' class='btn btn-danger' title='View Invoice'>With GST</a> <br><br> <a target= 'blank' href='https://www.balancenutrition.in/checkout/pg_response/view_confirmation_email/"+data.userid+"/"+data.packages_id+"/"+data.order_id+"/1/0' class='btn btn-danger' title='View Invoice'>Without GST</a>";
                                /************************************************************************************************/
                                return '<input type="checkbox" class="export_check" value="'+data.id+'" data-user_phone="'+data.phone+'"  data-user_email="'+data.email+'"> <b><i class="fas fa-user text-info"></i></b> <a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=client" target="_blank">'+data.first_name+' '+data.last_name+'</a><br><i><img src="<?= CDN_IMAGE_URL ?>/gmail_icon.png" /></i> <a href="mailto:'+data.email+'" target="_blank">'+data.email+'</a> <br><b><i class="fas fa-mobile-alt text-success"></i></b> <a href="tel:'+data.mobile_no1+'" target="_blank">'+data.mobile_no1+'</a><br><b><i class="fas fa-venus-double text-danger"></i></b>'+data.gender+'<br><b>Mentor Name : </b> '+data.mentor_first_name+' '+data.mentor_last_name+'<br>'+'<b>End date :</b> '+data.extended_date+'<br><b>1st. Enquiry: </b> '+data.enquiry_from+'<br>'+'<b>Sub Source:</b> '+data.utm_source+'<br>'+'<b>Assign To : </b> '+data.assign_to+'<br> <div class="health_pro_html">'+health_pro_details+'</div> <div class="ld_status_html">'+lead_status_html+'</div><div class="ld_assign_html">'+assign_to_html+'</div>';
                            
                            
                            }
                        }
                    ],
                    
                    "rowCallback": function( row, data, dataIndex ) {
                        /*if ( data.stage == 4) {
                          $(row).addClass('stage_4_color');
                        } else if ( data.stage == 3) {
                          $(row).addClass('stage_3_color');
                        } else if ( data.stage == 2) {
                          $(row).addClass('stage_2_color');
                        } */
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
            var method,name_email,name_email_str, method_str = "";
            var get_id = '<?php echo @$_GET['lead_by'] ?>';
            if($('#name_email_m').val()!=""){
                name_email = $('#name_email_m').val();
            }else{
                name_email = '<?php echo @$_GET['name_email'] ?>';
            }
            if($('#method_m').val()!=""){
                method = $('#method_m').val();
            }else{
                method = '<?php echo @$_GET['method'] ?>';
            }

            if(name_email!=""){
                name_email_str = "name_email="+name_email;
            }else{
                name_email_val = $('#name_email_m').val();
                if(name_email_val!=""){
                    name_email_str  = "name_email="+name_email_val;
                }else{
                    name_email_str = "";
                }
                
            }
            if(method!=""){
                method_str = "method="+method;
            }else{
                method_val = $('#method_m').val();
                if(method_val!=""){
                    method_str  = "method="+method_val;
                }else{
                    method_str = "";
                }
            }
            if(get_id !=  ""){
                 window.history.replaceState(null,"",location.href.split("&")[0]);
                 
                var current_url = window.location.search;
                var seperator = check_seperator(current_url);
                if($('#date_filter_m').val() != ''){
                  var date_range  = $('#date_filter_m').val().split(" / "); // can be access as date_range[0]
                  var from_date = formatDate_for_lead(date_range[0]);
                  var to_date = formatDate_for_lead(date_range[1]);
                  current_url += seperator+'df='+from_date+'&dt='+to_date;
                  
                    if(name_email_str!=""){
                        current_url += '&'+name_email_str;
                    }
                    if(method_str!=""){
                        current_url += '&'+method_str;
                    }
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    current_url += seperator;

                    if(name_email_str!="" && method_str!=""){
                        current_url += name_email_str+'&'+method_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }
                    }else if(name_email_str!="" && method_str==""){
                        current_url += name_email_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }
                    }else if(name_email_str=="" && method_str!=""){
                        current_url += method_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }
                    }else{
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }

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
                  current_url += seperator+'df='+from_date+'&dt='+to_date+name_email_str+method_str;
                    if(name_email_str!=""){
                        current_url += '&'+name_email_str;
                    }
                    if(method_str!=""){
                        current_url += '&'+method_str;
                    } 
                    var seperator = check_seperator(current_url);
                    if($('#age_range_m').val() != '' || $('#age_range_m').val() != null){
                        var age_range_m  = $('#age_range_m').val().split(";");
                        current_url += seperator+'agf='+age_range_m[0]+'&agt='+age_range_m[1];
                        
                        // alert(current_url);
                    }
                
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }else{
                    current_url += seperator;

                    if(name_email_str!="" && method_str!=""){
                        current_url += name_email_str+'&'+method_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }
                    }else if(name_email_str!="" && method_str==""){
                        current_url += name_email_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }
                    }else if(name_email_str=="" && method_str!=""){
                        current_url += method_str;
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }
                    }else{
                        if($('#age_range').val() != '' || $('#age_range').val() != null){
                            var age_range  = $('#age_range').val().split(";");
                            current_url += '&agf='+age_range[0]+'&agt='+age_range[1];
                        }

                    }
                    window.history.replaceState({urlPath:current_url},"",current_url);
                }
            }
            
            // export_list(`lead_list`, `alltime`)
            order_details_table();
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
            order_details_table();
        });
    }
// });
</script>