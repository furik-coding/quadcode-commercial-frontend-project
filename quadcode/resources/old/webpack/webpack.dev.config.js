const path = require('path');
const webpack = require('webpack');
const merge = require('webpack-merge');
const common = require('./webpack.common.config');
const lib = require('./lib');

module.exports = merge(common.default, {
  mode: 'development',
  entry: ['@babel/polyfill', 'react-dev-utils/webpackHotDevClient', './src'],
  devtool: 'cheap-module-eval-source-map',
  plugins: [
    // Позволяет передавать в html параметры process.env.VARIABLE
    new webpack.EnvironmentPlugin({
      NODE_ENV: 'development',
      BROWSER: true,
    }),
  ],
  module: {
    rules: [
      lib.FaviconLoader(),
      lib.BabelLoader(),
      lib.CssLoader(),
      lib.ImageLoader(),
      lib.FontLoader(),
      lib.SvgLoaderDev(),
    ],
  },
  devServer: {
    contentBase: path.join(__dirname, '../dist'),
    port: 9000,
    publicPath: '/',
    historyApiFallback: true,
    allowedHosts: ['dev.quadcode.com'],
    stats: {
      assets: false,
      modules: false,
    },
  },
});
