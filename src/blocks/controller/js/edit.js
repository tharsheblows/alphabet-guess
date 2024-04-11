/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import Settings from './settings';

export default function Edit( props ) {
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			<Settings { ...props } />
			{ __( 'Characters – hello from the editor!', 'characters' ) }
		</div>
	);
}
