<?php
/**
 * Template Name: error404
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66 block">
                    <h1>Our apologies, but this page seems to be missing.</h1>
                    <p>This might be because you typed the address wrong, or the page you’re looking for may have been moved or deleted.</p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a class="btn primary" href="/contact/" title="Request A Consultation">Contact Us</a>
                        </div>
                        <div class="contact-block-right">
                            <a href="/" class="btn primary-dark">Homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>