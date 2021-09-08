import React from 'react';
import PropTypes from 'prop-types';
import { useSelector } from 'react-redux';

import { selectCurrentLang } from '@redux/lang';

import { FeatureWrapper, Brand, FeatureContentWrapper, FeatureText } from './styled';

const Feature = ({ active, delay, text, iconProps, className }) => {
  const currentLang = useSelector(selectCurrentLang);

  return (
    <FeatureWrapper className={className} delay={delay} active={active}>
      <FeatureContentWrapper>
        <Brand delay={delay + 0.3} active={active} {...iconProps} />
        <FeatureText currentLang={currentLang} delay={delay + 0.5} active={active}>
          {text}
        </FeatureText>
      </FeatureContentWrapper>
    </FeatureWrapper>
  );
};

Feature.propTypes = {
  active: PropTypes.bool.isRequired,
  delay: PropTypes.number.isRequired,
  iconProps: PropTypes.shape({
    glyph: PropTypes.string.isRequired,
    width: PropTypes.number,
    height: PropTypes.number,
  }).isRequired,
  text: PropTypes.string.isRequired,
  className: PropTypes.string.isRequired,
};

export default Feature;
