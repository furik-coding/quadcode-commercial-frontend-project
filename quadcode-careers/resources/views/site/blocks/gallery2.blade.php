@php

    $folder = public_path($block->input('folder'));

    $files = File::files($folder);

@endphp

<section class="app-section gallery">
    <div class="container">
        <div class="gallery__inner">
            @foreach($files as $image)
                <div class="gallery__item">
                    <img data-src="/gallery{{ $block->input('folder') }}{{ File::basename($image) }}" src="/gallery{{ $block->input('folder') }}{{ File::basename($image) }}?w=254" alt="">
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="gallery-modal">
    <div class="gallery-modal__close js-close-modal">
        <svg width="18px" height="18px" viewbox="0 0 18 18" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M0.888889 1L15.1111 15" transform="translate(1 1)" fill="none" fill-rule="evenodd"
                  stroke="#fff" stroke-width="2" stroke-linecap="square" />
            <path d="M0.888889 1L15.1111 15" transform="matrix(-1 0 0 1 17 1)" fill="none" fill-rule="evenodd"
                  stroke="#fff" stroke-width="2" stroke-linecap="square" />
        </svg>
    </div>
    <div class="gallery-modal__inner">
        <div class="slider-arrow as-prev-btn slick-arrow" style=""></div>
        <div class="slider-arrow as-next-btn"></div>

        <div class="gallery-modal__content">

        </div>
        <div class="gallery-modal__counter">
            <span> </span> /
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('.gallery__item img').each(function (index, item) {
            $(item).on('click', function () {
                let tomodalContent = `
                <img data-index="${index}" src="${$(item).attr('data-src')}" alt="modal image" />
            `;
                $('.gallery-modal').addClass('is-active');
                $('.gallery-modal__content').html(tomodalContent);
                $('.gallery-modal__counter').html('<span>' + (index + 1) + '</span>/' + $('.gallery__item img').length);
            });
        });

        $('.gallery-modal__close').on('click', function () {
            $('.gallery-modal').removeClass('is-active');
        });

        $('.gallery-modal .as-prev-btn').on('click', function () {
            let index = parseInt($('.gallery-modal__content img').attr('data-index')) - 1;
            if (index < 0) {
                index = $('.gallery__item img').length - 1;
            } else if (index >= $('.gallery__item img').length) {
                index = 0;
            }
            $('.gallery-modal__counter span').text(index + 1);
            let imgSrc = $('.gallery__item img:eq(' + index + ')').attr('data-src');
            let tomodalContent = `
            <img data-index="${index}" src="${imgSrc}" alt="modal image" />
        `;

            $('.gallery-modal__content').html(tomodalContent);
        })

        $('.gallery-modal .as-next-btn').on('click', function () {
            let index = parseInt($('.gallery-modal__content img').attr('data-index')) + 1;
            if (index < 0) {
                index = $('.gallery__item img').length - 1;
            } else if (index >= $('.gallery__item img').length) {
                index = 0;
            }
            $('.gallery-modal__counter span').text(index + 1);
            let imgSrc = $('.gallery__item img:eq(' + index + ')').attr('data-src');
            let tomodalContent = `
            <img data-index="${index}" src="${imgSrc}" alt="modal image" />
        `;

            $('.gallery-modal__content').html(tomodalContent);
        })

        $('.gallery-modal').on('click', function(e){
            if (!$('.gallery-modal__inner').is(e.target) && $('.gallery-modal__inner').has(e.target).length === 0) {
                $('.gallery-modal').removeClass('is-active');
            }
        });
    });
</script>
