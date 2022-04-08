$(document).ready(function(){
    $('.flex__list-container').slick({
        dots: false,
        infinite: true,
        speed: 1500,
        autoplay: false,
        autoplaySpeed: 600,
        slidesToScroll:2,
        slidesToShow:5,
        arrows:false,
        responsive: [
          {
              breakpoint:2500,
              settings: {
                  slidesToShow: 5,
                  slidesToScroll: 4,
                  infinite: true,
              }
          },
          {
              breakpoint:1024,
              settings: {
                  slidesToShow: 5,
                  slidesToScroll:4,
                  infinite: true,
              }
          },
          {
              breakpoint:769,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 2,
                  infinite: true,
              }
          },
          {
              breakpoint:480,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 2,
                  infinite: true,
                  dots:false,
              }
          },
      ]
    });
  });


