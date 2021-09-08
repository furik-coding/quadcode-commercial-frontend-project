import React, { useState } from 'react';
import ReactMapGL, { Marker } from 'react-map-gl';
import _ from 'lodash';

import { MapWrapper, Mark, Title, ContentWrapper, Text } from './styled';

const markerImage = require('images/common/marker.png');

const MAP_TOKEN =
  'pk.eyJ1Ijoidm9seXBvayIsImEiOiJjanppODZpYWsxM2g0M2xqd21vcGc0cGRsIn0.d6ZDWTM1DhiaoLnJ9yEY4w';
const lat = 34.703019;
const lng = 33.060404;

const viewportConf = {
  mapbox: '//styles/mapbox/dark',
  latitude: 34.70073705204636,
  longitude: lng,
  zoom: 15,
};

const Map = () => {
  const [{ viewport, changeOriginView }, setViewport] = useState({
    viewport: { ...viewportConf },
    changeOriginView: false,
  });
  const setViewportDebounce = _.debounce(setViewport, 20000);

  const onViewportChange = (newViewport) => {
    const keys = ['latitude', 'longitude', 'zoom'];

    const isChangedOriginView = !_.isEqual(
      _.values(_.pick(newViewport, keys)),
      _.values(_.pick(viewportConf, keys)),
    );

    setViewport({ viewport: newViewport, changeOriginView: isChangedOriginView });

    setViewportDebounce({
      viewport: viewportConf,
      changeOriginView: false,
    });
  };

  return (
    <MapWrapper>
      <ReactMapGL
        {...viewport}
        width="100%"
        height="100%"
        mapStyle="mapbox://styles/mapbox/dark-v9"
        mapboxApiAccessToken={MAP_TOKEN}
        onViewportChange={onViewportChange}
      >
        <Marker latitude={lat} longitude={lng} offsetLeft={-20} offsetTop={-40}>
          <Mark src={markerImage} />
        </Marker>
      </ReactMapGL>

      <ContentWrapper active={!changeOriginView}>
        <Title>Quadcode</Title>
        <Text>
          Yiannis Nicolaides Business Center, Agiou Athanasiou Avenue 33,
          <br />
          4102, Agios Athanasios, Limassol, Cyprus
        </Text>
      </ContentWrapper>
    </MapWrapper>
  );
};

export default Map;
