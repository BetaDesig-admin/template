<?php
// Block med kontaktoplysninger hentet fra options siden

$heading = get_field('heading');
$email = get_field('infoemail', 'options');
$phone = get_field('phone', 'options');
$facebook = get_field('facebook', 'options');
$linkedin = get_field('linkedin', 'options');
$instagram = get_field('instagram', 'options');

$ifMaps = get_field('if_maps');

if ($ifMaps === 'maps') {
    $mapsLink = get_field('maps_link', 'options');
    $linkText = get_field('link_text');
} else {
    $street = get_field('street', 'options');
    $zip = get_field('zip', 'options');
    $city = get_field('city', 'options');
    $address = $street . ' ' . $zip . ' ' . $city;
}

?>

<section class="contact_info">
    <div class="container">
        <article class="body">
            <?php if ($heading) { ?>
                <div class="text">
                    <h2><?= $heading ?></h2>
                </div>
            <?php } ?>
            <div class="content">
                <div class="singles">
                    <?php if ($email) { ?>
                        <div class="single location">
                            <h3>Skriv til os</h3>
                            <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
                        </div>
                    <?php } ?>
                    <?php if ($phone) { ?>
                        <div class="single location">
                            <h3>Ring til os</h3>
                            <p><a href="tel:<?= $phone ?>"><?= $phone ?></a></p>
                        </div>
                    <?php } ?>
                    <?php if ($address || $ifMaps === 'maps') { ?>
                        <div class="single location">
                            <h3>Besøg os</h3>
                            <?php if ($ifMaps === 'maps') { ?>
                                <p><a target="_blank" href="<?= $mapsLink ?>"><?= $linkText ?></a></p>
                            <?php } else { ?>
                                <p><?= $address ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="single location">
                        <?php if ($facebook || $linkedin || $instagram) { ?>
                            <h3>Følg os</h3>
                        <?php } ?>
                        <div class="socials">
                            <?php if ($facebook) { ?>
                                <a href="<?= $facebook ?>"><?= file_get_contents(get_template_directory() . "/images/SVG/facebook.svg"); ?></a>
                            <?php } ?>

                            <?php if ($linkedin) { ?>
                                <a href="<?= $linkedin ?>"><?= file_get_contents(get_template_directory() . "/images/SVG/linkedin.svg"); ?></a>
                            <?php } ?>

                            <?php if ($instagram) { ?>
                                <a href="<?= $instagram ?>"><?= file_get_contents(get_template_directory() . "/images/SVG/instagram.svg"); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
