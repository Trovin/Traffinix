<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php get_template_part( 'template-parts/head' ); ?>
</head>

<body <?php body_class("page-body"); ?>>
    <div class="wrapper">
        <div class="content">

            <header class="header header-page">
                <div class="container container_flex">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php the_field('logo_image', 'option'); ?>" class="logo-image" alt="logo-image">
                    </a>

                    <div class="main-nav__container">
                        <div class="main-nav__flex">
                            <nav class="main-nav" role="navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'main-nav__list', 'container' => false ) ); ?>

                                <div class="main-actions">
                                    <a href="<?php the_field('button_login_link', 'option') ?>" target="_blank" class="btn btn_small header__btn_small"><?php the_field('button_login_inner_text', 'option') ?></a>
                                    <a href="<?php the_field('button_register_link', 'option') ?>" target="_blank" class="btn btn_small header__btn_small"><?php the_field('button_register_inner_text', 'option') ?></a>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="menu-action">
                        <span class="menu-action__item"></span>
                        <span class="menu-action__item"></span>
                        <span class="menu-action__item"></span>
                    </div>
                </div>
            </header>
