<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    

    
	<header class="entry-header">
        
        
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
        
        <!-- Displays custom field values -->
        <div class="custom-fields">
            
            <?php
                if(get_field('book_author')) {
                    echo '<div class="book-metadata">';
                    echo '<h2 class="book-meta-author">' . get_field ('book_author') . '</h2>';
                    echo '<span class="book-meta-publisher">' . get_field ('book_publisher') . '</span>';
                    if(get_field('accolades')) {
                        echo '<span class="book-accolades"><span class="dashicons dashicons-awards"></span>' . get_field ('accolades') . '</span>';
                    }
                    
                    echo '</div>';
                }
            ?>
            
        </div>
        
        <!-- Displays featured book taxonomy values-->
        <div class="taxonomies">
            <div class="featured-book">
                
                <?php echo get_the_term_list( $post->ID, 'featured-book', 'Featured Book: ', '', ''); ?>                  
                
            </div>
            <div class="featured-book">
                
                <?php echo get_the_term_list( $post->ID, 'genre', 'Genre: ', ', ', ''); ?>                  
                
            </div>
        </div>
        
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
