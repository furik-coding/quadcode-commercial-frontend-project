import styled from '@emotion/styled';
import { below } from 'styles/media';
import { animated } from 'react-spring';
import ContentWrapper from 'components/ContentWrapper';

export const LayoutWrapper = styled.div`
  display: flex;
  flex-direction: column;
  min-height: 100%;
  padding-top: ${({ needPadding, theme }) => (needPadding ? theme.header.desktopHeight : 0)}px;
  ${below.m3} {
    padding-top: ${({ needPadding, theme }) => (needPadding ? theme.header.mobileHeight : 0)}px;
  }
  color: ${({ theme }) => theme.mainColor};
  box-sizing: border-box;
`;

export const PagesWrapper = styled.div`
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  position: relative;
`;

export const LayoutContentWrapper = styled(ContentWrapper)`
  flex-grow: 1;
  position: relative;
`;

export const ComponentWrapper = styled(animated.div)`
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
`;
