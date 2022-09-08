<?php
// Show php errors
if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once(__DIR__ . "/gutenberg/blocks.php");
require_once(__DIR__ . "/php/enqueue.php");
require_once(__DIR__ . "/php/admin.php");

register_nav_menus(array('primary' => 'Hovedmenuen'));
add_theme_support('post-thumbnails', array('post'));

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
    );

    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);    return $init_array;
}

add_filter('tiny_mce_before_init', 'custom_styles');

function getYoutubeEmbedUrl($url)
{
	$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

	if (preg_match($longUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}

	if (preg_match($shortUrlRegex, $url, $matches)) {
		$youtube_id = $matches[count($matches) - 1];
	}
	return 'https://www.youtube.com/embed/' . $youtube_id ;
}