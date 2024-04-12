/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

/**
 * Internal dependencies
 */
import { initialCharacters } from '../../../../helpers/constants';

export default function Edit() {
	const blockProps = useBlockProps();
	const CharacterList = initialCharacters.map( ( i ) => {
		return (
			<Button
				className="ag-characters__item"
				key={ i }
			>
				{ i }
			</Button>
		);
	} );
	return (
		<div { ...blockProps }>
			<div className="ag-characters__list">
				{ CharacterList }
			</div>
		</div>
	);
}
