<section class="app-section is-rounded {{ $block->input('add_class') }}" style="position: relative; z-index: 2; margin-top: -2rem;">
    <div id="block{{ $block->id }}" class="app-section__anchor"></div>
    <div class="container">
        <div class="app-section__inner">
            @if($block->translatedInput('title'))
            <header class="app-section__header" data-animation="fadeinbottom">
                <h1>{{ $block->translatedInput('title') }}</h1>
            </header>
            @endif
            <div class="features">
                @foreach($block->children as $child)
                    @include('site.blocks.why_quadcode_item', $child)
                @endforeach
            </div>
        </div>
    </div>
</section>
