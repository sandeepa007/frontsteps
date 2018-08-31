// Particles Dark

jQuery(document).ready(function () {

  //Home Gallery Slider
  // Testimonials Slider
   jQuery('#owl-testimonials').owlCarousel({
     nav : true, // Show next and prev buttons
     margin : 30,
     slideSpeed : 300,
     dots : false,
     loop : true,
     autoPlay : true,
     singleItem: false,
     responsive:{
        0:{
           items:1,
           nav:true
        },
        575:{
           items:1,
           nav:true
        },
        768:{
           items:1,
           nav:true
        },
        992:{
           items:1,
           nav:true
        }
     }
   });

});