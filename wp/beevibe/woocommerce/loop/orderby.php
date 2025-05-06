<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.7.0
 */

if (!defined('ABSPATH')) {
    exit;
}
$current_sorting = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : 'default';
$options = apply_filters('woocommerce_catalog_orderby', array());
$activeValue = 'Сортувати за замовчуванням';


?>
<div class="dropdown relative ml-auto z-20">
    <div
            class="dropdown__btn sm:min-w-[2.9rem] flex gap-8 border border-solid border-black px-8 sm:px-12 py-8 rounded-30 cursor-pointer justify-between bg-bg relative z-10"
    >
        <?php


        foreach ($options as $key => $value) {

            if ($key === $current_sorting) { ?>
                <span
                        class="dropdown__active hidden sm:block"
                        data-active="<?= esc_attr($key); ?>"
                        data-selected="<?= esc_attr($key); ?>"
                >
                    <?= esc_html($value) ?>
              </span>
                <?php break;
            } else { ?>
                <span
                        class="dropdown__active hidden sm:block"
                        data-active=""
                        data-selected=""
                >
                   Сортувати:
              </span>
                <?php break;
            }
        }
        ?>

        <span
                class="dropdown__icon transition-transform duration-300 hidden sm:block"
        >
											<svg class="size-24 fill-none stroke-black">
												<use xlink:href="#cheven-icon"></use>
											</svg>
										</span>
        <svg
                class="size-24 stroke-black fill-transparent sm:hidden"
        >
            <use xlink:href="#sorting-icon"></use>
        </svg>
    </div>
    <div
            class="dropdown__content pt-32 pb-16 opacity-0 rounded-20 bg-black box-shadow absolute right-0 w-max sm:w-full top-1/2 text-white transition-opacity duration-300 ease-linear"
    >
        <ul class="dropdown__list">
            <?php
            foreach ($options as $id => $name) : ?>
                <li
                        data-order="<?php echo esc_attr($id); ?>"
                        class="dropdown__item cursor-pointer mb-8 last:mb-0 lg:hover:bg-orange transition-colors duration-300 px-16"
                >
                    <?= esc_html($name) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

