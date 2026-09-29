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
                    
                    <?php $term_posts = get_posts( // find posts with the correct term
                        array(
                            'no_found_rows' => true, // for performance
                            'ignore_sticky_posts' => true, // for performance
                            'post_type' => 'faqs',
                            'posts_per_page' => 10, // return all results
                            'fields' =>  'ids', // return the post IDs only
                        )
                    );


                    ?>

                    <div class="faqs-group">
                    <?php
                    foreach($term_posts as $term_post_id) { // loop through posts
                        $post_title = get_the_title($term_post_id); 
                        $post_excerpt = get_the_excerpt($term_post_id); 
                        $post_link = get_the_permalink($term_post_id);
                    ?>
                        <div class="faq">
                            <p class="eyebrow">
                                <?php
                                    $terms = get_the_terms( $post->ID , 'faqs_category' );
                                    foreach ( $terms as $term ) { ?>
                                    <a href="/faq/faqs_category/<?php echo $term->slug; ?>/">
                                    <?php echo $term->name; ?></a><span class="comma">, </span>
                                <?php } ?>
                            </p>
                            <h2><?php echo $post_title; ?></h2>
                            <p><?php echo $post_excerpt; ?></p>
                            <a href="<?php echo $post_link; ?>" class="btn primary">Learn More</a>
                            <div class="spacer-30"></div>
                        </div>
                        
                    <?php } ?>
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