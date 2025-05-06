<?php
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
function custom_woocommerce_catalog_orderby($sortby)
{
    unset($sortby['popularity']);
    unset($sortby['date']);
    unset($sortby['price']);
    unset($sortby['price-desc']);
    $sortby['popularity'] = 'Сортувати за популярністю';
    $sortby['price'] = 'Ціна від нижчої до вищої';
    $sortby['price-desc'] = 'Ціна від вищої до нижчої';
    $sortby['date'] = 'Нові надходження';

    return $sortby;
}

add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby', 20);

