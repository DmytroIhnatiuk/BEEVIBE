import accordion from '../modules/accordion.js'
import Form from '../modules/Form.js'

window.addEventListener('DOMContentLoaded', () => {
	try {
		new Form('.form').init()
	} catch (e) {
		console.log(e)
	}
})
