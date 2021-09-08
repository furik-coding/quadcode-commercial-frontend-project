import React from 'react';
import PropTypes from 'prop-types';
import i18n from 'lib/i18n';

import { ItemWrapper, Text, Title } from './styled';

const CompanyItem = ({ children, text, title }) => (
  <ItemWrapper>
    <Title>{i18n(title)}</Title>
    <Text>{i18n(text)}</Text>
    {children}
  </ItemWrapper>
);

CompanyItem.propTypes = {
  children: PropTypes.node,
  text: PropTypes.string.isRequired,
  title: PropTypes.string.isRequired,
};

CompanyItem.defaultProps = {
  children: () => {},
};

export default CompanyItem;
