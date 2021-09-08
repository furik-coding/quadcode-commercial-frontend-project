import { createAction, handleActions } from 'redux-actions';
import history from 'lib/history';

// Actions
export const locationChange = createAction('location/change');

export const syncLocationWithStore = (store) => {
  history.listen((location) => {
    store.dispatch(locationChange(location.pathname));
  });
};

// State
const defaultState = {
  pathname: '',
};

// Reducers
export default handleActions(
  {
    [locationChange]: (state, { payload }) => ({
      ...state,
      pathname: payload,
    }),
  },
  defaultState,
);
