import React, { useState } from 'react';
import VisibilitySensor from 'react-visibility-sensor';

import i18n, { i18nHtml } from 'lib/i18n';

import Picture from 'components/Picture';

import { SlideWrapper, Content, Title, Text, Image, ArrowIcon, SpecsButton } from './styled';

const imageSource = require.context('public/images/main/intro-img');

const IntroSlide = () => {
  const [visibility, changeVisibility] = useState(false);

  return (
    <SlideWrapper>
      <Content>
        <VisibilitySensor onChange={(e) => e && changeVisibility(e)}>
          <>
            <Title active={visibility} color="black">
              {i18nHtml('main.intro.title')}
            </Title>
            <Text delay={300} active={visibility}>
              {i18n('main.intro.text')}
            </Text>
            <SpecsButton delay={400} active={visibility} to="/technologies">
              {i18n('main.intro.specs')}
              <ArrowIcon glyph="arrow_right" />
            </SpecsButton>
          </>
        </VisibilitySensor>
      </Content>
      <Picture
        srcList={[
          { x1: 'intro-img-840@1x.png', w: '280', x2: 'intro-img-840@2x.png' },
          { x1: 'intro-img-1280@1x.png', w: '480', x2: 'intro-img-1280@2x.png' },
          { x1: 'intro-img-1440@1x.png', w: '840', x2: 'intro-img-1440@2x.png' },
        ]}
        srcListWebp={[
          { x1: 'intro-img-840@1x.webp', w: '280', x2: 'intro-img-840@2x.webp' },
          { x1: 'intro-img-1280@1x.webp', w: '480', x2: 'intro-img-1280@2x.webp' },
          { x1: 'intro-img-1440@1x.webp', w: '840', x2: 'intro-img-1440@2x.webp' },
        ]}
        fallback="intro-img-1440@2x.png"
        pathSrc={imageSource}
      >
        {({ fallback, checkPath, pathSrc }) => (
          <Image src={checkPath(fallback, pathSrc)} delay={100} active={visibility} />
        )}
      </Picture>
    </SlideWrapper>
  );
};

IntroSlide.propTypes = {};

export default IntroSlide;
