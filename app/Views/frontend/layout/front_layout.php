<?php
use App\Libraries\Simple;
$simple=new Simple();
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  .swal2-container {
    z-index: 10000;
  }
  /*#profileImage {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 10px;
  color: #fff;
  text-align: center;
  line-height: 10px;
  margin-top: 5px;
}*/
</style>
<style>
    .addReadMore.showlesscontent .SecSec,
    .addReadMore.showlesscontent .readLess {
        display: none;
    }

    .addReadMore.showmorecontent .readMore {
        display: none;
    }

    .addReadMore .readMore,
    .addReadMore .readLess {
        font-weight: bold;
        margin-left: 2px;
        color: #f7941d;
        cursor: pointer;
    }

    .addReadMoreWrapTxt.showmorecontent .SecSec,
    .addReadMoreWrapTxt.showmorecontent .readLess {
        display: block;
    }
    .swal-wide{
       width:1050px !important;
     }
    </style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Packagio - Find Your Packaging.">
  <meta name="author" content="Packagio">
  <title><?php print_r($site?$site:"");?> : <?php print_r($page?$page:"");?></title>
  <!-- Favicons-->
  <link rel="shortcut icon" href="<?= base_url();?>/public/front-theme/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?= base_url();?>/public/front-theme/img/favicon.ico">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= base_url();?>/public/front-theme/img/favicon.ico">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= base_url();?>/public/front-theme/img/favicon.ico">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= base_url();?>/public/front-theme/img/favicon.ico">
  <!-- GOOGLE WEB FONT -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" as="fetch" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
  <script type="text/javascript">
    ! function(e, n, t) {
      "use strict";
      var o = "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap",
        r = "__3perf_googleFonts_c2536";

      function c(e) {
        (n.head || n.body).appendChild(e)
      }

      function a() {
        var e = n.createElement("link");
        e.href = o, e.rel = "stylesheet", c(e)
      }

      function f(e) {
        if (!n.getElementById(r)) {
          var t = n.createElement("style");
          t.id = r, c(t)
        }
        n.getElementById(r).innerHTML = e
      }
      e.FontFace && e.FontFace.prototype.hasOwnProperty("display") ? (t[r] && f(t[r]), fetch(o).then(function(e) {
        return e.text()
      }).then(function(e) {
        return e.replace(/@font-face {/g, "@font-face{font-display:swap;")
      }).then(function(e) {
        return t[r] = e
      }).then(f).catch(a)) : a()
    }(window, document, localStorage);
  </script>
  <!-- BASE CSS -->
  <link href="<?= base_url();?>/public/front-theme/css/bootstrap_customized.min.css" rel="stylesheet">
  <link href="<?= base_url();?>/public/front-theme/css/style.css" rel="stylesheet">
  <link href="<?= base_url();?>/public/front-theme/css/orange.css" rel="stylesheet">
  <!-- SPECIFIC CSS -->
  <link href="<?= base_url();?>/public/front-theme/css/booking-sign_up.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/theme/plugins/dropify/dropify.min.css">
  <!-- SPECIFIC CSS -->
  <link href="<?= base_url();?>/public/front-theme/css/home.css" rel="stylesheet">
  <link href="<?= base_url();?>/public/front-theme/css/contacts.css" rel="stylesheet">
  <!-- SPECIFIC CSS -->
  <link href="<?= base_url();?>/public/front-theme/css/submit-rider.css" rel="stylesheet">
  <link href="<?= base_url();?>/public/front-theme/css/wizard.css" rel="stylesheet">
  <!-- SPECIFIC CSS -->
  <link href="<?= base_url();?>/public/front-theme/css/listing.css" rel="stylesheet">
  <!-- SPECIFIC CSS -->
  <link href="<?= base_url();?>/public/front-theme/css/blog.css" rel="stylesheet">
  <link href="<?= base_url();?>/public/front-theme/css/detail-page.css" rel="stylesheet">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/theme/plugins/bootstrap-select/bootstrap-select.min.css">

   <link href="<?php echo base_url(); ?>/theme/assets/css/components/custom-scroll_bars_basic.css" rel="stylesheet" type="text/css" />

  <link href="<?php echo base_url(); ?>/theme/plugins/autocomplete/autocomplete.css" rel="stylesheet" type="text/css" />
  <!-- ALTERNATIVE COLORS CSS -->
  <link href="#" id="colors" rel="stylesheet">
  <link href="<?= base_url();?>/public/front-theme/css/listing.css" rel="stylesheet">
</head>

<body>
  <header class="header clearfix element_to_stick">
    <div class="container">
      <div id="logo">
        <a href="<?= base_url();?>">
          <img src="<?= base_url();?>/public/front-theme/img/logo.png" width="200" height="100" alt="" class="logo_normal">
          <img src="<?= base_url();?>/public/front-theme/img/logo.png" width="200" height="100" alt="" class="logo_sticky">
        </a>
      </div> 

    

        <?php 
        $user_session=session()->get('user_session');
        if(isset($user_session)) {
          if(is_array($user_session) && count($user_session)>=1){ ?> 
            <ul id="top_menu" class="drop_user" style="margin-top: 25px;">
              <li>
                <div class="dropdown user clearfix">
                  <a href="#" data-toggle="dropdown" style="color:#000;">
                   <?php
                    $firstCharacter = substr($user_session['user_name'], 0, 1);
                    
                   ?>  

                    <figure style="background-color: #f7941d;margin-top: 2px;"><div id="profileImage" style="text-align: center;margin-top: 7px;color: white"><?php echo $firstCharacter; ?></div></figure>
                    <?php echo $user_session['user_name']?>
                  </a>
                  <div class="dropdown-menu" style="padding-left: 5px">
                    <div class="dropdown-menu-content">
                      <ul>
                        <li><a href="<?php echo base_url().'/profile'?>"  style="padding-left: 5px;">My Profile</a></li> 
                        <li><a href="<?php echo base_url().'/logout'?>" style="padding-left: 5px;">Log out</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
            </ul> 
            <?php 
          }
        }
      ?>


      <!-- /top_menu -->
      <a href="#0" class="open_close"> <i class="icon_menu"></i><span>Menu</span></a>
      <nav class="main-menu">
        <div id="header_menu">
          <a href="#0" class="open_close"><i class="icon_close"></i><span>Menu</span></a>
          <a href="<?= base_url();?>/home"><img src="<?= base_url();?>/public/front-theme/img/logo1.png" width="200" height="100" alt=""></a>
        </div>
        <ul>
          <li><a href="<?= base_url();?>" class="show-submenu">Home</a></li>

          <?php $fetch_three_tier=$simple->fetch_three_tier();?> 
          <li class="submenu">
            <a href="<?php echo base_url('allcategory')?>" class="show-submenu">Category</a>
            <ul>
              <?php foreach ($fetch_three_tier as $key => $value) { ?> 
                <li class="third-level">
                  <a href="<?php echo base_url('category/subcategory/'.$value['category_id']) ?>"><?php echo $value['category_name'] ?></a>
                   <?php 
                          if(count($value['subcat'])>=10 && count($value['subcat'])<15)
                            {
                              $css="top:-150px !important;";
                            }
                            else if(count($value['subcat'])>=15)
                            {
                              $css="top:-250px !important;";
                            }
                            else
                           {
                            //$css="overflow-y: auto;";
                           }  
                        
                        ?> 
                   <ul style="<?php echo isset($css)?$css:''; ?>"> 
                    <?php foreach ($value['subcat'] as $k => $v) { ?> 
                      <li > 

                        <?php if($v['is_product']==1) { ?> 
                          <a href="<?php echo base_url('particular_third_sub_cat/'.$v['sub_cat_id'])?>"><?php echo isset($v['sub_cat_name'])?$v['sub_cat_name']:'' ?></a> 
                        <?php } else { ?> 
                          <a href="<?php echo base_url('search_data/subcat_'.$v['sub_cat_id'])?>"><?php echo isset($v['sub_cat_name'])?$v['sub_cat_name']:'' ?></a>
                        <?php } ?> 

                        
                      </li> 
                    <?php } ?> 
                  </ul>
                </li> 
              <?php } ?> 
            </ul>
          </li>
          <!-- <li>
            <a href="<?= base_url();?>" class="show-submenu">About Us</a>
          </li> --> 
          <?php $fetch_three_tier_ins=$simple->fetch_three_tier_ins();?> <li class="submenu">
            <a href="<?php echo base_url('')?>" class="show-submenu">Institute</a>
            <ul> <?php
                $i=0;
                foreach ($fetch_three_tier_ins['first']['common'] as $key => $value) { ?> 
                  <li class="third-level">
                    <a href="#"><?php print_r($value); ?></a>
                    <ul class="list" style="overflow: auto!important; "> 
                      <?php 
                      if($key==0){ 
                        foreach ($fetch_three_tier_ins['first']['testing'] as $k => $v){ ?> 
                          <li><a href="<?php echo base_url()?>/test/<?php echo isset($k)?$k:'' ?>">
                            <?php echo isset($v)?$v:'' ?></a></li> <?php 
                        } 
                      }else{ 
                        foreach ($fetch_three_tier_ins['first']['educational'] as $k => $v){ ?> 
                          <li><a href="<?php echo base_url()?>/educational/<?php echo isset($v)?$v:'' ?>"><?php echo isset($v)?$v:''?></a></li> <?php 
                        } 
                      } 
                      ?> 
                    </ul>
                  </li> <?php  
                }?> 
            </ul>
          </li>
          <li>
            <a href="<?= base_url('/faq');?>" class="show-submenu">FAQ</a>
          </li>
         <?php 
          if(!isset($user_session))
          { ?>
            <li class="submenu">
            <a href="#0" class="show-submenu">Users</a>
            <ul>
              <li><a href="<?= base_url('/signin');?>">Login</a></li>
              <li><a href="<?= base_url('/signup');?>">Sign Up</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#0" class="show-submenu">Suppliers</a>
            <ul>
              <li><a href="<?= base_url('/signin');?>">Login</a></li>
              <li><a href="<?= base_url('/suppliersignup');?>">Sign Up</a></li>
            </ul>
          </li>
         <?php  } ?>  
          
          <!--  <li>
            <a href="<?= base_url();?>" class="show-submenu">Contact Us</a>
          </li> -->
        </ul>
      </nav>
    </div>
  </header>
  <!-- /main --> <?= $this->renderSection('content')?>
  <!-- /main -->
  <!--/footer-->
  <footer>
    <div class="wave gray footer"></div>
    <div class="container margin_60_40 ">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_1">Quick Links</h3>
          <div class="collapse dont-collapse-sm links" id="collapse_1">
            <ul>
              <li><a href="<?php echo base_url() ?>/about">About us</a></li>
              <li><a href="<?php echo base_url() ?>/faq">Help And Faq</a></li>
              <li><a href="<?php echo base_url() ?>/signin">My account</a></li>
              <li><a href="<?php echo base_url() ?>/contact">Contact US</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_2">Categories</h3>
          <div class="collapse dont-collapse-sm links" id="collapse_2">
            <ul>
              <li><a href="#">Top Categories</a></li>
              <li><a href="#">Latest Submissions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_3">Contacts</h3>
          <div class="collapse dont-collapse-sm contacts" id="collapse_3">
            <ul>
              <li><i class="icon_house_alt"></i>C-11, (PULEEN PARK-1) PARITA PARK, OPP GAUTAM APRT, NR. MACHHALI <br />CIRCLE, NARODA GAM, NARODA, AHMEDABD,<br /> GUJARAT, 382330 <br />INDIA</li>
              <!-- <li><i class="icon_mobile"></i>+91 99241 26086</li> -->
              <li><i class="icon_mail_alt"></i><a href="#0">admin@packagio.in</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h3 data-target="#collapse_4">Keep in touch</h3>
          <div class="collapse dont-collapse-sm" id="collapse_4">
            <div id="newsletter">
              <div id="message-newsletter"></div>
              <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                <div class="form-group">
                  <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                  <button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
                </div>
              </form>
            </div>
            <div class="follow_us">
              <h5>Follow Us</h5>
              <ul>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url();?>/public/front-theme/img/twitter_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="https://www.facebook.com/groups/284730939579480/?ref=bookmarks"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url();?>/public/front-theme/img/facebook_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url();?>/public/front-theme/img/instagram_icon.svg" alt="" class="lazy"></a></li>
                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= base_url();?>/public/front-theme/img/youtube_icon.svg" alt="" class="lazy"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /row-->
      <hr>
      <div class="row add_bottom_25">
        <div class="col-lg-6">
        </div>
        <div class="col-lg-6">
          <ul class="additional_links">
            <li><a href="#0">Terms and conditions</a></li>
            <li><a href="#0">Privacy</a></li>
            <li><span>© Packagio</span></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!--/footer-->
  <div id="toTop"></div><!-- Back to top button -->
  <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
  <!-- Sign In Modal -->
  <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide" style='z-index:10000;'>
    <div class="modal_header">
      <h3>Sign In</h3>
    </div>
    <form id="form">
      <input type="hidden" id="action" value="dologin">
      <input type="hidden" id="actionmsg" value="Please wait...!">
      <div class="sign-in-wrapper">
        <!-- <a href="#0" class="social_bt facebook">Login with Facebook</a>
        <a href="#0" class="social_bt google">Login with Google</a>
        <div class="divider"><span>Or</span></div> -->
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" id="email">
          <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" id="password" value="">
          <i class="icon_lock_alt"></i>
        </div>
        <div class="clearfix add_bottom_15">
          <div class="checkboxes float-left">
            <label class="container_check">Remember me <input type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
        </div>
        <div class="text-center">
          <input type="submit" value="Log In" class="btn_1 full-width mb_5"> Don’t have an account? <a href="register.html">Sign up</a>
        </div>
        <div id="forgot_pw">
          <div class="form-group">
            <label>Please confirm login email below</label>
            <input type="email" class="form-control" name="email_forgot" id="email_forgot">
            <i class="icon_mail_alt"></i>
          </div>
          <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
          <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
        </div>
      </div>
    </form>
    <!--form -->
  </div>
  <!-- /Sign In Modal -->
  <!-- COMMON SCRIPTS -->
  <script src="<?= base_url();?>/public/front-theme/js/common_scripts.min.js"></script>
  <script src="<?= base_url();?>/public/front-theme/js/slider.js"></script>
  <script src="<?= base_url();?>/public/front-theme/js/common_func.js"></script>
  <script src="<?= base_url();?>/public/front-theme/assets/validate.js"></script>
  <!-- Autocomplete -->
  <!-- SPECIFIC SCRIPTS -->
  <!--   <script src="<?= base_url();?>/public/front-theme/js/wizard/wizard_scripts.js"></script>
  <script src="<?= base_url();?>/public/front-theme/js/wizard/wizard_func.js"></script> -->
  <!-- SPECIFIC SCRIPTS -->
  <script src="<?= base_url();?>/public/front-theme/js/sticky_sidebar.min.js"></script>
  <script src="<?= base_url();?>/public/front-theme/js/specific_listing.js"></script>
  <script src="<?php echo base_url();?>/theme/plugins/sweetalerts/sweetalert2.min.js"></script>
  <script src="<?php echo base_url();?>/theme/plugins/sweetalerts/custom-sweetalert.js"></script>
  <script src="<?php echo base_url(); ?>/theme/plugins/bootstrap-select/bootstrap-select.min.js"></script>

  <script src="<?php echo base_url();?>/theme/plugins/autocomplete/jquery.mockjax.js"></script>
  <script src="<?php echo base_url();?>/theme/plugins/autocomplete/jquery.autocomplete.js"></script>
  <script src="<?php echo base_url();?>/theme/plugins/autocomplete/countries.js"></script>
  <script src="<?php echo base_url();?>/theme/plugins/autocomplete/demo.js"></script>
  <script src="<?= base_url();?>/public/front-theme/js/specific_detail.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  
  
  <script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
  </script>
  <script src="<?php echo base_url();?>/js/front.js"></script>
  <script src="<?php echo base_url();?>/js/script.js"></script>
  <!-- COLOR SWITCHER  -->
  <script src="<?= base_url();?>/public/front-theme/js/switcher.js"></script>
  <script src="<?php echo base_url(); ?>/theme/plugins/dropify/dropify.min.js"></script>
  <script src="<?php echo base_url(); ?>/theme/assets/js/components/custom-scroll_bars_basic.js"></script>
  <script>
    $('.dropify').dropify({
      messages: {
        'default': 'Click to Upload or Drag n Drop',
        'remove': '<i class="flaticon-close-fill"></i>',
        'replace': 'Upload or Drag n Drop'
      }
    });
  </script>
  <!-- <div id="style-switcher">
    <h6>Color Switcher <a href="#"><i class="icon_cog"></i></a></h6>
    <div>
      <ul class="colors" id="color1">
        <li><a href="#" class="default" title="Default"></a></li>
        <li><a href="#" class="aqua" title="Aqua"></a></li>
        <li><a href="#" class="orange" title="Orange"></a></li>
        <li><a href="#" class="beige" title="Beige"></a></li>
        <li><a href="#" class="gray" title="Gray"></a></li>
        <li><a href="#" class="green-2" title="Green"></a></li>
        <li><a href="#" class="purple" title="Purple"></a></li>
        <li><a href="#" class="red" title="Red"></a></li>
        <li><a href="#" class="violet" title="Violet"></a></li>
      </ul>
    </div>
  </div> -->
</body>
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-responsive").select2({
    searchInputPlaceholder: 'Search state...'
  });
});
$(document).ready(function(){
$('.image-popup-vertical-fit').magnificPopup({
  type: 'image',
  mainClass: 'mfp-with-zoom', 
  gallery:{
      enabled:true
    },

  zoom: {
    enabled: true, 

    duration: 300, // duration of the effect, in milliseconds
    easing: 'ease-in-out', // CSS transition easing function

    opener: function(openerElement) {

      return openerElement.is('img') ? openerElement : openerElement.find('img');
  }
}

});

});

</script>
<script>
function AddReadMore() {
    //This limit you can set after how much characters you want to show Read More.
    var carLmt = 62;
    // Text to show when text is collapsed
    var readMoreTxt = " ... Read More";
    // Text to show when text is expanded
    var readLessTxt = " Read Less";


    //Traverse all selectors with this class and manupulate HTML part to show Read More
    $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
            return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
            $(this).html(strtoadd);
        }

    });
    //Read More and Read Less Click Event binding
    $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
$(function() {
    //Calling function after Page Load
    AddReadMore();
});

</script>
<script>
/* To Disable Inspect Element */
$(document).bind("contextmenu",function(e) {
 e.preventDefault();
});

$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
</script>
</html>