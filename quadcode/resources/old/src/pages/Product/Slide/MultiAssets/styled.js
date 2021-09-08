import styled from '@emotion/styled';
import { below } from 'styles/media';

export const ListWrapper = styled.div`
  width: 200px;
  margin: 0 25px;
  ${below.m3} {
    margin: 0;
  }
`;

export const List = styled.div`
  margin-top: 20px;
  list-style-type: none;

  ${below.m3} {
    margin-bottom: 34px;
  }
`;

export const ListItem = styled.li`
  position: relative;
  padding-left: 20px;
  font-size: 16px;
  line-height: 30px;

  &:before {
    content: '';
    position: absolute;
    top: 15px;
    left: 0;
    width: 6px;
    height: 6px;
    margin-top: -3px;
    border-radius: 50%;
    background: #f1162f;
  }
`;
export const ListTitle = styled.div`
  font-size: 20px;
  line-height: 23px;
  font-weight: 700;
`;

export const ListSubTitle = styled.div`
  font-size: 16px;
  line-height: 23px;
`;
