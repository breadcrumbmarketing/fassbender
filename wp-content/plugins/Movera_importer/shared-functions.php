<?php
/**
 * Shared Functions for CSV Importer and Product Creator
 */

 if (!function_exists('download_and_attach_images')) {
    function download_and_attach_images($image_urls, $post_id) {
        // Split the image URLs by the pipe character (|)
        $image_urls_array = explode('|', $image_urls);
        $gallery_ids = []; // Array to store gallery image IDs
        $first_image_set = false; // Flag to track if the first image is set as the featured image

        foreach ($image_urls_array as $image_url) {
            // Trim any whitespace from the URL
            $image_url = trim($image_url);

            // Skip if the URL is empty
            if (empty($image_url)) {
                continue;
            }

            // Download the image and add it to the media library
            $attachment_id = upload_image_to_media_library($image_url, $post_id);

            if ($attachment_id) {
                if (!$first_image_set) {
                    // Set the first image as the featured image
                    set_post_thumbnail($post_id, $attachment_id);
                    $first_image_set = true;
                } else {
                    // Add to gallery
                    $gallery_ids[] = $attachment_id;
                }
            }
        }

        if (!empty($gallery_ids)) {
            // Save the gallery image IDs as a comma-separated list
            update_post_meta($post_id, '_product_image_gallery', implode(',', $gallery_ids));
        }
    }
}

if (!function_exists('upload_image_to_media_library')) {
    function upload_image_to_media_library($image_url, $post_id) {
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        // Download the image to the WordPress media library
        $tmp = download_url($image_url);

        if (is_wp_error($tmp)) {
            error_log("Failed to download image: {$image_url}. Error: " . $tmp->get_error_message());
            return false;
        }

        // Prepare the file array
        $file_array = [
            'name'     => basename($image_url),
            'tmp_name' => $tmp,
        ];

        // Insert the image into the Media Library
        $attachment_id = media_handle_sideload($file_array, $post_id);

        // Clean up the temporary file
        @unlink($tmp);

        if (is_wp_error($attachment_id)) {
            error_log("Failed to attach image: {$image_url}. Error: " . $attachment_id->get_error_message());
            return false;
        }

        return $attachment_id;
    }
}
?>