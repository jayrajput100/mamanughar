
<?= $this->extend('frontend/layout/front_layout2')?>

<?= $this->section('content')?>
<style type="text/css">
	.margin_60_20 {
    padding-top: 60px;
    padding-bottom: 20px;
}
</style>
<main>
		 <div class="hero_single inner_pages background-image" data-background="background: #f6f1d3  center center no-repeat;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;">
			 <div class="opacity-mask" style="background-color:#f6f1d3 !important;">
				 <div class="container">
					 <div class="row justify-content-center">
						 <div class="col-xl-9 col-lg-10 col-md-8">
							 <h1>Contact Packagio </h1>
							 <p style="color:black">Find Your Packaging. </p>
						 </div>
					 </div>
					 <!-- /row -->
				 </div>
			 </div>
			 <div class="wave gray hero"></div>
		 </div>
		 <!-- /hero_single -->

		 <div class="bg_gray">
		     <div class="container margin_60_40">
		         <div class="row justify-content-center">
		             <div class="col-lg-6">
		                 <div class="box_contacts">
		                     <i class="icon_lifesaver"></i>
		                     <h2>Help Center </h2>
		                     <a href="mailto:admin@packagio.in">admin@packagio.in</a>
		                     <small>MON to FRI 9am-6pm </small>
		                 </div>
		             </div>
		             <div class="col-lg-6">
		                 <div class="box_contacts">
		                     <i class="icon_pin_alt"></i>
		                     <h2>Address </h2>
		                     <div>C-11, (PULEEN PARK-1) PARITA PARK, OPP GAUTAM APRT, NR. MACHHALI
                                  CIRCLE, NARODA GAM, NARODA, AHMEDABD,
                                  GUJARAT, 382330
                                  INDIA </div>
		                    
		                 </div>
		             </div>
		             
		         </div>
		         <!-- /row -->
		     </div>
		     <!-- /container -->
		 </div>
		 <!-- /bg_gray -->

		 <div class="container margin_60_20">
		     <h5 class="mb_5">Drop Us a Line </h5>
		     <div class="row">
		         <div class="col-lg-4 col-md-6 add_bottom_25">
		             <div id="message-contact"></div>
			             <form method="post" action="#" id="form" autocomplete="off">
			             	<input type="hidden" id="action" value="sendmail">
          	                <input type="hidden" id="actionmsg" value="Please wait...!">
			                 <div class="form-group">
			                     <input class="form-control" type="text" placeholder="Name" id="name_contact" name="name_contact" required="true" />
			                 </div>
			                 <div class="form-group">
			                     <input class="form-control" type="email" placeholder="Email" id="email_contact" name="email_contact" required="true"/>
			                 </div>
			                 <div class="form-group">
			                     <textarea class="form-control" style="height: 150px;" placeholder="Message" id="message_contact" name="message_contact" required="true"></textarea>
			                 </div>
			                 
			                 <div class="form-group">
			                     <input class="btn_1 gradient full-width" type="submit" value="Submit" id="submit-contact" />
			                 </div>
			             </form>
			         </div>
		             <div class="col-lg-8 col-md-6 add_bottom_25">
		                 <iframe class="map_contact" src="https://www.google.com/maps/d/embed?mid=1aQ27zR_KuOHvQYYKT5YGjrvExwePYMuc&ll=23.072893140233262%2C72.6603422&z=18" allowfullscreen=""></iframe>
		             </div>
		         </div>
		     </div>
		     <!-- /row -->
		 </div> 
		 <!-- /container -->

	 </main>
<?= $this->endSection('content')?>