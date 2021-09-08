const routes = [
  {
    path: '/company',
    exact: true,
    component: () => import('pages/Company'),
    layout: {
      header: 'black',
      footer: 'poweredBy',
    },
  },
  {
    path: '/product',
    exact: true,
    component: () => import('pages/Product'),
    layout: {
      header: 'black',
    },
  },
  {
    path: '/contacts',
    exact: true,
    component: () => import('pages/Contacts'),
    layout: {
      header: 'black',
      needPadding: true,
      forceHeaderBg: true,
    },
  },
  {
    path: '/technologies',
    exact: true,
    component: () => import('pages/Technologies'),
    layout: {
      header: 'black',
    },
  },
  {
    path: '/',
    exact: true,
    component: () => import('pages/Main'),
    layout: {
      footer: 'poweredBy',
    },
  },
  {
    path: '*',
    component: () => import('pages/PageNotFound'),
  },
];

export default routes;
