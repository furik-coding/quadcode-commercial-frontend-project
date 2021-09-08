import styled from '@emotion/styled';
import { css, keyframes } from '@emotion/core';
import { below, above } from 'styles/media';

import ContentWrapper from 'components/ContentWrapper';

export const Content = styled(ContentWrapper)`
  z-index: 2;
  position: relative;
  height: 100%;
  display: flex;
  flex-direction: ${({ direction }) => direction || 'column'};
  justify-content: ${({ justifyContent }) => justifyContent || 'center'};
  align-items: ${({ alignItems }) => alignItems || 'flex-start'};

  ${below.m3} {
    flex-direction: column;
    align-items: flex-start;
  }
`;

export const SlideWrapper = styled.div`
  padding: 60px 0 60px;
  width: 100%;
  position: relative;
  //overflow-x: hidden;

  ${above.m4} {
    ${({ height }) => {
      if (height === '100vh') {
        return css`
          height: 100vh;
          min-height: calc(${8 / 16} * 100vw);
          max-height: calc(${9 / 16} * 100vw);
        `;
      }
      return null;
    }}
  }

  ${below.m3} {
    height: auto;
    padding: ${({ first }) => (first ? 90 : 0) + 60}px 0 40px; // высота хедера TODO
    overflow-y: visible;
  }

  ${({ color }) =>
    color === 'black' &&
    css`
      background: #090a0d;
    `}
  ${({ color }) =>
    color === 'white' &&
    css`
      background: white;
    `}
  box-sizing: border-box;
  //overflow: hidden;
`;

export const Title = styled.div`
  margin-bottom: 24px;
  max-width: 390px;
  font-size: 30px;
  line-height: 38px;
  color: white;
  font-weight: 700;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}s;

  ${below.m3} {
    font-size: 27px;
    line-height: 30px;
  }

  & b {
    font-weight: 700;
    color: #f1162f;
  }

  ${({ color }) =>
    color === 'black' &&
    css`
      color: #484c54;
    `}

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(0, 0, 0);
    `}
`;

export const Text = styled.div`
  max-width: 390px;
  font-size: 16px;
  line-height: 24px;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}s;

  ${below.m3} {
    font-size: 16px;
    line-height: 22px;
  }

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(0, 0, 0);
    `}
`;

export const GradientBox = styled.div`
  z-index: 1;
  position: absolute;
  width: 150%;
  height: 150%;
`;

export const animationbox = keyframes`
  from {
    transform: translate3d(0, 0, 0);
  }
  50% {
    transform: translate3d(-10%, 0, 0);
  }
  to {
    transform: translate3d(0, 0, 0);
  }
`;
