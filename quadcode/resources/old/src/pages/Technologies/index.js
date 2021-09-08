import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import Helmet from 'react-helmet';

import i18n from 'lib/i18n';
import ContentWrapper from 'components/ContentWrapper';

import data from './data';

import {
  Title,
  Block,
  BlockItem,
  BlockTitle,
  ContentWrapperStylo,
  Intro,
  IntroBgPicture,
  IntroBgImage,
  IntroText,
  ListTechnologies,
  TechnologiesWrapper,
} from './styled';

const imagePath = require.context('public/images/technologies/bg');

const renderIntroText = (intro = true) => (
  <ContentWrapperStylo intro={intro}>
    <Title>{i18n('technologies.title')}</Title>
    <IntroText>{i18n('technologies.description')}</IntroText>
  </ContentWrapperStylo>
);

const Technologies = ({ onLoaded }) => {
  useEffect(() => {
    onLoaded('technologies');
  }, []);

  return (
    <TechnologiesWrapper>
      <Helmet>
        <title>{i18n('menu.technologies')}</title>
      </Helmet>
      <Intro>
        <IntroBgPicture
          srcList={[
            { x1: 'bg-840@1x.jpeg', w: '200', x2: 'bg-840@2x.jpeg' },
            { x1: 'bg-1280@1x.jpeg', w: '840', x2: 'bg-1280@2x.jpeg' },
            { x1: 'bg-1440@1x.jpeg', w: '1440', x2: 'bg-1440@2x.jpeg' },
          ]}
          srcListWebp={[
            { x1: 'bg-840@1x.webp', w: '200', x2: 'bg-840@2x.webp' },
            { x1: 'bg-1280@1x.webp', w: '840', x2: 'bg-1280@2x.webp' },
            { x1: 'bg-1440@1x.webp', w: '1440', x2: 'bg-1440@2x.webp' },
          ]}
          pathSrc={imagePath}
          fallback="bg-1440@2x.jpeg"
        >
          {({ fallback, pathSrc, checkPath }) => (
            <IntroBgImage src={checkPath(fallback, pathSrc)} />
          )}
        </IntroBgPicture>
        {renderIntroText()}
      </Intro>
      <ContentWrapper>
        {renderIntroText(false)}
        <ListTechnologies>
          {data.map(({ key, items }) => (
            <Block key={key}>
              <BlockTitle>{i18n(`technologies.${key}.title`)}</BlockTitle>
              {Array(items)
                .fill()
                .map((val, index) => (
                  <BlockItem key={index}>{i18n(`technologies.${key}.item-${index + 1}`)}</BlockItem>
                ))}
            </Block>
          ))}
        </ListTechnologies>
      </ContentWrapper>
    </TechnologiesWrapper>
  );
};

Technologies.propTypes = {
  onLoaded: PropTypes.func,
};

Technologies.defaultProps = {
  onLoaded: () => null,
};

export default Technologies;
