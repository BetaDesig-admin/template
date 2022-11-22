<?php
// Step by step block
// Mulighed for at vælge tal, skrive tekst i stedet for tal eller lave en opslagstavle med dage

$orientation = get_field( 'order' );
$mode        = get_field( 'mode' );
$header      = get_field( 'header' );
$heading     = get_field( 'heading' );
$link        = get_field( 'link' );


if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }
    if ( ! $heading ) {
        $heading = '<h2>Indtast overskrift i feltet til højre og vælg layout</h2>';
    }
}

?>

<section class="steps <?= $mode ?> <?= $orientation ?>">
    <div class="container">
        <div class="header">
            <h3 class="header"><?= $header ?></h3>
            <?= $heading ?>
        </div>
        <div class="singles">
            <?php if ( $mode === 'factMode' ) {
                $facts = get_field( 'facts' );

                if ( $is_preview ) {
                    if ( ! $facts ) {
                        $facts = array(
                            array(
                                'index' => 'Lorem',
                                'text'  => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                            array(
                                'index' => 'ipsum',
                                'text'  => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                            array(
                                'index' => 'dolor',
                                'text'  => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                        );
                    }
                }

                foreach ( $facts as $fact ) { ?>
                    <div class="single">
                        <figure class="number"><?= $fact['index'] ?></figure>
                        <div class="StepsContent">
                            <?= $fact['text'] ?>
                        </div>
                    </div>
                    <?php
                }
            } else if ( $mode === 'stepMode' ) {
                $steps = get_field( 'steps' );
                $i     = 1;


                if ( $is_preview ) {
                    if ( ! $steps ) {
                        $steps = array(
                            array(
                                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                            array(
                                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                            array(
                                'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                        );
                    }
                }
                if ( $link ) {
                    ?>
                    <a class="stepsLink" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                    <?php
                }

                foreach ( $steps as $step ) { ?>
                    <div class="single">
                        <figure class="number"><?= $i ?></figure>
                        <div class="StepsContent">
                            <?= $step['text'] ?>
                        </div>
                    </div>
                    <?php
                    $i ++;
                }
            } else if ( $mode === 'postMode' ) {
                $posts = get_field( 'weekposts' );


                if ( $is_preview ) {
                    if ( ! $posts ) {
                        $posts = array(
                            array(
                                'day'   => 'mandag',
                                'notat' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                            array(
                                'day'   => 'tirsdag',
                                'notat' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                            array(
                                'day'   => 'onsdag',
                                'notat' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod . '
                            ),
                        );
                    }
                }

                if ( $link ) {
                    ?>
                    <a class="stepsLink" href="<?= $link['url'] ?>"><?= $link['title'] ?></a>
                    <?php
                }
                foreach ( $posts as $single ) {
                    ?>
                    <div class="single">
                        <p><?= $single['day'] ?></p>
                        <span><em><?= $single['notat'] ?></em></span>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</section>
