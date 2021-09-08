const merge = require('webpack-merge');
const webpack = require('webpack');
const TerserPlugin = require('terser-webpack-plugin');
const common = require('./webpack.common.config');
const lib = require('./lib');

module.exports = merge(common.default, {
  mode: 'production',
  plugins: [
    // Позволяет передавать в html параметры process.env.VARIABLE
    new webpack.EnvironmentPlugin({
      NODE_ENV: 'production',
      BROWSER: true,
    }),
  ],
  optimization: {
    minimize: true,
    minimizer: [
      new TerserPlugin({
        parallel: true,
        terserOptions: {},
      }),
    ],
  },
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
});
