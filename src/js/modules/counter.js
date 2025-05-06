import {getElement, getElements} from "../core/index.js";
import {cartUpdate, createCartParams} from "./cart.js";

export default function counter(element = document) {
    if (!getElement('.quantity-selector', element)) return;
    getElements('.quantity-selector').forEach(item => {
        const quantityInput = item.querySelector('.qty-input')
        const increaseBtn = item.querySelector('[data-action="increase"]')
        const decreaseBtn = item.querySelector('[data-action="decrease"]')
        if (quantityInput && increaseBtn && decreaseBtn) {
            increaseBtn.addEventListener('click', async () => {
                quantityInput.value = parseInt(quantityInput.value) + 1;
                if (!item.closest('#cart')) return;
                const formData = createCartParams(item);
                formData.append('action', 'custom_update_cart_quantity');
                await cartUpdate(formData)
            })

            decreaseBtn.addEventListener('click', async () => {
                const current = parseInt(quantityInput.value)
                if (current > 1) {
                    quantityInput.value = current - 1 ;
                    if (!item.closest('#cart')) return;
                    const formData = createCartParams(item);
                    formData.append('action', 'custom_update_cart_quantity');
                    await cartUpdate(formData)
                }
            })
        }
    })
}