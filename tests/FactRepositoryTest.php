<?php

use App\Repository\FactRepository;
use GuzzleHttp\Client;
use App\Model\Fact;

define('FACT_ID', '591f98703b90f7150a19c138');

/**
 * Test FactRepository
 *
 * @author semiha
 */
class FactRepositoryTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test get list of facts method
     * @test
     */
    public function testGetRandomListMethod()
    {
        $repository = new FactRepository(BASE_URL, new Client());
        $fCollection = $repository->getRandomList();
        $this->assertTrue($fCollection->count() >= 1);
    }

     /**
     * Test get list of facts method with Not Found response from server
     * @test
     */
    public function testGetRandomListMethodNotFoundResponse()
    {
        $repository = new FactRepository(BASE_URL . '/wrong/', new Client());
        $fCollection = $repository->getRandomList();
        $this->assertTrue($fCollection->count() >= 0);
    }

    /**
     * Test get single fact method
     * @test
     */
    public function testGetFactMethod()
    {
        $repository = new FactRepository(BASE_URL, new Client());
        $fact = $repository->getFact(FACT_ID);
        $this->assertInstanceOf(Fact::class, $fact);
    }

    /**
     * Test get single fact method with Not Found response from server
     * @test
     */
    public function testGetFactMethodNotFoundResponse()
    {
        $repository = new FactRepository(BASE_URL . '/wrong/', new Client());
        $fact = $repository->getFact(FACT_ID);
        $this->assertTrue($fact->getId() === "");
    }
}
