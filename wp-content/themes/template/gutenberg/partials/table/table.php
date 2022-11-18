<?php
$text   = get_field( 'text' );
$table  = get_field( 'table' );
$footer = get_field( 'table_footer' );

if ( $is_preview ) {
	if ( ! $text && ! $table ) {
		$text = '<h2 style="text-align: center">Indtast tekst og udfyld tabel</h2>';
	}
}
?>

<section class="table">
    <div class="container">
		<?php if ( $text ) { ?>
            <div class="text">
				<?= $text ?>
            </div>
		<?php } ?>
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

