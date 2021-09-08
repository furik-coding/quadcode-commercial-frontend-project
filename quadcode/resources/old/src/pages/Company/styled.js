import styled from '@emotion/styled';
import { keyframes } from '@emotion/core';
import { above, below } from 'styles/media';
import ScrollButton from 'components/ScrollButton';
import Picture from 'components/Picture';

const animateBg = () => keyframes`
  0% { opacity: 0; transform: scale(.975) translate3d(-60%, 0, 0) }
  80% { opacity: 1 }
  100% { transform: scale(1) translate3d(-60%, 0, 0) }
`;

export const CompanyWrapper = styled.div`
  background-color: #000;
  position: relative;
  color: #fff;
`;

export const BgContainer = styled(Picture)`
  position: absolute;
  width: 90%;
  min-width: 320px;
  top: 30px;
  left: 60%;
  transform: translate3d(-60%, 0, 0);
  animation: ${animateBg()} 1.5s ease;
  transform-origin: 0 25%;
  text-align: center;

  ${above.m4} {
    top: 0;
  }
`;

export const BgContainerImage = styled.img`
  width: 100%;
  max-width: 2000px;
`;

export const Content = styled.div`
  padding-top: 190px;

  ${above.m3} {
    padding-top: 280px;
  }

  ${above.m4} {
    padding-top: 370px;
  }

  ${above.m5} {
    padding-top: 460px;
  }

  ${above.m6} {
    padding-top: 540px;
  }
`;

export const ScrollButtonStyled = styled(ScrollButton)`
  position: absolute;
  top: -40px;
  left: 6px;
  transition: opacity 0.3s ease;

  ${below.m4} {
    opacity: 0;
    pointer-events: none;
  }
`;

export const Extra = styled.div`
  margin-top: 35px;

  ${above.m4} {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    max-width: 800px;
    padding-left: 260px;
    margin: 15px auto 0;
  }
`;

export const TeamItem = styled.div`
  display: flex;
  margin-top: 12px;

  ${below.m3} {
    width: 100%;

    &:first-of-type {
      margin-top: 0;
    }
  }

  ${above.m4} {
    min-width: 200px;
    box-sizing: border-box;

    &:nth-of-type(3n + 1) {
      margin-left: 0;
    }
  }
`;

export const TeamItemAmount = styled.div`
  width: 40%;
  font-size: 50px;
  line-height: 50px;
  font-family: Coda, sans-serif;
  color: #f1162f;
  text-align: right;
  margin-right: 10px;
  ${above.m4} {
    width: auto;
  }
`;

export const TeamItemTitle = styled.div`
  font-size: 20px;
  line-height: 24px;
  padding-right: 12px;
  max-width: 50%;
  ${above.m2} {
    max-width: initial;
  }
`;

export const PartnerItem = styled.div`
  width: 135px;
  height: 45px;

  ${below.m3} {
    margin: 68px auto 0;

    &:first-of-type {
      margin-top: 0;
    }
  }

  ${above.m4} {
    min-width: 25%;
    padding: 0 8px;
    margin-top: 60px;
  }
`;
