<?php
/**
 * Template Name: Checkout page
 */
get_header();


?>
<main class="checkout">
    <?php echo do_shortcode('[woocommerce_checkout]'); ?>
</main>


<?php
wp_footer(); ?>

