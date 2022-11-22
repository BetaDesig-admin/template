<?php
$header  = get_field( 'blue_header' );
$journey = get_field( 'journey' );
?>

<section class="journey">
    <div class="container">
        <div class="wrapper">
            <div class="swiper-pagination parts"></div>
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