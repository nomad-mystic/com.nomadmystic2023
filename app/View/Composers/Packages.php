<?php

namespace App\View\Composers;

use App\Http\Controllers\GitHub;
use App\Http\Controllers\NPM;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
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
        'template-packages'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     * @throws GuzzleException
     */
    public function with()
    {
        return [
            'packages' => $this->getPackages(),
        ];
    }

    /**
     * @throws GuzzleException
     */
    private function getPackages()
    {
        $packages = [];
        $packagesToQuery = [
            '@nomadmystic/github-dependencies-next',
//            '@nomadmystic/css-grid-package',
//            '@nomadmystic/wordpress-scaffold-cli',
//            '@nomadmystic/drupal-scaffold-module',
        ];

        try {
            $query = '@nomadmystic/github-dependencies-next';

            $response = NPM::getPackageMetadata($query);

            $array = Utils::jsonDecode($response, true);

            return Utils::jsonDecode($response, true);

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $packages;
    }
}
