function imgRotate(el, timeout, delay) {

    setTimeout(() => {
    
        setInterval(() => {
    
        const $logoarr = $(el);
    
        $logoarr.each((index) => {
    
        const current = $logoarr.eq(index).find(".technologies__content.active");
        current.removeClass("active");
        console.log("current", current);
        if(current.is(":last-child")) {
            $logoarr.eq(index).find(".technologies__content").eq(0).addClass("active");
            console.log("aa");
        } else {
            current.next().addClass("active");
            console.log("bb");
        }
    
        });
    
    
    
        }, timeout);
      
    }, delay);
}

$(function() { 

    var initialDelays = [
        0,
        2250,
        4600,
        5650,
        3700,
        2350,
        3100,
        5050,
        3400,
        4050,
        1600,
        2850,
    ];

    $('.technologies__item').each(function(index){
        imgRotate($(this), 2500, initialDelays[index]);
    })
});

$('.slider-technologies').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    centerMode: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
          arrows: false,
          dots: false,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          arrows: false,
          dots: false,
          slidesToScroll: 2
        }
      }
    ]
  });