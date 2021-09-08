import React, { Component } from 'react';
import PropTypes from 'prop-types';

import theme from 'styles/theme';
import _ from 'lodash';

const POINTS = theme.breakpoints;

export const mediaPropTypes = PropTypes.shape({
  media: PropTypes.oneOf(['m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8']),
  screen: PropTypes.number,
});

// renderOnMediaChange - если true при изменении media будет происходить ререндер
// так же если компонент stateless то renderOnMediaChange = true по умолчанию
const makeMediaMatcher = (UserComponent, { renderOnMediaChange = false } = {}) =>
  class MediaMatcher extends Component {
    media = {};

    mounted = false;

    mediaMatcherInitValue = {
      media: 'm7',
      screen: POINTS.m7,
    };

    constructor(props) {
      super(props);

      if (process.env.BROWSER) {
        this.mounted = true;

        const { innerWidth } = window;
        const displaysArray = Object.keys(POINTS);

        const media =
          displaysArray.find(
            (key, index) =>
              (POINTS[displaysArray[index - 1]] || 0) <= innerWidth &&
              POINTS[key] - 1 >= innerWidth,
          ) || 'm8';

        this.mediaMatcherInitValue = {
          media,
          screen: POINTS[media],
        };
        this.screen = POINTS[media];
      }
    }

    componentDidMount() {
      if (process.env.BROWSER) {
        const instance = this.getInstance();
        const isStateless = !UserComponent || this.isStateless(UserComponent);

        if (instance || isStateless || renderOnMediaChange) {
          if (instance && instance.handleMediaChange) {
            this.handler = this.getInstance().handleMediaChange.bind(this.getInstance());
          }

          Object.keys(POINTS).forEach((key, index, array) => {
            this.media[key] = window.matchMedia(`(min-width: ${POINTS[array[index - 1]] || 0}px)
                    and (max-width: ${POINTS[key] - 1}px)`);

            this.media[key].addListener(this.handleMediaChange(key));
          });

          this.media.m8 = window.matchMedia(`(min-width: ${POINTS.m7}px)`);

          this.media.m8.addListener(this.handleMediaChange('m8'));
        }
      }
    }

    componentWillUnmount() {
      this.mounted = false;

      if (Object.keys(this.media).length > 0) {
        Object.keys(this.media).forEach((key) => {
          this.media[key].removeListener(this.handleMediaChange(key));
        });

        this.media.m8.removeListener(this.handleMediaChange('m8'));
      }
    }

    getInstance = () => {
      return this.instanceRef && this.instanceRef.getInstance
        ? this.instanceRef.getInstance()
        : this.instanceRef;
    };

    handleMediaChange = (media) =>
      _.debounce(
        ({ matches }) => {
          if (matches && this.mounted) {
            this.screen = POINTS[media];
            // TODO: можно педередать чтобы если stateless то не вызывать хендлер
            if (this.handler) {
              this.handler({
                media,
                screen: POINTS[media],
              });
            }

            if (renderOnMediaChange || !UserComponent || this.isStateless(UserComponent)) {
              // like force update
              this.setState({ media });
            }
          }
        },
        100,
        {
          leading: true,
        },
      );

    aboveMedia = (media) => {
      const prevMedia = Number(media.slice(1, 2)) - 1;
      return this.screen > POINTS[`m${prevMedia}`];
    };

    belowMedia = (media) => {
      return this.screen <= POINTS[media];
    };

    at = (media) => {
      return this.belowMedia(media) && this.aboveMedia(media);
    };

    isStateless = (component) => !component.prototype.render;

    onRef = (ref) => {
      this.instanceRef = ref;
      return ref;
    };

    render() {
      const addonsProps = {
        at: this.at,
        belowMedia: this.belowMedia,
        aboveMedia: this.aboveMedia,
        mediaMatcherInitValue: this.mediaMatcherInitValue,
      };

      const renderProps = {
        at: this.at,
        below: this.belowMedia,
        above: this.aboveMedia,
        initValue: this.mediaMatcherInitValue,
      };

      if (!UserComponent) {
        // eslint-disable-next-line react/prop-types
        const { children } = this.props;
        return children({ ...renderProps });
      }

      // чтобы юзать со stateless компонентами
      if (!this.isStateless(UserComponent)) {
        addonsProps.ref = this.onRef;
      }

      return <UserComponent {...this.props} {...addonsProps} />;
    }
  };

// Hoc
export default makeMediaMatcher;

// RenderProps
export const WithMedia = makeMediaMatcher();
