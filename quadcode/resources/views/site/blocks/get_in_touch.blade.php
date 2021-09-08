<section class="app-section get-in-touch {{ $block->input('add_class') }}">
    <div class="container">
        <div class="app-section__inner">
            <header class="app-section__header" data-animation="fadeinbottom">
                <h1>{!! $block->translatedInput('title') !!}</h1>
            </header>
            {!! $block->translatedInput('description') !!}
        </div>
    </div>
</section>
