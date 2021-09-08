import styled from '@emotion/styled';
import LangItem from '../LangItem';

export const DropdownWrapper = styled.div`
  position: absolute;
  top: 100%;
  background-color: #fff;
  border-radius: 4px;
  box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.2);
`;

export const LangLink = styled(LangItem)`
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 8px 24px;

  &:first-of-type {
    margin-top: 10px;
  }

  &:last-of-type {
    margin-bottom: 10px;
  }

  &:hover {
    background-color: #f0f2f5;
  }
`;
