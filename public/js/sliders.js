var swiper = new Swiper(".main_brand_slider", {
    slidesPerView: 2,
    spaceBetween: 30,

    loop: true,
    loopFillGroupWithBlank: true,

    navigation: {
      nextEl: "#brand_btn_right",
      prevEl: "#brand_btn_left",

    },

    breakpoints: {
        1920:{
            slidesPerView: 6,
        },

        768: {
          slidesPerView: 3,
        }
    }
  });

var brandSlider = new Swiper(".main_banner_slider", {
  pagination: {
    el: ".banner_controll",
    clickable: true,
  },
});

var tovarSlider = new Swiper(".tovar_slider", {
    slidesPerView: 1,
    loop: true,
    navigation: {
        nextEl: ".tovar_slider .btn_right",
        prevEl: ".tovar_slider .btn_left",
    },
});
