/**
 * WordPress dependencies
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

store( 'alphabet-guess', {
	actions: {
		guessCharacter: () => {
			const context = getContext();
			const { ref } = getElement();

			const characterIndex = context.characters.indexOf( ref.innerText );
			if ( characterIndex > -1 ) {
				context.characters.splice( characterIndex, 1 );
			}
		},
	},
} );
