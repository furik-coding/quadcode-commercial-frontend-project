import React from 'react';
import PropTypes from 'prop-types';
import _ from 'lodash';

import { LogoBrandWrapper, Link, LogoIcon, BrandIcon } from './styled';

const LogoBrand = ({ className, children, logo, brand, logoColor, brandColor, to }) => {
  const WrapperComponent = to ? Link : LogoBrandWrapper;
  const funcChild = _.isFunction(children);

  return (
    <WrapperComponent className={className} to={to}>
      {funcChild && children({ LogoIcon, BrandIcon })}
      {!funcChild && (
        <>
          {logo && <LogoIcon withoutBrand={!brand} color={logoColor} />}
          {brand && <BrandIcon withoutLogo={!logo} color={brandColor} />}
        </>
      )}
    </WrapperComponent>
  );
};

LogoBrand.propTypes = {
  className: PropTypes.string,
  children: PropTypes.oneOfType([PropTypes.func, PropTypes.bool]),
  logo: PropTypes.bool,
  brand: PropTypes.bool,
  to: PropTypes.oneOfType([PropTypes.bool, PropTypes.string]),
  logoColor: PropTypes.string,
  brandColor: PropTypes.string,
};

LogoBrand.defaultProps = {
  className: '',
  children: false,
  logo: true,
  brand: true,
  to: '/',
  logoColor: '',
  brandColor: '',
};

export { LogoIcon, BrandIcon };
export default LogoBrand;
