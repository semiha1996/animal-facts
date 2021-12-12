<?php

//src/Exception/InvalidUserNamesException.php

namespace App\Exception;

/**
 * InvalidUserNamesException is thrown when an array without "first" or "last" 
 * index is tried to be set for user names.
 *
 * @author semiha
 */
class InvalidUserNamesException extends InvalidArgumentException
{
     public function __construct(string $message = ' ') {
        parent::__construct($message);
        $this->message = $message;
    }
}