# Veritas Site Documentation #

Readme for Veritas Wordpress Site

* custom post types
* custom taxonomies
* page customizations
* theme customizations
 


## Custom Post Types ##

Books: Creates a book post type. 

Added as a plugin called Betababel Books (betababel-books.php)

Uses dashicons for book - https://developer.wordpress.org/resource/dashicons/#book



## Custom Taxonomies ##

Site uses two custom taxonomies: Genres and Featured Book

Both are structured under betababel-books.php in the Plugins folder.

These taxonomies are made visible through the following:
* taxonomy.php: customization of archive.php. Generates an archive page of any taxonomy.
* content-books.php: customization of template-parts/content.php page. It gets the metadata associated with the custom taxonomies for genre and featured-book and writes them after the thumbnail.




## Page/template Customizations ##

For books content types, there are custom pages within the customtheme.

* single-books.php controls the view of the page for each book post.

* template-parts/content-books.php controls the content within each book post (e.g. images, title, etc.).

* archive-books.php: creates a listing of featured books (horizontal banner with thumbs only) and a list of all books (vertical with all metadata)

* content.php & content-search.php both have a piece of code that adds Book label to book results.

* featured-titles.php displays a row of book jackets based on the custom field ‘bookshelf’, see below.

* book-list.php displays the list of all representative titles and their metadata, including custom fields (author, publisher, accolades). Two tests: 1) if there is an author, list the custom field metadata; 2) if accolades, list the accolades.



## Custom Theme ##

Name: Book Agent
Theme is built from twentysixteen theme.
Relation to parent theme is set in style.css file in custom theme folder

functions.php starts with a conditional statement that tests that the page being rendered is the blog page set as homepage. This condition then intermingles books posts with regular posts on the blog feed on the homepage.

There is also a custom thumbnail size set in functions.php called small-thumb

content.php has a condition that checks if a post is a book. If so, it will add a book emblem to the top of the post.

## Custom Fields ##
Using Advanced Custom Fields plugin

Custom fields are under Book Metadata Field Group.
* book_author (text)
* accolades (text)
* book_publisher (text)
* bookshelf (checkbox)

Bookshelf is a true/false field with true having a value of 1.




