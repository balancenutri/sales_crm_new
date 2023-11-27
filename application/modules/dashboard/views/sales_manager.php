<style>
.m-tooltips, .ui-tooltip {
    height: auto !important;
}
.sub_text_count a{
    color: #fff;
}


	.faq-section .mb-0 > a {
		display: block;
		position: relative;
		text-decoration: none;
		color: Black;
		padding-top:5px;
		padding-bottom:5px;
		

	}
	
	.faq-section .mb-0 > a:after {
		font-family: "FontAwesome";
		content: "\f067";
		color:gray;
		position: absolute;
		right: 0;
		font-size:14px;
		font-weight: 400;


	}
	
	.faq-section .mb-0 > a[aria-expanded="true"]:after {
		content: "\f068";
		color:gray;
		  font-weight: 400;

	}
	
/*	.vertical {
		border-left: 1px solid gray;
		height: auto;
	}*/
	
	.monthlookdetail h1 {
		text-align: center;
		font-size: 18px;
		padding-top: 10px;
	}
	
	.monthlookdetail h2 {
		text-align: center;
		font-size: 15px;
		padding-top: 10px;
	}
	
	.testlist table {
		border: none;
		text-align: center;
		font-size: 16px;
	}
	.testlist1 {

		text-align: center;
		font-size: 16px;

	}
	
	.table td {
		border: none;
	}
		 		 	.table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
	.table tr:nth-child(even){background-color: #f2f2f2;}
	
	.table tr th {
		border: none;
	}
	.table td, .table th {
  border: 1px solid #ddd;
  padding: 8px;
}

	
	
	
	.table tr {
		margin-bottom: 0px;
		padding-bottom: 0px;
	}
	
.table2 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table2 td, .table2 th {
  border: 1px solid #ddd;
  padding: 8px;
}

/*.table2 tr:nth-child(even){background-color: #f2f2f2;}*/

/* .table2 tr:hover {background-color: #ddd;}*/

/*.table2 th{*/
/*		 		 		padding-top: 12px;*/
/*  padding-bottom: 12px;*/
/*  text-align: left;*/
  /*background-color: #04AA6D;*/
/*  color: white;*/
/*		 		 	}*/
	
	.card_img {
		padding: 5px;
		width: 30%;
		height: 85px;
	}
	
	.card_img img {
		border-radius: 50%;
		height: 10px;
		width: 10px;
	}
	.card_detail {
		margin-bottom: 10px;
	}
	.card_detail h5 {
		  font-family: Arial, Helvetica, sans-serif;

		font-size: 18px;
		color:#3895d3;
	}
	.card_detail span {
		font-size: 14px;
		  font-family: Arial, Helvetica, sans-serif;

	}
	.card_lead span {
		  font-family: Arial, Helvetica, sans-serif;

		
		font-size: 14px;
		margin-top: 0px;
		margin-bottom: 0px;
		padding-top: 0px;
		padding-bottom: 0px;
	}
	.card_lead ul {
	
		font-size: 11px;
		margin-top: 0px;
		margin-bottom: 0px;
		padding-top: 0px;
		padding-bottom: 0px;
		  list-style-type: none;

	}
	.card_bottom h4 {
		  font-family: Arial, Helvetica, sans-serif;
         
		font-size: 18px;
		
	}
	hr.new1 {
 margin: 0px;
   border-top: 1px solid gray;
   
  }
.card{
  border:none;
  border-radius:10px;
  }
  
  /*.card{
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.1);

  }*/
 /* .card-header{
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.1);

  }*/
    
/*chart css*/
.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 660px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}





</style>




