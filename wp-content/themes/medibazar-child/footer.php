<?php
/**
 * footer.php
 * @package WordPress
 * @subpackage medibazar
 * @since medibazar 1.0
 * 
 */
 ?>
	<?php medibazar_do_action( 'medibazar_before_main_footer'); ?>
	
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
		<?php
        /**
        * Hook: medibazar_main_footer
        *
        * @hooked medibazar_main_footer_function - 10
        */
        do_action( 'medibazar_main_footer' );
	
		?>
	<?php } ?>
	
	<?php medibazar_do_action( 'medibazar_after_main_footer'); ?>

	<?php wp_footer(); ?>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Translation map (English => German)
    const translations = {
        'Price': 'Preis',
        'Add to cart': 'In den Warenkorb legen',
        'View cart': 'Warenkorb ansehen',
        'Proceed to checkout': 'Zur Kasse gehen',
        'Coupon code': 'Gutscheincode',
        'APPLY COUPON': 'Gutschein anwenden',
        'UPDATE CART': 'Warenkorb aktualisieren',
        'Cart totals': 'Warenkorb Summe',
        'Subtotal': 'Zwischensumme',
        'Total': 'Gesamtsumme',
        'Shipping': 'Versand',
        'Description': 'Beschreibung',
        'Reviews': 'Bewertungen',
        'In stock': 'Auf Lager',
        'Out of stock': 'Nicht vorrätig',
        'Remove this item': 'Dieses Produkt entfernen',
        'Your cart is currently empty.': 'Ihr Warenkorb ist derzeit leer.',
        'Return to shop': 'Zurück zum Shop',
        'Product': 'Produkt',
        'Quantity': 'Menge',
        'Remove': 'Entfernen',
        'Apply coupon': 'Gutschein anwenden',
        'Place order': 'Bestellung aufgeben',
        'Order details': 'Bestelldetails',
        'Continue shopping': 'Einkaufen fortsetzen',
        'Discount': 'Rabatt',
        'Free': 'Kostenlos',
        // Add more translations as needed
    };

    // Function to replace text in the entire document
    function replaceText(node) {
        if (node.nodeType === Node.TEXT_NODE) {
            let text = node.textContent;
            for (const [english, german] of Object.entries(translations)) {
                text = text.replace(new RegExp(english, 'g'), german);
            }
            node.textContent = text;
        } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName !== 'SCRIPT' && node.tagName !== 'STYLE') {
            node.childNodes.forEach(replaceText);
        }
    }

    // Start replacing text from the body
    replaceText(document.body);
});
</script>
    </body>
</html>