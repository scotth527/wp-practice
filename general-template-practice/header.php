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

        <header id="masthead" class="site-header" role="banner">

            <div class="site-branding">
                <h1>
                    <a href="<?php bloginfo( 'url' ) ?>">
                        Title: <?php bloginfo( 'name' ) ?>
                    </a>
                </h1>
                <p>Description: <?php bloginfo( 'description' ) ?></p>
            </div>

            <nav id="site-navigation" class="main-navigation" role="navigation">

            </nav>

        </header>

        <div class="site-content" id="content">
            Site content
