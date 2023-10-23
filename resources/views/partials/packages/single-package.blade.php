<section class="SinglePackage w-full p-6">
    <article>
        <header>
            <h2 class="SinglePackage-title">{{  $package['name'] ?? '' }}</h2>
            <p class="SinglePackage-description">{{  $package['description'] ?? '' }}</p>
        </header>

        <section class="flex items-center flex-wrap gap-3 justify-between pt-4 w-[45%]">
            <div class="SinglePackage-homepage">
                <a href="{{ $package['homepage'] ?? '' }}" target="_blank" rel="noreferrer" class="flex">
                    <figure class="SinglePackage-github">
                        {{ svg('si-github') }}
                    </figure>
                    <p>Homepage</p>
                </a>
            </div>

            <div class="SinglePackage-created" title="NPM Created Date">
                <div class="flex items-center">
                    <figure>
                        {{ svg('fas-heartbeat') }}
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

            <single-package package-markdown="@php echo $package['readme'] ?? '' @endphp"></single-package>

{{--             <pre>--}}
{{--                <code class="SinglePackage-markdown">{{  $package['readme'] ?? '' }}</code>--}}
{{--            </pre>--}}
        </details>
        <!-- https://prismjs.com/ -->
    </article>
</section>

