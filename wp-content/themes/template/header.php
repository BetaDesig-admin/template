<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>
        <?php
        if (!is_home()):
            wp_title('|', true, 'right');
        endif;
        bloginfo('name');
        ?>
    </title>
    <?php wp_head(); ?>




    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/favicon.png"/>
</head>
<body>
<input type="checkbox" name="menuToggle" id="menuToggle"/>
<header>
    <div class="container">
        <section class="logo">
            <a href="<?php echo home_url(); ?>">
                <?php /*todo Skift til rigtige logo */ ?>
                <?= file_get_contents(get_template_directory() . "/images/svg/logo/logo_simple.svg"); ?>
            </a>
        </section>
        <label for="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <section class="menu">
            <?php wp_nav_menu(array(
                'menu' => 'Hovedemenu', // Do not fall back to first non-empty menu.
                'theme_location' => 'Hovedmenuen',
                'fallback_cb' => false // Do not fall back to wp_page_menu()
            )); ?>
        </section>
    </div>
</header>
</body>