/**
 * WordPress dependencies
 */
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { useEffect } from '@wordpress/element';

/**
 * Internal dependencies
 */
import Settings from './settings';

const GAME_TEMPLATE = [
	[ 'tharsheblows/alphabet-guess-characters', {} ],
	[ 'tharsheblows/alphabet-guess-controller', {} ],
];

export default function Edit( props ) {
	const { attributes, setAttributes, clientId } = props;
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
			<Settings { ...props } />
			<InnerBlocks template={ GAME_TEMPLATE } />
		</div>
	);
}
