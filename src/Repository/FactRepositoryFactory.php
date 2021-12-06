<?php

//src/Repository/FactRepositoryFactory.php

namespace App\Repository;

/**
 * Creates FactRepository objects
 *
 * @author semiha
 */
class FactRepositoryFactory {
    public static function create(): FactRepository {
        return FactRepository;
    }
}
