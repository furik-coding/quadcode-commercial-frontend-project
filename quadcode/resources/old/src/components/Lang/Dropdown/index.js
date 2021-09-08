import React from 'react';
import PropTypes from 'prop-types';
import { selectCurrentLang } from '@redux/lang';
import { useSelector } from 'react-redux';

import langList from 'config/lang';

import { DropdownWrapper, LangLink } from './styled';

const Dropdown = ({ className, onSelect }) => {
  const currentLang = useSelector(selectCurrentLang);
  return (
    <DropdownWrapper className={className} data-lang-ignore>
      {langList.map((lang) => (
        <LangLink
          key={lang}
          lang={lang}
          active={lang === currentLang}
          onClick={(e) => {
            e.preventDefault();
            onSelect(lang);
          }}
          data-lang-ignore
        />
      ))}
    </DropdownWrapper>
  );
};

Dropdown.propTypes = {
  className: PropTypes.string,
  onSelect: PropTypes.func,
};

Dropdown.defaultProps = {
  className: '',
  onSelect: () => null,
};

export default Dropdown;
