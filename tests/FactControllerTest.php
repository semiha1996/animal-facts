<?php

//src/tests/FactControllerTest.php

use App\Controller\FactController;
use App\Repository\FactRepository;
use App\View\View;
use GuzzleHttp\Client;

define('BASE_URL', 'https://cat-fact.herokuapp.com');
define('FACT_ID', '591f98703b90f7150a19c138');
define('DEFAULT_AMOUNT', 10);
define('TYPE', 'cat');

/**
 * Description of FactController
 *
 * @author semiha
 */
class FactControllerTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test list method for displaying a list of particular amount facts about
     * allowed type of animal
     * @test
     */
    public function testListMethod()
    {
        $view = new View('views');
        $repository = new FactRepository(BASE_URL, new Client());
        $controller = new FactController($view, $repository);
        $actualString = $controller->list(DEFAULT_AMOUNT, TYPE);
        $this->assertTrue($actualString != null);
    }
     /**
     * Test single method for displaying a single fact's data
     * @test
     */
    public function testSingleMethod()
    {
        $view = new View('views');
        $repository = new FactRepository(BASE_URL, new Client());
        $controller = new FactController($view, $repository);
        $actualString = $controller->single(FACT_ID);
        $this->assertTrue($actualString != null);
    }
}
