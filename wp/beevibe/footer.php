<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beevibe
 */

?>

<footer
        id="contacts"
        class="footer bg-black py-[.54rem] sm:pb-[.44rem] sm:pt-[.8rem] text-white rounded-t-30"
>
    <div class="container">
        <div
                class="grid lg:grid-cols-12 sm:grid-cols-3 grid-cols-2 gap-20 gap-y-40 mb-[.5rem]"
        >
            <a
                    href="index.html"
                    class="col-start-1 col-end-3 lg:col-end-4 block mb-12 lg:mb-0 max-h-[0.6rem] sm:max-h-[0.9rem] w-[2rem] lg:w-auto"
            >
                <svg class="size-full fill-orange">
                    <use href="#logo"></use>
                </svg>
            </a>
            <div class="col-start-1 lg:col-start-5 lg:col-end-8">
                <div class="font-bold mb-24">Каталог</div>
                <ul class="text-s">
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform"
                    >
                        <a href="#">Обличчя</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform"
                    >
                        <a href="#">Тіло</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform"
                    >
                        <a href="#">Сонцезахист</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform"
                    >
                        <a href="#">Набори доглядової косметики</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform"
                    >
                        <a href="#">Інше</a>
                    </li>
                </ul>
            </div>
            <div class="lg:col-start-8 lg:col-end-11">
                <div class="font-bold mb-24">Каталог</div>

                <ul class="text-s">
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="#">Про компанію</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="#">Опалата і доставка</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="#">Повернення товару</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="#">Угода користувача</a>
                    </li>
                    <li
                            class="mb-24 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="#">Публічна оферта</a>
                    </li>
                </ul>
            </div>
            <div
                    class="lg:col-start-11 lg:col-end-13 col-start-1 col-end-3 sm:col-start-3 sm:col-end-4"
            >
                <div class="font-bold mb-24">Каталог</div>

                <ul class="mb-24">
                    <li
                            class="mb-8 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="tel:<?= get_field('phone', 'option'); ?>"><?= get_field('phone', 'option'); ?></a>
                    </li>

                    <li
                            class="mb-8 last:mb-0 text-s hover:scale-[1.03] transition-transform w-max"
                    >
                        <a href="mailto:beevibe@gmail.com">beevibe@gmail.com</a>
                    </li>
                </ul>
                <div class="flex gap-8">
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
        </div>
        <div
                class="lg:flex items-center justify-between border-t border-solid border-white pt-40"
        >
            <div class="text-gray font-bold mb-16">© 2025 BeeVibe</div>
            <div class="flex gap-4">
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="<?= get_img_link('visa.webp') ?>"
                            alt="visa"
                    />
                </div>
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="<?= get_img_link('master.webp') ?>"
                            alt="master"
                    />
                </div>
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="<?= get_img_link('google-pay.webp') ?>"
                            alt="google-pay"
                    />
                </div>
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="<?= get_img_link('apple-pay.webp') ?>"
                            alt="apple-pay"
                    />
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->
<?php if (!is_checkout()):
    $cart = WC()->cart;
    $cart_count = WC()->cart->get_cart_contents_count();

    $isEmpty = !$cart || !$cart_count;

    ?>
    <div
            data-fullscreen
            class="bg-bg flex flex-col box-shadow overflow-hidden sm:px-100 px-16 py-24 sm:py-40 max-w-[11.3rem] fixed top-0  z-[100] right-0 rounded-l-30 w-full "
            id="cart"
    >
        <div data-cart-wrapper class=" flex flex-col flex-grow">
            <?php woocommerce_mini_cart(); ?>

        </div>
        <div class="flex justify-between items-center mt-auto ">
            <button type="button"
                    class=" cart-close group flex items-center gap-14 lg:hover:text-light-orange transition-colors duration-300 ease-linear">
			<span
                    class="rounded bg-transparent size-[.48rem] border border-solid border-black flex-center lg:group-hover:bg-light-orange lg:group-hover:border-light-orange transition-colors duration-300 ease-linear"
            >
				<svg
                        class="size-24 fill-black rotate-[225deg] transition-colors duration-300 ease-linear"
                >
					<use href="#arrow-icon"></use>
				</svg>
			</span>
                <span class="font-semibold hidden sm:inline-block">Назад до покупок</span>
            </button>
            <a href="/checkout/" class="btn-black <?php if ($isEmpty): ?>
        disabled
        <?php endif; ?>">Оформити замовлення
            </a>
        </div>
        <button type="button"
                class=" absolute top-24 right-16 sm:right-100 cart-close rounded size-32 bg-transparent border border-solid border-black flex-center lg:hover:bg-light-orange lg:hover:border-light-orange transition-colors duration-300"
        >
			<span
                    class="block relative size-16 before:absolute before:h-[1px] before:w-16 before:bg-black before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 after:absolute after:w-[1px] after:h-16 after:bg-black after:top-1/2 after:left-1/2 after:-translate-x-1/2 after:-translate-y-1/2 before:rotate-45 after:rotate-45"
            ></span>
        </button>


        <div class="preloader top-0 left-0 flex items-center justify-center w-full h-full absolute preloader-cart hide">
            <div class="size-[.64rem]">
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

    </div>

<?php endif; ?>
<?= get_template_part('template-parts/blocks/modal'); ?>
<?= get_template_part('template-parts/svg'); ?>
<?php wp_footer(); ?>

</body>
</html>
