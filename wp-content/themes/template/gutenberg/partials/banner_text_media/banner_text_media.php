<?php
$text           = get_field( 'text' );
$media          = get_field( 'media' );
$ifHeading      = get_field( 'if_heading' );
$imagePlacement = get_field( 'image_placement' );
$ifSmaller      = get_field( 'if_small' );
$kind           = get_field( 'kind' );

if ( ! $text ) {
	$text = get_field( 'text' ) ?: '<span>Udfyld tekst</span>';
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
		<?php if ( $media === 'image' ) {
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
                        <lottie-player
                                src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/lottie/arrow-lottie-json.json"
                                background="transparent" speed="1" style="height: 100px; width: 35px;" loop
                                autoplay></lottie-player>
                    </span>
        </div>
    </div>
</section>