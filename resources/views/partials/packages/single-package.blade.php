<article>

    <div>{{  $package['description'] ?? '' }}</div>

    <!-- https://prismjs.com/ -->
    <pre>
        <code class="language-markdown">{{  $package['readme'] ?? '' }}</code>
    </pre>

    <div>{{  $package['homepage'] ?? '' }}</div>
    <div>{{  $package['repository']['url'] ?? '' }}</div>

</article>
