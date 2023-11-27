<style>
/* width */
::-webkit-scrollbar {
  width: 4px;height: 4px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

.back_arr_css {
    display: block;
    background: #bdc3d4;
    margin: 0;
    padding: 0;
    z-index: 2;
    height: 30px;
    color: #000;
    position: relative;
}
.back_arr_css i {color: #000;font-size: 25px;padding: 2px 0 0 2rem;cursor: pointer;}
</style>
<div class="p-4 chat_sec_p">
    <input type="hidden" name="last_user_chat">
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--full-height whatsapp_chat_ui my-0" style="border: 1px solid #d6d6d6; background: url('https://www.balancenutrition.in/images/profile_pic/chat_bg.png');">
        <div class="m-portlet__body whatsapp_chat_body p-0">
            <div class="row">
                <div class="col-lg-4 pr-0">
                    <div class="chat_list px-0">
                        <!--<div class="form-group m-form__group px-3">
                			<label>Right Addon Button</label>
                			<div class="input-group">
                				<input type="text" class="form-control" placeholder="Search by Name, Email" id="search_bar" style="border-color: #000;height: 30px;">
                				<div class="input-group-append">
                					<button class="btn btn-secondary" type="button" style="border-color: #000;height: 30px;padding-top: 5px;"><i class="flaticon-search-1" style="color: #000;font-size: 12px;top: 0;"></i></button>
                				</div>
                			</div>
                		</div>-->
                		<div class="tablist_div">
                		    <ul class="nav nav-tabs  m-tabs-line" role="tablist">
                                <li class="nav-item m-tabs__item mr-3">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_chat_unread" role="tab">Unread &nbsp; (<?= $chat_unread_count ?>)</a>
                                </li>
                                <li class="nav-item m-tabs__item mr-3">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_chat_all" role="tab" id="get_all_chats">All</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="tab-content">
                            <div class="tab-pane active show" id="m_tabs_chat_unread" role="tabpanel">
                                <!--<div class="chat_grp_btn">
                                    <button type="button" class="btn m-btn--pill btn-success py-1 show-unread-all">All</button>
                                    <button type="button" class="btn m-btn--pill btn-secondary py-1 show-unread-active">Active</button>
                                    <button type="button" class="btn m-btn--pill btn-secondary py-1 show-unread-omr">OMR</button>
                                </div>-->
                                <div class="chat_lst">
                                    <table class="table m-table m-table--head-separator-primary w-100" id="chat_dttable">
                                        <thead class="d-none">
                                            <tr>
                                                <td>
                                                    #
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>                            
                            </div>
                            
                            <div class="tab-pane" id="m_tabs_chat_all" role="tabpanel">
                                <div class="chat_lst_all">
                                    <table class="table m-table m-table--head-separator-primary w-100" id="chat_all_dttable">
                                        <thead class="d-none">
                                            <tr>
                                                <td>
                                                    #
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-8 pl-0">
                    <div class="chat_welcome_screen">
                        <div class="chat_welcome_screen_img">
                        <img src="https://www.balancenutrition.in/images/cleanse/bn_logo_square.png" class="img-fluid">
                        </div>
                        <div class="chat_welcome_screen_title">
                            <p>Welcome to BN Leap App Chat !</p>
                        </div>
                    </div>
                    <div class="chat_send_msg_screen d-none">
                        <div class="m-portlet__head bg-primary p-0" style="height: 4rem;border-bottom: 1px solid #ccc;">
                            <div class="connect_chat">
                                
                                <div class="chat_user_details_html"></div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col chat_col">
                                <div class="m-accordion__item-content">
                                    <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                						<div class="m-messenger__messages chat_msg" id="chat_msg"> </div>
                						
                						<!--<div class="m-messenger__seperator"></div>-->
                                        <form action="<?= base_url('chat/send_chat_msg') ?>" menthod="post" id="chat_form">
                                            <input type="hidden" name="user_id" value="">
                                            <input type="hidden" name="user_email" value="">
                    						<div class="m-messenger__form mb-0">
                    							<div class="m-messenger__form-controls">
                    								<textarea name="message" placeholder="Type here..." id="send_chat_sms" class="m-messenger__form-input" cols="1"></textarea>
                    							</div>
                    							<div class="preview-img" style="display: none;">
                                                   <span class="close" onclick="$('.preview-img').css('display', 'none');$('.show-img').attr('src', '');$('.file_doc').val('').hide();return false;"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                                                   <img src="" class="show-img">
                                                   <div class="file_doc"></div>
                                                </div>
                                                <input id="chatimg" type="file" name="attachments" class="form-control d-none m-input chatimg">
                    							<div class="m-messenger__form-tools">
                    							    <a href="#" class="m-messenger__form-attachment bg-white d-none" id="attchement_chat">
                    								<i class="la la-paperclip"></i>
                                                    <!--<i class="la la-send"></i>-->
                    								</a>
                    								<a href="#" class="m-messenger__form-attachment bg-white" id="submit_chat_sms" type="submit">
                    								<!--<i class="la la-paperclip"></i>-->
                                                    <i class="la la-send"></i>
                    								</a>
                    							</div>
                    						</div>
                						</form>
                					</div>
                                </div>
                            </div>
                            <div class="col-5 d-none chat_user_details_collapse_html">
                                
                            </div>
                        </div>
             <!--           <div class="m-accordion__item-content">-->
             <!--               <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">-->
        					<!--	<div class="m-messenger__messages chat_msg" id="chat_msg"> </div>-->
        						
        						<!--<div class="m-messenger__seperator"></div>-->
             <!--                   <form action="<?= base_url('chat/send_chat_msg') ?>" menthod="post" id="chat_form">-->
             <!--                       <input type="hidden" name="user_id" value="">-->
             <!--                       <input type="hidden" name="user_email" value="">-->
            	<!--					<div class="m-messenger__form mb-0">-->
            	<!--						<div class="m-messenger__form-controls">-->
            	<!--							<textarea name="message" placeholder="Type here..." id="send_chat_sms" class="m-messenger__form-input" cols="1"></textarea>-->
            	<!--						</div>-->
            	<!--						<div class="preview-img" style="display: none;">-->
             <!--                              <span class="close" onclick="$('.preview-img').css('display', 'none');$('.show-img').attr('src', '');$('.file_doc').val('').hide();return false;"><i class="fa fa-times-circle" aria-hidden="true"></i></span>-->
             <!--                              <img src="" class="show-img">-->
             <!--                              <div class="file_doc"></div>-->
             <!--                           </div>-->
             <!--                           <input id="chatimg" type="file" name="attachments" class="form-control d-none m-input chatimg">-->
            	<!--						<div class="m-messenger__form-tools">-->
            	<!--						    <a href="#" class="m-messenger__form-attachment bg-white d-none" id="attchement_chat">-->
            	<!--							<i class="la la-paperclip"></i>-->
                                            <!--<i class="la la-send"></i>-->
            	<!--							</a>-->
            	<!--							<a href="#" class="m-messenger__form-attachment bg-white" id="submit_chat_sms" type="submit">-->
            								<!--<i class="la la-paperclip"></i>-->
             <!--                               <i class="la la-send"></i>-->
            	<!--							</a>-->
            	<!--						</div>-->
            	<!--					</div>-->
        					<!--	</form>-->
        					<!--</div>-->
             <!--           </div>-->
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

<script>
$(document).ready(function(){
    
    $("#submit_chat_sms").on("click",function(){
        var chatMsg = $("#chat_form textarea").val();
        
        if(chatMsg == ""){
            
            return false;
        }else{
            $("#chat_form").submit();
        }
    });
    
    var base_url = "<?php echo base_url()?>";
    
    $("#chat_dttable").DataTable({
        "ajax": {
            "type" : "POST",
            "url" : "<?php echo base_url()?>chat/chat_lead_list",
            "dataSrc": "chat_lead_list",
            data: {unread_id:"0"},
            beforeSend: function () {
                $("#cover-spin").show();
            }
        },
        "columns": [
            { "data": null }
        ],
        language: {
            search : "",
            searchPlaceholder: "Search By Name"
        },
        columnDefs: [{
            targets: [0], render: function (a, b, data, s) {
                
            var profile_pic = "";
            if (data.profile_image == "" || data.profile_image == null) {
                profile_pic = "user-image.png";
            }else{
                profile_pic = data.profile_image;
            }
                
            return '<div class="connect_chat" onclick="connect_chat(this)" data-assign_text="'+data.lead_assigned+'" data-user_id="'+data.user_id+'" data-user_email="'+data.email_id+'" data-unread_id="0" data-user_photo="'+profile_pic+'" data-user_name="'+data.name+'" data-limit="1"><span class="d-none">'+data.phone+'</span><img src="https://www.balancenutrition.in/images/profile_pic/'+profile_pic+'" class="client_chat_icon"><div class="client_chat_title_grp"><h4>'+data.name+' <small class="text-danger" id="lead_assign_text">'+data.lead_assigned+'</small></h4><span>'+data.last_text+'</span></div><span class="chat_time_sec"><span>'+data.created_date+'</span> <br><button class="unread_count">'+data.unread+'</button>';
            }
        }],
        initComplete:function(){
            $("#cover-spin").hide();
        },
        retrieve: true,
        "lengthChange": false,
        "ordering": false,
        "paging":   false,
        "info":   false,
    });
    
    $("#get_all_chats").on("click",function(){
        $("#chat_all_dttable").DataTable({
            "ajax": {
                "type" : "POST",
                "url" : "<?php echo base_url()?>chat/chat_lead_list",
                data: {unread_id:1},
                "dataSrc": "chat_lead_list",
                // cache: false,
                beforeSend: function () {
                    $("#cover-spin").show();
                }
            },
            "columns": [
                { "data": null }
            ],
            language: {
                search : "",
                searchPlaceholder: "Search By Name"
            },
            columnDefs: [{
                targets: [0], render: function (a, b, data, s) {
                    
                var profile_pic = "";
                if (data.profile_image == "" || data.profile_image == null) {
                    profile_pic = "user-image.png";
                }else{
                    profile_pic = data.profile_image;
                }
                    
                return '<div class="connect_chat" onclick="connect_chat(this)" data-user_id="'+data.user_id+'" data-user_email="'+data.email_id+'" data-unread_id="1" data-user_photo="'+profile_pic+'" data-user_name="'+data.name+'" data-limit="1"><span class="d-none">'+data.phone+'</span><img src="https://www.balancenutrition.in/images/profile_pic/'+profile_pic+'" class="client_chat_icon"><div class="client_chat_title_grp"><h4>'+data.name+' <small class="text-danger">'+data.lead_assigned+'</small></h4><span>'+data.last_text+'</span></div><span class="chat_time_sec"><span>'+data.created_date+'</span>';
                }
            }],
            initComplete:function(){
                $("#cover-spin").hide();
            },
            retrieve: true,
            "lengthChange": false,
            "ordering": false,
            "paging":   false,
            "info":   false,
        });
    });
});


function connect_chat(id){
        $('.chat_col').removeClass('pr-0');
        $('.chat_user_details_collapse_html').addClass('d-none');
        
        var assign_text = $(id).data('assign_text');
        // alert(assign_text);
        if(assign_text == "(Unassigned)"){
            swal({
                title: "This lead is Assigned to you now !",
                timer:5e3,
            });
        }
        
        // return false;
        var user_id = $(id).data('user_id');
        var limit_id = $(id).data('limit');
        var unread_id = $(id).data('unread_id');
        var user_name = $(id).data('user_name');
        var user_email = $(id).data('user_email');
        var user_photo = $(id).data('user_photo');
        var url = "<?= base_url() ?>chat/get_user_chat";
        $("input[name=last_user_chat]").val(user_id);
        $("input[name=user_id]").val(user_id);
        $("input[name=user_email]").val(user_email);
        
        var ImgUr = "https://www.balancenutrition.in/images/profile_pic/"+user_photo;
        // return false;
        $(".chat_send_msg_screen").removeClass('d-none');
        $(".chat_welcome_screen").addClass('d-none');
        $(".chat_send_msg_screen").show();
        
        $.ajax({
            type:"post",
            url: url,
            data:{user_id:user_id,user_email:user_email,limit_id:limit_id,user_name:user_name,user_photo:user_photo},
            dataType:"json",
            beforeSend: function () {
                $("#cover-spin").show();
            },
            success:function(data){
                var html = "";
                $.each(data.user_chat, function( i, val ){
                    var msgClass = "";
                    if(val.msg_type == 0){ 
                        // left, user message
                        msgClass = "in";
                    } else{
                        //right, counsellor message
                        msgClass = "out";
                    }
                    
                    html += '<div class="m-messenger__wrapper"> <div class="m-messenger__message m-messenger__message--'+msgClass+'"> <div class="m-messenger__message-body pt-2"> <div class="m-messenger__message-arrow"></div> <div class="m-messenger__message-content py-1 px-3"> <div class="m-messenger__message-text">'+val.message+'</div> <div class="m-messenger__message-username pt-2 text-dark">'+val.date+'</div> </div> </div> </div> </div>';
                });
                
                html += '<div class="downScroll"><i class="la la-arrow-down"></i></div>';
                
                
                $('.chat_msg').html(html);
                $("#cover-spin").hide();
                $("#send_chat_sms").focus();
                // $(id).parent().hide();
                $("#lead_assign_text").hide();
                scrollSmoothToBottom("chat_msg");
            },
            error:function(){
                // alert("test");
            }
        });
        
        
        $('.chat_user_details_html').html('<div class="back_arr_css d-none"><i class="fas fa-long-arrow-alt-left"></i></div><div class="m-accordion m-accordion--bordered m-accordion--solid" id="chat_user_details" role="tablist"> <div class="m-accordion__item"> <div class="m-accordion__item-head collapsed" role="tab" id="chat_user_details_item_'+user_id+'_head" href="#chat_user_details_item_'+user_id+'_body" data-toggle="collapse" aria-expanded="false"> <span class="m-accordion__item-icon"><img src="https://www.balancenutrition.in/images/profile_pic/user-image.png" id="user_photo_chat" class="client_chat_icon"></span> <span class="m-accordion__item-title" id="user_name_chat"> </span> <span class="m-accordion__item-mode"></span> </div>  </div> </div>');
        // var user_action_form = '<?php //$this->load->view('user_details/user_action'); ?>';
        var user_action_form = '';
        $('.chat_user_details_collapse_html').html('<div class="m-accordion__item-body collapse chat_user_details" role="tabpanel" id="chat_user_details_item_'+user_id+'_body" aria-labelledby="chat_user_details_item_'+user_id+'_head" data-parent="#chat_user_details" data-user_id="'+user_id+'" data-user_email="'+user_email+'"> <div class="m-accordion__item-content bg-white" style="height: 536px;"> <ul class="nav nav-tabs mx-3 m-tabs-line" role="tablist"> <li class="nav-item m-tabs__item"> <a class="nav-link m-tabs__link active" data-toggle="tab" href="#user_details_info" role="tab">Info</a> </li> <li class="nav-item m-tabs__item"> <a class="nav-link m-tabs__link" data-toggle="tab" href="#user_details_action" role="tab">Action</a> </li> </ul> <div class="tab-content"> <div class="tab-pane active" id="user_details_info" role="tabpanel"> <div class="user_details"></div> </div> <div class="tab-pane" id="user_details_action" role="tabpanel">'+user_action_form+'</div> </div> </div> </div>');
        
        if($(window).width() < 657){
            $(".back_arr_css").removeClass('d-none');
            // $(".chat_welcome_screen").hide();
            $(".chat_list").hide();
        }
        
        $(".back_arr_css i").on("click", function(){
            $(this).addClass('d-none');
            $(".chat_list").show();
            $(".chat_send_msg_screen").hide();
        });
        
        $("#user_photo_chat").attr("src",ImgUr);
        $("#user_name_chat").text(user_name);
        
        $('.chat_user_details').on('shown.bs.collapse', function (e) {
            e.preventDefault();
            var user_id = $(this).data('user_id');
            // var user_name = $(id).data('user_name');
            var user_email = $(this).data('user_email');
            
            console.log(user_id+ " " +user_email);
            
            var url = "<?= base_url() ?>chat/get_header_user_details";
            
            $.ajax({
                type:"post",
                url: url,
                data:{user_id:user_id,user_email:user_email},
                dataType:"json",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success:function(data){
                    
                    var userDetails = '<table class="table m-table table-bordered"><tbody><tr><td>Status : '+data['user_details'][0]['status']+'</td><td>Stage : <b>'+data['user_details'][0]['stage']+'</b></td><td>Medical Issue : </b>'+data['user_details'][0]['medical_issue']+'</td></tr><tr><td>Curr. Wt. : '+data['user_details'][0]['cur_wt']+'</td><td>Ideal Wt. : '+data['user_details'][0]['ideal_wt']+'</td> <td>BMI : '+data['user_details'][0]['ideal_bmi']+'</td></tr><tr><td>Category : '+data['user_details'][0]['health_category']+'</td> <td>Gender : '+data['user_details'][0]['gender']+'</td><td>Age : '+data['user_details'][0]['age']+'</td></tr><tr><td>Country : '+data['user_details'][0]['country']+'</td><td>State : '+data['user_details'][0]['state']+'</td><td>City : '+data['user_details'][0]['city']+'</td></tr></tbody></table>';
                    // alert(html);
                    
                    $(".user_details").html(userDetails);
                    $("#cover-spin").hide();
                },
                error:function(){
                    // alert("test");
                }
            });
        });
        
        $('.chat_user_details').on('hidden.bs.collapse', function (e) {
            $(this).parent('div').addClass("d-none");
            $('.chat_col').removeClass('pr-0');
            $('.user_details').html('');
        });
        
        $('.chat_user_details').on('shown.bs.collapse', function (e) {
            $('.chat_user_details_collapse_html').removeClass("d-none").addClass('pl-0');
            $('.chat_col').addClass('pr-0');
            $(".chat_col ").hide();
        });
        $('.chat_user_details').on('hidden.bs.collapse', function (e) {
            $('.chat_user_details_collapse_html').addClass("d-none").addClass('pl-0');
            // $('.chat_col').addClass('pr-0');
            $(".chat_col ").show();
        });
    // });
}

$(document).ready(function(){
   $(".status_id").on('change',function(){
      var status = $(this).find("option:selected").val(); 
      if(status == 11){
          $('#status_warm').removeClass('d-none');
          
          $.ajax({
              type:"post",
              url: "<?= base_url().'user_details/get_sub_status'; ?>",
              dataType:"json",
              success:function(data){
                  var sub_stat = data['sub_status'];
                  var explodeLst = sub_stat.split(",");
                  var sub_status = "<option val=''>Please Select</option>";
                  $.each(explodeLst, function(i, val){
                    //   if(val == "hot"){
                    //       alert(1);
                    //   }
                      sub_status += "<option value='"+val+"'>"+val+"</option>";
                  });
                  $(".status_warm").html(sub_status);
              }
          })
          
            $('#status_pay_later').addClass('d-none');
      }else if(status == 8){
          $('#status_pay_later').removeClass('d-none');
            $('#status_warm').addClass('d-none');
      }else{
        $('#status_warm').addClass('d-none');
        $('#status_pay_later').addClass('d-none');
      }
    //   alert(status);
   });
   
});

$(document).on("click",".downScroll",function(){
    scrollSmoothToBottom("chat_msg");
    $(this).hide();
});

$('.chat_msg').on('mousewheel', function(e){
    if(e.originalEvent.wheelDelta > 0) {
        $('.downScroll').fadeIn();
    }
    else {
        $('.downScroll').fadeOut();
    }
});

function scrollSmoothToBottom (id) {
   $('#' + id).scrollTop($('#' + id)[0].scrollHeight - ($('#' + id)[0].clientHeight * 0));
}

function readURL(input) {
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
     $('.show-img').attr('src', e.target.result);
     $('.preview-img').show(700);
   }
   
   reader.readAsDataURL(input.files[0]);
 }
}
$(document).ready(function(){
    $(".chatimg").change(function(event) {
        var file = URL.createObjectURL(event.target.files[0]);
        var filePath = $(this).val();
        var file_ext = filePath.substr(filePath.lastIndexOf('.')+1,filePath.length);
        // alert(file_ext);
        if(file_ext == "jpg" || file_ext == "jpeg" || file_ext == "png" || file_ext == "gif" || file_ext == "bmp" || file_ext == "webp"){
            $(".show-img").show();
            $('.file_doc').hide();
           readURL(this); 
        }else if(file_ext == "doc" || file_ext == "docx" || file_ext == "pdf"){
            $('.preview-img').show(700);
            $(".show-img").hide();
            $('.file_doc').show();
            $('.file_doc').append('<a href="' + file + '" target="_blank">' + event.target.files[0].name + '</a><br>');
        }
    });
    
    $('#attchement_chat').on('click',function(){
        $('.chatimg').trigger('click');
    });
});
</script>