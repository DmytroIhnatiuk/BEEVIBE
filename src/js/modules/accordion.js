const accordion = (
	itemSelector,
	buttonSelector,
	contentSelector,
	activeClass = 'accordion--open'
) => {
	const items = document.querySelectorAll(itemSelector)

	if (!items.length) return

	items.forEach(el => {
		const button = el.querySelector(buttonSelector)
		const content = el.querySelector(contentSelector)

		if (!button || !content) return

		const isActive = el.classList.contains(activeClass)
		if (isActive) {
			el.dataset.open = 'true'
			content.style.maxHeight = `${content.scrollHeight}px`
			button.classList.add('active')
			el.classList.add('active')
		}

		button.addEventListener('click', () => {
			const isOpen = el.dataset.open === 'true'

			if (!isOpen) {
				el.dataset.open = 'true'
				content.style.maxHeight = `${content.scrollHeight}px`
				button.classList.add('active')
				el.classList.add('active')
			} else {
				el.dataset.open = 'false'
				content.style.maxHeight = '0'
				button.classList.remove('active')
				el.classList.remove('active')
			}
		})

		const onResize = () => {
			if (el.dataset.open === 'true') {
				content.style.maxHeight = `${content.scrollHeight}px`
			}
		}
		window.addEventListener('resize', onResize)
	})
}

export default accordion
