import React from 'react';
import PropTypes from 'prop-types';
import { animateScroll as scroll } from 'react-scroll';
import i18n from 'lib/i18n';

import { ArrowStylo, TextWrap, Wrapper } from './styled';

const textKeys = {
  up: 'scroll-up',
  down: 'scroll-down',
};

const scrollOptions = {
  duration: 450,
};

const ScrollButtton = ({ className, direction, onClick, scrollFactor }) => {
  const handleClick = () => {
    const windowH = process.env.BROWSER ? window.innerHeight : 0;

    onClick();
    return direction === 'up'
      ? scroll.scrollToTop(scrollOptions)
      : scroll.scrollMore(windowH * scrollFactor, scrollOptions);
  };

  return (
    textKeys[direction] && (
      <Wrapper className={className} onClick={handleClick}>
        <TextWrap>{i18n(textKeys[direction])}</TextWrap>
        <ArrowStylo direction={direction} />
      </Wrapper>
    )
  );
};

ScrollButtton.propTypes = {
  className: PropTypes.string,
  direction: PropTypes.oneOf(['up', 'down']),
  onClick: PropTypes.func,
  scrollFactor: PropTypes.number,
};

ScrollButtton.defaultProps = {
  className: '',
  direction: 'down',
  onClick: () => {},
  scrollFactor: 0.5,
};

export default ScrollButtton;
