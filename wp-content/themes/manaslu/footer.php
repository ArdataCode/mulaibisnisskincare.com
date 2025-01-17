<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manaslu
 */

?>

    <?php
    $enable_footer_recommended_post_section = manaslu_get_option('enable_footer_recommended_post_section');
    if ($enable_footer_recommended_post_section) {
        get_template_part('template-parts/footer/footer-recommended-post');
    }

    ?>
    <?php get_template_part('template-parts/footer/footer-widgets-full'); ?>

    <?php do_action('manaslu_before_footer'); ?>

    </div> <!-- main content container -->
</div>  <!-- site-content-area -->



<?php
$footer_image_class = '';
$is_sticky_footer = manaslu_get_option('enable_footer_sticky');
$enable_footer_sticky = manaslu_get_option('enable_footer_sticky');
if ($enable_footer_sticky) {
    ?>
    <div class="sticky-footer-spacer"></div>
    <?php
}
$upload_footer_image = manaslu_get_option('upload_footer_image');
$enable_footer_image_overlay = manaslu_get_option('enable_footer_image_overlay');
if ($upload_footer_image) {
    $footer_image_class .= 'data-bg';
}
if ($enable_footer_image_overlay) {
    $footer_image_class .= ' footer-has-overlay';
}
?>
<footer id="colophon" class="site-footer <?php echo $footer_image_class; ?>" <?php if ($upload_footer_image) { ?> data-background="<?php echo esc_url($upload_footer_image); ?>" <?php } ?>  <?php echo ($is_sticky_footer) ? 'data-sticky-footer="true"': '';?>>
    <?php get_template_part('template-parts/footer/footer-widgets'); ?>
    <?php get_template_part('template-parts/footer/footer-info'); ?>

    <?php
    $enable_scroll_to_top = manaslu_get_option('enable_scroll_to_top');
    if ($enable_scroll_to_top) {
    ?>
        <a id="theme-scroll-to-start" href="javascript:void(0)">
            <span class="screen-reader-text"><?php _e('Scroll to top', 'manaslu'); ?></span>
            <?php manaslu_theme_svg('arrow-up'); ?>
        </a>
    <?php
    }
    ?>
    <?php
    $enable_cursor_dot_outline = manaslu_get_option('enable_cursor_dot_outline');
    if($enable_cursor_dot_outline){ ?>
        <!-- Custom cursor -->
        <div class="cursor-dot-outline"></div>
        <div class="cursor-dot"></div>
        <!-- .Custom cursor -->
    <?php } ?>

</footer><!-- #colophon -->


<?php do_action('manaslu_after_footer'); ?>

</div><!-- #page -->

<?php do_action('manaslu_after_site'); ?>

<?php wp_footer(); ?>

</body>

</html>