<?php
/**
 * The default template for displaying content
 * @package Packers Movers Company
 * @since 1.0.0
 */

$packers_movers_company_default = packers_movers_company_get_default_theme_options();
$packers_movers_company_image_size = 'large';
global $packers_movers_company_archive_first_class; 
$packers_movers_company_archive_classes = [
    'theme-article-post',
    'theme-article-animate',
    $packers_movers_company_archive_first_class
];?>

<article id="post-<?php the_ID(); ?>" <?php post_class($packers_movers_company_archive_classes); ?>>
    <div class="theme-article-image">
        <div class="entry-thumbnail">
            <?php
            if (is_search() || is_archive() || is_front_page()) {
                $packers_movers_company_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                $packers_movers_company_featured_image = isset( $packers_movers_company_featured_image[0] ) ? $packers_movers_company_featured_image[0] : ''; ?>
                <div class="post-thumbnail data-bg data-bg-big"
                     data-background="<?php echo esc_url( $packers_movers_company_featured_image ); ?>">
                    <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                </div>
                <?php
            } else {
                packers_movers_company_post_thumbnail($packers_movers_company_image_size);
            }
            if ( get_theme_mod('packers_movers_company_display_archive_post_sticky_post', true) == true ) :
            packers_movers_company_post_format_icon(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="theme-article-details">
        <?php if ( get_theme_mod('packers_movers_company_display_archive_post_category', true) == true ) : ?>
        <div class="entry-meta-top">
            <div class="entry-meta">
                <?php packers_movers_company_entry_footer($cats = true, $tags = false, $edits = false); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('packers_movers_company_display_archive_post_title', true) == true ) : ?>
            <header class="entry-header">
                <h2 class="entry-title entry-title-medium">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <span><?php the_title(); ?></span>
                    </a>
                </h2>
            </header>
        <?php endif; ?>
         <?php if ( get_theme_mod('packers_movers_company_display_archive_post_content', true) == true ) : ?>
            <div class="entry-content">
                <?php
                if (has_excerpt()) {

                    the_excerpt();

                } else {

                    echo '<p>';
                    echo esc_html(wp_trim_words(get_the_content(), 10, '...'));
                    echo '</p>';
                }

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'packers-movers-company'),
                    'after' => '</div>',
                )); ?>
            </div>
        <?php endif; ?>
        <?php if ( get_theme_mod('packers_movers_company_display_archive_post_button', true) == true ) : ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" class="theme-btn-link">
              <span> <?php esc_html_e('Read More', 'packers-movers-company'); ?> </span>
              <span class="topbar-info-icon"><?php packers_movers_company_the_theme_svg('arrow-right-1'); ?></span>
            </a>
        <?php endif; ?>
    </div>
</article>