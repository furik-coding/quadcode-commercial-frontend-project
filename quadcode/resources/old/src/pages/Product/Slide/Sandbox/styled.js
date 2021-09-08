import styled from '@emotion/styled';
import { below } from 'styles/media';

import Slide from '../index';
import { Content } from '../styled';

export const StyloSlide = styled(Slide)`
  background: #f1162f;
  padding: 60px 0;
  height: auto;
  overflow: visible;

  ${below.m3} {
    display: none;
  }
`;

export const StyloContent = styled(Content)`
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
`;

export const Title = styled.div`
  margin-right: 120px;
  flex-grow: 2;
  flex-shrink: 0;
  font-size: 30px;
  line-height: 38px;
  color: white;
`;

export const Text = styled.div`
  flex-grow: 0;
  flex-shrink: 1;
  font-size: 16px;
  line-height: 23px;
  color: white;
`;
