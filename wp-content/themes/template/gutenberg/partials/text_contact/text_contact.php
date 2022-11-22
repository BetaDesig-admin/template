<?php
// Block med to kolonner med tekst og 'visitkort'

$text          = get_field( 'text' );
$header        = get_field( 'header' );
$download      = get_field( 'download_link' );
$contactHeader = get_field( 'contact_header' );
$contactName   = get_field( 'contact_name' );
$contactPhone  = get_field( 'contact_phone' );
$contactEmail  = get_field( 'contact_email' );

if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }
    if ( ! $text ) {
        $text = '<h2>Indtast overskrift/tekst og formater det</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }

    if (!$download['if_icon']) {
        $download['if_icon']     = 'show';
    }
    if (!$download['text']) {
        $download['text']     = 'Download fil';
    }

    if ( ! $contactHeader ) {
        $contactHeader = 'Lille blå overskrift';
    }
    if ( ! $contactName ) {
        $contactName = 'Kontaktperson navn';
    }
    if ( ! $contactPhone ) {
        $contactPhone = '+45 12 34 56 78';
    }
    if ( ! $contactEmail ) {
        $contactEmail = 'kontaktperson@email.dk';
    }
}

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