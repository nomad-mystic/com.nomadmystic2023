<?php

namespace App\View\Composers;

use App\Helpers\SchemaHelpers;
use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose data to the featured template
 * @class Featured
 * @extends Composer
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class Featured extends Composer
{
    /**
     * @description List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-featured',
    ];

    /**
     * @description Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'features' => $this->buildFeatures()
        ];
    }

    /**
     * @description Extract our features JSON schema
     * @private
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return object
     */
    private function buildFeatures(): object
    {
        $features = (object) [];

        $json = SchemaHelpers::getSchemaJson('featured');

        if (!empty($json)) {
            return $json;
        }

        return $features;
    }
}
