<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */


get_header(); ?>

<div class="body-container">

    <section class="banner" style="background-image:url('<?php the_field('faqs_banner_background','options'); ?>');">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 block">
                <h1><?php the_field('faqs_archive_title','options'); ?></h1>
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
                <div class="column-66">
                    <div class="category-filter">
                    <?php if( $terms = get_terms( array(
                        'taxonomy' => 'faqs_category', 
                        'orderby' => 'name'
                    ) ) ) : 
                        echo '<select name="categoryfilter" id="categories" onchange="javascript:location.href = this.value;">';
                        echo '<option style="color:black;" value="/faq/">All FAQs</option>'; 
                        foreach ( $terms as $term ) :
                            echo '<option style="color:black;" value="/faq/faqs_category/' . $term->slug . '">' . $term->name . '</option>'; // ID of the category as an option value
                            endforeach;
                        echo '</select>';
                    endif;
                    ?>
                    </div>

                    <div class="spacer-60"></div>
                        <div class="faqs-group">
                        <?php while ( have_posts() ) : the_post(); ?>                 

                        <div class="faq">
                            <p class="eyebrow">
                                <?php
                                    $terms = get_the_terms( $post->ID , 'faqs_category' );
                                    foreach ( $terms as $term ) { ?>
                                    <a href="/faq/faqs_category/<?php echo $term->slug; ?>/">
                                    <?php echo $term->name; ?></a><span class="comma">, </span>
                                <?php } ?>
                            </p>
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn primary">Learn More</a>
                            <div class="spacer-30"></div>
                        </div>
                        
                        <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                </div>

                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>

            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>