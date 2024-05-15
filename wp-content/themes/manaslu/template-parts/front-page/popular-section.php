<?php

/**
 * Displays Popular Section
 *
 * @package Manaslu
 */
$popular_section_post_title = manaslu_get_option('popular_section_post_title');
$popular_section_cat = manaslu_get_option('popular_section_cat');
$number_of_popular_post = manaslu_get_option('number_of_popular_post');
$enable_popular_cat_meta = manaslu_get_option('enable_popular_cat_meta');
$enable_popular_author_meta = manaslu_get_option('enable_popular_author_meta');
$enable_popular_date_meta = manaslu_get_option('enable_popular_date_meta');
?>
<section class="site-section site-popular-area px-40 px-xxs-2">
    <?php if ($popular_section_post_title) { ?>

        <header class="manaslu-header mb-32">
            <h2 class="font-size-big m-0">
                <?php echo esc_html($popular_section_post_title); ?>
            </h2>
        </header>
    <?php } ?>
    <div class="swiper theme-popular-slider article-content-overlay mb-80 mb-lg-40">
        <div class="swiper-wrapper">
            <?php $popular_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_popular_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($popular_section_cat)));
            if ($popular_post_query->have_posts()) :
                while ($popular_post_query->have_posts()) : $popular_post_query->the_post();
            ?>
                    <div class="swiper-slide">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-popular-slide-post'); ?>>
                                <div class="entry-image image-size-big">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <figure class="featured-media featured-media-medium">
                                            <a href="<?php the_permalink() ?>">
                                                <?php
                                                the_post_thumbnail('medium_large', array(
                                                    'alt' => the_title_attribute(array(
                                                        'echo' => false,
                                                    )),
                                                ));
                                                ?>
                                            </a>
                                            <?php if (manaslu_get_option('show_lightbox_image')) { ?>
                                                <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="featured-media-fullscreen" data-glightbox="">
                                                    <?php manaslu_theme_svg('fullscreen'); ?>
                                                </a>
                                            <?php } ?>
                                        </figure>
                                    <?php endif; ?>
                                </div>

                            <div class="popular-block-content">
                                <div class="entry-categories mb-4">
                                    <?php if ($enable_popular_cat_meta) { ?>
                                        <div class="entry-categories">
                                            <span class="screen-reader-text"><?php _e('Categories', 'manaslu'); ?></span>
                                            <div class="manaslu-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div><!-- .entry-categories -->
                                    <?php } ?>
                                </div><!-- .entry-categories -->

                                <h3 class="entry-title font-size-medium line-clamp line-clamp-2 m-0 mb-8">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>

                                <?php if ($enable_popular_date_meta) {
                                    manaslu_posted_on();
                                }
                                if ($enable_popular_author_meta) {
                                    manaslu_posted_by();
                                }
                                ?>
                            </div>
                        </article>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif; ?>

        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>