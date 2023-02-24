<?php

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

?>

<section class="two_column <?= $order ?>">
    <div class="container <?= $width . ' ' . $orientation ?>">
        <div class="image <?= $textOrder ?>">
            <img src="<?= $image['url'] ?>" alt="">
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