<?php
/**
 * Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$is_small_preview = get_field("is_small_preview");


$order = get_field('order');
$image = get_field('image');
$text = get_field('text');
$textOrder = '';

if ($order === 'image') {
    $textOrder = 'first';
}


if ($is_preview) {
    if (!$image['url']) {
        $image['url'] = 'https://via.placeholder.com/500x500';
    }

    if (!$text) {
        $text = '<h2 style="text-align: center">Indtast tekst i dette felt.</h2>';
    }
}


?>

<section class="two_column <?= $order ?>">
    <div class="container">
        <div class="image <?= $textOrder ?>">
            <img src="<?= $image['url'] ?>" alt=""/>
        </div>
        <div class="textContent">
            <?= $text ?>
        </div>
    </div>
</section>