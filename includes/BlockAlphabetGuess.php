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
	public function initialize_state( array $attrs ) {
		// Any initialization of state happens here. This is for all blocks.
		$state = [];

		foreach ( $attrs as $attr => $value ) {
			switch ( $attr ) {
				case 'winningCharacter':
					$state[ $attr ] = $value;
					break;
				case 'characters':
					$state[ $attr ] = $value;
					break;
				default:
					break;
			}
		}

		if ( ! empty( $state ) && ! empty( $this->store_namespace ) ) {
			wp_interactivity_state( $this->store_namespace, $state );
		}
	}
}
