<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose Post level data to the views
 * @class Websites
 * @extends Composer
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override(): array
    {
        return [
            'title' => $this->title(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title(): string
    {
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', NOMAD_THEME_TEXT_DOMAIN);
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', NOMAD_THEME_TEXT_DOMAIN),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', NOMAD_THEME_TEXT_DOMAIN);
        }

        return get_the_title();
    }
}
