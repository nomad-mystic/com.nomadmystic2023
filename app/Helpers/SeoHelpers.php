<?php

namespace App\Helpers;

use GuzzleHttp\Utils;

/**
 * @classdesc Handle anything related to SEO
 * @class SeoHelpers
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class SeoHelpers
{
    /**
     * @description Create LD+JSON objects based on content of our repo
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     * @link https://schema.org/SoftwareSourceCode
     *
     * @example
     *
     *  <script type="application/ld+json">
     *      {
     *          "@context": "https://schema.org/",
     *          "@type": "SoftwareSourceCode",
     *          "name": "css-grid-package",
     *          "author": {
     *              "@type": "Person",
     *              "name": "nomad-mystic"
     *          },
     *          "datePublished": "2018-03-10",
     *          "dateModified": "2019-03-10",
     *          "description": "This creates a CSS grid package",
     *          "url": "https://github.com/nomad-mystic/css-grid-package",
     *          "keywords" ["projects"]
     *      }
     *  </script>
     *
     * @param array $repo
     * @return string
     */
    public static function buildRepoLdJson(array $repo): string
    {
        // Bail early
        if (empty($repo)) {
            echo '';
        }

        // Build our object
        $jsonLdContent = (object) [
            '@context' => 'https://schema.org/',
            '@type' => 'SoftwareSourceCode',
            'name' => $repo['name'] ?? '',
            'author' => (object) [
                '@type' => 'Person',
                'name' => $repo['owner']['login'] ?? '',
            ],
            'datePublished' => $repo['created_at'] ?? '',
            'dateModified' => $repo['updated_at'] ?? '',
            'description' => $repo['description'] ?? '',
            'url' => $repo['html_url'] ?? '',
            'keywords' => $repo['topics'] ?? [],
        ];

        $finalJsonLd = Utils::jsonEncode($jsonLdContent);

        return $finalJsonLd;
    }
}
