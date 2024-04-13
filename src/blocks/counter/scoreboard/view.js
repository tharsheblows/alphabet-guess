/**
 * WordPress dependencies
 */
import { store } from '@wordpress/interactivity';

/**
 * Internal dependencies
 */
import initialState from '../initial-state';
import { getNamespaceFromBlockMeta } from '../../../helpers/utils';
import metadata from './block.json';

const namespace = getNamespaceFromBlockMeta( metadata );

// Initialise store for all namespaces.
const { state, actions } = store( namespace, {
	state: {
		...initialState,
	},
	actions: {
		countEvents: ( row, column ) => {
			const countedItem = state.score.filter( ( s ) => s.row === row );
			if ( countedItem.length < 1 ) {
				state.score.push( { row, [ column ]: 1 } );
			} else {
				const item = countedItem[ 0 ];
				item[ column ] = item[ column ] ? ++item[ column ] : 1;
			}

			const totalToIncrement = column === 'win' ? 'totalWins' : 'totalLosses';
			++state[ totalToIncrement ];
		},
	},
} );

const scoreboardStore = { state, actions };

export default scoreboardStore;

