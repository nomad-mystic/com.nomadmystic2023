<section>
    <ul class="Repos flex flex-col items-center">
        @if(count($repos) > 0)
            @foreach($repos as $repo => $individual)
            <li class="Repos Card w-[50vw] my-2">
                <a href="{{ $individual->html_url ?? '' }}" target="_blank" rel="noreferrer" class="link block p-6">
                    <article class="flex justify-between items-center">
                        <div>
                            <header>
                                <p class="title mb-5">{{ str_replace('-', ' ', $individual->name ?? '') }}</p>
                            </header>

                            <section class="meta flex mt-3">
                                <span class="language block mr-4">Language: {{ $individual->language ?? ''  }}</span>

                                <span class="stars block mr-4">Stars: {{ $individual->stargazers_count ?? 0  }}</span>

                                <span class="watchers block mr-4">Watchers: {{ $individual->watchers_count ?? 0  }}</span>

                                <span class="issues-count block mr-4">Open Issues: {{ $individual->open_issues_count ?? 0  }}</span>

                                @if(!empty($individual->topics))

                                <span class="topics block">
                                    <span>Topics:</span>

                                    @foreach($individual->topics as $topic)

                                       <span class="topic">{{ $individual->topics[0] ?? ''}}</span>

                                    @endforeach
                                </span>

                                @endif
                            </section><!-- End .meta -->
                        </div>
                        <div>
                            {{ svg('fas-link') }}
                        </div>
                    </article>
                </a>
            </li>
            @endforeach
        @endif
    </ul>
</section>


