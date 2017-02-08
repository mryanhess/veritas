<?php
/* 
 * Display thumbnails as a banner on any page based on book posts with the bookshelf checkbox ticked.
 */

    $args = array( 
        'post_type' => 'books', 
        'posts_per_page' => 6, //number of books to display
        'orderby' => 'date',
        'meta_key'   => 'bookshelf', //checks value in custom bookshelf field
	    'meta_value' => 1 //checks if the bookshelf checkbox is clicked : true=1
    );

// the loop
    $books = new WP_Query( $args );

    echo '<aside id="featured-books" class="clear bookshelf center">';
    while ( $books->have_posts() ) : $books->the_post();
        echo '<div class="book">';
        echo '<figure class="book-thumb alignleft">';
        the_post_thumbnail('small-thumb');
        echo '</figure>';
        echo '</div>';
    endwhile;
    echo '</aside>';
    
//resets query to avoid conflicts with other loops
    wp_reset_query();
?>