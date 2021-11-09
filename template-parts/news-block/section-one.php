<?php 
    $one_options = get_theme_mod( 'news_blocks' );
?>


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

                    $all_posts = new WP_Query($args);
                    while($all_posts->have_posts()) : $all_posts->the_post();
                    $postId  = get_the_ID(); // Post ID
                ?>
                <article class="hero-post-style-1" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $postId, 'newsact-blog' ) ); ?>);" itemscope="itemscope" itemtype="https://schema.org/Article">
                    <h3 class="px-30 py-10" itemprop="headline"><a href="<?php echo esc_url( get_the_permalink( $postId ) ); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title( $postId ) ); ?>"><?php echo esc_html( get_the_title( $postId ) ); ?></a></h3>
                    <p class="px-30"><?php echo esc_html( wp_trim_words( get_the_content(), 25, '...' )); ?></p>
                </article> <!-- hero -->
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
                <div class="frow px-30 py-30 zindex">
                    <div class="col-md-1-5 col-sm-1-3 col-xs-1-2 border-right p-20">
                        <article class="single-hero-sub-content" itemscope="itemscope" itemtype="https://schema.org/Article">
                            <h3 itemprop="headline"><a href="#" rel="bookmark" title="Habits you should change right now">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit.</a></h3>
                        </article>
                    </div> <!-- single post -->
                    <div class="col-md-1-5 col-sm-1-3 col-xs-1-2 border-right p-20">
                        <article class="single-hero-sub-content" itemscope="itemscope" itemtype="https://schema.org/Article">
                            <h3 itemprop="headline"><a href="#" rel="bookmark" title="Habits you should change right now">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit.</a></h3>
                        </article>
                    </div> <!-- single post -->
                    <div class="col-md-1-5 col-sm-1-3 col-xs-1-2 border-right p-20">
                        <article class="single-hero-sub-content" itemscope="itemscope" itemtype="https://schema.org/Article">
                            <h3 itemprop="headline"><a href="#" rel="bookmark" title="Habits you should change right now">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit.</a></h3>
                        </article>
                    </div> <!-- single post -->
                    <div class="col-md-1-5 col-sm-1-3 col-xs-1-2 border-right p-20">
                        <article class="single-hero-sub-content" itemscope="itemscope" itemtype="https://schema.org/Article">
                            <h3 itemprop="headline"><a href="#" rel="bookmark" title="Habits you should change right now">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit.</a></h3>
                        </article>
                    </div> <!-- single post -->
                    <div class="col-md-1-5 col-sm-1-3 col-xs-1-2 border-right p-20">
                        <article class="single-hero-sub-content" itemscope="itemscope" itemtype="https://schema.org/Article">
                            <h3 itemprop="headline"><a href="#" rel="bookmark" title="Habits you should change right now">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit.</a></h3>
                        </article>
                    </div> <!-- single post -->
                </div>
            </div>
        </div>
    </div>
</section>