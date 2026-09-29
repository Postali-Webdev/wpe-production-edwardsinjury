<?php
/**
 * Template Name: Team Navigational
 * @package Postali Child
 * @author Postali LLC
**/

get_header(); ?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 block">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_field('banner_value_proposition'); ?></p>

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
                <?php if ( have_rows('attorneys') ): ?>
                <div class="column-full block">
                    <div class="title">
                        <h2>Attorneys</h2>
                    </div>
                    <div class="cards">
                    <?php while ( have_rows('attorneys') ): the_row(); ?>  
                    <?php
                        $attorney_page = get_sub_field('page_link');
                        $attorney_page_id = 0;

                        if ( is_object($attorney_page) && isset($attorney_page->ID) ) {
                            $attorney_page_id = (int) $attorney_page->ID;
                        } elseif ( is_array($attorney_page) && isset($attorney_page['ID']) ) {
                            $attorney_page_id = (int) $attorney_page['ID'];
                        } elseif ( is_numeric($attorney_page) ) {
                            $attorney_page_id = (int) $attorney_page;
                        } elseif ( is_string($attorney_page) ) {
                            $attorney_page_id = (int) url_to_postid($attorney_page);
                        }

                        $attorney_post = $attorney_page_id ? get_post($attorney_page_id) : null;
                        $attorney_headshot = $attorney_post ? get_field('attorney_headshot', $attorney_post->ID) : null;
                        $attorney_title = $attorney_post ? get_field('title', $attorney_post->ID) : null;
                    ?>
            
                        <a href="<?php echo esc_url(get_permalink($attorney_post->ID)); ?>" class="card">
                            <div class="copy-holder">
                                <?php if ( $attorney_post ) : ?>
                                    <?php if ( $attorney_headshot ) : ?>
                                        <img src="<?php echo esc_url($attorney_headshot['url']); ?>" alt="<?php echo esc_attr($attorney_headshot['alt'] ?: $attorney_post->post_title); ?>" class="attorney-img" />
                                    <?php endif; ?>
                                    <h3><?php echo esc_html($attorney_post->post_title); ?></h3>
                                    <p class="eyebrow"><?php echo esc_html($attorney_title); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?> 

                <div class="spacer-60"></div>
                <div class="spacer-line"></div>
                <div class="spacer-60"></div>

                <?php if ( have_rows('staff') ): ?>
                <div class="column-full block">
                    <div class="title">
                        <h2>Staff</h2>
                    </div>
                    <div class="cards">
                    <?php while ( have_rows('staff') ): the_row(); ?>  
                    <?php
                        $staff_page = get_sub_field('page_link');
                        $staff_page_id = 0;

                        if ( is_object($staff_page) && isset($staff_page->ID) ) {
                            $staff_page_id = (int) $staff_page->ID;
                        } elseif ( is_array($staff_page) && isset($staff_page['ID']) ) {
                            $staff_page_id = (int) $staff_page['ID'];
                        } elseif ( is_numeric($staff_page) ) {
                            $staff_page_id = (int) $staff_page;
                        } elseif ( is_string($staff_page) ) {
                            $staff_page_id = (int) url_to_postid($staff_page);
                        }

                        $staff_post = $staff_page_id ? get_post($staff_page_id) : null;
                        $staff_headshot = $staff_post ? get_field('attorney_headshot', $staff_post->ID) : null;
                        $staff_title = $staff_post ? get_field('title', $staff_post->ID) : null;
                    ?>
            
                        <a href="<?php echo esc_url(get_permalink($staff_post->ID)); ?>" class="card">
                            <div class="copy-holder">
                                <?php if ( $staff_post ) : ?>
                                    <?php if ( $staff_headshot ) : ?>
                                        <img src="<?php echo esc_url($staff_headshot['url']); ?>" alt="<?php echo esc_attr($staff_headshot['alt'] ?: $staff_post->post_title); ?>" class="attorney-img" />
                                    <?php endif; ?>
                                    <h3><?php echo esc_html($staff_post->post_title); ?></h3>
                                    <p class="eyebrow"><?php echo esc_html($staff_title); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?> 
            </div>
        </div>
    </section>

    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>