<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package V2starry-nights
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php get_template_part('content', 'none'); ?>	

		</main><!-- #main -->
	</div><!-- #primary -->
        <?php get_sidebar(); ?>
<?php get_footer(); ?>
