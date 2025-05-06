<?php
add_action('wp_ajax_beevibe_add_to_cart', 'beevibe_add_to_cart');
add_action('wp_ajax_nopriv_beevibe_add_to_cart', 'beevibe_add_to_cart');

function beevibe_add_to_cart()
{

    $productQnt = $_POST['quantity'];

    $variation_id = absint($_POST['id']);
    $parent_product_id = wp_get_post_parent_id($variation_id);
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', $parent_product_id);
    $quantity = $productQnt;
    if (WC()->cart->add_to_cart($product_id, $quantity, $variation_id)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);

    } else if (WC()->cart->add_to_cart($product_id, $quantity)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);

    }

    ob_start();
    woocommerce_mini_cart();
    $mini_cart_html = ob_get_clean();

    wp_send_json_success([
        'fragments' => $mini_cart_html,
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);

    wp_die();
}

add_action('wp_ajax_beevibe_cart_update_item', 'beevibe_cart_update_item');
add_action('wp_ajax_nopriv_beevibe_cart_update_item', 'beevibe_cart_update_item');

function beevibe_cart_update_item()
{

    $product_key = $_GET['key'];
    $product_qty = $_GET['qty'];

    WC()->cart->set_quantity($product_key, $product_qty);
    ob_start();
    woocommerce_mini_cart();
    $mini_cart_html = ob_get_clean();

    wp_send_json_success([
        'fragments' => $mini_cart_html,
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);

    wp_die();


}

add_action('wp_ajax_custom_update_cart_quantity', 'custom_update_cart_quantity');
add_action('wp_ajax_nopriv_custom_update_cart_quantity', 'custom_update_cart_quantity');

function custom_update_cart_quantity() {
    if ( ! isset($_POST['id']) || ! isset($_POST['quantity']) ) {
        wp_send_json_error('Invalid data');
    }

    $variation_id = absint($_POST['id']);
    $parent_product_id = wp_get_post_parent_id($variation_id);
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', $parent_product_id);
    $quantity = intval($_POST['quantity']);
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        if ( $cart_item['product_id'] === $product_id ) {
            WC()->cart->set_quantity( $cart_item_key, $quantity );
            break;
        }
    }
    WC()->cart->calculate_totals();

    ob_start();
    woocommerce_mini_cart();
    $mini_cart_html = ob_get_clean();

    wp_send_json_success([
        'fragments' => $mini_cart_html,
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);
    wp_die();
}

add_action('wp_ajax_beevibe_delete_cart_item', 'beevibe_delete_cart_item');
add_action('wp_ajax_nopriv_beevibe_delete_cart_item', 'beevibe_delete_cart_item');
function beevibe_delete_cart_item()
{

    $product_key = $_POST['key'];

    WC()->cart->remove_cart_item($product_key);
    ob_start();
    woocommerce_mini_cart();
    $mini_cart_html = ob_get_clean();

    wp_send_json_success([
        'fragments' => $mini_cart_html,
        'cart_count' => WC()->cart->get_cart_contents_count()
    ]);

    wp_die();
//    WC_AJAX:: get_refreshed_fragments();
//
//    wp_die();

}