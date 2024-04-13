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
abstract class Block {

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
	 * Get the store namespace from block meta. This is for when you want to share state
	 * across all the blocks defined by this metadata across the entire page. If you want
	 * each block to have its own state, set the store namespace as an attribute on the block.
	 *
	 * @param string $block_dir_path The block path without a trailing slash.
	 * @return string The namespace generated from the block name.
	 */
	public function get_namespace_from_block_json( string $block_dir_path ): string {
		$metadata              = wp_json_file_decode( $block_dir_path . '/block.json' );
		$namespace             = str_replace( '/', '-', $metadata->name );
		$this->store_namespace = $namespace;

		return $namespace;
	}

	/**
	 * An array of attributes to add to state.
	 * This could be a schema but at the moment there's no need.
	 *
	 * @return array
	 */
	abstract public function add_to_state(): array;
}
