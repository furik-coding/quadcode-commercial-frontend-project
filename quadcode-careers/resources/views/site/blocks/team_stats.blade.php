<section class="app-section app-section__anchor" id="team-parts-slider">
    <div class="container" style="--container-max-width: 90rem;">
        <div class="team-parts-slider slider-wrap">
            <div class="slider js-about-slider1">
                @foreach($block->children as $child)
                    <div class="slider__item">
                        <div class="slider__item-inner">
                            <header class="app-section__header">
                                <h1>{!! $child->translatedInput('title') !!}</h1>
                            </header>
                            <div class="slider-content">
                                {!! $child->translatedInput('description') !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-nav js-about-slider1-nav">
                @foreach($block->children as $child)
                    <div class="slider-nav__item">
                        <div class="slider-nav__item-inner">
                            <div class="slider-nav__item-marker"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow as-prev-btn"></div>
            <div class="slider-arrow as-next-btn"></div>
        </div>
    </div>
</section>
<script>
    $('.js-about-slider1').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        fade: true,
        arrows: true,
        prevArrow: '.slider-arrow.as-prev-btn',
        nextArrow: '.slider-arrow.as-next-btn',
        autoplaySpeed: 5000,
        asNavFor: '.js-about-slider1-nav',
        adaptiveHeight: false
    });

    $('.js-about-slider1-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: false,
        autoplay: false,
        asNavFor: '.js-about-slider1',
        centerMode: true,
        focusOnSelect: true,
    });
</script>
