<?php
$is_small_preview = get_field( "is_small_preview" );

$header = get_field( 'header' );
$text   = get_field( 'text' );
$link   = get_field( 'link' );

if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }

    if ( ! $text ) {
        $text = '<h2>Indtast overskrift og tekst og formater det</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }

    if ( ! $link ) {
        $link = array(
            'target' => '_self',
            'title'  => 'Link tekst',
            'url'    => '#',
        );
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