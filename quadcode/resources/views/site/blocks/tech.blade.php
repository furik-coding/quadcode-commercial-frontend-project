<section class="app-section {{ $block->input('add_class') }}" style="--section-top-offset: 3rem; --section-bg-color: var(--color-section-background-light);">
    <div class="container">
        <div class="app-section__inner">
            @if($block->translatedInput('title'))
            <header class="app-section__header">
                <h1>{!! $block->translatedInput('title') !!}</h1>
            </header>
            @endif
            <div class="app-section__text">
                {!! $block->translatedInput('description') !!}
            </div>
            <div class="latest-techs__lists">
                @foreach($block->children as $child)
                    @include('site.blocks.tech_item', $child)
                @endforeach
            </div>
        </div>
    </div>
</section>
