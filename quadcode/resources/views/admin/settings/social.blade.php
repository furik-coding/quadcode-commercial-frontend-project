@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'label' => 'LinkedIn',
        'name' => 'linkedin',
        {{--'textLimit' => '80'--}}
    ])

    @formField('input', [
        'label' => 'Facebook',
        'name' => 'facebook',
        {{--'textLimit' => '80'--}}
    ])

    @formField('input', [
        'label' => 'Instagram',
        'name' => 'instagram',
        {{--'textLimit' => '80'--}}
    ])
@stop
