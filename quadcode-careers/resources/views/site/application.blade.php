@extends('site.layouts.app', [
    'light_menu' => true
])
@section('title', __('messages.Add application'))
{{--@section('description', $item->description)--}}
{{--@section('keywords', $item->keywords)--}}
@section('skip_contact_modal', true)

@section('content')
    <section class="app-section">
        <div class="container">
            <div class="app-section__inner">

                <div class="position">

                    <div class="position__info">

                    </div>


                    <article class="joblist">

                        @include('site.partials.application_form', ['vacancy' => $vacancy])

                    </article>

                </div>
            </div>
        </div>
    </section>

@stop
