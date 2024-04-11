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
$left_id    = wp_unique_id( 'left-' );
$chosen_id  = wp_unique_id( 'chosen-' );
$characters = apply_filters( 'alphabet_guess_characters', range( 'A', 'Z' ) );

wp_interactivity_state( 'alphabet-guess', [ 'initialCharacters' => $characters ] );
$context = wp_interactivity_data_wp_context(
	[
		'remainingCharacters' => $characters,
	]
);
?>

<div
	<?php echo esc_html( get_block_wrapper_attributes() ); ?>
	data-wp-interactive="alphabet-guess"
	<?php echo $context; // phpcs:ignore ?>
>
	<div
		id="<?php echo esc_attr( $left_id ); ?>"
		class="ag-characters__list"
	>
		<template data-wp-each="state.initialCharacters" >
			<button
				class="ag-characters__item"
				data-wp-on--click="actions.guessCharacter"
				data-wp-text="context.item"
			>
			</button>
		</template>
	</div>
</div>
