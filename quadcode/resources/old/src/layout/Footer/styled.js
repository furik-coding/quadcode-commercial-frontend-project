import styled from '@emotion/styled';
import { above, below } from 'styles/media';
import { animated } from 'react-spring';
import { SafeTagHoc } from 'components/SafeTag';

import ContentWrapper from 'components/ContentWrapper';
import LogoBrand from 'components/LogoBrand';
import ScrollButton from 'components/ScrollButton';
import Menu, { MenuLink as MenuItem } from 'components/Menu';

export const FooterWrapper = styled(SafeTagHoc(animated.div))`
  margin-top: auto;
  padding-top: ${({ mode }) => (mode === 'poweredBy' ? 0 : 40)}px;
  background-color: #000;
  position: relative;
  z-index: 3;
`;

export const CenterWrapper = styled(ContentWrapper)`
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  min-height: 60px;

  ${below.m3} {
    flex-direction: column;
  }
`;

export const Logo = styled(LogoBrand)`
  width: 133px;
  height: 43px;
  margin: 22px 0;

  ${below.m3} {
    order: 2;
  }

  ${above.m4} {
    width: 67px;
    height: 56px;
    left: 0;
    margin: 0;
  }

  ${above.m6} {
    width: 177px;
  }
`;

export const MenuLink = styled(MenuItem)`
  font-weight: 500;
  color: ${({ active, theme }) => (active ? theme.activeColor : theme.mainDarkColor)};
  margin-right: 40px;

  &:last-child {
    margin-right: 0;
  }
`;

export const FooterMenu = styled(Menu)`
  position: absolute;
  left: 50%;
  transform: translate3d(-50%, 0, 0);

  ${below.m3} {
    display: none;
  }
`;

export const Copyright = styled.div`
  padding: 20px 0;
  color: ${({ theme }) => theme.mainColor};
  text-align: center;

  ${above.m4} {
    padding: 24px 0 55px;
  }
`;

export const ScrollButtonStyled = styled(ScrollButton)`
  color: #fff;
  margin-left: 8px;
`;
