@section('head')
    <link rel="stylesheet" href="/media/js/vendor/slick/slick.css">
    <link rel="stylesheet" href="/media/js/vendor/slick/slick-theme.css">
@endsection
@php
    $members = \App\Repositories\TeamRepository::getData();
@endphp
<section class="app-section team">
    <div class="container">
        <div class="team__inner">
            <div class="team-slider js-team-slider">
                @foreach ($members as $member)
                <div class="team-slider__item">
                    <div class="team-slider__item-inner">
                        <div class="team-slider__item-description">
                            <blockquote class="blockquote">
                                <p class="blockquote__text">
                                    {!! $member->description !!}
                                </p>
                                <div class="blockquote__author">{{ $member->title }}</div>
                                <div class="blockquote__author-position">{{ $member->job_place }}</div>
                            </blockquote>
                        </div>
                        <div class="team-slider__item-image">

                            <img src="{!! $member->image('cover', 'desktop', ['w' => '480', 'h' => '570', 'q' => 95]) !!}" alt="{{ $member->title }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="team-slider-nav js-team-slider-nav">
                @foreach ($members as $member)
                <div class="team-slider-nav__item">
                    <div class="team-slider-nav__item-inner">
                        <div class="team-slider-nav__item-marker"></div>
                        <div class="team-slider-nav__item-name">{{-- $member->title --}}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="team-slider-arrow as-prev-btn"></div>
            <div class="team-slider-arrow as-next-btn"></div>
        </div>
    </div>
</section>

<script type="text/javascript">

    // Инициализация слайдера Team
    $('.js-team-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        fade: true,
        arrows: true,
        prevArrow: '.team-slider-arrow.as-prev-btn',
        nextArrow: '.team-slider-arrow.as-next-btn',
        autoplaySpeed: 5000,
        asNavFor: '.js-team-slider-nav',
        adaptiveHeight: true
    });

    // Инициализация доп. навигации для слайдера Team
    $('.js-team-slider-nav').slick({
        slidesToShow: $('.team-slider-nav__item').length,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: false,
        autoplay: false,
        asNavFor: '.js-team-slider',
        centerMode: true,
        focusOnSelect: true,
    });

</script>
