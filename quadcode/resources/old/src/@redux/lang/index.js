import { createAction, handleActions } from 'redux-actions';
import { Cookies } from 'react-cookie';
import history from 'lib/history';
import langList from 'config/lang';

// utils
const cookies = new Cookies();

const setLangCookie = (lang) => {
  const date = new Date();
  date.setMonth(date.getMonth() + 1);

  cookies.set('lang', lang, {
    path: '/',
    expires: date,
  });
};

const getLangFromUrl = () => {
  const pathname = process.env.BROWSER ? window.location.pathname : '';
  const segments = pathname.split('/');
  const [, pathLang] = segments;
  const cookieLang = langList.includes(cookies.get('lang')) ? cookies.get('lang') : langList[0];
  const currentLang = langList.includes(pathLang) ? pathLang : cookieLang || langList[0];

  setLangCookie(currentLang);

  return currentLang;
};

// Actions
export const changeLang = createAction('lang/change', (lang) => {
  const segments = history.location.pathname.split('/').slice(2);

  segments.unshift(lang);
  const newPath = `/${segments.join('/')}`;
  history.push(newPath);

  setLangCookie(lang);

  return lang;
});

// Selectors
export const selectLang = (state) => state.lang;
export const selectCurrentLang = (state) => selectLang(state).locale;
export const selectLangList = () => langList;

// State
const defaultState = {
  locale: getLangFromUrl(),
};

// Reducers
export default handleActions(
  {
    [changeLang]: (state, { payload }) => {
      return { ...state, locale: payload };
    },
  },
  defaultState,
);
