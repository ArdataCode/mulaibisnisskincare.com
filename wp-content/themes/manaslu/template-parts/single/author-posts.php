<?php
global $post;
$post_id = $post->ID;

$author_posts_text = manaslu_get_option('author_posts_text');
$no_of_author_posts = absint(manaslu_get_option('no_of_author_posts'));
$order = esc_attr(manaslu_get_option('author_posts_order'));
$orderby = esc_attr(manaslu_get_option('author_posts_orderby'));


// Covert id to ID to make it work with query
if( 'id' == $orderby ){
    $orderby = 'ID';
}

$author_posts_args = array(
    'author' => get_the_author_meta('ID'),
    'post_type' => 'post',
    'post__not_in' => array($post_id),
    'posts_per_page' => $no_of_author_posts,
    'ignore_sticky_posts' => 1,
    'orderby' => $orderby,
    'order' => $order,
);
$author_posts_query = new WP_Query($author_posts_args);

if( $author_posts_query->have_posts() ):
    ?>
    <div class="single-author-posts-area theme-single-post-component">
        <header class="manaslu-header mb-32">
            <h2 class="font-size-big m-0"><?php echo esc_html($author_posts_text);?></h2>
        </header>
        <div class="component-content single-component-content">
            <?php while($author_posts_query->have_posts()):$author_posts_query->the_post();?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('theme-article theme-single-component-article'); ?>>
                <?php if (has_post_thumbnail()):?>
                    <div class="entry-image image-size-small mb-12">
                        <figure class="featured-media">
                            <a href="<?php the_permalink() ?>">
                                <?php
                                the_post_thumbnail('medium', array(
                                    'alt' => the_title_attribute(array(
                                        'echo' => false,
                                    )),
                                ));
                                ?>
                            </a>
                            <?php if (manaslu_get_option('show_lightbox_image')) { ?>
                                <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="featured-media-fullscreen" data-glightbox="">
                                    <?php manaslu_theme_svg('fullscreen'); ?>
                                </a>
                            <?php } ?>
                        </figure>
                    </div>
                <?php endif; ?>
                <div class="entry-details">
                    <h3 class="entry-title font-size-small mb-8">
                        <a href="<?php the_permalink() ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="post-date">
                        <?php echo esc_html(get_the_date()); ?>
                    </div>
                </div>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
    <?php
endif;