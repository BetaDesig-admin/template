<section class="beta_instagram_feed">
    <div class="container">

        <?php if ($is_preview) { ?>
            <div class="insta_preview">
                <img src="https://via.placeholder.com/287x287" alt="#"/>
                <img src="https://via.placeholder.com/287x287" alt="#"/>
                <img src="https://via.placeholder.com/287x287" alt="#"/>
                <img src="https://via.placeholder.com/287x287" alt="#"/>
            </div>
        <?php } else { ?>
            <?=
            do_shortcode('[instagram-feed]');
            ?>
        <?php } ?>
    </div>
</section>

