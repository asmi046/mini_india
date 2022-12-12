var swiper = new Swiper(".main_brand_slider", {
    slidesPerView: 2,
    spaceBetween: 30,

    loop: true,
    loopFillGroupWithBlank: true,

    navigation: {
      nextEl: ".btn_right",
      prevEl: ".btn_left",
    },

    breakpoints: {
        1920:{
            slidesPerView: 8,
        },

        768: {
          slidesPerView: 5,
        }

    }
  });

var swiper = new Swiper(".main_banner_slider", {
  pagination: {
    el: ".banner_controll",
    clickable: true,
  },
});
