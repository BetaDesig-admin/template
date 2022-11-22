<?php
if (!$headerText) {
    $headerText = get_field('headerText') ?: '<h2>Udfyld tekst i højre side</h2>';
}
if (!$link) {
    $link = get_field('link');
}
if (!$factBox) {
    $factBox = get_field('factBox');
}
?>
<section class="topheader">
    <div class="container">
        <div class="header">
            <div class="header__text">
                <?= $headerText ?>
            </div>
            <?php if ($factBox) { ?>
                <div class="factBox">
                    <?= $factBox ?>
                </div>
            <?php } ?>
        </div>

    </div>
    <?php if ($link) { ?>
        <div class="btn">
            <a class="sideBtn" href="<?= $link['url'] ?>">
                <?= $link['title'] ?>
                <?= file_get_contents(get_template_directory() . "/images/svg/arrow_right.svg"); ?>
            </a>
        </div>
    <?php } ?>

</section>