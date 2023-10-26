{{--
  Template Name: Websites Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.websites.hero')

    @if(!empty($websites) && is_array($websites) && count($websites) > 0)
        <section class="Websites w-[90%] flex flex-col justify-center gap-5 xl:w-full max-w-6xl mx-auto py-6">

            @foreach($websites as $key => $website)

                @include('partials.websites.single-website', [
                    'website' => $website,
                ])

            @endforeach

        </section>
    @endif
@endsection
