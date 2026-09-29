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
                <div class="column-50 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php the_title(); ?></h1>
                    <p class="eyebrow">
                        <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?>
                    </p>
                    <div class="cards">
                        <div class="card">
                            <p class="title">Author</p>
                            <p><?php the_field('blog_author','options'); ?></p>
                        </div>
                        <div class="card">
                            <p class="title">Last Updated</p>
                            <p><?php echo get_the_modified_date('F j, Y'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="column-50 block">
                    <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                        <div class="post-image" style="background-image:url('<?php echo $featImg[0]; ?>');"/></div>
                    <?php } elseif( !has_post_thumbnail() && $cat[0]->name != 'uncategorized') { 
                        $featImg = get_field('category_image', 'category_' . $cat[0]->term_id, $post->ID ); ?>
                        
                        <div class="post-image" style="background-image:url('<?php echo $featImg['url']; ?>');"/></div>
                    <?php } else { ?>
                        <div class="post-image" style="background-image:url('<?php the_field('blog_header_default_image','options'); ?>"/></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-33 sidebar-block block">
                    <div class="social-wrapper">
                        <p class="eyebrow">Share</p>
                        <div class="socials">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                                <div class="icon"><span class="icon-facebook"></span></div>
                            </a> 
                            <a title="Click to share this post on Twitter" href="http://x.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                <div class="icon"><span class="icon-x"></span></div>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle/?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                                <div class="icon"><span class="icon-linkedin"></span></div>
                            </a> 
                        </div>
                    </div>
                </div>
                <div class="column-66 block">
                    <?php the_content(); ?>
                </div>
                
            </div>
        </div>
    </section>
        <?php get_template_part('block','cta'); ?>

</div>

<?php get_footer();?>