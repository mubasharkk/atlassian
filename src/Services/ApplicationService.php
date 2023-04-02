<?php

namespace Mubasharkk\Atlassian\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use League\Fractal\Manager;
use League\Fractal\Resource;
use Mubasharkk\Atlassian\Exceptions\BadRequest;
use Mubasharkk\Atlassian\Transformers;
use Psr\Http\Message\ResponseInterface;

class ApplicationService
{
    protected Client $client;
    private array $config;
    private Manager $fractal;

    public function __construct()
    {
        $this->config = require __DIR__.'/../config/atlassian-api.php';
        $this->client = new Client([
            'base_uri' => $this->config['baseUri'],
            ''
        ]);
        $this->fractal = new Manager();
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function getAddons(array $queryParams = [])
    {
        try {
            $data = $this->prepareResponse(
                $this->client->get('addons', [
                    'query' => $queryParams
                ])
            );
        } catch (ClientException $ex) {
            throw new BadRequest(
                $ex->getResponse()->getBody()->getContents(),
                $ex->getCode()
            );
        }

        return $this->fractal->createData(
            new Resource\Collection(
                $data['_embedded']['addons'],
                new Transformers\AddonTransformer
            )
        );
    }

    public function getAppsList(array $queryParams = []): \League\Fractal\Scope
    {
        $data = $this->prepareResponse(
            $this->client->get('applications', [
                'query' => $queryParams
            ])
        );

        return $this->fractal->createData(
            new Resource\Collection(
                $data['_embedded']['applications'],
                new Transformers\ApplicationTransformer
            )
        );
    }

    private function prepareResponse(ResponseInterface $response): array
    {
        $data = $response->getBody()->getContents();
        return \json_decode($data, true);
    }
}