<?php
/**
 * Single template
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
                <div class="column-66 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <p class="eyebrow">
                        <?php
                            $terms = get_the_terms( $post->ID , 'faqs_category' );
                            foreach ( $terms as $term ) { ?>
                            <a href="/faq/faqs_category/<?php echo $term->slug; ?>/">
                            <?php echo $term->name; ?></a><span class="comma">, </span>
                        <?php } ?>
                    </p>
                    <h1><?php the_title(); ?>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a class="btn primary" href="/contact/" title="Request A Consultation">Get A Free Consultation</a>
                        </div>
                        <div class="contact-block-right">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn secondary-dark">Call Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_content(); ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
                
            </div>
        </div>
    </section>
        <?php get_template_part('block','cta'); ?>

</div>

<?php get_footer();?>