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
     * @description List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-packages'
    ];

    /**
     * @description Data to be passed to view before rendering.
     * @throws GuzzleException
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'packages' => $this->getPackages(),
        ];
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    private function getPackages(): mixed
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

            return Utils::jsonDecode($response, true);

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $packages;
    }
}
