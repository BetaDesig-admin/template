<?php


$is_small_preview = get_field( "is_small_preview" );


$order       = get_field( 'order' );
$text        = get_field( 'text' );
$header      = get_field( 'header' );
$videoLayout = get_field( 'videolayout' );

if ( $order === 'video' ) {
    $orientation = 'right';
} else {
    $orientation = 'left';
}

if ( $order === 'video' ) {
    $textOrder = 'first';
}

if ( $is_preview ) {
    if (!$header) {
        $header = 'Indtast blå header';
    }

    if ( ! $videoLayout ) {
        $videoLayout = 'file';
    }

    if ( ! $text ) {
        $text = '<h2>Indtast tekst og formater det</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }
}

?>

<section class="twoColumnVideo <?= $order ?>">
    <div class="container <?= $orientation ?>">
        <div class="video <?= $textOrder ?>">
            <?php if ( $videoLayout === 'youtube' ) {
                $youtube = get_field( 'youtube' );
                ?>

                <iframe src="<?= getYoutubeEmbedUrl( $youtube ) ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

            <?php } else {
                $video = get_field( 'video' );
                if ( $is_preview ) {
                    $video = array(
                        'thumbnail' => array(
                            'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+og+videofilen',
                        ),
                        'webm'      => array(
                            'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+og+videofilen',
                        ),
                        'mp4'       => array(
                            'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+og+videofilen',
                        ),
                    );
                }

                if ( $video['thumbnail'] && $video['webm'] && $video['mp4'] ) {
                    ?>
                    <video controls poster="<?= $video['thumbnail']['url'] ?>">
                        <source src="<?= $video['webm']['url'] ?>" type="video/webm">
                        <source src="<?= $video ['mp4']['url'] ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php }
            } ?>
        </div>
        <div class="textContent">
            <h3 class="header"><?= $header ?></h3>
            <div class="content">
                <?= $text ?>
            </div>
        </div>
    </div>
</section>