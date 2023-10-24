<section class="SinglePackage w-full p-6 mb-6">
    <article>
        <header>
            <h2 class="SinglePackage-title text-3xl pb-2">{{  $package['name'] ?? '' }}</h2>
            <p class="SinglePackage-description">{{  $package['description'] ?? '' }}</p>
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
                    <p>Package</p>
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
                    <p>Homepage</p>
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
                    <p>Bugs</p>
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

{{--            <single-package package-markdown="@php echo $package['readme'] ?? '' @endphp"></single-package>--}}

        </details>
        <!-- https://prismjs.com/ -->
    </article>
</section>

