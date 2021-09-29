$('.slider-portfolio').slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 300,
  variableWidth: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1291,
      settings: {
        slidesToShow: 2,
        arrows: true,
        dots: false,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        arrows: false,
        dots: true,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        arrows: false,
        centerMode: true,
        dots: true,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        arrows: false,
        dots: true,
        centerMode: true,
        slidesToScroll: 1
      }
    }
  ]
});