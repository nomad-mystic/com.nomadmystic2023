{{--
  Template Name: Packages Template
--}}

@extends('layouts.app')

@section('content')

    @include('partials.packages.hero')

    <section class="Packages w-[90%] flex justify-center xl:w-full max-w-6xl mx-auto py-6">

        <!-- Create loop -->
        @include('partials.packages.single-package', [
            'package' => $packages,
        ])

    </section>

@endsection
