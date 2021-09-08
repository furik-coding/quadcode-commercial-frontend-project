<section class="app-section">
    <div class="container">
        <div class="app-section__inner">
            <div class="team-features js-team-features-slider">
                @foreach($block->children as $child)
                    @include('site.blocks.features_list_item', $child)
                @endforeach
            </div>
            <div class="slider-nav team-features-slider-nav js-team-features-slider-nav">
                @foreach($block->children as $child)
                <div class="slider-nav__item">
                    <div class="slider-nav__item-inner">
                        <div class="slider-nav__item-marker"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    $('.js-team-features-slider').slick({
        autoplay: false,
        fade: true,
        arrows: false,
        asNavFor: '.js-team-features-slider-nav',
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 2000,
                settings: "unslick"
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.js-team-features-slider-nav').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: false,
        autoplay: false,
        asNavFor: '.js-team-features-slider',
        focusOnSelect: true,
        centerMode: true,
    });
</script>
