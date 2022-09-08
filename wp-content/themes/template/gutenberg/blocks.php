<?php

function allow_blocks($blocks, $post)
{

    $blocks = [
        'acf/twocolumn', 'acf/text', 'acf/banner', 'acf/logoslider', 'acf/slidertwocolumn', 'acf/topheader', 'acf/contactinfo', 'acf/accordian', 'acf/steps', 'acf/quote', 'acf/slides', 'acf/icons', 'acf/image'
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
        'name' => 'text',
        'title' => 'Tekst indhold',
        'render_template' => __DIR__ . '/partials/text_content/text_content.php',
        'category' => 'layout',
        'icon' => 'welcome-write-blog',
        'mode' => 'preview',
    ]);
	acf_register_block([
		'name' => 'logoslider',
		'title' => 'Slider',
		'render_template' => __DIR__ . '/partials/logo_slider/logo_slider.php',
		'category' => 'layout',
		'icon' => 'images-alt',
		'mode' => 'preview',
	]);
	acf_register_block([
		'name' => 'banner',
		'title' => 'Top Banner',
		'render_template' => __DIR__ . '/partials/banner/banner.php',
		'category' => 'layout',
		'icon' => 'format-image',
		'mode' => 'preview',
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
		'name' => 'topheader',
		'title' => 'Sektion overskrift',
		'render_template' => __DIR__ . '/partials/top_header/top_header.php',
		'category' => 'layout',
		'icon' => 'welcome-write-blog',
		'mode' => 'preview',
	]);
	acf_register_block([
		'name' => 'contactinfo',
		'title' => 'Kontakt information',
		'render_template' => __DIR__ . '/partials/contact_info/contact_info.php',
		'category' => 'layout',
		'icon' => 'email',
		'mode' => 'preview',
	]);
	acf_register_block( [
		'name'            => 'accordian',
		'title'           => 'FAQ',
		'render_template' => __DIR__ . '/partials/accordian/accordian.php',
		'category'        => 'layout',
		'icon'            => 'open-folder',
		'mode'            => 'preview',
	] );
	acf_register_block( [
		'name'            => 'steps',
		'title'           => 'Call to action - Punkter',
		'render_template' => __DIR__ . '/partials/steps/steps.php',
		'category'        => 'layout',
		'icon'            => 'editor-ol',
		'mode'            => 'preview',
	] );
	acf_register_block([
		'name' => 'quote',
		'title' => 'Udtalelse',
		'render_template' => __DIR__ . '/partials/quote/quote.php',
		'category' => 'layout',
		'icon' => 'bell',
		'mode' => 'preview',
	]);
	acf_register_block([
		'name' => 'slides',
		'title' => 'Billeder Slider',
		'render_template' => __DIR__ . '/partials/slider/slider.php',
		'category' => 'layout',
		'icon' => 'format-gallery',
		'mode' => 'preview',
	]);
	acf_register_block([
		'name' => 'icons',
		'title' => 'Ikoner',
		'render_template' => __DIR__ . '/partials/icons/icons.php',
		'category' => 'layout',
		'icon' => 'grid-view',
		'mode' => 'preview',
	]);
	acf_register_block([
		'name' => 'image',
		'title' => 'Billede',
		'render_template' => __DIR__ . '/partials/image/image.php',
		'category' => 'layout',
		'icon' => 'format-image',
		'mode' => 'preview',
	]);

}

add_action('acf/init', 'register_blocks');
add_filter('allowed_block_types', 'allow_blocks', 1, 2);