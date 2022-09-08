<?php get_header(); ?>

    <section class="single">
        <?php if (have_posts()) while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        wp_reset_query(); ?>
    </section>

<?php get_footer(); ?>