<?php

namespace App\View\Composers;

use App\Http\Controllers\GitHub;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Roots\Acorn\View\Composer;

/**
 * @classdesc
 * @class
 * @extends
 * @implements
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class School extends Composer
{
    /**
     * @description List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-school',
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

        try {
            $ignoredTopics = [
                'websites',
                'learning',
                'featured',
                'projects',
                'interviews',
                'mentoring',
            ];

            $query = 'https://api.github.com/user/repos?per_page=100&username=nomad-mystic&visibility=public';

            return GitHub::getReposAndIgnore($query, $ignoredTopics);

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $repos;
    }
}
