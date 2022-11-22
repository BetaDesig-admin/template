<?php
$order       = get_field( 'order' );
$width       = get_field( 'width' );
$textOrder   = '';
$sliderOrder = '';
$rtl         = '';


if ( $order === 'slider' ) {
    $bgPosition = 'right';
} else {
    $bgPosition = 'left';
    $rtl        = 'dir="rtl"';
}

if ( ! $slides ) {
    $slides = get_field( 'slides' );
}
if ( $is_preview ) {
    if ( ! $slides ) {
        $slides = array(
            array(
                'image'  => array(
                    'url' => 'https://via.placeholder.com/500?text=Upload/vælg+billede'
                ),
                'text'   => '<h2>Indtast tekst og formater det</h2>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'header' => 'Indtast lille overskrift',
            ),
            array(
                'image'  => array(
                    'url' => 'https://via.placeholder.com/500?text=Upload/vælg+billede'
                ),
                'text'   => '<h2>Indtast tekst og formater det</h2>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'header' => 'Indtast lille overskrift',


            ),
            array(
                'image'  => array(
                    'url' => 'https://via.placeholder.com/500?text=Upload/vælg+billede'
                ),
                'text'   => '<h2>Indtast tekst og formater det</h2>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'header' => 'Indtast lille overskrift',
            ),
        );
    }
}

if ( $slides ) {
    if ( count( $slides ) <= 1 ) {
        $solo = 'is_solo';
    } else {
        $solo = '';
    }


    $randomID = 'swiper' . uniqid();
    ?>

    <section class="slider_two_column">
        <div class="container <?= $bgPosition ?> <?php if ( $width === 'toEdge' ) {
            echo $width;
        } ?>">
            <div class="slider swiper <?= $bgPosition ?>  <?= $randomID ?>  " <?= ' ' . $rtl ?>>
                <div class="swiper-wrapper">
                    <?php if ( $slides ) {
                        foreach ( $slides as $slide ) {
                            $image  = $slide['image']['url'];
                            $header = $slide['header'];
                            $text   = $slide['text'];
                            ?>

                            <div class="swiper-slide <?= $solo ?>">
                                <div class="column image <?= $sliderOrder ?>">
                                    <img src="<?= $image ?>" alt="slide_image"/>
                                    <?php if ( count( $slides ) > 1 ) { ?>
                                        <div class="navigation <?= $randomID ?>">
                                            <div class="swiper-button-next-custom"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></div>
                                            <div class="swiper-button-prev-custom"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="column <?= $textOrder ?>">
                                    <div class="text">
                                        <div class="text__container">
                                            <h3 class="header"><?= $header ?></h3>
                                            <?= $text ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php }
                    } ?>
                </div>

            </div>
        </div>

    </section>

    <?php

    if ( count( $slides ) > 1 ) { ?>
        <script>
            var swiperTwoColumn = new Swiper(".slider.<?php echo $randomID ?>", {
                spaceBetween: 30,
                slidesPerView: 'auto',
                speed: 500,
                effect: 'fade',

                breakpoints: {
                    // when window width is >= 320px
                    1024: {
                        spaceBetween: 30,
                    },
                    650: {
                        spaceBetween: 30,
                    },
                    300: {
                        spaceBetween: 10,
                    },
                },
                loop: true,
                slidesPerGroup: 1,
                pagination: {
                    el: ".swiper-pagination.<?= $randomID ?>",
                },
                navigation: {
                    nextEl: ".navigation.<?php echo $randomID ?> .swiper-button-next-custom",
                    prevEl: ".navigation.<?php echo $randomID ?> .swiper-button-prev-custom",
                },
            });
        </script>
    <?php }
} ?>