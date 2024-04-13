/**
 * WordPress dependencies
 */
import { store } from '@wordpress/interactivity';

/**
 * Internal dependencies
 */
import initialState from '../initial-state';
import { getNamespaceFromBlockMeta } from '../../../helpers/utils';
import metadata from '../scoreboard/block.json';

const namespace = getNamespaceFromBlockMeta( metadata );

// Initialise store for all namespaces.
store( namespace, {
	state: {
		...initialState,
	},
} );
