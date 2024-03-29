<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package newsact
 */

get_header();
?>

		<div class="newsact-page-title-area search-title">
			<div class="frow-container">
				<div class="frow">
					<div class="col-md-1-1">
						<h1>
							<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'newsact' ), '<span>' . get_search_query() . '</span>' );
						?>
						</h1>
						<?php 
						if(function_exists('bcn_display')){
							bcn_display();
						} 
					?>
					</div>
				</div>
			</div>
		</div>

	<section id="primary" class="content-area newsact-content-area-padding">
		<main id="main" class="site-main">
			<div class="frow-container">
				<div class="frow gutters">
					<div class="col-md-4-6">
						<div class="newsact-blog-list">
							<?php if ( have_posts() ) : ?>

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

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
					</div>

					<div class="col-lg-2-6">
						<?php 
							get_sidebar();
						?>
					</div>
				</div>
			</div>

		

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();