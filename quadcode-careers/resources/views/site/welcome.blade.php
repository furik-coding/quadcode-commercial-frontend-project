@extends('site.layouts.app')
@section('title', $item->title)
@section('description', $item->description)
@section('keywords', $item->keywords)

@section('content')

    <section class="welcome" style="--welcome-bg: url(/files/index.jpeg);">
        <div class="welcome__video-wrap">
            <video class="location-video" src="/files/index.mp4" autoplay="true" loop="true" muted="muted" poster="/files/index.jpeg"></video>
        </div>
        <div class="container">
            <div class="welcome__inner">
                <header class="welcome__header fw-600">
                    <h1>@lang('messages.We like our work<br> — if you too,<br> join our team')</h1>
                </header>
                <div class="welcome__search">
                    @include('site.partials.search_form')
                </div>
            </div>
            <div class="welcome__call-to-scroll">
                <a href="#" class="action-marker js-scroll-down">
                    <svg viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="white" stroke-width="2"/>
                    </svg>
                </a>
            </div>
        </div>

    </section>

    {!! $item->renderBlocks(false) !!}

@stop
