@extends('twill::layouts.form')

@section('contentFields')

{{--    @formField('input', [--}}
{{--        'name' => 'description',--}}
{{--        'label' => 'Description',--}}
{{--        'translated' => true,--}}
{{--        'maxlength' => 100--}}
{{--    ])--}}
    @formField('input', [
        'name' => 'id_external',
        'label' => 'id huntflow',
        'translated' => false,
        'required' => true,
        'type' => 'number',
    ])

    @formField('medias', [
        'name' => 'cover',
        'label' => 'Page cover',
        'required' => true,
    ])

    @formField('medias', [
        'name' => 'thumbnail',
        'label' => 'Thumbnail',
        'required' => true,
    ])
@stop
