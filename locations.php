<?php
/**
 * Template Name: Locations template
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package Cryout Creations
 * @subpackage parabola
 * @since parabola 0.5
 */

global $wp_query;
get_header();
?>

<section id="container" class="one-column">
	<div id="content" role="main">
	<?php cryout_before_content_hook(); ?>
	<div class="page type-page status-publish hentry">
		<div id="loading" style="text-align:center;"><img src="https://sne.space/wp-content/themes/sne-child-theme/loading.gif"><br>Loading...</div>
		<div style="overflow:auto;-webkit-overflow-scrolling:touch">
		<iframe width=100% src="https://sne.space/sne/sne-locations.html" style="display:block;border:none;width=100%;" onload="resizeIframe(this)"></iframe>
		</div>
	</div>
	<?php cryout_after_content_hook(); ?>
	</div><!-- #content -->
</section><!-- #container -->

<?php get_footer(); ?>
