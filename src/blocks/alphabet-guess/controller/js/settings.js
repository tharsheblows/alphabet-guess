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
	const { win, lose, winColor, loseColor } = attributes;

	return (
		<InspectorControls>
			<PanelBody
				title={ __( 'Result settings', 'tharsheblows-alphabet-game' ) }
			>
				<TextControl
					label={ __( 'Win text', 'stream-picks-blocks' ) }
					value={ win }
					onChange={ ( value ) => setAttributes( { win: value } ) }
				/>
				<TextControl
					label={ __( 'Lose text', 'stream-picks-blocks' ) }
					value={ lose }
					onChange={ ( value ) => setAttributes( { lose: value } ) }
				/>
				<BaseControl
					label={ __( 'Win color', 'tharsheblows-alphabet-guess' ) }
					id={ `ag-colours__lose-${ clientId }` }
				>
					<ColorPalette
						value={ winColor }
						onChange={ ( color ) => setAttributes( { winColor: color } ) }
						clearable={ false }
					/>
				</BaseControl>
				<BaseControl
					label={ __( 'Lose color', 'tharsheblows-alphabet-guess' ) }
					id={ `ag-colours__win-${ clientId }` }
				>
					<ColorPalette
						value={ loseColor }
						onChange={ ( color ) => setAttributes( { loseColor: color } ) }
						clearable={ false }
					/>
				</BaseControl>
			</PanelBody>
		</InspectorControls>
	);
}
