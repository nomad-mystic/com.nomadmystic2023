{{--
  Template Name: School Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.school.hero')

    @if(!empty($allRepos) && count($allRepos) > 0)
        @foreach($allRepos as $topicName => $repos)

            @if(!empty($repos))

                @include('partials.common.repos', [
                    'topicName' => '',
                    'repos' => $repos
                ])

            @endif

        @endforeach
    @endif

@endsection
