import React from 'react';
import PropTypes from 'prop-types';

import langList from 'config/lang';
import Icon from 'components/Icon';
import { FlagIconWrapper } from './styled';

langList.map((lang) => import(`images/flags/${lang}.svg`));

const FlagIcon = ({ lang, className }) => {
  return (
    <FlagIconWrapper className={className}>
      <Icon glyph={lang} width="50px" />
    </FlagIconWrapper>
  );
};

FlagIcon.propTypes = {
  className: PropTypes.string,
  lang: PropTypes.oneOf(langList),
};

FlagIcon.defaultProps = {
  className: '',
  lang: langList[0],
};

export default FlagIcon;
