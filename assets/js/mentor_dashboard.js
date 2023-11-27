/*$(window).on('load', function(){
	AddMoreContent();
});*/

var baseUrl = "http://localhost:8080/"; //<?= BASE_URL ?>;

/*$(window).scroll(function(){
  // if  ($(window).scrollTop() == $(document).height() - $(window).height()){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
    AddMoreContent();
  }
});*/

$(window).data('ajaxready', true).scroll(function(e) {
  e.preventDefault();
  if ($(window).data('ajaxready') == false) return;

  if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
    // $('div#loadmoreajaxloader').show();
    $(window).data('ajaxready', false);
    active_client_journey();
  }
});

function scorllingBar(scrollId){
  switch(scrollId){

    case "calendar":
      // ();
      $(window).data('calendar', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('calendar') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('calendar', false);
          calendar();
        }
      });
      break;

    case "active_client_journey":
      // ();
      $(window).data('active_client_journey', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('active_client_journey') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('active_client_journey', false);
          active_client_journey();
        }
      });
      break;
    case "half_time_6th_day":
      // alert(2);
      $(window).data('half_time_6th_day', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('half_time_6th_day') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('half_time_6th_day', false);
          half_time_6th_day();
        }
      });
      break;
    case "half_time_tail_end":
      // ();
      $(window).data('half_time_tail_end', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('half_time_tail_end') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('half_time_tail_end', false);
          half_time_tail_end();
        }
      });
      break;
    case "client_base_bifurcation":
      // ();
      $(window).data('client_base_bifurcation', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('client_base_bifurcation') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('client_base_bifurcation', false);
          client_base_bifurcation();
        }
      });
      break;
    case "lets_make_money_honey":
      // ();
      $(window).data('lets_make_money_honey', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('lets_make_money_honey') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('lets_make_money_honey', false);
          lets_make_money_honey();
        }
      });
      break;
    case "tailend_stage":
      // ();
      $(window).data('tailend_stage', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('tailend_stage') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('tailend_stage', false);
          tailend_stage();
        }
      });
      break;
    case "sales_pointers":
      // ();
      $(window).data('sales_pointers', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('sales_pointers') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('sales_pointers', false);
          sales_pointers();
        }
      });
      break;
    case "omr_calls_consultation":
      // ();
      $(window).data('omr_calls_consultation', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('omr_calls_consultation') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('omr_calls_consultation', false);
          omr_calls_consultation();
        }
      });
      break;
    case "omr_stages":
      // ();
      $(window).data('omr_stages', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('omr_stages') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('omr_stages', false);
          omr_stages();
        }
      });
      break;
    case "mentor_report":
      // ();

      $(window).data('mentor_report', true).scroll(function(e) {
        e.preventDefault();
        if ($(window).data('mentor_report') == false) return;

        if ($(window).scrollTop() >= ($(document).height() - $(window).height())) {
          // $('div#loadmoreajaxloader').show();
          $(window).data('mentor_report', false);
          mentor_report();
        }
      });
      break;
    default:
      // sales_pointers();
      break;    
  }    
}

/*function how_day_looks_cont(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/how_day_looks_cont',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      // alert(1);
      scorllingBar('calendar');
     },
     success:function(response){
         $('#how_day_looks_cont_html').html(response.how_day_looks_cont_html);
         $(window).data('how_day_looks_cont', true);
     }
  });
}

function calendar(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/calendar',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      // alert(1);
      scorllingBar('active_client_journey');
     },
     success:function(response){
         $('#calendar_html').html(response.calendar_html);
         $(window).data('calendar', true);
     }
  });
}*/

function active_client_journey(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/active_client_journey',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      // alert(1);
      scorllingBar('half_time_6th_day');
     },
     success:function(response){
         $('#active_client_journey_html').html(response.active_client_journey_html);
         $(window).data('active_client_journey', true);
     }
  });
}

function half_time_6th_day(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/half_time_6th_day',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('half_time_tail_end');
     },
     success:function(response){
         $('#half_time_6th_day_html').html(response.half_time_6th_day_html);
         $(window).data('half_time_6th_day', true);
     }
  });
}

function half_time_tail_end(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/half_time_tail_end',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('client_base_bifurcation');
     },
     success:function(response){
         $('#half_time_tail_end_html').html(response.half_time_tail_end_html);
         $(window).data('half_time_tail_end', true);
     }
  });
}

function client_base_bifurcation(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/client_base_bifurcation',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('lets_make_money_honey');
     },
     success:function(response){
         $('#client_base_bifurcation_html').html(response.client_base_bifurcation_html);
         $(window).data('lets_make_money_honey', true);
     }
  });
}

function lets_make_money_honey(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/lets_make_money_honey',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('tailend_stage');
     },
     success:function(response){
         $('#lets_make_money_honey_html').html(response.lets_make_money_honey_html);
         $(window).data('lets_make_money_honey', true);
     }
  });
}

function tailend_stage(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/tailend_stage',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('sales_pointers');
     },
     success:function(response){
         $('#tailend_stage_html').html(response.tailend_stage_html);
         $(window).data('tailend_stage', true);
     }
  });
}

function sales_pointers(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/sales_pointers',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('omr_calls_consultation');
     },
     success:function(response){
         $('#sales_pointers_html').html(response.sales_pointers_html);
         $(window).data('sales_pointers', true);
     }
  });
}

function omr_calls_consultation(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/omr_calls_consultation',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      scorllingBar('omr_stages');
      //  $("#cover-spin").hide();
     },
     success:function(response){
         $('#omr_calls_consultation_html').html(response.omr_calls_consultation_html);
         $(window).data('omr_calls_consultation', true);
     }
 });
}

function omr_stages(){
  $.ajax({
     type : 'post',
     url: baseUrl+'user/omr_stages',
     data: {},
     dataType:'json',
     cache: false,
     beforeSend: function(){
      //  $("#cover-spin").show();
     },
     complete: function(){
      //  $("#cover-spin").hide();
      scorllingBar('mentor_report');
     },
     success:function(response){
         $('#omr_stages_html').html(response.omr_stages_html);
         $(window).data('omr_stages', true);
     }
  });
}

function mentor_report(){
  $.ajax({
       type : 'post',
       url: baseUrl+'user/mentor_report',
       data: {},
       dataType:'json',
       cache: false,
       beforeSend: function(){
        //  $("#cover-spin").show();
       },
       complete: function(){
        //  $("#cover-spin").hide();
       },
       success:function(response){
           $('#mentor_view_html').html(response.mentor_view_html);
           $(window).data('mentor_report', true);
       }
   });

  // return false;
}

//this is for mobile view UI CSS
if($(window).width() < 992){
	$('.hd_looks_sec_grp .col, .hd_looks_sec_grp .col-5, .act_cln_journey .col').addClass('col-12');

	$('.omr_stages_sec .row').css({'display':'block'});
}