<a class="sr-only focus:not-sr-only" href="#main">
    {{ __('Skip to content') }}
</a>

@include('sections.header', [
  'classes' => '',
])

<main id="main" class="main">
    @yield('content')
</main>

@include('sections.footer',
    [
      'classes' => '',
    ]
)

@if (has_nav_menu('primary_navigation'))
    <nav class="Header-navigation" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'nav flex flex-col lg:flex-row',
                'echo' => false
            ]
          ) !!}
    </nav>
@endif

<div class="Layout-bodyBackground"></div>
