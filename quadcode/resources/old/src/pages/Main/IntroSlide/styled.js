import styled from '@emotion/styled';
import { above, below } from 'styles/media';
import { css } from '@emotion/core';

import ContentWrapper from 'components/ContentWrapper';
import Icon from 'components/Icon';
import LangLink from 'components/LangLink';

export const ArrowIcon = styled(Icon)`
  display: inline-block;
  vertical-align: middle;
  width: 12px;
  height: 18px;
  margin-left: 14px;
  color: #f1162f;
  transition: transform 0.1s ease-in;
`;

export const SpecsButton = styled(LangLink)`
  font-size: 16px;
  line-height: 23px;
  color: #4a90e2;
  text-decoration: none;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

  &:hover {
    opacity: 0.85;

    ${ArrowIcon} {
      transform: scale3d(1.2, 1.2, 1.2);
    }
  }

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(0, 0, 0);
    `}
`;

export const SlideWrapper = styled.div`
  position: relative;
  padding: 120px 0 80px;
  height: 870px;

  ${below.m4} {
    height: auto;
    padding-top: ${70 + 60}px;
    padding-bottom: 450px;
  }
`;

export const Content = styled(ContentWrapper)`
  position: relative;
  height: 100%;
  box-sizing: border-box;
  z-index: 2;
  margin-bottom: 10px;

  ${above.m4} {
    margin-top: 160px;
  }
`;

export const Title = styled.div`
  margin-bottom: 24px;
  max-width: 380px;
  font-size: 30px;
  line-height: 38px;
  color: white;
  font-weight: 700;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

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
  max-width: 380px;
  margin-bottom: 20px;
  font-size: 16px;
  line-height: 24px;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

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

export const Image = styled.img`
  position: absolute;
  width: 760px;
  left: 50%;
  height: auto;
  transform: translate3d(-10%, -5%, 0);
  transition: opacity 0.5s ease, transform 0.6s ease ${({ delay }) => delay || 0}ms;
  opacity: 0;

  ${above.m4} {
    width: 1440px;
    top: 120px;
    left: 50%;
    bottom: auto;
    transform: translate3d(100px, -15%, 0);
  }

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(-35%, 0, 0);

      ${above.m4} {
        transform: translate3d(-100px, 0, 0);
      }

      ${above.m5} {
        transform: translate3d(-140px, 0, 0);
      }

      ${above.m6} {
        transform: translate3d(-280px, 0, 0);
      }
    `}
`;
