import styled from '@emotion/styled';

import LangLink from 'components/LangLink';
import FlagIcon from '../FlagIcon';

export const LangItemWrapper = styled(LangLink)`
  display: flex;
  flex-direction: row;
  align-items: center;
  text-decoration: none;
  color: ${({ theme, active }) => (active ? theme.activeColor : theme.mainColor)};
`;

export const CountryFlag = styled(FlagIcon)`
  margin-right: 9px;
`;
