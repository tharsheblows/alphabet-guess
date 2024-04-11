/**
 * WordPress dependencies
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

const initialCharacters = [
	'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
];

const { state } = store( 'alphabet-guess', {
	state: {
		currentGuess: ' ',
		get chosenCharacters() {
			const context = getContext();
			return initialCharacters.filter( ( a ) => ! context.remainingCharacters.includes( a ) );
		},
	},
	actions: {
		guessCharacter: () => {
			const context = getContext();
			const { ref } = getElement();

			const characterIndex = context.remainingCharacters.indexOf( ref.innerText );
			if ( characterIndex > -1 ) {
				context.remainingCharacters.splice( characterIndex, 1 );
				ref.classList.add( 'ag-characters__item--chosen' );
				ref.removeAttribute( 'data-wp-on--click' );
				state.currentGuess = ref.innerText;
			}
		},
	},
} );
