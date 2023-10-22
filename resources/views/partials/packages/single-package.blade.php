<section class="SinglePackage w-full p-6">
    <article>
        <header>
            <h2 class="SinglePackage-title">{{  $package['name'] ?? '' }}</h2>
            <p class="SinglePackage-description">{{  $package['description'] ?? '' }}</p>
        </header>

        <section class="flex items-center">
            <div class="SinglePackage-homepage">
                <a href="{{ $package['homepage'] ?? '' }}" target="_blank" rel="noreferrer" class="p-4 mx-2">
                    <figure class="SinglePackage-icon">
                        @svg('si-github')
                    </figure>
                </a>
            </div>

            <div class="SinglePackage-created">
                <time>
                    <span>Created: {{ Carbon\Carbon::parse($package['time']['created'] ?? '')->format('F d, Y') }}</span>
                </time>
            </div>

            <div class="SinglePackage-modified">
                <span>Modified: {{ Carbon\Carbon::parse($package['time']['modified'] ?? '')->format('F d, Y') }}</span>
            </div>
        </section>

        <details>
            <summary></summary>
             <pre>
                <code class="language-markdown">{{  $package['readme'] ?? '' }}</code>
            </pre>
        </details>
        <!-- https://prismjs.com/ -->
    </article>
</section>

