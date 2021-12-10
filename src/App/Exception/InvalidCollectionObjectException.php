<?php

//src/Exception/InvalidCollectionObjectException.php

namespace App\Exception;

/**
 * InvalidCollectionObjectException is thrown when object of disallowed class 
 * is set to the collection
 *
 * @author semiha
 */
class InvalidCollectionObjectException extends InvalidArgumentException
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