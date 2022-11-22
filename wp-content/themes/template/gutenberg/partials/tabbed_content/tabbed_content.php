<?php
// Block med tekst og billede, hvor indholdet er i forskellige tabs
// Brugt til kunderejse på cleecs-undersiden på Savants: savantsoftware.dk/cleecs

$header  = get_field( 'blue_header' );
$journey = get_field( 'journey' );

if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }

    if ( ! $journey ) {
        $journey = array(
            array(
                'name'  => 'Indtast emne',
                'text'  => '<h2>Indtast overskrift/tekst og formater det</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'video' => array(
                    'video_thumbnail' => array(
                        'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+til+video',
                    ),
                    'webm'            => array(
                        'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+til+video',
                    ),
                    'mp4'             => array(
                        'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+til+video',
                    ),
                ),
            ),
            array(
                'name'  => 'Indtast emne',
                'text'  => '<h2>Indtast overskrift/tekst og formater det</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'video' => array(
                    'video_thumbnail' => array(
                        'url' => 'https://via.placeholder.com/600x400?text=Upload/vælg+thumbnail+til+video',
                    ),
                ),
            ),
        );
    }
}
?>

<section class="journey">
    <div class="container">
        <div class="wrapper">
            <div class="swiper-pagination parts">
                <?php if ( $is_preview && $journey ) {
                    foreach ( $journey as $part ) {
                        ?>
                        <div class="subjectTitle swiper-pagination-bullet">
                            <h4><?= $part['name'] ?></h4></div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="swiper journeySlider">
                <div class="swiper-wrapper slides">
                    <?php
                    if ( $journey ) {
                        foreach ( $journey as $part ) { ?>
                            <div data-title="<?= $part['name'] ?>" class="swiper-slide">
                                <div class="content">
                                    <h3 class="header"><?= $header ?></h3>
                                    <div class="text">
                                        <?= $part['text'] ?>
                                    </div>
                                    <div class="journeyNav">
                                        <a href="#" class="previousStep">Forrige step</a>
                                        <a href="#" class="nextStep">Næste step</a>
                                    </div>
                                </div>
                                <div class="video">
                                    <video width="100%" autoplay loop muted playsinline
                                           poster="<?= $part['video']['video_thumbnail']['url'] ?>">
                                        <?php if ( $part['video']['webm']['url'] ) { ?>
                                            <source src="<?= $part['video']['webm']['url'] ?>" type="video/webm">
                                        <?php } ?>
                                        <?php if ( $part['video']['mp4']['url'] ) { ?>
                                            <source src="<?= $part['video']['mp4']['url'] ?>" type="video/mp4">
                                        <?php } ?>
                                    </video>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let journeyTitles = document.querySelectorAll('.journeySlider .swiper-slide');
    let parts = [];
    journeyTitles.forEach(function (element) {
        parts.push(element.dataset.title);
    });

    var swiper = new Swiper(".journeySlider", {
        slidesPerView: 1,
        allowTouchMove: false,
        loop: true,
        navigation: {
            nextEl: '.nextStep',
            prevEl: '.previousStep',
        },
        pagination: {
            el: ".swiper-pagination.parts",
            clickable: true,
            renderBullet: function (index, className) {
                return '<div class="subjectTitle ' + className + '">' + '<h4>' + parts[index] + '</h4>' + "</div>";
            },
        },
    });

</script>