import React from 'react';
import PropTypes from 'prop-types';

const checkPath = (src, pathSrc) => (pathSrc ? pathSrc(`./${src}`) : src);

const getSourceTags = (srcList, pathSrc, type) =>
  srcList.reverse().map(({ x1, x2 = null, w }) => {
    let retinaSrc = '';
    if (x2 !== null) {
      retinaSrc = `, ${checkPath(x2, pathSrc)} 2x`; // retina src can be optional, unlike x1
    }

    return (
      <source
        key={w}
        type={type && type}
        media={`(min-width: ${w}px)`}
        srcSet={`${checkPath(x1, pathSrc)}${retinaSrc}`}
      />
    );
  });

const Picture = ({ className, children, srcList, srcListWebp, fallback, pathSrc, alt }) => (
  <picture className={className}>
    {srcListWebp && getSourceTags(srcListWebp, pathSrc, 'image/webp')}
    {getSourceTags(srcList, pathSrc)}
    {(children && children({ pathSrc, fallback, checkPath })) ||
      (fallback && <img src={checkPath(fallback, pathSrc)} alt={alt} />)}
  </picture>
);

Picture.defaultProps = {
  className: null,
  children: null,
  pathSrc: null,
  srcListWebp: null,
  alt: 'image',
};

Picture.propTypes = {
  className: PropTypes.string,
  srcList: PropTypes.arrayOf(
    PropTypes.shape({
      x1: PropTypes.string.isRequired,
      x2: PropTypes.string,
      w: PropTypes.oneOfType([PropTypes.string, PropTypes.number]).isRequired,
    }),
  ).isRequired,
  srcListWebp: PropTypes.arrayOf(
    PropTypes.shape({
      x1: PropTypes.string.isRequired,
      x2: PropTypes.string,
      w: PropTypes.oneOfType([PropTypes.string, PropTypes.number]).isRequired,
    }),
  ),
  children: PropTypes.func,
  fallback: PropTypes.string.isRequired,
  pathSrc: PropTypes.func,
  alt: PropTypes.string,
};

export default Picture;
