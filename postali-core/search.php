<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 block center">
                    <h1>Search Results</h1>
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label for="search-field" class="screen-reader-text">Search</label>
                        <input type="search" id="search-field" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search..." />
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-75 block center">
                    <?php if ( have_posts() ) : 
                        global $wp_query;
                        $total_results = $wp_query->found_posts; ?>
                        <p class="eyebrow">Showing <?php echo $total_results; ?> Results</p>
                        
                        <div class="results-container">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <a class="result" href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                    <?php
                                    // Define the characters to remove (search) and the replacement (replace)
                                    $search = array('https://', 'http://');
                                    $replace = ''; // Replace with an empty string to remove them
                                    $string = get_the_permalink();

                                    // Perform the replacement
                                    $new_string = str_replace($search, $replace, $string);
                                    ?>
                                    <p class="permalink"><?php echo $new_string; ?></p>
                                    <?php the_excerpt(); ?>
                                </a>
                            <?php endwhile; ?>
                    
                        </div>
                    <?php else : ?>
                        <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                    <?php endif; ?>
                </div>
                  <?php the_posts_pagination([
                        'prev_text' => __(''),
                        'next_text' => __('')
                    ]); ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
