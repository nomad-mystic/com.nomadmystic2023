<?php

namespace App\View\Composers;

use App\Http\Controllers\GitHub;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Roots\Acorn\View\Composer;

/**
 * @classdesc
 * @class Repos
 * @extends Composer
 * @todo Call GitHub API for information on repos and inject data into views (Use "topics")
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class Repos extends Composer
{
    /**
     * @description List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'partials.common.repos',
    ];

    /**
     * @description Data to be passed to view before rendering.
     *
     * @return array
     * @throws GuzzleException
     */
    public function with(): array
    {
        return [
            'repos' => $this->getGitHubRepos(),
        ];
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @throws GuzzleException
     *
     * @return null|array
     */
    private function getGitHubRepos(): ?array
    {
        $repos = [];

        $query = 'https://api.github.com/user/repos?per_page=100&username=nomad-mystic&visibility=public';

        $response = GitHub::getGitHubEndpoint($query);

        if (!empty($response)) {

            return Utils::jsonDecode($response);

        }

        return $repos;
    }
}
