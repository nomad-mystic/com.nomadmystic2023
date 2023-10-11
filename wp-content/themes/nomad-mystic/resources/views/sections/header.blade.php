<header class="Header fixed w-screen z-10">
    <section class="flex justify-around items-center h-full">
        <a class="Header-logo" href="{{ home_url('/') }}">
            <img src="@asset('images/nav-logo-dark.png')">
        </a>

        @if (has_nav_menu('primary_navigation'))
            <nav class="nav-primary Header-navigation" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'nav flex',
                        'echo' => false
                    ]
                  ) !!}
            </nav>
        @endif
    </section>
</header>
