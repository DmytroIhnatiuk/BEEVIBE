<?php
if (!function_exists('beevibe_scripts_setup')) :
    function beevibe_scripts_setup()
    {
        $release_version = '1.5.4';
        wp_enqueue_script('main-scripts', get_theme_file_uri('/assets/js/app.min.js'), array(), $release_version);
        if (is_front_page()) {
            wp_enqueue_script('home-scripts', get_theme_file_uri('/assets/js/home.min.js'), array(), $release_version);
        }
        if (is_product()) {
            wp_enqueue_script('catalog-scripts', get_theme_file_uri('/assets/js/product.min.js'), array(), $release_version);
        }
        if (is_shop()  || is_archive('product')) {
            wp_enqueue_script('shop-scripts', get_theme_file_uri('/assets/js/catalog.min.js'), array(), $release_version);
        }
    }
endif;
add_action('wp_footer', 'beevibe_scripts_setup');
function php_script()
{
    ?>
    <script defer>
        let path = '<?php echo get_template_directory_uri(); ?>';
        const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
}

// Добавляем хук для выполнения функции в head
add_action('wp_head', 'php_script');