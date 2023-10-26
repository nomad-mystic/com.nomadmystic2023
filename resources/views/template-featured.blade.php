{{--
  Template Name: Featured Template
--}}

@extends('layouts.app')

@section('content')

    @include('partials.common.hero', [
        'headerTitle' => 'Featured',
    ])

    @if(!empty($features) && is_array($features) && count($features) > 0)
        <section class="Featured w-[90%] flex flex-col justify-center xl:w-full max-w-6xl mx-auto py-6">

            @foreach($features as $key => $feature)

                @include('partials.featured.single-feature', [
                    'feature' => $feature,
                ])

            @endforeach

        </section>
    @endif

@endsection
