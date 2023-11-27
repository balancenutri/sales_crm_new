<style type="text/css">

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



.bank_details{cursor:pointer;width:60px;border-radius:3px;}  

  

  

</style>

<?php 

if($details_exist==0){

?>

<div class="m-content">

  <!--begin::Portlet-->

  <div class="m-portlet m-portlet--space user_px_2">

    <div class="m-portlet__head">

      <div class="m-portlet__head-caption col-lg-12">

        <div class="m-portlet__head-title">                        

          <h3 class="m-portlet__head-text">

            User Details

          </h3>

        </div>          

      </div>

    </div>    

    <div class="m-portlet__body pt-3">

      <div class="user_credentials_sec" id="details_data">

        <div class="row">

          <div class="col-lg-12">

            No data Available

          </div>

        </div>

      </div>

    </div>    

  </div>

  <?php   // exit;

}else{

?>

  <form method="post" id="client_app_panel_form"  class="needs-validation" enctype="multipart/form-data" action="<?php echo base_url('update-lead-action');?>">

    <input type="hidden" id="users_id" name="user_id" value="<?php //echo $user_id; ?>">

    <div class="m-content">

      <!--begin::Portlet-->

      <?php if($_SESSION['balance_session']['user_type'] =='sales'){ ?>

      <ol class="progtrckr pt-0" data-progtrckr-steps="5">

        <li class="progtrckr-todo" style="font-weight: 400" id="first">First Review : 1:30 PM

        </li>

        <li class="progtrckr-todo" style="font-weight: 400" id="second">Second Review : 4:30 PM

        </li>

        <li class="progtrckr-todo" style="font-weight: 400" id="end">Day End Review : 7:00 PM

        </li>

      </ol>

      <?php } ?>

      <div class="m-portlet m-portlet--space user_px_2">

        <div class="m-portlet__head">

          <div class="m-portlet__head-caption">

            <div class="m-portlet__head-title" style="width: 100%;">                        

              <h3 class="m-portlet__head-text">

                User Details

              </h3>

              <h5 class="m-portlet__head-text" style="text-align: right;">

                <?=$get_user_details[0]['next_action'];?>

              </h5>

              <?php 

                if($user_current_status['userid']!=''){

                $lead_view ="block";

                }else{

                $lead_view ="none";

                }

                if($_SESSION['balance_session']['user_type'] =='mentor'){ 

                if($user_current_status['userid']!=''){

                $client_color = "lightgreen";

                $edit ="d-none";

                $lead_view ="none";

                $start_date ="d-block";

                // $lead_display="d-none";

                }else{

                $is_client ="d-none";

                $pay_amt="d-none";

                $mode="d-none";

                $pay_date="d-none";

                $lead_view ="block";

                $start_date ="d-none";

                // $lead_display="d-block";

                }

                ?>

              <span class="<?= $is_client ?>" style="float:right;">

                <strong >This Lead is Client Now 

                </strong>

                <a class="btn btn-primary" href="https://www.balancenutrition.in/crm_ui/client-details/<?= $user_current_status['userid']; ?>">View

                </a>

              </span>

              <!--<a class="btn btn-primary " href="<?= @$user_url;?>" style="float:right; display:<?= $lead_view ?>;"><?= @$user_type;?></a>-->

              <?php }else{?>

              <a class="btn btn-primary" href="<?= @$user_url;?>" style="float:right; display:<?= $lead_view ?>;">

                <?= @$user_type;?>

              </a>

              <?php }?>

            </div>          

          </div>

          <div class="m-portlet__head-tools d-none">

            <ul class="m-portlet__nav">

              <li class="m-portlet__nav-item">

                <a href="javascript:void(0)" class="m-portlet__nav-link m-btn--pill">                                

                  <div class="m-input-icon m-input-icon--right">

                    <input type="text" class="form-control form-control-lg m-input m-input--solid m-input--pill" name="email_id" id="email_id" placeholder="Search by Email...">

                    <span class="m-input-icon__icon m-input-icon__icon--right" name="search" id="search">

                      <span>

                        <i class="la la-search m--font-brand">

                        </i>

                      </span>

                    </span>

                  </div> 

                </a>

              </li>                          

            </ul>

          </div>

        </div>

        <div class="m-portlet__body pt-3">

          <div class="alert alert-success alert-dismissible fade show <?= !empty($this->session->flashdata('lead_update')) ? 'd-block' : 'd-none' ?>" style="display:none" role="alert">

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            </button>

            <?= $this->session->flashdata('lead_update'); ?>					  	

          </div>

          <?php

                $url = $_SERVER['REQUEST_URI'];

                $parts = parse_url($url);

                parse_str($parts['query'], $query);

                if($query['user_status'] == "client" || $get_user_details[0]['program_status'] == 3){

                $client_color = "lightgreen";

                $status_lead_display = "d-none";

                $edit ="d-none";

                $status_client_display = "d-inline-block";

                // $status_lead_accordian = "d-none";

                $status_lead_accordian_hide = "d-none";

                $status_lead_accordian_tab = "d-none";

                $status_client_accordian = "m-tabs-content__item--active";

                $status_client_accordian_tab = "m-tabs__item--active";

                }else{

                $client_color = "";

                $status_lead_display = "d-block";

                $status_client_display = "d-none";

                $user_states = "status_lead";

                $status_lead_accordian = "m-tabs-content__item--active";

                $status_lead_accordian_tab = "m-tabs__item--active";

                $status_client_accordian = "";

                $status_client_accordian_tab = "";

                $status_lead_accordian_hide = "d-none";

                }

                // if($_SESSION['balance_session']['user_type']=='mentor'){

                //     $Wallet= "d-none";

                //     $App= "d-none";

                // } 

                if($user_current_status['userid']!=''){

                $client_color = "lightgreen";

                $edit ="d-none";

                $lead_display ="d-none";

                $p_date = "d-block";

                }else{

                $pay_amt="d-none";

                $mode="d-none";

                $pay_date="d-none";

                $action="d-none";

                $client_color ="#f7f8fa";

                $lead_display="d-block";

                $p_date="d-none";

                }

                ?>

          <div class="user_credentials_sec" id="details_data" style="background:<?= $client_color ?> !important">

            <div class="row" id="edit_de">

              <div class="col-lg-12" >

                <!--<input type="button" class="btn btn-success <?= $edit ?>" style="float: right;" id="edit_user_details" value="Edit">-->

                <span class="<?= $edit ?>" id="edit_user_details" style="float: right;cursor:pointer;" onclick="edit_lead_detail()">

                  <i class="fas fa-edit">

                  </i>

                </span>

                <!--<a href="#" class="m-menu__link  <?= $edit ?>" data-toggle="modal" data-target="#add_lead" onclick="get_country('<?= $get_user_details[0]['id'];?>','<?=$query['user_status']?>')" style="float: right;" title="Edit"><i class="fas fa-edit"></i></a>-->

              </div>

            </div>

            <div class="row">

              <div class="col-lg-4">

                <ul>

                  <li>Name : 

                    <b>

                      <span id="lead_name"><?= $get_user_details[0]['name'] ?></span>

                      <input type="hidden" id="customer_name" name="customer_name" value="<?= $get_user_details[0]['name'] ?>">

                    </b> 

                  </li>

                  <li>Wallet : 

                    <b>

                      <?= @$get_user_details[0]['wallet'] == '' ? '0':$get_user_details[0]['wallet']; ?>

                    </b> 

                  </li>

                  
                  <li>Gender : 

                    <b>

                      <?= @$get_user_details[0]['gender'] == '' ? '0':$get_user_details[0]['gender']; ?>

                    </b> 

                  </li>

                  
                            



                  <?php if($get_user_details[0]['client_status'] =='Active' || $user_current_status['userid']!=''){ ?>

                  <li>Client Status : 

                    <b>

                      <?php echo $get_user_details[0]['program_status'];/*if($get_user_details[0]['program_status'] == 1){

                          echo "Active";

                      }elseif($get_user_details[0]['program_status'] == 2){

                          echo "Pause";

                      }elseif($get_user_details[0]['program_status'] == 3){

                          echo "Completed";

                      }elseif($get_user_details[0]['program_status'] == 4){

                          echo "Advance Purchase";

                      }*/?>

                    </b> 

                  </li>

                  <?php } else {?>

                  <li>Lead Status : 

                    <b>

                      <?= $get_user_details[0]['user_status'] ?>

                    </b> 

                  </li>

                  <?php if($get_user_details[0]['sub_status'] !=''){ ?>

                  <li>Sub Status : <b><?= $get_user_details[0]['sub_status'].' | '.$get_user_details[0]['sub_status_note'] ?></b> 

                  </li>

                   

                  <?php } }?>

                  <li class="<?= $pay_amt ?>">Amount : 

                    <?= ($user_current_status['amount_type']=="D")?' USD':'INR'?> 

                    <b>

                      <?= $user_current_status['amt']?>

                    </b>

                  </li>

                  <li class="<?= $status_lead_display ?>">Lead Source : 

                    <!--<b><?=  $get_user_details[0]['lead_source'];?></b>-->

                    <span id="lead_source">

                    <select style=" color:black !important;width: 50%;border: 0px;background-color: <?= $client_color ?> !important;-webkit-appearance: none !important; font-weight: 700;" name="lead_source_details" id="lead_source_details" disabled>

                      <?php

                      

                        foreach ($leadsource as $key => $value) { 

                            $total_percentage = $value['overall_health_score'];

                            if($total_percentage >= 90 && $total_percentage <=100){

									$result_text = 'Excellent';

									$text_color = '#216F35';

								}elseif($total_percentage >= 71 && $total_percentage <= 89){

									$result_text = 'V. Good';

									$text_color = '#AAD53A';

								}elseif($total_percentage >= 51 && $total_percentage <= 70){

									$result_text = 'CAN DO BTR';

									$text_color = '#F4AF2D';

								}elseif ($total_percentage >= 31 && $total_percentage <= 50) {

									$result_text = 'Needs Attention';

									$text_color = '#9F6B09';

								}else{

									$result_text = 'Call Us NOW!';

									$text_color = '#E72A21';

								}

                            

                            if($value['enquiry_from']=='Your BN Health Score Result'){$display_text='BN HS ('.$total_percentage.' '.$result_text.')';}

                        ?>

                      <option value="<?=$value['enquiry_from']?>" 

                              <?php if($value['enquiry_from']==$get_user_details[0]['lead_source']){echo 'selected';} ?> >

                      <b>

                        <?=$display_text;?>

                      </b>

                      </option>

                    <?php } ?>

                  </select>

                  </span>

                <!--<input type="text" name="lead_source_details" id="lead_source_details" readonly="readonly" value="<?= $get_user_details[0]['lead_source'] ?>" style="width: 70%;border: 0px;background: #f7f8fa;"> -->

                <li class="<?= $status_client_display ?>">Current Program : 

                  <b>

                    <?= ($get_user_details[0]['program_status']!='Inactive')?explode('||',$get_user_details[0]['current_prog_expiry'])[1]:$get_user_details[0]['program_details'] ?>

                  </b> 

                </li>

                <li class="<?=$lead_display?>">Stage :<b><?= ($get_user_details[0]['stage']!="")?$get_user_details[0]['stage']:'Not Filled' ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phase :<b><?= ($get_user_details[0]['phase']!="")?$get_user_details[0]['phase']:'Not Filled' ?></b> 

                </li>

                <!--<li class="<?=$lead_display?>"></li>-->

                <li class="<?=$lead_display?>">Medical Condition :<b><?= ($get_user_details[0]['medical_issue']!="")?$get_user_details[0]['medical_issue']:'None' ?></b> 

                </li>

                </ul>

            </div>

            <div class="col-lg-4">

              <ul>

                <li>E-mail Id: 

                  <b><a style="cursor:pointer;text-decoration: underline;color: blue;" title="Send Email" href="mailto:<?= $get_user_details[0]['email_id'] ?>"><?= $get_user_details[0]['email_id'] ?></a></b>

                  <input class="d-none" type="text" name="email_id_details" id="email_id_details" readonly="readonly" value="<?= $get_user_details[0]['email_id'] ?>" style="width: 70%;border: 0px;background-color: <?= $client_color ?> !important; pointer:none;font-weight: 700;" disabled> 

                </li>

                <!--<li>E-mail Id: <b><?= $get_user_details[0]['email_id'] ?></b></li>-->

                <li class="d-none">APP : 

                  <b>

                    <?= $get_user_details[0]['app'] ?>

                  </b> 

                </li>

                <li class="<?= $mode ?>">Mode : 

                  <b>

                    <?= $user_current_status['payment_method'] ?>

                  </b> 

                </li>

                <li class="<?= $status_lead_display ?>">Lead Recd : 

                  <b>

                    <?= $get_user_details[0]['date'];?>

                  </b> 

                </li>

                <li class="<?= $status_client_display ?>">Expiry : 

                  <b>

                    <?= ($get_user_details[0]['program_status']=='Active')?explode('||',$get_user_details[0]['current_prog_expiry'])[0]:$get_user_details[0]['expiry'];?>

                  </b> 

                </li>

                <li class="<?= $pay_date ?>">Lead Paid : 

                  <b>

                    <?= $user_current_status['date'] ?>

                  </b> 

                </li>

                <li class="<?= $lead_display ?>">Height : <b><span id="lead_height"><?= ($get_user_details[0]['height']!="")?$get_user_details[0]['height']:'Not Filled' ?></span></b> &nbsp;Weight : <b><span id="lead_weight"><?= ($get_user_details[0]['weight']!="")?$get_user_details[0]['weight']:'Not Filled' ?></span></b>

                <?php if($get_user_details[0]['age']!="") { ?>

                    Age : <b><span id="lead_age"><?= ($get_user_details[0]['age']!="")?$get_user_details[0]['age']:'Not Filled' ?></span></b> 

                    <?php }else{ ?>

                    Age Group: <b><span><?= ($get_user_details[0]['age_group']!="")?$get_user_details[0]['age_group']:'Not Filled' ?></span></b> 

                    <?php }?>

                </li>

                <!--<li class="<?= $lead_display ?>"></li>-->

                <!--<li class="<?= $lead_display ?>"></li>-->

                <li class="<?= $lead_display ?>">Life Style : 

                  <b>

                    <span><?= ($get_user_details[0]['lifestyle']!="")?$get_user_details[0]['lifestyle']:'Not Filled' ?></span>

                  </b> 

                </li>

                <li class="<?= $lead_display ?>">Prev Health History : 

                  <b>

                    <span><?= ($get_user_details[0]['diet_history']!="")?$get_user_details[0]['diet_history']:'Not Filled' ?></span>

                  </b> 

                </li>

              </ul>

            </div>

            <div class="col-lg-4">

              <ul>

                <!-- AVINASH add code-->

                <?php

                    if(!empty($get_user_details[0]['country']) && !empty($get_user_details[0]['zone'])){

                    $country = $get_user_details[0]['country'];

                    $state = $get_user_details[0]['state'];

                    $city = $get_user_details[0]['city'];

                    $timeZone = $get_user_details[0]['zone'];

                    }else{

                    $ip = $get_user_details[0]['ip_address'];

                    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

                    $country = $ipdat->geoplugin_countryName;

                    $state = $ipdat->geoplugin_region ;

                    $city = $ipdat->geoplugin_city;

                    $timeZone = $ipdat->geoplugin_timezone;

                    }

                    $country_short_name = $this->user_details_model->get_shour_name_country($country);

                    $n=strtolower($country_short_name[0]['shortname']);

                    // echo $n;

                    // die;

                    ?>

                <li>Contact : 

                  <b>

                    <a style="cursor:pointer;text-decoration: underline;color: green;" title="Open WhatsApp" href="https://wa.me/<?=str_replace("+","",str_replace("-","",$get_user_details[0]['phone']))?>/?text=" aria-label="WhatsApp" class="px-2 border-0" target="_blank"><?= ($get_user_details[0]['phone']!='NA')? $get_user_details[0]['phone']:''?></a>

                  </b>

                  <input type="hidden" id="phone" name="phone" value="<?= $get_user_details[0]['phone'] ?>">

                </li>

                <li>Country & Curr Time : 

                  <b> 

                    <?php echo !empty($n)?"<img src='https://ipdata.co/flags/$n.png' style='height: 15px !important;width: 25px!important;' />":'' ?> ( 

                    <span id="lead_country_name"><?="  ".$country." "?></span>)  

                    <?php  date_default_timezone_set($timeZone); echo date('dS M h:i a'); ?>

                  </b>

                </li>

                <?php if($state!='') { ?>

                <li>State & City : 

                  <b> 

                    <span id="lead_state"><?= $state ?></span> <span id="lead_city"> <?= $city?></span>

                  </b>

                </li>

                <?php } ?>

                <li> 

                  <?php if($user_current_status['userid']!=''){?>Converted By : 

                  <?php }else{ ?>Assigned To : 

                  <?php } ?>

                  <b>Counsellor: 

                    <?= $get_user_details[0]['counsellor'] .'<br> <span class="'.$status_client_display.'">Mentor: '. $get_user_details[0]['mentor_name'].'</span>' ?>

                  </b> 

                </li>

                <li class="<?= $start_date  ?>">

                  <?php if($user_current_status['userid']!=''){?>Prog. Start Date : 

                  <b>

                    <?= ($get_user_details[0]['program_status']=='Active')?explode('||',$get_user_details[0]['current_prog_expiry'])[2]:$user_current_status['date']; }?> 

                  </b> 

                </li>

              </ul>

              <div class="w-10 float-right">

                <select class="form-control" id="user_action" style="background: linear-gradient(to bottom, #fff 0%, #dcdcdc 100%);">

                  <?php if($get_user_details[0]['client_status'] !='Active'){ ?>

                  <option value="action">Profile Details

                  </option>

                  <?php } ?>

                  <option class="<?= $action ?>" value="assessment">Assessment

                  </option>

                  <option class="<?= $action ?>" value="notification">Notification

                  </option>

                  <option class="<?= $action ?>" value="app_action">App Action

                  </option>

                  <option class="<?= $action ?>" value="trackers">Trackers

                  </option>

                  <option class="<?= $action ?>" value="feedback">Feedback

                  </option>

                </select>

              </div>

            </div>

            <div class="col-lg-12 mt-2" style="text-align: right;">

            <!-- Button trigger modal -->

                <button type="button" class="btn btn-sm btn-primary mr-3" data-toggle="modal" style="background:blue;" data-target="#exampleModal">Create Payment Link</button>

                <!--<button data-id="bank1" class="btn btn-sm btn-primary bank_details mr-3" style="background:blue; padding-top: 6px;padding-bottom: 6px;">BN1</button>

                <button data-id="bank2" class="btn btn-sm btn-primary bank_details mr-3" style="background:blue; padding-top: 6px;padding-bottom: 6px;">BN2</button> 

                <button data-id="phone_pay" class=" bank_payment_btnicon btn btn-sm btn-primary bank_details mr-3" style="background:blue">Phone Pay</button>

                <button data-id="paytm" class=" bank_payment_btnicon btn btn-sm btn-primary bank_details mr-3" style="background:blue">Paytm</button>

                <button data-id="gpay" class="bank_payment_btnicon btn btn-sm btn-primary bank_details" style="background:blue">G Pay</button>-->

                <img src="https://www.balancenutrition.in/images/Indusind.jpg" data-id="bank1" style="width:80px;" class="bank_details mr-3" />

                <img src="https://www.balancenutrition.in/images/kotak.jpg" data-id="bank2" style="width:70px;" class="bank_details mr-3" />

                <img src="https://www.balancenutrition.in/images/pp.png" data-id="phone_pay" style="width:70px;" class="bank_details mr-3" />

                <img src="https://www.balancenutrition.in/images/paytm.png" data-id="paytm" class="bank_details mr-3" />

                <img src="https://www.balancenutrition.in/images/g-pay.png" data-id="gpay" class="bank_details" />

            </div>

          </div>

          <div class="row" >

            <div class="col-lg-6" id="save_de" style="display: none;">

              <input type="button" class="btn btn-success" style="float: right;" id="save_data_user_details" value="Save">

            </div>

            <div class="col-lg-6" id="cancel_de" style="display: none;">

              <input type="button" class="btn btn-success" style="float: left;" id="cancel_data_user_details" value="Cancel">

            </div>

          </div>

        </div>

        <div class="row pt-3">                                 

          <div class="col-xl-7">          

            <div class="m-tabs" data-tabs="true" data-tabs-contents="#m_user_section">

              <ul class="m-nav m-nav--active-bg m-nav--active-bg-padding-lg m-nav--font-lg m-nav--font-bold m--margin-bottom-20 m--margin-top-10 m--margin-right-40 d-none" id="m_nav" role="tablist">

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item <?= $status_lead_accordian_tab ?> m_section_1" data-tab-target="#m_section_1" href="#">                 

                    <span class="m-nav__link-text">Action

                    </span>                                                           

                  </a>                                              

                </li>

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item <?= $status_client_accordian_tab ?> user_history_fetch_data" id="user_history_fetch_data" data-tab-target="#m_section_3" href="#">                            

                    <span class="m-nav__link-text">History

                    </span>

                  </a>

                </li>

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item notification_received m_section_2" data-tab-target="#m_section_2" href="#">                            

                    <span class="m-nav__link-text">Notification Received

                    </span>

                  </a>

                </li>

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item m_section_4" data-tab-target="#m_section_4" href="#">                            

                    <span class="m-nav__link-text">App Action

                    </span>

                  </a>

                </li>

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item <?= $status_client_display ?> m_section_6" data-tab-target="#m_section_6" href="#">                            

                    <span class="m-nav__link-text">Assessment

                    </span>

                  </a>

                </li>

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item <?= $status_client_display ?> m_section_5" data-tab-target="#m_section_5" href="#">                            

                    <span class="m-nav__link-text">Trackers

                    </span>

                  </a>

                </li>

                <li class="m-nav__item d-none">

                  <a class="m-nav__link m-tabs__item <?= $status_client_display ?> m_section_8" data-tab-target="#m_section_8" href="#">                            

                    <span class="m-nav__link-text">Feedback

                    </span>

                  </a>

                </li>

              </ul>    
              
              <div class="m-tabs-content__item  <?= $status_client_accordian ?>" id="m_section_3" style="background-color: #f7f8fa;padding-top: 10px;border-radius: 10px;padding-left: 25px;">         

                <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Primary Source History</h4>
                    <?php echo $primary_source; ?>
              </div>

              <div class="m-tabs-content__item  <?= $status_client_accordian ?>" id="m_section_3" style="background-color: #f7f8fa;padding-top: 10px;border-radius: 10px;padding-left: 25px;">         

                <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">User History

                </h4>

                <div class="user_history_sec" id="user_history_sec_for_client_div">

                  <div class="m-scrollable" data-scrollable="true" data-max-height="800" data-mobile-max-height="200">

                    <div class="m-list-timeline m-list-timeline--skin-light">

                      <div class="m-list-timeline__items" id="user_history_sec_data">

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>  

          </div>

          <div class="col-xl-5"> 

            <div class="m-tabs-content m_user_section" id="m_user_section">   

              <!--begin::Section 1-->     

              <div class="m-tabs-content__item <?= $status_lead_accordian ?>" id="m_section_1"> 

                <?= $this->load->view('user_details/user_action'); ?>

              </div>

              <!--begin::Section 1-->  

              <!--begin::Section 3-->     

              <!--begin::Section 3-->

              <!--begin::Section 2-->     

              <div class="m-tabs-content__item m_section_2" id="m_section_2">      

                <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Notification Received

                </h4>

                <div class="notification_form_sec">

                  <form class="m-form m-form--fit m-form--label-align-right">

                    <div class="m-portlet__body p-0">

                      <div class="row">

                        <div class="col-lg-4">

                          <div class="form-group m-form__group">

                            <label for="exampleSelect2">Title:

                            </label>

                            <select class="form-control m-input" id="notification_subject">

                              <option>Select Option

                              </option>

                              <?php foreach ($notification_dropdown_list as $key => $value) { ?>

                              <option value=

                                      <?= $value['id']; ?>>

                              <?= $value['subject']; ?>

                              </option>

                            <?php } ?>

                            </select>

                        </div>

                      </div>

                      <input type="hidden" id="notification_id" name="notification_id">

                      <!--<div class="col-lg-8">

                            <div class="form-group m-form__group">

                            <label for="exampleInputEmail1">Title:</label>

                            <input type="text" class="form-control m-input" id="notification_title" placeholder="Enter Title">

                            <span class="m-form__help d-none">Invalid</span>

                            </div>

                            </div>-->

                    </div>

                    <div class="row">

                      <div class="col-lg-12">

                        <div class="form-group m-form__group">

                          <label for="descriptions">Description:

                          </label>

                          <textarea class="form-control m-input" id="notification_description" rows="3" readonly>

                          </textarea>

                        </div>

                      </div>

                    </div>

                    </div>

                  <div class="m-portlet__foot m-portlet__foot--fit">

                    <div class="m-form__actions pt-3 pb-2">

                      <button type="button" id="send_notification" onclick="sendNotification()" class="btn btn-primary">Send

                      </button>

                    </div>

                  </div>

                  </form>

              </div>

              <div class="notification_datatable_sec">

                <!--<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">-->

                <div class="table-responsive">

                  <table id='notiification_received_table' class='table m-table'>

                    <thead>

                      <tr>

                        <th style="width:100px">Title

                        </th>

                        <th style="width:300px">Description

                        </th>

                        <th style="width:100px">Status

                        </th>

                        <th style="width:100px">Sent Date

                        </th>

                      </tr>

                    </thead>

                    <tbody>

                    </tbody>

                  </table>    

                </div>

                <!--</div>-->

              </div>

            </div>

            <!--begin::Section 2-->

            <!--begin::Section 3-->     

            <div class="m-tabs-content__item m_section_4" id="m_section_4">         

              <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">App Action

              </h4>

              <div class="user_history_sec">

              </div>

            </div>

            <!--begin::Section 3-->

            <!--begin::Section 5-->     

            <div class="m-tabs-content__item m_section_5" id="m_section_5">         

              <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Tracker

              </h4>

              <div class="tracker_sec">

                <?= $this->load->view('user_details/tracker_view'); ?>

              </div>

            </div>

            <!--begin::Section 5-->

            <!--begin::Section 6-->     

            <div class="m-tabs-content__item m_section_6" id="m_section_6">         

              <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Assessment

              </h4>

              <div class="tracker_sec">

                <?= $this->load->view('user_details/assessment_view'); ?>

              </div>

            </div>

            <!--begin::Section 6-->

            <!--begin::Section 8-->     

            <div class="m-tabs-content__item m_section_8" id="m_section_8">         

              <h4 class="m--font-bold m--margin-top-15 m--margin-bottom-20">Feedback

              </h4>

              <div class="feedback_sec">

                <?= $this->load->view('user_details/feedback_view'); ?>

              </div>

            </div>

            <!--begin::Section 8-->

          </div>     

        </div>                 

      </div>

    </div>

    </div>         

  <!--end::Portlet--> 

</div>

</form>

<!-- Button trigger modal -->

<!-- edit_lead_popup Modal -->

<div class="modal fade" id="edit_lead_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Update Lead Detail

        </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;

          </span>

        </button>

      </div>

      <div class="modal-body">

        <div class="first_mobPage_form desk_form_padding">

          <!--<div class="col-lg-6">-->

          <div class="form-group m-form__group row">

            <label class="form-label col-lg-3 col-sm-12">First Name *

            </label>

            <div class="col-lg-12 col-md-12 col-sm-12">

              <input type="text" class="form-control m-input" name="lead_first_name" id="lead_first_name" placeholder="Lead Name*">

            </div>

          </div>

          <div class="form-group m-form__group row">

                <label class="form-label col-lg-3 col-sm-12">Contact

            </label>

          <div class="col-lg-12 col-md-12 col-sm-12">

          <input type="tel" id="phone" name="phone" class="txtbox form-control m-input" placeholder="Phone No*"/ maxlength="15">

          </div>

          </div>

          <div class="form-group m-form__group row">

            <label class="form-label col-lg-3 col-sm-12 ">Email 

            </label>

            <div class="col-lg-12 col-md-12 col-sm-12">

              <input type="text" class="form-control m-input" name="lead_email_id" id="lead_email_id" placeholder="Email">					

            </div>

          </div>

          <div class="form-group m-form__group row">

            <label class="form-label col-lg-3 col-sm-12 ">Age : 

            </label>

            <div class="col-lg-12 col-md-12 col-sm-12">

              <input type="text" class="form-control m-input" name="lead_age_data" id="lead_age_data" placeholder="Age">					

            </div>

          </div>

          <div class="form-group m-form__group row" style="padding-top:0;">

            <div class="col-lg-6 col-md-12 col-sm-12">

              <label class="form-label">Country :

              </label>

              <select name="lead_country" id="lead_country" class="form-control m-input country">

                <option value="">Select Country</option>

                <?php foreach($countries as $val){?>

                <option rel="<?= $val['country_id']?>" value="<?= $val['country_name']?>" <?php if($val['country_name']==$country){echo 'selected';} ?>><?= $val['country_name']?></option>

                <?php } ?>

              </select>

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">

              <label class="form-label">Source :

              </label>

              <select class="form-control m-input select2 source_id" name="lead_source_id" id="lead_source_id">

                <option value="">Select Source</option>

                <?php foreach ($leadsource as $key => $value) {?>

                      <option value="<?=$value['enquiry_from']?>"<?php if($value['enquiry_from']==$get_user_details[0]['lead_source']){echo 'selected';} ?> >

                        <b><?=$value['enquiry_from']?></b></option><?php }?>

              </select>

            </div>

          </div>

          <div class="form-group m-form__group row" style="padding-top:0;">

            <div class="col-lg-6 col-md-12 col-sm-12">

              <label class="form-label">State :

              </label>

              <select name="lead_state_name" id="lead_state_name" class="form-control m-input state">

                <option value="">Select State

                </option>

              </select>

            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">

              <label class="form-label ">City :

              </label>

              <select class="form-control m-input select2 lead_city_name" name="lead_city_name" id="lead_city_name">

                <option value="">Select City

                </option>

              </select>

            </div>

          </div>

          <div class="form-group m-form__group row">

            <div class="col-lg-6 col-md-6 col-sm-12 col-6">

              <label class="form-label">Weight (kg) :

              </label>

              <input  class="form-control m-input" name="lead_weight_kg" id="lead_weight_kg" placeholder="Wt (kg) - 0-999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                     type = "number"

                     maxlength = "3">

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-6">

              <label class="form-label">Weight (gm) :

              </label>

              <input class="form-control m-input" name="lead_weight_grm" id="lead_weight_grm" placeholder="Wt (gm) - 100-999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"

                     type = "number"

                     maxlength = "3">

            </div>

          </div>

          <div class="form-group m-form__group row">

            <div class="col-lg-6 col-md-6 col-sm-12 col-6">

              <label class="form-label">Height (ft) :

              </label>

              <select class="form-control m-input heightClass" name="lead_height_ft" id="lead_height_ft">

                <option value="">Select Feet

                </option>

                <option value="0"> 0 (ft) 

                </option> 

                <option value="1"> 1 (ft) 

                </option>

                <option value="2"> 2 (ft) 

                </option>

                <option value="3"> 3 (ft) 

                </option>

                <option value="4"> 4 (ft) 

                </option>

                <option value="5"> 5 (ft) 

                </option>

                <option value="6"> 6 (ft) 

                </option>

                <option value="7"> 7 (ft) 

                </option>

              </select>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-6">

              <label class="form-label">Height (in) :

              </label>

              <select class="form-control m-input" name="lead_height_in" id="lead_height_in">

                <option value="">Select Inches

                </option>

                <option value="0">0 (in)

                </option>

                <option value="1">1 (in)

                </option>

                <option value="2">2 (in)

                </option>

                <option value="3">3 (in)

                </option>

                <option value="4">4 (in)

                </option>

                <option value="5">5 (in)

                </option>

                <option value="6">6 (in)

                </option>

                <option value="7">7 (in)

                </option>

                <option value="8">8 (in)

                </option>

                <option value="9">9 (in)

                </option>

                <option value="10">10 (in)

                </option>

                <option value="11">11 (in)

                </option>

              </select>

            </div>

          </div>

        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-success update_lead_detail" id="update_lead_detail">Update

        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel

        </button>

        </button>

      </div>

    </div>

  </div>

</div>





<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Create Payment Link</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <div class="form-group m-form__group row">

		<label class="col-form-label col-lg-3 col-sm-12">Name:</label>

		<div class="col-lg-9 col-md-9 col-sm-12">

		    

			<select name="suggested_program" class="form-control m-input  " id="suggested_program">

				<option value="">Select a Program</option>

				<option data-id="5" value="Active">Active</option>

				<option data-id="2" value="Beat PCOS">Beat PCOS</option>

            	<option data-id="4" value="Body Transformation">Body Transformation</option>

            	<option data-id="74" value="Plateau Breaker">Plateau Breaker</option>

            	<option data-id="91" value="Reform Intermittent">Reform Intermittent</option>

            	<option data-id="6" value="Reneu">Reneu</option>

            	<option data-id="1" value="Weight Loss-Pro">Weight Loss-Pro</option>

            	<option data-id="3" value="Weight Loss +">Weight Loss +</option>

            	<option data-id="132" value="SlimPossible60">Slim Possible</option>

            	<option data-id="7" value="Slim Smart">Slim Smart</option>
            	
            	<option data-id="119" value="Shape Up">Shape Up</option>

            	<option data-id="131" value="Post-Festive Detox Cleanse">Post-Festive Detox Cleanse</option>

            	<option data-id="112" value="Weight Loss Cleanse">Weight Loss Cleanse</option>

            	<option data-id="113" value="Sugar Detox Cleanse">Sugar Detox Cleanse</option>

            	<option data-id="114" value="Flat Stomach Cleanse">Flat Stomach Cleanse</option>

            	<option data-id="115" value="Acidity Correction Cleanse">Acidity Correction Cleanse</option>

            	<option data-id="116" value="Immune Boosting Cleanse">Immune Boosting Cleanse</option>

            	<option data-id="121" value="Constipation Correction Cleanse">Constipation Correction Cleanse</option>

            	<option data-id="117" value="10 Day Weight Loss Diet Plan" plan="">10 Day Weight Loss Diet Plan</option>

            	<option data-id="118" value="10 Day Intermittent Fasting">10 Day Intermittent Fasting</option>

            	<option data-id="120" value="Transform (weight loss)">Transform (weight loss)</option>

            	<option data-id="133"value="14-Day Fitness Challenge">14-Day Fitness Challenge</option>

            	<option data-id="17" value="Nourish">Nourish</option>

            	<option data-id="18" value="Satvaa">Satvaa</option>

            	<option data-id="19" value="Sphoorti">Sphoorti</option>

			</select>

		</div>

	</div>

			<div class="form-group m-form__group row">

        		<label class="col-form-label col-lg-3 col-sm-12">Days:</label>

        		<div class="col-lg-9 col-md-9 col-sm-12">

        			<select name="program_days" class="form-control m-input " id="program_days1" onchange="get_amount(this)">

        				<option value="">Select Days</option>

        				<option value="1">1 Day</option>

        				<option value="1">3 Day</option>

        				<option value="1">10 Day</option>

        				<option value="1">14 Days</option>

        				<option value="3">30 Days</option>

                    	<option value="6">60 Days</option>

                    	<option value="9">90 Days</option>

        			</select>

        		</div>

        	</div>

        	<div class="form-group m-form__group row">

        		<label class="col-form-label col-lg-3 col-sm-12">Amount:<i class="fas fa-edit"></i></label>

        		<div class="col-lg-9 col-md-9 col-sm-12">

        			<input type="text" class="form-control m-input program_amount" name="program_amount" placeholder="Program Amount" id="program_amount1" value=""/>

        		</div>

        	</div>

	<!--avinash added this for consultation note 08-12-2021 start-->

	<div class="form-group m-form__group row" id="link_expiry2">

		<label class="col-form-label col-lg-3 col-sm-12">Expiry Date:</label>

		<div class="col-lg-9 col-md-9 col-sm-12">

			<input type="text" class="form-control m-input custom_datepicker" name="expiry_dt" id="expiry_dt1" placeholder="Pick Date.." readonly>

		</div>

	</div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        <button type="button" id="create_link" class="btn btn-primary">Create</button>

      </div>

    </div>

  </div>

</div>

<input type="hidden" id="mrp" value="0"/>

<div style="display:none">

        <p class="bank1" id="bank1">

            Account Type-Saving Account<br/> 

            Bank Name -Indusind Bank <br/>

            Name - Shruti Jobanputra <br/>

            Account type -  Saving account <br/>

            Account no. -  100117889205 <br/>

            Branch -   Khar Branch <br/>

            SWIFT CODE-  INDBINBBBOO <br/>

            IFSC CODE-     INDB0000352 <br/>

            BRANCH ADDRESS- Ground floor, Glacis tower, Cst no. E1271, Linking road, Khar west, Mumbai-400052, Maharashtra, India

        </p>

        <p class="bank2">

            Account Type-Current Account<br/>

            Bank Name -Kotak Mahindra Bank<br/>

            Account Holder Name - Balance Nutrition<br/>

            Account Number - 1611692202<br/>

            Type of account - Current Account<br/>

            IFSC Code - KKBK0000667<br/>

            Branch - Dr Ambedkar Road, Khar West, Mumbai<br/>

        </p>

        <p class="phone_pay">UPI ID : vishalrupani-hotmail.com@okicici</p>

        <p class="paytm">UPI ID : khyatirupani123@okaxis</p>

        <p class="gpay">UPI ID : khyatirupani123@okhdfcbank</p>

        

    </div>

<?php 

    $arr = explode('-',$get_user_details[0]['phone']);

    //echo count($arr);echo "<br><br>";

    if(count($arr)>1){

        $contact = $get_user_details[0]['phone']; 

        $contact1 = $get_user_details[0]['phone'];

    }else{

        $contact = "+91".$get_user_details[0]['phone'];

        $contact1 = "+91-".$get_user_details[0]['phone'];

    }

?>



<script>

  /*$(document).ready(function(){

       var userStatus = document.URL;

       var arr = userStatus.split("&");

       alert(arr.lastIndexOf(arr.length - 1));

    });*/

  $(document).on("click",".bank_details", function(){

        event.preventDefault();

     var copyid = $(this).attr('data-id');

    //console.log(copyid);

        swal({

            title: 'Copied',

            timer: 2000,

            showConfirmButton: false

        });

        if(copyid=='bank1'){  

            //console.log(" :: 1111");

          var copyText = $(".bank1").html();

        }else if(copyid=='bank2'){

          var copyText = $(".bank2").html();

        }else if(copyid=='phone_pay'){

          var copyText = $(".phone_pay").html();

        }else if(copyid=='paytm'){

          var copyText = $(".paytm").html();

        }else if(copyid=='gpay'){

          var copyText = $(".gpay").html();

        }else if(copyid=='copy_link'){

          var copyText = $(this).val();

        }

        copyFormatted(copyText);

        

  });

  function copyFormatted (html) {

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

              document.body.removeChild(container);

            }

  $(function(){

            

     $('#create_link').click(function(){

             

      var sugg_prog = $('#suggested_program').val();

      var prog_days = $('#program_days1').val();

      var prog_amt = $('#program_amount1').val();

      var exp_date = $('#expiry_dt1').val();

    //   var razor_date=exp_date.split('-').map( (v, i) => i > 1 ? +v + 1 : v).join('-');

    var date1 =new Date(exp_date) ;

var date2=new Date(date1.setDate(date1.getDate() + 1));

razor_date=date2.getFullYear()+'-'+(date2.getMonth()+1)+'-'+date2.getDate();

      var client_name = "<?=$get_user_details[0]['name']?>";

      var email = "<?=$get_user_details[0]['email_id']?>";

      var phone = "<?=$contact1;?>";

      var user_status="<?=$query['user_status']?>";

      var allowed = 0;

      var mrp = $('#mrp').val();

      max_disc = (100-Math.round(parseInt(prog_amt)/parseInt(mrp)*100));

      

      if(user_status == "client" && parseInt(max_disc)>60 && parseInt(prog_days) > 29){

          alert('Max Discount allowed is 60%');

          allowed++;

          return false;

      }

      if(user_status == "lead" && parseInt(max_disc)>50 && parseInt(prog_days) > 29){

          alert('Max Discount allowed is 50%');

          allowed++;

          return false;

      }

      //alert(allowed);

      //return false;

      

      if(allowed==0){

        $.ajax({

            type : 'post',

            url: '<?php echo base_url()?>user_details/generate_payment_link',

            data: {sugg_prog:sugg_prog,prog_days:prog_days,prog_amt:prog_amt,exp_date:exp_date,razor_date:razor_date,client_name:client_name,email:email,phone:phone},

            dataType:'json',

            beforeSend: function(){

              $("#cover-spin").show();

            },

            complete: function(response){

              $("#cover-spin").hide();

              

            },

            success:function(response){

                //console.log(JSON.stringify(response.payment_link));

                const payment_link = JSON.stringify(response.payment_link).slice(1, -1);

                $('#exampleModal').modal('toggle');

                if(payment_link.length>6){

                    Swal.fire({

                      title: '',

                      html:'Payment Link Created Successfully!<br><br><b>'+payment_link+'</b>',

                      showCloseButton: true,

                      showCancelButton: false,

                      focusConfirm: false,

                      confirmButtonText:

                        '<a href="https://wa.me/'+phone+'/?text=Hi,%0aPFA your payment link for the '+prog_days+'0-days '+sugg_prog+' program with us at Balance Nutrition for the amount Rs.'+prog_amt+' %0aClick here: '+payment_link+' Once you make the payment, do send me a screenshot and I shall get the program registered. %0aLink expires on: '+exp_date+'. %0a %0aRegards, %0a %0a<?=$_SESSION['balance_session']['first_name'];?> %0aSr. Nutrition Counselor" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share on WhatsApp!</a>',

                      confirmButtonAriaLabel: 'Share on WhatsApp!'

                    });

                }else{

                    Swal.fire({

                      title: '',

                      html:'<b>Oops!</b><br><br>Payment Link Failed!',

                      showCloseButton: true,

                      showCancelButton: false,

                      focusConfirm: false,

                      confirmButtonText:

                        'OK',

                      confirmButtonAriaLabel: ''

                    });

                }

        	    //$("#cover-spin").hide();

            }

        });

      }

    });

    

    $('#save_user_status').click(function(){

      var user_id = $('#users_id').val();

      var user_status = $('#user_status').val();

      $.ajax({

        type : 'post',

        url: '<?php echo base_url()?>support_access/client_app_panel/update_user_status',

        data: {

          user_status:user_status,user_id:user_id}

        ,

        dataType:'json',

        beforeSend: function(){

          $("#cover-spin").show();

        }

        ,

        complete: function(){

          $("#cover-spin").hide();

        }

        ,

        success:function(response){

          alert(response.msg);

          if(response.status == 200){

            get_client_details();

          }

          //console.log(html);

        }

      }

            ) ;

    }

                                );

    $('#allow_web_access').click(function(){

      var user_id = $('#users_id').val();

      var web_access = $('#web_access').val();

      $.ajax({

        type : 'post',

        url: '<?php echo base_url()?>support_access/client_app_panel/allow_web_access',

        data: {

          user_id:user_id,web_access:web_access}

        ,

        dataType:'json',

        success:function(response){

          alert(response.msg);

          if(response.status == 200){

            get_client_details();

          }

          //console.log(html);

        }

      }

            ) ;

    }

                                );

  }

   );

  function get_client_details(){

    $('#details_data').html('');

    $('#client_table_data').html('');

    $('#program_table_data').html('');

    var email_id = $('#email_id').val();

    $.ajax({

      type : 'post',

      url: '<?php echo base_url()?>support_access/client_app_panel/search_client_details',

      data: {

        email_id:email_id}

      ,

      dataType:'json',

      beforeSend: function(){

        $("#cover-spin").show();

      }

      ,

      complete: function(){

        $("#cover-spin").hide();

      }

      ,

      success:function(response){

        /*if(response.html_data && response.table_data) {  */      

        var client_table_html = '<tr>';

        //   var html = '<h3>USER CREDENTIALS :</h3> <div class="row">';

        var html = '<div class="row">';

        var program_order_html = '<tr>';

        var diet_data = '';

        $.each(response.html_data, function( key, value ) {

          html += '<div class="col-lg-4"><label>User Name :</label> <span>'+value.name+'</span><br><label>Password :</label> <span>'+value.password+'</span><br><label>Assesment date : </label><span class="assessment_date_html">'+value.created+'</span><br> <label>Status Screen:</label> <span>'+value.screen_name+'</span><br></div>';

          html += '<div class="col-lg-4"><label>User id :</label> <span>'+value.user_id+'</span><br><label>Mentor Name :</label> <span>'+value.mentor_name+'</span><br> <label>Device :</label> <span>'+value.device+'</span><br></div>';

          html += '<div class="col-lg-4"><label>Email-id :</label> <span>'+value.email_id+'</span><br><label>Current Screen :</label> <span>'+value.last_visited_screen+'</span><br> <label>User Status :</label> <span>'+value.user_status+'</span><br></div>';

          $('#users_id').val(value.user_id);

          $('#diet_user_id').val(value.user_id);

        }

              );

        html += "</div>";

        $.each(response.client_order_data, function( key, value ) {

          var program_status = '';

          var user_status = '';

          if(value.program_status ==1) {

            program_status = 'Active';

          }

          else if(value.program_status ==2) {

            program_status = 'Pause';

          }

          else if(value.program_status ==3) {

            program_status = 'Completed';

          }

          else if(value.program_status ==4) {

            program_status = 'Advanced';

          }

          //$('#sel_user_status').val(value.program_status);

          // program_order_html += '<td>'+value.last_visited_screen+'</td>';

          program_order_html += '<td>'+value.program_name+'</td>';

          program_order_html += '<td>'+value.date+'</td>';

          program_order_html += '<td>'+program_status+'</td>';

          // program_order_html += '<td>'+value.user_status+'</td>';

          program_order_html += '<td><button type="button" data-toggle="modal" data-target="#edit_modal" name="edit" onclick="edit_order_data(`'+value.order_id+'`)" class="btn btn-primary" style="border-radius: 38px;">Edit Order Status</button></td></tr>';

        }

              );

        $.each(response.diet_data, function( key, value ) {

          diet_data += '<label>Diet Start Date :</label><span>'+value.start_date+'</span><br>';

        }

              );

        $.each(response.table_data, function( key, value ) {

          client_table_html += '<td>'+value.device+'</td>';

          client_table_html += '<td>'+value.app_version+'</td>';

          client_table_html += '<td>'+value.added_date+'</td></tr>';

        }

              );

        //programs_table

        $('#client_app_table,#programs_table').show();

        var new_html_data = html+" "+diet_data;

        $('#details_data').prepend(new_html_data);

        $('#client_table_data').prepend(client_table_html);

        $('#program_table_data').prepend(program_order_html);

        /*}

                    else{

                   alert('Try another id. As data not existed for this Email Id')*/

        //}

      }

    }

          );

  }

  /*function submit_details(){

        $.ajax({

              type : 'post',

               url: '<?php echo base_url()?>support_access/client_app_panel/update_screen_data',

               data: $('#client_app_panel_form').serialize(),

               dataType:'json',

               success:function(response){

                   alert(response.msg);

                   if(response.status =="200"){

                       window.location.href = "<?php echo base_url().'client_app_panel/page'?>";

                   }

               }

          }) ;

    }*/

  function edit_order_data(order_id){

    $('#sel_order_status').val('');

    $('#sel_screen_name').val('');

    $('#edit_order_id').val('');

    $('#edit_user_id').val('');

    $.ajax({

      type : 'post',

      url: '<?php echo base_url()?>support_access/client_app_panel/get_order_details',

      data: {

        order_id:order_id}

      ,

      dataType:'json',

      beforeSend: function(){

        $("#cover-spin").show();

      }

      ,

      complete: function(){

        $("#cover-spin").hide();

      }

      ,

      success:function(response){

        order_details = response.order_details[0];

        console.log(order_details);

        $('#sel_order_status').val(order_details.program_status);

        $('#sel_screen_name').val(order_details.last_visited_screen);

        $('#edit_order_id').val(order_details.order_id);

        $('#edit_user_id').val(order_details.user_id);

        //$('#edit_modal').show();

      }

    }

          ) ;

  }

  $(window).on('load',function(){

    var user_status = "<?= $_GET['user_status']?>";

    if(user_status == "client"){

      $('.user_history_fetch_data').trigger('click');

    }

    var active_status ="<?php echo $get_user_details[0]['program_status']?>";

    // alert(active_status);

    if(active_status ==1){

      $('.user_history_fetch_data').trigger('click');

      $('.m_section_6').trigger('click');

    }else if(active_status == 3){

      $('.user_history_fetch_data').trigger('click');

    //   $('#m_section_1').addClass('d-block');

      $('.m_section_1').trigger('click');

    }else{

        $('.user_history_fetch_data').trigger('click');

       $('.m_section_1').trigger('click');

    }

    

  })

  $(document).ready(function(){

      var user_status = "<?= $_GET['user_status']?>";

      var lead_height =$('#lead_height').html();

      var lead_weight =$('#lead_weight').html();

      var lead_age =$('#lead_age').html();

     var consultation ="<?php echo count($cont)?>";

    //  alert(consultation);

    if(user_status != "client"){

      if(consultation !=''){

          if(lead_height=='.' || lead_height =='' ||lead_height =='Not Filled'|| lead_weight=='Not Filled' || lead_weight=='.' || lead_weight=='' || lead_age=='.' || lead_age=='' || lead_age=='Not Filled'){

              alert("Please Update Height Weight And Age !");

              $('#edit_user_details').trigger('click');

          }

      }

    }

      

     $('.j_checklist_tab').on('click',function(){

      var assessment_date_html = $(".assessment_date_html").val();

    //   alert(assessment_date_html);

      $(".assessment_fetch_data small").text(assessment_date_html);

    }

                            );

    $('#user_action').change(function(){

      if($(this).val()=='action'){

        $('.m_section_1').trigger('click');

      }

      else if($(this).val()=='notification'){

        $('.notification_received').trigger('click')

      }

      else if($(this).val()=='app_action'){

        $('.m_section_4').trigger('click')

      }

      else if($(this).val()=='assessment'){

        $('.m_section_6').trigger('click')

      }

      else if($(this).val()=='trackers'){

        $('.m_section_5').trigger('click')

      }

      else if($(this).val()=='feedback'){

        $('.m_section_8').trigger('click')

      }

    }

                            )

    // $('.user_history_fetch_data').on('click',function(){

    //     alert("history trigger");

      var user_id = "<?= $_GET['user_email']?>";

      var user_status = "<?= $_GET['user_status']?>";

      if(user_status == "lead"){

        $.ajax({

          type : 'post',

          url: '<?php echo base_url()?>user_details/getLeadHistory',

          data: {

            email_id:user_id}

          ,

          dataType:'json',

          success:function(response){

            var timelineHtml =  "";

            $.each(response.lead_array, function(i, val){

              timelineHtml += '<div class="m-list-timeline__item m-0 py-3"> <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span> <span class="m-list-timeline__text top_list_text">'+val.action+' ('+val.action_date+')</span> </div>';

            }

                  );

            $("#user_history_sec_data").html(timelineHtml);

          }

        }

              );

      }

      else{

        $.ajax({

          type : 'post',

          url: '<?php echo base_url()?>user_details/get_client_History',

          data: {

            email_id:user_id}

          ,

          //   dataType:'json',

          success:function(response){

            $("#user_history_sec_for_client_div").html(response);

          }

        }

              );

      }

      // getLeadHistory

    // })

    // $('.notification_received').on('click',function(){

    //   var user_id = $('#users_id').val();

    //   $('#notiification_received_table').DataTable({

    //         // processing: true,

    //         // serverSide: true,

    //         "ajax": {

    //             "type" : "POST",

    //             "data": {user_id:user_id},

    //             "url" : "<?php echo base_url()?>support_access/client_app_panel/notification_received_data",

    //             "dataSrc": "notiification_received_table"

    //         },

    //         "columns": [

    //             { "data": "title" },

    //             { "data": "description" },

    //             { "data": "read_status" },

    //             { "data": "added_date" }

    //         ],

    //         retrieve: true,

    //     });

    // });

    var client_id = '<?php echo (isset($_GET['client_id']))? $_GET['client_id']:0;?>';

    if(client_id!=0){

      //alert(client_id);

      $('#email_id').val(client_id);

      $('#search').trigger('click');

      // set value in input field and trigger click of search;

    }

    // $("a").trigger("click");

  }

                   );

  $('#notification_subject').on('change', function(){

    var notification_id = $('#notification_subject').val();

    //   console.log(notification_id);

    //     return false;

    $.ajax({

      type : 'post',

      url: '<?php echo base_url()?>support_access/client_app_panel/getNotificationDetails',

      data: {

        notification_id:notification_id}

      ,

      dataType:'json',

      success:function(response){

        //   console.log(response.subject);

        $('#notification_title').text(response.subject);

        $('#notification_description').html(response.content);

      }

    }

          )

  }

                               )

  function geths(lead_id){

    $('#get_hs_table').modal("show");

    var url = '<?php echo base_url()?>user_details/getHS';

    $('#get_hs_table .modal-body').html('');

    $('#get_hs_table .modal-title').html("Health Score");

    $.ajax({

      type : 'post',

      url: url,

      data: {

        lead_id:lead_id}

      ,

      dataType:'json',

      beforeSend: function () {

        $("#cover-spin").show();

      }

      ,

      success:function(respnose){


        var addData = '<button type="button" class="close mt-0" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><div class="m-section mt-5"> <div class="m-section__content"> <table class="table table-bordered m-table m-table--border-brand w-100"> <tbody><tr> <th>Age</th><td>'+respnose['hs_details'][0]['age']+'</td></tr><tr><th>Health Category</th><td>'+respnose['hs_details'][0]['health_category']+'</td></tr><tr><th>Height</th><td>'+respnose['hs_details'][0]['height']+'</td></tr><tr><th>Curr. BMI</th><td>'+respnose['hs_details'][0]['body_mass_index']+' kg/m2</td></tr><tr><th>Ideal BMI</th><td>'+respnose['hs_details'][0]['ideal_bmi']+' kg/m2</td></tr><tr><th>Curr. Weight</th><td>'+respnose['hs_details'][0]['weight']+' kgs</td></tr><tr><th>Ideal Weight</th><td>'+respnose['hs_details'][0]['ideal_weight']+' kgs</td></tr><tr><th>Weight Diff.</th><td>'+respnose['hs_details'][0]['weight_difference']+' kgs</td></tr><tr><th>Medical Issue</th><td>'+respnose['hs_details'][0]['medical_issue']+'</td></tr><tr><th>Overall Health Score</th><td>'+respnose['hs_details'][0]['overall_health_score']+'</td></tr><th>Body Type</th><td>'+respnose['hs_details'][0]['body_type']+'</td></tr><th>Sleep</th><td>'+respnose['hs_details'][0]['sleep']+'</td></tr><th>Activity</th><td>'+respnose['hs_details'][0]['activity']+'</td></tr><th>smoke</th><td>'+respnose['hs_details'][0]['smoke']+'</td></tr><th>Periods</th><td>'+respnose['hs_details'][0]['periods']+'</td></tr><th>Alcohol</th><td>'+respnose['hs_details'][0]['alcohol']+'</td></tr><th>Water</th><td>'+respnose['hs_details'][0]['water']+'</td></tr><th>Fruits</th><td>'+respnose['hs_details'][0]['fruits']+'</td></tr></tbody> </table> </div> </div>';


        $('#get_hs_table').find('.modal-body').append(addData);

      }

      ,

      complete: function () {

        $("#cover-spin").hide();

      }

    }

          );

  }

  function sendNotification(){

    //   alert('Yesss');

    // return false;

    var notification_id = $('#notification_subject').val();

    var user_id = $('#users_id').val();

    //   console.log(notification_id);

    //     return false;

    $.ajax({

      type : 'post',

      url: '<?php echo base_url()?>support_access/client_app_panel/sendNotification',

      data: {

        notification_id:notification_id,user_id:user_id}

      ,

      dataType:'json',

      success:function(response){

        if(response == 1){

          alert('Notification Sent Successfully!');

        }

        //   console.log(response.subject);

        // $('#notification_title').text(response.subject);

        // $('#notification_description').html(response.content);

      }

    }

          )

  }

  $(document).ready(function(){

    $(".assign_to_add").on('change',function(){

        //  alert('TETS');

      var new_assign_to = $(this).find("option:selected").val();

      $("#new_assign_to").val(new_assign_to);

    }

                          );

    $(".sub_status").on('change',function(){

      //alert('TETS');

      var sub_status = $(this).find("option:selected").val();

      //alert(sub_status);

      $("#sub_status_value").val(sub_status);

    }

                       );

    $(".sub_status_date").on('change',function(){

      //alert('TETS');

      var sub_status_date = $("#sub_status_date_picker").val();

      $("#sub_status_date").val(sub_status_date);

    }

                            );

    $(".status_id").on('change',function(){

      //   alert('TETS');

      $('.hid').addClass('d-none');

      var status = $(this).find("option:selected").attr('data-id');

      //alert(status);

      if(status == 11){

        $('#status_warm').removeClass('d-none');

        $('#status_pay_later').addClass('d-none');

        $('#cold_sub_status').addClass('d-none');

      }

      else if(status == 8){

        $('#status_pay_later').removeClass('d-none');

        $('#status_warm').addClass('d-none');

        $('#cold_sub_status').addClass('d-none');

      }

      else if(status == 10){

        $('#cold_sub_status').removeClass('d-none');

        $('#status_warm').addClass('d-none');

        $('#status_pay_later').addClass('d-none');

      }

      else{

        $('#status_warm').addClass('d-none');

        $('#status_pay_later').addClass('d-none');

        $('#cold_sub_status').addClass('d-none');

      }

      //   alert(status);

    });

    $(".cold_sub_status").on('change',function(){

      //   alert('TETS');

      $('.hid').addClass('d-none');

      var status = $(this).find("option:selected").val();

      if(status == "Others"){

        $("input[name=other_cold_status]").show();

      }

    //   else if(status =="Not interested"){

    //     $('.cold_not_intrested_note').removeClass('d-none')

    //   }else if(status =="Doing plan some where else"){

    //     $('.cold_doing_plan_note').removeClass('d-none')

    //   }else if(status =="Unr(Un responsive)"){

    //     $('.cold_unresponsive_note').removeClass('d-none')

    //   }else if(status =="Discard"){

    //     $('.cold_discard_note').removeClass('d-none')

    //   }

      else{

          $("input[name=other_cold_status]").hide();

      }

    });

    // avinash add code start

    // $('.status_pay_later').on('change',function(){

    //     var hot_sub_status = $(this).find("option:selected").val();

    //     if(hot_sub_status == 'To Pay' || hot_sub_status == 'Pay Later'){

    //         $('.hot_sub_status_note').removeClass('d-none');

    //     }else{

    //         $('.hot_sub_status_note').addClass('d-none');

    //     }

    // })

    

    // $('.status_warm').on('change',function(){

    //     var status_warm = $(this).find("option:selected").val();

    //     // alert(status_warm);

    //     $('.hid').addClass('d-none');

    //     if(status_warm =='Rate Shared'){

    //         $('.warm_rate_shared_note').removeClass('d-none');

    //     }else if(status_warm =='Need Convincing'){

    //         $('.warm_need_convincing_note').removeClass('d-none');

    //     }else if(status_warm =='Price Sensitive'){

    //         $('.warm_preice_sensitive_note').removeClass('d-none');

    //     }else if(status_warm =='Not Comfortable Online'){

    //         $('.warm_not_comfortable_online_note').removeClass('d-none');

    //     }else if(status_warm =='Build faith/trust'){

    //         $('.warm_build_faith_trust_note').removeClass('d-none');

    //     }

        

    // })

    

    // avinash add code end

    });

</script>

<?php  }

