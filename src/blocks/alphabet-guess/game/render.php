<?php
/**
 * Render the Alphabet Guess game wrapper.
 *
 * @package alphabet-guess
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

?>

<div
	<?php echo get_block_wrapper_attributes( [ 'class' => 'alphabet-guess-game ag-game__wrapper' ] ); // phpcs:ignore ?>
	data-store-namespace="<?php echo esc_attr( $store_namespace ); // repeating because ... ?>"
	data-wp-interactive="<?php echo esc_attr( $store_namespace ); ?>"
	id="<?php echo esc_attr( $store_namespace ); ?>"
>
	<?php echo $block_content; // phpcs:ignore ?>
</div>
