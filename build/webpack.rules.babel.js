import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import { assets, assetsFilenames, sourceMaps, postCss } from './webpack.settings.babel';

const rules = [
	{
		enforce: 'pre',
		test: /\.js$/,
		include: assets,
		use: 'eslint-loader',
	}, {
		enforce: 'pre',
		test: /\.(js|s?[ca]ss)$/,
		include: assets,
		loader: 'import-glob-loader',
	},
	{
		test: /\.js$/,
		exclude: [ /node_modules(?![/|\\](bootstrap|foundation-sites))/ ],
		use: {
			loader: 'babel-loader',
			options: {
				presets: [ [ 'env', {
					'targets': {
						'browsers': [
							'last 2 versions',
							'Explorer 11',
							'safari >= 7',
						],
					},
				} ] ],
			},
		},
	},
	{
		test: /\.(ttf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
		include: assets,
		loader: 'url-loader',
		options: {
			limit: 4096,
			name: `[path]${assetsFilenames}.[ext]`,
		},
	},
	{
		test: /\.(ttf|eot|woff2?|png|jpe?g|gif|svg|ico)$/,
		include: /node_modules/,
		loader: 'url-loader',
		options: {
			limit: 4096,
			outputPath: 'vendor/',
			name: '[name]_[hash].[ext]',
		},
	},
	{
		test: /\.css$/,
		include: assets,
		use: [
			MiniCssExtractPlugin.loader,
			{ loader: 'cache-loader' },
			{ loader: 'css-loader', options: { sourceMap: sourceMaps } },
			{ loader: 'postcss-loader', options: postCss },
		],
	},
	{
		test: /\.scss$/,
		include: assets,
		use: [
			MiniCssExtractPlugin.loader,
			{ loader: 'cache-loader' },
			{ loader: 'css-loader', options: { sourceMap: sourceMaps } },
			{ loader: 'postcss-loader', options: postCss },
			{ loader: 'resolve-url-loader', options: { sourceMap: sourceMaps } },
			{ loader: 'sass-loader', options: { sourceMap: sourceMaps } },
		],
	},
];

export default rules;
