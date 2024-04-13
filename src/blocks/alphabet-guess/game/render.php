<?php
/**
 * Render the Alphabet Guess game wrapper.
 *
 * @package tharsheblows-alphabet-guess
 */

use Tharsheblows\AlphabetGuess\BlockAlphabetGuess;


$attrs           = $attributes; /** @phpstan-ignore-line */
$block_content   = $content; /** @phpstan-ignore-line */
$store_namespace = $attrs['storeNamespace'];

$block_controls = new BlockAlphabetGuess( $store_namespace );

// For the initial block, also pass through any state not dependent on attributes.
$characters        = apply_filters( 'alphabet_guess_characters', range( 'A', 'Z' ) );
$winning_character = $characters[ array_rand( $characters ) ];
$initial_state     = [
	'winningCharacter' => $winning_character,
	'characters'       => $characters,
];

$block_controls->initialize_state( array_merge( $initial_state, $attrs ) );

$background_color = $attrs['backgroundColor'];
$wrapper_style    = "background-color: {$background_color}";

// Below, the "namespace-alphabet-guess-game" class is used to get the array of namespaces to register.
// I prefixed it with "namespace-" in hopes that I wouldn't forget and accidentally change it.
?>

<div
	<?php
	echo get_block_wrapper_attributes( [ 'class' => 'namespace-alphabet-guess-game ag-game__wrapper' ] ); // phpcs:ignore ?>
	data-store-namespace="<?php echo esc_attr( $store_namespace ); // repeating because ... ?>"
	data-wp-interactive="<?php echo esc_attr( $store_namespace ); ?>"
	id="<?php echo esc_attr( $store_namespace ); ?>"
	style="<?php echo esc_attr( $wrapper_style ); ?>"
>
	<div class="ag-game__name" data-wp-text="state.gameName"></div>
	<?php echo $block_content; // phpcs:ignore ?>
</div>
