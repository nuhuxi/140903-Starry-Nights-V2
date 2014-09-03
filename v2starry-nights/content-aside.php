<?php
/**
 * @package V2starry-nights
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="index-box">
        

        
	<header class="entry-header">
            
                <?php
                    // Display a thumb tack in the top right hand corner if this post is sticky
                    if (is_sticky()) {
                        echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                    }
                ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'v2starry-nights' ) ); ?>
		
	</div><!-- .entry-content -->

        <footer class="entry-footer continue-reading">
            	<?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                            <?php v2starry_nights_posted_on(); ?>
                                <?php 
                                    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
                                        echo '<span class="comments-link">';
                                        comments_popup_link( __( 'Leave a comment', 'v2-starry-nights' ), __( '1 Comment', 'my-simone' ), __( '% Comments', 'v2-starry-nights' ) );
                                        echo '</span>';
                                    }
                                ?>
                                <?php edit_post_link( __( 'Edit', 'v2starry-nights' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-meta -->
		<?php endif; ?>
        </footer><!-- .entry-footer -->
</div> <!-- index box -->
</article><!-- #post-## -->