<section class="SingleWebsite SingleWebsite-{{ $website['name'] ?? '' }} w-full p-4">
    <article class="flex flex-col md:flex-row">
        <figure class="SingleWebsite-thumbnail">
            <a href="{{ get_stylesheet_directory_uri() }}/{{ $website['url'] ?? '' }}"
               target="_blank"
               rel="noreferrer"
               class="flex items-center"
            >
                <img src="{{ get_stylesheet_directory_uri() }}/{{ $website['thumbnail'] ?? '' }}"
                     alt="{{  $website['thumbnailAlt'] ?? '' }}">
            </a>
        </figure>

        <section class="pt-4 md:pt-0 md:pl-4">
            <header>
                <h2 class="SingleWebsite-title text-3xl pb-2">{{ $website['safeName'] ?? '' }}</h2>
                <p class="SingleWebsite-description">{{ $website['description'] ?? '' }}</p>
            </header>

            <section class="flex">
                @if(!empty($website['githubURL']))
                    <div class="SingleWebsite-github" title="Link to GitHub code">
                        <a href="{{ $website['githubURL'] }}"
                           target="_blank"
                           rel="noreferrer"
                           class="flex items-center mr-4"
                        >
                            <figure>
                                {{ svg('si-github') }}
                            </figure>
                            <p class="ml-2">Code</p>
                        </a>
                    </div>
                @endif

                <div class="SingleWebsite-production" title="Link to production landing page">
                    <a href="{{ $website['url'] ?? '' }}"
                       target="_blank"
                       rel="noreferrer"
                       class="flex items-center"
                    >
                        <figure>
                            {{ svg('fas-link') }}
                        </figure>
                        <p class="ml-2">Production</p>
                    </a>
                </div>
            </section>
        </section>
    </article>
</section>
