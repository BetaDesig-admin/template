<?php
$text = get_field('text');

$order = get_field('order');
$orientation = '';

$media = get_field('media');


if ($order) {
    $orientation = 'imageFirst';
} else {
    $orientation = 'textFirst';
}

//tjek om det er video fil før vi forsøger at hente video og samme med billede
?>


<section class="textimage">
    <div class="container <?= $orientation ?>">
        <article class="<?= $orientation ?>">
            <?= $text; ?>
        </article>
        <div class="image <?= $orientation ?>">
            <?php
            if ($media == 'image') {
                $image = get_field('image');
                if ($image) { ?>
                    <img src="<?= $image['url'] ?>" alt="">
                <?php }
            } else {
                $file_type = get_field('file_type');
                if ($file_type == 'url') {
                    $video_url = get_field('video_url');
                    ?>
                    <iframe
                            src="<?= getYoutubeEmbedUrl($video_url) ?>">
                    </iframe>
                    <?php

                } else {
                    $video_file = get_field('video_file');
                    ?>
                    <video controls>
                        <source src="<?= $video_file['url'] ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> <?php

                }
            }
            ?>
        </div>
    </div>
</section>
