<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;
$total = wc_get_loop_prop('total');
global $wp_query;
get_header(); ?>
    <main>
        <section
                class="mt-[var(--header-height)] pt-24 lg:pt-32 mb-[.64rem] lg:mb-[1.1rem]"
        >
            <div class="container">
                <div class="flex mb-32 lg:mb-[0.64rem]">
                    <a
                            href="<?= home_url(); ?>"
                            class="lg:hover:text-orange transition-colors duration-300 ease-linear last:pointer-events-none"
                    >Головна</a
                    >
                    <span class="px-4">/</span>
                    <span
                            class="last:pointer-events-none"
                    >Каталог</span
                    >
                </div>
                <h1 class="h2 font-semibold mb-16 sm:mb-36">Каталог</h1>
                <div
                        class="grid grid-cols-[1fr,0.42rem] sm:grid-cols-2 lg:grid-cols-[1fr,3fr] gap-y-20 gap-x-10 sm:gap-20 relative"
                >
                    <div
                            class="filter-btn uppercase font-semibold items-center max-w-[2.9rem] px-12 py-8 border border-solid border-black rounded-30 flex justify-between lg:p-0 lg:border-transparent z-30 bg-bg transition-colors duration-300 relative"
                    >
								<span> Фільтри </span
                                >
                        <svg
                                class="block size-24 fill-none stroke-black lg:hidden transition-transform duration-300 -rotate-90"
                        >
                            <use xlink:href="#cheven-icon"></use>
                        </svg>
                    </div>
                    <?= get_template_part('template-parts/blocks/filter'); ?>
                    <div class="col-start-1 col-end-3 lg:col-start-2 lg:col-end-3">
                        <?php
                        if (woocommerce_product_loop()) {

                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_catalog_ordering - 30
                             */
//                                do_action('woocommerce_before_shop_loop');
                            woocommerce_product_loop_start();

                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
//                                    var_dump(the_post());
                                    the_post();

                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action('woocommerce_shop_loop');

                                    wc_get_template_part('content', 'product');
                                }
                            }

                            woocommerce_product_loop_end();

                            /**
                             * Hook: woocommerce_after_shop_loop.
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action('woocommerce_after_shop_loop');
                        } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action('woocommerce_no_products_found');
                        } ?>
                    </div>
                </div>
            </div>
        </section>
        <?= get_template_part('template-parts/blocks/reviews'); ?>
        <?= get_template_part('template-parts/blocks/form'); ?>
        <div class="w-screen h-screen preloader hide flex items-center justify-center fixed top-0 z-50">
            <div class="size-[1.3rem]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                    <radialGradient id="a12" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)">
                        <stop offset="0" stop-color="#ffffff"></stop>
                        <stop offset=".3" stop-color="#ffffff" stop-opacity=".9"></stop>
                        <stop offset=".6" stop-color="#ffffff" stop-opacity=".6"></stop>
                        <stop offset=".8" stop-color="#ffffff" stop-opacity=".3"></stop>
                        <stop offset="1" stop-color="#ffffff" stop-opacity="0"></stop>
                    </radialGradient>
                    <circle transform-origin="center" fill="none" stroke="url(#a12)" stroke-width="15"
                            stroke-linecap="round" stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100"
                            r="70">
                        <animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2"
                                          values="360;0"
                                          keyTimes="0;1" keySplines="0 0 1 1"
                                          repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle transform-origin="center" fill="none" opacity=".2" stroke="#ffffff" stroke-width="15"
                            stroke-linecap="round" cx="100" cy="100" r="70"></circle>
                </svg>
            </div>

        </div>
    </main>
<?php


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');


get_footer('');
