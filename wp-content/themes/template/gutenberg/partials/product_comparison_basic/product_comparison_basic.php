<?php
// Tabel med sammenligning af produkter (brugt til sammenligning af designpakker på savantsoftware.dk/startup-central
// Mulighed for at tilføje tooltips til alle celler
// UDEN kolonne i venstre side til featurenavne

$designOptions = get_field( 'designpakker', 'options' );
$text          = get_field( 'text', 'options' );

?>
<section class="designService">
    <div class="container toEdge left text">
        <div class="content">
            <div class="table">
                <div class="swiper webhotelSlider">
                    <h2 class="heading">Designpakker</h2>
                    <div class="swiper-wrapper slides">
						<?php foreach ( $designOptions as $option ) { ?>
                            <div data-title="<?= $option['title'] ?>" class="column swiper-slide">
                                <div class="header row">
                                    <div class="navigation">
                                        <p class="prevWebhotel"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></p>
                                    </div>
                                    <div>
                                        <h5><?= $option['title'] ?></h5>
                                        <p class="price"><?= $option['price'] ?></p>
                                    </div>
                                    <div class="navigation">
                                        <p class="nextWebhotel"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></p>
                                    </div>
                                </div>
								<?php foreach ( $option['rows'] as $row ) { ?>
                                    <div class="row">
                                        <div class="textContent">
                                            <div class="text">
												<?= $row['row'] ?>
                                            </div>
											<?php if ( $row['if_tooltip'] && $row['tooltip'] ) {
												?>
                                                <span class="tooltipIcon"><?= file_get_contents( get_template_directory() . "/images/SVG/tooltip.svg" ); ?><?= $row['tooltip'] ?></span>
											<?php } ?>
                                        </div>
                                    </div>
									<?php
								} ?>
                            </div>
						<?php } ?>
                    </div>
                    <div class="tableFooter">
                        <?= $text ?>
                    </div>
                </div>
                <div class="sideText">
                    <div class="text">
                        <span>designpakker</span>
                        <span>designpakker</span>
                        <span>designpakker</span>
                    </div>
                </div>
            </div>
</section>
<script>
    var init = false;

    if (window.innerWidth <= 525) {
        var hotelswiper = new Swiper(".webhotelSlider", {
            loop: true,
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