<?php

//src/Exception/HttpResponseException.php

namespace App\Exception;

/**
 * HttpResponseException is thrown when the response of the API call 
 * is not with status 200 OK.
 *
 * @author semiha
 */
class HttpResponseException extends RuntimeException
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