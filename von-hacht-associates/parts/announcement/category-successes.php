<?php
$first_column = get_field('first_column', get_the_ID());
$second_column = get_field('second_column', get_the_ID());
$first_column_amount = get_field('first_column_amount', get_the_ID());
$second_column_amount = get_field('second_column_amount', get_the_ID());


?>
<article class="faq announcement ">
    <?php
    $category = get_the_terms($post->ID, 'success_categories');
    $current_cat_slug = $category[0]->slug;
    $cat_image_class = $current_cat_slug == 'successes' ? 'successes-image' : false;
    ?>

    <?php if ($first_column) : ?>
        <div class="animate-wrapper">
            <div class="animate-inner">
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
                <span class="line line-4"></span>
                <span class="line line-5"></span>
                <span class="line line-6"></span>
                <div class="first-col" data-height="<?php echo $first_column; ?>">
                    <p class="first-col__title"><?php _e('ORIGINAL OFFER'); ?></p>
                    <p class="first-col__amount">$<?php echo $first_column_amount; ?></p>
                </div>
                <div class="second-col" data-height="<?php echo $second_column; ?>">
                    <p class="second-col__title"><?php echo _e('FINAL OFFER'); ?></p>
                    <p class="second-col__amount">$<?php echo $second_column_amount; ?></p>

                </div>
            </div>
        </div>
    <?php else : ?>
        <?php if (has_post_thumbnail()) :
            the_post_thumbnail('large', array('class' => 'faq__image ' . $cat_image_class)); ?>
        <?php endif; ?>
    <?php endif; ?>
    <div class="faq__content announcement__content <?php echo $current_cat_slug == 'successes' ? 'order-1' : ''  ?>">
        <a href="<?php the_permalink(); ?>" class="faq__link"><h2 class="faq__title"><?php the_title(); ?></h2></a>
<!--        <p class="announcement__date">--><?php //echo get_the_date('F j, Y'); ?><!--</p>-->
        <?php
        //Delete post->ID If in post loop
        $content = get_extended(get_post_field('post_content'));
        if (!empty($content)): ?>
            <p><?php echo $content['extended'] ? $content['main'] : wp_trim_words(get_the_content(null, false), 55); ?></p>
        <?php endif; ?>
        <a class="faq__read-more" href="<?php the_permalink(); ?>"><?php _e('Read More') ?></a>
    </div>
</article>


