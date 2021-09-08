<section class="app-section cross-platform">
    <div class="container">
        <div class="app-section__inner cross-platform__inner">
            <div class="cross-platform__description">
                <header class="app-section__header cross-platform__header" data-animation="fadeinbottom">
                    <h1>{!! $block->translatedInput('title')  !!}</h1>
                </header>
                <div class="app-section__text cross-platform__text" data-animation="fadeinbottom" style="--anim-delay: .1s;">
                    {!! $block->translatedInput('description') !!}
                </div>
                <div class="cross-platform__icons" data-animation-childs="fadeinleft" style="--anim-delay: .2s;">
                    <div class="cross-platform__icon cross-platform__icon--android" style="--anim-index: 1;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 33 38"><g fill="none" fill-rule="evenodd"><path d="M2.5 12C1.108 12 0 13.006 0 14.27v9.46C0 24.993 1.108 26 2.5 26S5 24.994 5 23.73v-9.46C5 13.007 3.892 12 2.5 12M30.5 12c-1.392 0-2.5 1.006-2.5 2.27v9.46c0 1.264 1.108 2.27 2.5 2.27s2.5-1.006 2.5-2.27v-9.46c0-1.264-1.108-2.27-2.5-2.27M6 28.036c0 1.39 1.132 2.508 2.538 2.508h1.684v5.13c0 1.295 1.044 2.326 2.355 2.326s2.355-1.03 2.355-2.326v-5.13h3.136v5.13c0 1.295 1.044 2.326 2.355 2.326s2.355-1.03 2.355-2.326v-5.13h1.684c1.406 0 2.538-1.118 2.538-2.508V13H6v15.036z" fill="var(--color-highlight)"></path><g transform="translate(6)"><path d="M15.314 8.147a.878.878 0 0 1-.873-.871c0-.477.395-.872.873-.872s.873.395.873.872a.878.878 0 0 1-.873.871m-9.66 0a.878.878 0 0 1-.873-.871c0-.477.395-.872.873-.872s.873.395.873.872a.878.878 0 0 1-.873.871m9.962-4.57L17.269.594a.323.323 0 0 0-.13-.452.329.329 0 0 0-.453.13l-1.674 3.013a11.17 11.17 0 0 0-4.528-.947c-1.622 0-3.158.34-4.528.947L4.281.272a.329.329 0 0 0-.452-.13.323.323 0 0 0-.13.453l1.653 2.981C2.172 5.23.024 8.37.02 11.972h20.93c-.005-3.603-2.153-6.743-5.333-8.396" fill="var(--color-highlight)"></path></g></g></svg>
                    </div>
                    <div class="cross-platform__icon cross-platform__icon--apple" style="--anim-index: 2;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 33 40"><g fill="none" fill-rule="evenodd"><path d="M18.779 3.394C21.362.017 24.954 0 24.954 0s.534 3.176-2.032 6.235c-2.74 3.267-5.855 2.733-5.855 2.733s-.585-2.57 1.712-5.574" fill="var(--color-highlight)"></path><g transform="translate(0 10)"><path d="M16.758 1.875c1.366 0 3.902-1.833 7.202-1.833 5.681 0 7.916 3.945 7.916 3.945s-4.37 2.18-4.37 7.473c0 5.97 5.444 8.027 5.444 8.027s-3.806 10.455-8.948 10.455c-2.361 0-4.197-1.553-6.685-1.553-2.536 0-5.052 1.611-6.69 1.611C5.93 30 0 20.082 0 12.11 0 4.267 5.02.152 9.73.152c3.06 0 5.436 1.723 7.028 1.723" fill="var(--color-highlight)"></path></g></g></svg>
                    </div>
                    <div class="cross-platform__icon cross-platform__icon--win" style="--anim-index: 3;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 35"><g fill="var(--color-highlight)" fill-rule="evenodd"><path d="M16.003 2.792C21.993 1.812 27.995.89 33.996 0c.004 5.62 0 11.237.004 16.858-5.998.024-11.996.122-17.997.142-.004-4.739-.004-9.473 0-14.208zM0 4.986C4.983 4.244 9.987 3.604 14.992 3c.004 4.649.004 9.293.008 13.942-5-.004-10 .069-15 .057V4.986zM0 18.002c4.998-.016 9.995.06 14.993.053 0 4.648.013 9.297.004 13.945-4.993-.711-9.995-1.334-14.997-1.985V18.002zM16 18h17.997c.007 5.665 0 11.33 0 17-5.983-.97-11.977-1.87-17.97-2.748-.008-4.75-.02-9.499-.027-14.252"></path></g></svg>
                    </div>
                </div>
            </div>
            <div class="cross-platform__decor">
                <div class="cross-platform__decor-inner">
                    <img src="/files/cross-platform.png" alt="{{ $block->translatedInput('title') }}">
                    <div class="cross-platform__decor-sync">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 34 27" id="flip"><g fill="none" fill-rule="evenodd"><path d="M17.066 0C21.501 0 25.451 2.074 28 5.306l-3.584 2.326a9.675 9.675 0 0 0-16.393 2.85h3.913L5.968 19 0 10.482h3.577C5.108 4.457 10.567 0 17.067 0" fill="var(--color-highlight)"></path><g transform="translate(5 8)"><path d="M11.562 19C7.035 19 3.002 16.97.4 13.807l3.658-2.278c1.811 2.03 4.5 3.315 7.504 3.315 4.217 0 7.817-2.536 9.232-6.104H16.8L22.892.401l6.093 8.339h-3.652C23.771 14.637 18.198 19 11.562 19" fill="var(--color-highlight)"></path></g></g></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="app-section cross-platform-lists" style="--section-padding: 0 0 10rem 0">
    <div class="container">
        <div class="app-section__inner cross-platform-lists__inner">
            @foreach($block->children as $child)
            <div class="cross-platform-lists__item">
                <div class="cross-platform-lists__item-title">{{ $child->translatedInput('title') }}</div>
                <div class="cross-platform-lists__item-text">{{ $child->translatedInput('subtitle') }}</div>
                {!! $child->translatedInput('description') !!}
            </div>
            @endforeach
        </div>
    </div>
</section>
