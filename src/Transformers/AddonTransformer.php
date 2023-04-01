<?php

namespace Mubasharkk\Atlassian\Transformers;

use League\Fractal\TransformerAbstract;

class AddonTransformer extends TransformerAbstract
{
    const ATLASIAN_DOMAIN = 'https://marketplace.atlassian.com';

    public function transform(array $addOn): array
    {
        $embeddedData = $addOn['_embedded'];
        return [
            'key'           => $addOn['key'],
            'id'            => $addOn['id'],
            'name'          => $addOn['name'],
            'description'   => $addOn['summary'],
            'link'          => self::atlassianUrl($addOn['_links']['alternate']['href']),
            'categories'    => array_map(function ($category) {
                return $category['name'];
            }, $embeddedData['categories']),
            'vendor'        => [
                'name'     => $embeddedData['vendor']['name'],
                'programs' => [
                    'topVendorStatus' => $embeddedData['vendor']['programs']['topVendor'],
                ],
                'link'     => self::atlassianUrl($embeddedData['vendor']['_links']['alternate']['href']),
            ],
            'status'        => $addOn['status'],
            'logo'          => $embeddedData['logo']['_links']['highRes']['href'] ?? $embeddedData['logo']['_links']['image']['href'],
            'reviews'       => $embeddedData['reviews'],
            'downloads'     => $embeddedData['distribution']['downloads'],
            'totalInstalls' => $embeddedData['distribution']['totalInstalls'],
            'totalUsers'    => $embeddedData['distribution']['totalUsers'],
        ];
    }

    public static function atlassianUrl(string $path): string
    {
        return self::ATLASIAN_DOMAIN.$path;
    }
}