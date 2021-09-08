import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import Helmet from 'react-helmet';
import i18n from 'lib/i18n';

import IntroSlide from './IntroSlide';
import FeaturesSlide from './FeaturesSlide';

import { MainWrapper } from './styled';

import 'images/common/arrow_right.svg';

['customization', 'interface', 'solution'].map((item) => import(`public/images/main/${item}.svg`));

const Main = ({ onLoaded }) => {
  useEffect(() => {
    onLoaded('main');
  }, []);

  return (
    <MainWrapper>
      <Helmet>
        <title>{i18n('seo.default.title')}</title>
      </Helmet>
      <IntroSlide />
      <FeaturesSlide />
    </MainWrapper>
  );
};

Main.propTypes = {
  onLoaded: PropTypes.func,
};

Main.defaultProps = {
  onLoaded: () => null,
};

export default Main;
