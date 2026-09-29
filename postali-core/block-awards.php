<?php if( have_rows('awards','options') ): ?>
    <section class="awards">
        <div class="columns">
            <div id="awards" class="slide">
                <?php $n=1 ?>                
                <?php while( have_rows('awards','options') ): the_row(); 
                    $link = get_sub_field('link'); ?>  
                    <div class="column-20" id="award_<?php echo $n; ?>">
                    <?php 
                    $image = get_sub_field('award_image');
                    if( !empty( $image ) ): ?>
                        <?php if($link) : ?>
                            <a target="_blank" href="<?php echo $link['url']; ?>" class="award-link" title="<?php echo $link['title']; ?>">
                        <?php endif; ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php if($link) : ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                    <?php $n++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?> 