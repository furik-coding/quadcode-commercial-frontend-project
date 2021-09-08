@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'id_external',
        'label' => 'id huntflow',
        'translated' => false,
        'required' => true,
        'type' => 'number',
    ])

    @formField('input', [
        'name' => 'title_prepositional',
        'label' => 'Prepositional title',
        'translated' => true,
        'maxlength' => 100
    ])

    @formField('input', [
        'name' => 'country',
        'label' => 'Country',
        'translated' => true,
        'maxlength' => 100
    ])

    @formField('input', [
        'name' => 'description',
        'label' => 'Description',
        'translated' => true,
    ])

    @formField('medias', [
        'name' => 'cover',
        'label' => 'Photo',
        'fieldNote' => 'Minimum image width: 1920px',
    ])

    @formField('medias', [
        'name' => 'video_poster',
        'label' => 'Video poster',
        'fieldNote' => 'Minimum image width: 1920px',
    ])

    @formField('files', [
        'name' => 'video',
        'label' => 'Video',
        'noTranslate' => true,
    ])

    @formField('input', [
        'name' => 'map_coords',
        'label' => 'Map coords',
        'translated' => false,
        'required' => false,
        'fieldNote' => 'divided with comma',
    ])

{{--
    @formField('input', [
        'name' => 'about_office',
        'label' => 'About office',
        'translated' => true,
        'type' => 'textarea',
    ])
--}}
    @formField('wysiwyg', [
        'name' => 'about_office',
        'label' => 'About office',
        'translated' => true,
        'toolbarOptions' => [
            ['header' => [2, 3, false]],
            'bold',
            'italic',
            'link',
            'list-ordered',
            'list-unordered',
{{--            'image',--}}
            ],
        'editSource' => true,
    ])

@stop
