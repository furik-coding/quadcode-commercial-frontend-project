import styled from '@emotion/styled';
import { keyframes } from '@emotion/core';
import ContentWrapper from 'components/ContentWrapper';
import Picture from 'components/Picture';
import { above } from 'styles/media';

export const TechnologiesWrapper = styled.div`
  padding-bottom: 100px;
  text-align: center;
`;

export const Title = styled.div`
  font-size: 30px;
  color: ${({ theme }) => theme.activeColor};
  font-weight: 700;
  line-height: 1.25;
  text-align: left;

  ${above.m2} {
    text-align: center;
  }
`;

export const Intro = styled.div`
  position: relative;
  display: flex;
  align-items: center;
  height: 500px;
  padding: 100px 0 50px;
  background: #000;
  color: #fff;
  box-sizing: border-box;
  margin-bottom: 60px;

  &:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.5);
    pointer-events: none;
    z-index: 1;
  }

  ${above.m4} {
    min-height: 500px;
    margin-bottom: 50px;

    &:before {
      display: none;
    }
  }
`;

export const IntroBgPicture = styled(Picture)`
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  overflow: hidden;
`;

const animateBg = () => keyframes`
  0% { transform: scale(1.1) }
  100% { transform: scale(1) }
`;

export const IntroBgImage = styled.img`
  width: 100%;
  object-fit: cover;
  object-position: 35% 50%;

  animation: ${animateBg()} 1.2s ease;
`;

export const ContentWrapperStylo = styled(ContentWrapper)`
  position: relative;
  display: ${({ intro }) => (intro ? 'block' : 'none')};
  z-index: 3;

  ${above.m4} {
    display: ${({ intro }) => (intro ? 'none' : 'block')};
    max-width: 920px;
  }
`;

export const IntroText = styled.div`
  margin-top: 6px;
  text-align: left;

  ${above.m2} {
    text-align: center;
  }

  ${above.m4} {
    margin-top: 15px;
  }
`;

export const ListTechnologies = styled.div`
  display: flex;
  flex-direction: column;
  align-items: flex-start;

  flex-wrap: wrap;
  max-width: 600px;
  margin: auto;

  ${above.m3} {
    justify-content: space-between;
    flex-direction: row;
  }

  ${above.m4} {
    margin-top: 100px;
  }
`;

export const Block = styled.div`
  display: inline-block;
  margin-bottom: 40px;
  text-align: left;
  box-sizing: border-box;
  width: 100%;

  ${above.m3} {
    width: 50%;
  }

  &:nth-of-type(odd) {
    ${above.m3} {
      padding-right: 40px;
    }
  }

  &:nth-of-type(even) {
    ${above.m3} {
      padding-left: 40px;
    }
  }
`;

export const BlockTitle = styled(Title)`
  margin: 0 auto 20px auto;
  font-size: 24px;
  max-width: 300px;
  white-space: nowrap;

  ${above.m2} {
    text-align: left;
  }

  ${above.m3} {
    margin: 0 0 20px 0;
  }

  ${above.m4} {
    font-size: 30px;
  }
`;

export const BlockItem = styled.div`
  font-size: 16px;
  color: ${({ theme }) => theme.mainColor};
  margin: 0 auto 10px auto;
  position: relative;
  padding-left: 18px;
  max-width: 300px;

  ${above.m3} {
    max-width: 220px;
    margin: 0 0 10px 0;
  }

  &:before {
    content: '';
    position: absolute;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background-color: ${({ theme }) => theme.activeColor};
    left: 0;
    top: 8px;
  }
`;
