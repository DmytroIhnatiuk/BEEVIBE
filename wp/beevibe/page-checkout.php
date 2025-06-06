<?php
/**
 * Template Name: Checkout page
 */
get_header();


?>
<main class="checkout">
    <section
            class="mt-[var(--header-height)] pt-24 lg:pt-32 mb-[.64rem] lg:mb-[1.1rem]"
    >
        <div class="container">
            <div class="flex mb-32 lg:mb-[0.64rem]">
                <a
                        href="index.html "
                        class="lg:hover:text-orange transition-colors duration-300 ease-linear last:pointer-events-none"
                >Головна</a
                >
                <span class="px-4">/</span>
                <a
                        href="#"
                        class="lg:hover:text-orange transition-colors duration-300 ease-linear last:pointer-events-none"
                >Оформлення замовлення</a
                >
            </div>
            <h1 class="mb-24 lg:mb-32">Оформлення замовлення</h1>
            <div class="grid lg:grid-cols-2 gap-20">
                <div class="lg:col-start-2 lg:col-end-3">
                    <div class="accordion z-10 relative">
                        <div
                                class="accordion-header w-full py-12 px-16 border border-solid border-black rounded-30 flex justify-between !bg-bg lg:hidden relative z-10"
                        >
                            Переглянути замовлення
                            <span>
											<svg
                                                    class="block size-24 fill-none stroke-black transition-transform duration-300"
                                            >
												<use xlink:href="#cheven-icon"></use>
											</svg>
										</span>
                        </div>
                        <div
                                class="accordion-content !h-max lg:!opacity-100 lg:!visible absolute lg:static top-1/2 w-full"
                        >
                            <div
                                    class="bg-light-orange px-16 sm:px-[.46rem] pt-[.46rem] pb-24 rounded-30"
                            >
                                <h4 class="font-semibold">Ваше замовлення</h4>
                                <div
                                        class="py-20 border-b border-black border-solid flex justify-between"
                                >
                                    <div class="gap-8 flex">
                                        <a
                                                href="product.html"
                                                class="image block size-100 sm:size-[1.7rem] overflow-hidden rounded-20 flex-shrink-0"
                                        >
                                            <img
                                                    class="object-cover"
                                                    src="@img/about_1.png"
                                                    alt="product"
                                            />
                                        </a>

                                        <div>
                                            <div
                                                    class="col-start-2 col-end-3 sm:col-end-5 lg:col-start-2 lg:col-end-3"
                                            >
                                                <a href="product.html" class="font-semibold mb-8"
                                                >Антицелюлітний крем для тіла</a
                                                >
                                                <div class="text-s mb-12">Артикул: 00000000</div>
                                            </div>

                                            <div class="flex flex-wrap gap-8 items-center">
                                                <div class="h4 font-semibold">
                                                    <span>1</span> x <span>450 грн</span>
                                                </div>
                                                <s class="text-gray lg:mb-4">550 грн</s>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="size-24 ml-8">
                                        <svg
                                                class="size-full duration-300 fill-black lg:hover:fill-white transition-colors ease-linear"
                                        >
                                            <use xlink:href="#del-icon"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div
                                        class="py-20 border-b border-black border-solid flex justify-between"
                                >
                                    <div class="gap-8 flex">
                                        <a
                                                href="product.html"
                                                class="image block size-100 sm:size-[1.7rem] overflow-hidden rounded-20 flex-shrink-0"
                                        >
                                            <img
                                                    class="object-cover"
                                                    src="@img/about_1.png"
                                                    alt="product"
                                            />
                                        </a>

                                        <div>
                                            <div
                                                    class="col-start-2 col-end-3 sm:col-end-5 lg:col-start-2 lg:col-end-3"
                                            >
                                                <a href="product.html" class="font-semibold mb-8"
                                                >Антицелюлітний крем для тіла</a
                                                >
                                                <div class="text-s mb-12">Артикул: 00000000</div>
                                            </div>

                                            <div class="flex flex-wrap gap-8 items-center">
                                                <div class="h4 font-semibold">
                                                    <span>1</span> x <span>450 грн</span>
                                                </div>
                                                <s class="text-gray lg:mb-4">550 грн</s>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="size-24 ml-8">
                                        <svg
                                                class="size-full duration-300 fill-black lg:hover:fill-white transition-colors ease-linear"
                                        >
                                            <use xlink:href="#del-icon"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div
                                        class="py-20 border-b border-black border-solid flex justify-between"
                                >
                                    <div class="gap-8 flex">
                                        <a
                                                href="product.html"
                                                class="image block size-100 sm:size-[1.7rem] overflow-hidden rounded-20 flex-shrink-0"
                                        >
                                            <img
                                                    class="object-cover"
                                                    src="@img/about_1.png"
                                                    alt="product"
                                            />
                                        </a>

                                        <div>
                                            <div
                                                    class="col-start-2 col-end-3 sm:col-end-5 lg:col-start-2 lg:col-end-3"
                                            >
                                                <a href="product.html" class="font-semibold mb-8"
                                                >Антицелюлітний крем для тіла</a
                                                >
                                                <div class="text-s mb-12">Артикул: 00000000</div>
                                            </div>

                                            <div class="flex flex-wrap gap-8 items-center">
                                                <div class="h4 font-semibold">
                                                    <span>1</span> x <span>450 грн</span>
                                                </div>
                                                <s class="text-gray lg:mb-4">550 грн</s>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="size-24 ml-8">
                                        <svg
                                                class="size-full duration-300 fill-black lg:hover:fill-white transition-colors ease-linear"
                                        >
                                            <use xlink:href="#del-icon"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div
                                        class="flex h4 font-semibold justify-between items-center text-gray mb-4 mt-16"
                                >
                                    <div>Знижка:</div>
                                    <div>200 грн</div>
                                </div>
                                <div
                                        class="flex h4 font-semibold justify-between items-center"
                                >
                                    <div>Разом до сплати:</div>
                                    <div>2900 грн</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-start-1 lg:col-end-2 lg:row-start-1 lg:pr-20">
                    <form class="form">
                        <div class="mb-24 sm:mb-32">
                            <div class="h4 flex items-center font-semibold mb-16">
                                <div
                                        class="sm:size-50 size-40 flex-center bg-light-orange mr-12 rounded"
                                >
                                    01
                                </div>
                                Одержувач замовлення
                            </div>
                            <div class="sm:flex sm:gap-x-24 mb-12">
                                <div
                                        class="flex form-item flex-col w-full sm:w-1/2 mb-12 sm:mb-0"
                                >
                                    <label
                                            for="name-add"
                                            class="text-s font-semibold mb-4 hidden"
                                    >
                                        Прізвище</label
                                    >
                                    <input
                                            type="text"
                                            name="surname"
                                            placeholder="Прізвище"
                                            id="surname"
                                            class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                                    />
                                    <div class="form-item__message"></div>
                                </div>
                                <div
                                        class="flex form-item flex-col w-full sm:w-1/2 mb-12 sm:mb-0"
                                >
                                    <label
                                            for="name"
                                            class="text-s font-semibold mb-4 hidden"
                                    >
                                        Ім’я</label
                                    >
                                    <input
                                            type="text"
                                            name="name"
                                            placeholder="Ім’я"
                                            id="name"
                                            class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                                    />
                                    <div class="form-item__message"></div>
                                </div>
                            </div>
                            <div class="flex form-item flex-col w-full">
                                <label for="phone-add" class="text-s mb-4 hidden">
                                    Номер телефона</label
                                >
                                <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                                />
                                <div class="form-item__message"></div>
                            </div>
                        </div>
                        <div class="mb-24 sm:mb-32">
                            <div class="h4 flex items-center font-semibold mb-16">
                                <div
                                        class="sm:size-50 size-40 flex-center bg-light-orange mr-12 rounded"
                                >
                                    02
                                </div>
                                Доставка
                            </div>
                            <p class="mb-12 sm:mb-24">
                                Доставка по Україні здійснюється Новою поштою. Вартість
                                доставки розраховується поштовою службою.
                            </p>
                            <div class="font-semibold mb-16">Адреса доставки:</div>
                            <div class="sm:flex sm:gap-x-24 mb-12">
                                <div
                                        class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30 w-full sm:w-1/2 mb-12 sm:mb-0"
                                ></div>
                                <div
                                        class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30 w-full sm:w-1/2 mb-12 sm:mb-0"
                                ></div>
                            </div>
                            <div
                                    class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30 w-full"
                            ></div>
                        </div>
                        <div class="mb-24 sm:mb-32">
                            <div class="h4 flex items-center font-semibold mb-16">
                                <div
                                        class="sm:size-50 size-40 flex-center bg-light-orange mr-12 rounded"
                                >
                                    03
                                </div>
                                Оплата
                            </div>
                            <div class="round-check">
                                <label
                                        class="checkbox flex items-center gap-16 w-max cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-12 font-semibold"
                                >
                                    <input type="checkbox" class="hidden" />
                                    <span
                                            class="size-24 rounded border border-solid border-black relative before:transition-colors before:duration-300 before:bg-transparent before:size-14 before:rounded before:position-center"
                                    >
												</span>
                                    Повна оплата на сайті онлайн
                                </label>
                                <p class="mb-24">
                                    Оплата на сайті за допомогою картки, Apple чи Google Pay
                                </p>
                                <label
                                        class="checkbox font-semibold flex items-center gap-16 w-max cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-24"
                                >
                                    <input type="checkbox" class="hidden" />
                                    <span
                                            class="size-24 rounded border border-solid border-black relative before:transition-colors before:duration-300 before:bg-transparent before:size-14 before:rounded before:position-center"
                                    >
												</span>
                                    Оплата наложенним платежем
                                </label>
                            </div>
                            <label
                                    class="checkbox font-semibold flex items-center gap-16 cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-24"
                            >
                                <input type="checkbox" class="hidden" />
                                <span
                                        class="size-24 border border-solid border-black relative flex-center transition-colors duration-300"
                                ><svg
                                            class="size-24 fill-none transition-colors duration-300 ease-linear"
                                    >
													<use href="#check-icon"></use>
												</svg>
											</span>
                                Зателефонуйте мені для підтвердження замовлення
                            </label>
                            <label
                                    class="checkbox flex gap-16 cursor-pointer lg:hover:text-orange transition-colors duration-300 mb-32 sm:mb-40"
                            >
                                <input type="checkbox" class="hidden" />
                                <span
                                        class="size-24 border border-solid border-black relative flex-center transition-colors duration-300"
                                ><svg
                                            class="size-24 fill-none transition-colors duration-300 ease-linear"
                                    >
													<use href="#check-icon"></use>
												</svg>
											</span>
                                При оформленні замовлення я погоджуюсь на обробку моїх
                                персональних даних та іншу інформацію, описану на сторінці
                                політика конфіденційності
                            </label>
                            <button class="btn-black w-full sm:w-[3.2rem] py-16">
                                Оформити замовлення
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php echo do_shortcode('[woocommerce_checkout]'); ?>
</main>


<?php
wp_footer(); ?>

