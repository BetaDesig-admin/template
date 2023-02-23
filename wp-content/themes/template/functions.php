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

register_nav_menus(array('primary' => 'Hovedmenuen', 'footermenu' => 'footermenu'));
add_theme_support('post-thumbnails', array('post'));

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

function debug($array)
{
    ?>
    <div class="container">
        <pre><?php var_dump($array) ?></pre>
    </div>
    <?php
}

function custom_styles($init_array)
{
    $style_formats = array(
        array(
            'title' => 'Title-streg',
            'selector' => 'h1,h2,h3,h4,h5,h6',
            'classes' => 'sharedTitle',
        ),
        array(
            'title' => 'Blå Email',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,a,li,ul,span,ol',
            'classes' => 'icons blue email',
        ),
        array(
            'title' => 'Blå telefon',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,a,li,ul,span,ol',
            'classes' => 'icons blue phone',
        ),
        array(
            'title' => 'Blå person',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,a,li,ul,span,ol',
            'classes' => 'icons blue person',
        ),
        array(
            'title' => 'Email',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,a,li,ul,span,ol',
            'classes' => 'icons white email',
        ),
        array(
            'title' => 'Telefon',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,a,li,ul,span,ol',
            'classes' => 'icons white phone',
        ),
        array(
            'title' => 'Person',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,a,li,ul,span,ol',
            'classes' => 'icons white person',
        ),
        array(
            'title' => 'Knap',
            'selector' => 'a',
            'classes' => 'btn babyblue',
        ),
        array(
            'title' => 'Pænt link',
            'selector' => 'a',
            'classes' => 'link',
        )
    );

    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
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
    return 'https://www.youtube.com/embed/' . $youtube_id;
}


/**
 * @param string $layout
 * @param string $orderBy
 * @param string $amount
 * @param string $posttype
 * @param array $elements
 * */
function smartWpQuery($layout = 'standard', $posttype = 'posts', $orderBy = 'ID', $amount = '-1', $cat = '', $categories_ids = 29)
{
    $args = [
        'post_type' => $posttype,
        'orderby' => $orderBy,
        'post_status' => 'publish',
        'order' => 'DESC',
        'post_per_page' => $amount
    ];

    if ($layout === 'single') {
        if (!$elements) {
            $elements = get_field('elements');
        }
        $args['post__in'] = $elements;
        $args['posts_per_page'] = -1;
    }

    if ($layout === 'taxonomy') {
        if (!$categories_ids) {
            $categories_ids = get_field('categories');
        }
        $args['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => $cat,
                'field' => 'term_id',
                'terms' => $categories_ids
            ),
        );
    }

    return new WP_Query($args);
}

function generateMultipleImages($sizes, $image)
{
    $sized = [];

    /*Hent billede URL, ID og meta data*/
    $image_id = $image['ID'];
    $image = wp_get_attachment_url($image_id);;

    /* Giver Billede URL uden .jpg/.png bagefter */
    $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image);

    foreach ($sizes as $value) {
        $newName = $withoutExt . '_' . $value['size'];
        $imageMeta = wp_get_attachment_metadata($image_id);


        if (!isset($imageMeta['sizes'][$value['name']])) {
            add_image_size($value['name'], $value['width'], $value['height']);

            require_once(ABSPATH . 'wp-admin/includes/image.php');

            $file = get_attached_file($image_id);
            $new_meta = wp_generate_attachment_metadata($image_id, $file);
            $new_meta['sizes'] = array_merge($imageMeta['sizes'], $new_meta['sizes']);

            // Update the meta data
            wp_update_attachment_metadata($image_id, $new_meta);
            // Fetch the sized image
            $sized = wp_get_attachment_image_url($image_id, $newName);
            remove_image_size($newName);
        }
    }

    return $sized;
}

function savants_images($sizes, $image)
{
    $imageUrl = generateMultipleImages($sizes, $image);
    ?>
    <picture>
        <?php foreach ($sizes as $s) {
            $srcimg = wp_get_attachment_image_url($image['ID'], $s['name']);
            ?>
            <source media="(min-width:<?= $s['size'] ?>px)"
                    srcset="<?= $srcimg ?>">
        <?php } ?>
        <img src="<?= wp_get_attachment_image_url($image['ID']) ?>" alt="image Generated by Savants software">
    </picture>
    <?php
}