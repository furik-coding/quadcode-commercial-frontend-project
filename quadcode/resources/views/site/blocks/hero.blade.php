<section class="welcome {{ $block->input('add_class') }} has-overlap" style="--welcome-bg: url({{ $block->image('image', 'default', ['q' => 98]) }});">
    @if($block->file('video'))
    <div class="welcome__video-wrap">
        <video class="location-video" src="{{ $block->file('video') }}" autoplay="true" loop="true" muted="muted" poster="{{ $block->image('image') }}"></video>
    </div>
    @endif
    <div class="container">
        <div class="welcome__inner">
            @if($block->translatedInput('title'))
            <header class="welcome__header fw-600" style="margin-bottom: 1rem;">
                <h1>{!! $block->translatedInput('title') !!}</h1>
            </header>
            @endif
            {!! $block->translatedInput('description') !!}

        </div>
        <div class="welcome__call-to-scroll">
            <a href="#" class="action-marker js-scroll-down">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" ><path fill="currentcolor" d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"></path></svg>
            </a>
        </div>
    </div>
</section>
