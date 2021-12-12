<?php

//src/Controller/FactControllerFactory.php

namespace App\Controller;

use App\View\View;
use \App\Repository\FactRepository;
use GuzzleHttp\Client;

/**
 * Factory for FactController objects
 *
 * @author semiha
 */
class FactControllerFactory 
{
    
    /**
     * Creates FactController objects
     * @param View $view
     * @return FactController
     */
    public static function create(View $view): FactController
    {
        //Fatal error: Uncaught Error: Cannot instantiate interface Psr\Http\Client\ClientInterface in 
        //C:\xampp\htdocs\animal-facts\src\Controller\FactControllerFactory.php:27 Stack trace:
        //#0 C:\xampp\htdocs\animal-facts\index.php(28): App\Controller\FactControllerFactory::create(Object(App\View\View)) 
        //#1 {main}thrown in C:\xampp\htdocs\animal-facts\src\Controller\FactControllerFactory.php on line 27
        $factController = new FactController($view, new FactRepository(
                BASE_URL, new Client()));
        return $factController;
    }
}