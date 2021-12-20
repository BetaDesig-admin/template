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


$background = get_field('backgroundColor');
$backgroundType = get_field('backgroundColorType');
$backgroundPlacement = get_field('imageBgColorPlacement');
$order = get_field('order');
$image = get_field('image');
$text = get_field('text');
$iconActive = get_field('iconOverImage');

$textOrder = '';
$backgroundActive = '';
$isActive = '';
$icon = '';

if ($order === 'image') {
    $textOrder = 'first';
}

if ($background) {
    $backgroundActive = 'backgroundColor';
}

if ($iconActive) {
    $isActive = 'icon';
    $icon = get_field('icon');
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

<section class="two_column <?= $background . ' ' . $backgroundActive . ' ' . $order . ' ' . $backgroundType . ' ' . $backgroundPlacement ?>">
    <div class="container">
        <div class="image <?= $textOrder . ' ' . $isActive . ' ' . $icon ?>">
            <img src="<?= $image['url'] ?>" alt=""/>
        </div>
        <div class="textContent">
            <?= $text ?>
        </div>
    </div>
</section>