?>

<script type="text/javascript">

//   $('#edit_user_details').on('click',function(){

//     $('#email_id_details').removeAttr('style');

//     $('#email_id_details').removeAttr('readonly');

//     $('#lead_source_details').removeAttr('style');

//     $('#lead_source_details').removeAttr('disabled');

//     $('#save_de').show();

//     $('#cancel_de').show();

//     $('#edit_de').hide();

//   });

//   $('#cancel_data_user_details').on('click',function(){

//     $('#email_id_details').attr('readonly','readonly');

//     $('#lead_source_details').attr('disabled','disabled');

//     $("#email_id_details").attr('style',  'background-color:#f7f8fa');

//     $("#lead_source_details").attr('style',  'background-color:#f7f8fa');

//     $("#lead_source_details").attr('style','width:50% !important');

//     $('#save_de').hide();

//     $('#cancel_de').hide();

//     $('#edit_de').show();

//   });

//   $('#save_data_user_details').on('click',function(){

//     var email_id_details = $('#email_id_details').val();

//     var lead_source_val = $('#lead_source_details option:selected').val();

//     var old_email_id_details = '<?=$get_user_details[0]['email_id'] ?>';

//     if(email_id_details!="" && lead_source_val!=""){

//       $.ajax({

//         method: 'POST',

