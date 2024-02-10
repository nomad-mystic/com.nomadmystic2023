<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose App level data to the views
 * @class App
 * @extends Composer
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'siteName' => $this->siteName(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }
}
