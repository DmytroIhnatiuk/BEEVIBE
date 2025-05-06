<?php $total = wc_get_loop_prop('total');
global $wp_query; ?>
<div class="flex justify-end lg:justify-between items-center">
    <div class="lg:gap-4 hidden lg:flex items-center gap-8">
        <div data-total-products class="text-gray"><?= $total . ' ' . get_products_word_form($total) ?></div>
        <div class="flex items-center gap-8">
        </div>
    </div>
    <?php do_action('woocommerce_before_shop_loop'); ?>
</div>
<div
        class="projects-filter w-[2.9rem] lg:w-full overflow-x-scroll px-16 pt-40 pb-24 lg:py-24 bg-black lg:bg-transparent absolute lg:static top-32 lg:top-auto rounded-[.15rem] -left-[3.5rem] z-20 transition-transform duration-300 border border-solid border-black text-white lg:text-black h-max"
>
    <form data-form="filter">
        <?php
        $transient_price_name = 'min_max_prices_cache';
        $min_max_prices = get_transient($transient_price_name);
        //                if (1 === 1) {
        if ($min_max_prices === false) {
//            todo розкоментувати коли всі товари будуть наповнені
            $min_prices = array();
            $max_prices = array();
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_type',
                        'field' => 'slug',
                        'terms' => 'variable',
                    ),
                ),
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                global $product;
                if (is_a($product, 'WC_Product')) {
                    foreach ($product->get_available_variations() as $variation) {
                        $variation_obj = wc_get_product($variation['variation_id']);
                        $price = $variation_obj->get_price();
                        $min_prices[] = $price;
                        $max_prices[] = $price;
                    }
                }
            endwhile;

            if (!empty($min_prices) && !empty($max_prices)) {

                $min_max_prices = [
                    'min' => min($min_prices),
                    'max' => max($max_prices),
                ];
                set_transient($transient_price_name, $min_max_prices, 24 * 3600);

            }

            wp_reset_postdata();
        }
        ?>
        <div class="range mb-16 md:mb-32">
            <div class="h4 mb-10 font-semibold">Ціна</div>
            <label class="range__control block mb-20">
                <input
                        id="fromSlider"
                        data-range="min"
                        step="10"
                        type="range"
                        value="<?= $min_max_prices['min'] ?>"
                        min="<?= $min_max_prices['min'] ?>"
                        max="<?= $min_max_prices['max'] ?>"
                        class="!text-white lg:!text-black"
                />
                <input
                        id="toSlider"
                        data-range="max"
                        step="10"
                        type="range"
                        value="<?= $min_max_prices['max'] ?>"
                        min="<?= $min_max_prices['min'] ?>"
                        max="<?= $min_max_prices['max'] ?>"
                />
            </label>
            <div
                    class="grid range__value grid-cols-2 gap-x-16 mb-20 range__number"
            >
                <div class="!text-white lg:!text-black" data-price="min">
                    <?= $min_max_prices['min'] ?> грн
                </div>
                <div class="!text-white lg:!text-black" data-price="max">
                    <?= $min_max_prices['max'] ?> грн
                </div>
            </div>
        </div>
        <div class="filter-items mb-24">
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
                    $main_term = $wp_query->get_queried_object();
                    $main_term_id = null;

                    if (isset($main_term->term_id)) {
                        $main_term_id = $main_term->term_id;
                    }
                    $all_terms = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'hide_empty' => false,
                    ));
                    $terms_by_parent = [];
                    foreach ($all_terms as $term) {
                        if ($term->term_id === 15) continue;
                        $terms_by_parent[$term->parent][] = $term;
                    }


                    if (!empty($terms_by_parent[0])) {
                        foreach ($terms_by_parent[0] as $parent_term) {
                            $parent_count = $parent_term->count;
                            ?>
                            <div class="pt-8">
                                <label class="checkbox flex items-center  gap-12 w-full cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-8 last:mb-0 <?= !$parent_count ? ' disabled' : '' ?>">
                                    <input data-category value="<?= $parent_term->term_id ?>" type="checkbox"
                                        <?php if ($parent_term->term_id === $main_term_id): ?>
                                            checked
                                        <?php endif; ?>

                                           class="hidden"/>
                                    <span class="size-28 border border-solid border-white lg:border-black rounded-[.06rem] relative flex-center transition-colors duration-300 before:transition-colors before:duration-300">
                    <svg class="size-24 fill-none transition-colors duration-300 ease-linear">
                        <use href="#check-icon"></use>
                    </svg>
                </span>
                                    <span class="pr-32  block"><?= esc_html($parent_term->name) ?> <span
                                                class="ml-8"><?= $parent_count ?></span></span>
                                </label>
                                <?php
                                if (!empty($terms_by_parent[$parent_term->term_id])) {
                                    foreach ($terms_by_parent[$parent_term->term_id] as $child_term) {
                                        $child_count = $child_term->count;
                                        ?>
                                        <div class="mb-8 ml-8 last:mb-0">
                                            <label class="checkbox <?= !$child_count ? ' disabled' : '' ?> items-center flex gap-12 w-full cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-12 last:mb-0">
                                                <input data-category value="<?= $child_term->term_id ?>"
                                                       type="checkbox"
                                                    <?php if ($child_term->term_id === $main_term_id): ?>
                                                        checked
                                                    <?php endif; ?>
                                                       class="hidden"/>
                                                <span class="size-28 border border-solid border-white lg:border-black rounded-[50%] relative flex-center transition-colors duration-300 before:transition-colors before:duration-300">
                            <svg class="size-24 fill-none transition-colors duration-300 ease-linear">
                                <use href="#check-icon"></use>
                            </svg>
                        </span>
                                                <span class="pr-32  block"><?= esc_html($child_term->name) ?> <span
                                                            class="ml-8"><?= $child_count ?></span></span>

                                            </label>
                                        </div>
                                        <?php
                                    }
                                } ?>
                            </div>
                        <?php }
                    }

                    ?>

                </div>
            </div>
            <div class="accordion-filter accordion--open mb-24 last:mb-0">
                <div
                        class="accordion-filter-header cursor-pointer flex items-center justify-between lg:hover:text-blue duration-300 transition-colors font-semibold lg:hover:text-orange h4"
                >
                    <span>Запит шкіри </span>

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

                    $product_tags = get_terms(array(
                        'taxonomy' => 'product_tag',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'hide_empty' => false,
                    ));

                    if (!empty($product_tags)) {
                        foreach ($product_tags as $value) {
                            if (get_field('tag_name', $value) === 'Запит шкіри'):
                                $effect_count = $value->count ?? 0;
                                ?>
                                <div class="pt-8">
                                    <label class="checkbox flex items-center  gap-12 w-full cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-8 last:mb-0 <?= !$effect_count ? ' disabled' : '' ?>">
                                        <input data-tag value="<?= $value->term_id ?>" type="checkbox"
                                               class="hidden"/>
                                        <span class="size-28 border border-solid border-white lg:border-black rounded-[.06rem] relative flex-center transition-colors duration-300 before:transition-colors before:duration-300">
                    <svg class="size-24 fill-none transition-colors duration-300 ease-linear">
                        <use href="#check-icon"></use>
                    </svg>
                </span>
                                        <span class="pr-32  block"><?= $value->name ?>
                                        <span class="ml-8"><?= $effect_count ?></span>
                                    </span>
                                    </label>
                                </div>
                            <?php endif;
                        }
                    }

                    ?>

                </div>
            </div>
            <div class="accordion-filter accordion--open mb-24 last:mb-0">
                <div
                        class="accordion-filter-header cursor-pointer flex items-center justify-between lg:hover:text-blue duration-300 transition-colors font-semibold lg:hover:text-orange h4"
                >
                    <span>Тип шкіри </span>

                    <svg
                            class="size-24 fill-none stroke-white lg:stroke-black"
                    >
                        <use xlink:href="#cheven-icon"></use>
                    </svg>
                </div>
                <div
                        class="accordion-filter-content max-h-0 overflow-hidden transition-[max-height] active font-medium mb-24 last:mb-0"
                >
                    <?php if (!empty($product_tags)) {
                        foreach ($product_tags as $value) {
                            if (get_field('tag_name', $value) === 'Тип шкіри'):
                                $effect_count = $value->count ?? 0;
                                ?>
                                <div class="pt-8">
                                    <label class="checkbox flex items-center  gap-12 w-full cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-8 last:mb-0 <?= !$effect_count ? ' disabled' : '' ?>">
                                        <input data-tag value="<?= $value->term_id ?>" type="checkbox"
                                               class="hidden"/>
                                        <span class="size-28 border border-solid border-white lg:border-black rounded-[.06rem] relative flex-center transition-colors duration-300 before:transition-colors before:duration-300">
                    <svg class="size-24 fill-none transition-colors duration-300 ease-linear">
                        <use href="#check-icon"></use>
                    </svg>
                </span>
                                        <span class="pr-32  block"><?= $value->name ?>
                                        <span class="ml-8"><?= $effect_count ?></span>
                                    </span>
                                    </label>
                                </div>
                            <?php endif;
                        }
                    }

                    ?>

                </div>
            </div>
        </div>
        <button type="submit"
                class="bg-orange rounded-30 text-black lg:bg-transparent lg:btn-outline uppercase w-full py-12"
        >
            фільтрувати
        </button>
        <button type="button"
                class="btn-outline-white py-12 flex lg:hidden mt-16 w-full items-center rounded-30 justify-center "
        >
            Закрити
        </button>
    </form>
</div>
