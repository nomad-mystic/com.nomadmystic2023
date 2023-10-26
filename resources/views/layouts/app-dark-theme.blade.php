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

@include('partials.common.footer-navigation', [
  'type' => 'Dark',
])
