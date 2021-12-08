<?php

//src/Controller/FactControllerFactory.php

namespace App\Controller;

use App\View\View;
use \App\Repository\FactRepository;

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
        return new FactController($view, FactRepository::getInstance());
    }
}