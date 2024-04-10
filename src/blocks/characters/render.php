<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 *
 * @package alphabet-guess
 */

// Generate unique id for aria-controls.
$unique_id  = wp_unique_id( 'a-' );
$characters = apply_filters( 'alphabet_guess_characters', range( 'A', 'Z' ) );
?>

<div
	<?php echo esc_html( get_block_wrapper_attributes() ); ?>
	data-wp-interactive="alphabet-guess"
	<?php echo wp_interactivity_data_wp_context( [ 'characters' => $characters ] ); // phpcs:ignore ?>
	data-wp-watch="callbacks.markUsedLetter"
>
	<button
		data-wp-on--click="actions.markAsUsed"
		aria-controls="<?php echo esc_attr( $unique_id ); ?>"
	>
		<?php esc_html_e( 'Show Characters', 'tharsheblows-alphabet-guess' ); ?>
	</button>

	<div
		id="<?php echo esc_attr( $unique_id ); ?>"
		class="ag-characters__list"
	>
		<?php
		foreach ( $characters as $character ) {
			?>
					<div class="ag-characters__item">
					<?php echo esc_html( $character ); ?>
					</div>
				<?php
		}
		?>
	</ul>
</div>
