<?php
//Не переносити в інші проекти


function getPlaceholder()
{
    return 27;
}

function getImageByThumb($id)
{

    return get_post_thumbnail_id($id) ? get_post_thumbnail_id($id) : getPlaceholder();
}

function remove_posts_table_columns($columns)
{
    unset($columns['author']);
    unset($columns['categories']);
    return $columns;
}

add_filter('manage_posts_columns', 'remove_posts_table_columns');
function get_default_product($product)
{


    if (!$product || !is_a($product, 'WC_Product')) {
        return null;
    }

    if ($product->is_type('variable')) {
        $attributes = $product->get_attributes();
        $variations = $product->get_children();
        if (empty($variations)) {
            return null;
        }
        foreach ($variations as $variation_id) {
            $variation = wc_get_product($variation_id);
            $variation_attributes = $variation->get_attributes();
            $match = true;
            foreach ($attributes as $attribute_name => $attribute_value) {
                if (
                    !isset($variation_attributes['attribute_' . $attribute_name]) ||
                    $variation_attributes['attribute_' . $attribute_name] !== $attribute_value
                ) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                return $variation;
            }
        }
        return wc_get_product($variations[0]) ?: null;
    }

    return $product;
}

function get_products_word_form($count)
{
    $forms = ['товар', 'товари', 'товарів'];
    if ($count % 10 == 1 && $count % 100 != 11) {
        return $forms[0];
    } elseif (in_array($count % 10, [2, 3, 4]) && !in_array($count % 100, [12, 13, 14])) {
        return $forms[1];
    } else {
        return $forms[2];
    }
}

function get_product_by_id($id)
{
    $product = wc_get_product($id);
    $product_type = $product->get_type();
    $children = [];
    if ($product_type == 'variable' || $product_type == 'variation'):
        foreach ($product->get_children() as $child_id) {
            $_child = wc_get_product($child_id);
            $image = $_child->get_image_id() ?  $_child->get_image_id() : getPlaceholder();
            if (!$_child->is_purchasable()) continue;
            $newObj = [];
            $newObj['id'] = $_child->get_ID();
            $newObj['price'] = $_child->get_price();
            $newObj['regular_price'] = $_child->get_regular_price();
            $newObj['attributes'] = $_child->get_attributes();
            foreach ($_child->get_attributes() as $key => $attribute):
                $newObj[$key] = get_term_by('slug', $attribute, $key)->name;
            endforeach;
            $newObj['mainImage'] = dn_get_image_attachment($image, 'catalog_prev', $product->get_name());
            $newObj['link'] = esc_url(get_permalink($_child->get_id()));
            $newObj['sale'] = $_child->is_on_sale();
            $children[] = $newObj;
        }
    endif;
    $productVariation = get_default_product($product);
    if ($productVariation->get_image_id()) {
        $mainImage = dn_get_image_attachment($productVariation->get_image_id()  ?? getPlaceholder(), 'catalog_prev', $product->get_title());
    } else {
        $mainImage = dn_get_image_attachment(getImageByThumb($product->get_ID()), 'catalog_prev', $product->get_title());
    }
    $terms = wp_get_post_terms($id, 'product_cat');
    $category_ids = array();
    foreach ($terms as $term) {
        $category_ids[] = $term->term_id;
    }
    $newProduct = array(
        'isNew' => get_field('isNew', $id),
        'title' => $product->get_name(),
        'mainImage' => $mainImage,
        'price' => $productVariation->get_price(),
        'regularPrice' => $productVariation->get_regular_price(),
        'sale' => $productVariation->is_on_sale(),
        'defaultAttributes' => $product->default_attributes,
        'link' => esc_url(get_permalink($productVariation->get_id())),
        'variations' => $children,
        'id' => $product->get_id(),
        'category_ids' => $category_ids,
    );
    return $newProduct;

}

