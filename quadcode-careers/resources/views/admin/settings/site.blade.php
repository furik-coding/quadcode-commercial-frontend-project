@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'label' => 'Emails',
        'name' => 'emails',
        {{--'textLimit' => '80'--}}
        'note' => 'Divide several with comma',
    ])


    @formField('input', [
        'label' => 'Counters',
        'name' => 'counters',
        'type' => 'textarea',
    ])

    @formField('input', [
        'label' => 'Counters (bottom)',
        'name' => 'counters_bottom',
        'type' => 'textarea',
    ])

    @formField('input', [
        'label' => 'Default SEO keywords',
        'name' => 'keywords',
    ])

    @formField('input', [
        'label' => 'Default SEO description',
        'name' => 'description',
    ])

    @formField('input', [
        'label' => 'Disclaimer',
        'name' => 'disclaimer',
        'type' => 'textarea',
        'translated' => true,
    ])
@stop
