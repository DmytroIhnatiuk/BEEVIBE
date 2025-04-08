<?php ?>
<section class="mb-[.64rem] lg:mb-[1.1rem]">
    <div class="container">
        <div class="grid lg:grid-cols-[2fr,1fr] orange-gradient rounded-30">
            <div class="sm:px-[.8rem] pt-50 pb-32 px-20 sm:py-100">
                <h2 class="mb-24">
                    Потрібна допомога в підборі якісного догляду?
                </h2>
                <p class="h4 font-semibold lg:pr-100 mb-24">
                    Наші менеджери допоможуть вам і залюбки дадуть відповідь на
                    всі ваші питання
                </p>
                <form class="form text-blue max-w-[7.26rem]">
                    <div
                        class="flex flex-wrap justify-between mx-auto gap-x-8 gap-y-24"
                    >
                        <div class="flex form-item flex-col w-full lg:w-[2.35rem]">
                            <label for="name" class="text-s font-semibold mb-4">
                                Ім’я</label
                            >
                            <input
                                type="text"
                                name="name"
                                id="name-calc"
                                class="text-l h-[.54rem] border border-solid bg-transparent p-12 flex items-center rounded-30"
                            />
                            <div class="form-item__message"></div>
                        </div>
                        <div class="flex form-item flex-col w-full lg:w-[2.35rem]">
                            <label for="phone" class="text-s mb-4">
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
                        <button
                            type="submit"
                            class="btn-black h-[0.54rem] self-end w-full lg:w-auto"
                        >
                            Відправити
                        </button>
                    </div>
                </form>
            </div>
            <div
                class="image w-full h-[3.26rem] sm:h-[6rem] lg:h-full rounded-30 overflow-hidden"
            >
                <img class="object-cover" src="<?= get_img_link('form.webp') ?>" alt="form_img"/>
            </div>
        </div>
    </div>
</section>
