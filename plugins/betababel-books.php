<?php
/**
*   Plugin Name: Betababel Books
*   Description: Adds custom post type for books
*   Version: 0.1
*   Author: M Ryan Hess, Betababel
*   License: GPL2
*/

/*  Copyright: 2016, M Ryan Hess
    Betababel Books is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    Betababel Books is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Betababel Books. If not, see GNU General Public License.
*/

function betababel_books() {
    
    $labels = array (
        'name'               => 'Books',
        'singular_name'      => 'Book',
        'menu_name'          => 'Books',
        'name_admin_bar'     => 'Book',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Book',
        'new_item'           => 'New Book',
        'edit_item'          => 'Edit Book',
        'view_item'          => 'View Book',
        'all_items'          => 'All Books',
        'search_items'       => 'Search Books',
        'parent_item_colon'  => 'Parent Books:',
        'not_found'          => 'No Books found.',
        'not_found_in_trash' => 'No Books found in Trash.',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,     
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-book-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'books' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail' )
    );
    register_post_type( 'books', $args );
}

add_action('init', 'betababel_books');

// Flush rewrite rules to add "review" as a permalink slug
function my_rewrite_flush() {
    betababel_books();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );



// Add custom taxonomies


function custom_taxonomies() {
    
    // Featured Books

    $labels = array(
        'name'              => 'Featured Books',
        'singular_name'     => 'Featured Book',
        'search_items'      => 'Search Featured Books',
        'all_items'         => 'All Featured Book',
        'parent_item'       => 'Parent Featured Book',
        'parent_item_colon' => 'Parent Featured Book:',
        'edit_item'         => 'Edit Featured Book',
        'update_item'       => 'Update Featured Book',
        'add_new_item'      => 'Add New Featured Book',
        'new_item_name'     => 'New Featured Book',
        'menu_name'         => 'Featured Book',
    );
        $args = array(
        'labels' => $labels,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'featured-book'),
        'hierarchical' => true,
        'show_ui' => true,
        'public' => true,
        
    );
    
    register_taxonomy( 'featured-book', array( 'books'), $args);

    
    // Genres
    
    $labels = array(
        'name'              => 'Genre',
        'singular_name'     => 'Genre',
        'search_items'      => 'Search Genres',
        'all_items'         => 'All Genres',
        'parent_item'       => 'Parent Genre',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item'         => 'Edit Genre',
        'update_item'       => 'Update Genre',
        'add_new_item'      => 'Add New Genre',
        'new_item_name'     => 'New Genre',
        'menu_name'         => 'Genre',
    );
    
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'genre'),
    );
    
    register_taxonomy( 'genre', array( 'books' ), $args );  
    



}


add_action( 'init', 'custom_taxonomies' );


?>