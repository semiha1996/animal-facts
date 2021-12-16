<?php

//src/Exception/InvalidFactTypeException.php

namespace App\Exception;

use InvalidArgumentException;

/**
 * InvalidFactTypeException is thrown when disallowed type is tried to be set
 * for a Fact
 *
 * @author semiha
 */
class InvalidFactTypeException extends InvalidArgumentException
{
     public function __construct(string $message = ' ') {
        parent::__construct($message);
        $this->message = $message;
    }
}