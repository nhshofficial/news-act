<?php

// Section one
function sectionOne($postCount) { ?>
	<!-- Hero 1 -->
	<section class="hero-1">
		<div class="frow-container-fluid">
			<div class="frow">
				<div class="col-md-1-1">
					<?php
						// WP Query for widget
						$args = array(
							'post__not_in' => get_option( 'sticky_posts' ),
							'post_status' => 'publish',
							'post_type' => 'post',
							'orderby' => 'DESC', // rand, DESC
							// 'offset' => 1, // offset
							'posts_per_page' =>  1, // post count - 1
							// 'tax_query' => array (
							// 	array(
							// 		'taxonomy' => 'category',
							// 		'field'    => 'term_id',
							// 		'terms'    => get_theme_mod( 'section_one_post_category' )
							// 	),
							// )
						);
	
						$single_post = new \WP_Query($args);
						while($single_post->have_posts()) : $single_post->the_post();
						$single_postId  = get_the_ID(); // Post ID
					?>
					<article class="hero-post-style-1" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $single_postId, 'newsact-blog' ) ); ?>);" itemscope="itemscope" itemtype="https://schema.org/Article">
						<h3 class="px-30 py-10" itemprop="headline"><a href="<?php echo esc_url( get_the_permalink( $single_postId ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $single_postId ) ); ?>"><?php echo esc_html( get_the_title( $single_postId ) ); ?></a></h3>
						<p class="px-30"><?php echo esc_html( wp_trim_words( get_the_content(), 25, '...' )); ?></p>
					</article> <!-- hero -->
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					<div class="frow px-30 py-30 zindex">
	
					<?php
						// WP Query for widget
						$args = array(
							'post__not_in' => get_option( 'sticky_posts' ),
							'post_status' => 'publish',
							'post_type' => 'post',
							'orderby' => 'DESC', // rand, DESC
							'offset' => 1, // offset
							'posts_per_page' =>  $postCount - 1, // post count - 1
							// 'tax_query' => array (
							// 	array(
							// 		'taxonomy' => 'category',
							// 		'field'    => 'term_id',
							// 		'terms'    => get_theme_mod( 'section_one_post_category' )
							// 	),
							// )
						);
	
						$all_posts = new \WP_Query($args);
						while($all_posts->have_posts()) : $all_posts->the_post();
						$postId  = get_the_ID(); // Post ID
					?>
						<div class="col-md-1-5 col-sm-1-3 col-xs-1-2 border-right p-20">
							<article class="single-hero-sub-content" itemscope="itemscope" itemtype="https://schema.org/Article">
								<h3 itemprop="headline"><a href="<?php echo esc_url( get_the_permalink( $postId ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postId ) ); ?>"><?php echo esc_html( get_the_title( $postId ) ); ?></a></h3>
							</article>
						</div> <!-- single post -->
					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	}


