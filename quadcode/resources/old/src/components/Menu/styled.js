import styled from '@emotion/styled';
import LangLink from 'components/LangLink';
import SafeTag from 'components/SafeTag';

export const Wrapper = styled(SafeTag)`
  display: flex;
  flex-direction: row;
`;

const colors = (theme) => ({
  white: theme.mainColor,
  black: theme.mainDarkColor,
  true: theme.mainColor, // for true value
});

export const MenuLink = styled(LangLink)`
  font-weight: 500;
  color: ${({ active, theme, mode }) => (active ? theme.activeColor : colors(theme)[mode])};
  text-decoration: none;

  transition: color 0.2s ease-in-out;
`;
