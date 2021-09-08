@php
    $locations = \App\Repositories\LocationRepository::getHeroData();
@endphp
<section class="app-section map">
    <div class="container">
        <aside class="map__coords js-map-links">
            @foreach($locations as $location)
                @php($coords = ($location->map_coords ? explode(',', $location->map_coords) : false))
                @if ($coords)
                <a class="map__coords-city" style="--x-coord: {{ $coords[0] }}; --y-coord:{{ $coords[1] }};" href="{{ route('location.show', [app()->getLocale(), $location->slug]) }}" data-description="{!! $location->description !!}">
                    <span class="map__coords-city-marker"></span>
                    <span class="map__coords-city-name">{{ $location->title }}</span>
                </a>
                @endif
            @endforeach
        </aside>
        <div class="app-section__inner">
            <header class="app-section__header">
                <h1>@lang('messages.Our offices')</h1>
            </header>
            <div class="map__description js-map-description">

            </div>
        </div>
        <div class="map__media">
            <img src="/media/images/map_1x.png" alt="">
        </div>
    </div>

    <script>
        var $about = $('.js-map-description');

        $('.js-map-links').on('mouseenter', 'a', function (event) {
            $about
                .hide()
                .text($(this).data('description'))
                .fadeIn();
        }).on('mouseleave', 'a', function (event) {
            $about
                .hide()
                .text('');
        });

    </script>
</section>
