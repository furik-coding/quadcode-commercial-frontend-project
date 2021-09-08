import styled from '@emotion/styled';
import { css } from '@emotion/core';
import { below, above } from 'styles/media';

import ContentWrapper from 'components/ContentWrapper';
import LogoBrand from 'components/LogoBrand';
import SafeTag from 'components/SafeTag';
import Menu, { MenuLink as MenuItem } from 'components/Menu';
import Lang from 'components/Lang';
import Burger from 'images/common/burger.svg';

export const HeaderWrapper = styled(SafeTag)`
  z-index: 10;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background-color: ${({ bg }) => (bg ? '#fff' : 'transparent')};
  height: ${({ theme }) => theme.header.desktopHeight}px;
  ${below.m3} {
    height: ${({ theme }) => theme.header.mobileHeight}px;
  }
  display: flex;
  align-items: center;
  justify-content: center;

  ${({ init }) =>
    init &&
    css`
      transition: background-color 0.3s ease-in-out;
    `}
`;

export const Logo = styled(LogoBrand)`
  width: 133px;
  height: 43px;

  ${above.m4} {
    width: 177px;
    height: 56px;
  }

  ${above.m5} {
    width: 67px;
  }

  ${above.m6} {
    width: 177px;
  }
`;

export const HeaderMenu = styled(Menu)`
  position: absolute;
  left: 50%;
  transform: translate3d(-50%, 0, 0);

  ${below.m4} {
    display: none;
  }
`;

export const MenuLink = styled(MenuItem)`
  font-weight: 500;
  margin-right: 40px;

  &:last-child {
    margin-right: 0;
  }
`;

export const CenterWrapper = styled(ContentWrapper)`
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  flex-grow: 1;
  height: 100%;
`;

export const HeaderLang = styled(Lang)`
  padding: 13px 0;

  ${below.m4} {
    display: none;
  }
`;

export const BurgerIcon = styled(Burger)`
  width: 26px;
  height: 24px;
  cursor: pointer;
  color: ${({ theme }) => theme.activeColor};

  ${above.m5} {
    display: none;
  }
`;
