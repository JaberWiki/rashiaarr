/*typed--js */
var typedOne = new Typed(".typeOne", {
    strings: ["websites.", "apps.", "processes.", "relationships.", "ideas.", "strategies."],
    typeSpeed: 100,
    backSpeed: 100,
    loop: !0
});

var typedTwo = new Typed(".typeTwo", {
    strings: ["trust.", "think about.", "use.", "enjoys.", "want.", "connect with."],
    typeSpeed: 100,
    backSpeed: 100,
    loop: !0
});



$("#testimonial-carousel").owlCarousel({
    loop: !0,
    items: 2,
    margin: 50,
    autoplay: !0,
    nav: !0,
    navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
    responsive: {
        0: {
            items: 1
        },
        767: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});


// Leader owl carousel
var owl = $('.leader-carousel');
owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2200,
    autoplayHoverPause: true
});
$('.leader-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 1
        }
    }
})

// Partner owl carousel

//var owl = $('.partner-carousel');
//owl.owlCarousel({
//    items: 4,
//    loop: true,
//    margin: 2,
//    autoplay: true,
//    autoplayTimeout: 2000,
//    autoplayHoverPause: true
//});
//$('.partner-carousel').owlCarousel({
//    loop: true,
//    margin: 2,
//    nav: true,
//    responsive: {
//        0: {
//            items: 1
//        },
//        767: {
//            items: 2
//        },
//        1000: {
//            items: 3
//        }
//    }
//})

$('.partner-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    responsive: {
        0: {
            items: 2

        },
        600: {
            items: 3

        },
        1000: {
            items: 4

        }
    }
})

// Client owl carousel

//var owl = $('.client-carousel');
//owl.owlCarousel({
//    items: 4,
//    loop: true,
//    margin: 10,
//    autoplay: true,
//    autoplayTimeout: 2500,
//    autoplayHoverPause: true
//});
//$('.client-carousel').owlCarousel({
//    loop: true,
//    margin: 10,
//    nav: true,
//    responsive: {
//        0: {
//            items: 1
//        },
//        767: {
//            items: 2
//        },
//        1000: {
//            items: 3
//        }
//    }
//})


$('.client-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    responsive: {
        0: {
            items: 2

        },
        600: {
            items: 3

        },
        1000: {
            items: 4

        }
    }
})
