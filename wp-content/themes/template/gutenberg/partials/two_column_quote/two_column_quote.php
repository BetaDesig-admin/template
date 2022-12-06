<?php
// Block med reference/citat
$image = get_field('image');
$header = get_field('header');
$quote = get_field('quote');
$author = get_field('author');
$title = get_field('title');

$format = get_field('image_format');
$textOrder = '';
$order = get_field('order');
if ($order === 'image') {
    $textOrder = 'first';
}

if ($is_preview) {
    if ( ! $image['url'] ) {
        $image['url'] = 'https://via.placeholder.com/400x250?text=Upload/vælg+billede';
    }
    if ( ! $header ) {
        $header = 'Indtast lille overskrift';
    }
    if ( ! $quote ) {
        $quote = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent luctus nulla lacus, mattis aliquet nisi cursus eget. Phasellus eget velit tristique, dignissim leo ut, pharetra risus.';
    }
    if ( ! $author ) {
        $author = 'Author guy';
    }
    if ( ! $title ) {
        $title = 'Position';
    }
}

?>

<section class="quote">
    <div class="container">
        <?php if ($image) { ?>
            <div class="image <?= $textOrder ?> <?= $format ?>">
                <img src="<?=$image['url']?>" alt="">
            </div>
        <?php } ?>
        <div class="textContent">
            <h3 class="header"><?= $header ?></h3>
            <div class="content">
                <?= $quote ?>
            </div>
            <span class="person">
                <?= $author ?>
            </span>
            <span class="title">
                <?= $title ?>
            </span>
        </div>
    </div>
</section>
