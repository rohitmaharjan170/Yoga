
$(window).scroll(function() {
    console.log($(window).scrollTop())
    if ($(window).scrollTop() > 63) {
        $('.navbar').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 64) {
        $('.navbar').removeClass('navbar-fixed');
    }
});


(function($) {

    //Function to animate slider captions
    function doAnimations(elems) {
        //Cache the animationend event in a variable
        var animEndEv = 'webkitAnimationEnd animationend';

        elems.each(function() {
            var $this = $(this),
                $animationType = $this.data('animation');
            $this.addClass($animationType).one(animEndEv, function() {
                $this.removeClass($animationType);
            });
        });
    }

    //Variables on page load
    var $myCarousel = $('#carouselExampleControls'),
        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

    //Initialize carousel
    $myCarousel.carousel();

    //Animate captions in first slide on page load
    doAnimations($firstAnimatingElems);

    //Pause carousel
    $myCarousel.carousel('pause');

    //Other slides to be animated on carousel slide event
    $myCarousel.on('slide.bs.carousel', function(e) {
        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
        doAnimations($animatingElems);
    });

    $(document).ready(function() {
        $(".owl-one").owlCarousel({
            items: 4,
            nav: true,
            loop: true,
            autoplay: true,
           
            autoplayHoverPause: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        // $('#owl-two').owlCarousel({
        //     items: 3,
        //     nav: true,
        //     loop: true,
        //     autoplay: true,
        //     // autoplayTimeout: 5000,
        //     autoplayHoverPause: true,

        //     responsive: {
        //         0: {
        //             items: 1
        //         },
        //         600: {
        //             items: 2
        //         },
        //         1000: {
        //             items: 3
        //         }
        //     }
        // });
    });
    $(document).ready(function() {
        $(".owl-two").owlCarousel({
            items: 4,
            nav: true,
            loop: true,
            autoplay: true,

            autoplayHoverPause: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        // $('#owl-two').owlCarousel({
        //     items: 3,
        //     nav: true,
        //     loop: true,
        //     autoplay: true,
        //     // autoplayTimeout: 5000,
        //     autoplayHoverPause: true,

        //     responsive: {
        //         0: {
        //             items: 1
        //         },
        //         600: {
        //             items: 2
        //         },
        //         1000: {
        //             items: 3
        //         }
        //     }
        // });
    });

    $('#openSearch').click(function() {
        let div = document.getElementById('myOverlay');
        div.classList.remove('close')
        div.classList.add('open')
    });
    $('#closeSearch').click(function() {
        let div = document.getElementById('myOverlay');
        div.classList.add('close')
        div.classList.remove('open')
    });

})(jQuery);
