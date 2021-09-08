<section class="app-section new-era is-rounded is-overlap">
    <div class="container">
        <div class="app-section__inner">
            <header class="app-section__header">
                <h1>{!! $block->translatedInput('title') !!}</h1>
            </header>
            <div class="app-section__text">
                {!! $block->translatedInput('description') !!}
            </div>
            <img src="{{ $block->image('image', 'default', ['q' => 98]) }}" alt="{{ $block->translatedInput('title') }}">
        </div>
    </div>
</section>
