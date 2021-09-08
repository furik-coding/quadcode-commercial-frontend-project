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

        @formField('input', [
            'name' => 'custom_url',
            'label' => 'Custom url (for menu)',
            'translated' => false,
            'maxlength' => 250
        ])
    @endformFieldset
@endsection

@section('contentFields')

    @formField('block_editor', [
        'blocks' => [
            'hero',
            'why_quadcode',
            'solid_set',
            'new_era',
            'get_in_touch',
            'text_center',
            'tech',
            'customization',
            'cross_platform',
            'developed',
        ]
    ])
@stop
