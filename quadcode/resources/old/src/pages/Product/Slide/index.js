import React from 'react';
import PropTypes from 'prop-types';

import { SlideWrapper } from './styled';

const Slide = ({ children, color, height, first, className }) => {
  return (
    <SlideWrapper className={className} first={first} height={height} color={color}>
      {children}
    </SlideWrapper>
  );
};

Slide.defaultProps = {
  color: 'black',
  height: '100vh',
  first: false,
  className: null,
};

Slide.propTypes = {
  color: PropTypes.string,
  height: PropTypes.string,
  first: PropTypes.bool,
  children: PropTypes.oneOfType([PropTypes.object, PropTypes.array]).isRequired,
  className: PropTypes.string,
};

export default Slide;
