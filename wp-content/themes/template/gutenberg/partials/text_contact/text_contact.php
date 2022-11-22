<?php

$text          = get_field( 'text' );
$header        = get_field( 'header' );
$download      = get_field( 'download_link' );
$contactHeader = get_field( 'contact_header' );
$contactName   = get_field( 'contact_name' );
$contactPhone  = get_field( 'contact_phone' );
$contactEmail  = get_field( 'contact_email' );

?>

<section class="textContactinfo">
    <div class="container">
        <div class="textContent">
            <h3 class="header"><?= $header ?></h3>
            <p></p><?= $text ?>
			<?php if ( $download ) { ?>
                <a class="download <?= $download['if_icon'] ?>" href="<?= $download['file']['url'] ?>" download>
					<?php if ( $download['if_icon'] === 'show' ) { ?> <?= file_get_contents( get_template_directory() . "/images/SVG/icon-feather-download.svg" ); ?><?php } ?>
                    <p><?= $download['text'] ?></p>
                </a>
			<?php } ?>
        </div>
        <div class="contact">
            <h5 class="header"><?= $contactHeader ?></h5>
            <h4 class="name"><?= $contactName ?></h4>
            <a class="phone" href="tel:<?= $contactPhone ?>"><?= $contactPhone ?></a>
            <a class="email" href="mailto:<?= $contactEmail ?>"><?= $contactEmail ?></a>
        </div>
    </div>
</section>