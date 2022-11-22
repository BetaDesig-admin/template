<?php

function allow_blocks($blocks, $post)
{
    $blocks = [
        'acf/twocolumn',
        'acf/twocolumnvideo',
        'acf/text',
        'acf/heading',
        'acf/headinglink',
        'acf/banner',
        'acf/bannertextmedia',
        'acf/slidertwocolumn',
        'acf/slides',
        'acf/sliderlogo',
        'acf/postslider',
        'acf/accordian',
        'acf/slideraccordion',
        'acf/tabbedcontent',
        'acf/contact',
        'acf/steps',
        'acf/quote',
        'acf/icons',
        'acf/media',
        'acf/employees',
        'acf/textcontact',
        'acf/twocolumtextlink',
        'acf/table',
        'acf/productcomparison',
        'acf/basicproductcomparison',
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
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'twocolumnvideo',
        'title' => 'Tekst og video',
        'render_template' => __DIR__ . '/partials/two_column_video/two_column_video.php',
        'category' => 'layout',
        'icon' => 'format-video',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'text',
        'title' => 'Tekst indhold',
        'render_template' => __DIR__ . '/partials/text_content/text_content.php',
        'category' => 'layout',
        'icon' => 'welcome-write-blog',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'heading',
        'title' => 'Overskrift/tekst',
        'render_template' => __DIR__ . '/partials/heading/heading.php',
        'category' => 'layout',
        'icon' => 'heading',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'headinglink',
        'title' => 'Sektion overskrift',
        'render_template' => __DIR__ . '/partials/heading_link/heading_link.php',
        'category' => 'layout',
        'icon' => 'welcome-write-blog',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'banner',
        'title' => 'Banner',
        'render_template' => __DIR__ . '/partials/banner/banner.php',
        'category' => 'layout',
        'icon' => 'cover-image',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'bannertextmedia',
        'title' => 'Banner med tekst og billede/video',
        'render_template' => __DIR__ . '/partials/banner_text_media/banner_text_media.php',
        'category' => 'layout',
        'icon' => 'format-image',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'slidertwocolumn',
        'title' => 'Tekst og slider',
        'render_template' => __DIR__ . '/partials/two_column_slider/two_column_slider.php',
        'category' => 'layout',
        'icon' => 'images-alt',
        'mode' => 'preview',
        'enqueue_script' => get_template_directory_uri() . '/gutenberg/partials/two_column_slider/two_column_slider.js',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'slides',
        'title' => 'Billede slider',
        'render_template' => __DIR__ . '/partials/slider_carousel/slider_carousel.php',
        'category' => 'layout',
        'icon' => 'format-gallery',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'sliderlogo',
        'title' => 'Logo slider',
        'render_template' => __DIR__ . '/partials/slider_logo/slider_logo.php',
        'category' => 'layout',
        'icon' => 'images-alt',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'postslider',
        'title' => 'Post slider',
        'render_template' => __DIR__ . '/partials/slider_posts/slider_posts.php',
        'category' => 'layout',
        'icon' => 'slides',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'accordion',
        'title' => 'FAQ/accordion',
        'render_template' => __DIR__ . '/partials/accordion/accordion.php',
        'category' => 'layout',
        'icon' => 'open-folder',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'slideraccordion',
        'title' => 'Slider med accordion',
        'render_template' => __DIR__ . '/partials/slider_accordion/slider_accordion.php',
        'category' => 'layout',
        'icon' => 'open-folder',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'tabbedcontent',
        'title' => 'Faner med indhold',
        'render_template' => __DIR__ . '/partials/tabbed_content/tabbed_content.php',
        'category' => 'layout',
        'icon' => 'admin-site-alt',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'contact',
        'title' => 'Kontaktinformation',
        'render_template' => __DIR__ . '/partials/contact/contact.php',
        'category' => 'layout',
        'icon' => 'email',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'steps',
        'title' => 'Punkter - step by step',
        'render_template' => __DIR__ . '/partials/step_by_step/step_by_step.php',
        'category' => 'layout',
        'icon' => 'editor-ol',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'quote',
        'title' => 'Udtalelse',
        'render_template' => __DIR__ . '/partials/two_column_quote/two_column_quote.php',
        'category' => 'layout',
        'icon' => 'format-quote',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'icons',
        'title' => 'Ikoner/billeder med tekst',
        'render_template' => __DIR__ . '/partials/image_with_explanation/image_with_explanation.php',
        'category' => 'layout',
        'icon' => 'grid-view',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'media',
        'title' => 'Billede og video',
        'render_template' => __DIR__ . '/partials/media/media.php',
        'category' => 'layout',
        'icon' => 'format-image',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'employees',
        'title' => 'Ansatte',
        'render_template' => __DIR__ . '/partials/employees/employees.php',
        'category' => 'layout',
        'icon' => 'groups',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'textcontact',
        'title' => 'Tekst med kontaktinfo',
        'render_template' => __DIR__ . '/partials/text_contact/text_contact.php',
        'category' => 'layout',
        'icon' => 'text-page',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'twocolumtextlink',
        'title' => 'Tekst og link',
        'render_template' => __DIR__ . '/partials/two_column_text_link/two_column_text_link.php',
        'category' => 'layout',
        'icon' => 'align-left',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'table',
        'title' => 'Tabel',
        'render_template' => __DIR__ . '/partials/table/table.php',
        'category' => 'layout',
        'icon' => 'grid-view',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'productcomparison',
        'title' => 'Produkt sammenligning',
        'render_template' => __DIR__ . '/partials/product_comparison/product_comparison.php',
        'category' => 'layout',
        'icon' => 'admin-multisite',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

    acf_register_block([
        'name' => 'basicproductcomparison',
        'title' => 'Basic produktsammenligning',
        'render_template' => __DIR__ . '/partials/basic_product_comparison/basic_product_comparison.php',
        'category' => 'layout',
        'icon' => 'admin-appearance',
        'mode' => 'preview',
        'example' => array(
            'attributes' => array(
                'mode' => 'preview',
            )
        )
    ]);

}

add_action('acf/init', 'register_blocks');
add_filter('allowed_block_types', 'allow_blocks', 1, 2);