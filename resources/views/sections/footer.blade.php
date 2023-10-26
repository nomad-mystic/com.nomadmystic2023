<footer class="Footer flex flex-col items-center pb-12 {{ $classes }}">
    @if (has_nav_menu('footer_navigation'))
        <nav class="Footer-navigation py-8" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
            {!! wp_nav_menu([
                    'theme_location' => 'footer_navigation',
                    'menu_class' => 'Footer-navigation flex flex-col md:flex-row items-center',
                    'echo' => false
                ]
              ) !!}
        </nav>
    @endif

    <section class="Footer-links flex">
        <a href="https://github.com/nomad-mystic/" target="_blank" rel="noreferrer" class="p-4 mx-2">
            <figure class="Icon">
                @svg('si-github')
            </figure>
        </a>

        <a href="https://www.npmjs.com/~nomadmystic" target="_blank" rel="noreferrer" class="p-4 mx-2">
            <figure class="Icon">
                @svg('si-npm')
            </figure>
        </a>

        <a href="https://www.linkedin.com/in/keith-p-murphy/" target="_blank" rel="noreferrer" class="p-4 mx-2">
            <figure class="Icon">
                @svg('si-linkedin')
            </figure>
        </a>
    </section>

    <section class="Footer-contact flex flex-col md:flex-row items-center pt-4">
        <h4>Contact the Nomad:</h4>
        <a href="mailto:nomadmystics@gmail.com?subject=This is from the footer of nomadmystic.com" class="ml-2 text-teal">keith@nomadmystic.com</a>
    </section>
</footer>
