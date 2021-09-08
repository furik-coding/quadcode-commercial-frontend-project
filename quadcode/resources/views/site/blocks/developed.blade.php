<section class="app-section {{ $block->input('add_class') }} developed-by" style="--section-bg: url({{ URL::asset('storage/uploads/'. $block->imageObject('image')->uuid) }});">
    <div class="container">
        <div class="app-section__inner">
            <header class="app-section__header developed-by__header" data-animation-childs="fadeintop">
                <img src="/files/logo_devquadcode.png" alt="" style="--anim-delay: 0.05s;">
                <div class="app-section__text developed-by__text color--text-light" style="--anim-delay: 0.15s;">
                    {!! $block->translatedInput('description') !!}
                </div>
            </header>

        </div>
    </div>
</section>

<section class="app-section developed-by-logos" style="--section-bg-color: var(--color-section-background-dark);">
    <div class="container">
        <div class="app-section__inner">
            <div class="developed-by__logos">
                <div class="developed-by__logo">
                    <img src="/files/logo_8xtrade.png" alt="">
                </div>
                <div class="developed-by__logo">
                    <img src="/files/logo_mangotrade.png" alt="">
                </div>
                <div class="developed-by__logo">
                    <img src="/files/logo_iqoption.png" alt="">
                </div>
                <div class="developed-by__logo">
                    <img src="/files/logo_capitalbear.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
