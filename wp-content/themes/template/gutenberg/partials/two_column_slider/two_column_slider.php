<?php
$order = get_field('order');
$textOrder = '';
$sliderOrder = '';
$rtl = '';

if ($order === 'slider') {
    $bgPosition = 'right';
} else {
    $bgPosition = 'left';
    $rtl = 'dir="rtl"';
}

if (!$slides) {
    $slides = get_field('slides');
}
if ($is_preview) {
    if (!$slides) {
        $slides = array(
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/300x580'
                ),
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'ctaText' => 'Lorem ipsum dolor',
                'ctaURL' => '#',
            ),
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/300x580'
                ),
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'ctaText' => 'Lorem ipsum dolor',
                'ctaURL' => '#',
            ),
            array(
                'image' => array(
                    'url' => 'https://via.placeholder.com/300x580'
                ),
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'ctaText' => 'Lorem ipsum dolor',
                'ctaURL' => '#',
            ),
        );
    }
}

if ($slides) {
    if (count($slides) <= 1) {
        $solo = 'is_solo';
    } else {
        $solo = '';
    }




    $randomID = 'swiper' . uniqid();
    ?>

    <section class="slider_two_column">
        <div class="container">
            <div class="slider swiper <?= $bgPosition ?>  <?= $randomID ?>  " <?= ' ' . $rtl ?>>
                <div class="swiper-wrapper">
                    <?php if ($slides) {
                        foreach ($slides as $slide) {
                            $image = $slide['image']['url'];
                            $text = $slide['text'];
                            $ctaText = $slide['ctaText'];
                            $ctaURL = $slide['ctaURL'];
                            ?>

                            <div class="swiper-slide <?= $solo ?>">
                                <div class="column <?= $sliderOrder ?>">
                                    <img src="<?= $image ?>" alt="slide_image"/>
                                    <?php if (count($slides) > 1) { ?>
                                        <div class="navigation <?= $randomID ?>">
                                            <div class="swiper-button-next-custom"><?= file_get_contents(get_template_directory() . "/images/svg/arrow_right.svg"); ?></div>
                                            <div class="swiper-button-prev-custom"><?= file_get_contents(get_template_directory() . "/images/svg/arrow_right.svg"); ?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="column <?= $textOrder ?>">
                                    <div class="text">
                                        <div class="text__container">
                                            <?= $text ?>
                                        </div>
                                        <?php if ($ctaURL && $ctaText) { ?>
                                            <div class="cta">
                                                <a class="cta__link" href="<?= $ctaURL['url'] ?>">
                                                <span class="cta__link__text">
                                                    <?= $ctaText ?>
                                                </span>
                                                    <span class="cta_icon">
                                                    <?= file_get_contents(get_template_directory() . "/images/svg/arrow_right.svg"); ?>
                                                </span>
                                                </a>
                                            </div>
                                        <?php } ?>
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

    if (count($slides) > 1) { ?>
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