<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo CDN_COMMON_URL; ?>bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CDN_COMMON_URL; ?>font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="<?php echo CDN_COMMON_URL; ?>js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="<?php echo CDN_COMMON_URL; ?>js/parsley.min.js" charset="utf-8"></script>
  </head>

<style type="text/css">
  .login-sec{padding: 50px 30px; position:relative;}
  .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
  .btn-login{background: #31b0d5; color:#fff; font-weight:600;border-color: #31b0d5;cursor: pointer;}
  .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
  .banner-text h2{color:#fff; font-weight:600;}
  .banner-text p{color:#fff;}

  @media only screen and (min-width : 320px) and (max-width : 480px) {
  background: url(../images/mobile.jpg) no-repeat center center fixed;
}
</style>

<body>

<div class="container-fluid">
<div class="row">

  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-8 login-sec">
	  <div class="text-center">
      <img src="../images/balance-logo.png">
    <br>
      <h6 style="padding-top: 5px;">WWW.BALANCENUTRITION.IN</h6>
    </div>
    <br>
    <h6 class="text-center" style="color: #00aec3;">BALANCENUTRITION LOGIN</h6>
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
 
  <form class="login-form" name="login" id="login" method="POST" action="<?php echo base_url(); ?>login/process_login" data-parsley-validate="">
    <div class="form-group">
        <label for="Email1">USERNAME</label>
        <input type="email" name="email" id="email" class="form-control" required="">
    </div>

    <div class="form-group">
        <label for="Password1">PASSWORD</label>
        <input type="password" name="password" id="password" class="form-control" required="">
    </div>

    <div class="form-check">
      <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
            <small>Remember Me</small>
      </label>
      <button type="submit" class="btn btn-login btn-primary float-right">Submit</button>
    </div>
  </form>

  </div>

    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-4 banner-sec" style="background: url(../images/login/bg1.jpg)no-repeat left bottom; min-height: 100vh; background-size: cover;background-position: center">
    </div>

</div>
</div>


</body>
</html>