{{--
  Template Name: Repos Template
--}}

@extends('layouts.app-dark-theme')

@section('content')

    @include('partials.common.hero', [
        'headerTitle' => 'Repositories',
    ])

    @if(!empty($allRepos) && count($allRepos) > 0)
        @foreach($allRepos as $topicName => $repos)

            @if(!empty($repos))

                @include('partials.common.repos', [
                    'topicName' => $topicName,
                    'repos' => $repos
                ])

            @endif

        @endforeach
    @endif

@endsection
