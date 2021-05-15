<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <!-- Includes title tag and scripts -->
        <?php wp_head(); ?>
    </head>
        <body <?php body_class(); ?>>
        <div class="" id="page">
            <?php if( is_active_sidebar( 'header-sidebar' ) ): ?>
                <?php dynamic_sidebar( 'header-sidebar' ); ?>
            <?php endif; ?>

        <a href="content" class="skip-link screen-reader-text">
            <?php esc_html_e("Skip to content", 'wphierarchy'); ?>
        </a>

        <header id="masthead" class="site-header" role="banner">

        <div class="site-branding">
            <p class="site-title">
                <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    Name: <?php bloginfo( 'name' ); ?>
                </a>
            </p>
            <p class="site-description" >
                Description: <?php bloginfo( 'description' ); ?>
            </p>
            <p> <a href="<?php bloginfo( 'url' ) ?>">Home link</a>

            </p>
        </div>

        <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                $args = [
                    'theme_location' => 'main-menu'
                    //Throw in here whatever is in main-menu set up
                ];

                wp_nav_menu( $args );
                ?>
        </nav>

        </header>

        <div class="site-content" id="content">
            Site content
