import { mode, assets, dist, sourceMaps, publicPath } from './webpack.settings.babel';
import plugins from './webpack.plugins.babel';
import rules from './webpack.rules.babel';

export default {
	context: `${assets}/`,
	entry: {
		app: [ './js/app.js', './scss/app.scss' ],
		login: [ './scss/login.scss' ],
	},
	output: {
		path: dist,
		publicPath: publicPath,
		filename: 'js/[name].js',
		library: 'EntryPoint',
	},
	performance: { hints: false },
	devtool: sourceMaps ? 'inline-source-map' : 'source-map',
	mode: mode,
	module: { rules: rules },
	resolve: { modules: [ assets, 'node_modules' ] },
	plugins: plugins,
	externals: { jquery: 'jQuery' },
	watch: true,
	watchOptions: { ignored: '/node_modules/' },
};
