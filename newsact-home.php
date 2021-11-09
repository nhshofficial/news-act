<?php
/**
* Template Name: News Act Home
 */

 $get_templates = get_theme_mod( 'news_blocks', );

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php 
				// breaking news templates
				if(get_theme_mod( 'enable_breaking_news', true ) == true):
					get_template_part( 'template-parts/news-block/breakingNews' );
				endif;

				// news templates
				foreach( $get_templates as $get_template ) :
					get_template_part( 'template-parts/news-block/section', $get_template['news_block_templates'] );
				endforeach;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
