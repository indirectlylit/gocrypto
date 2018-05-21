/**
 * @export
 * @param  {string} dependency
 * @param  {any}    [fallback]
 * @return {any}
 */
export default ( dependency, fallback ) => {
	try {
		require.resolve( dependency );
	} catch ( err ) {
		return fallback;
	}
	return require( dependency );
};
