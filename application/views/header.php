<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
	<head>
        <meta charset="utf-8" />
        
        <title>Balance Nutrition | Dashboard</title>
        <meta name="description" content="Latest updates and statistic charts"> 

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Base Styles -->  

                 
        <!--begin::Page Vendors --> 
        <link href="<?= base_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
 
        
		<link href="<?= base_url()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.2/css/select.dataTables.min.css">
        
        <link href="<?= base_url()?>assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/fontawesome/css/brands.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/fontawesome/css/solid.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/css/msfmultiselect.css" rel="stylesheet">
        <!--<link rel="shortcut icon" href="<?= base_url()?>assets/demo/default/media/img/logo/favicon.ico" />-->
        
        <?php // include favicon : Start ?>
        <!--<link rel="shortcut icon" href="https://www.balancenutrition.in/images/favicons/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="https://www.balancenutrition.in/images/favicons/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" sizes="57x57" href="https://www.balancenutrition.in/images/favicons/apple-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="60x60" href="https://www.balancenutrition.in/images/favicons/apple-icon-60x60.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="https://www.balancenutrition.in/images/favicons/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="https://www.balancenutrition.in/images/favicons/apple-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="https://www.balancenutrition.in/images/favicons/apple-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="https://www.balancenutrition.in/images/favicons/apple-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="https://www.balancenutrition.in/images/favicons/apple-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="https://www.balancenutrition.in/images/favicons/apple-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="https://www.balancenutrition.in/images/favicons/apple-icon-180x180.png" />
        <link rel="icon" type="image/png" sizes="192x192"  href="https://www.balancenutrition.in/images/favicons/android-icon-192x192.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="https://www.balancenutrition.in/images/favicons/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="96x96" href="https://www.balancenutrition.in/images/favicons/favicon-96x96.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="https://www.balancenutrition.in/images/favicons/favicon-16x16.png" />-->
        
        <!--<meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="https://www.balancenutrition.in/images/favicons/ms-icon-144x144.png" />
        <meta name="theme-color" content="#ffffff" />-->
        <?php // include favicon : End ?>

    	<script type="text/javascript" src="<?= base_url()?>assets/js/jquery/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="<?= base_url()?>assets/js/msfmultiselect.js"></script>
        <!--begin::Web font -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"></script>

        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font --> 
        <style>
	        #calender_model{
	            background: aliceblue;
                padding: 10px;
                margin: 2px;
                border-radius: 17.5;
                border: 2px solid #d1e2f1;
                border-radius: 25px;
	        }
	        #task_calendar{
	            margin-top: 2%;
	        }
            .m-list-timeline__item a{
                position: fixed;
                margin-left: -22%;
            }
            .lead_capture_stage1_count {
                font-size: 16px !important;
            }
            .lead_capture_stage2_count{
                font-size: 16px !important;
            }
            .lead_capture_stage3_count{
                font-size: 16px !important;
            }
            .lead_capture_stage4_count{
                font-size: 16px !important;
            }
	    </style>
	</head>
    <!-- end::Head -->    
    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default  m-brand--minimize m-aside-left--minimize">    
        <div id="cover-spin"></div>
    	<!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
        <?= $this->load->view('top_nav'); ?>

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <?= $this->load->view('left_nav'); ?>
        
        <div class="m-grid__item m-grid__item--fluid m-wrapper">