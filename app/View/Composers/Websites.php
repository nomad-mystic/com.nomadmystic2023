<?php

namespace App\View\Composers;

use App\Helpers\SchemaHelpers;
use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose data to the websites template
 * @class Websites
 * @extends Composer
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class Websites extends Composer
{
    /**
     * @description List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-websites',
    ];

    /**
     * @description Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'websites' => $this->buildWebsites()
        ];
    }

    /**
     * @description Extract our websites JSON schema
     * @private
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return object
     */
    private function buildWebsites(): mixed
    {
        $features = (object) [];

        $json = SchemaHelpers::getSchemaJson('websites');

        if (!empty($json)) {
            return $json;
        }

        return $features;
    }
}
