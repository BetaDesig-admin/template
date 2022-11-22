<?php
// Block med billede-slider
// Mulighed for at indtaste beskrivelse til billederne

if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }

    if ( ! $heading ) {
        $heading = '<h2>Indtast tekst og formater det</h2>';
    }

    if ( ! $slides ) {
        $slides = array(
            array(
                'image'   => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'content' => 'Udfyld tekst',
            ),
            array(
                'image'   => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'content' => 'Udfyld tekst',
            ),
            array(
                'image'   => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'content' => 'Udfyld tekst',
            ),
        );
    }
}

?>

<section class="slider">
    <div class="container <?= $layout ?> <?php if ( $layout != 'content' ) { ?>toEdge left<?php } ?>">
        <?php if ( $heading ) { ?>
            <div class="header">
                <h3 class="header"><?= $header ?></h3>
                <?= $heading ?>
            </div>
        <?php } ?>
        <div class="swiper slides <?= $layout ?>">
            <div class="swiper-wrapper">
                <?php foreach ( $slides as $slide ) { ?>
                    <div class="single swiper-slide">
                        <div class="image">
                            <img src="<?= $slide['image']['url'] ?>" alt="">
                        </div>
                        <div class="content">
                            <p><em><?= $slide['content'] ?> </em></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="navigation">
                <div class="swiper-button-prev-custom"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></div>
                <div class="swiper-button-next-custom"><?= file_get_contents( get_template_directory() . "/images/SVG/arrow.svg" ); ?></div>
            </div>
        </div>
    </div>
</section>


<script>
    var gallerySwiper = new Swiper(".swiper.slides.special", {
        loop: true,
        slidesPerView: 1.2,
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next-custom",
            prevEl: ".swiper-button-prev-custom",
        },
        breakpoints: {
            500: {
                slidesPerView: 1.2,
                spaceBetween: 20
            },
            769: {
                slidesPerView: 1.5,
                spaceBetween: 40
            },
            1025: {
                slidesPerView: 2.4,
                spaceBetween: 50,
            }
        }

    });

    var gallerySwiper = new Swiper(".swiper.slides.content", {
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-custom",
            prevEl: ".swiper-button-prev-custom",
        },

        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            950: {
                slidesPerView: 2,
                spaceBetween: 50,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 50,
            }
        }
    });
</script>