<?php
// Block med tekst/overskrift og link

if ( ! $headerText ) {
    $headerText = get_field( 'header_text' ) ?: '<h2>Skriv overskrift i højre side</h2>';
}

if ( ! $link ) {
    $link = get_field( 'link' );
}

if ( $is_preview ) {
    if ( ! $link ) {
        $link = array(
            'url'   => '#',
            'title' => 'Indsæt link'
        );
    }
}

?>
<section class="headingLink">
    <div class="container">
        <div class="header">
            <div class="header__text">
				<?= $headerText ?>
            </div>
        </div>
		<?php if ( $link ) { ?>
            <div class="btn">
                <a class="sideBtn" href="<?= $link['url'] ?>">
					<?= $link['title'] ?>
					<?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?>
                </a>
            </div>
		<?php } ?>
    </div>
</section></section>