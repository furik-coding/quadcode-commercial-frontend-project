import React from 'react';
import PropTypes from 'prop-types';

import { IconWrapper, Svg } from './styled';

const Icon = (props) => {
  const { glyph, className } = props;
  return (
    <IconWrapper className={className} {...props}>
      <Svg>
        <use xlinkHref={`#${glyph}`} />
      </Svg>
    </IconWrapper>
  );
};

Icon.propTypes = {
  glyph: PropTypes.string.isRequired,
  className: PropTypes.string,
};

Icon.defaultProps = {
  className: '',
};

export default Icon;
