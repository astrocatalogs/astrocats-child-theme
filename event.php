<?php
/**
 * Template Name: Event template
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
get_header(); ?>

		<section id="container" class="one-column">
	
			<div id="content" role="main">
				
			<?php cryout_before_content_hook(); ?>

			<div class="page type-page status-publish hentry">
			<?php $fileloc = '/var/www/html/sne/sne/'.rawurldecode($wp_query->query_vars['eventname']).'.html'; ?>
			<?php if (file_exists($fileloc)) { ?>
				<div style="overflow:auto;-webkit-overflow-scrolling:touch">
				<?php include($fileloc); ?>
				</div>
			<?php } else { ?>
				<div style="text-align:center;">Error: Invalid event name "<?php echo $wp_query->query_vars['eventname']; ?>"! [<?php echo rawurldecode($wp_query->query_vars['eventname']); ?>]</div>
			<?php } ?>
			</div>

			<?php cryout_after_content_hook(); ?>

			</div><!-- #content -->
			
		</section><!-- #container -->

<?php get_footer(); ?>
