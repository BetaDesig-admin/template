<?php

function allow_blocks($blocks, $post)
{

    $blocks = [
        'acf/twocolumn',
        'acf/banner',
        'acf/text',
        'acf/ctacircle',
        'acf/instagram',
        'acf/reseller',
        'acf/slidertwocolumn',
        'acf/newsdisplay',
        'acf/formtwocolumn'

    ];

    return $blocks;
}


function register_blocks()
{
    if (!function_exists('acf_register_block'))
        return;

    acf_register_block([
        'name' => 'twocolumn',
        'title' => 'Tekst og billede',
        'render_template' => __DIR__ . '/partials/two_column/two_column.php',
        'category' => 'layout',
        'icon' => 'align-left',
        'mode' => 'preview',
    ]);
    acf_register_block([
        'name' => 'banner',
        'title' => 'Banner med Billede & farve',
        'render_template' => __DIR__ . '/partials/banner_image/banner_image.php',
        'category' => 'layout',
        'icon' => 'format-image',
        'mode' => 'preview',
    ]);
    acf_register_block([
        'name' => 'text',
        'title' => 'Tekst indhold',
        'render_template' => __DIR__ . '/partials/text_content/text_content.php',
        'category' => 'layout',
        'icon' => 'welcome-write-blog',
        'mode' => 'preview',
    ]);
    acf_register_block([
        'name' => 'ctacircle',
        'title' => 'Circler med ikon',
        'render_template' => __DIR__ . '/partials/cta_circles/cta_circles.php',
        'category' => 'layout',
        'icon' => 'art',
        'mode' => 'preview',
    ]);
    acf_register_block([
        'name' => 'instagram',
        'title' => 'Instagram feed',
        'render_template' => __DIR__ . '/partials/instagram/instagram.php',
        'category' => 'layout',
        'icon' => 'instagram',
        'mode' => 'preview',
    ]);
    acf_register_block([
        'name' => 'reseller',
        'title' => 'Forhandler af',
        'render_template' => __DIR__ . '/partials/reseller_slider/reseller_slider.php',
        'category' => 'layout',
        'icon' => 'universal-access',
        'mode' => 'preview',
        'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/reseller_slider/reseller_slider.js',
    ]);
    acf_register_block([
        'name' => 'slidertwocolumn',
        'title' => 'Tekst og slider',
        'render_template' => __DIR__ . '/partials/slider_two_column/slider_two_column.php',
        'category' => 'layout',
        'icon' => 'images-alt',
        'mode' => 'preview',
        'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/slider_two_column/slider_two_column.js',
    ]);
    acf_register_block([
        'name' => 'newsdisplay',
        'title' => 'Nyheder',
        'render_template' => __DIR__ . '/partials/news_display/news_display.php',
        'category' => 'layout',
        'icon' => 'feedback',
        'mode' => 'preview',
    ]);
    acf_register_block([
        'name' => 'formtwocolumn',
        'title' => 'Tekst og formular',
        'render_template' => __DIR__ . '/partials/form_two_column/form_two_column.php',
        'category' => 'layout',
        'icon' => 'email',
        'mode' => 'preview',
    ]);
}

add_action('acf/init', 'register_blocks');
add_filter('allowed_block_types', 'allow_blocks', 1, 2);