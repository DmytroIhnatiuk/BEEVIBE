// import Swiper from 'swiper'
// import {
// 	Autoplay,
// 	Navigation,
// 	Pagination,
// 	EffectFade,
// 	Thumbs,
// } from 'swiper/modules'
// import { getElement, getElements } from '../core/index.js'

// function mainFrameSlider() {
// 	const item = document.querySelector('[data-swiper="mainFrameSlider"]')
// 	if (!item) return

// 	new Swiper('[data-swiper="mainFrameSlider"]', {
// 		modules: [Navigation, Pagination],
// 		slidesPerView: 1,
// 		spaceBetween: 20,
// 		loop: true,
// 		navigation: {
// 			nextEl: item.querySelector('.btn-next'),
// 			prevEl: item.querySelector('.btn-prev'),
// 		},
// 		pagination: {},
// 		el: item.querySelector('.swiper-pagination'),
// 	})
// }

// export { mainFrameSlider }
import Swiper from 'swiper'
import {
	Autoplay,
	Navigation,
	Pagination,
	EffectFade,
	Thumbs,
} from 'swiper/modules'
import { getElement, getElements } from '../core/index.js'

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

export {
	mainFrameSlider,
	topSalesSlider,
	newSlider,
	reviewsSlider,
	reviewsVideoSlider,
	resultsSwiper,
}
