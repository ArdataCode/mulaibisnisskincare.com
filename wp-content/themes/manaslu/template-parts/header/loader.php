<?php 
/**
 * Displays preloader
 *
 * @package Manaslu
 */
$show_preloader = manaslu_get_option('show_preloader');
$preloader_style = manaslu_get_option('preloader_style');

if($show_preloader) :
    ?>
    <div id="theme-preloader-initialize" class="theme-preloader">

        <div class="theme-preloader-spinner <?php echo esc_attr($preloader_style);?>">
            <div class="theme-preloader-throbber"></div>
        </div>


    </div>
    <?php
endif;