<?php

function handle_allowed_blocks($allowed_blocks, $post)
{
    /**
     * This function will whitelist the blocks we want to use, and blacklist all other blocks from core wordpress
     *
     * You can use the $post param to make post-specific blocks
     *
     * Example when working with acf could be:
     * $allowed_blocks = ['acf/content'];
     *
     **/


    $allowed_blocks = [
        'acf/basictwocolumn',
        'acf/banner',
        'acf/text',
        'acf/ctacircle',
        'acf/instagram',
        'acf/reseller',
        'acf/slidertwocolumn',
        'acf/newsdisplay',
        'acf/formtwocolumn'

    ];

    return $allowed_blocks;
}


function theme_register_blocks()
{
    if (!function_exists('acf_register_block'))
        return;

    /**
     * Example of a registered block with ACF.
     * To learn more, please go to: https://www.advancedcustomfields.com/blog/acf-5-8-introducing-acf-blocks-for-gutenberg/
     *
     * Remember that acf_register_block[name] can only be letters, NO special characters of any kind, not even underscore!
     *
     * EXAMPLE:
     *
     * acf_register_block([
     * 'name'                => 'basictwocolumn',
     * 'title'                => 'Basic two column',
     * 'render_template'    => __DIR__.'/partials/basic_two_column/basic_two_column.php',
     * 'category'            => 'layout',
     * 'icon'                => 'welcome-write-blog',
     * 'mode'                => 'preview',
     * 'align'             => 'left',
     * 'keywords'            => ['skriv', 'blog'],
     * 'supports'          => [
     * 'align' => ['center']
     * ],
     * 'enqueue_assets'    => function(){
     * wp_enqueue_style( 'block-basic-two-column_style', get_template_directory_uri() . '/gutenberg/partials/basic_two_column/basic_two_column.less' );
     * wp_enqueue_script( 'block-basic-two-column_script', get_template_directory_uri() . '/gutenberg/partials/basic_two_column/basic_two_column.js', array('jquery'), '', true );
     * },
     * 'example'           => [
     * 'attributes' => [
     * 'mode' => 'preview',
     * 'data' => [
     * 'first_column'      => "<h2>#1 Column</h2><p>This is the content of the first column.</p>",
     * 'second_column'     => "<h2>#2 Column</h2><p>This is the content of the second column.</p>",
     * 'is_small_preview'  => true
     * ]
     * ]
     * ]
     * ]);
     *
     *
     **/


    acf_register_block([
        'name' => 'basictwocolumn',
        'title' => 'Tekst og billede',
        'render_template' => __DIR__ . '/partials/basic_two_column/basic_two_column.php',
        'category' => 'layout',
        'icon' => 'align-left',
        'mode' => 'preview',
        'align' => 'left',
        'keywords' => ['skriv', 'blog'],
        'supports' => [
            'align' => ['center']
        ],
        //'enqueue_style' => get_template_directory_uri() . '/gutenberg/partials/basic_two_column/basic_two_column.less',
        //'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/basic_two_column/basic_two_column.js',
        'example' => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'first_column' => "<h2>#1 Column</h2><p>This is the content of the first column.</p>",
                    'second_column' => "<h2>#2 Column</h2><p>This is the content of the second column.</p>",
                    'is_small_preview' => true
                ]
            ]
        ]
    ]);
    acf_register_block([
        'name' => 'banner',
        'title' => 'Banner med Billede & farve',
        'render_template' => __DIR__ . '/partials/banner_image/banner_image.php',
        'category' => 'layout',
        'icon' => 'format-image',
        'mode' => 'preview',
        'keywords' => ['billede', 'banner'],
        //'enqueue_style' => get_template_directory_uri() . '/gutenberg/partials/basic_two_column/banner.less',
    ]);
    acf_register_block([
        'name' => 'text',
        'title' => 'Tekst indhold',
        'render_template' => __DIR__ . '/partials/text_content/text_content.php',
        'category' => 'layout',
        'icon' => 'welcome-write-blog',
        'mode' => 'preview',
        'keywords' => ['tekst'],
        //'enqueue_style' => get_template_directory_uri() . '/gutenberg/partials/basic_two_column/banner.less',
    ]);
    acf_register_block([
        'name' => 'ctacircle',
        'title' => 'Circler med ikon',
        'render_template' => __DIR__ . '/partials/cta_circles/cta_circles.php',
        'category' => 'layout',
        'icon' => 'art',
        'mode' => 'preview',
        'keywords' => ['call to action'],
        //'enqueue_style' => get_template_directory_uri() . '/gutenberg/partials/basic_two_column/banner.less',
    ]);
    acf_register_block([
        'name' => 'instagram',
        'title' => 'Instagram feed',
        'render_template' => __DIR__ . '/partials/instagram/instagram.php',
        'category' => 'layout',
        'icon' => 'instagram',
        'mode' => 'preview',
        'keywords' => ['call to action'],
        //'enqueue_style' => get_template_directory_uri() . '/gutenberg/partials/basic_two_column/banner.less',
    ]);
    acf_register_block([
        'name' => 'reseller',
        'title' => 'Forhandler af',
        'render_template' => __DIR__ . '/partials/reseller_slider/reseller_slider.php',
        'category' => 'layout',
        'icon' => 'universal-access',
        'mode' => 'preview',
        'keywords' => ['call to action'],
        'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/reseller_slider/reseller_slider.js',
    ]);
    acf_register_block([
        'name' => 'slidertwocolumn',
        'title' => 'Tekst og slider',
        'render_template' => __DIR__ . '/partials/slider_two_column/slider_two_column.php',
        'category' => 'layout',
        'icon' => 'images-alt',
        'mode' => 'preview',
        'keywords' => ['call to action'],
        'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/slider_two_column/slider_two_column.js',
    ]);
    acf_register_block([
        'name' => 'newsdisplay',
        'title' => 'Nyheder',
        'render_template' => __DIR__ . '/partials/news_display/news_display.php',
        'category' => 'layout',
        'icon' => 'feedback',
        'mode' => 'preview',
        'keywords' => ['call to action'],
        //'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/news_display/news_display.js',
    ]);
    acf_register_block([
        'name' => 'formtwocolumn',
        'title' => 'Tekst og formular',
        'render_template' => __DIR__ . '/partials/form_two_column/form_two_column.php',
        'category' => 'layout',
        'icon' => 'email',
        'mode' => 'preview',
        'keywords' => ['call to action'],
        //'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/news_display/news_display.js',
    ]);
}

add_action('acf/init', 'theme_register_blocks');
add_filter('allowed_block_types', 'handle_allowed_blocks', 1, 2);