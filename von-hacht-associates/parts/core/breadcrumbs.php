<?php
if ( function_exists( 'yoast_breadcrumb' ) ) :
    $post_types = array( 'testimonial', 'post' );
    if ( is_singular( $post_types ) ):
        $post_type = get_post_type();
        if ( $post_type == 'post' ) :
            $post_type   = get_the_title(get_option('page_for_posts') );;
            $parent_link = get_permalink( get_option('page_for_posts') );
            $post_title =  $post_type;
        else:
            $parent_link = home_url() . '/' . $post_type;
            // Get Plural
            $object = get_post_type_object( $post_type )->labels;
            $post_title = $object->name;
        endif; ?>
        <div class="breadcrumbs" id="breadcrumbs">
            <span typeof="v:Breadcrumb"><a href="<?php echo home_url(); ?>/" rel="v:url" property="v:title"><?php _e( 'Home', 'default' ); ?></a></span>
            <span typeof="v:Breadcrumb"><a class="breadcrumb__post-type" href="<?php echo $parent_link; ?>/" property="v:title"><?php echo $post_title; ?></a></span>
            <span typeof="v:Breadcrumb"><strong class="breadcrumb_last breadcrumb__title" property="v:title"><?php the_title(); ?></strong></span>
        </div>
    <?php
    else :
        yoast_breadcrumb( '<div id="st-breadcrumbs">', '</div>' );
    endif;
endif;
?>