<?php
//Block hvor man kan lave tabeller
//Kræver plugin: https://da.wordpress.org/plugins/advanced-custom-fields-table-field/

$header = get_field( 'header' );
$text   = get_field( 'text' );
$table  = get_field( 'table' );
$footer = get_field( 'table_footer' );

if ( $is_preview ) {
    if ( ! $header ) {
        $header = 'Indtast blå overskrift';
    }
    if ( ! $text ) {
        $text = '<h2>Indtast tekst og formater det</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }

    if ( ! $table ) {
        $table = array(
            'header'  => array(
                0 => array(
                    'c' => 'Udfyld tabeloverskrift'
                ),
                1 => array(
                    'c' => 'Udfyld tabeloverskrift'
                ),
                2 => array(
                    'c' => 'Udfyld tabeloverskrift'
                )
            ),
            'caption' => '',
            'body'    => array(
                0 => array(
                    0 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                    1 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                    2 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                ),
                1 => array(
                    0 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                    1 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                    2 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                ),
                2 => array(
                    0 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                    1 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                    2 => array(
                        'c' => 'Udfyld rækker og kolonner'
                    ),
                ),
            )
        );
    }


    if ( ! $footer ) {
        $footer = '<h5>Indtast tekst til under tabellen og formater det</h5>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }
}
?>

<section class="table">
    <div class="container">
        <div class="text">
            <h3 class="header"><?= $header ?></h3>
            <?php if ( $text ) {
                echo $text;
            } ?>
        </div>
        <?php if ( $table ) {
            if ( ! empty ( $table ) ) { ?>
                <table>
                    <?php if ( $table['header'] ) { ?>
                        <thead>
                        <tr>
                            <?php foreach ( $table['header'] as $th ) { ?>
                                <th>
                                    <p><?= $th['c'] ?></p>
                                </th>
                            <?php } ?>
                        </tr>
                        </thead>
                    <?php } ?>
                    <?php foreach ( $table['body'] as $tr ) { ?>
                        <tr>
                            <?php foreach ( $tr as $td ) { ?>
                                <td>
                                    <p><?= nl2br( $td['c'] ) ?></p>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            <?php }
        } ?>
        <?php if ( $footer ) { ?>
            <div class="text">
                <?= $footer ?>
            </div>
        <?php } ?>
    </div>
</section>