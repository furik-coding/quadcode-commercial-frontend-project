import React, { useState } from 'react';

import TrackVisibility from 'react-visibility-sensor';
import i18n, { i18nHtml } from 'lib/i18n';

import {
  Feature1,
  Feature2,
  Feature3,
  SlideThreeWrapper,
  ImageMargin,
  StyloPicture,
  StyloSlide,
} from './styled';

import { Content, Text, Title } from '../styled';

const imagePath = require.context('public/images/products/slide3');

const Customization = () => {
  const [visibility, setVisibility] = useState(false);

  return (
    <StyloSlide height="100vh" color="white">
      <Content>
        <TrackVisibility onChange={(e) => e && setVisibility(e)}>
          <div>
            <Title delay={0.1} active={visibility} color="black">
              {i18nHtml('products.customization.title')}
            </Title>
            <Text delay={0.2} active={visibility}>
              {i18n('products.customization.text')}
            </Text>
          </div>
        </TrackVisibility>

        <ImageMargin />

        <SlideThreeWrapper delay={0.1} active={visibility}>
          <StyloPicture
            srcList={[
              // { x1: 'slide3-300@1x.png', w: '300', x2: 'slide3-300@2x.png' },
              // { x1: 'slide3-480@1x.png', w: '200', x2: 'slide3-480@2x.png' },
              { x1: 'slide3-840@1x.png', w: '200', x2: 'slide3-840@2x.png' },
              { x1: 'slide3-1280@1x.png', w: '1080', x2: 'slide3-1280@2x.png' },
              { x1: 'slide3-1440@1x.png', w: '1440', x2: 'slide3-1440@2x.png' },
            ]}
            srcListWebp={[
              // { x1: 'slide3-300@1x.webp', w: '300', x2: 'slide3-300@2x.webp' },
              // { x1: 'slide3-480@1x.webp', w: '200', x2: 'slide3-480@2x.webp' },
              { x1: 'slide3-840@1x.webp', w: '200', x2: 'slide3-840@2x.webp' },
              { x1: 'slide3-1280@1x.webp', w: '1080', x2: 'slide3-1280@2x.webp' },
              { x1: 'slide3-1440@1x.webp', w: '1440', x2: 'slide3-1440@2x.webp' },
            ]}
            fallback="slide3-1440@2x.png"
            pathSrc={imagePath}
          />

          <Feature1
            delay={0.7}
            active={visibility}
            text={i18n('products.customization.brand')}
            iconProps={{ width: 36, height: 32, glyph: 'custom_brand' }}
          />

          <Feature2
            delay={1.2}
            active={visibility}
            iconProps={{ width: 36, height: 36, glyph: 'paint' }}
            text={i18n('products.customization.color')}
          />

          <Feature3
            delay={1.5}
            active={visibility}
            iconProps={{ width: 21, height: 18, glyph: 'menu' }}
            text={i18n('products.customization.menu')}
          />
        </SlideThreeWrapper>
      </Content>
    </StyloSlide>
  );
};

export default Customization;
