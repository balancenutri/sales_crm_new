<?php
    // echo "<pre>";
    // print_r($last_8days_checkout);
    // print_r($yesterday_goals);
    // die();
    // $yesterday_goals=array_column($yesterday_goals,'user_id');
    // $monthly_goals=array_column($goal_data,'user_id');
    // $new_diff_array = array_intersect($monthly_goals, $yesterday_goals);
    $app_version = array('5.0.3','1.0.52');
    ?>
<style type="text/css">
    .err{color: red;}
    .faq_btn {
    color: #000;
    display: block;
    outline: none;
    }
    .faq_btn:hover {
    text-decoration:none;
    color:#000;
    }
    .faq_btn:before {
    display: none !important;
    }
    /*.odd {
    display: block;
    margin: 10px 0;
    width: 100%;
    }
    .odd td {
    display: block;
    }*/
    .open{
    transform: rotate(90deg);
    transition:all .4s ease-in;
    }
    .close{
    transform: rotate(0deg);
    transition:all .4s ease-in;
    }
    .showText {
    background: #f0f0f0;
    width: auto;
    position: relative;
    display: inline-block;
    padding: 5px 10px;
    font-weight: 600;
    }   
    .table tbody td, .table tbody th {
    color: #000;
    }
    .m-table.m-table--head-bg-metal thead th {
    border-right-color: #fff !important;
    vertical-align: inherit;
    text-align: center;
    border-right: 1px solid;
    }
    .m-table.m-table--head-bg-metal thead th:last-child{
    border-right-color: #c4c5d6 !important;
    }
    label {
    color: #000 !important;
    font-weight:600 !important;
    display: inline;
    }
    .form-control, .form-control[readonly] {
    border-color: #333;
    color: #575962;
    }
    .m-portlet .m-portlet__head {
    padding: 0 1rem;
    height: 3rem;
    }
    .dataTables_filter {
    padding: 0 0 10px;
    }
    #table_select {
    height: 30px;
    padding: 2px 10px;
    color: #000;
    display: inline-block;
    width: 25%;
    margin: 6px 0 0;
    }
    .filter_div{
    width: 100%;
    display: inline-block;
    margin: 0 0 10px;
    text-align: right;
    }
    .add_faqs_section {
    padding: 0 0 1.4rem 0;
    display: none;
    border: 1px solid;
    margin: 0 0 2rem;
    }
    #faqs_chat_popup .nav-pills .nav-link, #faqs_chat_popup .nav-pills>.nav-link {
    color: #000 !important;
    /*background-color: #efbe58;*/
    }
    #faqs_chat_popup .nav-pills .nav-link.active, #faqs_chat_popup .nav-pills .show>.nav-link {
    color: #fff !important;
    background-color: #5867dd;
    }
    .add_faq_btn {
    position: absolute;
    right: 10px;
    top: 14px;
    }
    #faqs_chat_popup .nav-link {
    color: #6f727d;
    background: #ff9f9f70;
    border: 1px solid #ff9f9f !important;
    }
    #faqs_chat_popup .nav-pills .nav-link.active, #faqs_chat_popup .nav-pills .show>.nav-link{
    border: 1px solid #5867dd !important;
    }
    .m-table.m-table--head-bg-metal thead th {
    background: #c4c5d6;
    color: #000;
    border-bottom: 0;
    border-top: 0;
    }
    table.dataTable.no-footer {
    border-bottom: none !important; 
    }
    #faqs_chat_popup .table_id tbody td {
    word-break: break-word;
    }
    #faqs_chat_popup .cp_btn_mdraft i {
    font-size: 10px !important;
    font-weight: 600;
    padding: 2px;
    }
    #faqs_chat_popup .cp_btn i {
    font-size: 10px !important;
    font-weight: 600;
    padding: 2px;
    }
    #faqs_chat_popup a.nav-link {font-size: 10px;padding: 2px;}
    #faqs_chat_popup a.nav-link img {
    width: 10px;
    height: 10px;
    }
    #faqs_chat_popup .add_faq_btn {
    font-size: 10px;
    padding: 3px;
    }
    #faqs_chat_popup td {font-size: 12px;}
    .tailend_new{
    border: 1px solid blue;
    width: 124px;
    text-align: center;
    border-radius: 6px;
    }
    /*.all_data{
    display: none;
    }*/
    .active_data{
    display:none;
    }
    .dormant_data{
    display:none;
    }
    .onhold_data{
    display:none;
    }
    .renewal0{
    display:none;
    }
    .renewal1{
    display:none;
    }
    .renewal2{
    display:none;
    }
    .renewal3{
    display:none;
    }
    .onhold_od_data{
    display: none;
    }
    .ibw_data{
    display:none;
    }
    .medical_data{
    display:none;
    }
    .table_id{
    width:98% !important;
    }
    .show-read-more .more-text{
    display: none;
    }
