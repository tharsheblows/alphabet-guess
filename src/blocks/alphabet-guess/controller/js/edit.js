/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import Settings from './settings';

export default function Edit( props ) {
	const blockProps = useBlockProps();

	const { attributes } = props;
	const { loseColor, lose } = attributes;

	return (
		<div { ...blockProps }>
			<Settings { ...props } />
			<div className="ag-controller__wrapper">
				<div
					style={ { borderColor: loseColor } }
					className="ag-controller ag-controller__results"
				>
					{ lose }
				</div>
			</div>

		</div>
	);
}
