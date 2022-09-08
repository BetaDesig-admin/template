<?php
$image = get_field('image');
$quote = get_field('quote');
$author = get_field('author');

$format = get_field('image_format');
$textOrder = '';
$order = get_field('order');
if ($order === 'image') {
    $textOrder = 'first';
}

if ($is_preview) {
    if (!$image['url']) {
        $image['url'] = 'https://via.placeholder.com/500x500';
    }
    if (!$quote) {
        $quote = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent luctus nulla lacus, mattis aliquet nisi cursus eget. Phasellus eget velit tristique, dignissim leo ut, pharetra risus. Integer augue massa,';
    }
    if(!$author) {
        $author = 'Author guy';
    }
}

?>

<section class="qoute">
    <div class="container">
        <?php if ($image) { ?>
            <div class="image <?= $textOrder ?> <?= $format ?>">
                <img src="<?=$image['url']?>" alt="">
            </div>
        <?php } ?>
        <div class="textContent">
            <div class="content">
                <?= $quote ?>
            </div>
            <span class="person">
                <?= $author ?>
            </span>
        </div>
    </div>
</section>
