const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );

module.exports = {
	entry: './src/index.js',
	output: {
		path: path.resolve( __dirname, 'themes/portfolio' ),
		filename: 'script.js',
	},
	module: {
		rules: [
			{
				test: /\.s[ac]ss$/i,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					{
						loader: 'sass-loader',
						options: { api: 'modern' },
					},
				],
			},
			{
				test: /\.css$/i,
				use: [ MiniCssExtractPlugin.loader, 'css-loader' ],
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin( { filename: 'style.css' } ),
	],
};