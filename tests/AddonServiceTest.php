<?php declare(strict_types=1);

use Mubasharkk\Atlassian\Services\ApplicationService;
use PHPUnit\Framework\TestCase;

class AddonServiceTest extends TestCase
{

    private ApplicationService $service;

    public function setUp(): void
    {
        $this->service = new ApplicationService();
    }

    public function testValidRequestWithLimit()
    {
        $addons = $this->service->getAddons();

        $this->assertCount(10, $addons->toArray()['data']);
    }


    public function testValidRequestWithCategory()
    {
        $addons = $this->service->getAddons([
            'category' => 'Deployments',
            'limit' => 5
        ]);

        $this->assertCount(5, $addons->toArray()['data']);

    }
}



