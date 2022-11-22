<?php
$text = get_field('text');

if ($is_preview) {
    if (!$text) {
        $text = '<h2 style="text-align: center">Indtast tekst i dette felt.</h2>';
    }
}
?>

<section class="textContent">
    <div class="container">
        <?= $text ?>
    </div>
</section>
