// Particles Dark

jQuery(document).ready(function () {

  //Home Gallery Slider
  jQuery('#home-gallery').owlCarousel({
    nav : true, // Show next and prev buttons
    margin : 15,
    slideSpeed : 300,
    dots : false,
    loop : true,
    autoPlay : true,
    singleItem: false,
    responsive:{
       0:{
          items: 1
       },
       575:{
          items: 2
       },
       768:{
          items: 3,
          margin: 15
       },
       992:{
          items:4,
          margin: 20
       }
    }
  });


});