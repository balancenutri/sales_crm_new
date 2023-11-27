<!DOCTYPE html>
<html>
<head>
	<title>Login | Sales Dashboard</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!--begin::Base Styles -->
	<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <style type="text/css">
    	.m-login.m-login--1 .m-login__wrapper .m-login__head .m-login__title {
		    text-align: center;
		    font-size: 18px;
		    color: #4D4F5C;
		    font-family: 'Poppins';
		}

		.m-login.m-login--1 .m-login__wrapper .m-login__form .m-login__form-action .btn {
			background-color: #23A3B0 !important;
			border-color: #23A3B0 !important;
		}

		.m-login.m-login--1 .m-login__wrapper {
		    overflow: hidden;
		    padding: 20% 2rem 2rem 2rem;
		}
    </style>
</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">				
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background: url(<?php echo CDN_IMAGE_URL ?>login_bg.jpg) 75% 10% no-repeat;background-blend-mode: overlay;background-color: #00000040;">
			<!-- <div class="m-grid__item m-grid__item--middle">
				<h3 class="m-login__welcome">Join Our Community</h3>
				<p class="m-login__msg">
					Lorem ipsum dolor sit amet, coectetuer adipiscing<br>elit sed diam nonummy et nibh euismod
				</p>
			</div> -->
		</div>
		<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
			<div class="m-stack m-stack--hor m-stack--desktop">
				<div class="m-stack__item m-stack__item--fluid">

					<div class="m-login__wrapper">

						<div class="m-login__logo mb-0">
							<a href="#">
							<!-- <img src="assets/app/media/img/logos/logo-2.png"> -->
							<img src="https://www.balancenutrition.in/images/home_page/bn_logo_300.png" class="login_logo">
							</a>
						</div>

						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Welcome back! Please login to your account.</h3>
							</div>

							<?php
                                if($this->session->form_validation != '') 
                                {
                                ?>
                                    <div class="text-danger">
                                        <?php echo $this->session->form_validation; ?>
                                    </div> 
                                <?php
                                }
                                if($this->session->warning_message != '') 
                                {
                                ?>
                                    <div class="text-danger">
                                        <?php echo $this->session->warning_message; ?>
                                    </div> 
                                <?php
                                }
                                if($this->session->success_message != '') 
                                {
                                ?>
                                    <div class="text-success">
                                        <?php echo $this->session->success_message; ?>
                                    </div> 
                                <?php
                                }   
                            ?>
                            
							<form class="m-login__form m-form" name="login" id="login" method="POST" action="<?php echo base_url(); ?>login/process_login" data-parsley-validate="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="email" placeholder="Email" name="email"  autocomplete="off" required="">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" id="password" required="">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
										<input type="checkbox" name="remember"> Remember me
										<span></span>
										</label>
									</div>
									<!--<div class="col m--align-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
									</div>-->
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign In</button>
								</div>
							</form>
						</div>

						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">Forgotten Password ?</h3>
								<div class="m-login__desc">Enter your email to reset your password:</div>
							</div>
							<form class="m-login__form m-form" action="#">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
									<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">Cancel</button>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end:: Page -->

<!--begin::Base Scripts -->        
<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->

<!--begin::Page Snippets --> 
<!--<script src="assets/snippets/pages/user/login.js" type="text/javascript"></script>-->
<!--end::Page Snippets -->
</body>
</html>