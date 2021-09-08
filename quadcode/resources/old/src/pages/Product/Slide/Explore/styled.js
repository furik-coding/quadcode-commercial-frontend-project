import styled from '@emotion/styled';
import { css } from '@emotion/core';
import { below } from 'styles/media';

import Picture from 'components/Picture';
import ScrollButton from 'components/ScrollButton';
import Slide from '../index';

import { animationbox, GradientBox, Title, Content } from '../styled';

export const StyloSlide = styled(Slide)`
  padding-top: 150px;
`;

export const SlideOneImage = styled(Picture)`
  width: 100%;
  right: -35%;
  height: auto;
  position: absolute;
  transform: translate3d(30%, -30%, 0);
  opacity: 0;
  transition: transform 0.5s ease, opacity 0.5s ease;

  ${({ active }) =>
    active &&
    css`
      transform: translate3d(0, 0, 0);
      opacity: 1;
      ${below.m3} {
        transform: translate3d(10%, 0, 0);
      }
    `}
  ${below.m5} {
    right: -45%;
  }
  ${below.m3} {
    width: 550px;
    position: relative;
    right: auto;
  }

  img {
    width: 100%;
  }
`;

export const StyloTitle = styled(Title)`
  ${below.m3} {
    text-align: center;
  }
`;

export const StyloContent = styled(Content)`
  ${below.m3} {
    align-items: center;
  }
`;
export const StyloScrollButton = styled(ScrollButton)`
  color: #ffffff;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}s;
  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(0, 0, 0);
    `}
`;

export const GradientBox1 = styled(GradientBox)`
  top: -100%;
  right: -50%;
  height: 200%;
  background: radial-gradient(21% 20%, #566275b8 0%, rgba(16, 23, 29, 0) 217%);
  transition: transform 2s ease-out;
  transform: scale3d(2, 2, 2);
  animation: ${animationbox} 4s infinite ease;
`;
