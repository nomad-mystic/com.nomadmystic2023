{{--
  Template Name: Packages Template
--}}

@extends('layouts.app')

@section('content')

    @include('partials.packages.hero')

    @include('partials.packages.packages', [
        'packages' => $packages,
    ])

@endsection
