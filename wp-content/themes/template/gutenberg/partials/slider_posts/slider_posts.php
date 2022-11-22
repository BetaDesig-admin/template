<?php
// Slider til posttypes
// Laver en query med funktionen smartWpQuery
// Henter valgt layout, antal, sortering og eventuelle valgte elementer (hvis layout er 'single')

if (!$heading) {
    $heading = get_field('heading');
}
if (!$layout) {
    $layout = get_field('layout');
}
if (!$orderBy) {
    $orderBy = get_field('orderby');
}
if (!$amount) {
    $amount = get_field('amount');
}
if (!$elements) {
    $elements = get_field('elements');
}

if ( $is_preview ) {
    if ( ! $heading ) {
        $heading = 'Indtast blå overskrift';
    }
}

if ($orderBy === 'ID') {
    $order = 'DESC';
} else {
    $order = 'ASC';
}

$query = smartWpQuery($layout, 'cases', $orderBy, $amount, $order, $elements);
?>

<section class="sliderCases">
    <div class="container toEdge left">
        <h3 class="header"><?= $heading ?></h3>
        <div class="case-wrapper">
            <div class="list">
                <div class="swiper-pagination caseList"></div>
                <a class="linkCases" href="/cases">Se alle cases</a>
            </div>
            <div class="swiper caseSwiper">
                <div class="swiper-wrapper caseImages">

                    <?php
                    $i = 1;

                    if ($query->have_posts()):
                        while ($query->have_posts()): $query->the_post();
                            $image = get_the_post_thumbnail_url();
                            $name = get_the_title();
                            if (!$image) {
                                $image = get_field('image', get_the_ID());
                            }
                            ?>
                            <div data-caseindex="0<?= $i ?>" data-casename="<?= $name ?>"
                                 class="swiper-slide">
                                <a href="<?= get_the_permalink() ?>">
                                    <img src="<?= $image ?>"/>
                                    <div class="info">
                                        <p>0<?= $i ?>.</p>
                                        <p><?= $name ?></p>
                                    </div>
                                    <span></span>
                                </a>
                            </div>

                            <?php
                            $i++;
                        endwhile;
                        wp_reset_query();
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <a class="casesLinkFooter" href="/cases">Se alle cases</a>
    </div>
</section>

<script>
    let cases = document.querySelectorAll('.caseSwiper .swiper-slide');
    let caseName = [];
    let caseIndex = [];
    cases.forEach(function (element) {
        caseName.push(element.dataset.casename);
        caseIndex.push(element.dataset.caseindex);
    });

    var swiper = new Swiper(".caseSwiper", {
        slidesPerView: 1.4,
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return '<div class="caseTitle ' + className + '">' + '<p>' + caseIndex[index] + '</p>' + '<h4>' + caseName[index] + '</h4>' + "</div>";
            },
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1.6,
                spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 2.2,
                spaceBetween: 20
            },
            // when window width is >= 640px
            850: {
                slidesPerView: 1.5,
                spaceBetween: 40,
            },
            1050: {
                slidesPerView: 1.9,
                spaceBetween: 40
            },
            1250: {
                slidesPerView: 2.3,
                spaceBetween: 70
            }
        }
    });
</script>