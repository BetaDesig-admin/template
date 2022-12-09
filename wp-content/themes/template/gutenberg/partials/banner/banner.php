<?php
// Banner
// Kan indeholde tekst eller kontaktinformation
// Pil der scroller til næste section

$content = get_field('content');

if ($content === 'contact') {
    $email = get_field('infoemail', 'options');
    $phone = get_field('phone', 'options');
}

if (!$image) {
    $image = get_field('image');
}

if (!$text) {
    $text = get_field('text');
}

if ($is_preview) {
    if (!$image) {
        $image['url'] = 'https://via.placeholder.com/1920x1024/FFFFFF/191D1B?text=Upload+eller+vælg+banner';
    }

    if (!$text) {
        $text = '<h4>Indtast en kort tekst i højre side menu</h4>';
    }
}
?>

<section class="banner">
    <div class="image">
        <img src="<?= $image['url'] ?>"
             alt="Banner image">
    </div>
    <div class="container <?php if ($content === 'contact') { ?>contactInfo<?php } ?>">
        <div class="text">
            <?php if ($content === 'contact') { ?>
                <ul>
                    <li>
                        <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                    </li>
                    <li>
                        <a href="mailto:<?= $email ?>"><?= $email ?></a>
                    </li>
                </ul>
            <?php } else { ?>
                <?= $text ?>
            <?php } ?>
        </div>
        <div class="scroll">
                <span id="scrollTo" onclick="ScrollToNextSection(event);">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
    <path
            d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/>
</svg>
                </span>
        </div>
    </div>
</section>

