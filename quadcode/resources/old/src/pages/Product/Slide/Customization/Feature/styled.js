import styled from '@emotion/styled';
import Icon from 'components/Icon';
import { css } from '@emotion/core';
import { below } from 'styles/media';

export const FeaturesIcon = styled(Icon)`
  width: 50px;
  height: 50px;
`;
export const Brand = styled(FeaturesIcon)`
  ${({ width, height }) =>
    height &&
    width &&
    css`
      width: ${width}px;
      height: ${height}px;

      ${below.m3} {
        width: ${width / 1.5}px;
        height: ${height / 1.5}px;
      }
    `};

  transform: scale(0.5);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.25s ease;
  transition-delay: ${({ delay }) => delay || 0}s;

  ${({ active }) =>
    active &&
    css`
      transform: scale(1);
      opacity: 1;
    `}
`;
export const FeatureWrapper = styled.div`
  position: absolute;
  //padding-bottom: 10%;
  height: 1px;

  border-bottom: 1px dotted #b3bac6;
  transition: width 0.5s ease;
  transition-delay: ${({ delay }) => delay || 0}s;
  width: 230px;

  ${({ active }) =>
    !active &&
    css`
      &:nth-of-type(n) {
        width: 1px;
      }
    `}
`;

export const FeatureContentWrapper = styled.div`
  display: flex;
  flex-direction: row;
  align-items: center;
  position: absolute;
  padding-bottom: 10px;
  transform: translate3d(0, -100%, 0);

  ${below.m3} {
    padding-bottom: 5px;
  }
`;

// const isLongLang = (lang) => ['es', 'fr', 'it', 'pt'].includes(lang);
// max-width: ${({ currentLang }) => {
//   console.log(isLongLang(currentLang));
//   return isLongLang(currentLang) ? 110 : 180;
// }}px;
export const FeatureText = styled.div`
  max-width: 180px;
  margin-left: 20px;
  font-size: 16px;
  line-height: 18px;
  opacity: 0;

  transform: translate3d(20px, 0, 0);
  transition: opacity 0.3s ease-in, transform 0.3s ease-out;
  transition-delay: ${({ delay }) => delay || 0}s;

  ${({ active }) =>
    active &&
    css`
      transform: translate3d(0, 0, 0);
      opacity: 1;
    `}
`;
