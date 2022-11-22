<?php

$iPod   = stripos( $_SERVER['HTTP_USER_AGENT'], "iPod" );
$iPhone = stripos( $_SERVER['HTTP_USER_AGENT'], "iPhone" );
$iPad   = stripos( $_SERVER['HTTP_USER_AGENT'], "iPad" );
$apple  = '';

if ( $iPod || $iPhone || $iPad ) {
	$apple = 'apple';
}

$is_small_preview = get_field( "is_small_preview" );


$order         = get_field( 'order' );
$image         = get_field( 'image' );
$text          = get_field( 'text' );
$textOrder     = '';
$header        = get_field( 'header' );
$textAlign     = get_field( 'text_align' );
$ifContactForm = get_field( 'contact_form' );
$width         = get_field( 'width' );
$contactHeader = get_field( 'contact_header' );
$form          = get_field( 'contact' );
$ifSideText    = get_field( 'side_text' );
$textPlacement = get_field( 'text_placement' );
$content       = get_field( 'different_content' );
$ifRotate      = get_field( 'img_rotate' );
$ifSmall       = get_field( 'img_small' );
$grayscale     = get_field( 'grayscale' );
$ifSpacing     = get_field( 'spacing' );

if ( $content === 'single' ) {
	$sideText = get_field( 'single_text' );
} else {
	$sideText = get_field( 'multiple_text' );
}

if ( $order === 'image' ) {
	$orientation = 'right';
} else {
	$orientation = 'left';
}

if ( $width === 'container' ) {
	$width = '';
}

if ( $order === 'image' ) {
	$textOrder = 'first';
}

if ( $is_preview ) {
    if ( ! $image ) {
        $image['url'] = 'https://via.placeholder.com/500?text=Upload/vælg+billede';
    }

    if ( ! $header ) {
        $header = 'Indtast lille overskrift';
    }

    if ( ! $text ) {
        $text = '<h2 style="text-align: left">Indtast tekst i dette felt.</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }
}

$sizes = [
	[
		'name'   => 'test-desktop',
		'size'   => 1250,
		'height' => 1080,
		'width'  => 1920,
	],
	[
		'name'   => 'tablet',
		'size'   => 960,
		'height' => 900,
		'width'  => 1200
	],
	[
		'name'   => 'xs-tablet',
		'size'   => 769,
		'height' => 1000,
		'width'  => 1000
	],

];
?>

<section class="two_column <?= $order . ' ' . $ifSpacing ?>">
    <div class="container <?= $width . ' ' . $orientation . ' ' . $ifSideText ?>">
        <div class="image <?= $textOrder . ' ' . $ifRotate . ' ' . $ifSmall ?>">
			<?php savants_images( $sizes, $image ); ?>

			<?php if ( $ifSideText === 'text' ) { ?>
                <div class="sideText <?= $textOrder . ' ' . $ifRotate . ' ' . $width ?>">
                    <div class="text <?= $textPlacement . ' ' . $apple . ' ' . $ifSmall ?>">
						<?php if ( $content === 'multiple' ) {
							foreach ( $sideText as $texts ) { ?>
                                <span><?= $texts['singles'] ?></span>
							<?php }
						} else { ?>
                            <span><?= $sideText ?></span>
                            <span><?= $sideText ?></span>
                            <span><?= $sideText ?></span>
						<?php } ?>
                    </div>
                </div>
			<?php } ?>
        </div>
        <div class="textContent <?= $textAlign ?>">
            <h3 class="header"><?= $header ?></h3>
			<?php if ( $ifContactForm === 'form' ) { ?>
                <div class="form" id="contact">
                    <h2><?= $contactHeader ?></h2>
					<?= $form ?>
                </div>
			<?php } else { ?>
                <div class="content">
					<?= $text ?>
                </div>
			<?php } ?>
        </div>
    </div>
</section>