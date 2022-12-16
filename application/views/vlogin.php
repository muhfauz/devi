<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->db->query("select judul from tbl_judul")->row()->judul; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

  <!-- v4.0.0-alpha.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/et-line-font/et-line-font.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themify-icons/themify-icons.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<!-- <body class="hold-transition "> -->

<body class="hold-transition login-page">
  <div class="login-box mt-12">
    <div class="login-box-body bg-aqua ">

      <h3 class="login-box-msg">Login</h3>
      <p>
        <?php echo $this->session->userdata('pesan') ?>
      </p>

      <form id="loginform" action="<?php echo base_url('login/login') ?>" method="post">
        <div class="form-group has-feedback mt-5">
          <input name="username" type="text" class="form-control sty1" placeholder="Username" required value="<?php if (isset($_COOKIE["loginId"])) {
                                                                                                                echo $_COOKIE["loginId"];
                                                                                                              } ?>">
        </div>
        <div class="form-group has-feedback">

          <input name="password" type="password" class="form-control sty1" placeholder="Password" value="<?php if (isset($_COOKIE["loginPass"])) {
                                                                                                            echo $_COOKIE["loginPass"];
                                                                                                          } ?>">
        </div>
        <div>
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input name="remember" type="checkbox" <?php if (isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?>>
                Remember Me </label>
              <!-- <a href="pages-recover-password.html" class="pull-right"><i class="fa fa-lock"></i> Forgot pwd?</a> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4 m-t-1">
            <button type="submit" class="btn btn-primary btn-block btn-flat"> <i class="fa fa-sign"></i> Login</button>
            <button type="reset" class="btn btn-danger btn-block btn-flat mb-5">Batal</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->


  <!-- jQuery 3 -->


  <!-- template -->
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

  <!-- v4.0.0-alpha.6 -->
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/niche.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jslogin/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jslogin/jquery.validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jslogin/login.js"></script>

</body>

</html>