</style>

<ul class="nav nav-tabs mt-2" style="float-right">
    <li class="btn btn-md btn-success ml-3"><a data-toggle="tab" href="#home">Real-Time (Only 10AM-7PM)</a></li>
    <li class="btn btn-md btn-success ml-2"><a data-toggle="tab" href="#menu1">Overnight (7:01 PM to 9:59 AM)</a></li>
    <li class="btn btn-md btn-success ml-2"><a data-toggle="tab" href="#menu2">Last 8 Days</a></li>
    <!--<li class="btn btn-md btn-success ml-2"><a data-toggle="tab" href="#menu3">UnAssigned</a></li>-->
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active show">
        <div class="tab-pane active real_time" id="real_time" role="tabpanel">
            <div class="m-section">
                <div class="table-responsive">
                    <h2 class="text-center session_class">Checkout Page Visited Between 10 AM to 7 PM Real-Time </h2>
                    <table class="table_id table m-table table-bordered m-table--border-metal m-table--head-bg-metal" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10%;">Name</th>
                                <!--<th style="width:10%;">DOB</th>-->
                                <th style="width:10%;">Phone</th>
                                <!-- <th style="width:10%;">Program+Session</th> -->
                                <th style="width:10%;">User Status</th>
                                <th style="width:10%;">Date</th>
                                <th style="width:10%;">Amount</th>
                                <th style="width:10%;">Source</th>
                                <th style="width:10%;">Country</th>
                                <th style="width:10%;">Curr prg + ssn</th>
                                <!--<th style="width:10%;">Sugg Program</th>-->
                                <th style="width:10%;">Prog Visited Page</th>
                                <!--<th style="width:10%;">Adv. Pur</th>
                                <th style="width:10%;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($get_real_timevisited_checkout)){ ?>
                            <?php     $j = 1;
                                foreach ($get_real_timevisited_checkout as $key => $row)
                                {           
                                    if($row['user_status'] != 'Inactive'){
                                        $user_status ='client';
                                    }else{
                                         $user_status ='lead';
                                    }
                                ?>
                            <tr style="text-align: center;">
                                <!-- <td style="display:none;">$row['added_date']</td> -->
                                <td style="text-align: center;"><a target="_blank" href="<?php echo base_url('user_details?user_email=').$row['email_id'].'&user_status='.$user_status; ?>"><u><?php echo isset($row['fullname']) ? ucwords($row['fullname']) : "-"; ?></u></a></td>
                                <!--<td><?php echo $row['dob']; ?></td>-->
                                <td style="text-align: center;"><?php echo isset($row['phone']) ? '<a target="_blank" href="https://web.whatsapp.com/send/?phone=91'.$row['phone'].'?text=Please%20tell%20me%20about%20the%2055%25%20offer">'.$row['phone'].'</a>' : '-';?></td>
                                <td><?php if($row['user_status'] =='Inactive'){
                                echo "Lead";}elseif($row['user_status'] =='Completed'){
                                    echo "OCR";
                                }else{
                                    echo $row['user_status'];
                                }
                                ?></td>
                                <td><?php 
                                    $ts1 = strtotime(date('Y-m-d', strtotime($row['added_date'])));
                                    $ts2 = strtotime(date('Y-m-d'));
                                    
                                     $seconds_diff = $ts2 - $ts1;
                                    $diff_days = round(abs($seconds_diff)/86400);
                                    
                                    if($diff_days == 0){
                                        $day_text = 'Today';
                                    }elseif($diff_days == 1){
                                        $day_text = 'Yesterday';
                                    }else{
                                        $day_text = $diff_days.' Days Ago';
                                    }
                                    
                                    echo $day_text;?>
                                </td>
                                <td><?php echo $row['program_amount']; ?></td>
                                <td>
                                    <?php
                                        echo $row['SOURCE'];
                                        if(in_array($row['app_version'],$app_version))
                                        {
                                          
                                        } 
                                        else{ ?>
                                    <!--<br/> <button type='button' value="<?php echo $row['user_id']; ?>"  class='btn btn-primary btn-sm askupdate' style='font-size:15px'>Update</button>-->
                                    <?php }    
                                        ?>
                                </td>
                                <td><?php echo $row['country']; ?></td>
                                <td style="text-align: center;"><?php echo isset($row['active_program']) ? str_replace('WEIGHT LOSS-PRO','WL Pro',str_replace('WEIGHT LOSS +','WL+',str_replace('BEAT PCOS','PCOS',str_replace('ReNeU','ReNeU',str_replace('Plateau Breaker','PB',str_replace('BODY TRANSFORMATION','BT',str_replace('Reform','IMF',$row['active_program']))))))): '-';?>
                                    <?php echo isset($row['active_program_sessions']) ? ''.'('.$row['active_program_sessions'].')' : '-';?>
                                </td>
                                <!--<td style="text-align: center;"><?php echo isset($row['suggested_prgm']) ? str_replace('WEIGHT LOSS-PRO (client exclusive advanced)','WL Pro',str_replace('WEIGHT LOSS + (client exclusive advanced)','WL+',str_replace('BEAT PCOS (client exclusive advanced)','PCOS',str_replace('ReNeU (Client Exclusive)','ReNeU',str_replace('Plateau Breaker(Client Exclusive)','PB',str_replace('BODY TRANSFORMATION (client exclusive advanced)','BT',str_replace('Reform Intermittent Client Exclusive','IMF',$row['suggested_prgm']))))))): '-';?>-->
                                </td>
                                <td><?php echo $row['program_page'] ?></td>
                                <!--<td><?php if($row['program_status']=='4'){ echo "Yes";}else{echo "NO";} ?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url('/chat')?>" target="_blank"><button  type="button" class="btn btn-primary btn-sm" style="font-size:15px;" title="Coming Soon!">Chat</button>
                                    </a>
                                </td>-->
                            </tr>
                            <?php  $j = $j+1;
                                }   ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div class="tab-pane overnight" id="overnight" role="tabpanel">
            <div class="m-section">
                <div class="table-responsive">
                    <h2 class="text-center session_class">Checkout Page Visited OverNight </h2>
                    <table class="table_id table m-table table-bordered m-table--border-metal m-table--head-bg-metal" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10%;">Name</th>
                                <!--<th style="width:10%;">DOB</th>-->
                                <th style="width:10%;">Phone</th>
                                <!-- <th style="width:10%;">Program+Session</th> -->
                                <th style="width:10%;">User Status</th>
                                <th style="width:10%;">Date</th>
                                <th style="width:10%;">Amount</th>
                                <th style="width:10%;">Source</th>
                                <th style="width:10%;">Country</th>
                                <th style="width:10%;">Curr prg + ssn</th>
                                <!--<th style="width:10%;">Sugg Program</th>-->
                                <th style="width:10%;">Prog Visited Page</th>
                                <!--<th style="width:10%;">Adv. Pur</th>
                                <th style="width:10%;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($over_night_visited_checkout)){ ?>
                            <?php     $j = 1;
                                foreach ($over_night_visited_checkout as $key => $row)
                                {           
                                    if($row['user_status'] != 'Inactive'){
                                        $user_status ='client';
                                    }else{
                                         $user_status ='lead';
                                    }
                                ?>
                            <tr style="text-align: center;">
                                <!-- <td style="display:none;">$row['added_date']</td> -->
                                <td style="text-align: center;"><a target="_blank" href="<?php echo base_url('user_details?user_email=').$row['email_id'].'&user_status='.$user_status; ?>"><u><?php echo isset($row['fullname']) ? ucwords($row['fullname']) : "-"; ?></u></a></td>
                                <?php 
                                $wp = $row['phone'];
                                    if($wp!='' && $wp!=null){
                                      if(strlen($wp) >10){
                                        $wp_phone = explode("-",$wp);
                                        $whats_phone = $wp_phone[1];
                                    }else{
                                        $whats_phone =$wp;
                                    }  
                                    }else{
                                        $whats_phone =$wp;
                                    }
                                $whats_msg='Hello '.$row['fullname'].',%0a%0aWe noticed you were trying to purchase '.$row['program_page'].'.%0aHowever, you were not able to complete the registration.%0aLet me know in case you need any assistance with the link or an alternate payment method or have any queries regarding the program.%0aYou can Whatsapp me.';?>
                                <td style="text-align: center;"><?php echo isset($row['phone']) ? '<a target="_blank" href="https://wa.me/+91'.$whats_phone.'/?text='.$whats_msg.'" target="_blank">'.$row['phone'].'</a>' : '-';?></td>
                                <td><?php if($row['user_status'] =='Inactive'){
                                echo "Lead";}elseif($row['user_status'] =='Completed'){
                                    echo "OCR";
                                }else{
                                    echo $row['user_status'];
                                }
                                ?></td>
                                <td><?php 
                                    $ts1 = strtotime(date('Y-m-d', strtotime($row['added_date'])));
                                    $ts2 = strtotime(date('Y-m-d'));
                                    
                                     $seconds_diff = $ts2 - $ts1;
                                    
                                    
                                    
                                    $diff_days = round(abs($seconds_diff)/86400);
                                    
                                    if($diff_days == 0){
                                        $day_text = 'Today';
                                    }elseif($diff_days == 1){
                                        $day_text = 'Yesterday';
                                    }else{
                                        $day_text = $diff_days.' Days Ago';
                                    }
                                    
                                    
                                    echo $day_text;?>
                                </td>
                                <td><?php echo $row['program_amount']; ?></td>
                                <td>
                                    <?php
                                        echo $row['SOURCE'];
                                        if(in_array($row['app_version'],$app_version))
                                        {
                                          
                                        } 
                                        else{ ?>
                                    <!--<br/> <button type='button' value="<?php echo $row['user_id']; ?>"  class='btn btn-primary btn-sm askupdate' style='font-size:15px'>Update</button>-->
                                    <?php }    
                                        ?>
                                </td>
                                <td><?php echo $row['country']; ?></td>
                                <td style="text-align: center;"><?php echo isset($row['active_program']) ? str_replace('WEIGHT LOSS-PRO','WL Pro',str_replace('WEIGHT LOSS +','WL+',str_replace('BEAT PCOS','PCOS',str_replace('ReNeU','ReNeU',str_replace('Plateau Breaker','PB',str_replace('BODY TRANSFORMATION','BT',str_replace('Reform','IMF',$row['active_program']))))))): '-';?>
                                    <?php echo isset($row['active_program_sessions']) ? ''.'('.$row['active_program_sessions'].')' : '-';?>
                                </td>
                                <!--<td style="text-align: center;"><?php echo isset($row['suggested_prgm']) ? str_replace('WEIGHT LOSS-PRO (client exclusive advanced)','WL Pro',str_replace('WEIGHT LOSS + (client exclusive advanced)','WL+',str_replace('BEAT PCOS (client exclusive advanced)','PCOS',str_replace('ReNeU (Client Exclusive)','ReNeU',str_replace('Plateau Breaker(Client Exclusive)','PB',str_replace('BODY TRANSFORMATION (client exclusive advanced)','BT',str_replace('Reform Intermittent Client Exclusive','IMF',$row['suggested_prgm']))))))): '-';?>-->
                                </td>
                                <td><?php echo $row['program_page'] ?></td>
                                <!--<td><?php if($row['program_status']=='4'){ echo "Yes";}else{echo "NO";} ?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url('/chat')?>" target="_blank"><button  type="button" class="btn btn-primary btn-sm" style="font-size:15px;" title="Coming Soon!">Chat</button>
                                    </a>
                                </td>-->
                            </tr>
                            <?php  $j = $j+1;
                                }   ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="menu2" class="tab-pane fade">
        <div class="tab-pane 8days" id="8days" role="tabpanel">
            <div class="m-section">
                <div class="table-responsive">
                    <h2 class="text-center session_class">Checkout Page Visited Last 8 Days</h2>
                    <table class="table_id table m-table table-bordered m-table--border-metal m-table--head-bg-metal" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10%;">Name</th>
                                <!--<th style="width:10%;">DOB</th>-->
                                <th style="width:10%;">Phone</th>
                                <!-- <th style="width:10%;">Program+Session</th> -->
                                <th style="width:10%;">User Status</th>
                                <th style="width:10%;">Date</th>
                                <th style="width:10%;">Amount</th>
                                <th style="width:10%;">Source</th>
                                <th style="width:10%;">Country</th>
                                <th style="width:10%;">Curr prg + ssn</th>
                                <!--<th style="width:10%;">Sugg Program</th>-->
                                <th style="width:10%;">Prog Visited Page</th>
                                <!--<th style="width:10%;">Adv. Pur</th>
                                <th style="width:10%;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($last_8days_checkout)){ ?>
                            <?php     $j = 1;
                                foreach ($last_8days_checkout as $key => $row)
                                {           
                                    if($row['user_status'] == 'Inactive'){
                                        $user_status ='lead';
                                    }else{
                                         $user_status ='client';
                                    }
                                ?>
                            <tr style="text-align: center;">
                                <!-- <td style="display:none;">$row['added_date']</td> -->
                                <td style="text-align: center;"><a target="_blank" href="<?php echo base_url('user_details?user_email=').$row['email_id'].'&user_status='.$user_status; ?>"><u><?php echo isset($row['fullname']) ? ucwords($row['fullname']) : "-"; ?></u></a></td>
                                <!--<td><?php echo $row['dob']; ?></td>-->
                                <td style="text-align: center;"><?php echo isset($row['phone']) ? '<a target="_blank" href="https://web.whatsapp.com/send/?phone=91'.$row['phone'].'?text=Please%20tell%20me%20about%20the%2055%25%20offer">'.$row['phone'].'</a>' : '-';?></td>
                                <td><?php if($row['user_status'] =='Inactive'){
                                echo "Lead";}elseif($row['user_status'] =='Completed'){
                                    echo "OCR";
                                }else{
                                    echo $row['user_status'];
                                }
                                ?></td>
                                <td><?php 
                                    $ts1 = strtotime(date('Y-m-d', strtotime($row['added_date'])));
                                    $ts2 = strtotime(date('Y-m-d'));
                                    
                                     $seconds_diff = $ts2 - $ts1;
                                    
                                    $diff_days = round(abs($seconds_diff)/86400);
                                    
                                    if($diff_days == 0){
                                        $day_text = 'Today';
                                    }elseif($diff_days == 1){
                                        $day_text = 'Yesterday';
                                    }else{
                                        $day_text = $diff_days.' Days Ago';
                                    }
                                    
                                    
                                    echo $day_text;?>
                                </td>
                                <td><?php echo $row['program_amount']; ?></td>
                                <td>
                                    <?php
                                        echo $row['SOURCE'];
                                        if(in_array($row['app_version'],$app_version))
                                        {
                                          
                                        } 
                                        else{ ?>
                                    <!--<br/> <button type='button' value="<?php echo $row['user_id']; ?>"  class='btn btn-primary btn-sm askupdate' style='font-size:15px'>Update</button>-->
                                    <?php }    
                                        ?>
                                </td>
                                <td><?php echo $row['country']; ?></td>
                                <td style="text-align: center;"><?php echo isset($row['active_program']) ? str_replace('WEIGHT LOSS-PRO','WL Pro',str_replace('WEIGHT LOSS +','WL+',str_replace('BEAT PCOS','PCOS',str_replace('ReNeU','ReNeU',str_replace('Plateau Breaker','PB',str_replace('BODY TRANSFORMATION','BT',str_replace('Reform','IMF',$row['active_program']))))))): '-';?>
                                    <?php echo isset($row['active_program_sessions']) ? ''.'('.$row['active_program_sessions'].')' : '-';?>
                                </td>
                                <!--<td style="text-align: center;"><?php echo isset($row['suggested_prgm']) ? str_replace('WEIGHT LOSS-PRO (client exclusive advanced)','WL Pro',str_replace('WEIGHT LOSS + (client exclusive advanced)','WL+',str_replace('BEAT PCOS (client exclusive advanced)','PCOS',str_replace('ReNeU (Client Exclusive)','ReNeU',str_replace('Plateau Breaker(Client Exclusive)','PB',str_replace('BODY TRANSFORMATION (client exclusive advanced)','BT',str_replace('Reform Intermittent Client Exclusive','IMF',$row['suggested_prgm']))))))): '-';?>-->
                                </td>
                                <td><?php echo $row['program_page'] ?></td>
                                <!--<td><?php if($row['program_status']=='4'){ echo "Yes";}else{echo "NO";} ?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url('/chat')?>" target="_blank"><button  type="button" class="btn btn-primary btn-sm" style="font-size:15px;" title="Coming Soon!">Chat</button>
                                    </a>
                                </td>-->
                            </tr>
                            <?php  $j = $j+1;
                                }   ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="menu3" class="tab-pane fade">
        <div class="tab-pane 8days" id="8days" role="tabpanel">
            <div class="m-section">
                <div class="table-responsive">
                    <h2 class="text-center session_class">Checkout Page Visited UnAssigned</h2>
                    <table class="table_id table m-table table-bordered m-table--border-metal m-table--head-bg-metal" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10%;">Name</th>
                                <!--<th style="width:10%;">DOB</th>-->
                                <th style="width:10%;">Phone</th>
                                <!-- <th style="width:10%;">Program+Session</th> -->
                                <th style="width:10%;">User Status</th>
                                <th style="width:10%;">Date</th>
                                <th style="width:10%;">Amount</th>
                                <th style="width:10%;">Source</th>
                                <th style="width:10%;">Country</th>
                                <th style="width:10%;">Curr prg + ssn</th>
                                <!--<th style="width:10%;">Sugg Program</th>-->
                                <th style="width:10%;">Prog Visited Page</th>
                                <!--<th style="width:10%;">Adv. Pur</th>
                                <th style="width:10%;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($un_assigned_checkout)){ ?>
                            <?php     $j = 1;
                                foreach ($un_assigned_checkout as $key => $row)
                                {           
                                    if($row['user_status'] == 'Inactive'){
                                        $user_status ='lead';
                                    }else{
                                         $user_status ='client';
                                    }
                                ?>
                            <tr style="text-align: center;">
                                <!-- <td style="display:none;">$row['added_date']</td> -->
                                <td style="text-align: center;"><a target="_blank" href="<?php echo base_url('user_details?user_email=').$row['email_id'].'&user_status='.$user_status; ?>"><u><?php echo isset($row['fullname']) ? ucwords($row['fullname']) : "-"; ?></u></a></td>
                                <!--<td><?php echo $row['dob']; ?></td>-->
                                <td style="text-align: center;"><?php echo isset($row['phone']) ? '<a target="_blank" href="https://web.whatsapp.com/send/?phone=91'.$row['phone'].'?text=Please%20tell%20me%20about%20the%2055%25%20offer">'.$row['phone'].'</a>' : '-';?></td>
                                <td><?php if($row['user_status'] =='Inactive'){
                                echo "Lead";}elseif($row['user_status'] =='Completed'){
                                    echo "OCR";
                                }else{
                                    echo $row['user_status'];
                                }
                                ?></td>
                                <td><?php 
                                    $ts1 = strtotime(date('Y-m-d', strtotime($row['added_date'])));
                                    $ts2 = strtotime(date('Y-m-d'));
                                    
                                     $seconds_diff = $ts2 - $ts1;
                                    
                                    $diff_days = round(abs($seconds_diff)/86400);
                                    
                                    if($diff_days == 0){
                                        $day_text = 'Today';
                                    }elseif($diff_days == 1){
                                        $day_text = 'Yesterday';
                                    }else{
                                        $day_text = $diff_days.' Days Ago';
                                    }
                                    
                                    
                                    echo $day_text;?>
                                </td>
                                <td><?php echo $row['program_amount']; ?></td>
                                <td>
                                    <?php
                                        echo $row['SOURCE'];
                                        if(in_array($row['app_version'],$app_version))
                                        {
                                          
                                        } 
                                        else{ ?>
                                    <!--<br/> <button type='button' value="<?php echo $row['user_id']; ?>"  class='btn btn-primary btn-sm askupdate' style='font-size:15px'>Update</button>-->
                                    <?php }    
                                        ?>
                                </td>
                                <td><?php echo $row['country']; ?></td>
                                <td style="text-align: center;"><?php echo isset($row['active_program']) ? str_replace('WEIGHT LOSS-PRO','WL Pro',str_replace('WEIGHT LOSS +','WL+',str_replace('BEAT PCOS','PCOS',str_replace('ReNeU','ReNeU',str_replace('Plateau Breaker','PB',str_replace('BODY TRANSFORMATION','BT',str_replace('Reform','IMF',$row['active_program']))))))): '-';?>
                                    <?php echo isset($row['active_program_sessions']) ? ''.'('.$row['active_program_sessions'].')' : '-';?>
                                </td>
                                <!--<td style="text-align: center;"><?php echo isset($row['suggested_prgm']) ? str_replace('WEIGHT LOSS-PRO (client exclusive advanced)','WL Pro',str_replace('WEIGHT LOSS + (client exclusive advanced)','WL+',str_replace('BEAT PCOS (client exclusive advanced)','PCOS',str_replace('ReNeU (Client Exclusive)','ReNeU',str_replace('Plateau Breaker(Client Exclusive)','PB',str_replace('BODY TRANSFORMATION (client exclusive advanced)','BT',str_replace('Reform Intermittent Client Exclusive','IMF',$row['suggested_prgm']))))))): '-';?>-->
                                </td>
                                <td><?php echo $row['program_page'] ?></td>
                                <!--<td><?php if($row['program_status']=='4'){ echo "Yes";}else{echo "NO";} ?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo base_url('/chat')?>" target="_blank"><button  type="button" class="btn btn-primary btn-sm" style="font-size:15px;" title="Coming Soon!">Chat</button>
                                    </a>
                                </td>-->
                            </tr>
                            <?php  $j = $j+1;
                                }   ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End For  For 8 Days --->
<script>
    $(document).ready(function(){
        var maxLength = 30;
        $(".show-read-more").each(function(){
            var myStr = $(this).text();
    
            if($.trim(myStr).length > maxLength){
    
                   
                var newStr = myStr.substring(0, maxLength);
                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                $(this).empty().html(newStr);
                $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
                $(this).append('<span class="more-text">' + removedStr + '</span>');
            }
        });
        $(".read-more").click(function(){
            $(this).siblings(".more-text").contents().unwrap();
            $(this).remove();
        });
    });
    
    // $(document).ready(function() {
    //     $('.table_id').DataTable( {
    //         order: [[3, 'DESC' ]]
    //     } );
    // });
    
</script>