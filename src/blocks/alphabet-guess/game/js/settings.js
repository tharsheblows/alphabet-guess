/**
 * WordPress dependencies
 */
import { InspectorControls } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import {
	BaseControl,
	PanelBody,
	TextControl,
	ColorPalette,
} from '@wordpress/components';

export default function Settings( { attributes, setAttributes, clientId } ) {
	const { gameName, backgroundColor } = attributes;

	return (
		<InspectorControls>
			<PanelBody
				title={ __( 'Game settings', 'tharsheblows-alphabet-game' ) }
			>
				<TextControl
					label={ __( 'Game name', 'stream-picks-blocks' ) }
					value={ gameName }
					onChange={ ( value ) => setAttributes( { gameName: value } ) }
				/>
				<BaseControl
					label={ __( 'Background color', 'tharsheblows-alphabet-guess' ) }
					id={ `ag-wrapper-color-${ clientId }` }
				>
					<ColorPalette
						value={ backgroundColor }
						onChange={ ( color ) => setAttributes( { backgroundColor: color } ) }
						clearable={ false }
					/>
				</BaseControl>
			</PanelBody>
		</InspectorControls>
	);
}