//         url : '<?php echo base_url()?>user_details/update_lead_source_deatils',

//         data : {

//           email_id_details:email_id_details,lead_source_val:lead_source_val,old_email_id_details:old_email_id_details}

//         ,

//         success: function(data) {

//           alert('Email-id and lead Source are updated Successfully');

//           $('#email_id_details').attr('readonly','readonly');

//           $('#lead_source_details').attr('disabled','disabled');

//           $("#email_id_details").attr('style',  'background-color:#f7f8fa');

//           $("#lead_source_details").attr('style',  'background-color:#f7f8fa');

//           $('#save_de').hide();

//           $('#cancel_de').hide();

//           $('#edit_de').show();

//           window.location.reload(false);

//           return false;

//           //window.location.reload(false); 

//         }

//       });

//     }

//     else{

//       alert('Email id and lead Source cannot be empty.');

//     }

//     //if(email_id_details!="" && lead_source_val!=""){

//     /*$('#email_id_details').attr('readonly','readonly');

//         $('#lead_source_details').attr('disabled','disabled');

//         $("#email_id_details").attr('style',  'background-color:#f7f8fa');

//         $("#lead_source_details").attr('style',  'background-color:#f7f8fa');

//         $('#save_de').hide();

//         $('#cancel_de').hide();

