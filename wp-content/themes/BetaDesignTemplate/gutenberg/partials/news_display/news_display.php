<?php
$userArgs = get_field('userargs');
$userAmount = get_field('amount');

$args = array(
    'post_type' => 'post',
    'orderby' => 'ID',
    'post_status' => 'publish',
    'order' => 'DESC',
    'posts_per_page' => $userAmount ?: 3 // this will retrive all the post that is published
);

if ($userArgs === 'taxo') {
    $userTax = get_field('taxo');
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => 'id',
            'terms' => $userTax,
        ));
    $args['posts_per_page'] = -1;
}

if ($userArgs === 'id') {
    $userPosts = get_field('posts');
    $args['post__in'] = $userPosts;
    $args['posts_per_page'] = -1;
}


$result = new WP_Query($args);

?>

<section class="news_display">
    <div class="container">
        <?php if ($result->have_posts()) : ?>
            <?php while ($result->have_posts()) : $result->the_post(); ?>
                <div class="single">
                    <?php the_post_thumbnail('small'); ?>
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>

                    <a href="<?= get_the_permalink() ?>" class="straight primary">Læs mere</a>
                </div>
            <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</section>
