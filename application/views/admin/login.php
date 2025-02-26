<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lingkaran Koding | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo css_url('admin/bootstrap.min');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo css_url('font-awesome.min');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo css_url('ionicons.min');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo css_url('AdminLTE.min');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo css_url('all-skins.min');?>">
  <link rel="stylesheet" href="<?php echo css_url('sweetalert2.min');?>">
  <link rel="stylesheet" href="<?php echo css_url('icheck');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Lingkaran</b>Koding</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

    <form data-url="<?php echo site_url('admin/login/process');?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo js_url('admin/jquery.min');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo js_url('admin/bootstrap.min');?>"></script>
<!-- iCheck -->
<script src="<?php echo js_url('icheck.min');?>"></script>
<script src="<?php echo js_url('sweetalert2.min');?>"></script>
<script src="<?php echo js_url('javascript');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
