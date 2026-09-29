<?php
/**
 * Template Name: Practice Areas Landing
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
                    
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a class="btn primary" href="/contact/" title="Request a Consultation">Get a Free Consultation</a>
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
                <div class="column-full block">
                <?php
                $pa_args = array(
                    'post_type' => 'page',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'page-practice-parent.php',
                );
                $practice_pages = new WP_Query($pa_args);
                
                if( $practice_pages->have_posts() ) : ?>
                <div class="practice-areas">
                    <?php while( $practice_pages->have_posts() ) : $practice_pages->the_post(); 
                        
                        $title = get_the_title();
                        $excerpt = get_field('banner_value_proposition');
                        $pa_link = get_the_permalink();

                        $child_args = array(
                            'post_type' => 'page',
                            'posts_per_page' => -1,
                            'post_parent' => $post->ID,
                            'post_status' => 'publish'
                        );

                        $child_pages = new WP_Query($child_args);
                    ?>
                    <div class="pa-box">
                        <div class="col1">
                            <h3><?php echo $title; ?></h3>
                            <p class="pa-excerpt"><?php echo $excerpt; ?></p>
                        </div>
                        <div class="col2">
                            <p class="eyebrow">Practice Areas</p>
                            <ul>
                                <li><a href="<?php echo $pa_link; ?>"><?php echo $title; ?></a></li>
                                <?php if($child_pages->have_posts() ) {
                                    while($child_pages->have_posts() ) {
                                        $child_pages->the_post(); 
                                        $child_page_title = get_the_title();
                                        $child_page_url = get_the_permalink(); ?>
                                        <li><a href="<?php echo $child_page_url; ?>"><?php echo $child_page_title; ?></a></li>
                                        <?php
                                    }
                                } ?>
                            </ul>
                        </div>
                        
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>
            </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>