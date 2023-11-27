<div style="display:none">
<audio controls id="pop_tune" preload="none">  
  <source src="https://www.balancenutrition.in/pop_tune/eventually-590.ogg" type="audio/ogg">
  <source src="https://www.balancenutrition.in/pop_tune/eventually-590.mp3" type="audio/mpeg">
  <source src="https://www.balancenutrition.in/pop_tune/eventually-590.m4r" type="audio/mpeg">
</audio>
</div>

<link rel="stylesheet" href="https://www.balancenutrition.in/crm_ui/assets/countryFlag/css/intlTelInput.css" /> 
<script type="text/javascript" src="https://www.balancenutrition.in/crm_ui/assets/countryFlag/js/intlTelInput-jquery.min.js"></script>

<?php $link_array = explode('/',current_url());$page = end($link_array);?>

<script type="text/javascript">
//this js use for top navigaion 
$(document).ready(function(){
    $('.common_notification').on('click', function(e) 
        {
            var notifyId = $(this).attr('data-id');
          
            if(notifyId=="lead_capture_notification" || notifyId=="queries_notification" || notifyId=="do_notification" || notifyId=="lead_miss_notification" || notifyId=="balance_notification"){
              top_nav_counts(notifyId);
            }
      });
});



function top_nav_counts(notifyId){
    var base_url= "<?php echo base_url(); ?>";
    
    $.ajax({
       url : base_url+"dashboard/top_nav_counts",
       type: "POST",
       dataType:"JSON",
       beforeSend: function () {
            // $("#cover-spin").show();
        },
       success: function(response)
       {
           if(response)
           {
            //console.log(response);
               if(response['lead_capture_count'] > 0){
                    $('.lead_capture_count').removeClass('d-none').html(response["lead_capture_count"]);
                    $('.lead_capture_other_lead').html(response["lead_capture_other_lead"]);
               }
                if(response['query_count'] > 0){
                    $('.query_count').removeClass('d-none').html(response["query_count"]);
                }
                if(response['do_total_count'] > 0){
                    $('.do_total_count').removeClass('d-none').html(response["do_total_count"]);
                }
                if(response['lead_miss_count'] > 0){
                    $('.lead_miss_count').removeClass('d-none').html(response["lead_miss_count"]);
                }
                if(response['balance_count'] > 0){
                    $('.balance_count').removeClass('d-none').html(response["balance_count"]);
                }
           }
       },
        complete: function(){
            if(notifyId=="lead_capture_notification"){
                $("#lead_capture_notification").removeAttr("data-id");
            }else if(notifyId=="queries_notification"){
                $("#queries_notification").removeAttr("data-id");
            }else if(notifyId=="do_notification"){
                $("#do_notification").removeAttr("data-id");
            }else if(notifyId=="lead_miss_notification"){
                $("#lead_miss_notification").removeAttr("data-id");
            }else if(notifyId=="balance_notification"){
                $("#balance_notification").removeAttr("data-id");
            }
            $("#cover-spin").hide();
        },
       error: function (jqXHR, textStatus, errorThrown)
       {
           alert('Error get data from ajax');
       }
   }) 
}

$(document).on("click", ".m-dropdown--open", function(){
    $("#lead_capture_notification").attr("data-id", "lead_capture_notification");
    $("#queries_notification").attr("data-id", "queries_notification");
    $("#do_notification").attr("data-id", "do_notification");
    $("#lead_miss_notification").attr("data-id", "lead_miss_notification");
    $("#balance_notification").attr("data-id", "balance_notification");
});

// setInterval(all_counts_notify, 1000 * 60 * 15);

function all_counts_notify(){
    var base_url= "<?php echo base_url(); ?>";
    
    $.ajax({
        type:"POST", 
        url: base_url+"dashboard/top_nav_counts",
        dataType:'json',
        /*beforeSend: function () {
            $("#cover-spin").show();
        },*/
        success: function(response)
        {
            
            // avinash added this for review status update start
            if(response.first_half==1){
                $('#first_half').val(1);
                if($('#first_half').val() !=0){
                $('#first').removeClass('progtrckr-todo');
                $('#first').addClass('progtrckr-done');
                }
            }
            if(response.second_half == 1){
                $('#second_half').val(1);
                if($('#second_half').val() !=0){
                $('#second').removeClass('progtrckr-todo');
                $('#second').addClass('progtrckr-done');
                if($('#first_half').val() ==0){
                $('#first').removeClass('progtrckr-todo');
                $('#first').removeClass('progtrckr-done');
                $('#first').addClass('progtrckr-undo');
                }
                }
            }
            if(response.day_end ==1){
                $('#day_end').val(1);
                if($('#day_end').val() !=0){
                $('#end').removeClass('progtrckr-todo');
                $('#end').addClass('progtrckr-done');
                if($('#second_half').val() ==0){
                $('#second').removeClass('progtrckr-todo');
                $('#second').removeClass('progtrckr-done');
                $('#second').addClass('progtrckr-undo');
                }
                }
            }
            
            // avinash added this for review status update start
            
            if(response['lead_capture_count'] > 0){
                $(".lead_capture_count").removeClass('d-none').html(response['lead_capture_count']);
            }
            if(response['query_count'] > 0){
                $(".query_count").removeClass('d-none').html(response['query_count']);
            }
            if(response['do_total_count'] > 0){
             $(".do_total_count").removeClass('d-none').html(response['do_total_count']);
            }
            if(response['lead_miss_count'] > 0){
             $(".lead_miss_count").removeClass('d-none').html(response['lead_miss_count']);
            }
            
            if(response['balance_count'] > 0){
                $('.balance_count').removeClass('d-none').html(response["balance_count"]);
            }
            
            $(".balance_due_count").removeClass('d-none').html(response['balance_due_count']);
            $(".due_tomorrow_count").removeClass('d-none').html(response['due_tomorrow_count']);
            
            $(".balance_overdue_count").removeClass('d-none').html(response['balance_overdue_count']);
            
            // if(response['today_fus_notification'] > 0){
                $(".today_fus_notification").removeClass('d-none').html(response['today_fus_notification']);
            // }
            
            // Avinash code for hor and warm notification start
            $(".payment_link").removeClass('d-none').html(response['get_link_count']);
            $(".hot_pending_notification").removeClass('d-none').html(response['hot_pending_notification']);
            $(".warm_pending_notification").removeClass('d-none').html(response['warm_pending_notification']);
            $(".to_engage_pending_notification").removeClass('d-none').html(response['to_engage_pending_notification']);
            // Avinash code for hor and warm notification end
            $(".lead_pending_detail").removeClass('d-none').html(response['update_lead_misses']);
            
            $(".today_no_action_planed").removeClass('d-none').html(response['no_action_planned']);
            // Avinash code for hor and warm notification end
            
            $(".today_reminder_notification").removeClass('d-none').html(response['today_reminder_notification']);
            
            $(".fus_missed_count").removeClass('d-none').html(response['today_fus_missed_data']);
            
            $(".calls_scheduled_count").removeClass('d-none').html(response['calls_scheduled_data']);
            
            $(".today_consultation_missed").removeClass('d-none').html(response['today_consultation_missed_count']);
            
            if(response['unanswered_queries_count'] > 0){
                $(".today_query_count").removeClass('d-none').html(response['unanswered_queries_count']);
            }
            //Added by Navin
            if(response['lead_capture_stage1_count'] > 0){
                $(".lead_capture_stage1_count").removeClass('d-none').html(response['lead_capture_stage1_count']);
            }
            if(response['lead_capture_stage2_count'] > 0){
                $(".lead_capture_stage2_count").removeClass('d-none').html(response['lead_capture_stage2_count']);
            }
            if(response['lead_capture_stage3_count'] > 0){
                $(".lead_capture_stage3_count").removeClass('d-none').html(response['lead_capture_stage3_count']);
            }
            if(response['lead_capture_stage4_count'] > 0){
                $(".lead_capture_stage4_count").removeClass('d-none').html(response['lead_capture_stage4_count']);
            }
            
            // $("#cover-spin").hide();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
           alert(errorThrown);
        }

    });
    
}

all_counts_notify();
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

$('.search_section a[data-toggle="tab"]').on('shown.bs.tab', function (event) {
  event.target // newly activated tab
  $('.search_section').css({
      "padding": "0 0 1rem",
        "border-bottom": "1px solid #00000020",
        "margin": "0 0 1rem"
  });
//   alert(event.target);
});

function getOrdinalNum(n) {
  return n + (n > 0 ? ['th', 'st', 'nd', 'rd'][(n > 3 && n < 21) || n % 10 > 3 ? 0 : n % 10] : '');
}

