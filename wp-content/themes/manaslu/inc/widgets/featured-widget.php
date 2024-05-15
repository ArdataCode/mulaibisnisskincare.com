<?php
if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_Featured_Widget extends Manaslu_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_featured_posts';
        $this->widget_description = __("Displays featured posts with an image", 'manaslu');
        $this->widget_id = 'manaslu_featured_posts';
        $this->widget_name = __('Manaslu: Featured Posts', 'manaslu');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'manaslu'),
            ),
            'description' => array(
                'type' => 'text',
                'label' => __('Description', 'manaslu'),
            ),
            'category' => array(
                'type' => 'dropdown-taxonomies',
                'label' => __('Select Category', 'manaslu'),
                'desc' => __('Leave empty if you don\'t want the posts to be category specific', 'manaslu'),
                'args' => array(
                    'taxonomy' => 'category',
                    'class' => 'widefat',
                    'hierarchical' => true,
                    'show_count' => 1,
                    'show_option_all' => __('&mdash; Select &mdash;', 'manaslu'),
                ),
            ),
            'number' => array(
                'type' => 'number',
                'step' => 1,
                'min' => 1,
                'max' => '',
                'std' => 3,
                'label' => __('Number of posts to show', 'manaslu'),
            ),
            'orderby' => array(
                'type' => 'select',
                'std' => 'date',
                'label' => __('Order by', 'manaslu'),
                'options' => array(
                    'date' => __('Date', 'manaslu'),
                    'ID' => __('ID', 'manaslu'),
                    'title' => __('Title', 'manaslu'),
                    'rand' => __('Random', 'manaslu'),
                ),
            ),
            'order' => array(
                'type' => 'select',
                'std' => 'desc',
                'label' => __('Order', 'manaslu'),
                'options' => array(
                    'asc' => __('ASC', 'manaslu'),
                    'desc' => __('DESC', 'manaslu'),
                ),
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
     * Query the posts and return them.
     * @param array $args
     * @param array $instance
     * @return WP_Query
     */
    public function get_posts($args, $instance)
    {
        $number = !empty($instance['number']) ? absint($instance['number']) : $this->settings['number']['std'];
        $orderby = !empty($instance['orderby']) ? sanitize_text_field($instance['orderby']) : $this->settings['orderby']['std'];
        $order = !empty($instance['order']) ? sanitize_text_field($instance['order']) : $this->settings['order']['std'];
        $query_args = array(
            'posts_per_page' => $number,
            'post_status' => 'publish',
            'no_found_rows' => 1,
            'orderby' => $orderby,
            'order' => $order,
            'ignore_sticky_posts' => 1
        );
        if (!empty($instance['category']) && -1 != $instance['category'] && 0 != $instance['category']) {
            $query_args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $instance['category'],
            );
        }
        return new WP_Query(apply_filters('manaslu_featured_posts_query_args', $query_args));
    }

    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        if (($posts = $this->get_posts($args, $instance)) && $posts->have_posts()) {
            echo $args['before_widget'];
            do_action('manaslu_before_featured_posts_with_image');
            ?>
            <div class="manaslu-our-service px-40 px-xxs-2 mb-80 mb-lg-40">
                <div class="our-service-detail">
                    <div class="our-service-content">
                        <?php if( $instance['title'] && 0!= $instance['title']) {?>
                            <h2 class="font-size-large line-clamp line-clamp-2 mb-16">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        <?php } ?>
                        <?php if( $instance['description'] && 0!= $instance['description']) {?>
                            <p class = 'm-0 line-clamp line-clamp-2'>
                                <?php echo esc_html($instance['description']); ?>
                            </p>
                        <?php } ?>

                    </div>

                    <div class="swiper service-image-group">
                        <div class="swiper-wrapper">
                            <?php while ($posts->have_posts()): $posts->the_post();
                            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                            $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                             ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="">
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>

                <div class="column-row mt-24">
                    <?php while ($posts->have_posts()): $posts->the_post();
                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium_large');
                    $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                     ?>
                        <div class="column column-3 column-lg-6 column-xs-12 mb-24">
                            <div class="our-service-item">
                                <h2 class="font-size-medium line-clamp line-clamp-3 m-0 mb-16">
                                    <?php the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>'); ?>
                                </h2>
                                <?php the_excerpt(); ?>
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
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </div>
            </div>

            <?php
            do_action('manaslu_after_featured_posts_with_image');
            echo $args['after_widget'];

        }
        echo ob_get_clean();
    }
}