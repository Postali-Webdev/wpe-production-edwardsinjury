
<?php if (!empty(get_field('banner_background_image'))) { 
    $bg_image = get_field('banner_background_image');
} else { 
    $bg_image = get_field('default_background_image','options');
} ?>

<?php if(is_post_type_archive('testimonials')) { 
    $bg_image = get_field('reviews_banner_background_image','options');
} ?>

<?php $bg_clean = str_replace(' ', '', $bg_image); ?>

<?php if(is_post_type_archive('success')) { ?>
<section class="banner">
<?php } else { ?>
<section class="banner" style="background-image:url('<?php echo esc_html($bg_clean); ?>');">
<?php } ?>

    <div class="container">
    <?php if(is_single()) { ?>
        <p id="breadcrumbs"><span><span><a href="/">Home</a> <span class="separator"> / </span> <a href="/blog/">Blog</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
    <?php } elseif (is_home()) { ?>
        <p id="breadcrumbs"><span><span><a href="/">Home</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page">Blog</span></span></span></p>
    <?php } else { ?>
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    <?php } ?>
        <div class="columns">
            <?php if(is_post_type_archive('testimonials')) { ?> <!-- for testimonials -->
                <div class="column-50">
                    <h1><?php the_field('testimonials_header_banner_title','options'); ?></h1>
                    <div class="spacer-15"></div>
                    <p><?php the_field('testimonials_header_banner_subheadline','options'); ?></p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn primary">Call <?php the_field('phone_number','options'); ?></a>
                        </div>
                        <div class="contact-block-right">
                            <a class="btn secondary-dark" href="/contact/" title="Request a Consultation">Request a Consultation</a>
                        </div>
                    </div>
                </div>

                <?php if(get_field('featured_review_content','options')) { ?>
                <div class="column-50 featured">
                    <div class="stars"></div>
                    <p><?php the_field('featured_review_content','options'); ?></p>
                    <p class="reviewer"><?php the_field('featured_review_author','options'); ?></p>
                </div>
                <?php } ?>

            <?php } elseif(is_post_type_archive('success')) { ?> <!-- for results -->

                <div class="column-50">
                    <h1><?php the_field('results_header_banner_title','options'); ?></h1>
                    <div class="spacer-15"></div>
                    <p><?php the_field('results_header_banner_subheadline','options'); ?></p>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a class="btn primary" href="/contact/" title="Request a Consultation">Get a Free Consultation</a>
                        </div>
                        <div class="contact-block-right">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn secondary-dark">Call Today</a>
                        </div>
                    </div>
                </div>

                <?php if(get_field('featured_result_headline','options')) { ?>
                <div class="column-50 result">
                    <div class="result-main">
                        <p class="eyebrow"><?php the_field('featured_result_category', 'options'); ?></p>
                        <h3><?php the_field('featured_result_headline','options'); ?></h3>
                        <p><?php the_field('featured_result_content', 'options'); ?></p>
                    </div>
                </div>
                <?php } ?>

            <?php } else { ?> <!-- end results -->

            <div class="column-66 block<?php echo is_home() ? ' center' : ''; ?>">
                <?php if(is_single()) { ?>
                    <p class="blog-date"><strong><?php the_date(); ?></strong></p>
                <?php } ?>
                <?php if (is_404()) { ?>
                    <h1><?php the_field('404_header_banner_title','options'); ?></h1>
                <?php } elseif (is_home()) { ?>
                    <h1><?php the_field('blog_header_banner_title','options'); ?></h1>
                <?php } elseif (is_search()) { ?>
                    <h1 class="post-title"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
                <?php } elseif (is_page_template('page-practice-parent.php') || is_page_template('page-interior.php')) { ?>
                    <h1><?php the_field('page_title_h1'); ?></h1>
                <?php } elseif (is_page_template('page-landing.php')) { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } else { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>
                <?php if (is_page_template('page-practice-parent.php')) { ?>
                    <p><?php the_field('value_proposition'); ?></p>
                <?php } ?>
                <?php if (is_404()) { ?>
                    <p><?php the_field('404_header_banner_subheadline','options'); ?></p>
                <?php } elseif (is_home()) { ?>
                    <p><?php the_field('blog_header_banner_subheadline','options'); ?></p>   
                <?php } elseif (is_page_template('page-landing.php')) { ?>
                    <p><?php the_field('practice_areas_value_prop','options'); ?></p>                 
                <?php } else { ?>
                    <div class="spacer-15"></div>
                    <p><?php the_field('banner_value_proposition'); ?></p>
                <?php } ?>
                <?php if(is_single()) { ?>
                    <p class="cta">Written by <?php the_field('blog_author','options'); ?> </p>
                    <p>Category: <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></p>
                <?php } ?>
                <?php if(!is_single()) { ?>
                    <?php if( !is_page_template('page-practice-parent.php') ) { ?>
                        <!-- <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p> -->
                    <?php } ?>
                    
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a class="btn primary" href="/contact/" title="Request A Consultation">Get A Free Consultation</a>
                        </div>
                        <?php if (!is_page_template('page-contact.php')) { ?>
                        <div class="contact-block-right">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn secondary-dark">Call Today</a>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php if(get_field('include_gradient_overlay','options')) { ?>
        <div class="banner-gradient"></div>
    <?php } ?>
    <?php if(is_post_type_archive('testimonials')) { ?>
        <div class="mobile-bg">
            <?php 
            $bg_mobile = get_field('reviews_banner_background_image_mobile','options');
            if( !empty( $bg_mobile ) ): ?>
                <img src="<?php echo esc_url($bg_mobile['url']); ?>" alt="<?php echo esc_attr($bg_mobile['alt']); ?>" />
            <?php endif; ?>
        </div>
    <?php } ?>
</section>