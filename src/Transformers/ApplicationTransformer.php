<?php

namespace Mubasharkk\Atlassian\Transformers;

use League\Fractal\TransformerAbstract;

class ApplicationTransformer extends TransformerAbstract
{
    public function transform(array $app): mixed
    {
        return [
            'key' => $app['key'],
            'name' => $app['name'],
            'description' => $app['introduction'],
            'link' => $app['_links']['alternate'] ?? [],
            'status' => $app['status'],
            'categories' => $app['categories']
        ];
    }
}