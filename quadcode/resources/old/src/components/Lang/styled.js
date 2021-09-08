import styled from '@emotion/styled';

import SafeTag from 'components/SafeTag';
import ArrowDown from 'images/common/arrow_down.svg';
import LangItem from './LangItem';
import Dropdown from './Dropdown';

export const LangWrapper = styled(SafeTag)`
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-left: auto;
  color: ${({ mode, theme }) => (mode === 'black' ? theme.mainDarkColor : theme.mainColor)};
  padding-left: 10px;
  position: relative;
  font-size: 14px;
`;

export const LangItemStyled = styled(LangItem)`
  color: ${({ mode, theme }) => (mode === 'white' ? theme.mainColor : theme.mainDarkColor)};
  min-width: 120px;
`;

export const DropdownList = styled(Dropdown)`
  max-height: ${({ opened }) => (opened ? '320px' : 0)};
  transition: max-height 0.2s ease;
  overflow: hidden;
`;

export const Arrow = styled(ArrowDown)`
  width: 14px;
  height: 9px;
  margin-right: 10px;
  position: relative;

  transform-origin: center center;
  transform: rotate(${({ direction }) => direction * 180}deg);

  transition: transform 0.2s ease;
`;

export const ToggleWrapper = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  pointer-events: none;
`;
