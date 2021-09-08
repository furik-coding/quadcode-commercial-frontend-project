import React from 'react';
import PropTypes from 'prop-types';
import _ from 'lodash';

import langList from 'config/lang';

import { Link, withRouter } from 'react-router-dom';

const LangLink = (props) => {
  const { children, to, location } = props;

  // safe props
  const safeProps = _.pick(props, ['to', 'replace', 'innerRef', 'className', 'onClick']);
  // data-name props
  const dataProps = _.pickBy(props, (value, propName) => propName.startsWith('data-'));

  const matchLang = location.pathname.split('/');
  const lang = matchLang[1];
  const toWithLang = langList.includes(lang) ? `/${lang}${to}` : to;
  const toUrl = toWithLang.replace(/\/$/, '');

  const onClickHandle = (e) => {
    const { onClick } = safeProps;

    if (onClick) {
      onClick(e);
    }

    if (location.pathname === toUrl) {
      e.preventDefault();
      return false;
    }

    return true;
  };

  return (
    <Link {...safeProps} {...dataProps} onClick={onClickHandle} to={toUrl}>
      {children}
    </Link>
  );
};

LangLink.propTypes = {
  to: PropTypes.string.isRequired,
  location: PropTypes.shape({
    pathname: PropTypes.string,
  }).isRequired,
  children: PropTypes.oneOfType([PropTypes.arrayOf(PropTypes.node), PropTypes.node]),
};

LangLink.defaultProps = {
  children: [],
};

export default withRouter(LangLink);
