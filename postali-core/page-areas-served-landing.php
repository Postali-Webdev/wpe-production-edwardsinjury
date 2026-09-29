<?php
/**
 * Template Name: Areas Served Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="toc-fact-block">            
                        <div class="accordions toc">
                            <div class="accordions_title">
                                <p>On This Page</p>
                            </div>
                            <div class="accordions_content">
                                <div class="anchor-list"></div>
                            </div>
                        </div>
                    </div>
                    <?php the_field('top_copy_block'); ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>    

    <section class="testimonial">
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                    <div class="stars"></div>
                    <?php if (get_field('full_testimonial', 'options')) : ?>
                        <p class="testimonial-body"><?php the_field('full_testimonial','options'); ?></p>
                    <?php endif; ?>
                    <?php if (get_field('testimonial_author', 'options')) : ?>
                        <p class="testimonial-name"><?php the_field('testimonial_author', 'options'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                    <?php the_field('section_2_copy_block'); ?>
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
                <div class="column-66 center block">
                    <?php the_field('section_3_copy_block'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="mid-page-cta">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <p class="large"><strong><?php the_field('midpage_cta_headline'); ?></strong></p>
                    <p class="large"><?php the_field('midpage_cta_copy'); ?></p>
                    <?php 
                        $midpage_contact_btn_url = get_field('midpage_cta_banner_online_form_button_url') ? get_field('midpage_cta_banner_online_form_button_url') : '/contact/'; 
                        $midpage_contact_btn_title = get_field('midpage_cta_button_label') ? get_field('midpage_cta_button_label') : 'Request A Consultation'; 
                    ?>
                </div>
                <div class="column-50">
                    <div class="cta-row">
                        <a href="tel:<?php the_field('phone_number', 'options'); ?>" class="btn primary-dark"><?php echo get_field('midpage_cta_phone_number_title') . ' ' . get_field('phone_number', 'options'); ?></a>
                        <a href="<?php echo $midpage_contact_btn_url; ?>" class="btn secondary-dark"><?php echo $midpage_contact_btn_title; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('section_4_copy_block')) { ?>
    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                    <?php the_field('section_4_copy_block'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php get_template_part('block','cta'); ?>

</div>

<?php get_footer();?>