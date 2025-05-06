import dropdown from '../modules/dropdown.js'
import accordion from '../modules/accordion.js'
import {reviewsVideoSlider, reviewsSlider} from '../modules/sliders.js'
import initTabs from '../modules/tabs.js'
import {getElement, getElements} from "../core/index.js";
import {addToCartHandler, cartFunctions} from "../modules/cart.js";

window.addEventListener('DOMContentLoaded', () => {
    const filterBtn = getElement('.filter-btn')
    const filterBlocks = getElement(
        '.projects-filter'
    )

    if (window.innerWidth < 1024) {
        filterBtn.addEventListener('click', function () {
            filterBlocks.classList.toggle('active');
        })
        getElement('.filter-items').style.height = `calc(100vh - ${getElement('.filter-items').offsetTop}px - 172px)`
        getElement('button[type="submit"] + button').addEventListener('click', function () {
            filterBlocks.classList.toggle('active');
        })
    }

    const fromSlider = document.querySelector('[data-range="min"]')
    const toSlider = document.querySelector('[data-range="max"]')
    const fromInput = document.querySelector('[data-price="min"]')
    const toInput = document.querySelector('[data-price="max"]')

    function controlFromSlider(fromSlider, toSlider, fromInput) {
        const [from, to] = getParsed(fromSlider, toSlider)
        fillSlider(fromSlider, toSlider, 'var(--slider-color)', 'var(--range-color)', toSlider)
        fromInput.innerHTML = (from > to ? to : from) + ' грн'
        if (from > to) fromSlider.value = to
    }

    function controlToSlider(fromSlider, toSlider, toInput) {
        const [from, to] = getParsed(fromSlider, toSlider)
        fillSlider(fromSlider, toSlider, 'var(--slider-color)', 'var(--range-color)', toSlider)
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
    fillSlider(fromSlider, toSlider, 'var(--slider-color)', 'var(--range-color)', toSlider)
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
        getElement("[data-form='filter']").addEventListener('submit', async (e) => {
            e.preventDefault();
            document.dispatchEvent(new CustomEvent('dn_filter'));
        });
        const preloader = getElement('.preloader')
        addToCartHandler();
        document.addEventListener('dn_filter', async function (e) {
            preloader.classList.remove('hide');
            preloader.classList.add('show');
            const category = [];
            const range = [];
            const tags = [];
            const orderBy = getElement('[data-order].active')?.dataset.order;
            getElements('input[data-category][type="checkbox"]:checked').forEach(item => {
                category.push(item.value)
            });
            getElements('input[data-tag][type="checkbox"]:checked').forEach(item => {
                tags.push(item.value)
            });
            getElements('input[type="range"]').forEach(item => {
                range.push(item.value)
            })

            try {
                await fetchItems({category, range, orderBy, tags})
            } catch (e) {
                console.log(e)
            }


        });

        async function fetchItems(filter) {
            try {
                const {html, total_products} = await handleFilter(filter)
                getElement('[data-container]').innerHTML = html;
                getElement('[data-total-products]').innerHTML = total_products;
                if (getElement('.woocommerce-pagination')) getElement('.woocommerce-pagination').remove();
                addToCartHandler();
                preloader.classList.remove('show');
                preloader.classList.add('hide');
            } catch (e) {

            }

        }

        async function handleFilter(filter) {
            try {
                const response = await fetch(ajaxUrl, {
                    method: 'POST',
                    body: new URLSearchParams({
                        action: 'filter_items',
                        filter: JSON.stringify(filter)
                    }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                });
                const result = await response.json();
                return result.data;

                // return {
                //     carsCount: result.data.total_posts,
                //     html: result.data.html,
                //     category: result.data.category,
                //     total_pages: result.data.total_pages
                // }
            } catch (e) {
                throw new Error(`Error cars: ${JSON.stringify({html: '<h2 class="text-l font-semibold mr-12">Нічого не знайдено</h2>'})}`);
            }
        }

        // new Form('.form').init()
    } catch (e) {
        console.log(e)
    }
})
