<?php
// Show php errors
if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Contains the register blocks for gutenberg ACF
require_once(__DIR__ . "/gutenberg/register_blocks.php");

// Contains cleanup in <head>
require_once(__DIR__ . "/php/head_cleanup.php");

// Enqueue styles and scripts
require_once(__DIR__ . "/php/enqueue_scripts.php");

// Setup admin panel with reorder menu, edit menu and adding template
require_once(__DIR__ . "/php/admin_setup.php");


// Register menu and sidebar
register_nav_menus(array('primary' => 'Hovedmenuen'));

// Add theme supports
add_theme_support('align-wide');
add_theme_support('post-thumbnails', array('post'));

// Registrer menu and sidebar
add_theme_support('automatic-feed-links');

// optionspage
if (function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
        'page_title' => 'Basis information',
        'menu_title' => 'Basis information',
        'parent_slug' => 'themes.php',
    ));
}

function fb_mce_editor_buttons($buttons)
{

    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('mce_buttons_2', 'fb_mce_editor_buttons');


function custom_styles($init_array)
{
    $style_formats = array(

        array(
            'title' => 'Tekst decoration - squiggly - Dark blue',
            'selector' => 'h1,h2,h3,h4,h5,h6',
            'classes' => 'squiggly primary-dark',
        )
    );

    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;
}

add_filter('tiny_mce_before_init', 'custom_styles');


function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'edit.php?post_type=page', // Custom type one
        'edit.php', // Custom type two
        'edit.php?post_type=product', // Custom type three
        'admin.php?page=wc-admin', // Custom type four
        'separator1', // First separator
        'upload.php', // Media
        'themes.php', // Appearance
        'separator2', // Second separator

        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}

add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');