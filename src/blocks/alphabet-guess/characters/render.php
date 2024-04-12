<?php
/**
 * Render character block.
 *
 * @package alphabet-guess
 */

/** @phpstan-ignore-next-line */
$store_namespace = $block->context['alphabet-guess/storeNamespace'];

$context = wp_interactivity_data_wp_context(
	[
		'guessedCharacters' => [],
	]
);
?>

<div
	<?php echo get_block_wrapper_attributes( [ 'class' => 'ag-characters' ] ); // phpcs:ignore ?>
	data-wp-interactive="<?php echo esc_attr( $store_namespace ); ?>"
	id="<?php echo esc_attr( wp_unique_id( 'ag-characters-' ) ); ?>"
	<?php echo $context; // phpcs:ignore ?>
>
	<div
		class="ag-characters__list"
	>
		<template data-wp-each="state.characters" data-wp-watch="callbacks.disableOnWin">
			<button
				class="ag-characters__item"
				data-wp-on--click="actions.guessCharacter"
				data-wp-text="context.item"
			>
			</button>
		</template>
	</div>
</div>
