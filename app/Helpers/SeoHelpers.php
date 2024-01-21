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

    /**
     * @description
     * @private
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @param array $website
     * @return object
     *
     */
    private static function buildWebsiteBaseLdJson(array $website): object
    {
        // Build our object
        return (object) [
            '@context' => 'https://schema.org/',
            '@type' => 'WebSite',
            'name' => $website['safeName'] ?? '',
            'potentialAction' => (object) [
                '@type' => 'ReadAction',
                'target' => (object) [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => $website['url'] ?? '',
                ],
            ],
            'url' => $website['url'] ?? '',
            'description' => $website['description'] ?? '',
        ];
    }

    /**
     * @description Create LD+JSON objects based on content of our websites
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     * @link https://schema.org/WebSite
     *
     * @example
     *      {
     *          "@context": "https://schema.org/",
     *          "@type": "WebSite",
     *          "name": "Okta.com",
     *          "url": "https://okta.com",
     *          "potentialAction": {
     *              "@type": ReadAction,
     *              "target": {
     *                  "@type": EntryPoint,
     *                  "urlTemplate": "https://okta.com"
     *              }
     *          },
     *          "description": "This is a website I worked on"
     *      }
     *
     * @param array $website
     * @return string
     */
    public static function buildWebsiteLdJson(array $website): string
    {
        // Bail early
        if (empty($website)) {
            echo '';
        }

        $jsonLdContent = self::buildWebsiteBaseLdJson($website);

        $finalJsonLd = Utils::jsonEncode($jsonLdContent);

        return $finalJsonLd;
    }

    /**
     * @description Create LD+JSON objects based on content of our featured items
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return string
     * @param array $feature
     */
    public static function buildFeaturedLdJson(array $feature): string
    {
        // Bail early
        if (empty($feature)) {
            echo '';
        }

        $baseContent = self::buildWebsiteBaseLdJson($feature);

        // "merge" immutable
        $featureLdJson = $baseContent;

        // Extend base
        $featureLdJson->datePublished = $feature['published'] ?? '';

        $featureLdJson->maintainer = (object) [
            '@type' => 'Person',
            'name' => 'Keith Murphy',
            'url' => $feature['githubURL'] ?? '',
            'email' => 'nomadmystics@gmail.com',
        ];

        // Sanity check
        if (!empty($feature['builtWith']) && is_array($feature['builtWith'])) {

            // Build our keywords
            $keywords = [];

            foreach ($feature['builtWith'] as $techKey => $techValue) {
                if (!empty($techValue)) {
                    $techTerm = (object) [];

                    $techTerm->{'@type'} = 'DefinedTerm';
                    $techTerm->{'name'} = $techValue['name'] ?? '';
                    $techTerm->{'url'} = $techValue['url'] ?? '';

                    $keywords[] = $techTerm;
                }
            }

            $featureLdJson->keywords = $keywords;
        }

        $finalJsonLd = Utils::jsonEncode($featureLdJson);

        return $finalJsonLd;
    }
}
