<?php
$title = get_field('heading');
$btn = get_field('btn');
$images = get_field('images');


if ($is_preview) {

    if (!$title) {
        $title = '<h2>Test indhold</h2>';
    }
    if (!$icons) {
        $icons = array(
            array(
                'icon' => 'time',
                'text' => '<p>test tekst skift venglist</p>'
            ),
            array(
                'icon' => 'temp',
                'text' => '<p>test tekst skift venglist</p>'
            ),
            array(
                'icon' => 'share',
                'text' => '<p>test tekst skift venglist</p>'
            ),
            array(
                'icon' => 'pencil',
                'text' => '<p>test tekst skift venglist</p>'
            ),
            array(
                'icon' => 'hat',
                'text' => '<p>test tekst skift venglist</p>'
            ),
            array(
                'icon' => 'assembly',
                'text' => '<p>test tekst skift venglist</p>'
            ),
        );
    }
}

?>

<section class="icons">
    <div class="container">
        <div class="header">
            <div class="title">
                <?= $title ?>
            </div>
            <?php if ($btn) { ?>
                <a href="<?= $btn['url'] ?>" class="btn"><?= $btn['title'] ?: 'See more' ?></a>
            <?php } ?>
        </div>
        <div class="body">
            <?php
            if ($images):
                foreach ($images as $image) { ?>
                    <div class="single">
                        <div class="image">
                            <img src="<?= $image['image']['url']; ?>" alt="">
                        </div>
                        <div class="text"><?= $image['text']; ?></div>
                    </div>
                <?php }
            endif;
            ?>
        </div>
    </div>
</section>
