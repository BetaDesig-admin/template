<?php
$layout  = get_field( 'layout' );
$orderBy = get_field( 'orderby' );
$amount  = get_field( 'amount' );

if ( $orderBy === 'ID' ) {
	$order = 'ASC';
} else {
	$order = 'DESC';
}

$query = smartWpQuery( $layout, 'ansatte', $orderBy, $amount, $order, '' );

?>

<section class="employees">
    <div class="container">
        <div class="singles">
			<?php
			$i = 1;

			if ( $query->have_posts() ):
				while ( $query->have_posts() ): $query->the_post();
					$image    = get_field( 'employee_image', get_the_ID() );
					$position = get_field( 'employee_position', get_the_ID() );
					$email    = get_field( 'employee_email', get_the_ID() );
					$phone    = get_field( 'employee_phone', get_the_ID() );
					$quote    = get_field( 'employee_quote', get_the_ID() );
					?>
                    <div class="single">
                        <div class="image">
                            <div class="employeeImg">
								<?php if ( $image ) { ?>
                                    <img src="<?= $image['url'] ?>" alt="">
								<?php } else { ?>
                                    <img src="<?= bloginfo( 'template_url' ) . "/images/foto_paa_vej.jpg"; ?>" alt="">
	                            <?php } ?>
                            </div>
                            <p class="quote"><?= $quote ?></p>
                        </div>
                        <div class="info">
                            <h4 class="name"><?= the_title() ?></h4>
                            <h5 class="position"><?= $position ?></h5>
                            <div class="contactInfo">
                                <a class="email" href="mailto:<?= $email ?>"><?= $email ?></a>
                            </div>
                        </div>
                    </div>

					<?php
					$i ++;
				endwhile;
			endif;
			?>

        </div>
    </div>
</section>


