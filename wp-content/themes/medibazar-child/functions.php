<?php
/**
 * Theme functions and definitions.
 * This child theme was generated by Merlin WP.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/*
 * If your child theme has more than one .css file (eg. ie.css, style.css, main.css) then
 * you will have to make sure to maintain all of the parent theme dependencies.
 *
 * Make sure you're using the correct handle for loading the parent theme's styles.
 * Failure to use the proper tag will result in a CSS file needlessly being loaded twice.
 * This will usually not affect the site appearance, but it's inefficient and extends your page's loading time.
 *
 * @link https://codex.wordpress.org/Child_Themes
 */
function medibazar_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style' , get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'medibazar-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'medibazar-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'medibazar_child_enqueue_styles', 99 );



function medibazar_child_theme_setup() {
    // Load the parent theme's text domain
    load_theme_textdomain('medibazar', get_template_directory() . '/languages');
    
    // Optionally, load the child theme's text domain if you add custom translations
    load_child_theme_textdomain('medibazar', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'medibazar_child_theme_setup');

// filter sort by in germna 
add_filter('woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby_german');
function custom_woocommerce_catalog_orderby_german($orderby) {
    $orderby = array(
        'popularity' => __( 'Nach Beliebtheit sortieren', 'woocommerce' ),
        'rating'     => __( 'Nach Durchschnittsbewertung sortieren', 'woocommerce' ),
        'date'       => __( 'Nach Neuheit sortieren', 'woocommerce' ),
        'price'      => __( 'Nach Preis: niedrig zu hoch', 'woocommerce' ),
        'price-desc' => __( 'Nach Preis: hoch zu niedrig', 'woocommerce' ),
    );
    return $orderby;
}

// Translate woocommerce 

add_filter('gettext', 'custom_german_translations', 20, 3);
function custom_german_translations($translated_text, $text, $domain) {
    // Apply translations for specific text domains
    if ($domain === 'woocommerce' || $domain === 'https://testshop.autoactiva-intern.de/') {
        switch ($text) {
            // WooCommerce strings
            case 'Description':
                $translated_text = __('Beschreibung', 'woocommerce');
                break;
            case 'Reviews':
                $translated_text = __('Bewertungen', 'woocommerce');
                break;
            case 'In stock':
                $translated_text = __('Auf Lager', $domain);
                break;
            case 'Add to Wishlist':
                $translated_text = __('Zur Wunschliste hinzufügen', $domain);
                break;
            case 'Related products':
                $translated_text = __('Ähnliche Produkte', $domain);
                break;
            case 'Add to cart':
                $translated_text = __('In den Warenkorb legen', $domain);
                break;
            case 'View cart':
                $translated_text = __('Warenkorb ansehen', $domain);
                break;
            case 'Proceed to checkout':
                $translated_text = __('Zur Kasse gehen', $domain);
                break;
            case 'Billing details':
                $translated_text = __('Rechnungsdetails', $domain);
                break;
            case 'Additional information':
                $translated_text = __('Zusätzliche Informationen', $domain);
                break;
            case 'Your order':
                $translated_text = __('Ihre Bestellung', $domain);
                break;
            case 'Apply coupon':
                $translated_text = __('Gutschein einlösen', $domain);
                break;
            case 'Update cart':
                $translated_text = __('Warenkorb aktualisieren', $domain);
                break;
            case 'Cart totals':
                $translated_text = __('Warenkorb Summe', $domain);
                break;
            case 'Subtotal':
                $translated_text = __('Zwischensumme', $domain);
                break;
            case 'Shipping':
                $translated_text = __('Versand', $domain);
                break;
            case 'Total':
                $translated_text = __('Gesamtsumme', $domain);
                break;
            case 'Product':
                $translated_text = __('Produkt', $domain);
                break;
            case 'Price':
                $translated_text = __('Preis', $domain);
                break;
                
                
            // Add more translations as needed
        }
    }
    return $translated_text;
}

