<?php
/**
 * Single Attorney
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>



<div class="body-container">

    <section class="banner">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php echo get_field('first_name') . ' ' . get_field('middle_initials') . ' ' . get_field('last_name'); ?></h1>
                    <p class="eyebrow"><?php the_field('title'); ?></p>
                    <div class="bordered-copy">
                        <p><?php the_field('attorney_quote'); ?></p>
                    </div>
                    <div class="cards">
                        <div class="card">
                            <div class="icon icon-phone"></div>
                            <?php $phone_number = get_field('phone_number') ? get_field('phone_number') : get_field('phone_number', 'options'); ?>
                            <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
                        </div>
                        <div class="card">
                            <div class="icon icon-mail"></div>
                            <?php $email = get_field('email') ? get_field('email') : get_field('email_address', 'options'); ?>
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </div>
                        <div class="card">
                            <div class="icon icon-pin"></div>
                            <a target="_blank" href="<?php the_field('driving_directions', 'options'); ?>"><?php the_field('address', 'options'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="column-50 block">
                    <?php $bio_img = get_field('attorney_headshot'); if($bio_img) : ?>
                    <div class="bio-img">
                        <?php echo wp_get_attachment_image($bio_img['ID'], 'full'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="article-single-featured-image">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <img src="<?php echo $featImg[0]; ?>" class="article-featured-image"  />
                            
                        <?php } ?>
                    </div>
                    <?php the_content(); ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>