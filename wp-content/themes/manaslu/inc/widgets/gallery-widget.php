<?php

if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_Gallery_Widget extends Manaslu_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_gallery_widget';
        $this->widget_description = __("Gallery action section", 'manaslu');
        $this->widget_id = 'manaslu_gallery_widget';
        $this->widget_name = __('Manaslu: Gallery Widget', 'manaslu');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Gallery Title', 'manaslu'),
            ),
            'gallery_attachment_image_id' => array(
                'type' => 'text',
                'label' => __('Gallery Attachment Image Id', 'manaslu'),
                'desc' => __( 'Enter a proper image id with , as selerator eg: id1 id2 id3 at max 9 image id only', 'manaslu' ),
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
        <div class="manaslu-gallery mb-80 mb-lg-40">
            <?php if( $instance['title'] && 0!= $instance['title']) {?>
                <div class="manaslu-header px-40 mb-32">
                    <h2 class="font-size-big ">
                        <?php echo esc_html($instance['title']); ?>
                    </h2>
                </div>
            <?php } ?>

            <div class="manaslu-body">
                <div class="gallery-image-container">
                <?php 
                $image_id_arrya = $instance['gallery_attachment_image_id']; 
                 $image_id = strtok($image_id_arrya, " ");
                    while ($image_id !== false){ ?>
                        <div class="manaslu-gallery-image">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id,'medium_large'));?>">
                        </div>
                    <?php     
                        $image_id = strtok(" ");
                    }
                   ?>


                </div>

                <div class="chooyo-gallery-popup">
                    <img src="" alt="">

                    <?php manaslu_theme_svg('close'); ?>

                    <button class="manaslu-gallery-prev">
                        <?php manaslu_theme_svg('arrow-left'); ?>
                    </button>
                    
                    <button class="manaslu-gallery-next">
                        <?php manaslu_theme_svg('arrow-right'); ?>
                    </button>
                </div>
            </div>
        </div>

        <?php
        do_action( 'manaslu_after_cta');
        echo $args['after_widget'];
        echo ob_get_clean();
    }

}