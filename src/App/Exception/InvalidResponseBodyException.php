<?php

//src/Exception/InvalidResponseBodyException.php

namespace App\Exception;

/**
 *InvalidResponseBodyException is thrown when a problem with json decoding of
 *the response body is raised. 
 *The origin JsonException must be set as previous exception.
 * 
 * @author semiha
 */
class InvalidResponseBodyException extends InvalidArgumentException
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