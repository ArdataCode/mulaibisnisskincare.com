<?php

/**
 * Displays recommended post on footer.
 *
 * @package Manaslu
 */
$enable_category_meta = manaslu_get_option('enable_category_meta');
$enable_date_meta = manaslu_get_option('enable_date_meta');
$enable_post_excerpt = manaslu_get_option('enable_post_excerpt');
$enable_author_meta = manaslu_get_option('enable_author_meta');
$footer_recommended_post_title = manaslu_get_option('footer_recommended_post_title');
$select_cat_for_footer_recommended_post = manaslu_get_option('select_cat_for_footer_recommended_post');
?>
<section class="site-section site-recommendation px-40 px-xxs-2">
    <div class="column-row">
        <div class="column column-12">
            <header class="manaslu-header mb-32">
                <h2 class="font-size-big m-0">
                    <?php echo esc_html($footer_recommended_post_title); ?>
                </h2>
            </header>
        </div>
    </div>
    <div class="column-row">
        <?php $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
        if ($footer_recommended_post_query->have_posts()) :
            while ($footer_recommended_post_query->have_posts()) : $footer_recommended_post_query->the_post();
        ?>
                <div class="column column-4 column-lg-6 column-sm-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('theme-recommended-post'); ?>>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="entry-image image-size-small mb-12">
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
                            </div>
                        <?php endif; ?>
                        <?php if ($enable_category_meta) { ?>
                            <div class="entry-categories mb-4">
                                <span class="screen-reader-text"><?php _e('Categories', 'manaslu'); ?></span>
                                <div class="manaslu-entry-categories">
                                    <?php the_category(' '); ?>
                                </div>
                            </div><!-- .entry-categories -->
                        <?php } ?>

                        <header class="entry-header mb-8">
                            <?php the_title('<h3 class="entry-title font-size-medium line-clamp line-clamp-2 m-0"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                        </header>
                        <?php if ($enable_post_excerpt) { ?>
                            <div class="entry-content line-clamp line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php } ?>
                        <?php if ($enable_date_meta) {
                            manaslu_posted_on();
                        } ?>
                        <?php if ($enable_author_meta) {
                            manaslu_posted_by();
                        } ?>
                    </article>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
    </div>
</section>
<?php endif; ?>