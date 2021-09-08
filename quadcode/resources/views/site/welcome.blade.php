@extends('site.layouts.app')
@section('title', $item->title)
@section('description', $item->description)
@section('keywords', $item->keywords)

@section('content')



    {!! $item->renderBlocks(false) !!}

@stop
