<?php
$page_id = $args['id'] ?? get_the_ID();

if (have_rows('before_after', $page_id)):?>


    <section class="mb-[.64rem] lg:mb-[1.1rem]">
        <div class="container">
            <h2 class="lg:w-1/2 mb-16 sm:mb-36">
                Результат використання косметики BeeVibe
            </h2>
            <div class="swiper" data-swiper="resultsSwiper">
                <div class="swiper-wrapper mb-24">
                    <?php while (have_rows('before_after', $page_id)) : the_row(); ?>

                        <div class="swiper-slide">
                            <div class="flex h-[2.18rem] sm:h-[3.88rem]">
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <?= dn_get_image_attachment(get_sub_field('before'), 'full', 'До', '!object-cover') ?>
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        До
                                    </div>
                                </div>
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <?= dn_get_image_attachment(get_sub_field('after'), 'full', 'Після', '!object-cover') ?>

                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        Після
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php endwhile; ?>


                </div>
                <div
                        class=" swiper-navigation flex justify-center gap-16 pr-[var(--container-gap)] lg:pr-0"
                >
                    <button class="slider-btn  swiper-button prev">
                        <svg
                                class="size-full d fill-transparent stroke-black rotate-90"
                        >
                            <use xlink:href="#cheven-icon"></use>
                        </svg>
                    </button>
                    <button class="slider-btn  swiper-button next">
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
<?php endif;

?>