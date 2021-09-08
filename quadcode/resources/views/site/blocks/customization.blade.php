<section class="app-section is-full-height-desktop {{ $block->input('add_class') }}">
    <div class="container">
        <div class="app-section__inner customization__inner">
            <div class="customization__description">
                <header class="app-section__header customization__header" data-animation="fadeinbottom">
                    <h1>{!! $block->translatedInput('title') !!}</h1>
                </header>
                <div class="app-section__text customization__text" data-animation="fadeinbottom" style="--anim-delay: .1s;">
                    {!! $block->translatedInput('description') !!}
                </div>
            </div>
            <div class="customization__decor">
                <div class="customization__decor-img">
                    <div class="customization__text-layer">
                        <div class="customization__layer-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 30"><g fill="none" fill-rule="evenodd"><path d="M9.918 20.56l-.833.834.688.689.833-.834c.24-.24.26-.512.041-.73-.19-.19-.48-.207-.729.042M15.316 15.516l.942-.942-1.77-.829zM11.569 16.51l-.68.68.816.815.679-.68c.254-.254.295-.602.036-.86-.25-.25-.597-.21-.851.045M9.36 19.351c-.185-.186-.451-.18-.67.036l-.805.807.634.634.806-.807c.218-.217.23-.475.036-.67M22.644 7.319c-.53-.53-1.268-.616-1.884 0l-.553.553 1.889 1.888.548-.548c.598-.598.516-1.377 0-1.893" fill="var(--color-highlight)"></path><g transform="translate(0 -.94)"><path d="M33.163 7.171c1.814 2.56 1.274 6.083-1.204 7.854-1.454 1.04-3.489 1.292-5.117.631l2.202-2.202a3.415 3.415 0 0 0 .998-2.544l-.228-6.005c.118.028.236.056.353.092a5.727 5.727 0 0 1 2.996 2.174zm-11.144 4.737l-3.021-3.02 1.191-1.192c.947-.947 2.206-1 3.112-.095.915.915.856 2.17-.086 3.111l-1.196 1.196zm2.778-8.828a2.14 2.14 0 0 1 3.306.35c-.074.003-.149-.004-.223.002-.222.021-.441.07-.664.095-1.093.125-2.467 1.027-2.467 1.027-.285.19.42 1.383.543 1.254 0 0 .057-.048.087-.069a5.334 5.334 0 0 1 2.895-.986c.053-.002.106.001.159 0a2.118 2.118 0 0 1-.611 1.352 2.138 2.138 0 1 1-3.025-3.025zm-6.316 6.491l2.938 2.937-.621.621-2.842-.442-.568-.088.499.498 1.471 1.472-.643.643-1.014-1.014-2.007-2.007.662-.66 1.75.263 1.547.234-1.357-1.357-.541-.54.643-.644.083.084zm-.778 6.653l-.319-.146-.383-.176-1.295 1.296.321.702-.729.73-1.857-4.186.806-.806 3.302 1.465.883.392-.729.73zm-3.294 3.294l-1.667-.48-.471.472 1.073 1.073-.643.643-3.021-3.02 1.413-1.414c.63-.629 1.431-.607 1.993-.045.53.53.48 1.16.231 1.562l1.835.467-.743.742zm-3.073 3.073l-1.64 1.64-3.021-3.02 1.59-1.59c.575-.576 1.236-.504 1.64-.1.375.376.398.87.172 1.213.376-.276.942-.217 1.318.16.457.456.521 1.118-.059 1.697zM29.912 3.55c-.093-.019-.188-.02-.281-.037a3.407 3.407 0 0 0-3.162-2.409L20.065.94c-.043 0-.086.003-.13.004a3.41 3.41 0 0 0-2.372.995L.499 19.002a1.706 1.706 0 0 0 0 2.411L9.587 30.5a1.704 1.704 0 0 0 2.411 0l8.947-8.946 4.878-4.879c2.19 1.046 4.833.926 6.91-.558 3.079-2.199 3.76-6.562 1.52-9.724a7.055 7.055 0 0 0-4.341-2.844z" fill="var(--color-highlight)"></path></g></g></svg>
                        </div>
                        <div>
                            {{ $block->translatedInput('logo_caption') }}
                        </div>
                    </div>
                    <div class="customization__text-layer">
                        <div class="customization__layer-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36"><g fill="none" fill-rule="evenodd"><path d="M13.149 9.086l-1.956 2.244c1.627 3.045 1.595 5.631.79 7.138l1.592 1.388 1.857 1.618c2.042-1.479 4.572-1.288 6.915-.423l1.956-2.245-11.155-9.72zm-1.78 10.08l1.747 1.52 1.745 1.521-8.088 11.42c-3.771 4.114-9.17-.59-5.608-4.889l10.204-9.573zm22.909-6.548c.345 1.706.41 3.38-1.465 4.825 3.047-.154 3.029-2.934 1.465-4.825zm-1.316-2.275s1.935 1.663 2.627 3.835c.488 1.527.032 3.088-1.231 3.464-2.852.848-5.326-1.55-3.158-3.796 1.067-1.105 1.5-2.449 1.762-3.503zM21.232 0s-2.767.486-2.68 2.454c.066 1.461 3.419 4.273 4.922 6.523 2.556 9.021 8.995 4.16 9.177.973L21.232 0zm6.744 14.993l-2.841 3.26-11.42-9.95 4.012-4.606c.223.443.534.864.796 1.201.628.803 1.337 1.56 2.018 2.32.645.714 1.328 1.473 1.872 2.271.453 1.566 1.183 3.293 2.41 4.405.881.8 1.965 1.214 3.152 1.1z" fill="var(--color-highlight)"></path></g></svg>
                        </div>
                        <div>
                            {{ $block->translatedInput('colour_caption') }}
                        </div>
                    </div>
                    <div class="customization__text-layer">
                        <div class="customization__layer-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 18" id="menu"><g fill="var(--color-highlight)" fill-rule="evenodd"><path d="M0 4h21V0H0zM0 11h21V7H0zM0 18h21v-4H0z"></path></g></svg>
                        </div>
                        <div>
                            {{ $block->translatedInput('menu_caption') }}
                        </div>
                    </div>
                    <img src="/files/customization_01.png" alt="{{ $block->translatedInput('title') }}">
                </div>
            </div>
        </div>
    </div>
</section>
