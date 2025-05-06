import {disableScroll, enableScroll, getElement, getElements} from "../core/index.js";
import {body} from "../core/elementsNodeList.js";
import counter from "./counter.js";

export default function cart() {
    const cartTrigger = getElement('.cart-trigger');
    if (!cartTrigger) return;
    const cart = getElement('#cart');
    cartTrigger.addEventListener('click', (e) => {
        cart.classList.add('active');
        cart.classList.add('transition-transform');
        cart.classList.add('duration-300');
        disableScroll();
        body.classList.add('overlay')
    })

    closeCartHandler();
    removeFromCartHandler();
}

function renderCart(data) {
    const {data: {fragments, cart_count}} = data;
    getElement('#cart [data-cart-wrapper]').innerHTML = fragments;
    getElement('[data-cart-count]').innerHTML = cart_count ? cart_count : '';
    counter(getElement('#cart [data-cart-wrapper]'));
    removeFromCartHandler();
}

function createCartParams(item) {
    const formData = new FormData();
    const qnt = +getElement('[data-quantity]', item.closest('[data-product]')).value;
    formData.append('id', +item.dataset.cart ? +item.dataset.cart : +item.closest('[data-product]').dataset.id);
    formData.append('quantity', qnt);
    return formData
}

async function cartUpdate(formData) {
    const preloader = getElement('#cart .preloader')
    try {
        preloader.classList.remove('hide');
        preloader.classList.add('show');
        const response = await fetch(ajaxUrl, {
            method: 'POST',
            body: formData,
        })
        const data = await response.json();
        if (data.success) {
            renderCart(data);
        }
    } catch (e) {

    } finally {
        preloader.classList.remove('show');
        preloader.classList.add('hide');
    }

}

function addToCartHandler() {
    getElements('[data-cart]').forEach(item => {
        item?.addEventListener('click', async () => {
            try {
                item.classList.add('disabled');
                const formData = createCartParams(item);
                formData.append('action', 'beevibe_add_to_cart');
                await cartUpdate(formData)
            } catch (e) {
                console.log(e);
            } finally {
                item.classList.remove('disabled');
            }
        })
    })
}

function removeFromCartHandler() {
    getElements('[data-delete]').forEach(item => {
        item?.addEventListener('click', async (e) => {
            e.preventDefault();
            const productKey = item.dataset.product_key;
            await deleteCartItem(productKey);
        });

    })
}

function closeCartHandler() {
    getElements('.cart-close').forEach(item => {
        item.addEventListener('click', (e) => {
            getElement('#cart').classList.remove('active');
            enableScroll();
            body.classList.remove('overlay')
        })
    })


}

async function deleteCartItem(productKey) {
    const formData = new FormData();
    formData.append('action', 'beevibe_delete_cart_item');
    formData.append('key', productKey);
    await cartUpdate(formData)
}

export {closeCartHandler, createCartParams, renderCart, cartUpdate, addToCartHandler, removeFromCartHandler}