<?php

namespace App\View\Composers;

use App\Http\Controllers\GitHub;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Utils;
use Roots\Acorn\View\Composer;

/**
 * @classdesc
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
        $sortedRepos = [];

        try {
            $ignoredTopics = [
                'school-project',
            ];

            $query = 'https://api.github.com/user/repos?per_page=100&username=nomad-mystic&visibility=public';

            $unsortedRepos = GitHub::getReposAndIgnore($query, $ignoredTopics);

            $repos = $this->sortRepos($unsortedRepos);

            return $repos;

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $repos;
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @param null | array $unsortedRepos
     * @return null | array
     */
    private function sortRepos(?array $unsortedRepos): ?array
    {
        $repos = [
            'featured' => [],
            'projects' => [],
            'websites' => [],
            'learning' => [],
            'mentoring' => [],
            'interviews' => [],
        ];

        $availableTopics = [
            'learning',
            'mentoring',
            'websites',
            'projects',
            'interviews',
            'featured',
        ];

        try {
            if (!empty($unsortedRepos)) {
                foreach ($unsortedRepos as $key => $value) {
                    if (!empty($key) && !empty($value)) {
                        $topics = $value['topics'];

                        $selectedRepos = array_intersect($topics, $availableTopics);

                        if (!empty($selectedRepos) && !empty($selectedRepos[0])) {
                            $repos[$selectedRepos[0]][] = $value;
                        }

                    }
                }
            }
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $repos;
    }
}
