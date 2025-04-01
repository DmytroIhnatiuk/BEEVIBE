import { getElement, getElements } from './core/index.js'

window['FLS'] = true
import '../scss/style.scss'
import * as flsFunctions from './core/functions.js'
import { scrollToAnchor } from './modules/scrollToAnchor.js'
import { headerFixed } from './modules/index.js'
import burger from './modules/burger.js'

import 'aos/dist/aos.css'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'swiper/css/effect-cards'
import 'swiper/css/thumbs'
import AOS from 'aos'
import modalsEvents from './modules/modalsEvents.js'
import Form from './modules/Form.js'
import { modal } from './modules/modal.js'
import './libs/dynamic_adapt.js'

flsFunctions.isWebp()

flsFunctions.addTouchClass()

flsFunctions.fullVHfix()

window.addEventListener('DOMContentLoaded', () => {
	try {
		AOS.init({
			once: true,
		})
		scrollToAnchor()
		headerFixed()
		burger()
		getElements('[data-modal]').forEach(el => {
			el.addEventListener('click', e => {
				modalsEvents(el)
				modal.openModal()
			})
		})
		new Form('.form-footer').init()
		if (getElement('.form')) {
			new Form('.form').init()
		}
	} catch (e) {
		console.log(e)
	}
})
