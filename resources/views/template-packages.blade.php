{{--
  Template Name: Packages Template
--}}

@extends('layouts.app')

@section('content')

    @include('partials.packages.hero')

    @if(!empty($packages) && count($packages) > 0)
        <section class="Packages w-[90%] flex flex-col justify-center xl:w-full max-w-6xl mx-auto py-6">

            <!-- Create loop -->
            @foreach($packages as $key => $package)

                @if(!empty($package))

                    @include('partials.packages.single-package', [
                        'package' => $package,
                    ])

                @endif

            @endforeach

        </section>
    @endif
@endsection
