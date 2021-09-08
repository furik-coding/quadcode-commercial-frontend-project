import React from 'react';
import PropTypes from 'prop-types';

import { WithMedia } from 'components/MediaMatcher';
import i18n from 'lib/i18n';
import PoweredBy from './PoweredBy';

import {
  CenterWrapper,
  Copyright,
  FooterMenu,
  FooterWrapper,
  Logo,
  MenuLink,
  ScrollButtonStyled,
} from './styled';

const Footer = ({ mode, style }) => (
  <FooterWrapper mode={mode} style={style}>
    {mode === 'poweredBy' && <PoweredBy />}
    <CenterWrapper>
      <WithMedia>
        {({ below, above }) => (
          <Logo logoColor="#fff" brandColor="#fff" brand={above('m6') || below('m3')} />
        )}
      </WithMedia>
      <ScrollButtonStyled direction="up" />
      <FooterMenu mode="black">
        {({ title, url, active }) => (
          <MenuLink key={url} to={url} active={active} mode="black">
            {i18n(title)}
          </MenuLink>
        )}
      </FooterMenu>
    </CenterWrapper>
    <Copyright>Quadcode, © 2019</Copyright>
  </FooterWrapper>
);

Footer.propTypes = {
  mode: PropTypes.oneOfType([PropTypes.bool, PropTypes.oneOf(['poweredBy'])]),
  // eslint-disable-next-line react/forbid-prop-types
  style: PropTypes.object,
};

Footer.defaultProps = {
  mode: false,
  style: {},
};

export default Footer;
