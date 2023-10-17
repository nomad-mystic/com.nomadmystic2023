{{--
  Template Name: Packages Template
--}}

@extends('layouts.app')

@section('content')

    @include('partials.repos.hero')

    @include('partials.packages.packages', [
        'packages' => $packages,
    ])

@endsection
