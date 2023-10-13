<section class="my-10">
    <ul class="Repos flex flex-wrap flex-auto gap-5 justify-between max-w-6xl mx-auto">
        @if(count($repos) > 0)
            @foreach($repos as $repo => $individual)
            <li class="Repos Card w-[32%] aspect-square">
                <a href="{{ $individual->html_url ?? '' }}" target="_blank" rel="noreferrer" class="link block p-6">
                    <article class="flex justify-between items-center">
                        <div>
                            <header>
                                <p class="title mb-5">{{ str_replace('-', ' ', $individual->name ?? '') }}</p>
                            </header>

                            <section class="meta flex flex-col mt-3">

                                {{-- https://docs.github.com/en/rest/repos/repos?apiVersion=2022-11-28#list-repository-languages --}}
                                <span class="language block mr-4">
                                    @php
                                        $icon_path = get_stylesheet_directory_uri() . '/public/images/icons/languages/' . strtolower($individual->language) . '.svg';

                                        if (!empty($icon_path) || file_exists($icon_path)) {
                                            @endphp

                                            <img src="@php echo $icon_path @endphp"
                                                 alt="Language icon for @php echo $individual->language @endphp">

                                            @php
                                        }
                                    @endphp

                                </span>

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
                        <div class="external-link">
                            {{ svg('fas-link') }}
                        </div>
                    </article>
                </a>
            </li>
            @endforeach
        @endif
    </ul>
</section>


