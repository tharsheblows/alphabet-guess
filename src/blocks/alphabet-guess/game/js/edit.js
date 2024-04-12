/**
 * WordPress dependencies
 */
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';

const GAME_TEMPLATE = [
	[ 'alphabet-guess/characters', {} ],
	[ 'alphabet-guess/controller', {} ],
];

export default function Edit( { attributes, setAttributes, clientId } ) {
	const { storeNamespace } = attributes;

	const blockProps = useBlockProps();

	// Handles setting a stable storeNamespace based on the initial clientId.
	useEffect( () => {
		if ( ! storeNamespace ) {
			setAttributes( { storeNamespace: `alphabet-game-${ clientId }` } );
		}
	}, [ storeNamespace, clientId, setAttributes ] );

	return (
		<div { ...blockProps }>
			<InnerBlocks template={ GAME_TEMPLATE } />
		</div>
	);
}
