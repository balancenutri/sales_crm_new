<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<style>
.m-tooltips, .ui-tooltip {
    height: auto !important;
}

.hd_looks_sec {
    font-weight: bold;
    color: black;
}
.hd_looks_sec p{
    font-size: 16px;
}
.chart {
  width: 100%;
  min-height: 350px;
}
table th{
    font-size: 11px
}
table td{
    font-weight: 500;
}
.tooltip{
    font-weight: 500;
    font-size: 14px;
    width: 100%;
    text-align: center;
}
.tooltip .tooltiptext1{
    width: 175px;
}
#source_wise_conversion_append th{
    font-size: 15px;
}
.scrollme {
    overflow-x: auto;
}



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

    

</style>
<style type="text/css">
    /*.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
    .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
    .tab-pane { padding: 15px 0; }
    .tab-content{padding:20px}
    .nav-tabs > li  {width:20%; text-align:center;}
    .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }

    @media all and (max-width:724px){
        .nav-tabs > li > a > span {display:none;}   
        .nav-tabs > li > a {padding: 5px 5px;}
    }*/
</style>
<?php
    $c_name  = $this->session->balance_session['first_name'];
    if(strtolower($c_name)=='vishal'){
            
?>

<ul class="nav nav-tabs" role="tablist">
    <li > 
        <select class="form-control" name="counsellor_name" id="counsellor_name">
            <option value="">Counsellor wise Filter</option>
            <?php
                foreach ($counsellor_list as $key => $value) {
            ?>
                <option value="<?=strtolower($value['first_name'])?>"><?=ucwords($value['full_name'])?></option>  
            <?php
                }
            ?>
        </select>
    </li>
</ul>
<?php
            
        }
?>
<!--start:: Counsellor Performance Review -->
<div class="m-content pt-4 pb-0">
    <?php if($_SESSION['balance_session']['user_type'] =='sales'){ ?>
    <ol class="progtrckr pt-0" data-progtrckr-steps="5">
    <li class="progtrckr-todo" style="font-weight: 400" id="first">First Review : 1:30 PM</li>
    <li class="progtrckr-todo" style="font-weight: 400" id="second">Second Review : 4:30 PM</li>
    <li class="progtrckr-todo" style="font-weight: 400" id="end">Day End Review : 7:00 PM</li>
    </ol>
    <?php } ?>
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey1" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 counsellor_performance_review collapsed" data-id="counsellor_performance_review" role="tab" id="m_accordion_sales_journey1_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey1_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Counsellor Performance Review
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey1_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey1_item_3_head" data-parent="#m_accordion_sales_journey1"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                                <div class="row m-row--no-padding m-row--col-separator-xl">             
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table m-table m-table--head-separator-primary" style="border-right: 1px solid;">
                                                <thead>
                                                    <tr>
                                                        <th style="font-weight: bold;text-align: center;font-size: 12px">Performance of <?=date('M');?> <?=date('Y');?></th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Sales</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="sales_amount">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Sale Units</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="sales_unit">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Total Leads</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="total_lead_assign">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Consultations</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="consultation">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hot</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="hot">0</a></td>
                                                    </tr>
                                                    <tr style="border-bottom:0px;">
                                                        <th scope="row">Warms</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="warm">0</a></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>

                                        <div class="col-sm-12 col-md-3 col-lg-3" style="border-right: 1px solid;">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table m-table m-table--head-separator-primary">
                                                <thead>
                                                    <tr>
                                                        <th style="font-weight: bold;text-align: center;font-size: 12px">Ratio Performance of <?=date('M');?> <?=date('Y');?></th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Lead to consultation ratio %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="lead_consultation_ratio">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Consultation to sales %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="consultation_sales">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Leads to sale ratio %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="lead_to_sales_ratio">0</a></td>
                                                    </tr>
                                                    <tr style="border-bottom:0px;">
                                                        <th scope="row">Hot to sale %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="hot_to_sales">0</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>

                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table m-table m-table--head-separator-primary" style="border-right: 1px solid;">
                                                <thead>
                                                    <tr>
                                                        <th style="font-weight: bold;text-align: center;font-size: 12px">Performance of Overall</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Sales</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="sales_amount_overall">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Sale Units</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="sales_unit_overall">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Total Leads</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="total_lead_assign_overall">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Consultations</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="consultation_overall">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hot</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="hot_overall">0</a></td>
                                                    </tr>
                                                    <tr style="border-bottom:0px;">
                                                        <th scope="row">Warms</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="warm_overall">0</a></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>

                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table m-table m-table--head-separator-primary">
                                                <thead>
                                                    <tr>
                                                        <th style="font-weight: bold;text-align: center;font-size: 12px">Ratio Performance of Overall</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Lead to consultation ratio %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="lead_consultation_ratio_overall">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Consultation to sales %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="consultation_sales_overall">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Leads to sale ratio %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="lead_to_sales_ratio_overall">0</a></td>
                                                    </tr>
                                                    <tr style="border-bottom:0px;">
                                                        <th scope="row">Hot to sale %</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="hot_to_sales_overall">0</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Counsellor Performance Review -->

<!--start:: Basic To Special -->
<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey3" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 basic_to_special collapsed" data-id="basic_to_special" role="tab" id="m_accordion_sales_journey3_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey3_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Basic To Special
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('M');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
            
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey3_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey3_item_3_head" data-parent="#m_accordion_sales_journey3"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                                <div class="row m-row--no-padding m-row--col-separator-xl">             
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table m-table m-table--head-separator-primary ">
                                                <thead>
                                                    <tr>
                                                        <th style="">Particular</th>
                                                        <th class="text-center">Total BSP Sold</th>
                                                        <th class="text-center">Upgrade to SSP</th>
                                                        <th class="text-center">% Of Upgrade</th>
                                                        <th class="text-center">Renewed To BSP</th>
                                                        <th class="text-center">% Of Upgrade</th>
                                                        <th class="text-center">Potential (Unconverted)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Lead</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_upgrade_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_per_upgrade_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_renew_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_per_upgrade_Sold_renew">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_unconverted_Sold">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">OMR</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_OMR_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_OMR_upgrade_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_OMR_per_upgrade_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_OMR_renew_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_OMR_per_upgrade_Sold_renew">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_OMR_unconverted_Sold">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Active Clients</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_active_client_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_active_client_upgrade_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_active_client_per_upgrade_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_active_client_renew_Sold">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_active_client_per_upgrade_Sold_renew">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_active_client_unconverted_Sold">0</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Total</th>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_Sold_total">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_upgrade_Sold_total">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_per_upgrade_Sold_total">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_renew_Sold_total">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_per_upgrade_Sold_renew_total">0</a></td>
                                                        <td class="text-center"><a href="javascript:void(0)" class="Total_BSP_unconverted_Sold_total">0</a></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Basic To Special -->
