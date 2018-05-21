module.exports = ( { file, options, env } ) => { // eslint-disable-line
	return {
		parser: 'production' === env ? 'postcss-safe-parser' : undefined,
		plugins: {

			// Allow v4 spec CSS
			'postcss-cssnext': options.cssnext,

			// Minifies + optimizes (for production)
			cssnano: 'production' === env ? options.cssnano : false,

			// Minifies inline SVG declarations
			'postcss-svgo': options.svgo,
		},
	};
};
