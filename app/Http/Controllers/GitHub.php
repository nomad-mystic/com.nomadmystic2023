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
     * @throws GuzzleException
     */
    static public function getLanguagesRequest(WP_REST_Request $request): ?WP_REST_Response
    {

        try {
            $ownerRepo = $request->get_param('ownerRepo');

            $response = GitHub::getGitHubEndpoint("https://api.github.com/repos/{$ownerRepo}/languages");

            return new WP_REST_Response($response);

        } catch (ClientException $exception) {

            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());

        }

        return new WP_REST_Response(json_encode(''));
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     * @link https://github.com/vlucas/phpdotenv
     * @todo Checkout pagination: https://docs.github.com/en/rest/guides/using-pagination-in-the-rest-api?apiVersion=2022-11-28
     *
     * @throws GuzzleException
     *
     * @param string $query
     * @return string|null
     */
    static public function getGitHubEndpoint(string $query): ?string
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
}
