import React, { useState, useEffect, useCallback } from 'react';
import PropTypes from 'prop-types';
import theme from 'styles/theme';

import { WithMedia } from 'components/MediaMatcher';
import Sidebar from 'components/Sidebar';

import i18n from 'lib/i18n';

import {
  HeaderWrapper,
  CenterWrapper,
  Logo,
  HeaderMenu,
  HeaderLang,
  MenuLink,
  BurgerIcon,
} from './styled';

const HEADER_BG_TOGGLE = 50;

const Header = ({ mode, forceHeaderBg }) => {
  const [sidebarVisibility, setSidebarVisibility] = useState(false);
  const [headerVisibility, setHeaderVisibility] = useState(forceHeaderBg);
  const [init, setInit] = useState(false);
  const forceMode = mode === 'black' && !headerVisibility && !forceHeaderBg ? 'black' : 'white';
  const brandColor = forceMode === 'black' ? theme.mainDarkColor : theme.mainColor;

  const handleScroll = useCallback(() => {
    if (window.pageYOffset > HEADER_BG_TOGGLE && !headerVisibility) {
      setHeaderVisibility(true);
    } else if (window.pageYOffset <= HEADER_BG_TOGGLE && headerVisibility) {
      setHeaderVisibility(false);
    }
  }, [headerVisibility]);

  useEffect(() => {
    if (process.env.BROWSER) {
      window.addEventListener('scroll', handleScroll);
      setInit(true);
      return () => window.removeEventListener('scroll', handleScroll);
    }
    return null;
  }, [handleScroll]);

  handleScroll();

  return (
    <HeaderWrapper mode={mode} init={init} bg={headerVisibility || forceHeaderBg}>
      <CenterWrapper>
        <WithMedia>
          {({ below, above }) => (
            <>
              <Logo
                logoColor={theme.activeColor}
                brandColor={brandColor}
                brand={above('m6') || below('m4')}
              />
            </>
          )}
        </WithMedia>
        <HeaderMenu>
          {({ title, url, active }) => (
            <MenuLink key={url} to={url} active={active} mode={forceMode}>
              {i18n(title)}
            </MenuLink>
          )}
        </HeaderMenu>
        <BurgerIcon onClick={() => setSidebarVisibility(!sidebarVisibility)} />
        <Sidebar show={sidebarVisibility} onClickClose={() => setSidebarVisibility(false)} />
        <HeaderLang mode={forceMode} />
      </CenterWrapper>
    </HeaderWrapper>
  );
};

Header.propTypes = {
  mode: PropTypes.oneOfType([PropTypes.bool, PropTypes.oneOf(['black', 'white'])]),
  forceHeaderBg: PropTypes.bool,
};

Header.defaultProps = {
  mode: 'white',
  forceHeaderBg: false,
};

export default Header;
