<?php
$text = get_field('text');
$showText = get_field('show_text');
$form = get_field('form');

$order = get_field('order');
if ($showText) {
    if ($order === 'form') {
        $textOrder = 'notFirst';
        $formOrder = 'first';
    } else {
        $textOrder = 'first';
        $formOrder = 'notFirst';
    }
}

?>


<section class="form_two_column">
    <div class="container">
        <?php if ($showText) { ?>
            <div class="text  <?= $textOrder ?>">
                <?= $text ?>
            </div>
        <?php } ?>
        <div class="form <?= $formOrder ?>">
            <?= do_shortcode($form) ?>
        </div>
    </div>
</section>
