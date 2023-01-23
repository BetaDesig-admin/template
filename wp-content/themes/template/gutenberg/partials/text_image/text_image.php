<?php
$text = get_field("text");
$image = get_field("image");
$order = get_field("order");
$orientation = '';

if ($order) {
    $orientation = 'imageFirst';
} else {
    $orientation = 'textFirst';
}
?>

<section class="textimage">
    <div class="container">
        <article class="<?= $orientation ?>">
            <?= $text; ?>
        </article>
        <div class="image <?= $orientation ?>">
            <?php if ($image) { ?>
                <img src="<?= $image["url"]; ?>" alt="">
            <?php } ?>

        </div>

    </div>
</section>