<?php

if (!defined('ABSPATH')) {
    exit;
}

class Manaslu_Mailchimp_Form extends Manaslu_Widget_Base
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_manaslu_mailchimp_form';
        $this->widget_description = __("Displays MailChimp form if you have any", 'manaslu');
        $this->widget_id = 'manaslu_mailchimp_form';
        $this->widget_name = __('Manaslu: MailChimp Form', 'manaslu');
        $this->settings = array(
            'title' => array(
                'label' => esc_html__('Widget Title', 'manaslu'),
                'type' => 'text',
                'class' => 'widefat',
            ),
            'desc' => array(
                'type' => 'textarea',
                'label' => __('Description', 'manaslu'),
                'rows' => 10,
            ),
            'form_shortcode' => array(
                'type' => 'text',
                'label' => __('MailChimp Form Shortcode', 'manaslu'),
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'manaslu'),
                'options' => array(
                    'style_1' => __('Style 1', 'manaslu'),
                    'style_2' => __('Style 2', 'manaslu'),
                    'style_3' => __('Style 3', 'manaslu'),
                ),
                'std' => 'style_1',
            ),
            'msg' => array(
                'type' => 'message',
                'label' => __('Additonal Settings', 'manaslu'),
            ),
            'height'  => array(
                'type' => 'number',
                'step' => 20,
                'min' => 300,
                'max' => 700,
                'std' => 400,
                'label' => __('Height: Between 300px and 700px (Default 400px)', 'manaslu'),
            ),
            'text_color_option' => array(
                'type' => 'color',
                'label' => __( 'Text Color', 'manaslu' ),
                'std' => '#ffffff',
            ),
            'text_align' => array(
                'type' => 'select',
                'label' => __('Text Alignment', 'manaslu'),
                'options' => array(
                    'left' => __('Left Align', 'manaslu'),
                    'center' => __('Center Align', 'manaslu'),
                    'right' => __('Right Align', 'manaslu'),
                ),
                'std' => 'left',
            ),
            'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Background Image', 'manaslu' ),
                'desc' => __( 'Don\'t upload any image if you do not want to show the background image.', 'manaslu' ),
            ),
            'enable_fixed_bg'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Enable Fixed Background Image', 'manaslu' ),
                'std' => true,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __( 'Overlay Background Color', 'manaslu' ),
                'std' => '#000000',
            ),
            'overlay_opacity'  => array(
                'type' => 'number',
                'step' => 10,
                'min' => 0,
                'max' => 100,
                'std' => 50,
                'label' => __('Overlay Opacity (Default 50%)', 'manaslu'),
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
        if (!empty($instance['form_shortcode'])) {

            ob_start();

            $class = '';

            $image_enabled = false;

            if($instance['bg_image'] && 0 != $instance['bg_image']){
                $image_enabled = true;
                $class = 'manaslu-cover-block ';

                if($instance['enable_fixed_bg']){
                    $class .= 'manaslu-bg-image manaslu-bg-attachment-fixed ';
                }
            }

            $class .= $instance['style'];
            $style_text = 'color:'.$instance['text_color_option'].';';  
            $style_text .= 'text-align:'.$instance['text_align'].';';  
            $style_text .= 'min-height:'.$instance['height'].'px;';
            echo $args['before_widget'];

            do_action( 'manaslu_before_mailchimp');

            ?>
            <div class="manaslu-mailchimp-widget <?php echo esc_attr($class);?>" style="<?php echo esc_attr($style_text);?>">

                <?php
                if($image_enabled){
                    $style = 'background-color:'.$instance['bg_overlay_color'].';';  
                    $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
                    ?>
                    <span aria-hidden="true" class="manaslu-block-overlay" style="<?php echo esc_attr($style);?>"></span>
                    <?php echo wp_get_attachment_image($instance['bg_image'],'full');?>
                    <?php
                }
                ?>
                <div class="manaslu-mailchimp-inner-wrapper manaslu-block-inner-wrapper">
                   <div class="mailchimp-content-group_1">
                        <?php if ($instance['title']) : ?>
                            <h2 class="entry-title font-size-large">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        <?php endif; ?>

                        <div class="entry-summary">
                            <?php
                            if ($instance['desc']) {
                                echo wpautop(wp_kses_post($instance['desc']));
                            }
                            ?>
                        </div>
                   </div>
                    <div class="mailchimp-content-group_2">
                        <footer class="entry-footer">
                        <?php echo do_shortcode($instance['form_shortcode']); ?>
                        </footer>
                    </div>
                </div>

            </div>

            <?php

            do_action( 'manaslu_after_mailchimp');

            echo $args['after_widget'];

            echo ob_get_clean();
        }
    }
}