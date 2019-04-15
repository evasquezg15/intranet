<!DOCTYPE html>
<html class="no-js before-run" lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Paxzu | Intranet</title>

  <link rel="apple-touch-icon" href="<?php echo _DOMAIN;?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo _DOMAIN;?>assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/css/site.min.css">

  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/vendor/flag-icon-css/flag-icon.css">


  <!-- Page -->
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/css/pages/login.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo _DOMAIN;?>assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!--[if lt IE 9]>
    <script src="<?php echo _DOMAIN;?>assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="<?php echo _DOMAIN;?>assets/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo _DOMAIN;?>assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo _DOMAIN;?>assets/vendor/modernizr/modernizr.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-login layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="brand">
        <img class="brand-img" src="<?php echo _DOMAIN;?>assets/images/logo.png" alt="...">
        <h2 class="brand-text"></h2>
      </div>
      <p></p>

      <?php 
        function random_alphanumeric_string($length) {
          $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          return substr(str_shuffle($chars), 0, $length);
        }

        $_SESSION['name'] = random_alphanumeric_string(10);
        $_SESSION['pass'] = random_alphanumeric_string(10);
      ?>

      <form method="post" action="<?php echo _DOMAIN;?>">
        <div class="form-group">
          <label class="sr-only" for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="<?php echo $_SESSION['name'];?>" placeholder="Email">
        </div>
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="<?php echo $_SESSION['pass'];?>"
          placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
      </form>
      <?php if($_SESSION['failed_password']==1){ ?>
        <p id="mensajeError">Debe ingresar una contraseña y nombre de usuario correcto.</p>
        <?php 
        $_SESSION['failed_password']=0;
      } ?>
      <footer class="page-copyright">
      
        <p></p>
        <p></p>
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="<?php echo _DOMAIN;?>assets/vendor/jquery/jquery.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/bootstrap/bootstrap.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/animsition/jquery.animsition.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

  <!-- Plugins -->
  <script src="<?php echo _DOMAIN;?>assets/vendor/switchery/switchery.min.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/intro-js/intro.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/screenfull/screenfull.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/vendor/slidepanel/jquery-slidePanel.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

  <!-- Scripts -->
  <script src="<?php echo _DOMAIN;?>assets/js/core.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/site.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/sections/menu.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/sections/menubar.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/sections/sidebar.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/configs/config-colors.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/configs/config-tour.js"></script>

  <script src="<?php echo _DOMAIN;?>assets/js/components/asscrollable.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/components/animsition.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/components/slidepanel.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/components/switchery.js"></script>
  <script src="<?php echo _DOMAIN;?>assets/js/components/jquery-placeholder.js"></script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);

    $(document).ready(function() {
      setTimeout(function() {
        $("#mensajeError").fadeOut("slow");
      }, 5000);
    });

  </script>

</body>

</html>