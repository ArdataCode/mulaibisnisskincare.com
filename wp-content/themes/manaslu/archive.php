<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Manaslu
 */

get_header();

// Add a main container in case if sidebar is present
$class = '';
$page_layout = manaslu_get_page_layout();
$archive_post_layout = manaslu_get_option('archive_post_layout');
$enable_post_title_center = manaslu_get_option('enable_post_title_center');

?>
    <main id="site-content" role="main">
        <div id="primary" class="content-area">

            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .page-header -->


                <div class="manaslu-article-wrapper <?php echo esc_attr($archive_post_layout); ?> <?php if ($enable_post_title_center) { echo 'align-article-center'; } ?>">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                    get_template_part('template-parts/content', 'archive');

                endwhile;

                echo '</div><!-- .manaslu-article-wrapper -->';

                get_template_part('template-parts/pagination');

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </div> <!-- #primary -->

    </main> <!-- #site-content-->
<?php
get_footer();