<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package azandmag
 */

get_header();
?>

	<main id="primary" class="site-main mainView">

		<?php if ( have_posts() ) : ?>

			<div class="searchHeadingSec highMargined generalHeading">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'نتایج جستجو %s', 'azandmag' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div><!-- .page-header -->
			<div class="archiveParent">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;?>
			</div>
				<?php
				// the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
