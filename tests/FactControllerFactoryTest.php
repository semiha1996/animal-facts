<?php

//src/tests/FactControllerFactoryTest.php

use App\Controller\FactControllerFactory;
use App\Controller\FactController;
use App\Repository\FactRepository;
use GuzzleHttp\Client;
use App\View\View;

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
        $view = new View(VIEW_DIR);
        $repository = new FactRepository(BASE_URL, $httpClient);  
        $factController = new FactController($view,$repository);
        
        $factory = new FactControllerFactory();
        
        $this->assertInstanceOf($factory->create($view),$factController);
    }
     /*1) FactControllerFactoryTest::testCreateFactControllerFactoryObject
     * TypeError: PHPUnit\Framework\Assert::assertInstanceOf(): Argument #1
     * ($expected) must be of type string, App\Controller\FactController given, 
     * called in C:\xampp\htdocs\animal-facts\tests\FactControllerFactoryTest.php:34
     * */
    /** C:\xampp\htdocs\animal-facts\tests\FactControllerFactoryTest.php on line 34
     */
}
