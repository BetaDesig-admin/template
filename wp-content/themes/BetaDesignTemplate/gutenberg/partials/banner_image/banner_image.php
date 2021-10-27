<?php
$text = get_field('text_content');
$image = get_field('image');
$color = get_field('color');

if ($is_preview) {
    if (!$image['url']) {
        $image['url'] = 'https://via.placeholder.com/1200x500';
    }
    if (!$text) {
        $text = '<h2 style="text-align: center">Indtast tekst i dette felt.</h2>';
    }
    if (!$color) {
        $color = 'primary';
    }
}

?>


<section class="banner <?= $color ?>">
    <div class="container">
        <div class="text ">
            <?= $text ?>
        </div>
        <div class="img">
            <img src="<?= $image['url'] ?>" alt="#">
        </div>
    </div>
</section>
