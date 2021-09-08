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
                <h1>{{ $item->title }}</h1>
                @if($item->getVacancyCount())
                <div class="category-page__subtitle">
                    <span>{{ $item->getVacancyCount() }}</span> {{ trans_choice('messages.positions', $item->getVacancyCount()) }} {!! trans_choice('messages.in <span>_</span> location', app(\App\Repositories\CategoryRepository::class)->getLocationCount($item)) !!}
                </div>
                @endif
            </div>
        </header>

        <div class="category-page__content">
            <div class="container">
                <a href="{{ route('page.show', [app()->getLocale(), 'job-categories']) }}" class="go-back">@lang('messages.Back')</a>

                @include('site.partials.vacancy_list', [
                    'jobs' => $item->getVacancyList(),
                    'showCategory' => false,
                ])
            </div>
        </div>

    </section>

@stop
