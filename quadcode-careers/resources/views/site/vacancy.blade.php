@extends('site.layouts.app', [
    'light_menu' => true
])
@section('title', $item->title)
@section('description', $item->description)
@section('keywords', $item->keywords)


@section('content')
    <section class="app-section">
        <div class="container">
            <div class="app-section__inner">

                <div class="position">

                    <div class="position__info">
                        <a href="{{ url()->previous() }}" class="go-back">
                            <svg stroke-width="1.7px" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 11L1 6L6 1" stroke="#F1162F"/>
                            </svg>
                            @lang('messages.Back')
                        </a>
                        <div class="position__name">
                            <a href="{{ route('category.show', [app()->getLocale(), $item->category->slug]) }}" class="link">{{ $item->getCategoryTitle() }}</a>
                            <h1 class="fw-600">{{ $item->getTitle() }}</h1>
                        </div>
                        <div class="position__location">
                            <div class="position__item-name typo--caption color--text-secondary">
                                <img src="/files/icons/geo_icon.svg" alt="">
                                <span>@lang('messages.Location')</span>
                            </div>
                            <div class="fw-600">{{ $item->getLocationTitle() }}</div>
                        </div>
                        <div class="position__type">
                            <div class="position__item-name typo--caption color--text-secondary">
                                <img src="/files/icons/jobtype_icon.svg" alt="">
                                <span>@lang('messages.Job type')</span>
                            </div>
                            <div class="fw-600">{{ $item->getJobType() }}</div>
                        </div>
                        <div class="position__department">
                            <div class="position__item-name typo--caption color--text-secondary">
                                <img src="/files/icons/department_icon.svg" alt="">
                                <span>@lang('messages.Department')</span>
                            </div>
                            <div class="fw-600">{{ $item->getTeam() }}</div>
                        </div>
                        <div class="position__money">
                            <div class="position__item-name typo--caption color--text-secondary">
                                <img src="/files/icons/salary_icon.svg" alt="">
                                <span>@lang('messages.Money')</span>
                            </div>
                            <div class="fw-600">
{{--                                <span class="currency">₽</span>--}}
                                {{ $item->getMoney() }}
                            </div>
                        </div>
                        <div class="position__actions">
                            <a href="{{ route('application', [app()->getLocale(), $item->id]) }}" class="btn is-primary js-modal" data-modal="application" data-vacancy="{{ $item->id }}">@lang('messages.Apply now')</a>
{{--                            <a href="#" class="link fw-600 typo--subtitle2">Refer a friend</a>--}}
                        </div>
                    </div>

                    <div class="position__details">
                        {!! $item->body !!}

                        @if($item->show_tasks)
                            <p class="typo-subtitle fw-600">@lang('messages.Position tasks'):</p>
                            {!! $item->tasks !!}
                        @endif

                        @if($item->show_requirements)
                            @if(strip_tags($item->requirements_title))
                            <p class="typo-subtitle fw-600">{{ strip_tags($item->requirements_title) }}</p>
                            @endif
                            {!! $item->requirements !!}
                        @endif

                        @if($item->show_conditions)
                            @if(strip_tags($item->requirements_title))
                            <p class="typo-subtitle fw-600">{{ strip_tags($item->conditions_title) }}</p>
                            @endif
                            {!! $item->conditions !!}
                        @endif

                        @if($item->show_about_team)
                            <p class="typo-subtitle fw-600">@lang('messages.About team')</p>
                            {!! $item->about_team !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
