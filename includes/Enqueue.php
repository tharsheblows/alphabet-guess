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
class Enqueue {

	const STYLES_DIR = '/build/css/';
	const PATH       = PLUGIN_PATH . self::STYLES_DIR;
	const URL        = PLUGIN_URL . self::STYLES_DIR;

	/**
	 * Enqueue the styles.
	 *
	 * @return void
	 */
	public function enqueue_styles(): void {
	}
}
