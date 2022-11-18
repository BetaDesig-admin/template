<?php
$is_small_preview = get_field( "is_small_preview" );

$header = get_field( 'header' );
$text   = get_field( 'text' );
$link   = get_field( 'link' );

if ( $is_preview ) {
	if ( ! $link ) {
		$link = '<p>Indtast link</p>';
	}

	if ( ! $text ) {
		$text = '<h2 style="text-align: center">Indtast tekst i dette felt.</h2>';
	}
}

?>

<section class="twoColumnTextLink">
    <div class="container">
        <div class="textContent">
            <h3 class="header"><?= $header ?></h3>
            <div class="content">
				<?= $text ?>
            </div>
        </div>
        <div class="link">
            <a href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"><?= $link['title'] ?></a>
        </div>
    </div>
</section>