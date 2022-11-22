<?php
// Tabel med sammenligning af produkter (brugt til sammenligning af webhotelpakker på savantsoftware.dk/services/hosting-webhotel
// MED kolonne i venstre side til featurenavne, hvor der er mulighed for at tilføje tooltips

$features      = get_field( 'features', 'options' );
$starter       = get_field( 'starter', 'options' );
$pro           = get_field( 'pro', 'options' );
$premium       = get_field( 'premium', 'options' );
$extraFeatures = get_field( 'extra_features', 'options' );

$hotels = [ $starter, $pro, $premium ];

?>
<section class="webhotels">
    <div class="container toEdge left text">
        <div class="content">
            <div class="table">
                <div class="column features">
                    <div class="header row title">
                        <h3>Webhotel pakker</h3>
                    </div>
                    <div class="unlimited row">
						<?php foreach ( $features['unlimited_features'] as $feature ) { ?>
                            <div class="featureName">
                                <p><?= $feature['feature'] ?></p>
								<?php if ( $feature['if_tooltip'] && $feature['feature_tooltip'] ) {
									?>
                                    <span class="tooltipIcon"><?= file_get_contents( get_template_directory() . "/images/SVG/tooltip.svg" ); ?><?= $feature['feature_tooltip'] ?></span>
								<?php } ?>
                            </div>
						<?php } ?>
                    </div>
					<?php foreach ( $features['features'] as $feature ) { ?>
                        <div class="row">
                            <div class="featureName">
                                <p><?= $feature['feature'] ?></p>
								<?php if ( $feature['if_tooltip'] && $feature['feature_tooltip'] ) {
									?>
                                    <span class="tooltipIcon"><?= file_get_contents( get_template_directory() . "/images/SVG/tooltip.svg" ); ?><?= $feature['feature_tooltip'] ?></span>
								<?php } ?>
                            </div>
                        </div>
						<?php
					} ?>
                </div>
                <div class="swiper webhotelSlider">
                    <div class="swiper-wrapper slides">
						<?php foreach ( $hotels as $hotel ) { ?>
                            <div data-title="<?= $hotel['title'] ?>" class="column swiper-slide">
                                <div class="header row">
                                    <div>
                                        <h5><?= $hotel['title'] ?></h5>
                                        <p class="price"><?= $hotel['price'] ?></p>
                                    </div>
                                    <div class="navigation">
                                        <p class="prevWebhotel"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></p>
                                        <p class="nextWebhotel"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></p>
                                    </div>
                                </div>
                                <div class="unlimited row">
                                    <p class="text">Ubegrænset</p>
                                    <p class="infinity">∞</p>
                                </div>
								<?php foreach ( $hotel['feature'] as $feature ) { ?>
                                    <div class="row">
                                        <div class="column">
											<?php if ( $feature['if_text'] === 'text' ) { ?>
                                                <p><?= $feature['text'] ?></p>
											<?php } else { ?>
                                                <p><?= file_get_contents( get_template_directory() . "/images/SVG/checkmark.svg" ); ?></p>
											<?php } ?>

                                        </div>
                                    </div>
									<?php
								} ?>
                            </div>
						<?php } ?>
                    </div>


                </div>
            </div>
            <div class="extraFeatures">
                <h4 class="title"><?= $extraFeatures['title'] ?></h4>
                <div class="features">
					<?php foreach ( $extraFeatures['features'] as $feature ) { ?>
                        <div class="featureName">
                            <p><?= $feature['feature'] ?></p>
							<?php if ( $feature['if_tooltip'] && $feature['feature_tooltip'] ) {
								?>
                                <span class="tooltipIcon"><?= file_get_contents( get_template_directory() . "/images/SVG/tooltip.svg" ); ?><?= $feature['feature_tooltip'] ?></span>
							<?php } ?>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>
        <div class="sideText">
            <div class="text">
                <span>hosting</span>
                <span>hosting</span>
                <span>hosting</span>
            </div>
        </div>
    </div>
</section>
<script>
    var init = false;

    if (window.innerWidth <= 769) {
        var hotelswiper = new Swiper(".webhotelSlider", {
            navigation: {
                nextEl: '.nextWebhotel',
                prevEl: '.prevWebhotel',
            },

        });
    }


    swiperCard();


    function swiperCard() {
        window.addEventListener("resize", swiperCard);
    }
</script>