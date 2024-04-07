<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/preview-equation/default-light/pages_error404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jun 2020 10:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Error 404</title>
    <link rel="shortcut icon" href="<?= base_url();?>/public/front-theme/img/favicon.ico" type="image/x-icon">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url(); ?>/theme/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/theme/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/theme/assets/css/pages/error/style-400.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->    
</head>
<body class="error404 text-center">
    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>
    <div class="container-fluid  error-content">
        <div class="">
            <p class="mini-text mb-3">Ooops!</p>
            <img alt="image-404" src="<?php echo base_url(); ?>/public/front-theme/img/logo.png" width="200" height="100" alt="" class="logo_sticky">
            <h1 class="error-number">404</h1>
            <p class="error-des mb-0">Page Not Found!</p>
            <p class="error-text mb-4 mt-1">This page is not available</p>
            <a href="javascript:window.history.go(-1);" class="btn btn-gradient-info btn-rounded mt-4">Go Back</a>
            <p>
			<?php if (! empty($message) && $message !== '(null)') : ?>
				<?= esc($message) ?>
			<?php else : ?>
				Sorry! Cannot seem to find the page you were looking for.
			<?php endif ?>
		</p>
        </div>
    </div>    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/assets/js/loader.js"></script>
    <script src="<?php echo base_url(); ?>/theme/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/bootstrap/js/bootstrap.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/preview-equation/default-light/pages_error404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jun 2020 10:40:38 GMT -->
</html>