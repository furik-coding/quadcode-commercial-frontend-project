import React, { useState } from 'react';

import VisibilitySensor from 'react-visibility-sensor';

import i18n, { i18nHtml } from 'lib/i18n';

import {
  SlideWrapper,
  Content,
  Title,
  ItemWrapper,
  Text,
  FeaturesWrapper,
  StyloIcon,
} from './styled';

const features = [
  { text: 'main.features.item1.text', icon: 'interface' },
  { text: 'main.features.item2.text', icon: 'solution' },
  { text: 'main.features.item3.text', icon: 'customization' },
];

const FeaturesSlide = () => {
  const [visibility, changeVisibility] = useState(false);

  return (
    <SlideWrapper>
      <Content>
        <VisibilitySensor onChange={(e) => e && changeVisibility(e)}>
          <>
            <Title active={visibility} color="black">
              {i18nHtml('main.features.title')}
            </Title>

            <FeaturesWrapper>
              {features.map((item, idx) => (
                <ItemWrapper key={idx}>
                  <StyloIcon
                    delay={idx * 200}
                    glyph={item.icon}
                    active={visibility}
                    height={55}
                    width={55}
                  />
                  <Text delay={idx * 200 + 500} active={visibility}>
                    {i18n(item.text)}
                  </Text>
                </ItemWrapper>
              ))}
            </FeaturesWrapper>
          </>
        </VisibilitySensor>
      </Content>
    </SlideWrapper>
  );
};

export default FeaturesSlide;
