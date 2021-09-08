@extends('site.layouts.app', [
    'light_menu' => $item->light_menu
])
@section('title', $item->title)
@section('description', $item->description)
@section('keywords', $item->keywords)

@section('header')
@stop

@section('headerBackground')
@stop

@section('content')

    {!! $item->renderBlocks(false) !!}

@stop
