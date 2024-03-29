<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newsact
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

	<div <?php if(has_post_thumbnail()) : ?> style="background-image: url(<?php the_post_thumbnail_url( 'large' )?>);" <?php endif; ?> class="newsact-page-title-area">
		<div class="frow-container">
			<div class="frow">
				<div class="col-md-1-1">				
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php
						if(function_exists('bcn_display')){
							bcn_display();
						}
					?>
				<div class="blog-entry-meta">
					<?php
					newsact_posted_on();
					newsact_posted_by();
					?>
				</div><!-- .entry-meta -->
				</div>
			</div>
		</div>
	</div> <!-- Title area end -->


	<div id="primary" class="content-area newsact-content-area-padding">
		<main id="main" class="site-main">
		<div class="frow-container">
			<div class="frow gutters">
				<div class="col-md-4-6">
					<?php

							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
							comments_template();
							endif;

					?>
				</div>
				<div class="col-lg-2-6">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php endwhile; // End of the loop. ?>

<?php
get_footer();
