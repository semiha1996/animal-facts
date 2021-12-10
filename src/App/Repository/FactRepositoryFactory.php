<?php

//src/Repository/FactRepositoryFactory.php

namespace App\Repository;

use \Psr\Http\Client\ClientInterface;

/**
 * Creates FactRepository objects
 *
 * @author semiha
 */
class FactRepositoryFactory 
{
    public static function create(): FactRepository 
    {
        return FactRepository(\BASE_URL, ClientInterface::getInstance());
    }
}