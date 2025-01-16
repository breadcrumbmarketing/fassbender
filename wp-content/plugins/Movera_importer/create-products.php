<?php
require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');

function download_and_attach_image($image_url, $post_id) {
    // Download and attach the image to the post
    $attach_id = media_sideload_image($image_url, $post_id, null, 'id');

    if (!is_wp_error($attach_id)) {
        return $attach_id;
    } else {
        return false;
    }
}

function process_and_attach_images($image_urls, $post_id) {
    $image_urls_array = explode('|', $image_urls);
    $gallery_ids = [];
    $first_image_set = false;

    foreach ($image_urls_array as $image_url) {
        $attach_id = download_and_attach_image($image_url, $post_id);

        if ($attach_id) {
            if (!$first_image_set) {
                // Set the first image as the featured image
                set_post_thumbnail($post_id, $attach_id);
                $first_image_set = true;
            } else {
                // Add to gallery
                $gallery_ids[] = $attach_id;
            }
        }
    }

    if (!empty($gallery_ids)) {
        // Save the gallery images
        update_post_meta($post_id, '_product_image_gallery', implode(',', $gallery_ids));
    }
}

function map_categories($categories, $category_path) {
    // Map numeric categories to their names using the category path
    $category_ids = explode('|', $categories);
    $category_names = explode('->', $category_path);

    // Ensure the lengths of the category IDs and names match
    if (count($category_ids) !== count($category_names)) {
        return [];
    }

    // Create a mapping of category ID to category name
    $mapped_categories = [];
    foreach ($category_ids as $index => $id) {
        $mapped_categories[] = $category_names[$index];
    }

    return $mapped_categories;
}

function create_woocommerce_products_from_db() {
    global $wpdb;

    // Fetch data from your custom table
    $results = $wpdb->get_results("SELECT * FROM wp_movera");

    foreach ($results as $row) {
        // Check if product already exists
        $existing_product = get_page_by_title($row->name, OBJECT, 'product');

        if (!$existing_product) {
            // Remove HTML tags from description
            $plain_description = strip_tags($row->description_long);

            // Create product if it doesn't exist
            $product_data = [
                'post_title' => $row->name,
                'post_content' => $plain_description,
                'post_status' => 'publish',
                'post_type' => 'product',
            ];

            // Insert the post into the database
            $product_id = wp_insert_post($product_data);

            if ($product_id) {
                // Set product metadata
                update_post_meta($product_id, '_regular_price', $row->VK);
                update_post_meta($product_id, '_price', $row->VK);
                update_post_meta($product_id, '_stock', $row->lagerbestand);
                update_post_meta($product_id, '_sku', $row->suppliernumber);

                // Handle categories by mapping from numeric IDs to category names
                if (!empty($row->categories) && !empty($row->category_path)) {
                    $mapped_categories = map_categories($row->categories, $row->category_path);
                    if (!empty($mapped_categories)) {
                        wp_set_object_terms($product_id, $mapped_categories, 'product_cat');
                    }
                }

                // Download and attach images
                if (!empty($row->imageURL)) {
                    process_and_attach_images($row->imageURL, $product_id);
                }

                echo "<p>Product '{$row->name}' created successfully with ID {$product_id}.</p>";
            } else {
                echo "<p>Failed to create product '{$row->name}'.</p>";
            }
        } else {
            echo "<p>Product '{$row->name}' already exists.</p>";
        }
    }
}
?>