function reminder_formatDate(date) {
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

$(document).ready(function(){
    
    // $('#mentorreminderModal').on("shown.bs.modal",function(){
    
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
            // alert("test");
            var reminder_title = $("#reminder_title").val();
            var reminder_note =  $("#reminder_note").val();
            var reminder_date = $(".reminder_date").val();
            var reminder_me = $("#reminder_me:checked").val();
            
            // alert(reminder_me); return false;
            
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
           
           
            var url = "<?php echo base_url('dashboard/update_reminder'); ?>";
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
                var timepick = ("0" + dt.getHours()).slice(-2) + ":" + ("0" + dt.getMinutes()).slice(-2) + ":" + ("0" + dt.getSeconds()).slice(-2);
                var day = monthValue + "/" + dt.getDate() + "/" + dt.getFullYear();
                
                // alert(day);
                
                var reminder_dt = new Date(reminder_date);
                
                console.log(day+" :: "+reminder_date+" :: "+timepick+" :: "+reminder_time);
                
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
                    //console.log("elseif : passed time");
                    $("#mentorreminderModalTitle").html("");
                   $(".mentor_reminder_form_sec").hide();
                    $(".mentor_reminder_passedtime_message").show(); 
                }
                else{
                    $("#mentorreminderModalTitle").html("");
                    $("#dt_confirm").html("Set a reminder for "+reminder_formatDate(reminder_date)+" "+$(".reminder_time").val()+" IST ?");
                    $(".mentor_reminder_success_message").show();
                    $(".mentor_reminder_form_sec").hide();
                } 
                
                
                $(".save_reminder_message").click(function(){
                    
                    var response = 1;
                    $.ajax({
                         type:'post',
                         url:url,
                         data: {reminder_title:reminder_title,reminder_note:reminder_note,reminder_date:reminder_date,reminder_time:reminder_time,reminder_me:reminder_me},
                         
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
    
    // });
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
    
    $(".custom_date_picker1").datepicker({format:"yyyy-mm-dd"});
}

function updateReminder(reminder_id){
    var title = $("#title-"+reminder_id).val();
    var text = $("#text-"+reminder_id).val();
    var time = $("#time-"+reminder_id).val();
    var date = "";
    if($("#date-"+reminder_id).length > 1){
      date = $("#date-"+reminder_id).val();
    }
    // alert($("#text-"+reminder_id).val());
        $.ajax({
             type:'post',
             url:"<?php echo base_url('dashboard/update_reminder_data'); ?>",
             data: {id:reminder_id,title:title,text:text,time:time,date:date},
             
             success:function(response)
             {  
                 if(response == 1){
                    swal({
                    title: 'Successfully Updated',
                    timer: 2000,
                    showConfirmButton: false
                    }); 
                    
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
                    
                }
                
             },
             complete: function(){
                 window.location.reload();
             }
        });
} 

var allow_mentor_popup = true;

mentor_reminder_popup();
function mentor_reminder_popup(){
    
    var url = "<?= base_url() ?>dashboard/get_today_reminder_list";
    
    $.ajax({
        type:'post',
        url:url,
        //  data: {reminder_id:data[i].id},
        dataType: "json",
        success:function(data)
        {
            var today = new Date();
            var call_time = new Date(today.getTime() + 15*60000);
           
            var h = call_time.getHours();
            var m = call_time.getMinutes();
            var s = '00';
                m = checkTime(m);
            var call_time_15 = (h + ":" + m + ":" + s).toString();
            //   console.log(call_time_15);
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
           
           if(data.today_reminder_list != null){
               
               $.each(data.today_reminder_list, function(index,value){
                   
                   var rm_date = value.start_date;
                   var arr = rm_date.split(" ");
                   
                //   console.log(arr[0]);
                   
                   if(call_time_15 == arr[1] && value.remind_me == 1){
                       
                       if(value.task_name =='Consultation Call'){
                       $.ajax({          // avinash added for email to client for consultation call before 15 minuts
                                type:'post',
                                url:'<?= base_url() ?>dashboard/send_email_for_consultation',
                                 data: {email_id:value.email_id,start_date:arr[0],start_time:arr[1],name:value.name},
                                dataType: "json",
                                success:function(data)
                                {
                                    
                                }
                       })
                           
                       }
                       allow_mentor_popup = false;
                       var pop = document.getElementById("pop_tune");  // avinash added for popup tune
                            pop.play();
                       var notification_text = "<p><b>"+value.task_name+"</b></p><p>"+value.reminder_text+" With</p><br><a href=<?= base_url()?>user_details?user_email="+value.email_id+"&user_status=lead target='_blank' style='color:blue;text-decoration:underline;'>"+value.email_id+"</a> ( "+value.phone+" )";
                       var wp =(value.phone);
                                    if(wp!='' && wp!=null){
                                      if(wp.length >10){
                                        var wp_phone = wp.split('-');
                                        var whats_phone = wp_phone[1];
                                    }else{
                                        whats_phone =value.phone;
                                    }  
                                    }else{
                                        whats_phone =value.phone;
                                    }
                       swal({
                            title: "Due in 15 Minutes!",
                            html: notification_text,
                            confirmButtonText:"<a style='color:#fff;' href='https://wa.me/"+whats_phone+"/?text=Hi "+value.name+",%0a%0aI will be connecting you shortly in regards to your concerns, and doubts %26 also help you choose the best program. In case you haven%27t filled out the health form I sent you, please do so. Click here : https://www.balancenutrition.in/health-score %0aSr. Nutritionist, <?=$_SESSION['balance_session']['first_name'];?> %0aBalance Nutrition ' class='mr-3' target='_blank'><i class='fa fa-whatsapp' style='margin-right:10px;'></i></a><a href=<?= base_url()?>user_details?user_email="+value.email_id+"&user_status=lead target='_blank'>View</a>"
                        }).then(function () { 
                            
                            allow_mentor_popup = true; });
                   }
                   
               });
               
                /*for(var i = 0;i<data.today_reminder_list.length;i++){
                    if(call_time_15 == data[i].reminder_time){
                        allow_mentor_popup = false;
                        var notification_text = "<br><p style='font_size:x-large'><b>"+data[i].reminder_title+"</b></p><p style='font_size:larger'>"+data[i].reminder_text+"</p>";
                        swal({
                            title: "Due in 15 Minutes!",
                            html: notification_text,
                            confirmButtonText:"Great!"
                        }).then(function () { allow_mentor_popup = true; });
                        
                    }
                }*/
           }
         }
    });
}

function review_popup(){
    var today = new Date();
    var call_time = new Date(today.getTime() + 1*60000);
   
    var h = call_time.getHours();
    var m = call_time.getMinutes();
    var s = '00';
        m = checkTime(m);
    var call_time = (h + ":" + m + ":" + s).toString();
      console.log(call_time);
    
    if(call_time == "10:15:00"){
        var pop = document.getElementById("pop_tune");  // avinash added for popup tune
        pop.play();
        $("#day_planner_modal").modal('show');
        //review_data();
    }else if(call_time == "13:30:00"){
        var pop = document.getElementById("pop_tune");  // avinash added for popup tune
        pop.play();
        $("#first_half_review_modal").modal('show');
        review_data();
    }else if(call_time == "16:30:00"){
        var pop = document.getElementById("pop_tune");  // avinash added for popup tune
        pop.play();
        $("#second_half_review_modal").modal('show');
        review_data();
    }else if(call_time == "19:00:00"){
        var pop = document.getElementById("pop_tune");  // avinash added for popup tune
        pop.play();
        $("#day_end_review_modal").modal('show');
        review_data();
    }else if(call_time == "18:00:00"){
        var pop = document.getElementById("pop_tune");  // avinash added for popup tune
        pop.play();
        $('.to_engage_pending_notification').trigger('click');
    }else if(call_time == "18:30:00"){
        var pop = document.getElementById("pop_tune"); 
        pop.play();
        var page = "<?php echo $page;?>";
        if(page=='dashboard'){
            $('.payment_link').trigger('click');
            var url = "<?= base_url() ?>dashboard/links_expiring_48hrs";
            $.ajax({
                type:'post',
                url:url,
                data: {},
                dataType: "json",
                beforeSend:function(){
                    //$("#cover-spin").show();  
                },success:function(data)
                {
                    
                },
               complete:function(){
                    //$("#cover-spin").hide();
               }
            });
        }
    }else if(call_time == "11:00:00"){
        var pop = document.getElementById("pop_tune"); 
        pop.play();
        var page = "<?php echo $page;?>";
        if(page=='dashboard'){
            $('.payment_links_expired').trigger('click');
            var url = "<?= base_url() ?>dashboard/links_expired";
            $.ajax({
                type:'post',
                url:url,
                data: {},
                dataType: "json",
                beforeSend:function(){
                    //$("#cover-spin").show();  
                },success:function(data)
                {
                    
                },
               complete:function(){
                    //$("#cover-spin").hide();
               }
            });
        }
    }
    
}

review_data();

function review_data(){
    var url = "<?= base_url(); ?>dashboard/get_review_data";
    $.ajax({
       type : "POST",
       url  : url,
       dataType:"json",
       beforeSend:function(){
        //  $("#cover-spin").show();  
       },
       success:function(data){
            console.log(data);
           $(".total_lead_assigned_count").html(data['total_lead_assigned']);
           $(".html_primary_source").html(data['count_html']);
           $(".html_primary_source_all").html(data['count_html_all']);
           $(".fu_done_today_count").html(data['fu_done_today']);
           $(".consultation_done_today_count").html(data['consultation_done_today']);
           $(".today_hot_count").html(data['today_hot']);

           $(".total_lead_assigned_mtd_new").html(data['total_lead_assigned_mtd_new']);
           $(".fu_done_mtd").html(data['fu_done_mtd']);
           $(".consultation_done_mtd_new").html(data['consultation_done_mtd']);
           $(".hot_mtd").html(data['hot_mtd']);
           $(".phase3_phase4").html(data['phase3_phase4']);
           $(".stage3_stage4").html(data['stage3_stage4']);
           $(".no_phase_new").html(data['no_phase_new']);
           
           $(".today_fus_missed_count").html(data['today_fus_missed_data']);
           $(".today_calls_miss_count").html(data['today_calls_miss_data']);
           $(".today_sales_count").html(data['today_sales'][0]['unit']);
           $(".today_sales_amt").html(data['today_sales'][0]['amt']);
           //   avinash added this-28-01-2022
          $(".today_balance_sales_count").html(data['today_sales'][0]['unit_balance']);
          $(".today_balance_sales_amt").html(data['today_sales'][0]['balance']);
           //   avinash added this-28-01-2022

          $(".phase1_phase2").html(data['phase1_phase2']);
          $(".phase3_phase4").html(data['phase3_phase4']);
          $(".stage3_stage4").html(data['stage3_stage4']);
          $(".stage1_stage2").html(data['stage1_stage2']);
          $(".total_lead_mtd_new").html(data['total_lead_mtd_new']);
          $(".total_sales_new").html(data['total_sales_new']);
          $(".age_distributation").html(data['age_distributation']);
          $(".to_engage").html(data['to_engage']);
          $(".consultation_unconverted").html(data['consultation_unconverted']);

          $(".total_sales_new").html(data['total_sales_new']);
          $(".total_sales_new_count").html(data['total_sales_new_count']);
        //   avinash added this-28-01-2022
          $(".total_balance_sales_new").html(data['total_balance_sales_new']);
          $(".total_balance_sales_new_count").html(data['total_balance_sales_new_count']);
        //   avinash added this-28-01-2022
          to_engage = $(".to_engage").html();
           if(data['today_task']!=''){
                for(var i=0;i<12;i++ ){
                    if(i==0){
                        id="09";
                    }else{
                        id=i+parseInt(9);
                    }
                    if(data['today_task'][i]['task_name']!=''){
                        $('#'+id).replaceWith('<div id="'+id+'" style="float:left;">'+data['today_task'][i]['task_name']+'</div><a href="javascript:void" style="float:right;" class="m-menu__link add_task_btn" data-toggle="modal" data-target="#mentorreminderModal" id="calender_model"><i class="m-menu__link-icon la la-plus"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"><span class="m-menu__link-text">Add Task</span></span></span></a>');
                    }    
                }
           }
       },
       complete:function(){
           $("#cover-spin").hide();
        //   window.location.reload();
       }
   });
}
function submit_planner(){
    
    var url = "<?= base_url() ?>dashboard/submit_planner";
    var planner = $("#09").val()+"||"+$("#10").val()+"||"+$("#11").val()+"||"+$("#12").val()+"||"+$("#13").val()+"||"+$("#14").val()+"||"+$("#15").val()+"||"+$("#16").val()+"||"+$("#17").val()+"||"+$("#18").val()+"||"+$("#19").val()+"||"+$("#20").val()+"||"+$("#21").val();
    var planned = $("#09").html()+"||"+$("#10").html()+"||"+$("#11").html()+"||"+$("#12").html()+"||"+$("#13").html()+"||"+$("#14").html()+"||"+$("#15").html()+"||"+$("#16").html()+"||"+$("#17").html()+"||"+$("#18").html()+"||"+$("#19").html()+"||"+$("#20").html()+"||"+$("#21").html();
    $.ajax({
        type:'post',
        url:url,
        data: {time_task:planner,task_planned:planned},
        dataType: "json",
        beforeSend:function(){
         $("#cover-spin").show();  
        },success:function(data)
        {
            
        },
       complete:function(){
           $("#cover-spin").hide();
           window.location.reload();
       }
    });
    
}
/************Test post popuop*************
var notification_text = "<p>You had a call with <b>Rahil - (9870282723) </a></b>. Please update the status.</p>";
var html = '<select onchange="welcomeCallAck(this)" data-multiple="0" data-user_id="118" data-email_id="rahil@bababab.ocm" data-previous_status="pending" data-time_slot="1" data-call_date="12/3/2021" class="form-control m-input"><option value="">Select Status</option><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv123"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText123" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea> </div><div class="form-group m-form__group mt-3"><input type="text" class="form-control m-input custom_datepicker" name="reminder_dt" id="reminder_dt" placeholder="Set Next FU!" readonly></div><div class="form-group m-form__group"><button class="btn btn-success submitCallNote mt-3">Save</button></div></div>';
var contents = notification_text+html;
var pop = document.getElementById("pop_tune");  // avinash added for popup tune
 pop.play();
 document.getElementById("pop_tune").muted = false;
$('#call_reminder_popup').modal("show");
$('#call_reminder_popup .avail_leads').html(contents);
/*************************/
var notification_text = "<p>FU on Call With <b>Rahil - (9870282723) </a></b></p>";
var page = "<?php echo $page;?>";
        if(page=='dashboard'){
            /*
swal({
    title: "Due in 15 Minutes!",
    html: notification_text,
    confirmButtonColor: '#3085d6',
    confirmButtonText:"<a style='color:#fff' href='https://wa.me/+919870282723/?text=Hi Rahil,%0a%0aI will be calling you shortly in regards to your concerns, and doubts %26 also help you choose the best program. In case you haven%27t filled out the health form I sent you, please do so. Click here : https://www.balancenutrition.in/health-score %0aSr. Nutritionist, <?=$_SESSION['balance_session']['first_name'];?> %0aBalance Nutrition ' class='mr-3' target='_blank'><i class='fa fa-whatsapp' style='margin-right:10px;'></i>Text On WhatsApp!</a>"
});
*/
}
/*

 whats_msg='Hi Rahil,%0a%0aIt was wonderful connecting with you %26 after understanding your situation,  Weight loss pro (90 days) Reform Intermittent, Plateau Breaker,  with additional 30-day maintenance will be the best for you. Take a look at: link %0aYou can register directly or I can send you a payment link as well to make it quicker. Let me know :) %0aFeatures of the program: %0a•A questionnaire (in app assessment %26 ingredient checklist) designed to evaluate your health risks, concerns %26 quality of life based on the information provided by you.%0a•Well planned diet charts customized depending on your goal, food preferences %26 availability of ingredients.%0a•Upto 3 calls with your mentor along with regular communication over the app chat section to motivate you %26 flexible changes based on your feedback to increase the effectivity of the program.%0a•A diet chart at the end of the session (10 days) allows you to eat smartly.%0a•Access to 1500+ easy-to-make recipes, best for weight loss %26 proper nourishment of your body.%0a•A diligent panel of experienced nutritionists to assist you in every step and help achieve your weight loss goal (Our mentors are personally trained by Khyati Rupani).%0a•An efficiently designed travel, in-flight, meeting %26 airport food guide to keep you healthy when continuously on the move.%0a•A useful guide on alcohol, restaurant outings, daily essentials, %26 meal portions to ensure you only lose weight and not all the fun in life.%0aWe are seeing an average weight loss of up to 14 kg in our existing clients %26 the same will be expected out of you too :)%0a%0aTo know more about us & how we work: https://youtu.be/NWmcfcwaavE';
                            swal({
                                 title: 'Sucessful',
                                 text: 'Call Done',
                                 type: 'success',
                                 showCancelButton: true,
                                 confirmButtonColor: '#3085d6',
                                 cancelButtonColor: '#d33',
                                 confirmButtonText: '<a href="https://wa.me/+919870282723/?text='+whats_msg+'" target="_blank"><i class="fa fa-whatsapp"></i>Text on WhatsApp!</a>'
                                 })         

                        */
function call_status_reminder_popup(){
    
    var url = "<?= base_url() ?>dashboard/get_today_call_reminder_list";
    
    $.ajax({
        type:'post',
        url:url,
        //  data: {reminder_id:data[i].id},
        dataType: "json",
        success:function(data)
        {
            var today = new Date();
    
            var call_time = new Date(today.getTime() - 25*60000);
            
            var h = call_time.getHours();
            var m = call_time.getMinutes();
            var s = '00';
                m = checkTime(m);
        
            var call_time = (h + ":" + m + ":" + s).toString();
            //console.log("1 : "+call_time);
           
           if(data.today_reminder_list != null){
               
               $.each(data.today_reminder_list, function(index,value){
                   
                   //console.log(value.time_slot);
                   
                   if(value.time_slot != null || value.time_slot != ""){
                       
                       if(call_time == value.time_slot){
                           //console.log("test");
                           
                            var notification_text = "<p>You had a call with <b>"+value.name+" - ("+value.phone+") </a></b>. Please update the status.</p>";
                            
                            var html = '<select onchange="welcomeCallAck(this)" data-multiple="0" data-user_id="'+value.id+'" data-email_id="'+value.email_id+'" data-previous_status="'+value.call_status+'" data-time_slot="'+value.time_slot+'" data-phone="'+value.phone+'" data-call_date="'+value.call_date+'" class="form-control m-input"><option value="">Select Status</option><option value="done">Done</option><option value="unanswered">Unanswered</option></select><div class="callNoteDiv'+value.id+'"><div class="form-group m-form__group mt-3"><textarea class="form-control m-input callNoteText'+value.id+'" id="exampleTextarea" rows="3" placeholder="KeyInsight" style="border-color: #000;"></textarea> </div><div class="form-group m-form__group mt-3"><input type="text" class="form-control m-input custom_datepicker" name="reminder_dt" id="reminder_dt" placeholder="Set Next FU!" readonly></div><div class="form-group m-form__group"><button class="btn btn-success submitCallNote mt-3">Save</button></div></div>'
                            var contents = notification_text+html;
                            var pop = document.getElementById("pop_tune");  // avinash added for popup tune
                             pop.play();
                             document.getElementById("pop_tune").muted = false;
                            $('#call_reminder_popup').modal("show");
                            $('#call_reminder_popup .avail_leads').html(contents);
                       }
                   }
                   
               });
               
           }
         }
    });
    
}

function welcomeCallAck(ele)
{
    
  var call_status=$(ele).val();
  var call_date = $(ele).data('call_date');
  var time_slot = $(ele).data('time_slot');
  var email_id = $(ele).data('email_id');
  var user_id = $(ele).data('user_id');
  var previous_status = $(ele).data('previous_status');
  var multiple_update = $(ele).data('multiple');
  
  var base_url="<?php echo base_url(); ?>";

  if(call_status == "done" || call_status == "unanswered")
  {
          $(".callNoteDiv"+user_id).show();
  }
  
  $(".submitCallNote").on("click", function(){

    var note =  $(".callNoteText"+user_id).val();
    var fu_date = $("#reminder_dt").val();
    var user_name = $('#user_name1').html();
      swal({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, acknowledge it!'
             }).then((result) => {
             if (result.value) {
                
                $.ajax({

                     type: 'POST',
                     url: base_url+'/dashboard/update_call_reminder_ack',
                     data: {record_id:user_id,user_email:email_id,fu_date:fu_date,previous_status:previous_status,call_status:call_status,call_date:call_date,time_slot:time_slot,note:note,user_name:user_name},
                     success: function (data) 
                     {
                         if(data==1)
                         {  //post reminder WA text
                            /*swal(
                                        'Sucessful',
                                        'Call '+call_status,
                                        'success'
                                     );*/
                                     
                                     var wp ='+91-9870282723';//(data.phone);
                                    if(wp!='' && wp!=null){
                                      if(wp.length >10){
                                            var wp_phone = wp.split('-');
                                            var whats_phone = wp_phone[1];
                                        }else{
                                            whats_phone =data.phone;
                                        }  
                                    }else{
                                        whats_phone =data.phone;
                                    }
                                     whats_msg='Hi '+user_name+',%0a%0aIt was wonderful connecting with you %26 after understanding your situation,  Weight loss pro (90 days) Reform Intermittent, Plateau Breaker,  with additional 30-day maintenance will be the best for you. Take a look at: link %0aYou can register directly or I can send you a payment link as well to make it quicker. Let me know :) %0aFeatures of the program: %0a•A questionnaire (in app assessment %26 ingredient checklist) designed to evaluate your health risks, concerns %26 quality of life based on the information provided by you.%0a•Well planned diet charts customized depending on your goal, food preferences %26 availability of ingredients.%0a•Upto 3 calls with your mentor along with regular communication over the app chat section to motivate you %26 flexible changes based on your feedback to increase the effectivity of the program.%0a•A diet chart at the end of the session (10 days) allows you to eat smartly.%0a•Access to 1500+ easy-to-make recipes, best for weight loss %26 proper nourishment of your body.%0a•A diligent panel of experienced nutritionists to assist you in every step and help achieve your weight loss goal (Our mentors are personally trained by Khyati Rupani).%0a•An efficiently designed travel, in-flight, meeting %26 airport food guide to keep you healthy when continuously on the move.%0a•A useful guide on alcohol, restaurant outings, daily essentials, %26 meal portions to ensure you only lose weight and not all the fun in life.%0aWe are seeing an average weight loss of up to 14 kg in our existing clients %26 the same will be expected out of you too :)%0a%0aTo know more about us & how we work: https://youtu.be/NWmcfcwaavE';
                            swal({
                                 title: 'Sucessful',
                                 text: 'Call '+call_status,
                                 type: 'success',
                                 showCancelButton: true,
                                 confirmButtonColor: '#3085d6',
                                 cancelButtonColor: '#d33',
                                 confirmButtonText: '<a href="https://wa.me/'+whats_phone+'/?text='+whats_msg+'" target="_blank"><i class="fa fa-whatsapp"></i>Text on WhatsApp!</a>'
                                 })         
                            if(multiple_update=='1'){
                                return true;
                            }else{
                                window.location.reload();
                            }

                         }else{
                            swal({
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
          });
  });
  
       
}


function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

setInterval(function () {
//   var date = new Date();
   // alert(date.getMinutes());
   /*if ((date.getMinutes() % 5) == 0) {

      call_reminder_popup();
      call_status_reminder_popup();
   }*/
   
 //  call_status_reminder_popup();
  // mentor_reminder_popup();
    
}, 1000*60* 30);//every 30 mins


setInterval(function () {
    var user_type= "<?php echo $this->session->balance_session['user_type']?>"
    if(user_type == 'sales'){
        review_popup();
        review_check();
   call_status_reminder_popup();
   mentor_reminder_popup();
//   console.log(user_type);
    }else{
        console.log("user not equelse to sales");
    }
   
}, 1000*60* 1);//every 1 min


/*setTimeout(function(){ 
    clearInterval(review_popup);
},  1000*60* 5);*/

//end .........///

function review_check(){
    var today = new Date();
    var call_time = new Date(today.getTime() + 1*60000);
   
    var h = call_time.getHours();
    var m = call_time.getMinutes();
    var s = '00';
        m = checkTime(m);
    var call_time = (h + ":" + m + ":" + s).toString();
    if(call_time > "13:30:00" && call_time < "16:30:00"){
         console.log("first half =:"+$('#first_half').val());
         if($('#first_half').val() != 0){
             $('#first').removeClass('progtrckr-todo');
             $('#first').addClass('progtrckr-done');
             $('#first_half_review_modal').modal('hide');
         }else{
             check_review_filled();
         }
    }else if(call_time > "16:30:00" && call_time < "19:00:00"){
        console.log("second half =:"+$('#second_half').val());
        if($('#second_half').val() != 0){
             $('#second').removeClass('progtrckr-todo');
             $('#second').addClass('progtrckr-done');
             $('#second_half_review_modal').modal('hide');
         }else{
             check_review_filled();
         }
   }else if(call_time > "19:00:00" && call_time < "23:30:00"){
         console.log("Day End =:"+$('#day_end').val());
         if($('#day_end').val() != 0){
             $('#end').removeClass('progtrckr-todo');
             $('#end').addClass('progtrckr-done');
             $('#day_end_review_modal').modal('hide');
         }else{
             check_review_filled();
         }
    }
    
}

function check_review_filled(){
    var url = "<?= base_url(); ?>dashboard/check_review_filled";
       $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
            //   beforeSend:function(){
            //      $("#cover-spin").show();  
            //   },
           success:function(data){
                console.log(data);
                $('#first_half').val(data.first_half);
                if($('#first_half').val() != 0){
                 $('#first').removeClass('progtrckr-todo');
                 $('#first').addClass('progtrckr-done');
                 $('#first_half_review_modal').modal('hide');
                }
                $('#second_half').val(data.second_half);
                if($('#second_half').val() != 0){
                 $('#second').removeClass('progtrckr-todo');
                 $('#second').addClass('progtrckr-done');
                 $('#second_half_review_modal').modal('hide');
                 }
                $('#day_end').val(data.day_end);
                if($('#day_end').val() != 0){
                 $('#end').removeClass('progtrckr-todo');
                 $('#end').addClass('progtrckr-done');
                 $('#day_end_review_modal').modal('hide');
                }
             },
          complete:function(){
              $("#cover-spin").hide();
            //   window.location.reload('<?= base_url(); ?>dashboard');
          }
       });
}


$(document).ready(function(){

    $(".review_btn").on("click", function(){
       
       var review_msg = $("#review1").val()+' '+$("#review2").val()+' '+$("#review3").val();
       
       var subject = $(this).data('subject');
       var review_number = $(this).data('review');
       $('.monthly_popup_data').show();
       switch(subject){
            case "Day End Review":
                if($('#day_end').val() != 0){
                    alert('You Have Already submitted Day End Review !');
                    $('#day_end_review_modal').modal('hide');
                    return false;
                }else{
                    var review_data = $('.day_end_review').html();  
                break;
                }
                
            case "Second Half Review":
                if($('#second_half').val() != 0){
                    alert('You Have Already submitted Second Half Review !');
                    $('#second_half_review_modal').modal('hide');
                    return false;
                }else{
                    var review_data = $('.second_half_review').html();
                break;
                }
                
            case "First Half Review" :
                if($('#first_half').val() != 0){
                    alert('You Have Already submitted First Half Review !');
                    $('#first_half_review_modal').modal('hide');
                    return false;
                }else{
                    var review_data = $('.review_form_count').html();
                break;
                }
                
        }
        var other_data='';
        if(review_number=='3'){
            leads_assigned = $(".total_lead_assigned_count").html();
            fu = $(".fu_done_today_count").html();
            consultation = $(".consultation_done_today_count").html();
            hot = $(".today_hot_count").html();
            fu_missed = $(".today_fus_missed_count").html();
            call_missed = $(".today_calls_miss_count").html();
            sale_unit = $(".today_sales_count").html();
            sale_amt = $(".today_sales_amt").html();
            // avinash added this 28-01-2022
            sale_unit_balance = $(".today_balance_sales_count").html();
            sale_amt_balance = $(".today_balance_sales_amt").html();
            // avinash added this 28-01-2022
            
            total_lead_assigned_mtd = $(".total_lead_assigned_mtd").html();
            fu_done_mtd = $(".fu_done_mtd").html();
            consultation_done_mtd = $(".consultation_done_mtd_new").html();
            hot_mtd = $(".hot_mtd").html();
            phase1_phase2 = $(".phase1_phase2").html();
            no_phase_new = $(".no_phase_new").html();
            phase3_phase4 = $(".phase3_phase4").html();
            stage3_stage4 = $(".stage3_stage4").html();
            stage1_stage2 = $(".stage1_stage2").html();
            total_lead_mtd_new = $(".total_lead_mtd_new").html();
            to_engage = $(".to_engage").html();
            total_sales_new = $(".total_sales_new").html();
            total_sales_new_count = $(".total_sales_new_count").html();
            age_distributation=$(".age_distributation").html();
            consultation_unconverted = $(".consultation_unconverted").html();
            total_sales_new = $(".total_sales_new").html();
            total_sales_new_count = $(".total_sales_new_count").html();
            // avinash added this 28-01-2022
            total_sales_new_balance = $(".total_balance_sales_new").html();
            total_sales_new_count_balance = $(".total_balance_sales_new_count").html();
            // avinash added this 28-01-2022
            
            other_data=leads_assigned+"||"+fu+"||"+consultation+"||"+hot+"||"+fu_missed+"||"+call_missed+"||"+sale_unit+"||"+sale_amt;//+"||"+total_lead_assigned_mtd+"||"+fu_done_mtd+"||"+consultation_done_mtd+"||"+hot_mtd+"||"+phase3_phase4+"||"+stage3_stage4
        }
       var url = "<?= base_url(); ?>dashboard/send_review_task";

    //   console.log(fh_review_msg); return false;
       $.ajax({
           type : "POST",
           url  : url,
           data : {other_data:other_data,review_number:review_number,review_data:review_data, msg:review_msg,subject:subject},
           beforeSend:function(){
             $("#cover-spin").show();  
           },
           success:function(data){
                if(data.success = 1){
                   swal({text:'Submitted Successfully !',timer:2000});
                   $("#review1").val('');$("#review2").val('');$("#review3").val('');
                   $('.monthly_popup_data').hide();
               }
           },
           complete:function(){
               $("#cover-spin").hide();
            //   window.location.reload();
           }
       });
    });

});




/*function getNotification() {
    
    var mentor_id="<?php echo $this->session->balance_session['admin_id']; ?>";
    var curdate="<?php echo date('Y-m-d'); ?>";
    var url = "<?php echo base_url().'dashboard/mentor/mentor_ajax'; ?>";
    var base_url = "<?php echo base_url()?>";
    var id = "today_reminders";
    
	if (!Notification) {
		$('body').append('<h4 style="color:red">*Browser does not support Web Notification</h4>');
		return;
	}
	if (Notification.permission !== "granted") {		
		Notification.requestPermission();
	} else {
	    
	    $.ajax({
                type: "POST",
                url: url,
                data: {id:id,mentor_id:mentor_id},
                dataType: "JSON",
                success: function (response){
                    $.each(response, function(i, item) 
                    {
                        notificationObj = new Notification(response[i].reminder_title);
                        // $("#today_reminders_table_data tbody").html('<tr id="data-'+response[i].id+'"><td id="data-title-'+response[i].id+'">'+response[i].reminder_title +'</td><td id="data-text-'+response[i].id+'">'+response[i].reminder_text +'</td><td id="data-time-'+response[i].id+'">'+ response[i].reminder_time +'</td><td><button class="btn btn-sm btn-success p-1" onClick="editReminder('+response[i].id+')">Edit</button></div></td></tr> <tr id="form-'+response[i].id+'" style="display:none"><td><input type="text" style="border: 1px solid #000;" id="title-'+response[i].id+'" value="'+ response[i].reminder_title +'"></td><td><input type="text" style="border: 1px solid #000;" id="text-'+response[i].id+'" value="'+ response[i].reminder_text +'"></td><td><input type="text" style="border: 1px solid #000;"  id="date-'+response[i].id+'" value="'+response[i].reminder_date+'" class="form-control m-input reminder_date custom_date_picker1" readonly  placeholder="Select date" /> <div id="m_timepicker_2"><input type="text" style="border: 1px solid #000;" class="form-control reminder_time" readonly placeholder="Select time" type="text" id="time-'+response[i].id+'" value="'+response[i].reminder_time+'" /></div></td><td><button class="btn btn-sm btn-warning p-1" onClick="updateReminder('+response[i].id+')">Save</button></td></tr>');
                        // $("#today_reminders_table_data tbody").html(");
                    }); 
                },
                error: function (jqXHR, textStatus, errorThrown)
               {
                   alert('Error get data from ajax');
               },
               complete:function(){
                   $('#today_reminders_table_data').DataTable({});
               }
            });
	}
};


// getNotification();
setInterval(function(){ getNotification(); }, 1000 * 60 * 60);*/

function cancel_link(id){
    if (confirm("Are You Sure?") == true) {
      $.ajax({
           type : "POST",
           url  : "<?php echo base_url().'dashboard/cancel_link'; ?>",
           data: {id:id},
           dataType: "json",
           beforeSend:function(){
             $("#cover-spin").show();  
           },
           success:function(data){
               location.reload();
           },
           complete:function(){
               $("#cover-spin").hide();
           }
       });
    } 
    
        
}

$(document).ready(function(){
    
    $(".todays_activities_done").on('click', function(){
        var increment = false;
       var isExpanded = $('.todays_activities_done').attr("aria-expanded");
       
       if(isExpanded=="false"){

       var id = $(this).data('id');
       
       var url = "<?php echo base_url().'dashboard/todays_activities_done'; ?>";
       
       if(id == "todays_activities_done"){
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                //  $("#cover-spin").show();  
               },
               success:function(data){
                    // if(data.success = 1){ }
                    // $("#lead_by_status").html(data['lead_by_status_list']);
                    
                    $(".cold").html(data['cold']);
                    $(".hot").html(data['hot']);
                    $(".spam").html(data['spam']);
                    $(".to_engage").html(data['to_engage']);
                    $(".warm").html(data['warm']);
                    
                    $(".stage1").html(data['stage1']);
                    $(".stage2").html(data['stage2']);
                    $(".stage3").html(data['stage3']);
                    $(".stage4").html(data['stage4']);

                    $(".phase1").html(data['phase1']);
                    $(".phase2").html(data['phase2']);
                    $(".phase3").html(data['phase3']);
                    $(".phase4").html(data['phase4']);
                    $(".no_phase").html(data['no_phase']);
                    
                    $(".fu_done_mtd").html(data['fu_done_mtd']);
                    $(".consultation_done_mtd").html(data['consultation_done_mtd']);
                    $(".action_done_mtd").html(data['action_done_mtd']);
                    $(".fu_done_today").html(data['fu_done_today']);
                    $(".consultation_done_today").html(data['consultation_done_today']);
                    $(".action_done_today").html(data['action_done_today']);
                    
                    $(".last_7_days").html(data['last_7_days']);
                    $(".last_15_days").html(data['last_15_days']);
                    $(".last_30_days").html(data['last_30_days']);
                    $(".last_90_days").html(data['last_90_days']);
                    
                    $(".lead_captured_today").html(data['lead_captured_today']);
                    $(".lead_captured_mtd").html(data['lead_captured_mtd']);
                    $(".other_lead_captured_today").html(data['other_lead_captured_today']);
                    $(".other_lead_captured_mtd").html(data['other_lead_captured_mtd']);
                    
                    // alert(data['stage4']);
                    
                    $("#m_accordion_sales_journey_item_3_head").removeAttr("data-id");
               },
               complete:function(){
                   $("#cover-spin").hide();
               }
           });
       }
     }
       
    });
    
    $(".unconverted").on('click', function(){
        var increment = false;
       var isExpanded = $('.unconverted').attr("aria-expanded");
       //console.log('function called');
       if(isExpanded=="false"){

       var id = $(this).data('id');
        //console.log(' ID : '+id);
       var url = "<?php echo base_url().'dashboard/unconverted'; ?>";
       
       if(id == "unconverted"){
            //console.log('if');
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success:function(data){
                    // if(data.success = 1){ }
                    // $("#lead_by_status").html(data['lead_by_status_list']);
                    
                    console.log(data);
                    
                    $(".unconverted_lead").html(data['unconverted_lead']);
                    $(".unconverted_consultation").html(data['unconverted_consultation']);
                    $(".unconverted_hot").html(data['unconverted_hot']);
                    $(".unconverted_warm").html(data['unconverted_warm']);
                    $(".unconverted_cold").html(data['unconverted_cold']);
                    $(".unconverted_stage3").html(data['unconverted_stage3']);
                    $(".unconverted_stage4").html(data['unconverted_stage4']);
                    $(".unconverted_phase3").html(data['unconverted_phase3']);
                    $(".unconverted_phase4").html(data['unconverted_phase4']);
                    
                    // alert(data['stage4']);
                    
                    $("#m_accordion_sales_journey_item_6_head").removeAttr("data-id");
               },
               complete:function(){
                   $("#cover-spin").hide();
               }
           });
       }
     }
       
    });
    
       
    $('#m_accordion_sales_journey_item_3_body').on('hidden.bs.collapse', function () {
        // do something…
        $("#m_accordion_sales_journey_item_3_head").attr("data-id", 'todays_activities_done');
    });
    
    $(".top_list_count").on("click", function(){
        
        var id = $(this).data('id');
        
        // alert(id); return false;
        var c_id="<?php echo $this->session->balance_session['admin_id']; ?>";
        var curdate="<?php echo date('Y-m-d'); ?>";
        var url = "<?php echo base_url().'dashboard/c_ajax_data'; ?>";
        var base_url = "<?php echo base_url()?>";
       
        switch(id){
            case 'active_payment_links':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Active Payment Links");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="sales_summary_popup_table_data"> <thead><tr> <th>Lead Details</th> <th>Program Details</th><th>Payment Link</th> <th>Expiring</th> <th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#sales_summary_popup_table_data').removeClass('d-none');
                $('#sales_summary_popup_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "active_payment_links",
                        beforeSend: function () {
                            //$("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank">'+data.name+'</a><br>'+data.email_id+'<br>'+data.phone;}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return data.program_name+'<br>'+data.program_duration+'<br>Rs.'+data.amount;}},
                        { "data": "payment_link" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return data.expiry_date+'(11:55 PM)';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            phone = data.phone;
                            return '<span class="btn btn-sm btn-success mr-1"><a href="https://wa.me/'+phone.replace("-", "")+'/?text=Hi,%0a%0aYour purchase link for program '+data.program_detail+' will expire '+data.expiry_date+'! Click here to pay now: '+data.payment_link+'" class="text-white" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></span><span class="btn btn-sm btn-danger mr-1" onclick="cancel_link(\''+data.id+'\');">Cancel</span>';}},
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
            case 'payment_link':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Links Expiry in next 48hrs");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="sales_summary_popup_table_data"> <thead><tr> <th>Lead Details</th> <th>Program Details</th><th>Payment Link</th> <th>Expiring</th> <th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#sales_summary_popup_table_data').removeClass('d-none');
                $('#sales_summary_popup_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "payment_link",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank" style="color:blue;text-decoration:underline;">'+data.name+'</a><br>'+data.email_id+'<br>'+data.phone;}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return data.program_name+'<br>'+data.program_duration+'<br>Rs.'+data.amount;}},
                        { "data": "payment_link" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return data.expiry_date+'(11:55 PM)';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            phone = data.phone;
                            return '<span class="btn btn-sm btn-success mr-1"><a href="https://wa.me/'+phone.replace("-", "")+'/?text=Hi,%0a%0aYour purchase link for program '+data.program_detail+' will expire '+data.expiry_date+'! Click here to pay now: '+data.payment_link+'" class="text-white" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></span>';}},
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
            case 'payment_links_expired':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Payment Links Expired Yesterday");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="sales_summary_popup_table_data"> <thead><tr> <th>Lead Details</th> <th>Program Details</th><th>Payment Link</th> <th>Expiring</th> <th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#sales_summary_popup_table_data').removeClass('d-none');
                $('#sales_summary_popup_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "payment_links_expired",
                        beforeSend: function () {
                            //$("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank" style="color:blue;text-decoration:underline;">'+data.name+'</a><br>'+data.email_id+'<br>'+data.phone;}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return data.program_name+'<br>'+data.program_duration+'<br>Rs.'+data.amount;}},
                        { "data": "payment_link" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return data.expiry_date+'(11:55 PM)';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            phone = data.phone;
                            return '<span class="btn btn-sm btn-success mr-1"><a href="https://wa.me/'+phone.replace("-", "")+'/?text=Hi,%0a%0aYour discounted purchase payment link for program '+data.program_name+' ('+data.program_duration+') has expired. It was a very good offer %26 included 30-day additional maintenance too worth Rs.'+data.amount+' complimentary. " class="text-white" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></span>';}},
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
            case 'today_fus_notification':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Follow Up");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="sales_summary_popup_table_data"> <thead><tr> <th>Name</th> <th>Email & Phone</th> <th>Time</th><th>FU On</th> <th>Consultation Note</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#sales_summary_popup_table_data').removeClass('d-none');
                $('#sales_summary_popup_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "today_fus_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank" style="color:blue;text-decoration:underline;">'+data.name+'</a>';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                             var wp =(data.phone);
                                if(wp!='' && wp!=null){
                                  if(wp.length >10){
                                    var wp_phone = wp.split('-');
                                    var whats_phone = wp_phone[1];
                                }else{
                                    whats_phone =data.phone;
                                }  
                                }else{
                                    whats_phone =data.phone;
                                }
                        whats_msg = 'Hi '+data.name+',%0a%0aI will be connecting you shortly in regards to your concerns, and doubts & also help you choose the best program. In case you haven%27t filled out the health form I sent you, please do so. Click here: https://www.balancenutrition.in/health-score%0aSr. Nutritionist, <?=$_SESSION['balance_session']['first_name'];?> %0aBalance Nutrition';
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.email+'</a><br/><a href="https://wa.me/'+whats_phone+'/?text='+whats_msg+'" target="_blank">'+data.phone+'</a>';}},
                        { "data": "reminder_dt" },
                        { "data": "followup_from" },
                        { "data": "key_insight" }
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
                case 'hot_pending_notification':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Hot Pendings Leads");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="hot_pending_notification"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Created</th><th>Status</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#hot_pending_notification').removeClass('d-none');
                $('#hot_pending_notification').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "hot_pending_notification",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
          return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "key_insight_date" },
                        { "data": "action_status" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'warm_pending_notification':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Warm Pendings Leads");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="warm_pending_notification"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Created</th><th>Status</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#warm_pending_notification').removeClass('d-none');
                $('#warm_pending_notification').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "warm_pending_notification",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
          return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "key_insight_date" },
                        { "data": "action_status" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
            
            case 'to_engage_pending_notification':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Warm Pendings Leads");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="to_engage_pending_notification"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Created</th><th>Status</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#to_engage_pending_notification').removeClass('d-none');
                $('#to_engage_pending_notification').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "to_engage_pending_notification",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
          return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "key_insight_date" },
                        { "data": "action_status" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
                
                
                
            case 'today_reminder_notification':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Reminders Set");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_reminder_table_data"> <thead><tr> <th>Title</th> <th>Description</th> <th>Date</th> <th>Time</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_reminder_table_data').removeClass('d-none');
                $('#today_reminder_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "reminders_set",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": "reminder_title" },
                        { "data": "reminder_text" },
                        { "data": "reminder_date" },
                        { "data": "reminder_time" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'fus_missed_count':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's FUS Missed");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="fus_missed_table_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Key Insight</th><th>Note</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#fus_missed_table_data').removeClass('d-none');
                $('#fus_missed_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_fus_missed_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "key_insight" },
                        { "data": "fu_note" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                //vikram
            case 'calls_scheduled':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Consultation Calls");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="calls_scheduled_table_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Call Date</th><th>Time Slot</th><th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#calls_scheduled_table_data').removeClass('d-none');
                $('#calls_scheduled_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_consultation_calls",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank" id="user_name1">'+data.name+'</a>';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="mailto:'+data.email_id+'">'+data.email_id+'</a>';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            var wp =(data.phone);
                                if(wp!='' && wp!=null){
                                  if(wp.length >10){
                                    var wp_phone = wp.split('-');
                                    var whats_phone = wp_phone[1];
                                }else{
                                    whats_phone =data.phone;
                                }  
                                }else{
                                    whats_phone =data.phone;
                                }
                                //  whats_phone = data.phone.replace("+", "").replace("-", "");
                                 whats_phone =data.phone;
                        whats_msg = 'Hi '+data.name+',%0a%0aSr. Nutritionist <?=$_SESSION['balance_session']['first_name'];?> here from Balance Nutrition.%0aWe have a consultation today '+data.call_date+' at '+data.time_slot+' IST. I will be connecting with you over a call at that time.%0a%0aBefore we speak, do fill out this form: https://www.balancenutrition.in/health-score%0a%0aIt will give me a good insight into your current health profile.';         
                        return '<a href="https://wa.me/'+whats_phone+'/?text='+whats_msg+'" target="_blank" style="color:blue" >'+data.phone+'</a>';}},
                        { "data": "call_date" },
                        { "data": "time_slot" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option><option value="Rescheduled">Rescheduled</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="KeyInsights" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'today_consultation_missed':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Consultation Calls Missed");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_consultation_missed_table_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Call Date</th><th>Time Slot</th><th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_consultation_missed_table_data').removeClass('d-none');
                $('#today_consultation_missed_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_calls_miss_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "call_date" },
                        { "data": "time_slot" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option><option value="Rescheduled">Rescheduled</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'calls_scheduled':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Consultation Calls");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="calls_scheduled_table_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Call Date</th><th>Time Slot</th><th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#calls_scheduled_table_data').removeClass('d-none');
                $('#calls_scheduled_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_consultation_calls",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "call_date" },
                        { "data": "time_slot" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option><option value="Rescheduled">Rescheduled</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'today_consultation_missed':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Consultation Calls Missed");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_consultation_missed_table_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Call Date</th><th>Time Slot</th><th>Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_consultation_missed_table_data').removeClass('d-none');
                $('#today_consultation_missed_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_calls_miss_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "call_date" },
                        { "data": "time_slot" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option><option value="Rescheduled">Rescheduled</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
                // avinash added this for noaction planned 28-01-2022
                
            case 'today_no_action_planed':
                $('#sales_summary_popup .modal-body').html('');
                var header='';
                    header ='<li class="nav-item m-tabs__item stage_section" style="margin-top: 35px;list-style-type: none;margin-right:40px;">';
                    header +='<a href="javascript:void(0)" class="m-nav__link">';
                    header +='<span class="m-nav__link-badge"><span class="m-badge m-badge--stage_1 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 1 </span></span>';
                    header +='<sup class="" data-toggle="tooltip1" title="0-2 kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>';
                    header +='<span class="tooltip"></span></a><a href="javascript:void(0)" class="m-nav__link"><span class="m-nav__link-badge">';
                    header +='<span class="m-badge m-badge--stage_2 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 2 </span><sup data-toggle="tooltip1" title="2-7.9 kgs moderatly over wt 2-7 kgs"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></span></a>';
                    header +='<a href="javascript:void(0)" class="m-nav__link"><span class="m-nav__link-badge"><span class="m-badge m-badge--stage_3 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 3 </span><sup data-toggle="tooltip1" title="8-14.9 kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></span></a>';
                    header +='<a href="javascript:void(0)" class="m-nav__link"><span class="m-nav__link-badge">';
                    header +='<span class="m-badge m-badge--stage_4 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 4 </span><sup data-toggle="tooltip1" title=" 15 &amp; above kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></span></a></li>';
                $('#sales_summary_popup .modal-title').html("No Action Planned Data"+header);
                
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_no_action_planed"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Status</th><th>Last Action</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_no_action_planed').removeClass('d-none');
                $('#today_no_action_planed').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_no_action_planed",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.fname+'</a>';}},
                        { "data": "email" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            var wp =(data.phone);
                                    if(wp!='' && wp!=null){
                                      if(wp.length >10){
                                        var wp_phone = wp.split('-');
                                        var whats_phone = wp_phone[1];
                                    }else{
                                        whats_phone =data.phone;
                                    }  
                                    }else{
                                        whats_phone =data.phone;
                                    }
                        return '<a href="https://wa.me/'+whats_phone+'/?text=Hi '+data.fname+',%0a%0aWe have been speaking about your enrollment for almost 1 month/2/3 weeks now. In this time, I have enrolled 57 people %26 they all have lost between 3 to 5 kg!%0aImagine if you had already started, You too would have :) If there is any more doubt in your mind, feel free to let me know %26 I shall address them all. As Khyati ma%27am always says, we don%27t get an IDEAL TIME period in our life to start a program. It has to be done with all else going on!%0aTo motivate you, I have taken special approval %26 got you a flat 50% off + 1 free acidity/weight loss/flat stomach cleanse worth Rs.999" target="_blank">'+data.phone+'</a>';}},
                        
                        { "data": "status" },
                        // { "data": "stage" },
                        { "data": "action" },
                        // { "data": null,  "render": function ( data, type, full, meta ) {
                        // return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        // { "data": null,  "render": function ( data, type, full, meta ) {
                        // return 'Consultation Date : '+data.reminder_dt+'<br>Fu Date : '+data.fu_other_date;}}
                        
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
                break;
                
                // avinash added this for no action planned 28-01-2022
                
                
                // avinash added this for noaction planned 28-01-2022
                
            case 'lead_pending_detail':
                $('#sales_summary_popup .modal-body').html('');
                var header='';
                    header ='<li class="nav-item m-tabs__item stage_section" style="margin-top: 35px;list-style-type: none;margin-right:40px;">';
                    header +='<a href="javascript:void(0)" class="m-nav__link">';
                    header +='<span class="m-nav__link-badge"><span class="m-badge m-badge--stage_1 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 1 </span></span>';
                    header +='<sup class="" data-toggle="tooltip1" title="0-2 kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup>';
                    header +='<span class="tooltip"></span></a><a href="javascript:void(0)" class="m-nav__link"><span class="m-nav__link-badge">';
                    header +='<span class="m-badge m-badge--stage_2 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 2 </span><sup data-toggle="tooltip1" title="2-7.9 kgs moderatly over wt 2-7 kgs"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></span></a>';
                    header +='<a href="javascript:void(0)" class="m-nav__link"><span class="m-nav__link-badge"><span class="m-badge m-badge--stage_3 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 3 </span><sup data-toggle="tooltip1" title="8-14.9 kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></span></a>';
                    header +='<a href="javascript:void(0)" class="m-nav__link"><span class="m-nav__link-badge">';
                    header +='<span class="m-badge m-badge--stage_4 m-badge--wide m-badge--rounded"></span>';
                    header +='<span class="m-nav__link-text">- Stage 4 </span><sup data-toggle="tooltip1" title=" 15 &amp; above kgs from ideal wt"><i class="fa fa-question-circle" aria-hidden="true"></i></sup></span></a></li>';
                $('#sales_summary_popup .modal-title').html("Consultation Done Data not Updated "+header);
                
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="lead_pending_detail"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Age</th><th>Weight</th><th>Height</th><th>Status</th><th>Action </th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#lead_pending_detail').removeClass('d-none');
                $('#lead_pending_detail').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "lead_pending_detail",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.fname+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "age" },
                        { "data": "weight" },
                        { "data": "height" },
                        { "data": "status" },
                       // { "data": "consultation_status" },
                        // { "data": null,  "render": function ( data, type, full, meta ) {
                        // return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                       { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<span onclick="edit_detail_lead(this)"  class="btn btm-sm btn-primary" data-fname="'+data.fname+'" data-email="'+data.email+'" data-age="'+data.age+'" data-weight="'+data.weight+'" data-height="'+data.height+'" data-phone="'+data.phone+'" data-gender="'+data.gender+'" data-stage="'+data.stage+'">Edit</span>';}},
                        
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
                break;
                
                // avinash added this for no action planned 28-01-2022
                
            case 'due_tomorrow':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Balance Due Tomorrow");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="due_tomorrow_table_data"> <thead><tr> <th>User Details</th> <th>Program Details</th> <th>Amt Paid</th> <th>Balance</th><th>Payment Options</th><th>Due Date</th><th>User Status</th><th>Mentor</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#due_tomorrow_table_data').removeClass('d-none');
                $('#due_tomorrow_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "due_tomorrow",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        var wp =(data.phone);
                                if(wp!='' && wp!=null){
                                  if(wp.length >10){
                                    var wp_phone = wp.split('-');
                                    var whats_phone = wp_phone[1];
                                }else{
                                    whats_phone =data.phone;
                                }  
                                }else{
                                    whats_phone =data.phone;
                                }
                        whats_msg = 'Hello '+data.full_name+',%0a%0aA polite reminder once again that tomorrow your balance payment of Rs.'+data.balance+' is due against your program '+data.prog_details+'. Your app login will be locked once the date has passed. Click here to Pay Now : https://bit.ly/37m8qhy';
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=client" target="_blank">'+data.full_name+'</a><br><a href="mailto:'+data.email_id+'">'+data.email_id+'</a><br><a href="https://wa.me/'+whats_phone+'/?text='+whats_msg+'" target="_blank">'+data.phone+'</a>';}},
                        
                        { "data": "program_name" },
                        { "data": "paid_amt" },
                        { "data": "balance" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return '<p style="margin-top:10px;"><b>Expiry Date</b> : <br><input type="date" style="margin-top:5px;" class="extend_date" id="exp_'+data.order_id+'" placeholder="dd-mm-yyyy"/><br><span style="margin-top:5px;" class="btn btn-success" onclick="create_link(\''+data.phone+'\',\''+data.order_id+'\')">Generate link</span></p>';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(data.added_validity=='1'){
                            	return data.due_date+'<p style="margin-top:10px;"><b>No Extesion left</b></p>';
                            }else{
                            	return data.due_date+'<p style="margin-top:10px;"><b>Update new Date</b> : <br><input type="date" style="margin-top:5px;" class="extend_date" id="ext_'+data.order_id+'" placeholder="dd-mm-yyyy"/><br><span style="margin-top:5px;" class="btn btn-success" onclick="update_date(\''+data.order_id+'\')">Extend Date</span></p>';
                            }
                        }},
                        { "data": "user_status" },
                        { "data": "mentor" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                  
                
                
            case 'balance_due':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Balance Due");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="balance_due_table_data"> <thead><tr> <th>User Details</th> <th>Program Details</th> <th>Amt Paid</th> <th>Balance</th><th>Payment Options</th><th>Due Date</th><th>User Status</th><th>Mentor</th>  </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#balance_due_table_data').removeClass('d-none');
                $('#balance_due_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "balance_due",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        var wp =(data.phone);
                                if(wp!='' && wp!=null){
                                  if(wp.length >10){
                                    var wp_phone = wp.split('-');
                                    var whats_phone = wp_phone[1];
                                }else{
                                    whats_phone =data.phone;
                                }  
                                }else{
                                    whats_phone =data.phone;
                                }
                        whats_msg = 'Hello '+data.full_name+',%0a%0aToday is the last day to clear your balance of Rs.'+data.balance+' is due against your program '+data.prog_details+' at Balance Nutrition. Click here to Pay Now : https://bit.ly/37m8qhy %0aPlease note, that the program goes into overdue status TOMORROW, and unfortunately, your services would be interrupted.%0aLet me know if you have any questions.%0a%0aSr. Nutritionist, <?=$_SESSION['balance_session']['first_name'];?>%0aBalance Nutrition';
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=client" target="_blank">'+data.full_name+'</a><br><a href="mailto:'+data.email_id+'">'+data.email_id+'</a><br><a href="https://wa.me/'+whats_phone+'/?text='+whats_msg+'" target="_blank">'+data.phone+'</a>';}},
                        
                        { "data": "program_name" },
                        { "data": "paid_amt" },
                        { "data": "balance" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return '<p style="margin-top:10px;"><b>Expiry Date</b> : <br><input type="date" style="margin-top:5px;" class="extend_date" id="exp_'+data.order_id+'" placeholder="dd-mm-yyyy"/><br><span style="margin-top:5px;" class="btn btn-success" onclick="create_link(\''+data.phone+'\',\''+data.order_id+'\')">Generate link</span></p>';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(data.added_validity=='1'){
                            	return data.due_date+'<p style="margin-top:10px;"><b>No Extesion left</b></p>';
                            }else{
                            	return data.due_date+'<p style="margin-top:10px;"><b>Update new Date</b> : <br><input type="date" style="margin-top:5px;" class="extend_date" id="ext_'+data.order_id+'" placeholder="dd-mm-yyyy"/><br><span style="margin-top:5px;" class="btn btn-success" onclick="update_date(\''+data.order_id+'\')">Extend Date</span></p>';
                            }
                        }},
                        { "data": "user_status" },
                        { "data": "mentor" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'balance_overdue':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Balance Overdue");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="balance_overdue_table_data"> <thead><tr> <th>User Details</th> <th>Program Details</th> <th>Amt Paid</th> <th>Balance</th><th>Payment Options</th><th>Due Date</th><th>User Status</th><th>Mentor</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#balance_overdue_table_data').removeClass('d-none');
                $('#balance_overdue_table_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "balance_overdue",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            var wp =(data.phone);
                                if(wp!='' && wp!=null){
                                  if(wp.length >10){
                                    var wp_phone = wp.split('-');
                                    var whats_phone = wp_phone[1];
                                }else{
                                    whats_phone =data.phone;
                                }  
                                }else{
                                    whats_phone =data.phone;
                                }
                        whats_msg = 'Hello '+data.full_name+',%0a%0aYour balance of Rs. '+data.balance+' overdue against your program '+data.prog_details+', initially paid Rs.'+data.paid_amt+' and there is a balance payment of Rs.'+data.balance+' which was due on '+data.due_date+'.%0aDespite several reminders, we have failed to receive any updates from you. This is the final reminder for the same. Click here to Pay Now : https://bit.ly/37m8qhy%0a%0aP.S. After today, you will not be able to re-open this program in future by paying the balance amount. You will have to purchase an entirely new program. ';

                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=client" target="_blank">'+data.full_name+'</a><br><a href="mailto:'+data.email_id+'">'+data.email_id+'</a><br><a href="https://wa.me/'+whats_phone+'/?text='+whats_msg+'" target="_blank">'+data.phone+'</a>';}},
                        { "data": "program_name" },
                        { "data": "paid_amt" },
                        { "data": "balance" },
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            return '<p style="margin-top:10px;"><b>Expiry Date</b> : <br><input type="date" style="margin-top:5px;" class="extend_date" id="exp_'+data.order_id+'" placeholder="dd-mm-yyyy"/><br><span style="margin-top:5px;" class="btn btn-success" onclick="create_link(\''+data.phone+'\',\''+data.order_id+'\')">Generate link</span></p>';}},
                        { "data": null,  "render": function ( data, type, full, meta ) {
                            if(data.added_validity=='1'){
                            	return data.due_date+'<p style="margin-top:10px;"><b>No Extesion left</b></p>';
                            }else{
                            	return data.due_date+'<p style="margin-top:10px;"><b>Update new Date</b> : <br><input type="date" style="margin-top:5px;" class="extend_date" id="ext_'+data.order_id+'" placeholder="dd-mm-yyyy"/><br><span style="margin-top:5px;" class="btn btn-success" onclick="update_date(\''+data.order_id+'\')">Extend Date</span></p>';
                            }
                        }},
                        { "data": "user_status" },
                        { "data": "mentor" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                // avinash add this got look day 05-1-2021
                
            case 'today_fus_notification_looks':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Follow Up Today");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_fus_notification_looks"> <thead><tr> <th>Name</th><th>Mobile No.</th> <th>Fu Note</th> <th>Reminder Date</th> <th>Assign To</th>/tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_fus_notification_looks').removeClass('d-none');
                $('#today_fus_notification_looks').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_fus_notification_looks",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+' - (<strong>'+data.email+'</strong>)</a>';}},
                        { "data": "phone" },
                        { "data": "fu_note" },
                        { "data": "reminder_dt" },
                        { "data": "assign_to" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'calls_scheduled_call_data':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Consultation Calls");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="calls_scheduled_call_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Call Date</th><th>Time Slot</th><th>Key Insight</th><th>Assign To</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#calls_scheduled_call_data').removeClass('d-none');
                $('#calls_scheduled_call_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "calls_scheduled_call_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "call_date" },
                        { "data": "time_slot" },
                        { "data": "key_insight" },
                        { "data": "assign_to" },
                        // { "data": null,  "render": function ( data, type, full, meta ) {
                        // return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;  
                
            case 'balance_due_count_data':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's To Pay  Due ");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="balance_due_count_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Phone</th> <th>Balance</th><th>Due date</th> <th>Program Name</th> <th>User Status</th><th>Sales Person</th> <th>Mentor</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#balance_due_count_data').removeClass('d-none');
                $('#balance_due_count_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "balance_due_count_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=client" target="_blank">'+data.full_name+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "balance" },
                        { "data": "due_date" },
                        { "data": "program_name" },
                        { "data": "user_status" },
                        { "data": "assign_to" },
                        { "data": "mentor" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
        case 'fu_done_today_data':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Follow Up Done");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="fu_done_today_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Fu Note</th> <th>Assign To</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#fu_done_today_data').removeClass('d-none');
                $('#fu_done_today_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "fu_done_today_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                    return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "fu_note" },
                        { "data": "assign_to" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
        case 'consultation_done_today':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Consultation Call Done");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="consultation_done_today_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Key Insight</th> <th>Assign To</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#consultation_done_today_data').removeClass('d-none');
                $('#consultation_done_today_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "consultation_done_today",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        {"data": "email" },
                        {"data": "phone" },
                        {"data": "key_insight"},
                        {"data": "assign_to"}
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
                case 'action_done_today_data':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Action Assigned Done");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="action_done_today_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Action Assigned To</th><th>Action Type</th> <th>Assigned From</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#action_done_today_data').removeClass('d-none');
                $('#action_done_today_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id,c_id:c_id},
                        "dataSrc": "action_done_today_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "fu_assigned" },
                        { "data": "action_type" },
                        { "data": "assign_from" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
            case 'hot_today':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Hot Leads");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="hot_today_table"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Created</th><th>Status</th><th>Assign To</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#hot_today_table').removeClass('d-none');
                $('#hot_today_table').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "hot_today",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
          return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.fname+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "created" },
                        { "data": "status" },
                        { "data": "assign_to" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'warm_today':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Warm Leads");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="warm_today_today"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Created</th><th>Status</th> <th>Assign To</th></tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#warm_today_today').removeClass('d-none');
                $('#warm_today_today').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "warm_today",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
          return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.fname+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "created" },
                        { "data": "status" },
                        { "data": "assign_to" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'today_sale':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Sale Detail");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_sale_detail"> <thead><tr><th>Name</th><th>Email Id</th><th>Phone</th><th>Program Name</th><th>Prgram Duration</th><th>Buy Amount</th><th>Sales Person</th><th>Mentor</th></tr></thead></table></div></div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_sale_detail').removeClass('d-none');
                $('#today_sale_detail').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_sale",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=client" target="_blank">'+data.fname+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "program_name" },
                        { "data": "prog_duration" },
                        { "data": "prog_buy_amt" },
                        { "data": "assign_to" },
                        { "data": "mentor" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
                
            
            case 'today_fus_missed_data_count':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Follow Up Missed");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_fus_missed_data_count"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Fu Note</th> <th>Reminder Date</th> <th>Assigned To</th>/tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_fus_missed_data_count').removeClass('d-none');
                $('#today_fus_missed_data_count').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_fus_missed_data_count",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email+'&user_status=lead" target="_blank">'+data.fname+'</a>';}},
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "fu_note" },
                        { "data": "reminder_dt" },
                        { "data": "assign_to" }
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;
                
            case 'today_consultation_missed_count_data':
                $('#sales_summary_popup .modal-body').html('');
                $('#sales_summary_popup .modal-title').html("Today's Consultation Calls Missed");
                var addData = '<div class="m-section"> <div class="m-section__content table-responsive"> <table class="table table-bordered d-none m-table m-table--border-brand w-100" id="today_consultation_missed_count_data"> <thead><tr> <th>Name</th> <th>Email Id</th> <th>Mobile No.</th> <th>Call Date</th><th>Time Slot</th><th>Call Status</th><th>Assigned To</th> </tr></thead> </table> </div> </div>';
                $('#sales_summary_popup').find('.modal-body').append(addData);
                $('#today_consultation_missed_count_data').removeClass('d-none');
                $('#today_consultation_missed_count_data').DataTable({
                    // processing: true,
                    // serverSide: true,
                    "ajax": {
                        "type" : "POST",
                        "url" : url,
                        "data": {id:id},
                        "dataSrc": "today_consultation_missed_count_data",
                        beforeSend: function () {
                            $("#cover-spin").show();
                        }
                    },
                    "columns": [
                        { "data": null,  "render": function ( data, type, full, meta ) {
                        return '<a href="<?= base_url()?>user_details?user_email='+data.email_id+'&user_status=lead" target="_blank">'+data.name+'</a>';}},
                        { "data": "email_id" },
                        { "data": "phone" },
                        { "data": "call_date" },
                        { "data": "time_slot" },
                        { "data": "call_status" },
                        { "data": "assign_to" }
                        // { "data": null,  "render": function ( data, type, full, meta ) {
                        // return '<select style="margin-bottom:1rem" class="form-control m-input" onchange="welcomeCallAck(this)" data-multiple="1" data-user_id="'+data.id+'" data-email_id="'+data.email_id+'" data-previous_status="'+data.call_status+'" data-time_slot="'+data.time_slot+'" data-call_date="'+data.call_date+'"><option value="">Select Status</option><option value="done">Done</option><option value="cancelled">Cancelled</option><option value="unanswered">Unanswered</option></select><textarea class="form-control m-input callNoteText'+data.id+'" id="exampleTextarea" rows="3" placeholder="Mention the call synopsis" style="border-color: #000;"></textarea><a href="#" class="btn btn-success submitCallNote mt-3" >Update</a>';}}
                        
                    ],
                    initComplete: function () {
                        $("#cover-spin").hide();
                    },
                    retrieve: true,
                });
                break;  
                
                
            
        }
    
    
    });

});




// js for faqs
 
$(document).ready(function()
{
  
  CKEDITOR.replace("manswer");
  
  $('.add_faq_btn').click(function(){
      $('.add_faqs_section').show();
  });
  $('.close_btn').click(function(){
      $('.add_faqs_section').hide();
      $('.clear_field').val();
  });

  $(".cp_btn").on("click", function()
  {
    var copyid = $(this).attr('data-id');
    
        swal({
            title: 'Copied',
            timer: 2000,
            showConfirmButton: false
        })

      var copyText = $(".pwd_spn"+copyid).html();
      
        copyFormatted(copyText);
        
  });
  
  $(".cp_btn_mdraft").on("click", function()
  {
    var copyid = $(this).attr('data-id');
    
        swal({
            title: 'Copied',
            timer: 2000,
            showConfirmButton: false
        })

      var copyText = $(".pwd_spn_mdraft"+copyid).html();
        copyFormatted(copyText);
  });



function copyFormatted (html) 
{
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
  document.body.removeChild(container)
}

});


$(document).ready(function() 
{
    $('#c_id_faq').DataTable({
        "ordering": false,
        "lengthChange": false,
    });
    
    $('.table_id').DataTable({
        "ordering": false,
        "lengthChange": false,
        initComplete: function () {
            this.api().columns([0]).every( function () {
                var column = this;
                var select = $('#table_select')
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
            } );
        },
        retrieve: true,
    });
    

} );

var save_method; //for save method string
var table;


function add_faq()
{
  CKEDITOR.replace("ck1");
  save_method = 'add';
  $('#form')[0].reset(); // reset form on modals
  $('#modal_form').modal('show'); // show bootstrap modal
  $('.modal-title').text('Add FAQ'); // Set Title to Bootstrap modal title
}

function edit_faq(id)
{
   
  CKEDITOR.replace("ck1");    
  save_method = 'update';
  $('#form')[0].reset(); // reset form on modals

  //Ajax Load data from ajax
  $.ajax({
    url : "<?php echo site_url('faq/ajax_edit')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {

        $('[name="faq_id"]').val(data.faq_id);            
        $('[name="title"]').val(data.title);
        $('[name="type"]').val(data.type);
        $('[name="question"]').val(data.question);
        CKEDITOR.instances.ck1.setData(data['answer']); 
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Edit faq'); // Set title to Bootstrap modal title

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});
}



function save()
{
  var url;
  if(save_method == 'add')
  {
      url = "<?php echo site_url('index.php/faq/faq_add')?>";
  }
  else
  {
    url = "<?php echo site_url('index.php/faq/faq_update')?>";
  }

    var formData = new FormData($('#form')[0]);
    formData.append('answer',CKEDITOR.instances.ck1.getData());

        

      $.ajax({
            url: url,
            type: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            { 
                alert(data);
                // $('#modal_form').modal('hide');
                // CKEDITOR.remove("ck1");
                // location.reload();// for reload a page
            },
            error: function(){}             
            });

}

function delete_faq(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    // ajax delete data from database
      $.ajax({
        url : "<?php echo site_url('index.php/faq/faq_delete')?>/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
           
           location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error deleting data');
        }
    });

  }
}

function delete_draft(id)
{
  if(confirm('Are you sure delete this data?'))
  {
    // ajax delete data from database
      $.ajax({
        url : "<?php echo site_url('index.php/faq/draft_delete')?>/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
           
           location.reload();
        }
        // error: function (jqXHR, textStatus, errorThrown)
        // {
        //     alert('Error deleting data');
        // }
    });

  }
}


function saveMentorDraft()
{
    /* function saveMentorDraft : start here */
    var ans = CKEDITOR.instances.manswer.getData();
    var ques = $('#mquestion').val();
    var mfaq_id = $('#mfaq_id').val();
    // var formData = new FormData($('#mentor_draft')[0]);
    // alert(mfaq_id);
    // formData.append('manswer', CKEDITOR.instances.manswer.getData());
    
    if(mfaq_id != 0){
        $.ajax({
            url: '<?php echo base_url('faq/addMentorDraft'); ?>',
            type: "POST",
            data: {mquestion:ques,manswer:ans,mfaq_id:mfaq_id},
            /*contentType: false,
            cache: false,
            processData:false,*/
            success: function(data)
            { 
                console.log(data);
              swal(data,'','success');
              window.location.reload();                     
            },
            error: function(){}             
        });
    } else{
        $.ajax({
            url: '<?php echo base_url('index.php/faq/addMentorDraft'); ?>',
            type: "POST",
            data: {mquestion:ques,manswer:ans},
            /*contentType: false,
            cache: false,
            processData:false,*/
            success: function(data)
            { 
                console.log(data);
              swal(data,'','success');
              window.location.reload();                     
            },
            error: function(){}             
        });

    }
    
    
    /* function saveMentorDraft : ends  here */
}


$('.edit_mentor_draft').on('click',function(){
  var id=$(this).attr('data-id');

  if(id!="")
  {
    
    $('.add_faqs_section').show();

    $.ajax({
        url: '<?php echo base_url('index.php/faq/getMentorDraftById'); ?>',
        type: "POST",
        data:{id:id},
        dataType: "JSON",
        success: function(result)
        { 

          $('#mfaq_id').val(result[0]['id']);
          $('#mquestion').val(result[0]['question']);
          CKEDITOR.instances.manswer.setData(result[0]['answer']); 
        //   $('#manswer').val(result[0]['answer']);
          $('#mquestion').focus();                     
                                  
        },
        error: function(){}             
    });
  }

});
function update_date(order_id){
    var url = '<?php echo base_url(); ?>dashboard/update_due_date';
    var due_date = $("#ext_"+order_id).val();
var today = new Date();
var date_to_reply = new Date(due_date);
var timeinmilisec = date_to_reply.getTime() - today.getTime();
var days = Math.ceil(timeinmilisec / (1000 * 60 * 60 * 24));
//    alert(due_date+" :: "+days+" :: "+order_id);
//return false;
if(days<8){
    $.ajax({
        url: url,
        type: "POST",
        data:{order_id:order_id,due_date:due_date},
        dataType: "JSON",
        beforeSend: function () {
            $("#cover-spin").show();
        },
        success: function(result)
        {
            //alert('Date Updated Successfully!');
            //location.reload();
        },
        complete:function(){
            $("#cover-spin").hide();
            alert('Date Updated Successfully!');
            location.reload();
        },
        error: function(){}             
    });
}else{
    alert('Cannot Extend the date more than 7 days');
}
}
function create_link(phone,order_id){
    var url = '<?php echo base_url(); ?>dashboard/create_due_payment_link';
    var exp_date = $("#exp_"+order_id).val();
    $.ajax({
        url: url,
        type: "POST",
        data:{order_id:order_id,exp_date:exp_date,phone:phone},
        dataType: "JSON",
        beforeSend: function () {
            $("#cover-spin").show();
        },
        success: function(result)
        {
            console.log(result);
            swal({
                title: "Link generated Successful",
                html: result.payment_link,
                confirmButtonText:"<a style='color:#fff;' href='https://wa.me/"+result.phone+"/?text=Hi "+result.name+",%0a%0aPFA link for your balance payment "+result.payment_link+" %0aSr. Nutritionist, <?=$_SESSION['balance_session']['first_name'];?> %0aBalance Nutrition ' class='mr-3' target='_blank'><i style='margin-right:10px' class='fa fa-whatsapp'></i>Text On WhatsApp!</a>"
            });
            //alert(result.link);
            //location.reload();
        },
        complete:function(){
            $("#cover-spin").hide();
            //alert('Date Updated Successfully!');
            //location.reload();
        },
        error: function(){}             
    });
}
function lead_capture(id){
    var url = '<?php echo base_url(); ?>dashboard/avail_lead_stagewise';
    
    if(id == "ld_capture_today")
    {
        $.ajax({
            url: url,
            type: "POST",
            data:{date_range:0},
            dataType: "JSON",
            beforeSend: function () {
                $("#cover-spin").show();
            },
            success: function(result)
            {
                var ld_cap_html = ""; 
                no_stage = parseInt(<?= $lead_capture_today_count; ?>)-(parseInt(result.new_lead_stage4)+parseInt(result.new_lead_stage3)+parseInt(result.new_lead_stage2)+parseInt(result.new_lead_stage1)+parseInt(result.olr_lead_stage4)+parseInt(result.olr_lead_stage3)+parseInt(result.olr_lead_stage2)+parseInt(result.olr_lead_stage1));
                if(parseInt(no_stage)<0){no_stage=0;}
                ld_cap_html     += "<tr><td>4</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_tdy&stage=4' target='_blank'>"+result.new_lead_stage4+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_tdy&stage=4' target='_blank'>"+result.olr_lead_stage4+"</a></td></tr>";
                ld_cap_html     += "<tr><td>3</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_tdy&stage=3' target='_blank'>"+result.new_lead_stage3+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_tdy&stage=3' target='_blank'>"+result.olr_lead_stage3+"</a></td></tr>";
                ld_cap_html     += "<tr><td>2</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_tdy&stage=2' target='_blank'>"+result.new_lead_stage2+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_tdy&stage=2' target='_blank'>"+result.olr_lead_stage2+"</a></td></tr>";
                ld_cap_html     += "<tr><td>1</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_tdy&stage=1' target='_blank'>"+result.new_lead_stage1+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_tdy&stage=1' target='_blank'>"+result.olr_lead_stage1+"</a></td></tr>";
                ld_cap_html   += "<tr><td>no stage</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_tdy&stage=0' target='_blank'>"+no_stage+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_tdy&stage=0' target='_blank'>"+0+"</a></td></tr>";
                
                $("#today_lead_cap_table tbody").html(ld_cap_html);
            },
            complete:function(){
                $("#cover-spin").hide();
            },
            error: function(){}             
        });
    } else if(id == "ld_capture_mtd"){
        $.ajax({
            url: url,
            type: "POST",
            data:{date_range:1},
            dataType: "JSON",
            beforeSend: function () {
                $("#cover-spin").show();
            },
            success: function(result)
            {   var ld_cap_html = "";
            no_stage = parseInt(<?= $lead_capture_mtd_count; ?>)-(parseInt(result.new_lead_stage4)+parseInt(result.new_lead_stage3)+parseInt(result.new_lead_stage2)+parseInt(result.new_lead_stage1)+parseInt(result.olr_lead_stage4)+parseInt(result.olr_lead_stage3)+parseInt(result.olr_lead_stage2)+parseInt(result.olr_lead_stage1));
              if(parseInt(no_stage)<0){no_stage=0;}
                ld_cap_html    += "<tr><td>4</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_mnth&stage=4' target='_blank'>"+result.new_lead_stage4+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_mnth&stage=4' target='_blank'>"+result.olr_lead_stage4+"</a></td></tr>";
                 ld_cap_html   += "<tr><td>3</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_mnth&stage=3' target='_blank'>"+result.new_lead_stage3+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_mnth&stage=3' target='_blank'>"+result.olr_lead_stage3+"</a></td></tr>";
                 ld_cap_html   += "<tr><td>2</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_mnth&stage=2' target='_blank'>"+result.new_lead_stage2+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_mnth&stage=2' target='_blank'>"+result.olr_lead_stage2+"</a></td></tr>";
                 ld_cap_html   += "<tr><td>1</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_mnth&stage=1' target='_blank'>"+result.new_lead_stage1+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_mnth&stage=1' target='_blank'>"+result.olr_lead_stage1+"</a></td></tr>";
                ld_cap_html   += "<tr><td>no stage</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_avlble_mnth&stage=0' target='_blank'>"+no_stage+"</a></td><td><a href='<?= base_url()?>lead?lead_by=old_lds_avlble_mnth&stage=0' target='_blank'>"+0+"</a></td></tr>";
                
                $("#mtd_lead_cap_table tbody").html(ld_cap_html);
            },
            complete:function(){
                $("#cover-spin").hide();
            },
            error: function(){}             
        });
    }
}

// $('#myTab a:first').tab('show');

/*$('.avail_leads a[data-toggle="tab"]').on('shown.bs.tab', function (event) {
  event.target // newly activated tab
  $(this).tab('show');
//   console.log((event.target == "#lead_capture_mtd")? true:false);
});*/


$('.cl_summary_sec_number').on('click',function(){
  var id=$(this).attr('data-id');
  lead_capture(id);
  $('.nav-tabs a[href="#' + id + '"]').tab('show');
});

$(document).ready(function(){
    $('.lead_source').on('click',function(){
      $datavalue = "";
      $datavalue = $('.logger').attr('data-value');
        var url = '<?php echo base_url(); ?>dashboard/conversion_by_source';
        
        $.ajax({
            url: url,
            type: "POST",
            data:{date_range:1,datavalue:$datavalue},
            dataType: "JSON",
            beforeSend: function () {
                $("#cover-spin").show();
            },
            success: function(result)
            {   var ld_cap_html = "";
            
                /*$.each(result.lead_conversion,function(i,val){
                    ld_cap_html += '<tr><th class="text-left text-dark">'+val.source_name+'</th><td class="text-right"><a href="javascript:void(0)">Rs.'+val.sale+'</a></td><td class="text-right"><a href="javascript:void(0)">'+val.percentage+'%</a></td></tr>';
                });*/
                $.each(result.lead_conversion,function(i,val){
                    ld_cap_html += '<tr><th class="text-left text-dark">'+val.source_name+'</th><td class="text-right"><a href="javascript:void(0)"> '+val.lead_your+' </a></td><td class="text-right"><a href="javascript:void(0)"> '+val.lead_overall+' </a></td><td class="text-right"><a href="javascript:void(0)">Rs.'+val.sale_your+'</a></td><td class="text-right"><a href="javascript:void(0)">'+val.percentage_your+'</a></td><td class="text-right"><a href="javascript:void(0)">Rs.'+val.sale+'</a></td><td class="text-right"><a href="javascript:void(0)">'+val.percentage+'</a></td></tr>';
                });
                
                
                $("#conversion_by_source tbody").html(ld_cap_html);
            },
            complete:function(){
                $("#cover-spin").hide();
            },
            error: function(){}             
        });
    });
});


//calender script

$('#m_accordion_sales_journey_item_4_head').on('click',function(){
var CalendarExternalEvents={
    init:function(){
        $("#m_calendar_external_events .fc-event").each(function(){
            $(this).data("event",{
                title:$.trim($(this).text()),
                stick:!0,
                className:$(this).data("color"),
                description:"Lorem ipsum dolor eius mod tempor labore"
                
            })
        }),
        function(){
            var e=moment().startOf("day"),
            t=e.format("YYYY-MM"),
            i=e.clone().subtract(1,"day").format("YYYY-MM-DD"),
            r=e.format("YYYY-MM-DD"),
            a=e.clone().add(1,"day").format("YYYY-MM-DD");
        
        $("#task_calendar").fullCalendar({
            header:{
                left:"prev,next today",
                center:"title",
                right:"agendaDay,agendaWeek,month,listWeek"
            },
            defaultView: 'listWeek',
            events: function(fetchInfo, end, timezone, callback) {
                var param = "";
                $.ajax({
                    url: '<?= base_url() ?>dashboard/get_task_calender',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        param:param
                    },
                    success: function(result) {
                        // alert(result[''][0]['task_name']);
                        var events = [];
                        $.each(result['today_task'], function(i, data){
                            if(data.email_id != ""){
                                var base_url= "<?php echo base_url(); ?>";
                                //var text = "(<a href='"+base_url+"user_details?user_email="+data.email_id+"' target='_blank'> "+data.email_id+"</a>)";
                                var text = "("+data.email_id+"  "+data.phone+")";
                            }else{
                                var text = "NA";
                            }
                            events.push({
                                title: data.task_name +" "+text,
                                start: data.start_date,
                                className:"m-fc-event--primary"
                            });
                            
                        });
                        callback(events);
                        
                    }
                });
            },
            
            eventLimit:!0,
            navLinks:!0,
            editable:0,
            droppable:0
        });
            
        }()}};jQuery(document).ready(function(){
            CalendarExternalEvents.init()
        });
    
});

// export to excel js
/*document.getElementById('export_to_excel').onclick=function(){
    var tableId= document.getElementById('tableData').id;
    htmlTableToExcel(tableId, filename = '');
}*/


var htmlTableToExcel= function(tableId, fileName = ''){

    var excelFileName='excel_table_data';
    var TableDataType = 'application/vnd.ms-excel';
    var selectTable = document.getElementById(tableId);
    var htmlTable = selectTable.outerHTML.replace(/ /g, '%20');
    
    filename = filename?filename+'.xls':excelFileName+'.xls';
    var excelFileURL = document.createElement("a");
    document.body.appendChild(excelFileURL);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', htmlTable], {
            type: TableDataType
        });
        navigator.msSaveOrOpenBlob( blob, fileName);
    }else{
        
        excelFileURL.href = 'data:' + TableDataType + ', ' + htmlTable;
        excelFileURL.download = fileName;
        excelFileURL.click();
    }
}


// avinash code for sales manager dashboard 28-09-2021
$(document).ready(function(){
    $('#how_your_month').on('click', function(){
        var isExpanded = $('.how_your_month').attr("aria-expanded");
        // alert("hello");
        if(isExpanded == 'false'){
        var url = "<?php echo base_url().'dashboard/sales_manager_month_looks'; ?>";
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success:function(data){
                   console.log(data.lead_by_sub_hot_status);
                   var all_lead_month = "<a href='<?= base_url()?>lead?lead_by=all_leads' target='_blank'>All Leads - "+data.all_leads+"</a> / <a href='<?= base_url()?>lead?lead_by=all_leads_sale' target='_blank' class='text-success'>"+data.all_leads_sale+"</a>";
                    $("#all_leads").html(all_lead_month);
                    // var stage_all_leads = 'Stage - '+data.all_leads;
                    // $("#stage_all_leads").html(stage_all_leads);
                    
                    // stage wise lead
                    var all_leads = "";
                    all_leads +="<tr><td>Fresh</td><td><a href='<?= base_url()?>lead?lead_by=frsh_lds_mnth' target='_blank'>"+data.lead_capture_mtd_count+"</a> / <a href='<?= base_url()?>lead?lead_by=get_lead_fresh_lead_sale' target='_blank' class='text-success'>"+(parseInt(data.all_leads_sale)-parseInt(data.olr_lds_avlble_mnth_sale))+"</a></td></tr>";
                    all_leads +="<tr><td>OLR</td><td><a href='<?= base_url()?>lead?lead_by=olr_lds_avlble_mnth' target='_blank'>"+data.olr_lead_mtd_count+"</a> / <a href='<?= base_url()?>lead?lead_by=olr_lds_avlble_mnth_sale' target='_blank' class='text-success'>"+data.olr_lds_avlble_mnth_sale+"</a></td></tr>";
                    all_leads +="<tr><td>OMR</td><td><a href='<?= base_url()?>lead?lead_by=omr_lds_avlble_mnth' target='_blank'>"+data.omr_lead_mtd_count+"</a> / <a href='<?= base_url()?>lead?lead_by=omr_lds_avlble_mnth_sale' target='_blank' class='text-success'>"+0+"</a></td></tr>";
                    all_leads +="<tr><td>Basic stack</td><td><a href='<?= base_url()?>lead?lead_by=basic_stack_month' target='_blank'>"+data.basic_stack_count+"</a> / <a href='<?= base_url()?>lead?lead_by=get_basic_stack_month_sale' target='_blank' class='text-success'>"+data.get_basic_stack_month_sale+"</a></td></tr>";
                    $("#available_leads tbody").html(all_leads);
                    
                    // stage wise lead
                    var stage_wise_lead = "";
                    stage_wise_lead +="<tr><td>Stage 4</td><td><a href='<?= base_url()?>lead?lead_by=stage_4' target='_blank'>"+data.stage_4+"</a></td></tr>";
                    stage_wise_lead +="<tr><td>Stage 3</td><td><a href='<?= base_url()?>lead?lead_by=stage_3' target='_blank'>"+data.stage_3+"</a></td></tr>";
                    stage_wise_lead +="<tr><td>Stage 2</td><td><a href='<?= base_url()?>lead?lead_by=stage_2' target='_blank'>"+data.stage_2+"</a></td></tr>";
                    stage_wise_lead +="<tr><td>Stage 1</td><td><a href='<?= base_url()?>lead?lead_by=stage_1' target='_blank'>"+data.stage_1+"</a></td></tr>";
                    $("#stages tbody").html(stage_wise_lead);
                    
                    // phase wise lead
                    var phase_wise_lead = "";
                    phase_wise_lead +="<tr><td>Phase 1</td><td><a href='<?= base_url()?>lead?lead_by=phase_1' target='_blank'>"+data.phase_1+"</a></td></tr>";
                    phase_wise_lead +="<tr><td>Phase 2</td><td><a href='<?= base_url()?>lead?lead_by=phase_2' target='_blank'>"+data.phase_2+"</a></td></tr>";
                    phase_wise_lead +="<tr><td>Phase 3</td><td><a href='<?= base_url()?>lead?lead_by=phase_3' target='_blank'>"+data.phase_3+"</a></td></tr>";
                    phase_wise_lead +="<tr><td>Phase 4</td><td><a href='<?= base_url()?>lead?lead_by=phase_4' target='_blank'>"+data.phase_4+"</a></td></tr>";
                    phase_wise_lead +="<tr><td>No Phase</td><td><a href='<?= base_url()?>lead?lead_by=phase_0' target='_blank'>"+data.phase_0+"</a></td></tr>";
                    $("#phases tbody").html(phase_wise_lead);
                    
                    // status wise lead
                    var hot_lead = "<a href='<?= base_url()?>lead?lead_by=hot_month_looks' target='_blank' class='text-danger'>Hot - "+data.hot+"</a> / <a href='<?= base_url()?>lead?lead_by=hot_month_looks_sale' target='_blank' class='text-success'>"+data.hot_sale+"</a>";
                    $("#hot").html(hot_lead);
                    var warm_lead = "<a href='<?= base_url()?>lead?lead_by=warm_month_looks' target='_blank' class='text-warning'>Warm - "+data.warm+"</a> / <a href='<?= base_url()?>lead?lead_by=warm_month_looks_sale' target='_blank' class='text-success'>"+data.warm_sale+"</a>";
                    $("#warm").html(warm_lead);
                    var cold_lead = "<a href='<?= base_url()?>lead?lead_by=cold_month_looks' target='_blank' class='text-primary'>Cold - "+data.cold+"</a> / <span class='text-success'>0</span>";
                    $("#cold").html(cold_lead);
                    // sub_status wise lead
                    $('#hot_status tbody').html(data.lead_by_sub_hot_status);
                    $('#warm_status tbody').html(data.lead_by_sub_warm_status);
                    $('#cold_status tbody').html(data.lead_by_sub_cold_status);
                    
                    // downgrade90days
                    var hot_downgrade90days = "<a href='<?= base_url()?>lead?lead_by=hot_downgrade90days' target='_blank' class='text-danger'>Hot Downgrade - "+data.hot_downgrade_90days+"</a>";
                    $("#hot_downgrade90days").html(hot_downgrade90days);
                    var warm_downgrade90days = "<a href='<?= base_url()?>lead?lead_by=warm_downgrade90days' target='_blank' class='text-warning'>Warm Downgrade - "+data.warm_downgrade_90days+"</a>";
                    $("#warm_downgrade90days").html(warm_downgrade90days);
                    var cold_downgrade90days = "<a href='<?= base_url()?>lead?lead_by=cold_downgrade90days' target='_blank' class='text-primary'>Cold Downgrade - "+data.cold_downgrade_90days+"</a>";
                    $("#cold_downgrade90days").html(cold_downgrade90days);
                    
                    // Substatusdowngrade90days
                    $('#hot_substatus_downgrade90days tbody').html(data.substatus_by_hot_downgrade_90days_lead);
                    $('#warm_substatus_downgrade90days tbody').html(data.substatus_by_warm_downgrade_90days_lead);
                    $('#cold_substatus_downgrade90days tbody').html(data.substatus_by_cold_downgrade_90days_lead);
                    
              },
              complete:function(){
                  $("#cover-spin").hide();
              }
           });
        }
    });
    
    $('#how_your_day').on('click', function(){  
        var isExpanded = $('.how_your_day').attr("aria-expanded");
        // alert("hello");
        if(isExpanded == 'false'){
        var url = "<?php echo base_url().'dashboard/sales_manager_day_looks'; ?>";
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success:function(data){
                   console.log(data);
                   if(data.today_sale_amount_no ==0){
                       var sal_amt =0;
                   }else{
                       var sal_amt= data.today_sale_amount_no[0]['amount'];
                   }
                   var all_leads_today = "<a href='<?= base_url()?>lead?lead_by=all_leads_today' target='_blank'>All Leads - "+data.all_leads_today+"</a> / <a href='<?= base_url()?>lead?lead_by=all_leads_sale_today' target='_blank' class='text-success' title='Sale Of Today Leads'>"+data.all_leads_sale_today+"</a>";
                    $("#all_leads_today").html(all_leads_today);
                    var stage_wise_lead_today = "";
                    stage_wise_lead_today +="<thead><tr><th><b>Stage</b></th><th><b>Leads</b></th><th><b>Captured</b></th><th><b>Missed</b></th></tr></thead>";
                    stage_wise_lead_today +="<tr><td>Stage 4</td><td><a href='<?= base_url()?>lead?lead_by=stage_4_today_lead' target='_blank'>"+data.stage_4_today_lead+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_4_today_lead_capture' target='_blank'>"+data.stage_4_today_lead_capture+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_4_today_lead_missed' target='_blank' class='text-danger'>"+data.stage_4_today_lead_missed+"</a></td></tr>";
                    stage_wise_lead_today +="<tr><td>Stage 3</td><td><a href='<?= base_url()?>lead?lead_by=stage_3_today_lead' target='_blank'>"+data.stage_3_today_lead+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_3_today_lead_capture' target='_blank'>"+data.stage_3_today_lead_capture+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_3_today_lead_missed' target='_blank' class='text-danger'>"+data.stage_3_today_lead_missed+"</a></td></tr>";
                    stage_wise_lead_today +="<tr><td>Stage 2</td><td><a href='<?= base_url()?>lead?lead_by=stage_2_today_lead' target='_blank'>"+data.stage_2_today_lead+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_2_today_lead_capture' target='_blank'>"+data.stage_2_today_lead_capture+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_2_today_lead_missed' target='_blank' class='text-danger'>"+data.stage_2_today_lead_missed+"</a></td></tr>";
                    stage_wise_lead_today +="<tr><td>Stage 1</td><td><a href='<?= base_url()?>lead?lead_by=stage_1_today_lead' target='_blank'>"+data.stage_1_today_lead+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_1_today_lead_capture' target='_blank'>"+data.stage_1_today_lead_capture+"</a></td><td><a href='<?= base_url()?>lead?lead_by=stage_1_today_lead_missed' target='_blank' class='text-danger'>"+data.stage_1_today_lead_missed+"</a></td></tr>";
                    stage_wise_lead_today +="<tr><td>Basic Stack</td><td><a href='<?= base_url()?>lead?lead_by=basic_stack_today' target='_blank'>"+data.basic_stack_today+"</a></td><td><a href='<?= base_url()?>lead?lead_by=basic_stack_capture' target='_blank'>"+data.basic_stack_capture+"</a></td><td><a href='<?= base_url()?>lead?lead_by=basic_stack_missed' target='_blank' class='text-danger'>"+data.basic_stack_missed+"</a></td></tr>";
                    $("#stage_wise_lead_today tbody").html(stage_wise_lead_today);
                    $("#today_fus_notification").html("<span>"+data.today_fus_notification+"</span>");
                    $("#calls_scheduled_data").html("<span>"+data.calls_scheduled_data+"</span>");
                    $("#balance_due_count").html("<span>"+data.balance_due_count+"</span>");
                    $("#fu_done_today").html("<span>"+data.fu_done_today+"</span>");
                    $("#consultation_done_today").html("<span>"+data.consultation_done_today+"</span>");
                    $("#action_done_today").html("<span>"+data.action_done_today_data+"</span>");
                    $("#hot_today").html("<span>"+data.hot+"</span>");
                    $("#warm_today").html("<span>"+data.warm+"</span>");
                    $("#today_sale_amount").html("<span title='Today Sale Of all Leads'>Sales(Rs. "+numFormatter(sal_amt)+")</span>");
                    $("#today_sale").html("<span title='Today Sale Of all Leads'>"+data.today_sale+"</span>");
                    $("#today_fus_missed_data").html("<span>"+data.today_fus_missed_data+"</span>");
                    $("#today_consultation_missed_count").html("<span>"+data.today_consultation_missed_count+"</span>");
                    $("#query_count").html("<span>"+data.query_count+"</span>");
               },
              complete:function(){
                  $("#cover-spin").hide();
              }
           });
        }
    });
   
    
    $('#cousellor-Wise').on('click', function(){  
        var isExpanded = $('.cousellor-Wise').attr("aria-expanded");
        // alert("hello");
        if(isExpanded == 'false'){
        var url = "<?php echo base_url().'dashboard/counsellor_wise_snapshot'?>";
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success:function(data){
                  console.log(data);
                  var snapshot ="";
                  for(var i=0;i<data.length;i++){
                      var photo ="";
                      if(data[i].photo==null){
                        photo += "<img class='card-img-top' src='https://www.balancenutrition.in/images/aboutUs/default_photo.png'";
                      }else{
                          photo += "<img class='card-img-top' src='https://www.balancenutrition.in/images/aboutUs/"+data[i].photo+"'";
                         
                      }
                      var amt = data[i].sale_gole;
                      if(data[i].sale_month == 0){
                          var sale_amount = 0 ;
                          var sale_unit = 0;
                          var ratio_unit="0%"
                          var pending =data[i].sale_gole+"<strong> / </strong>" + data[i].unit_goal+" Unit";
                           var lead_pending = "N/A";
                              var consult_pending ="N/A";
                      }else{
                          var goal_amount = parseInt(data[i].sale_gole);
                          var goal_unit = parseInt(data[i].unit_goal);
                          var sale_amount = data[i].sale_amount;
                          var sale_unit = data[i].sale_unit;
                          var ratio_unit=(((data[i].sale_amount)/goal_amount)*100).toFixed(2)+"%";
                          var pending_amount = goal_amount-sale_amount;
                          var pending_unit = goal_unit-sale_unit;
                          var pending ="Rs: "+numFormatter(pending_amount)+"<strong> / </strong>"+pending_unit+" Unit";
                          if(data[i].goal_lead==0 || data[i].goal_consult==0){
                              var lead_pending = "N/A";
                              var consult_pending ="N/A";
                          }else{
                          var lead_pending = data[i].goal_lead -data[i].leads_in_hand;
                          var consult_pending =data[i].goal_consult-data[i].consultation_done;
                          }
                          
                      }
                    // console.log(typeof(goal_amount));
                    // console.log(typeof(goal_unit));
                    // console.log(typeof(sale_amount));
                    // console.log(typeof(sale_unit));
                    snapshot +="<div class='col-lg-3 mr-3 p-0' style='border: 1px solid gray; border-radius: 10px; overflow: hidden;'>";
					snapshot +="<div class='card' style='background-color: #f2f2f2;border-radius:none;'>";
					snapshot +="<div class='d-flex card_img' style='border-radius:none;'>"+photo+" alt='Card image' style='width:100%; height: 100%;'>";
					snapshot +="<div class='ml-4 card_detail'>";
					snapshot +="<h5 class='pt-2'>"+data[i].counsoler_name+"</h5>";
					snapshot +="<div class='d-flex justify-content-between rounded text-dark stats pt-2'>";
					snapshot +="<div class='d-flex flex-column'><span>Goal</span></div>";
					snapshot +="<div class='d-flex flex-column ml-3'> <span style='width:180px;' class='text-primary'>Rs: "+ numFormatter(data[i].sale_gole)+"<strong> / </strong> " + data[i].unit_goal+" Unit</span></div></div></div></div>";
					snapshot +="<hr/ class='new1'>";
					snapshot +="<div class='card_lead' style='background-color: white;'>";
					snapshot +="<div class='d-flex justify-content-between rounded text-dark stats mt-2 pl-3 pr-3' style='min-height: 95px;'>";
					snapshot +="<div class='d-flex flex-column'> <span><b>Lead in Hand </b></span> <span><b>Consulations</b></span> <span><b>Hot</b></span></div>";
				// 	snapshot +="<ul class='pb-2'>"+data[i].substatus_status+"</ul>";
					snapshot +="<div class='d-flex flex-column'> <span>"+data[i].leads_in_hand+"</span> <span>"+data[i].consultation_done+"</span> <span>"+data[i].hot_mdth+"</span> </div></div>";
					snapshot +="<div class='p-2 pl-3 pr-3  d-flex justify-content-between rounded text-dark stats' style='background-color: #f2f2f2;'>";
					snapshot +="<div class='d-flex flex-column'> <span ><b>Sales</b></span> <span><b>Ratio</b></span> </div>";
					snapshot +="<div class='d-flex flex-column'> <strong><span class='text-success'>Rs: "+numFormatter(sale_amount)+"</i><strong> / </strong> "+sale_unit+" Unit</strong></span> <span><strong>"+ratio_unit+"</strong></span> </div></div><hr/ class='new1'>";
					snapshot +="<div class='card_bottom pt-2'><h4 class='text-warning text-center'>Need to Achieve Goal</h4>";
					snapshot +="<div class='p-2 pl-3 pr-3 d-flex justify-content-between rounded text-dark stats'>";
					snapshot +="<div class='d-flex flex-column'> <span> <b>Lead</b></span> <span><b>Consulations</b></span> <span><b>Sales </b></span> </div>";
					snapshot +="<div class='d-flex flex-column'> <span>"+lead_pending+" / "+data[i].goal_lead+"</span> <span>"+consult_pending+" / "+data[i].goal_consult+"</span> <span class='text-primary'>"+pending+"</span></div></div>";
					snapshot +="</div></div></div></div>";
                  }
                  $('#counsellor_snapshoot').html(snapshot);
                   
               },
              complete:function(){
                  $("#cover-spin").hide();
              }
           });
        }
    });
    
    
    
    // avinash added this for goal set 05-11-2021
    
    var url = "<?php echo base_url().'dashboard/get_counselor_goal_set'?>";
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success:function(data){
                  console.log(data);
                  var sale_unit = 
                  $('#lead_set').html(data.lead_set);
                  $('#consultation_set').html(data.consultation_set);
                  $('#unit_set').html(data.unit_set);
                  $('#amount_set').html("RS : "+data.amount_set);
                  
                  $('#lead_avg_monthly').html(data.lead_needed_monthly);
                  $('#consultation_avg_monthly').html(data.consultation_needed_monthly);
                  $('#sale_avg_monthly').html(data.unit_needed_monthly);
                  $('#amount_avg_monthly').html("RS : "+data.amount_needed_monthly);
                  
                  $('#lead_avg_day').html(data.lead_needed);
                  $('#consultation_avg_day').html(data.consultation_needed);
                  $('#sale_avg_day').html(data.unit_needed);
                  $('#amount_avg_day').html("RS : "+data.amount_needed);
               },
              complete:function(){
                  $("#cover-spin").hide();
              }
           });
    
    $('.set_goal_modal').on('click', function(){
        var url = "<?php echo base_url().'dashboard/get_counselor_goal'?>";
            $.ajax({
               type : "POST",
               url  : url,
               dataType: "json",
               beforeSend:function(){
                 $("#cover-spin").show();  
               },
               success:function(data){
                  console.log(data);
                  var sale_unit = 
                  $('#lead').html(data.leads_in_hand);
                  $('#const_unit').html(data.consultation_done);
                  $('#const_ratio').html((((data.consultation_done)/data.leads_in_hand)*100).toFixed(2)+" %");
                  $('#hot_unit').html(data.hot_mdth);
                  $('#hot_ratio').html((((data.hot_mdth)/data.leads_in_hand)*100).toFixed(2)+" %");
                  $('#unit').html(data.today_sale_amount_no[0]['uni']);
                  $('#unit_ratio').html((((data.today_sale_amount_no[0]['uni'])/data.leads_in_hand)*100).toFixed(2)+" %");
                  $('#sale').html("RS : "+data.today_sale_amount_no[0]['amt']);
                  $('#sale_ratio').html(((data.today_sale_amount_no[0]['amt'])/data.today_sale_amount_no[0]['uni']).toFixed(2)+" / Unit");
                  $('#lead_sale_ratio').html((((data.lead_sale)/data.leads_in_hand)*100).toFixed(2)+" %");
                  $('#const_sale_ratio').html((((data.today_sale_amount_no[0]['uni'])/data.consultation_done)*100).toFixed(2)+" %");
                  $('#hot_sale_ratio').html((((data.hot_sale)/data.hot_mdth)*100).toFixed(2)+" %");
               },
              complete:function(){
                  $("#cover-spin").hide();
              }
           });
           
    })
    
    
    $(function(){
        
        $('#sale_goal').keyup(function(){
            // alert(typeof(parseInt(sale_ratio)));
            var sal_goal = $('#sale_goal').val();
            if(sal_goal.length>3){
                var sal_ratio =parseInt($('#sale_ratio').html());
                $('#unit_goal').val(Math.round((sal_goal/sal_ratio)));
                var unit =$('#unit_goal').val();
                $('#sale_goal_per_unit').val(Math.round((sal_goal/unit)));
                //alert("C->"+parseInt($('#const_sale_ratio').html())+" %");
                // console.log(parseInt($('#const_sale_ratio').html())+" :: ");
                // console.log((parseInt($('#const_sale_ratio').html())/100));
                //alert(parseInt($('#sale_goal_per_unit').val())/(parseInt($('#const_sale_ratio').html())/100));
                $('#goal_consult').val(Math.round(parseInt($('#unit_goal').val())/(parseInt($('#const_sale_ratio').html())/100)));
                $('#goal_lead').val(Math.round(parseInt($('#goal_consult').val())/(parseInt($('#const_ratio').html())/100)));
                $('#goal_consult_ratio').val(Math.round(parseInt($('#const_ratio').html())));
                $('#consultation_sale_ratio').val(Math.round(parseInt($('#const_sale_ratio').html())));
                $('#unit_goal_ratio').val(Math.round(parseInt($('#unit_ratio').html())));
                /********Simulation****/
                sale_unit = $('#unit_goal').val();
                sale_ratio = $('#unit_goal_ratio').val();
                consultation_unit = $('#goal_consult').val();
                consultation_ratio = $('#consultation_sale_ratio').val();
                lead_unit = $('#goal_lead').val();
                lead_ratio = $('#goal_consult_ratio').val();
                
                $('#sale_goal_per_unit').attr('readonly',false);
                $('#unit_goal').attr('readonly',false);
                //$('#unit_goal_ratio').attr('readonly',false);
                
                $('#sale_unit_simulation').html('<span title=""> '+sale_unit+' </span> | <span title=""> '+sale_ratio+' %</span>');
                $('#consultation_simulation').html('<span title=""> '+consultation_unit+' </span> | <span title=""> '+consultation_ratio+' %</span>');
                $('#lead_simulation').html('<span title=""> '+lead_unit+' </span> | <span title=""> '+lead_ratio+' %</span>');
                
                /********Simulation****/
            
            }else{
                $('#sale_goal_per_unit').attr('readonly',true);
                $('#unit_goal').attr('readonly',true);
                $('#unit_goal_ratio').attr('readonly',true);
                $('#goal_consult').attr('readonly',true);
                $('#consultation_sale_ratio').attr('readonly',true);
               
               // $('#goal_lead').attr('readonly',true);
                $('#goal_consult_ratio').attr('readonly',true);
            }
            
        });
        
        $('#unit_goal').keyup(function(){
            sale_unit = $('#unit_goal').val();
            sale_ratio = $('#unit_goal_ratio').val();
            consultation_unit = $('#goal_consult').val();
            consultation_ratio = $('#consultation_sale_ratio').val();
            lead_unit = $('#goal_lead').val();
            lead_ratio = $('#goal_consult_ratio').val();
            
            sale_amount = $('#sale_goal').val();
            sale_amount_per_unit = $('#sale_goal_per_unit').val();
            if(parseInt(sale_unit)>10){
                $('#sale_goal_per_unit').val(parseInt(sale_amount)/parseInt(sale_unit));
                
                //$('#goal_consult').attr('readonly',false);
                $('#consultation_sale_ratio').attr('readonly',false);
                //$('#goal_lead').attr('readonly',false);
                $('#goal_consult_ratio').attr('readonly',false);
            }else{
                //$('#goal_consult').attr('readonly',true);
                $('#consultation_sale_ratio').attr('readonly',true);
                //$('#goal_lead').attr('readonly',true);
                $('#goal_consult_ratio').attr('readonly',true);
            }
        });


                $('#unit_goal_ratio').keyup(function(){



       var      sale_ratio = $('#unit_goal_ratio').val();
     
        if(parseInt(sale_ratio)>5){
     

     var  goal_lead = $('#goal_lead').val();
     var  sale_goal_per_unit = $('#sale_goal_per_unit').val();
      var      unit_goal = $('#unit_goal').val();
     
 //$('#unit_goal').val(Math.round((parseInt(goal_lead))/100)*sale_ratio);


 $('#unit_goal').val(Math.round((sale_ratio / 100) * parseInt(goal_lead)));


 $('#sale_goal').val(Math.round((parseInt(unit_goal)*parseInt(sale_goal_per_unit))));
  

  var sale_unit_simulation_val=$('#unit_goal').val()+"|"+ $('#unit_goal_ratio').val()+"%";
$('#sale_unit_simulation').html(sale_unit_simulation_val); 


        // $('#unit_goal_ratio').val(Math.round((parseFloat(unit_goal)) / parseFloat(goal_lead) *100));




}

    var unit_goal = $('#unit_goal').val();
        var goal_consult = $('#goal_consult').val();
        
        $('#consultation_sale_ratio').val((parseFloat(unit_goal) / parseInt(goal_consult))*100);

var goal_consult_val =  $('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 


                });
        $('#unit_goal_ratio_old').keyup(function(){
            sale_unit = $('#unit_goal').val();
            sale_ratio = $('#unit_goal_ratio').val();
            consultation_unit = $('#goal_consult').val();
            consultation_ratio = $('#consultation_sale_ratio').val();
            lead_unit = $('#goal_lead').val();
            lead_ratio = $('#goal_consult_ratio').val();
            
            sale_amount = $('#sale_goal').val();
            sale_amount_per_unit = $('#sale_goal_per_unit').val();
            if(parseInt(sale_ratio)>5){
                //alert('get lead and consultation');
                // console.log((parseInt(sale_ratio)/100));
                // console.log((parseInt(sale_unit))*(parseInt(sale_ratio)/100));
                //$('#goal_lead').val((parseInt(sale_unit))*(parseInt(sale_ratio)/100));
                //$('#goal_consult_ratio').val()
                //$('#goal_consult').val(parseInt(sale_unit)*(parseInt(sale_ratio)/100))
                
                $('#goal_consult').val();
                $('#consultation_sale_ratio').val();
                $('#goal_lead').val();
                
                //$('#goal_consult').attr('readonly',false);
                $('#consultation_sale_ratio').attr('readonly',false);
                //$('#goal_lead').attr('readonly',false);
                $('#goal_consult_ratio').attr('readonly',false);
            }else{
                //$('#sale_goal_per_unit').attr('readonly',true);
                //$('#unit_goal').attr('readonly',true);
                //$('#unit_goal_ratio').attr('readonly',true);
                //$('#goal_consult').attr('readonly',true);
                $('#consultation_sale_ratio').attr('readonly',true);
                //$('#goal_lead').attr('readonly',true);
                $('#goal_consult_ratio').attr('readonly',true);
            }
        });
        
        
        $('#goal_lead').keyup(function(){
         //   var lead_consult_ratio = $('#goal_consult_ratio').val();
         //   var lead_count = $('#goal_lead').val();
           // if(parseInt(lead_count)>10){
                //update sales
               // var consultation_unit = $('#goal_consult').val();
              //  var unit_goal = $('#unit_goal').val();
             //   $('#consultation_sale_ratio').val(Math.round(parseInt(unit_goal))/Math.round(parseInt(consultation_unit))*100);
                //get sale and update consult->sales ratio
            //     $('#goal_consult_ratio').val(Math.round(parseInt($('#const_ratio').html())));
            // $('#consultation_sale_ratio').val(Math.round(parseInt($('#const_sale_ratio').html())));
            // $('#unit_goal_ratio').val(Math.round(parseInt($('#unit_ratio').html())));
         //   }

     var lead_consult_ratio = $('#goal_consult_ratio').val();
            var lead_count = $('#goal_lead').val();

           
            if(parseInt(lead_count)>10){
            $('#goal_consult_ratio').attr('readonly',false);







//////////////////////////////////////////////////////////////////////////////


var       goal_lead = $('#goal_lead').val();
   var         goal_consult_ratio = $('#goal_consult_ratio').val();



 


          if(parseInt(goal_consult_ratio)>10){
            $('#goal_consult').val(Math.round((parseFloat(goal_consult_ratio) / 100) * parseInt(goal_lead)));
                $('#consultation_sale_ratio').attr('readonly',false);
            }else{


$('#goal_consult').val('');
$('#consultation_sale_ratio').val('');
$('#unit_goal').val('');
$('#unit_goal_ratio').val('');
$('#sale_goal').val('');
$('#sale_goal_per_unit').val('');



                 $('#consultation_sale_ratio').attr('readonly',true);
               
            }





      var    goal_consult = $('#goal_consult').val();
       var     consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
          var  unit_goal = $('#unit_goal').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/f100)));
            }
           


         var goal_consult = $('#goal_consult').val();
        var    consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            unit_goal = $('#unit_goal').val();
            goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
           

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }







var goal_lead_val =  $('#goal_lead').val()+"|"+ $('#goal_consult_ratio').val()+"%";
$('#lead_simulation').html(goal_lead_val); 







///////---Second Option -----////////////////////////////



    var goal_consult = $('#goal_consult').val();
        var     consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            var unit_goal = $('#unit_goal').val();
           var  goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseFloat(unit_goal)) / parseFloat(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
           else{
            $('#unit_goal').val('');
$('#unit_goal_ratio').val('');
$('#sale_goal').val('');
$('#sale_goal_per_unit').val('');

           }

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }


var goal_consult_val =  $('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 



var goal_consult_val=$('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 


var sale_unit_simulation_val=$('#unit_goal').val()+"|"+ $('#unit_goal_ratio').val()+"%";
$('#sale_unit_simulation').html(sale_unit_simulation_val); 















//////////////////////////////////////////////////
































           
            }






        });
        
        $('#consultation_sale_ratio').keyup(function(){
            // consultation_unit = $('#goal_consult').val();
            // consultation_sale_ratio = $('#consultation_sale_ratio').val();
            
            // sale_unit = $('#unit_goal').val();
            // sale_ratio = $('#unit_goal_ratio').val();
            // consultation_unit = $('#goal_consult').val();
            // consultation_ratio = $('#consultation_sale_ratio').val();
            // lead_unit = $('#goal_lead').val();
            // lead_ratio = $('#goal_consult_ratio').val();
            
            // sale_amount = $('#sale_goal').val();
            // sale_amount_per_unit = $('#sale_goal_per_unit').val();
            // if(parseInt(consultation_sale_ratio)>10){
            //     $('#goal_consult').val(Math.round((parseInt(sale_unit))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            //     var consultation_count = $('#goal_consult').val();
            //     $('#goal_lead').val(Math.round((parseInt(consultation_count))/(Math.round(parseInt(lead_ratio))/100)));
            //     //$('#unit_goal').val(Math.round(parseInt(consultation_unit))*(Math.round(parseInt(consultation_sale_ratio))/100));
            //     //$('#sale_goal_per_unit').val(parseInt($('#sale_goal').val())/parseInt($('#unit_goal').val()));
            // //update sale unit
            // //update sale per unit amount;
            // }

          goal_consult = $('#goal_consult').val();
            consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            unit_goal = $('#unit_goal').val();
            goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseFloat(unit_goal)) / parseFloat(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
           
         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));


            }


var goal_consult_val =  $('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 



var goal_consult_val=$('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 


var sale_unit_simulation_val=$('#unit_goal').val()+"|"+ $('#unit_goal_ratio').val()+"%";
$('#sale_unit_simulation').html(sale_unit_simulation_val); 

                 $('#unit_goal_ratio').attr('readonly',false);




//////////////////////////////////////////////////////////////////////////////


var       goal_lead = $('#goal_lead').val();
   var         goal_consult_ratio = $('#goal_consult_ratio').val();



 


          if(parseInt(goal_consult_ratio)>10){
            $('#goal_consult').val(Math.round((parseFloat(goal_consult_ratio) / 100) * parseInt(goal_lead)));
                $('#consultation_sale_ratio').attr('readonly',false);
            }else{
                 $('#consultation_sale_ratio').attr('readonly',true);
               
            }





      var    goal_consult = $('#goal_consult').val();
       var     consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
          var  unit_goal = $('#unit_goal').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/f100)));
            }
           


         var goal_consult = $('#goal_consult').val();
        var    consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            unit_goal = $('#unit_goal').val();
            goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
           

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }







var goal_lead_val =  $('#goal_lead').val()+"|"+ $('#goal_consult_ratio').val()+"%";
$('#lead_simulation').html(goal_lead_val); 







///////---Second Option -----////////////////////////////



    var goal_consult = $('#goal_consult').val();
        var     consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            var unit_goal = $('#unit_goal').val();
           var  goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseFloat(unit_goal)) / parseFloat(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
         

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }


