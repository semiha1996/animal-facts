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
        $factController = new FactController($view, new FactRepository(
                BASE_URL, new Client()));
        return $factController;
    }
}