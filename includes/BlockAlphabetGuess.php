<?php
/**
 * Enqueue scripts and styles.
 *
 * @package tharsheblows-alphabet-guess
 */

namespace Tharsheblows\AlphabetGuess;

/**
 * The Enqueue class.
 */
class BlockAlphabetGuess {

	/**
	 * Set the block id for the initialized class.
	 *
	 * @param string|null $store_namespace The store namespace.
	 */
	public function __construct( public string|null $store_namespace = null ) {}

	/**
	 * Initialize the state according to attributes if that's what we want to do.
	 *
	 * @param array $attrs An array of the attributes.
	 * @return void
	 */
	public function initialize_state( array $attrs ): void {
		// Any initialization of state happens here. This is for all blocks.
		$state  = [];
		$to_add = $this->add_to_state();

		// Mmmm this should be a schema? And then add attributes in the schema according to the rules.
		foreach ( $attrs as $attr => $value ) {
			if ( in_array( $attr, $to_add, true ) ) {
				$state[ $attr ] = $value;
			}
		}

		if ( ! empty( $state ) && ! empty( $this->store_namespace ) ) {
			wp_interactivity_state( $this->store_namespace, $state );
		}
	}

	/**
	 * An array of attributes to add to state.
	 * This could be a schema but at the moment there's no need.
	 *
	 * @return array
	 */
	public function add_to_state(): array {
		return [
			'winningCharacter',
			'characters',
		];
	}
}
