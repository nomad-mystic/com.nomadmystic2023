<section class="SinglePackage w-full">
    <article>
        <header>
            <h2 class="SinglePackage-title">{{  $package['name'] ?? '' }}</h2>
            <p class="SinglePackage-description">{{  $package['description'] ?? '' }}</p>
        </header>

        <section>
            <div class="SinglePackage-homepage">
                {{  $package['homepage'] ?? '' }}
            </div>

            <div class="SinglePackage-created">
                {{  $package['created'] ?? '' }}
            </div>

            <div class="SinglePackage-modified">
                {{  $package['modified'] ?? '' }}
            </div>
        </section>

        <section>
             <pre>
                <code class="language-markdown">{{  $package['readme'] ?? '' }}</code>
            </pre>
        </section>
        <!-- https://prismjs.com/ -->
    </article>
</section>

