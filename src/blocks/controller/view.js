/**
 * WordPress dependencies
 */
import { store } from '@wordpress/interactivity';

const { state } = store( 'alphabet-guess', {
	state: {
		currentGuess: ' ', // The current guess.
		winningCharacter: 'J',
		get isWinningLetter() {
			return state.currentGuess === state.winningCharacter;
		},
	},
} );
