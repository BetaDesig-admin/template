<?php
$mode = get_field('layout');
$content = get_field('content');
$image = get_field('image');
$heading = get_field('heading');
?>

    <section class="companys">
        <div class="container swiper reseller">
            <?php if ($heading) { ?>
                <div class="heading">
                    <?= $heading ?>
                </div>
            <?php } ?>
            <div class="swiper-wrapper">
                <?php
                if ($content === 'logo') {

                    $args = array(
                        'post_type' => 'company',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                    );

                    if ($mode === 'single') {
                        $singles = get_field('singles');
                        $args['post__in'] = $singles;
                    }
                    $loop = new WP_Query($args);

                    while ($loop->have_posts()) : $loop->the_post();
                        $postID = get_the_ID();
                        $logo = get_field('logo', $postID);
                        $href = get_field('link', $postID);
                        $active = get_field('active', $postID);


                        if ($active === 'active') {
                            ?>
                            <div class="single swiper-slide">
                                <img src="<?= $logo['url'] ?>" alt="logo">
                            </div>
                            <?php
                        }
                    endwhile;
                    wp_reset_postdata();
                } else {
                    $testimonials = get_field('testimonials');
                    foreach ($testimonials as $test) {
                        ?>
                        <div class="single swiper-slide">
                            <p class="heading"><strong><?= $test['heading'] ?></strong></p>
                            <p><?= $test['content'] ?></p>
                        </div>
                        <?php
                    }
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
                delay: 5000,
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
