<?php

use App\Helpers\SeoHelpers;

?>

<section class="SingleWebsite SingleWebsite-{{ $website['name'] ?? '' }} w-full p-4">
    <article class="flex flex-col md:flex-row">

        <script type="application/ld+json">{!! SeoHelpers::buildWebsiteLdJson($website) !!}</script>

        <a href="{{ $website['url'] ?? '' }}"
           target="_blank"
           rel="noreferrer"
           class="flex items-center SingleWebsite-thumbnail"
        >
            <figure>
                <img src="{{ get_stylesheet_directory_uri() }}/{{ $website['thumbnail'] ?? '' }}"
                     alt="{{ $website['thumbnailAlt'] ?? '' }}">
            </figure>
        </a>

        <section class="pt-4 md:pt-0 md:pl-4">
            <header>
                <a href="{{ $website['url'] ?? '' }}"
                   target="_blank"
                   rel="noreferrer"
                >
                    <h2 class="SingleWebsite-title text-2xl md:text-3xl pb-2">{{ $website['safeName'] ?? '' }}</h2>
                </a>

                <p class="SingleWebsite-description">{{ __($website['description'] ?? '', NOMAD_THEME_TEXT_DOMAIN) }}</p>
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
                            <p class="ml-2">{{ __('Code', NOMAD_THEME_TEXT_DOMAIN) }}</p>
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
                        <p class="ml-2">{{ __('Production', NOMAD_THEME_TEXT_DOMAIN) }}</p>
                    </a>
                </div>
            </section>
        </section>
    </article>
</section>
