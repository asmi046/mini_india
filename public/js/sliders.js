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

        1024: {
            slidesPerView: 5,
          },

        768: {
          slidesPerView: 4,
        },
    }
  });

var brandSlider = new Swiper(".main_banner_slider", {
    pagination: {
        el: ".banner_controll",
        clickable: true,
    },

    autoplay: {
        delay: 6000,
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

var new_tovar_slider = new Swiper(".new_tovar_slider", {
    slidesPerView: 1,
    loop: true,
    spaceBetween: 30,
    autoHeight:true,
    navigation: {
        nextEl: "#nts_right",
        prevEl: "#nts_left",
    },

    breakpoints: {

		480: {
			slidesPerView: 1,
		},

		768: {
			slidesPerView: 2,
		},


		1024: {
			slidesPerView: 4,
		},
	},
});
