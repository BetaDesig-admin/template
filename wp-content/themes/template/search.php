<?php get_header(); ?>
<section class="search_results">
    <div class="container">
        <h1><?php printf(__('Søge resultater for: %s'), '' . get_search_query() . ''); ?></h1>

        <section class="search_modal">
            <div id="search" class="container">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
                        <input type="search" class="search-field"
                               placeholder="<?php echo esc_attr_x('Søg efter indhold …', 'placeholder') ?>"
                               value="<?php echo get_search_query() ?>" name="s"
                               title="<?php echo esc_attr_x('Search for:', 'label') ?>"/>
                    </label>
                    <div class="submitBorder">
                        <input type="submit" class="search-submit "
                               value="<?php echo esc_attr_x('Find svar', 'submit button') ?>"/>
                    </div>
                </form>
            </div><!-- #primary -->
        </section><!-- .wrap -->


        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                    <p><?= get_the_date(); ?> </p>
                </h2>
                <?php the_excerpt(); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <h2>Siden blev ikke fundet</h2>
            <p>
                Siden du leder efter blev ikke fundet
            </p>

        <?php endif; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="prev">
                <?php previous_posts_link(__('Prev')); ?>
            </div>
            <div class="next">
                <?php next_posts_link(__('Next')); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