<!--sales_manager_section start-->

	<section>
		<div class="container-fluid ">
			<div class="card-body">
				<div class="flex flex-column mb-5 mt-4 faq-section">
					<div class="row">
						<div class="col-md-12">
							<div id="accordion">
								<div class="card mb-4">
									<div class="card-header" id="how_your_month"  style="background-color: white;">
										<h5 class="mb-0">
                                      <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1" class="how_your_month">
                                      How Your Month Looks</a></h5> 
                                      <!--<p style="font-size: 9px ; padding: 2px;margin: 0px" id="update_date">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>-->
                                      <p style="font-size: 9px ; padding: 2px;margin: 0px" id="update_date_time">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                                      </div>
									<div id="collapse-1" class="collapse" data-parent="#accordion" aria-labelledby="how_your_month">
										<div class="row m-2">
											<div class="col-lg-6">
												<div class="monthlookdetail">
													<h1 id="all_leads">All Leads</h1> </div>
												<div class="testlist1">
													<table class="table" id="available_leads">
														<tbody>
															
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-lg-6">
												
											        <nav>
                                                      <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="color: black;font-size: initial; font-size: 18px;"><h6>Stage</h6></a>
                                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;"><h6>Phase</h6></a>
                                                    </div>
                                                    </nav>
                                                    <div class="tab-content testlist" id="nav-tabContent">
                                                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <table class="table" id="stages">
														<tbody>
															
														</tbody>
													</table>
                                                      </div>
                                                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                        <table class="table" id="phases">
    														<tbody>
    															
    														</tbody>
												        </table>
                                                      </div>
                                                    </div> 
												
											</div>
										</div>
										<hr>
										<div class="row d-flex justify-content-center m-2">
											
											<div class="col-lg-4">
												<div class="monthlookdetail text-danger">
													<h1 id="hot"> Hot -</h1>
												</div>
												<div class="testlist1">
													<table class="table" id="hot_status">
														<tbody>
														    
														</tbody>
													</table>
												</div>
											</div>
											
											<div class="col-lg-4">
												<div class="monthlookdetail text-warning">
													<h1 id="warm">Warm -</h1>
												</div>
												<div class="testlist1">
													<table class="table" id="warm_status">
														<tbody>
															 
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="monthlookdetail text-primary">
													<h1 id="cold">Cold -</h1>
												</div>
												<div class="testlist1">
													<table class="table" id="cold_status">
														<tbody>
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<hr>
										<div class="row d-flex justify-content-center m-2">
											<div class="col-lg-4">
												<div class="monthlookdetail text-danger">
													<h6 style="text-align: center;" id="hot_downgrade90days">Hot Downgrade</h6> 
												</div>
												<div class="testlist">
													<table class="table" id="hot_substatus_downgrade90days">
														<tbody>
														
														</tbody>
													</table>
												</div>
											</div>
											
											<div class="col-lg-4">
												<div class="monthlookdetail text-warning">
													<h6 style="text-align: center;" id="warm_downgrade90days">Warm Downgrade</h6> 
												</div>
												<div class="testlist">
													<table class="table" id="warm_substatus_downgrade90days">
														<tbody>
															
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-lg-4">
									
											</div>
										</div>
									</div>
								</div>
								
								<div class="card mb-4">
									<div class="card-header" id="how_your_day" style="background-color: white;">
										<h5 class="mb-0">
                                          <a class="collapsed how_your_day" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2"> How Days Looks</a></h5> 
                                          <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                                          </div>
									<div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="how_your_day">
										<div class="row m-2">
											<div class="col-lg-4 border border-left-0 border-top-0 border-bottom-0">
												<div class="monthlookdetail">
													<h1 id='all_leads_today'>Lead - </h1> </div>
												<div class="testlist">
													<table class="table" id='stage_wise_lead_today'>
														<tbody >
															<tr><td>Stage 1</td><td>65</td></tr>
															<tr><td>Stage 2</td><td>65</td></tr>
															<tr><td>Stage 3</td><td>65</td></tr>
															<tr><td>Stage 4</td><td>65</td></tr>
															<tr><td>Basic Stacks</td><td>65</td></tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-lg-8">
												<div class="monthlookdetail">
													<h1>Actions</h1></div>
												<div class="row">
													<div class="col-md-3">
														<div class="monthlookdetail">
															<h2><b>Due</b></h2> </div>
														<div class="testlist">
															<table class="table" id="due">
																<tbody>
																	<tr><td>Fus</td><td class='m-list-timeline__time top_list_count today_fus_notification_looks' data-toggle='modal' data-target='#sales_summary_popup' data-id='today_fus_notification_looks' id='today_fus_notification' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'><span>0</span></td></tr>
																	<tr><td >Consultation Call</td><td class='m-list-timeline__time top_list_count calls_scheduled_call_data' data-toggle='modal' data-target='#sales_summary_popup' data-id='calls_scheduled_call_data' id='calls_scheduled_data' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'><span>0</span></td></tr>
																	<tr><td>To Pay</td><td class='m-list-timeline__time top_list_count balance_due_count_data' data-toggle='modal' data-target='#sales_summary_popup' data-id='balance_due_count_data' id='balance_due_count' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'><span>0</span></td></tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-md-6">
														<div class="monthlookdetail">
															<h2><b>Done</b></h2></div>
														<div class="testlist">
															<table class="table" id="done_data">
																<tbody>
																	<tr><td>Fus</td><td class='m-list-timeline__time top_list_count fu_done_today_data' data-toggle='modal' data-target='#sales_summary_popup' data-id='fu_done_today_data' id='fu_done_today' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'>0</td></tr>
																	<tr><td>Consultation Call</td><td class='m-list-timeline__time top_list_count consultation_done_today' data-toggle='modal' data-target='#sales_summary_popup' data-id='consultation_done_today' id='consultation_done_today' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'>0</td></tr>
																	<tr><td>Action Assigned</td><td class='m-list-timeline__time top_list_count action_done_today_data' data-toggle='modal' data-target='#sales_summary_popup' data-id='action_done_today_data' id='action_done_today' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'>0</td></tr>
																	<tr><td>HOT</td><td class='m-list-timeline__time top_list_count hot_today' data-toggle='modal' data-target='#sales_summary_popup' data-id='hot_today' id='hot_today' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'>0</td></tr>
																	<tr><td>Warm</td><td class='m-list-timeline__time top_list_count warm_today' data-toggle='modal' data-target='#sales_summary_popup' data-id='warm_today' id='warm_today' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'>0</td></tr>
																	<tr><td class='text-success' id='today_sale_amount'>Sales(Rs. 9k)</td><td class='m-list-timeline__time top_list_count today_sale' data-toggle='modal' data-target='#sales_summary_popup' data-id='today_sale' id='today_sale' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'>0</td></tr>
																</tbody>
															</table>
														</div>
													</div>
													<div class="col-md-3">
														<div class="monthlookdetail">
															<h2 class="text-danger"> <b>Missed</b></h2> </div>
														<div class="testlist">
															<table class="table"  id="missed_data">
																<tbody>
																	<tr><td>Fus</td><td class='m-list-timeline__time top_list_count today_fus_missed_data_count' data-toggle='modal' data-target='#sales_summary_popup' data-id='today_fus_missed_data_count'id='today_fus_missed_data' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'><span>0</span></td></tr>
																	<tr><td >Consultation Call</td><td class='m-list-timeline__time top_list_count today_consultation_missed_count_data' data-toggle='modal' data-target='#sales_summary_popup' data-id='today_consultation_missed_count_data' id='today_consultation_missed_count' style='cursor:pointer;font-size: inherit !important;font-weight: 100;'><span>0</span></td></tr>
																	<tr><td>Query</td><td style='cursor:pointer;font-size: inherit !important;font-weight: 100;'><a href='<?= base_url()?>chat' target='_blank' id='query_count'><span>0</span></a></td></tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card mb-4">
									<div class="card-header" id="cousellor-Wise" style="background-color: white;">
										<h5 class="mb-0">
                                          <a class="collapsed cousellor-Wise" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3"> Cousellor-Wise Snapshot</a></h5> 
                                          <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                                          </div>
									<div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="cousellor-Wise">
										<div class="row m-2" id='counsellor_snapshoot'>
										</div>
									</div>
								</div>
								<div class="row">
								    <div class="col-md-6">
								        <div class="card mb-4">
									<div class="card-header" id="source_wise_conversion" style="background-color: white;">
										<h5 class="mb-0">
                                          <a class="collapsed source_wise_conversion" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">MIS - Sourcewise Conversion </a></h5> 
                                          <!--<p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>-->
                                          </div>
									<div id="collapse-4" class="collapse" data-parent="#accordion" aria-labelledby="source_wise_conversion">
										<div class="row m-row--no-padding m-row--col-separator-xl" style="display:block">   
                                            <ul class="nav p-2" role="tablist">
                                                <li > 
                                                    <select class="form-control" name="month_source_wise" id="month_source_wise">
                                                        <option value="1">Curr. Month (MTD)</option>
                                                        <option value="-1">Prev. Month (<?php echo date('M', strtotime('last day of previous month'));?>)</option>
                                                        <option value="-3">Last 3 Month (<?php echo (date('M', strtotime('-3 months')))?> - <?php echo (date('M', strtotime('-1 months')))?>)</option>
                                                        <!--<option value="4">Fiscal Year (YTD)</option>-->
                                                    </select>
                                                </li>
                                            </ul>          
                                            <div>
                                            <div id="chartContainercount" style="height: 300px; width: 100%;"></div>
                                            <!--end:: Widgets/Stats2-1 -->
                                            </div>
                                        </div>
									</div>
								</div>
								    </div>
								    <div class="col-md-6">
								        <div class="card mb-4">
									<div class="card-header" id="conversion_ratio_funnal" style="background-color: white;">
										<h5 class="mb-0">
                                          <a class="collapsed conversion_ratio_funnal" role="button" data-toggle="collapse" href="#collapse-7" aria-expanded="false" aria-controls="collapse-4">MIS - Lead funnel</a></h5> 
                                          <!--<p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>-->
                                          </div>
									<div id="collapse-7" class="collapse" data-parent="#accordion" aria-labelledby="conversion_ratio_funnal">
										<div class="row m-row--no-padding m-row--col-separator-xl" style="display:block">   
                                            <ul class="nav p-2" role="tablist">
                                                <li > 
                                                    <select class="form-control" name="month_source_wise_conversion" id="month_source_wise_conversion">
                                                        <option value="1">Curr. Month (MTD)</option>
                                                        <option value="-1">Prev. Month (<?php echo date('M', strtotime('last day of previous month'));?>)</option>
                                                        <option value="-3">Last 3 Month (<?php echo (date('M', strtotime('-3 months')))?> - <?php echo (date('M', strtotime('-1 months')))?>)</option>
                                                        <!--<option value="4">Fiscal Year (YTD)</option>-->
                                                    </select>
                                                </li>
                                            </ul>          
                                            <div>
                                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                            <!--<div style="margin-top:16px;color:dimgrey;font-size:9px;font-family: Verdana, Arial, Helvetica, sans-serif;text-decoration:none;">Source: <a href="https://canvasjs.com/javascript-charts/funnel-chart/" target="_blank" title="JavaScript Funnel Charts &amp; Graphs ">https://canvasjs.com/javascript-charts/funnel-chart/</a></div>-->
                                            <!--end:: Widgets/Stats2-1 -->
                                            </div>
                                        </div>
									</div>
								</div>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!--sales_manager_section_end-->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
