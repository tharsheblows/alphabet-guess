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
$win_text  = $attributes['win'] ?? __( 'You win!', 'tharsheblows-alphabet-guess' );
$lose_text = $attributes['lose'] ?? __( 'You lose!', 'tharsheblows-alphabet-guess' );

$win_colour  = $attributes['winColor'] ?? '#32CD32';
$lose_colour = $attributes['loseColor'] ?? '#FF0000';

// Generate unique id for aria-controls.
$results_id = wp_unique_id( 'results-' );

$context = wp_interactivity_data_wp_context(
	[
		'text'     => [
			'current' => __( 'Play the game', 'tharsheblows-alphabet-guess' ),
			'win'     => $win_text,
			'lose'    => $lose_text,
		],
		'colour'   => [
			'current' => '#000',
			'win'     => $win_colour,
			'lose'    => $lose_colour,
		],
		'fontSize' => 24,
	]
);
?>

<div
	<?php echo get_block_wrapper_attributes( [ 'class' => 'ag-controller__results' ] ); // phpcs:ignore ?>
	<?php echo $context; // phpcs:ignore ?>
	data-wp-interactive="alphabet-guess"
	data-wp-watch="callbacks.getResult"
	data-wp-style--border-color="context.colour.current"
	data-wp-style--font-size="context.fontSize"
	data-wp-text="context.text.current"
	id="<?php echo esc_attr( $results_id ); ?>"
>
</div>
