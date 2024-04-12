/**
 * WordPress dependencies
 */
import { store, getContext } from '@wordpress/interactivity';

const { state } = store( 'alphabet-guess', {
	state: {
		currentGuess: null,
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
				return;
			}

			const context = getContext();

			context.text.current = state.isWinningCharacter ? context.text.win : context.text.lose;
			context.colour.current = state.isWinningCharacter ? context.colour.win : context.colour.lose;
			context.fontSize = state.isWinningCharacter ? 24 : context.fontSize + 6;
		},
	},
} );
