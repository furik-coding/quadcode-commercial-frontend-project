@extends('site.layouts.app', [
    'light_menu' => $item->light_menu
])
@section('title', $item->title)
@section('description', $item->description)
@section('keywords', $item->keywords)


@section('content')

    <section class="category-page" style="--category-page-bg: url({{ $item->image('cover', 'flexible') }});">
        <header class="category-page__header">
            <div class="container">
                <h1>{{ $item->title }}, {{ $item->country }}</h1>
                @if($item->getVacancyCount())
                <div class="category-page__subtitle">
                    <span>{{ $item->getVacancyCount() }}</span> {{ trans_choice('messages.positions', $item->getVacancyCount()) }} {!! trans_choice('messages.in <span>_</span> job categories', app(\App\Repositories\LocationRepository::class)->getCategoryCount($item)) !!}
                </div>
                @endif
                <div class="category-page__nav">
                    <a href="{{ route('page.show', [app()->getLocale(), 'locations']) }}" class="go-back">@lang('messages.Back')</a>
                    @if(strlen($item->about_office))
                        <a href="#about" class="taglink">
                            <svg class="taglink__icon" width="11px" height="15px" viewbox="0 0 11 15" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0L5 5L0 10" transform="matrix(-4.371139E-08 1 -1 -4.371139E-08 10.5 9)" id="Stroke-1" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="1" />
                                <path d="M0.5 0C0.5 0 0.5 4.66667 0.5 14" transform="translate(5 0.5)" id="Stroke-3" fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="1" />
                            </svg>
                            <span>@lang('messages.About the office')</span>
                        </a>
                    @endif
                </div>
            </div>
        </header>

        <div class="category-page__content">
            <div class="container">
                @include('site.partials.vacancy_list', [
                    'jobs' => $item->getVacancyList(),
                    'showLocation' => false,
                ])

            </div>

            {!! $item->about_office !!}
        </div>
    </section>

@stop
