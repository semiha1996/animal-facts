<?php

//src/tests/FactRepositoryTest.php

define('BASE_URL','https://cat-fact.herokuapp.com');

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
        $repository = new FactRepository(BASE_URL, $httpClient);  
        
        $factory = new FactRepositoryFactory();
        
        $this->assertInstanceOf($factory->create(),$repository);
    }
}
