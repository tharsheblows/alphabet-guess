export const getStoreNamespaces = ( wrapperClass ) => {
	const wrappers = document.getElementsByClassName( wrapperClass );

	const namespaces = [];
	for ( const game of wrappers ) {
		namespaces.push( game.getAttribute( 'data-store-namespace' ) );
	}

	return namespaces;
};

export const getNamespaceFromBlockMeta = ( blockMetadata ) => blockMetadata.name.replace( '/', '-' );
