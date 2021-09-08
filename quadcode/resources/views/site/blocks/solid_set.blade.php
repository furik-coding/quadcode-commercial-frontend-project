@php
    if ($block->hasImage('image2')) {
        $image = "--section-bg: url('". URL::asset('storage/uploads/'. $block->imageObject('image')->uuid) ."'), url('". URL::asset('storage/uploads/'. $block->imageObject('image2')->uuid) ."');";
    } else {
        $image = "--section-bg: url('". URL::asset('storage/uploads/'. $block->imageObject('image')->uuid) ."');";
    }
@endphp
<section class="app-section {{ $block->input('add_class') }}" style="{{ $image }} --section-text-color: var(--color-text-light);">
    <div class="container">
        <div class="app-section__inner">
            <header class="app-section__header">
                <h1>{!! $block->translatedInput('title') !!}</h1>
            </header>
            <div class="app-section__text">
                {!! $block->translatedInput('description') !!}
            </div>
        </div>
    </div>
</section>
