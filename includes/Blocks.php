<?php
/**
 * The file with all the blocks.
 *
 * @package tharsheblows-alphabet-guess
 */

namespace Tharsheblows\AlphabetGuess;

/**
 * Class for adding blocks.
 */
class Blocks {

	const BLOCKS_DIR = '/build/blocks/';
	const PATH       = PLUGIN_PATH . self::BLOCKS_DIR;
	const URL        = PLUGIN_URL . self::BLOCKS_DIR;

	/**
	 * Register the blocks you want to register.
	 *
	 * @return void
	 */
	public function register_blocks(): void {
		// Add your blocks by directory name  here, you don't have to add them all.
		$blocks = [
			'alphabet-guess/characters',
			'alphabet-guess/game',
			'alphabet-guess/controller',
			'counter/scoreboard',
		];

		foreach ( $blocks as $block ) {
			register_block_type_from_metadata( self::PATH . $block );
		}
	}
}
