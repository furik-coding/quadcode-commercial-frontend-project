@extends('site.layouts.app', [
    'light_menu' => $item->light_menu
])
@section('title', $item->title)
@section('description', $item->description)
@section('keywords', $item->keywords)


@section('content')
<main class="app-content search-jobs">
    <section class="category-page for-search-jobs" style="--category-page-bg: url(/files/search.jpeg);">
        <header class="category-page__header">
            <div class="container">
                <h1>@lang('messages.Jobs at Quadcode')</h1>
                @if($stats['positions'])
                <div class="category-page__subtitle">
                    <span>{{ $stats['positions'] }}</span> {{ trans_choice('messages.positions', $stats['positions']) }} {!! trans_choice('messages.in <span>_</span> location', $stats['locations'])  !!} {!! trans_choice('messages.in <span>_</span> job categories', $stats['categories']) !!}
                </div>
                @endif
            </div>
        </header>

        <div class="category-page__content">
            <div class="container">
                <div class="search-jobs__inner">
                    <div class="search-jobs__filter-picker">
                        @include('site.partials.search_form', ['showFilters' => true])
                    </div>
                    <div class="search-jobs__filter">
                        <div class="filter">
                            @if($filters['locations'])
                            <div class="filter__group">
                                <div class="filter__group-name">@lang('messages.Locations')</div>
                                <div class="filter__group-items">
                                    @foreach($filters['locations'] as $id => $location)
                                        @php
                                            $uri = $filterUri;
                                            unset($uri['location'][array_search($id, $uri['location'])]);
                                        @endphp
                                    <div class="filter__item">
                                        <a href="{{ route('search', $uri) }}" class="tag">
                                            <div class="tag__control">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
                                            </div>
                                            <div class="tag__value">{{ $location->title }}</div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if($filters['categories'])
                            <div class="filter__group">
                                <div class="filter__group-name">@lang('messages.Categories')</div>
                                <div class="filter__group-items">
                                    @foreach($filters['categories'] as $id => $category)
                                        @php
                                            $uri = $filterUri;
                                            unset($uri['category'][array_search($id, $uri['category'])]);
                                        @endphp
                                    <div class="filter__item">
                                        <a href="{{ route('search', $uri) }}" class="tag">
                                            <div class="tag__control">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
                                            </div>
                                            <div class="tag__value">{{ $category->title }}</div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="search-jobs__list">
                        @include('site.partials.vacancy_list', [
                            'searchPage' => true,
                            'jobs' => $vacancies,
                        ])
                    </div>
                </div>
            </div>
        </div>

    </section>
</main>

@stop
