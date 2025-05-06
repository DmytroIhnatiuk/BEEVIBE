<?php
/**
 * beevibe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beevibe
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beevibe_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on beevibe, use a find and replace
        * to change 'beevibe' to the name of your theme in all the template files.
        */
    load_theme_textdomain('beevibe', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu' => esc_html__('Primary', 'beevibe'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
//			'search-form',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
//	add_theme_support(
//		'custom-background',
//		apply_filters(
//			'beevibe_custom_background_args',
//			array(
//				'default-color' => 'ffffff',
//				'default-image' => '',
//			)
//		)
//	);
    add_theme_support('woocommerce');
    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'beevibe_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beevibe_content_width()
{
    $GLOBALS['content_width'] = apply_filters('beevibe_content_width', 640);
}

add_action('after_setup_theme', 'beevibe_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
require_once('inc/core/javascript.php');
require_once('inc/woo/orderby.php');
require_once('inc/woo/cart.php');
require_once('inc/project-functions/index.php');
require_once('inc/core/styles.php');

require_once('inc/core/core.php');

function filter_items()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error(['message' => 'Invalid request method']);
    }

    $filter = isset($_POST['filter']) ? json_decode(stripslashes($_POST['filter']), true) : [];
    $args = [
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ];
    if (isset($filter['orderBy'])) {
        $sorting = $filter['orderBy'];
        switch ($sorting) {
            case 'price':
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_price';
                $args['order'] = 'ASC';
                break;
            case 'price-desc':
                $args['orderby'] = 'meta_value_num';
                $args['meta_key'] = '_price';
                $args['order'] = 'DESC';
                break;
            case 'date':
                $args['orderby'] = 'date';
                $args['order'] = 'DESC';
                break;
            case 'popularity':
                $args['meta_key'] = 'total_sales';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = 'DESC';
                break;
        }
    }
    if (!empty($filter['category']) && is_array($filter['category'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => array_map('intval', $filter['category']),
                'operator' => 'IN',
            ],
        ];
    }
    if (!empty($filter['tags']) && is_array($filter['tags'])) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_tag',
            'field' => 'term_id',
            'terms' => array_map('intval', $filter['tags']),
            'operator' => 'IN',
        ];
    }
    if (!empty($filter['range']) && is_array($filter['range']) && count($filter['range']) === 2) {
        $min_price = floatval($filter['range'][0]);
        $max_price = floatval($filter['range'][1]);

        $args['meta_query'] = [
            'relation' => 'OR',
            [
                'key' => '_price',
                'value' => [$min_price, $max_price],
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC',
            ],
            [
                'key' => '_min_variation_price',
                'value' => [$min_price, $max_price],
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC',
            ],
            [
                'key' => '_max_variation_price',
                'value' => [$min_price, $max_price],
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC',
            ],
        ];
    }
    if (!empty($args['tax_query']) && count($args['tax_query']) > 1) {
        $args['tax_query']['relation'] = 'AND';
    }
    $query = new WP_Query($args);
    $total_pages = $query->max_num_pages;
    $total_posts = $query->found_posts;

    if ($query->have_posts()) {
        $html = '';
        while ($query->have_posts()) {
            $query->the_post();
            global $product;

            // Буферизация вывода для получения HTML
            ob_start();
            get_template_part('template-parts/blocks/product-card', false, ['product' => $product]);
            $html .= ob_get_clean();
        }
        wp_send_json_success([
            'html' => $html,
            'total_pages' => $total_pages,
            'total_products' => $total_posts . ' ' . get_products_word_form($total_posts),
        ]);
    } else {
        wp_send_json_success([
            'html' => 'Нічого не знайдено',
            'total_pages' => '',
            'total_products' => '',
        ]);
    }
}

add_action('wp_ajax_filter_items', 'filter_items');
add_action('wp_ajax_nopriv_filter_items', 'filter_items');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
//add_action('after_setup_theme', function() {
//    if (!is_admin()) {
//        show_admin_bar(false);
//    }
//});
function sync_checkbox_to_product_tags($post_id)
{
    if (get_post_type($post_id) !== 'product') {
        return;
    }

    $acf_fields = [['acf' => 'main_effects', 'title' => 'Запит шкіри'], ['acf' => 'type','title' =>'Тип шкіри' ]];

    $all_tag_ids = [];

    foreach ($acf_fields as $acf_field_name) {
        $values = get_field($acf_field_name['acf'], $post_id);

        if (!is_array($values) || empty($values)) {
            continue; // пропускаем это поле, но продолжаем остальные
        }

        foreach ($values as $value) {
            $term_name = is_array($value) && isset($value['label'])
                ? sanitize_text_field($value['label'])
                : sanitize_text_field($value);

            $term_id = create_product_tag($term_name, $acf_field_name['title']);
            if ($term_id) {
                $all_tag_ids[] = (int)$term_id;
            }
        }
    }

    // Назначаем все теги сразу, если они есть
    if (!empty($all_tag_ids)) {
        wp_set_object_terms($post_id, $all_tag_ids, 'product_tag', false);
    }
}

add_action('save_post_product', 'sync_checkbox_to_product_tags');
function create_product_tag($term_name, $label = '')
{
    $term = term_exists($term_name, 'product_tag');
    if (!$term) {
        $term = wp_insert_term($term_name, 'product_tag');
        if (is_wp_error($term)) {
            error_log('Ошибка создания терма: ' . $term_name);
            return false;
        }
    }
    $term_id = is_array($term) ? $term['term_id'] : $term;
    if ($label) {
        $updated = update_field('tag_name', $label, 'product_tag_' . $term_id);
        if (!$updated) {
            error_log('Не удалось обновить ACF поле name_category у тега с ID ' . $term_id);
        }
    }

    return $term_id;
}

if (1 !== 1) {
    function run_checkbox_to_tags_for_all_products()
    {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'fields' => 'ids',
        );

        $products = get_posts($args);

        foreach ($products as $product_id) {
            sync_checkbox_to_product_tags($product_id);
        }
    }

    add_action('init', function () {
        if (current_user_can('manage_options')) {
            run_checkbox_to_tags_for_all_products();
        }
    });
}
add_action('admin_head', function () {
    $screen = get_current_screen();

    // Скрыть колонку "Метки" и "Бренды" в таблице продуктов
    if ($screen && $screen->post_type === 'product' && $screen->base === 'edit') {
        echo '<style>
            .column-product_tag,
            .column-pa_brand,     /* если бренд — это атрибут */
            .column-brand          /* если бренд — это кастомная колонка с taxonomy */
            { display: none !important; }
        </style>';
    }

    // Скрыть метабоксы "Метки" и "Бренды" на странице редактирования товара
    if ($screen && $screen->post_type === 'product' && $screen->base === 'post') {
        echo '<style>
            #tagsdiv-product_tag,
            #branddiv               /* если бренд — это таксономия brand */
            { display: none !important; }
        </style>';
    }
});
