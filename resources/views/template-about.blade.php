{{--
  Template Name: About Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.common.hero', [
        'headerTitle' => 'About the Nomad',
    ])

@endsection
