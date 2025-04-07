import {
	productSliderMain,
	reviewsSlider,
	reviewsVideoSlider,
	resultsSwiper,
	topSalesSlider,
} from '../modules/sliders.js'
import Form from '../modules/Form.js'
import accordion from '../modules/accordion.js'
import initTabs from '../modules/tabs.js'

window.addEventListener('DOMContentLoaded', () => {
	try {
		initTabs()
		productSliderMain()
		reviewsSlider()
		reviewsVideoSlider()
		resultsSwiper()
		topSalesSlider()
	} catch (e) {
		console.log(e)
	}

	const volumeButtons = document.querySelectorAll('.volume-btn')
	volumeButtons.forEach(btn => {
		btn.addEventListener('click', () => {
			volumeButtons.forEach(b => b.classList.remove('active'))
			btn.classList.add('active')
		})
	})
	const quantityInput = document.querySelector('.qty-input')
	const increaseBtn = document.querySelector('[data-action="increase"]')
	const decreaseBtn = document.querySelector('[data-action="decrease"]')

	increaseBtn.addEventListener('click', () => {
		quantityInput.value = parseInt(quantityInput.value) + 1
	})

	decreaseBtn.addEventListener('click', () => {
		if (parseInt(quantityInput.value) > 1) {
			quantityInput.value = parseInt(quantityInput.value) - 1
		}
	})

	quantityInput.addEventListener('input', () => {
		if (quantityInput.value === '' || parseInt(quantityInput.value) < 1) {
			quantityInput.value = 1
		}
	})

	const tabAdvances = (
		containerSelector,
		tabButtonSelector,
		tabContentSelector,
		activeClass = 'active'
	) => {
		const containers = document.querySelectorAll(containerSelector)
		if (!containers.length) return

		containers.forEach(container => {
			const tabButtons = container.querySelectorAll(tabButtonSelector)
			const tabContents = container.querySelectorAll(tabContentSelector)

			if (!tabButtons.length || !tabContents.length) return

			// Функція для оновлення висоти активного контенту
			const setContentHeight = () => {
				tabContents.forEach((content, index) => {
					if (content.classList.contains(activeClass)) {
						content.style.maxHeight = `${content.scrollHeight}px`
					} else {
						content.style.maxHeight = '0'
					}
				})
			}

			// Перевірка, чи вже є активний таб
			const hasActiveTab = Array.from(tabButtons).some(btn =>
				btn.classList.contains(activeClass)
			)

			// Якщо немає активного табу — активуємо перший
			if (!hasActiveTab) {
				tabButtons[0].classList.add(activeClass)
				tabContents[0].classList.add(activeClass)
			}

			setContentHeight()

			// Обробка кліку
			tabButtons.forEach((btn, index) => {
				btn.addEventListener('click', () => {
					tabButtons.forEach(b => b.classList.remove(activeClass))
					tabContents.forEach(c => c.classList.remove(activeClass))

					btn.classList.add(activeClass)
					tabContents[index].classList.add(activeClass)

					setContentHeight()
				})
			})

			// Оновлювати висоту при ресайзі
			window.addEventListener('resize', setContentHeight)
		})
	}

	tabAdvances('.tabs-customize', '.btn-customize', '.content-customize')
})
