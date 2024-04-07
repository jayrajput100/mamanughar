<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/preview-equation/default-light/user_login_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jun 2020 10:35:21 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Packgio : <?php echo $page; ?> </title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/theme/assets/img/Final_icon_2.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url(); ?>/theme/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/theme/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/theme/assets/css/users/login-3.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url(); ?>/theme/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>/theme/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="<?php echo base_url(); ?>/theme/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/theme/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/theme/assets/css/ui-kit/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <style type="text/css">
      
    </style>
</head>
<body class="login">
    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>
    <form class="form-login" id="form">
        <input type="hidden" id="action" name="action" value="sl/login_code">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <img alt="logo" src="<?php echo base_url(); ?>/theme/assets/img/logo1.png" class="theme-logo" height="100px" width="190px">
            </div>

            <div class="col-md-12"> 
                <label for="email" class="">Login</label>                
                <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Login" required >                
                <label for="pass" class="">Password</label>                
                <input type="password" id="pass" name="pass" class="form-control mb-5" placeholder="Password" required>                
                                
                <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="submit">Login</button>
                <div class="checkbox d-flex justify-content-between mb-4 mt-3">
                     <div class="custom-control custom-checkbox mr-3">
                        <a href="<?php echo base_url() ?>/home" class="btn btn-lg btn-gradient-danger btn-block btn-rounded ">Home</a>
                    </div> 
                    <div class="forgot-pass right">
                        <a href="<?php echo base_url() ?>/suppliersignup" class="btn btn-lg btn-gradient-danger btn-block btn-rounded ">Sign Up</a>
                    </div>
                </div>
            </div>

        
        </div>
    </form>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/assets/js/loader.js"></script>
    <script src="<?php echo base_url(); ?>/theme/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/bootstrap/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url(); ?>/theme/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>/theme/plugins/sweetalerts/custom-sweetalert.js"></script>
     <script src="<?php echo base_url(); ?>/theme/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/sl.js"></script>
    <script type="text/javascript">
        var base_url="<?php echo base_url(); ?>";
    </script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/preview-equation/default-light/user_login_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jun 2020 10:35:21 GMT -->
</html>
<script type="text/javascript">
    function loader()
    {
        $.blockUI({
                          message: '<div class="blockui-default-message"><i class="fa fa-circle-o-notch fa-spin"></i><h6>Please Wait..</h6></div>',
                          overlayCSS:  {
                          background: 'rgba(24, 44, 68, 0.8)',
                          opacity: 1,
                          zIndex:9999,
                          cursor: 'wait',
                          position:'absolute'
                            },
                          css: {
                              zIndex:9999,
                              width: '20%',
                              top  : '45%',
                              left : '38%',
                              hight: '12%'
                            },
                            blockMsgClass: 'block-msg-message-loader'
                        });
    }
    function loader_timeout()
    {
         setTimeout($.unblockUI);
    }
</script>