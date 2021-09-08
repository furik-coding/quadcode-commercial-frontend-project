import styled from '@emotion/styled';
import { css } from '@emotion/core';

export const MapWrapper = styled.div`
  position: relative;
  width: 100%;
`;

export const Mark = styled.img`
  position: relative;
  width: 45px;
  height: 65px;
`;
export const Title = styled.div`
  margin-bottom: 15px;
  font-size: 30px;
  text-align: center;
  color: #f1162f;
  line-height: 38px;
  font-weight: 700;
`;
export const Text = styled.div`
  max-width: 550px;
  text-align: center;
  font-size: 16px;
  line-height: 23px;
  color: white;
`;

export const ContentWrapper = styled.div`
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  pointer-events: none;
  opacity: 0;
  transition: opacity 0.3s ease;

  ${({ active }) =>
    active &&
    css`
      opacity: 1;
      transition: 0.2s opacity 0.3s ease;
    `}
`;
