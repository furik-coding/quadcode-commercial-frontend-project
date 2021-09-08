const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const ImageminWebpWebpackPlugin = require('imagemin-webp-webpack-plugin');
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer');

const lib = require('./lib');

module.exports.default = {
  entry: './src/index.js',
  output: {
    filename: 'assets/js/[name].bundle.[hash:10].js',
    chunkFilename: 'assets/js/[name].bundle.[chunkhash:10].js',
    publicPath: '/',
    path: path.resolve(__dirname, '../dist'),
  },
  plugins: [
    // Удаляем папку с билдом перед новым билдом или запуском
    new CleanWebpackPlugin(),
    new HtmlWebpackPlugin({
      template: './index.ejs',
      inject: false,
      minify: {
        minifyCSS: true,
        minifyJS: {},
      },
    }),
    new ImageminWebpWebpackPlugin({
      config: [
        {
          test: /\.(jpeg|jpg|png)/,
          options: {
            quality: 85,
          },
        },
      ],
      overrideExtension: true,
      detailedLogs: true,
      silent: false,
      strict: true,
    }),
    // Плагин для работы со спрайтами
    new SpriteLoaderPlugin({ plainSprite: true }),
    /* new BundleAnalyzerPlugin(), */
  ],
  resolve: lib.resolve(),
};
