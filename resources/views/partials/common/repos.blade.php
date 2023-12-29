<?php

use App\Helpers\SeoHelpers;

?>

<section class="Repos w-[90%] xl:w-full max-w-6xl mx-auto py-6">

    <h4 class="text-4xl pb-4 capitalize">{{ $topicName ?? '' }}</h4>

    <ul class="grid grid-cols-1 auto-rows-auto gap-5 md:grid-cols-2 lg:grid-cols-3 justify-center lg:justify-start sm:flex-row">
        @if(count($repos) > 0)
            @foreach($repos as $repo => $individual)
            <li class="Repos Card w-auto sm:w-[48%] lg:w-[31%] xl:[32%] h-auto mx-0 my-auto">
                <a href="{{ $individual['html_url'] ?? '' }}" target="_blank" rel="noreferrer" class="link block min-h-[200px] p-6">
                    <article class="flex justify-between items-start">

                        <script type="application/ld+json">{!! SeoHelpers::buildRepoLdJson($individual) !!}</script>

                        <div class="w-full">
                            <header>
                                <p class="Repos-title mb-1">{{ str_replace('-', ' ', $individual['name'] ?? '') }}</p>
                            </header>

                            <section class="Repos-meta mt-3">

                                <span class="Repos-stars flex"
                                      title="GitHub Stars"
                                >
                                    {{ svg('fas-star') }}{{ $individual['stargazers_count'] ?? 0  }}
                                </span>

                                <span class="Repos-watchers flex"
                                      title="GitHub Watchers"
                                >
                                    {{ svg('fas-people-group') }}{{ $individual['watchers_count'] ?? 0  }}
                                </span>

                                <span class="Repos-issues-count flex"
                                      title="GitHub Issues"
                                >
                                    {{ svg('fas-folder-open') }}{{ $individual['open_issues_count'] ?? 0  }}
                                </span>

                                @if(!empty($individual['topics']))

                                <span class="Repos-topics flex" title="GitHub Topics">
                                    <span>{{ svg('fas-tags') }}</span>

                                    @foreach($individual['topics'] as $topic)

                                       <span class="Repos-topic">{{ $topic ?? ''}}</span>

                                    @endforeach
                                </span>

                                @endif
                            </section><!-- End .meta -->

                            <section class="Repos-languages mt-4">

                                <github-languages owner-repo="@php echo $individual['full_name'] ?? '' @endphp"/></github-languages>

                            </section>
                        </div>

                        <div class="Repos-external-link">
                            {{ svg('fas-link') }}
                        </div>
                    </article>
                </a>
            </li>
            @endforeach
        @endif
    </ul>
</section>


