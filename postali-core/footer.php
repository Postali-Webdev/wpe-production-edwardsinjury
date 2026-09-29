<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

    <section class="footer">        
        <div class="columns row-1">
            <div class="column-25 block">
                <a href="/" class="custom-logo-link" rel="home" aria-current="page">
                    <?php $footer_logo = get_field('footer_logo', 'options'); if($footer_logo) {
                        echo wp_get_attachment_image($footer_logo['ID'], 'full', '', ['class' => 'custom-logo']);
                    } ?>
                </a>
            </div>
            <div class="column-75">
                <div class="footer-links-wrapper">
                    <?php 
                    $footer_menu_1 = get_field('footer_link_list_1', 'options');
                    $menu_object_1 = wp_get_nav_menu_object($footer_menu_1);
                    $footer_menu_2 = get_field('footer_link_list_2', 'options');
                    $menu_object_2 = wp_get_nav_menu_object($footer_menu_2);
                    ?>
                    <div class="outer-menu">
                        <p class="footer-menu-title"><?php echo $menu_object_1->name; ?></p>
                        <?php wp_nav_menu( array( 'menu' => $footer_menu_1 ) ); ?>
                    </div>
                    <div class="outer-menu">
                        <p class="footer-menu-title"><?php echo $menu_object_2->name; ?></p>
                        <?php wp_nav_menu( array( 'menu' => $footer_menu_2 ) ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns row-2">
            <div class="column-25 block">
                <a class="phone-icon white" href="tel:<?php the_field('phone_number','options'); ?>" title="Call Today"><?php the_field('phone_number','options'); ?></a>
                <?php $footer_button = get_field('footer_button', 'options');
                if( $footer_button ) : ?>
                    <a href="<?php echo $footer_button['url']; ?>" class="btn primary"><?php echo $footer_button['title']; ?></a>
                <?php endif; ?>
                <div class="footer-social">
                    <?php if(get_field('social_facebook','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_facebook','options'); ?>" title="Facebook" target="blank"><span class="icon-social-facebook"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_instagram','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_instagram','options'); ?>" title="Instagram" target="blank"><span class="icon-social-instagram"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_linkedin','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_linkedin','options'); ?>" title="LinkedIn" target="blank"><span class="icon-social-linkedin"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_twitter','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_twitter','options'); ?>" title="Twitter" target="blank"><span class="icon-social-twitter"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_youtube','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_youtube','options'); ?>" title="YouTube" target="blank"><span class="icon-social-youtube"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_tiktok','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_tiktok','options'); ?>" title="TikTok" target="blank"><span class="icon-tiktok"></span></a>
                    <?php } ?>
                </div>    
            </div>

            <div class="column-25">
                <div class="footer-address">
                    <a class="map-icon white" href="<?php the_field('driving_directions','options'); ?>" title="Driving directions" target="blank">
                        <?php the_field('address','options'); ?>
                    </a>
                    
                    <?php if( have_rows('office_hours', 'options') ) : ?>
                        <div class="office-hours-wrapper">
                            <p class="eyebrow">Office Hours</p>
                            <div class="hours-wrapper">
                                <?php while( have_rows('office_hours', 'options') ) : the_row(); ?>
                                <div class="date-time">
                                    <p><?php the_sub_field('days'); ?></p>
                                    <p><?php the_sub_field('hours'); ?></p>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="column-50 address-map">
                <?php if( get_field('map_embed','options') ) : ?>
                <div class="footer-map">
                    <iframe title="google map embed" src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="columns row-3">
            <div class="column-full block">
                <div class="footer-utility">
                    <div class="disclaimer">
                        <p class="small"><?php the_field('disclaimer_text','options'); ?></p>
                    </div>
                </div>
            </div>
            <div class="column-full">
                <div class="left-col"> 
                    <div class="utility">
                        <p>©<?php echo date('Y') . ' ' . get_bloginfo('name') . ' All Rights Reserved.'; ?></p>
                        <?php if ( have_rows('utility_links','options') ): ?>
                            <div class="link-wrapper">
                            <?php while ( have_rows('utility_links','options') ): the_row(); ?>  
                                <a href="<?php the_sub_field('utility_page_link'); ?>"><?php the_sub_field('utility_link_text'); ?></a>
                            <?php endwhile; ?>
                            </div>
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="right-col">
                    <a href="https://www.postali.com" target="_blank">
                        <?php echo wp_get_attachment_image('424', 'full', ''); ?>
                    </a>
                </div>
            </div>
        </div> 
    </section>
</footer>

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<script type="text/javascript" src="//cdn.callrail.com/companies/649302721/51525ff5fa672d4ff58f/12/swap.js"></script>

<?php wp_footer(); ?>

</body>
</html>


