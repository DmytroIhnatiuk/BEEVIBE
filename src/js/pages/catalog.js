import dropdown from '../modules/dropdown.js'
import accordion from '../modules/accordion.js'
import { reviewsVideoSlider, reviewsSlider } from '../modules/sliders.js'
import initTabs from '../modules/tabs.js'
import Form from '../modules/Form.js'

window.addEventListener('DOMContentLoaded', () => {
	const filterBtn = document.querySelector('.filter-btn')
	const filterBlocks = document.querySelectorAll(
		'.filter-btn, .projects-filter'
	)

	if (window.innerWidth < 1024) {
		filterBtn.addEventListener('click', function () {
			filterBlocks.forEach(block => block.classList.toggle('active'))
		})
	}

	const fromSlider = document.querySelector('[data-range="min"]')
	const toSlider = document.querySelector('[data-range="max"]')
	const fromInput = document.querySelector('[data-price="min"]')
	const toInput = document.querySelector('[data-price="max"]')

	function controlFromSlider(fromSlider, toSlider, fromInput) {
		const [from, to] = getParsed(fromSlider, toSlider)
		fillSlider(fromSlider, toSlider, '#F3F3F3', '#252525', toSlider)
		fromInput.innerHTML = (from > to ? to : from) + ' грн'
		if (from > to) fromSlider.value = to
	}

	function controlToSlider(fromSlider, toSlider, toInput) {
		const [from, to] = getParsed(fromSlider, toSlider)
		fillSlider(fromSlider, toSlider, '#F3F3F3', '#252525', toSlider)
		setToggleAccessible(toSlider)
		if (from <= to) {
			toSlider.value = to
			toInput.innerHTML = to + ' грн'
		} else {
			toSlider.value = from
			toInput.innerHTML = from + ' грн'
		}
	}

	function getParsed(from, to) {
		return [parseInt(from.value, 10), parseInt(to.value, 10)]
	}

	function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
		const rangeDistance = to.max - to.min
		const fromPosition = from.value - to.min
		const toPosition = to.value - to.min
		controlSlider.style.background = `linear-gradient(
			to right,
			${sliderColor} 0%,
			${sliderColor} ${(fromPosition / rangeDistance) * 100}%,
			${rangeColor} ${(fromPosition / rangeDistance) * 100}%,
			${rangeColor} ${(toPosition / rangeDistance) * 100}%, 
			${sliderColor} ${(toPosition / rangeDistance) * 100}%, 
			${sliderColor} 100%)`
	}

	function setToggleAccessible(currentTarget) {
		const toSlider = document.querySelector('#toSlider')
		toSlider.style.zIndex = Number(currentTarget.value) <= 0 ? 2 : 0
	}

	fromInput.innerHTML = fromSlider.value + ' грн'
	toInput.innerHTML = toSlider.value + ' грн'
	fillSlider(fromSlider, toSlider, '#F3F3F3', '#252525', toSlider)
	setToggleAccessible(toSlider)

	fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput)
	toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput)

	try {
		dropdown()
		accordion(
			'.accordion-filter',
			'.accordion-filter-header',
			'.accordion-filter-content'
		)
		initTabs()
		reviewsVideoSlider()
		reviewsSlider()
		new Form('.form').init()
	} catch (e) {
		console.log(e)
	}
})
