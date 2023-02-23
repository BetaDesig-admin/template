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
<?php
$logo = get_field('logo', 'options');
?>
<header>
    <div class="container">
        <section class="logo">
            <a href="<?php echo home_url(); ?>">
                <?php if ($logo) { ?>
                    <img src="<?= $logo['url'] ?>" alt="">
                <?php } else {
                    file_get_contents(get_template_directory() . "/images/logo.png");
                } ?>
            </a>
        </section>
        <label class="menuToggle" for="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <section class="menu">
            <?php wp_nav_menu(array(
                'menu' => 'Hovedmenu', // Do not fall back to first non-empty menu.
                'theme_location' => 'Hovedmenuen',
                'fallback_cb' => false // Do not fall back to wp_page_menu()
            )); ?>
        </section>
    </div>
</header>
</body>