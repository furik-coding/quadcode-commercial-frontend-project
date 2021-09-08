import React from 'react';
import PropTypes from 'prop-types';

import langList from 'config/lang';
import i18n from 'lib/i18n';

import { LangItemWrapper, CountryFlag } from './styled';

const LangItem = ({ lang, className, ...props }) => {
  const currPage = process.env.BROWSER ? window.location.pathname.substr(3) : '/';
  return (
    <LangItemWrapper to={currPage} className={className} {...props}>
      <CountryFlag lang={lang} />
      {i18n(`lang.${lang}`)}
    </LangItemWrapper>
  );
};

LangItem.propTypes = {
  lang: PropTypes.oneOf(langList),
  className: PropTypes.string,
};

LangItem.defaultProps = {
  lang: langList[0],
  className: '',
};

export default LangItem;
