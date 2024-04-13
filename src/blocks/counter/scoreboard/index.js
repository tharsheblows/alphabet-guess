/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './js/edit';
import metadata from './block.json';

registerBlockType( metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,
} );
