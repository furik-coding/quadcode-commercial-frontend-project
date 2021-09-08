import React from 'react';
import { instanceOf } from 'prop-types';
import { Provider } from 'react-redux';
import { CookiesProvider, Cookies, withCookies } from 'react-cookie';
import { Global } from '@emotion/core';
import { ThemeProvider } from 'emotion-theming';
import theme from 'styles/theme';
import { globalStyles } from 'styles/base';
import { Redirect, Route, Router, Switch } from 'react-router-dom';
import { syncLocationWithStore } from '@redux/location';

import langList from 'config/lang';
import history from 'lib/history';
import ScrollToTop from 'components/ScrollToTop';
import Layout from 'layout';

import configureStore from '@redux';

const store = configureStore();
syncLocationWithStore(store);

const langStr = langList.join('|');

const App = ({ cookies }) => {
  return (
    <Provider store={store}>
      <ThemeProvider theme={theme}>
        <CookiesProvider>
          <Global styles={globalStyles} />
          <Router history={history}>
            <ScrollToTop>
              <Switch>
                <Route path={`/(${langStr})`} component={Layout} />
                <Redirect to={`/${cookies.get('lang') || langList[0]}`} />
              </Switch>
            </ScrollToTop>
          </Router>
        </CookiesProvider>
      </ThemeProvider>
    </Provider>
  );
};

App.propTypes = {
  cookies: instanceOf(Cookies).isRequired,
};

export default withCookies(App);
