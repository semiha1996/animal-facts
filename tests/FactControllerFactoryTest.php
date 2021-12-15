<?php

//src/tests/FactControllerFactoryTest.php

use App\Controlle\FactControllerFactory;
use App\Controller\FactController;
use App\Repository\FactRepository;
use GuzzleHttp\Client;

define('VIEW_DIR','views');
define('BASE_URL','https://cat-fact.herokuapp.com');

/**
 * Test FactControllerFactory
 * 
 * @author semiha
 */
class FactControllerFactoryTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test creating FactControllerFactory object
     * @test
     */
    public function testCreateFactControllerFactoryObject() 
    {
        $httpClient = new Client();
        $repository = new FactRepository(BASE_URL, $httpClient);  
        $factController = new FactController(VIEW_DIR,$repository);
        
        $factory = new FactControllerFactory();
        
        $this->assertInstanceOf($factory->create(),$factController);
    }
}
