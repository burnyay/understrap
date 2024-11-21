<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<footer class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">
				
					<? if ( is_active_sidebar( 'footerfull' ) ) : ?>
						<div class="footer-widget-area-1">
							<?php dynamic_sidebar( 'footerfull' ); ?>
						</div>
					<?php endif; ?>

					<? if ( is_active_sidebar( 'footer-widget' ) ) : ?>
						<div class="footer-widget-area-2">
							<?php dynamic_sidebar( 'footer-widget' ); ?>
						</div>
					<?php endif; ?>

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

