<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style type="text/css">
            .notifications{
              cursor: pointer;
              position: fixed;
              right: 500;
              left: 500;
              z-index: 9999;
              top: 0px;
              margin-top: 22px;  
              min-width: 300px;
              max-width: 800px;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="notifications">
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
        <div class="login-box">
          <div class="login-logo">
            <b>Login</b>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Sign in to start your session</p>
              <?php echo $contentnya; ?>
            </div>
          </div>
        </div>

        <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
        <script type="text/javascript">
            $('.notifications').slideDown('slow').delay(3000).slideUp('slow');
        </script>
    </body>
</html>
