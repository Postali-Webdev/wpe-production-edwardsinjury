<?php
/**
 * Template Name: FAQs
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
                    
                    <div class="category-dropdown">
                        <?php

                        $categories = get_terms( array(
                            'taxonomy' => 'faqs_category',
                            'hide_empty' => true,
                        ) );

                        $select = "<select name='cat' id='cat' class='postform category-form'>";
                        if ($text = get_field('category_placeholder')) :
                        $select.= '<option  value="" disabled selected>'. $text .'</option>';
                        endif;
                        if ($text = get_field('category_all')) :
                            $select.= '<option  value="-1">'. $text .'</option>';
                        endif;
                        foreach($categories as $category){
                            /*if($category->count > 0){*/
                            $select.= "<option value='".$category->slug."'>".$category->name."</option>";
                            /*}*/
                        }

                        $select.= "</select>";

                        echo $select;
                        ?>
                    </div>
                                                        
                    <div class="cell">

                        <!-- testimonial post loop -->
                        <?php

                        // arguments, adjust as needed
                        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $args = array(
                            'post_type' => 'faq',
                            'post_status'    => 'publish',

                            'paged'          => $paged,
                        );

                        $id = get_the_ID();


                        global $faq_query;
                        $faq_query = new wp_query( $args );

                        if ($faq_query -> have_posts()) :  ?>
                            <div class="faqs-list faqs-list-js" >
                                <?php 	while ( $faq_query -> have_posts() ) :  $faq_query -> the_post();
                                    get_template_part( 'parts/faqs/faq-item');
                                endwhile; ?>
                                <?php
                                $paginateArgs = array(
                                    'base'      => '%#%',
                                    'format'    => '%#%',
                                    'current'   => $paged,
                                    'prev_next' => false,
                                    'total'     => $faq_query->max_num_pages
                                ); ?>
                                <div class="cn-pagination">
                                    <?php echo str_replace(array('http:', '//'), array('', '') ,paginate_links( $paginateArgs )); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>




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