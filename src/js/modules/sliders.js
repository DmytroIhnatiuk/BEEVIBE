import Swiper from 'swiper'
import {
    Navigation,
    Pagination,
    Thumbs,
} from 'swiper/modules'
import {getElement, getElements} from '../core/index.js'

function mainFrameSlider() {
    const item = document.querySelector('[data-swiper="mainFrameSlider"]')
    if (!item) return

    new Swiper(item, {
        modules: [Navigation, Pagination],
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: item.querySelector('.btn-next'),
            prevEl: item.querySelector('.btn-prev'),
        },
        pagination: {
            el: item.querySelector('.swiper-pagination'),
            clickable: true,
        },
    })
}

function topSalesSlider() {
    const item = document.querySelector('[data-swiper="topSalesSlider"]')
    if (!item) return

    new Swiper(item, {
        modules: [Navigation],
        slidesPerView: 1.7,
        spaceBetween: 20,
        breakpoints: {
            640: {
                slidesPerView: 2.6,
            },
            1024: {
                slidesPerView: 4,
            },
        },

        navigation: {
            nextEl: item.querySelector('.next'),
            prevEl: item.querySelector('.prev'),
        },
    })
}

function newSlider() {
    const item = document.querySelector('[data-swiper="newSlider"]')
    if (!item) return

    new Swiper(item, {
        modules: [Navigation],
        slidesPerView: 1.7,
        spaceBetween: 20,
        breakpoints: {
            640: {
                slidesPerView: 2.6,
            },
            1024: {
                slidesPerView: 3,
            },
        },

        navigation: {
            nextEl: item.querySelector('.next'),
            prevEl: item.querySelector('.prev'),
        },
    })
}

function reviewsSlider() {
    const item = document.querySelector('[data-swiper="reviewsSlider"]')
    if (!item) return

    new Swiper(item, {
        modules: [Navigation],
        slidesPerView: 1.4,
        spaceBetween: 20,
        breakpoints: {
            640: {
                slidesPerView: 2.3,
            },
            1024: {
                slidesPerView: 4,
            },
        },

        navigation: {
            nextEl: item.querySelector('.next'),
            prevEl: item.querySelector('.prev'),
        },
    })
}

function reviewsVideoSlider() {
    const item = document.querySelector('[data-swiper="reviewsVideoSlider"]')
    if (!item) return

    new Swiper(item, {
        modules: [Navigation],
        slidesPerView: 1.4,
        spaceBetween: 20,
        breakpoints: {
            640: {
                slidesPerView: 2.3,
            },
            1024: {
                slidesPerView: 4,
            },
        },

        navigation: {
            nextEl: item.querySelector('.next'),
            prevEl: item.querySelector('.prev'),
        },
    })
}

function resultsSwiper() {
    const item = document.querySelector('[data-swiper="resultsSwiper"]')
    if (!item) return

    new Swiper(item, {
        modules: [Navigation],
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            1024: {
                slidesPerView: 2,
            },
        },

        navigation: {
            nextEl: item.querySelector('.next'),
            prevEl: item.querySelector('.prev'),
        },
    })
}

function productSliderMain() {
    const mainSliderEl = document.querySelector('[data-swiper="productSlider"]')
    const navSliderEl = document.querySelector('[data-swiper="productSliderNav"]')

    if (!mainSliderEl || !navSliderEl) return

    const sliderNav = new Swiper('[data-swiper="productSliderNav"]', {
        modules: [Navigation],
        slidesPerView: 4,
        spaceBetween: 6,
        direction: 'horizontal',
        watchSlidesProgress: true,
        breakpoints: {
            640: {
                direction: 'vertical',
                spaceBetween: 16,
            },
        },
    })

    new Swiper('[data-swiper="productSlider"]', {
        modules: [Thumbs],
        slidesPerView: 1,
        spaceBetween: 20,
        thumbs: {
            swiper: sliderNav,
        },
    })
}

export {
    mainFrameSlider,
    topSalesSlider,
    newSlider,
    reviewsSlider,
    reviewsVideoSlider,
    resultsSwiper,
    productSliderMain,
}
