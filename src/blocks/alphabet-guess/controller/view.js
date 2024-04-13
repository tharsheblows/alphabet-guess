/**
 * WordPress dependencies
 */
import { store, getContext } from '@wordpress/interactivity';

/**
 * Internal dependencies
 */
import { getStoreNamespaces } from '../../../helpers/utils';
import initialState from '../initial-state';

// This needs to be the classname from the parent block (see game/render.php ).
const namespaces = getStoreNamespaces( 'namespace-alphabet-guess-game' );

// Initialise the store for all namespaces.
namespaces.forEach( ( n ) => {
	const { state } = store( n, {
		state: {
			...initialState,
			get isWinningCharacter() {
				return state.currentGuess === state.winningCharacter;
			},
		},
		actions: {
			getEasyCharacter: () => {
				state.winningCharacter = 'J';
			},
		},
		callbacks: {
			getResult: () => {
				if ( ! state.currentGuess ) {
					return; // If there's no current guess bail.
				}

				const context = getContext();

				context.text.current = state.isWinningCharacter
					? context.text.win
					: context.text.lose;
				context.colour.current = state.isWinningCharacter
					? context.colour.win
					: context.colour.lose;
				context.fontSize = state.isWinningCharacter
					? 24
					: context.fontSize + 6;
			},
		},
	} );
} );
