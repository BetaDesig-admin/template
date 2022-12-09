<?php
// Banner med tekst og billede eller video
// Mulighed for at vælge mellem 2 slags tekster (fade eller changing) og om det skal indeholde en H1 eller ej
// Mulighed for at uploade billede eller video, hvor der skal uploades thumbnail, webm og mp4 af videoen

$text           = get_field( 'text' );
$media          = get_field( 'media' );
$ifHeading      = get_field( 'if_heading' );
$imagePlacement = get_field( 'image_placement' );
$ifSmaller      = get_field( 'if_small' );
$kind           = get_field( 'kind' );

if ( $is_preview ) {

    if ( ! $kind ) {
        $kind = 'changing';
    }

    if ( ! $ifHeading ) {
        $ifHeading = 'text';
    }
    if ( ! $text ) {
        $text = get_field( 'text' ) ?: '<span>Udfyld tekst</span>';
    }

}


?>

<section class="textBanner">
    <div class="container">
        <div class="text <?= $kind ?>">
            <?php if ( $ifHeading === 'text' ) { ?>
                <span><?= $text ?></span>
                <span><?= $text ?></span>
                <span><?= $text ?></span>
                <?php if ( $kind === 'fade' ) { ?>
                    <span><?= $text ?></span>
                <?php } ?>
            <?php } ?>
            <?php if ( $ifHeading === 'heading' ) { ?>
                <span><?= $text ?></span>
                <h1><?= $text ?></h1>
                <span><?= $text ?></span>
                <?php if ( $kind === 'fade' ) { ?>
                    <span><?= $text ?></span>
                <?php }
            } ?>
        </div>
        <?php if ( $media === 'image' && $image) {
            $image = get_field( 'image' );
            ?>
            <div class="image <?= $imagePlacement ?>">
                <img class="<?= $ifSmaller ?>" src="<?= $image['url'] ?>" alt="">
            </div>
        <?php } else if ( $media === 'video' ) {
            $webm = get_field( 'webm' );
            $mp4  = get_field( 'mp4' );
            ?>
            <div class="video">

                <?php if ( $webm['url'] || $mp4['url'] ) { ?>
                    <video width="100%" height="100%" autoplay playsinline loop muted>
                        <source src="<?= $webm['url'] ?>" type="video/webm">
                        <source src="<?= $mp4['url'] ?>" type="video/mp4">
                    </video>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="scroll">
            <span id="scrollTo" onclick="ScrollToNextSection(event);">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
    <path
            d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/>
</svg>
                    </span>
        </div>
    </div>
</section>