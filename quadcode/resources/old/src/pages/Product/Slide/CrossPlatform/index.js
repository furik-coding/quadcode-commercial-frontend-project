import React, { useState } from 'react';
import i18n, { i18nHtml } from 'lib/i18n';

import TrackVisibility from 'react-visibility-sensor';

import {
  FlipIcon,
  SlideFourImageWrapper,
  IconsWrapper,
  PlatformIcon,
  StyloContent,
  SlideFourPicture,
  SlideFourImage,
  StyloSlide,
} from './styled';

import { Text, Title } from '../styled';

const imagePath = require.context('public/images/products/slide4');

const CrossPlatform = () => {
  const [visibility, setVisibility] = useState(false);

  return (
    <StyloSlide height="auto" color="white">
      <StyloContent direction="row" justifyContent="space-between" alignItems="center">
        <TrackVisibility onChange={(e) => e && setVisibility(e)}>
          <div>
            <Title active={visibility} color="black">
              {i18nHtml('products.performance.title')}
            </Title>
            <Text active={visibility}>{i18n('products.performance.text')}</Text>
            <IconsWrapper>
              <PlatformIcon delay={0.3} width={33} height={38} glyph="droid" active={visibility} />
              <PlatformIcon delay={0.5} width={33} height={40} glyph="apple" active={visibility} />
              <PlatformIcon delay={0.7} width={34} height={35} glyph="window" active={visibility} />
            </IconsWrapper>
          </div>
        </TrackVisibility>

        <SlideFourImageWrapper>
          <FlipIcon active={visibility} glyph="flip" />
          <SlideFourPicture
            srcList={[
              { x1: 'slide4-300@1x.png', w: '300', x2: 'slide4-300@2x.png' },
              { x1: 'slide4-480@1x.png', w: '480' },
              { x1: 'slide4-840@1x.png', w: '840' },
            ]}
            srcListWebp={[
              { x1: 'slide4-300@1x.webp', w: '300', x2: 'slide4-300@2x.webp' },
              { x1: 'slide4-480@1x.webp', w: '480' },
              { x1: 'slide4-840@1x.webp', w: '840' },
            ]}
            fallback="slide4-840@1x.png"
            pathSrc={imagePath}
          >
            {({ pathSrc, fallback, checkPath }) => (
              <SlideFourImage src={checkPath(fallback, pathSrc)} />
            )}
          </SlideFourPicture>
        </SlideFourImageWrapper>
      </StyloContent>
    </StyloSlide>
  );
};

export default CrossPlatform;
