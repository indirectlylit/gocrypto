import path from 'path';

// const mode = process.env.NODE_ENV;
const mode = 'production';
const build = path.resolve( __dirname, './' );
const assets = path.resolve( __dirname, '../assets' );
const dist = path.resolve( __dirname, '../dist' );
const rootDir = process.cwd();
const themeName = 'goc';

export default {
	themeName: themeName,
	mode: mode,
	assets: assets,
	dist: dist,
	rootDir: rootDir,
	publicPath: `/wp-content/themes/${themeName}/${path.basename( dist )}/`,
	sourceMaps: 'production' !== mode,
	assetsFilenames: 'production' !== mode ? '[name]_[hash]' : '[name]',
	postCss: {
		config: {
			path: `${build}/postcss.config.js`,
			ctx: {
				cssnano: {
					preset: [ 'default', { discardComments: { removeAll: true } } ],
				},
				cssnext: { warnForDuplicates: false },
				svgo: {},
			},
		},
		sourceMap: 'production' !== mode,
	},
};
