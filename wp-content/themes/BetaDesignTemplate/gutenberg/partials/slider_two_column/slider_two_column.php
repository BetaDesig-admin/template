<?php
$text = get_field('text');
$slides = get_field('slides');

$order = get_field('order');
$textOrder = '';
$sliderOrder = '';
$rtl = '';

if ($order === 'slider') {
    $textOrder = 'notFirst';
    $sliderOrder = 'first';

    $rtl = 'dir="rtl"';

} else {
    $textOrder = 'first';
    $sliderOrder = 'notFirst';
}

$randomID = 'swiper' . uniqid();
?>

<section class="slider_two_column">
    <div class="container">
        <div class="text <?= $textOrder ?>">
            <?= $text ?>
            <div class="navigation <?= $randomID ?>">
                <div class="swiper-button-next-custom"><?= file_get_contents(get_template_directory() . "/images/SVG/arrow_right_white.svg"); ?></div>
                <div class="swiper-button-prev-custom"><?= file_get_contents(get_template_directory() . "/images/SVG/arrow_right_white.svg"); ?></div>
            </div>
        </div>
        <div class="slider swiper  <?= $randomID ?> <?= $sliderOrder ?> " <?= ' ' . $rtl ?>>
            <div class="swiper-wrapper">
                <?php if ($slides) {
                    foreach ($slides as $slide) {
                        $image = $slide['image']['url'];
                        $SlideText = $slide['text'];
                        ?>
                        <div class="swiper-slide">
                            <img src="<?= $image ?>" alt="slide_image"/>
                            <div class="textBox">
                                <?= $SlideText ?>
                            </div>
                        </div>
                    <?php }
                } ?>

            </div>

        </div>
        <div class="swiper-pagination  <?= $randomID ?>"></div>
    </div>
</section>

<script>
    var swiper = new Swiper(".slider.<?php echo $randomID ?>", {
        spaceBetween: 30,
        slidesPerView: 'auto',


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