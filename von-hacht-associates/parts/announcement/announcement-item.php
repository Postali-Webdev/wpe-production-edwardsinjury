<?php $video_mp4 =  get_field('video_file');
$iframe = get_field('video_link');
$image = get_field('video_image');

?>
<article class="faq announcement ">
    <?php if ($iframe || $video_mp4) :
        if($iframe) : ?>
            <div class="responsive-embed widescreen announcement__video ">
                <?php

                // Load value.

                // Use preg_match to find iframe src.
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];

                // Add extra parameters to src and replace HTML.
                $params = array(
                    'controls'  => 0,
                    'hd'        => 1,
                    'autohide'  => 1
                );
                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);

                // Add extra attributes to iframe HTML.
                $attributes = 'frameborder="0" class="link-video"';
                $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                // Display customized HTML.
                echo $iframe;
                ?>
                <div class="video__placeholder" id="play" <?php  bg($image) ?> >
                    <div class="video__play-img"><svg width="142" height="142" viewBox="0 0 142 142" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_104_21)">
                                <path d="M71 128.5C102.756 128.5 128.5 102.756 128.5 71C128.5 39.2436 102.756 13.5 71 13.5C39.2436 13.5 13.5 39.2436 13.5 71C13.5 102.756 39.2436 128.5 71 128.5Z" fill="white" fill-opacity="0.4"/>
                                <path d="M71 128C102.48 128 128 102.48 128 71C128 39.5198 102.48 14 71 14C39.5198 14 14 39.5198 14 71C14 102.48 39.5198 128 71 128Z" fill="white" fill-opacity="0.4"/>
                            </g>
                            <path d="M105 71.5008L50 101L50 42L105 71.5008Z" fill="#7EA794"/>
                            <defs>
                                <filter id="filter0_d_104_21" x="4.5" y="4.5" width="133" height="133" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset/>
                                    <feGaussianBlur stdDeviation="4.5"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.282 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_104_21"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_104_21" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="responsive-embed widescreen announcement__video">

                <video src="<?php echo $video_mp4['url']; ?>" height="300" width="560" controls class="file-play" ></video>

                <div class="video__placeholder file-video" <?php  bg($image) ?> >
                    <div class="video__play-img file-video-play" ><svg width="142" height="142" viewBox="0 0 142 142" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_104_21)">
                                <path d="M71 128.5C102.756 128.5 128.5 102.756 128.5 71C128.5 39.2436 102.756 13.5 71 13.5C39.2436 13.5 13.5 39.2436 13.5 71C13.5 102.756 39.2436 128.5 71 128.5Z" fill="white" fill-opacity="0.4"/>
                                <path d="M71 128C102.48 128 128 102.48 128 71C128 39.5198 102.48 14 71 14C39.5198 14 14 39.5198 14 71C14 102.48 39.5198 128 71 128Z" fill="white" fill-opacity="0.4"/>
                            </g>
                            <path d="M105 71.5008L50 101L50 42L105 71.5008Z" fill="#7EA794"/>
                            <defs>
                                <filter id="filter0_d_104_21" x="4.5" y="4.5" width="133" height="133" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset/>
                                    <feGaussianBlur stdDeviation="4.5"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.282 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_104_21"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_104_21" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <?php if (has_post_thumbnail()) :
        the_post_thumbnail('large', array('class' => 'faq__image ')); ?>
    <?php endif; ?>
    <?php endif; ?>
    <div class="faq__content announcement__content">
        <a href="<?php the_permalink(); ?>" class="faq__link"><h2 class="faq__title"><?php the_title(); ?></h2></a>
        <p class="announcement__date"><?php echo get_the_date('F j, Y'); ?></p>
        <?php
        //Delete post->ID If in post loop
        $content = get_extended(get_post_field('post_content'));
        if (!empty($content)): ?>
            <p><?php echo $content['extended'] ? $content['main'] : wp_trim_words(get_the_content(null, false), 55); ?></p>
        <?php endif; ?>
        <a class="faq__read-more" href="<?php the_permalink(); ?>"><?php _e('Read More') ?></a>
    </div>
</article>