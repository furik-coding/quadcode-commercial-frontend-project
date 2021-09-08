const { stringifySymbol } = require('svg-sprite-loader/lib/utils');

const pascalCase = require('pascal-case');

module.exports = function runtimeGenerator({ symbol }) {
  const parentComponentDisplayName = 'SpriteSymbolComponent';
  const displayName = `Icon${pascalCase(symbol.id)}${parentComponentDisplayName}`;

  return `
    import React from 'react';
    import SpriteSymbol from 'svg-baker-runtime/browser-symbol.js';
    import sprite from 'svg-sprite-loader/runtime/browser-sprite.build.js';
    import Icon from 'components/Icon';
    
    const symbol = new SpriteSymbol(${stringifySymbol(symbol)});
    sprite.add(symbol);

    export default class ${displayName} extends React.Component {
      render() {
        return <Icon glyph="${symbol.id}" {...this.props} />;
      }
    }
  `;
};
