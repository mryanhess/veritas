<?php

// intermingles posts and books on the front blog page.
function my_add_books( $query ) {
    //conditional statement that checks that my_add_books only runs on front page and not on every page. First condition checks that page is NOT an admin page and the query is the Main Query only.
    if ( !is_admin() && $query->is_main_query() ) {
        // Next coditional makes sure function only runs on homepage (when set to blog page).
        if ($query->is_home() ) { 
            $query->set( 'post_type', array( 'post', 'books' ) );
        }
    }
}

add_action( 'pre_get_posts', 'my_add_books' );

add_image_size( 'small-thumb', 50, 75 ); //40 pixels wide and 75 high (use 9999 for unlimited height)

?>

