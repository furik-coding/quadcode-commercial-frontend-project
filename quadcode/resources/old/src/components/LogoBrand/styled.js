import styled from '@emotion/styled';
import { css } from '@emotion/core';

import LangLink from 'components/LangLink';

import Logo from 'images/common/logo.svg';
import Brand from 'images/common/brand.svg';

export const LogoBrandWrapper = styled.div``;

export const Link = styled(LangLink)`
  display: flex;
`;

export const LogoIcon = styled(Logo)`
  color: ${({ color, theme }) => color || theme.activeColor};

  ${({ withoutBrand }) =>
    !withoutBrand &&
    css`
      width: calc(32% - 6px);
      flex-shrink: 0;
      margin-right: 12px;
    `};
`;

export const BrandIcon = styled(Brand)`
  color: ${({ color, theme }) => color || theme.mainColor};

  ${({ withoutBrand }) =>
    !withoutBrand &&
    css`
      width: calc(68% - 6px);
      flex-shrink: 0;
    `};
`;
