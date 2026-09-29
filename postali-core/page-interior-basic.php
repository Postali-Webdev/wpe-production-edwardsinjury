<?php
/**
 * Template Name: Basic
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 block">
                    <h1><?php the_field('page_title_h1'); ?></h1>
                    <p><?php the_field('value_proposition'); ?></p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn primary-dark">Call <?php the_field('phone_number','options'); ?></a>
                        </div>
                        <?php if (!is_page_template('page-contact.php')) { ?>
                        <div class="contact-block-right">
                            <p><a class="btn secondary-dark" href="/contact/" title="Request A Consultation">Request A Consultation</a></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block center">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer();?>