//         $('#edit_de').show();*/

//   });

  // avinash add thid for edit user detail from edit popup 22-11-2021

  function edit_lead_detail(){

      var lead_source =$('#lead_source_details').val();

      var lead_name =$('#lead_name').html();

      var email_id_details =$('#email_id_details').val();

      var lead_height =$('#lead_height').html();

      var lead_weight =$('#lead_weight').html();

      var lead_country =$('#lead_country_name').html();

      var lead_state =($('#lead_state').html()) ?$('#lead_state').html():'<option value="NA">Select State</option>' ;

      var lead_city =($('#lead_city').html()) ?$('#lead_city').html():'<option value="NA">Select City</option>' ;

      var country = $('#lead_country').val().trim();

      var country_id = $('#lead_country option:selected').attr('rel');

      var phone = $("#details_data #phone").val();

    //   alert(lead_state);

       var url = "https://www.balancenutrition.in/sales_crm_staging/lead/get_states";

                $('#state').val('');

                $.ajax({

                  type: "POST",

                  url: url,

                  data: {country_id: country_id},

                  dataType:'json',

                  success: function(response){

                       console.log(response);

                      var state_html = "<option value=''>Select State</option>";

                      var state='';

                      $.each(response.states, function(i, item) 

                        {

                            if(response.states[i].state_name == lead_state.trim()){

                                

                                state='selected';

                            }else{state='';}

                            

                            state_html += '<option rel="'+response.states[i].state_id+'" value="'+response.states[i].state_name+'" '+state+'>'+response.states[i].state_name+'</option>';

                            

                        });

                        $('.state').removeClass('d-none');

                        $('.cities').removeClass('d-none');

                        $('#lead_state_name').html(state_html);

                        

                  }

                  });

               

      

    var state_id =  $('#lead_state_name').val();

    var url = "https://www.balancenutrition.in/sales_crm_staging/lead/get_city";

    $('#cities').val('');

    $.ajax({

       type: "POST",

       url: url,

       data: {state_id: lead_state},

       dataType:'json',

       success: function(response){

           var cities_html = "<option value=''>Select City</option>";

           var city ='';

           

           $.each(response.cities, function(i, item) 

            {

                // console.log(response.cities[i].city_name);

                // console.log(lead_city);

                if(response.cities[i].city_name == lead_city.trim()){

                                city='selected';

                                // alert(lead_city);

                            }

                            else{city ='';

                                

                            }

                cities_html += '<option value="'+response.cities[i].city_name+'" rel="'+response.cities[i].city_id+'" '+city+'>'+response.cities[i].city_name+'</option>';

                

            });

            

            $('#lead_city_name').html(cities_html);

            

       }

      });

      

    $(document).on('change', '#lead_state_name', function(){

    var state_id =  $('#lead_state_name').val();

    var url = "https://www.balancenutrition.in/sales_crm_staging/lead/get_city";

    $('#lead_city_name').val('');

    $.ajax({

       type: "POST",

       url: url,

       data: {state_id: state_id},

       dataType:'json',

       success: function(response){

           

           var cities_html = "<option value=''>Select City</option>";

           $.each(response.cities, function(i, item) 

            {

                cities_html += '<option value="'+response.cities[i].city_name+'" rel="'+response.cities[i].city_id+'">'+response.cities[i].city_name+'</option>';

                

            });

            $('#lead_city_name').html(cities_html);

       }

      });

});

      $(document).on('change', '#lead_country', function(){

     var country = $('#lead_country').val();

     var country_id = $('#lead_country option:selected').attr('rel');

    //  alert(country_id);

       var url = "https://www.balancenutrition.in/sales_crm_staging/lead/get_states";

                $('#state').val('');

                $.ajax({

                  type: "POST",

                  url: url,

                  data: {country_id: country_id},

                  dataType:'json',

                  success: function(response){

                       console.log(response);

                      var state_html = "<option value=''>Select State</option>";

                      $.each(response.states, function(i, item) 

                        {

                            state_html += '<option rel="'+response.states[i].state_id+'" value="'+response.states[i].state_name+'">'+response.states[i].state_name+'</option>';

                            

                        });

                        $('.state').removeClass('d-none');

                        $('.cities').removeClass('d-none');

                        $('#lead_state_name').html(state_html);

                        

                  }

                  });

      });

                  

      var first_name = $('#lead_first_name').val(lead_name);

      var email_id = $('#lead_email_id').val(email_id_details);

      var source_id = $('#lead_source_id').val();

      var state = $('#lead_state_name').val(lead_state);

      var city = $('#lead_city_name').val(lead_city);

      var lead_weight_data = lead_weight.toString();

      var lead_weight_array = lead_weight_data.split(".");

      var weight = $('#lead_weight_kg').val(lead_weight_array[0]);

      var weight_grm = $('#lead_weight_grm').val(lead_weight_array[1]);

      var lead_height = lead_height.toString();

      var lead_height_array = lead_height.split(".");

      var height_ft = $('#lead_height_ft').val(lead_height_array[0]);

      var height_in = $('#lead_height_in').val(lead_height_array[1]);

      var age_1 = $('#lead_age').html();

      var age_2 =$('#lead_age_data').val(age_1);

      $('#edit_lead_popup #phone').val(phone);

      console.log("lead_source"+lead_source+"<br/>name="+lead_name+"<br/> Email :"+email_id_details+"<br/> lead_height :"+lead_height+"<br/>lead_weight :"+lead_weight+"<br/>lead_country :"+lead_country+"<br/lead_state : "+lead_state+"<br/> lead_city :"+lead_city);

      console.log("lead_source"+source_id+"<br/>name="+first_name+"<br/> Email :"+email_id+"<br/> lead_height :"+lead_height+"<br/>lead_weight :"+weight+"<br/>lead_country :"+country+"<br/lead_state : "+state+"<br/> lead_city :"+city);

      $('#edit_lead_popup').modal('show');

  }

  $('#update_lead_detail').on('click',function(){

    var id= '<?=$get_user_details[0]['id'] ?>';

    var old_email_id_details = '<?=$get_user_details[0]['email_id'] ?>';

    var gender = '<?=$get_user_details[0]['gender'] ?>';

    var stage =  '<?=$get_user_details[0]['stage'] ?>';

    var lead_first_name=$('#lead_first_name').val();

    var lead_email_id=$('#lead_email_id').val();

    var lead_country =$('#lead_country').val();

    var lead_source_id=$('#lead_source_id').val();

    var lead_state_name=$('#lead_state_name').val();

    var lead_city_name=$('#lead_city_name').val();

    var lead_weight_kg=$('#lead_weight_kg').val();

    var lead_weight_grm=$('#lead_weight_grm').val();

    var lead_height_ft=$('#lead_height_ft').val();

    var lead_height_in=$('#lead_height_in').val();

    var age = $('#lead_age_data').val();

    var phone =  $('#edit_lead_popup #phone').val();

    if(lead_email_id!="" && lead_source_id!=""){

      $.ajax({

        method: 'POST',

        url : '<?php echo base_url()?>user_details/update_lead_deatils',

        data : {

          id:id,old_email_id_details:old_email_id_details,lead_first_name:lead_first_name,lead_email_id:lead_email_id,lead_country:lead_country,lead_source_id:lead_source_id,lead_state_name:lead_state_name,lead_city_name:lead_city_name,lead_weight_kg:lead_weight_kg,lead_weight_grm:lead_weight_grm,lead_height_ft:lead_height_ft,lead_height_in:lead_height_in,gender:gender,stage:stage,age:age,phone:phone}

        ,

        success: function(data) {

            console.log(data);

            if(data){

          window.open("https://www.balancenutrition.in/sales_crm/user_details?user_email="+lead_email_id+"&user_status=lead","_self");

          $('#edit_lead_popup').modal('hide');

        } else{

            alert('Something Went Wrong!');

        }

        }

      });

    }

    else{

      alert('Email id and lead Source cannot be empty.');

    }

    //if(email_id_details!="" && lead_source_val!=""){

    /*$('#email_id_details').attr('readonly','readonly');

        $('#lead_source_details').attr('disabled','disabled');

        $("#email_id_details").attr('style',  'background-color:#f7f8fa');

        $("#lead_source_details").attr('style',  'background-color:#f7f8fa');

        $('#save_de').hide();

        $('#cancel_de').hide();

        $('#edit_de').show();*/

  });

</script>

