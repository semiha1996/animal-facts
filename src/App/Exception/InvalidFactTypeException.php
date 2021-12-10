<?php

//src/Exception/InvalidFactTypeException.php

namespace App\Exception;

/**
 * InvalidFactTypeException is thrown when disallowed type is tried to be set
 * for a Fact
 *
 * @author semiha
 */
class InvalidFactTypeException extends InvalidArgumentException
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