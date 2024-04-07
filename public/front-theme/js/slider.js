const $owlCarousel = $("#carousel-home .owl-carousel").owlCarousel({
  loop:true,
         margin:10,
         autoplay:true,
         autoplayHoverPause:true,
         responsiveClass:true,
         smartSpeed: 3500,
     
         fluidSpeed:true,
         dots:false,
         responsive:{
             0:{
                 items:2,
                 nav:true
             },
             600:{
                 items:4,
                 nav:true
             },
             1000:{
                 items:4,
                 nav:true,
         
                 autoplay:true
         
                 
             }
         }
});
$("#carousel-home1 .jx").owlCarousel({
        loop:true,
         margin:10,
         autoplay:true,
         autoplayHoverPause:true,
         responsiveClass:true,
         smartSpeed: 3500,
         fluidSpeed:true,
         dots:false,
         responsive:{
             0:{
                 items:1,
                 nav:true
             },
             600:{
                 items:2,
                 nav:true
             },
             1000:{
                 items:2,
                
         
                 autoplay:true
         
                 
             }
         }
});
$(".xj").owlCarousel({
        loop:true,
         margin:10,
         autoplay:true,
         autoplayHoverPause:true,
         responsiveClass:true,
         smartSpeed: 3500,
         fluidSpeed:true,
         dots:false,
         responsive:{
             0:{
                 items:1,
                 nav:true
             },
             600:{
                 items:2,
                 nav:true
             },
             1000:{
                 items:4,
                
         
                 autoplay:true
         
                 
             }
         }
});