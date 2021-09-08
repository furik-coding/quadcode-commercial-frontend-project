import React from 'react';

import i18n from 'lib/i18n';

import { ListWrapper, List, ListItem, ListSubTitle, ListTitle } from './styled';
import { Content } from '../styled';

import Slide from '../index';

const MultiAssets = () => (
  <div>
    <Slide height="auto" color="white">
      <Content direction="row" justifyContent="center" alignItems="flex-start">
        <ListWrapper>
          <ListTitle>{i18n('products.features.list1.title')}</ListTitle>
          <ListSubTitle>{i18n('products.features.list1.subtitle')}</ListSubTitle>

          <List>
            {[...Array(4)].map((item, key) => (
              <ListItem key={key}>{i18n(`products.features.list1.item${key + 1}`)}</ListItem>
            ))}
          </List>
        </ListWrapper>

        <ListWrapper>
          <ListTitle>{i18n('products.features.list2.title')}</ListTitle>
          <List>
            {[...Array(2)].map((item, key) => (
              <ListItem key={key}>{i18n(`products.features.list2.item${key + 1}`)}</ListItem>
            ))}
          </List>
        </ListWrapper>

        <ListWrapper>
          <ListTitle>{i18n('products.features.list3.title')}</ListTitle>
          <List>
            {[...Array(6)].map((item, key) => (
              <ListItem key={key}>{i18n(`products.features.list3.item${key + 1}`)}</ListItem>
            ))}
          </List>
        </ListWrapper>
      </Content>
    </Slide>
  </div>
);

export default MultiAssets;
