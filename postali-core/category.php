<?php
/**
 
 * 
 * @package Postali Child
 * @author Postali LLC
 */


get_header(); ?>

<div class="body-container">

    <section class="banner">
        <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 center block">
                    <h1>Blog | <?php $cat = get_the_category(); echo $cat[0]->name; ?></h1>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn primary-dark">Call <?php the_field('phone_number','options'); ?></a>
                        </div>
                        <div class="contact-block-right">
                            <p><a class="btn secondary-dark" href="/contact/" title="Request A Consultation">Request A Consultation</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-full posts">
                    <?php while( have_posts() ) : the_post(); 
                    $categories = get_the_category( $post->ID ); ?>
                        <article>
                            <a class="fill-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>

                            <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                            <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                <div class="post-image" style="background-image:url('<?php echo $featImg[0]; ?>');"/></div>
                            <?php } elseif( !has_post_thumbnail() && $categories[0]->name != 'uncategorized') { 
                                $featImg = get_field('category_image', 'category_' . $categories[0]->term_id, $post->ID ); ?>
                                
                                <div class="post-image" style="background-image:url('<?php echo $featImg['url']; ?>');"/></div>
                            <?php } else { ?>
                                <div class="post-image" style="background-image:url('<?php the_field('blog_header_default_image','options'); ?>"/></div>
                            <?php } ?>
                                <div class="meta-content">
                                    <p class="eyebrow">
                                        <?php 
                                        echo '<a href="/category/' . $categories[0]->slug . '/">' . $categories[0]->name . '</a>' ?>
                                    </p>
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <?php the_posts_pagination([
                        'prev_text' => __(''),
                        'next_text' => __('')
                    ]); ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>