<?php

if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_Faq_Widget extends Manaslu_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_faq_widget';
        $this->widget_description = __("Faq action section", 'manaslu');
        $this->widget_id = 'manaslu_faq_widget';
        $this->widget_name = __('Manaslu: Faq Widget', 'manaslu');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Faq Title', 'manaslu'),
            ),
            'faq_title_1' => array(
                'type' => 'text',
                'label' => __('Faq Title - 1', 'manaslu'),
            ),
            'faq_desc_1'  => array(
                'type'  => 'textarea',
                'label' => __( 'Faq Description - 1', 'manaslu' ),
                'rows' => 10,
            ),
            'faq_title_2' => array(
                'type' => 'text',
                'label' => __('Faq Title - 2', 'manaslu'),
            ),
            'faq_desc_2'  => array(
                'type'  => 'textarea',
                'label' => __( 'Faq Description - 2', 'manaslu' ),
                'rows' => 10,
            ),
            'faq_title_3' => array(
                'type' => 'text',
                'label' => __('Faq Title - 3', 'manaslu'),
            ),
            'faq_desc_3'  => array(
                'type'  => 'textarea',
                'label' => __( 'Faq Description - 3', 'manaslu' ),
                'rows' => 10,
            ),
            'faq_title_4' => array(
                'type' => 'text',
                'label' => __('Faq Title - 4', 'manaslu'),
            ),
            'faq_desc_4'  => array(
                'type'  => 'textarea',
                'label' => __( 'Faq Description - 4', 'manaslu' ),
                'rows' => 10,
            ),

            'faq_title_5' => array(
                'type' => 'text',
                'label' => __('Faq Title - 5', 'manaslu'),
            ),
            'faq_desc_5'  => array(
                'type'  => 'textarea',
                'label' => __( 'Faq Description - 5', 'manaslu' ),
                'rows' => 10,
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
        <section class="manaslu-faq px-40 mb-80 mb-lg-40 px-xxs-2">
            <?php if( $instance['title'] && 0!= $instance['title']) {?>
                <div class="manaslu-header header-title-center">
                    <h2 class="font-size-big m-0 ">
                        <?php echo esc_html($instance['title']); ?>
                    </h2>
                </div>
            <?php } ?>

            <div class="manaslu-body">
                <div class="manaslu-faq-content">

                    <?php for ($i=1; $i <=5 ; $i++) {  ?>
                        <div class="faq-content-item">
                            <div class="faq-content-container">
                                <div class="faq-content-header">
                                    <div class="faq-button"></div>

                                    <h2 class="entry-title font-size-small m-0">
                                       <?php echo esc_html($instance['faq_title_'.$i]); ?>
                                    </h2>
                                </div>

                                <div class="faq-content-body">
                                    <p>
                                        <?php echo esc_html($instance['faq_desc_'.$i]); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </section>


        <?php
        do_action( 'manaslu_after_cta');
        echo $args['after_widget'];
        echo ob_get_clean();
    }

}