/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
	const blockProps = useBlockProps();

	return (
		<div { ...blockProps }>
			<div className="counter-scoreboard">
				Scoreboard placeholder
			</div>
		</div>
	);
}
