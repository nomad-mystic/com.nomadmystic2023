{{--
  Template Name: School Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.school.hero')

    @include('partials.common.repos', [
        'repos' => $repos
    ])

@endsection
