import React from 'react';
import { useSelector } from 'react-redux';
import { selectCurrentLang } from '@redux/lang';

const langContext = require.context('config/lang');

const Translations = {
  cache: {},
  getTranslations(locale) {
    if (this.cache[locale]) {
      return this.cache[locale];
    }

    const translations = langContext(`./${locale}`).default;
    this.cache[locale] = translations;
    return translations;
  },
};

const i18n = (key) => {
  // eslint-disable-next-line react-hooks/rules-of-hooks
  const locale = useSelector(selectCurrentLang);

  const translations = Translations.getTranslations(locale);
  return translations[key] || key;
};

export const i18nHtml = (key) => {
  // eslint-disable-next-line react/no-danger
  return <span dangerouslySetInnerHTML={{ __html: i18n(key) }} />;
};

export default i18n;
