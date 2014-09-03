<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package V2starry-nights
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
                                            if ( is_category() ) :
                                                printf( __( 'Posts in the ', 'v2starry-nights' ) );
                                                echo '<em>';
                                                single_cat_title();
                                                echo '</em> ' . __('category', 'v2starry-nights') . ':';

                                            elseif ( is_tag() ) :
                                                printf( __( 'Posts with the ', 'v2starry-nights' ) );
                                                echo '<em>';
                                                single_tag_title();
                                                echo '</em> ' . __('tag', 'v2starry-nights') . ':';

                                            elseif ( is_author() ) :
                                                printf( __( 'Author: %s', 'v2starry-nights' ), '<span class="vcard">' . get_the_author() . '</span>' );

                                            elseif ( is_day() ) :
                                                printf( __( 'Posts from %s', 'v2starry-nights' ), '<span>' . get_the_date() . '</span>' );

                                            elseif ( is_month() ) :
                                                printf( __( 'Posts from %s', 'v2starry-nights' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'v2starry-nights' ) ) . '</span>' );

                                            elseif ( is_year() ) :
                                                printf( __( 'Posts from %s', 'v2starry-nights' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'v2starry-nights' ) ) . '</span>' );

                                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                                _e( 'Asides', 'my-simone' );

                                            else :
                                                _e( 'Archives', 'my-simone' );

                                            endif;
                                            ?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php v2starry_nights_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
