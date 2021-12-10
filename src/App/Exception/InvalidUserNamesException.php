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
    protected string $message;
    
     public function __construct(string $message = ' ') {
        $this->message = $message;
    }
    
    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message) {
        $this->message = $message;
        return $this;
    }
}