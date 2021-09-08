import styled from '@emotion/styled';
import { below } from 'styles/media';
import { css } from '@emotion/core';

import Picture from 'components/Picture';
import Feature from './Feature';
import Slide from '../index';

export const StyloPicture = styled(Picture)`
  img {
    height: 100%;
    width: auto;
  }
`;

export const SlideThreeWrapper = styled.div`
  width: auto;
  max-width: 804px;
  min-height: 600px;
  height: 804px;
  right: 15%;
  top: 50%;
  position: absolute;
  transform: translate3d(50%, 0, 0);
  opacity: 0;
  transition: transform 0.5s ease, opacity 0.5s ease;

  ${below.m5} {
    right: 10%;
    height: 616px;
    top: 50%;
  }
  ${below.m4} {
    right: 15%;
  }

  ${below.m3} {
    top: 0;
    right: auto;
  }

  ${({ active }) =>
    active &&
    css`
      transform: translate3d(50%, -50%, 0);
      opacity: 1;

      ${below.m6} {
        transform: translate3d(60%, -50%, 0);
      }

      ${below.m5} {
        transform: translate3d(70%, -50%, 0);
      }

      ${below.m4} {
        transform: translate3d(80%, -50%, 0);
      }

      ${below.m3} {
        transform: translate3d(25%, 10%, 0);
      }
    `}
`;
export const ImageMargin = styled.div`
  display: none;

  ${below.m3} {
    display: block;
    height: 400px;
    width: 100%;
  }
`;

export const Feature1 = styled(Feature)`
  top: 42.7%;
  right: 88.3%;

  ${below.m5} {
    width: 170px;
  }

  ${below.m3} {
    width: 200px;
  }
`;

export const Feature2 = styled(Feature)`
  top: 52.7%;
  right: 93.2%;
  width: 240px;

  ${below.m5} {
    width: 170px;
  }

  ${below.m3} {
    width: 185px;
  }
`;

export const Feature3 = styled(Feature)`
  width: 290px;
  top: 63.7%;
  right: 93%;

  ${below.m5} {
    right: 96%;
    width: 170px;
  }

  ${below.m3} {
    right: 95%;
    width: 190px;
  }
`;

export const StyloSlide = styled(Slide)`
  padding-top: 0;
`;
