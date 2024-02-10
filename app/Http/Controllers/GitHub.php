<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Routing\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Utils;
use WP_REST_Request;
use WP_REST_Response as WP_REST_Response;

/**
 * @classdesc Handle HTTP request related to the GitHub API
 * @class GitHub
 * @extends Controller
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class GitHub extends Controller
{
    /**
     * @description Pass this a query for the GitHub API and it will return the body's content
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     * @link https://github.com/vlucas/phpdotenv
     * @todo Checkout pagination:
     *      https://docs.github.com/en/rest/guides/using-pagination-in-the-rest-api?apiVersion=2022-11-28
     *
     * @throws GuzzleException
     *
     * @param string $query
     * @param string $method
     * @return string|null
     */
    public static function getGitHubEndpoint(string $query, string $method = 'GET'): ?string
    {
        try {
            $client = new Client();

            if (empty($_ENV['GITHUB_API_KEY']) || empty($_ENV['GITHUB_USERNAME'])) {
                return 'Please check the GITHUB_API_KEY and GITHUB_USERNAME variables are set in .env';
            }

            $response = $client->request($method, $query, [
                'headers' => [
                    'X-GitHub-Api-Version' => '2022-11-28',
                    'Accept' => 'application/vnd.github+json',
                    'Authorization' => 'Token ' . $_ENV['GITHUB_API_KEY'] ?? '',
                ],
            ]);

            // Helpful debugging
            // echo $response->getStatusCode(); // 200
            // echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
            // echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

            return $response->getBody()->getContents();
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return null;
    }

    /**
     * @description For each of the repos get the associated languages
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @throws GuzzleException
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|null {null | WP_REST_Response}
     */
    public static function getLanguagesRequest(WP_REST_Request $request): ?WP_REST_Response
    {
        $languagesList = [];

        try {
            $fileType = '.svg';

            // Build our REST call
            $ownerRepo = $request->get_param('ownerRepo');

            // Get our response
            $response = GitHub::getGitHubEndpoint("https://api.github.com/repos/{$ownerRepo}/languages");

            if (!empty($response)) {
                $languages_response = json_decode($response, true);

                foreach (array_keys($languages_response) as $langKey) {
                    if (!empty($langKey)) {
                        // File names are in lowercase
                        $lowerCaseKey = strtolower($langKey);

                        $image = \Roots\asset("images/icons/languages/{$lowerCaseKey}{$fileType}");

                        // Make sure we have an icon
                        if (!empty($image->path()) && file_exists($image->path())) {
                            $languagesList[$lowerCaseKey] = $image->uri();
                        }
                    }
                }
            }

            return new WP_REST_Response($languagesList);

        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return new WP_REST_Response($languagesList);
    }

    /**
     * @description Only get the repos that are not in the current calls string[]
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @throws GuzzleException
     *
     * @param string $query
     * @param array $ignoredTopics
     * @return null|array
     */
    public static function getReposAndIgnore(string $query, array $ignoredTopics): ?array
    {
        $repos = [];
        $ignored = $ignoredTopics;
        $q = $query;

        $response = GitHub::getGitHubEndpoint($q);

        if (!empty($response)) {
            $data = Utils::jsonDecode($response, true);

            foreach ($data as $key => $value) {
                if (!empty($key) && !empty($value)) {
                    $topics = $value['topics'];

                    $selectedRepos = array_intersect($topics, $ignored);

                    if (empty($selectedRepos)) {
                        $repos[] = $value;
                    }

                }
            }

            return $repos;
        }

        return $repos;
    }
}
