<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Manaslu
 */

get_header();

// Add a main container in case if sidebar is present
$class = '';
$page_layout = manaslu_get_page_layout();
?>
    <main id="site-content" role="main">
        <div id="primary" class="content-area">

            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'manaslu'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'manaslu'); ?></p>

                    <?php
                    get_search_form();

                    the_widget('WP_Widget_Recent_Posts');
                    ?>

                    <div class="widget widget_categories">
                        <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'manaslu'); ?></h2>
                        <ul>
                            <?php
                            wp_list_categories(
                                array(
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'show_count' => 1,
                                    'title_li' => '',
                                    'number' => 10,
                                )
                            );
                            ?>
                        </ul>
                    </div><!-- .widget -->

                    <?php
                    /* translators: %1$s: smiley */
                    $manaslu_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'manaslu'), convert_smilies(':)')) . '</p>';
                    the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$manaslu_archive_content");

                    the_widget('WP_Widget_Tag_Cloud');
                    ?>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </div><!-- #main -->
        <?php
        if ('no-sidebar' != $page_layout) {
            get_sidebar();
        }
        ?>
    </main>
<?php
get_footer();
