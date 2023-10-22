<?php

namespace App\Helpers;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Utils;

class ReposHelpers
{
    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @param null | array $unsortedRepos
     * @param array $finalReposList
     * @param array $availableTopics
     * @return null | array
     */
    public static function sortRepos(?array $unsortedRepos, array $finalReposList, array $availableTopics): ?array
    {
        try {
            if (!empty($unsortedRepos)) {
                foreach ($unsortedRepos as $key => $value) {
                    if (!empty($key) && !empty($value)) {
                        $topics = $value['topics']; // Topics is an array

                        // Short by topic
                        $selectedRepos = array_intersect($topics, $availableTopics);

                        if (!empty($selectedRepos) && !empty($selectedRepos[0])) {
                            // Build our final array
                            $finalReposList[$selectedRepos[0]][] = $value;
                        }

                    }
                }
            }
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            echo Utils::jsonEncode($response->getBody()->getContents());
        }

        return $finalReposList;
    }
}
