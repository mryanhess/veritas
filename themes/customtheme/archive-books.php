<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="entry-title">Representative Titles</h1>
			</header><!-- .page-header -->

            <div class="entry-content">
                <?php get_template_part( 'template-parts/featured-titles' ); ?>  


                <?php get_template_part( 'template-parts/book-list' ); ?>   





                <?php
                // If no content, include the "No posts found" template.
                else :
                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>




