{{-- Not ideal but a workaround for different root paths in staging and production --}}
<component is="style">
    summary::after {
    background-image: url(@asset('images/icons/chevron-down.svg'));
    }
</component>

<section class="SinglePackage w-full p-6 mb-6">
    <article>
        <header>
            <h2 class="SinglePackage-title sm:text-3xl pb-2">{{ __($package['name'] ?? '', NOMAD_THEME_TEXT_DOMAIN) }}</h2>
            <p class="SinglePackage-description">{{ __($package['description'] ?? '', NOMAD_THEME_TEXT_DOMAIN) }}</p>
        </header>

        <section class="flex items-center flex-wrap gap-3 justify-start pt-4" title="NPM Homepage">
            <div class="SinglePackage-package">
                <a href="https://www.npmjs.com/package/{{ $package['name'] ?? '' }}"
                   target="_blank"
                   rel="noreferrer"
                   class="flex items-center"
                >
                    <figure class="SinglePackage-npm">
                        {{ svg('si-npm') }}
                    </figure>

                    <p>{{ __('Package', NOMAD_THEME_TEXT_DOMAIN) }}</p>
                </a>
            </div>

            <div class="SinglePackage-homepage" title="NPM GitHub Homepage">
                <a href="{{ $package['homepage'] ?? '' }}"
                   target="_blank"
                   rel="noreferrer"
                   class="flex items-center"
                >
                    <figure class="SinglePackage-github">
                        {{ svg('si-github') }}
                    </figure>

                    <p>{{ __('Homepage', NOMAD_THEME_TEXT_DOMAIN) }}</p>
                </a>
            </div>

            <div class="SinglePackage-bugs" title="NPM GitHub issues">
                <a href="{{ $package['bugs']['url'] ?? '' }}"
                   target="_blank"
                   rel="noreferrer"
                   class="flex items-center"
                >
                    <figure class="SinglePackage-issues">
                        {{ svg('fas-bugs') }}
                    </figure>

                    <p>{{ __('Bugs', NOMAD_THEME_TEXT_DOMAIN) }}</p>
                </a>
            </div>

            <div class="SinglePackage-created" title="NPM Created Date">
                <div class="flex items-center">
                    <figure>
                        {{ svg('fas-paperclip') }}
                    </figure>

                    <time>{{ Carbon\Carbon::parse($package['time']['created'] ?? '')->format('F d, Y') }}</time>
                </div>
            </div>

            <div class="SinglePackage-modified" title="NPM Modified Date">
                <div class="flex items-center">
                    <figure>
                        {{ svg('fas-heartbeat') }}
                    </figure>

                    <time>{{ Carbon\Carbon::parse($package['time']['modified'] ?? '')->format('F d, Y') }}</time>
                </div>
            </div>
        </section>

        <details>
            <summary></summary>

            <single-package data-markdown="@php echo htmlentities($package['readme']) ?? '' @endphp"></single-package>

        </details>
    </article>
</section>

