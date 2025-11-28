if (document.querySelector('.galleries')) {
    const $class = 'galleries';

    const swiperGallery1 = new Swiper(`.${$class}__carousel-1`, {
        wrapperClass: `${$class}__ribbon-1`,
        slideClass: `${$class}__panel-1`,
        direction: 'horizontal',
        loop: true,
        speed: 700,
        centeredSlides: true,
        navigation: {
            prevEl: `.controller-for-gallery1-left`,
            nextEl: `.controller-for-gallery1-right`,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 35,
                allowTouchMove: true,
            },
            768: {
                slidesPerView: 1.5,
                spaceBetween: 35,
                allowTouchMove: true,
            },
            1280: {
                slidesPerView: 2,
                spaceBetween: 35,
                allowTouchMove: true,
            },
        },
        on: {
            init: function () {
                document.querySelector(`.${$class}__gallery--1`).classList.add(`${$class}__gallery--active`);
            },
        },
    });

    const swiperGallery2 = new Swiper(`.${$class}__carousel-2`, {
        wrapperClass: `${$class}__ribbon-2`,
        slideClass: `${$class}__panel-2`,
        direction: 'horizontal',
        loop: true,
        speed: 700,
        centeredSlides: true,
        navigation: {
            prevEl: `.controller-for-gallery2-left`,
            nextEl: `.controller-for-gallery2-right`,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 35,
                allowTouchMove: true,
            },
            768: {
                slidesPerView: 1.5,
                spaceBetween: 35,
                allowTouchMove: true,
            },
            1280: {
                slidesPerView: 2,
                spaceBetween: 35,
                allowTouchMove: true,
            },
        },
        on: {
            init: function () {
                document.querySelector(`.${$class}__gallery--2`).classList.add(`${$class}__gallery--active`);
            },
        },
    });
}