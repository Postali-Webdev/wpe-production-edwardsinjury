<?php
/**
 * Reusable Pre-Footer CTA block.
 *
 * Pulls content from the per-page "Pre-Footer CTA" override fields when the
 * page has its override toggle on; otherwise falls back to the global defaults
 * defined on the CORE Site Setup options page.
 *
 * Drop into a template with:
 *   <?php get_template_part('block', 'cta'); ?>
 *
 * @package Postali Child
 * @author Postali LLC
 */

$cta_override = function_exists('get_field') ? get_field('override_cta') : false;

if ($cta_override) {
    $cta_eyebrow         = get_field('cta_eyebrow_override');
    $cta_headline        = get_field('cta_headline_override');
    $cta_copy            = get_field('cta_copy_override');
    $cta_phone_label     = get_field('cta_phone_label_override');
    $cta_form_shortcode  = get_field('cta_form_shortcode_override');
} else {
    $cta_eyebrow         = get_field('cta_eyebrow', 'options');
    $cta_headline        = get_field('cta_headline', 'options');
    $cta_copy            = get_field('cta_copy', 'options');
    $cta_phone_label     = get_field('cta_phone_label', 'options');
    $cta_form_shortcode  = get_field('cta_form_shortcode', 'options');
}

$cta_phone_number = get_field('phone_number', 'options');
?>
<section class="pre-footer-cta">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <?php if ($cta_eyebrow) : ?>
                    <p class="eyebrow"><?php echo esc_html($cta_eyebrow); ?></p>
                <?php endif; ?>
                <?php if ($cta_headline) : ?>
                    <h2 class="cta-headline"><?php echo esc_html($cta_headline); ?></h2>
                <?php endif; ?>
                <?php if ($cta_copy) : ?>
                    <div class="cta-copy"><?php echo wpautop(wp_kses_post($cta_copy)); ?></div>
                <?php endif; ?>
                <div class="spacer-15"></div>
                <?php if ($cta_phone_number) : ?>
                    <div class="main-contact">
                        <a href="tel:<?php echo esc_attr($cta_phone_number); ?>" class="btn primary-dark">
                            <?php if ($cta_phone_label) : ?>
                                <?php echo esc_html($cta_phone_label); ?>
                            <?php endif; ?>
                            <?php echo esc_html($cta_phone_number); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($cta_form_shortcode) : ?>
                <div class="column-50 block cta-form">
                    <?php echo do_shortcode($cta_form_shortcode); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
