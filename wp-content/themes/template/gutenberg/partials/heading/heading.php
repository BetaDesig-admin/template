<?php
$kind        = get_field( 'kind' );
$ifDifferent = get_field( 'if_different_text' );
$ifHeading   = get_field( 'if_heading' );
$ifSpacing   = get_field( 'if_spacing' );


if ( $ifDifferent === 'same' ) {
	$heading = get_field( 'heading' );
} else {
	if ( $kind === 'fade' ) {
		$headingDifferent = get_field( 'heading_different_fade' );
	} else {
		$headingDifferent = get_field( 'heading_different_changing' );
	}
}

if ( $is_preview ) {
	if ( ! $heading ) {
		$heading = 'Indtast tekst';
	}
}

?>


<section class="heading <?= $kind . ' ' . $ifSpacing ?>">
    <div class="container">
		<?php if ( $kind === 'fade' ) { ?>
            <div class="fade">
				<?php if ( $ifDifferent === 'same' && $ifHeading === 'heading' ) { ?>
                    <h1><?= $heading ?></h1>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
				<?php } else if ( $ifDifferent === 'same' && $ifHeading === 'text' ) { ?>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
				<?php } else if ( $ifDifferent === 'different' ) { ?>
					<?php foreach ( $headingDifferent as $text ) { ?>
                        <span><?= $text['text'] ?></span>
					<?php }
				} ?>
            </div>
		<?php } ?>
		<?php if ( $kind === 'changing' ) { ?>
            <div class="changing">
				<?php if ( $ifDifferent === 'same' && $ifHeading === 'heading' ) { ?>
                    <span><?= $heading ?></span>
                    <h1><?= $heading ?></h1>
                    <span><?= $heading ?></span>
				<?php } else if ( $ifDifferent === 'same' && $ifHeading === 'text' ) { ?>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
                    <span><?= $heading ?></span>
				<?php } else if ( $ifDifferent === 'different' ) { ?>
					<?php foreach ( $headingDifferent as $text ) { ?>
                        <span><?= $text['text'] ?></span>
					<?php }
				} ?>
            </div>
		<?php } ?>
    </div>

</section>

