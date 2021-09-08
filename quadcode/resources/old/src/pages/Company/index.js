import React, { useEffect } from 'react';
import PropTypes from 'prop-types';
import Helmet from 'react-helmet';

import Icon from 'components/Icon';
import i18n from 'lib/i18n';

import Item from './Item';
import data, { partners, team } from './data';

import {
  BgContainer,
  BgContainerImage,
  CompanyWrapper,
  Content,
  Extra,
  PartnerItem,
  ScrollButtonStyled,
  TeamItem,
  TeamItemAmount,
  TeamItemTitle,
} from './styled';

partners.map(({ name }) => import(`images/partners/${name}.svg`));

const imagePath = require.context('public/images/company/company_bg');

const TeamExtra = () => (
  <Extra>
    {team.map(({ title, amount }) => (
      <TeamItem key={title + amount}>
        <TeamItemAmount>{amount}</TeamItemAmount>
        <TeamItemTitle>{i18n(title)}</TeamItemTitle>
      </TeamItem>
    ))}
  </Extra>
);

const PartnersExtra = () => (
  <Extra>
    {partners.map(({ name, style }, i) => (
      <PartnerItem style={style} key={i}>
        <Icon glyph={name} />
      </PartnerItem>
    ))}
  </Extra>
);

const Company = ({ onLoaded }) => {
  useEffect(() => {
    onLoaded('company');
  }, []);

  return (
    <CompanyWrapper>
      <Helmet>
        <title>{i18n('menu.company')}</title>
      </Helmet>
      <Content>
        <BgContainer
          srcList={[
            { x1: 'company_bg-480@1x.jpeg', w: '280', x2: 'company_bg-480@2x.jpeg' },
            { x1: 'company_bg-840@1x.jpeg', w: '640', x2: 'company_bg-840@2x.jpeg' },
            { x1: 'company_bg-1280@1x.jpeg', w: '1080', x2: 'company_bg-1280@2x.jpeg' },
            { x1: 'company_bg-1440@1x.jpeg', w: '1440', x2: 'company_bg-1440@2x.jpeg' },
          ]}
          srcListWebp={[
            { x1: 'company_bg-480@1x.webp', w: '280', x2: 'company_bg-480@2x.webp' },
            { x1: 'company_bg-840@1x.webp', w: '640', x2: 'company_bg-840@2x.webp' },
            { x1: 'company_bg-1280@1x.webp', w: '1080', x2: 'company_bg-1280@2x.webp' },
            { x1: 'company_bg-1440@1x.webp', w: '1440', x2: 'company_bg-1440@2x.webp' },
          ]}
          fallback="company_bg-1440@2x.jpeg"
          pathSrc={imagePath}
        >
          {({ fallback, pathSrc, checkPath }) => (
            <BgContainerImage src={checkPath(fallback, pathSrc)} />
          )}
        </BgContainer>
        {data.map(({ extra, id, title, text }) => (
          <Item key={id} title={title} text={text}>
            {id === 1 && <ScrollButtonStyled />}
            {extra === 'team' && <TeamExtra />}
            {extra === 'partners' && <PartnersExtra />}
          </Item>
        ))}
      </Content>
    </CompanyWrapper>
  );
};

Company.propTypes = {
  onLoaded: PropTypes.func,
};

Company.defaultProps = {
  onLoaded: () => null,
};

export default Company;
