<?php
/**
* Sidebar Metabox.
*
* @package Manaslu
*/
if( !function_exists( 'manaslu_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function manaslu_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('manaslu_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function manaslu_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'manaslu_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function manaslu_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'manaslu_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function manaslu_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'manaslu_metabox' );

if( ! function_exists( 'manaslu_metabox' ) ):


    function  manaslu_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'manaslu' ),
            'manaslu_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'manaslu' ),
            'manaslu_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$manaslu_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'manaslu' ),
    'layout-2' => esc_html__( 'Banner Layout', 'manaslu' ),
);

$manaslu_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'manaslu' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'manaslu' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'manaslu' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'manaslu' ),
                ),
);

$manaslu_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'manaslu' ),
    'layout-2' => esc_html__( 'Banner Layout', 'manaslu' ),
);

$manaslu_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'manaslu' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'manaslu' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'manaslu_post_metafield_callback' ) ):
    
    function manaslu_post_metafield_callback() {
        global $post, $manaslu_post_sidebar_fields, $manaslu_post_layout_options,  $manaslu_page_layout_options, $manaslu_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'manaslu_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-general" class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('General Settings', 'manaslu'); ?>

                        </a>
                    </li>

                    <li>
                        <a id="metabox-navbar-appearance" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'manaslu'); ?>

                        </a>
                    </li>

                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'manaslu'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','manaslu'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $manaslu_post_sidebar = esc_html( get_post_meta( $post->ID, 'manaslu_post_sidebar_option', true ) ); 
                            if( $manaslu_post_sidebar == '' ){ $manaslu_post_sidebar = 'global-sidebar'; }

                            foreach ( $manaslu_post_sidebar_fields as $manaslu_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="manaslu_post_sidebar_option" value="<?php echo esc_attr( $manaslu_post_sidebar_field['value'] ); ?>" <?php if( $manaslu_post_sidebar_field['value'] == $manaslu_post_sidebar ){ echo "checked='checked'";} if( empty( $manaslu_post_sidebar ) && $manaslu_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $manaslu_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','manaslu'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $manaslu_page_layout = esc_html( get_post_meta( $post->ID, 'manaslu_page_layout', true ) ); 
                                if( $manaslu_page_layout == '' ){ $manaslu_page_layout = 'layout-1'; }

                                foreach ( $manaslu_page_layout_options as $key => $manaslu_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="manaslu_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $manaslu_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $manaslu_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','manaslu'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $manaslu_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'manaslu_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="manaslu-header-overlay" name="manaslu_ed_header_overlay" value="1" <?php if( $manaslu_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="manaslu-header-overlay"><?php esc_html_e( 'Enable Header Overlay','manaslu' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','manaslu'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $manaslu_post_layout = esc_html( get_post_meta( $post->ID, 'manaslu_post_layout', true ) ); 

                                foreach ( $manaslu_post_layout_options as $key => $manaslu_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="manaslu_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $manaslu_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $manaslu_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','manaslu'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $manaslu_header_overlay = esc_html( get_post_meta( $post->ID, 'manaslu_header_overlay', true ) ); 
                                if( $manaslu_header_overlay == '' ){ $manaslu_header_overlay = 'global-layout'; }

                                foreach ( $manaslu_header_overlay_options as $key => $manaslu_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="manaslu_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $manaslu_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $manaslu_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>
<!-- 
                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php //esc_html_e('Navigation Setting','manaslu'); ?></h3>

                        <?php //$twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php //esc_html_e( 'Navigation Type','manaslu' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php //if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php //esc_html_e('Global Layout','manaslu'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php //esc_html_e('Disable Navigation','manaslu'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php //esc_html_e('Next Previous Navigation','manaslu'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php //esc_html_e('Ajax Load Next 3 Posts Contents','manaslu'); ?></option>

                            </select>

                        </div>
                    </div> -->

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $manaslu_ed_post_views = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_views', true ) );
                    $manaslu_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_read_time', true ) );
                    $manaslu_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_like_dislike', true ) );
                    $manaslu_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_author_box', true ) );
                    $manaslu_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_social_share', true ) );
                    $manaslu_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_reaction', true ) );
                    $manaslu_ed_post_rating = esc_html( get_post_meta( $post->ID, 'manaslu_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','manaslu'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-views" name="manaslu_ed_post_views" value="1" <?php if( $manaslu_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-views"><?php esc_html_e( 'Disable Post Views','manaslu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-read-time" name="manaslu_ed_post_read_time" value="1" <?php if( $manaslu_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','manaslu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-like-dislike" name="manaslu_ed_post_like_dislike" value="1" <?php if( $manaslu_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','manaslu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-author-box" name="manaslu_ed_post_author_box" value="1" <?php if( $manaslu_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','manaslu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-social-share" name="manaslu_ed_post_social_share" value="1" <?php if( $manaslu_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','manaslu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-reaction" name="manaslu_ed_post_reaction" value="1" <?php if( $manaslu_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','manaslu' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="manaslu-ed-post-rating" name="manaslu_ed_post_rating" value="1" <?php if( $manaslu_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="manaslu-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','manaslu' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'manaslu_save_post_meta' );

if( ! function_exists( 'manaslu_save_post_meta' ) ):

    function manaslu_save_post_meta( $post_id ) {

        global $post, $manaslu_post_sidebar_fields, $manaslu_post_layout_options, $manaslu_header_overlay_options,  $manaslu_page_layout_options;

        if ( !isset( $_POST[ 'manaslu_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['manaslu_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $manaslu_post_sidebar_fields as $manaslu_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'manaslu_post_sidebar_option', true ) ); 
                $new = isset( $_POST['manaslu_post_sidebar_option'] ) ? manaslu_sanitize_sidebar_option_meta( wp_unslash( $_POST['manaslu_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'manaslu_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'manaslu_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? manaslu_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $manaslu_post_layout_options as $manaslu_post_layout_option ) {  
            
            $manaslu_post_layout_old = esc_html( get_post_meta( $post_id, 'manaslu_post_layout', true ) ); 
            $manaslu_post_layout_new = isset( $_POST['manaslu_post_layout'] ) ? manaslu_sanitize_post_layout_option_meta( wp_unslash( $_POST['manaslu_post_layout'] ) ) : '';

            if ( $manaslu_post_layout_new && $manaslu_post_layout_new != $manaslu_post_layout_old ){

                update_post_meta ( $post_id, 'manaslu_post_layout', $manaslu_post_layout_new );

            }elseif( '' == $manaslu_post_layout_new && $manaslu_post_layout_old ) {

                delete_post_meta( $post_id,'manaslu_post_layout', $manaslu_post_layout_old );

            }
            
        }



        foreach ( $manaslu_header_overlay_options as $manaslu_header_overlay_option ) {  
            
            $manaslu_header_overlay_old = esc_html( get_post_meta( $post_id, 'manaslu_header_overlay', true ) ); 
            $manaslu_header_overlay_new = isset( $_POST['manaslu_header_overlay'] ) ? manaslu_sanitize_header_overlay_option_meta( wp_unslash( $_POST['manaslu_header_overlay'] ) ) : '';

            if ( $manaslu_header_overlay_new && $manaslu_header_overlay_new != $manaslu_header_overlay_old ){

                update_post_meta ( $post_id, 'manaslu_header_overlay', $manaslu_header_overlay_new );

            }elseif( '' == $manaslu_header_overlay_new && $manaslu_header_overlay_old ) {

                delete_post_meta( $post_id,'manaslu_header_overlay', $manaslu_header_overlay_old );

            }
            
        }


        $manaslu_ed_post_views_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_views', true ) ); 
        $manaslu_ed_post_views_new = isset( $_POST['manaslu_ed_post_views'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_views'] ) ) : '';

        if ( $manaslu_ed_post_views_new && $manaslu_ed_post_views_new != $manaslu_ed_post_views_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_views', $manaslu_ed_post_views_new );

        }elseif( '' == $manaslu_ed_post_views_new && $manaslu_ed_post_views_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_views', $manaslu_ed_post_views_old );

        }



        $manaslu_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_read_time', true ) ); 
        $manaslu_ed_post_read_time_new = isset( $_POST['manaslu_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_read_time'] ) ) : '';

        if ( $manaslu_ed_post_read_time_new && $manaslu_ed_post_read_time_new != $manaslu_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_read_time', $manaslu_ed_post_read_time_new );

        }elseif( '' == $manaslu_ed_post_read_time_new && $manaslu_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_read_time', $manaslu_ed_post_read_time_old );

        }



        $manaslu_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_like_dislike', true ) ); 
        $manaslu_ed_post_like_dislike_new = isset( $_POST['manaslu_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_like_dislike'] ) ) : '';

        if ( $manaslu_ed_post_like_dislike_new && $manaslu_ed_post_like_dislike_new != $manaslu_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_like_dislike', $manaslu_ed_post_like_dislike_new );

        }elseif( '' == $manaslu_ed_post_like_dislike_new && $manaslu_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_like_dislike', $manaslu_ed_post_like_dislike_old );

        }



        $manaslu_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_author_box', true ) ); 
        $manaslu_ed_post_author_box_new = isset( $_POST['manaslu_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_author_box'] ) ) : '';

        if ( $manaslu_ed_post_author_box_new && $manaslu_ed_post_author_box_new != $manaslu_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_author_box', $manaslu_ed_post_author_box_new );

        }elseif( '' == $manaslu_ed_post_author_box_new && $manaslu_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_author_box', $manaslu_ed_post_author_box_old );

        }



        $manaslu_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_social_share', true ) ); 
        $manaslu_ed_post_social_share_new = isset( $_POST['manaslu_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_social_share'] ) ) : '';

        if ( $manaslu_ed_post_social_share_new && $manaslu_ed_post_social_share_new != $manaslu_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_social_share', $manaslu_ed_post_social_share_new );

        }elseif( '' == $manaslu_ed_post_social_share_new && $manaslu_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_social_share', $manaslu_ed_post_social_share_old );

        }



        $manaslu_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_reaction', true ) ); 
        $manaslu_ed_post_reaction_new = isset( $_POST['manaslu_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_reaction'] ) ) : '';

        if ( $manaslu_ed_post_reaction_new && $manaslu_ed_post_reaction_new != $manaslu_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_reaction', $manaslu_ed_post_reaction_new );

        }elseif( '' == $manaslu_ed_post_reaction_new && $manaslu_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_reaction', $manaslu_ed_post_reaction_old );

        }



        $manaslu_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'manaslu_ed_post_rating', true ) ); 
        $manaslu_ed_post_rating_new = isset( $_POST['manaslu_ed_post_rating'] ) ? absint( wp_unslash( $_POST['manaslu_ed_post_rating'] ) ) : '';

        if ( $manaslu_ed_post_rating_new && $manaslu_ed_post_rating_new != $manaslu_ed_post_rating_old ){

            update_post_meta ( $post_id, 'manaslu_ed_post_rating', $manaslu_ed_post_rating_new );

        }elseif( '' == $manaslu_ed_post_rating_new && $manaslu_ed_post_rating_old ) {

            delete_post_meta( $post_id,'manaslu_ed_post_rating', $manaslu_ed_post_rating_old );

        }

        foreach ( $manaslu_page_layout_options as $manaslu_post_layout_option ) {  
        
            $manaslu_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'manaslu_page_layout', true ) ); 
            $manaslu_page_layout_new = isset( $_POST['manaslu_page_layout'] ) ? manaslu_sanitize_post_layout_option_meta( wp_unslash( $_POST['manaslu_page_layout'] ) ) : '';

            if ( $manaslu_page_layout_new && $manaslu_page_layout_new != $manaslu_page_layout_old ){

                update_post_meta ( $post_id, 'manaslu_page_layout', $manaslu_page_layout_new );

            }elseif( '' == $manaslu_page_layout_new && $manaslu_page_layout_old ) {

                delete_post_meta( $post_id,'manaslu_page_layout', $manaslu_page_layout_old );

            }
            
        }

        $manaslu_ed_header_overlay_old = absint( get_post_meta( $post_id, 'manaslu_ed_header_overlay', true ) ); 
        $manaslu_ed_header_overlay_new = isset( $_POST['manaslu_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['manaslu_ed_header_overlay'] ) ) : '';

        if ( $manaslu_ed_header_overlay_new && $manaslu_ed_header_overlay_new != $manaslu_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'manaslu_ed_header_overlay', $manaslu_ed_header_overlay_new );

        }elseif( '' == $manaslu_ed_header_overlay_new && $manaslu_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'manaslu_ed_header_overlay', $manaslu_ed_header_overlay_old );

        }

    }

endif;   