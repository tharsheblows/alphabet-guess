<?php
/**
 * Render the scoreboard.
 *
 * @package counter-totals
 */

use Tharsheblows\AlphabetGuess\BlockCounter;

$counter_block = new BlockCounter();
$namespace     = $counter_block->get_namespace_from_block_json( \Tharsheblows\AlphabetGuess\PLUGIN_PATH . '/build/blocks/counter/scoreboard' );

$counter_block->initialize_state( [ 'score' => [] ] );

?>

<div
	<?php echo get_block_wrapper_attributes( [ 'class' => 'counter-totals' ] ); // phpcs:ignore ?>
	id="<?php echo esc_attr( wp_unique_id( 'counter-totals-' ) ); ?>"
	data-wp-interactive="<?php echo esc_attr( $namespace ); ?>"
>
	<div
		class="counter-totals__scores"
	>
		<div class="counter-totals__table">
			<div class="counter-totals__header">
				<?php esc_html_e( 'Wins', 'tharsheblows-alphabet-guess' ); ?>
			</div>
			<div
				class="counter-totals_total counter-totals_total--wins"
				data-wp-text="state.totalWins"
			>
			</div>
			<div class="counter-totals__header">
				<?php esc_html_e( 'Losses', 'tharsheblows-alphabet-guess' ); ?>
			</div>
			<div
				class="counter-totals_total counter-totals_total--losses"
				data-wp-text="state.totalLosses"
			>
			</div>
		</div>

	</div>
</div>
