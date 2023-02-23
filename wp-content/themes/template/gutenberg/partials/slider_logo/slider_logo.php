<?php
// Block med logoer og tilhørende overskrift og tekst
// Evt opret posttype hvor logoer kan tilføjes (bruges på Savants i reference-slideren)

if ( $is_preview ) {
    if ( ! $testimonials ) {
        $testimonials = array(
            array(
                'logo'   => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'heading' => 'Indtast overskrift',
                'content' => 'Udfyld tekst',
            ),
            array(
                'logo'   => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'heading' => 'Indtast overskrift',
                'content' => 'Udfyld tekst',
            ),
            array(
                'logo'   => array(
                    'url' => 'https://via.placeholder.com/400x300?text=Upload/vælg+billede',
                ),
                'heading' => 'Indtast overskrift',
                'content' => 'Udfyld tekst',
            ),
        );
    }
    if ( ! $header ) {
        $header = 'Indtast lille overskrift i dette felt.';
    }
    if ( ! $heading ) {
        $heading = '<h2>Indtast overskrift i dette felt.</h2>';
    }
}
?>

    <section class="companys">
        <div class="container swiper reseller">
            <?php if ( $heading ) { ?>
                <div class="heading">
                    <h3 class="header"><?= $header ?></h3>
                    <?= $heading ?>
                </div>
            <?php } ?>
            <div class="swiper-wrapper">
                <?php foreach ( $testimonials as $testimonial ) {
                    ?>
                    <div class="single swiper-slide">
                        <div class="image">
                            <img src="<?= $testimonial['logo']['url'] ?>" alt="">
                        </div>
                        <p class="heading"><strong><?= $testimonial['heading'] ?></strong></p>
                        <p><?= $testimonial['content'] ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <script>
        const swiper = new Swiper('.swiper.container.reseller', {
            direction: 'horizontal',
            loop: true,
            spaceBetween: 100,
            //centeredSlides: true,
            autoplay: {
                delay: 4000,
            },
            breakpoints: {
                // when window width is >= 320px
                1024: {
                    slidesPerView: 4,
                },
                650: {
                    slidesPerView: 3,
                },
                450: {
                    slidesPerView: 2,
                },
                320: {
                    slidesPerView: 1,
                }
            }
        });
    </script>
<?php
