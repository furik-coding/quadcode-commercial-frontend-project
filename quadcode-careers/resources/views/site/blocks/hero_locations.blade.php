@php
    $locations = \App\Repositories\LocationRepository::getHeroData();
@endphp
<section class="locations" style="--locations-bg: url({{ $block->image('image') }});">
    <div class="locations__video-wrap">
        <video class="location-video" src="{{ $block->file('video') }}" autoplay="true" loop="true" muted="muted" poster="{{ $block->image('image') }}"></video>
    </div>
    <div class="container">
        <div class="locations__inner">
            <div class="locations__selector">
                <div id="selector-marker" class="locations__selector-marker"></div>
                @foreach($locations as $location)
                <a class="locations__place"
                   href="{{ route('location.show', [app()->getLocale(), $location->slug]) }}"
                     data-img="{{ $location->image('video_poster', 'flexible') }}"
                     data-video="{{ $location->file('video') }}"
                     data-positions="{{ $location->getVacancyCount() }}"
                     data-description="{{ $location->description }}"
                     data-prepositional="{{ $location->title_prepositional }}"
                >
                    <div class="locations__city">{{ $location->title }}</div>
                    <div class="locations__country">{{ $location->country }}</div>
                </a>
                @endforeach
            </div>
            <div class="locations__page">
                <header class="locations__header">
                    <h1>@lang('messages.Work with us')<br><span class="js-location-title fw-600">@lang('messages.around the world')</span></h1>
                </header>
                <div class="locations__positions-num js-location-pos-num"></div>
                <div class="locations__positions-location">
                    <span class="js-location-pos"></span>
                    <span class="locations__positions-location-message">@lang('messages.positions open currently')</span>
                </div>
                <div class="locations__description js-location-description"></div>
            </div>
        </div>
    </div>


    <script>
        // Loading video on mouse in for every location via theirs data-video-name attribute and other data
        var $link = $('.locations__place');
        var $linkWrapper = $('locations__selector');
        var $videoWrapper = $('.locations__video-wrap');
        var $video = $('.location-video');
        var $marker = $('#selector-marker');
        var $pageTitle = $('.js-location-title');
        var $pagePositions = $('.js-location-pos-num');
        var $pageLocationPos = $('.js-location-pos');
        var $pageDescription = $('.js-location-description');

        $link.mouseenter(function() {
            // Setting current elem
            $link.removeClass('is-current');
            $(this).addClass('is-current');

            // Add new videoframe and remove old for transition
            var $newVideo = $video.clone().addClass('animate').attr({'src': $(this).data('video'), 'poster': $(this).data('img')});
            $newVideo.appendTo($videoWrapper);
            $('video:first-child').remove();

            // Set marker position
            var offsetTop = $(this).position().top;
            $marker.show().height($(this).height()).css('top', offsetTop);

            // Set data for selection
            $pageTitle.text($(this).data('prepositional'));
            $pagePositions.text($(this).data('positions'));
            $pageLocationPos.text($(this).data('prepositional'));
            $pageDescription.html($(this).data('description'));
        });
    </script>
</section>
