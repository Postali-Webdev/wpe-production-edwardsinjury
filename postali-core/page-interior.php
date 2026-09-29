<?php
/**
 * Template Name: Interior
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="toc-fact-block">            
                        <div class="accordions toc">
                            <div class="accordions_title">
                                <p>On This Page</p>
                            </div>
                            <div class="accordions_content">
                                <div class="anchor-list"></div>
                            </div>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','cta'); ?>
    
</div>

<?php get_footer();?>