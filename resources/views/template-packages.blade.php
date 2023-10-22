{{--
  Template Name: Packages Template
--}}

@extends('layouts.app')

@section('content')

    @include('partials.packages.hero')

    <section class="Packages w-[60%] flex justify-center mx-auto">

        <!-- Create loop -->
        @include('partials.packages.single-package', [
            'package' => $packages,
        ])

    </section>

@endsection
