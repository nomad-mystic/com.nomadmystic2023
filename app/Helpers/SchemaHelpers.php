<?php

namespace App\Helpers;

use GuzzleHttp\Utils;
use Safe\Exceptions\FilesystemException;

class SchemaHelpers
{
    /**
     * @description Pass this a JSON schema name a it will return the file
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @param string $name
     * @return mixed
     */
    public static function getSchemaJson(string $name): mixed
    {
        $schema = (object) [];
        $themeDir = get_stylesheet_directory();
        $schemasDir = 'schemas';

        try {
            if (file_exists("{$themeDir}/{$schemasDir}/{$name}.json")) {
                $file = \Safe\file_get_contents("{$themeDir}/{$schemasDir}/{$name}.json");

                return Utils::jsonDecode($file);
            }
        } catch (FilesystemException $exception) {
            $response = $exception->getMessage();
            echo Utils::jsonEncode($response);
        }

        return $schema;
    }
}