var goal_consult_val =  $('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 



var goal_consult_val=$('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 


var sale_unit_simulation_val=$('#unit_goal').val()+"|"+ $('#unit_goal_ratio').val()+"%";
$('#sale_unit_simulation').html(sale_unit_simulation_val); 















//////////////////////////////////////////////////






        });
        $('#goal_consult_ratio').keyup(function(){
            // consultation_unit = $('#goal_consult').val();
            // consultation_sale_ratio = $('#consultation_sale_ratio').val();
            
            // sale_unit = $('#unit_goal').val();
            // sale_ratio = $('#unit_goal_ratio').val();
            // consultation_unit = $('#goal_consult').val();
            // consultation_ratio = $('#consultation_sale_ratio').val();
            // lead_unit = $('#goal_lead').val();
            // lead_ratio = $('#goal_consult_ratio').val();
            
            // sale_amount = $('#sale_goal').val();
            // sale_amount_per_unit = $('#sale_goal_per_unit').val();
            // if(parseInt(lead_ratio)>10){
            //     $('#goal_consult').val(Math.round((parseInt(sale_unit))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            //     var consultation_count = $('#goal_consult').val();
            //     $('#goal_lead').val(Math.round((parseInt(consultation_count))/(Math.round(parseInt(lead_ratio))/100)));
            //     $('#unit_goal_ratio').val(Math.round((parseInt(sale_unit))/(Math.round(parseInt(lead_unit))/100)));
            //     //$('#unit_goal').val(Math.round(parseInt(consultation_unit))*(Math.round(parseInt(consultation_sale_ratio))/100));
            //     //$('#sale_goal_per_unit').val(parseInt($('#sale_goal').val())/parseInt($('#unit_goal').val()));
            // //update sale unit
            // //update sale per unit amount;
            // }


       goal_lead = $('#goal_lead').val();
            goal_consult_ratio = $('#goal_consult_ratio').val();



 


          if(parseInt(goal_consult_ratio)>10){
            $('#goal_consult').val(Math.round((parseFloat(goal_consult_ratio) / 100) * parseInt(goal_lead)));
                $('#consultation_sale_ratio').attr('readonly',false);
            }else{



                 $('#consultation_sale_ratio').attr('readonly',true);
               
            }





          goal_consult = $('#goal_consult').val();
            consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            unit_goal = $('#unit_goal').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/f100)));
            }
           


          goal_consult = $('#goal_consult').val();
            consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            unit_goal = $('#unit_goal').val();
            goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
           

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }







