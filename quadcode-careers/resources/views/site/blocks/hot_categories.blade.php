@php
    $categories = \App\Repositories\CategoryRepository::getTopData();
@endphp
<section class="app-section app-section__anchor" id="hot-categories">
    <div class="container">
        <div class="app-section__inner">
            <header class="app-section__header">
                <h1>@lang('messages.Hot categories')</h1>
            </header>
            <div class="categories">
                <ul class="categories__list">
                    @foreach($categories as $category)
                    <li class="categories__list-item">
                        <a href="{{ route('category.show', [app()->getLocale(), $category->slug]) }}" class="category">
                            <div class="category__image">
                                @if ($category->hasImage('thumbnail', 'flexible'))
                                    <img src="{{ URL::asset('storage/uploads/'. $category->imageObject('thumbnail', 'flexible')->uuid) }}" alt="{{ $category->title }}">
                                @endif
                            </div>
                            <div class="category__value{{ !$category->getVacancyCount() ? " category__value__empty" : "" }}">
                                <span>{{ $category->getVacancyCount() }}</span>
                            </div>
                            <div class="category__name">
                                <span>{{ $category->title }}</span>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
