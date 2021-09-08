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

                @include('site.partials.contact_form', ['success' => $success, 'show' => true])

            </div>
        </div>
    </section>

@stop
