import React, { useEffect } from 'react';
import PropTypes from 'prop-types';

import loadable from '@loadable/component';
import Helmet from 'react-helmet';
import i18n from 'lib/i18n';

import './mapbox-gl.v1.2.0.css';
import { ContactsWrapper } from './styled';

function Deferred() {
  this.promise = new Promise((resolve, reject) => {
    this.resolve = resolve;
    this.reject = reject;
  });
}

const Contacts = ({ onLoaded }) => {
  const mapPromise = new Deferred();

  useEffect(() => {
    onLoaded('contacts');
  }, []);

  useEffect(() => {
    mapPromise.resolve();
  });

  const Map = loadable(() =>
    mapPromise.promise.then(
      () =>
        new Promise((resolve) => {
          setTimeout(() => resolve(import('components/Map')), 1000);
        }),
    ),
  );

  return (
    <ContactsWrapper>
      <Helmet>
        <title>{i18n('menu.contacts')}</title>
      </Helmet>
      <Map />
    </ContactsWrapper>
  );
};

Contacts.propTypes = {
  onLoaded: PropTypes.func,
};

Contacts.defaultProps = {
  onLoaded: () => null,
};

export default Contacts;
