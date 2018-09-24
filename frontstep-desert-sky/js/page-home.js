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

function counter(e) {
   //var element   = event.target;         // DOM element, in this example .owl-carousel
    var count = e.item.count;
    
    // When carousel is infinite,
    // there's a certain offset to the first item.
    // We'll try to remove it to do our calculations.
    var offset = Math.floor((count + 1) / 2);
    //alert(offset);
    // This posittion index includes some offset.
    var index = e.item.index+1;
    //alert(index);
    if (index > 0) {
      index -= offset;
    }
    // If the index is still bigger than the number of items
    // (or equal, since it starts at 0),
    // It must be the first element, so let's remove that offset, too.
    if (index > count) {
      index -= count;
    }
    
   $('#owl-counter').html(index+" / "+count)
}

});