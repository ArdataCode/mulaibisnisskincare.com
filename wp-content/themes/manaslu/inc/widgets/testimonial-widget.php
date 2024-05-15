<?php
if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_Testimonial_Widget extends Manaslu_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_testimonial_posts';
        $this->widget_description = __("Displays testimonial section with an image", 'manaslu');
        $this->widget_id = 'manaslu_testimonial_posts';
        $this->widget_name = __('Manaslu: Testimonial Section', 'manaslu');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'manaslu'),
            ),
            'page_id_1' => array(
                'label' => esc_html__('Select Page - 1', 'manaslu'),
                'type' => 'dropdown-pages',
                'std' => '',
            ),
            'page_id_2' => array(
                'label' => esc_html__('Select Page - 2', 'manaslu'),
                'type' => 'dropdown-pages',
                'std' => '',
            ),
            'page_id_3' => array(
                'label' => esc_html__('Select Page - 3', 'manaslu'),
                'type' => 'dropdown-pages',
                'std' => '',
            ),
            'page_id_4' => array(
                'label' => esc_html__('Select Page - 4', 'manaslu'),
                'type' => 'dropdown-pages',
                'std' => '',
            ),
            'page_id_5' => array(
                'label' => esc_html__('Select Page - 5', 'manaslu'),
                'type' => 'dropdown-pages',
                'std' => '',
            ),

        );
        parent::__construct();
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
        ?>

        <section class="manaslu-testimonial px-40 px-xxs-2 mb-80 mb-lg-40">
            <div class="manaslu-header header-title-center">
                <h2 class="font-size-big m-0">
                    <?php echo esc_html($instance['title']); ?>
                </h2>
            </div>

            <div class="manaslu-body">
                <div class="swiper manaslu-testimonial-container">
                    <div class="swiper-wrapper">

                        <?php $manaslu_testimonial_page = array();
                        for ($i = 1; $i <= 5; $i++) {
                            $manaslu_testimonial_page_list[] = absint($instance['page_id_' . $i]);
                        }
                        $manaslu_testimonial_args = array(
                            'posts_per_page' => 5,
                            'orderby' => 'post__in',
                            'post_type' => 'page',
                            'post__in' => $manaslu_testimonial_page_list,
                        ); ?>
                        <?php
                        $manaslu_testimonial_post_query = new WP_Query($manaslu_testimonial_args);
                        if ($manaslu_testimonial_post_query->have_posts()):
                            while ($manaslu_testimonial_post_query->have_posts()):
                                $manaslu_testimonial_post_query->the_post();
                                if (has_post_thumbnail()) {
                                    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                    $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                                }
                                ?>
                                <div class="swiper-slide">
                                    <div class="manaslu-testimonial-content">
                                    <div class="manaslu-testimonial-image">
                                        <div class="image-size-medium">
                                            <img src="<?php echo esc_url($featured_image); ?>" alt="">
                                        </div>
                                    </div>

                                    <div class="manaslu-testimonial-detail">
                                        <?php manaslu_theme_svg('quote-2'); ?>

                                        <div class="manaslu-testimonial-excerpt mb-24 font-size-medium">
                                            <?php the_excerpt(); ?>
                                        </div>

                                        <h2 class="m-0">
                                            <?php the_title(); ?>
                                        </h2>
                                    </div>

                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <?php
        echo ob_get_clean();
    }
}