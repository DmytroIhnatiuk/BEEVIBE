<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beevibe
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('body text-dark-blue'); ?>>
<?php wp_body_open(); ?>
<div  class="page-container">
    <header
            class="h-[var(--header-height)] py-14 lg:py-16 flex z-50 w-full transition-transform duration-500 ease-linear top-0 right-0 left-0 fixed"
    >
        <div class="container">
            <div
                    class="flex items-center bg-white rounded-30 py-10 px-16 sm:px-32 box-shadow"
            >
                <a
                        href="index.html"
                        class="block w-[1.16rem] lg:w-[1.36rem] relative z-[100] h-36 sm:h-[.46rem]"
                >
                    <svg
                            class="size-full duration-300 header-logo transition-colors ease-linear"
                    >
                        <use xlink:href="#logo"></use>
                    </svg>
                </a>
                <div
                        class="lg:ml-auto menu bg-black absolute top-14 lg:top-0 lg:relative h-[calc(100vh-.28rem)] w-[3.59rem] lg:w-auto lg:h-auto -right-[3.75rem] lg:right-0 lg:p-0 flex flex-col lg:items-center justify-center lg:flex-row translate-x-full lg:translate-x-0 transition-transform duration-300 lg:bg-transparent z-[90] rounded-l-30 sm:rounded-30 pt-[var(--header-height)] pr-16 pl-24 pb-32"
                >
                    <nav class="lg:mr-24 overflow-y-scroll lg:h-auto h-full">
                        <ul class="flex flex-col lg:flex-row text-l lg:text-s">
                            <li class="nav-list active">
                                <a href="catalog.html">Обличчя</a>
                            </li>
                            <li class="nav-list">
                                <a href="catalog.html">Тіло</a>
                            </li>
                            <li class="nav-list">
                                <a href="catalog.html">Сонцезахист</a>
                            </li>
                            <li class="nav-list">
                                <a href="catalog.html">Набори доглядової косметики</a>
                            </li>
                            <li class="menu-accordion accordion">
                                <div
                                        class="menu-accordion-header accordion-header nav-list flex items-center gap-4"
                                >
                                    <div>Інше</div>
                                    <span
                                            class="size-16 transition-transform duration-300 ease-linear"
                                    >
									<svg
                                            class="size-full duration-300 transition-colors ease-linear fill-transparent stroke-white lg:stroke-black"
                                    >
										<use xlink:href="#cheven-icon"></use>
									</svg>
								</span>
                                </div>
                                <div
                                        class="menu-accordion-content accordion-content lg:absolute pl-14 lg:pl-0"
                                >
                                    <div
                                            class="pb:14 lg:pb-24 lg:pt-14 lg:bg-white rounded-b-30 w-max"
                                    >
                                        <ul>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="catalog.html"
                                                >Аксесуари</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="catalog.html"
                                                >Для постійних клієнтів</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="catalog.html"
                                                >Для чоловіків</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion">
                                <div class="accordion-header nav-list flex items-center gap-4">
                                    <div>Клієнтам</div>
                                    <span
                                            class="size-16 transition-transform duration-300 ease-linear"
                                    >
									<svg
                                            class="size-full duration-300 transition-colors ease-linear fill-transparent stroke-white lg:stroke-black"
                                    >
										<use xlink:href="#cheven-icon"></use>
									</svg>
								</span>
                                </div>
                                <div class="accordion-content lg:absolute pl-14 lg:pl-0">
                                    <div
                                            class="pb:14 lg:pb-24 lg:pt-14 lg:bg-white rounded-b-30 w-max"
                                    >
                                        <ul>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="about.html"
                                                >Про компанію</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="payment_&_delivery.html"
                                                >Оплата і доставка</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="#"
                                                >Повернення товару</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="#"
                                                >Угода користувача</a
                                                >
                                            </li>
                                            <li>
                                                <a
                                                        class="py-8 px-12 bg-transparent lg:hover:bg-light-orange lg:w-full mb-4 lg:mb-0"
                                                        href="#"
                                                >Публічна оферта</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-list">
                                <a class="font-bold lg:font-normal" href="#">Контакти</a>
                            </li>
                        </ul>
                        <a
                                class="mb-14 block ml-26 font-s lg:hidden"
                                href="tel:+380 00 000 00 00 "
                        >+380 00 000 00 00</a
                        >
                        <a
                                class="block ml-26 font-s lg:hidden"
                                href="mailto:beevibe@gmail.com"
                        >beevibe@gmail.com</a
                        >
                    </nav>
                    <div
                            class="flex gap-8 flex-shrink-0 lg:hidden pl-14 lg:pl-0 h-50 items-end"
                    >
                        <a
                                href="#"
                                class="size-32 rounded flex items-center justify-center transition-colors duration-300 bg-orange"
                        >
                            <svg
                                    class="size-full transition-colors duration-300 ease-linear fill-black"
                            >
                                <use href="#telegram-icon"></use>
                            </svg>
                        </a>
                        <a
                                href="#"
                                class="size-32 rounded flex items-center justify-center transition-colors duration-300 bg-orange"
                        >
                            <svg
                                    class="size-full transition-colors duration-300 ease-linear fill-black"
                            >
                                <use href="#instagram-icon"></use>
                            </svg>
                        </a>
                    </div>
                </div>

                <button
                        class="size-32 rounded flex items-center justify-center transition-colors duration-300 bg-black pb-6 lg:hover:bg-orange group mr-8 lg:mr-12 ml-auto lg:ml-0"
                >
                    <svg
                            class="size-24 fill-none stroke-white transition-colors duration-300 ease-linear group-hover:stroke-black"
                    >
                        <use href="#basket-icon"></use>
                    </svg>
                </button>
                <a
                        href="#"
                        class="size-32 rounded lg:flex items-center justify-center transition-colors duration-300 bg-black lg:hover:bg-orange group hidden"
                >
                    <svg
                            class="size-full fill-white transition-colors duration-300 ease-linear group-hover:fill-black"
                    >
                        <use href="#telegram-icon"></use>
                    </svg>
                </a>

                <button class="burger lg:hidden">
                    <div class="line">
                        <span></span>
                    </div>
                </button>
            </div>
        </div>
    </header>

