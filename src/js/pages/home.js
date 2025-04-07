import {
    mainFrameSlider,
    topSalesSlider,
    newSlider,
    reviewsSlider,
    reviewsVideoSlider,
    resultsSwiper,
} from '../modules/sliders.js'
import accordion from '../modules/accordion.js'
import Form from '../modules/Form.js'

import initTabs from '../modules/tabs.js'

window.addEventListener('DOMContentLoaded', () => {
    try {
        mainFrameSlider()
        topSalesSlider()
        newSlider()
        initTabs()
        reviewsSlider()
        reviewsVideoSlider()
        resultsSwiper()
        // new Form('.form').init()
    } catch (e) {
        console.log(e)
    }
})