<!--start:: Conversion Ratio (Lead Funnel) -->
<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey2" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 conversion_ratio collapsed" data-id="conversion_ratio" role="tab" id="m_accordion_sales_journey2_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey2_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Conversion Ratio (Lead Funnel)
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey2_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey2_item_3_head" data-parent="#m_accordion_sales_journey2"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                                <div class="row m-row--no-padding m-row--col-separator-xl">             
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li > 
                                                <select class="form-control" name="year_conversion_ratio" id="year_conversion_ratio">
                                                    <?php
                                                    for($start_date = date('Y'); $start_date >= '2015' ; $start_date--){
                                                    ?>
                                                        <option value="<?=$start_date?>"><?=$start_date?></option>  
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </li>
                                        </ul>          
                                        <div class="col-sm-12 col-md-12 col-lg-12 scrollme">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table table-striped  m-table m-table--head-separator-primary" id="conversion_ratio_append">
                                                <!-- HTML CODE COME FROM AJAX -->
                                                
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Conversion Ratio (Lead Funnel) -->
<!--start:: Stage and Phase  -->

<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey4" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 stage_phase_conversion collapsed" data-id="stage_phase_conversion" role="tab" id="m_accordion_sales_journey4_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey4_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Stage & Phase wise Conversion Ratio
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey4_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey4_item_3_head" data-parent="#m_accordion_sales_journey4"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                                <div class="row m-row--no-padding m-row--col-separator-xl">             
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <ul class="nav nav-tabs" role="tablist">
                                              <li role="presentation" class="active"><a href="#stage" aria-controls="stage" role="tab" data-toggle="tab"> <span>Stage</span></a></li>
                                              <li role="presentation"><a href="#phase" aria-controls="phase" role="tab" data-toggle="tab">  <span>Phase</span></a></li>
                                              <li > 
                                                    <select class="form-control" name="year_stage_phase" id="year_stage_phase">
                                                        <?php
                                                        for($start_date = date('Y'); $start_date >= '2015' ; $start_date--){
                                                        ?>
                                                            <option value="<?=$start_date?>"><?=$start_date?></option>  
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active scrollme" id="stage">
                                                  <!--begin:: Widgets/Stats2-1 -->
                                                    <table class="table table-striped m-table m-table--head-separator-primary" style="border-right: 1px solid;">
                                                        <thead>
                                                            <tr>
                                                                <th style="font-weight: bold;text-align: center;font-size: 12px" colspan="13">Stage of <span class="year_sp"><?=date('Y');?></span></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="stage_conversion_append" style="overflow: scroll;">
                                                            
                                                        </tbody>
                                                    </table>
                                                    <!--end:: Widgets/Stats2-1 -->
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="phase">
                                                    <!--begin:: Widgets/Stats2-1 -->
                                                    <table class="table m-table m-table--head-separator-primary" style="border-right: 1px solid;">
                                                        <thead>
                                                            <tr>
                                                                <th style="font-weight: bold;text-align: center;font-size: 12px" colspan="13">Phase of <span class="year_sp"><?=date('Y');?></span></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody id="phase_conversion_append">
                                                            
                                                        </tbody>
                                                    </table>
                                                    <!--end:: Widgets/Stats2-1 -->
                                                </div>
                                            </div>
                                            
                                        </div>
                                        

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Stage and Phase  -->
<!--start:: Source Wise Conversion -->
<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey5" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 source_wise_conversion collapsed" data-id="source_wise_conversion" role="tab" id="m_accordion_sales_journey5_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey5_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Source wise Conversion
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('M');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
            
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey5_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey5_item_3_head" data-parent="#m_accordion_sales_journey5"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                                <div class="row m-row--no-padding m-row--col-separator-xl">   
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li > 
                                                <select class="form-control" name="year_source_wise" id="year_source_wise">
                                                    <?php
                                                    for($start_date = date('Y'); $start_date >= '2015' ; $start_date--){
                                                    ?>
                                                        <option value="<?=$start_date?>"><?=$start_date?></option>  
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </li>
                                        </ul>          
                                        <div class="col-sm-12 col-md-12 col-lg-12 scrollme">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <table class="table table-striped  m-table m-table--head-separator-primary" id="source_wise_conversion_append">
                                                <!-- HTML CODE COME FROM AJAX -->
                                            </table>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Source Wise Conversion -->
<!--start:: efforts_for_sales -->
<!--<div class="m-content pt-4 pb-0">-->
<!--    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">-->
        <!--begin::Item--> 
<!--        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">-->
<!--            <div class="m-accordion__item-head px-3 efforts_for_sales collapsed" data-id="efforts_for_sales" role="tab" id="m_accordion_sales_journey_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_3_body" aria-expanded="false">-->
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
<!--                <span class="m-accordion__item-title">-->
<!--                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">-->
<!--                        Effort For Sales - <small>(Under Testing)</small>-->
<!--                    </span>-->
<!--                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>-->
<!--                </span>-->
                     
<!--                <span class="m-accordion__item-mode text-dark"></span>     -->
<!--            </div>-->
    
<!--            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_3_head" data-parent="#m_accordion_sales_journey"> -->
<!--                <div class="m-accordion__item-content p-0 ">-->
                    <!--Begin::Section-->
<!--                    <div class="m-portlet">-->
<!--                        <div class="m-portlet__body  m-portlet__body--no-padding">-->
<!--                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">-->
<!--                                <div class="row m-row--no-padding m-row--col-separator-xl">             -->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->
<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="a_c_sales">2</h2>-->
<!--                                                    <p>Avg Call For A Sales</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="a_c_per_day">2</h2>-->
<!--                                                    <p>Avg Call Per Day</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2>0</h2>-->
<!--                                                    <p>Avg Query Per Day</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->

<!--                                </div>-->
<!--                                <div class="row m-row--no-padding m-row--col-separator-xl" style="border-top: 1px solid black;">             -->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->
<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="a_c_fu_per_day">2</h2>-->
<!--                                                    <p>Avg Follwup Per Day</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="day_close_consult">2</h2>-->
<!--                                                    <p>Days to Close Consultation</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="day_close_sale">3</h2>-->
<!--                                                    <p>Avg Day To Close A Sale</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!--End::Section-->
                    
<!--                </div>-->
<!--            </div>-->
<!--        </div>   -->
        <!--end::Item-->
<!--    </div>-->
<!--</div>-->
<div class="row">
    <div class="col-6">
<!--        <div class="m-content pt-4 pb-0">-->
<!--    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">-->
        <!--begin::Item--> 
<!--        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">-->
<!--            <div class="m-accordion__item-head px-3 efforts_for_sales collapsed" data-id="efforts_for_sales" role="tab" id="m_accordion_sales_journey_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_3_body" aria-expanded="false">-->
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
<!--                <span class="m-accordion__item-title">-->
<!--                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">-->
<!--                        Effort For Sales - <small>(Under Testing)</small>-->
<!--                    </span>-->
<!--                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>-->
<!--                </span>-->
                     
<!--                <span class="m-accordion__item-mode text-dark"></span>     -->
<!--            </div>-->
    
<!--            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_3_head" data-parent="#m_accordion_sales_journey"> -->
<!--                <div class="m-accordion__item-content p-0 ">-->
                    <!--Begin::Section-->
<!--                    <div class="m-portlet">-->
<!--                        <div class="m-portlet__body  m-portlet__body--no-padding">-->
<!--                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">-->
<!--                                <div class="row m-row--no-padding m-row--col-separator-xl">             -->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->
<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="a_c_sales">2</h2>-->
<!--                                                    <p>Avg Call For A Sales</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="a_c_per_day">2</h2>-->
<!--                                                    <p>Avg Call Per Day</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2>0</h2>-->
<!--                                                    <p>Avg Query Per Day</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->

<!--                                </div>-->
<!--                                <div class="row m-row--no-padding m-row--col-separator-xl" style="border-top: 1px solid black;">             -->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->
<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="a_c_fu_per_day">2</h2>-->
<!--                                                    <p>Avg Follwup Per Day</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec" style="border-right: 1px solid black;">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="day_close_consult">2</h2>-->
<!--                                                    <p>Days to Close Consultation</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->
<!--                                        <div class="col-sm-4 col-md-4 col-lg-4">-->
                                            <!--begin:: Widgets/Stats2-1 -->
<!--                                            <div class="hd_looks_sec">-->

<!--                                                <div class="hd_looks_sec" style="text-align: center;">-->

<!--                                                    <h2 class="day_close_sale">3</h2>-->
<!--                                                    <p>Avg Day To Close A Sale</p>-->
                                                    
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--end:: Widgets/Stats2-1 -->
<!--                                        </div>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!--End::Section-->
                    
<!--                </div>-->
<!--            </div>-->
<!--        </div>   -->
        <!--end::Item-->
<!--    </div>-->
<!--</div>-->
<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 efforts_for_sales collapsed" data-id="efforts_for_sales" role="tab" id="m_accordion_sales_journey_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Effort For Sales - <small>(Under Testing)</small>
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('m');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
    
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey_item_3_head" data-parent="#m_accordion_sales_journey"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <table class="table table-striped table-hover" style="font-size: 16px;" >
                                <thead class="" style="background-color: darkgrey;color:#fff">
                                    <tr>
                                    <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Title</th>
                                    <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">Yours</th>
                                    <th style="font-size: 16px;" class="text-center">Team</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="font-size: 16px;">Days to Close a Lead</th>
                                        <td class="day_close_sale text-center"> 1</td>
                                        <td class="day_close_sale_team text-center">1</td>
                                    </tr>
                                    <tr>
                                        <th style="font-size: 16px;">Days to Close Consultation</th>
                                        <td class="day_close_consult text-center"> 1</td>
                                        <td class="day_close_consult_team text-center">1</td>
                                    </tr>
                                    <tr>
                                        <th style="font-size: 16px;">Calls to close a Lead</th>
                                        <td class="per_avg_calls text-center"> 1</td>
                                        <td class="per_avg_calls_team text-center">1</td>
                                    </tr>
                                     <tr>
                                        <th style="font-size: 16px;">FUs to close a Lead</th>
                                        <td class="avg_fu_to_close text-center"> 0</td>
                                        <td class="avg_fu_to_close_team text-center">0</td>
                                    </tr>
                                    <tr>
                                        <th style="font-size: 16px;">FUs per Day</th>
                                        <td class="avg_calls_fu text-center"> 1</td>
                                        <td class="avg_calls_fu_team text-center">1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
    </div>
    <div class="col-6"><!--start:: Medical Bucket -->
<div class="m-content pt-4 pb-0">
    <div class="m-accordion m-accordion--default" id="m_accordion_sales_journey6" role="tablist">
        <!--begin::Item--> 
        <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
            <div class="m-accordion__item-head px-3 medical_bucket collapsed" data-id="medical_bucket" role="tab" id="m_accordion_sales_journey6_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey6_item_3_body" aria-expanded="false">
                <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
                <span class="m-accordion__item-title">
                    <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                        Medical Conditional Bucket
                    </span>
                    <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('M');?> <?=date('Y');?></p>
                </span>
                     
                <span class="m-accordion__item-mode text-dark"></span>     
            </div>
            
            <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey6_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey6_item_3_head" data-parent="#m_accordion_sales_journey6"> 
                <div class="m-accordion__item-content p-0 ">
                    <!--Begin::Section-->
                    <div class="m-portlet">
                        <div class="m-portlet__body  m-portlet__body--no-padding">
                            <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                                <div class="row m-row--no-padding m-row--col-separator-xl">             
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec">
                                                <p><span style="text-align: center;">PCOS</span><span class="PCOS" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec">

                                                <p><span style="text-align: center;">Thyroid</span><span class="Thyroid" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec" >

                                                <p><span style="text-align: center;">Cholestrol</span><span class="Cholestrol" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec" >

                                                <p><span style="text-align: center;">Diabetes</span><span class="Diabetes" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>

                                </div>
                                <div class="row m-row--no-padding m-row--col-separator-xl" style="border-top: 1px solid black;">             
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec">
                                                <p><span style="text-align: center;">Other health issue</span><span class="oth" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec">

                                                <p><span style="text-align: center;">Overweight</span><span class="Overweight" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec" >

                                                <p><span style="text-align: center;">Very overweight</span><span class="very_overweight" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-3">
                                            <!--begin:: Widgets/Stats2-1 -->
                                            <div class="hd_looks_sec" >

                                                <p><span style="text-align: center;">Obese</span><span class="Obese" style="float: right;"></span></p>
                                                
                                            </div>
                                            <!--end:: Widgets/Stats2-1 -->
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                    
                </div>
            </div>
        </div>   
        <!--end::Item-->
    </div>
</div>
<!--end:: Medical Bucket --></div>
</div>
<!--end:: efforts_for_sales -->
<!--=============================================avinash Added this for Heat Map effort for sale  Start====================================================-->
<div class="m-content pt-4 pb-0">
<div class="m-accordion m-accordion--default" id="m_accordion_sales_journey7" role="tablist">
    <!--begin::Item--> 
    <div class="m-accordion__item sales_journey_item sales_data_count_sec" data-id="sales_month_look">
        <div class="m-accordion__item-head px-3 medical_bucket collapsed" data-id="medical_bucket" role="tab" id="m_accordion_sales_journey7_item_3_head" data-toggle="collapse" href="#m_accordion_sales_journey7_item_3_body" aria-expanded="false">
            <!--<span class="m-accordion__item-icon"><i class="fa  flaticon-placeholder"></i></span>-->
            <span class="m-accordion__item-title">
                <span class="act_cln_sub_head pb-0 text-dark" style="font-size: 22px;">
                Inside Sales / Analysis
                </span>
                <p style="font-size: 9px ; padding: 2px;margin: 0px">Last Update On <?=date('d');?><sup>th</sup> <?=date('M');?> <?=date('Y');?></p>
            </span>
            <span class="m-accordion__item-mode text-dark"></span>     
        </div>
        <div class="m-accordion__item-body collapse" id="m_accordion_sales_journey7_item_3_body" class=" " role="tabpanel" aria-labelledby="m_accordion_sales_journey7_item_3_head" data-parent="#m_accordion_sales_journey7">
            <div class="m-accordion__item-content p-0 ">
                <!--Begin::Section-->
                <div class="m-portlet">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="container" style="padding-top: 30px;padding-bottom: 30px;">
                            <nav>
                                <div class="nav nav-tabs d-flex" id="nav-tab" role="tablist">
                                    <!--<a class="nav-item nav-link active show" id="nav-home-tab10" data-toggle="tab" href="#nav-home11" role="tab" aria-controls="nav-home" aria-selected="true" style="color: black;font-size: initial; font-size: 18px;"><h6>All</h6></a>-->
                                    <a class="nav-item nav-link active show" id="nav-profile-tab11" data-toggle="tab" href="#nav-profile12" role="tab" aria-controls="nav-profile1" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                        <h6>Converted</h6>
                                    </a>
                                    <a class="nav-item nav-link" id="nav-profile-tab21" data-toggle="tab" href="#nav-profile22" role="tab" aria-controls="nav-profile2" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                        <h6>UNconverted</h6>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content testlist" id="nav-tabContent">
                                <!--<div class="tab-pane fade active show" id="nav-home11" role="tabpanel" aria-labelledby="nav-home-tab"></div>-->
                                <div class="tab-pane fade active show" id="nav-profile12" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <nav>
                                        <div class="nav nav-tabs d-flex" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active show" id="nav-home-tab45" data-toggle="tab" href="#nav-home45" role="tab" aria-controls="nav-home45" aria-selected="true" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>All</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Gender</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab1" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Age</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Location</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab3" data-toggle="tab" href="#nav-profile3" role="tab" aria-controls="nav-profile3" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Stage</h6>
                                            </a>
                                            <!--<a class="nav-item nav-link" id="nav-profile-tab4" data-toggle="tab" href="#nav-profile4" role="tab" aria-controls="nav-profile4" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;"><h6>Medical</h6></a>-->
                                            <a class="nav-item nav-link" id="nav-profile-tab5" data-toggle="tab" href="#nav-profile5" role="tab" aria-controls="nav-profile5" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Source</h6>
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content testlist" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-home45" role="tabpanel" aria-labelledby="nav-home-tab45">
                                            <h5 class="text-center">Effort For Sale</h5>
                                            <div class="m-portlet__body  m-portlet__body--no-padding" style="display: flex !important;justify-content: center !important;">
                                                <table class="table table-striped table-hover" style="font-size: 16px;width:80%;">
                                                    <thead class="" style="background-color: darkgrey;color:#fff">
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Title</th>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">Aayushi</th>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">Vaishnavi</th>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">OverAll</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Relevent Lead (RL)</th>
                                                            <td class="day_close_sale text-center days_to_close_sale rel_aayushi " style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs  rel_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss rel_all">0%</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Fresh Lead (FL)</th>
                                                            <td class="day_close_sale text-center days_to_close_sale fresh_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs fresh_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss fresh_all">0%</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Old Lead Returning (OLR)</th>
                                                            <td class="day_close_sale text-center days_to_close_sale old_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs old_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss old_all">0%</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Consultation To sale</th>
                                                            <td class="day_close_sale text-center days_to_close_sale consult_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs consult_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0%</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss consult_all">0%</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Days to Close All<br><small>Basic + Special</small></th>
                                                            <td class="day_close_sale text-center days_to_close_all_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_all_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center  days_to_close_all">77</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Days to Close Basic Stack</th>
                                                            <td class="day_close_sale text-center  days_to_close_basic_stack_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center  days_to_close_basic_stack_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center  days_to_close_basic_stack">0</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Days to Close Special Stack</th>
                                                            <td class="day_close_sale text-center  days_to_close_special_stack_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center  days_to_close_special_stack_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center  days_to_close_special_stack_all">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Gender</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Gender
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Ratio
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Days to Convert
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Male</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_ratio_others">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_days">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Female</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="female_ratio_yours" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="female_ratio_others" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="female_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="female_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="female_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="female_days">0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Age Group</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Age Group
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Ratio
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Days to Convert
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">&lt; 25</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age25_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age25_ratio_others">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age25_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age25_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age25_days_othrs">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age25_days">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">25-35</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age35_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age35_ratio_others">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age35_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age35_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age35_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age35_days">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">35-45</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age45_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age45_ratio_others">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age45_ratio" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age45_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age45_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age45_days">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">45-55</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_ratio_others" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_days">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">55 &amp; Above</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_above_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_above_ratio_others" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_above_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_above_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_above_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="male_age55_above_days">0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
                                            <h5>Location</h5>
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Locations</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Location
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Ratio
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Days to Convert
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">NRI</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="nri_ratio_yours">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="nri_ratio_others" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="nri_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="nri_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="nri_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="nri_days">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">India</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="india_ratio_yours" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="india_ratio_others" >0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="india_ratio">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="india_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="india_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="india_days">0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile3" role="tabpanel" aria-labelledby="nav-profile-tab3">
                                            <h5>Stage</h5>
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Stage</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Stage
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Ratio
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Days to Convert
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 1</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage1_ratio_yours" title="Units(15)/Lead(48)">31%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage1_ratio_others" title="Units(9)/Lead(32)">28%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage1_ratio" title="Units(34)/Lead(250)">14%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage1_days_yours">6</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage1_days_others">33</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage1_days">154</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 2</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage2_ratio_yours" title="Units(4)/Lead(13)">31%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage2_ratio_others" title="Units(0)/Lead(1)">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage2_ratio" title="Units(22)/Lead(361)">6%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage2_days_yours">1.5</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage2_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage2_days">134</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 3</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage3_ratio_yours" title="Units(12)/Lead(87)">14%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage3_ratio_others" title="Units(4)/Lead(48)">8%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage3_ratio" title="Units(82)/Lead(799)">10%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage3_days_yours">3</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage3_days_others">22</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage3_days">152</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 4</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage4_ratio_yours" title="Units(35)/Lead(207)">17%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage4_ratio_others" title="Units(10)/Lead(152)">7%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage4_ratio" title="Units(209)/Lead(1581)">13%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage4_days_yours">9</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage4_days_others">14</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage4_days">92</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">No Stage</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage0_ratio_yours" title="Units(58)/Lead(257)">23%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage0_ratio_others" title="Units(40)/Lead(241)">17%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage0_ratio" title="Units(1219)/Lead(3103)">39%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage0_days_yours">4</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage0_days_others">9</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="stage0_days">57</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--<div class="tab-pane fade" id="nav-profile4" role="tabpanel" aria-labelledby="nav-profile-tab4">-->
                                        <!--    <h5>Medical</h5>-->
                                        <!--    <h4 style="text-align:center;font-weight: 600; color:black;">Medical Issue</h4>-->
                                        <!--    <table class="table  table-striped">-->
                                        <!--        <thead style=" border-bottom:1px solid #918887 ! important;">-->
                                        <!--            <tr class="text-center" style="border: 1px solid #918887;">-->
                                        <!--                <th rowspan="2" style="border: 1px solid #918887;">-->
                                        <!--                    Medical Condition-->
                                        <!--                </th>-->
                                        <!--                <th colspan="3" style=" border: 1px solid #918887;">-->
                                        <!--                    Ratio-->
                                        <!--                </th>-->
                                        <!--                <th colspan="3" style=" border: 1px solid #918887;">-->
                                        <!--                    Days to Convert-->
                                        <!--                </th>-->
                                        <!--            </tr>-->
                                        <!--            <tr class="text-center" style="border: 1px solid #918887;">-->
                                        <!--                <th rowspan="" style=" border: 1px solid #918887;">-->
                                        <!--                    Aayushi-->
                                        <!--                </th>-->
                                        <!--                <th rowspan="" style=" border: 1px solid #918887;">-->
                                        <!--                    Vaishnavi-->
                                        <!--                </th>-->
                                        <!--                <th rowspan="" style=" border: 1px solid #918887;">-->
                                        <!--                    Over All-->
                                        <!--                </th>-->
                                        <!--                <th colspan="" style=" border: 1px solid #918887;">-->
                                        <!--                    Aayushi-->
                                        <!--                </th>-->
                                        <!--                <th colspan="" style=" border: 1px solid #918887;">-->
                                        <!--                    Vaishnavi-->
                                        <!--                </th>-->
                                        <!--                <th colspan="" style=" border: 1px solid #918887;">-->
                                        <!--                    Over All-->
                                        <!--                </th>-->
                                        <!--            </tr>-->
                                        <!--        </thead>-->
                                        <!--        <tbody style="border: 1px solid #918887;">-->
                                        <!--            <tr>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="">Heart</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="heart_ratio_yours" title="Units(0)/Lead(0)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="heart_ratio_others" title="Units(0)/Lead(0)">NaN%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="heart_ratio" title="Units(0)/Lead(0)">NaN%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="heart_days_yours">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="heart_days_others">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="heart_days">0</span>-->
                                        <!--                </td>-->
                                        <!--            </tr>-->
                                        <!--            <tr>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="">PCOS</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="pcos_ratio_yours" title="Units(1543)/Lead(0)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="pcos_ratio_others" title="Units(1543)/Lead(0)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="pcos_ratio" title="Units(1543)/Lead(0)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="pcos_days_yours">71</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="pcos_days_others">71</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="pcos_days">71</span>-->
                                        <!--                </td>-->
                                        <!--            </tr>-->
                                        <!--            <tr>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="">Diabetes</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="diabetes_ratio_yours" title="Units(151)/Lead(2)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="diabetes_ratio_others" title="Units(151)/Lead(2)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="diabetes_ratio" title="Units(151)/Lead(2)">1%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="diabetes_days_yours">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="diabetes_days_others">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="diabetes_days">46</span>-->
                                        <!--                </td>-->
                                        <!--            </tr>-->
                                        <!--            <tr>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="">Thyroid</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="thyroid_ration_yours">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="thyroid_ration_others">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="thyroid_ration">20</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="thyroid_days_yours">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="thyroid_days_others">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="thyroid_days">0</span>-->
                                        <!--                </td>-->
                                        <!--            </tr>-->
                                        <!--            <tr>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="">Others </span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="other_ratio_yours" title="Units(1543)/Lead(60)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="other_ratio_others" title="Units(1543)/Lead(60)">0%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="other_ratio" title="Units(1543)/Lead(60)">4%</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="other_days_yours">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="other_days_others">0</span>-->
                                        <!--                </td>-->
                                        <!--                <td style=" border: 1px solid #918887;">-->
                                        <!--                    <span class="other_days">71</span>-->
                                        <!--                </td>-->
                                        <!--            </tr>-->
                                        <!--        </tbody>-->
                                        <!--    </table>-->
                                        <!--</div>-->
                                        <div class="tab-pane fade" id="nav-profile5" role="tabpanel" aria-labelledby="nav-profile-tab5">
                                            <h5>Source</h5>
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Source</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Source
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Ratio
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Days to Convert
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th colspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Prime Source</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="prime_ratio_yours" title="Units(20)/Lead(88)">23%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="prime_ratio_others" title="Units(8)/Lead(46)">17%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="prime_ratio" title="Units(245)/Lead(821)">30%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="prime_days_yours">4</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="prime_days_others">5</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="prime_days">49</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Social Media</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="social_ratio_yours" title="Units(29)/Lead(134)">22%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="social_ratio_others" title="Units(24)/Lead(167)">14%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="social_ratio" title="Units(119)/Lead(722)">16%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="social_days_yours">6</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="social_days_others">9</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="social_days">118</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Health Score</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="hs_ratio_yours" title="Units(40)/Lead(282)">14%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="hs_ratio_others" title="Units(8)/Lead(181)">4%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="hs_ratio" title="Units(267)/Lead(2650)">10%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="hs_days_yours">9</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="hs_days_others">7</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="hs_days">122</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Web</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="web_ratio_yours" title="Units(5)/Lead(10)">50%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="web_ratio_others" title="Units(2)/Lead(12)">17%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="web_ratio" title="Units(28)/Lead(115)">24%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="web_days_yours">1</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="web_days_others">5</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="web_days">227</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Other</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="other_ratio_yours" title="Units(14)/Lead(97)">14%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="other_ratio_others" title="Units(7)/Lead(49)">14%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="other_ratio" title="Units(907)/Lead(1786)">51%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="other_days_yours">65</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="other_days_others">42</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="other_days">48</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Paid Ads</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="paidads_ratio_ypurs" title="Units(0)/Lead(0)">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="paidads_ratio_others" title="Units(0)/Lead(0)">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="paidads_ratio" title="Units(0)/Lead(0)">0%</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="paidads_days_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="paidads_days_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="paidads_days">0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Unconverted-->
                                <div class="tab-pane fade" id="nav-profile22" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <nav>
                                        <div class="nav nav-tabs d-flex" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active show" id="nav-home-tab55" data-toggle="tab" href="#nav-home55" role="tab" aria-controls="nav-home55" aria-selected="true" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>All</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-home-tab66" data-toggle="tab" href="#nav-home66" role="tab" aria-controls="nav-home66" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Gender</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab18" data-toggle="tab" href="#nav-profile18" role="tab" aria-controls="nav-profile18" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Age</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab29" data-toggle="tab" href="#nav-profile29" role="tab" aria-controls="nav-profile29" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Location</h6>
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab39" data-toggle="tab" href="#nav-profile39" role="tab" aria-controls="nav-profile39" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Stage</h6>
                                            </a>
                                            <!--<a class="nav-item nav-link" id="nav-profile-tab4" data-toggle="tab" href="#nav-profile4" role="tab" aria-controls="nav-profile4" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;"><h6>Medical</h6></a>-->
                                            <a class="nav-item nav-link" id="nav-profile-tab95" data-toggle="tab" href="#nav-profile95" role="tab" aria-controls="nav-profile95" aria-selected="false" style="color: black;font-size: initial; font-size: 18px;">
                                                <h6>Source</h6>
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content testlist" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-home55" role="tabpanel" aria-labelledby="nav-home-tab45">
                                            <h5 class="text-center">UNconverted Units</h5>
                                            <div class="m-portlet__body  m-portlet__body--no-padding" style="display: flex !important;justify-content: center !important;">
                                                <table class="table table-striped table-hover" style="font-size: 16px;width:80%;">
                                                    <thead class="" style="background-color: darkgrey;color:#fff">
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Title</th>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">Vaishnavi</th>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">Aayushi</th>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;" class="text-center">OverAll</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Relevent Lead (RL)</th>
                                                            <td class="day_close_sale text-center days_to_close_sale unconverted_rel_aayushi " style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs  unconverted_rel_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss unconverted_rel_all">0</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Fresh Lead (FL)</th>
                                                            <td class="day_close_sale text-center days_to_close_sale unconverted_fresh_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs unconverted_fresh_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss unconverted_fresh_all" >0</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Old Lead Returning (OLR)</th>
                                                            <td class="day_close_sale text-center days_to_close_sale unconverted_old_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs unconverted_old_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss unconverted_old_all">0</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 16px; border-right: 2px solid whitesmoke;">Consultation</th>
                                                            <td class="day_close_sale text-center days_to_close_sale unconverted_consult_aayushi" style="font-size: 16px; border-right: 2px solid whitesmoke;">0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_bs unconverted_consult_vaishnavi" style="font-size: 16px; border-right: 2px solid whitesmoke;" >0</td>
                                                            <td class="day_close_sale_team text-center days_to_close_ss unconverted_consult_all" >0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-home66" role="tabpanel" aria-labelledby="nav-home-tab66">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Gender</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Gender
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Unconverted Units
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Male</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Female</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_female_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_female_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_female_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile18" role="tabpanel" aria-labelledby="nav-home-tab18">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Age Group</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Age Group
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            UnConverted Units
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">&lt; 25</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age25_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age25_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age25_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">25-35</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age35_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age35_ratio_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age35_ratio">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">35-45</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age45_ratio_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age45_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age45_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">45-55</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age55_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age55_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age55_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">55 &amp; Above</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age55_above_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age55_above_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_male_age55_above_ratio">0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile29" role="tabpanel" aria-labelledby="nav-profile29">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Locations</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Location
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Unconverted Units
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">NRI</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_nri_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_nri_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_nri_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">India</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_india_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_india_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_india_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade " id="nav-profile39" role="tabpanel" aria-labelledby="nav-profile39">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Stage</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Stage
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            Unconverted Units
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 1</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage1_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage1_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage1_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 2</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage2_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage2_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage2_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 3</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage3_ratio_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage3_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage3_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Stage 4</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage4_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage4_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage4_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">No Stage</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage0_ratio_yours">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage0_ratio_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_stage0_ratio">0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade " id="nav-profile95" role="tabpanel" aria-labelledby="nav-home-tab95">
                                            <h4 style="text-align:center;font-weight: 600; color:black;">Source</h4>
                                            <table class="table  table-striped">
                                                <thead style=" border-bottom:1px solid #918887 ! important;">
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="2" style="border: 1px solid #918887;">
                                                            Source
                                                        </th>
                                                        <th colspan="3" style=" border: 1px solid #918887;">
                                                            UNconverted Units
                                                        </th>
                                                    </tr>
                                                    <tr class="text-center" style="border: 1px solid #918887;">
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Aayushi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Vaishnavi
                                                        </th>
                                                        <th rowspan="" style=" border: 1px solid #918887;">
                                                            Over All
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody style="border: 1px solid #918887;">
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Prime Source</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_prime_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_prime_ratio_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_prime_ratio">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Social Media</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_social_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_social_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_social_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Health Score</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_hs_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_hs_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_hs_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Web</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_web_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_web_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_web_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Other</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_other_ratio_yours" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_other_ratio_others" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_other_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="">Paid Ads</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_paidads_ratio_ypurs" >0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_paidads_ratio_others">0</span>
                                                        </td>
                                                        <td style=" border: 1px solid #918887;">
                                                            <span class="unconverted_paidads_ratio" >0</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::Section-->
                </div>
            </div>
        </div>
        <!--end::Item-->
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
       
       var counsellor_name ="<?php $this->session->balance_session['first_name']; ?>"
       var url = '<?php echo base_url(); ?>performance/mis_sales_manager/heat_map_all';  
           $.ajax({
                url: url,
                type: "POST",
                data:{counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success: function(result)
                {  
                    console.log(result);
                    // relevent
                    $('.rel_all').text(Math.round(result.rel_all_sale/result.rel_all*100)+'%');
                    $('.unconverted_rel_all').text(result.rel_all-result.rel_all_sale);
                    $('.rel_all').attr('title','Units('+result.rel_all_sale+')/Lead('+result.rel_all+')');
                    $('.rel_aayushi').text(Math.round(result.rel_all_sale_aayushi/result.rel_aayushi*100)+'%');
                    $('.unconverted_rel_aayushi').text(result.rel_aayushi-result.rel_all_sale_aayushi);
                    $('.rel_aayushi').attr('title','Units('+result.rel_all_sale_aayushi+')/Lead('+result.rel_aayushi+')');
                    $('.rel_vaishnavi').text(Math.round(result.rel_all_sale_vaishnavi/result.rel_vaishnavi*100)+'%');
                    $('.unconverted_rel_vaishnavi').text(result.rel_vaishnavi-result.rel_all_sale_vaishnavi);
                    $('.rel_vaishnavi').attr('title','Units('+result.rel_all_sale_vaishnavi+')/Lead('+result.rel_vaishnavi+')');
                    // fresh
                    $('.fresh_all').text(Math.round(result.fresh_sale/result.fresh_all*100)+'%');
                    $('.unconverted_fresh_all').text(result.fresh_all-result.fresh_sale);
                    $('.fresh_all').attr('title','Units('+result.fresh_sale+')/Lead('+result.fresh_all+')');
                    $('.fresh_aayushi').text(Math.round(result.fresh_sale_aayushi/result.fresh_aayushi*100)+'%');
                    $('.unconverted_fresh_aayushi').text(result.fresh_aayushi - result.fresh_sale_aayushi);
                    $('.fresh_aayushi').attr('title','Units('+result.fresh_sale_aayushi+')/Lead('+result.fresh_aayushi+')');
                    $('.fresh_vaishnavi').text(Math.round(result.fresh_sale_vaishnavi/result.fresh_vaishnavi*100)+'%');
                    $('.unconverted_fresh_vaishnavi').text(result.fresh_vaishnavi - result.fresh_sale_vaishnavi);
                    $('.fresh_vaishnavi').attr('title','Units('+result.fresh_sale_vaishnavi+')/Lead('+result.fresh_vaishnavi+')');
                    // old lead
                    $('.old_all').text(Math.round(result.old_sale/result.old_all*100)+'%');
                    $('.unconverted_old_all').text(result.old_all- result.old_sale);
                    $('.old_all').attr('title','Units('+result.old_sale+')/Lead('+result.old_all+')');
                    $('.old_aayushi').text(Math.round(result.old_sale_aayushi/result.old_aayushi*100)+'%');
                     $('.unconverted_old_aayushi').text(result.old_aayushi - result.old_sale_aayushi);
                    $('.old_aayushi').attr('title','Units('+result.old_sale_aayushi+')/Lead('+result.old_aayushi+')');
                    $('.old_vaishnavi').text(Math.round(result.old_sale_vaishnavi/result.old_vaishnavi*100)+'%');
                    $('.unconverted_old_vaishnavi').text(result.old_vaishnavi - result.old_sale_vaishnavi);
                    $('.old_vaishnavi').attr('title','Units('+result.old_sale_vaishnavi+')/Lead('+result.old_vaishnavi+')');
                    // consultation
                    $('.consult_all').text(Math.round(result.consult_sale/result.consult_all*100)+'%');
                    $('.unconverted_consult_all').text(result.consult_all - result.consult_sale);
                    $('.consult_all').attr('title','Units('+result.consult_sale+')/Lead('+result.consult_all+')');
                    $('.consult_aayushi').text(Math.round(result.consult_sale_aayushi/result.consult_aayushi*100)+'%');
                    $('.unconverted_consult_aayushi').text(result.consult_aayushi - result.consult_sale_aayushi);
                    $('.consult_aayushi').attr('title','Units('+result.consult_sale_aayushi+')/Lead('+result.consult_aayushi+')');
                    $('.consult_vaishnavi').text(Math.round(result.consult_sale_vaishnavi/result.consult_vaishnavi*100)+'%');
                    $('.unconverted_consult_vaishnavi').text(result.consult_vaishnavi - result.consult_sale_vaishnavi);
                    $('.consult_vaishnavi').attr('title','Units('+result.consult_sale_vaishnavi+')/Lead('+result.consult_vaishnavi+')');
                    
                    // Days to close
                    
                    $('.days_to_close_all_aayushi').text(result.total_days_aayushi);
                    $('.days_to_close_all_vaishnavi').text(result.total_days_vaishnavi);
                    $('.days_to_close_all').text(result.total_days);
                    $('.days_to_close_basic_stack_aayushi').text(result.bs_days_aayushi);
                    $('.days_to_close_basic_stack_vaishnavi').text(result.bs_days_vaishnavi);
                    $('.days_to_close_basic_stack').text(result.bs_days);
                    $('.days_to_close_special_stack_aayushi').text(result.ss_days_aayushi);
                    $('.days_to_close_special_stack_vaishnavi').text(result.ss_days_vaishnavi);
                    $('.days_to_close_special_stack_all').text(result.ss_days);
                    
                    
                    //Gender(Both)
                    $('.male_ratio_yours').text(Math.round(result.male_sale_aayushi/result.male_aayushi*100)+'%');
                    $('.unconverted_male_ratio_yours').text(result.male_aayushi- result.male_sale_aayushi);
                    $('.male_ratio_yours').attr('title','Units('+result.male_sale_aayushi+')/Lead('+result.male_aayushi+')');
                    $('.male_ratio_others').text(Math.round(result.male_sale_vaishnavi/result.male_vaishnavi*100)+'%');
                    $('.unconverted_male_ratio_others').text(result.male_vaishnavi - result.male_sale_vaishnavi);
                    $('.male_ratio_others').attr('title','Units('+result.male_sale_vaishnavi+')/Lead('+result.male_vaishnavi+')');
                    $('.male_ratio').text(Math.round(result.male_over_all_sale/result.male_over_all*100)+'%');
                    $('.unconverted_male_ratio').text(result.male_over_all -result.male_over_all_sale);
                    $('.male_ratio').attr('title','Units('+result.male_over_all_sale+')/Lead('+result.male_over_all+')');
                    $('.male_days_yours').text(Math.round(result.male_days_aayushi/result.male_sale_aayushi));
                    $('.male_days_others').text(Math.round(result.male_days_vaishnavi/result.male_sale_vaishnavi));
                    // $('.male_days').text(Math.round(result.male_over_all_days/result.male_over_all_sale));
                    $('.male_days').text(result.male_over_all_days);
                    
                    $('.female_ratio_yours').text(Math.round(result.femal_sale_aayushi/result.femal_aayushi*100)+'%');
                    $('.unconverted_female_ratio_yours').text(result.femal_aayushi - result.femal_sale_aayushi);
                    $('.female_ratio_yours').attr('title','Units('+result.femal_sale_aayushi+')/Lead('+result.femal_aayushi+')');
                    $('.female_ratio_others').text(Math.round(result.femal_sale_vaishnavi/result.femal_vaishnavi*100)+'%');
                    $('.unconverted_female_ratio_others').text(result.femal_vaishnavi - result.femal_sale_vaishnavi);
                    $('.female_ratio_others').attr('title','Units('+result.femal_sale_vaishnavi+')/Lead('+result.femal_vaishnavi+')');
                    $('.female_ratio').text(Math.round(result.femal_over_all_sale/result.femal_over_all*100)+'%');
                    $('.unconverted_female_ratio').text(result.femal_over_all-result.femal_over_all_sale);
                    $('.female_ratio').attr('title','Units('+result.femal_over_all_sale+')/Lead('+result.femal_over_all+')');
                    $('.female_days_yours').text(Math.round(result.femal_days_aayushi/result.femal_sale_aayushi));
                    $('.female_days_others').text(Math.round(result.femal_days_vaishnavi/result.femal_sale_vaishnavi));
                    // $('.female_days').text(Math.round(result.femal_over_all_days/result.femal_over_all_sale));
                    $('.female_days').text(result.femal_over_all_days);
                    
                    
                    //Gender(Male) -> Age
                    $('.male_age25_ratio_yours').text(Math.round(result.age_sale_25_aayushi/result.age_25_aayushi*100)+'%');
                    $('.unconverted_male_age25_ratio_yours').text(result.age_25_aayushi- result.age_sale_25_aayushi);
                    $('.male_age25_ratio_yours').attr('title','Units('+result.age_sale_25_aayushi+')/Lead('+result.age_25_aayushi+')');
                    $('.male_age25_ratio_others').text(Math.round(result.age_sale_25_vaishnavi/result.age_25_vaishnavi*100)+'%');
                    $('.unconverted_male_age25_ratio_others').text(result.age_25_vaishnavi-result.age_sale_25_vaishnavi);
                    $('.male_age25_ratio_others').attr('title','Units('+result.age_sale_25_vaishnavi+')/Lead('+result.age_25_vaishnavi+')');
                    $('.male_age25_ratio').text(Math.round(result.age_sale_25/result.age_25*100)+'%');
                    $('.unconverted_male_age25_ratio').text(result.age_25- result.age_sale_25);
                    $('.male_age25_ratio').attr('title','Units('+result.age_sale_25+')/Lead('+result.age_25+')');
                    $('.male_age25_days_yours').text(Math.round(result.age_sale_25_days_aayushi/result.age_sale_25_aayushi));
                    $('.male_age25_days_others').text(Math.round(result.age_sale_25_days_vaishnavi/result.age_sale_25_vaishnavi));
                    // $('.male_age25_days').text(Math.round(result.age_sale_25_days/result.age_sale_25));
                    $('.male_age25_days').text(result.age_sale_25_days);
                    
                    $('.male_age35_ratio_yours').text(Math.round(result.age_sale_25_35_aayushi/result.age_25_35_aayushi*100)+'%');
                    $('.unconverted_male_age35_ratio_yours').text(result.age_25_35_aayushi-result.age_sale_25_35_aayushi);
                    $('.male_age35_ratio_yours').attr('title','Units('+result.age_sale_25_35_aayushi+')/Lead('+result.age_25_35_aayushi+')');
                    $('.male_age35_ratio_others').text(Math.round(result.age_sale_25_35_vaishnavi/result.age_25_35_vaishnavi*100)+'%');
                    $('.unconverted_male_age35_ratio_others').text(result.age_25_35_vaishnavi-result.age_sale_25_35_vaishnavi);
                    $('.male_age35_ratio_others').attr('title','Units('+result.age_sale_25_35_vaishnavi+')/Lead('+result.age_25_35_vaishnavi+')');
                    $('.male_age35_ratio').text(Math.round(result.age_sale_25_35/result.age_25_35*100)+'%');
                    $('.unconverted_male_age35_ratio').text(result.age_25_35-result.age_sale_25_35);
                    $('.male_age35_ratio').attr('title','Units('+result.age_sale_25_35+')/Lead('+result.age_25_35+')');
                    $('.male_age35_days_yours').text(Math.round(result.age_sale_25_35_days_aayushi/result.age_sale_25_35_aayushi));
                    $('.male_age35_days_others').text(Math.round(result.age_sale_25_35_days_vaishnavi/result.age_sale_25_35_vaishnavi));
                    // $('.male_age35_days').text(Math.round(result.age_sale_25_35_days/result.age_sale_25_35));
                    $('.male_age35_days').text(result.age_sale_25_35_days);
                    
                    $('.male_age45_ratio_yours').text(Math.round(result.age_sale_35_45_aayushi/result.age_35_45_aayushi*100)+'%');
                    $('.unconverted_male_age45_ratio_yours').text(result.age_35_45_aayushi-result.age_sale_35_45_aayushi);
                    $('.male_age45_ratio_yours').attr('title','Units('+result.age_sale_35_45_aayushi+')/Lead('+result.age_35_45_aayushi+')');
                    $('.male_age45_ratio_others').text(Math.round(result.age_sale_35_45_vaishnavi/result.age_35_45_vaishnavi*100)+'%');
                    $('.unconverted_male_age45_ratio_others').text(result.age_35_45_vaishnavi- result.age_sale_35_45_vaishnavi);
                    $('.male_age45_ratio_others').attr('title','Units('+result.age_sale_35_45_vaishnavi+')/Lead('+result.age_35_45_vaishnavi+')');
                    $('.male_age45_ratio').text(Math.round(result.age_sale_35_45/result.age_35_45*100)+'%');
                    $('.unconverted_male_age45_ratio').text(result.age_35_45 - result.age_sale_35_45);
                    $('.male_age45_ratio').attr('title','Units('+result.age_sale_35_45+')/Lead('+result.age_35_45+')');
                    $('.male_age45_days_yours').text(Math.round(result.age_sale_35_45_days_aayushi/result.age_sale_35_45_aayushi));
                    $('.male_age45_days_others').text(Math.round(result.age_sale_35_45_days_vaishnavi/result.age_sale_35_45_vaishnavi));
                    // $('.male_age45_days').text(Math.round(result.age_sale_35_45_days/result.age_sale_35_45));
                    $('.male_age45_days').text(result.age_sale_35_45_days);
                    
                    $('.male_age55_ratio_yours').text(Math.round(result.age_sale_45_55_aayushi/result.age_45_55_aayushi*100)+'%');
                    $('.unconverted_male_age55_ratio_yours').text(result.age_45_55_aayushi-result.age_sale_45_55_aayushi);
                    $('.male_age55_ratio_yours').attr('title','Units('+result.age_sale_45_55_aayushi+')/Lead('+result.age_45_55_aayushi+')');
                    $('.male_age55_ratio_others').text(Math.round(result.age_sale_45_55_vaishnavi/result.age_45_55_vaishnavi*100)+'%');
                    $('.unconverted_male_age55_ratio_others').text(result.age_45_55_vaishnavi - result.age_sale_45_55_vaishnavi);
                    $('.male_age55_ratio_others').attr('title','Units('+result.age_sale_45_55_vaishnavi+')/Lead('+result.age_45_55_vaishnavi+')');
                    $('.male_age55_ratio').text(Math.round(result.age_sale_45_55/result.age_45_55*100)+'%');
                    $('.unconverted_male_age55_ratio').text(result.age_45_55 - result.age_sale_45_55);
                    $('.male_age55_ratio').attr('title','Units('+result.age_sale_45_55+')/Lead('+result.age_45_55+')');
                    $('.male_age55_days_yours').text(Math.round(result.age_sale_45_55_days_aayushi/result.age_sale_45_55_aayushi));
                    $('.male_age55_days_others').text(Math.round(result.age_sale_45_55_days_vaishnavi/result.age_sale_45_55_vaishnavi));
                    // $('.male_age55_days').text(Math.round(result.age_sale_45_55_days/result.age_sale_45_55));
                    $('.male_age55_days').text(result.age_sale_45_55_days);
                    
                    $('.male_age55_above_ratio_yours').text(Math.round(result.age_sale_55_aayushi/result.age_55_aayushi*100)+'%');
                    $('.unconverted_male_age55_above_ratio_yours').text(result.age_55_aayushi - result.age_sale_55_aayushi);
                    $('.male_age55_above_ratio_yours').attr('title','Units('+result.age_sale_55_aayushi+')/Lead('+result.age_55_aayushi+')');
                    $('.male_age55_above_ratio_others').text(Math.round(result.age_sale_55_vaishnavi/result.age_55_vaishnavi*100)+'%');
                    $('.unconverted_male_age55_above_ratio_others').text(result.age_55_vaishnavi- result.age_sale_55_vaishnavi);
                    $('.male_age55_above_ratio_others').attr('title','Units('+result.age_sale_55_vaishnavi+')/Lead('+result.age_55_vaishnavi+')');
                    $('.male_age55_above_ratio').text(Math.round(result.age_sale_55/result.age_55*100)+'%');
                    $('.unconverted_male_age55_above_ratio').text(result.age_55- result.age_sale_55);
                    $('.male_age55_above_ratio').attr('title','Units('+result.age_sale_55+')/Lead('+result.age_55+')');
                    $('.male_age55_above_days_yours').text(Math.round(result.age_sale_55_days_aayushi/result.age_sale_55_aayushi));
                    $('.male_age55_above_days_others').text(Math.round(result.age_sale_55_days_vaishnavi/result.age_sale_55_vaishnavi));
                    // $('.male_age55_above_days').text(Math.round(result.age_sale_55_days/result.age_sale_55));
                    $('.male_age55_above_days').text(result.age_sale_55_days);
                    
                    //Location(Both)
                    $('.nri_ratio_yours').text(Math.round(result.nri_sale_aayushi/result.nri_aayushi*100)+'%');
                    $('.unconverted_nri_ratio_yours').text(result.nri_aayushi-result.nri_sale_aayushi);
                    $('.nri_ratio_yours').attr('title','Units('+result.nri_sale_aayushi+')/Lead('+result.nri_aayushi+')');
                    $('.nri_ratio_others').text(Math.round(result.nri_sale_vaishnavi/result.nri_vaishnavi*100)+'%');
                    $('.unconverted_nri_ratio_others').text(result.nri_vaishnavi-result.nri_sale_vaishnavi);
                    $('.nri_ratio_others').attr('title','Units('+result.nri_sale_vaishnavi+')/Lead('+result.nri_vaishnavi+')');
                    $('.nri_ratio').text(Math.round(result.nri_sale/result.nri_all_lead*100)+'%');
                    $('.unconverted_nri_ratio').text(result.nri_all_lead- result.nri_sale);
                    $('.nri_ratio').attr('title','Units('+result.nri_sale+')/Lead('+result.nri_all_lead+')');
                    $('.nri_days_yours').text(Math.round(result.nri_sale_days_aayushi/result.nri_sale_aayushi));
                    $('.nri_days_others').text(Math.round(result.nri_sale_days_vaishnavi/result.nri_sale_vaishnavi));
                    // $('.nri_days').text(Math.round(result.nri_sale_days/result.nri_sale));
                     $('.nri_days').text(result.nri_sale_days);
                    
                    $('.india_ratio_yours').text(Math.round(result.india_sale_aayushi/result.india_aayushi*100)+'%');
                    $('.unconverted_india_ratio_yours').text(result.india_aayushi-result.india_sale_aayushi);
                    $('.india_ratio_yours').attr('title','Units('+result.india_sale_aayushi+')/Lead('+result.india_aayushi+')');
                    $('.india_ratio_others').text(Math.round(result.india_sale_vaishnavi/result.india_vaishnavi*100)+'%');
                    $('.unconverted_india_ratio_others').text(result.india_vaishnavi-result.india_sale_vaishnavi);
                    $('.india_ratio_others').attr('title','Units('+result.india_sale_vaishnavi+')/Lead('+result.india_vaishnavi+')');
                    $('.india_ratio').text(Math.round(result.india_sale/result.india_all_lead*100)+'%');
                    $('.unconverted_india_ratio').text(result.india_all_lead-result.india_sale);
                    $('.india_ratio').attr('title','Units('+result.india_sale+')/Lead('+result.india_all_lead+')');
                    $('.india_days_yours').text(Math.round(result.india_sale_days_aayushi/result.india_sale_aayushi));
                    $('.india_days_others').text(Math.round(result.india_sale_days_vaishnavi/result.india_sale_vaishnavi));
                    // $('.india_days').text(Math.round(result.india_sale_days/result.india_sale));
                    $('.india_days').text(result.india_sale_days);
                    
                    //Stage(Both)
                    $('.stage1_ratio_yours').text(Math.round(result.satge_1_sale_aayushi/result.satge_1_aayushi*100)+'%');
                    $('.unconverted_stage1_ratio_yours').text(result.satge_1_aayushi-result.satge_1_sale_aayushi);
                    $('.stage1_ratio_yours').attr('title','Units('+result.satge_1_sale_aayushi+')/Lead('+result.satge_1_aayushi+')');
                    $('.stage1_ratio_others').text(Math.round(result.satge_1_sale_vaishnavi/result.satge_1_vaishnavi*100)+'%');
                    $('.unconverted_stage1_ratio_others').text(result.satge_1_vaishnavi-result.satge_1_sale_vaishnavi);
                    $('.stage1_ratio_others').attr('title','Units('+result.satge_1_sale_vaishnavi+')/Lead('+result.satge_1_vaishnavi+')');
                    $('.stage1_ratio').text(Math.round(result.satge_1_sale/result.satge_1_all*100)+'%');
                    $('.unconverted_stage1_ratio').text(result.satge_1_all- result.satge_1_sale);
                    $('.stage1_ratio').attr('title','Units('+result.satge_1_sale+')/Lead('+result.satge_1_all+')');
                    $('.stage1_days_yours').text(Math.round(result.satge_1_sale_days_aayushi/result.satge_1_sale_aayushi));
                    $('.stage1_days_others').text(Math.round(result.satge_1_sale_days_vaishnavi/result.satge_1_sale_vaishnavi));
                    // $('.stage1_days').text(Math.round(result.satge_1_days/result.satge_1_sale));
                    $('.stage1_days').text(result.satge_1_days);
                    
                    $('.stage2_ratio_yours').text(Math.round(result.satge_2_sale_aayushi/result.satge_2_aayushi*100)+'%');
                    $('.unconverted_stage2_ratio_yours').text(result.satge_2_aayushi-result.satge_2_sale_aayushi);
                    $('.stage2_ratio_yours').attr('title','Units('+result.satge_2_sale_aayushi+')/Lead('+result.satge_2_aayushi+')');
                    $('.stage2_ratio_others').text(Math.round(result.satge_2_sale_vaishnavi/result.satge_2_vaishnavi*100)+'%');
                    $('.unconverted_stage2_ratio_others').text(result.satge_2_vaishnavi-result.satge_2_sale_vaishnavi);
                    $('.stage2_ratio_others').attr('title','Units('+result.satge_2_sale_vaishnavi+')/Lead('+result.satge_2_vaishnavi+')');
                    $('.stage2_ratio').text(Math.round(result.satge_2_sale/result.satge_2_all*100)+'%');
                    $('.unconverted_stage2_ratio').text(result.satge_2_all-result.satge_2_sale);
                    $('.stage2_ratio').attr('title','Units('+result.satge_2_sale+')/Lead('+result.satge_2_all+')');
                    $('.stage2_days_yours').text(Math.round(result.satge_2_sale_days_aayushi/result.satge_2_sale_aayushi));
                    $('.stage2_days_others').text(Math.round(result.satge_2_sale_days_vaishnavi/result.satge_2_sale_vaishnavi));
                    // $('.stage2_days').text(Math.round(result.satge_2_days/result.satge_2_sale));
                    $('.stage2_days').text(result.satge_2_days);
                    
                    $('.stage3_ratio_yours').text(Math.round(result.satge_3_sale_aayushi/result.satge_3_aayushi*100)+'%');
                    $('.unconverted_stage3_ratio_yours').text(result.satge_3_aayushi-result.satge_3_sale_aayushi);
                    $('.stage3_ratio_yours').attr('title','Units('+result.satge_3_sale_aayushi+')/Lead('+result.satge_3_aayushi+')');
                    $('.stage3_ratio_others').text(Math.round(result.satge_3_sale_vaishnavi/result.satge_3_vaishnavi*100)+'%');
                    $('.unconverted_stage3_ratio_others').text(result.satge_3_vaishnavi-result.satge_3_sale_vaishnavi);
                    $('.stage3_ratio_others').attr('title','Units('+result.satge_3_sale_vaishnavi+')/Lead('+result.satge_3_vaishnavi+')');
                    $('.stage3_ratio').text(Math.round(result.satge_3_sale/result.satge_3_all*100)+'%');
                    $('.unconverted_stage3_ratio').text(result.satge_3_all-result.satge_3_sale);
                    $('.stage3_ratio').attr('title','Units('+result.satge_3_sale+')/Lead('+result.satge_3_all+')');
                    $('.stage3_days_yours').text(Math.round(result.satge_3_sale_days_aayushi/result.satge_3_sale_aayushi));
                    $('.stage3_days_others').text(Math.round(result.satge_3_sale_days_vaishnavi/result.satge_3_sale_vaishnavi));
                    // $('.stage3_days').text(Math.round(result.satge_3_days/result.satge_3_sale));
                    $('.stage3_days').text(result.satge_3_days);
                    
                    $('.stage4_ratio_yours').text(Math.round(result.satge_4_sale_aayushi/result.satge_4_aayushi*100)+'%');
                    $('.unconverted_stage4_ratio_yours').text(result.satge_4_aayushi-result.satge_4_sale_aayushi);
                    $('.stage4_ratio_yours').attr('title','Units('+result.satge_4_sale_aayushi+')/Lead('+result.satge_4_aayushi+')');
                    $('.stage4_ratio_others').text(Math.round(result.satge_4_sale_vaishnavi/result.satge_4_vaishnavi*100)+'%');
                    $('.unconverted_stage4_ratio_others').text(result.satge_4_vaishnavi- result.satge_4_sale_vaishnavi);
                    $('.stage4_ratio_others').attr('title','Units('+result.satge_4_sale_vaishnavi+')/Lead('+result.satge_4_vaishnavi+')');
                    $('.stage4_ratio').text(Math.round(result.satge_4_sale/result.satge_4_all*100)+'%');
                    $('.unconverted_stage4_ratio').text(result.satge_4_all-result.satge_4_sale);
                    $('.stage4_ratio').attr('title','Units('+result.satge_4_sale+')/Lead('+result.satge_4_all+')');
                    $('.stage4_days_yours').text(Math.round(result.satge_4_sale_days_aayushi/result.satge_4_sale_aayushi));
                    $('.stage4_days_others').text(Math.round(result.satge_4_sale_days_vaishnavi/result.satge_4_sale_vaishnavi));
                    // $('.stage4_days').text(Math.round(result.satge_4_days/result.satge_4_sale));
                    $('.stage4_days').text(result.satge_4_days);
                    
                    $('.stage0_ratio_yours1').text(Math.round(result.satge_0_sale_aayushi/result.satge_0_aayushi*100)+'%');
                    $('.unconverted_stage0_ratio_yours').text(result.satge_0_aayushi-result.satge_0_sale_aayushi);
                    $('.stage0_ratio_yours1').attr('title','Units('+result.satge_0_sale_aayushi+')/Lead('+result.satge_0_aayushi+')');
                    $('.stage0_ratio_others1').text(Math.round(result.satge_0_sale_vaishnavi/result.satge_0_vaishnavi*100)+'%');
                    $('.unconverted_stage0_ratio_others').text(result.satge_0_vaishnavi-result.satge_0_sale_vaishnavi);
                    $('.stage0_ratio_others1').attr('title','Units('+result.satge_0_sale_vaishnavi+')/Lead('+result.satge_0_vaishnavi+')');
                    $('.stage0_ratio').text(Math.round(result.satge_0_sale/result.satge_0_all*100)+'%');
                    $('.unconverted_stage0_ratio').text(result.satge_0_all-result.satge_0_sale);
                    $('.stage0_ratio').attr('title','Units('+result.satge_0_sale+')/Lead('+result.satge_0_all+')');
                    $('.stage0_days_yours').text(Math.round(result.satge_0_sale_days_aayushi/result.satge_0_sale_aayushi));
                    $('.stage0_days_others').text(Math.round(result.satge_0_sale_days_vaishnavi/result.satge_0_sale_vaishnavi));
                    // $('.stage0_days').text(Math.round(result.satge_0_days/result.satge_0_sale));
                    $('.stage0_days').text(result.satge_0_days);
                    
                    //Source
                    $('.prime_ratio_yours').text(Math.round(result.prime_sale_aayushi/result.prime_aayushi*100)+'%');
                    $('.unconverted_prime_ratio_yours').text(result.prime_aayushi-result.prime_sale_aayushi);
                    $('.prime_ratio_yours').attr('title','Units('+result.prime_sale_aayushi+')/Lead('+result.prime_aayushi+')');
                    $('.prime_ratio_others').text(Math.round(result.prime_sale_vaishnavi/result.prime_vaishnavi*100)+'%');
                    $('.unconverted_prime_ratio_others').text(result.prime_vaishnavi-result.prime_sale_vaishnavi);
                    $('.prime_ratio_others').attr('title','Units('+result.prime_sale_vaishnavi+')/Lead('+result.prime_vaishnavi+')');
                    $('.prime_ratio').text(Math.round(result.prime_sale/result.prime_all*100)+'%');
                    $('.unconverted_prime_ratio').text(result.prime_all -result.prime_sale);
                    $('.prime_ratio').attr('title','Units('+result.prime_sale+')/Lead('+result.prime_all+')');
                    $('.prime_days_yours').text(Math.round(result.prime_sale_days_aayushi/result.prime_sale_aayushi));
                    $('.prime_days_others').text(Math.round(result.prime_sale_days_vaishnavi/result.prime_sale_vaishnavi));
                    // $('.prime_days').text(Math.round(result.prime_days/result.prime_sale));
                    $('.prime_days').text(result.prime_days);
                    
                    $('.social_ratio_yours').text(Math.round(result.social_sale_aayushi/result.social_aayushi*100)+'%');
                    $('.unconverted_social_ratio_yours').text(result.social_aayushi-result.social_sale_aayushi);
                    $('.social_ratio_yours').attr('title','Units('+result.social_sale_aayushi+')/Lead('+result.social_aayushi+')');
                    $('.social_ratio_others').text(Math.round(result.social_sale_vaishnavi/result.social_vaishnavi*100)+'%');
                    $('.unconverted_social_ratio_others').text(result.social_vaishnavi - result.social_sale_vaishnavi);
                    $('.social_ratio_others').attr('title','Units('+result.social_sale_vaishnavi+')/Lead('+result.social_vaishnavi+')');
                    $('.social_ratio').text(Math.round(result.social_sale/result.social_all*100)+'%');
                    $('.unconverted_social_ratio').text(result.social_all-result.social_sale);
                    $('.social_ratio').attr('title','Units('+result.social_sale+')/Lead('+result.social_all+')');
                    $('.social_days_yours').text(Math.round(result.social_sale_days_aayushi/result.social_sale_aayushi));
                    $('.social_days_others').text(Math.round(result.social_sale_days_vaishnavi/result.social_sale_vaishnavi));
                    // $('.social_days').text(Math.round(result.social_days/result.social_sale));
                     $('.social_days').text(result.social_days);
                    
                    $('.hs_ratio_yours').text(Math.round(result.hs_sale_aayushi/result.hs_aayushi*100)+'%');
                    $('.unconverted_hs_ratio_yours').text(result.hs_aayushi-result.hs_sale_aayushi);
                    $('.hs_ratio_yours').attr('title','Units('+result.hs_sale_aayushi+')/Lead('+result.hs_aayushi+')');
                    $('.hs_ratio_others').text(Math.round(result.hs_sale_vaishnavi/result.hs_vaishnavi*100)+'%');
                    $('.unconverted_hs_ratio_others').text(result.hs_vaishnavi-result.hs_sale_vaishnavi);
                    $('.hs_ratio_others').attr('title','Units('+result.hs_sale_vaishnavi+')/Lead('+result.hs_vaishnavi+')');
                    $('.hs_ratio').text(Math.round(result.hs_sale/result.hs_all*100)+'%');
                    $('.unconverted_hs_ratio').text(result.hs_all - result.hs_sale);
                    $('.hs_ratio').attr('title','Units('+result.hs_sale+')/Lead('+result.hs_all+')');
                    $('.hs_days_yours').text(Math.round(result.hs_sale_days_aayushi/result.hs_sale_aayushi));
                    $('.hs_days_others').text(Math.round(result.hs_sale_days_vaishnavi/result.hs_sale_vaishnavi));
                    // $('.hs_days').text(Math.round(result.hs_days/result.hs_sale));
                     $('.hs_days').text(result.hs_days);
                    
                    $('.web_ratio_yours').text(Math.round(result.web_sale_aayushi/result.web_aayushi*100)+'%');
                    $('.unconverted_web_ratio_yours').text(result.web_aayushi -result.web_sale_aayushi);
                    $('.web_ratio_yours').attr('title','Units('+result.web_sale_aayushi+')/Lead('+result.web_aayushi+')');
                    $('.web_ratio_others').text(Math.round(result.web_sale_vaishnavi/result.web_vaishnavi*100)+'%');
                    $('.unconverted_web_ratio_others').text(result.web_vaishnavi- result.web_sale_vaishnavi);
                    $('.web_ratio_others').attr('title','Units('+result.web_sale_vaishnavi+')/Lead('+result.web_vaishnavi+')');
                    $('.web_ratio').text(Math.round(result.web_sale/result.web_all*100)+'%');
                    $('.unconverted_web_ratio').text(result.web_all-result.web_sale);
                    $('.web_ratio').attr('title','Units('+result.web_sale+')/Lead('+result.web_all+')');
                    $('.web_days_yours').text(Math.round(result.web_sale_days_aayushi/result.web_sale_aayushi));
                    $('.web_days_others').text(Math.round(result.web_sale_days_vaishnavi/result.web_sale_vaishnavi));
                    // $('.web_days').text(Math.round(result.web_days/result.web_sale));
                    $('.web_days').text(result.web_days);
                    
                    $('.other_ratio_yours').text(Math.round(result.others_sale_aayushi/result.others_aayushi*100)+'%');
                    $('.unconverted_other_ratio_yours').text(result.others_aayushi - result.others_sale_aayushi);
                    $('.other_ratio_yours').attr('title','Units('+result.others_sale_aayushi+')/Lead('+result.others_aayushi+')');
                    $('.other_ratio_others').text(Math.round(result.others_sale_vaishnavi/result.others_vaishnavi*100)+'%');
                    $('.unconverted_other_ratio_others').text(result.others_vaishnavi - result.others_sale_vaishnavi);
                    $('.other_ratio_others').attr('title','Units('+result.others_sale_vaishnavi+')/Lead('+result.others_vaishnavi+')');
                    $('.other_ratio').text(Math.round(result.others_sale/result.others_all*100)+'%');
                    $('.unconverted_other_ratio').text(result.others_all-result.others_sale);
                    $('.other_ratio').attr('title','Units('+result.others_sale+')/Lead('+result.others_all+')');
                    $('.other_days_yours').text(Math.round(result.others_sale_days_aayushi/result.others_sale_aayushi));
                    $('.other_days_others').text(Math.round(result.others_sale_days_vaishnavi/result.others_sale_vaishnavi));
                    // $('.other_days').text(Math.round(result.others_days/result.others_sale));
                    $('.other_days').text(result.others_days);
                    
                    $('.paidads_ratio_yours').text(Math.round(result.paidads.sale_aayushi/result.paidads.leads_aayushi*100)+'%');
                    $('.unconverted_paidads_ratio_yours').text(result.paidads.leads_aayushi- result.paidads.sale_aayushi);
                    $('.paidads_ratio_yours').attr('title','Units('+result.paidads.sale_aayushi+')/Lead('+result.paidads.leads_aayushi+')');
                    $('.paidads_ratio_others').text(Math.round(result.paidads.sale_vaishnavi/result.paidads.leads_vaishnavi*100)+'%');
                    $('.unconverted_paidads_ratio_others').text(result.paidads.leads_vaishnavi-result.paidads.sale_vaishnavi);
                    $('.paidads_ratio_others').attr('title','Units('+result.paidads.sale_vaishnavi+')/Lead('+result.paidads.leads_vaishnavi+')');
                    $('.paidads_ratio').text(Math.round(result.paidads.leads/result.paidads.sale*100)+'%');
                    $('.unconverted_paidads_ratio').text(result.paidads.sale -result.paidads.leads);
                    $('.paidads_ratio').attr('title','Units('+result.paidads.sale+')/Lead('+result.paidads.leads+')');
                    $('.paidads_days_yours').text(Math.round(result.paidads.days_aayushi));
                    $('.paidads_days_others').text(Math.round(result.paidads.days_vaishnavi));
                    // $('.paidads_days').text(Math.round(result.paidads.days));
                    $('.paidads_days').text(result.paidads.days);
                
                
                    
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
       
       
       
    //   var result = '{"gender":{"male":{"lead_male":39,"male_sale":377,"male_days":35,"lead_age25":23,"lead_age35":5,"lead_age45":5,"lead_age55":4,"lead_age55_above":2,"sale_age25":52,"sale_age35":74,"sale_age45":132,"sale_age55":97,"sale_age55_above":22,"days_age25":43,"days_age35":48,"days_age45":31,"days_age55":34,"days_age55_above":0,"nri_lead":39,"india_lead":0,"nri_sale":179,"india_sale":198,"nri_days":19,"india_days":49,"stage1_lead":2,"stage2_lead":1,"stage3_lead":3,"stage4_lead":11,"stage1_sale":5,"stage2_sale":4,"stage3_sale":7,"stage4_sale":35,"stage1_days":190,"stage2_days":23,"stage3_days":156,"stage4_days":2672},"female":{"lead_female":113,"female_sale":1166,"female_days":83,"lead_age25":58,"lead_age35":18,"lead_age45":31,"lead_age55":5,"lead_age55_above":1,"sale_age25":125,"sale_age35":287,"sale_age45":432,"sale_age55":250,"sale_age55_above":72,"days_age25":21,"days_age35":67,"days_age45":107,"days_age55":94,"days_age55_above":62,"nri_lead":112,"india_lead":1,"nri_sale":461,"india_sale":705,"nri_days":51,"india_days":103,"stage1_lead":5,"stage2_lead":6,"stage3_lead":20,"stage4_lead":33,"stage1_sale":28,"stage2_sale":17,"stage3_sale":75,"stage4_sale":169,"stage1_days":5051,"stage2_days":2917,"stage3_days":12318,"stage4_days":16630}},"location":{"nri":{"leads":178,"sale":640,"days":70},"india":{"leads":4,"sale":396,"days":152}},"stage1":{"leads":9,"sale":33,"days":159},"stage2":{"leads":8,"sale":21,"days":140},"stage3":{"leads":23,"sale":82,"days":152},"stage4":{"leads":45,"sale":204,"days":95},"stage0":{"leads":97,"sale":1203,"days":58},"heart":{"leads":0,"sale":0,"days":0},"pcos":{"leads":0,"sale":1543,"days":71},"bp":{"leads":1,"sale":0,"days":0},"thyroid":{"leads":1,"sale":2,"days":0},"diabetes":{"leads":2,"sale":151,"days":46},"other":{"leads":60,"sale":1543,"days":71},"prime":{"leads":20,"sale":0,"days":0},"social":{"leads":29,"sale":0,"days":0},"hs":{"leads":66,"sale":0,"days":0},"web":{"leads":7,"sale":0,"days":0},"paidads":{"leads":0,"sale":0,"days":0}}';
        // var result ='{"gender":{"male":{"lead_male_aayushi":19,"lead_male_vaishnavi":10,"lead_male":43,"male_sale_aayushi":17,"male_sale_vaishnavi":9,"male_sale":346,"male_days_aayushi":2,"male_days_vaishnavi":-27,"male_days":26,"lead_age25_aayushi":8,"lead_age25_vaishnavi":4,"lead_age25":24,"lead_age35_aayushi":4,"lead_age35_vaishnavi":0,"lead_age35":5,"lead_age45_aayushi":3,"lead_age45_vaishnavi":3,"lead_age45":6,"lead_age55_aayushi":4,"lead_age55_vaishnavi":3,"lead_age55":6,"lead_age55_above_aayushi":0,"lead_age55_above_vaishnavi":0,"lead_age55_above":2,"sale_age25_aayushi":3,"sale_age25_vaishnavi":1,"sale_age25":47,"sale_age35_aayushi":1,"sale_age35_vaishnavi":1,"sale_age35":66,"sale_age45_aayushi":7,"sale_age45_vaishnavi":2,"sale_age45":118,"sale_age55_aayushi":5,"sale_age55_vaishnavi":4,"sale_age55":93,"sale_age55_above_aayushi":1,"sale_age55_above_vaishnavi":1,"sale_age55_above":22,"days_age25_aayushi":0,"days_age25_vaishnavi":3,"days_age25":46,"days_age35_aayushi":1,"days_age35_vaishnavi":68,"days_age35":29,"days_age45_aayushi":2,"days_age45_vaishnavi":0,"days_age45":34,"days_age55_aayushi":3,"days_age55_vaishnavi":-79,"days_age55":11,"days_age55_above_aayushi":0,"days_age55_above_vaishnavi":0,"days_age55_above":0,"nri_lead_aayushi":74,"nri_lead_vaishnavi":52,"nri_lead":43,"india_lead_aayushi":null,"india_lead_vaishnavi":null,"india_lead":0,"nri_sale_aayushi":8,"nri_sale_vaishnavi":5,"nri_sale":169,"india_sale_aayushi":9,"india_sale_vaishnavi":4,"india_sale":177,"nri_days_aayushi":2,"nri_days_vaishnavi":-66,"nri_days":8,"india_days_aayushi":1,"india_days_vaishnavi":22,"india_days":44,"stage1_lead_aayushi":1,"stage1_lead_vaishnavi":1,"stage1_lead":2,"stage2_lead_aayushi":1,"stage2_lead_vaishnavi":0,"stage2_lead":1,"stage3_lead_aayushi":1,"stage3_lead_vaishnavi":1,"stage3_lead":3,"stage4_lead_aayushi":7,"stage4_lead_vaishnavi":5,"stage4_lead":13,"stage1_sale_aayushi":0,"stage1_sale_vaishnavi":0,"stage1_sale":4,"stage2_sale_aayushi":0,"stage2_sale_vaishnavi":0,"stage2_sale":4,"stage3_sale_aayushi":0,"stage3_sale_vaishnavi":0,"stage3_sale":7,"stage4_sale_aayushi":4,"stage4_sale_vaishnavi":3,"stage4_sale":28,"stage1_days_aayushi":0,"stage1_days_vaishnavi":0,"stage1_days":190,"stage2_days_aayushi":0,"stage2_days_vaishnavi":0,"stage2_days":23,"stage3_days_aayushi":0,"stage3_days_vaishnavi":0,"stage3_days":156,"stage4_days_aayushi":13,"stage4_days_vaishnavi":79,"stage4_days":815},"female":{"lead_female_aayushi":36,"lead_female_vaishnavi":61,"lead_female":153,"female_sale_aayushi":80,"female_sale_vaishnavi":40,"female_sale":1047,"female_days_aayushi":78,"female_days_vaishnavi":57,"female_days":63,"lead_age25_aayushi":18,"lead_age25_vaishnavi":35,"lead_age25":83,"lead_age35_aayushi":6,"lead_age35_vaishnavi":5,"lead_age35":22,"lead_age45_aayushi":10,"lead_age45_vaishnavi":17,"lead_age45":42,"lead_age55_aayushi":2,"lead_age55_vaishnavi":4,"lead_age55":5,"lead_age55_above_aayushi":0,"lead_age55_above_vaishnavi":0,"lead_age55_above":1,"sale_age25_aayushi":9,"sale_age25_vaishnavi":7,"sale_age25":111,"sale_age35_aayushi":27,"sale_age35_vaishnavi":10,"sale_age35":253,"sale_age45_aayushi":30,"sale_age45_vaishnavi":12,"sale_age45":386,"sale_age55_aayushi":11,"sale_age55_vaishnavi":10,"sale_age55":228,"sale_age55_above_aayushi":3,"sale_age55_above_vaishnavi":1,"sale_age55_above":69,"days_age25_aayushi":1,"days_age25_vaishnavi":2,"days_age25":23,"days_age35_aayushi":222,"days_age35_vaishnavi":46,"days_age35":39,"days_age45_aayushi":0,"days_age45_vaishnavi":102,"days_age45":89,"days_age55_aayushi":22,"days_age55_vaishnavi":13,"days_age55":71,"days_age55_above_aayushi":4,"days_age55_above_vaishnavi":465,"days_age55_above":40,"nri_lead_aayushi":152,"nri_lead_vaishnavi":61,"nri_lead":152,"india_lead_aayushi":1,"india_lead_vaishnavi":0,"india_lead":1,"nri_sale_aayushi":29,"nri_sale_vaishnavi":16,"nri_sale":442,"india_sale_aayushi":51,"india_sale_vaishnavi":24,"india_sale":605,"nri_days_aayushi":111,"nri_days_vaishnavi":61,"nri_days":47,"india_days_aayushi":59,"india_days_vaishnavi":55,"india_days":74,"stage1_lead_aayushi":4,"stage1_lead_vaishnavi":3,"stage1_lead":10,"stage2_lead_aayushi":0,"stage2_lead_vaishnavi":1,"stage2_lead":8,"stage3_lead_aayushi":4,"stage3_lead_vaishnavi":5,"stage3_lead":21,"stage4_lead_aayushi":13,"stage4_lead_vaishnavi":24,"stage4_lead":47,"stage1_sale_aayushi":10,"stage1_sale_vaishnavi":7,"stage1_sale":24,"stage2_sale_aayushi":2,"stage2_sale_vaishnavi":0,"stage2_sale":12,"stage3_sale_aayushi":8,"stage3_sale_vaishnavi":4,"stage3_sale":56,"stage4_sale_aayushi":25,"stage4_sale_vaishnavi":4,"stage4_sale":145,"stage1_days_aayushi":2939,"stage1_days_vaishnavi":1846,"stage1_days":4924,"stage2_days_aayushi":6,"stage2_days_vaishnavi":0,"stage2_days":1546,"stage3_days_aayushi":32,"stage3_days_vaishnavi":222,"stage3_days":7591,"stage4_days_aayushi":305,"stage4_days_vaishnavi":1,"stage4_days":13552}},"location":{"nri":{"leads_aayushi":62,"leads_vaishnavi":76,"leads":234,"sale_aayushi":37,"sale_vaishnavi":21,"sale":611,"days_aayushi":113,"days_vaishnavi":-5,"days":55},"india":{"leads_aayushi":3,"leads_vaishnavi":0,"leads":4,"sale_aayushi":18,"sale_vaishnavi":8,"sale":354,"days_aayushi":60,"days_vaishnavi":77,"days":118}},"stage1":{"leads_aayushi":5,"leads_vaishnavi":4,"leads":14,"sale_aayushi":10,"sale_vaishnavi":7,"sale":28,"days_aayushi":294,"days_vaishnavi":264,"days":183},"stage2":{"leads_aayushi":2,"leads_vaishnavi":1,"leads":10,"sale_aayushi":2,"sale_vaishnavi":2,"sale":16,"days_aayushi":3,"days_vaishnavi":0,"days":98},"stage3":{"leads_aayushi":5,"leads_vaishnavi":6,"leads":24,"sale_aayushi":8,"sale_vaishnavi":4,"sale":63,"days_aayushi":4,"days_vaishnavi":56,"days":123},"stage4":{"leads_aayushi":22,"leads_vaishnavi":29,"leads":62,"sale_aayushi":29,"sale_vaishnavi":7,"sale":173,"days_aayushi":11,"days_vaishnavi":11,"days":83},"stage0":{"leads_aayushi":31,"leads_vaishnavi":36,"leads":128,"sale_aayushi":48,"sale_vaishnavi":31,"sale":1113,"days_aayushi":62,"days_vaishnavi":-3,"days":41},"heart":{"leads_aayushi":0,"leads_vaishnavi":0,"leads":0,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"pcos":{"leads_aayushi":0,"leads_vaishnavi":0,"leads":0,"sale_aayushi":97,"sale_vaishnavi":49,"sale":1393,"days_aayushi":65,"days_vaishnavi":42,"days":54},"bp":{"leads_aayushi":1,"leads_vaishnavi":0,"leads":1,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"thyroid":{"leads_aayushi":0,"leads_vaishnavi":1,"leads":1,"sale_aayushi":0,"sale_vaishnavi":0,"sale":3,"days_aayushi":0,"days_vaishnavi":0,"days":0},"diabetes":{"leads_aayushi":1,"leads":2,"sale_aayushi":11,"sale":144,"days_aayushi":21,"days_vaishnavi":4,"days":33},"other":{"leads_aayushi":14,"leads_vaishnavi":7,"leads":77,"sale_aayushi":97,"sale_vaishnavi":49,"sale":1393,"days_aayushi":65,"days_vaishnavi":42,"days":54},"prime":{"leads_aayushi":19,"leads_vaishnavi":8,"leads":29,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"social":{"leads_aayushi":9,"leads_vaishnavi":38,"leads":49,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"hs":{"leads_aayushi":18,"leads_vaishnavi":22,"leads":75,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"web":{"leads_aayushi":5,"leads_vaishnavi":1,"leads":8,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"paidads":{"leads_aayushi":0,"leads_vaishnavi":0,"leads":0,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0}}';
    //  static aayushi vaishnavi
        var result ='{"gender":{"male":{"lead_male_aayushi":80,"lead_male_vaishnavi":58,"lead_male":43,"male_sale_aayushi":19,"male_sale_vaishnavi":10,"male_sale":346,"male_days_aayushi":2,"male_days_vaishnavi":14,"male_days":26,"lead_age25_aayushi":39,"lead_age25_vaishnavi":31,"lead_age25":24,"lead_age35_aayushi":134,"lead_age35_vaishnavi":73,"lead_age35":5,"lead_age45_aayushi":111,"lead_age45_vaishnavi":87,"lead_age45":6,"lead_age55_aayushi":30,"lead_age55_vaishnavi":30,"lead_age55":6,"lead_age55_above_aayushi":4,"lead_age55_above_vaishnavi":5,"lead_age55_above":2,"sale_age25_aayushi":14,"sale_age25_vaishnavi":9,"sale_age25":47,"sale_age35_aayushi":37,"sale_age35_vaishnavi":17,"sale_age35":66,"sale_age45_aayushi":42,"sale_age45_vaishnavi":16,"sale_age45":118,"sale_age55_aayushi":18,"sale_age55_vaishnavi":16,"sale_age55":93,"sale_age55_above_aayushi":4,"sale_age55_above_vaishnavi":5,"sale_age55_above":22,"days_age25_aayushi":1,"days_age25_vaishnavi":3,"days_age25":46,"days_age35_aayushi":13,"days_age35_vaishnavi":9,"days_age35":29,"days_age45_aayushi":17,"days_age45_vaishnavi":7,"days_age45":34,"days_age55_aayushi":15,"days_age55_vaishnavi":12,"days_age55":11,"days_age55_above_aayushi":3,"days_age55_above_vaishnavi":12,"days_age55_above":0,"nri_lead_aayushi":94,"nri_lead_vaishnavi":87,"nri_lead":43,"india_lead_aayushi":246,"india_lead_vaishnavi":182,"india_lead":0,"nri_sale_aayushi":38,"nri_sale_vaishnavi":20,"nri_sale":169,"india_sale_aayushi":72,"india_sale_vaishnavi":35,"india_sale":177,"nri_days_aayushi":1.5,"nri_days_vaishnavi":1.3,"nri_days":8,"india_days_aayushi":7,"india_days_vaishnavi":15,"india_days":44,"stage1_lead_aayushi":48,"stage1_lead_vaishnavi":32,"stage1_lead":2,"stage2_lead_aayushi":13,"stage2_lead_vaishnavi":16,"stage2_lead":1,"stage3_lead_aayushi":87,"stage3_lead_vaishnavi":48,"stage3_lead":3,"stage4_lead_aayushi":107,"stage4_lead_vaishnavi":152,"stage4_lead":13,"stage1_sale_aayushi":15,"stage1_sale_vaishnavi":9,"stage1_sale":4,"stage2_sale_aayushi":4,"stage2_sale_vaishnavi":1,"stage2_sale":4,"stage3_sale_aayushi":12,"stage3_sale_vaishnavi":3,"stage3_sale":7,"stage4_sale_aayushi":35,"stage4_sale_vaishnavi":10,"stage4_sale":28,"stage1_days_aayushi":6,"stage1_days_vaishnavi":33,"stage1_days":190,"stage2_days_aayushi":1.5,"stage2_days_vaishnavi":0,"stage2_days":23,"stage3_days_aayushi":3,"stage3_days_vaishnavi":22,"stage3_days":156,"stage4_days_aayushi":9,"stage4_days_vaishnavi":14,"stage4_days":815},"female":{"lead_female_aayushi":332,"lead_female_vaishnavi":256,"lead_female":153,"female_sale_aayushi":93,"female_sale_vaishnavi":49,"female_sale":1047,"female_days_aayushi":84,"female_days_vaishnavi":14,"female_days":63,"lead_age25_aayushi":39,"lead_age25_vaishnavi":31,"lead_age25":83,"lead_age35_aayushi":134,"lead_age35_vaishnavi":73,"lead_age35":22,"lead_age45_aayushi":111,"lead_age45_vaishnavi":87,"lead_age45":42,"lead_age55_aayushi":30,"lead_age55_vaishnavi":30,"lead_age55":5,"lead_age55_above_aayushi":4,"lead_age55_above_vaishnavi":5,"lead_age55_above":1,"sale_age25_aayushi":14,"sale_age25_vaishnavi":9,"sale_age25":111,"sale_age35_aayushi":37,"sale_age35_vaishnavi":17,"sale_age35":253,"sale_age45_aayushi":42,"sale_age45_vaishnavi":16,"sale_age45":386,"sale_age55_aayushi":18,"sale_age55_vaishnavi":16,"sale_age55":228,"sale_age55_above_aayushi":4,"sale_age55_above_vaishnavi":5,"sale_age55_above":69,"days_age25_aayushi":1,"days_age25_vaishnavi":3,"days_age25":23,"days_age35_aayushi":13,"days_age35_vaishnavi":9,"days_age35":39,"days_age45_aayushi":17,"days_age45_vaishnavi":7,"days_age45":89,"days_age55_aayushi":15,"days_age55_vaishnavi":12,"days_age55":71,"days_age55_above_aayushi":3,"days_age55_above_vaishnavi":12,"days_age55_above":40,"nri_lead_aayushi":94,"nri_lead_vaishnavi":87,"nri_lead":152,"india_lead_aayushi":246,"india_lead_vaishnavi":182,"india_lead":1,"nri_sale_aayushi":38,"nri_sale_vaishnavi":20,"nri_sale":442,"india_sale_aayushi":72,"india_sale_vaishnavi":35,"india_sale":605,"nri_days_aayushi":1.5,"nri_days_vaishnavi":1.3,"nri_days":47,"india_days_aayushi":7,"india_days_vaishnavi":15,"india_days":74,"stage1_lead_aayushi":48,"stage1_lead_vaishnavi":32,"stage1_lead":10,"stage2_lead_aayushi":13,"stage2_lead_vaishnavi":16,"stage2_lead":8,"stage3_lead_aayushi":87,"stage3_lead_vaishnavi":48,"stage3_lead":21,"stage4_lead_aayushi":107,"stage4_lead_vaishnavi":152,"stage4_lead":47,"stage1_sale_aayushi":15,"stage1_sale_vaishnavi":9,"stage1_sale":24,"stage2_sale_aayushi":4,"stage2_sale_vaishnavi":1,"stage2_sale":12,"stage3_sale_aayushi":12,"stage3_sale_vaishnavi":3,"stage3_sale":56,"stage4_sale_aayushi":35,"stage4_sale_vaishnavi":10,"stage4_sale":145,"stage1_days_aayushi":6,"stage1_days_vaishnavi":33,"stage1_days":4924,"stage2_days_aayushi":1.5,"stage2_days_vaishnavi":0,"stage2_days":1546,"stage3_days_aayushi":3,"stage3_days_vaishnavi":22,"stage3_days":7591,"stage4_days_aayushi":9,"stage4_days_vaishnavi":14,"stage4_days":13552}},"location":{"nri":{"leads_aayushi":94,"leads_vaishnavi":87,"leads":234,"sale_aayushi":38,"sale_vaishnavi":20,"sale":611,"days_aayushi":1.5,"days_vaishnavi":13,"days":55},"india":{"leads_aayushi":346,"leads_vaishnavi":182,"leads":4,"sale_aayushi":72,"sale_vaishnavi":35,"sale":354,"days_aayushi":7,"days_vaishnavi":15,"days":118}},"stage1":{"leads_aayushi":48,"leads_vaishnavi":32,"leads":14,"sale_aayushi":15,"sale_vaishnavi":9,"sale":28,"days_aayushi":6,"days_vaishnavi":33,"days":183},"stage2":{"leads_aayushi":13,"leads_vaishnavi":1,"leads":10,"sale_aayushi":4,"sale_vaishnavi":0,"sale":16,"days_aayushi":1.5,"days_vaishnavi":0,"days":98},"stage3":{"leads_aayushi":87,"leads_vaishnavi":48,"leads":24,"sale_aayushi":12,"sale_vaishnavi":4,"sale":63,"days_aayushi":3,"days_vaishnavi":22,"days":123},"stage4":{"leads_aayushi":207,"leads_vaishnavi":152,"leads":62,"sale_aayushi":35,"sale_vaishnavi":10,"sale":173,"days_aayushi":9,"days_vaishnavi":14,"days":83},"stage0":{"leads_aayushi":257,"leads_vaishnavi":241,"leads":128,"sale_aayushi":58,"sale_vaishnavi":40,"sale":1113,"days_aayushi":4,"days_vaishnavi":9,"days":41},"heart":{"leads_aayushi":0,"leads_vaishnavi":0,"leads":0,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"pcos":{"leads_aayushi":0,"leads_vaishnavi":0,"leads":0,"sale_aayushi":97,"sale_vaishnavi":49,"sale":1393,"days_aayushi":65,"days_vaishnavi":42,"days":54},"bp":{"leads_aayushi":1,"leads_vaishnavi":0,"leads":1,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0},"thyroid":{"leads_aayushi":0,"leads_vaishnavi":1,"leads":1,"sale_aayushi":0,"sale_vaishnavi":0,"sale":3,"days_aayushi":0,"days_vaishnavi":0,"days":0},"diabetes":{"leads_aayushi":1,"leads":2,"sale_aayushi":11,"sale":144,"days_aayushi":21,"days_vaishnavi":4,"days":33},"other":{"leads_aayushi":97,"leads_vaishnavi":49,"leads":77,"sale_aayushi":14,"sale_vaishnavi":7,"sale":1393,"days_aayushi":65,"days_vaishnavi":42,"days":54},"prime":{"leads_aayushi":88,"leads_vaishnavi":46,"leads":29,"sale_aayushi":20,"sale_vaishnavi":8,"sale":0,"days_aayushi":4,"days_vaishnavi":5,"days":0},"social":{"leads_aayushi":134,"leads_vaishnavi":167,"leads":49,"sale_aayushi":29,"sale_vaishnavi":24,"sale":0,"days_aayushi":6,"days_vaishnavi":9,"days":0},"hs":{"leads_aayushi":282,"leads_vaishnavi":181,"leads":75,"sale_aayushi":40,"sale_vaishnavi":8,"sale":0,"days_aayushi":9,"days_vaishnavi":7,"days":0},"web":{"leads_aayushi":10,"leads_vaishnavi":12,"leads":8,"sale_aayushi":5,"sale_vaishnavi":2,"sale":0,"days_aayushi":1,"days_vaishnavi":5,"days":0},"paidads":{"leads_aayushi":0,"leads_vaishnavi":0,"leads":0,"sale_aayushi":0,"sale_vaishnavi":0,"sale":0,"days_aayushi":0,"days_vaishnavi":0,"days":0}}';
    //  static aayushi vaishnavi
        var json=[];
        var json=JSON.parse(result);
        
        
                    
        //Gender(Both)
        // $('.male_ratio_yours').text(Math.round(json.gender.male.male_sale_aayushi/json.gender.male.lead_male_aayushi*100)+'%');
        // $('.male_ratio_yours').attr('title','Units('+json.gender.male.male_sale_aayushi+')/Lead('+json.gender.male.lead_male_aayushi+')');
        // $('.male_ratio_others').text(Math.round(json.gender.male.male_sale_vaishnavi/json.gender.male.lead_male_vaishnavi*100)+'%');
        // $('.male_ratio_others').attr('title','Units('+json.gender.male.male_sale_vaishnavi+')/Lead('+json.gender.male.lead_male_vaishnavi+')');
        // $('.male_ratio').text(Math.round(json.gender.male.lead_male/json.gender.male.male_sale*100)+'%');
        // $('.male_ratio').attr('title','Units('+json.gender.male.lead_male+')/Lead('+json.gender.male.male_sale+')');
        // $('.male_days_yours').text(json.gender.male.male_days_aayushi);
        // $('.male_days_others').text(json.gender.male.male_days_vaishnavi);
        // $('.male_days').text(json.gender.male.male_days);
        
        // $('.female_ratio_yours').text(Math.round(json.gender.female.female_sale_aayushi/json.gender.female.lead_female_aayushi*100)+'%');
        // $('.female_ratio_yours').attr('title','Units('+json.gender.female.female_sale_aayushi+')/Lead('+json.gender.female.lead_female_aayushi+')');
        // $('.female_ratio_others').text(Math.round(json.gender.female.female_sale_vaishnavi/json.gender.female.lead_female_vaishnavi*100)+'%');
        // $('.female_ratio_others').attr('title','Units('+json.gender.female.female_sale_vaishnavi+')/Lead('+json.gender.female.lead_female_vaishnavi+')');
        // $('.female_ratio').text(Math.round(json.gender.female.lead_female/json.gender.female.female_sale*100)+'%');
        // $('.female_ratio').attr('title','Units('+json.gender.female.lead_female+')/Lead('+json.gender.female.female_sale+')');
        // $('.female_days_yours').text(json.gender.female.female_days_aayushi);
        // $('.female_days_others').text(json.gender.female.female_days_vaishnavi);
        // $('.female_days').text(json.gender.female.female_days);
        
        
        // //Gender(Male) -> Age
        // $('.male_age25_ratio_yours').text(Math.round(json.gender.male.sale_age25_aayushi/json.gender.male.lead_age25_aayushi*100)+'%');
        // $('.male_age25_ratio_yours').attr('title','Units('+json.gender.male.sale_age25_aayushi+')/Lead('+json.gender.male.lead_age25_aayushi+')');
        // $('.male_age25_ratio_others').text(Math.round(json.gender.male.sale_age25_vaishnavi/json.gender.male.lead_age25_vaishnavi*100)+'%');
        // $('.male_age25_ratio_others').attr('title','Units('+json.gender.male.sale_age25_vaishnavi+')/Lead('+json.gender.male.lead_age25_vaishnavi+')');
        // $('.male_age25_ratio').text(Math.round(json.gender.male.lead_age25/json.gender.male.sale_age25*100)+'%');
        // $('.male_age25_ratio').attr('title','Units('+json.gender.male.lead_age25+')/Lead('+json.gender.male.sale_age25+')');
        // $('.male_age25_days_yours').text(json.gender.male.days_age25_aayushi);
        // $('.male_age25_days_others').text(json.gender.male.days_age25_vaishnavi);
        // $('.male_age25_days').text(json.gender.male.days_age25);
        
        // $('.male_age35_ratio_yours').text(Math.round(json.gender.male.sale_age35_aayushi/json.gender.male.lead_age35_aayushi*100)+'%');
        // $('.male_age35_ratio_yours').attr('title','Units('+json.gender.male.sale_age35_aayushi+')/Lead('+json.gender.male.lead_age35_aayushi+')');
        // $('.male_age35_ratio_others').text(Math.round(json.gender.male.sale_age35_vaishnavi/json.gender.male.lead_age35_vaishnavi*100)+'%');
        // $('.male_age35_ratio_others').attr('title','Units('+json.gender.male.sale_age35_vaishnavi+')/Lead('+json.gender.male.lead_age35_vaishnavi+')');
        // $('.male_age35_ratio').text(Math.round(json.gender.male.lead_age35/json.gender.male.sale_age35*100)+'%');
        // $('.male_age35_ratio').attr('title','Units('+json.gender.male.lead_age35+')/Lead('+json.gender.male.sale_age35+')');
        // $('.male_age35_days_yours').text(json.gender.male.days_age35_aayushi);
        // $('.male_age35_days_others').text(json.gender.male.days_age35_vaishnavi);
        // $('.male_age35_days').text(json.gender.male.days_age35);
        
        // $('.male_age45_ratio_yours').text(Math.round(json.gender.male.sale_age45_aayushi/json.gender.male.lead_age45_aayushi*100)+'%');
        // $('.male_age45_ratio_yours').attr('title','Units('+json.gender.male.sale_age45_aayushi+')/Lead('+json.gender.male.lead_age45_aayushi+')');
        // $('.male_age45_ratio_others').text(Math.round(json.gender.male.sale_age45_vaishnavi/json.gender.male.lead_age45_vaishnavi*100)+'%');
        // $('.male_age45_ratio_others').attr('title','Units('+json.gender.male.sale_age45_vaishnavi+')/Lead('+json.gender.male.lead_age45_vaishnavi+')');
        // $('.male_age45_ratio').text(Math.round(json.gender.male.lead_age45/json.gender.male.sale_age45*100)+'%');
        // $('.male_age45_ratio').attr('title','Units('+json.gender.male.lead_age45+')/Lead('+json.gender.male.sale_age45+')');
        // $('.male_age45_days_yours').text(json.gender.male.days_age45_aayushi);
        // $('.male_age45_days_others').text(json.gender.male.days_age45_vaishnavi);
        // $('.male_age45_days').text(json.gender.male.days_age45);
        
        // $('.male_age55_ratio_yours').text(Math.round(json.gender.male.sale_age55_aayushi/json.gender.male.lead_age55_aayushi*100)+'%');
        // $('.male_age55_ratio_yours').attr('title','Units('+json.gender.male.sale_age55_aayushi+')/Lead('+json.gender.male.lead_age55_aayushi+')');
        // $('.male_age55_ratio_others').text(Math.round(json.gender.male.sale_age55_vaishnavi/json.gender.male.lead_age55_vaishnavi*100)+'%');
        // $('.male_age55_ratio_others').attr('title','Units('+json.gender.male.sale_age55_vaishnavi+')/Lead('+json.gender.male.lead_age55_vaishnavi+')');
        // $('.male_age55_ratio').text(Math.round(json.gender.male.lead_age55/json.gender.male.sale_age55*100)+'%');
        // $('.male_age55_ratio').attr('title','Units('+json.gender.male.lead_age55+')/Lead('+json.gender.male.sale_age55+')');
        // $('.male_age55_days_yours').text(json.gender.male.days_age55_aayushi);
        // $('.male_age55_days_others').text(json.gender.male.days_age55_vaishnavi);
        // $('.male_age55_days').text(json.gender.male.days_age55);
        
        // $('.male_age55_above_ratio_yours').text(Math.round(json.gender.male.sale_age55_above_aayushi/json.gender.male.lead_age55_above_aayushi*100)+'%');
        // $('.male_age55_above_ratio_yours').attr('title','Units('+json.gender.male.sale_age55_above_aayushi+')/Lead('+json.gender.male.lead_age55_above_aayushi+')');
        // $('.male_age55_above_ratio_others').text(Math.round(json.gender.male.sale_age55_above_vaishnavi/json.gender.male.lead_age55_above_vaishnavi*100)+'%');
        // $('.male_age55_above_ratio_others').attr('title','Units('+json.gender.male.sale_age55_above_vaishnavi+')/Lead('+json.gender.male.sale_age55_above_vaishnavi+')');
        // $('.male_age55_above_ratio').text(Math.round(json.gender.male.lead_age55_above/json.gender.male.sale_age55_above*100)+'%');
        // $('.male_age55_above_ratio').attr('title','Units('+json.gender.male.lead_age55_above+')/Lead('+json.gender.male.sale_age55_above+')');
        // $('.male_age55_above_days_yours').text(json.gender.male.days_age55_above_aayushi);
        // $('.male_age55_above_days_others').text(json.gender.male.days_age55_above_vaishnavi);
        // $('.male_age55_above_days').text(json.gender.male.days_age55_above);
        
        // //Gender(Female) -> Age
        // $('.female_age25_ratio').text(Math.round(json.gender.female.lead_age25/json.gender.female.sale_age25*100)+'%');
        // $('.female_age25_ratio').attr('title','Units('+json.gender.female.lead_age25+')/Lead('+json.gender.female.sale_age25+')');
        // $('.female_age25_days').text(json.gender.female.days_age25);
        
        // $('.female_age35_ratio').text(Math.round(json.gender.female.lead_age35/json.gender.female.sale_age35*100)+'%');
        // $('.female_age35_ratio').attr('title','Units('+json.gender.female.lead_age35+')/Lead('+json.gender.female.sale_age35+')');
        // $('.female_age35_days').text(json.gender.female.days_age35);
        
        // $('.female_age45_ratio').text(Math.round(json.gender.female.lead_age45/json.gender.female.sale_age45*100)+'%');
        // $('.female_age45_ratio').attr('title','Units('+json.gender.female.lead_age45+')/Lead('+json.gender.female.sale_age45+')');
        // $('.female_age45_days').text(json.gender.female.days_age45);
        
        // $('.female_age55_ratio').text(Math.round(json.gender.female.lead_age55/json.gender.female.sale_age55*100)+'%');
        // $('.female_age55_ratio').attr('title','Units('+json.gender.female.lead_age55+')/Lead('+json.gender.female.sale_age55+')');
        // $('.female_age55_days').text(json.gender.female.days_age55);
        
        // $('.female_age55_above_ratio').text(Math.round(json.gender.female.lead_age55_above/json.gender.female.sale_age55_above*100)+'%');
        // $('.female_age55_above_ratio').attr('title','Units('+json.gender.female.lead_age55_above+')/Lead('+json.gender.female.sale_age55_above+')');
        // $('.female_age55_above_days').text(json.gender.female.days_age55_above);
        
        // //Gender(Male) -> Location
        // $('.male_nri_ratio_yours').text(Math.round(json.gender.male.nri_lead_aayushi/json.gender.male.nri_sale_aayushi*100)+'%');
        // $('.male_nri_ratio_others').text(Math.round(json.gender.male.nri_lead_vaishnavi/json.gender.male.nri_sale_vaishnavi*100)+'%');
        // $('.male_nri_ratio').text(Math.round(json.gender.male.nri_lead/json.gender.male.nri_sale*100)+'%');
        // $('.male_nri_ratio').attr('title','Units('+json.gender.male.nri_lead+')/Lead('+json.gender.male.nri_sale+')');
        // $('.male_nri_days_yours').text(json.gender.male.nri_days_aayushi);
        // $('.male_nri_days_others').text(json.gender.male.nri_days_vaishnavi);
        // $('.male_nri_days').text(json.gender.male.nri_days);
        // $('.male_india_ratio_yours').text(Math.round(json.gender.male.india_lead_aayushi/json.gender.male.india_sale_aayushi*100)+'%');
        // $('.male_india_ratio_others').text(Math.round(json.gender.male.india_lead_vaishnavi/json.gender.male.india_sale_vaishnavi*100)+'%');
        // $('.male_india_ratio').text(Math.round(json.gender.male.india_lead/json.gender.male.india_sale*100)+'%');
        // $('.male_india_ratio').attr('title','Units('+json.gender.male.india_lead+')/Lead('+json.gender.male.india_sale+')');
        // $('.male_india_days_yours').text(json.gender.male.india_days_aayushi);
        // $('.male_india_days_others').text(json.gender.male.india_days_vaishnavi);
        // $('.male_india_days').text(json.gender.male.india_days);
        
        // //Gender(Female) -> Location
        // $('.female_nri_ratio').text(Math.round(json.gender.female.nri_lead/json.gender.female.nri_sale*100)+'%');
        // $('.female_nri_ratio').attr('title','Units('+json.gender.female.nri_lead+')/Lead('+json.gender.female.nri_sale+')');
        // $('.female_nri_days').text(json.gender.female.nri_days);
        // $('.female_india_ratio').text(Math.round(json.gender.female.india_lead/json.gender.female.india_sale*100)+'%');
        // $('.female_india_ratio').attr('title','Units('+json.gender.female.india_lead+')/Lead('+json.gender.female.india_sale+')');
        // $('.female_india_days').text(json.gender.female.india_days);
        
        // //Gender(Male) -> Stage
        // $('.male_stage1_ratio').text(Math.round(json.gender.male.stage1_lead/json.gender.male.stage1_sale*100)+'%');
        // $('.male_stage1_ratio').attr('title','Units('+json.gender.male.stage1_lead+')/Lead('+json.gender.male.stage1_sale+')');
        // $('.male_stage1_days').text(json.gender.male.stage1_days);
        // $('.male_stage2_ratio').text(Math.round(json.gender.male.stage2_lead/json.gender.male.stage2_sale*100)+'%');
        // $('.male_stage2_ratio').attr('title','Units('+json.gender.male.stage2_lead+')/Lead('+json.gender.male.stage2_sale+')');
        // $('.male_stage2_days').text(json.gender.male.stage2_days);
        // $('.male_stage3_ratio').text(Math.round(json.gender.male.stage3_lead/json.gender.male.stage3_sale*100)+'%');
        // $('.male_stage3_ratio').attr('title','Units('+json.gender.male.stage3_lead+')/Lead('+json.gender.male.stage3_sale+')');
        // $('.male_stage3_days').text(json.gender.male.stage3_days);
        // $('.male_stage4_ratio').text(Math.round(json.gender.male.stage4_lead/json.gender.male.stage4_sale*100)+'%');
        // $('.male_stage4_ratio').attr('title','Units('+json.gender.male.stage4_lead+')/Lead('+json.gender.male.stage4_sale+')');
        // $('.male_stage4_days').text(json.gender.male.stage4_days);
        
        // //Gender(Female) -> Stage
        // $('.female_stage1_ratio').text(Math.round(json.gender.female.stage1_lead/json.gender.female.stage1_sale*100)+'%');
        // $('.female_stage1_ratio').attr('title','Units('+json.gender.female.stage1_lead+')/Lead('+json.gender.female.stage1_sale+')');
        // $('.female_stage1_days').text(json.gender.female.stage1_days);
        // $('.female_stage2_ratio').text(Math.round(json.gender.female.stage2_lead/json.gender.female.stage2_sale*100)+'%');
        // $('.female_stage2_ratio').attr('title','Units('+json.gender.female.stage2_lead+')/Lead('+json.gender.female.stage2_sale+')');
        // $('.female_stage2_days').text(json.gender.female.stage2_days);
        // $('.female_stage3_ratio').text(Math.round(json.gender.female.stage3_lead/json.gender.female.stage3_sale*100)+'%');
        // $('.female_stage3_ratio').attr('title','Units('+json.gender.female.stage3_lead+')/Lead('+json.gender.female.stage3_sale+')');
        // $('.female_stage3_days').text(json.gender.female.stage3_days);
        // $('.female_stage4_ratio').text(Math.round(json.gender.female.stage4_lead/json.gender.female.stage4_sale*100)+'%');
        // $('.female_stage4_ratio').attr('title','Units('+json.gender.female.stage4_lead+')/Lead('+json.gender.female.stage4_sale+')');
        // $('.female_stage4_days').text(json.gender.female.stage4_days);
        
        // //Location(Both)
        // $('.nri_ratio_yours').text(Math.round(json.location.nri.sale_aayushi/json.location.nri.leads_aayushi*100)+'%');
        // $('.nri_ratio_yours').attr('title','Units('+json.location.nri.sale_aayushi+')/Lead('+json.location.nri.leads_aayushi+')');
        // $('.nri_ratio_others').text(Math.round(json.location.nri.sale_vaishnavi/json.location.nri.leads_vaishnavi*100)+'%');
        // $('.nri_ratio_others').attr('title','Units('+json.location.nri.sale_vaishnavi+')/Lead('+json.location.nri.leads_vaishnavi+')');
        // $('.nri_ratio').text(Math.round(json.location.nri.leads/json.location.nri.sale*100)+'%');
        // $('.nri_ratio').attr('title','Units('+json.location.nri.sale+')/Lead('+json.location.nri.leads+')');
        // $('.nri_days_yours').text(json.location.nri.days_aayushi);
        // $('.nri_days_others').text(json.location.nri.days_vaishnavi);
        // $('.nri_days').text(json.location.nri.days);
        
        
        // $('.india_ratio_yours').text(Math.round(json.location.india.sale_aayushi/json.location.india.leads_aayushi*100)+'%');
        // $('.india_ratio_yours').attr('title','Units('+json.location.india.sale_aayushi+')/Lead('+json.location.india.leads_aayushi+')');
        // $('.india_ratio_others').text(Math.round(json.location.india.sale_vaishnavi/json.location.india.leads_vaishnavi*100)+'%');
        // $('.india_ratio_others').attr('title','Units('+json.location.india.sale_vaishnavi+')/Lead('+json.location.india.leads_vaishnavi+')');
        // $('.india_ratio').text(Math.round(json.location.india.leads/json.location.india.sale*100)+'%');
        // $('.india_ratio').attr('title','Units('+json.location.india.sale+')/Lead('+json.location.india.leads+')');
        // $('.india_days_yours').text(json.location.india.days_aayushi);
        // $('.india_days_others').text(json.location.india.days_vaishnavi);
        // $('.india_days').text(json.location.india.days);
        
        // //Stage(Both)
        // $('.stage1_ratio_yours').text(Math.round(json.stage1.sale_aayushi/json.stage1.leads_aayushi*100)+'%');
        // $('.stage1_ratio_yours').attr('title','Units('+json.stage1.sale_aayushi+')/Lead('+json.stage1.leads_aayushi+')');
        // $('.stage1_ratio_others').text(Math.round(json.stage1.sale_vaishnavi/json.stage1.leads_vaishnavi*100)+'%');
        // $('.stage1_ratio_others').attr('title','Units('+json.stage1.sale_vaishnavi+')/Lead('+json.stage1.leads_vaishnavi+')');
        // $('.stage1_ratio').text(Math.round(json.stage1.leads/json.stage1.sale*100)+'%');
        // $('.stage1_ratio').attr('title','Units('+json.stage1.sale+')/Lead('+json.stage1.leads+')');
        // $('.stage1_days_yours').text(json.stage1.days_aayushi);
        // $('.stage1_days_others').text(json.stage1.days_vaishnavi);
        // $('.stage1_days').text(json.stage1.days);
        
        // $('.stage2_ratio_yours').text(Math.round(json.stage2.sale_aayushi/json.stage2.leads_aayushi*100)+'%');
        // $('.stage2_ratio_yours').attr('title','Units('+json.stage2.sale_aayushi+')/Lead('+json.stage2.leads_aayushi+')');
        // $('.stage2_ratio_others').text(Math.round(json.stage2.sale_vaishnavi/json.stage2.leads_vaishnavi*100)+'%');
        // $('.stage2_ratio_others').attr('title','Units('+json.stage2.sale_vaishnavi+')/Lead('+json.stage2.leads_vaishnavi+')');
        // $('.stage2_ratio').text(Math.round(json.stage2.leads/json.stage2.sale*100)+'%');
        // $('.stage2_ratio').attr('title','Units('+json.stage2.sale+')/Lead('+json.stage2.leads+')');
        // $('.stage2_days_yours').text(json.stage2.days_aayushi);
        // $('.stage2_days_others').text(json.stage2.days_vaishnavi);
        // $('.stage2_days').text(json.stage2.days);
        
        // $('.stage3_ratio_yours').text(Math.round(json.stage3.sale_aayushi/json.stage3.leads_aayushi*100)+'%');
        // $('.stage3_ratio_yours').attr('title','Units('+json.stage3.sale_aayushi+')/Lead('+json.stage3.leads_aayushi+')');
        // $('.stage3_ratio_others').text(Math.round(json.stage3.sale_vaishnavi/json.stage3.leads_vaishnavi*100)+'%');
        // $('.stage3_ratio_others').attr('title','Units('+json.stage3.sale_vaishnavi+')/Lead('+json.stage3.leads_vaishnavi+')');
        // $('.stage3_ratio').text(Math.round(json.stage3.leads/json.stage3.sale*100)+'%');
        // $('.stage3_ratio').attr('title','Units('+json.stage3.sale+')/Lead('+json.stage3.leads+')');
        // $('.stage3_days_yours').text(json.stage3.days_aayushi);
        // $('.stage3_days_others').text(json.stage3.days_vaishnavi);
        // $('.stage3_days').text(json.stage3.days);
        
        // $('.stage4_ratio_yours').text(Math.round(json.stage4.sale_aayushi/json.stage4.leads_aayushi*100)+'%');
        // $('.stage4_ratio_yours').attr('title','Units('+json.stage4.sale_aayushi+')/Lead('+json.stage4.leads_aayushi+')');
        // $('.stage4_ratio_others').text(Math.round(json.stage4.sale_vaishnavi/json.stage4.leads_vaishnavi*100)+'%');
        // $('.stage4_ratio_others').attr('title','Units('+json.stage4.sale_vaishnavi+')/Lead('+json.stage4.leads_vaishnavi+')');
        // $('.stage4_ratio').text(Math.round(json.stage4.leads/json.stage4.sale*100)+'%');
        // $('.stage4_ratio').attr('title','Units('+json.stage4.sale+')/Lead('+json.stage4.leads+')');
        // $('.stage4_days_yours').text(json.stage4.days_aayushi);
        // $('.stage4_days_others').text(json.stage4.days_vaishnavi);
        // $('.stage4_days').text(json.stage4.days);
        
        // $('.stage0_ratio_yours1').text(Math.round(json.stage0.sale_aayushi/json.stage0.leads_aayushi*100)+'%');
        // $('.stage0_ratio_yours1').attr('title','Units('+json.stage0.sale_aayushi+')/Lead('+json.stage0.leads_aayushi+')');
        // $('.stage0_ratio_others1').text(Math.round(json.stage0.sale_vaishnavi/json.stage0.leads_vaishnavi*100)+'%');
        // $('.stage0_ratio_others1').attr('title','Units('+json.stage0.sale_vaishnavi+')/Lead('+json.stage0.leads_vaishnavi+')');
        // $('.stage0_ratio').text(Math.round(json.stage0.leads/json.stage0.sale*100)+'%');
        // $('.stage0_ratio').attr('title','Units('+json.stage0.sale+')/Lead('+json.stage0.leads+')');
        // $('.stage0_days_yours1').text(json.stage0.days_aayushi);
        // $('.stage0_days_others1').text(json.stage0.days_vaishnavi);
        // $('.stage0_days').text(json.stage0.days);
        
        // //Medical Condition
        // $('.heart_ratio_yours').text(Math.round(json.heart.leads_aayushi/json.heart.sale_aayushi*100)+'%');
        // $('.heart_ratio_others').text(Math.round(json.heart.leads_vaishnavi/json.heart.sale_vaishnavi*100)+'%');
        // $('.heart_ratio').text(Math.round(json.heart.leads/json.heart.sale*100)+'%');
        // $('.heart_ratio').attr('title','Units('+json.heart.sale+')/Lead('+json.heart.leads+')');
        // $('.heart_days_yours').text(json.heart.days_aayushi);
        // $('.heart_days_others').text(json.heart.days_vaishnavi);
        // $('.heart_days').text(json.heart.days);
        
        // $('.thyroid_ratio_yours').text(Math.round(json.thyroid.leads_aayushi/json.thyroid.sale_aayushi*100)+'%');
        // $('.thyroid_ratio_others').text(Math.round(json.thyroid.leads_vaishnavi/json.thyroid.sale_vaishnavi*100)+'%');
        // $('.thyroid_ratio').text(Math.round(json.thyroid.leads/json.thyroid.sale*100)+'%');
        // $('.thyroid_ratio').attr('title','Units('+json.thyroid.sale+')/Lead('+json.thyroid.leads+')');
        // $('.thyroid_days_yours').text(json.thyroid.days_aayushi);
        // $('.thyroid_days_others').text(json.thyroid.days_vaishnavi);
        // $('.thyroid_days').text(json.thyroid.days);
        
        // $('.bp_ratio_yours').text(Math.round(json.bp.leads_aayushi/json.bp.sale_aayushi*100)+'%');
        // $('.bp_ratio_others').text(Math.round(json.bp.leads_vaishnavi/json.bp.sale_vaishnavi*100)+'%');
        // $('.bp_ratio').text(Math.round(json.bp.leads/json.bp.sale*100)+'%');
        // $('.bp_ratio').attr('title','Units('+json.bp.sale+')/Lead('+json.bp.leads+')');
        // $('.bp_days_yours').text(json.bp.days_aayushi);
        // $('.bp_days_others').text(json.bp.days_vaishnavi);
        // $('.bp_days').text(json.bp.days);
        
        // $('.pcos_ratio_yours').text(Math.round(json.pcos.leads_aayushi/json.pcos.sale_aayushi*100)+'%');
        // $('.pcos_ratio_others').text(Math.round(json.pcos.leads_vaishnavi/json.pcos.sale_vaishnavi*100)+'%');
        // $('.pcos_ratio').text(Math.round(json.pcos.leads/json.pcos.sale*100)+'%');
        // $('.pcos_ratio').attr('title','Units('+json.pcos.sale+')/Lead('+json.pcos.leads+')');
        // $('.pcos_days_yours').text(json.pcos.days_aayushi);
        // $('.pcos_days_others').text(json.pcos.days_vaishnavi);
        // $('.pcos_days').text(json.pcos.days);
        
        // $('.diabetes_ratio_yours').text(Math.round(json.diabetes.leads_aayushi/json.diabetes.sale_aayushi*100)+'%');
        // $('.diabetes_ratio_others').text(Math.round(json.diabetes.leads_vaishnavi/json.diabetes.sale_vaishnavi*100)+'%');
        // $('.diabetes_ratio').text(Math.round(json.diabetes.leads/json.diabetes.sale*100)+'%');
        // $('.diabetes_ratio').attr('title','Units('+json.diabetes.sale+')/Lead('+json.diabetes.leads+')');
        // $('.diabetes_days_yours').text(json.diabetes.days_aayushi);
        // $('.diabetes_days_others').text(json.diabetes.days_vaishnavi);
        // $('.diabetes_days').text(json.diabetes.days);
        
        // $('.other_ratio_yours').text(Math.round(json.other.sale_aayushi/json.other.leads_aayushi*100)+'%');
        // $('.other_ratio_yours').attr('title','Units('+json.other.sale_aayushi+')/Lead('+json.other.leads_aayushi+')');
        // $('.other_ratio_others').text(Math.round(json.other.sale_vaishnavi/json.other.leads_vaishnavi*100)+'%');
        // $('.other_ratio_others').attr('title','Units('+json.other.sale_vaishnavi+')/Lead('+json.other.leads_vaishnavi+')');
        // $('.other_ratio').text(Math.round(json.other.leads/json.other.sale*100)+'%');
        // $('.other_ratio').attr('title','Units('+json.other.sale+')/Lead('+json.other.leads+')');
        // $('.other_days_yours').text(json.other.days_aayushi);
        // $('.other_days_others').text(json.other.days_vaishnavi);
        // $('.other_days').text(json.other.days);
        
        
        // //Source
        // $('.prime_ratio_yours').text(Math.round(json.prime.sale_aayushi/json.prime.leads_aayushi*100)+'%');
        // $('.prime_ratio_yours').attr('title','Units('+json.prime.sale_aayushi+')/Lead('+json.prime.leads_aayushi+')');
        // $('.prime_ratio_others').text(Math.round(json.prime.sale_vaishnavi/json.prime.leads_vaishnavi*100)+'%');
        // $('.prime_ratio_others').attr('title','Units('+json.prime.sale_vaishnavi+')/Lead('+json.prime.leads_vaishnavi+')');
        // $('.prime_ratio').text(Math.round(json.prime.leads/json.prime.sale*100)+'%');
        // $('.prime_ratio').attr('title','Units('+json.prime.sale+')/Lead('+json.prime.leads+')');
        // $('.prime_days_yours').text(json.prime.days_aayushi);
        // $('.prime_days_others').text(json.prime.days_vaishnavi);
        // $('.prime_days').text(json.prime.days);
        
        // $('.social_ratio_yours').text(Math.round(json.social.sale_aayushi/json.social.leads_aayushi*100)+'%');
        // $('.social_ratio_yours').attr('title','Units('+json.social.sale_aayushi+')/Lead('+json.social.leads_aayushi+')');
        // $('.social_ratio_others').text(Math.round(json.social.sale_vaishnavi/json.social.leads_vaishnavi*100)+'%');
        // $('.social_ratio_others').attr('title','Units('+json.social.sale_vaishnavi+')/Lead('+json.social.leads_vaishnavi+')');
        // $('.social_ratio').text(Math.round(json.social.leads/json.social.sale*100)+'%');
        // $('.social_ratio').attr('title','Units('+json.social.sale+')/Lead('+json.social.leads+')');
        // $('.social_days_yours').text(json.social.days_aayushi);
        // $('.social_days_others').text(json.social.days_vaishnavi);
        // $('.social_days').text(json.social.days);
        
        // $('.hs_ratio_yours').text(Math.round(json.hs.sale_aayushi/json.hs.leads_aayushi*100)+'%');
        // $('.hs_ratio_yours').attr('title','Units('+json.hs.sale_aayushi+')/Lead('+json.hs.leads_aayushi+')');
        // $('.hs_ratio_others').text(Math.round(json.hs.sale_vaishnavi/json.hs.leads_vaishnavi*100)+'%');
        // $('.hs_ratio_others').attr('title','Units('+json.hs.sale_vaishnavi+')/Lead('+json.hs.leads_vaishnavi+')');
        // $('.hs_ratio').text(Math.round(json.hs.leads/json.hs.sale*100)+'%');
        // $('.hs_ratio').attr('title','Units('+json.hs.sale+')/Lead('+json.hs.leads+')');
        // $('.hs_days_yours').text(json.hs.days_aayushi);
        // $('.hs_days_others').text(json.hs.days_vaishnavi);
        // $('.hs_days').text(json.hs.days);
        
        // $('.web_ratio_yours').text(Math.round(json.web.sale_aayushi/json.web.leads_aayushi*100)+'%');
        // $('.web_ratio_yours').attr('title','Units('+json.web.sale_aayushi+')/Lead('+json.web.leads_aayushi+')');
        // $('.web_ratio_others').text(Math.round(json.web.sale_vaishnavi/json.web.leads_vaishnavi*100)+'%');
        // $('.web_ratio_others').attr('title','Units('+json.web.sale_vaishnavi+')/Lead('+json.web.leads_vaishnavi+')');
        // $('.web_ratio').text(Math.round(json.web.leads/json.web.sale*100)+'%');
        // $('.web_ratio').attr('title','Units('+json.web.sale+')/Lead('+json.web.leads+')');
        // $('.web_days_yours').text(json.web.days_aayushi);
        // $('.web_days_others').text(json.web.days_vaishnavi);
        // $('.web_days').text(json.web.days);
        
        // $('.paidads_ratio_yours').text(Math.round(json.paidads.sale_aayushi/json.paidads.leads_aayushi*100)+'%');
        // $('.paidads_ratio_yours').attr('title','Units('+json.paidads.sale_aayushi+')/Lead('+json.paidads.leads_aayushi+')');
        // $('.paidads_ratio_others').text(Math.round(json.paidads.sale_vaishnavi/json.paidads.leads_vaishnavi*100)+'%');
        // $('.paidads_ratio_others').attr('title','Units('+json.paidads.sale_vaishnavi+')/Lead('+json.paidads.leads_vaishnavi+')');
        // $('.paidads_ratio').text(Math.round(json.paidads.leads/json.paidads.sale*100)+'%');
        // $('.paidads_ratio').attr('title','Units('+json.paidads.sale+')/Lead('+json.paidads.leads+')');
        // $('.paidads_days_yours').text(json.paidads.days_aayushi);
        // $('.paidads_days_others').text(json.paidads.days_vaishnavi);
        // $('.paidads_days').text(json.paidads.days);
        
        // $('.other_ratio_yours').text(Math.round(json.other.sale_aayushi/json.other.leads_aayushi*100)+'%');
        // $('.other_ratio_yours').attr('title','Units('+json.other.sale_aayushi+')/Lead('+json.other.leads_aayushi+')');
        // $('.other_ratio_others').text(Math.round(json.other.sale_vaishnavi/json.other.leads_vaishnavi*100)+'%');
        // $('.other_ratio_others').attr('title','Units('+json.other.sale_vaishnavi+')/Lead('+json.other.leads_vaishnavi+')');
        // $('.other_ratio').text(Math.round(json.other.leads/json.other.sale*100)+'%');
        // $('.other_ratio').attr('title','Units('+json.other.sale+')/Lead('+json.other.leads+')');
        // $('.other_days_yours').text(json.other.days_aayushi);
        // $('.other_days_others').text(json.other.days_vaishnavi);
        // $('.other_days').text(json.other.days);
    });
    
</script>
<!--================================================Avinash added this fro heat Map effort for SALE========================================================-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Chart data
        var data = google.visualization.arrayToDataTable([
          ['Month', 'November', 'December', 'January', 'February', 'March', 'April', 'Season Total'],
          ['2018/19',  47, 36, 102, 251, 120, 80, 641],
          ['2017/18',  32, 7, 44, 30, 212, 23, 348],
          ['2016/17',  42, 39, 255, 154, 74, 54, 625],
          ['2015/16',  55, 135, 128, 38, 102, 8, 466],
          ['2014/15',  11, 69, 3, 27, 10, 0, 120]
        ]);
        
        //Chart Custom Options
        var options = {
          title : '',
          vAxis: {title: 'Inches of Snow', ticks: [0, 100, 200, 300, 400, 500, 600]},
          hAxis: {title: ''},
          seriesType: 'bars',
          colors: ['#379d76', '#8178c0', '#fea545', '#006587', '#9aaa4d', '#f6582c', '#dd5182'],
          legend: {position: 'bottom', maxLines: 2, pagingTextStyle: {color: '#374a6f'}, scrollArrows:{activeColor: '#666',inactiveColor: '#ccc'}},
          //series: {6: {pointSize: 5,type: 'line'}},
          animation:{
          duration: 1000,
          easing: 'linear',
          startup: true
      }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

$(window).resize(function(){
        drawVisualization();
    });
    </script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Stage1', 'Stage2', 'Stage3', 'Stage4'],
          ['January', 1000, 400, 200, 300],
          ['February', 1170, 460, 250, 200],
          ['March', 660, 1120, 300, 10],
          ['April', 1030, 540, 350, 50],
          ['May', 1030, 540, 350, 60],
          ['June', 1030, 540, 350, 800],
          ['July', 1030, 540, 350, 60]
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',//Sales, Expenses, and Profit: 2014-2017
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<script type="text/javascript">
    //====================efforts_for_sales:Start====================//
    $('.efforts_for_sales').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var isExpanded = $('.efforts_for_sales').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/efforts_for_sales';  
           $.ajax({
                url: url,
                type: "POST",
                data:{counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success: function(result)
                {  
                    
                    //Effort for sales
                    var effort_for_sales_html = "";
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var per_avg_calls_team = per_avg_calls = avg_calls_team = avg_calls = avg_time_hot = avg_time_hot_team = avg_sale_time = avg_sale_time_team = 0;
                    
                    //if(result.sales_funnel_sales[0]['unit']>0){
                       //per_avg_calls_team = Math.ceil(result.avg_calls / result.sales_funnel_sales_team[0]['unit']);
                       per_avg_calls = Math.ceil(result.avg_calls);
                       per_avg_calls_team = Math.ceil(result.avg_calls_team);
                       console.log(per_avg_calls+" :: "+per_avg_calls_team);
                    //   $('.a_c_sales').html(per_avg_calls+" | "+per_avg_calls_team);
                        
                    /*}else{
                        // $('.a_c_sales').html('0');
                        $('.per_avg_calls').html(0);
                        $('.per_avg_calls_team').html(0);
                    }*///if(result.sales_funnel_sales[0]['unit']>0){
                    if(result.avg_calls>0){
                        avg_calls = Math.ceil(result.avg_calls);
                        avg_calls_team = Math.ceil(result.avg_calls_team);
                        $('.a_c_per_day').html(avg_calls+" | "+avg_calls_team);
                    }else{
                        $('.a_c_per_day').html('0');
                    }//if(result.avg_calls>0){
                    //if(result.avg_calls_fu>0){
                        avg_calls_fu = Math.ceil(result.avg_calls_fu);
                        avg_calls_fu_team = Math.ceil(result.avg_calls_fu_team);
                        // $('.a_c_fu_per_day').html(avg_calls_fu+" | "+avg_calls_fu_team);
                        $('.avg_calls_fu').html(avg_calls_fu);
                        $('.avg_calls_fu_team').html(avg_calls_fu_team);
                    /*}else{
                        $('.per_avg_calls').html(0);
                        $('.per_avg_calls_team').html(0);
                        $('.a_c_fu_per_day').html('0');
                    }*/
                    $('.avg_fu_to_close').html(result.day_close_fu);
                    $('.avg_fu_to_close_team').html(result.day_close_fu_team);
                    //day_close_consult day_close_sale
                    //if(result.avg_calls_fu>0){
                    if(result.day_close_consult>0){
                        day_close_consult = result.day_close_consult;
                        day_close_consult_team = result.day_close_consult_team;
                        // $('.day_close_consult').html(Math.ceil(day_close_consult)+" | "+Math.ceil(day_close_consult_team));
                        $('.day_close_consult').html(Math.ceil(day_close_consult));
                        $('.day_close_consult_team').html(Math.ceil(day_close_consult_team));
                    }/*else{
                        // $('.day_close_consult').html('0');
                        $('.per_avg_calls').html(0);
                        $('.per_avg_calls_team').html(0);
                    }*/
                    if(result.day_close_sale>0){
                        day_close_sale = result.day_close_sale;
                        day_close_sale_team = result.day_close_sale_team;
                        // $('.day_close_sale').html(Math.ceil(day_close_sale)+" | "+Math.ceil(day_close_sale_team));
                        $('.day_close_sale').html(Math.ceil(day_close_sale));
                        $('.day_close_sale_team').html(Math.ceil(day_close_sale_team));
                    }/*else{
                        // $('.day_close_sale').html('0');
                        $('.per_avg_calls').html(0);
                        $('.per_avg_calls_team').html(0);
                    }*/
                    $('.per_avg_calls').text(per_avg_calls);
                        $('.per_avg_calls_team').html(per_avg_calls_team);
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    //====================efforts_for_sales:Start====================//
    //====================Counsellor performance review:Start====================//
    $('.counsellor_performance_review').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var isExpanded = $('.counsellor_performance_review').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/counsellor_performance_review';  
           $.ajax({
                url: url,
                type: "POST",
                data:{counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    $("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.sales_amount').html('Rs. '+result.sales_funnel_sales[0]['amt']);
                    $('.sales_unit').html(result.sales_funnel_sales[0]['unit']);
                    $('.total_lead_assign').html(result.total_lead_assign);
                    $('.consultation').html(result.consultation);
                    $('.hot').html(result.hot);
                    $('.warm').html(result.warm);

                    $('.lead_consultation_ratio').html(result.lead_consultation_ratio);
                    $('.consultation_sales').html(result.consultation_sales);
                    $('.lead_to_sales_ratio').html(result.lead_to_sales_ratio);
                    $('.hot_to_sales').html(result.hot_to_sales);
                    /*///////////////////////OVERALL/////////////////*/
                    $('.sales_amount_overall').html('Rs. '+result.sales_funnel_sales_overall[0]['amt']);
                    $('.sales_unit_overall').html(result.sales_funnel_sales_overall[0]['unit']);
                    $('.total_lead_assign_overall').html(result.total_lead_assign_overall);
                    $('.consultation_overall').html(result.consultation_overall);
                    $('.hot_overall').html(result.hot_overall);
                    $('.warm_overall').html(result.warm_overall);

                    $('.lead_consultation_ratio_overall').html(result.lead_consultation_ratio_overall);
                    $('.consultation_sales_overall').html(result.consultation_sales_overall);
                    $('.lead_to_sales_ratio_overall').html(result.lead_to_sales_ratio_overall);
                    $('.hot_to_sales_overall').html(result.hot_to_sales_overall);
                    
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    //====================Counsellor performance review:Start====================//
    //====================Conversion ratio:Start====================//
    
    //====================Conversion ratio:End====================//
    //====================Basic To Special:Start====================//
    $('.basic_to_special').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var isExpanded = $('.basic_to_special').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/basic_to_special';  
           $.ajax({
                url: url,
                type: "POST",
                data:{counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    //console.log(result);
                    $('.Total_BSP_Sold').html(result.Total_BSP_Sold);
                    $('.Total_OMR_Sold').html(result.Total_OMR_Sold);
                    $('.Total_active_client_Sold').html(result.Total_active_client_Sold);
                    $('.Total_BSP_upgrade_Sold').html(result.Total_BSP_upgrade_Sold);
                    $('.Total_OMR_upgrade_Sold').html(result.Total_OMR_upgrade_Sold);
                    $('.Total_active_client_upgrade_Sold').html(result.Total_active_client_upgrade_Sold);

                    $('.Total_BSP_per_upgrade_Sold').html(result.Total_BSP_per_upgrade_Sold);
                    $('.Total_OMR_per_upgrade_Sold').html(result.Total_OMR_per_upgrade_Sold);
                    $('.Total_active_client_per_upgrade_Sold').html(result.Total_active_client_per_upgrade_Sold);
                    $('.Total_BSP_renew_Sold').html(result.Total_BSP_renew_Sold);

                    $('.Total_OMR_renew_Sold').html(result.Total_OMR_renew_Sold);
                    $('.Total_active_client_renew_Sold').html(result.Total_active_client_renew_Sold);
                    $('.Total_BSP_per_upgrade_Sold').html(result.Total_BSP_per_upgrade_Sold);
                    $('.Total_OMR_per_upgrade_Sold').html(result.Total_OMR_per_upgrade_Sold);

                    $('.Total_active_client_per_upgrade_Sold').html(result.Total_active_client_per_upgrade_Sold);
                    $('.Total_BSP_unconverted_Sold').html(result.Total_BSP_unconverted_Sold);
                    $('.Total_OMR_unconverted_Sold').html(result.Total_OMR_unconverted_Sold);
                    $('.Total_active_client_unconverted_Sold').html(result.Total_active_client_unconverted_Sold);


                    $('.Total_BSP_Sold_total').html(result.Total_BSP_Sold_total);
                    $('.Total_BSP_upgrade_Sold_total').html(result.Total_BSP_upgrade_Sold_total);
                    $('.Total_BSP_per_upgrade_Sold_total').html(result.Total_BSP_per_upgrade_Sold_total);
                    $('.Total_BSP_renew_Sold_total').html(result.Total_BSP_renew_Sold_total);
                    $('.Total_BSP_per_upgrade_Sold_renew_total').html(result.Total_BSP_per_upgrade_Sold_renew_total);
                    $('.Total_BSP_unconverted_Sold_total').html(result.Total_BSP_unconverted_Sold_total);

                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    //====================Basic To Special:Start====================//
    //====================Conversion Ratio:Start====================//
    $('.conversion_ratio').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var years = $('#year_conversion_ratio :selected').text();
        var isExpanded = $('.conversion_ratio').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/conversion_ratio';  
           $.ajax({
                url: url,
                type: "POST",
                data:{years:years,counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    console.log(result);
                    $('#conversion_ratio_append').html(result);
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    $('#year_conversion_ratio').on('change', function(){
        var years = $('#year_conversion_ratio :selected').text();
        if(years!=""){
            var url = '<?php echo base_url(); ?>performance/mis_sales_manager/conversion_ratio';  
            $.ajax({
                url: url,
                type: "POST",
                data:{years:years},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    console.log(result);
                    $('#conversion_ratio_append').html(result);
                },
                complete:function(){
                    $("#cover-spin").hide();
                },
                error: function(){}             
            });
        }//if(years!=""){

    });
    //====================Conversion Ratio:End====================//

    //====================stage_phase_conversion:Start====================//
    $('.stage_phase_conversion').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var years = $('#year_stage_phase :selected').text();
        var isExpanded = $('.stage_phase_conversion').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/stage_phase_conversion';  
           $.ajax({
                url: url,
                type: "POST",
                data:{years:years,counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.year_sp').html(years);
                    $('#stage_conversion_append').html(result.stage);
                    $('#phase_conversion_append').html(result.phase);
                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    $('#year_stage_phase').on('change', function(){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var years = $('#year_stage_phase :selected').text();
        if(years!=""){
            var url = '<?php echo base_url(); ?>performance/mis_sales_manager/stage_phase_conversion';  
            $.ajax({
                url: url,
                type: "POST",
                data:{years:years,counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.year_sp').html(years);
                    $('#stage_conversion_append').html(result.stage);
                    $('#phase_conversion_append').html(result.phase);
                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }//if(years!=""){

    });
    //====================stage_phase_conversion:END====================//
    //====================Source Wise Conversion:Start====================//
    $('.source_wise_conversion').on('click',function(event){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var $datavalue = "";
        var years = $('#year_source_wise :selected').text();
        var isExpanded = $('.source_wise_conversion').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/source_wise_conversion';  
           $.ajax({
                url: url,
                type: "POST",
                data:{years:years,counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.year_sw').html(years);
                    $('#source_wise_conversion_append').html(result);
                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    $('#year_source_wise').on('change', function(){
        var counsellor_name = $('#counsellor_name option:selected').val();
        var years = $('#year_source_wise :selected').text();
        if(years!=""){
            var url = '<?php echo base_url(); ?>performance/mis_sales_manager/source_wise_conversion';  
           $.ajax({
                url: url,
                type: "POST",
                data:{years:years,counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.year_sw').html(years);
                    $('#source_wise_conversion_append').html(result);
                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }//if(years!=""){

    });
    //====================Source Wise Conversion:END====================//

    //====================Medical Bucket:Start====================//
    $('.medical_bucket').on('click',function(event){
        var $datavalue = "";
        var years = '';
        var isExpanded = $('.medical_bucket').attr("aria-expanded");
        if(isExpanded=="false"){
           var url = '<?php echo base_url(); ?>performance/mis_sales_manager/medical_bucket';  
           $.ajax({
                url: url,
                type: "POST",
                data:{years:years},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.PCOS').html(result.PCOS);
                    $('.Thyroid').html(result.Thyroid);
                    $('.Cholestrol').html(result.Cholestrol);
                    $('.Diabetes').html(result.Diabetes);
                    $('.oth').html(result.oth);
                    $('.Overweight').html(result.Overweight);
                    $('.very_overweight').html(result.very_overweight);
                    $('.Obese').html(result.Obese);

                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }else{

        }
    });
    //====================Medical Bucket:END====================//
    //====================Counsellor Wise filter:Start====================//
    /*$('#counsellor_name').on('change', function(){
        var counsellor_name = $('#counsellor_name :selected').text();
        if(counsellor_name!=""){
            var url = '<?php echo base_url(); ?>performance/mis_sales_manager/source_wise_conversion';  
           $.ajax({
                url: url,
                type: "POST",
                data:{counsellor_name:counsellor_name},
                dataType: "JSON",
                beforeSend: function () {
                    //$("#cover-spin").show();
                },
                success: function(result)
                {  
                    $('.counsellor_name').html(counsellor_name);
                    $('#source_wise_conversion_append').html(result);
                },
                complete:function(){
                    //$("#cover-spin").hide();
                },
                error: function(){}             
            });
        }//if(years!=""){

    });*/
    //====================Counsellor Wise filter:Start====================//
</script>

