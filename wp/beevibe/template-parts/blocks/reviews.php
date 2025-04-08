<?php
$reviews = dn_get_items('product-review');

if (count($reviews)) {
    $video_reviews = [];
    $text_reviews = [];
    foreach ($reviews as $review) {
        $type = get_field('review_type', $review->ID);
        if ($type === '2') {
            $video_reviews[] = $review;
        } elseif ($type === '1') {
            $text_reviews[] = $review;
        }
    }
    ?>
    <section class="mb-[.64rem] lg:mb-[1.1rem]">
        <div class="lg:px-[var(--container-gap)] pl-[var(--container-gap)]">
            <div
                    class="lg:flex justify-between mb-16 sm:mb-36 pr-[var(--container-gap)] lg:pr-0"
            >
                <h2 class="mb-24 lg:mb-0">
                    <span class="lg:block">500+ реальних відгуків</span>
                </h2>
                <!--                        TODO INSTAGRAM REVIEWS LINK-->
                <a
                        class="py-8 sm:pl-40 pr-8 text-black rounded-30 bg-orange items-center hover:bg-black hover:text-white transition-colors duration-300 group w-full sm:w-max flex justify-center ml-auto text-s lg:text-m lg:gap-16 gap-4"
                        href="#"

                >
                    <span>Свіжі відгуки кожного дня в наших сторіс</span>
                    <span class="size-40 p-4 rounded lg:flex items-center justify-center transition-colors duration-300 border border-solid border-black group-hover:border-white">
									<svg
                                            class="size-full group-hover:fill-white transition-colors duration-300 ease-linear fill-black"
                                    >
										<use href="#instagram-icon"></use>
									</svg>
								</span>
                </a>
            </div>

            <div class="tabs-container">
                <div class="mb-16">
                    <div
                            class="flex gap-16 overflow-x-scroll tab__buttons leading-snug mb-16"
                    >
                        <div
                                class="tab__button py-8 px-40 rounded-30 font-semibold border border-solid border-gray cursor-pointer hover:bg-black hover:border-black hover:text-white duration-300 transition-colors ease-linear flex-shrink-0 text-gray lg:min-w-[2.95rem] flex-center <?php if (!count($text_reviews)): ?>
                                disabled
                                <?php endif; ?>"
                        >
                            Відгуки
                        </div>
                        <div
                                class="tab__button py-8 px-40 rounded-30 font-semibold border border-solid border-gray cursor-pointer hover:bg-black hover:border-black hover:text-white duration-300 transition-colors ease-linear flex-shrink-0 text-gray lg:min-w-[2.95rem] flex-center <?php if (!count($video_reviews)): ?>
                                disabled
                                <?php endif; ?>"
                        >
                            Відео відгуки
                        </div>
                    </div>

                    <div class="relative tab__contents">
                        <div
                                class="tab__content opacity-0 bg-bg transition-opacity duration-300 ease-linear"
                        >
                            <div class="swiper mb-40" data-swiper="reviewsSlider">
                                <div class="swiper-wrapper mb-24">
                                    <?php if (count($text_reviews)):
                                        foreach ($text_reviews as $idx => $review) {


                                            ?>
                                            <div class="swiper-slide">
                                                <div
                                                        class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                                >
                                                    <div class="image size-full">
                                                        <?= dn_get_image_attachment(get_field('review_img', $review->ID), 'full', 'Відгук - №' . $idx + 1, 'object-contain') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }endif; ?>

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
                        <div
                                class="tab__content absolute top-0 opacity-0 bg-bg transition-opacity duration-300 ease-linear min-w-0 w-full"
                        >
                            <div class="swiper mb-40" data-swiper="reviewsVideoSlider">
                                <div class="swiper-wrapper mb-24">
                                    <?php if (count($video_reviews)):
                                        foreach ($video_reviews as $idx => $review) {


                                            ?>
                                            <div class="swiper-slide">
                                                <div
                                                        class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                                >
                                                    <div class="image size-full">
                                                        <video class="absolute h-full object-cover w-full"
                                                               src="<?= get_field('video', $review->ID) ?>"></video>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } endif; ?>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
wp_reset_postdata();
?>

