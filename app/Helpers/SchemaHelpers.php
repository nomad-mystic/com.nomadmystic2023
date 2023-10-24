<?php

namespace App\Helpers;

use GuzzleHttp\Utils;
use Safe\Exceptions\FilesystemException;

class SchemaHelpers
{
    /**
     * @throws FilesystemException
     */
    public static function getSchemaJson(string $name)
    {
        $schema = (object) [];
        $themeDir = get_stylesheet_directory();
        $schemasDir = 'schemas';


        if (file_exists("{$themeDir}/{$schemasDir}/{$name}.json")) {
            $file = \Safe\file_get_contents("{$themeDir}/{$schemasDir}/{$name}.json");

            return Utils::jsonDecode($file);
        }

        return $schema;
    }
}
