<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

/**
 * @classdesc
 * @class Packages
 * @extends Composer
 * @implements
 * @todo Call GitHub/NPM API for information on packages and inject data into views (Use "topics"?)
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class Packages extends Composer
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
