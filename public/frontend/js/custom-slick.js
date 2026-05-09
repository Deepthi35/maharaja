$(function() {


    


    $('.home-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });




    $('.dishes-items').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        infinite: true,
        speed: 1000,
        fade: false,
        cssEase: 'linear',
        responsive: [{
            breakpoint: 1300,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
    });









    $('.two-items-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        arrows: false,
        dots: true,
        infinite: true,
        speed: 1500,
        fade: false,
        cssEase: 'linear'
    });

    $('.three-items-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        arrows: false,
        dots: true,
        infinite: false,
        speed: 1500,
        fade: false,
        cssEase: 'linear',
        responsive: [{
            breakpoint: 1366,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
    });










    
    $('.single-slide-dots').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        arrows: false,
        dots: true,
        infinite: true,
        speed: 1500,
        fade: false,
        cssEase: 'linear'
    });





    $('.testimonials').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        arrows: true,
        dots: false,
        infinite: true,
        speed: 1500,
        fade: false,
        cssEase: 'linear',
        responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
    ]
    });

    $('.our-brands').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 10000,      
        arrows: false,
        dots: true,
        infinite: true,
        speed: 1500,
        fade: false,
        cssEase: 'linear'
      });



      $('.foot-cat').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
      
        arrows: true,
        dots: false,
        infinite: true,
        speed: 200,
        fade: false,
        cssEase: 'linear'
      });









   
    $('.four-items').slick({
        adaptiveHeight: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        infinite: true,
        speed: 500,
        fade: false,
        cssEase: 'linear',
        responsive: [{
                breakpoint: 1366,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
 

    $('.four-items-dots').slick({
        adaptiveHeight: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true,
        infinite: true,
        speed: 500,
        fade: false,
        cssEase: 'linear',
        responsive: [

            {
            
                breakpoint: 1700,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            
            {
            
                breakpoint: 1366,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
 




    $('.reviews-for').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.reviews-nav',
        responsive: [{
            breakpoint: 1366,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
        
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            
            }
        }
    ]
});

      $('.reviews-nav').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.reviews-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 1366,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                  arrows: false,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
            }
        }
    ]
});

          






    
  });