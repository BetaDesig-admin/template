<?php

function allow_blocks($blocks, $post)
{

    $blocks = [
        'acf/twocolumn', 'acf/text',
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
}

add_action('acf/init', 'register_blocks');
add_filter('allowed_block_types', 'allow_blocks', 1, 2);