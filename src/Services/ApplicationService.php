<?php

namespace Mubasharkk\Atlassian\Services;

use GuzzleHttp\Client;

class ApplicationService
{
    public function __construct()
    {
        $this->config = require __DIR__. '../config/atlassian-api.php';
        $this->client = new Client([
            'base_uri' => $this->config['baseUri']
        ]);
    }

    public function client()
    {

    }
}