function SectionTwo($postCount, $postCountCenter, $leftRightCategory, $centerCategory, $centerSkipPosts) { ?>

    <!-- Hero 2 -->
    <section class="hero-2">
        <div class="frow-container">
            <div class="frow gutters">
                <div class="col-md-2-9 col-sm-1-4 border-right hide-border">
                <?php
                    $finalLRCats = explode(',', $leftRightCategory);
                    // WP Query for widget
                    $args = array(
                        'post__not_in' => get_option( 'sticky_posts' ),
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'orderby' => 'DESC', // rand, DESC
                        // 'offset' => 1, // offset
                        'posts_per_page' =>  $postCount / 2, // post count - 1
                        'tax_query' => array (
                        	array(
                        		'taxonomy' => 'category',
                        		'field'    => 'term_id',
                        		'terms'    => $finalLRCats
                        	),
                        )
                    );
    
                    $left_post = new \WP_Query($args);
                    while($left_post->have_posts()) : $left_post->the_post();
                    $postIdLeft  = get_the_ID(); // Post ID
                ?>

                <article class="single-hero-2-content-left border-bottom py-10" itemscope="itemscope" itemtype="https://schema.org/Article">
                    <?php if( has_post_thumbnail( $postIdLeft ) ): ?>
                        <a href="<?php echo esc_url( get_the_permalink( $postIdLeft ) ); ?>">
                            <span class="screen-reader-text"><?php echo esc_html( get_the_title( $postIdLeft ) ); ?></span>
                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( $postIdLeft, 'newsact-section-2-left' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $postIdLeft ) ); ?>" itemprop="image">
                        </a>
                    <?php endif; ?>
                    <h3 itemprop="headline"><a href="<?php echo esc_url( get_the_permalink( $postIdLeft ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postIdLeft ) ); ?>"><?php echo esc_html( get_the_title( $postIdLeft ) ); ?></a></h3>
                    <time class="article-time published" datetime="<?php echo esc_attr( get_the_date( 'c', $postIdLeft) ); ?>" itemprop="datePublished"><?php echo esc_html( get_the_date( 'dS M Y', $postIdLeft) ); ?></time>
                </article> <!-- single -->
    
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
                </div>
                <div class="col-md-5-9 col-sm-2-4 border-right hide-border">
                <?php
                    $finalCenterCats = explode(',', $centerCategory);
                    // WP Query for widget
                    $args = array(
                        'post__not_in' => get_option( 'sticky_posts' ),
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'orderby' => 'DESC', // rand, DESC
                        'offset' => $centerSkipPosts, // offset
                        'posts_per_page' =>  1, // post count - 1
                        'tax_query' => array (
                        	array(
                        		'taxonomy' => 'category',
                        		'field'    => 'term_id',
                        		'terms'    => $finalCenterCats
                        	),
                        )
                    );
    
                    $centered_post = new \WP_Query($args);
                    while($centered_post->have_posts()) : $centered_post->the_post();
                    $postId  = get_the_ID(); // Post ID
                ?>

                    <article class="single-hero-2-content py-10 border-bottom" itemscope="itemscope" itemtype="https://schema.org/Article">
                        <?php if( has_post_thumbnail( $postId ) ): ?>
                            <a href="<?php echo esc_url( get_the_permalink( $postId ) ); ?>">
                            <span class="screen-reader-text"><?php echo esc_html( get_the_title( $postId ) ); ?></span>
                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( $postId, 'newsact-blog' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $postId ) ); ?>" itemprop="image">
                            </a>
                        <?php endif; ?>
                        <h3 class="pt-15" itemprop="headline"><a href="<?php echo esc_url( get_the_permalink( $postId ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postId ) ); ?>"><?php echo esc_html( get_the_title( $postId ) ); ?></a></h3>
                        <p itemprop="text"><?php echo esc_html( wp_trim_words( get_the_content(), 30, '...' )); ?></p>
                        <time class="article-time published" datetime="<?php echo esc_attr( get_the_date( 'c', $postId) ); ?>" itemprop="datePublished"><?php echo esc_html( get_the_date( 'dS M Y', $postId) ); ?></time>
                    </article> <!-- hero 2 main -->

                <?php 
                    endwhile;
                    wp_reset_postdata();
                ?>
                    <div class="frow gutters hero-2-sub-contents">
                        <?php
                            $finalCenterCatsSub = explode(',', $centerCategory);
                            // WP Query for widget
                            $argsSub = array(
                                'post__not_in' => get_option( 'sticky_posts' ),
                                'post_status' => 'publish',
                                'post_type' => 'post',
                                'orderby' => 'DESC', // rand, DESC
                                'offset' => $centerSkipPosts + 1, // offset
                                'posts_per_page' =>  $postCountCenter - 1, // post count - 1
                                'tax_query' => array (
                                	array(
                                		'taxonomy' => 'category',
                                		'field'    => 'term_id',
                                		'terms'    => $finalCenterCatsSub
                                	),
                                )
                            );
            
                            $centered_post_sub = new \WP_Query($argsSub);
                            while($centered_post_sub->have_posts()) : $centered_post_sub->the_post();
                            $postIdSub  = get_the_ID(); // Post ID
                        ?>
                            <div class="col-md-1-2 border-right hide-border">
                                <article class="single-hero-2-sub-content py-20 border-bottom" itemscope="itemscope" itemtype="https://schema.org/Article">
                                    <?php if( has_post_thumbnail( $postIdSub ) ): ?>
                                        <a href="<?php echo esc_url( get_the_permalink( $postIdSub ) ); ?>">
                                        <span class="screen-reader-text"><?php echo esc_html( get_the_title( $postIdSub ) ); ?></span>
                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( $postIdSub, 'newsact-section-2-left' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $postIdSub ) ); ?>" itemprop="image">
                                        </a>
                                    <?php endif; ?>
                                    <h3 itemprop="headline"><a href="<?php echo esc_attr( get_the_permalink( $postIdSub ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postIdSub ) ); ?>"><?php echo esc_html( get_the_title( $postIdSub ) ); ?></a></h3>
                                </article>
                            </div> <!-- hero 2 sub -->
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="col-md-2-9 col-sm-1-4">
                <?php
                    $finalRLCats = explode(',', $leftRightCategory);
                    // WP Query for widget
                    $argsRight = array(
                        'post__not_in' => get_option( 'sticky_posts' ),
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'orderby' => 'DESC', // rand, DESC
                        'offset' => $postCount / 2, // offset
                        'posts_per_page' =>  $postCount / 2, // post count - 1
                        'tax_query' => array (
                        	array(
                        		'taxonomy' => 'category',
                        		'field'    => 'term_id',
                        		'terms'    => $finalRLCats
                        	),
                        )
                    );
    
                    $right_post = new \WP_Query($argsRight);
                    while($right_post->have_posts()) : $right_post->the_post();
                    $postIdRight  = get_the_ID(); // Post ID
                ?>

                <article class="single-hero-2-content-left border-bottom py-10" itemscope="itemscope" itemtype="https://schema.org/Article">
                    <?php if( has_post_thumbnail( $postIdRight ) ): ?>
                        <a href="<?php echo esc_url( get_the_permalink( $postIdRight ) ); ?>">
                        <span class="screen-reader-text"><?php echo esc_html( get_the_title( $postIdRight ) ); ?></span>
                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( $postIdRight, 'newsact-section-2-left' ) ); ?>" alt="<?php echo esc_attr( get_the_title( $postIdRight ) ); ?>" itemprop="image">
                        </a>
                    <?php endif; ?>
                    <h3 itemprop="headline"><a href="<?php echo esc_url( get_the_permalink( $postIdRight ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postIdRight ) ); ?>"><?php echo esc_html( get_the_title( $postIdRight ) ); ?></a></h3>
                    <time class="article-time published" datetime="<?php echo esc_attr( get_the_date( 'c', $postIdRight) ); ?>" itemprop="datePublished"><?php echo esc_html( get_the_date( 'dS M Y', $postIdRight) ); ?></time>
                </article> <!-- single -->
    
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    }