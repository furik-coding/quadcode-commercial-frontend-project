@extends('twill::layouts.form')

@section('contentFields')
    @formField('medias', [
        'name' => 'cover',
        'label' => 'Photo',
    ])

    @formField('input', [
        'name' => 'job_place',
        'label' => 'Position',
        'translated' => true,
        'maxlength' => 100
    ])

    @formField('wysiwyg', [
        'name' => 'description',
        'label' => 'Description',
        'translated' => true,
{{--        'maxlength' => 100--}}
    ])
@stop
