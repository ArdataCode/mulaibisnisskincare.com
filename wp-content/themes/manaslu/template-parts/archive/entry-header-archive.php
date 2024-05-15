<?php 
// Don't show the title if the post-format is `aside` or `status`.
$post_format = get_post_format();
$enabled_post_meta = manaslu_get_option('archive_post_meta_1');
?>

    <div class="entry-image">
        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            <figure class="featured-media">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full'); ?>
                </a>

                <?php
                $caption = get_the_post_thumbnail_caption();
                if ( $caption ) {
                    ?>
                    <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>
                    <?php
                }
                ?>
                <?php if (manaslu_get_option('show_lightbox_image')) { ?>
                    <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="featured-media-fullscreen" data-glightbox="">
                        <?php manaslu_theme_svg('fullscreen'); ?>
                    </a>
                <?php } ?>
            </figure><!-- .featured-media -->
            <?php $display_read_time_in = manaslu_get_option('display_read_time_in');
            if (in_array('archive-page', $display_read_time_in) && is_archive()) {
                manaslu_read_time();
            }
            if (in_array('home-page', $display_read_time_in) && is_home()) {
                manaslu_read_time();
            } ?>
        <?php endif; ?>
    </div><!-- .entry-image -->

<header class="entry-header">

    <div class="manaslu-article-title mb-16">
        <?php the_title( '<h2 class="entry-title font-size-xbig line-clamp line-clamp-2 m-0"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );?>
    </div>

    <div class="entry-categories mb-16">
        <span class="screen-reader-text"><?php _e( 'Categories', 'manaslu' ); ?></span>
        <div class="manaslu-entry-categories">
            <?php the_category( ' ' ); ?>
        </div>
    </div><!-- .entry-categories -->
    
    <?php if ( 'post' === get_post_type() ) :?>
        <div class="entry-meta mb-16">
            <?php manaslu_post_meta_info($enabled_post_meta); ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>

    <div class="entry-summary">
        <?php get_template_part( 'template-parts/archive/archive', $post_format ); ?>
    </div><!-- .entry-content -->

</header><!-- .entry-header -->