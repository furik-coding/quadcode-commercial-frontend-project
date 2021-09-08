import React from 'react';
import PropTypes from 'prop-types';

import _ from 'lodash';
import isPropValid from '@emotion/is-prop-valid';

const allowedProps = ['children', 'style', 'onClick', 'onMouseOver', 'onMouseLeave'];

const SafeTag = (props) => {
  const { children, component } = props;
  const safeKeys = Object.keys(props).filter(
    (key) => (isPropValid(key) && _.isString(props[key])) || allowedProps.includes(key),
  );
  const safeProps = _.pick(props, safeKeys);
  return React.createElement(component, safeProps, children);
};

SafeTag.propTypes = {
  // eslint-disable-next-line
  children: PropTypes.any,
  // eslint-disable-next-line
  component: PropTypes.any,
};

SafeTag.defaultProps = {
  component: 'div',
};

// eslint-disable-next-line react/display-name
export const SafeTagHoc = (component) => (props) => <SafeTag {...props} component={component} />;

export default SafeTag;
