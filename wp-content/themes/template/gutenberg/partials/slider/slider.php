<?php
$layout = get_field('layout');
$slides = get_field('slides');
$orange = get_field('orange');

$active = '';
if ($orange) {
    $active = 'orange';
}

if ($layout !== 'content') {
    $heading = get_field('heading');
}


if (!$slides) {
    $slides = array(
        array(
            'image' => array(
                'url' => 'https://via.placeholder.com/400x300',
            ),
            'content' => 'Test indhold udfyld venglist',
        ),
        array(
            'image' => array(
                'url' => 'https://via.placeholder.com/400x300',
            ),
            'content' => 'Test indhold udfyld venglist',
        ),
        array(
            'image' => array(
                'url' => 'https://via.placeholder.com/400x300',
            ),
            'content' => 'Test indhold udfyld venglist',
        ),
    );
}


?>


<section class="slider <?= $layout ?>">
    <?php if ($layout === 'content') { ?>
    <div class="container">
        <?php } ?>


        <?php if ($layout !== 'content') { ?>
            <div class="header">
                <?= $heading ?>
                <div class="navigation">
                    <div class="swiper-button-prev-custom"><</div>
                    <div class="swiper-button-next-custom">></div>
                </div>
            </div>
        <?php } ?>

        <div class="swiper slides <?= $layout ?>">
            <div class="swiper-wrapper">
                <?php foreach ($slides as $slide) { ?>
                    <div class="single swiper-slide">
                        <div class="img <?= $active ?>" style="background-image: url(<?= $slide['image']['url'] ?>)"></div>
                        <!--                        <img src="--><? //= $slide['image']['url'] ?><!--">-->
                        <div class="content">
                            <p><em><?= $slide['content'] ?> </em></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php if ($layout === 'content') { ?>
                <div class="navigation">
                    <div class="swiper-button-prev-custom"><</div>
                    <div class="swiper-button-next-custom"><</div>
                </div>
            <?php } ?>
        </div>


        <?php if ($layout === 'content') { ?>
    </div>
<?php } ?>


</section>


<script>
    var gallerySwiper = new Swiper(".swiper.slides.special", {
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-custom",
            prevEl: ".swiper-button-prev-custom",
        },
        breakpoints: {
            // when window width is >= 480px
            300: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 640px
            650: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            1025: {
                slidesPerView: 2.40,
                spaceBetween: 110,
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
            // when window width is >= 480px
            300: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is >= 640px
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