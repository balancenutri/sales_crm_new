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
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_dt_range" role="tab">Search</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#search_check_bulk" role="tab">Bulk Action</a>
                    </li>
                    
                    <li class="nav-item m-tabs__item stage_section">
                        <a href="javascript:void(0)" class="m-nav__link">
                            <span class="m-nav__link-badge">
                                <span class="m-badge m-badge--stage_1 m-badge--wide m-badge--rounded"></span>
                                <span class="m-nav__link-text">- Stage 1 </span>
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="m-nav__link">
                            <span class="m-nav__link-badge">
                                <span class="m-badge m-badge--stage_2 m-badge--wide m-badge--rounded"></span>
                                <span class="m-nav__link-text">- Stage 2 </span>
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="m-nav__link">
                            <span class="m-nav__link-badge">
                                <span class="m-badge m-badge--stage_3 m-badge--wide m-badge--rounded"></span>
                                <span class="m-nav__link-text">- Stage 3 </span>
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="m-nav__link">
                            <span class="m-nav__link-badge">
                                <span class="m-badge m-badge--stage_4 m-badge--wide m-badge--rounded"></span>
                                <span class="m-nav__link-text">- Stage 4 </span>
                            </span>
                        </a>
                    </li>
                </ul>                        
                <div class="tab-content">
                    <div class="tab-pane" id="search_dt_range" role="tabpanel">
                        <form class="m-form m-form--fit m-form--label-align-right">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group m-form__group">
                        				<label class="col-form-label">Date</label>
                    					<div class='input-group pull-right' id='m_daterangepicker_6'>
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
		    <div class="m-section position-relative lead_m_sec">
		        <button class="btn btn-secondary btn-sm p-1" id="search_filter_collapse_show"><i class="fa fa-filter"></i></button>
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
    		        
    		        <table class="table table-bordered m-table m-table--border-brand table-responsive" id="lead_details_data">
    		            <thead>
    		                <tr>
    		                    <th>#</th>
    		                    <th class="d-none">Assign</th>
    		                    <th class="d-none">Health Category</th>
    		                    <th class="d-none">Source</th>
    		                    <th class="d-none">Gender</th>
    		                    <th class="d-none">Lead Type</th>
    		                    <th class="d-none">Phone</th>
    		                    <th class="d-none">Stage</th>
    		                    <th class="d-none">Status</th>
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
<script>
$(document).ready(function(){
// alert();
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
        var get_parameters = window.location.search;
        console.log(get_parameters);
        $('#lead_details_data').DataTable({
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
                { "data": "lead_status" },
            ],
            "ordering": false,
            "lengthChange": false,
            searchPanes: {
                layout: 'columns-8',
                columns: [1,2,3,4,5,6,7,8]
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
                    "targets": [1,2,3,4,5,6,7,8],
                    "visible": false
                },
                // { "width": "15%", "targets": 5 },
                {
                    // puts a button in the last column
                    targets: [0], render: function (a, b, data, s) {
                        if(urlParams['lead_by'] == "bs"){
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
                        
                        if(urlParams['lead_by'] == "bs"){
                            if (data.lead_status == null || data.lead_status == "" ) {
                                lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><div class="form-group m-form__group"> <label class="col-form-label"><b>Status:</b></label> <select name="status_id" class="form-control m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Select Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                            }else if(data.assign_to == "" || data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                //console.log("else if : "+data.assign_to);
                                lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Status:</b> '+data.lead_status + '<div class="form-group m-form__group"> <select name="status_id" class="form-control mt-2 m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Change Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                            }else{
                                lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Status:</b> '+data.lead_status;
                            }
                            
                        }else{
                        
                            if (data.lead_status == null || data.lead_status == "") {
                                lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Lead Type:</b> '+data.lead_type+'<div class="form-group m-form__group"> <label class="col-form-label"><b>Status:</b></label> <select name="status_id" class="form-control m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Select Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                            }else if( data.assign_to == '<?php echo $this->session->balance_session['first_name']; ?>'){
                                lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>Lead Type:</b> '+data.lead_type+'<br><b>Status:</b> '+data.lead_status + '<div class="form-group m-form__group"> <select name="status_id" class="form-control mt-2 m-input lead_change_status" onchange="lead_change_status(this)" data-lead_id="'+data.id+'" data-lead_email="'+data.email+'" data-stage="'+data.stage+'"> <option value="">Change Status</option> <?php for ($k=0; $k <count($lead_status) ; $k++) { ?> <option value="<?php echo $lead_status[$k]['id']; ?>" <?php echo(set_value('status_id') == $lead_status[$k]['id'])?'selected':''; ?> data-stage="<?php echo $lead_status[$k]['stage']; ?>"><?php echo $lead_status[$k]['status_name']; ?></option> <?php } ?> </select> </div>';
                            }else{
                                lead_status_html = '<b>Source:</b> '+data.lead_source+'<br><b>L. Type:</b> '+data.lead_type+'<br><b>Status:</b> '+data.lead_status;
                            }
                        }
                        
                        var health_pro_details = "";
                        
                        if(urlParams['lead_by'] == "bs"){
                            var wtDiff = '';
                            if(data.wt_diff == null || data.wt_diff == ''){
                                wtDiff = "NA";
                            }else{
                                wtDiff = data.wt_diff+'kg';
                            }
                            health_pro_details =  '<b>Program Name:</b> '+data.program_name+'<br><b>Pro. Dur. Days:</b> '+data.prog_duration+'<br><b>Wt. Diff.:</b> '+wtDiff+'<br><b>Mentor :</b> '+data.mentor;
                        }else{
                            health_pro_details = '<b>Health Category:</b> '+data.health_category+'<br><b>Medi. Issues:</b> '+data.health_issues+'<br><b>Curr. Wt.:</b> '+data.weight+'<br><b>BMI:</b> '+data.body_mass_index+'<br><b>Ideal Wt.:</b> '+data.ideal_weight;
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
                  $(row).addClass('stage_4_color');
                } else if ( data.stage == 3) {
                  $(row).addClass('stage_3_color');
                } else if ( data.stage == 2) {
                  $(row).addClass('stage_2_color');
                } 
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
    
    var get_id = '<?php echo @$_GET['lead_by'] ?>';
    
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
                current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1];
                
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
                current_url += seperator+'agf='+age_range[0]+'&agt='+age_range[1];
                
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
</script>