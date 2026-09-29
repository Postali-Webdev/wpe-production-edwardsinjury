<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */


get_header(); 
global $post;
?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66">
                    <h1><?php echo get_the_title(); ?></h1>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn primary-dark">Call <?php the_field('phone_number','options'); ?></a>
                        </div>
                        <div class="contact-block-right">
                            <a class="btn secondary-dark" href="/contact/" title="Request a Consultation">Request a Consultation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block center">
                    <?php $post_title = get_the_title($post->ID); // get post title
                    $post_content = get_post_field('post_content', $post->ID); ?>
                    <div class="result">
                        <h3><?php echo $post_title; ?></h3>
                        <p><?php echo $post_content; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>