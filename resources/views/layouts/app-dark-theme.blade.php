<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header',
    [
      'classes' => 'DarkTheme'
    ]
)

<main id="main" class="main DarkTheme">
    @yield('content')
</main>

@include('sections.footer',
    [
      'classes' => 'DarkTheme',
    ]
)

@if (has_nav_menu('primary_navigation'))
    <nav class="Header Header-navigation-footer" id="Header-navigation-footer" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        <span class="Header-close-icon" id="Header-close-icon">
            {{ svg('fas-xmark') }}
        </span>
        {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'nav flex flex-col lg:flex-row Primary-navigation mt-6',
                'echo' => false,
            ]
          ) !!}
    </nav>
@endif

<div class="Layout-bodyBackground LayoutDark-bodyBackground" id="Layout-bodyBackground"></div>
