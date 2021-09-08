import React from 'react';
import PropTypes from 'prop-types';
import { useSelector, useDispatch } from 'react-redux';

import { selectLangList, selectCurrentLang, changeLang } from '@redux/lang';

import i18n from 'lib/i18n';

import {
  SidebarWrapper,
  SidebarMenu,
  MenuLink,
  CloseIcon,
  LangItemStyled,
  MobileLang,
  NativeSelect,
} from './styled';

const Sidebar = ({ className, show, onClickClose }) => {
  const currentLang = useSelector(selectCurrentLang);
  const langList = useSelector(selectLangList);
  const dispatch = useDispatch();

  const onChangeLang = (e) => {
    const { value } = e.target;
    dispatch(changeLang(value));
  };

  return (
    <SidebarWrapper className={className} show={show}>
      <CloseIcon onClick={onClickClose} />
      <SidebarMenu>
        {({ title, url, active }) => (
          <MenuLink key={url} to={url} onClick={onClickClose} active={active} mode="white">
            {i18n(title)}
          </MenuLink>
        )}
      </SidebarMenu>
      <MobileLang>
        <LangItemStyled mode="black" lang={currentLang} />
        <NativeSelect value={currentLang} onChange={onChangeLang}>
          {langList.map((locale) => (
            <option key={locale} value={locale}>
              {i18n(`lang.${locale}`)}
            </option>
          ))}
        </NativeSelect>
      </MobileLang>
    </SidebarWrapper>
  );
};

Sidebar.propTypes = {
  className: PropTypes.string,
  show: PropTypes.bool,
  onClickClose: PropTypes.func,
};

Sidebar.defaultProps = {
  className: '',
  show: false,
  onClickClose: () => null,
};

export default Sidebar;
