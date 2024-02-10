<form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', NOMAD_THEME_TEXT_DOMAIN) }}
    </span>

    <input
      type="search"
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', NOMAD_THEME_TEXT_DOMAIN) !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>

  <button>{{ _x('Search', 'submit button', NOMAD_THEME_TEXT_DOMAIN) }}</button>
</form>
