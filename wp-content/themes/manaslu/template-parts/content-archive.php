<?php
/**
 * Template part for displaying post archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Manaslu
 */
$post_format = get_post_format();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <div class="article-block-wrapper">
        
        <?php get_template_part('template-parts/archive/entry-header-archive');?>
        
    </div><!-- .article-block-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->