<section class="app-section is-full-height">
    <div class="container">
        <div class="app-section__inner">
            <div class="what-we-values">
                <div class="what-we-values__nav">
                    <div class="what-we-values__nav-title">{!! $block->translatedInput('title') !!}</div>
                    <div class="what-we-values__nav-items">
                        <div class="what-we-values__nav-slider js-what-we-values-nav">
                            @foreach($block->children as $i => $child)
                            <div class="what-we-values__nav-slider-item">
                                <div class="what-we-values__nav-item">{{ $child->translatedInput('title') }}<sup>{{ ++$i }}</sup></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="what-we-values__descriptions">
                    <div class="what-we-values__descriptions-inner js-what-we-values-content">
                        @foreach($block->children as $i => $child)
                        <div class="what-we-values__description">
                            <div class="what-we-values__description-title">{{ $child->translatedInput('title') }}<sup>{{ ++$i }}</sup></div>
                            <div class="what-we-values__description-text">
                                {!! $child->translatedInput('description') !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.js-what-we-values-content').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        autoplay: false,
        fade: true,
        arrows: false,
        autoplaySpeed: 3000,
        asNavFor: '.js-what-we-values-nav',
        adaptiveHeight: true
    });

    $('.js-what-we-values-nav').slick({
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        dots: false,
        fade: false,
        autoplay: false,
        asNavFor: '.js-what-we-values-content',
        focusOnSelect: true,
        centerMode: true,
    });

    let blocked = false;
    let blockTimeout = null;
    let prevDeltaY = 0;
    let scrollTop = $(document).scrollTop();

    $(document).on('scroll', (function(e) {
        let deltaY = $(document).scrollTop() - scrollTop;
        e.preventDefault();
        e.stopPropagation();

        clearTimeout(blockTimeout);
        blockTimeout = setTimeout(function(){
            blocked = false;
        }, 50);

        if (deltaY > 0 && deltaY > prevDeltaY || deltaY < 0 && deltaY < prevDeltaY || !blocked) {
            blocked = true;
            prevDeltaY = deltaY;

            if (deltaY > 0) {
                $('.js-what-we-values-content').slick('slickNext');
            } else {
                $('.js-what-we-values-content').slick('slickPrev');
            }
            scrollTop = $(document).scrollTop();
        }
    }));

</script>
