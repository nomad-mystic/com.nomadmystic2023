<section>
    <ul class="Repos flex flex-wrap flex-auto gap-5 justify-between max-w-6xl mx-auto">
        @if(count($repos) > 0)
            @foreach($repos as $repo => $individual)
            <li class="Repos Card w-[32%] h-auto">
                <a href="{{ $individual->html_url ?? '' }}" target="_blank" rel="noreferrer" class="link block min-h-[200px]">
                    <article class="flex justify-between items-center p-6 h-[200px]">
                        <div>
                            <header>
                                <p class="title mb-1">{{ str_replace('-', ' ', $individual->name ?? '') }}</p>
                            </header>

                            <section class="meta flex mt-3">

                                <span class="stars mr-4 flex">{{ svg('fas-grin-stars') }}{{ $individual->stargazers_count ?? 0  }}</span>

                                <span class="watchers mr-4 flex">{{ svg('fas-people-group') }}{{ $individual->watchers_count ?? 0  }}</span>

                                <span class="issues-count mr-4 flex">Open Issues: {{ $individual->open_issues_count ?? 0  }}</span>

                                @if(!empty($individual->topics))

                                <span class="topics block">
                                    <span>Topics:</span>

                                    @foreach($individual->topics as $topic)

                                       <span class="topic">{{ $individual->topics[0] ?? ''}}</span>

                                    @endforeach
                                </span>

                                @endif
                            </section><!-- End .meta -->

                            <section class="languages mt-4">

                                <github-languages
                                    full-name="@php echo $individual->full_name ?? '' @endphp"
                                />

                                {{-- https://docs.github.com/en/rest/repos/repos?apiVersion=2022-11-28#list-repository-languages --}}
                                <span class="language block mr-4">
                                    @php
                                    $icon_path = get_stylesheet_directory_uri() . '/public/images/icons/languages/' . strtolower($individual->language) . '.svg';

                                    if (!empty($icon_path) || file_exists($icon_path)) {
                                    @endphp

                                    <img src="@php echo $icon_path @endphp"
                                         alt="Language Icon for @php echo $individual->language @endphp">

                                    @php
                                    }
                                    @endphp

                                </span>
                            </section>
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


