@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'seo', 'label' => 'SEO'],
    ]
])

@section('fieldsets')
    @formFieldset(['id' => 'seo', 'title' => 'SEO'])
        @formField('input', [
            'name' => 'description',
            'label' => 'SEO description',
            'translated' => true,
            {{--'maxlength' => 100--}}
        ])

        @formField('input', [
            'name' => 'keywords',
            'label' => 'SEO keywords',
            'translated' => true,
            {{--'maxlength' => 100--}}
        ])
    @endformFieldset
@endsection

@section('contentFields')
    {{--@formField('input', [--}}
        {{--'name' => 'title',--}}
        {{--'label' => 'Title',--}}
        {{--'translated' => true,--}}
        {{--'maxlength' => 100--}}
    {{--])--}}


    @formField('checkbox', [
        'name' => 'light_menu',
        'label' => 'Header for light background'
    ])

    @formField('block_editor', [
        'blocks' => [
            'text',
            'hero',
            'hero_locations',
            'hot_categories',
            'categories',
            'team',
            'team_stats',
            'map',
            'features_list',
            'gallery2',
            'video',
            'values',
        ]
    ])
@stop
