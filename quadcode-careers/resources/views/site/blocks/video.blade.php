<section class="app-section about-video">
    <div class="about-video__inner">
        <div class="about-video__video-wrap">
            <video class="location-video js-about-video" src="{{ $block->file('video') }}" data-src="{{ $block->file('video_full') }}" autoplay="true" loop="true" muted="muted" poster="{{ $block->image('image') }}"></video>
        </div>
        <div class="about-video__overlay js-video-overlay">
            <div class="about-video__title">
                {{ $block->translatedInput('title') }}
            </div>
            @if($block->file('video_full'))
            <div class="about-video__control">
                <button class="btn js-play-btn">
                    <span>@lang('messages.Play video')</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <script>
        $(function(){
            var $video = $('.js-about-video'),
                $videoOverlay = $('.js-video-overlay'),
                $playBtn =  $('.js-play-btn'),
                $videoSrc = $video.data('src');

            $playBtn.on('click', function(){
                $videoOverlay.fadeOut();
                $video.attr('src', $videoSrc);
            });
        });
    </script>
</section>
