<?php
// Block med stort billede eller video

$layout = get_field( 'layout' );
$image  = get_field( 'image' );

if ( $is_preview ) {
    if ( ! $layout ) {
        $layout = 'image';
    }
    if ( ! $image ) {
        $image['url'] = 'https://via.placeholder.com/600x400?text=Upload/vælg+billede';
    }
}


if ( $layout === 'image' ) {
    ?>

    <section class="imageBlock">
        <div class="container">
            <img src="<?= $image['url']; ?>" alt="fuld bredte billede">
        </div>
    </section>
<?php } else if ( $layout === 'video' ) {
    $videoLayout = get_field( 'videolayout' );
    ?>

    <div class="container">
        <section class="video">
            <?php if ( $videoLayout === 'youtube' ) {
                $youtube = get_field( 'youtube' );
                ?>

                <iframe src="<?= getYoutubeEmbedUrl( $youtube ) ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

            <?php } else {
                $video = get_field( 'video' )
                ?>
                <video controls>
                    <source src="<?= $video['url'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php } ?>
        </section>
    </div>
<?php } ?>