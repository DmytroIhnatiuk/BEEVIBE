<?php
//STYLES connect start
if (!function_exists('badzingerauto_styles_setup')) :
    function badzingerauto_styles_setup()
    {
        $release_version = '1.0.0';
        wp_enqueue_style('tailwind-style', get_theme_file_uri('/assets/css/tailwind.min.css'), array(), $release_version);

        wp_enqueue_style('aos-style', get_theme_file_uri('/assets/css/aos.min.css'), array(), $release_version);
        wp_enqueue_style('swiper-style', get_theme_file_uri('/assets/css/swiper.min.css'), array(), $release_version);
        wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.min.css'), array(), $release_version);

    }

endif;
add_action('wp_enqueue_scripts', 'badzingerauto_styles_setup');

add_filter('wp_enqueue_scripts', 'true_dequeue_gutenberg_styles', 999);
function true_dequeue_gutenberg_styles()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles'); // глобальные CSS-переменные
}

//STYLES connect end