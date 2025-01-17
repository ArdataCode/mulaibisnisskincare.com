<?php

if ( ! function_exists( 'manaslu_ajax_pagination' ) ) :
    /**
     * Outputs the required structure for ajax loading posts on scroll and click
     *
     * @since 1.0.0
     * @param $type string Ajax Load Type
     */
    function manaslu_ajax_pagination($type) {
        global $wp_query; 
        if ( $wp_query->max_num_pages > 1  ) {

            ?>
            <div class="manaslu-load-posts-btn-wrapper"
            data-page="1" 
            data-max-pages="<?php echo esc_attr($wp_query->max_num_pages);?>" 
            data-load-type="<?php echo esc_attr($type);?>"
            >
                <a href="#" class="">
                    <span class="manaslu-ajax-loader"></span>
                    <button class="load-btn"><?php _e('Load More', 'manaslu') ?></button>
                </a>
            </div>
            <?php
        }
    }
endif;

if ( ! function_exists( 'manaslu_load_posts' ) ) :
    /**
     * Ajax Load posts Callback.
     *
     * @since 1.0.0
     *
     */
    function manaslu_load_posts() {

        check_ajax_referer( 'manaslu-load-posts-nonce', 'nonce' );

        $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

        $query_vars['post_type'] = ( isset( $_POST['post_type']) && !empty($_POST['post_type'] ) ) ? esc_attr( $_POST['post_type'] ) : 'post';
        $query_vars['paged'] = (int) $_POST['page'];
        $query_vars['post_status'] = 'publish';

        $posts = new WP_Query( $query_vars );
        
        if($posts->have_posts()):

            ob_start();
            // Load a different template for search page else load archive template
            $template_part = ( isset($query_vars['s']) && !empty($query_vars['s']) )? 'search' : 'archive';

            while($posts->have_posts()):$posts->the_post();
                get_template_part('template-parts/content', $template_part);
            endwhile;wp_reset_postdata();

            $output['content'][] = ob_get_clean();
            wp_send_json_success($output);

        else:

            $error = new WP_Error( '500', __('No More Posts','manaslu') );
            wp_send_json_error( $error );

        endif;

        wp_die();
    }
endif;
add_action( 'wp_ajax_manaslu_load_posts', 'manaslu_load_posts' );
add_action( 'wp_ajax_nopriv_manaslu_load_posts', 'manaslu_load_posts' );