<?php

namespace App\Exception;

use RuntimeException;

/**
 * HttpResponseException is thrown when the response of the API call
 * is not with status 200 OK.
 *
 * @author semiha
 */
class HttpResponseException extends RuntimeException
{
    public function __construct(string $message = ' ')
    {
        parent::__construct($message);
        $this->message = $message;
    }
}
