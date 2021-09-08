import React, { useState } from 'react';
import PropTypes from 'prop-types';
import { useSpring } from 'react-spring';
import loadable from '@loadable/component';

import { showPreloader, hidePreloader } from 'lib/preloader';

import { matchPath } from 'react-router-dom';

import routes from 'config/routes';

import Header from './Header';
import Footer from './Footer';

import { LayoutWrapper, LayoutContentWrapper, PagesWrapper, ComponentWrapper } from './styled';

const noop = () => null;

// eslint-disable-next-line react/prop-types,react/display-name
const getWrapper = (Component) => ({ style, onLoaded }) => (
  <ComponentWrapper style={style}>
    <Component onLoaded={onLoaded} />
  </ComponentWrapper>
);

const Layout = ({ location }) => {
  const [route, setRoute] = useState({ layout: {} });
  const [pageAB, setPageAB] = useState(true);
  const [PageA, setPageA] = useState({ Component: noop });
  const [PageB, setPageB] = useState({ Component: noop });

  const [styleA, setA] = useSpring(() => ({ opacity: 0 }));
  const [styleB, setB] = useSpring(() => ({ opacity: 0 }));

  const { needWrapper, needPadding, header, footer, forceHeaderBg } = route.layout;
  const WrapperComponent = needWrapper ? LayoutContentWrapper : PagesWrapper;

  const matchedRoute = routes.find((rt) => {
    const pathname = location.pathname.substr(3) || '/';
    return matchPath(pathname, rt);
  });

  const onLoaded = () => {
    setA({
      opacity: pageAB ? 1 : 0,
      zIndex: pageAB ? 2 : 1,
    });

    setB({
      opacity: pageAB ? 0 : 1,
      zIndex: pageAB ? 1 : 2,
    });

    setPageAB(!pageAB);

    hidePreloader();
  };

  if (matchedRoute && route.path !== matchedRoute.path) {
    setRoute(matchedRoute);

    const newPage = loadable(matchedRoute.component);

    showPreloader();

    if (pageAB) {
      setPageA({ Component: getWrapper(newPage) });
    } else {
      setPageB({ Component: getWrapper(newPage) });
    }

    return null;
  }

  const footerDisplay = pageAB ? styleB : styleA;

  return (
    <LayoutWrapper needPadding={needPadding}>
      {header !== false && <Header mode={header} forceHeaderBg={forceHeaderBg} />}
      <WrapperComponent>
        <PageA.Component
          onLoaded={pageAB ? onLoaded : undefined}
          style={{
            ...styleA,
            position: styleA.opacity.interpolate((val) =>
              !pageAB && val === 1 ? 'relative' : 'absolute',
            ),
            display: styleA.opacity.interpolate((val) => (val === 0 ? 'none' : 'flex')),
          }}
        />
        <PageB.Component
          onLoaded={!pageAB ? onLoaded : undefined}
          style={{
            ...styleB,
            position: styleB.opacity.interpolate((val) =>
              pageAB && val === 1 ? 'relative' : 'absolute',
            ),
            display: styleB.opacity.interpolate((val) => (val === 0 ? 'none' : 'flex')),
          }}
        />
      </WrapperComponent>
      {footer !== false && (
        <Footer
          mode={footer}
          style={{
            display: footerDisplay.opacity.interpolate((val) => (val === 1 ? 'block' : 'none')),
          }}
        />
      )}
    </LayoutWrapper>
  );
};

Layout.propTypes = {
  location: PropTypes.shape({
    pathname: PropTypes.string.isRequired,
  }).isRequired,
};

export default Layout;
