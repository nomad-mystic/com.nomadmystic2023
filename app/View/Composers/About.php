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
class About extends Composer
{
    /**
     * @description List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-about',
    ];

    /**
     * @description Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'photos' => $this->buildPhotos()
        ];
    }

    /**
     * @description Extract our about JSON schema
     * @private
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return object
     */
    private function buildPhotos(): mixed
    {
        $photos = (object) [];

        $json = SchemaHelpers::getSchemaJson('about');

        if (!empty($json)) {
            return $json;
        }

        return $photos;
    }
}