var goal_lead_val =  $('#goal_lead').val()+"|"+ $('#goal_consult_ratio').val()+"%";
$('#lead_simulation').html(goal_lead_val); 






//////////////////////////////////////////////////////////////////////////////


var       goal_lead = $('#goal_lead').val();
   var         goal_consult_ratio = $('#goal_consult_ratio').val();



 


          if(parseInt(goal_consult_ratio)>10){
            $('#goal_consult').val(Math.round((parseFloat(goal_consult_ratio) / 100) * parseInt(goal_lead)));
                $('#consultation_sale_ratio').attr('readonly',false);
            }else{
                 $('#consultation_sale_ratio').attr('readonly',true);
               
            }





      var    goal_consult = $('#goal_consult').val();
       var     consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
          var  unit_goal = $('#unit_goal').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/f100)));
            }
           


         var goal_consult = $('#goal_consult').val();
        var    consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            unit_goal = $('#unit_goal').val();
            goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseInt(unit_goal)) / parseInt(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
           

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }







var goal_lead_val =  $('#goal_lead').val()+"|"+ $('#goal_consult_ratio').val()+"%";
$('#lead_simulation').html(goal_lead_val); 







///////---Second Option -----////////////////////////////



    var goal_consult = $('#goal_consult').val();
        var     consultation_sale_ratio = $('#consultation_sale_ratio').val();
            

            if(parseFloat(consultation_sale_ratio)>10){
        

        $('#unit_goal').val(Math.round((parseFloat(consultation_sale_ratio) / 100) * parseInt(goal_consult)));
        
            var unit_goal = $('#unit_goal').val();
           var  goal_lead = $('#goal_lead').val();
       
           $('#unit_goal_ratio').val(Math.round((parseFloat(unit_goal)) / parseFloat(goal_lead) *100));

  // $('#unit_goal').val(Math.round((parseInt(goal_lead))/(Math.round(parseInt(consultation_sale_ratio))/100)));
            }
         

         //   var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }


