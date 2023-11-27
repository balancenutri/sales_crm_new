<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->

<!--begin::Base Scripts -->        
<script src="<?= base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->

<script src="<?= base_url()?>assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>

<script src="<?= base_url()?>assets/demo/default/custom/components/base/sweetalert2.js" type="text/javascript"></script>

<!--begin::Page Vendors --> 
<script src="<?= base_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->

<script src="<?= base_url()?>assets/demo/default/custom/components/forms/widgets/ion-range-slider.js" type="text/javascript"></script>
<script src="<?= base_url()?>assets/demo/default/custom/components/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            
<!--begin::Page Resources --> 
<script src="<?= base_url()?>assets/demo/default/custom/components/calendar/external-events.js" type="text/javascript"></script>
<!--end::Page Resources -->

<script src="<?= base_url()?>assets/demo/default/custom/components/forms/validation/form-controls.js" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.2/js/dataTables.select.min.js"></script>

<script src="//cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<!--begin::Page Snippets --> 
<script src="<?= base_url()?>assets/app/js/dashboard.js" type="text/javascript"></script>
<!--<script src="assets/js/mentor_dashboard.js" type="text/javascript"></script>-->

<script>
    var BootstrapTimepicker={init:function(){ $(".custom_timepicker").timepicker({minuteStep:15})}};jQuery(document).ready(function(){BootstrapTimepicker.init()});
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
    
    $(document).ready(function() {
        
        $(".custom_datetimepicker").datetimepicker();
        
        $(".custom_datepicker").datepicker();
        
        $(".add_datepicker").datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            startDate: truncateDate(new Date()),
            autoclose: true,
        });
        
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
    
    function truncateDate(date) {
      return new Date(date.getFullYear(), date.getMonth(), date.getDate());
    }
    
    $('#mentorreminderModal').on('hidden.bs.modal', function (e) {
      // do something...
    //   $("#mentorreminderModal form").find("input[type=text], textarea").val("");;
    });
    
    $(function() {
    	var base_url= "<?php echo base_url(); ?>";
    	//m_quicksearch_input
    	$( ".search-place" ).autocomplete({
    	    
    	   // var keyword = $(this).val();
    
    		minLength:3,   
    		delay:500,   
    		source: function (request, response) {
    
    			var path = base_url+'lead/global_search';
    			$.ajax({
    				type: 'POST',
    				url: path,
    				data: { term: request.term },
    				dataType: "json",
    				success: response,
    				beforeSend:function(){
    				    $("#search_div").addClass('m-loader m-loader--primary m-loader--right');
    				    // $("#basic-addon1 i").hide();
    				},
    				complete:function(){
    				    $("#search_div").removeClass('m-loader m-loader--primary m-loader--right');
    				    // $("#basic-addon1 i").show();
    				},
    				error: function () {
    					response([]);
    				}
    			});    
    		},
    
    		select: function( event, ui )
    		{ 
    			user_email = ui.item.email_id;
    			user_status = ui.item.user_status;
    			
    // 			alert(value);
    			var url = base_url+'user_details?user_email='+user_email+'&user_status='+user_status;
    			window.open(url,'_blank');
    		}
    
    	});
    });
    
    function assigned_user(l_id){
        
        var assign_id = $(l_id).find('option:selected').val();
        var assign_name = $(l_id).find('option:selected').text();
        var lead_id = $(l_id).data('lead_id');
        var lead_email = $(l_id).data('lead_email');
        // var lead_email_alternate = $(l_id).data('alternate_email');
        // var lead_phone_alternate = $(l_id).data('alternate_phone');
        var path = "<?php echo base_url()?>lead/get_lead_action";
        var appendText = "";
        
        // alert(lead_email_alternate);
        
                       
           $.ajax({
              type: "POST",
              url : path,
               data: {assign_id:assign_id,assign_name:assign_name,lead_email:lead_email,lead_id:lead_id},
            //   data: {assign_id:assign_id,assign_name:assign_name,lead_email:lead_email,lead_id:lead_id,lead_email_alternate:lead_email_alternate,lead_phone_alternate:lead_phone_alternate},
              dataType:"JSON",
              success:function(resp){
                  alert(resp.message);
                  appendText += resp.print_message;
                //   appendText.text(assign_id);
                // document.getElementById("assigned_user"+lead_id).innerHTML =  resp.assign_to;
              },
              complete:function(){
                
                // $("#assigned_user"+lead_id).text(resp.assign_to);
              }
           });
    }
    
    function lead_change_status(id){
        var lead_status = $(id).find('option:selected').text();
        var lead_stage = $(id).data('stage');
        var lead_id = $(id).data('lead_id');
        var lead_email = $(id).data('lead_email');
        var path = "<?= base_url(); ?>lead/get_lead_status_action";
        var appendText = "";
       $.ajax({
              type: "POST",
              url : path,
              data: { lead_id:lead_id,lead_email:lead_email,lead_status:lead_status,lead_stage:lead_stage},
              dataType:"JSON",
              success:function(resp){
                  alert(resp.message);
                  appendText += resp.print_message;
              },
              complete:function(){
                
                // $("#assigned_user"+lead_id).text(appendText);
              }
       });
    }
    
    function leadChangeSource(id){
        var lead_source = $(id).find('option:selected').text();
        var lead_stage = $(id).data('stage');
        var lead_id = $(id).data('lead_id');
        var lead_email = $(id).data('lead_email');
        var path = "<?= base_url(); ?>lead/leadChangeSource";
        var appendText = "";
       $.ajax({
              type: "POST",
              url : path,
              data: { lead_id:lead_id,lead_email:lead_email,lead_source:lead_source,lead_stage:lead_stage},
              dataType:"JSON",
              success:function(resp){
                  alert(resp.message);
                  appendText += resp.print_message;
              },
              complete:function(){
                $("#source_id_"+lead_id).text(lead_source);
              }
       });
    }
    
    function phase_change_status(id){
        var lead_stage = $(id).data('stage');
        var lead_id = $(id).data('lead_id');
        var lead_email = $(id).data('lead_email');
        var lead_phase = $(id).find('option:selected').text();
        //console.log(lead_phase);return false;
        var path = "<?= base_url(); ?>lead/get_phase_status_action";
        var appendText = "";
       $.ajax({
              type: "POST",
              url : path,
              data: { lead_id:lead_id,lead_email:lead_email,lead_phase:lead_phase,lead_stage:lead_stage},
              dataType:"JSON",
              success:function(resp){
                  alert(resp.message);
                  appendText += resp.print_message;
              },
              complete:function(){
                
                // $("#assigned_user"+lead_id).text(appendText);
              }
       });
    }
    function suggested_program(id){
        var lead_stage = $(id).data('stage');
        var lead_id = $(id).data('lead_id');
        var lead_email = $(id).data('lead_email');
        var lead_suggested_program = $(id).find('option:selected').text();
        //console.log(lead_phase);return false;
        var path = "<?= base_url(); ?>lead/get_suggested_program_action";
        var appendText = "";
       $.ajax({
              type: "POST",
              url : path,
              data: { lead_id:lead_id,lead_email:lead_email,lead_suggested_program:lead_suggested_program,lead_stage:lead_stage},
              dataType:"JSON",
              success:function(resp){
                  alert(resp.message);
                  appendText += resp.print_message;
              },
              complete:function(){
                
                // $("#assigned_user"+lead_id).text(appendText);
              }
       });
    }
    function select_all_check(){
        $("#search_check_bulk").addClass("active show");
        $("#search_dt_range").removeClass("active show");
        $("#search_check_bulk").parent().parent().find("li:last-child a").addClass("active show");
        $("#search_check_bulk").parent().parent().find("li:first-child a").removeClass("active show");
        
        if ($(".select_all").is(':checked'))
            $(".export_check").prop('checked', true);
            //  $(this).prop('checked', true);
        else
            $(".export_check").prop('checked', false);
            //  $(this).prop('checked', false);
        
    }
    
    /*function export_list_pro_exp(type,date_range) { 
       if (confirm("Are you sure want to export?")) {
           var i = 0;
           var checked_elem = [];
               $('.export_check:checked').each(function () {
                   
                   checked_elem[i++] = $(this).val();
               }); 
               $(".export_check").prop('checked', false);
               $(".select_all").prop('checked',false);
            //   console.log(checked_elem);
            window.location.href = "<?php echo base_url().'lead/export_list?type=';?>"+type+"&date_range="+date_range+"&checked_elem="+checked_elem;
          
          
       }
    }*/
    
    function export_list(date_range,type) {
        // alert();
        
        var dateRange = date_range.split("?");
        
        if (confirm("Are you sure want to export?")) {
           var i = 0;
           var checked_elem = [];
               $('.export_check:checked').each(function () {
                   checked_elem[i++] = $(this).val();
               }); 
               $(".export_check").prop('checked', false);
               $(".select_all").prop('checked',false);
            //   console.log(checked_elem);
            window.location.href = "<?php echo base_url().'lead/export_list?'; ?>"+dateRange[1]+"&type="+type;
       }
    }
</script>
<!--end::Page Snippets --> 

<?php
if($page=='lead'){
    $this->load->view('lead_js');
}else{
$this->load->view('dashboard_js');
}
?>
