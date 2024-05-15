<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/recent-widget.php';
require get_template_directory() . '/inc/widgets/social-widget.php';
require get_template_directory() . '/inc/widgets/author-widget.php';
require get_template_directory() . '/inc/widgets/newsletter-widget.php';
require get_template_directory() . '/inc/widgets/tab-widget.php';
require get_template_directory() . '/inc/widgets/cta-widget.php';
require get_template_directory() . '/inc/widgets/class-about-widget.php';
require get_template_directory() . '/inc/widgets/featured-widget.php';
require get_template_directory() . '/inc/widgets/faq-widget.php';
require get_template_directory() . '/inc/widgets/testimonial-widget.php';
require get_template_directory() . '/inc/widgets/gallery-widget.php';

/* Register site widgets */
if ( ! function_exists( 'manaslu_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function manaslu_widgets() {
        register_widget( 'Manaslu_Recent_Posts' );
        register_widget( 'Manaslu_Social_Menu' );
        register_widget( 'Manaslu_Author_Info' );
        register_widget( 'Manaslu_Mailchimp_Form' );
        register_widget( 'Manaslu_Call_To_Action' );
        register_widget( 'Manaslu_Tab_Posts' );
        register_widget( 'Manaslu_About_Widget' );
        register_widget( 'Manaslu_Featured_Widget' );
        register_widget( 'Manaslu_Faq_Widget' );
        register_widget( 'Manaslu_Testimonial_Widget' );
        register_widget( 'Manaslu_Gallery_Widget' );
    }
endif;
add_action( 'widgets_init', 'manaslu_widgets' );