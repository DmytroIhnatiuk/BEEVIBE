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
                    <div class="flex justify-end lg:justify-between items-center">
                        <div class="lg:gap-4 hidden lg:flex items-center gap-8">
                            <div class="text-gray"><?= $total . ' ' . get_products_word_form($total) ?></div>
                            <div class="flex items-center gap-8">

                            </div>
                            <!--                            <div-->
                            <!--                                    class="rounded-30 bg-light-orange p-8 flex gap-4 cursor-pointer items-center"-->
                            <!--                            >-->
                            <!--                                <span>Тіло</span>-->
                            <!--                                <span-->
                            <!--                                        class="block relative size-16 before:absolute before:h-[1px] before:w-14 before:bg-black before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 after:absolute after:w-[1px] after:h-14 after:bg-black after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 before:rotate-45 after:rotate-45 hover:scale-[1.15] transition-transform duration-300"-->
                            <!--                                ></span>-->
                            <!--                            </div>-->

                        </div>

                        <div class="dropdown relative ml-auto z-20">
                            <div
                                    class="dropdown__btn sm:min-w-[2.9rem] flex gap-8 border border-solid border-black px-8 sm:px-12 py-8 rounded-30 cursor-pointer justify-between bg-bg relative z-10"
                            >
										<span
                                                class="dropdown__active hidden sm:block"
                                                data-active=""
                                                data-selected=""
                                        ><span></span>
										</span>
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
                                    <li
                                            class="dropdown__item cursor-pointer mb-8 last:mb-0 lg:hover:bg-orange transition-colors duration-300 px-16"
                                    >
                                        Сoртувати за замовчуванням
                                    </li>
                                    <li
                                            class="dropdown__item cursor-pointer mb-8 last:mb-0 lg:hover:bg-orange transition-colors duration-300 px-16"
                                    >
                                        Сортувати від нових
                                    </li>
                                    <li
                                            class="dropdown__item cursor-pointer mb-8 last:mb-0 lg:hover:bg-orange transition-colors duration-300 px-16"
                                    >
                                        Сортувати від старих
                                    </li>
                                    <li
                                            class="dropdown__item cursor-pointer mb-8 last:mb-0 lg:hover:bg-orange transition-colors duration-300 px-16"
                                    >
                                        Сортувати від більшої ціни
                                    </li>
                                    <li
                                            class="dropdown__item cursor-pointer mb-8 last:mb-0 lg:hover:bg-orange transition-colors duration-300 px-16"
                                    >
                                        Сортувати від нижчої ціни
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div
                            class="projects-filter w-[2.9rem] lg:w-full overflow-x-scroll px-16 pt-40 pb-24 lg:py-24 bg-black lg:bg-transparent absolute lg:static top-32 lg:top-auto rounded-[.15rem] -left-[3.5rem] z-20 transition-transform duration-300 border border-solid border-black text-white lg:text-black h-max"
                    >
                        <form action="#">
                            <div class="range mb-32">
                                <div class="h4 mb-10 font-semibold">Ціна</div>
                                <div class="range__control mb-20">
                                    <input
                                            id="fromSlider"
                                            data-range="min"
                                            step="100"
                                            type="range"
                                            value="0"
                                            min="0"
                                            max="60000"
                                            class="!text-white lg:!text-black"
                                    />
                                    <input
                                            id="toSlider"
                                            data-range="max"
                                            step="100"
                                            type="range"
                                            value="60000"
                                            min="0"
                                            max="60000"
                                    />
                                </div>
                                <div
                                        class="grid range__value grid-cols-2 gap-x-16 mb-20 range__number"
                                >
                                    <div class="!text-white lg:!text-black" data-price="min">
                                        3000 грн
                                    </div>
                                    <div class="!text-white lg:!text-black" data-price="max">
                                        99 999 грн
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-filter accordion--open mb-24 last:mb-0">
                                <div
                                        class="accordion-filter-header cursor-pointer flex items-center justify-between lg:hover:text-blue duration-300 transition-colors font-semibold lg:hover:text-orange h4"
                                >
                                    <span>Категорії </span>

                                    <svg
                                            class="size-24 fill-none stroke-white lg:stroke-black"
                                    >
                                        <use xlink:href="#cheven-icon"></use>
                                    </svg>
                                </div>
                                <div
                                        class="accordion-filter-content max-h-0 overflow-hidden transition-[max-height] active font-medium mb-24 last:mb-0"
                                >
                                    <?php
                                    // Получаем все категории товаров
                                    $terms = get_terms(array(
                                        'taxonomy' => 'product_cat',
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'hide_empty' => false,
                                    ));

                                    if ($terms) {
                                        foreach ($terms as $term) {
                                            if ($term->term_id === 15) continue;
                                            $product_count = $term->count; ?>


                                            <div class="pt-8">
                                                <label
                                                        class="checkbox flex items-center gap-16 w-max cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-12 last:mb-0"
                                                >
                                                    <input value="<?= $term->term_id ?>" type="checkbox"
                                                           class="hidden"/>
                                                    <span
                                                            class="size-32 border border-solid border-white lg:border-black rounded-8 relative flex-center transition-colors duration-300 before:transition-colors before:duration-300"
                                                    ><svg
                                                                class="size-24 fill-none transition-colors duration-300 ease-linear"
                                                        >
															<use href="#check-icon"></use>
														</svg>
													</span>
                                                    <?= esc_html($term->name) ?> <span
                                                            class="ml-16"><?= $product_count ?></span>
                                                </label>
                                            </div>
                                        <?php }
                                    }
                                    ?>

                                </div>
                            </div>

                            <button
                                    class="bg-orange rounded-30 text-black lg:bg-transparent lg:btn-outline uppercase w-full py-12"
                            >
                                фільтрувати
                            </button>
                        </form>
                    </div>
                    <div class="col-start-1 col-end-3 lg:col-start-2 lg:col-end-3">
                        <?php
                        if (woocommerce_product_loop()) {

                            /**
                             * Hook: woocommerce_before_shop_loop.
                             *
                             * @hooked woocommerce_output_all_notices - 10
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
//                                do_action('woocommerce_before_shop_loop');

                            woocommerce_product_loop_start();

                            if (wc_get_loop_prop('total')) {
                                while (have_posts()) {
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
                        <div
                                class="flex gap-16 justify-center mx-center mb-36 sm:mb-0 items-center gap-5"
                        >
                            <button class="slider-btn">
                                <svg
                                        class="size-full d fill-transparent stroke-black rotate-90"
                                >
                                    <use xlink:href="#cheven-icon"></use>
                                </svg>
                            </button>
                            <span class="text-blue font-medium"> 1, 2,3....6 </span>
                            <button class="slider-btn next">
                                <svg
                                        class="size-full d fill-transparent stroke-black -rotate-90"
                                >
                                    <use xlink:href="#cheven-icon"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?= get_template_part('template-parts/blocks/reviews'); ?>
        <?= get_template_part('template-parts/blocks/form'); ?>
    </main>
<?php


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');


get_footer('');
