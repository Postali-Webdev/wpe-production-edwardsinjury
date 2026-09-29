<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">


<?php
if (!empty(get_field('banner_background_image'))) {
    $bg_image = get_field('banner_background_image');
} else {
    $bg_image = get_field('default_background_image','options');
}

$mobile_bg_image = get_field('banner_mobile_background_image');
?>




<section class="banner">
    <div class="container">
        <div class="columns hp-banner-top">
            <div class="column-50">
                <h1><?php the_title(); ?></h1>
                <p class="banner-headline">
                    <?php the_field('banner_headline'); ?>
                </p>
                <p class="banner-cta"><?php the_field('banner_cta_copy'); ?></p>
                <?php 
                $link = get_field('banner_cta_btn_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <div class="column-50">
                <div class="attorney-headshot">
                    <?php 
                    $image = get_field('banner_foreground_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="touts">
                <div class="col1">
                    <p><?php the_field('banner_tout_1_copy'); ?></p>
                </div>
                <?php 
                $link = get_field('banner_tout_2_link');
                if( $link ): ?>
                    <a class="col2" href="<?php echo esc_url( $link ); ?>"><p><?php the_field('banner_tout_2_copy'); ?></p></a>
                <?php endif; ?>
                <div class="col3">
                    <?php 
                    $image = get_field('banner_tout_3_bg');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="video-background">
        <video autoplay loop muted playsinline>
            <?php
            $video_webm = get_field('banner_background_webm');
            if( $video_webm ): ?>
                <source src="<?php echo $video_webm['url']; ?>" type="video/webm">
            <?php endif; ?>
            <?php
            $video_mp4 = get_field('banner_background_mp4');
            if( $video_mp4 ): ?>
                <source src="<?php echo $video_mp4['url']; ?>" type="video/mp4">
            <?php endif; ?>
            
            Your browser does not support the video tag.
        </video>
    </div>
</section>

<section class="hp-p5"> <!-- relocated to top of page -->
    <div class="container">
        <div class="columns">
            <div class="column-full centered center">
                <p class="eyebrow"><?php the_field('hp_p5_headline'); ?></p>
            </div>
            <?php if( have_rows('hp_p5_logos') ): ?>
            <div class="media-logos">
            <?php while( have_rows('hp_p5_logos') ): the_row(); ?>
            <?php 
                $image = get_sub_field('logo');
                if( !empty( $image ) ): ?>
                <div class="logo">
                    <a href="<?php the_sub_field('link'); ?>" class="link" target="_blank"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="hp-p1">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2><?php the_field('hp_p1_headline'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('hp_p1_copy'); ?>
                <?php 
                $link = get_field('hp_p1_btn');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-p2">
    <div class="container">
        <div class="hp-results-prev"><span class="icon-arrow_back"></span></div>
        <div class="hp-results-next"><span class="icon-arrow_forward"></span></div>
        <div class="columns hp-results">
        <?php if( have_rows('hp_p2_results') ): ?>
        <?php while( have_rows('hp_p2_results') ): the_row(); ?>
            <?php $post_object = get_sub_field('result'); ?>
            <?php if( $post_object ): ?>
                <?php // override $post
                $post = $post_object;
                setup_postdata( $post );
                ?>
                <a class="result" href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <span class="read-more">Read More Results <span class="icon-arrow_forward"></span></span>
                </a>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<section class="hp-p3">
    <div class="container">
        <?php if(get_field('hp_p3_image_video') == 'img') { ?>
        <?php 
            $image = get_field('hp_p3_background_image');
        ?>
        <div class="columns" style="background:url('<?php echo esc_url($image['url']); ?>')">
        <?php } else { ?>
        <div class="columns">
        <?php } ?>
            <div class="cta-block">
                <div class="cta-copy">
                    <p><?php the_field('hp_p3_headline'); ?></p>
                </div>
                <div class="cta-button">
                <?php 
                $link = get_field('hp_p3_btn');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hp-p4">
    <div class="container">
        <div class="columns">
            <div class="column-66 center">
                <div class="stars"></div>
                <?php
                $featured_post = get_field('testimonial');
                if( $featured_post ): ?>
                    <p class="headingm"><?php echo esc_html( $featured_post->post_title ); ?></p>
                    <p class="headings"><?php echo esc_html( $featured_post->post_content ); ?></p>
                    <p class="author"><?php echo esc_html( get_field( 'author', $featured_post->ID ) ); ?></p>
                    <a href="/testimonials/" class="btn primary">Client Testimonials</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-p6 reversed">
    <div class="container">
        <div class="columns">
            <div class="column-50 left">
                <h2><?php the_field('hp_p6_headline'); ?></h2>
            </div>
            <div class="column-50">
                <?php the_field('hp_p6_copy'); ?>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns">
            <?php if( have_rows('hp_p6_cards') ): ?>
            <?php $n=1; ?>
            <div class="cards">
            <?php while( have_rows('hp_p6_cards') ): the_row(); ?>
                <div class="card">
                    <?php 
                    $icon = get_sub_field('card_icon');
                    if( !empty( $icon ) ): ?>
                    <div class="icon">
                        <p class="large"><?php echo $n; ?>.</p>
                    </div>
                    <?php endif; ?>
                    <p><?php the_sub_field('card_title'); ?></p>
                    <p><?php the_sub_field('card_copy'); ?></p>
                    <div class="arrow">➞</div>
                </div>
                
                <?php $n++ ;?>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="columns bottom">
            <div class="spacer-60"></div>
            <div class="column-full centered">
                <?php the_field('hp_p6_copy_bottom'); ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-p7 reversed">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center block">
                <h3><?php the_field('hp_p7_headline'); ?></h3>
            </div>

            <div class="column-full">
                <?php if( have_rows('hp_p7_touts') ): ?>
                <div class="p7-touts">
                <?php while( have_rows('hp_p7_touts') ): the_row(); ?>
                    <div class="tout">
                        <?php the_sub_field('copy'); ?>
                    </div>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php 
                $link = get_field('hp_p7_cta_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="spacer-15"></div>
                    <a class="btn primary-dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="p7-bg">
        <?php 
        $image = get_field('hp_p7_bg_img');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
</section>

<section class="hp-p8">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2><?php the_field('hp_p8_headline'); ?></h2>
            </div>
            <div class="column-66">
                <?php the_field('hp_p8_copy'); ?>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns hp-pa">
            <?php if( have_rows('practice_areas') ): ?>
            <?php while( have_rows('practice_areas') ): the_row(); ?>
                <a class="pa-card" href="<?php the_sub_field('link'); ?>">
                    <div class="pa-img">
                        <?php 
                        $img = get_sub_field('image');
                        if( !empty( $img ) ): ?>
                            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="pa-content">
                        <h3><?php the_sub_field('practice_area'); ?></h3>
                        <p><?php the_sub_field('practice_area_copy'); ?></p>
                    </div>
                    <p class="link">Read More</p>
                </a>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="hp-p9">
    <div class="container">
        <div class="columns">
            <div class="column-50 copy">
                <h2><?php the_field('hp_p9_headline'); ?></h2>
                <?php the_field('hp_p9_copy'); ?>
                <?php 
                    $link = get_field('hp_p9_cta_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="spacer-15"></div>
                        <a class="btn primary-dark" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
            </div>
            <div class="column-50 img">
            <?php 
            $award = get_field('hp_p9_award');
            if( !empty( $award ) ): ?>
                <div class="award">
                    <img src="<?php echo esc_url($award['url']); ?>" alt="<?php echo esc_attr($award['alt']); ?>" />
                </div>
            <?php endif; ?>
            <?php 
            $img = get_field('hp_p9_image');
            if( !empty( $img ) ): ?>
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-p10">
    <div class="container">
        <div class="columns">
            <div class="column-50 copy">
                <h2><?php the_field('hp_p10_headline'); ?></h2>
                <?php the_field('hp_p10_copy'); ?>
                <?php 
                    $link = get_field('hp_p10_cta_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="spacer-15"></div>
                        <a class="btn primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
            </div>
            <div class="column-50 img">
                <?php 
                if( get_field('hp_p10_background') == 'img' ) { ?>
                    <?php 
                    $img = get_field('hp_p10_static_image');
                    if( !empty( $img ) ): ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                    <?php endif; ?>
                <?php } else { ?>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('hp_p10_video_embed'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="hp-p11 reversed">
    <div class="container">
        <div class="columns">
            <div class="column-50 centered center">
                <h2><?php the_field('hp_p11_headline'); ?></h2>
            </div>
            <div class="column-66 centered center">
                <p><?php the_field('hp_p11_copy'); ?></p>
            </div>
            <div class="spacer-30"></div>
            <div class="column-full hp-touts">
                <?php if( have_rows('hp_p11_touts') ): ?>
                <?php while( have_rows('hp_p11_touts') ): the_row(); ?>
                    <div class="tout-card" href="<?php the_field('link'); ?>">
                        <div class="tout-content">
                            <p><?php the_sub_field('tout'); ?></p>
                        </div>
                        <div class="tout-img">
                            <?php 
                            $img = get_sub_field('image');
                            if( !empty( $img ) ): ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="spacer-60"></div>
            <div class="column-66 centered center">
                <p><strong><?php the_field('hp_p11_copy_bottom'); ?></strong></p>
            </div>
        </div>
    </div>
</section>

<section class="hp-p12">
    <div class="container skinny">
        <div class="p12-content-grid">
            <div class="left">
                <h2><?php the_field('hp_p12_headline'); ?></h2>
                <?php the_field('hp_p12_copy'); ?>
                <?php $n=1; ?>
                <?php if( have_rows('hp_p12_steps') ): ?>
                    <div class="steps-grid">
                    <?php while( have_rows('hp_p12_steps') ): the_row(); ?>
                        <div class="step">
                            <div class="number">
                                0<?php echo $n; ?>
                            </div>
                            <div class="copy">
                                <p>
                                    <strong><?php the_sub_field('headline'); ?></strong><br>
                                    <?php the_sub_field('copy'); ?>
                                </p>
                            </div>
                        </div>
                    <?php $n++; ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="right">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DdKR7tHSjuT/"> </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            </div>
        </div>
    </div>
</section>

<section class="hp-p13">
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center">
                <p class="eyebrow"><?php the_field('hp_13_eyebrow'); ?></p>
                <h2><?php the_field('hp_13_headline'); ?></h2>
            </div>
            <div class="spacer-30"></div>
            <div class="column-66 center">
                <?php if( have_rows('hp_13_faqs') ): ?>
                <?php while( have_rows('hp_13_faqs') ): the_row(); ?>
                    <p>
                        <strong><?php the_sub_field('headline'); ?></strong><br>
                        <?php the_sub_field('copy'); ?>
                    </p>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php 
$img = get_field('hp_14_background_image');
if( !empty( $img ) ) { ?>
<section class="hp-p14 reversed" style="background:url('<?php echo esc_url($img['url']); ?>')">
<?php } else { ?>
<section class="hp-p14 reversed">
<?php } ?>
    <div class="container">
        <div class="columns">
            <div class="column-66 centered center">
                <h2><?php the_field('hp_14_headline'); ?></h2>
                <p><?php the_field('hp_14_copy'); ?></p>
                <div class="spacer-30"></div>
                <div class="cta-btns">
                <?php 
                $link = get_field('banner_cta_btn_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                    <a class="btn primary-dark phone" href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('block','cta'); ?>

</div><!-- #front-page -->

<?php get_footer();?>