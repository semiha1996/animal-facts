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
class InvalidResponseBodyException extends InvalidArgumentException{
    //put your code here
}
