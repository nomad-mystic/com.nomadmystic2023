<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * @classdesc
 * @class Repos
 * @extends Composer
 * @todo Call GitHub API for information on repos and inject data into views (Use "topics")
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class Repos extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        //
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            //
        ];
    }
}