// window.onload = function () {


// }

</script>


<script>


    $('#source_wise_conversion').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var $datavalue = "";
        var month = $('#month_source_wise :selected').val();
        var isExpanded = $('.source_wise_conversion').attr("aria-expanded");
        if(isExpanded=="false"){
         var url = "<?php echo base_url().'dashboard/sales_manager_source_wise'?>"; 
          $.ajax({
                url: url,
                type: "POST",
                data:{month:month},
                dataType: "JSON",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success: function(data)
                {  
                    console.log(data);
                    var chart = new CanvasJS.Chart("chartContainercount", {
                        	animationEnabled: true,
                        // 	title:{
                        // 		text: "Source Wise Conversion",
                        // 		fontFamily: "arial black",
                        // 		fontColor: "#695A42"
                        // 	},
                            
                        	
                        	toolTip: {
                        		shared: true,
                        		content: toolTipContent
                        	},
                        	data: [{
                        		type: "stackedColumn",
                        		showInLegend: true,
                        		color: "#70db70",
                        		name: "Converted",
                        		toolTipContent: "{label}",
                        		dataPoints: [
                        			{ y: data.prime_converted, label:["Whatsapp : <b>"+data.whatsapp+"</b><br>Phone Enquiry :<b> "+data.phone_enquiry+"</b> <br>Walk-in : <b>"+data.walk_in+"</b><br>Zopim : <b>"+data.zopim]+"</b>",indexLabel:" "+data.prime_converted,all_lead:"All Leads <b>"+data.prime_all+"</b>"},
                        			{ y: data.social_media_converted, label:["Instagram : <b> "+data.instagram+"</b><br>Facebook : <b>"+data.facebook+"</b><br>LinkId : <b>"+data.linkId+"</b><br>Twitter : <b>"+data.twitter+"</b>"],indexLabel:" "+data.social_media_converted},
                        			{ y: data.health_score_converted, label:["Your BN Health Score : <b>"+data.your_bn_health_score+"</b><br>Health Score : <b>"+data.health_score_bn+"</b> <br>App Health Score : <b>"+data.app_health_score+"</b><br>Free Health Score 1 : <b>"+data.free_health_score1+"</b><br>Free Health Score : <b>"+data.free_health_score+"</b>"] ,indexLabel:" "+data.health_score_converted},
                        			{ y: data.referral_converted, label:["Referral : <b>"+data.referral_all+"</b>"], indexLabel:" "+data.referral_converted},
                        			{ y: data.registration_converted, label:["Registration : <b>"+data.registration_all+"</b>"],indexLabel:" "+data.registration_converted},
                        			{ y: data.web_converted, label:["Blog Popup : <b>"+data.blog_popup+"</b><br>Recipe Popup : <b>"+data.recipe_popup+" </b><br>Contact Form : <b>"+data.contact_form+"</b><br>Footer_enquiry : <b>"+data.footer_enquiry+"</b>"] ,indexLabel:" "+data.web_converted},
                        			{ y: data.others_converted, label:["Landing_page : <b>"+data.leading_page+"</b><br>Khyati_mam : <b>"+data.khyati_mam+"</b>"],indexLabel:" "+data.others_converted},
                        			{ y: data.paid_adds_converted, label:["Paid Adds : <b>"+data.paid_adds+"</b>"] ,indexLabel:" "+data.paid_adds_converted},
                        			
                        		]
                        		},
                        		{        
                        			type: "stackedColumn",
                        			showInLegend: true,
                        			name: "UnConverted",
                        			toolTipContent: "<span style='color:#4da6ff;'>{all_lead} </span>",
                        			color: "#ff3333",
                        			dataPoints: [
                        				{ y: data.prime_unconverted, label: "Prime Source",indexLabel:" "+data.prime_unconverted,all_lead:"All Leads : <b>"+data.prime_all+"</b>"},
                                        { y: data.social_media_unconverted, label: "Social Media",indexLabel:" "+data.social_media_unconverted,all_lead:"All Leads : <b>"+data.social_media+"</b>" },
                                        { y: data.health_score_unconverted, label: "Health Score",indexLabel:" "+data.health_score_unconverted,all_lead:"All Leads : <b>"+data.health_score+"</b>"},
                                        { y: data.referral_unconverted, label: "Referral" ,indexLabel:" "+data.referral_unconverted,all_lead:"All Leads: <b>"+data .referral_all+"</b>"},
                                        { y: data.registration_unconverted, label: "Registration",indexLabel:" "+data.registration_unconverted,all_lead:"All Leads : <b>"+data.registration_all+"</b>"},
                                        { y: data.web_unconverted, label: "Web",indexLabel:" "+data.web_unconverted,all_lead:"All Leads : <b>"+data.web+"</b>"},
                                        { y: data.others_unconverted, label: "Other",indexLabel:" "+data.others_unconverted,all_lead:"All Leads : <b>"+data.others+"</b>"},
                                        { y: data.paid_adds_unconverted, label:  "Paid Adds",indexLabel:" "+data.paid_adds_unconverted,all_lead:"All Leads : <b>"+data.paid_adds+"</b>"},
                        			]
                        	}]
                        });
                        chart.render();
                        
                        function toolTipContent(e) {
                        	var str = "";
                        	var total = 0;
                        	var str2, str3;
                        	return str;
                        }                       // end chart code
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    
    $('#month_source_wise').on('change', function(){
        // var counsellor_name = $('#counsellor_name option:selected').val();
        var month = $('#month_source_wise :selected').val();
        // alert(month);
        if(month!=""){
            var url = '<?php echo base_url().'dashboard/sales_manager_source_wise'?>';  
          $.ajax({
                url: url,
                type: "POST",
                data:{month:month},
                dataType: "JSON",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success: function(data)
                {  
                     console.log(data);
                    var chart = new CanvasJS.Chart("chartContainercount", {
                        	animationEnabled: true,
                        // 	title:{
                        // 		text: "Source Wise Conversion",
                        // 		fontFamily: "arial black",
                        // 		fontColor: "#695A42"
                        // 	},
                            
                        	
                        	toolTip: {
                        		shared: true,
                        		content: toolTipContent
                        	},
                        	data: [{
                        		type: "stackedColumn",
                        		showInLegend: true,
                        		color: "#70db70",
                        		name: "Converted",
                        		toolTipContent: "{label}",
                        		dataPoints: [
                        			{ y: data.prime_converted, label:["Whatsapp : <b>"+data.whatsapp+"</b><br>Phone Enquiry :<b> "+data.phone_enquiry+"</b> <br>Walk-in : <b>"+data.walk_in+"</b><br>Zopim : <b>"+data.zopim]+"</b>",indexLabel:" "+data.prime_converted,all_lead:"All Leads <b>"+data.prime_all+"</b>"},
                        			{ y: data.social_media_converted, label:["Instagram : <b> "+data.instagram+"</b><br>Facebook : <b>"+data.facebook+"</b><br>LinkId : <b>"+data.linkId+"</b><br>Twitter : <b>"+data.twitter+"</b>"],indexLabel:" "+data.social_media_converted},
                        			{ y: data.health_score_converted, label:["Your BN Health Score : <b>"+data.your_bn_health_score+"</b><br>Health Score : <b>"+data.health_score_bn+"</b> <br>App Health Score : <b>"+data.app_health_score+"</b><br>Free Health Score 1 : <b>"+data.free_health_score1+"</b><br>Free Health Score : <b>"+data.free_health_score+"</b>"] ,indexLabel:" "+data.health_score_converted},
                        			{ y: data.referral_converted, label:["Referral : <b>"+data.referral_all+"</b>"], indexLabel:" "+data.referral_converted},
                        			{ y: data.registration_converted, label:["Registration : <b>"+data.registration_all+"</b>"],indexLabel:" "+data.registration_converted},
                        			{ y: data.web_converted, label:["Blog Popup : <b>"+data.blog_popup+"</b><br>Recipe Popup : <b>"+data.recipe_popup+" </b><br>Contact Form : <b>"+data.contact_form+"</b><br>Footer_enquiry : <b>"+data.footer_enquiry+"</b>"] ,indexLabel:" "+data.web_converted},
                        			{ y: data.others_converted, label:["Landing_page : <b>"+data.leading_page+"</b><br>Khyati_mam : <b>"+data.linkId+"</b>"] ,indexLabel:" "+data.others_converted},
                        			{ y: data.paid_adds_converted, label:["Paid Adds : <b>"+data.paid_adds+"</b>"] ,indexLabel:" "+data.paid_adds_converted},
                        			
                        		]
                        		},
                        		
                        		
                        		{        
                        			type: "stackedColumn",
                        			showInLegend: true,
                        			name: "UnConverted",
                        			toolTipContent: "<span style='color:#4da6ff;'>{all_lead} </span>",
                        			color: "#ff3333",
                        			dataPoints: [
                        				{ y: data.prime_unconverted, label: "Prime Source",indexLabel:" "+data.prime_unconverted,all_lead:"All Leads : <b>"+data.prime_all+"</b>"},
                                        { y: data.social_media_unconverted, label: "Social Media",indexLabel:" "+data.social_media_unconverted,all_lead:"All Leads : <b>"+data.social_media+"</b>" },
                                        { y: data.health_score_unconverted, label: "Health Score",indexLabel:" "+data.health_score_unconverted,all_lead:"All Leads : <b>"+data.health_score+"</b>"},
                                        { y: data.referral_unconverted, label: "Referral" ,indexLabel:" "+data.referral_unconverted,all_lead:"All Leads: <b>"+data .referral_all+"</b>"},
                                        { y: data.registration_unconverted, label: "Registration",indexLabel:" "+data.registration_unconverted,all_lead:"All Leads : <b>"+data.registration_all+"</b>"},
                                        { y: data.web_unconverted, label: "Web",indexLabel:" "+data.web_unconverted,all_lead:"All Leads : <b>"+data.web+"</b>"},
                                        { y: data.others_unconverted, label: "Other",indexLabel:" "+data.others_unconverted,all_lead:"All Leads : <b>"+data.others+"</b>"},
                                        { y: data.paid_adds_unconverted, label:  "Paid Adds",indexLabel:" "+data.paid_adds_unconverted,all_lead:"All Leads : <b>"+data.paid_adds+"</b>"},
                        			]
                        	}]
                        });
                        chart.render();
                        
                        function toolTipContent(e) {
                        	var str = "";
                        	var total = 0;
                        	var str2, str3;
                        // 	for (var i = 0; i < e.entries.length; i++){
                        // 		var  str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\"> "+e.entries[i].dataSeries.label+"</span>: $<strong>"+e.entries[i].dataPoint.indexLabel+"</strong>bn<br/>";
                        // 		total = e.entries[i].dataPoint.y + total;
                        // 		str = str.concat(str1);
                        // 	}
                        // 	total = Math.round(total * 100) / 100;
                        // 	str3 = "<span style = \"color:Tomato\">Total:</span><strong> $"+total+"</strong>bn<br/>";
                        	return str;
                        }
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
             
          });
        }
        });
    
    
    

</script>

<!--chart code-->
<script>

    
    
    $('#conversion_ratio_funnal').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var $datavalue = "";
        var month = $('#month_source_wise_conversion :selected').val();
        var isExpanded = $('.conversion_ratio_funnal').attr("aria-expanded");
        if(isExpanded=="false"){
         var url = "<?php echo base_url().'dashboard/conversion_ratio_funnel'?>"; 
          $.ajax({
                url: url,
                type: "POST",
                data:{month:month},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(data)
                {  
                    console.log(data);
                    var chart = new CanvasJS.Chart("chartContainer", {
                    	animationEnabled: true,
                    	theme: "light2", //"light1", "dark1", "dark2"
                    // 	title:{
                    // 		text: "Lead funnel"
                    // 	},
                    	data: [{
                    		type: "funnel",
                    		indexLabelPlacement: "inside",
                    		indexLabelFontColor: "white",
                    		toolTipContent: "{lead}<br><b>{label}</b>: {y} <b>({percentage}%)</b>",
                    		indexLabel: "{label} ({percentage}%)",
                    		dataPoints: [
                    			{ y: data.consultation_done, label: "Lead to Consultation",lead:"All Leads "+ data.all_lead},
                    			{ y: data.const_sale, label: "Consultation to Sale", lead:"All Consultation "+ data.consultation_done},
                    			{ y: data.lead_sale, label: "Lead to Sale", lead:"All Leads "+ data.all_lead},
                    			{ y: data.hot_sale,  label: "Hot to Sale", lead:"Hot Leads "+ data.hot},
                    		],
                    		action :[
                    		    {y:data.all_lead},
                    		    {y:data.consultation_done},
                    		    {y:data.all_lead},
                    		    {y:data.hot},
                    		    ],
                                        	}]
                            });
                            calculatePercentage();
                            chart.render();
                            
                            function calculatePercentage() {
                            	var dataPoint = chart.options.data[0].dataPoints;
                            	var total = chart.options.data[0].action;
                            	for(var i = 0; i < dataPoint.length; i++) {
                            		
                            			chart.options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total[i].y) * 100).toFixed(2);
                            		
                            	}
                            }
                    
                                        // end chart code
                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    
    $('#month_source_wise_conversion').on('change', function(){
        // var counsellor_name = $('#counsellor_name option:selected').val();
        var month = $('#month_source_wise_conversion :selected').val();
        // alert(month);
        if(month!=""){
            var url = '<?php echo base_url().'dashboard/conversion_ratio_funnel'?>';  
          $.ajax({
                url: url,
                type: "POST",
                data:{month:month},
                dataType: "JSON",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success: function(data)
                {  
                     console.log(data);
                    var chart = new CanvasJS.Chart("chartContainer", {
                    	animationEnabled: true,
                    	theme: "light2", //"light1", "dark1", "dark2"
                    // 	title:{
                    // 		text: "Lead funnel"
                    // 	},
                    	data: [{
                    		type: "funnel",
                    		indexLabelPlacement: "inside",
                    		indexLabelFontColor: "white",
                    		toolTipContent: "{lead}<br><b>{label}</b>: {y} <b>({percentage}%)</b>",
                    		indexLabel: "{label} ({percentage}%)",
                    		dataPoints: [
                    			{ y: data.consultation_done, label: "Lead to Consultation",lead:"All Leads "+ data.all_lead},
                    			{ y: data.const_sale, label: "Consultation to Sale", lead:"All Consultation "+ data.consultation_done},
                    			{ y: data.lead_sale, label: "Lead to Sale", lead:"All Leads "+ data.all_lead},
                    			{ y: data.hot_sale,  label: "Hot to Sale", lead:"Hot Leads "+ data.hot},
                    		],
                    		action :[
                    		    {y:data.all_lead},
                    		    {y:data.consultation_done},
                    		    {y:data.all_lead},
                    		    {y:data.hot},
                    		    ],
                                        	}]
                            });
                            calculatePercentage();
                            chart.render();
                            
                            function calculatePercentage() {
                            	var dataPoint = chart.options.data[0].dataPoints;
                            	var total = chart.options.data[0].action;
                            	for(var i = 0; i < dataPoint.length; i++) {
                            		
                            			chart.options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total[i].y) * 100).toFixed(2);
                            		
                            	}
                            }
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
             
          });
        }
    });
    
    
    

</script>








