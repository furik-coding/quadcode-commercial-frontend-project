import { css } from '@emotion/core';
import emotionNormalize from 'emotion-normalize';

const context = require.context('fonts');

const getFonts = (familyName, fontName, ext) => context(`./${familyName}/${fontName}.${ext}`);

const fontFace = (familyName, fontName, fontWeight) => css`
  @font-face {
    font-family: ${familyName};
    src: url(${getFonts(familyName, fontName, 'eot')});
    src: url(${getFonts(familyName, fontName, 'eot')}) format('embedded-opentype'),
      url(${getFonts(familyName, fontName, 'woff2')}) format('woff2'),
      url(${getFonts(familyName, fontName, 'woff')}) format('woff'),
      url(${getFonts(familyName, fontName, 'ttf')}) format('truetype');
    font-weight: ${fontWeight};
    font-style: normal;
  }
`;

export const globalStyles = css`
  ${emotionNormalize};

  html {
    height: 100%;
  }

  body {
    height: 100%;
    font-family: ProximaNova, sans-serif;
    font-size: 16px;
    line-height: 22px;
    font-weight: 400;
  }

  body {
    min-width: 320px;
    max-width: 100vw;
    overflow-x: hidden;
    margin: 0 !important;
  }

  #root {
    height: 100%;
  }

  ${fontFace('ProximaNova', 'ProximaNova-Light', 300)};
  ${fontFace('ProximaNova', 'ProximaNova-Regular', 400)};
  ${fontFace('ProximaNova', 'ProximaNova-Medium', 500)};
  ${fontFace('ProximaNova', 'ProximaNova-Semibold', 600)};
  ${fontFace('ProximaNova', 'ProximaNova-Bold', 700)};
  ${fontFace('Coda', 'coda-v15-latin-regular', 400)};
  ${fontFace('Coda', 'coda-v15-latin-800', 800)};
`;
