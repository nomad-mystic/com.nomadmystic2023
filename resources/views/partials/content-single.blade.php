<article @php(post_class('h-entry'))>
    <header>
        <h1 class="p-name">
            {!! $title !!}
        </h1>

        @include('partials.entry-meta')
    </header>

    <div class="e-content">
        @php(the_content())
    </div>

    <footer>
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', NOMAD_THEME_TEXT_DOMAIN), 'after' => '</p></nav>']) !!}
    </footer>

    @php(comments_template())
</article>
