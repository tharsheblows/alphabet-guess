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
class BlockCounter extends Block {

	/**
	 * An array of attributes to add to state.
	 * This could be a schema but at the moment there's no need.
	 *
	 * @return array
	 */
	public function add_to_state(): array {
		return [
			'score',
		];
	}
}
