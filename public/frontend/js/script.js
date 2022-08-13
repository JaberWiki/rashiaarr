
window.addEventListener('load', () => {
    // document.querySelector('.navigation__content-another').style.display = 'none';
     workedCarousel();
  
});





function navbarToggler() {
    $('.navbar-toggler').click(function () {
        $('#nav-icon').toggleClass('close');

    });
}

navbarToggler();


function workedCarousel() {
    $(".worked-carousel").owlCarousel({
        loop: true,
        freeDrag: true,
        merge: true,
        lazyLoad: true,
        lazyLoadEager: 1,
        fluidSpeed: true,
        margin: 0,
        autoplay: true,
        autoHeight: true,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 4
            }
        }
    });
}






 wow = new WOW({
    boxClass: "wow",
    animateClass: "animated",
    offset: 0,
    mobile: true,
    live: true
});
wow.init();
$(document).ready(function () {
    $('[data-toggle="popover"]').popover(); 

});




/***************** FOR SCROLLING UP ***************/

$(document).ready(function(){

    $(function(){
     
        $(document).on( 'scroll', function(){
     
            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
     
        $('.scroll-top-wrapper').on('click', scrollToTop);
    });
     

    function scrollToTop() {

        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
    }
    
    });


    $(function(){
        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');
      
        $('.nav-tabs a').click(function (e) {
          $(this).tab('show');
          var scrollmem = $('body').scrollTop();
          window.location.hash = this.hash;
          $('html,body').scrollTop(scrollmem);
        });
      });





