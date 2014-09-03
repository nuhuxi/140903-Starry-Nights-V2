<?php
/**
 * @package V2starry-nights
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php 
            if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { // Custom template for the first post on the front page
                if (has_post_thumbnail()) {
                    echo '<div class="front-index-thumbnail clear">';
                    echo '<div class="image-shifter">';
                    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'v2starry-nights') . get_the_title() . '" rel="bookmark">';
                    echo the_post_thumbnail('large-thumb');
                    echo '</a>';
                    echo '</div>';
                    echo '</div>';
                } 
                echo '<div class="index-box';
                if (has_post_thumbnail()) { echo ' has-thumbnail'; };
                echo '">';
            } else {
                echo '<div class="index-box">';
                if (has_post_thumbnail()) {
                    echo '<div class="small-index-thumbnail clear">';
                    echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'v2starry-nights') . get_the_title() . '" rel="bookmark">';
                    echo the_post_thumbnail('index-thumb');
                    echo '</a>';
                    echo '</div>';
                }
            }
        ?>
        
	<header class="entry-header">
            
                <?php
                        // Display a thumb tack in the top right hand corner if this post is sticky
                        if (is_sticky()) {
                            echo '<i class="fa fa-thumb-tack sticky-post"></i>';
                        }
                    ?>
                                <?php
                        /* translators: used between list items, there is a space after the comma */
                        $category_list = get_the_category_list( __( ', ', 'v2starry_nights' ) );

                        if ( v2starry_nights_categorized_blog() ) {
                            echo '<div class="category-list">' . $category_list . '</div>';
                        }
                ?>
            
            
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            
                <?php

                ?>
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
	</header><!-- .entry-header -->

        <?php 
        if( $wp_query->current_post == 0 && !is_paged() && is_front_page() ) { 
            echo '<div class="entry-content">';
            the_content( __( '', 'v2starry-nights' ) );
            echo '</div>';
            echo '<footer class="entry-footer continue-reading">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'v2starry-nights') . get_the_title() . '" rel="bookmark">Read the article<i class="fa fa-arrow-circle-o-right"></i></a>'; 
            echo '</footer><!-- .entry-footer -->';
        } else { ?>
            <div class="entry-content">
            <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer continue-reading">
            <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'my-simone') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
            </footer><!-- .entry-footer -->
        <?php } ?>
    </div> <!-- index box -->
</article><!-- #post-## -->