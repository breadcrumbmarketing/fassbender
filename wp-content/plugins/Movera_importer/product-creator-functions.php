<?php
/**
 * Create or update WooCommerce products from the database.
 */

// Include shared functions
require_once(plugin_dir_path(__FILE__) . 'shared-functions.php');

if (!function_exists('create_woocommerce_products_from_db')) {
    function create_woocommerce_products_from_db() {
        global $wpdb;

        // Check if WooCommerce is active
        if (!class_exists('WooCommerce')) {
            echo "<p>WooCommerce is not active. Please activate WooCommerce to use this feature.</p>";
            return;
        }

        // Fetch data from your custom table
        $results = $wpdb->get_results("SELECT * FROM wp_movera");

        if (empty($results)) {
            echo "<p>No products found in the database.</p>";
            return;
        }

        foreach ($results as $row) {
            // Check if product already exists by mainnumber (unique identifier)
            $existing_product_id = $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_mainnumber' AND meta_value = %s",
                    $row->mainnumber
                )
            );

            // Decode HTML entities and remove HTML tags from the description
            $cleaned_description = wp_strip_all_tags(html_entity_decode($row->description_long));

            // Debug: Output the cleaned description
            error_log("Cleaned Description for Product '{$row->name}': " . $cleaned_description);

            if ($existing_product_id) {
                // Update existing product
                $product_data = [
                    'ID'           => $existing_product_id,
                    'post_title'   => $row->name,
                    'post_content' => $cleaned_description, // Use cleaned description
                    'post_status'  => 'publish',
                ];

                // Update the product
                $product_id = wp_update_post($product_data);

                if ($product_id) {
                    // Update product metadata
                    update_post_meta($product_id, '_regular_price', $row->VK);
                    update_post_meta($product_id, '_price', $row->VK);
                    update_post_meta($product_id, '_stock', $row->lagerbestand);
                    update_post_meta($product_id, '_sku', $row->suppliernumber);
                    update_post_meta($product_id, '_mainnumber', $row->mainnumber); // Update mainnumber meta

                    // Download and attach images from the database
                    if (!empty($row->imageURL)) {
                        download_and_attach_images($row->imageURL, $product_id);
                    }

                    echo "<p>Product '{$row->name}' (Mainnumber: {$row->mainnumber}) updated successfully.</p>";
                } else {
                    echo "<p>Failed to update product '{$row->name}'.</p>";
                }
            } else {
                // Create new product
                $product_data = [
                    'post_title'   => $row->name,
                    'post_content' => $cleaned_description, // Use cleaned description
                    'post_status'  => 'publish',
                    'post_type'    => 'product',
                ];

                // Insert the product
                $product_id = wp_insert_post($product_data);

                if ($product_id) {
                    // Set product metadata
                    update_post_meta($product_id, '_regular_price', $row->VK);
                    update_post_meta($product_id, '_price', $row->VK);
                    update_post_meta($product_id, '_stock', $row->lagerbestand);
                    update_post_meta($product_id, '_sku', $row->suppliernumber);
                    update_post_meta($product_id, '_mainnumber', $row->mainnumber); // Save mainnumber meta

                    // Download and attach images from the database
                    if (!empty($row->imageURL)) {
                        download_and_attach_images($row->imageURL, $product_id);
                    }

                    echo "<p>Product '{$row->name}' (Mainnumber: {$row->mainnumber}) created successfully with ID {$product_id}.</p>";
                } else {
                    echo "<p>Failed to create product '{$row->name}'.</p>";
                }
            }
        }
    }
}
?>