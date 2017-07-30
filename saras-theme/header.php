<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>
        <link rel="icon" href="../../favicon.ico">
        <?php wp_head(); ?>
    </head>
    <body <?php echo body_class(); ?>> <!-- adds class to body tag -->
        <header>
            <nav>
                <!-- theme custom logo/site title -->
                <div class="brand">
                    <a class="logo" href="<?php bloginfo('url'); ?>"><?php ap_custom_logo(); ?></a>
                </div>
                <!-- display main menu -->
            	<?php
                    wp_nav_menu( array(
                      'theme_location'  => 'main-menu',
                      'menu_class' => 'menu',
                      'fallback_cb' => 'false',
            		  'link_before' => '<span>',
            		  'link_after' => '</span>',
                    ) );
                ?>  
            </nav>
        </header>
       