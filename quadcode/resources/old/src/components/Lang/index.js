import React, { useState } from 'react';
import PropTypes from 'prop-types';

import { withRouter } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import { changeLang, selectCurrentLang } from '@redux/lang';

import { LangWrapper, Arrow, LangItemStyled, DropdownList, ToggleWrapper } from './styled';

const isTouchDevice = () =>
  'ontouchstart' in window || navigator.MaxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;

const Lang = ({ className, mode }) => {
  const [direction, setDirection] = useState(0);
  const [opened, setMenu] = useState(false);
  const currentLang = useSelector(selectCurrentLang);
  const dispatch = useDispatch();

  const toggleMenu = (val, { relatedTarget }) => {
    const conditions = [
      relatedTarget &&
        relatedTarget.getAttribute &&
        relatedTarget.getAttribute('data-lang-ignore') === 'true',
      opened && val,
    ];

    if (conditions.some((cond) => cond)) {
      return false;
    }

    setMenu(val);
    setDirection(direction + 1);
    return true;
  };

  const showMenu = (e) => toggleMenu(true, e);
  const hideMenu = (e) => toggleMenu(false, e);

  const onSelect = (lang) => {
    if (currentLang !== lang) {
      dispatch(changeLang(lang));
    }
  };

  const handlersPropsTouch = {
    onClick: (e) => (opened ? hideMenu(e) : showMenu(e)),
  };

  const handlersProps = {
    onMouseOver: showMenu,
    onMouseLeave: hideMenu,
  };

  return (
    <LangWrapper
      mode={mode}
      className={className}
      onFocus={showMenu}
      onBlur={hideMenu}
      {...(isTouchDevice() ? handlersPropsTouch : handlersProps)}
    >
      <ToggleWrapper>
        <Arrow direction={direction} />
        <LangItemStyled mode={mode} lang={currentLang} />
      </ToggleWrapper>
      <DropdownList opened={opened} onSelect={onSelect} />
    </LangWrapper>
  );
};

Lang.propTypes = {
  mode: PropTypes.oneOfType([PropTypes.bool, PropTypes.oneOf(['black', 'white'])]),
  className: PropTypes.string,
};

Lang.defaultProps = {
  className: '',
  mode: 'white',
};

export default withRouter(Lang);
