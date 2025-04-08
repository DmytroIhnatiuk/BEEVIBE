<?php

$product = $args['product'] ?? null;
if (!$product) {
    return;
}
$variation_product = get_default_product($product);
$id = $product->get_id();
$regular_price = $variation_product->get_regular_price();
$sale_price = $variation_product->get_sale_price();
$attributes = $product->get_attributes();
$variation_link = $variation_product->get_permalink();
?>


<div
        class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
>
    <div
            class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
    >
        <?= dn_get_image_attachment(getImageByThumb($id), 'full', 'Фото - ' . get_the_title(), 'object-cover') ?>

    </div>
    <h3 class="h4 font-semibold mb-4 sm:mb-8">
        <?= get_the_title($id); ?>
    </h3>
    <div class="mb-4 sm:mb-8 text-s sm:text-m"><?= $variation_product->get_attribute('pa_volume') ?></div>
    <div class="flex justify-between items-center">
        <div class="sm:text-[.2rem] font-semibold"> <?= $regular_price ?> грн</div>
        <s class="text-gray  text-s block"><?php if ($sale_price) {
                echo $sale_price . ' грн';
            } ?></s>
        <div class="flex flex-shrink-0 gap-8">
            <a
                    href="<?= esc_url($variation_link); ?>"
                    class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
            >
                <svg
                        class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                >
                    <use href="#arrow-icon"></use>
                </svg>
            </a>
            <button data-cart="<?= $variation_product->get_ID(); ?>"
                    class="size-40 sm:size-[.48rem] rounded flex items-center justify-center transition-colors duration-300 bg-black pb-6 lg:hover:bg-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:hover:border-orange"
            >
                <svg
                        class="size-24 sm:size-[.29rem] fill-none stroke-white transition-colors duration-300 ease-linear group-hover:stroke-black"
                >
                    <use href="#basket-icon"></use>
                </svg>
            </button>
        </div>
    </div>
    <div class="flex absolute -top-6">
        <div
                class="p-8 uppercase text-s font-bold rounded-30 bg-orange"
        >
            Bestseller
        </div>
        <?php if ($sale_price): ?>
            <div
                    class="p-8 uppercase text-s font-bold rounded-30 bg-red text-white"
            >
                sale
            </div>
        <?php endif; ?>

    </div>
</div>
