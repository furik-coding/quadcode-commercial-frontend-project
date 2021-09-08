import styled from '@emotion/styled';
import { css, keyframes } from '@emotion/core';
import Arrow from 'images/common/arrow_right.svg';

const dirAngle = {
  up: -90,
  down: 90,
};

const translation = {
  up: {
    from: 2,
    to: -2,
  },
  down: {
    from: -2,
    to: 2,
  },
};

const animateArrow = (direction) => {
  const rotate = `rotate(${dirAngle[direction]}deg)`;
  const translateFrom = `translate3d(0,${translation[direction].from}px,0)`;
  const translateTo = `translate3d(0,${translation[direction].to}px,0)`;

  return keyframes`
  0% {
    transform: ${translateFrom} ${rotate};
    opacity: 0;
  }
  15% {
    opacity: 1;
  }
  80% {
    opacity: 1;
  }
  100% {
    transform: ${translateTo} ${rotate};
    opacity: 0;
  }
`;
};

export const Wrapper = styled.div`
  display: flex;
  align-items: center;
  cursor: pointer;
`;

export const TextWrap = styled.div``;

export const ArrowStylo = styled(Arrow)`
  width: 17px;
  height: 12px;
  margin-left: 8px;
  color: ${({ theme }) => theme.activeColor};
  ${({ direction }) => {
    return css`
      animation: ${animateArrow(direction)} 1.5s ease infinite;
    `;
  }};
`;
