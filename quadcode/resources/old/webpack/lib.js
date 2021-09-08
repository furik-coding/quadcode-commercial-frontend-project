const path = require('path');

const rootPath = path.resolve(__dirname, '../');
const resolve = (p) => path.resolve(rootPath, p);

module.exports = {
  FaviconLoader: () => ({
    test: /favicon\//,
    loader: 'file-loader',
    options: {
      name: 'assets/favicon/[name].[md5:hash:hex:10].[ext]',
    },
  }),
  BabelLoader: () => ({
    test: /\.js$/,
    exclude: /node_modules/,
    loader: 'babel-loader',
  }),
  CssLoader: () => ({
    test: /\.css$/,
    use: ['style-loader', 'css-loader', 'postcss-loader'],
  }),
  ImageLoader: () => ({
    test: /\.(gif|jpeg|jpg|png|webp)$/,
    loader: 'file-loader',
    exclude: path.resolve(__dirname, '../src/public/favicon'),
    options: {
      name: 'images/[folder]/[name].[md5:hash:hex:10].[ext]',
      outputPath: 'assets',
    },
  }),
  FontLoader: () => ({
    test: /\.(eot|woff|woff2|ttf)$/,
    loader: 'file-loader',
    options: {
      name: 'fonts/[folder]/[name].[md5:hash:hex:10].[ext]',
      outputPath: 'assets',
    },
  }),
  SvgLoaderDev: () => ({
    test: /\.svg$/,
    exclude: path.resolve(__dirname, '../src/public/favicon'),
    use: [
      {
        loader: 'babel-loader',
      },
      {
        loader: 'svg-sprite-loader',
        options: {
          runtimeGenerator: require.resolve(
            '../src/lib/svg-to-icon-component-runtime-generator.js',
          ),
          runtimeOptions: {
            iconModule: '../src/components/Icon/index.js',
          },
        },
      },
    ],
  }),
  resolve: () => ({
    extensions: ['.js', '.css'],
    modules: ['node_modules', 'src'],
    alias: {
      layout: resolve('src/layout'),
      pages: resolve('src/pages'),
      components: resolve('src/components'),
      lib: resolve('src/lib'),
      images: resolve('src/public/images'),
      styles: resolve('src/styles'),
      fonts: resolve('src/public/fonts'),
      config: resolve('src/config'),
    },
    symlinks: false,
  }),
  publicPathToFolder: (folder) => resolve(`src/public/${folder}`),
};
