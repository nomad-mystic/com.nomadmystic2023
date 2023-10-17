{{--
  Template Name: School Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.repos.hero')

    @include('partials.common.repos', [
        'repos' => $repos
    ])

@endsection
