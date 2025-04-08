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
                        <a href="tel:+38(093)455-35-35">+38(093)455-35-35</a>
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
                            src="@img/visa.png"
                            alt="visa"
                    />
                </div>
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="@img/master.png"
                            alt="visa"
                    />
                </div>
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="@img/google-pay.png"
                            alt="visa"
                    />
                </div>
                <div
                        class="w-[.6rem] h-40 overflow-hidden rounded-[3px] cursor-pointer"
                >
                    <img
                            class="size-full object-cover object-center"
                            src="@img/apple-pay.png"
                            alt="visa"
                    />
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->
<?= get_template_part('template-parts/blocks/modal'); ?>
<?= get_template_part('template-parts/svg'); ?>
<?php wp_footer(); ?>

</body>
</html>
