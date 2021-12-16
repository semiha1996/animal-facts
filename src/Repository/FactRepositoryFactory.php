<?php

namespace App\Repository;

use App\Repository\FactRepository;
use GuzzleHttp\Client;

/**
 * Creates FactRepository objects
 *
 * @author semiha
 */
class FactRepositoryFactory
{
    public static function create(): FactRepository
    {
        return new FactRepository(\BASE_URL, new Client());
    }
}
