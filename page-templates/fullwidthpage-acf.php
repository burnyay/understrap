<?php
/**
 * Template Name: Full Width Page (ACF Builder)
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="page-wrapper" id="full-width-page-wrapper">

	<div id="content">

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						$id = get_the_ID();

							// check if the flexible content field has rows of data
							if ( have_rows( 'flexible_layouts', $id ) ) :

								    // loop through the selected ACF layouts and display the matching partial
								    while ( have_rows( 'flexible_layouts', $id ) ) : the_row();

        								get_template_part( 'partials/flexible-layouts/' . get_row_layout() );

    						endwhile;

							elseif ( get_the_content() ) :

    						// no layouts found

							endif;
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
