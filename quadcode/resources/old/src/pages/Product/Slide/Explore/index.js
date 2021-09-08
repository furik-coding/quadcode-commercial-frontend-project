import React, { useState } from 'react';
import { i18nHtml } from 'lib/i18n';

import TrackVisibility from 'react-visibility-sensor';

import {
  StyloSlide,
  SlideOneImage,
  GradientBox1,
  StyloTitle,
  StyloContent,
  StyloScrollButton,
} from './styled';

const imagePath = require.context('public/images/products/slide1');

const Explore = () => {
  const [visibility, setVisibility] = useState(false);

  return (
    <StyloSlide first color="black">
      <StyloContent>
        <TrackVisibility onChange={(e) => e && setVisibility(e)}>
          <StyloTitle delay={0.5} active={visibility}>
            {i18nHtml('products.intro.title')}
          </StyloTitle>
        </TrackVisibility>
        <TrackVisibility onChange={(e) => e && setVisibility(e)}>
          <StyloScrollButton delay={0.7} active={visibility} scrollFactor={1} />
        </TrackVisibility>

        <SlideOneImage
          active={visibility}
          srcList={[
            { x1: 'slide1-840@1x.png', w: '200', x2: 'slide1-840@2x.png' },
            { x1: 'slide1-1280@1x.png', w: '840', x2: 'slide1-1280@2x.png' },
            { x1: 'slide1-1440@1x.png', w: '1440', x2: 'slide1-1440@2x.png' },
          ]}
          srcListWebp={[
            { x1: 'slide1-840@1x.webp', w: '200', x2: 'slide1-840@2x.webp' },
            { x1: 'slide1-1280@1x.webp', w: '840', x2: 'slide1-1280@2x.webp' },
            { x1: 'slide1-1440@1x.webp', w: '1440', x2: 'slide1-1440@2x.webp' },
          ]}
          fallback="slide1-1440@2x.png"
          pathSrc={imagePath}
        />
      </StyloContent>
      <GradientBox1 />
    </StyloSlide>
  );
};

export default Explore;
