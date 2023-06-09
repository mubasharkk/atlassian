<?php
declare(strict_types=1);

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
            'limit'    => 5
        ]);

        foreach ($addons->toArray()['data'] as $item) {
            $this->assertContains('Deployments', $item['categories']);
            $this->assertArrayHasKey('name', $item);
            $this->assertArrayHasKey('description', $item);
            $this->assertArrayHasKey('link', $item);
            $this->assertArrayHasKey('vendor', $item);
            $this->assertArrayHasKey('totalInstalls', $item);
            $this->assertArrayHasKey('reviews', $item);
            $this->assertArrayHasKey('categories', $item);
            $this->assertArrayHasKey('downloads', $item);
        }

        $this->assertCount(5, $addons->toArray()['data']);
    }
}



