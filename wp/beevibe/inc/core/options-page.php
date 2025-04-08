<?php
function custom_options_page()
{
    add_options_page(
        'Інформаційні налаштування', // Название страницы
        'Інформаційні налаштування', // Название меню
        'manage_options', // Права доступа
        'custom-options', // Уникальный идентификатор
        'custom_options_page_html' // Функция для вывода HTML
    );
}


function custom_options_page_html()
{
    ?>
    <div class="wrap">
        <h1>Інформація</h1>
        <form action="options.php" method="POST">
            <?php
            settings_fields('contact_options_group');
            do_settings_sections('contact-options'); // Здесь будут отображаться поля
            submit_button(); // Одна кнопка отправки для всех полей
            ?>
        </form>
    </div>
    <?php
}

function custom_options_init()
{
    // Регистрируем настройки
    register_setting('contact_options_group', 'phone_number');
    register_setting('contact_options_group', 'address');
    register_setting('contact_options_group', 'google_maps');
    register_setting('contact_options_group', 'instagram_url');
    register_setting('contact_options_group', 'facebook_url');

    // Контактные данные
    add_settings_section(
        'contact_data_section', // Идентификатор секции
        'Контактні дані', // Заголовок секции
        null, // Функция обратного вызова
        'contact-options' // Страница
    );
    add_settings_field(
        'phone_number', // Идентификатор поля
        'Телефон', // Название поля
        'phone_number_callback', // Функция вывода поля
        'contact-options', // Страница
        'contact_data_section' // Секция
    );
    add_settings_field(
        'address', // Идентификатор поля
        'Адреса', // Название поля
        'address_callback', // Функция вывода поля
        'contact-options', // Страница
        'contact_data_section' // Секция
    );

    add_settings_field(
        'google_maps', // Идентификатор поля
        'Google Maps', // Название поля
        'google_maps_callback', // Функция вывода поля
        'contact-options', // Страница
        'contact_data_section' // Секция
    );

    // Социальные сети
    add_settings_section(
        'social_media_section', // Идентификатор секции
        'Соціальні мережі', // Заголовок секции
        null, // Функция обратного вызова
        'contact-options' // Страница
    );
    add_settings_field(
        'instagram_url', // Идентификатор поля
        'Instagram', // Название поля
        'instagram_url_callback', // Функция вывода поля
        'contact-options', // Страница
        'social_media_section' // Секция
    );
    add_settings_field(
        'facebook_url', // Идентификатор поля
        'Facebook', // Название поля
        'facebook_url_callback', // Функция вывода поля
        'contact-options', // Страница
        'social_media_section' // Секция
    );


}

//add_action('admin_init', 'custom_options_init');

// Функции для отображения полей
function phone_number_callback()
{
    $value = get_option('phone_number');
    ?>
    <input type="text" name="phone_number" value="<?php echo esc_attr($value); ?>"/>
    <?php
}

function address_callback()
{
    $value = get_option('address');
    ?>
    <input type="text" name="address" value="<?php echo esc_attr($value); ?>"/>
    <?php
}

function instagram_url_callback()
{
    $value = get_option('instagram_url');
    ?>
    <input type="text" name="instagram_url" value="<?php echo esc_attr($value); ?>"/>
    <?php
}

function facebook_url_callback()
{
    $value = get_option('facebook_url');
    ?>
    <input type="text" name="facebook_url" value="<?php echo esc_attr($value); ?>"/>
    <?php
}

function google_maps_callback()
{
    $value = get_option('google_maps');
    ?>
    <input type="text" name="google_maps" value="<?php echo esc_attr($value); ?>"/>
    <?php
}

//add_action('admin_menu', 'custom_options_page');

function custom_options_page_acf()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' =>  'Інформаційні налаштування',
            'menu_title' =>   'Інформаційні налаштування',
            'menu_slug' => 'custom-options',
            'capability' => 'manage_options',
            'position' => 60,
            'icon_url' => 'dashicons-admin-generic',
        ));
    }
}
add_action('acf/init', 'custom_options_page_acf');