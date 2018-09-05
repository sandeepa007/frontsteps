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
     onInitialized  : counter,
     onTranslated : counter,
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

function counter(event) {
   var element   = event.target;         // DOM element, in this example .owl-carousel
    var items     = event.item.count;     // Number of items
    var item      = event.item.index + 1;     // Position of the current item
  $('#owl-counter').html(item+" / "+items)
  }

});