<?php

use FcPhp\Service\Service;
use PHPUnit\Framework\TestCase;
use FcPhp\Service\Interfaces\IService;

class ServiceUnitTest extends TestCase
{
    public function setUp()
    {
        $this->instance = new Service();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(IService::class, $this->instance);
    }

    public function testGet()
    {
        $this->instance->setRepository('test', new TestRepository());
        $this->assertInstanceOf(TestRepository::class, $this->instance->getRepository('test'));
    }

    /**
     * @expectedException FcPhp\Service\Exceptions\RepositoryNotFoundException
     */
    public function testGetNotFound()
    {
        $this->instance->getRepository('notFound');
    }

    public function testCallbackRepository()
    {
        $instance = new TestService();
        $instance->callback('callbackRepository', function(string $repository, $instance) {
            $this->assertEquals('test', $repository);
            $this->assertInstanceOf(TestRepository::class, $instance);
        });
        $instance->setRepository('test', new TestRepository());
        $instance->getRepository('test');
    }
}

class TestService extends Service implements IService
{

}

class TestRepository
{

}
