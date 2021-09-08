import styled from '@emotion/styled';
import { above } from 'styles/media';

export const Wrapper = styled.div`
  margin: 70px auto;
  height: 100%;
  display: flex;
  align-items: center;
`;

export const Text = styled.div`
  font-size: 100px;
  margin: 20px 0;
  line-height: initial;
  opacity: 0.4;

  ${above.m2} {
    font-size: 150px;
  }

  ${above.m3} {
    font-size: 300px;
  }

  ${above.m4} {
    font-size: 404px;
  }
`;
