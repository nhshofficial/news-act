
<!-- Breaking -->
<section class="breaking-news py-30">
	<div class="frow-container">
		<div class="frow">
			<div class="col-md-1-1">
				<span class="breaking-heading text-uppercase">Breaking</span>
			</div>
		</div>
		<div class="frow">
			<div class="col-md-1-1">
				<div id="breaking-news" class="pb-15">
					<?php if( get_theme_mod( 'breaking_arrow', 'true' ) == 'true' ): ?>
						<div class="breaking-arrows splide__arrows">
							<button class="splide__arrow splide__arrow--prev">
							<i class="fa-solid fa-angle-left"></i>
							</button>
							<button class="splide__arrow splide__arrow--next">
							<i class="fa-solid fa-angle-right"></i>
							</button>
						</div>
					<?php endif; ?>
					<div class="splide__track">
						<div class="splide__list breaking-news-wrapper">
						<?php
							// WP Query for widget
							$breaking_args = array(
								'post__not_in' => get_option( 'sticky_posts' ),
								'post_status' => 'publish',
								'post_type' => 'post',
								'orderby' => 'DESC', // rand, DESC
								// 'offset' => 1, // offset
								'posts_per_page' =>  get_theme_mod('breaking_post_count', 10), // post count - 1
								// 'tax_query' => array (
								// 	array(
								// 		'taxonomy' => 'category',
								// 		'field'    => 'term_id',
								// 		'terms'    => get_theme_mod( 'section_one_post_category' )
								// 	),
								// )
							);

							$all_posts = new WP_Query($breaking_args);
							while($all_posts->have_posts()) : $all_posts->the_post();
							$postId  = get_the_ID(); // Post ID
						?>
							<div class="splide__slide">
								<article class="single-breaking-news" itemscope="itemscope" itemtype="https://schema.org/Article">
									<time class="article-time published" datetime="<?php echo esc_attr( get_the_date( 'c', $postId) ); ?>" itemprop="datePublished"><?php echo esc_html( get_the_date( 'dS M Y', $postId) ); ?></time>
									<h3 itemprop="headline"> <a href="<?php echo esc_url( get_the_permalink( $postId ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postId ) ); ?>"><?php echo esc_html( get_the_title( $postId ) ); ?></a></h3>
								</article>
							</div> <!-- single slide -->
						<?php
							endwhile;
							wp_reset_postdata();
						?>


						</div> <!-- splide list -->
					</div> <!-- splide track -->
				</div> <!-- id breaking news -->
			</div>
		</div>
	</div>
</section>