/**
 * WordPress dependencies
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

/**
 * Internal dependencies
 */
import scoreboardStore from '../../counter/scoreboard/view';
import { getStoreNamespaces } from '../../../helpers/utils';
import initialState from '../initial-state';

// This needs to be the classname from the parent block (see game/render.php ).
const namespaces = getStoreNamespaces( 'namespace-alphabet-guess-game' );

const initialCharacters = [
	'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
];

// Initialise store for all namespaces.
namespaces.forEach( ( n ) => {
	const { state } = store( n, {
		state: {
			...initialState,
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

				if ( context.guessedCharacters.includes( chosen ) || ! state.play ) {
					return; // If it's already been guessed, don't do anything.
				}

				context.guessedCharacters.push( chosen );

				ref.classList.add( 'ag-characters__item--chosen' );
				ref.removeAttribute( 'data-wp-on--click' );

				if ( chosen === state.winningCharacter ) {
					ref.classList.add( 'ag-characters__item--correct' );
				}

				const counterColumn = chosen === state.winningCharacter ? 'win' : 'lose';
				const gameName = state.gameName || n;
				scoreboardStore.actions.countEvents( gameName, counterColumn );
				state.currentGuess = ref.innerText;
			},
		},
		callbacks: {
			disableOnWin: () => {
				if ( state.isWinningCharacter ) {
					state.play = false;
				}
			},
		},
	} );
} );

