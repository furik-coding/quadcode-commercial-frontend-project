import React, { useState } from 'react';
import i18n, { i18nHtml } from 'lib/i18n';

import TrackVisibility from 'react-visibility-sensor';

import { SlideTwoImage, StyloSlide, StyloText, StyloContent, GradientBox2 } from './styled';
import { Title } from '../styled';

const imagePath = require.context('public/images/products/slide2');

const Multitool = () => {
  const [visibility, setVisibility] = useState(false);

  return (
    <StyloSlide color="black">
      <StyloContent justifyContent="flex-start" alignItems="flex-end">
        <TrackVisibility partialVisibility="bottom" onChange={(e) => e && setVisibility(e)}>
          <div>
            <Title color="white" delay={0.2} active={visibility}>
              {i18nHtml('products.environment.title')}
            </Title>
            <StyloText delay={0.2} active={visibility}>
              {i18n('products.environment.text')}
            </StyloText>
          </div>
        </TrackVisibility>
      </StyloContent>
      <GradientBox2 />
      <SlideTwoImage
        srcList={[
          // { x1: 'slide2-300@1x.png', w: '200', x2: 'slide2-300@2x.png' },
          // { x1: 'slide2-480@1x.png', w: '200', x2: 'slide2-480@2x.png' },
          { x1: 'slide2-840@1x.png', w: '240', x2: 'slide2-840@2x.png' },
          { x1: 'slide2-1280@1x.png', w: '840', x2: 'slide2-1280@2x.png' },
          { x1: 'slide2-1440@1x.png', w: '1440', x2: 'slide2-1440@2x.png' },
        ]}
        srcListWebp={[
          // { x1: 'slide2-300@1x.webp', w: '200', x2: 'slide2-300@2x.webp' },
          // { x1: 'slide2-480@1x.webp', w: '200', x2: 'slide2-480@2x.webp' },
          { x1: 'slide2-840@1x.webp', w: '200', x2: 'slide2-840@2x.webp' },
          { x1: 'slide2-1280@1x.webp', w: '840', x2: 'slide2-1280@2x.webp' },
          { x1: 'slide2-1440@1x.webp', w: '1440', x2: 'slide2-1440@2x.webp' },
        ]}
        pathSrc={imagePath}
        fallback="slide2-1440@2x.png"
        active={visibility}
      />
    </StyloSlide>
  );
};

export default Multitool;
