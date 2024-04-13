<?php
/**
 * Render the scoreboard.
 *
 * @package counter-scoreboard
 */

use Tharsheblows\AlphabetGuess\BlockCounter;

$counter_block = new BlockCounter();
$namespace     = $counter_block->get_namespace_from_block_json( __DIR__ );

?>

<div
	<?php echo get_block_wrapper_attributes( [ 'class' => $namespace ] ); // phpcs:ignore ?>
	id="<?php echo esc_attr( wp_unique_id( 'counter-scoreboard-' ) ); ?>"
	data-wp-interactive="<?php echo esc_attr( $namespace ); ?>"
>
	<div
		class="counter-scoreboard__scores"
	>
	<div class="counter-scoreboard__table">
		<div class="counter-scoreboard__header">
			<?php esc_html_e( 'Block ID', 'tharsheblows-alphabet-guess' ); ?>
		</div>
		<div class="counter-scoreboard__header">
			<?php esc_html_e( 'Wins', 'tharsheblows-alphabet-guess' ); ?>
		</div>
		<div class="counter-scoreboard__header">
			<?php esc_html_e( 'Losses', 'tharsheblows-alphabet-guess' ); ?>
		</div>
		<template data-wp-each="state.score">
			<div
				class="counter-scoreboard__item"
				data-wp-text="context.item.row"
			>
			</div>
			<div
				class="counter-scoreboard__item"
				data-wp-text="context.item.win"
			>
			</div>
			<div
				class="counter-scoreboard__item"
				data-wp-text="context.item.lose"
			>
			</div>
		</template>
	</div>

	</div>
</div>