var goal_consult_val =  $('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 



var goal_consult_val=$('#goal_consult').val()+"|"+ $('#consultation_sale_ratio').val()+"%";
$('#consultation_simulation').html(goal_consult_val); 


var sale_unit_simulation_val=$('#unit_goal').val()+"|"+ $('#unit_goal_ratio').val()+"%";
$('#sale_unit_simulation').html(sale_unit_simulation_val); 















//////////////////////////////////////////////////









        });
        





        $('#sale_goal_per_unit').keyup(function(){
            // var sal_goal = $('#sale_goal').val();
            // var goal_unit = $('#sale_goal_per_unit').val();
            // if(parseInt(goal_unit)>10){
            //     var sal_ratio =parseInt($('#sale_ratio').html());
            //     var unit =$('#unit_goal').val();
            //     $('#unit_goal').val(Math.round(parseInt($('#sale_goal').val())/(parseInt($('#sale_goal_per_unit').val()))));
            //     //console.log(parseInt($('#const_sale_ratio').html())+" :: ");
            //     //console.log((parseInt($('#const_sale_ratio').html())/100));
            //     $('#goal_consult').val(Math.round(parseInt($('#unit_goal').val())/(parseInt($('#const_sale_ratio').html())/100)));
            //     $('#goal_lead').val(Math.round(parseInt($('#goal_consult').val())/(parseInt($('#const_ratio').html())/100)));
            // }else{
            //     //$('#sale_goal_per_unit').attr('readonly',true);
            //     //$('#unit_goal').attr('readonly',true);
            //     //$('#unit_goal_ratio').attr('readonly',true);
            //     $('#goal_consult').attr('readonly',true);
            //     $('#consultation_sale_ratio').attr('readonly',true);
            //     $('#goal_lead').attr('readonly',true);
            //     $('#goal_consult_ratio').attr('readonly',true);
            // }

     var unit_goal = $('#unit_goal').val();
            var sale_goal_per_unit = $('#sale_goal_per_unit').val();


            if(parseInt(sale_goal_per_unit)>10){

            $('#sale_goal').val(Math.round(parseInt(sale_goal_per_unit)*(parseInt(unit_goal))));

            }


        });
        
        
    });
    
    
    $('#set_counsellor_goal').on('click',function(){
        var goal_lead = $('#goal_lead').val();
        var goal_consult = $('#goal_consult').val();
        var goal_hot = $('#goal_hot').val();
        var unit_goal = $('#unit_goal').val();
        var sale_goal = $('#sale_goal').val();
        var note = $('#note').val();
        
        var pr_lead = $('#lead').html();
        var pr_lead_ratio = $('#const_ratio').html();
        var sm_lead = $('#lead_simulation').html();
        var lead_ratio = $('#goal_consult_ratio').val();
        
        var pr_consult = $('#const_unit').html();
        var pr_consult_ratio = $('#const_sale_ratio').html();
        var sm_consult = $('#consultation_simulation').html();
        var consult_ratio = $('#consultation_sale_ratio').val();
        
        var pr_unit = $('#unit').html();
        var pr_unit_ratio = $('#unit_ratio').html();
        var sm_unit = $('#sale_unit_simulation').html();
        var unit_ratio = $('#unit_goal_ratio').val();
        
        var pr_amount = $('#sale').html();
        var pr_amount_ratio = $('#sale_ratio').html();
        var sm_amount = "--";
        var amount_ratio = $('#sale_goal_per_unit').val();
        
        
        var url = '<?php echo base_url(); ?>dashboard/set_counsellor_goal';
        $.ajax({
            url: url,
            type: "POST",
            data:{goal_lead:goal_lead,goal_consult:goal_consult,goal_hot:goal_hot,unit_goal:unit_goal,sale_goal:sale_goal,note:note,
                pr_lead:pr_lead,pr_lead_ratio:pr_lead_ratio,sm_lead:sm_lead,lead_ratio:lead_ratio,
                pr_consult:pr_consult,pr_consult_ratio:pr_consult_ratio,sm_consult:sm_consult,consult_ratio:consult_ratio,
                pr_unit:pr_unit,pr_unit_ratio:pr_unit_ratio,sm_unit:sm_unit,unit_ratio:unit_ratio,
                pr_amount:pr_amount,pr_amount_ratio:pr_amount_ratio,sm_amount:sm_amount,amount_ratio:amount_ratio
            },
            dataType: "JSON",
            beforeSend: function () {
                $("#cover-spin").show();
            },
            success: function(result){
                // console.log(result);
                    if(result){
                        if(result =='Somenthing Went Wrong !'){
                            swal_title='Oops!';
                            swal_type = 'info';
                        }else{
                            swal_title='success';
                            swal_type = 'success';
                        }
                          swal({
                              title: swal_title,
                              html: result,
                              type: swal_type,
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Great !',
                              confirmButtonPadding:'0',
                          }).then((result) => {
                              if(result.value == true){
                                  $('#set_goal_modal').modal('hide');
                              window.location.reload();
                            }
                          })
                          }else{
                               
                          }
                
            },
            complete:function(){
                $("#cover-spin").hide();
            },
            error: function(){}             
        });
    });
    
    
    
    function numFormatter(num) {
    // if(num > 999 && num < 100000){
    //     return (num/1000).toFixed(2) + 'K'; // convert to K for number from > 1000 < 1 million 
    // }else if(num > 100000){
    //     return (num/100000).toFixed(2) + 'M'; // convert to M for number from > 1 million 
    // }else if(num < 900){
    //     return num; // if value < 1000, nothing to do
    // }
     return (num/1000).toFixed(2) + 'K';
}
   
   
   
   
    
    
});
function edit_detail_lead(ele){
    //   alert("dd");
      var fname=$(ele).data('fname');
      var email = $(ele).data('email');
      var age = $(ele).data('age');
      var weight = $(ele).data('weight');
      var height = $(ele).data('height');
      var phone = $(ele).data('phone');
      var lead_stage = $(ele).data('stage');
      var lead_gender = $(ele).data('gender');
      $('#lead_first_name_pending').val(fname);
      $('#lead_email_id_pending').val(email);
      $('#old_lead_email_id_pending').val(email);
      $('#lead_age_data_pending').val(age);
      $('#lead_weight_kg_pending').val(weight);
      $('#lead_weight_grm_pending').val();
      $('#lead_height_ft_pending').val(height);
      $('#lead_height_in_pending').val();
      $('#phone_pending').val(phone);
      if(lead_gender == 'male'){
          $("input[name=gender][value='male']").prop("checked",true);
      }
      if(lead_gender == 'female'){
           $("input[name=gender][value='female']").prop("checked",true);
      }
    //   $('#lead_gender').val(lead_gender);
       $('#lead_stage').val(lead_stage);
    //   alert (fname +" : "+email +" : "+age +" : "+weight +" : "+height +" : "+phone);
      $('#edit_lead_detail').modal('show');
   }




</script>

