const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const AssetsPlugin = require('assets-webpack-plugin');
const webpack = require('webpack');
const CleanPlugin = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

const extractSass = new ExtractTextPlugin({
  filename: 'css/[name].[hash].css',
  disable: process.env.NODE_ENV === 'development',
});

module.exports = {
  entry: {
    app: './resources/assets/index.js',
    admin: './resources/assets/admin.js',
    polyfills: './resources/assets/polyfills.js',
    editor: './resources/assets/editor.js',
  },
  output: {
    path: path.resolve('public/dist/'),
    filename: 'js/[name].[chunkhash].js',
    publicPath: '/dist/',
  },
  resolve: {
    extensions: ['.js', '.jsx'],
  },
  module: {
    loaders: [
      {
        test: /\.jsx?$/,
        loader: 'babel-loader',
        options: {
          plugins: ['babel-plugin-transform-class-properties'],
          presets: [
            ['env', { modules: false }],
          ],
        },
      },
      {
        test: /icons\.json$/,
        loaders: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            'css-loader',
            {
              loader: 'webfonts-loader',
              options: {
                fileName: 'fonts/[fontname].[hash].[ext]',
              },
            },
          ],
        }),
      },
      { test: /\.json$/, loaders: ['json-loader'] },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        options: {
          presets: [
            ['env', { modules: false }],
          ],
        },
        exclude: /node_modules/,
      },
      {
        test: /\.scss|.css$/,
        use: extractSass.extract({
          use: [
            'css-loader',
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: true,
              },
            },
            'resolve-url-loader',
            {
              loader: 'sass-loader',
              options: {
                sourceMap: true,
              },
            },
          ],
          fallback: 'style-loader',
        }),
      },
      {
        test: /\.(eot|woff|woff2|ttf)$/,
        exclude: [/resources\/assets\/images/],
        loader: 'file-loader',
        options: {
          name: 'fonts/[name].[hash].[ext]',
        },
      },
      {
        test: /\.(jpg|jpeg|gif|png|svg)/,
        exclude: [/node_modules/, /resources\/assets\/fonts/],
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'images/[name].[hash].[ext]',
            },
          },
        ],
      },
      {
        test: /\.html$/,
        use: 'raw-loader',
      },
    ],
  },
  plugins: [
    new CleanPlugin('./public/dist'),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
    }),
    extractSass,
    new AssetsPlugin({
      filename: 'manifest.json',
      path: path.resolve('public/dist/'),
    }),
    new CopyWebpackPlugin(
      [
        { from: './resources/assets/media', to: './media' },
      ],
      { copyUnmodified: false }
    ),
  ],
};
