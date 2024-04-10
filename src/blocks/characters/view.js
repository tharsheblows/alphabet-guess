/**
 * WordPress dependencies
 */
import { store, getContext } from '@wordpress/interactivity';

store( 'alphabet-guess', {
	actions: {
		markAsUsed: () => {
			const context = getContext();
			context.isOpen = ! context.isOpen;
		},
	},
	callbacks: {
		logIsOpen: () => {
			const { isOpen } = getContext();
			// Log the value of `isOpen` each time it changes.
			// eslint-disable-next-line
			console.log( `Is open: ${ isOpen }` );
		},
	},
} );
