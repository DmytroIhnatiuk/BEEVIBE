<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart');
$cart = WC()->cart;
$cart_subtotal_value = WC()->cart->get_subtotal();
$cart_subtotal = get_price_by_currency($cart_subtotal_value) . ' ' . get_currency_symbol();
$cart_count = WC()->cart->get_cart_contents_count();

$isEmpty = !$cart || !$cart_count;
$chosen_payment_method = WC()->session->get('chosen_payment_method');

?>

<form class="woocommerce-cart-form" class="h-full flex-col flex" action="<?php echo esc_url(wc_get_cart_url()); ?>"
      method="post">
    <div class="flex items-center gap-24 mb-24">
        <h2>У кошику</h2>
        <div class="flex items-center">
            <div class="rounded size-32 flex-center bg-light-orange mr-6"><?= $cart_count; ?></div>
            <span><?= get_products_word_form($cart_count) ?></span>
        </div>
    </div>
    <?php if ($isEmpty): ?>
        <div class="mb-auto flex-grow">
            <h3>Кошик порожній</h3>
        </div>
    <?php else: ?>
        <div
                class="sm:grid  grid-cols-[3fr,1fr,1fr,.32rem] pb-12 border-b border-black border-solid gap-20 hidden"
        >
            <div class="font-medium uppercase">товар</div>
            <div class="font-medium uppercase">Кількість</div>
            <div class="font-medium uppercase">ціна</div>
        </div>
        <div class="scroll-y flex-grow max-h-[4rem] h-full mb-auto  overflow-y-auto">
            <?php
            foreach ($cart->get_cart() as $cart_item_key => $cart_item) {

                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $variation_id = $_product->get_id();
                $parent_id = $_product->get_parent_id();

                ?>


                <div class="py-20 border-b border-black border-solid flex"
                     data-key="<?php echo $cart_item_key; ?>" data-id="<?= $variation_id ?>"
                     data-price="<?php $_product->get_price() ?>"
                     data-product
                >
                    <div
                            class="grid grid-cols-[1rem,1fr] sm:grid-cols-[1fr,1.5fr,1fr,1fr] w-full gap-8 sm:gap-x-24"
                    >
                        <a
                                href="<?= esc_url(get_permalink($variation_id)) ?>"
                                class="image w-full h-100 sm:pt-[99%] overflow-hidden rounded-20 row-start-1 row-end-3"
                        >
                            <?= dn_get_image_attachment(getImageByThumb($parent_id), 'full', 'Фото - ' . $_product->get_name(), 'object-cover') ?>

                        </a>
                        <div
                                class="col-start-2 col-end-3 sm:col-end-5 lg:col-start-2 lg:col-end-3"
                        >
                            <a href="<?= esc_url(get_permalink($variation_id)) ?>" class="font-semibold mb-8"
                            ><?= $_product->get_name();
                                ?></a
                            >
                            <div class="text-s">Артикул: <?= $_product->get_sku() ?></div>
                        </div>
                        <div class="col-start-2 sm:col-end-3 lg:col-start-3 lg:col-end-4">
                            <div
                                    class="quantity-selector border border-solid border-black rounded-30 gap-24 py-8 px-16 max-w-max"
                            >
                                <button type="button" class="qty-btn mr-24" data-action="decrease">-</button>
                                <input
                                        data-quantity
                                        readonly
                                        type="number"
                                        min="1"
                                        value="<?= intval($cart_item['quantity']); ?>"
                                        class="qty-input w-36 text-center bg-transparent cursor-default"
                                />
                                <button type="button" class="qty-btn ml-24" data-action="increase">+</button>
                            </div>
                        </div>
                        <div
                                class="flex lg:block gap-8 items-center col-start-2 col-end-3 lg:col-start-4 lg:col-end-5"
                        >
                            <?php if ($cart_item['line_subtotal'] != $cart_item['line_total'] || $_product->is_on_sale()) {

                                $discount_price = floatval($_product->get_price() * intval($cart_item['quantity'])) - (($_product->get_price() * intval($cart_item['quantity']))) / 100;
                                $discount_price = number_format($discount_price, 2); ?>

                                <s class="text-gray lg:mb-4"><?php echo get_price_by_currency($cart_item['line_total']) . ' ' . get_currency_symbol(); ?></s>
                                <div class="h4 font-semibold">
                                    <?php
                                    $normal_price = $_product->get_regular_price() * intval($cart_item['quantity']);
                                    echo get_price_by_currency($normal_price) . ' ' . get_currency_symbol(); ?>

                                </div>


                                <?php

                            } else { ?>
                                <div class="h4  font-semibold">
                                    <?php
                                    echo get_price_by_currency($cart_item['line_total']) . ' ' . get_currency_symbol(); ?>

                                </div>


                            <?php } ?>

                        </div>
                    </div>
                    <?php
                    echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                        '<a data-delete href="%s" class="size-24 ml-8" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-product_key="%s">
<span class="trash flex-inline"><svg class="size-full duration-300 fill-black lg:hover:fill-orange transition-colors ease-linear">
<use xlink:href="#del-icon"></use></svg></a>',
                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                        __('Remove this item', 'woocommerce'),
                        esc_attr($variation_id),
                        esc_attr($_product->get_sku()),
                        esc_attr($cart_item_key)
                    ), $cart_item_key);
                    ?>

                </div>
                <?php
            }
            ?>

        </div>
    <?php endif; ?>


    <div class="sm:flex gap-40 mt-auto sm:ml-auto w-max mb-16">
        <?php if (1 !== 1): ?>
            <div class="h4 text-gray">Знижка: <span>200 грн</span></div>
        <?php endif; ?>

        <div class="h4">Сума замовлення: <span><?= $cart_subtotal; ?></span></div>
    </div>
</form>

<?php do_action('woocommerce_after_mini_cart'); ?>
