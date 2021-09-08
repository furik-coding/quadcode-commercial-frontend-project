import React from 'react';

import i18n from 'lib/i18n';

import { StyloSlide, Text, Title, StyloContent } from './styled';

const Sandbox = () => {
  return (
    <StyloSlide height="auto" color="black">
      <StyloContent justifyContent="flex-start" alignItems="flex-end">
        <Title>{i18n('products.sandbox.title')}</Title>
        <Text>{i18n('products.sandbox.text')}</Text>
      </StyloContent>
    </StyloSlide>
  );
};

export default Sandbox;
