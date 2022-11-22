<?php
//Block med billeder og tilhørende tekst

$header = get_field( 'header' );
$text   = get_field( 'heading' );
$images = get_field( 'images' );


if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }
    if ( ! $text ) {
        $text = '<h2>Indtast overskrift</h2>';
    }
    if ( ! $images ) {
        $images = array(
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'text'  => '<h5>Indtast tekst og formater det</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'
            ),
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'text'  => '<h5>Indtast tekst og formater det</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'
            ),
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'text'  => '<h5>Indtast tekst og formater det</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'
            ),
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'text'  => '<h5>Indtast tekst og formater det</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>'
            ),
        );
    }
}

?>

<section class="icons">
    <div class="container">
        <div class="topText">
            <h3 class="header"><?= $header ?></h3>
            <?= $text ?>
        </div>
        <div class="images">
            <?php
            if ( $images ):
                foreach ( $images as $image ) { ?>
                    <div class="single">
                        <div class="image">
                            <img src="<?= $image['image']['url']; ?>" alt="">
                        </div>
                        <div class="text"><?= $image['text']; ?></div>
                    </div>
                <?php }
            endif;
            ?>
        </div>
    </div>
</section>
