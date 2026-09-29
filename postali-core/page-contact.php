<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 block center">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">

                    <div class="cards">
                        <div class="card">
                            <p class="eyebrow">Phone</p>
                            <div class="copy">
                                <a href="tel:<?php the_field('phone_number','options'); ?>" title="Call Today"><?php the_field('phone_number','options'); ?></a>
                            </div>
                        </div>
                        <div class="card">
                            <p class="eyebrow">Email</p>
                            <div class="copy">
                                <a href="mailto:<?php the_field('email_address','options'); ?>" title="Call Today"><?php the_field('email_address','options'); ?></a>
                            </div>
                        </div>
                        <div class="card">
                            <p class="eyebrow">Address</p>
                            <div class="copy">
                                <p>
                                    <a href="<?php the_field('driving_directions','options'); ?>" title="Get Directions" target="blank">
                                        <?php the_field('address','options'); ?>
                                    </a>
                                </p>
                                <?php if( have_rows('office_hours', 'options') ) : ?>
                                    <div class="hours-wrapper">
                                        <?php while( have_rows('office_hours', 'options') ) : the_row(); ?>
                                            <div class="date-time">
                                                <p><?php the_sub_field('days'); ?></p>
                                                <p><?php the_sub_field('hours'); ?></p>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="map">
                            <iframe src="<?php the_field('map_embed','options'); ?>" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="column-50 block">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('calendly_embed','options')) { ?>

    <section id="calendly">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <h2>Book a Free Consultation</h2>
                    <iframe src="<?php the_field('calendly_embed','options'); ?>" frameborder="0" title="Schedule an appointment"></iframe>
                </div>
            </div>
        </div>
    </section>

    <?php } ?>

</div>

<?php get_footer();?>