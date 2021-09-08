// Для WebStorm
const path = require('path');

const rootPath = path.resolve(__dirname, '../');
const resolve = (p) => path.resolve(rootPath, p);

module.exports = {
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
};
