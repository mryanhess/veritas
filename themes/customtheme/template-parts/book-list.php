<?php
/* 
 * Display vertical listing of all books.
 */

    $args = array( 
        'post_type' => 'books', 
        'posts_per_page' => -1,
        'orderby' => 'date'
    );

// the loop
    $books = new WP_Query( $args );

    echo '<aside id="representative-titles" class="clear book-list">';
    while ( $books->have_posts() ) : $books->the_post();
        echo '<div class="book-citation clear">';
            echo '<figure class="book-thumb alignleft">';
                the_post_thumbnail('thumb');
            echo '</figure>';
            echo '<div class="book-meta alignleft">';
                echo '<h1 class="book-meta-title alignleft">' . get_the_title() . '</h1>';
                if(get_field('book_author')) {
                    
                    echo '<h2 class="book-meta-author">' . get_field ('book_author') . '</h2>';
                    echo '<span class="book-meta-publisher">' . get_field ('book_publisher') . '</span>';
                    if(get_field('accolades')) {
                        echo '<span class="book-accolades"><span class="dashicons dashicons-awards"></span>' . get_field ('accolades') . '</span>';
                    }
                    
                    
                }

            echo '</div>';
            echo '</div>';
    endwhile;
    echo '</aside>';
    
//resets query to avoid conflicts with other loops
    wp_reset_query();
?>


