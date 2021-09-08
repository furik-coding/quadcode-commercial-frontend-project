import React from 'react';
import PropTypes from 'prop-types';

import styled from '@emotion/styled';
import { css } from '@emotion/core';
import { above } from 'styles/media';

const wrapperWidth = 1132;
const wrapperWidthWithPaddings = (paddingVal) => `${wrapperWidth + paddingVal * 2}px`;

export const wrapperStyle = css`
  width: 100%;
  max-width: ${wrapperWidthWithPaddings(16)};
  padding: 0 16px;
  margin: 0 auto;
  box-sizing: border-box;

  ${above.m2} {
    max-width: ${wrapperWidthWithPaddings(24)};
    padding: 0 24px;
  }

  ${above.m3} {
    max-width: ${wrapperWidthWithPaddings(48)};
    padding: 0 48px;
  }

  ${above.m4} {
    max-width: ${wrapperWidthWithPaddings(36)};
    padding: 0 36px;
  }

  ${above.m5} {
    max-width: ${wrapperWidthWithPaddings(96)};
    padding: 0 96px;
  }

  ${above.m6} {
    max-width: ${wrapperWidthWithPaddings(65)};
    padding: 0 65px;
  }
`;

const ContentWrapper = styled.div`
  ${wrapperStyle};
`;

const Wrapper = ({ children, className }) => (
  <ContentWrapper className={className}>{children && children}</ContentWrapper>
);

Wrapper.propTypes = {
  children: PropTypes.oneOfType([PropTypes.arrayOf(PropTypes.node), PropTypes.node]),
  className: PropTypes.string,
};

Wrapper.defaultProps = {
  children: [],
  className: '',
};

export default Wrapper;
