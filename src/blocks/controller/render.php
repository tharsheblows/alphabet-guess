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

/** @phpstan-ignore-next-line */
$hey = $attributes;

// Generate unique id for aria-controls.
$results_id = wp_unique_id( 'results-' );

wp_interactivity_config( 'alphabet-guess' );

?>

<div
	<?php echo esc_html( get_block_wrapper_attributes() ); ?>
	data-wp-interactive="alphabet-guess"
>
	<div
		id="<?php echo esc_attr( $results_id ); ?>"
		class="ag-controller__results"
	>
		<div  data-wp-bind--hidden="!state.isWinningLetter" >
			Winning
		</div>
		<div data-wp-bind--hidden="state.isWinningLetter">
			Losing
		</div>
		<div data-wp-text="state.isWinningLetter"></div>
	</div>
</div>
