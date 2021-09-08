import { createStore, combineReducers } from 'redux';

import lang from './lang';
import location from './location';

const reducers = combineReducers({
  lang,
  location,
});

/* eslint-disable no-underscore-dangle */
const configureStore = (initialState = {}) => {
  return createStore(
    reducers,
    initialState,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__(),
  );
};
/* eslint-enable */

export default configureStore;
