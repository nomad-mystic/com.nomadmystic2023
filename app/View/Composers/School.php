<?php

namespace App\View\Composers;

use App\Helpers\ReposHelpers;
use App\Http\Controllers\GitHub;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose data to the school template
 * @class School
 * @extends Composer
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
     * @var string[]
     */
    protected static array $ignoredTopics = [
        'websites',
        'learning',
        'featured',
        'projects',
        'interviews',
        'mentoring',
    ];

    /**
     * @var array[]
     */
    protected static array $finalReposList = [
        'school-project' => [],
    ];

    /**
     * @var string[]
     */
    protected static array $availableTopics = [
        'school-project',
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
            'allRepos' => $this->getGitHubRepos(),
        ];
    }

    /**
     * @description Use the GitHub API to get public repos by topic
     * @private
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
            $query = 'https://api.github.com/user/repos?per_page=100&username=nomad-mystic&visibility=public';

            $unsortedRepos = GitHub::getReposAndIgnore($query, School::$ignoredTopics);

            $repos = ReposHelpers::sortRepos($unsortedRepos, School::$finalReposList, School::$availableTopics);

            return $repos;

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $repos;
    }
}
