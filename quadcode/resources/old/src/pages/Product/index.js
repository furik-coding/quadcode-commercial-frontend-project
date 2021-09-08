import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import Helmet from 'react-helmet';
import i18n from 'lib/i18n';

import Explore from './Slide/Explore';
import Multitool from './Slide/Multitool';
import Customization from './Slide/Customization';
import CrossPlatform from './Slide/CrossPlatform';
import MultiAssets from './Slide/MultiAssets';
import Sandbox from './Slide/Sandbox';

['menu', 'custom_brand', 'paint', 'flip', 'droid', 'apple', 'window'].map((item) =>
  import(`images/products/${item}.svg`),
);

const Product = ({ onLoaded }) => {
  useEffect(() => {
    onLoaded('product');
  }, []);

  return (
    <div>
      <Helmet>
        <title>{i18n('menu.product')}</title>
      </Helmet>
      {/* div вынужденная мера чтобы работал viewport height */}
      <div style={{ overflow: 'hidden' }}>
        <Explore />
        <Multitool />
        <Customization />
        <CrossPlatform />
        <MultiAssets />
        <Sandbox />
      </div>
    </div>
  );
};

Product.propTypes = {
  onLoaded: PropTypes.func,
};

Product.defaultProps = {
  onLoaded: () => null,
};

export default Product;
