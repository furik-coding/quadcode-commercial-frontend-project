import React, { useState } from 'react';
import VisibilitySensor from 'react-visibility-sensor';

import i18n from 'lib/i18n';

import {
  PoweredByWrapper,
  Content,
  PoweredByPicture,
  PoweredByImage,
  XTradeLogo,
  IqLogo,
  LogoWrapper,
  Text,
  PoweredByIcon,
} from './styled';

['iq', '8x', 'poweredby'].map((item) => import(`public/images/footer/${item}.svg`));

const platformImageSrc = require.context('public/images/footer/platform');

const PoweredBy = () => {
  const [visibility, changeVisibility] = useState(false);

  return (
    <PoweredByWrapper>
      <PoweredByPicture
        srcList={[
          { x1: 'platform-840@1x.jpeg', w: '280', x2: 'platform-840@2x.jpeg' },
          { x1: 'platform-1280@1x.jpeg', w: '600', x2: 'platform-1280@2x.jpeg' },
          { x1: 'platform-1440@1x.jpeg', w: '1440', x2: 'platform-1440@2x.jpeg' },
        ]}
        srcListWebp={[
          { x1: 'platform-840@1x.webp', w: '280', x2: 'platform-840@2x.webp' },
          { x1: 'platform-1280@1x.webp', w: '600', x2: 'platform-1280@2x.webp' },
          { x1: 'platform-1440@1x.webp', w: '1440', x2: 'platform-1440@2x.webp' },
        ]}
        fallback="platform-1440@2x.jpeg"
        pathSrc={platformImageSrc}
      >
        {({ checkPath, fallback, pathSrc }) => (
          <PoweredByImage src={checkPath(fallback, pathSrc)} />
        )}
      </PoweredByPicture>
      <Content>
        <VisibilitySensor onChange={(e) => e && changeVisibility(e)}>
          <>
            <PoweredByIcon active={visibility} glyph="poweredby" />
            <Text delay={400} active={visibility}>
              {i18n('main.poweredby.text')}
            </Text>
            <LogoWrapper>
              <XTradeLogo delay={1000} active={visibility} glyph="8x" />
              <IqLogo delay={1000} active={visibility} glyph="iq" />
            </LogoWrapper>
          </>
        </VisibilitySensor>
      </Content>
    </PoweredByWrapper>
  );
};

export default PoweredBy;
