<?php

namespace App\View\Composers;

use App\Http\Controllers\GitHub;
use App\Helpers\ReposHelpers;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Roots\Acorn\View\Composer;

/**
 * @classdesc Expose data to the repos template
 * @class Repos
 * @extends Composer
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
        'template-repos',
    ];

    /**
     * @var array[]
     */
    protected static array $finalReposList = [
        'featured' => [],
        'projects' => [],
        'websites' => [],
        'learning' => [],
        'mentoring' => [],
        'interviews' => [],
    ];

    /**
     * @var string[]
     */
    protected static array $availableTopics = [
        'learning',
        'mentoring',
        'websites',
        'projects',
        'interviews',
        'featured',
    ];

    /**
     * @var string[]
     */
    protected static array $ignoredTopics = [
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

            $unsortedRepos = GitHub::getReposAndIgnore($query, Repos::$ignoredTopics);

            $repos = ReposHelpers::sortRepos($unsortedRepos, Repos::$finalReposList, Repos::$availableTopics);

            return $repos;

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $repos;
    }
}
