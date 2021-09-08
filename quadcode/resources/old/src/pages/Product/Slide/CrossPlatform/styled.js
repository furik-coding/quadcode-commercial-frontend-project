import styled from '@emotion/styled';
import { css } from '@emotion/core';
import Icon from 'components/Icon';
import Picture from 'components/Picture';
import { below } from 'styles/media';
import Slide from '../index';

import { Content } from '../styled';

export const SlideFourImageWrapper = styled.div`
  position: relative;
  width: 50%;
  height: auto;

  ${below.m3} {
    width: 160%;
    align-self: center;
    margin-top: 30px;
  }

  ${below.m5} {
    width: 70%;
  }
`;

export const FlipIcon = styled(Icon)`
  position: absolute;
  top: 26%;
  left: 49.6%;
  width: 4.8%;
  height: 5%;
  transition: transform 1s ease;

  ${({ active }) =>
    active &&
    css`
      transform: rotate(360deg);
    `}
`;

export const IconsWrapper = styled.div`
  display: flex;
  flex-direction: row;
  align-items: flex-end;
  margin-top: 30px;
`;

export const PlatformIcon = styled(Icon)`
  margin-right: 40px;
  width: ${({ width }) => width}px;
  height: ${({ height }) => height}px;
  opacity: 0;
  transform: translate3d(0, 15px, 0);
  transition: transform 0.2s ease-in, opacity 0.2s ease;
  transition-delay: ${({ delay }) => delay || 0}s;

  ${({ active }) =>
    active &&
    css`
      transform: translate3d(0, 0, 0);
      opacity: 1;
    `}
`;

export const StyloContent = styled(Content)`
  flex-direction: row-reverse;
  ${below.m3} {
    flex-direction: column;
  }
`;

export const SlideFourPicture = styled(Picture)``;

export const SlideFourImage = styled.img`
  width: 100%;
  height: auto;
`;

export const StyloSlide = styled(Slide)`
  padding: 60px 0;
`;
