<?php
if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_Tab_Posts extends Manaslu_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_tab_posts';
        $this->widget_description = __("Displays Tab Widget", 'manaslu');
        $this->widget_id = 'manaslu_tab_posts';
        $this->widget_name = __('Manaslu: Tab Posts', 'manaslu');
        $this->settings = array(
            'popular_heading' => array(
                'label' => esc_html__('Popular', 'manaslu'),
                'type' => 'heading',
            ),
            'popular_number' => array(
                'label' => esc_html__('No. of Posts:', 'manaslu'),
                'type' => 'number',
                'css' => 'max-width:60px;',
                'default' => 5,
                'min' => 1,
                'max' => 10,
            ),
            'recent_heading' => array(
                'label' => esc_html__('Recent', 'manaslu'),
                'type' => 'heading',
            ),
            'recent_number' => array(
                'label' => esc_html__('No. of Posts:', 'manaslu'),
                'type' => 'number',
                'css' => 'max-width:60px;',
                'default' => 5,
                'min' => 1,
                'max' => 10,
            ),
            'comments_heading' => array(
                'label' => esc_html__('Comments', 'manaslu'),
                'type' => 'heading',
            ),
            'comments_number' => array(
                'label' => esc_html__('No. of Comments:', 'manaslu'),
                'type' => 'number',
                'css' => 'max-width:60px;',
                'default' => 5,
                'min' => 1,
                'max' => 10,
            ),
            'tagged_heading' => array(
                'label' => esc_html__('Tagged', 'manaslu'),
                'type' => 'heading',
            ),
            'select_image_size' => array(
                'label' => esc_html__('Select Image Size Featured Post:', 'manaslu'),
                'type' => 'select',
                'default' => 'medium',
                'options' => array(
                    'thumbnail' => esc_html__('Thumbnail', 'manaslu'),
                    'medium' => esc_html__('Medium', 'manaslu'),
                    'large' => esc_html__('Large', 'manaslu'),
                    'full' => esc_html__('Full', 'manaslu'),
                ),
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'manaslu'),
                'options' => array(
                    'style_1' => __('Style 1', 'manaslu'),
                    'style_2' => __('Style 2', 'manaslu'),
                ),
                'std' => 'style_1',
            ),
            'show_date' => array(
                'type' => 'checkbox',
                'label' => __('Show Date', 'manaslu'),
                'std' => true,
            ),
            'date_format' => array(
                'type' => 'select',
                'label' => __('Date Format', 'manaslu'),
                'options' => array(
                    'format_1' => __('Format 1', 'manaslu'),
                    'format_2' => __('Format 2', 'manaslu'),
                ),
                'std' => 'format_1',
            ),
        );
        parent::__construct();
    }

    /**
     * Outputs the content for the current widget instance.
     *
     * @param array $args Display arguments.
     * @param array $instance Settings for the current widget instance.
     * @since 1.0.0
     *
     */
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        ?>
        <div class="theme-widget-tab">
            <div class="widget-tab-header">
                <ul class="tab-header-list" role="tablist">
                    <li role="presentation" tab-data="tab-popular" class="widget-tab-presentation tab-popular active">
                        <a href="javascript:void(0)" aria-controls="popular" role="tab">
                            <span class="fire-icon tab-icon">
                                <?php manaslu_theme_svg('blaze'); ?>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" tab-data="tab-recent" class="widget-tab-presentation tab-recent">
                        <a href="javascript:void(0)" aria-controls="recent" role="tab">
                            <span class="flash-icon tab-icon">
                                <?php manaslu_theme_svg('star'); ?>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" tab-data="tab-comments" class="widget-tab-presentation tab-comments">
                        <a href="javascript:void(0)" aria-controls="comments" role="tab">
                            <span class="comment-icon tab-icon">
                                <?php manaslu_theme_svg('comment'); ?>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" tab-data="tab-tagged" class="widget-tab-presentation tab-tagged">
                        <a href="javascript:void(0)" aria-controls="tags" role="tab">
                            <span class="comment-icon tab-icon">
                                <?php manaslu_theme_svg('tag'); ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="widget-tab-content">
                <div role="tabpanel" class="tab-content-panel content-tab-popular active">
                    <?php $this->render_news('popular', $instance); ?>
                </div>

                <div role="tabpanel" class="tab-content-panel content-tab-recent">
                    <?php $this->render_news('recent', $instance); ?>
                </div>

                <div role="tabpanel" class="tab-content-panel content-tab-comments">
                    <?php $this->render_comments($instance); ?>
                </div>

                <div role="tabpanel" class="tab-content-panel content-tab-tagged">
                    <?php $this->render_tagged($instance); ?>
                </div>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Render news.
     *
     * @param array $types Type.
     * @param array $instance Parameters.
     * @return void
     * @since 1.0.0
     *
     */
    function render_news($types, $instance)
    {
        if (!in_array($types, array('popular', 'recent'))) {
            return;
        }
        switch ($types) {
            case 'popular':
                $cat_slug = '';
                if (isset($instance['tab_cat'])) {
                    $cat_slug = $instance['tab_cat'];
                }
                $qargs = array(
                    'posts_per_page' => $instance['popular_number'],
                    'no_found_rows' => true,
                    'orderby' => 'comment_count',
                    'category_name' => $cat_slug,
                );
                break;
            case 'recent':
                $cat_slug = '';
                if (isset($instance['tab_cat'])) {
                    $cat_slug = $instance['tab_cat'];
                }
                $qargs = array(
                    'posts_per_page' => $instance['recent_number'],
                    'no_found_rows' => true,
                    'category_name' => $cat_slug,
                );
                break;
            default:
                break;
        }
        $tab_posts_query = new WP_Query($qargs);
        $style = $instance['style'];
        if ($tab_posts_query->have_posts()):
            ?>
            <div class="theme-widget-list tab-widget-list <?php echo esc_attr($style); ?>">
                <?php
                while ($tab_posts_query->have_posts()):
                    $tab_posts_query->the_post(); ?>

                        <article
                                id="post-<?php the_ID(); ?>" <?php post_class('theme-article theme-widget-article'); ?>>
                            <?php
                            if (has_post_thumbnail()) {
                                ?>
                                <div class="entry-image">
                                    <figure class="featured-media">
                                        <a href="<?php the_permalink() ?>">
                                            <?php
                                            the_post_thumbnail('thumbnail', array(
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
                                <?php
                            }
                            ?>
                            <div class="entry-details">
                                <?php the_title( '<h3 class="entry-title font-size-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                <?php
                                if ($instance['show_date']) {
                                    ?>
                                    <div class="manaslu-meta post-date">
                                        <span class="meta-icon">
                                            <span class="screen-reader-text"><?php _e('Post Date', 'manaslu'); ?></span>
                                            <?php manaslu_theme_svg('calendar'); ?>
                                        </span>
                                        <span class="meta-text">
                                            <?php
                                            $date_format = $instance['date_format'];
                                            if ('format_1' == $date_format) {
                                                echo esc_html(human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago', 'manaslu'));
                                            } else {
                                                echo esc_html(get_the_date());
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </article>

                <?php endwhile; ?>
            </div><!-- .tab-widget-list -->
            <?php wp_reset_postdata();
        endif;
    }

    /**
     * Render comments.
     *
     * @param array $instance Parameters.
     * @return void
     * @since 1.0.0
     *
     */
    function render_comments($instance)
    {
        $cat_slug = '';
        $post_array = array();
        if (!empty($instance['tab_cat'])) {
            $cat_slug = $instance['tab_cat'];
            $qargs = array(
                'posts_per_page' => 10,
                'no_found_rows' => true,
                'category_name' => $cat_slug,
            );
            $tab_posts_query = new WP_Query($qargs);
            if ($tab_posts_query->have_posts()) {
                while ($tab_posts_query->have_posts()) {
                    $tab_posts_query->the_post();
                    $post_array[] = get_the_ID();
                }
                wp_reset_postdata();
            }
        }
        $comment_args = array(
            'number' => $instance['comments_number'],
            'status' => 'approve',
            'post_status' => 'publish',
            'post__in' => $post_array,
        );
        $comments = get_comments($comment_args);
        ?>
        <?php if (!empty($comments)): ?>
        <ul class="theme-widget-list comments-tabbed-list">
            <?php foreach ($comments as $key => $comment): ?>
                <li>
                    <div class="column-row">
                        <div class="column column-4">
                            <div class="entry-thumbnail">
                                <?php $comment_author_url = esc_url(get_comment_author_url($comment)); ?>
                                <?php if (!empty($comment_author_url)):
                                    $thumb = get_avatar_url($comment, array('size' => 100)); ?>
                                    <a href="<?php echo esc_url($comment_author_url); ?>"
                                       class="data-bg data-bg-widget-thumbnail"
                                       data-background="<?php echo esc_url($thumb); ?>"></a>
                                <?php else : ?>
                                    <?php echo wp_kses_post(get_avatar($comment, 130)); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="column column-8">
                            <div class="comments-content">
                                <?php echo wp_kses_post(get_comment_author_link($comment)); ?>
                            </div>
                            <?php the_title( '<h3 class="entry-title font-size-small"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul><!-- .comments-list -->
    <?php endif; ?>
        <?php
    }

    /**
     * Render Tagged.
     *
     * @param array $instance Parameters.
     * @return void
     * @since 1.0.0
     *
     */
    function render_tagged($instance)
    {
        $tags = get_tags();
        $args = array(
            'smallest' => 10,
            'largest' => 22,
            'unit' => 'px',
            'format' => 'flat',
            'separator' => " ",
            'orderby' => 'count',
            'order' => 'DESC',
            'show_count' => 1,
            'echo' => false
        );
        $tag_string = wp_generate_tag_cloud($tags, $args);
        echo $tag_string;
    }
}
