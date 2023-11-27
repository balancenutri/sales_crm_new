<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
  body {
    background-color: #74EBD5;
    background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);

    min-height: 100vh;
  }

  ::-webkit-scrollbar {
    width: 5px;
  }

  ::-webkit-scrollbar-track {
    width: 5px;
    background: #f5f5f5;
  }

  ::-webkit-scrollbar-thumb {
    width: 1em;
    background-color: #ddd;
    outline: 1px solid slategrey;
    border-radius: 1rem;
  }

  .text-small {
    font-size: 0.9rem;
  }

  .messages-box,
  .chat-box {
    height: 510px;
    overflow-y: scroll;
  }

  .rounded-lg {
    border-radius: 0.5rem;
  }

  input::placeholder {
    font-size: 0.9rem;
    color: #999;
  }

  .btn_attachment {
    background-color: #3f8b62;
    /* Blue background */
    border: none;
    /* Remove borders */
    color: white;
    /* White text */
    /* padding: 9px 14px;  */
    font-size: 16px;
    /* Set a font size */
    cursor: pointer;
    /* Mouse pointer on hover */
    margin: 10px;
  }

  .btn_chat {
    background-color: DodgerBlue;
    /* Blue background */
    border: none;
    /* Remove borders */
    color: white;
    /* White text */
    /* padding: 9px 14px;  */
    font-size: 16px;
    /* Set a font size */
    cursor: pointer;
    /* Mouse pointer on hover */
    margin: 10px;
  }

  .fixed-div {
    /* border:1px solid red; */
    height: 60px;
    background-color: #0079af;
  }

  #image-wrapper {
    text-align: center;
    /* Center the image horizontally */
    position: relative;
    /* Required for absolute positioning of the cancel button */
  }

  .active_record {
    background-color: #0079af;
  }
