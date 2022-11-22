<?php
// Tekst med
$text = get_field('text');

if ($is_preview) {
    if (!$text) {
        $text = '<h2 style="text-align: left">Indtast tekst i tekstfeltet og formater det.</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }
}

?>

<section class="textContent">
    <div class="container">
        <?= $text ?>
    </div>
</section>
