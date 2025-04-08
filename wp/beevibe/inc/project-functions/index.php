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
    $variation_product = null;
    if ($product && $product->is_type('variable')) {
        $default_variation = null;
        $default_attributes = $product->get_default_attributes();
        $variations = $product->get_available_variations();
        foreach ($variations as $variation) {
            $variation_attributes = $variation['attributes'];
            $match = true;
            foreach ($default_attributes as $attribute_name => $default_value) {
                if (isset($variation_attributes['attribute_' . $attribute_name]) && $variation_attributes['attribute_' . $attribute_name] !== $default_value) {
                    $match = false;
                    break;
                }
            }
            if ($match) {
                $default_variation = $variation;
                break;
            }
        }
        if (!$default_variation) {
            $default_variation = $variations[0];
        }
        $variation_product = wc_get_product($default_variation['variation_id']);
    }
    return $variation_product;
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

