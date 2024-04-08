<?php
/**
 * Alphabet Guess
 *
 * @package           AlphabetGuess
 * @author            Mary (JJ) Jay
 * @copyright         2024
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Alphabet Guess
 * Plugin URI:        https://github.com/tharsheblows/tharsheblows-alphabet-guess
 * Description:       A stupid game to try new WP interactivity API.
 * Version:           0.1.1
 * Requires at least: 6.5
 * Requires PHP:      8.2
 * Author:            Mary (JJ) Jay
 * Author URI:        https://porchy.co.uk
 * Text Domain:       tharsheblows-alphabet-guess
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace Tharsheblows\AlphabetGuess;

use Tharsheblows\AlphabetGuess\Hooks;

require 'vendor/autoload.php';

// Add all hooks.
Hooks::init();
