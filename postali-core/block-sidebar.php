
<div class="sidebar-block block">
    <?php if(get_field('add_testimonial','options')) { ?>
        <div class="sidebar-inner-block sidebar-testimonial">
            <div class="stars"></div>
            <p class="testimonial"><?php the_field('sidebar_testimonial','options'); ?></p>
            <p class="author"><span class="icon-remove"></span><?php the_field('sidebar_testimonial_author','options'); ?></p>
        </div>
    <?php } ?>

    <?php if(get_field('add_result','options')) { ?>
        <div class="sidebar-inner-block sidebar-result">
            <p class="eyebrow sidebar-header">Case Result</p>
            <div class="result-block">

                <?php
                if( get_field('add_custom_case_result') ) {
                    $featured_post = get_field('custom_case_result');
                    if( $featured_post ) {
                        $headline = $featured_post->post_title;
                        $content = wp_trim_words($featured_post->post_content, 35);
                    }
                } else {
                    $headline = get_field('sidebar_result_headline','options');
                    $content = get_field('sidebar_result','options');
                } ?>
                

                <p class="large"><?php echo esc_html($headline); ?></p>
                <p class="result"><?php echo esc_html($content); ?></p>
            </div>
            <p class="sidebar-more"><a class="btn secondary-dark" href="/successes/" title="Read more results">Read More Results</a> <span class="icon-tick-down"></span></p>
        </div>
    <?php } ?>

    <?php if(get_field('add_practice_area_menu','options')) { ?>
        <div class="sidebar-inner-block sidebar-pa">
            <div class="sidebar-header">
                <p class="eyebrow">
                    <?php
                    if( get_field('sidebar_menu_title') )   {
                        the_field('sidebar_menu_title');
                    } else {
                        echo "Practice Areas";
                    }
                    ?>
                </p>
            </div>
            <div class="sidebar-menu">
                <?php
                    if( get_field('sidebar_practice_areas_menu_override') ) {
                        $primary_nav = get_field('sidebar_practice_areas_menu');
                        wp_nav_menu( array( 'menu' => $primary_nav ) ); 
                    } else { 
                        $children = wp_list_pages(
                            array(
                                'title_li'      => '',
                                'child_of'      => $post->ID,
                                'echo'          => '0',
                                'meta_key'      => 'page_title_h1',
                                'orderby'       => 'meta_value',
                                'order'         => 'DESC',
                                'exclude'       => $post->ID
                            )
                        );

                        if ( ! $children && $post->post_parent ) {
                            $children = wp_list_pages(
                                array(
                                    'title_li'      => '',
                                    'child_of'      => $post->post_parent,
                                    'echo'          => '0',
                                    'meta_key'      => 'page_title_h1',
                                    'orderby'       => 'meta_value',
                                    'order'         => 'DESC',
                                    'exclude'       => $post->ID
                                )
                            );
                        }


                        if ($children) { 
                            global $post;
                            $pageid = $post->post_parent; ?>
                                <ul class="menu" id="menu-practice-areas-menu">
                                    <?php echo $children; ?>
                                </ul>
                        <?php } else { ?>
                            <?php the_field('practice_area_menu','options'); ?>	                                        
                        <?php } 
                    } ?>
                    <p class="sidebar-more"><a href="/practice-areas/" title="Read more results">All Practice Areas</a></p>
                </div>  
        </div>
        
    <?php } ?>

</div>
