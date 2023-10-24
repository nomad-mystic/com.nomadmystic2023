<section class="SingleFeature w-full p-4 mb-6">
    <article class="flex flex-col md:flex-row">
        <figure class="SingleFeature-thumbnail">
            <a href="{{ get_stylesheet_directory_uri() }}/{{ $feature['url'] ?? '' }}"
               target="_blank"
               rel="noreferrer"
               class="flex items-center"
            >
                <img src="{{ get_stylesheet_directory_uri() }}/{{  $feature['thumbnail'] ?? '' }}"
                     alt="{{  $feature['thumbnailAlt'] ?? '' }}">
            </a>
        </figure>

        <section class="pt-4 md:pt-0 md:pl-4">
            <header>
                <h2 class="SingleFeature-title text-3xl pb-2">{{  $feature['name'] ?? '' }}</h2>
                <p class="SingleFeature-description">{{  $feature['description'] ?? '' }}</p>
            </header>

            <section class="flex">
                <div class="SingleFeature-github" title="Link to GitHub code">
                    <a href="{{ $feature['githubURL'] ?? '' }}"
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

                <div class="SingleFeature-production" title="Link to production landing page">
                    <a href="{{ get_stylesheet_directory_uri() }}/{{ $feature['url'] ?? '' }}"
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
<section>




