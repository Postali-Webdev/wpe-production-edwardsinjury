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

    <section class="main-content">
        <div class="container skinny">
            <div class="columns">
                <div class="column-full block center">
                    <?php while( have_posts() ) : the_post(); ?>
                        <article>
                            <?php the_content(); ?>
                            <p class="author"><?php echo get_field('author'); ?></p>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php the_posts_pagination([
                        'prev_text' => __(''),
                        'next_text' => __('')
                    ]); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>