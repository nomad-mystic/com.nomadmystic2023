<?php

namespace App\View\Composers;

use App\Helpers\SchemaHelpers;
use Roots\Acorn\View\Composer;
use Safe\Exceptions\FilesystemException;

class Featured extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-featured',
    ];

    /**
     * Data to be passed to view before rendering.
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
     * @throws FilesystemException
     */
    public function buildFeatures()
    {

        $features = SchemaHelpers::getSchemaJson('featured');

        return $features;
    }
}
