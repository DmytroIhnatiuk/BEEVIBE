<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$variation_product = get_default_product($product);
$attributes = $product->get_variation_attributes();
$id = $product->get_ID();
?>
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
            <a
                    href="/shop/"
                    class="lg:hover:text-orange transition-colors duration-300 ease-linear last:pointer-events-none"
            >Каталог</a
            >
            <span class="px-4">/</span>
            <span

                    class="last:pointer-events-none"
            ><?php the_title(); ?></span
            >
        </div>
        <div class="lg:grid lg:grid-cols-2 gap-20">
            <div class="relative h-full">
                <div
                        class="gap-14 block sm:flex sm:flex-row-reverse mb-16 lg:mb-0 sticky top-10"
                >
                    <div
                            class="swiper sm:w-[4.55rem] h-[3.69rem] sm:h-[4.9rem] rounded-20 overflow-hidden w-wull max-w-full mb-16 sm:mb-0"
                            data-swiper="productSlider"
                    >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="image size-full rounded-20 overflow-hidden">
                                    <?= dn_get_image_attachment(getImageByThumb($id), 'full', 'Фото - ' . get_the_title(), 'object-cover') ?>

                                </div>
                            </div>
                            <?php if (get_field('gallery')):
                                foreach (get_field('gallery') as $idx => $image): ?>
                                    <div class="image size-full rounded-20 overflow-hidden">
                                        <?= dn_get_image_attachment($image, 'full', 'Фото - ' . get_the_title() . '#' . $idx + 1, 'object-cover') ?>

                                    </div>


                                <?php endforeach; endif; ?>


                        </div>
                        <div
                                class="rounded-30 bg-orange p-8 font-semibold uppercase top-8 left-8 sm:top-12 sm:left-12 absolute z-10"
                        >
                            Bestseller
                        </div>
                    </div>
                    <div
                            class="swiper sm:h-[4.9rem] sm:w-[1.4rem] !min-w-0 w-wull max-w-full"
                            data-swiper="productSliderNav"
                    >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                        class="image w-[.79rem] h-[.6rem] sm:w-[1.4rem] sm:h-[1.08rem] overflow-hidden rounded-8 sm:rounded-20"
                                >
                                    <?= dn_get_image_attachment(getImageByThumb($id), 'full', 'Фото - ' . get_the_title(), 'object-cover') ?>

                                </div>
                            </div>
                            <?php if (get_field('gallery')):
                                foreach (get_field('gallery') as $idx => $image): ?>
                                    <div class="swiper-slide">
                                        <div
                                                class=" image w-[.79rem] h-[.6rem] sm:w-[1.4rem] sm:h-[1.08rem] overflow-hidden rounded-8 sm:rounded-20"
                                        >
                                            <?= dn_get_image_attachment($image, 'full', 'Фото - ' . get_the_title() . '#' . $idx + 1, 'object-cover') ?>

                                        </div>
                                    </div>

                                <?php endforeach; endif; ?>


                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div
                        class="bg-white w-full box-shadow rounded-20 sm:p-32 px-16 py-24 lg:min-h-[4.9rem] mb-32"
                >
                    <h1
                            class="h3 mb-4 sm:mb-8"><?php the_title(); ?></h1>
                    <div class="flex gap-14 sm:gap-50 items-center mb-4 sm:mb-8">
                        <div class="font-semibold">Артикул: <?= $variation_product->get_sku(); ?></div>
                        <div class="py-8 px-24 rounded-20  <?= $variation_product->is_in_stock() ? 'bg-khaki' : 'bg-gray'; ?>  font-medium">
                            <?= $variation_product->is_in_stock() ? 'В наявності' : 'Немає в наявності'; ?>
                        </div>
                    </div>
                    <!--        TODO ADD DESCIPTION CLASS            -->
                    <p class="mb-12 sm:mb-24">
                        <?php echo $product->get_short_description(); ?>

                    </p>
                    <?php if (isset($attributes['pa_volume'])) { ?>
                        <div class="flex gap-16 items-center mb-12 sm:mb-16">
                            <div class="font-semibold">Об’єм</div>

                            <div class="flex flex-wrap gap-16 items-center">
                                <?php $values = $attributes['pa_volume'];
                                $volume_slug = $variation_product->get_attribute('pa_volume');
                                foreach ($values as $slug) {
                                    $term = get_term_by('slug', $slug, 'pa_volume');
                                    if ($term && !is_wp_error($term)) { ?>
                                        <button class="volume-btn btn-outline <?php if ($volume_slug === $term->name): ?>
                                        active
                                        <?php endif; ?>"><?= $term->name ?></button>
                                    <?php }
                                } ?>

                            </div>
                        </div>
                    <?php } ?>
                    <div class="flex gap-16 items-center mb-12 sm:mb-16">
                        <label class="font-semibold">Кількість</label>
                        <div
                                class="quantity-selector border border-solid border-black rounded-30 gap-24 py-8 px-16"
                        >
                            <button class="qty-btn mr-24" data-action="decrease">
                                -
                            </button>
                            <label class="pointer-events-none"> <input
                                        type="number"
                                        min="1"
                                        value="1"
                                        class="qty-input w-36 text-center "
                                        readonly
                                /></label>

                            <button class="qty-btn ml-24" data-action="increase">
                                +
                            </button>
                        </div>
                    </div>
                    <div
                            class="flex items-center gap-24 mb-12 sm:mb-50 flex-wrap sm:flex-nowrap"
                    >
                        <?php
                        $regular_price = $variation_product->get_regular_price();
                        $sale_price = $variation_product->get_sale_price();
                        ?>
                        <h2 data-price="" class="h3 font-semibold flex-shrink-0">
                            <?= $regular_price ?> грн</h2>
                        <s data-sale-price="" class="text-gray flex-shrink-0"><?php if ($sale_price) {
                                echo $sale_price . ' грн';
                            } ?></s>
                        <button data-product-id="<?= $variation_product->get_ID() ?>" class="btn-black w-full">В кошик
                        </button>
                    </div>
                    <div class="flex gap-4 sm:gap-16 text-s sm:text-m">
                        <svg class="size-40 fill-black block flex-shrink-0">
                            <use href="#delivery-icon"></use>
                        </svg>
                        <p>
                            Доставка по Україні здійснюється Новою поштою. Вартість
                            доставки розраховується поштовою службою
                        </p>
                    </div>
                </div>
                <div class="tabs-customize">
                    <div class="flex gap-8 mb-16 overflow-x-scroll">
                        <?php if (get_the_content()): ?>
                            <div
                                    class="btn-outline btn-customize cursor-pointer flex-shrink-0"
                            >
                                Опис товару
                            </div>
                        <?php endif; ?>

                        <div
                                class="btn-outline btn-customize cursor-pointer flex-shrink-0"
                        >
                            Характеристика
                        </div>
                        <div
                                class="btn-outline btn-customize cursor-pointer flex-shrink-0"
                        >
                            Активні компоненти
                        </div>
                    </div>

                    <div>
                        <div class="content-customize overflow-hidden bg-bg">
                            <?php the_content(); ?>
                        </div>
                        <div
                                class="content-customize overflow-hidden bg-bg grid grid-cols-[1fr,3fr] gap-x-16"
                        >
                            <div class="font-semibold">Тип засобу:</div>
                            <div>кремова детокс-маска</div>
                            <div class="font-semibold">Для кого:</div>
                            <div>
                                жирна та комбінована шкіра, схильна до комедонів,
                                висипань і жирного блиску
                            </div>
                            <div class="font-semibold">Основні ефекти:</div>
                            <ul>
                                <li>• очищення пор та видалення чорних цяток</li>
                                <li>• зменшення висипань</li>
                                <li>• матування без пересушування</li>
                                <li>• заспокійливий та протизапальний ефект</li>
                            </ul>
                            <div class="font-semibold">Активні компоненти:</div>
                            <div>
                                жирна та комбінована шкіра, схильна до комедонів,
                                висипань і жирного блиску
                            </div>
                            <div class="font-semibold">Текстура:</div>
                            <div>кремова, легко наноситься і змивається</div>
                            <div class="font-semibold">Застосування:</div>
                            <div>
                                2–3 рази на тиждень на очищену шкіру на 10–15 хвилин
                            </div>
                            <div class="font-semibold">Колір:</div>
                            <div>
                                зелений (може змінюватися через натуральні пігменти — це
                                нормально)
                            </div>
                        </div>
                        <div class="content-customize overflow-hidden bg-bg">
                            <ul>
                                <li>
                                    • Біла та зелена глина — вбирають зайвий жир і
                                    очищають пори.
                                </li>
                                <li>
                                    • Саліцилова кислота — розчиняє забруднення всередині
                                    пор і зменшує акне
                                </li>
                                <li>
                                    • Спіруліна — природний компонент, який заспокоює
                                    шкіру, зменшує почервоніння
                                </li>
                                <li>
                                    • Масляний екстракт прополісу — антибактеріальний та
                                    заспокійливий ефект
                                </li>
                                <li>
                                    • Пудра HIM — регулює жирність і бореться з
                                    висипаннями
                                </li>
                                <li>
                                    •  Мед   – живить шкіру, пом’якшує її та допомагає
                                    швидше загоювати дрібні запалення.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= get_template_part('template-parts/blocks/reviews'); ?>
