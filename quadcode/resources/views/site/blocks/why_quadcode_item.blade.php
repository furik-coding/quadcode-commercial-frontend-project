<div class="features__item" data-animation="fadeinleft" style="--anim-delay: 0.2s;">
    <div class="features__icon">
        <img src="{{ $child->file('icon') }}" alt="{{ $child->translatedInput('title') }}">
    </div>
    <div class="features__title">{{ $child->translatedInput('title') }}</div>
    <div class="features__text">{{ $child->translatedInput('description') }}</div>
</div>
