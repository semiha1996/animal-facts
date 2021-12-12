<?php

//src/Repository/FactRepositoryFactory.php

namespace App\Repository;

use Repository\FactRepository;

/**
 * Creates FactRepository objects
 *
 * @author semiha
 */
class FactRepositoryFactory 
{
    public static function create(): FactRepository 
    {
        return FactRepository(\BASE_URL, new Client());
    }
}