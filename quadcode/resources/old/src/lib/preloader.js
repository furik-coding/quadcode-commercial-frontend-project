const preloader = document.querySelector('#preloader');

export const showPreloader = () => {
  preloader.style.opacity = '1';
  return preloader;
};

export const hidePreloader = () => {
  preloader.style.opacity = '0';
  return preloader;
};
