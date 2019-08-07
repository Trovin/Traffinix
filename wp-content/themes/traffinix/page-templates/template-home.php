<?php
/*
 * Template Name: Home template
*/
?>


<!-- get header -->
<?php get_header('home'); ?>

    <main>
        <!-- section intro -->
        <div id="traffinix" class="section-intro" style="background-image: url(<?php the_field('section_intro_background_image'); ?>)">
            <div class="container">
                <h1 class="section-headline section-headline_intro"><?php the_field('intro_main_headline'); ?></h1>
                <h2 class="section-intro__info"><?php the_field('intro_sub_headline'); ?></h2>

                <div class="section-intro__action">
                    <div class="section-intro__action-item">
                        <div class="section-intro__action-info"><?php the_field('intro_advertiser'); ?></div>
                        <a href="<?php the_field('intro_advertiser_btn_link'); ?>" target="_blank" class="btn btn_transparent"><?php the_field('intro_advertiser_btn_inner_text'); ?></a>
                    </div>

                    <div class="section-intro__action-item">
                        <div class="section-intro__action-info action-info__decorated"><?php the_field('intro_advertiser_info'); ?></div>
                        <a href="<?php the_field('intro_traffic_btn_link'); ?>" target="_blank" class="btn btn_transparent"><?php the_field('intro_traffic_btn_inner'); ?></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- section about -->
        <div class="section-about">
            <div class="container">
                <h2 class="section-headline"><?php the_field('about_headline'); ?></h2>
                <p class="sub-headline"><?php the_field('about_stack'); ?></p>
                <p class="section-about__info"><?php the_field('about_info'); ?></p>
            </div>
        </div>

        <!-- section media -->
        <div id="advertiser" class="section-media">
            <div class="container">
                <h2 class="section-headline section-headline_media"><?php the_field('media_headline'); ?></h2>
                <div class="content-wrapper">
                    <!-- media images repeater template -->
                    <?php if(get_field('media_images_repeater')): ?>
                        <?php while(has_sub_field('media_images_repeater')): ?>
                            <div class="content-item">
                                <div class="content-item__inner">
                                    <img src="<?php the_sub_field('new_media_image'); ?>" class="section-media__image" alt="<?php the_sub_field('new_media_image'); ?>">
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- section services -->
        <?php if( get_field('section_affiliates_background_color') == 'Default color' ): ?>
            <?php $current_color = '#fff'; ?>
        <?php else : ?>
            <?php $current_color = '#d9b7dd'; ?>
        <?php endif; ?>

        <div id="dna" class="section-services" style="background-image: url(<?php the_field('service_background_image'); ?>); background-color: <?php echo $current_color; ?>">
            <div class="container">
                <h2 class="section-headline section-headline_services"><?php the_field('services_headline'); ?></h2>

                <div class="services-flex">
                    <!-- service items repeater template -->
                    <?php if(get_field('service_items_repeater')): ?>
                        <?php while(has_sub_field('service_items_repeater')): ?>
                            <div class="services-item">
                                <div class="services-icon-wrapper">
                                    <div class="services-icon-flex">
                                        <img src="<?php the_sub_field('service_item_icon'); ?>" class="services-icon" alt="<?php the_sub_field('service_item_icon'); ?>">
                                    </div>
                                </div>
                                <p class="sub-headline"><?php the_sub_field('service_item_headline'); ?></p>
                                <div class="service-item__info"><?php the_sub_field('service_item_full_info'); ?></div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <a href="<?php the_field('service_btn_link'); ?>" target="_blank" class="btn btn_default"><?php the_field('service_btn_inner_text'); ?></a>
            </div>
        </div>

        <!-- section affiliates  -->
        <div id="affiliate" class="section-affiliates" style="background-color: <?php echo $current_color; ?>">
            <div class="container">
                <h2 class="section-headline section-headline_services"><?php the_field('affiliates_headline'); ?></h2>

                <div class="affiliates-wrapper">
                    <div class="affiliates-wrapper__item">
                        <!-- affiliates info repeater template -->
                        <?php if(get_field('affiliates_list')): ?>
                            <?php while(has_sub_field('affiliates_list')): ?>
                                <p class="affiliates-item__text">
                                    <span class="affiliates-item__icon"><i class="fas fa-check"></i></i></span>
                                    <?php the_sub_field('affiliates_item_text'); ?>
                                </p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="affiliates-wrapper__item">
                        <p class="sub-headline"><?php the_field('affiliates_info_headline'); ?></p>
                        <div class="affiliates-info__text"><?php the_field('affiliates_info_text'); ?></div>

                        <div class="affiliates-advertising">
                            <div class="affiliates-advertising__item">
                                <?php if(get_field('affiliates_advertising')): ?>
                                    <? $i = 0; ?>
                                    <?php while(has_sub_field('affiliates_advertising')): ?>
                                        <? $i++; ?>
                                        <?php if($i <= 5): ?>
                                        <p class="affiliates-advertising__info">
                                            <img src="<?php the_sub_field('affiliates_advertising_icon'); ?>" class="affiliates-advertising__icon" alt="<?php the_sub_field('affiliates_advertising_icon'); ?>">
                                            <?php the_sub_field('affiliates_advertising_keyword'); ?>
                                        </p>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>

                            <div class="affiliates-advertising__item">
                                <?php if(get_field('affiliates_advertising')): ?>
                                    <? $q = 0; ?>
                                    <?php while(has_sub_field('affiliates_advertising')): ?>
                                        <? $q++; ?>
                                        <?php if($q >= 6): ?>
                                            <p class="affiliates-advertising__info">
                                                <img src="<?php the_sub_field('affiliates_advertising_icon'); ?>" class="affiliates-advertising__icon" alt="<?php the_sub_field('affiliates_advertising_icon'); ?>">
                                                <?php the_sub_field('affiliates_advertising_keyword'); ?>
                                            </p>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="<?php the_field('affiliates_btn_link'); ?>" target="_blank" class="btn btn_default"><?php the_field('affiliates_btn_inner_text'); ?></a>
            </div>
        </div>

        <!-- section careers -->
        <div id="careers" class="section-careers" style="background-image: url(<?php the_field('carrers_background_image'); ?>)">
            <div class="container">
                <h2 class="section-headline section-headline_careers"><?php the_field('carrers_headline'); ?></h2>
                <p class="careers-info"><?php the_field('carrers_info'); ?></p>

                <h4 class="careers-position__headline"><?php the_field('carrers_position_headline'); ?></h4>
                <div class="content-wrapper">
                    <!-- carrers repeater template -->
                    <?php if(get_field('carrers_repeater')): ?>
                        <?php while(has_sub_field('carrers_repeater')): ?>
                            <div class="content-item content-item_careers">
                                <div class="content-item__inner">
                                    <p class="sub-headline sub-headline_careers"><?php the_sub_field('carrers_repeater_item'); ?></p>
                                    <?php the_sub_field('new_careers_position_contact'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- section events -->
        <div class="section-events">
            <div class="container">
                <h2 class="section-headline"><?php the_field('events_headline'); ?></h2>
                <div class="events-info"><?php the_field('events_info'); ?></div>
            </div>
        </div>

        <!-- section news -->
        <div id="blog" class="section-news">
            <div class="container">
                <h2 class="section-headline"><?php the_field('news_headline'); ?></h2>

                <div class="content-wrapper content-wrapper__news">
                    <?php
                    $args = array(
                        'posts_per_page' => 2,
                    );
                    $news_query = new WP_Query( $args);
                    while( $news_query->have_posts() ) : $news_query->the_post(); ?>
                        <a href="<?php echo get_permalink(); ?>" class="news-wrapper">
                            <?php $image = get_the_post_thumbnail(); ?>
                            <?php if($image != null) : ?>
                                <?php the_post_thumbnail('post-image'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri() . '/src/assets/images/empty-image.png';?>" alt="post-image">
                            <?php endif; ?>

                            <span class="news-wrapper__item">
                                <span class="news-wrapper__headline"><?php the_title(); ?></span>
                                <span class="news-content">
                                    <?php
                                        $content = get_the_content();
                                        echo content_excerpt( array('maxchar'=>107, 'text'=>$content) );
                                    ?>
                                </span>
                                <span class="link">Read more</span>
                            </span>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </main>


<!-- get footer -->
<?php get_footer(); ?>
