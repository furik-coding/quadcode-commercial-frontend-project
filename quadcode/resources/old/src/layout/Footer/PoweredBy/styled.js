import styled from '@emotion/styled';
import { above, below } from 'styles/media';
import { css } from '@emotion/core';

import ContentWrapper from 'components/ContentWrapper';
import Picture from 'components/Picture';
import Icon from 'components/Icon';

export const PoweredByWrapper = styled.div`
  position: relative;
  padding-top: 270px;
  padding-bottom: 100px;
  background: #000;

  ${above.m3} {
    overflow-x: hidden;
    padding-top: 450px;
    padding-bottom: 80px;
  }
`;

export const Content = styled(ContentWrapper)`
  z-index: 2;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;

  ${below.m3} {
    align-items: center;
  }
`;

export const PoweredBy = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 270px;
  padding-bottom: 100px;
  position: relative;

  ${above.m3} {
    padding-top: 450px;
  }
`;

export const PoweredByPicture = styled(Picture)`
  width: 100%;
  position: absolute;
  top: 0;
  height: 235px;
  overflow: hidden;

  ${above.m3} {
    height: 600px;
  }
`;

export const PoweredByImage = styled.img`
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 800px;

  ${above.m3} {
    width: 1280px;
  }
`;

export const LogoWrapper = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;

  ${below.m3} {
    flex-direction: column;
  }
`;

export const XTradeLogo = styled(Icon)`
  width: 185px;
  height: 28px;
  margin-right: 100px;

  transform: translateY(-30px);
  opacity: 0;
  transition: opacity 0.5s ease, transform 1s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translateY(0);
    `}

  ${below.m3} {
    margin-right: 0;
    margin-bottom: 42px;
  }
`;

export const IqLogo = styled(Icon)`
  width: 182px;
  height: 38px;

  transform: translateY(-30px);
  opacity: 0;
  transition: opacity 0.5s ease, transform 1s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translateY(0);
    `}
`;

export const PoweredByIcon = styled(Icon)`
  width: 400px;
  height: 80px;
  margin-bottom: 20px;

  transform: translate3d(0, -50px, 0);
  opacity: 0;
  transition: opacity 0.5s ease, transform 0.5s ease;
  transition-delay: ${({ delay }) => delay || 0}ms;

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transform: translate3d(0, 0, 0);
    `}

  ${below.m3} {
    width: 240px;
    height: 50px;
  }

  svg {
    width: 100%;
  }
`;

export const Text = styled.div`
  margin-bottom: 48px;
  max-width: 400px;
  font-size: 16px;
  line-height: 24px;
  transform: translate3d(0, -20px, 0);
  opacity: 0;
  color: white;
  text-align: center;
  transition: opacity 1s ease, transform 1s ease;
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
