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
	if ( ! $video['mp4']['url'] ) {
		$video['mp4']['url'] = 'https://via.placeholder.com/500x500';
	}

	if ( ! $text ) {
		$text = '<h2 style="text-align: center">Indtast tekst i dette felt.</h2>';
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