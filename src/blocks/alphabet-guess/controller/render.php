<?php
/**
 * Render Controller block.
 *
 * @package alphabet-guess
 */

/** @phpstan-ignore-next-line */
$win_text  = $attributes['win'] ?? __( 'You win!', 'tharsheblows-alphabet-guess' );
$lose_text = $attributes['lose'] ?? __( 'You lose!', 'tharsheblows-alphabet-guess' );

$win_colour  = $attributes['winColor'] ?? '#32CD32';
$lose_colour = $attributes['loseColor'] ?? '#FF0000';

/** @phpstan-ignore-next-line */
$namespace = $block->context['alphabet-guess/storeNamespace'];

$context = wp_interactivity_data_wp_context(
	[
		'text'     => [
			'current' => __( 'Click a letter to start', 'tharsheblows-alphabet-guess' ),
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
<div class="ag-controller__wrapper">
	<div
		<?php echo get_block_wrapper_attributes( [ 'class' => 'ag-controller ag-controller__results' ] ); // phpcs:ignore ?>
		<?php echo $context; // phpcs:ignore ?>
		data-wp-interactive="<?php echo esc_attr( $namespace ); ?>"
		data-wp-watch="callbacks.getResult"
		data-wp-style--border-color="context.colour.current"
		data-wp-style--font-size="context.fontSize"
		data-wp-text="context.text.current"
		id="<?php echo esc_attr( wp_unique_id( 'ag-controller-' ) ); ?>"
	>
	</div>
</div>
