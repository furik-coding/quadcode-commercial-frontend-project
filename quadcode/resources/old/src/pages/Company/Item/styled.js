import styled from '@emotion/styled';
import { above } from 'styles/media';

export const ItemWrapper = styled.article`
  position: relative;
  padding-bottom: 68px;

  ${above.m4} {
    max-width: 910px;
    padding: 0 24px 68px;
    margin: auto;
  }
`;

export const Title = styled.h2`
  max-width: 1150px;
  font-size: 55px;
  line-height: 1;
  color: #f1162f;
  text-transform: lowercase;
  margin: 0 auto 8px;

  &:before {
    content: '.';
  }
  ${above.m2} {
    font-size: 70px;
  }

  ${above.m4} {
    font-size: 160px;
    margin-left: -24px;
    margin-bottom: 16px;
  }

  ${above.m6} {
    font-size: 200px;
  }
`;

export const Text = styled.div`
  max-width: 700px;
  padding: 0 28px;

  ${above.m4} {
    max-width: 800px;
    padding: 0 0 0 260px;
    margin: 0 auto;
  }
`;
