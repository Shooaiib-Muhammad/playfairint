<?php
/**
 * Displays footer site info
 *
 * @subpackage Modern Ecommerce
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
	<?php
		echo esc_html( get_theme_mod( 'modern_ecommerce_footer_text' ) );
		printf(
			/* translators: %s: Ecommerce WordPress Theme. */
            '<p class="mb-0"> %s</p>',
            esc_html__( 'Ecommerce WordPress Theme', 'modern-ecommerce' )
        );
	?>
</div>