</style>
<div class="container py-1 px-3">
  <div class="row rounded-lg overflow-hidden shadow">
    <div class="col-5 px-0">
      <div class="bg-white">
        <div class="input-group py-5 px-4">
          <input style="border:2px solid #528cc8" type="text" id="search-input" class="form-control"
            placeholder="Search by email or name">
        </div>
        <!-- <div class="bg-gray px-4 py-2 bg-light">
          <p style="color:#35a73c" class="h5 mb-0 py-1">Lead</p>
        </div> -->
        <div class="messages-box">
          <div class="list-group rounded-0">
            <?php foreach ($chats as $record) {
              ?>
              <a href="<?php echo base_url("chat/index/" . $record["name"] . '/') . urlencode($record["email"]); ?>"
                class="list-group-item list-group-item-action rounded-0 <?php if ($select == $record["email"]) {
                  echo "active_record ";
                } else {
                  echo "";
                } ?>    " data-email="<?= $record["email"] ?>" data-councellor_id="<?= $councellor_id ?>">
                <div class="media lead_email" data-email="<?= $select ?>">
                  <img src="<?php echo base_url("images/councellor/user_icon.png") ?>" alt="user" width="50"
                    class="rounded-circle">
                  <div class="media-body ml-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <h6 class="mb-0">
                        <?php
                        $user_name = $record["name"];
                        $camelCaseUser = ucwords($user_name);
                        echo $camelCaseUser;
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </a>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Chat Box-->
    <div class="col-7 px-0 bg-white chat_section" id="chat-box-container">
      <div class="m-1 fixed-div">
        <div class="container text-center">
          <?php
          $name = str_replace("%20", " ", $name);
          ?>
          <h4 class="text-white p-3">
            <?php echo $name; ?>
          </h4>
        </div>
      </div>
      <div class="px-4 py-5 chat-box ">

        <!-- Inside the loop that displays chat records -->
        <?php
        foreach ($chat_records as $msg) {
          $created_at_timestamp = strtotime($msg["created"]);
          $formatted_date = date("h:i A | M d", $created_at_timestamp);
          $message = str_replace("+", " ", $msg["query"]);
          $fileExtension = pathinfo($msg["attachment"], PATHINFO_EXTENSION);

          if ($msg["type"] != "reply") {
            ?>
            <div class="media w-50 mb-3">
              <div class="media-body ml-3">
                <?php if (in_array($fileExtension, array('jpg', 'jpeg', 'png'))) { ?>
                  <a href="<?php echo base_url("images/councellor/") . $msg["attachment"]; ?>" target="_blank">
                    <img src="<?php echo base_url("images/councellor/") . $msg["attachment"]; ?>" alt="img" height="300"
                      width="300" />
                  </a>
                <?php } elseif (in_array($fileExtension, array('pdf', 'doc', 'docx'))) { ?>
                  <a style="color:blue" href="<?php echo base_url("images/councellor/") . $msg["attachment"]; ?>"
                    target="_blank">
                    Download
                    <?php echo $msg["attachment"] . '' . strtoupper($fileExtension); ?> File
                  </a>
                <?php } else { ?>
                  <div class="bg-light rounded py-2 px-3 mb-2">
                    <p class="text-small mb-0 text-muted">
                      <?php echo $message; ?>
                    </p>
                  </div>

                <?php } ?>
                <p class="small text-muted">
                  <?php echo $formatted_date; ?>
                </p>
              </div>
            </div>
          <?php } else { ?>
            <div class="media w-50 ml-auto mb-3">
              <div class="media-body">
                <?php if (in_array($fileExtension, array('jpg', 'jpeg', 'png'))) { ?>
                  <a href="<?php echo base_url("images/councellor/") . $msg["attachment"]; ?>" target="_blank">
                    <img src="<?php echo base_url("images/councellor/") . $msg["attachment"]; ?>" alt="img" height="300"
                      width="300" />
                  </a>

                <?php } elseif (in_array($fileExtension, array('pdf', 'doc', 'docx'))) { ?>
                  <a style="color:blue" href="<?php echo base_url("images/councellor/") . $msg["attachment"]; ?>"
                    target="_blank">
                    DownloadF
                    <?php echo $msg["attachment"] . '' . strtoupper($fileExtension); ?> File
                  </a>
                <?php } else { ?>
                  <div class="bg-primary rounded py-2 px-3 mb-2">
                    <p class="text-small mb-0 text-white">

                      <?php
                      echo $message;
                      ?>
                    </p>
                  </div>
                <?php } ?>
                <p class="small text-muted">
                  <?php echo $formatted_date; ?>
                </p>
              </div>
            </div>
          <?php }
        }
        ?>

      </div>
      <form action="#" class="bg-light" id="chat_data">
        <div class="input-group">
          <input type="text" id="councelor_reply" name="councelor_reply" placeholder="Type a message"
            aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light pb-3">
          <div class="input-group-append">
            <input type="file" id="attachment" style="display: none">
            <button class="btn btn-link btn_attachment" id="attach-icon" type="button">
              <i class="fa fa-paperclip" id="attach-icon"></i>
            </button>

            <button class="submit_chat btn btn-link btn_chat" type="button">
              <i class="fa fa-paper-plane"></i>
            </button>
            <br>
          </div>
        </div>


        <div class="media w-50 mb-3" id="uploaded-image-container" style="display: none;">
          <div class="media-body ml-3">
            <div class="bg-light rounded py-2 px-3 mb-2">
              <div id="image-wrapper" style="position: relative;">
                <img id="uploaded-image" alt="Uploaded Image"
                  style="max-width: 100%; max-height: 200px; display: block; margin: 0 auto;">
                <!-- Add a cancel button for the image (positioned at the top right) -->
                <button id="cancel-image" class="btn btn-danger cancel-image"
                  style="position: absolute; top: 0; right: 0;">X</button>
              </div>
            </div>
          </div>
        </div>
        <div class="media w-50 mb-3" id="uploaded-document-container" style="display: none;">
          <div class="media-body ml-3">
            <div class="bg-light rounded py-2 px-3 mb-2">
              <a style="color:blue" id="document-link" target="_blank">View Document</a>
              <button id="cancel-image" class="btn btn-danger cancel-image">X</button>
            </div>

          </div>
        </div>



      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>



    $(document).ready(function () {
     
      var selectedEmail = '<?php echo $select; ?>';
      if (selectedEmail.trim() !== '') {
        $('#chat_data').show();
        $('.chat_section').show();

        var chatBoxContainer = $(".chat-box");
        chatBoxContainer.scrollTop(chatBoxContainer[0].scrollHeight);

      } else {

        $('#chat_data').hide();
        $('.chat_section').hide();
      }



    });

    //attach file
    $("#attach-icon").click(function () {
      $("#attachment").click();
    });

    // change the uploaded image
    $("#attachment").on("change", function () {
      var file = this.files[0];
      if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          var fileExtension = file.name.split('.').pop().toLowerCase();

          if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
            // Display the uploaded image
            $("#uploaded-image").attr("src", e.target.result);
            $("#uploaded-image-container").show();
            $("#uploaded-document-container").hide();
          } else if (['pdf', 'doc', 'docx'].includes(fileExtension)) {
            // Display the document link
            $("#document-link").attr("href", e.target.result);
            $("#uploaded-document-container").show();
            $("#uploaded-image-container").hide();
          } else {
            // Handle unsupported file types
            alert("Unsupported file type: " + fileExtension);
            $("#attachment").val(""); // Clear the file input
            $("#uploaded-image-container").hide();
            $("#uploaded-document-container").hide();
          }
        };
        reader.readAsDataURL(file);
      }
    });

    // Cancel the uploaded image
    $(".cancel-image").click(function () {
      $("#attachment").val(""); // Clear the file input
      $("#uploaded-image-container").hide();
      $("#uploaded-document-container").hide();
    });


    // insert chat    
    // $(".submit_chat").click(function () {
    $(".submit_chat").click(function () {

      var councelor_reply_old = $("#councelor_reply").val();

      var councelor_reply = (councelor_reply_old !== '' ? councelor_reply_old : '');

      var leadEmail = $(".lead_email").data("email");
      var chat_last_id = $(".lead_email").data("chat_last_id");

      var formData = new FormData();
      formData.append('leadEmail', leadEmail);
      formData.append('councelor_reply', councelor_reply);
      formData.append('attachment', $('#attachment')[0].files[0]);


      $.ajax({
        type: "POST",
        url: "<?php echo base_url("Chat/insert_Chat_data1"); ?>",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {

          var insertedData1 = response.inserted_data;
          // console.log(insertedData);
          var message_old = insertedData1.query;
          var message = message_old.replace(/\+/g, ' ');
          var attachments = insertedData1.attachment;
          var emailId = insertedData1.email_id;
          var name = insertedData1.name;
          var type = insertedData1.type;
          var readStatus = insertedData1.read_status;
          var leadType = insertedData1.lead_type;
          var councellorId = insertedData1.councellor_id;
          var created = insertedData1.created;
          var formatted_date = moment(created).format("h:mm A | MMM DD");

          var isReply = type === 'reply';
          var html = '<div class="media ml-auto w-50 mb-3">';
          html += '<div class="media-body">';
          if (attachments.length > 0) {
            arr = attachments.split('.');
            var attachmentExtension = arr[1];

            if (attachmentExtension) {
              if (attachmentExtension === 'pdf' || attachmentExtension === 'doc' || attachmentExtension === 'pdf') {
                console.log('pdf');

                // Handle PDF attachment
                var pdfPath = 'sales_crm_new/images/councellor/' + attachments;
                html += '<a style="color: blue" href="' + pdfPath + '" target="_blank">';
                html += 'Download ' + attachments + ' File';
                html += '</a>';

              } else if (attachmentExtension.toLowerCase() === 'png' || attachmentExtension.toLowerCase() === 'jpg' || attachmentExtension.toLowerCase() === 'jpeg') {

                var imagePath = 'https://www.balancenutrition.in/sales_crm_new/images/councellor/' + attachments;
                console.log(imagePath);
                html += '<a href="' + imagePath + '" target="_blank">';
                html += '<img src="' + imagePath + '" alt="img" height="300" width="300"/>';
                html += '</a>';
              }
              else {
                console.log("No attachment extension found.");

              }
            } else {
              console.log("No attachment extension found.");
            }


          } else {

            // Handle text message
            html += '<div class="bg-' + (isReply ? 'primary' : 'light') + ' rounded py-2 px-3 mb-2">';
            html += '<p class="text-small mb-0 ' + (isReply ? 'text-white' : 'text-muted') + '">';
            html += message;
            html += '</p>';
            html += '</div>';
          }

          html += '<p class="small text-muted">' + formatted_date + '</p>';
          html += '</div>';
          html += '</div>';

          $(".chat-box").append(html);
          $("#councelor_reply").val('');
          $("#attachment").val('');
          $("#uploaded-image-container").hide();
          $("#uploaded-document-container").hide();
          var chatBoxContainer = $(".chat-box");
          chatBoxContainer.scrollTop(chatBoxContainer[0].scrollHeight);
        }

      });
    });

    // serch record
    $("#search-input").on("input", function () {
      var searchText = $(this).val().toLowerCase();
      $(".list-group-item").each(function () {
        var email = $(this).data("email").toLowerCase();
        var name = $(this).find("h6").text().toLowerCase();
        if (email.includes(searchText) || name.includes(searchText)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });

    var lastMessageTimestamp = 0;
    function append_lead_chat() {
      var leadEmail = $(".lead_email").data("email");
      console.log(leadEmail);
      if(leadEmail){
          
      
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Chat/fetch_unread_lead_message'); ?>",
        data: {
          email_id: leadEmail,
      lastTimestamp: lastMessageTimestamp,

        },
        dataType: "json",
        success: function (response) {
        console.log("asas");
          for (var i = 0; i < response.chat_records.length; i++) {
            var insertedData1 = response.chat_records[i];
            console.log(insertedData1);
            var message = insertedData1.query;
            var attachments = insertedData1.attachment;
            var emailId = insertedData1.email_id;
            var name = insertedData1.name;
            var type = insertedData1.type;
            var readStatus = insertedData1.read_status;
            var leadType = insertedData1.lead_type;
            var councellorId = insertedData1.councellor_id;
            var created = insertedData1.created;
            var formatted_date = moment(created).format("h:mm A | MMM DD");
            lastMessageTimestamp = insertedData1.created;
            var isReply = type === 'reply';
            var html = '<div class="media w-50 mb-3">';
            html += '<div class="media-body ml-auto">';

            if (attachments.length > 0) {
              var arr = attachments.split(',');
              for (var j = 0; j < arr.length; j++) {
                var attachment = arr[j].trim();
                var extension = attachment.split('.').pop().toLowerCase();
                var attachmentPath = 'https://www.balancenutrition.in/sales_crm_new/images/councellor/' + attachment;
                //  var attachmentPath = "<?php echo base_url('images/councellor/'); ?>" + attachment;

                if (extension === 'pdf' || extension === 'doc') {
                  // Handle PDF or DOC attachment
                  html += '<a style="color: blue" href="' + attachmentPath + '" target="_blank">';
                  html += 'Download ' + attachment + ' File';
                  html += '</a>';
                  html += '</br>';
                  html += '</br>';
                  html += '</br>';
                } else if (extension === 'png' || extension === 'jpg' || extension === 'jpeg') {
                  // Handle image attachment
                  html += '<a href="' + attachmentPath + '" target="_blank">';
                  html += '<img src="' + attachmentPath + '" alt="img" height="300" width="300"/>';
                  html += '</a>';
                  html += '</br>';
                  html += '</br>';
                  html += '</br>';
                }
              }
            }
            else {
              console.log("No attachment");
            }
           
              // Handle text message
              html += '<div class="bg-' + (isReply ? 'primary' : 'light') + ' rounded py-2 px-3 mb-2">';
              html += '<p class="text-small mb-0 ' + (isReply ? 'text-white' : 'text-muted') + '">';
              html += message;
              html += '</p>';
              html += '</div>';
            

            html += '<p class="small text-muted">' + formatted_date + '</p>';
            html += '</div>';
            html += '</div>';

            $(".chat-box").append(html);
          }

          // $("#councelor_reply").val('');
          // $("#attachment").val('');
          // $("#uploaded-image-container").hide();
          // $("#uploaded-document-container").hide();
          var chatBoxContainer = $(".chat-box");
          chatBoxContainer.scrollTop(chatBoxContainer[0].scrollHeight);

        }
      });
      }
    }



    append_lead_chat(); // Call initially
setInterval(append_lead_chat, 9000); 

  </script>