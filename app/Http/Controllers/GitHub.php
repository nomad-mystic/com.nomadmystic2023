<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Psr\Http\Message\StreamInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Utils;
use WP_REST_Request;
use WP_REST_Response as WP_REST_Response;

class GitHub extends Controller
{
    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     * @link https://github.com/vlucas/phpdotenv
     * @todo Checkout pagination:
     *      https://docs.github.com/en/rest/guides/using-pagination-in-the-rest-api?apiVersion=2022-11-28
     *
     * @throws GuzzleException
     *
     * @param string $query
     * @return string|null
     */
    public static function getGitHubEndpoint(string $query): ?string
    {
        try {
            $client = new Client();

            if (empty($_ENV['GITHUB_API_KEY']) || empty($_ENV['GITHUB_USERNAME'])) {
                return 'Please check the GITHUB_API_KEY and GITHUB_USERNAME variables are set in .env';
            }

            $response = $client->request('GET', $query, [
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
     * @description
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
            $themeUrl = get_stylesheet_directory_uri();
            $themePath = get_stylesheet_directory();
            $filesPath = '/public/images/icons/languages/';
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

                        // Build paths
                        $urlToIcon = "{$themeUrl}{$filesPath}{$lowerCaseKey}{$fileType}";
                        $pathToIcon = "{$themePath}{$filesPath}{$lowerCaseKey}{$fileType}";

                        // Make sure we have an icon
                        if (file_exists($pathToIcon)) {
                            $languagesList[$lowerCaseKey] = $urlToIcon;
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
     * @description
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
