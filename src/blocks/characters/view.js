/**
 * WordPress dependencies
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

const initialCharacters = [
	'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
];

const { state } = store( 'alphabet-guess', {
	state: {
		currentGuess: null,
		get chosenCharacters() {
			const context = getContext();
			return initialCharacters.filter( ( a ) => ! context.remainingCharacters.includes( a ) );
		},
	},
	actions: {
		guessCharacter: () => {
			const context = getContext();
			const { ref } = getElement();

			const chosen = ref.innerText;

			if ( context.guessedCharacters.includes( chosen ) ) {
				return;
			}

			context.guessedCharacters.push( chosen );

			ref.classList.add( 'ag-characters__item--chosen' );
			ref.removeAttribute( 'data-wp-on--click' );

			if ( chosen === state.winningCharacter ) {
				ref.classList.add( 'ag-characters__item--correct' );
			}
			state.currentGuess = ref.innerText;
		},
	},
	callbacks: {
		disableOnWin: () => {
			if ( state.isWinningCharacter ) {
				const context = getContext();
				context.characters = context.guessedCharacters;
			}
		},
	},
} );
