import theme from './theme';

const overlap = -1;
const sizesKeys = Object.keys(theme.breakpoints);

/**
 *  When the screen size is below the provided measure
 *  @return {string}
 */
export const below = sizesKeys.reduce(
  (acc, item) => ({
    ...acc,
    [item]: `@media screen and (max-width: ${theme.breakpoints[item] + overlap}px)`,
  }),
  {},
);

/**
 * When the screen size is above the provided measure,
 * @return {string}
 */
export const above = sizesKeys.reduce(
  (acc, item) => ({
    ...acc,
    [item]: `@media screen and (min-width: ${theme.breakpoints[`m${item[1] - 1}`] || 0}px)`,
  }),
  {},
);

/**
 * When the screen size is between the provided scale measure and the one below it
 * @return {string}
 */
export const at = sizesKeys.reduce((acc, item) => {
  return {
    ...acc,
    [item]: `@media screen
                and (min-width: ${theme.breakpoints[`m${item[1] - 1}`] || 0}px)
                and (max-width: ${theme.breakpoints[item] + overlap}px)`,
  };
}, {});
