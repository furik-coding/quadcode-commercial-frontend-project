import styled from '@emotion/styled';
import { above } from 'styles/media';

import Menu, { MenuLink as MenuItem } from 'components/Menu';
import Close from 'images/common/close.svg';
import LangItem from '../Lang/LangItem';

export const SidebarWrapper = styled.div`
  background-color: #fff;
  position: fixed;
  top: 0;
  bottom: 0;
  right: 0;
  z-index: 10;
  width: 300px;
  transform: translateX(${({ show }) => (show ? 0 : '100%')});
  box-shadow: ${({ show }) =>
    show ? '-3px 0 8px 0 rgba(0, 0, 0, 0.1)' : '0 0 0 0 rgba(0, 0, 0, 0)'};

  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: flex;
  flex-direction: column;

  ${above.m5} {
    display: none;
  }
`;

export const SidebarMenu = styled(Menu)`
  display: flex;
  flex-direction: column;
  margin-top: 100px;
  margin-left: 38px;
  align-items: flex-start;
`;

const colors = (theme) => ({
  white: theme.mainColor,
  black: theme.mainDarkColor,
  true: theme.mainColor, // for true value
});

export const MenuLink = styled(MenuItem)`
  color: ${({ active, theme, mode }) => (active ? theme.activeColor : colors(theme)[mode])};
  font-weight: 500;
  text-decoration: none;
  margin-bottom: 18px;

  transition: color 0.2s ease-in-out;
`;

export const CloseIcon = styled(Close)`
  position: absolute;
  width: 20px;
  height: 20px;
  top: 30px;
  right: 30px;
  color: ${({ theme }) => theme.activeColor};

  cursor: pointer;
`;

export const LangItemStyled = styled(LangItem)``;

export const MobileLang = styled.div`
  position: relative;
  margin-top: auto;
  margin-left: 38px;
  margin-bottom: 50px;
`;

export const NativeSelect = styled.select`
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
`;
