<?php
/**
 * Displays Banner Section
 *
 * @package Manaslu
 */
$is_banner_section = manaslu_get_option('enable_banner_section');
$banner_section_cat = manaslu_get_option('banner_section_cat');
$banner_section_slider_layout = 'site-banner-layout-1';
$number_of_slider_post = manaslu_get_option('number_of_slider_post');
$enable_banner_cat_meta = manaslu_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = manaslu_get_option('enable_banner_author_meta');
$enable_banner_date_meta = manaslu_get_option('enable_banner_date_meta');
$enable_banner_post_description = manaslu_get_option('enable_banner_post_description');
$slider_post_content_alignment = manaslu_get_option('slider_post_content_alignment');
$container_parallax = "";
$container_font_class = "";
$featured_image = "";
if ($banner_section_slider_layout == 'site-banner-layout-1') {
    $container_parallax = 'data-swiper-parallax="45%"';
    $container_font_class = "font-size-large";
} else {
    $container_font_class = "font-size-small";
}
?>

<section class="site-section site-banner">
    <div class="<?php echo esc_attr($banner_section_slider_layout); ?>">
        <div class="theme-banner-slider swiper-container mb-80 mb-lg-40">
            <div class="swiper-wrapper">
                <?php $banner_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => absint($number_of_slider_post), 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($banner_section_cat)));
                if ($banner_post_query->have_posts()) :
                    while ($banner_post_query->have_posts()) : $banner_post_query->the_post();
                            if ($banner_section_slider_layout == 'site-banner-layout-1') {
                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                            } else {
                                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                            }
                            $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                        
                ?>
                        <div class="swiper-slide">

                            <div class="slide-inner" <?php echo $container_parallax; ?>>
                                <div class="data-bg-overlay"></div>
                       
                                <?php  if (has_post_thumbnail()) { ?>
                                <div class="data-bg slide-featured-background" data-background="<?php echo esc_url($featured_image); ?>"></div>
                                <?php } ?>
                                <div class="slider-content <?php echo $slider_post_content_alignment; ?>">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="entry-categories">
                                            <span class="screen-reader-text"><?php _e('Categories', 'manaslu'); ?></span>
                                            <div class="manaslu-entry-categories">
                                                <?php the_category(' '); ?>
                                            </div>
                                        </div><!-- .entry-categories -->
                                    <?php } ?>
                                    <h2 class="entry-title <?php echo esc_attr($container_font_class); ?> line-clamp line-clamp-3 mb-24">
                                        <?php the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                    </h2>

                                    <?php if ($enable_banner_post_description) { ?>
                                        <div class="entry-summary line-clamp line-clamp-3">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="">
                                        <?php if ($enable_banner_date_meta) {
                                            manaslu_posted_on();
                                        }
                                        if ($enable_banner_author_meta) {
                                            manaslu_posted_by();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div id="fraction" class="swiper-fraction"></div>
        </div>
    </div>
</section>