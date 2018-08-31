
/* CUSTOM FUNCTIONS */

jQuery(document).ready(function () {

   /* Header */
   jQuery(function() {
      var header = jQuery("#header");
      jQuery(window).scroll(function() {    
         var scroll = jQuery(window).scrollTop();
         if (scroll >= 200) {
            header.removeClass('lightheader').addClass("darkheader");
         } else {
            header.removeClass("darkheader").addClass('lightheader');
         }
      });
   });


   /* SCROLL-TO-PAGE */
   jQuery(function() {
      jQuery('.dropdown-menu a').click(function() {
         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
               jQuery('html,body').animate({
                  scrollTop: target.offset().top-100
               }, 700);
               return false;
            }
         }
      });
   });
  
  
   jQuery('ul.nav li.dropdown').hover(function() {
      jQuery(this).addClass('sfhover');
      jQuery(this).find('.dropdown-menu').stop(true, true).fadeIn(500);
   }, function() {
      jQuery(this).removeClass('sfhover');
      jQuery(this).find('.dropdown-menu').stop(true, true).fadeOut(500);
   });


   jQuery('#mobile-menu ul li span').click(function(){
     jQuery('.dropdown-menu').css('display','block');
   });

   jQuery('.fa-angle-down').click(function() {
     if(jQuery(this).parent().hasClass('open')) {
       jQuery(this).parent().removeClass('open');
       jQuery(this).prev( ".second" ).slideUp()
     }else{
       jQuery(this).parent().addClass('open');
       jQuery(this).prev( ".second" ).slideDown();
     }
   });

});