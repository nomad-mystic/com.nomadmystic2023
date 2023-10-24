<?php

namespace App\View\Composers;

use App\Http\Controllers\NPM;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose data to the packages template
 * @class Packages
 * @extends Composer
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
     * @description Use the NPM registry to get package information
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @throws GuzzleException
     *
     * @return array
     */
    private function getPackages(): array
    {
        $packages = [];
        $packagesToQuery = [
            '@nomadmystic/github-dependencies-next',
            '@nomadmystic/wordpress-scaffold-cli',
            '@nomadmystic/drupal-scaffold-module',
            '@nomadmystic/css-grid-package',
        ];

        try {
            foreach ($packagesToQuery as $query => $package) {
                if (!empty($package)) {
                    $packages[] = Utils::jsonDecode(NPM::getPackageMetadata($package), true);
                }
            }

            return $packages;

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $packages;
    }
}
