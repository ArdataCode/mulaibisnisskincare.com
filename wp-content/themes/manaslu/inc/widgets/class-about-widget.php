<?php

if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_About_Widget extends Manaslu_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_about_widget';
        $this->widget_description = __("About action section", 'manaslu');
        $this->widget_id = 'manaslu_about_widget';
        $this->widget_name = __('Manaslu: About Widget', 'manaslu');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('About Title', 'manaslu'),
            ),
            'desc'  => array(
                'type'  => 'textarea',
                'label' => __( 'About Description', 'manaslu' ),
                'rows' => 10,
            ),
            'image_4'  => array(
                'type'  => 'image',
                'label' => __( 'Upload Featured Image', 'manaslu' ),
                'desc' => __( 'if you want to use video leave this field empty', 'manaslu' ),

            ),
            'video_link'  => array(
                'type'  => 'url',
                'label' => __( 'Video Link url', 'manaslu' ),
                'desc' => __( 'Enter a proper embed url with http: OR https:', 'manaslu' ),
            ),
            'image_1'  => array(
                'type'  => 'image',
                'label' => __( 'Featured Image 1', 'manaslu' ),
            ),
            'image_2'  => array(
                'type'  => 'image',
                'label' => __( 'Featured Image 2', 'manaslu' ),
            ),
            'image_3'  => array(
                'type'  => 'image',
                'label' => __( 'Upload Your Signature', 'manaslu' ),
            ),
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action( 'manaslu_before_cta');
        ?>

        <div class="manaslu-about-us px-40 px-xxs-2 mb-80 mb-lg-40">
            <div class="column-row column-row-collapse">
                <div class="column column-6 column-lg-5 column-sm-12 mb-sm-24">
                    <div class="image-size-big">
                        <?php if (!empty($instance['image_4'])) { ?>
                            <img src="<?php echo esc_url (wp_get_attachment_image_url($instance['image_4'],'medium_large')); ?>" alt="">
                        <?php } else { ?>
                            <iframe width="560" height="315" src="<?php echo esc_url($instance['video_link']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                </div>

                <div class="column column-6 column-lg-7 column-sm-12">
                    <div class="manaslu-header mb-32">
                        <?php if( $instance['title'] && 0!= $instance['title']) {?>
                            <h2 class="font-size-big m-0 mb-32 px-40 px-xxs-2">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        <?php } ?>
                    </div>

                    <div class="manaslu-body px-40 p-sm-0">
                        <div class="about-us-detail">
                            <?php if( $instance['desc'] && 0!= $instance['desc']) {?>
                                <p class = 'm-0'>
                                    <?php echo wp_kses_post($instance['desc']); ?>
                                </p>
                            <?php } ?>

                            <img src="<?php echo esc_url(wp_get_attachment_image_url($instance['image_3'],'medium_large')); ?>" alt="">
                        </div>

                        <div class="about-us-image">
                            <div class="image-size-medium">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($instance['image_1'],'medium_large')); ?>" alt="">
                            </div>
                            <div class="image-size-medium">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($instance['image_2'],'medium_large')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        do_action( 'manaslu_after_cta');
        echo $args['after_widget'];
        echo ob_get_clean();
    }

}