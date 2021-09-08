import styled from '@emotion/styled';
import { css } from '@emotion/core';
import { below } from 'styles/media';

import Picture from 'components/Picture';

import Slide from '../index';
import { Text, Content, GradientBox, animationbox } from '../styled';

export const StyloContent = styled(Content)`
  height: auto;
`;

export const SlideTwoImage = styled(Picture)`
  z-index: 2;
  width: 100vw;
  bottom: 0;
  left: 0;
  height: auto;
  position: absolute;
  transform: translate3d(0, 50%, 0);
  opacity: 0;
  transition: transform 0.5s ease, opacity 0.5s ease;

  ${({ active }) =>
    active &&
    css`
      transform: translate3d(0, 0, 0);
      opacity: 1;
    `}

  ${below.m5} {
    margin-top: 20px;
    position: relative;
    width: 800px;
    bottom: -8px;
  }

  img {
    display: block;
    width: 100%;
    max-width: 2000px;
    z-index: 2;
    position: relative;

    ${below.m3} {
      margin-top: 20px;
      height: 238px;
      width: auto;
    }
  }
`;

export const StyloSlide = styled(Slide)`
  height: auto;
  padding-top: 150px;
  overflow: hidden;
  ${below.m3} {
    overflow-y: hidden;
    padding-bottom: 0;
  }
`;

export const StyloText = styled(Text)`
  color: white;
`;

export const GradientBox2 = styled(GradientBox)`
  position: absolute;
  width: 130%;
  bottom: -35%;
  right: 0;
  height: 130%;
  background: radial-gradient(21% 20%, #566275b8 0%, rgba(16, 23, 29, 0) 217%);
  transition: transform 2s ease-out;
  transform: scale3d(2, 2, 2);
  animation: ${animationbox} 4s infinite ease;
`;
