import React from 'react';
import PropTypes from 'prop-types';
import { withRouter } from 'react-router-dom';

import menuConfig from 'config/menu';
import { Wrapper, MenuLink } from './styled';

const Menu = ({ className, children, location }) => {
  return (
    <Wrapper className={className}>
      {menuConfig.map(({ title, url }, index) => {
        const active = location.pathname.endsWith(url);
        return children({ title, active, url, index });
      })}
    </Wrapper>
  );
};

Menu.propTypes = {
  match: PropTypes.shape({
    path: PropTypes.string.isRequired,
  }).isRequired,
  className: PropTypes.string,
  children: PropTypes.func.isRequired,
  location: PropTypes.shape({
    pathname: PropTypes.string,
  }).isRequired,
};

Menu.defaultProps = {
  className: '',
};

export { MenuLink };
export default withRouter(Menu);
