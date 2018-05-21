import webpack from 'webpack';
import CleanWebpackPlugin from 'clean-webpack-plugin';
import CopyWebpackPlugin from 'copy-webpack-plugin';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import ImageminPlugin from 'imagemin-webpack-plugin';
import imageminMozjpeg from 'imagemin-mozjpeg';
import FriendlyErrorsWebpackPlugin from 'friendly-errors-webpack-plugin';

import { rootDir, dist, assetsFilenames, mode } from './webpack.settings.babel';

const plugins = [
	new CleanWebpackPlugin( [ dist ], {
		root: rootDir,
		verbose: false,
		watch: false, // Possibly change to true when hashing is `hashed` out.
	} ),
	new webpack.ProvidePlugin( {
		$: 'jquery',
		jQuery: 'jquery',
		'window.jQuery': 'jquery',
		Popper: 'popper.js/dist/umd/popper.js',
	} ),
	new CopyWebpackPlugin( [ {
		from: 'img/**/*',
		to: `[path]${assetsFilenames}.[ext]`,
	} ] ),
	new ImageminPlugin( {
		test: /\.(jpe?g|png|gif|svg)$/i,
		plugins: [
			imageminMozjpeg( {
				quality: 80,
				progressive: true,
			} ),
		],
	} ),
	new MiniCssExtractPlugin( {
		filename: 'css/[name].css',
		allChunks: true,
	} ),
	new FriendlyErrorsWebpackPlugin(),
];

if ( 'production' === mode ) {
	plugins.push( new webpack.NoEmitOnErrorsPlugin() );
}

export default plugins;
