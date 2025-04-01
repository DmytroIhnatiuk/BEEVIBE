import {
	mainFrameSlider,
	topSalesSlider,
	newSlider,
	reviewsSlider,
	reviewsVideoSlider,
	resultsSwiper,
} from '../modules/sliders.js'
import Form from '../modules/Form.js'
import accordion from '../modules/accordion.js'
import initTabs from '../modules/tabs.js'

window.addEventListener('DOMContentLoaded', () => {
	try {
		if (window.innerWidth < 1024) {
			accordion('.accordion', '.accordion-header', '.accordion-content')
		}
		mainFrameSlider()
		topSalesSlider()
		newSlider()
		initTabs()
		reviewsSlider()
		reviewsVideoSlider()
		resultsSwiper()
		new Form('.form').init()
	} catch (e) {
		console.log(e)
	}
})
