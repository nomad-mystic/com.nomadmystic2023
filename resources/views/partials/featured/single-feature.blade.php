<section class="SingleFeature w-full p-4 mb-6">
    <article class="flex">
        <figure>
            <img src="{{ get_stylesheet_directory_uri() }}/{{  $feature['thumbnail'] ?? '' }}"
                 alt="{{  $feature['thumbnailAlt'] ?? '' }}">
        </figure>
        <section class="pl-4">
            <header>
                <h2 class="SingleFeature-title text-3xl pb-2">{{  $feature['name'] ?? '' }}</h2>
                <p class="SingleFeature-description">{{  $feature['description'] ?? '' }}</p>
            </header>

            <section class="flex">
                <div class="SingleFeature-homepage" title="">
                    <a href="{{ $feature['githubURL'] ?? '' }}"
                       target="_blank"
                       rel="noreferrer"
                       class="flex items-center"
                    >
                        <figure class="SingleFeature-github">
                            {{ svg('si-github') }}
                        </figure>
                        <p>Code</p>
                    </a>
                </div>

                <div class="SingleFeature-production" title="">
                    <a href="{{ get_stylesheet_directory_uri() }}/{{ $feature['url'] ?? '' }}"
                       target="_blank"
                       rel="noreferrer"
                       class="flex items-center"
                    >
                        <figure class="SingleFeature-github">
                            {{ svg('fas-link') }}
                        </figure>
                        <p>Production</p>
                    </a>
                </div>
            </section>
        </section>
    </article>
<section>




