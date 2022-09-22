<?php
$heading = get_field('heading');
$email = get_field('infoemail', 'options');
$phone = get_field('phone', 'options');
$facebook = get_field('facebook', 'options');
$linkedin = get_field('linkedin', 'options');

$street = get_field('street', 'options');
$zip = get_field('zip', 'options');
$city = get_field('city', 'options');
$address = $street . ', ' . $zip . ' ' . $city;
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
                    <div class="single location">
                        <h3>Besøg os</h3>
                        <p><?= $address ?></p>
                    </div>
                    <div class="single location">
                        <h3>Skriv til os</h3>
                        <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
                    </div>

                    <div class="single location">
                        <h3>Ring til os</h3>
                        <p><a href="tel:<?= $phone ?>"><?= $phone ?></a></p>
                    </div>

                    <div class="single location">
                        <?php if ($facebook || $linkedin) { ?>
                            <h3>Følg os</h3>
                        <?php } ?>
                        <div class="socials">
                            <?php if ($facebook) { ?>
                                <a href="<?= $facebook ?>"><?= file_get_contents(get_template_directory() . "/images/svg/facebook_black.svg"); ?></a>
                            <?php } ?>

                            <?php if ($linkedin) { ?>
                                <a href="<?= $linkedin ?>"><?= file_get_contents(get_template_directory() . "/images/svg/linkedin_black.svg"); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
