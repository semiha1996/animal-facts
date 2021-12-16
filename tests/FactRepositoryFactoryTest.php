<?php

use GuzzleHttp\Client;
use App\Repository\FactRepository;
use App\Repository\FactRepositoryFactory;

define('BASE_URL', 'https://cat-fact.herokuapp.com');

/**
 * Test FactRepositoryFactory
 *
 * @author semiha
 */
class FactRepositoryFactoryTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test creating FactRepositoryFactory object
     */
    public function testCreateFactRepositoryFactoryObject()
    {
        $httpClient = new Client();

        $factory = new FactRepositoryFactory();

        $this->assertInstanceOf(FactRepository::class, $factory->create());
    }
}
