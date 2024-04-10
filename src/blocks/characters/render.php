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
$unique_id = wp_unique_id( 'p-' );
?>

<div
	<?php echo esc_html( get_block_wrapper_attributes() ); ?>
	data-wp-interactive="create-block"
	<?php echo esc_html( wp_interactivity_data_wp_context( [ 'isOpen' => false ] ) ); ?>
	data-wp-watch="callbacks.logIsOpen"
>
	<button
		data-wp-on--click="actions.toggle"
		data-wp-bind--aria-expanded="context.isOpen"
		aria-controls="<?php echo esc_attr( $unique_id ); ?>"
	>
		<?php esc_html_e( 'Toggle', 'tharsheblows-alphabet-guess' ); ?>
	</button>

	<p
		id="<?php echo esc_attr( $unique_id ); ?>"
		data-wp-bind--hidden="!context.isOpen"
	>
		<?php
			esc_html_e( 'Characters - hello from an interactive block!', 'tharsheblows-alphabet-guess' );
		?>
	</p>
</div>