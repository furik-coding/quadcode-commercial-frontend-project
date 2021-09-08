import styled from '@emotion/styled';
import { below } from 'styles/media';
import { css } from '@emotion/core';

import ContentWrapper from 'components/ContentWrapper';
import Icon from 'components/Icon';

export const SlideWrapper = styled.div`
  position: relative;
  padding-bottom: 140px;

  ${below.m3} {
    padding: 40px 0 70px;
  }
`;

export const Content = styled(ContentWrapper)`
  z-index: 2;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;

  ${below.m3} {
    align-items: flex-start;
  }
`;

export const Title = styled.div`
  margin-bottom: 86px;
  max-width: 650px;
  font-size: 30px;
  line-height: 38px;
  font-weight: 700;
  transform: translate3d(0, 30px, 0);
  opacity: 0;
  transition: opacity 0.3s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}s;
  text-align: center;
  color: #484c54;

  & b {
    font-weight: 700;
    color: #f1162f;
  }

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(0, 0, 0);
    `}

  ${below.m3} {
    font-size: 27px;
    line-height: 30px;
  }
`;

export const FeaturesWrapper = styled.div`
  display: flex;
  justify-content: space-around;
  width: 100%;

  ${below.m3} {
    flex-direction: column;
    align-items: center;
  }
`;

export const ItemWrapper = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: flex-start;

  ${below.m3} {
    margin-bottom: 40px;
  }

  ${below.m2} {
    justify-content: center;
    flex-direction: column;
  }
`;

export const Text = styled.div`
  margin-left: 28px;
  max-width: 200px;
  font-size: 16px;
  line-height: 24px;
  transform: translate3d(-30px, 0, 0);
  opacity: 0;
  transition: opacity 0.5s ease, transform 0.7s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

  ${({ active }) =>
    active &&
    css`
      &:nth-of-type(n) {
        opacity: 1;
        transform: translate3d(0, 0, 0);
      }
    `}

  ${below.m3} {
    font-size: 16px;
    line-height: 22px;
  }

  ${below.m2} {
    transform: translate3d(0, -30px, 0);
    margin-left: 0;
    text-align: center;
  }
`;

export const StyloIcon = styled(Icon)`
  width: ${({ width }) => width && width}px;
  height: ${({ height }) => height}px;
  transform: scale(0.5);
  opacity: 0;
  transition: opacity 0.25s ease, transform 0.3s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

  ${below.m2} {
    margin-bottom: 18px;
  }

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: scale(1);
    `}
`;
