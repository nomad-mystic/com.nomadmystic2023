{{--
  Template Name: About Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.common.hero', [
        'headerTitle' => 'About the Nomad',
    ])

    @if(!empty($photos) && is_array($photos) && count($photos) > 0)

        <section class="Photos w-[90%] xl:w-full max-w-6xl mx-auto py-6">

            @foreach($photos as $key => $photo)

                <figure class="m-2">
                    <img src="{{ get_stylesheet_directory_uri() }}/{{ $photo['thumbnail'] }}"
                         alt="{{ $photo['thumbnailAlt'] }}">
                </figure>

            @endforeach

        </section>
    @endif

@endsection
