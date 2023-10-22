<section class="Repos w-[90%] xl:w-full max-w-6xl mx-auto py-6">

    <h4 class="text-4xl pb-4 capitalize">{{ $topicName ?? '' }}</h4>

    <ul class="flex flex-col flex-wrap flex-auto gap-5 justify-center lg:justify-start sm:flex-row">
        @if(count($repos) > 0)
            @foreach($repos as $repo => $individual)
            <li class="Repos Card w-auto sm:w-[48%] lg:w-[31%] xl:[32%] h-auto mx-0 my-auto">
                <a href="{{ $individual['html_url'] ?? '' }}" target="_blank" rel="noreferrer" class="link block min-h-[200px]">
                    <article class="flex justify-between items-start p-6 h-[200px]">
                        <div>
                            <header>
                                <p class="Repos-title mb-1">{{ str_replace('-', ' ', $individual['name'] ?? '') }}</p>
                            </header>

                            <section class="Repos-meta flex mt-3">

                                <span class="Repos-stars mr-4 flex">{{ svg('fas-grin-stars') }}{{ $individual['stargazers_count'] ?? 0  }}</span>

                                <span class="Repos-watchers mr-4 flex">{{ svg('fas-people-group') }}{{ $individual['watchers_count'] ?? 0  }}</span>

                                <span class="Repos-issues-count mr-4 flex">Open Issues: {{ $individual['open_issues_count'] ?? 0  }}</span>

                                @if(!empty($individual['topics']))

                                <span class="Repos-topics block">
                                    <span>Topics:</span>

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


