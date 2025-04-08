import {getElement, getElements} from './core/index.js'

window['FLS'] = true
import '../scss/tailwind/index.scss'

import * as flsFunctions from './core/functions.js'
import {scrollToAnchor} from './modules/scrollToAnchor.js'
import {headerFixed} from './modules/index.js'
import burger from './modules/burger.js'
import accordion from './modules/accordion.js'
import 'aos/dist/aos.css'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import 'swiper/css/effect-cards'
import 'swiper/css/thumbs'
import AOS from 'aos'
import '../scss/style.scss'
import modalsEvents from './modules/modalsEvents.js'
import Form from './modules/Form.js'
import {modal} from './modules/modal.js'
import './libs/dynamic_adapt.js'

flsFunctions.isWebp()

flsFunctions.addTouchClass()

flsFunctions.fullVHfix()

window.addEventListener('DOMContentLoaded', () => {
    try {
        if (window.innerWidth < 1024) {
            accordion('.accordion', '.accordion-header', '.accordion-content')
        }

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

        const quantityInput = document.querySelector('.qty-input')
        const increaseBtn = document.querySelector('[data-action="increase"]')
        const decreaseBtn = document.querySelector('[data-action="decrease"]')

        if (quantityInput && increaseBtn && decreaseBtn) {
            increaseBtn.addEventListener('click', () => {
                quantityInput.value = parseInt(quantityInput.value) + 1
            })

            decreaseBtn.addEventListener('click', () => {
                const current = parseInt(quantityInput.value)
                if (current > 1) {
                    quantityInput.value = current - 1
                }
            })

            quantityInput.addEventListener('input', () => {
                const value = parseInt(quantityInput.value)
                if (isNaN(value) || value < 1) {
                    quantityInput.value = 1
                }
            })
        }

        new Form('.form-footer').init()
        if (getElement('.form')) {
            new Form('.form').init()
        }
    } catch (e) {
        console.log(e)
    }
})
