<section class="welcome" style="--welcome-bg: url({{ $block->image('image') }}); --header-font-size: var(--typo-headline);">
    <div class="locations__video-wrap">
        <video class="location-video" src="{{ $block->file('video') }}" autoplay="true" loop="true" muted="muted" poster="{{ $block->image('image') }}"></video>
    </div>
    <div class="container">
        <div class="welcome__inner">
            <header class="welcome__header fw-600" style="margin-bottom: 1rem;">
                <h1>{!! $block->translatedInput('title') !!}</h1>
            </header>
            {!! $block->translatedInput('description') !!}


        </div>
        <div class="welcome__call-to-scroll">
            <a href="#" class="action-marker js-scroll-down">
                <svg viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L13 1" stroke="white" stroke-width="2"/>
                </svg>
            </a>
        </div>
    </div>
</section>