<?= get_template_part('template-parts/blocks/before_after'); ?>
<?php $upsell_ids = $product->get_upsell_ids();
if (count($upsell_ids)): ?>

    <section class="mb-[.64rem] lg:mb-[1.1rem]">
        <div class="container">
            <h2 class="mb-16 sm:mb-36">Часто купують разом</h2>
        </div>
        <div class="pl-[var(--container-gap)] lg:px-[var(--container-gap)]">
            <div class="swiper" data-swiper="topSalesSlider">
                <div class="swiper-wrapper pt-6 pb-24 sm:pb-32">
                    <?php foreach ($upsell_ids as $upsell_id) {
                        $upsell_product = wc_get_product($upsell_id); ?>
                        <div class="swiper-slide">
                            <?= get_template_part('template-parts/blocks/product-card', false, ['product' => $upsell_product]); ?>
                        </div>
                    <?php } ?>

                </div>
                <div
                        class="flex justify-end sm:justify-center gap-16 pr-[var(--container-gap)] lg:pr-0"
                >
                    <button class="slider-btn prev">
                        <svg
                                class="size-full d fill-transparent stroke-black rotate-90"
                        >
                            <use xlink:href="#cheven-icon"></use>
                        </svg>
                    </button>
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
    </section>

<?php endif; ?>

