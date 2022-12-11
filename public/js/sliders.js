var swiper = new Swiper(".main_brand_slider", {
    slidesPerView: 8,
    spaceBetween: 30,

    loop: true,
    loopFillGroupWithBlank: true,

    navigation: {
      nextEl: ".btn_right",
      prevEl: ".btn_left",
    },
  });

var swiper = new Swiper(".main_banner_slider", {
  pagination: {
    el: ".banner_controll",
    clickable: true,
  },
});
