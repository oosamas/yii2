
          $(document).ready(function(){
           
             $('.courses_slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            nav:true,
            dots:true,
            // autoplay: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]

            });

            $('.testimonial_slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            nav:true,
            dots:true,
            // autoplay: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]

            }); 

             

          });
   

      
     $('.count').each(function () {
     $(this).prop('Counter',0).animate({
     Counter: $(this).text()
     }, {
     duration: 4000,
     easing: 'swing',
     step: function (now) {
         $(this).text(Math.ceil(now));
     }
     });
     });

 
$(document).ready(function(){
    $('.dropdown').hover(function(){
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function(){
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
});
 
              
      