<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */


get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content dark">
        <div class="container">
            <div class="columns">
                <div class="column-full posts">
                    <?php while( have_posts() ) : the_post(); 
                        $categories = get_the_category( $post->ID ); 
                        $category = ! empty( $categories ) ? $categories[0] : null;
                    ?>
                        <article>
                            <a class="fill-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>

                            <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                            <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                                <div class="post-image" style="background-image:url('<?php echo $featImg[0]; ?>');"/></div>
                            <?php } elseif( !has_post_thumbnail() && $categories[0]->name != 'uncategorized') { 
                                $featImg = get_field('category_image', 'category_' . $categories[0]->term_id, $post->ID ); ?>
                                
                                <div class="post-image" style="background-image:url('<?php echo $featImg['url']; ?>');"/></div>
                            <?php } else { ?>
                                <div class="post-image" style="background-image:url('<?php the_field('blog_header_default_image','options'); ?>"/></div>
                            <?php } ?>
                                <div class="meta-content">
                                    <p class="eyebrow">
                                        <?php if ( $category ) : ?>
                                            <?php echo '<a href="/category/' . esc_attr( $category->slug ) . '/">' . esc_html( $category->name ) . '</a>'; ?>
                                        <?php endif; ?>
                                    </p>
                                    <h2><?php the_title(); ?></h2>
                                </div>
                            
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <?php the_posts_pagination([
                        'prev_text' => __(''),
                        'next_text' => __('')
                    ]); ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>