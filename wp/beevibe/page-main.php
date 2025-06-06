<?php /* Template Name: Головна сторінка  */

get_header();


?>
    <main>
        <section class="pt-[var(--header-height)] mb-[.64rem] lg:mb-[1.1rem]">
            <div class="container">
                <div
                        class="swiper relative overflow-hidden rounded-30 mb-12 sm:mb-0"
                        data-swiper="mainFrameSlider"
                >
                    <div class="swiper-wrapper">
                        <?php if (have_rows('main_slider')):
                            while (have_rows('main_slider')) : the_row();
                                $image = get_sub_field('baner');
                                $image_mob = get_sub_field('baner_mob');
                                ?>

                                <div class="swiper-slide overflow-hidden rounded-30">
                                    <div class="h-[2.24rem] sm:h-[3.8rem] lg:h-[4.9rem] relative">
                                        <div class="image size-full">
                                            <picture>
                                                <source
                                                        srcset="<?= esc_url(dn_get_image_src($image)) ?>"
                                                        media="(min-width: 1024px)"
                                                />
                                                <?= dn_get_image_attachment($image_mob, 'full', 'Зображення', 'object-cover') ?>

                                            </picture>
                                        </div>
                                        <h1 class="hidden">BeeVibe</h1>
                                        <a href="/shop/"
                                           class="btn-black absolute left-[.22rem] sm:left-40 bottom-40 lg:left-100 lg:bottom-100"
                                        >
                                            Купити
                                        </a>
                                    </div>
                                </div>


                            <?php endwhile;
                        endif;
                        ?>


                    </div>
                    <button
                            class="btn-prev swiper-button z-50 text-red absolute top-1/2 -translate-y-1/2 size-[.62rem] rounded-r-30 bg-light-orange lg:flex-center lg:hover:bg-white uration-300 transition-colors ease-linear hidden"
                    >
                        <svg
                                class="size-24 duration-300 transition-colors ease-linear fill-transparent stroke-black rotate-90"
                        >
                            <use xlink:href="#cheven-icon"></use>
                        </svg>
                    </button>
                    <button
                            class="btn-next z-50 swiper-button text-red absolute top-1/2 -translate-y-1/2 size-[.62rem] rounded-l-30 bg-light-orange lg:flex-center lg:hover:bg-white duration-300 transition-colors ease-linear hidden right-0"
                    >
                        <svg
                                class="size-24 duration-300 transition-colors ease-linear fill-transparent stroke-black -rotate-90"
                        >
                            <use xlink:href="#cheven-icon"></use>
                        </svg>
                    </button>
                    <div class="swiper-pagination lg:!bottom-24"></div>
                </div>
                <div class="btn-black w-full sm:hidden">В каталог</div>
            </div>
        </section>
        <section class="mb-[.64rem] lg:mb-[1.1rem]">
            <div class="container">
                <h2 class="sm:text-center mb-16 sm:mb-36">Топ продажів</h2>
            </div>
            <div class="pl-[var(--container-gap)] lg:px-[var(--container-gap)]">
                <div class="swiper" data-swiper="topSalesSlider">
                    <div class="swiper-wrapper pt-6 pb-24 sm:pb-32">
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <div class="line-through text-gray text-s">550 грн</div>
                                    <div class="flex flex-shrink-0 gap-8">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
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
                                    <div
                                            class="p-8 uppercase text-s font-bold rounded-30 bg-red text-white"
                                    >
                                        sale
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <!-- <div class="line-through text-gray text-s">550 грн</div> -->
                                    <div class="flex flex-shrink-0 gap-8">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
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
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <!-- <div class="line-through text-gray text-s">550 грн</div> -->
                                    <div class="flex flex-shrink-0 gap-8">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
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
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <div class="line-through text-gray text-s">550 грн</div>
                                    <div class="flex flex-shrink-0 gap-8">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
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
                                    <div
                                            class="p-8 uppercase text-s font-bold rounded-30 bg-red text-white"
                                    >
                                        sale
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                            class="flex  swiper-navigation justify-end sm:justify-center gap-16 pr-[var(--container-gap)] lg:pr-0"
                    >
                        <div class="slider-btn  swiper-button prev">
                            <svg
                                    class="size-full d fill-transparent stroke-black rotate-90"
                            >
                                <use xlink:href="#cheven-icon"></use>
                            </svg>
                        </div>
                        <div class="slider-btn  swiper-button next">
                            <svg
                                    class="size-full d fill-transparent stroke-black -rotate-90"
                            >
                                <use xlink:href="#cheven-icon"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-[.64rem] lg:mb-[1.1rem]">
            <div class="container">
                <h2 class="sm:text-center mb-16 sm:mb-36">Наші новинки</h2>
            </div>
            <div class="pl-[var(--container-gap)] lg:px-[var(--container-gap)]">
                <div class="swiper" data-swiper="newSlider">
                    <div class="swiper-wrapper pt-6 pb-24 sm:pb-32">
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <div class="line-through text-gray text-s">550 грн</div>
                                    <div class="flex flex-shrink-0 gap-8 items-center">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
                                                class="size-40 sm:size-[.48rem] rounded flex items-center justify-center transition-colors duration-300 bg-black pb-6 lg:hover:bg-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:hover:border-orange lg:hidden"
                                        >
                                            <svg
                                                    class="size-24 sm:size-[.29rem] fill-none stroke-white transition-colors duration-300 ease-linear group-hover:stroke-black"
                                            >
                                                <use href="#basket-icon"></use>
                                            </svg>
                                        </button>
                                        <button class="btn-black-orange hidden lg:flex">
                                            В кошик
                                        </button>
                                    </div>
                                </div>
                                <div class="flex absolute -top-6">
                                    <div
                                            class="p-8 uppercase text-s font-bold rounded-30 bg-khaki"
                                    >
                                        new
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <div class="line-through text-gray text-s">550 грн</div>
                                    <div class="flex flex-shrink-0 gap-8 items-center">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
                                                class="size-40 sm:size-[.48rem] rounded flex items-center justify-center transition-colors duration-300 bg-black pb-6 lg:hover:bg-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:hover:border-orange lg:hidden"
                                        >
                                            <svg
                                                    class="size-24 sm:size-[.29rem] fill-none stroke-white transition-colors duration-300 ease-linear group-hover:stroke-black"
                                            >
                                                <use href="#basket-icon"></use>
                                            </svg>
                                        </button>
                                        <button class="btn-black-orange hidden lg:flex">
                                            В кошик
                                        </button>
                                    </div>
                                </div>
                                <div class="flex absolute -top-6">
                                    <div
                                            class="p-8 uppercase text-s font-bold rounded-30 bg-khaki"
                                    >
                                        new
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <div class="line-through text-gray text-s">550 грн</div>
                                    <div class="flex flex-shrink-0 gap-8 items-center">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
                                                class="size-40 sm:size-[.48rem] rounded flex items-center justify-center transition-colors duration-300 bg-black pb-6 lg:hover:bg-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:hover:border-orange lg:hidden"
                                        >
                                            <svg
                                                    class="size-24 sm:size-[.29rem] fill-none stroke-white transition-colors duration-300 ease-linear group-hover:stroke-black"
                                            >
                                                <use href="#basket-icon"></use>
                                            </svg>
                                        </button>
                                        <button class="btn-black-orange hidden lg:flex">
                                            В кошик
                                        </button>
                                    </div>
                                </div>
                                <div class="flex absolute -top-6">
                                    <div
                                            class="p-8 uppercase text-s font-bold rounded-30 bg-khaki"
                                    >
                                        new
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                    class="p-8 sm:p-12 bg-white rounded-30 relative box-shadow"
                            >
                                <div
                                        class="image w-full pt-[97%] rounded-30 overflow-hidden mb-8 sm:mb-16"
                                >
                                    <img src="@img/top-sales.png" alt="top-sales"/>
                                </div>
                                <h3 class="h4 font-semibold mb-4 sm:mb-8">
                                    Крем-маска для нормальної шкіри
                                </h3>
                                <div class="mb-4 sm:mb-8 text-s sm:text-m">100 мл</div>
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[.2rem] font-semibold">450 грн</div>
                                    <div class="line-through text-gray text-s">550 грн</div>
                                    <div class="flex flex-shrink-0 gap-8 items-center">
                                        <a
                                                href="#"
                                                class="size-[.48rem] rounded items-center justify-center transition-colors duration-300 bg-transparent lg:hover:bg-light-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:flex-center lg:hover:border-light-orange hidden"
                                        >
                                            <svg
                                                    class="size-24 fill-none transition-colors duration-300 ease-linear stroke-black"
                                            >
                                                <use href="#arrow-icon"></use>
                                            </svg>
                                        </a>
                                        <button
                                                class="size-40 sm:size-[.48rem] rounded flex items-center justify-center transition-colors duration-300 bg-black pb-6 lg:hover:bg-orange group ml-auto lg:ml-0 flex-shrink-0 border border-solid border-black lg:hover:border-orange lg:hidden"
                                        >
                                            <svg
                                                    class="size-24 sm:size-[.29rem] fill-none stroke-white transition-colors duration-300 ease-linear group-hover:stroke-black"
                                            >
                                                <use href="#basket-icon"></use>
                                            </svg>
                                        </button>
                                        <button class="btn-black-orange hidden lg:flex">
                                            В кошик
                                        </button>
                                    </div>
                                </div>
                                <div class="flex absolute -top-6">
                                    <div
                                            class="p-8 uppercase text-s font-bold rounded-30 bg-khaki"
                                    >
                                        new
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                            class="flex  swiper-navigation justify-end sm:justify-center gap-16 pr-[var(--container-gap)] lg:pr-0"
                    >
                        <div class="slider-btn  swiper-button prev">
                            <svg
                                    class="size-full d fill-transparent stroke-black rotate-90"
                            >
                                <use xlink:href="#cheven-icon"></use>
                            </svg>
                        </div>
                        <div class="slider-btn  swiper-button next">
                            <svg
                                    class="size-full d fill-transparent stroke-black -rotate-90"
                            >
                                <use xlink:href="#cheven-icon"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-[.64rem] lg:mb-[1.1rem]">
            <div class="lg:px-[var(--container-gap)] pl-[var(--container-gap)]">
                <div
                        class="lg:flex justify-between mb-16 sm:mb-36 pr-[var(--container-gap)] lg:pr-0"
                >
                    <h2 class="mb-24 lg:mb-0">
                        <span class="lg:block">500+ реальних відгуків</span>
                    </h2>

                    <a
                            class="py-8 sm:pl-40 pr-8 text-black rounded-30 bg-orange items-center hover:bg-black hover:text-white transition-colors duration-300 group w-full sm:w-max flex justify-center ml-auto text-s lg:text-m lg:gap-16 gap-4"
                            href="#"
                    ><span>Свіжі відгуки кожного дня в наших сторіс</span>

                        <span
                                href="#"
                                class="size-40 p-4 rounded lg:flex items-center justify-center transition-colors duration-300 border border-solid border-black group-hover:border-white"
                        >
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
                                    class="tab__button py-8 px-40 rounded-30 font-semibold border border-solid border-gray cursor-pointer hover:bg-black hover:border-black hover:text-white duration-300 transition-colors ease-linear flex-shrink-0 text-gray lg:min-w-[2.95rem] flex-center"
                            >
                                Відгуки
                            </div>
                            <div
                                    class="tab__button py-8 px-40 rounded-30 font-semibold border border-solid border-gray cursor-pointer hover:bg-black hover:border-black hover:text-white duration-300 transition-colors ease-linear flex-shrink-0 text-gray lg:min-w-[2.95rem] flex-center"
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
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                            class="flex justify-end sm:justify-center gap-16 pr-[var(--container-gap)] lg:pr-0  swiper-navigation"
                                    >
                                        <div class="slider-btn  swiper-button prev">
                                            <svg
                                                    class="size-full d fill-transparent stroke-black rotate-90"
                                            >
                                                <use xlink:href="#cheven-icon"></use>
                                            </svg>
                                        </div>
                                        <div class="slider-btn  swiper-button next">
                                            <svg
                                                    class="size-full d fill-transparent stroke-black -rotate-90"
                                            >
                                                <use xlink:href="#cheven-icon"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                    class="tab__content absolute top-0 opacity-0 bg-bg transition-opacity duration-300 ease-linear min-w-0 w-full"
                            >
                                <div class="swiper mb-40" data-swiper="reviewsVideoSlider">
                                    <div class="swiper-wrapper mb-24">
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div
                                                    class="border border-solid border-black overflow-hidden h-[3.6rem] sm:h-[4.25rem] rounded-30"
                                            >
                                                <div class="image size-full">
                                                    <img
                                                            class="object-contain"
                                                            src="@img/review.png"
                                                            alt="review"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                            class="flex  swiper-navigation justify-end sm:justify-center gap-16 pr-[var(--container-gap)] lg:pr-0"
                                    >
                                        <div class="slider-btn  swiper-button prev">
                                            <svg
                                                    class="size-full d fill-transparent stroke-black rotate-90"
                                            >
                                                <use xlink:href="#cheven-icon"></use>
                                            </svg>
                                        </div>
                                        <div class="slider-btn  swiper-button next">
                                            <svg
                                                    class="size-full d fill-transparent stroke-black -rotate-90"
                                            >
                                                <use xlink:href="#cheven-icon"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-[.64rem] lg:mb-[1.1rem]">
            <div class="container">
                <h2 class="lg:w-1/2 mb-16 sm:mb-36">
                    Результат використання косметики BeeVibe
                </h2>
                <div class="swiper" data-swiper="resultsSwiper">
                    <div class="swiper-wrapper mb-24">
                        <div class="swiper-slide">
                            <div class="flex h-[2.18rem] sm:h-[3.88rem]">
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <img
                                            class="!object-cover"
                                            src="@img/before.png"
                                            alt="before"
                                    />
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        До
                                    </div>
                                </div>
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <img
                                            class="!object-cover"
                                            src="@img/after.png"
                                            alt="before"
                                    />
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        Після
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="flex h-[2.18rem] sm:h-[3.88rem]">
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <img
                                            class="!object-cover"
                                            src="@img/before.png"
                                            alt="before"
                                    />
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        До
                                    </div>
                                </div>
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <img
                                            class="!object-cover"
                                            src="@img/after.png"
                                            alt="before"
                                    />
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        Після
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="flex h-[2.18rem] sm:h-[3.88rem]">
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <img
                                            class="!object-cover"
                                            src="@img/before.png"
                                            alt="before"
                                    />
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        До
                                    </div>
                                </div>
                                <div
                                        class="image h-full w-1/2 rounded-[.2rem] overflow-hidden"
                                >
                                    <img
                                            class="!object-cover"
                                            src="@img/after.png"
                                            alt="before"
                                    />
                                    <div
                                            class="rounded-30 p-8 bg-white font-bold absolute top-8 left-8 min-w-[.7rem] text-center text-s sm:text-m"
                                    >
                                        Після
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                            class="flex  swiper-navigation justify-center gap-16 pr-[var(--container-gap)] lg:pr-0"
                    >
                        <div class="slider-btn  swiper-button prev">
                            <svg
                                    class="size-full d fill-transparent stroke-black rotate-90"
                            >
                                <use xlink:href="#cheven-icon"></use>
                            </svg>
                        </div>
                        <div class="slider-btn  swiper-button next">
                            <svg
                                    class="size-full d fill-transparent stroke-black -rotate-90"
                            >
                                <use xlink:href="#cheven-icon"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-[.64rem] lg:mb-[1.1rem]">
            <div class="container">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-20">
                    <div
                            class="image w-full h-[4.57rem] rounded-30 overflow-hidden hidden lg:flex"
                    >
                        <img src="<?= get_img_link('about_1.webp') ?>" alt="about_photo"/>
                    </div>
                    <div class="lg:px-8 lg:py-32">
                        <h2 class="mb-16 sm:mb-24">Про BeeVibe</h2>
                        <p class="font-bold mb-12 sm:mb-16">
                            BeeVibe — це натуральна медова косметика власного виробництва
                            в Україні.
                        </p>
                        <p class="mb-16 sm:mb-24">
                            Ми віримо, що базовий догляд може бути простим і ефективним.
                            Усього три продукти забезпечують глибоке зволоження, природне
                            сяйво та здоровий вигляд шкіри. Наші формули створює Кандидат
                            фармацевтичних наук із сертифікованих європейських
                            компонентів, щоб ви були впевнені у якості кожного продукту.
                        </p>
                        <a
                                href="/about/"
                                class="flex items-center gap-16 font-bold group hover:text-orange transition-colors duration-300 ease-linear"
                        >
                            <span>Дізнатися більше</span>
                            <span

                                    class="size-40 p-8 rounded flex items-center justify-center transition-colors duration-300 border border-solid border-black group-hover:border-light-orange group-hover:bg-light-orange"
                            >
										<svg
                                                class="size-full fill-black transition-colors duration-300 ease-linear"
                                        >
											<use href="#arrow-icon"></use>
										</svg> </span
                            ></a>
                    </div>
                    <div
                            class="image w-full h-[3.14rem] sm:h-[4.5rem] lg:h-[4.96rem] rounded-30 overflow-hidden"
                    >
                        <img
                                class="!object-cover"
                                src="<?= get_img_link('about_2.webp') ?>"
                                alt="about_photo"
                        />
                    </div>
                </div>
            </div>
        </section>
        <?= get_template_part('template-parts/blocks/form'); ?>
    </main>



    <!--        --><?php //= get_template_part('template-parts/blocks/blog'); ?>
    <!--        --><?php //= get_template_part('template-parts/blocks/commentForm'); ?>


<?php
get_footer();
