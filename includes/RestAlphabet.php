<?php
/**
 * The alphabet endpoint.
 *
 * @package tharsheblows-alphabet-guess
 */

namespace Tharsheblows\AlphabetGuess;

/**
 * The class for the alphabet endpoints.
 */
class RestAlphabet {

	/**
	 * The rest base.
	 */
	const BASE = 'alphabet-guess/v1';

	/**
	 * The for the alphabet characters.
	 */
	const ALPHABET_ROUTE = 'characters';

	/**
	 * Register the REST route.
	 *
	 * @return void
	 */
	public static function register_route(): void {
		register_rest_route(
			self::BASE,
			self::ALPHABET_ROUTE,
			[
				'methods'             => \WP_REST_Server::READABLE,
				'permission_callback' => '__return_true', // Everyone can see this.
				'callback'            => fn () => apply_filters( 'tharsheblows_alphabet', range( 'A', 'Z' ) ),
			]
		);
	}
}
